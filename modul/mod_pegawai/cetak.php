
<body onLoad="javascript:print()">
<div align="center">
<?php
include "../../config/koneksi.php";
      $tampil = mysql_query("SELECT * FROM pegawai,golongan WHERE pegawai.id_golongan=golongan.id_golongan ");
  echo   "<h2>DATA PEGAWAI</h2><br/>
    		<table border='1' cellpadding='5'>
          <thead><tr><th>No</th><th>NIP</th><th>Nama</th><th>Pangkat</th><th>Golongan</th><th>Jabatan</th></tr></thead>";
    $no=1;
	echo "<tbody>";
    while ($r=mysql_fetch_array($tampil)){
       echo "<tr align='center'><td>$no</td>
             <td>$r[nip]</td>
             <td>$r[nama]</td>
		     <td>$r[pangkat]</td>
		     <td>$r[golongan]</td>
			 <td>$r[jabatan]</td>
			 </tr>";
      $no++;
    }
    echo "</tbody></table>";
?>
</div>
</body>