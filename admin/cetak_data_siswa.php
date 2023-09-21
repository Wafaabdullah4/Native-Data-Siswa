<!DOCTYPE html>
<html>

<head>
       <title>Cetak Data Siswa Prakarya INTERNASIONAL</title>
</head>

<body>

       <center>

              <h2>DATA SISWA SMK PRAKARYA INTERNASIONAL</h2>
              <h4>TAHUN AJARAN 2023</h4>

       </center>

       <?php
       include 'koneksi.php';
       ?>

       <table border="1" style="width: 100%">
              <tr>
                     <th width="1%">No</th>
                     <th>Nama Siswa</th>
                     <th>Kelas</th>
                     <th width="5%">Jenis Kelamin</th>
              </tr>
              <?php
              $no = 1;
              $sql = mysqli_query($koneksi, "select * from siswa");
              while ($data = mysqli_fetch_array($sql)) {
              ?>
                     <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $data['nama']; ?></td>
                            <td><?php echo $data['kelas']; ?></td>
                            <td><?php echo $data['jk']; ?></td>
                     </tr>
              <?php
              }
              ?>
       </table>

       <script>
              window.print();
       </script>

</body>

</html>