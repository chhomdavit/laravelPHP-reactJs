import { NavLink, useNavigate } from "react-router-dom";
import {Tag,Affix, Button, Drawer,Avatar,Tooltip,Dropdown, Modal, Form, Input, message, Badge} from 'antd';
import React, { useEffect, useState } from 'react';
import './Navbar.css'
import {request} from "../../util/api";
import{Config} from '../../util/service'

import {
  FacebookFilled,
  TwitterSquareFilled,
  MenuOutlined,
  LoginOutlined,
  UserOutlined,
  LockOutlined,
  SmileTwoTone,
  HomeOutlined,
  InboxOutlined,
  ContactsOutlined,
  FileDoneOutlined,
  LogoutOutlined,
  ShoppingCartOutlined,
} from '@ant-design/icons';


const Navbar = () => {

  const [setCount] = useState(0)
  const [setListCart] = useState([]);
  const [open, setOpen] = useState(false);
  const [isModalOpen, setIsModalOpen] = useState(false);



  const showDrawer = () => {
    setOpen(true);
  };
  const onClose = () => {
    setOpen(false);
  };

  const navigate = useNavigate();
  const isLogin = localStorage.getItem('is_loginCustomer')  === "1"

  useEffect(()=>{
    if(!isLogin){
      navigate('/')
    }
    getListCart()
  },[])

  const getListCart = () =>{
    request('get','customerUser/getCart',{}).then(res=>{
     if(res.status === 200){
        var data = res.data
        setListCart(data.cart)
        setCount(data.cart.length)
     }
    })
  }
  const showModal = () => {
    setIsModalOpen(true);
  };
  const handleCancel = () =>{
    setIsModalOpen(false);
  }
  const handleCustomerLogout = () =>{
    localStorage.setItem('is_loginCustomer','0')
    localStorage.removeItem('tokenCustomer')
    window.location.href = '/'
  }

  const customeUser = [
    {
      key: '1',
      label: (
        <NavLink  rel="" href="/">
          Loing
        </NavLink>
      ),
      icon : <LoginOutlined />,
      onClick: showModal
    },
    {
      key: '2',
      label: (
        <NavLink  rel="" href="/">
          Logout
        </NavLink>
      ),
      icon : <LogoutOutlined />,
      onClick : handleCustomerLogout
    }
  ];
  

  const onFinish = (fields) =>{
    var params = {
      tel : fields.tel,
      password : fields.password
    }
    request('post','customerUser/login',params).then((res)=>{
      if(res.data && res.data.is_loginCustomer){
        localStorage.setItem('is_loginCustomer','1');
        localStorage.setItem('profileCustomer',JSON.stringify(res.data.profileCustomer));
        localStorage.setItem("tokenCustomer",res.data.tokenCustomer);
        window.location.href = '/'
      } else {
        message.warning(res.data.message)
      }
    })
  }
  
  

  const profileCustomer = JSON.parse(localStorage.getItem('profileCustomer'))
  
  return (
    <div className="container">
      <div className='topBar'>
        <div className='contactInfo'>
        
        </div>
        <div className='otherInfo'>
          <ul className='socialMedia'>
            <li style={{ color:'white' }}>
              <Dropdown menu={{ items: customeUser }} style={{ width: 250 }}>
                <Avatar  
                  src={ !isLogin?(<div style={{ backgroundColor:'#f5f5f5' }}><SmileTwoTone/></div>)
                  :
                  (Config.imagePath + profileCustomer.image_customer_user)} />
              </Dropdown> <Tag color="green"> Hi ! Chhom Davit</Tag> {!isLogin ? (<div></div>) : (profileCustomer.name) }
            </li>
            <li><NavLink style={{ fontSize:'20px',color:'#f5f5f5' }} href='#'><FacebookFilled /></NavLink></li>
            <li><NavLink style={{ fontSize:'20px',color:'#f5f5f5' }} href='#'><TwitterSquareFilled /></NavLink></li>
          </ul>
        </div>
      </div>
      <Affix offsetTop={0} onChange={(affixed) => console.log(affixed)}>
      <div className="header separator">
        <div className="logo animate__animated animate__bounce animate__delay-1s animate__repeat-2	2">
        <NavLink to="/">
          <img style={{ width:"60px", height:'60px' }} src={require("../../image/logo.png")} alt="image_logo"/>
        </NavLink>
        </div>
        <div className="mobileVisible">
          <Button style={{ border:'none',fontSize:'30px' }} onClick={showDrawer}>
          <MenuOutlined />
          </Button>
          <Drawer title="LOGO" placement="right" onClose={onClose} open={open}>
          <nav>
            <ul>
            <li><NavLink onClick={onClose} to="/"><HomeOutlined /> HOME</NavLink></li>
            <li><NavLink onClick={onClose} to="/product-page"><InboxOutlined /> PRODUCT</NavLink></li>  
            <li><NavLink onClick={onClose} to="/about-page"><FileDoneOutlined /> ABOUT</NavLink></li>
            <li><NavLink onClick={onClose} to="/contact-page"><ContactsOutlined /> CONTACT</NavLink></li>
            <li><NavLink onClick={onClose} to="/profile-page"><SmileTwoTone /> PROFILE</NavLink></li>
            <li><NavLink onClick={onClose} to="/cart-page"><ShoppingCartOutlined /> CART</NavLink></li>
            </ul>
          </nav>
          </Drawer>
        </div>
        <nav className="mobileHidden">
          <ul>
            <li><Tooltip title="Home"><NavLink to="/"><HomeOutlined /> HOME</NavLink></Tooltip></li>
            <li><Tooltip title="Product"><NavLink to="/product-page"><InboxOutlined /> PRODUCT</NavLink></Tooltip></li>
              <li>
                <NavLink to='/profile-page'>
                  <Tooltip title="PROFILE">
                    <Avatar style={{ backgroundColor:'#f5f5f5' }} size={54} icon={<SmileTwoTone />} />
                  </Tooltip>
                </NavLink>
              </li>
            <li><Tooltip title="About"><NavLink to="/about-page"><FileDoneOutlined /> ABOUT</NavLink></Tooltip></li>
            <li><Tooltip title="Contact"><NavLink to="/contact-page"><ContactsOutlined /> CONTACT</NavLink></Tooltip></li>
            <li><Tooltip title="Cart">
              <NavLink to="/cart-page">
                <Badge count={10}><Avatar style={{ backgroundColor:'#f5f5f5' }}><ShoppingCartOutlined style={{ color:'#000DFF' }} /></Avatar></Badge> CART
              </NavLink></Tooltip>
            </li>
          </ul>
        </nav>
      </div>
      </Affix>

      <Modal title="Login" open={isModalOpen} onCancel={handleCancel} footer={null}>
        <Form
          name="loginPage"
          initialValues={{ 
            remember: false,
           }}
           onFinish={onFinish}
        >
            <Form.Item
              name="tel"
              rules={[{
                required: true,
                message:'Please input your Telephone'
              }]}
            >
              <Input prefix={<UserOutlined/>} placeholder="Telephone" />
            </Form.Item>

            <Form.Item
              name="password"
              rules={[{
                required: true,
                message:'Please input your Password'
              }]}
            >
              <Input type="password" prefix={<LockOutlined/>} placeholder="Password" />
            </Form.Item>

            <Form.Item>
              <Button
              type="primary"
              htmlType="submit"
              >
                Login
              </Button>
            </Form.Item>

        </Form>
      </Modal>
  </div>
  )
}

export default Navbar;
