<?php
include "baglanti.php";
$sorgu = $db -> prepare("select * from kitaptablo");
$sorgu -> execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kitap Ekleme Sayfası</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
  <a href="kutuphane.php">Ana Sayfa</a>
  <a href="kitapEkle.php">Kitap Ekleme Sayfası</a>
  <a href="uyeEkle.php">Üye Ekleme Sayfası</a>
  <a href="kitapArama.php">Kitap Arama Sayfası</a>
  <a href="üyeArama.php">Üye Arama Sayfası</a>
  <a href="almaverme.php">Üye Arama Sayfası</a>

</div>

<div class="content">
  <div class="container mt-5">
    <h2>Kitap Ekleme Formu</h2>
    <form method="post" action="kitapEkle.php">
      <div class="form-group">
        <label for="ad">Kitap Adı</label>
        <input type="text" class="form-control" id="kitapadi" name="kitapadi">
      </div>
      <div class="form-group">
        <label for="soyad">Kitap Yazarı</label>
        <input type="text" class="form-control" id="yazar" name="yazar">
      </div>
      <div class="form-group">
        <label for="email">Kitap İçerik</label>
        <input type="text" class="form-control" id="kitapicerik" name="kitapicerik">
      </div>
      <div class="form-group">
        <label for="telefon">Yayın Tarihi</label>
        <input type="text" class="form-control" id="yayintarihi" name="yayintarihi">
      </div>
      <button type="submit" id="one" class="btn btn-primary">Gönder</button>

    </form>
  </div>
</div>

<?php 
        if ($_POST) {
          if (!empty($_POST['kitapadi']) && !empty($_POST['yazar']) && !empty($_POST['kitapicerik']) && !empty($_POST['yayintarihi'])) {
              $kitapadi = $_POST["kitapadi"];
              $yazar = $_POST["yazar"];
              $kitapicerik = $_POST["kitapicerik"];
              $yayintarihi = $_POST["yayintarihi"];
              
              $ekle = $db->prepare("INSERT INTO kitaptablo (kitapadi, yazar, kitapicerik, yayintarihi) VALUES (:kitapadi, :yazar, :kitapicerik, :yayintarihi)");
              $kontrol = $ekle->execute(array(
                  ":kitapadi" => $kitapadi,
                  ":yazar" => $yazar,
                  ":kitapicerik" => $kitapicerik,
                  ":yayintarihi" => $yayintarihi
              ));
      
              if ($kontrol) {
                  echo "<script>
                          Swal.fire({
                              icon: 'success',
                              title: 'Başarılı',
                              text: 'Başarıyla $kitapadi adlı kitap eklendi.'
                          });
                        </script>";
              } else {
                  echo '<script>
                          Swal.fire({
                              icon: "error",
                              title: "Hata!",
                              text: "Kitap eklenirken bir hata oluştu."
                          });
                        </script>';
              }
          } else {
              echo '<script>
                      Swal.fire({
                          icon: "error",
                          title: "Hata!",
                          text: "Lütfen tüm alanları doldurun."
                      });
                    </script>';
          }
      }
      
            ?>
 

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
