<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">Mapel <?php echo form_error('id_mapel') ?></label>
            <?php echo cmb_dinamis('id_mapel', 'data_mapel', 'nama_mapel', 'id_mapel', $id_mapel) ?>
        </div>
	    <div class="form-group">
            <input type="hidden" class="form-control" name="id_klstpq" id="id_klstpq" placeholder="Id Klstpq" value="<?php echo $id_klstpq; ?>" />
        </div>
	    <input type="hidden" name="id_klsmapel" value="<?php echo $id_klsmapel; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/data_jenis_mapel/create/'.$id_klstpq) ?>" class="btn btn-success"><?php echo $button ?> New Mapel</a>
	    <a href="<?php echo site_url('admin/kelas_mapel') ?>" class="btn btn-default">Cancel</a>
	</form>
	<script src="<?php echo base_url() ?>assets/backend/plugins/select2/js/select2.full.min.js"></script>
<script>
  $(function () {
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })
</script>