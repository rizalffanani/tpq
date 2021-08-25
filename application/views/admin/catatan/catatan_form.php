<form action="<?php echo $action; ?>" method="post">
	    <input type="hidden" class="form-control" name="id_kelas_siswa" id="id_kelas_siswa" placeholder="Id Kelas Siswa" value="<?php echo $id_kelas_siswa; ?>" />
        <input type="hidden" name="id_klstpq" value="<?php echo $id_klstpq; ?>" >
	    <div class="form-group">
            <label for="int">Kelakuan <?php echo form_error('kelakuan') ?></label>
            <input type="text" class="form-control" name="kelakuan" id="kelakuan" placeholder="Kelakuan" value="<?php echo $kelakuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kerajinan <?php echo form_error('kerajinan') ?></label>
            <input type="text" class="form-control" name="kerajinan" id="kerajinan" placeholder="Kerajinan" value="<?php echo $kerajinan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Kebersihan <?php echo form_error('kebersihan') ?></label>
            <input type="text" class="form-control" name="kebersihan" id="kebersihan" placeholder="Kebersihan" value="<?php echo $kebersihan; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Izin <?php echo form_error('izin') ?></label>
            <input type="text" class="form-control" name="izin" id="izin" placeholder="Izin" value="<?php echo $izin; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Sakit <?php echo form_error('sakit') ?></label>
            <input type="text" class="form-control" name="sakit" id="sakit" placeholder="Sakit" value="<?php echo $sakit; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Alpa <?php echo form_error('alpa') ?></label>
            <input type="text" class="form-control" name="alpa" id="alpa" placeholder="Alpa" value="<?php echo $alpa; ?>" />
        </div>
	    <div class="form-group">
            <label for="catatan">Catatan <?php echo form_error('catatan') ?></label>
            <textarea class="form-control" rows="3" name="catatan" id="catatan" placeholder="Catatan"><?php echo $catatan; ?></textarea>
        </div>
	    <input type="hidden" name="id_catatan" value="<?php echo $id_catatan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/catatan') ?>" class="btn btn-default">Cancel</a>
	</form>