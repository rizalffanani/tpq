<div class="col-md-4">
                <?php echo anchor(site_url('admin/kelas_santri/index/'.$id_klstpq), 'Kembali', 'class="btn btn-success"'); ?>
            </div>
<table class="table">
	    <!-- <tr><td>Id Kelas Siswa</td><td><?php echo $id_kelas_siswa; ?></td></tr> -->
	    <tr><td>Kelakuan</td><td><?php echo $kelakuan; ?></td></tr>
	    <tr><td>Kerajinan</td><td><?php echo $kerajinan; ?></td></tr>
	    <tr><td>Kebersihan</td><td><?php echo $kebersihan; ?></td></tr>
	    <tr><td>Izin</td><td><?php echo $izin; ?></td></tr>
	    <tr><td>Sakit</td><td><?php echo $sakit; ?></td></tr>
	    <tr><td>Alpa</td><td><?php echo $alpa; ?></td></tr>
	    <tr><td>Catatan</td><td><?php echo $catatan; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/catatan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>