<?php
// Baca lokasi file sementar dan nama file dari form (fupload)
$lokasi_file = $_FILES['fupload']['tmp_name'];
$nama_siswa   = $_FILES['fupload']['nama_berkas'];
$nama_file   = $_FILES['fupload']['name'];

// Tentukan folder untuk menyimpan file
$folder = "files2/$nama_file";
// tanggal sekarang
$tgl_upload = date("Ymd");
// Apabila file berhasil di upload
if (move_uploaded_file($lokasi_file,"$folder")){
  echo "Nama File : <b>$nama_file</b> sukses di upload";
  
  // Masukkan informasi file ke database
  $konek = mysqli_connect("localhost","root","","codegoo_ahp");

  $query = "INSERT INTO tbl_upload_berkas (nama, nama_berkas, deskripsi, tgl_upload)
            VALUES('$nama_file','$nama_siswa', '$_POST[deskripsi]', '$tgl_upload')";
            
  mysqli_query($konek, $query);
  header("Location: http://localhost/program_april/dashboard.php?page=upload_berkas_siswa");
die();
}
else{
  echo "File gagal di upload";
}
?>