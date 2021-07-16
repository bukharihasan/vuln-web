<?php
include 'koneksi.php';
$result = mysqli_query($conn, "SELECT * FROM posting");
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>My Blog</title>

  <!-- Bootstrap core CSS -->
  <link href="assets/home/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="assets/home/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

  <!-- Custom styles for this template -->
  <link href="assets/home/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="index.php">Home</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=lfi/about.php">About</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php?page=lfi/contact.php">Contact</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" action="xss/cari.php" method="get">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="cari">
      <button class="btn btn-outline-primary my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
    </form>
  </div>
</nav>
<?php if (isset($_GET['page'])) :
        include $_GET['page']; ?>
<?php else :?>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('assets/home/img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>WEB UJI COBA</h1>
            <span class="subheading">Contoh blog dengan celah keamanan SQL Injection, Cross Site Scripting dan Local File Inclusion</span>
          </div>
        </div>
      </div>
    </div>
  </header>


  <!-- Main Content -->
 
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <?php while ( $row = mysqli_fetch_assoc($result) ) : ?>
        <div class="post-preview">
          <a href="sqli/posting.php?id=<?=$row["id"];?>">
            <h2 class="post-title">
             <?= $row["judul"];?>
            </h2>
          </a>
          <p class="post-meta">Posted by Admin
            on <?= $row["tanggal"];?></p>
        </div>
        <?php endwhile; ?>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p class="copyright text-muted">Copyright &copy; Skripsinya Bukhari 2021</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="assets/home/vendor/jquery/jquery.min.js"></script>
  <script src="assets/home/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="assets/home/js/clean-blog.min.js"></script>

</body>

</html>

<?php endif?>
