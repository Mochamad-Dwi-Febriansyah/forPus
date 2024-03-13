<?php
session_start();
include "../../../../config/koneksi.php";

if ($_GET['act'] == "tambah") {
    $parent_comment = $_POST['parentComment'];
    $student = $_POST['student'];
    $post = $_POST['post'];
    $date = $_POST['dates'];

    // PROCESS INSERT DATA TO DATABASE
    $sql = "INSERT INTO discussion(parent_comment,student,post,date)
        VALUES('" . $parent_comment . "','" . $student . "','" . $post . "','" . $date . "')";
    $sql .= mysqli_query($koneksi, $sql);

    if ($sql) {
        $_SESSION['berhasil'] = "Data discussion berhasil ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data discussion gagal ditambahkan !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "edit") {
    $id = $_POST['id'];
    $parent_comment = $_POST['parentComment'];
    $student = $_POST['student'];
    $post = $_POST['post'];
    $date = $_POST['dates'];

    // PROCESS EDIT DATA
    $query = "UPDATE discussion SET parent_comment = '$parent_comment', student = '$student', post = '$post', 
                date = '$date'";

    $query .= "WHERE id = $id";

    $sql = mysqli_query($koneksi, $query);
    if ($sql) {
        $_SESSION['berhasil'] = "Data discussion berhasil diedit !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data discussion gagal diedit !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
} elseif ($_GET['act'] == "hapus") {
    $id = $_GET['id'];

    $sql = mysqli_query($koneksi, "DELETE FROM discussion WHERE id = '$id'");

    if ($sql) {
        $_SESSION['berhasil'] = "Data discussion berhasil di hapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['gagal'] = "Data discussion gagal di hapus !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    }
}
