<?php
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: ../login.php");
  exit;
}


include '../koneksi.php';
include 'header.php';
include 'sidebar.php';


if (isset($_POST['add'])) {

  if(add_konten($_POST)>0){
    echo "<script>alert('Konten berhasil ditambahkan'); document.location.href='konten.php';</script>";
  }
  

}


?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Tambah Konten</h1>
                    </div>

                    <form action="" method="post">
                      <div class="form-group">
                        <label for="exampleFormControlInput1">Judul</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="judul">
                      </div>
                      <div class="form-group">
                        <label for="exampleFormControlTextarea1">Isi konten</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="isi" rows="3"></textarea>
                      </div>          
                      <button type="submit" class="btn btn-primary" name="add">Tambah</button>
                    </form>


                </div>
            <!-- End of Main Content -->

<?php
include 'footer.php';
?>