<?php
require_once ('dbhelp.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
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
        <header>
        <a class ="button" href ="logout.php" style ="float: right; margin: 10px;">Logout</a>
    </header>
		<div class="panel panel-primary">
			<div class="panel-heading" style =" font-size: 30px; text-align: center;">
				Quản lý thông tin giảng viên
				
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
                            <th>STT</th>
							<th>Họ và Tên</th>
							<th>Chức Vụ</th>
							<th>Phòng Ban</th>
                            <th>Số Điện Thoại</th>
                            <th>Email</th>
							<th width="60px"></th>
							<th width="60px"></th>
						</tr>
					</thead>
					<tbody>
<?php
if (isset($_GET['s']) && $_GET['s'] != '') {
	$sql = 'select * from person where fullname like "%'.$_GET['s'].'%"';
} else {
	$sql = 'select * from person inner join unit where person.id_unit = unit.id';
}

$GVList = executeResult($sql);

$index = 1;
foreach ($GVList as $std) {
	echo '<tr>
			
            <td>'.$std['idPerson'].'</td>
			<td>'.$std['fullName'].'</td>
			<td>'.$std['position'].'</td>
			<td>'.$std['address'].'</td>
            <td>'.$std['phonePerson'].'</td>
            <td>'.$std['email'].'</td>
			<td><button class="btn btn-warning" onclick=\'window.open("input.php?id='.$std['idPerson'].'","_self")\'>Edit</button></td>
			<td><button class="btn btn-danger" onclick="deleteGV('.$std['idPerson'].')">Delete</button></td>
		</tr>';
}
?>
					</tbody>
				</table>
				<button class="btn btn-success" onclick="window.open('input.php', '_self')">Add</button>
			</div>
		</div>
	</div>

	<script type="text/javascript">
		function deleteGV(idPerson) {
			option = confirm('Bạn có muốn xoá giảng viên này không')
			if(!option) {
				return;
			}

			console.log(idPerson);
			$.post('delete_GV.php', {
				'idPerson': idPerson
			}, function(data) {
				alert(data)
				location.reload()
			})
		}
	</script>
</body>
</html>