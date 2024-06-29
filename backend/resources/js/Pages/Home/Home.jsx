import React from 'react';
import Slider from 'react-slick';
import { InertiaLink } from '@inertiajs/inertia-react';
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

  return (<>
  <Header /> 
    <div className="wrapper">
      <div className="container mx-auto px-4 py-8">
        {/* Banner Section */}
        <div className="banner bg-blue-500 text-white p-8 flex flex-col items-center">
          <h1 className="text-4xl font-bold mb-4">Bem-vindo ao VEHICULES D'OCCASION INC.</h1>
          <p className="text-lg mb-6">Encontre o carro usado perfeito para você.</p>
          <InertiaLink href="/catalog" className="bg-white text-blue-500 px-4 py-2 rounded hover:bg-gray-200">
            Ver Catálogo
          </InertiaLink>
        </div>
        {/* Carousel Section */}
        <div className="carousel mt-8">
          <h2 className="text-2xl font-bold mb-4">Novidades</h2>
          <Slider {...settings}>
            <div className="w-64 bg-white shadow-md rounded-lg p-4">
              <img src="https://via.placeholder.com/150" alt="Car" className="" />
              <h3 className="text-lg font-bold">Carro 1</h3>
              <p className="text-sm text-gray-600">Descrição do carro 1.</p>
            </div>
            <div className="w-64 bg-white shadow-md rounded-lg p-4">
              <img src="https://via.placeholder.com/150" alt="Car" className="" />
              <h3 className="text-lg font-bold">Carro 2</h3>
              <p className="">Descrição do carro 2.</p>
            </div>
            <div className="">
              <img src="https://via.placeholder.com/150" alt="Car" className="" />
              <h3 className="text-lg font-bold">Carro 3</h3>
              <p className="text-sm text-gray-600">Descrição do carro 3.</p>
            </div>
      
          </Slider>
        </div>
      </div>
    </div>
    </>
  );
}

export default Home;
