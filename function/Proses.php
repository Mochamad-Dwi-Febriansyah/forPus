<?php

include "../config/koneksi.php";

if ($_GET['aksi'] == "daftar") {

    $fullname = mysqli_real_escape_string($koneksi, $_POST['funame']);
    $username = mysqli_real_escape_string($koneksi, $_POST['uname']);
    $password = mysqli_real_escape_string($koneksi, md5($_POST['passw']));
    $cpass = mysqli_real_escape_string($koneksi, md5($_POST['cpassword']));
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'assets/dist/img' . $image;

    $select = mysqli_query($koneksi, "SELECT * FROM user WHERE uname = '$username' AND passw = '$password'") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        $message[] = 'user already exist';
    } else {
        if ($password != $cpass) {
            $message[] = 'confirm password not matched!';
        } elseif ($image_size > 2000000) {
            $message[] = 'image size is too large!';
        } else {
            $insert = mysqli_query($koneksi, "INSERT INTO user(funame, uname, passw, image) VALUES('$fullname', '$username', '$password', '$image')") or die('query failed');

            if ($insert) {
                move_uploaded_file($image_tmp_name, $image_folder);
                $message[] = 'registered successfully!';
                header('location:login.php');
            } else {
                $message[] = 'registeration failed!';
            }
        }
    }
}
