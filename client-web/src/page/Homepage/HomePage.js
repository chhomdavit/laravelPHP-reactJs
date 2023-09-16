import React from 'react';
import { Col, Divider, Row } from 'antd';
import SliderCarousel from '../../component/SliderCarousel/SliderCarousel';
import EventAnother from '../../component/EventAnother/EventAnother';
import CardUnderSlider from '../../component/CardUnderSlider/CardUnderSlider';
import Product from '../../component/Product/Product';
import InputSearch from '../../component/InputSearch/InputSearch';
import Category from '../../component/Category/Category';
import Advertising from '../../component/Advertising/Advertising';
import MarqueeAnnounce from '../../component/MarqueeAnnounce/MarqueeAnnounce';

const HomePage = () => {
  return (
    <div className="container">
      <Row gutter={[8, 8]}>
            <Col xs={24} sm={24} md={15} lg={15}>
              <SliderCarousel/>
            </Col>
            <Col xs={24} sm={24} md={9} lg={9}>
              <EventAnother/>
            </Col>
            <Col xs={24} sm={24} md={24} lg={24}>
              <CardUnderSlider/>
            </Col>
            <Divider style={{color:'red',borderColor:'#000DFF'}} orientation="left">ផលិតផល</Divider>
            <Col xs={24} sm={24} md={24} lg={24}><InputSearch/></Col>
            <Col xs={24} sm={24} md={5} lg={5}><Category/></Col>
            <Col xs={24} sm={24} md={14} lg={14}><Product/></Col>
            <Col xs={24} sm={24} md={5} lg={5}><Advertising/></Col>
            <Divider style={{color:'red',borderColor:'#000DFF'}} orientation="left">Main Sponser</Divider>
            <Col span={24}><MarqueeAnnounce/></Col>
          </Row>
    </div>
  )
}

export default HomePage;
