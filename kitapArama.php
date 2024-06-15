<?php
include "baglanti.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kitapad = $_POST["kitapad"];
    $kitapyazar = $_POST["kitapyazar"];
    $kitapicerik = $_POST["kitapicerik"];
    $yayintarihi = $_POST["yayintarihi"];

    $sorgu = $db->prepare("SELECT * FROM kitaptablo WHERE kitapadi LIKE :kitapadi AND yazar LIKE :yazar AND kitapicerik LIKE :kitapicerik AND yayintarihi LIKE :yayintarihi");
    $sorgu->execute(array(
        ":kitapadi" => '%' . $kitapad . '%',
        ":yazar" => '%' . $kitapyazar . '%',
        ":kitapicerik" => '%' . $kitapicerik . '%',
        ":yayintarihi" => '%' . $yayintarihi . '%'
    ));
  
} else {
    // Varsayılan olarak tüm kullanıcıları getir
    $sorgu = $db->prepare("SELECT * FROM kitaptablo");
    $sorgu->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitap Arama Sayfası</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .sidebar {
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
            position: fixed;
            height: 100%;
            overflow: auto;
        }

        .sidebar a {
            display: block;
            color: black;
            padding: 16px;
            text-decoration: none;
        }

        .sidebar a.active {
            background-color: #04AA6D;
            color: white;
        }

        .sidebar a:hover:not(.active) {
            background-color: #555;
            color: white;
        }

        div.content {
            margin-left: 200px;
            padding: 1px 16px;
            height: 1000px;
            font-family: 'Poppins', sans-serif;
        }

        @media screen and (max-width: 700px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .sidebar a {float: left;}
            div.content {margin-left: 0;}
        }

        @media screen and (max-width: 400px) {
            .sidebar a {
                text-align: center;
                float: none;
            }
        }
    </style>
</head>
<body>

<div class="sidebar">
    <a href="kutuphane.php">Ana Sayfa</a>
    <a href="kitapEkle.php">Kitap Ekleme Sayfası</a>
    <a href="uyeEkle.php">Üye Ekleme Sayfası</a>
    <a href="kitapArama.php">Kitap Arama Sayfası</a>
    <a href="üyeArama.php">Üye Arama Sayfası</a>
    <a href="almaverme.php">Üye Arama Sayfası</a>

</div>

<div class="content">
    <div class="container mt-5">
        <h2>Kitap Arama Formu</h2>
        <form method="post" action="üyeArama.php">
            <div class="form-group">
                <label for="ad">Kitap Adı:</label>
                <input type="text" class="form-control" id="kitapad" name="kitapad" required>
            </div>
            <div class="form-group">
                <label for="soyad">Kitap Yazarı</label>
                <input type="text" class="form-control" id="kitapyazar" name="kitapyazar" required>
            </div>
            <div class="form-group">
                <label for="soyad">Kitap İçeriği</label>
                <input type="text" class="form-control" id="kitapicerik" name="kitapicerik" required>
            </div>
            <div class="form-group">
                <label for="soyad">Kitap Yayın Yarihi</label>
                <input type="text" class="form-control" id="yayintarihi" name="yayintarihi" required>
            </div>
            <button type="submit" class="btn btn-primary">Formu Gönder</button>
        </form>

        <div class="mt-5">
            <h3>Sonuçlar</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>Kitap Adı</th>
                    <th>Kitap Yazarı</th>
                    <th>Kitap İçeriği</th>
                    <th>Yayın Tarihi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>".$row['kitapadi']."</td>";
                    echo "<td>".$row['yazar']."</td>";
                    echo "<td>".$row['kitapicerik']."</td>";
                    echo "<td>".$row['yayintarihi']."</td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
