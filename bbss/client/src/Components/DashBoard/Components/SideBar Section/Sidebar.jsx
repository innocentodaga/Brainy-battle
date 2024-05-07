import './sidebar.css'
import logo from '../../../../Assets/log.png'
import { IoMdSpeedometer } from 'react-icons/io'

const Sidebar = () => {
  return (
    <div className='sideBar grid'>
      
      <div className="logoDiv">
        <img src={logo} alt="Image Name" />
        <h2>Brainy Battle System</h2>
      </div>  

      <div className="menuDiv">
        <h3 className='divTitle'>
           QUIK MENU
        </h3>
        <ul className="menuList grid">
          <li className="listItem">
            <a href="#" className='menuLink flex'>
              <IoMdSpeedometer className='icon'/>
            </a>
          </li>
        </ul>
      </div>    
    </div>
  )
}

export default Sidebar
