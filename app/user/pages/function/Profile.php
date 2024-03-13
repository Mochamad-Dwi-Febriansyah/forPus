<?php
session_start();

include "../../../../config/koneksi.php";
include "Peminjaman.php";
include "Pesan.php";

if ($_GET['aksi'] = "edit") {
    $id_user = $_POST['IdUser'];
    $nis = $_POST['Nis'];
    $fullname = $_POST['Fullname'];
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['Alamat'];

    if ($_POST['kelas'] = NULL) {
        $_SESSION['gagal'] = "Harap pilih kelas anda !";
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {

        UpdateDataPeminjaman();

        UpdateDataPesan();

        $query = "UPDATE user SET nis = '$nis', fullname = '$fullname', username = '$username', password = '$password', kelas = '$kelas', alamat = '$alamat'";
        $query .= "WHERE id_user = $id_user";

        $sql = mysqli_query($koneksi, $query);

        if ($sql) {
            $_SESSION['berhasil'] = "Update profil berhasil !";
            header("location: " . $_SERVER['HTTP_REFERER']);
        } else {
            $_SESSION['gagal'] = "Update profil gagal !";
            header("location: " . $_SERVER['HTTP_REFERER']);
        }
    }
}


// session_start();
// include "../../../../config/koneksi.php";


// // Memeriksa apakah formulir telah dikirim
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Mengambil data dari formulir
//     $id_user = $_POST['IdUser'];
//     $nis = $_POST['Nis'];
//     $fullname = $_POST['Fullname'];
//     $username = $_POST['Username'];
//     $password = $_POST['Password'];
//     $kelas = $_POST['kelas'];
//     $alamat = $_POST['Alamat'];

//     // Memeriksa apakah ada file gambar yang diunggah
//     if ($_FILES['Foto']['name'] != '') {
//         $file_tmp = $_FILES['Foto']['tmp_name'];
//         $file_name = $_FILES['Foto']['name'];

//         // Memindahkan file gambar ke folder yang ditentukan
//         move_uploaded_file($file_tmp, "gambar_anggota/" . $file_name);

//         // Menyimpan nama file gambar ke database
//         // Ubah query berikut sesuai dengan struktur tabel Anda
//         $query_foto = "UPDATE user SET foto = '$file_name' WHERE id_user = $id_user";
//         $sql_foto = mysqli_query($koneksi, $query_foto);

//         // Memeriksa apakah query untuk menyimpan foto berhasil
//         if ($sql_foto) {
//             $_SESSION['berhasil'] = "Update foto profil berhasil !";
//         } else {
//             $_SESSION['gagal'] = "Update foto profil gagal !";
//         }
//     }

//     // Menangani proses update data pengguna lainnya
//     // ...

//     // Mengarahkan kembali pengguna setelah selesai
//     header("location: " . $_SERVER['HTTP_REFERER']);
// }
