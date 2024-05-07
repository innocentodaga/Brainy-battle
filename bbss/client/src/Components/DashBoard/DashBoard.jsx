import './DashBoard.css'
import Sidebar from './Components/SideBar Section/Sidebar'
import Body from './Components/Body Section/Body'

const DashBoard = () => {
  return (
    <div className='dashboardPage flex'>
      <div className="container flex">
        <Sidebar/>
        <Body/>
      </div>
    </div>
  )
}

export default DashBoard
