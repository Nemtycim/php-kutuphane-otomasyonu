<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kitap Ekleme Sayfası</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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
  <a  href="kutuphane.php">Ana Sayfa</a>
  <a href="kitapEkle.php">Kitap Ekleme Sayfası</a>
  <a href="uyeEkle.php">Üye Ekleme Sayfası</a>
  <a href="kitapArama.php">Kitap Arama Sayfası</a>
  <a href="üyeArama.php">Üye Arama Sayfası</a>
  <a href="almaverme.php">Üye Arama Sayfası</a>

</div>

<center>
<div class="content">
  <h2>KUTUPHANE OTOMASYONU'NA HOŞGELDİNİZ!!!</h2>
  <p>Bu sitede kutuphane otomasyonu için gerekli şeyler yapılmıstır.</p>
  <p>Kitap/Üye ekleme sayfasından eklemeler yapabilir, Kitap/Üye arama sayfasndan da arama yapabilir , kitap kiralama sayfasındanda kitap kiralıyabilirisiniz.</p>
</div>
</center>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
