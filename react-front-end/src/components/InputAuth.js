const InputAuth = (props) => {
  return (
    <>
      <input
        onChange={props.onChange}
        className='input-auth'
        type={props.type}
        placeholder={props.placeholderText}
      />
    </>
  );
};

export default InputAuth;
