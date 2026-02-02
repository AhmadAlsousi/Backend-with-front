import React from 'react'
import { Route, Routes } from 'react-router-dom'



import 'bootstrap/dist/css/bootstrap.min.css';
import Home from './Component/Home';



const App = () => {
  return (
   <>
 
   <Routes>
    
      <Route path='/' element={<Home/>} />
   </Routes>
 
   </>
  )
}

export default App