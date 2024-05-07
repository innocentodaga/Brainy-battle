import './Login.css'
import { Link } from 'react-router-dom'
import '../../App.css'

//import the assets
import video from '../../LoginAssets/vid.mp4'
import logo from '../../LoginAssets/log.png'

//import icons
import { FaUserShield } from "react-icons/fa";
import { IoShieldCheckmarkSharp } from "react-icons/io5";
import { AiOutlineSwapRight } from "react-icons/ai";




const Login = () => {
  return (
    <div className='loginPage flex'>
      <div className="container flex">
        <div className="videoDiv">
          <video src={video} autoPlay muted loop></video>
          <div className="textDiv">
            <h2 className='title'>Play, Learn and Excell ExtraOrdinarily</h2>
            <p>Brainy Battle System</p>
          </div>

          <div className="footerDiv flex">
            <span className="text"> Don`t Have an account?</span>
            <Link to ={'/register'}>
              <button className='btn'>Sign Up</button>
            </Link>
          </div>
        </div>
        <div className="formDiv flex">
          <div className="headerDiv">
            <img src={logo} alt="Logo Image" />
            <h3>Welcome Back</h3>
          </div>

          <form action="" className='form grid'>
            {/* <span className='showMessage'>Login Status will go here</span> */}
            <div className="inputDiv">
              <label htmlFor="username">Username</label>
              <div className="input flex">
                <FaUserShield className='icon'/>
                <input type="text" id='username' placeholder='Enter Username' />
              </div>
            </div>
            <div className="inputDiv">
              <label htmlFor="password">Password</label>
              <div className="input flex">
                <IoShieldCheckmarkSharp className='icon'/>
                <input type="password" id='password' placeholder='Enter Password' />
              </div>
            </div>
            <Link to ={'/dashboard'}>
            <button type='submit' className='btn flex'>
              <span>Login</span>
              <AiOutlineSwapRight className='icon'/>
            </button>            </Link>
            <span className='forgotPassword'>
              Forgot your Password? <a href="">Click Here</a>
            </span>
          </form>
        </div>
      </div>
    </div>

  )
}

export default Login
