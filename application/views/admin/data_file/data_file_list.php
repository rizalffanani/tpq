<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php if($this->session->userdata("lvl")=="Superadmin"){ ?>
                <?php echo anchor(site_url('admin/data_file/create'), 'Create', 'class="btn btn-primary"'); ?>
                <?php }?>
            </div>
            <div class="col-md-4 text-center">
                <div style="margin-top: 4px"  id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
	    </div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No </th>
        		    <th>Judul</th>
        		    <th>Deskripsi</th>
        		    <th>File</th>
                    <th>Download</th>
        		    <th>Tgl Upload</th>
                    <?php if($this->session->userdata("lvl")=="Superadmin"){ ?>
        		    <th width="200px">Action</th>
                    <?php }?>
                </tr>
            </thead>
	    
        </table>
        <script src="<?php echo base_url('assets/plugins/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/backend/plugins/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/backend/plugins/datatables/dataTables.bootstrap.js') ?>"></script>
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
                    ajax: {"url": "<?php echo base_url() ?>admin/data_file/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_file",
                            "orderable": false
                        },{"data": "judul"},{"data": "deskripsi"},{"data": "file"},
                        {
                            "data" : "download",
                            "orderable": false,
                            "className" : "text-center"
                        },
                        {"data": "tgl_upload"},
                        <?php if($this->session->userdata("lvl")=="Superadmin"){ ?>
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
                        }
                        <?php }?>
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