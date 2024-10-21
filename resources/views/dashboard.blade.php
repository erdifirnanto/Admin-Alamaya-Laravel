<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Circle Animation</title>
</head>

<body>
  <div class="content">
    <h1 id="title">Laravel Admin Alamaya</h1>
  </div>
  <div class="circle-overlay"></div>

  <div class="main-page" id="main-page">
    <h1>Wellcome To Laravel</h1>
    <p>This is the content of the main page.</p>
  </div>

</body>

<style>
  body,
  html {
    margin: 0;
    padding: 0;
    overflow: hidden;
    height: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #ffffff;
    /* Background utama putih */
    font-family: Arial, sans-serif;
  }

  .content {
    position: absolute;
    z-index: 20;
    /* Z-index tinggi agar judul berada di depan lingkaran */
    text-align: center;
  }

  #title {
    font-size: 3em;
    color: black;
    /* Warna awal hitam */
    transition: color 0.5s ease-in-out;
    /* Transisi warna cepat saat lingkaran menyentuh */
  }

  .circle-overlay {
    position: absolute;
    width: 50px;
    height: 50px;
    background-color: #3498db;
    border-radius: 50%;
    top: -100px;
    /* Mulai dari atas */
    left: 50%;
    transform: translate(-50%, 0);
    animation: dropBounce 2s ease-in-out forwards, circleExpand 1s ease-in-out forwards 2s;
    z-index: 10;
    /* Z-index lebih rendah dari judul */
  }

  @keyframes dropBounce {
    0% {
      top: -100px;
      /* Mulai dari luar layar, di atas */
    }

    50% {
      top: calc(50% - 25px);
      /* Pantulan pertama di bawah judul */
    }

    100% {
      top: calc(50% + 50px);
      /* Posisi akhir bouncing */
    }
  }

  @keyframes circleExpand {
    0% {
      transform: translate(-50%, -50%) scale(1);
    }

    100% {
      transform: translate(-50%, -50%) scale(50);
    }
  }

  .main-page {
    display: none;
    text-align: center;
  }

  .main-page h1 {
    font-size: 3em;
    color: #333;
  }

  .main-page p {
    font-size: 1.2em;
    color: #666;
  }
</style>

<script>
  window.onload = function() {
    const overlay = document.querySelector('.circle-overlay');
    const mainPage = document.getElementById('main-page');
    const title = document.getElementById('title');

    // Hentikan tampilan halaman utama
    const changeTitleColor = () => {
      title.style.color = 'white'; // Ubah warna judul jadi putih saat lingkaran menyentuh
    };

    // Hentikan tampilan lingkaran
    overlay.addEventListener('animationend', (event) => {
      if (event.animationName === 'circleExpand') {
        overlay.style.display = 'none'; // Sembunyikan lingkaran
        title.style.display = 'none'; // Sembunyikan judul setelah lingkaran menutupi layar
        mainPage.style.display = 'block'; // Tampilkan halaman utama
      }
    });

    // Deteksi sentuhan lingkaran dengan judul
    const checkCircleTouch = () => {
      const circleRect = overlay.getBoundingClientRect();
      const titleRect = title.getBoundingClientRect();

      // Periksa apakah lingkaran menyentuh judul
      if (
        circleRect.bottom >= titleRect.top &&
        circleRect.top <= titleRect.bottom &&
        title.style.color !== 'white' // hanya ubah warna jika belum putih
      ) {
        changeTitleColor();
      }
    };

    // Cek setiap frame
    const checkAnimationFrame = () => {
      checkCircleTouch();
      requestAnimationFrame(checkAnimationFrame);
    };

    // Mulai cek
    requestAnimationFrame(checkAnimationFrame);
  };
</script>

</html>