<div class='box'>
                <div class='box-header'>
                  <h3 class='box-title'>
                    <?php echo anchor('admin/auth_item_child/create/','Setting',array('class'=>'btn btn-danger btn-sm'));?>          
                    </h3>
                </div><!-- /.box-header -->
                <?=@$err?>
                <div class='box-body' style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>Parent</th>
            <th>Child</th>
            <th>link</th>
		    <th>tipe</th>
		    <th>Action</th>
                </tr>
            </thead>
	    <tbody>
            <?php
            $start = 0;
            foreach ($auth_item_child_data as $auth_item_child)
            {
                ?>
                <tr>
		    <td><?php echo ++$start ?></td>
		    <td><?php echo $auth_item_child->parent ?></td>
            <td><?php echo $auth_item_child->name ?></td>
            <td><?php echo $auth_item_child->link ?></td>
		    <td><?php echo $auth_item_child->tipe ?></td>
		    <td style="text-align:center" width="140px">
			<?php 
			echo anchor(site_url('admin/auth_item_child/read/'.$auth_item_child->idc),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
			?>
		    </td>
	        </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/backend/plugins/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/backend/plugins/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              </div><!-- /.box -->