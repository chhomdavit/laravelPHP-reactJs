/* eslint-disable no-undef */
import React ,{useState,useEffect} from 'react';
import { DeleteFilled, EditFilled, PlusOutlined, UserOutlined } from '@ant-design/icons';
import { Modal, Upload, Form, Input, Button,message, Popconfirm, Space, Table, Image, Row, Col, Select} from 'antd';
import {Config} from '../../util/service'
import Container from '../Container/Container'
import {request} from "../../util/api";
const getBase64 = (file) =>
  new Promise((resolve, reject) => {
    const reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = () => resolve(reader.result);
    reader.onerror = (error) => reject(error);
  });
  const {Option} = Select

const Product = () => {
  const [list, setList] = useState([]);
  const [categoryList,setCategoryList] = useState([])
  const [loading,setLoading] = useState(false)
  const [visibleModal, setVisibleModal] = useState(false)
  const [items, setItems] = useState(null)

  const [previewOpen, setPreviewOpen] = useState(false);
  const [previewImage, setPreviewImage] = useState('');
  const [fileList, setFileList] = useState([]);
  const [imgFile, setImgFile] = useState(null)

  const [form] = Form.useForm();
  const handleCancel = () => setPreviewOpen(false);

  useEffect(()=>{
    getlist()
  },[])
  
  const getlist = () =>{
    setLoading(true)
      request('get','products',{}).then(res=>{
        console.log(res)
        setLoading(false)
       if(res.status === 200){
          var data = res.data
          setList(data.list_products)
          setCategoryList(data.list_categories)
       }
      })
  }

  const handleChange = ({ fileList: newFileList }) =>{ 
    setFileList(newFileList)
  };

  const onClickDelete = (id) =>{
    setVisibleModal(false)
    setLoading(true)
    request('delete','products/'+id,{}).then(res=>{
      setLoading(false)
      if(res.status === 200){
        message.success(res.data.message)
        getlist()
      }
     })
  }

  const handlePreview = async (file) => {
    if (!file.url && !file.preview) {
      file.preview = await getBase64(file.originFileObj);
    }
    setPreviewImage(file.url || file.preview);
    setPreviewOpen(true);
    setImgFile(URL.createObjectURL(file.target.files[0]))
  };

  const onClickBtnAddNew = () =>{
    setVisibleModal(true)
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
    formData.append('price', item.price);
    formData.append('category_id', item.category_id);
    formData.append('author_id', 1);
    formData.append('description', item.description);
    if (fileList.length > 0) {
      formData.append('image', fileList[0].originFileObj);
    }
    var method = "post"
    var url = "products"
    if (items != null) {
      method = 'put'
      url = 'products/' + items.id 
      formData.append("id", items.id)
    }
    // console.log(item)
    // console.log(fileList)
    // return
    request(method, url, formData).then(res => {
      console.log(res)
      setLoading(false)
      if (res.status === 200) {
        getlist()
        setItems(null)
        message.success(res.data.message)
      }
    })
  };

  const uploadButton = (
    <div>
      <PlusOutlined />
      <div
        style={{
          marginTop: 8,
        }}
      >
        Upload
      </div>
    </div>
  );

  useEffect(()=>{
      if(items != null){
        console.log(items)
        form.setFieldsValue({
          title : items.title,
          price : items.price,
          description : items.description,
          category_id : items.category_id,
        })
        setFileList([
          {
          uid: '-1',
          url: Config.imagePath + items.image,
          }
        ]); 
      }
  // eslint-disable-next-line react-hooks/exhaustive-deps
  },[form, items]);

  const handleCloseModle = () =>{ 
    form.resetFields()
    setItems(null)
    setFileList([])
    setVisibleModal(false)
 }
  return (
    <>
    <Container
      loading={loading}
      pageTitle = "Product"
      btnRight = "New Product"
      onClickBtnAddNew={onClickBtnAddNew}
      search={{ 
        title:'Product Name',
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
          title : "category_name",
          key: "category_id",
          dataIndex:"category",
          render: (item,items,index)=>{
            return (
              <div>
                  {item.title}
              </div>
            )
          }
        },
        {
          title : "description",
          key: "description",
          dataIndex:"description"
        },
        {
          title : "image",
          key: "image",
          dataIndex:"image",
          render: (item,items,index)=>{
            return (
              <div style={{textAlign:'center', width:'75px', borderRadius:'5px'}}>
                        {item != null ?
                            <Image style={{ borderRadius:'5px' }} src={Config.imagePath+item} /> 
                            :
                            <Image icon={<UserOutlined />} />
                        } 
                    </div>
            )
          }
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

{/* =============================================================== */}

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
          enctype="multipart/form-data"
        >

          <Form.Item label="title" name="title" rules={[{ required: true, message: 'Please enter a title.' }]}>
            <Input placeholder="Enter title" />
          </Form.Item>

          <Form.Item label="price" name="price" rules={[{ required: true, message: 'Please enter a price.' }]}>
            <Input placeholder="Enter price" />
          </Form.Item>

          <Form.Item label="category_id" name="category_id">
            <Select
              placeholder='Select a category'
              style={{ width: '100%' }}
              allowClear={true}
            >
              {
              categoryList.map((item, index)=>{
                return(
                  <Option key={index} value={item.id}>{item.title}</Option>
                )
              })
              }
            </Select>
          </Form.Item>

          <Form.Item label="Description" name="description">
            <Input.TextArea placeholder="Enter description" />
          </Form.Item>

          <Form.Item label="Image">
            <Row gutter={[16, 16]}>
              <Col span={12}>
                <Upload
                  action={null}
                  listType="picture-card"
                  fileList={fileList}
                  onPreview={handlePreview}
                  onChange={handleChange}
                >
                  {fileList.length >= 8 ? null : uploadButton}
                </Upload>
              </Col>
              <Col span={12}>
                <div style={{ width: 100, height: 100}}>
                  {imgFile != null ? (
                    <div>
                      <Image
                        src={imgFile}
                        style={{ width: 100 }}
                        alt={imgFile}
                      />
                    </div>
                  )
                  :
                  (
                      <div className='animate__animated animate__fadeInRight'>
                        {items &&
                          <Image
                            src={Config.imagePath + items.image}
                            alt={items.image}
                            style={{ width: 100, height: 100,borderRadius:10,padding: 5, margin: 'auto',border: '1px solid red'}}
                          />
                        }
                      </div>
                  )
                  }
                </div>
              </Col>
            </Row>
            <Modal
              open={previewOpen}
              footer={null}
              onCancel={handleCancel}>
              <img
                alt="example"
                style={{
                  width: '100%',
                }}
                src={previewImage}
              />
            </Modal>
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

export default Product
