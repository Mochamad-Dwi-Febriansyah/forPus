<?php

$upload_dir = "uploads/";

if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0777, true);
}

if (isset($_POST["submit"])) {
    $gambar = $_FILES["gambar"];
    $gambar_name = $gambar["name"];
    $gambar_tmp = $gambar["tmp_name"];
    $gambar_size = $gambar["size"];
    $gambar_error = $gambar["error"];
}

$allowed_types = ["image/jpeg", "image/png", "image/gif"];
$gambar_mime = mime_content_type($gambar_tmp);

if (!in_array($gambar_mime, $allowed_types)) {
    echo "Tipe file gambar tidak diizinkan.";
} else {
}

$max_size = 5 * 1024 * 1024;

if ($gambar_size > $max_size) {
    echo "Ukuran gambar terlalu besar. Maksimal 5 MB.";
} else {
}

$gambar_extensions = pathinfo($gambar_name, PATHINFO_EXTENSION);
$new_gambar_name = uniqid() . "." . $gambar_extensions;

$destination = $upload_dir . $new_gambar_name;

if (move_uploaded_file($gambar_tmp, $destination)) {
    echo "Gambar berhasil diunggah.";
} else {
    echo "Gagal mengunggah gambar.";
}
