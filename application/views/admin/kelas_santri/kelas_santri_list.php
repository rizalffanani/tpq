<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/view_kelas'), 'Kembali', 'class="btn btn-success"'); ?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
                <?php echo anchor(site_url('admin/kelas_santri/create/'.$srt), 'Create', 'class="btn btn-primary"'); ?>
            </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
        		    <th width="200px">Nomor Induk</th>
        		    <th>Nama</th>
        		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>
        <script src="<?php echo base_url('assets/plugins/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/backend/plugins/datatables/jquery.dataTables.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings)
                {
                    return {
                        "iStart": oSettings._iDisplayStart,
                        "iEnd": oSettings.fnDisplayEnd(),
                        "iLength": oSettings._iDisplayLength,
                        "iTotal": oSettings.fnRecordsTotal(),
                        "iFilteredTotal": oSettings.fnRecordsDisplay(),
                        "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                        "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
                    };
                };

                var t = $("#mytable").dataTable({
                    initComplete: function() {
                        var api = this.api();
                        $('#mytable_filter input')
                                .off('.DT')
                                .on('keyup.DT', function(e) {
                                    if (e.keyCode == 13) {
                                        api.search(this.value).draw();
                            }
                        });
                    },
                    oLanguage: {
                        sProcessing: "loading..."
                    },
                    processing: true,
                    serverSide: true,
                    ajax: {
                        "url": "<?php echo base_url() ?>admin/kelas_santri/json", 
                        "type": "POST",
                        "data": {
                            srt:'<?= $srt?>'
                        },
                    },
                    columns: [
                        {
                            "data": "nomor_induk",
                            "orderable": false
                        },{"data": "nomor_induk"},{"data": "nama_lengkap"},
                        {
                            data: null,
                            className: "center",
                            render: function ( data, type, row ) {
                                return '<a href="<?php echo base_url() ?>admin/kelas_santri/nilai/'+data.id_klstpq+'/'+data.id_kelas_siswa+'">Nilai</a> | <a href="<?php echo base_url() ?>admin/catatan/create/'+data.id_kelas_siswa+'/'+data.id_klstpq+'">Catatan</a> | <a href="<?php echo base_url() ?>admin/rekap_nilai/read/'+data.id_kelas_siswa+'">Raport</a> | <a href="<?php echo base_url() ?>admin/data_santri/read/'+data.id_santri+'">Detail Siswa</a> | <a onclick="javasciprt: return confirm(\'Are You Sure ?\')" href="<?php echo base_url() ?>admin/kelas_santri/delete/'+data.id_kelas_siswa+'/'+data.id_klstpq+'">Delete</a>';
                            } 
                        }

                    ],
                    order: [[0, 'desc']],
                    rowCallback: function(row, data, iDisplayIndex) {
                        var info = this.fnPagingInfo();
                        var page = info.iPage;
                        var length = info.iLength;
                        var index = page * length + (iDisplayIndex + 1);
                        $('td:eq(0)', row).html(index);
                    }
                });
            });
        </script>