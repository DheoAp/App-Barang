<?php 
    require 'functions.php'; 

    if(isset($_POST["submit"])){

      if(tambah($_POST) > 0){
        echo " <style>h3{background-color:lightblue;}</style><h3>Data Berhasil di simpan</h3>";
      }else{
        echo "
        <script>
          alert('data gagal ditambahkan!');
          document.location.href = 'index.php';
        </script>
      ";            
      } 
    }
    $data_barang = query("SELECT * FROM barang ORDER BY id DESC");

    // $cari_data = query("SELECT * FROM barang ORDER BY id DESC");

    if(isset($_POST["cari"])){
      $data_barang = cari($_POST["keyword"]);
    }

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Barang</title>
</head>
<body>
  <form action="" method="post">
  <table>
    <tr>
      <td colspan="2"><h2>Data Barang</h2></td>
    </tr>
    <tr>
      <td>
        <label for="nama_barang">Nama Barang</label>
      </td>
      <td>
        <input type="text" id="nama_barang" name="nama_barang">
      </td>
    </tr>
    <tr>
      <td>
        <label for="jenis_barang">Jenis Barang</label>
      </td>
      <td>
        <input type="text" id="jenis_barang" name="jenis_barang">
      </td>
    </tr>
    <tr>
      <td>
        <label for="jumlah_barang">Jumlah Barang</label>
      </td>
      <td>
        <input type="text" id="jumlah_barang" name="jumlah_barang">
      </td>
      
    </tr>
    <tr>
      <td>
        <label for="nama_vendor">Nama Vendor</label>
      </td>
      <td>
        <input type="text" id="nama_vendor" name="nama_vendor">
      </td>
    </tr>
    <tr>
      <td><button type="submit" name="submit">Tambah Data</button></td>
    </tr>
  </table>
  </form>
  

  <hr>
  <form action="" method="post">
    <input type="text" name="keyword" size="35" autocomplete="off" autofocus placeholder="Masukan Keyword Pecarian">
    <button type="submit" name="cari">Cari</button>
  </form>
  <br>
  <table border="1px" cellpadding="10" cellspacing="0">
    <tr>
      <th>No</th>
      <th>Nama Barang</th>
      <th>Jenis Barang</th>
      <th>Jumlah Barang</th>
      <th>Nama Vendor</th>
      <th>Aksi</th>
    </tr>
    <?php $i = 1;?>
    <?php foreach( $data_barang as $data) : ?>
      <tr>
        <td><?=$i;?></td>
        <td><?=$data["nama_barang"];?></td>
        <td><?=$data["jenis_barang"];?></td>
        <td><?=$data["jumlah_barang"];?></td>
        <td><?=$data["nama_vendor"];?></td>
        <td>
          <a href="ubah.php?id=<?=$data["id"];?>">Ubah</a>
          <a href="hapus.php?id=<?=$data["id"];?>" onclick="return confirm('Yakin?');">Hapus</a>
        </td>
      </tr>
    <?php $i++;?>
    <?php endforeach; ?>
  </table>

</body>
</html>