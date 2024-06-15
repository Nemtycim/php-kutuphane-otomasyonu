<?php
include "baglanti.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uyead = $_POST["ad"];
    $telefono = $_POST["telefon"];
    $email = $_POST["email"];

    $sorgu = $db->prepare("SELECT * FROM kullanicitablo WHERE ad LIKE :ad AND telefon LIKE :telefon AND email LIKE :email");
    $sorgu->execute(array(
        ":ad" => '%' . $uyead . '%',
        ":telefon" => '%' . $telefono . '%',
        ":email" => '%' . $email . '%'
    ));
  
} else {
    // Varsayılan olarak tüm kullanıcıları getir
    $sorgu = $db->prepare("SELECT * FROM kullanicitablo");
    $sorgu->execute();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Üye Arama Sayfası</title>
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
        <h2>Üye Arama Formu</h2>
        <form method="post" action="üyeArama.php">
            <div class="form-group">
                <label for="ad">Üye Adı:</label>
                <input type="text" class="form-control" id="ad" name="ad" required>
            </div>
            <div class="form-group">
                <label for="soyad">Telefon No</label>
                <input type="text" class="form-control" id="telefon" name="telefon" required>
            </div>
            <div class="form-group">
                <label for="soyad">E-Posta Adresi</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <button type="submit" class="btn btn-primary">Formu Gönder</button>
        </form>

        <div class="mt-5">
            <h3>Sonuçlar</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>Üye Adı</th>
                    <th>Telefon No</th>
                    <th>E-Posta Adresi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = $sorgu->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>".$row['ad']."</td>";
                    echo "<td>".$row['telefon']."</td>";
                    echo "<td>".$row['email']."</td>";
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
