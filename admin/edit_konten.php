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

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Edit Konten</h1>
                    </div>

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
                    

                </div>
            <!-- End of Main Content -->

<?php
include 'footer.php';
?>