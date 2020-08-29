<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login</title>
		<link rel="stylesheet" href="{{ asset('asset/css/login.css') }}">
	</head>
	<body>
		<div class="loginform">
      <a class="logo" href="../Home/">EduBee</a>
			<h1>Login</h1>
			<hr class="line">
			<form action="" method="POST" onsubmit="return validate()">
					<input type="text" name="userid" id="userid" placeholder="User Id" required>
					<span id="err"></span>
					<input type="password" name="password" id="password" placeholder="Password" required>
					<span id="error"></span>
					<input type="submit" name = "submit" value="Login">
			</form>
		</div>
	</body>
</html>


<script>
var userid = document.querySelector('#userid');

userid.addEventListener("keyup", function(){
	if(userid.value.length == 0 || userid.value.length < 5)
	{
		userid.style.border = '2px solid red';
	}else{
		userid.style.border = '2px solid green';
	}
})

var password = document.querySelector('#password');

password.addEventListener('keyup', function(){
	if(password.value.length == 0 || password.value.length < 5)
	{
		password.style.border = '2px solid red';
	}else{
		password.style.border = '2px solid green';
	}
})


function validate(){
	if(userid.value.length == 0 || userid.value.length < 5)
	{
		document.getElementById('err').innerHTML = "Invalid User id";
		return false;
	}else if(password.value.length == 0 || password.value.length < 5){
		document.getElementById('error').innerHTML = "Invalid Password";
		return false;
	}
}
</script>
