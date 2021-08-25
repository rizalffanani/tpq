<div class='box box-primary'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
	    <tr><td>Name <?php echo form_error('name') ?></td>
            <td><input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $name; ?>" />
        </td>
	    <input type="hidden" class="form-control" name="tipe" id="tipe" placeholder="Tipe" value="1" />
	    <tr><td>Description <?php echo form_error('description') ?></td>
            <td><textarea class="form-control" rows="3" name="description" id="description" placeholder="Description"><?php echo $description; ?></textarea>
        </td></tr>
	    <input type="hidden" name="id_aunt" value="<?php echo $id_aunt; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/auth_item') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
</div><!-- /.box-body -->