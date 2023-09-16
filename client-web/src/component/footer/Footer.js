import "./Footer.css";
import { Col, Row } from 'antd';

const Footer = () => {
  return (
    <>
      <div className='main-footer'>
        <div className ='sub-footer'>
          <Row gutter={{
            xs: 8,
            sm: 16,
            md: 24,
            lg: 32,
          }}>
            <Col xs={24} sm={24} md={8} lg={8}>
              footer1
            </Col>
            <Col xs={24} sm={24} md={8} lg={8}>
              footer2
            </Col>
            <Col xs={24} sm={24} md={8} lg={8}>
              footer3
            </Col>
          </Row>
        </div>
      </div>
    </>
  )
}
export default Footer;
