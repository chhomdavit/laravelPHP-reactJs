import React from 'react'
import Carousel from 'react-bootstrap/Carousel';
import './SliderCarousel.css'
import SliderCarousel_data from '../../data/SliderCarousel'

const SliderCarousel = () => {
  return (
      <div>
          <Carousel style={{ height: '400px',borderRadius: '5px'}}>
             {SliderCarousel_data.map(item =>{
                return(
                    <Carousel.Item interval={5000}>
                    <img
                        className="d-block"
                        style={{ width: '100%', height: '400px',borderRadius: '5px' }}
                        src={item.image}
                        alt="First slide"
                    />
                    <Carousel.Caption className='carousel-caption'>
                        <h2 className='animate__animated animate__bounceInDown'>{item.title}</h2>
                        <h5 className='animate__animated animate__bounceInRight animate__delay-1s'>{item.description}</h5>
                    </Carousel.Caption>
                </Carousel.Item>
                )
             })}
          </Carousel>
      </div>
  )
}

export default SliderCarousel
