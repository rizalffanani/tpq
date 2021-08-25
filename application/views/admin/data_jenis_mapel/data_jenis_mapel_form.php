<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Jenis Mapel <?php echo form_error('nama_jenis_mapel') ?></label>
            <input type="text" class="form-control" name="nama_jenis_mapel" id="nama_jenis_mapel" placeholder="Nama Jenis Mapel" value="<?php echo $nama_jenis_mapel; ?>" />
        </div>
	    <input type="hidden" name="id_jenis_mapel" value="<?php echo $id_jenis_mapel; ?>" /> 
	    <input type="hidden" name="id_klstpq" value="<?php echo $id_klstpq; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/data_jenis_mapel') ?>" class="btn btn-default">Cancel</a>
	</form>