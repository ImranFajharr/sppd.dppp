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
<table>
			<tr><td width=200>Kepada	</td><td>:  Walikota Palopo</td></tr>
			<tr><td>Dari					</td><td>: Dinas Pertanian, Peternakan dan Perkebunan Kota Palopo</td></tr>
		     <tr><td>Tanggal	</td><td>: <?=date('d-m-Y') ?></td></tr>
			 <tr><td>Perihal					</td><td>: Ajuan Persetujuan Perjalanan Dinas</td></tr>
			 <tr></tr></table>
			 <div id='garis1'></div>
<div id='header'>
<h2><u>NOTA AJUAN PERJALANAN DINAS</u></h2>
<?php
include "../../config/koneksi.php";
include "../../config/fungsi_indotgl.php";
$tampil = mysql_query("SELECT * FROM instansi");
$rin=mysql_fetch_array($tampil);

$qry=mysql_query("Select * FROM nppt WHERE id_nppt='$_GET[id]'");
$r=mysql_fetch_array($qry);
$value= explode("-",$r['id_pegawai']);
$no=0;
echo "<ol>";
for ($i=0;$i<count($value);$i++) {
	$data=$value[$i];
	$no++;
	$qs=mysql_query("Select * from pegawai,golongan WHERE id_pegawai='$data'AND golongan.id_golongan=pegawai.id_golongan");
	$t=mysql_fetch_array($qs); 
	
	echo "<table>
			<tr><td width=250>$no.Nama			</td><td>: <b> $t[nama]</b></td></tr>
			<tr><td>&nbsp; &nbsp;Nip					</td><td>: $t[nip]</td></tr>
		     <tr><td>&nbsp; &nbsp;Pangkat/Golongan Ruang	</td><td>: $t[pangkat]/$t[golongan]</td></tr>
			 <tr><td>&nbsp; &nbsp;Jabatan					</td><td>: $t[jabatan]</td></tr>
			 <tr><td>&nbsp; &nbsp;Unit Kerja				</td><td>: $t[unitkerja]</td></tr>
			 <tr></tr></table>";		
}
echo "<br>Mohon diberikan surat Perintah Tugas & Surat Perintah Perjalanan Dinas</ol>";
$qry=mysql_query("Select * FROM nppt,tujuan,transportasi WHERE id_nppt='$_GET[id]' AND nppt.id_tujuan=tujuan.id_tujuan
AND nppt.id_transportasi=transportasi.id_transportasi");
$t=mysql_fetch_array($qry);
$tglpergi= tgl_indo ($t['tgl_pergi']);
$tglkembali= tgl_indo ($t['tgl_kembali']);

	echo "<ol><table>
			<tr><td width=250>1. Tempat Tujuan		</td><td>: <b> $t[tujuan]</td></tr>
		     <tr><td>2. Maksud Perjalanan Dinas		</td><td>: $t[maksud]</td></tr>
			 <tr><td>3. Kendaraan Yang Dipergunakan	</td><td>: $t[transportasi]</td></tr>
			 <tr><td>4.	Lama Perjalanan				</td><td>: $t[lama] hari</td></tr>
			 <tr><td>&nbsp;&nbsp;&nbsp;a.  Tanggal Berangkat	</td><td>: $tglpergi</td></tr>
			 <tr><td>&nbsp;&nbsp;&nbsp;b.  Tanggal Kembali	</td><td>: $tglkembali</td></tr>
			 </table></ol>";	
?>
<div style="width:300px;float:right;text-align:center">
<span style="text-transform:uppercase"><?= $rin['kotainstansi']?></span>,
<?=date('d-m-Y') ?><br>
<div style="font-weight:bold;text-align:center">
Kepala Dinas<br/> 
<p>&nbsp;</p>
<br />
<p><u>Muhammad Ibnu Hasyim, S.STP</u><br>
NIP. 19591010 199103 1 003</p></div>
</div>
</body>