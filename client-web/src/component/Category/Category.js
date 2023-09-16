import React from 'react'
import ListGroup from 'react-bootstrap/ListGroup';

const Category = () => {
  return (
      <div>
          <ListGroup as="ul">
              <ListGroup.Item as="li" active style={{ backgroundColor:'#000DFF' }}>
                  Category List
              </ListGroup.Item>
              <ListGroup.Item action variant="secondary" as="li">Category one</ListGroup.Item>
              <ListGroup.Item action variant="secondary" as="li">Category two</ListGroup.Item>
              <ListGroup.Item action variant="secondary" as="li">Category three</ListGroup.Item>
          </ListGroup>
      </div>
  )
}

export default Category
