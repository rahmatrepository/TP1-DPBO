<?php
require_once 'Petshop.php';
session_start();

$upload_dir = 'uploads/';
if (!is_dir($upload_dir)) {
    mkdir($upload_dir);
}

// Inisialisasi array produk
if (!isset($_SESSION['produk'])) {
    $_SESSION['produk'] = [];
}

// Tambah Produk
if (isset($_POST['tambah'])) {
    $id = count($_SESSION['produk']) + 1;
    $nama = $_POST['nama_produk'];
    $kategori = $_POST['kategori_produk'];
    $harga = $_POST['harga_produk'];

    // Upload Foto
    $foto = '';
    if (!empty($_FILES['foto_produk']['name'])) {
        $foto = $upload_dir . basename($_FILES['foto_produk']['name']);
        move_uploaded_file($_FILES['foto_produk']['tmp_name'], $foto);
    }

    $_SESSION['produk'][] = new Petshop($id, $nama, $kategori, $harga, $foto);

    header("Location: main.php");
    exit;
}

// Edit Produk
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $index = $_POST['index'];

    if (isset($_SESSION['produk'][$index])) {
        $produk = $_SESSION['produk'][$index];
        
        $nama = $_POST['nama_produk'];
        $kategori = $_POST['kategori_produk'];
        $harga = $_POST['harga_produk'];

        // Upload Foto
        $foto = $produk->getFotoProduk();
        if (!empty($_FILES['foto_produk']['name'])) {
            $foto = $upload_dir . basename($_FILES['foto_produk']['name']);
            move_uploaded_file($_FILES['foto_produk']['tmp_name'], $foto);
        }

        // Update produk dalam session
        $_SESSION['produk'][$index] = new Petshop($id, $nama, $kategori, $harga, $foto);
    }

    header("Location: main.php");
    exit;
}

// Hapus Produk
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    foreach ($_SESSION['produk'] as $index => $produk) {
        if ($produk->getId() == $id) {
            if (!empty($produk->getFotoProduk()) && file_exists($produk->getFotoProduk())) {
                unlink($produk->getFotoProduk());
            }
            unset($_SESSION['produk'][$index]);
            $_SESSION['produk'] = array_values($_SESSION['produk']); // Perbaiki index array
            break;
        }
    }

    header("Location: main.php");
    exit;
}

// Ambil produk yang akan diedit
$produk_edit = null;
if (isset($_GET['edit'])) {
    foreach ($_SESSION['produk'] as $index => $produk) {
        if ($produk->getId() == $_GET['edit']) {
            $produk_edit = $produk;
            $produk_index = $index;
            break;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshop - CRUD Tanpa Database</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        img { max-width: 100px; max-height: 100px; }
    </style>
</head>
<body>
    <h2>Daftar Produk Petshop</h2>

    <!-- Form Pencarian -->
    <form method="GET">
        <label>Cari Produk:</label>
        <input type="text" name="search" placeholder="Masukkan nama atau kategori" value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>">
        <button type="submit">Cari</button>
        <a href="main.php"><button type="button">Reset</button></a>
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
        <?php 
        $search = isset($_GET['search']) ? strtolower($_GET['search']) : '';

        foreach ($_SESSION['produk'] as $index => $produk) :
            $nama = strtolower($produk->getNamaProduk());
            $kategori = strtolower($produk->getKategoriProduk());

            // Filter pencarian
            if ($search && strpos($nama, $search) === false && strpos($kategori, $search) === false) {
                continue;
            }
        ?>
            <tr>
                <td><?= $produk->getId(); ?></td>
                <td><?= $produk->getNamaProduk(); ?></td>
                <td><?= $produk->getKategoriProduk(); ?></td>
                <td>Rp<?= number_format($produk->getHargaProduk(), 0, ',', '.'); ?></td>
                <td>
                    <?php if (!empty($produk->getFotoProduk())) : ?>
                        <img src="<?= $produk->getFotoProduk(); ?>" alt="Foto Produk">
                    <?php else : ?>
                        Tidak ada foto
                    <?php endif; ?>
                </td>
                <td>
                    <a href="main.php?edit=<?= $produk->getId(); ?>">Edit</a> |
                    <a href="main.php?hapus=<?= $produk->getId(); ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Tambah Produk</h2>
    <form method="post" enctype="multipart/form-data">
        <label>Nama Produk:</label>
        <input type="text" name="nama_produk" required><br>
        <label>Kategori:</label>
        <input type="text" name="kategori_produk" required><br>
        <label>Harga:</label>
        <input type="number" name="harga_produk" required><br>
        <label>Foto:</label>
        <input type="file" name="foto_produk"><br>
        <button type="submit" name="tambah">Tambah Produk</button>
    </form>

    <?php if ($produk_edit !== null) : ?>
        <h2>Edit Produk</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $produk_edit->getId(); ?>">
            <input type="hidden" name="index" value="<?= $produk_index; ?>">
            <label>Nama Produk:</label>
            <input type="text" name="nama_produk" value="<?= $produk_edit->getNamaProduk(); ?>" required><br>
            <label>Kategori:</label>
            <input type="text" name="kategori_produk" value="<?= $produk_edit->getKategoriProduk(); ?>" required><br>
            <label>Harga:</label>
            <input type="number" name="harga_produk" value="<?= $produk_edit->getHargaProduk(); ?>" required><br>
            <label>Foto:</label>
            <input type="file" name="foto_produk"><br>
            <p>Foto Saat Ini:</p>
            <?php if (!empty($produk_edit->getFotoProduk())) : ?>
                <img src="<?= $produk_edit->getFotoProduk(); ?>" alt="Foto Produk">
            <?php else : ?>
                Tidak ada foto
            <?php endif; ?>
            <br>
            <button type="submit" name="update">Update Produk</button>
        </form>
    <?php endif; ?>
</body>
</html>
