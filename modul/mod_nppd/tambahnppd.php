<?php
$aksi="modul/mod_nppd/aksi_nppd.php";
?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-envelope-open"></i> Data NPPD (Nota Permintaan Perjalanan Dinas)</h1>

	<a href="?module=nppd" class="btn btn-secondary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-warning"><i class="fas fa-fw fa-plus"></i> Tambah Data NPPD</h6>
    </div>
	
	<form method="POST" action="<?=$aksi?>?module=nppd&act=input">
		<div class="card-body">
			<div class="row">
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Pilih Pegawai</label>
					<select name="id_pegawai[]" required class="form-control selectpicker" multiple>
					<?php
						$tam1=mysql_query("SELECT * FROM pegawai");
						while ($k=mysql_fetch_array($tam1)) {
							echo "<option value='$k[id_pegawai]'>$k[nama]</option>";
						}
					?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Pilih Lokasi Tujuan</label>
					<select name="tujuan" required class="form-control">
						<option value="" selected>--Pilih Lokasi Tujuan--</option>
					<?php
						$tampil=mysql_query("SELECT * FROM tujuan");
						while($w=mysql_fetch_array($tampil)){
							echo "<option value='$w[id_tujuan]'>$w[tujuan]</option>";
						}
					?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Maksud Tujuan Perjalanan</label>
					<input autocomplete="off" type="text" name="maksud" required class="form-control"/>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Jenis Transportasi</label>
					<select name="id_transportasi[]" required class="form-control selectpicker" multiple>
					<?php
						$tam1=mysql_query("SELECT * FROM transportasi");
						while ($k=mysql_fetch_array($tam1)) {
							echo "<option value='$k[id_transportasi]'>$k[transportasi]</option>";
						}
					?>
					</select>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tanggal Pergi</label>
					<input autocomplete="off" type="date" name='tgl_pergi' id='tgl_pergi' required class="form-control"/>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Tanggal Pulang</label>
					<input autocomplete="off" type="date" name='tgl_kembali' id='tgl_kembali' required class="form-control"/>
				</div>
				<div class="form-group col-md-6">
					<label class="font-weight-bold">Lama Perjalanan</label>
					<input autocomplete="off" type="text" name="lama" id="lama" required class="form-control"/>
				</div>
			</div>
		</div>
		<div class="card-footer text-right">
            <button name="submit" type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            <button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
        </div>
	</form>
</div>
?>