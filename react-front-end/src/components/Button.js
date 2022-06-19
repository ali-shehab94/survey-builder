const SIZES = ['btn--auth', 'btn--submit'];

const Button = (props) => {
  return (
    <button className='btn' onClick={props.onClick}>
      {props.children}
    </button>
  );
};

export default Button;
