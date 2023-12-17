<?php
    try {
        // Untuk koneksi ke database
        $connection = new PDO ('mysql:host=localhost;dbname=banking','root','');
    } catch (PDOException $e) {
        //meanmpilkan error
        echo "Koneksi ke database gagal: " . $e->getMessage();
        exit;
    }
?>