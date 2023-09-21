<!DOCTYPE html>
<html>

<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>Halaman Wali Kelas</title>
       <link rel="stylesheet" href="../assets/app/css/bootstrap.min.css">
       <link rel="stylesheet" href="../assets/icons/css/font-awesome.min.css">
       <link rel="stylesheet" href="style.css">
       <link rel="preconnect" href="https://fonts.gstatic.com">
       <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
</head>

<body>


       <?php
       session_start();

       // cek apakah yang mengakses halaman ini sudah login
       if ($_SESSION['level'] == "") {
              header("location:index.php?pesan=gagal");
       }

       ?>

       <!-- Percobaan -->

       <div class="wrapper">
              <nav class="navbar navbar-expand-md navbar-light bg-light py-1">
                     <div class="container-fluid">
                            <!-- <button class="btn btn-default" id="btn-slider" type="button">
                    <i class="fa fa-bars fa-lg" aria-hidden="true"></i>
                </button> -->
                            <a class="navbar-brand me-auto text-danger" href="#">Dash<span class="text-warning">Board</span></a>
                            <ul class="nav ms-auto">
                                   <li class="nav-item dropstart">
                                          <a href="../logout.php" id="navbarDropdown" role="button" onclick="return confirm('apakah anda yakin akan logout sebagai Admin ?')">
                                                 <img src="../images/user/logout.png" alt="user" class="img-user">
                                          </a>

                                   </li>
                            </ul>
                     </div>
              </nav>

              <div class="slider" id="sliders">
                     <div class="slider-head">
                            <div class="d-block pt-4 pb-3 px-3">
                                   <img src="../images/user/user.png" alt="user" class="slider-img-user mb-2">
                                   <p class="fw-bold mb-0 lh-1 text-white">Wali Kelas</p>
                                   <small class="text-white"></small>
                            </div>
                     </div>
                     <div class="slider-body px-1">
                            <nav class="nav flex-column">
                                   <a class="nav-link px-3 active" href="halaman_siswa.php">
                                          <i class="fa fa-home fa-lg box-icon" aria-hidden="true"></i>Home
                                   </a>
                                   <a class="nav-link px-3" href="#">
                                          <i class="fa fa-user fa-lg box-icon" aria-hidden="true"></i>Profile
                                   </a>
                                   <hr class="soft my-1 bg-white">
                                   <a class="nav-link px-3" href="data_siswa.php">
                                          <i class="fa fa-dropbox fa-lg box-icon" aria-hidden="true"></i>Data siswa
                                   </a>
                                   <a class="nav-link px-3" href="#">
                                          <i class="fa fa-calendar fa-lg box-icon" aria-hidden="true"></i>Data Wali Kelas
                                   </a>
                                   <a class="nav-link px-3" href="#">
                                          <i class="fa fa-bell fa-lg box-icon" aria-hidden="true"></i>Data Kelas
                                   </a>
                                   <hr class="soft my-1 bg-white">
                                   <a class="nav-link px-3" href="../logout.php" onclick="return confirm ('Apakah anda yakin akan logout sebagai Admin?')">
                                          <i class="fa fa-sign-out fa-lg box-icon" aria-hidden="true"></i>LogOut
                                   </a>
                            </nav>
                     </div>
              </div>

              <div class="main-pages">
                     <div class="container-fluid">
                            <div class="row g-2 mb-3">
                                   <div class="d-block bg-white rounded shadow p-3">
                                          <div class="row">
                                                 <div class="col-12">
                                                        <h5>Data Siswa</h5>
                                                 </div>

                                          </div>
                                          <div class="row g-3 mt-1 ">
                                                 <div class="col-6">
                                                        <p class="text-start fw-bold ">
                                                               Filter by Gender
                                                               <i class="fa fa-filter" aria-hidden="true"></i>
                                                        </p>
                                                        <form class="d-flex" role="search" method="post" action="">
                                                               <input class="form-control me-2" type="search" placeholder="Filter" aria-label="Search" name="cari">
                                                               <button class="btn btn-outline-success" type="submit">Filter</button>
                                                        </form>
                                                 </div>
                                                 <div class="col-6">
                                                        <p class="text-start fw-bold ">
                                                               Search Name
                                                               <i class="fa fa-search" aria-hidden="true"></i>
                                                        </p>
                                                        <form class="d-flex" role="search" method="get" action="">
                                                               <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="cari">
                                                               <button class="btn btn-outline-success" type="submit">Search</button>
                                                        </form>
                                                 </div>
                                          </div>
                                   </div>
                            </div>

                            <!-- Menampilkan data -->

                            <div class="container">
                                   <div class="row">
                                          <div class="col">
                                                 <div class="d-block bg-white rounded shadow p-3">

                                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                               <a href="cetak_data_siswa.php" target="_blank">
                                                                      <button type="button" class="btn btn-dark">Cetak <i class="fa fa-print" aria-hidden="true"></i></button></a>
                                                        </div>

                                                        <table class="table table-striped table-hover mt-3">
                                                               <tr>
                                                                      <th>NO</th>
                                                                      <th>Nama</th>
                                                                      <th>Kelas</th>
                                                                      <th>Jenis Kelamin</th>
                                                                      <!-- <th>OPSI</th> -->
                                                               </tr>
                                                               <?php
                                                               include 'koneksi.php';
                                                               $no = 1;
                                                               $data = mysqli_query($koneksi, "select * from siswa");

                                                               if (isset($_GET['cari'])) {
                                                                      $data = mysqli_query($koneksi, "select * from siswa WHERE nama LIKE '%" .
                                                                             $_GET['cari'] . "%'");
                                                               }
                                                               if (isset($_POST['cari'])) {
                                                                      $data = mysqli_query($koneksi, "select * from siswa WHERE jk LIKE '%" .
                                                                             $_POST['cari'] . "%'");
                                                               }
                                                               // if (isset($_GET['jk'])) {
                                                               //     $jk = $_GET['jk'];
                                                               //     $data = mysqli_query($koneksi, "select * from siswa where='$jk'");
                                                               // } else {
                                                               //     $data = mysqli_query($koneksi, "select * from siswa");
                                                               // }
                                                               while ($d = mysqli_fetch_array($data)) {
                                                               ?>
                                                                      <tr>
                                                                             <td><?php echo $no++; ?></td>
                                                                             <td><?php echo $d['nama']; ?></td>
                                                                             <td><?php echo $d['kelas']; ?></td>
                                                                             <td>
                                                                                    <?php echo $d['jk']; ?>
                                                                             </td>
                                                                             <!-- <td>
                                                                                    <a href="edit_data.php?id=<?php echo $d['id']; ?>">
                                                                                           <button type="button" class="btn btn-warning btn-sm">
                                                                                                  <i class="fa fa-pencil fa-lg" aria-hidden="true"></i>
                                                                                           </button>
                                                                                    </a>

                                                                                    <a href=" hapus_data.php?id=<?php echo $d['id']; ?> " onclick=" return confirm('Apakah anda yakin akan menghapus data ini?')">
                                                                                           <button type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></button>
                                                                                    </a>
                                                                             </td> -->
                                                                      </tr>
                                                               <?php
                                                               }
                                                               ?>
                                                        </table>
                                                        <!-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                                               <a href="input_siswa.php">
                                                                      <button type="button" class="btn btn-outline-secondary">+Tambah Siswa</button>
                                                               </a>
                                                        </div> -->
                                                 </div>
                                          </div>
                                   </div>
                            </div>
                     </div>
                     <!-- Menampilkan data selesai -->

              </div>
       </div>
       </div>

       <div class="slider-background" id="sliders-background"></div>
       <script src="../dist/js/jquery.js"></script>
       <script src="../assets/app/js/bootstrap.min.js"></script>
       <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


       <script src="../dist/js/index.js"></script>



       <!-- percobaan selesai -->
</body>

</html>