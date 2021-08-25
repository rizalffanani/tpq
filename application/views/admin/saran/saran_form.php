<div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
<form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="saran">Saran <?php echo form_error('saran') ?></label>
            <textarea class="form-control" rows="3" name="saran" id="saran" placeholder="Saran"><?php echo $saran; ?></textarea>
        </div>
	    <input type="hidden" name="id_saran" value="<?php echo $id_saran; ?>" /> 
        <input type="hidden" name="id_user" value="<?php echo $this->session->userdata("id"); ?>" /> 
        <input type="hidden" name="datetime" value="<?php echo date('Y-m-d'); ?>" /> 
        <input type="hidden" name="status" value="new" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/saran') ?>" class="btn btn-default">Cancel</a>
	</form>