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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Konten</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


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

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
include 'footer.php';
?>