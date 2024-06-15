<?php
include "baglanti.php";
$sorgu = $db -> prepare("select * from kullanicitablo");
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
    <h2>Üye Ekleme Formu</h2>
    <form method="post" action="uyeEkle.php">
      <div class="form-group">
        <label for="ad">Üye Adı</label>
        <input type="text" class="form-control" id="ad" name="ad">
      </div>
      <div class="form-group">
        <label for="soyad">Üye Soyadı</label>
        <input type="text" class="form-control" id="soyad" name="soyad">
      </div>
      <div class="form-group">
        <label for="email">Üye E-Posta</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="form-group">
        <label for="telefon">üye Telefon</label>
        <input type="tel" class="form-control" id="telefon" name="telefon">
      </div>
      <button type="submit" id="one" class="btn btn-primary">Gönder</button>

    </form>
  </div>
</div>

<?php 
        if ($_POST) {
          if (!empty($_POST['ad']) && !empty($_POST['soyad']) && !empty($_POST['email']) && !empty($_POST['telefon'])) {
              $ad = $_POST["ad"];
              $soyad = $_POST["soyad"];
              $email = $_POST["email"];
              $telefon = $_POST["telefon"];
              
              $ekle = $db->prepare("INSERT INTO kullanicitablo (ad, soyad, email, telefon) VALUES (:ad, :soyad, :email, :telefon)");
              $kontrol = $ekle->execute(array(
                  ":ad" => $ad,
                  ":soyad" => $soyad,
                  ":email" => $email,
                  ":telefon" => $telefon
              ));
      
              if ($kontrol) {
                  echo "<script>
                          Swal.fire({
                              icon: 'success',
                              title: 'Başarılı',
                              text: 'Başarıyla $ad adlı kullanıcı eklendi.'
                          });
                        </script>";
              } else {
                  echo '<script>
                          Swal.fire({
                              icon: "error",
                              title: "Hata!",
                              text: "Üye eklenirken bir hata oluştu."
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
