<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Mapel <?php echo form_error('nama_mapel') ?></label>
            <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" placeholder="Nama Mapel" value="<?php echo $nama_mapel; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jenis Mapel <?php echo form_error('id_jenis_mapel') ?></label>
            <?php echo cmb_dinamis('id_jenis_mapel', 'data_jenis_mapel', 'nama_jenis_mapel', 'id_jenis_mapel', $id_jenis_mapel) ?>
        </div>
	    <input type="hidden" name="id_mapel" value="<?php echo $id_mapel; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/data_mapel') ?>" class="btn btn-default">Cancel</a>
	</form>