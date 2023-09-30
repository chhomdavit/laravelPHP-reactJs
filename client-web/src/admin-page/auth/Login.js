/* eslint-disable jsx-a11y/anchor-is-valid */
import React, { useState } from "react";
import { request } from "../../util/api";
import { Button, Form, message, Input} from "antd";
import { LockOutlined, UserOutlined } from "@ant-design/icons";
import "./Login.css";

const Login = () => {
  const [loading,setLoading] = useState(false)
  const onFinish = (fields) => {
    var params = {
      email: fields.email,
      password: fields.password,
    };
    setLoading(true)
    request("post", "login", params).then((res) => {
      console.log(res)
      return false
      setTimeout(() => {
        setLoading(false)
      }, 1000);
      
      if (res.data && res.data.is_login) {
        localStorage.setItem("is_login", "1");
        localStorage.setItem("profile", JSON.stringify(res.data.profile));
        window.location.href = "/dashboard";
      } else {
        message.warning(res.data.message);
      }
    });
  };
  return (
    <div className="loging-form">
    <h1>Login</h1>
    <Form
      name="normal_login"
      className="login-form"
      initialValues={{
        remember: false,
      }}
      onFinish={onFinish}
    >
      <Form.Item
        name="user_email"
        rules={[
          {
            required: true,
            message: "Please input your user_email!",
          },
        ]}
      >
        <Input prefix={<UserOutlined />} placeholder="user_email" />
      </Form.Item>

      <Form.Item
        name="password"
        rules={[
          {
            required: true,
            message: "Please input your Password!",
          },
        ]}
      >
        <Input
          prefix={<LockOutlined />}
          type="password"
          placeholder="Password"
        />
      </Form.Item>

      <div className="login-form-forgot">
        <a href="">Forgot password</a>
      </div>

      <Form.Item>
        <Button
          type="primary"
          htmlType="submit"
          className="login-form-button"
          loading={loading}
        >
          Log in
        </Button>
        <div>
          Or <a href="">register now!</a>
        </div>
      </Form.Item>
    </Form>
  </div>
  )
}

export default Login;
