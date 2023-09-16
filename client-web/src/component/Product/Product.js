import {useState} from 'react';
import { useNavigate } from 'react-router-dom';
import Card from 'react-bootstrap/Card';
import Col from 'react-bootstrap/Col';
import Row from 'react-bootstrap/Row';
// import Button from 'react-bootstrap/Button';
import ProductDate from '../../data/ProductDate'
import './Product.css'
import {Typography} from "antd";
const { Paragraph } = Typography;

const Product = () => {
  const navigate = useNavigate();

  const handleCardClick = (product) => {
    navigate(`/product-page/${product}`);

  }

  const [ellipsis] = useState(true);
  return (
    <Row xs={1} md={2} lg={3} className="g-2">
      {ProductDate.slice(0,6).map((product) => (
        <Col key={product}>
          <Card className='card-product animate__animated animate__bounceIn' onClick={() => handleCardClick(product.id)}>
            <Card.Img variant="top" src={product.image} />
            <Card.Body>
              <Card.Title>{product.title}</Card.Title>
              <Card.Text style={{ color: 'red' }}>Price : {product.price} $</Card.Text>
              <Card.Text>
                <Paragraph ellipsis={ellipsis ? { rows: 2, expandable: true, symbol: 'more' } : false}>
                  {product.text}
                </Paragraph>
              </Card.Text>
            </Card.Body>
          </Card>
        </Col>
      ))}
    </Row>
  )
}

export default Product;




