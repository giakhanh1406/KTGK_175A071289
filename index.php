<?php
require_once ('dbhelp.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-9">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.0">
    <title>Danh Bạ</title>
    <link rel="stylesheet" href="styles.css"

</head>
<body>
<div class="container">
    <header>
        <a href="#"><img src="images/logo.png" alt=""></a>
        <a class ="button" href ="login.php">Login</a>
    </header>
    <nav>
        <div class = "menu">
           <ul>
               <li><a href="#">Trang chủ</a></li>
               <li><a href="#">Đào tạo</a></li>
               <li><a href="#">Hoạt động sinh viên</a></li>
               <li><a href="#">Tuyển sinh viên</a></li>
               <li><a href="#">Liên hệ</a></li>
           </ul>
        </div>
        <div class="search">
            <input type="search" placeholder="Search. . .">
            <button>Tìm kiếm</button>
        </div>

    </nav>
    <div class ="slide">
        <a href="#"><img src="images/slide0.jpg" alt=""></a>
       
    </div>
    <h1>Thông tin giảng viên</h1>
    <div class=" row panel panel-primary">
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
			
		</tr>';
}
?>
            </tbody>
        </table>
    </div>
</div>
    <footer>
        <hr>
        <div class="address">TRƯỜNG ĐẠI HỌC THỦY LỢI<br>
        Địa chỉ: 175 Tây Sơn, Đống Đa, Hà Nội<br>
        Điện thoại: (024) 38522201 - Fax: (024) 35633351<br>
        Email: <a href="#">phonghcth@tlu.edu.vn</a></div>
    </footer>

</body>





</html>