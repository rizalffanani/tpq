<div class='box-body'>
        <form action="<?php echo $action; ?>" method="post"><table class='table table-bordered'>
        <tr><td>Nama <?php echo form_error('first_name') ?></td>
            <td><input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nama" value="<?php echo $first_name; ?>" />
        </td>
	    <tr><td>Username <?php echo form_error('username') ?></td>
            <td><input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?php echo $username; ?>" />
        </td>
        <tr><td>Level <?php echo form_error('item_name').$item_name; ?></td>
              <td>
                <?php echo cmb_dinamis2('item_name', 'auth_item', 'name', 'id_aunt|name', $item_name,'1') ?>
              </td>
        </tr>
        <tr><td>Telepon <?php echo form_error('phone') ?></td>
            <td><input type="text" class="form-control" name="phone" id="phone" placeholder="Telepon" value="<?php echo $phone; ?>" />
        </td>
        <tr><td>Alamat <?php echo form_error('alamat') ?></td>
            <td><input type="text" class="form-control" name="alamat" id="alamat" placeholder="Alamat" value="<?php echo $alamat; ?>" />
        </td>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/users') ?>" class="btn btn-default">Cancel</a></td></tr>
	
    </table></form>
</div>