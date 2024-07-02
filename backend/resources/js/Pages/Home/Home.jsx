import React from 'react';
import Slider from 'react-slick';
import { InertiaLink } from '@inertiajs/inertia-react';
import './Home.css';
import Header from '../Header/Header';
import Footer from '../Footer/Footer';

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
          {/* Section de la bannière */}
          <img src="../../../img/banner/banner.jpg" alt="bannière" srcset="" />
          <div className="banner">
            <h1>Quebecar.</h1>
            <InertiaLink href="/catalog" className="catalog-link">
              Voir le catalogue
            </InertiaLink>
          </div>
          {/* Section du carrousel */}
          <div className="carousel">
            <h2>Nouveautés</h2>
            <Slider {...settings}>
              <div className="slide">
                <img src="https://via.placeholder.com/150" alt="Voiture" />
                <h3>Voiture 1</h3>
                <p>Description de la voiture 1.</p>
              </div>
              <div className="slide">
                <img src="https://via.placeholder.com/150" alt="Voiture" />
                <h3>Voiture 2</h3>
                <p>Description de la voiture 2.</p>
              </div>
              <div className="slide">
                <img src="https://via.placeholder.com/150" alt="Voiture" />
                <h3>Voiture 3</h3>
                <p>Description de la voiture 3.</p>
              </div>
            </Slider>
          </div>
        </div>
      </div>
      <Footer />
    </>
  );
}

export default Home;
