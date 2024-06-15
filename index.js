document.getElementById("button").addEventListener("click", function (event) {
    event.preventDefault();
  
    Swal.fire({
        icon: "success",
        title: "Başarılı!",
        background: "#252b3b",
        text: "Başarıyla veritabanına ekledim.",
      }).then(result => {
          if(result.isConfirmed) {
              window.location.href = "/uyeEkle"
          }
      })
                   })
  