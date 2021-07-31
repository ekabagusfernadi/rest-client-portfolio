<?php

function getCURL($url) {

  $curl = curl_init(); // inisialisasi seperti git_init
  // curl bisa digunakan untuk get, post, put, delete, dll
  curl_setopt($curl, CURLOPT_URL, $url); // untuk set opsi : par1=data_init, par2=opsinya mau apa, par3=masukkan urlnya
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1 ); // curl_setopt() bisa banyak, par2= kita ingin data yang dikembalikan berbentuk text/json nanti biar kita sendiri yg ubah jadi array/object, par3= true/1 : text/json
  $result = curl_exec($curl); // eksekusi curlnya
  curl_close($curl); // tutup curlnya
  
  // decode json
  return json_decode($result, true);

}

// jalankan curl endpoint channels
$result = getCURL("https://www.googleapis.com/youtube/v3/channels?part=snippet,statistics&id=UCTp4xp69f7qGWq_EzqvI-2g&key=AIzaSyD4SrY7A9cCoXTODjtgeTLd_nIzpqkmf0U");

// ambil data yang dibutuhkan
$youtubeProfilePicture = $result["items"][0]["snippet"]["thumbnails"]["medium"]["url"];
$jumlahSubscriber = $result["items"][0]["statistics"]["subscriberCount"];
$namaChannel = $result["items"][0]["snippet"]["title"];

// latest video
$resultLatestVideo = getCURL("https://www.googleapis.com/youtube/v3/search?key=AIzaSyD4SrY7A9cCoXTODjtgeTLd_nIzpqkmf0U&channelId=UCTp4xp69f7qGWq_EzqvI-2g&maxResults=1&order=date&part=snippet");

