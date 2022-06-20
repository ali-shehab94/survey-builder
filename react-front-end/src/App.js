import './App.css';
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import { useState, useEffect } from 'react';
import Header from './components/Header';
import SignInCard from './components/SignInCard';
import Surveys from './components/Surveys';
import SurveysContainer from './components/SurveysContainer';
function App() {
  return (
    <BrowserRouter>
      <Routes>
        <Route
          path='/'
          element={
            <div className='body'>
              <div>
                <Header text='Welcome' />
                <div className='signin-signup'>
                  <SignInCard />
                </div>
              </div>
            </div>
          }
        ></Route>
        <Route
          path='/homepage'
          element={
            <div className='body'>
              <div>
                <Header text='Choose a Survey' />
                <SurveysContainer />
                <Surveys surveys={surveys} />
              </div>
            </div>
          }
        ></Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
