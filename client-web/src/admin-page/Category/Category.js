import React ,{ useState,useEffect } from 'react';
import { request } from "../../util/api";
import Container from '../Container/Container';
import { DeleteFilled, EditFilled } from '@ant-design/icons';
import { formatDateForClient } from '../../util/service'
import { Button, Form, Input, Modal, Popconfirm, Space, Table, message } from 'antd';

const Category = () => {
  const [list, setList] = useState([]);
  const [loading,setLoading] = useState(false)
  const [visibleModal, setVisibleModal] = useState(false)
  const [items, setItems] = useState(null)

  const [form] = Form.useForm();

  useEffect(()=>{
    getlist()
  },[])

  const getlist = () =>{
    setLoading(true)
      request('get','categories',{}).then(res=>{
        setLoading(false)
       if(res.status === 200){
          var data = res.data
          setList(data.list_categories)
       }
      })
  }

  const onClickBtnAddNew = () =>{
    setVisibleModal(true)
  }

  const onClickDelete = (id) =>{
    setVisibleModal(false)
    setLoading(true)
    request('delete','categories/'+id,{ isDeleted: true }).then(res=>{
      setLoading(false)
      if(res.status === 200){
        message.success(res.data.message)
        getlist()
      }
     })
  }

  const  onClickEdit = (param)=>{
    setItems(param)
    setVisibleModal(true)
  }

  const onFinish = (item) => {
    setLoading(true)
    setVisibleModal(false)
    handleCloseModle()
    const formData = new FormData();
    formData.append('title', item.title);
    formData.append('description', item.description);

    var method = "post"
    var url = "categories"
    if (items != null) {
      method = 'put'
      url = 'categories/' + items.id 
      formData.append("id", items.id)
    }
    request(method, url, formData).then(res => {
      setLoading(false)
      if (res.status === 200) {
        getlist()
        setItems(null)
        message.success(res.data.message)
      }
    })
  };
  
  React.useEffect(()=>{
    if(items != null){
      form.setFieldsValue({
        title : items.title,
        description : items.description
      })
    }
// eslint-disable-next-line react-hooks/exhaustive-deps
},[items]);

  const handleCloseModle = () =>{ 
    form.resetFields()
    setItems(null)
    setVisibleModal(false)
 }

  return (
    <>
    <Container
      loading={loading}
      pageTitle = "Category"
      btnRight = "New Category"
      onClickBtnAddNew={onClickBtnAddNew}
      search={{ 
        title:'Category Name',
        allowClear: true
      }}
    >
      <Table
      dataSource={list}
      columns={[
        {
          title : "No",
          render : (item,items,index)=>index + 1,
          key: "No"
        },
        {
          title : "title",
          key: "title",
          dataIndex:"title"
        },
        {
          title : "description",
          key: "description",
          dataIndex:"description"
        },
        {
          title : "created_at",
          key: "created_at",
          dataIndex:"created_at",
          render: (item,items,index)=>formatDateForClient(item)
        },
        {
          title : "updated_at",
          key: "updated_at",
          dataIndex:"updated_at",
          render: (item,items,index)=>formatDateForClient(item)
        },
        {
          title : "Action",
          key: "Action",
          render: (item,items,index)=>{
            return(
              <Space>
                <Popconfirm
                  placement="topLeft"
                  title={"Delete"}
                  description={"Are sure to romove!"}
                  onConfirm={()=>onClickDelete(items.id)}
                  okText="Yes"
                  cancelText="No"
                >
                  <Button danger size="small"><DeleteFilled/></Button>
                </Popconfirm>
                  <Button size="small" onClick={()=>onClickEdit(items)}><EditFilled/></Button>
              </Space>
            )
          }
        },
      ]}
      />
    </Container>

    {/* =========================================== */}

    <Modal
    title={items !=null ? "Update Category":"New Admin-User"}
    open={visibleModal}
    onCancel={()=>{
      form.resetFields()
      handleCloseModle()
    }}
    onOk={()=>{
      form.resetFields()
      handleCloseModle()
    }}
    footer={null}
  >
    <Form 
      form={form} 
      onFinish={(item)=>{
        form.resetFields()
        onFinish(item)
      }} 
      layout="vertical"
    >

      <Form.Item label="Category Name" name="title" rules={[{ required: true, message: 'Please enter a category name.' }]}>
        <Input placeholder="Enter category title" />
      </Form.Item>

      <Form.Item label="Category Description" name="description">
        <Input.TextArea placeholder="Enter category description" />
      </Form.Item>

     
      <Form.Item style={{ textAlign:'right' }}>
        <Space>
            <Button 
                danger
                onClick={()=>{
                  handleCloseModle()
                  form.resetFields()
                }}
            >
                Cancel
            </Button>
            <Button htmlType='submit'>{items !=null ? "Update" : "Save"}</Button>
        </Space>
      </Form.Item>

    </Form>
</Modal>
</>
  )
}

export default Category