$videoTerakhir = $resultLatestVideo["items"][0]["id"]["videoId"];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />

    <title>Membuat Website Menggunakan Bootstrap 4</title>
  </head>
  <body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#">kijangcitys</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
            <a class="nav-link" href="#">About</a>
            <a class="nav-link" href="#">Portfolio</a>
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Contact</a>
          </div>
        </div>
      </div>
    </nav>
    <!-- akhir navbar -->

    <!-- jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container text-center">
        <img src="img/saitama.jpg" class="rounded-circle mt-5 img-thumbnail" />
        <!-- img-thumbnail pada bootstrap 4 memberi border putih dan box-shadow -->
        <h1 class="display-4">kijangcitys</h1>
        <p class="lead">Suatu Percobaan Yang Sangat Mantab.</p>
      </div>
    </div>
    <!-- akhir jumbotron -->

    <!-- about -->
    <section id="about" class="about">
      <div class="container">
        <div class="row text-center mb-4">
          <div class="col-sm-12">
            <h2>About</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-5">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit quia, consectetur ducimus itaque molestiae voluptates in odit ad similique! Possimus mollitia ut minus hic sint itaque, delectus inventore soluta sed.</p>
          </div>
          <div class="col-sm-5">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit quia, consectetur ducimus itaque molestiae voluptates in odit ad similique! Possimus mollitia ut minus hic sint itaque, delectus inventore soluta sed.</p>
          </div>
        </div>
      </div>
    </section>
    <!-- akhir about -->

    <!-- youtube & instagram -->
    <section id="social" class="social bg-light">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Social Media</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-5">
            <div class="row">
              <div class="col-md-4">
                <img src="<?= $youtubeProfilePicture; ?>" width="200" class="rounded-circle img-thumbnail">
                
              </div>
              <div class="col-md-8">
                <h5><?= $namaChannel; ?></h5>
                <p><?= $jumlahSubscriber; ?> Subscribers.</p>
                <div class="g-ytsubscribe" data-channelid="UCTp4xp69f7qGWq_EzqvI-2g" data-layout="default" data-count="default"></div>
              </div>
            </div>

            <div class="row mt-3 pb-3">
              <div class="col">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $videoTerakhir; ?>" allowfullscreen></iframe>
                </div>
              </div>
            </div>

          </div>
          <div class="col-md-5">

          <div class="row">
            <div class="col-md-4">
              <img src="img/saitama.jpg" width="200" class="rounded-circle img-thumbnail">
            </div>
            <div class="col-md-8">
              <h5>@bagus_fernadieka</h5>
              <p>20032155 Followers.</p>
            </div>
          </div>

          <div class="row mt-3 pb-3">
            <div class="col">
              <div class="ig-thumbnail">
                <img src="img/portfolio/1.jpg">
              </div>
              <div class="ig-thumbnail">
                <img src="img/portfolio/2.jpg">
              </div>
              <div class="ig-thumbnail">
                <img src="img/portfolio/3.jpg">
              </div>
            </div>
          </div>
            
          </div>
        </div>

      </div>
    </section>
    <!-- akhir youtube & instagram -->

    <!-- portfolio -->
    <section id="portfolio" class="portfolio pb-4">
      <div class="container mt-5">
        <div class="row mb-4 pt-4">
          <div class="col text-center">
            <h2>Portfolio</h2>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md">
            <!-- bootstrap 4 col bisa dikosongi (otomatis menyesuaikan) -->
            <div class="card">
              <!-- hapus style="width: 18rem" agar gambar responsive atau kalau dibootstrap 3 = class="thumbnail" -->
              <img src="img/portfolio/1.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-md">
            <!-- bootstrap 4 col bisa dikosongi (otomatis menyesuaikan) -->
            <div class="card">
              <!-- hapus style="width: 18rem" agar gambar responsive atau kalau dibootstrap 3 = class="thumbnail" -->
              <img src="img/portfolio/2.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-md">
            <!-- bootstrap 4 col bisa dikosongi (otomatis menyesuaikan) -->
            <div class="card">
              <!-- hapus style="width: 18rem" agar gambar responsive atau kalau dibootstrap 3 = class="thumbnail" -->
              <img src="img/portfolio/3.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-md">
            <!-- bootstrap 4 col bisa dikosongi (otomatis menyesuaikan) -->
            <div class="card">
              <!-- hapus style="width: 18rem" agar gambar responsive atau kalau dibootstrap 3 = class="thumbnail" -->
              <img src="img/portfolio/4.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-md">
            <!-- bootstrap 4 col bisa dikosongi (otomatis menyesuaikan) -->
            <div class="card">
              <!-- hapus style="width: 18rem" agar gambar responsive atau kalau dibootstrap 3 = class="thumbnail" -->
              <img src="img/portfolio/5.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
          <div class="col-md">
            <!-- bootstrap 4 col bisa dikosongi (otomatis menyesuaikan) -->
            <div class="card">
              <!-- hapus style="width: 18rem" agar gambar responsive atau kalau dibootstrap 3 = class="thumbnail" -->
              <img src="img/portfolio/6.jpg" class="card-img-top" alt="..." />
              <div class="card-body">
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- akhir portfolio -->

    <!-- contact -->
    <section id="contact" class="contact bg-light mb-5">
      <div class="container">
        <div class="row pt-4 mb-4">
          <div class="col text-center">
            <h2>Contact Us</h2>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="card text-white bg-danger mb-3 text-center">
              <div class="card-body">
                <h5 class="card-title">Contact Us</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam, quo?</p>
              </div>
            </div>
            <ul class="list-group">
              <li class="list-group-item"><h1>Location</h1></li>
              <li class="list-group-item">My Office</li>
              <li class="list-group-item">Sadang, Kec. Taman, Kab. Sidoarjo</li>
              <li class="list-group-item">Jawa Timur</li>
            </ul>
          </div>
          <div class="col-lg-6">
            <form>
              <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" />
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" />
              </div>
              <div class="form-group">
                <label for="telp">Telp</label>
                <input type="telp" class="form-control" id="telp" />
              </div>
              <div class="form-group">
                <label for="pesan">pesan</label>
                <textarea name="pesan" id="pesan" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-danger">Kirim Pesan!</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- akhir contact -->

    <footer class="bg-dark text-white">
      <div class="container">
        <div class="row pt-3">
          <div class="col text-center">
            <p>&copy; Copyright 2021</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="https://apis.google.com/js/platform.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
