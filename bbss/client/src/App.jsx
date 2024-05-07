import './App.css'
import Login from './Components/Login/Login'
import DashBoard from './Components/DashBoard/DashBoard'
import Register from './Components/Register/Register'


//import react router dom
import{
  createBrowserRouter,
  RouterProvider
} from 'react-router-dom';

//create a router

const router = createBrowserRouter([
  {
    path:'/',
    element: <div><Login/></div>
  },
  {
    path:'/register',
    element: <div><Register/></div>
  },
  {
    path:'/dashboard',
    element: <div><DashBoard/></div>
  },
  
])

function App() {
  return (
    <div>
      <RouterProvider router = {router}/>
    </div>
  )
}

export default App
