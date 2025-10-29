<?php
require 'config.php';

$sql = "SELECT * FROM buku ORDER BY id_buku DESC";
$result = $mysqli->query($sql);

if (!$result) {
    die("Query error: " . $mysqli->error);
}

?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> Daftar Buku</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    </head>
    <body>
        <div class="container mt-4">
            <h1 class="mb-4">Manajement Daftar Buku</h1>
            <!-- buat tombol tambah buku yang mengarhakan kita ke tambah buku.php -->
            <a href="tambah_buku.php" class="btn btn-primary mb-3">Tambah Buku Baru</a>
            <table class="table table-striped">
                <!-- ini untuk heading table -->
                <thead>
                <tr>
                    <!-- penamaan row sesuai urutan dan nama harus sama dengan column -->
                <th scope="col">No</th>
                <th scope="col">Judul</th>
                <th scope="col">Penulis</th>
                <th scope="col">Penerbit</th>
                <th scope="col">Tahun Terbit</th>
                <th scope="col">Stok</th>
                <th scope="col">Aksi</th>
                </tr>
                </thead>
                <!-- ini isi buku -->
                 <tbody>
                    <!-- disini akan diulang -->
                    <!-- karena yang akan kita ulangi adalah daftar buku -->
                    <?php
                        $no = 1;
                    ?>
                    <!-- perulangan -->
                    <?php while ($row = $result->fetch_assoc()) : ?>
                    
                    <tr>
                    <th scope="row"><?php echo $no ?></th>
                    <td><?php echo $row['judul']?></td>
                    <td><?php echo $row['penulis']?></td>
                    <td><?php echo $row['penerbit']?></td>
                    <td><?php echo $row['tahun_terbit']?></td>
                    <td><?php echo $row['stok']?></td>
                    
                    <td>
                        <a class='btn btn-success btn-sm'>Edit</a>
                        <a class='btn btn-warning btn-sm' onclick='return confirm("Apakah Anda yakin ingin menghapus buku ini?");'>Hapus    </a>
                    </td>
                    </tr>
                    <?php $no++; endwhile; ?>
                    <?php $mysqli->close(); ?>

                    </tbody>
            </table>    
        </div>  
        </body>
</html>