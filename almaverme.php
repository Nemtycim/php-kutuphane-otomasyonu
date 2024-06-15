<?php
include "baglanti.php";
$sorgu = $db -> prepare("select * from kitaptablo");
$sorgu -> execute();
?>
<?php
include "baglanti.php";
$sorgu1 = $db -> prepare("select * from verilenkitaplar");
$sorgu1 -> execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kitap Alma</title>
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

    .select-button {
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 16px;
      padding: 8px 16px;
      cursor: pointer;
    }

    .select-button2 {
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 16px;
      padding: 8px 16px;
      cursor: pointer;
    }

    .select-button:hover {
      background-color: #0056b3;
    }
    .select-button2:hover {
      background-color: #0056b3;
    }
    .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
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
<div class="mt-5">
<div id="myModal" class="modal">

<!-- Modal content -->
<div class="modal-content">
  <span class="close">&times;</span>
  
  <div class="container mt-5">
    <h2>Üye Kitap Verme</h2>
    <form method="post" action="almaverme.php">
      <div class="form-group">
        <label for="ad">Üye Adı Soyadı</label>
        <input type="text" class="form-control" id="uyeadisoyadi" name="uyeadisoyadi">
      </div>
      <div class="form-group">
        <label for="soyad">Verilecek Kitap Adı</label>
        <input type="text" class="form-control" id="verilecekkitap" name="verilecekkitap">
      </div>
      <div class="form-group">
        <label for="email">Üye E-Posta</label>
        <input type="email" class="form-control" id="uyeposta" name="uyeposta">
      </div>
      <div class="form-group">
        <label for="telefon">Üye Telefon</label>
        <input type="tel" class="form-control" id="uyetelefon" name="uyetelefon">
      </div>
      <button type="submit" id="one" class="btn btn-primary">Kitabı Ver</button>

    </form>
  </div>
</div>

</div>
            <h3>Kütüphane Kitapları</h3>
            <table class="table">
                <thead>
                <tr>
                    <th>Kitap Adı</th>
                    <th>Kitap Yazarı</th>
                    <th>Kitap İçeriği</th>
                    <th>Yayın Tarihi</th>
                    <th>İslem</th>
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
                    echo "<td><button  id='myBtn' class='select-button' data-bookid='{$row['id']}'>Seç</button></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>

            
        </div>
            <br>
            <h3>Verilen Kitaplar</h3>
            <form action="" method="post">
            <table class="table">
                <thead>
                <tr>
                    <th>Üye Adı</th>
                    <th>Verilen Kitap</th>
                    <th>Veriliş Tarihi</th>
                    <th>İslem</th>
                </tr>
                </thead>
                <tbody>
                <?php
                while ($row = $sorgu1->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                    echo "<td>".$row['uyeadisoyadi']."</td>";
                    echo "<td>".$row['verilecekkitap']."</td>";
                    echo "<td>".$row['verilistarihi']."</td>";
                    echo "<td><button  id='{$row['id']}' class='select-button2'>Al</button></td>";
                    echo "</tr>";
                }
                ?>
                </tbody>
            </table>
            </form>
</div>











<script>
  var modal = document.getElementById("myModal");
  var selectButtons = document.querySelectorAll(".select-button");
  var span = document.getElementsByClassName("close")[0];

  selectButtons.forEach(function(button) {
    button.addEventListener("click", function() {
      modal.style.display = "block";
    });
  });

  span.onclick = function() {
    modal.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
</script>


<?php 
        if ($_POST) {
            $ad = $_POST["uyeadisoyadi"];
            $verilecekkitap = $_POST["verilecekkitap"];
            $uyeposta = $_POST["uyeposta"];
            $telefon = $_POST["uyetelefon"];

            if(empty($_POST['uyeadisoyadi']) && empty($_POST['verilecekkitap']) && empty($_POST['uyeposta']) && empty($_POST['uyetelefon'])) {
              echo '<script>
              Swal.fire({
                  icon: "error",
                  title: "Hata!",
                  text: "Lütfen tüm alanları doldurun."
              });
            </script>';
            }
            else {
            $ekle = $db->prepare("INSERT INTO verilenkitaplar (uyeadisoyadi, verilecekkitap, uyeposta, uyetelefon) VALUES (:uyeadisoyadi, :verilecekkitap, :uyeposta, :uyetelefon)");
            $kontrol = $ekle->execute(array(
                ":uyeadisoyadi" => $ad,
                ":verilecekkitap" => $verilecekkitap,
                ":uyeposta" => $uyeposta,
                ":uyetelefon" => $telefon 
            ));
            if ($kontrol) {
              echo "<script>
                      Swal.fire({
                          icon: 'success',
                          title: 'Başarılı',
                          text: 'Başarıyla $verilecekkitap adlı kitap $ad adlı kullanıcıya verildi'
                      });
                    </script>";
          } else {
              echo '<script>
                      Swal.fire({
                          icon: "error",
                          title: "Hata!",
                          text: "Kitap verirken bir hata oluştu."
                      });
                    </script>';
          }
        } 
        }
      
            ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
