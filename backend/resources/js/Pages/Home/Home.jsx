import React from 'react';
import Slider from 'react-slick';
import { InertiaLink } from '@inertiajs/inertia-react';
import './Home.css';
import Header from '../Header/Header';

function Home() {
  const settings = {
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 3,
    slidesToScroll: 1,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
          infinite: true,
          dots: true,
        },
      },
      {
        breakpoint: 600,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  };

  return (
    <>
      <Header />
      <div className="wrapper">
        <div className="container">
          {/* Seção do Banner */}
          <img src="../../../img/banner/banner.jpg" alt="banner" srcset="" />
          <div className="banner">
            <h1>Quebecar.</h1>
            
            <InertiaLink href="/catalog" className="catalog-link">
              Ver Catálogo
            </InertiaLink>
          </div>
          {/* Seção do Carrossel */}
          <div className="carousel">
            <h2>Novidades</h2>
            <Slider {...settings}>
              <div className="slide">
                <img src="https://via.placeholder.com/150" alt="Car" />
                <h3>Carro 1</h3>
                <p>Descrição do carro 1.</p>
              </div>
              <div className="slide">
                <img src="https://via.placeholder.com/150" alt="Car" />
                <h3>Carro 2</h3>
                <p>Descrição do carro 2.</p>
              </div>
              <div className="slide">
                <img src="https://via.placeholder.com/150" alt="Car" />
                <h3>Carro 3</h3>
                <p>Descrição do carro 3.</p>
              </div>
            </Slider>
          </div>
        </div>
      </div>
    </>
  );
}

export default Home;
