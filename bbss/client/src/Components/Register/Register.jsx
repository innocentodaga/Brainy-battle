import './Register.css'
import { Link } from 'react-router-dom'
import '../../App.css'

//import the assets
import video from '../../LoginAssets/vid.mp4'
import logo from '../../LoginAssets/log.png'

//import icons
import { FaUserShield } from "react-icons/fa";
import { MdMarkEmailRead } from "react-icons/md";
import { IoShieldCheckmarkSharp } from "react-icons/io5";
import { AiOutlineSwapRight } from "react-icons/ai";




const Register = () => {
  return (
    <div className='registerPage flex'>
      <div className="container flex">
        <div className="videoDiv">
          <video src={video} autoPlay muted loop></video>
          <div className="textDiv">
            <h2 className='title'>Play, Learn and Excell ExtraOrdinarily</h2>
            <p>Brainy Battle System</p>
          </div>

          <div className="footerDiv flex">
            <span className="text"> Already Have an account?</span>
            <Link to ={'/'}>
              <button className='btn'>Login</button>
            </Link>
          </div>
        </div>
        <div className="formDiv flex">
          <div className="headerDiv">
            <img src={logo} alt="Logo Image" />
            <h3>Let Us Know You!</h3>
          </div>

          <form action="" className='form grid'>           
            <div className="inputDiv">
              <label htmlFor="email">Email</label>
              <div className="input flex">
                <MdMarkEmailRead className='icon'/>
                <input type="email" id='email' placeholder='Enter Email' />
              </div>
            </div>

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

            <button type='submit' className='btn flex'>
              <span>Sign Up</span>
              <AiOutlineSwapRight className='icon'/>
            </button>
          </form>
        </div>
      </div>
    </div>

  )
}

export default Register
