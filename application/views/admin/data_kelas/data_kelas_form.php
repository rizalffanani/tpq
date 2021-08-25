<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Kelas <?php echo form_error('nama_kelas') ?></label>
            <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas" value="<?php echo $nama_kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Jenjang <?php echo form_error('id_jenjang') ?></label>
            <?php echo cmb_dinamis('id_jenjang', 'data_jenjang', 'nama_jenjang', 'id_jenjang', $id_jenjang) ?>
            
        </div>
	    <input type="hidden" name="id_kelas" value="<?php echo $id_kelas; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/data_kelas') ?>" class="btn btn-default">Cancel</a>
	</form>