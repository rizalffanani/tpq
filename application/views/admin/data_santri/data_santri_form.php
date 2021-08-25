<form action="<?php echo $action; ?>" method="post">
        <div class="form-group">
            <label for="varchar">Nomor Induk <?php echo form_error('nomor_induk') ?></label>
            <input type="number" class="form-control" name="nomor_induk" id="nomor_induk" placeholder="Nomor Induk" value="<?php echo $nomor_induk; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Lengkap <?php echo form_error('nama_lengkap') ?></label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Panggilan <?php echo form_error('nama_panggilan') ?></label>
            <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan" placeholder="Nama Panggilan" value="<?php echo $nama_panggilan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tempat Lahir <?php echo form_error('tempat_lahir') ?></label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir" value="<?php echo $tempat_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Lahir <?php echo form_error('tanggal_lahir') ?></label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir" value="<?php echo $tanggal_lahir; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">Anak Ke <?php echo form_error('anak_ke') ?></label>
            <input type="number" class="form-control" name="anak_ke" id="anak_ke" placeholder="Anak Ke" value="<?php echo $anak_ke; ?>" />
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
            <label for="varchar">Pekerjaan Ayah <?php echo form_error('pekerjaan_ayah') ?></label>
            <input type="text" class="form-control" name="pekerjaan_ayah" id="pekerjaan_ayah" placeholder="Pekerjaan Ayah" value="<?php echo $pekerjaan_ayah; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Pekerjaan Ibu <?php echo form_error('pekerjaan_ibu') ?></label>
            <input type="text" class="form-control" name="pekerjaan_ibu" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" value="<?php echo $pekerjaan_ibu; ?>" />
        </div>
	    <div class="form-group">
            <label for="alamat_ortu">Alamat Ortu <?php echo form_error('alamat_ortu') ?></label>
            <textarea class="form-control" rows="3" name="alamat_ortu" id="alamat_ortu" placeholder="Alamat Ortu"><?php echo $alamat_ortu; ?></textarea>
        </div>
	    <div class="form-group">
            <label for="varchar">Telepon Ortu <?php echo form_error('telepon_ortu') ?></label>
            <input type="text" class="form-control" name="telepon_ortu" id="telepon_ortu" placeholder="Telepon Ortu" value="<?php echo $telepon_ortu; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kelurahan <?php echo form_error('kelurahan') ?></label>
            <input type="text" class="form-control" name="kelurahan" id="kelurahan" placeholder="Kelurahan" value="<?php echo $kelurahan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kecamatan <?php echo form_error('kecamatan') ?></label>
            <input type="text" class="form-control" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?php echo $kecamatan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kota <?php echo form_error('kota') ?></label>
            <input type="text" class="form-control" name="kota" id="kota" placeholder="Kota" value="<?php echo $kota; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Provinsi <?php echo form_error('provinsi') ?></label>
            <input type="text" class="form-control" name="provinsi" id="provinsi" placeholder="Provinsi" value="<?php echo $provinsi; ?>" />
        </div>
	    <!-- <div class="form-group">
            <label for="varchar">Foto <?php echo form_error('foto') ?></label>
            <input type="text" class="form-control" name="foto" id="foto" placeholder="Foto" value="<?php echo $foto; ?>" />
        </div> -->
	    <div class="form-group">
            <!-- <label for="date">Tanggal Masuk <?php echo form_error('tanggal_masuk') ?></label> -->
            <input type="hidden" class="form-control" name="tanggal_masuk" id="tanggal_masuk" value="<?= date('Y-m-d')?>" placeholder="Tanggal Masuk" value="<?php echo $tanggal_masuk; ?>" />
        </div>
	    <input type="hidden" name="id_santri" value="<?php echo $id_santri; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/data_santri') ?>" class="btn btn-default">Cancel</a>
	</form>