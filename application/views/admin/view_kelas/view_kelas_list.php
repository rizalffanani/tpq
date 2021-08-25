<div class="row" style="margin-bottom: 10px">
        <div class="col-md-4">
            <?php echo anchor(site_url('admin/Kelas_tpq/create'), 'Create', 'class="btn btn-primary"'); ?>
        </div>
        <div class="col-md-4 text-center">
            <div style="margin-top: 4px"  id="message">
                <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
            </div>
        </div>
        <div class="col-md-4 text-right"></div>
</div>
<table class="table table-bordered table-striped" id="mytable">
    <thead>
        <tr>
            <th width="80px">No</th>
    <th>Tahun Ajaran</th>
    <th>Tpq</th>
    <th>Jenjang</th>
    <th>Kelas</th>
    <th>Semester</th>
    <th>Walikelas</th>
    <th width="200px">Action</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>No</th>
            <th>Tahun Ajaran</th>
            <th>Tpq</th>
            <th>Jenjang</th>
            <th>Kelas</th>
            <th>Semester</th>
            <th>Walikelas</th>
            <th>Action</th>
        </tr>
    </tfoot>
   <tbody>
    <?php $start = 0;foreach ($datas as $data){?>
        <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $data->nama_ajaran ?></td>
            <td><?php echo $data->nama_tpq ?></td>
            <td><?php echo $data->nama_jenjang ?></td>
            <td><?php echo $data->nama_kelas ?></td>
            <td><?php echo $data->semester ?></td>
            <td><?php echo $data->nama_ustadz ?></td>
            <td style="text-align:center" width="140px">
                <?php 
                echo anchor(site_url('admin/kelas_mapel/index/'.$data->id_klstpq),'Daftar Mapel',array('title'=>'detail'))." | "; 
                echo anchor(site_url('admin/kelas_santri/index/'.$data->id_klstpq),'Daftar Siswa',array('title'=>'detail'))." | "; 
                echo anchor(site_url('admin/Kelas_tpq/update/'.$data->id_klstpq),'Update',array('title'=>'detail')); 
                ?>
            </td>
        </tr>
        <?php
    }?>
    </tbody>
</table>
<script src="<?php echo base_url('assets/plugins/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/backend/plugins/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/backend/plugins/datatables/dataTables.bootstrap.js') ?>"></script>
<script src="<?php echo base_url() ?>assets/backend/plugins/select2/js/select2.full.min.js"></script>
<script type="text/javascript">
    // $(document).ready(function () {
    //     $("#mytable").dataTable();
    // });
    $(document).ready(function() {
        var table = $('#mytable').DataTable();
     
        $("#mytable tfoot th").each( function ( i ) {
            if (i<7) {
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(this).empty() )
                    .on( 'change', function () {
                        table.column( i )
                            .search( $(this).val() )
                            .draw();
                    } );
         
                table.column( i ).data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            }
        } );
    } );
    $(function () {
        $('.select2bs4').select2({
          theme: 'bootstrap4'
        })
    })
    function fun(a) {
        $.ajax({
            type:"POST",
            url:"<?=site_url('barang_masuk/panggil');?>",    
            dataType : "JSON",
            data : {product_code:a},
            success: function(data){   
                document.getElementById('nama_barang').value = data.nama_barang;
                document.getElementById('jenis_barang').value = data.jenis_barang;
                document.getElementById('kategori').value = data.kategori;
                document.getElementById('varian').value = data.nama_varian;
                document.getElementById('unit').value = data.unit;
                document.getElementById('harga_jual').value = data.harga_jual;
            }  
        });
    }
</script>