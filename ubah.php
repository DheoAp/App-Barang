<?php

require 'functions.php';   

$id = $_GET["id"];
$brg = query("SELECT * FROM barang WHERE id =$id")[0];

if(isset($_POST["submit"])){

  if(ubah($_POST) > 0){
    echo "<script>
    alert('data berhasil diubah!');
    document.location.href = 'index.php';
  </script>>";
  }else{
    echo "
    <script>
      alert('data gagal diubah!');
      document.location.href = 'index.php';
    </script>
  ";            
  } 
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data</title>
</head>
<body>
  <h3>Ubah Data</h3>
<form action="" method="post">
  <input type="hidden" name="id" value="<?=$brg["id"]?>">
  <table>
    <tr>
      <td colspan="2"><h2>Data Barang</h2></td>
    </tr>
    <tr>
      <td>
        <label for="nama_barang">Nama Barang</label>
      </td>
      <td>
        <input type="text" id="nama_barang" name="nama_barang" require value="<?=$brg["nama_barang"];?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="jenis_barang">Jenis Barang</label>
      </td>
      <td>
        <input type="text" id="jenis_barang" name="jenis_barang" require value="<?=$brg["jenis_barang"];?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="jumlah_barang">Jumlah Barang</label>
      </td>
      <td>
        <input type="text" id="jumlah_barang" name="jumlah_barang" require value="<?=$brg["jumlah_barang"];?>">
      </td>
    </tr>
    <tr>
      <td>
        <label for="nama_vendor">Nama Vendor</label>
      </td>
      <td>
        <input type="text" id="nama_vendor" name="nama_vendor"
        require value="<?=$brg["nama_vendor"];?>">
      </td>
    </tr>
    <tr>
      <td><button type="submit" name="submit">Ubah Data</button></td>
    </tr>
  </table>
  </form>
</body>
</html>