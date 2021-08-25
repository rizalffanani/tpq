<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Nip <?php echo form_error('nip') ?></label>
            <input type="number" class="form-control" name="nip" id="nip" placeholder="Nip" value="<?php echo $nip; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ustadz <?php echo form_error('nama_ustadz') ?></label>
            <input type="text" class="form-control" name="nama_ustadz" id="nama_ustadz" placeholder="Nama Ustadz" value="<?php echo $nama_ustadz; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <select class="form-control" name="status" id="status">
                <option <?= ($status=="") ? "selected='selected'" : "" ;?>>Pilih</option>
                <option value="Mub. Tugasan" <?= ($status=="Mub. Tugasan") ? "selected='selected'" : "" ;?>>Mub. Tugasan</option>
                <option value="Mub. Setempat" <?= ($status=="Mub. Setempat") ? "selected='selected'" : "" ;?>>Mub. Setempat</option>
                <option value="Asisten" <?= ($status=="Asisten") ? "selected='selected'" : "" ;?>>Asisten</option>
            </select>
        </div>
	    <div class="form-group">
            <label for="enum">Jk <?php echo form_error('jk') ?></label>
            <select class="form-control" name="jk" id="jk">
                <option <?= ($jk=="") ? "selected='selected'" : "" ;?>>Pilih</option>
                <option value="L" <?= ($jk=="L") ? "selected='selected'" : "" ;?>>L</option>
                <option value="P" <?= ($jk=="P") ? "selected='selected'" : "" ;?>>P</option>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Lahir <?php echo form_error('tgl_lahir') ?></label>
            <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" placeholder="Tgl Lahir" value="<?php echo $tgl_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
            <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ayah <?php echo form_error('nama_ayah') ?></label>
            <input type="text" class="form-control" name="nama_ayah" id="nama_ayah" placeholder="Nama Ayah" value="<?php echo $nama_ayah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Ibu <?php echo form_error('nama_ibu') ?></label>
            <input type="text" class="form-control" name="nama_ibu" id="nama_ibu" placeholder="Nama Ibu" value="<?php echo $nama_ibu; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat_ortu">Alamat Ortu <?php echo form_error('alamat_ortu') ?></label>
            <textarea class="form-control" rows="3" name="alamat_ortu" id="alamat_ortu" placeholder="Alamat Ortu"><?php echo $alamat_ortu; ?></textarea>
        </div>
	    <input type="hidden" name="tgl_masuk" value="<?php echo date('Y-m-d'); ?>" /> 
        <input type="hidden" name="id_ustadz" value="<?php echo $id_ustadz; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/data_ustadz') ?>" class="btn btn-default">Cancel</a>
	</form>