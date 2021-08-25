<div class='box'>
    <div class='box-header'>
        <h3 class='box-title'>
            <?php echo anchor('admin/users/create/','Create',array('class'=>'btn btn-danger btn-sm'));?>
        </h3>
    </div><!-- /.box-header -->
    <div class='box-body' style="overflow-x:auto;">
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
        		    <th>Username</th>
        		    <th>Nama</th>
                    <th>Keterangan</th>
        		    <th width="150px">Action</th>
                </tr>
            </thead>
    	    <tbody>
                <?php $start = 0;foreach ($users_data as $users){?>
                    <tr>
            		    <td><?php echo ++$start ?></td>
            		    <td><?php echo $users->username ?></td>
            		    <td><?php echo $users->first_name ?></td>
                        <td><?php echo $users->item_name ?></td>
                        <td>
                			<?php 
                            if ($users->active==0) {
                                echo anchor(site_url('admin/users/chek/'.$users->id.'/1'),'<i class="fa fa-check"></i>',array('title'=>'akif','class'=>'btn btn-success btn-sm')); 
                            }else{
                                echo anchor(site_url('admin/users/chek/'.$users->id.'/0'),'<i class="fa fa-minus"></i>',array('title'=>'non','class'=>'btn btn-warning btn-sm')); 
                            }
                            echo '  '; 
                            echo anchor(site_url('admin/users/read/'.$users->username),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
                			echo '  '; 
                			echo anchor(site_url('admin/users/update/'.$users->username),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
                			// echo '  '; 
                			// echo anchor(site_url('users/delete/'.$users->username),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure ?\')"'); 
                			?>
                		</td>
    	           </tr>
                <?php }?>
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