<link rel="stylesheet" href="<?php  echo (base_url());?>assets/backend/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<div class='box box-primary'>
  <form action="<?php echo $action; ?>" method="post">
    <table class='table table-bordered'>
	    <tr>
        <td>Parent <?php echo form_error('parent') ?></td>
        <td>
          <select name="parent" class='form-control' onchange="fun(this.value)">
            <option>pilih</option>
            <?php foreach ($dataparent as $key => $value) {?>
              <option value="<?= $value->id_aunt.'/'.$value->name?>"><?= $value->name?></option>
            <?php }?>
          </select>
        </td>
      </tr>
	    <tr>
        <td>Child <?php echo form_error('child') ?></td>
        <td id="childmenu"></td>
      </tr>
	    <input type="hidden" name="idc" value="<?php echo $idc; ?>" /> 
	    <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/auth_item_child') ?>" class="btn btn-default">Cancel</a></td></tr>
    </table>
  </form>
</div>
<script src="<?php  echo (base_url());?>assets/backend/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script type="text/javascript">
  function fun(a) {
    $.ajax({
      type:"POST",
      url:"<?=site_url('admin/auth_item_child/getMenu');?>",
      data:{"kode":a},    
      success: function(data){   
        document.getElementById('childmenu').innerHTML = data;
        $('.duallistbox').bootstrapDualListbox();
      }  
    });
  }
</script>