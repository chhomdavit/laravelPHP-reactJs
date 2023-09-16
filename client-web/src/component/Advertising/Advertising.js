import { Divider,Space } from 'antd';
import Col from 'react-bootstrap/Col';
import Image from 'react-bootstrap/Image';
import Row from 'react-bootstrap/Row';

const Advertising = () => {
  return (
    <Row>
        <Space direction="vertical">
        <Col xs={24} md={24}>
      <Image src="https://cdn.pixabay.com/photo/2015/06/12/18/51/animal-807318_1280.png" rounded />
    </Col>
    <Col xs={24} md={24}>
      <Image src="https://cdn.pixabay.com/photo/2014/10/03/12/34/giraffe-471550_1280.png" rounded />
    </Col>
        </Space>
  </Row>
  )
}

export default Advertising
