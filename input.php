<?php
require_once ('dbhelp.php');


if(isset($_POST['sbm'])){
	$fullName = $_POST['fullName'];
	$position = $_POST['position'];
	$workPhone = $_POST['workPhone'];
	$address = $_POST['address'];
	$phonePerson = $_POST['phonePerson'];
	$email = $_POST['email'];

	unset($_POST);

	$sql = "SELECT Max(idPerson) FROM person";
    $result = executeResult($sql);
	$id = intval($result[0]['Max(idPerson)'])+1;

	$sql = "SELECT id FROM unit WHERE address = '$address'";
    $result = executeResult($sql);
	$unitID = intval($result[0]['id']);

	$sql = "INSERT INTO person(idPerson,fullName,position,workPhone,email,phonePerson,id_unit) VALUES ($id,'$fullName','$position','$workPhone','$email','$phonePerson',$unitID)";
	execute($sql);
	header('location:admin.php?page=admin_layout=index');
	}//còn delete anh ơi
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Registation Form * Form Tutorial</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm Giảng Viên</h2>
        </div>
        <div class="card-body">
            <form method="POST">
                <div class="form-group">
                    <label for="">Họ và Tên</label>
                    <input type="text" name="fullName" class="form-control" Required>
                </div>
                <div class="form-group">
                    <label for="">Chức Vụ</label>
                    <input type="text" name="position" class="form-control" Required>
                </div>
                <div class="form-group">
                    <label for="">Phòng Ban</label>
                    <input type="text" name="address" class="form-control" Required>
                </div>
				<div class="form-group">
                    <label for="">Điện Thoại Cơ Quan</label>
                    <input type="text" name="workPhone" class="form-control" Required>
                </div>
                <div class="form-group">
                    <label for="">Số Điện Thoại</label>
                    <input type="text" name="phonePerson" class="form-control" Required>
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="text" name="email" class="form-control" Required>
                </div>
                    
					<!--  -->
                <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
            </form>

        </div>
    </div>
</div>
</body>
</html>