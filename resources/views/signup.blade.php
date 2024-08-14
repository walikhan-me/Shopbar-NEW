<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title> 
    <link rel="stylesheet" href="style.css">
   </head>
<body>
  <div class="wrapper">
    @if(session('success'))
    <div class="alert alert-success">
      {{session('success')}}
    </div>
    @endif

    @if (session('unsuccess'))
        <div class="alert alert-danger">
            {{ session('unsuccess') }}
        </div>
    @endif
    <h2>Registration</h2>
    <form action="{{route('register_user')}}" method='POST'>
        @csrf
      <div class="input-box">
        <input type="text" placeholder="Enter your name" name= 'username'  >
        @if ($errors->has('username'))
            <span class="text-danger">{{ $errors->first('username') }}</span>
        @endif
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your email" name= 'useremail'  >
        @if ($errors->has('useremail'))
            <span class="text-danger">{{ $errors->first('useremail') }}</span>
        @endif
      </div>
     
      <div class="input-box">
        <input type="password" placeholder="Create password" name= 'userpassword' >
        @if ($errors->has('userpassword'))
            <span class="text-danger">{{ $errors->first('userpassword') }}</span>
        @endif
    
      </div>
    

      <div class="input-box">
        <select id="role" name= 'userrole' >
            <option value="admin">Admin</option>
            <option value="user">Buyer</option>
        </select>
        @if ($errors->has('userrole'))
            <span class="text-danger">{{ $errors->first('userrole') }}</span>
        @endif
      </div>
      <div class="input-box">
        <input type="text" placeholder="Enter your City" name= 'usercity'  >
        @if ($errors->has('usercity'))
            <span class="text-danger">{{ $errors->first('usercity') }}</span>
        @endif 
      </div>

      <div class="input-box button">
        <input type="Submit" value="Register Now">
      </div>
      <div class="text">
        <h3>Already have an account? <a href="/login">Login now</a></h3>
      </div>
    </form>
  </div>
</body>

<style>
    @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: #4070f4;
}
.wrapper{
  position: relative;
  max-width: 430px;
  width: 100%;
  background: #fff;
  padding: 34px;
  border-radius: 6px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.2);
}
.wrapper h2{
  position: relative;
  font-size: 22px;
  font-weight: 600;
  color: #333;
}
.wrapper h2::before{
  content: '';
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 28px;
  border-radius: 12px;
  background: #4070f4;
}
.wrapper form{
  margin-top: 30px;
}
.wrapper form .input-box{
  height: 52px;
  margin: 18px 0;
}
form .input-box input{
  height: 100%;
  width: 100%;
  outline: none;
  padding: 0 15px;
  font-size: 17px;
  font-weight: 400;
  color: #333;
  border: 1.5px solid #C7BEBE;
  border-bottom-width: 2.5px;
  border-radius: 6px;
  transition: all 0.3s ease;
}
.input-box input:focus,
.input-box input:valid{
  border-color: #4070f4;
}
form .policy{
  display: flex;
  align-items: center;
}
form h3{
  color: #707070;
  font-size: 14px;
  font-weight: 500;
  margin-left: 10px;
}
.input-box.button input{
  color: #fff;
  letter-spacing: 1px;
  border: none;
  background: #4070f4;
  cursor: pointer;
}
.input-box.button input:hover{
  background: #0e4bf1;
}
form .text h3{
 color: #333;
 width: 100%;
 text-align: center;
}
form .text h3 a{
  color: #4070f4;
  text-decoration: none;
}
form .text h3 a:hover{
  text-decoration: underline;
}
</style>
</html>