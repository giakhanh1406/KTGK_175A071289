<?php
if (isset($_POST['id'])) {
	$id = $_POST['id'];

	require_once ('dbhelp.php');
	$sql = 'delete from person where id = '.$id;
	execute($sql);

	echo 'Xoá giảng vi thành công';
}