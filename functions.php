<?php 
$koneksi = mysqli_connect("localhost","root","admin123","db_barang");

function query($query){
  global $koneksi;

  $result = mysqli_query($koneksi,$query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)){
    $rows[] =$row;
  }
  return $rows;
}


function tambah($data){
  global $koneksi;

  $nama_barang  = htmlspecialchars($data["nama_barang"]);
  $jenis_barang = htmlspecialchars($data["jenis_barang"]);
  $jumlah_barang = htmlspecialchars($data["jumlah_barang"]);
  $nama_vendor = htmlspecialchars($data["nama_vendor"]);

  $query = "INSERT INTO barang 
  VALUES(null,'$nama_barang','$jenis_barang','$jumlah_barang','$nama_vendor')";
  
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);

}


function hapus($hapus){
  global $koneksi;
  mysqli_query($koneksi,"DELETE FROM barang WHERE id=$hapus");

  return mysqli_affected_rows($koneksi);

}


function ubah($ubah){
  global $koneksi;

  $id = $ubah["id"];
  $nama_barang  = htmlspecialchars($ubah["nama_barang"]);
  $jenis_barang = htmlspecialchars($ubah["jenis_barang"]);
  $jumlah_barang = htmlspecialchars($ubah["jumlah_barang"]);
  $nama_vendor = htmlspecialchars($ubah["nama_vendor"]);

  $query = "UPDATE barang SET
            nama_barang = '$nama_barang',
            jenis_barang = '$jenis_barang',
            jumlah_barang = '$jumlah_barang',
            nama_vendor = '$nama_vendor'
            WHERE id = '$id' 
          ";
  
  mysqli_query($koneksi, $query);

  return mysqli_affected_rows($koneksi);
}

function cari($keyword){
  $query = "SELECT * FROM barang WHERE 
            nama_barang  LIKE '%$keyword%' OR
            jenis_barang LIKE '%$keyword%' OR
            nama_vendor LIKE '%$keyword%'
           ";
           
  return query($query);
}

?>