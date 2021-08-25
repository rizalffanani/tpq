<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Id Klstpq <?php echo form_error('id_klstpq') ?></label>
            <input type="text" class="form-control" name="id_klstpq" id="id_klstpq" placeholder="Id Klstpq" value="<?php echo $id_klstpq; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Tpq <?php echo form_error('id_tpq') ?></label>
            <input type="text" class="form-control" name="id_tpq" id="id_tpq" placeholder="Id Tpq" value="<?php echo $id_tpq; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Tpq <?php echo form_error('nama_tpq') ?></label>
            <input type="text" class="form-control" name="nama_tpq" id="nama_tpq" placeholder="Nama Tpq" value="<?php echo $nama_tpq; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Kelas <?php echo form_error('id_kelas') ?></label>
            <input type="text" class="form-control" name="id_kelas" id="id_kelas" placeholder="Id Kelas" value="<?php echo $id_kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Kelas <?php echo form_error('nama_kelas') ?></label>
            <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" placeholder="Nama Kelas" value="<?php echo $nama_kelas; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Jenjang <?php echo form_error('id_jenjang') ?></label>
            <input type="text" class="form-control" name="id_jenjang" id="id_jenjang" placeholder="Id Jenjang" value="<?php echo $id_jenjang; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Jenjang <?php echo form_error('nama_jenjang') ?></label>
            <input type="text" class="form-control" name="nama_jenjang" id="nama_jenjang" placeholder="Nama Jenjang" value="<?php echo $nama_jenjang; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Id Tahun Ajaran <?php echo form_error('id_tahun_ajaran') ?></label>
            <input type="text" class="form-control" name="id_tahun_ajaran" id="id_tahun_ajaran" placeholder="Id Tahun Ajaran" value="<?php echo $id_tahun_ajaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ajaran <?php echo form_error('nama_ajaran') ?></label>
            <input type="text" class="form-control" name="nama_ajaran" id="nama_ajaran" placeholder="Nama Ajaran" value="<?php echo $nama_ajaran; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Semester <?php echo form_error('semester') ?></label>
            <input type="text" class="form-control" name="semester" id="semester" placeholder="Semester" value="<?php echo $semester; ?>" />
        </div>
	    <input type="hidden" name="" value="<?php echo $; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/view_kelas') ?>" class="btn btn-default">Cancel</a>
	</form>