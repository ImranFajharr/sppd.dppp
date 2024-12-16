<?php
session_start();
include "../../config/koneksi.php";

$module=$_GET[module];
$act=$_GET[act];

if ($module=='pegawai' AND $act=='update'){
    mysql_query("UPDATE pegawai SET nip  = '$_POST[nip]',
								 nama = '$_POST[nama]',
								 pangkat = '$_POST[pangkat]',
								 id_golongan = '$_POST[golongan]',
								 jabatan = '$_POST[jabatan]',
								 unitkerja = '$_POST[unitkerja]'
								 WHERE  id_pegawai     = '$_POST[id]'");
	
  header('location:../../media.php?module='.$module);
}
elseif ($module=='pegawai' AND $act=='hapus') {
	mysql_query("DELETE FROM pegawai WHERE id_pegawai='$_GET[id]'");
  header('location:../../media.php?module='.$module);
}
elseif ($module=='pegawai' AND $act=='input'){
	  mysql_query("INSERT INTO pegawai(nip,nama,pangkat,id_golongan,jabatan,unitkerja,username,password) 
	  VALUES('$_POST[nip]','$_POST[nama]','$_POST[pangkat]','$_POST[golongan]','$_POST[jabatan]','$_POST[unitkerja]',
	  '$_POST[nip]','$_POST[nip]')");
  header('location:../../media.php?module='.$module);
}

?>

