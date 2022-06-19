import './App.css';
import { BrowserRouter, Route, Routes } from 'react-router-dom';
import Header from './components/Header';
import SignInCard from './components/SignInCard';
import Surveys from './components/Surveys';
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
        <Route path='/homepage' element={<Surveys />}></Route>
      </Routes>
    </BrowserRouter>
  );
}

export default App;
