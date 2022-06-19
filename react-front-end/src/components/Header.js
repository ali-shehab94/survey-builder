import Profile from './Profile';
import Logo from './Logo';

const Header = (props) => {
  return (
    <div className='header'>
      <Profile />
      <h1>{props.text}</h1>
      <Logo />
    </div>
  );
};

export default Header;
