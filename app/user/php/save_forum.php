<?php
include_once "../../../config/koneksi.php";
$id = $_POST['id'];
$name = $_POST['name'];
$msg = $_POST['msg'];
if($name != "" && $msg != ""){
	$sql = mysqli_query($koneksi, "INSERT INTO discussion (parent_comment, student, post)
			VALUES ('$id', '$name', '$msg')");
	echo json_encode(array("statusCode"=>200));
}
else{
	echo json_encode(array("statusCode"=>201));
}
$koneksi = null;

?>