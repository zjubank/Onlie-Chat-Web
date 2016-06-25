<!DOCTYPE html>
<html lang="zh-cn">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>登录</title>

	<!-- Bootstrap -->
	<link href="./css/bootstrap.css" rel="stylesheet">
	<link rel="stylesheet" href="./css/bootstrap-theme.css">
	<link href="./css/signin.css" rel="stylesheet">

</head>

<body>
	<div class="container">

	 <form class="form-signin" role="form" action="logincheck.php" method="post">
		 <h2 class="form-signin-heading">Please sign in</h2>
		 <label for="inputEmail" class="sr-only">Email address</label>
		 <input type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
		 <label for="inputPassword" class="sr-only">Password</label>
		 <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
		 <div class="checkbox">
			 <label>
				 <input type="checkbox" value="remember-me"> Remember me
			 </label>
		 </div>
		 <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
	 </form>

 </div>
 <!-- <script src="./js/ie10-viewport-bug-workaround.js"></script> -->
</body>

</html>
