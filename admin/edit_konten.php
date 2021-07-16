<?php

session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ../login.php");
  exit;
}
include '../koneksi.php';
include 'header.php';
include 'sidebar.php';

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM posting WHERE id = '$id';");
$data = mysqli_fetch_assoc($result);

if (isset($_POST['edit'])) {

  if(edit_konten($_POST)>0){
    echo "<script>alert('Konten berhasil diubah'); document.location.href='konten.php';</script>";
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
            <h1 class="m-0">Ubah Konten</h1>
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
            <input type="hidden" name="id" value="<?= $data['id'];?>">
            <input type="text" class="form-control" id="exampleFormControlInput1" name="judul" value="<?= $data['judul'];?>">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Isi konten</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="isi" rows="3"><?= $data['konten'];?></textarea>
          </div>          
          <button type="submit" class="btn btn-primary" name="edit">Ubah</button>
        </form>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
include 'footer.php';
?>