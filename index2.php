<?php
$conn = mysqli_connect("localhost","root","","db_barang");

if(!$conn){
    die("Koneksi gagal: ".mysqli_connect_error());
}

/* TAMBAH DATA */
if(isset($_POST['tambah'])){
    mysqli_query($conn,"INSERT INTO barang 
    (nama,jumlah,harga,tanggal) VALUES 
    ('$_POST[nama]','$_POST[jumlah]','$_POST[harga]','$_POST[tanggal]')");
    header("Location: index2.php");
}

/* UPDATE DATA */
if(isset($_POST['update'])){
    mysqli_query($conn,"UPDATE barang SET
        nama='$_POST[nama]',
        jumlah='$_POST[jumlah]',
        harga='$_POST[harga]',
        tanggal='$_POST[tanggal]'
        WHERE id='$_POST[id]'");
    header("Location: index2.php");
}

/* HAPUS DATA */
if(isset($_GET['hapus'])){
    mysqli_query($conn,"DELETE FROM barang WHERE id='$_GET[hapus]'");
    header("Location: index2.php");
}

$data = mysqli_query($conn,"SELECT * FROM barang");
$no = 1;
?>

<!doctype html>
<html>
<head>
<title>CRUD Barang</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<div class="container mt-5">
<h2 class="mb-4">Data Barang</h2>

<!-- BUTTON TAMBAH -->
<button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
+ Tambah Data
</button>

<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
<th>No</th>
<th>Nama</th>
<th>Jumlah</th>
<th>Harga</th>
<th>Tanggal</th>
<th>Aksi</th>
</tr>
</thead>

<tbody>
<?php while($row = mysqli_fetch_assoc($data)) : ?>
<tr>
<td><?= $no++ ?></td>
<td><?= $row['nama'] ?></td>
<td><?= $row['jumlah'] ?></td>
<td><?= $row['harga'] ?></td>
<td><?= $row['tanggal'] ?></td>
<td>
<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#edit<?= $row['id'] ?>">Edit</button>
<a href="?hapus=<?= $row['id'] ?>" 
   class="btn btn-danger btn-sm"
   onclick="return confirm('Yakin hapus data?')">Hapus</a>
</td>
</tr>

<!-- MODAL EDIT -->
<div class="modal fade" id="edit<?= $row['id'] ?>">
<div class="modal-dialog">
<div class="modal-content">
<form method="POST">
<div class="modal-header">
<h5 class="modal-title">Edit Data</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
<input type="hidden" name="id" value="<?= $row['id'] ?>">

<div class="mb-2">
<label>Nama</label>
<input type="text" name="nama" value="<?= $row['nama'] ?>" class="form-control" required>
</div>

<div class="mb-2">
<label>Jumlah</label>
<input type="number" name="jumlah" value="<?= $row['jumlah'] ?>" class="form-control" required>
</div>

<div class="mb-2">
<label>Harga</label>
<input type="number" name="harga" value="<?= $row['harga'] ?>" class="form-control" required>
</div>

<div class="mb-2">
<label>Tanggal</label>
<input type="date" name="tanggal" value="<?= $row['tanggal'] ?>" class="form-control" required>
</div>
</div>

<div class="modal-footer">
<button type="submit" name="update" class="btn btn-primary">Update</button>
</div>
</form>
</div>
</div>
</div>

<?php endwhile; ?>
</tbody>
</table>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalTambah">
<div class="modal-dialog">
<div class="modal-content">
<form method="POST">
<div class="modal-header">
<h5 class="modal-title">Tambah Data</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal"></button>
</div>

<div class="modal-body">
<div class="mb-2">
<label>Nama</label>
<input type="text" name="nama" class="form-control" required>
</div>

<div class="mb-2">
<label>Jumlah</label>
<input type="number" name="jumlah" class="form-control" required>
</div>

<div class="mb-2">
<label>Harga</label>
<input type="number" name="harga" class="form-control" required>
</div>

<div class="mb-2">
<label>Tanggal</label>
<input type="date" name="tanggal" class="form-control" required>
</div>
</div>

<div class="modal-footer">
<button type="submit" name="tambah" class="btn btn-success">Simpan</button>
</div>
</form>
</div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>