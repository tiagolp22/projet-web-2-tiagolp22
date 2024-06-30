import React from 'react';
import { render, screen } from '@testing-library/react';
import '@testing-library/jest-dom';
import Home from '../../js/Pages/Home/Home';

test('renders Home', () => {
    render(<Home />);
    const element = screen.getByText(/Bienvenue sur le site de vente de véhicules d'occasion/i);
    expect(element).toBeInTheDocument();
  });
