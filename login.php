<?php 

//require_once ('dbhelp.php');

  session_start();
  require_once ('dbhelp.php');
  if(isset($_POST['submit'])){
    $userName = $_POST['userName'];
    $passWord = $_POST['passWord'];
    unset($_POST);
    $sql = "SELECT id FROM users WHERE userName = '$userName' AND passWord = '$passWord' ";//em muốn trỏ tới admin.php

    $result = executeResult($sql);
  	$id = intval($result[0]['id']);
    if ($id == 1){
        $_SESSION['userName'] = $userName;
        header('location:admin.php');
    }
  }
?>
 <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="./styleLogin/style.css"> 
 <section class="login-block">
    <div class="container">
	<div class="row">
		<div class="col-md-4 login-sec">
		    <h2 class="text-center">Login Now</h2>
		    <form class="login-form" action="login.php" method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1" class="text-uppercase" >Username</label>
            <input type="text" class="form-control"  name="userName">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1" class="text-uppercase" >Password</label>
            <input type="password" class="form-control"name="passWord">
          </div>
            <div class="form-check">
            <button type="submit" name="submit" class="btn btn-login float-right">Submit</button>
          </div>
          
        </form>
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="https://static.pexels.com/photos/33972/pexels-photo.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>This is Heaven</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
        </div>	
            </div>			    
		</div>
	</div>
</div>
</section>

