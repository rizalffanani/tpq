<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Santri <?php echo form_error('id_santri') ?></label>
            <?php echo cmb_dinamis('id_santri', 'data_santri', 'nama_lengkap', 'id_santri', $id_santri) ?>
        </div>
	    <div class="form-group">
            <input type="hidden" class="form-control" name="id_klstpq" id="id_klstpq" placeholder="Id Klstpq" value="<?php echo $id_klstpq; ?>" />
        </div>
	    <input type="hidden" name="id_kelas_siswa" value="<?php echo $id_kelas_siswa; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/data_santri/create') ?>" class="btn btn-success"><?php echo $button ?> New Santri</a>
	    <a href="<?php echo site_url('admin/kelas_santri') ?>" class="btn btn-default">Cancel</a>
	</form>
	<script src="<?php echo base_url() ?>assets/backend/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>