import React from "react";
export const Login = () => {
  const initialState = {
    email: "",
    password: "",
    isSubmitting: false,
    errorMessage: null
  };
const [data,setDate] = React.useState(initialState);
const handleInputChange = (e) => {
  setDate({
    ...data,
    [e.target.name]:e.target.value
  });
  console.log(data)
}
return (
    <div className="login-container" style={{marginTop: 100}}>
      {JSON.stringify(data)}
      <div className="card">
        <div className="container">
          <form>
            <h1>Login</h1>
			
    		<label htmlFor="email">
              Email Address
              <input
                type="text"
                name="email"
                id="email"
                value={data.value}
                onChange={handleInputChange}
              />
            </label>
			
    		<label htmlFor="password">
              Password
              <input
                type="password"
                name="password"
                id="password"
                value={data.password}
                onChange={handleInputChange}
              />
            </label>
			
    		<button>
                "Login"
            </button>
          
    	  </form>
        </div>
      </div>
    </div>
  );
};
export default Login;