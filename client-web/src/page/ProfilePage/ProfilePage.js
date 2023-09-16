import React, { useState } from 'react';
import { Col, Divider, Row, Avatar, Typography, Button, Modal, Form, Input } from 'antd';
import { CheckCircleTwoTone, UserOutlined } from '@ant-design/icons';
import './ProfilePage.css'
const { Text} = Typography;

const ProfilePage = () => {
    const [isModalOpen, setIsModalOpen] = useState(false);
    const showModal = () => {
      setIsModalOpen(true);
    };
    const handleOk = () => {
      setIsModalOpen(false);
    };
    const handleCancel = () => {
      setIsModalOpen(false);
    };
    const onFinish = () => {
        alert('Save')
    }
  return (
      <div>
          <Row gutter={[16, 16]} className='animate__animated animate__lightSpeedInRight'>
              <Col xs={24} sm={24} md={10} lg={10} className='left-profile'>
                  <Avatar src='https://cdn.pixabay.com/photo/2022/01/18/07/36/cat-6946498_1280.jpg' size={150} icon={<UserOutlined />} />
                  <Text style={{ fontSize:'30px',color:'#000DFF' }}>Mr.Chen Dawei <CheckCircleTwoTone twoToneColor="#52c41a" /></Text>
              </Col>
              <div className="vl"></div>
              <Col xs={24} sm={24} md={14} lg={13} className='right-profile'>
                  <Divider style={{ fontSize: '35px', color: 'red', borderColor: '#000DFF' }} orientation='center'>My Profile</Divider>
                  <Row gutter={[8, 8]}>
                      <Col xs={24} sm={24} md={12} lg={12}>
                          NAME : Chen Dawei
                          <Divider style={{ fontSize: '35px', color: 'red', borderColor: '#000DFF' }} />
                      </Col>
                      <Col xs={24} sm={24} md={12} lg={12}>
                          GMAIL : Chen@yahoo.com
                          <Divider style={{ fontSize: '35px', color: 'red', borderColor: '#000DFF' }} />
                      </Col>
                      <Col xs={24} sm={24} md={12} lg={12}>
                          GENDER : Male
                          <Divider style={{ fontSize: '35px', color: 'red', borderColor: '#000DFF' }} />
                      </Col>
                      <Col xs={24} sm={24} md={12} lg={12}>
                          PHONE : 012 34 92 11
                          <Divider style={{ fontSize: '35px', color: 'red', borderColor: '#000DFF' }} />
                      </Col>
                      <Col xs={24} sm={24} md={12} lg={12}>
                          LOCATION : phnom penh
                          <Divider style={{ fontSize: '35px', color: 'red', borderColor: '#000DFF' }} />
                      </Col>
                      <Col xs={24} sm={24} md={12} lg={12}>
                          AGE : 34
                          <Divider style={{ fontSize: '35px', color: 'red', borderColor: '#000DFF' }} />
                      </Col>
                      <Col xs={24} sm={24} md={24} lg={24}>
                          <Button type="primary" onClick={showModal}>Profile Edit</Button>
                          <Divider style={{ fontSize: '35px', color: 'red', borderColor: '#000DFF' }} />
                          <Modal title="Profile Edit" open={isModalOpen} onOk={handleOk} onCancel={handleCancel}>
                              <Form name="form_item_path" layout="vertical" onFinish={onFinish}>
                                  <Form.Item
                                      name="name"
                                      label="Name"
                                      rules={[
                                          {
                                              required: true,
                                          },
                                      ]}
                                  >
                                      <Input />
                                  </Form.Item>
                                  <Form.Item
                                      name="gmail"
                                      label="Gmail"
                                      rules={[
                                          {
                                              required: true,
                                          },
                                      ]}
                                  >
                                      <Input />
                                  </Form.Item>
                                  <Button type="primary" htmlType="submit">
                                      Submit
                                  </Button>
                              </Form>
                          </Modal>
                      </Col>
                  </Row>
              </Col>
          </Row>
      </div>
  )
}

export default ProfilePage
