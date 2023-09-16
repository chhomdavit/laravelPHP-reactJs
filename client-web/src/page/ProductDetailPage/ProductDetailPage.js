import { Link, useParams } from 'react-router-dom'; 
import Products from '../../data/ProductDate'; 
import './ProductDetailPage.css'

const ProductDetail = () => {
  const {productId} = useParams()
  const product = Products.find((product) => product.id === Number(productId));

  return (
    <div className="product-detail">
       <h1>Product Detail</h1>
       <img src={product.image} alt={product.image} />
       <h2>{product.price} $</h2>
       <h3>{product.title}</h3>
       <h4>{product.text}</h4>
       <Link to='/product-page'>back to product</Link>
    </div>
  )
}

export default ProductDetail; 
