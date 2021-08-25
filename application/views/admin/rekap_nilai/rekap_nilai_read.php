<table class="table">
		<!-- <?php foreach ($datas as $key => $value){?>
	    <tr><td>Id Klstpq</td><td><?php echo $id_klstpq; ?></td></tr>
	    <?php }?>
	    <tr><td></td><td><a href="<?php echo site_url('admin/view_kelas') ?>" class="btn btn-default">Cancel</a></td></tr> -->
	</table>
	<table class="table">
				
		<tbody>
			<tr>
				<td style="width: 5%">No</td>
				<td>Mata Pelajaran</td>
				<td>Nilai</td>
			</tr>

			<?php $no=1; foreach ($group as $key => $vals) {?>
			<tr>
				<td><?= $no++;?></td>
				<td style="text-align: left;"><?= $vals->nama_mapel?></td>
				<td><?= $vals->nilai?></td>
			</tr>
			
			<?php $id_klstpq=$vals->id_klstpq;$id_kelas_siswa=$vals->id_kelas_siswa; }?>
			
		</tbody>
	</table>  
	<table class="table">
		<tbody>	
			<tr><td>Kelakuan</td><td><?php echo $kelakuan; ?></td></tr>
		    <tr><td>Kerajinan</td><td><?php echo $kerajinan; ?></td></tr>
		    <tr><td>Kebersihan</td><td><?php echo $kebersihan; ?></td></tr>
		    <tr><td>Izin</td><td><?php echo $izin; ?></td></tr>
		    <tr><td>Sakit</td><td><?php echo $sakit; ?></td></tr>
		    <tr><td>Alpa</td><td><?php echo $alpa; ?></td></tr>
		    <tr><td>Catatan</td><td><?php echo $catatan; ?></td></tr>
		    <tr>			
				<td colspan="2">
    				<a href="<?= base_url() ?>admin/kelas_santri/raport/<?php echo $id_klstpq; ?>/<?php echo $id_kelas_siswa; ?>" target="_blank" class="btn btn-warning">Print</a>
					<a href="<?php echo site_url('admin/view_kelas') ?>" class="btn btn-default">Cancel</a>
				</td>				
				<td ></td>
			</tr> 
		</tbody>
	</table>   