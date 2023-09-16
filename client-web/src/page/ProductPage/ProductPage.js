import { Col, Divider, Row } from 'antd';
import Product from '../../component/Product/Product';
import InputSearch from '../../component/InputSearch/InputSearch';
import Category from '../../component/Category/Category';
import Advertising from '../../component/Advertising/Advertising';

const ProductPage = () => {
  return (
    <div className="container">
      <Row gutter={[8, 8]}>
            <Divider style={{color:'red',borderColor:'#000DFF'}} orientation="left">ផលិតផល</Divider>
            <Col xs={24} sm={24} md={24} lg={24}><InputSearch/></Col>
            <Col xs={24} sm={24} md={4} lg={4}><Category/></Col>
            <Col xs={24} sm={24} md={16} lg={16}><Product/></Col>
            <Col xs={24} sm={24} md={4} lg={4}><Advertising/></Col>
          </Row>
    </div>
  )
}

export default ProductPage
