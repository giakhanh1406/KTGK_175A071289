<?php
require_once ('dbhelp.php');

$s_fullName = $s_position = $s_address = $s_phonePerson = $s_email ='';

if (!empty($_POST)) {
	$s_id = '';

	if (isset($_POST['fullName'])) {
		$s_fullName = $_POST['fullName'];
	}

	if (isset($_POST['position'])) {
		$s_position = $_POST['position'];
	}

	if (isset($_POST['address'])) {
		$s_address = $_POST['address'];
	}
    if (isset($_POST['phonePerson'])) {
		$s_phonePerson = $_POST['phonePerson'];
	}
    if (isset($_POST['email'])) {
		$s_email = $_POST['email'];
	}

	if (isset($_POST['id'])) {
		$s_id = $_POST['id'];
	}

	$s_fullName = str_replace('\'', '\\\'', $s_fullName);
	$s_position      = str_replace('\'', '\\\'', $s_position);
	$s_address  = str_replace('\'', '\\\'', $s_address);
    $s_phonePerson  = str_replace('\'', '\\\'', $s_phonePerson);
    $s_email  = str_replace('\'', '\\\'', $s_email);
	$s_id       = str_replace('\'', '\\\'', $s_id);

	if ($s_id != '') {
		//update
		$sql = "update GV set fullName = '$s_fullName', age = '$s_position', address = '$s_address', phonePerson = '$s_phonePerson', email = '$s_email' where id = " .$s_id;
	} else {
		//insert
		$sql = "insert into GV(fullName, position, address,phonePerson, email) value ('$s_fullname', '$s_position', '$s_address', '$s_phonePerson', '$s_email')";
	}

	// echo $sql;

	execute($sql);

	header('Location: admin.php');
	die();
}

$id = '';
if (isset($_GET['id'])) {
	$id          = $_GET['id'];
	$sql         = 'select * from person where id = '.$id;
	$GVList = executeResult($sql);
	if ($GVList != null && count($GVList) > 0) {
		$std        = $GVList[0];
		$s_fullName = $std['fullName'];
		$s_position = $std['position'];
		$s_address  = $std['address'];
        $s_phonePerson  = $std['phonePerson']; 
        $s_email  = $std['email'];       

	} else {
		$id = '';
	}
}
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
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm Giảng Viên</h2>
			</div>
			<div class="panel-body">
				<form method="post">
					<div class="form-group">
					  <label for="text">Họ và Tên:</label>
					  <input type="number" name="id" value="<?=$id?>" style="display: none;">
					  <input required="true" type="text" class="form-control" id="usr" name="fullName" value="<?=$s_fullName?>">
					</div>
					<div class="form-group">
					  <label for="pos">Chức Vụ:</label>
					  <input type="text" class="form-control" id="pos" name="position" value="<?=$s_position?>">
					</div>
					<div class="form-group">
					  <label for="addr">Phòng Ban:</label>
					  <input type="text" class="form-control" id="addr" name="address" value="<?=$s_address?>">
					</div>
                    <div class="form-group">
					  <label for="phone">Số Điện Thoại:</label>
					  <input type="text" class="form-control" id="phone" name="phonePerson" value="<?=$s_phonePerson?>">
					</div>
                    <div class="form-group">
					  <label for="email">Email:</label>
					  <input type="email" class="form-control" id="email" name="address" value="<?=$s_email?>">
					</div>
					<button class="btn btn-success">Save</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>