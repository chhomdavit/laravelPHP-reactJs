import React from 'react'
import Button from 'react-bootstrap/Button';
import Card from 'react-bootstrap/Card';
import "./CardUnderSlider.css"
import { Col, Divider, Row } from 'antd';

const CardUnderSlider = () => {
  return (
    <Row gutter={[5,5]}>
      <Divider style={{color:'red',borderColor:'#000DFF'}} orientation="left">សេវាកម្មនានា</Divider>
      <Col xs={24} sm={24} md={12} lg={6}>
        <Card className='cardUnderSlider animate__animated animate__bounceInRight'>
          <Card.Img className='cardUnderSlider-img' variant="top" src="https://p.kindpng.com/picc/s/720-7200246_delivery-logistics-hd-png-download.png" />
          <Card.Body>
            <Card.Title>ផ្នែកដឹកតាមខេត្ត</Card.Title>
            <Card.Text>
              Some quick example text to build on the card title 
            </Card.Text>
            <Button variant="outline-secondary">View More</Button>
          </Card.Body>
        </Card>
      </Col>
      <Col xs={24} sm={24} md={12} lg={6}>
        <Card className='cardUnderSlider animate__animated animate__bounceInRight'>
          <Card.Img className='cardUnderSlider-img' variant="top" src="https://www.kindpng.com/picc/m/64-649940_logistics-courier-service-delivery-motorcycle-man-clipart-delivery.png" />
          <Card.Body>
            <Card.Title>ផ្នែកដឹកក្នុងក្រុង</Card.Title>
            <Card.Text>
              Some quick example text to build on the card title 
            </Card.Text>
            <Button variant="outline-secondary">View More</Button>
          </Card.Body>
        </Card>
      </Col>
      <Col xs={24} sm={24} md={12} lg={6}>
        <Card className='cardUnderSlider animate__animated animate__bounceInRight'>
          <Card.Img className='cardUnderSlider-img' variant="top" src="https://p.kindpng.com/picc/s/47-479448_payment-method-payments-icon-hd-png-download.png" />
          <Card.Body>
            <Card.Title>ផ្នែកទូទាត់លុយ</Card.Title>
            <Card.Text>
              Some quick example text to build on the card title 
            </Card.Text>
            <Button variant="outline-secondary">View More</Button>
          </Card.Body>
        </Card>
      </Col>
      <Col xs={24} sm={24} md={12} lg={6}>
        <Card className='cardUnderSlider animate__animated animate__bounceInRight'>
          <Card.Img className='cardUnderSlider-img' variant="top" src="https://p.kindpng.com/picc/s/76-767038_alternative-dispute-resolution-methods-in-india-hd-png.png" />
          <Card.Body>
            <Card.Title>ផ្នែកទំនាក់ទំនង</Card.Title>
            <Card.Text>
              Some quick example text to build on the card title 
            </Card.Text>
            <Button variant="outline-secondary">View More</Button>
          </Card.Body>
        </Card>
      </Col>
    </Row>
  )
}

export default CardUnderSlider
