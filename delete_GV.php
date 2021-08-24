<?php
if (isset($_POST['idPerson'])) {
	$idPerson = $_POST['idPerson'];
    unset($_POST);
	require_once ('dbhelp.php');
	$sql = 'delete from person where idPerson = '.$idPerson;
	execute($sql);

echo 'Xoá giảng viên thành công';
}