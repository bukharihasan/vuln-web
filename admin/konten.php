<?php
session_start();
if (!isset($_SESSION['login'])) {
  header("Location: ../login.php");
  exit;
}
include '../koneksi.php';
include 'header.php';
include 'sidebar.php';

$result = mysqli_query($conn, "SELECT * FROM posting");

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Konten</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div style="margin-bottom: 20px;">
          <a class="btn btn-primary" href="add_konten.php" role="button">Tambah Data</a>
        </div>
        
        <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Judul</th>
                  <th scope="col">Tanggal</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $i=1; ?>
                <?php while ( $row = mysqli_fetch_assoc($result) ) : ?>
                <tr>
                  
                  <th scope="row"><?= $i; ?></th>
                  <td><?= $row['judul'];?></td>
                  <td><?= $row['tanggal'];?></td>
                  <td>
                    <a href="edit_konten.php?id=<?= $row['id'];?>" class="btn btn-sm btn-warning" type="button" name="edit"><i class="fas far fa-edit"></i></a>
                    <a onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')" href="hapus.php?id=<?= $row['id'];?>" class="btn btn-sm btn-danger" type="button" name="hapus"><i class="fas fa-fw fa-trash"></i></a>
                  </td>
                  
                </tr>
                <?php $i++?>
                <?php endwhile; ?>
              </tbody>
            </table>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php 
include 'footer.php';
?>