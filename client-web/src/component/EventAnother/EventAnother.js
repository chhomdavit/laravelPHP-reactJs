import React from 'react'
import './EventAnother.css'
import { Col, Row} from 'antd';
import Card from 'react-bootstrap/Card';
import EventAnother_data from '../../data/EventAnother'

const EventAnother = () => {
  return (
    <>
    <Row className='event-row'>
      {EventAnother_data.map(item => {
        return (
          <Col
            className='event-col animate__animated animate__flipInY'
            style={{ marginTop: '0' }} xs={24} sm={11} md={11} lg={11}
          >
            <Card className="text-white">
              <Card.Img style={{ height: '125px' }} src={item.image} alt="Card image" />
              <Card.ImgOverlay>
                <Card.Title>{item.title}</Card.Title>
                <Card.Text>{item.text}</Card.Text>
              </Card.ImgOverlay>
            </Card>
          </Col>
        )
      })}
    </Row>
    </>
  )
}
export default EventAnother
