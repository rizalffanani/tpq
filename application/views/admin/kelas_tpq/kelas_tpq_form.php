<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Nama Tpq <?php echo form_error('id_tpq') ?></label>
            <?php echo cmb_dinamis_user('id_tpq', 'data_tpq', 'nama_tpq', 'id_tpq','id_tpq', $id_tpq1, $id_tpq) ?>
        </div>
	    <div class="form-group">
            <label for="int">Nama Kelas <?php echo form_error('id_kelas') ?></label>
            <?php echo cmb_dinamis('id_kelas', 'data_kelas', 'nama_kelas', 'id_kelas', $id_kelas) ?>
        </div>
	    <div class="form-group">
            <label for="int">Tahun Ajaran <?php echo form_error('id_tahun_ajaran') ?></label>
            <?php echo cmb_dinamis_user('id_tahun_ajaran', 'tahun_ajaran', 'nama_ajaran', 'id_tahun_ajaran', 'status', 'Y', $id_tahun_ajaran) ?>
        </div>
      <div class="form-group">
            <label for="int">Madin <?php echo form_error('id_ustadz') ?></label>
            <?php echo cmb_dinamis('id_ustadz', 'data_ustadz', 'nama_ustadz', 'id_ustadz', $id_ustadz) ?>
        </div>
	    <div class="form-group">
            <label for="enum">Semester <?php echo form_error('semester') ?></label>
            <select class="form-control" name="semester" id="semester">
                <option <?= ($semester=="") ? "selected='selected'" : "" ;?>></option>
                <option value="Ganjil" <?= ($semester=="Ganjil") ? "selected='selected'" : "" ;?>>Ganjil</option>
                <option value="Genap" <?= ($semester=="Genap") ? "selected='selected'" : "" ;?>>Genap</option>
            </select>
        </div>
	    <input type="hidden" name="id_klstpq" value="<?php echo $id_klstpq; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/kelas_tpq') ?>" class="btn btn-default">Cancel</a>
	</form>
    <script src="<?php echo base_url() ?>assets/backend/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>