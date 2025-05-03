<?php
$host = 'localhost';
$user = 'root';
$pass = ''; 
$db   = 'elpyand_portfolio';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$nama = $_POST['nama'] ?? '';
$email = $_POST['email'] ?? '';
$hp = $_POST['hp'] ?? '';
$pesan = $_POST['pesan'] ?? '';

if ($nama && $email && $hp && $pesan) {
    $stmt = $conn->prepare("INSERT INTO kontak (nama, email, hp, pesan) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nama, $email, $hp, $pesan);

    if ($stmt->execute()) {
        echo "Sukses";
    } else {
        echo "Gagal menyimpan data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Semua field wajib diisi.";
}

$conn->close();
?>
