<?php
include "../../config/koneksi.php";
$tampil = mysql_query("SELECT * FROM instansi");
$rin=mysql_fetch_array($tampil);

?>
<style>
h2,h1,h3{ padding:0;margin:0;}
h1 {font-size:22px;font-weight:bold}
h2 {font-size:22px;font-weight:normal}
#wrapper {
	width:780px;
	margin:0 auto;
}
#ol {margin:0}
#logo {
	width:95px;
	float:left;	
}
hr{border-bottom: 5px double #000;}

hd{border-bottom: 2px double #000;}

#cop {
	text-align:center;
}

#kodepos{clear:both;text-align:right}
#header {clear:both;text-align:center}

#garis1{border-top:double 1px #000000;border-bottom:1px solid #000}
#garis2 {border-bottom:1px solid #000}
#garis3{border-bottom:3px solid #000}
#g4{border-right:1px solid #000}
#table {
	font-family: Verdana, Arial, Helvetica, sans-serif; 
	font-size: 10pt;
	border-width: 1px;
	border-style: solid;
	border-color: #000;
	border-collapse: collapse;
	margin: 10px 0px;
}
#table td{
	padding: 0.4em;
	border-right:1px solid #000;
}

</style>
<body onLoad="javascript:print()">
<div id="wrapper">
<div id="logo"><img src="../../palopo.jpg" width="95" height="100"></div>
<div id="cop">
  <h1><span style="text-transform:uppercase"><?= $rin['keteranganinstansi']?></span></h2>
  <h2><span style="text-transform:uppercase"><?= $rin['namainstansi']?></span></h1>
  <?= $rin['alamatlengkapinstansi']?><br/>Telp. <?= $rin['telp']?> Fax. <?= $rin['faks']?> Kode Pos : <?= $rin['kodepos']?><br>
</div>
<div id="kodepos"></div>
<hr>
<?php
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
$tampil = mysql_query("SELECT * FROM instansi");
$rin=mysql_fetch_array($tampil);

      $t = mysql_fetch_array(mysql_query("SELECT * FROM lpd,pegawai,spt,golongan WHERE lpd.id_pegawai=pegawai.id_pegawai 
	  AND lpd.id_spt=spt.id_spt AND lpd.id_lpd='$_GET[id]' AND pegawai.id_golongan=golongan.id_golongan"));
	  $tanggalnya = tgl_indo($t['tanggal']);
	 
echo "

	 <table>
	 
	 <tr><td>Kepada			</td><td> : Kepala Dinas Pertanian, Peternakan dan Perkebunan </td></tr>
	 <tr><td>Dari			</td><td> : $t[nama] </td></tr>
	 <tr><td>Nip </td><td> : $t[nip]</td></tr>
	 <tr><td>Pangkat / Golongan </td><td> : $t[pangkat] / $t[golongan] </td></tr>
	 <tr><td>Jabatan			</td><td> : $t[jabatan] </td></tr>
	 <tr><td>Perihal		</td><td> : Laporan Hasil Perjalanan Dinas </td></tr>
	 <tr></tr>
	   <tr></tr>
	    <tr></tr>
	   <tr></tr>
	 </table>";	 
	 
	 echo "<div id='garis1'></div>";	
	 
	  
echo "
<div id='header'>
<h2><u>LAPORAN HASIL PERJALANAN DINAS</u> </h2>";




  $c = mysql_fetch_array(mysql_query("SELECT * FROM spt,nppt,tujuan WHERE spt.id_nppt=nppt.id_nppt AND spt.id_spt='$t[id_spt]' AND tujuan.id_tujuan=nppt.id_tujuan"));
  $tgl_pergi = tgl_indo($c['tgl_pergi']);
  $tgl_kembali = tgl_indo($c['tgl_kembali']);
echo " 
<br /> 
<div style='text-align:left;'>
Telah melaksanakan Perjalanan Dinas dalam rangka $c[tugas] , berdasarkan
		  Surat Perintah Tugas Nomor : $c[no_spt] , dari tanggal $tgl_pergi s/d $tgl_kembali di $c[tujuan]";
		  

echo "<br /><br />$t[hasil]<br />";	
echo "Demikianlah Laporan Hasil Perjalanan Dinas ini dibuat untuk dipergunakan sebagaimana mestinya.<br /><br />";


echo "<div style='text-align:center;width:300px;float:right;'>
	  $rin[kotainstansi] , $tanggalnya<br>Yang Membuat Laporan";
echo "<br /><br /><br />";
echo "<br /><br /><br />";
echo "<b><u>
	  <div style='text-transform:uppercase;margin:0;padding:0'>$t[nama]</div></u></b>
	  NIP:$t[nip]
	  </div>";
	 
?>
</div>
</body>
