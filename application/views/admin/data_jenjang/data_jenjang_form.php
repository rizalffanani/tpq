<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Jenjang <?php echo form_error('nama_jenjang') ?></label>
            <input type="text" class="form-control" name="nama_jenjang" id="nama_jenjang" placeholder="Nama Jenjang" value="<?php echo $nama_jenjang; ?>" />
        </div>
	    <input type="hidden" name="id_jenjang" value="<?php echo $id_jenjang; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/data_jenjang') ?>" class="btn btn-default">Cancel</a>
	</form>