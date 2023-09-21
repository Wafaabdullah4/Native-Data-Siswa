<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
    <link rel="stylesheet" href="../assets/app/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/icons/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="Chart.js/Chart.js"></script>
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
                    <p class="fw-bold mb-0 lh-1 text-white">Admin</p>
                    <small class="text-white"></small>
                </div>
            </div>
            <div class="slider-body px-1">
                <nav class="nav flex-column">
                    <a class="nav-link px-3 active" href="#">
                        <i class="fa fa-home fa-lg box-icon" aria-hidden="true"></i>Home
                    </a>
                    <a class="nav-link px-3" href="#">
                        <i class="fa fa-user fa-lg box-icon" aria-hidden="true"></i>Profile
                    </a>
                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="data_siswa.php">
                        <i class="fa fa-dropbox fa-lg box-icon" aria-hidden="true"></i>Data D
                    </a>
                    <a class="nav-link px-3" href="#">
                        <i class="fa fa-calendar fa-lg box-icon" aria-hidden="true"></i>Data Wali Kelas
                    </a>
                    <a class="nav-link px-3" href="#">
                        <i class="fa fa-bell fa-lg box-icon" aria-hidden="true"></i>Data Kelas
                    </a>
                    <hr class="soft my-1 bg-white">
                    <a class="nav-link px-3" href="../logout.php">
                        <i class="fa fa-sign-out fa-lg box-icon" aria-hidden="true"></i>LogOut
                    </a>
                </nav>
            </div>
        </div>

        <div class="main-pages">
            <div class="container-fluid">
                <div class="row g-2 mb-3">
                    <div class="col-12">
                        <div class="d-block bg-white rounded shadow p-3">
                            <h5>
                                Hallo Admin, Selamat Datang di Halaman Admin
                            </h5>

                        </div>
                    </div>

                    <?php
                    include 'koneksi.php';


                    // mengambil data siswa
                    $data_siswa = mysqli_query($koneksi, "SELECT *FROM siswa");

                    //menghitung data siswa
                    $jumlah_siswa = mysqli_num_rows($data_siswa);
                    //mengambil data wali kelas
                    $data_wali_kelas = mysqli_query($koneksi, "SELECT *FROM wali_kelas");

                    //menghitung data wali kelas
                    $jumlah_wali_kelas = mysqli_num_rows($data_wali_kelas);

                    //mengambil data kelas
                    $data_kelas = mysqli_query($koneksi, "SELECT *FROM kelas");

                    //menghitung data kelas
                    $jumlah_kelas = mysqli_num_rows($data_kelas);
                    ?>
                    <div class="row g-3 mb-3">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <a href="data_walikelas.php" class=" link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" style="text-decoration: none;">
                                <div class="card p-2 shadow">

                                    <div class="d-flex align-items-center px-2">
                                        <i class="fa fa-users float-start fa-3x py-auto" aria-hidden="true"></i>
                                        <div class="card-body text-end">
                                            <h5 class="card-title"><?php echo $jumlah_wali_kelas; ?></h5>
                                            <p class="card-text">Wali Kelas</p>
                                        </div>
                                    </div>
                                    <div class="card-footer bg-white">
                                        <small class="text-start fw-bold">Jumlah Wali Kelas</small>
                                    </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <a href="data_kelas.php" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover " style="text-decoration: none;">
                            <div class="card p-2 shadow">
                                <div class="d-flex align-items-center px-2">
                                    <i class="fa fa-desktop fa-3x py-auto" aria-hidden="true"></i>
                                    <div class="card-body text-end">
                                        <h5 class="card-title"><?php echo $jumlah_kelas; ?></h5>
                                        <p class="card-text">Kelas</p>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <small class="text-start fw-bold">Jumlah Kelas</small>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <a href="data_siswa.php" class="link-dark link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover " style="text-decoration: none;">
                            <div class="card p-2 shadow">
                                <div class="d-flex align-items-center px-2">
                                    <i class="fa fa-graduation-cap fa-3x py-auto" aria-hidden="true"></i>
                                    <div class="card-body text-end">
                                        <h5 class="card-title"><?php echo $jumlah_siswa; ?></h5>
                                        <p class="card-text"> Siswa</p>
                                    </div>
                                </div>
                                <div class="card-footer bg-white">
                                    <small class="text-start fw-bold">Jumlah Siswa</small>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row g-2">
                    <div class="col-12 col-lg-6">
                        <div class="d-block rounded shadow bg-white p-3">
                            <center>
                                <small class="text-center fw-bold ">Grafik Jenis Kelamin Siswa</small>
                            </center>
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="d-block rounded shadow bg-white p-3">
                            <center>
                                <small class="text-center fw-bold ">Grafik Jenis Kelamin Wali Kelas</small>
                            </center>
                            <canvas id="myCharttwo"></canvas>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <div class="slider-background" id="sliders-background"></div>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Laki-laki", "Perempuan"],
                datasets: [{
                    label: '',
                    data: [
                        <?php
                        $jumlah_laki = mysqli_query($koneksi, "select * from siswa where jk='L'");
                        echo mysqli_num_rows($jumlah_laki);
                        ?>,
                        <?php
                        $jumlah_perempuan = mysqli_query($koneksi, "select * from siswa where jk='P'");
                        echo mysqli_num_rows($jumlah_perempuan);
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById("myCharttwo").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Laki-laki", "Perempuan"],
                datasets: [{
                    label: '',
                    data: [
                        <?php
                        $jumlah_laki = mysqli_query($koneksi, "select * from siswa where jk='L'");
                        echo mysqli_num_rows($jumlah_laki);
                        ?>,
                        <?php
                        $jumlah_perempuan = mysqli_query($koneksi, "select * from siswa where jk='P'");
                        echo mysqli_num_rows($jumlah_perempuan);
                        ?>
                    ],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
    <script src="../dist/js/jquery.js"></script>
    <script src="../assets/app/js/bootstrap.min.js"></script>
    <script src="Chart.js"></script>





    <!-- percobaan selesai -->
</body>

</html>