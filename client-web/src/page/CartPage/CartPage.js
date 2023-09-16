import React from 'react'
import './CartPage.css'
import { Button, Divider,Image,Space,Table } from 'antd'
import { DeleteFilled, EditFilled } from '@ant-design/icons';
const columns = [
    {
        title: 'Image',
        dataIndex: 'image',
        render : (item) => {
            return(
                <Image
                    style={{ borderRadius:'5px' }}
                    width={80}
                    src={item}
                    alt={item}
                />
            )
        }
      },
    {
      title: 'Name',
      dataIndex: 'name',
    },
    {
      title: 'Age',
      dataIndex: 'age',
    },
    {
        title: 'Quality',
        dataIndex: 'quality',
    },
    {
      title: 'Address',
      dataIndex: 'address',
    },
    {
        title: "Action",
        key: "Action",
        render: (item, items, index) => {
                return (
                    <Space>
                        <Button onClick={() => alert('Delete')} size='small' danger><DeleteFilled/></Button>
                        <Button onClick={() => alert('Edit')} size='small'><EditFilled /></Button>
                    </Space>
                )
        }
      },
  ];
  const data = [
    {
      key: '1',
      name: 'John Brown',
      quality: '1',
      age: 32,
      address: 'New York No. 1 Lake Park',
      image: 'https://cdn.pixabay.com/photo/2020/04/07/17/01/birds-5014150_1280.jpg',
    },
    {
      key: '2',
      name: 'Jim Green',
      quality: '1',
      age: 42,
      address: 'London No. 1 Lake Park',
      image: 'https://cdn.pixabay.com/photo/2022/10/24/14/41/blackbird-7543630_1280.jpg',
    },
    {
      key: '3',
      name: 'Joe Black',
      quality: '1',
      age: 32,
      address: 'Sydney No. 1 Lake Park',
      image: 'https://cdn.pixabay.com/photo/2018/03/08/18/40/bald-eagle-3209427_1280.jpg',
    },
    {
      key: '4',
      name: 'Joe Black',
      quality: '1',
      age: 32,
      address: 'Sydney No. 1 Lake Park',
      image: 'https://cdn.pixabay.com/photo/2016/11/14/19/20/kittens-1824367_1280.jpg',
    }
  ];

const CartPage = () => {
  return (
    <div className='main-cart animate__animated animate__jackInTheBox'>
      <Divider style={{ fontSize: '35px', color: 'red', borderColor: '#000DFF' }} orientation='center'>My Cart</Divider>
      <Table columns={columns} dataSource={data} size="middle" />
    </div>
  )
}

export default CartPage
