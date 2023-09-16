import { useEffect } from "react";
import {BrowserRouter,Routes,Route, Navigate } from "react-router-dom";
import 'bootstrap/dist/css/bootstrap.min.css';
import 'animate.css';
import './App.css';

// Admin part
import Login from "./admin-page/auth/Login";
import Home from "./admin-page/Home/Home";
import Product from "./admin-page/Product/Product";

//Layout part
import Dashboard from "./component/Dashboard/Dashboard";
import RootLayout from "./component/RootLayout/RootLayout";

// Page part
import HomePage from "./page/Homepage/HomePage";
import ProductPage from "./page/ProductPage/ProductPage";
import NotFoundPage from "./page/NotFoundPage/NotFoundPage";
import ProfilePage from "./page/ProfilePage/ProfilePage";
import CartPage from "./page/CartPage/CartPage";
import ProductDetailPage from "./page/ProductDetailPage/ProductDetailPage";


function App() {
  const isLogin = localStorage.getItem("is_login") === "1";

  useEffect(() => {
    console.log(window.location.pathname)
  }, [window.location.pathname])

  const is_dashboard = window.location.pathname.includes("dashboard")
  return (
    <BrowserRouter basename="/">
      {/* page part */}
      {!is_dashboard && <Routes>
        <Route path="/" element={<RootLayout />}>
          <Route index element={<HomePage />} />
          <Route path="product-page" element={<ProductPage />} />
          <Route path="product-page/:productId" element={<ProductDetailPage />} />
          <Route path="profile-page" element={<ProfilePage />} />
          <Route path="cart-page" element={<CartPage />} />
          <Route path="*" element={<NotFoundPage />} />
        </Route>
      </Routes>
      }

      {is_dashboard &&
        <div>
          {!isLogin ? (
            // admin part
            <Routes>
              <Route path="dashboard" element={<Login />}>
                <Route path="*" element={<Navigate to="/dashboard/login" />} />
                <Route path='login' element={<Login />} />
              </Route>
            </Routes>
          ) : (
              <Dashboard>
                <Routes>
                  <Route path="dashboard" >
                    <Route index element={<Home />} />
                    <Route path="product" element={<Product />} />
                    <Route path="*" element={<NotFoundPage />} />
                  </Route>
                </Routes>
              </Dashboard>
            )
          }
        </div>
      }
    </BrowserRouter>
  );
}

export default App;
