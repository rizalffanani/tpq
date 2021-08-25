<div class="row" style="margin-bottom: 10px">
            <div class="col-md-4">
                <?php echo anchor(site_url('admin/data_santri/create'), 'Create', 'class="btn btn-primary"'); ?>
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
                    <th width="80px">No</th>
		    <th>Nama Lengkap</th>
		    <!-- <th>Nama Panggilan</th> -->
		    <th>Nomor Induk</th>
		    <!-- <th>Tempat Lahir</th> -->
		    <!-- <th>Tanggal Lahir</th> -->
		    <!-- <th>Anak Ke</th> -->
		    <!-- <th>Nama Ayah</th> -->
		    <!-- <th>Nama Ibu</th> -->
		    <!-- <th>Pekerjaan Ayah</th> -->
		    <!-- <th>Pekerjaan Ibu</th> -->
		    <!-- <th>Alamat Ortu</th> -->
		    <!-- <th>Telepon Ortu</th> -->
		    <!-- <th>Kelurahan</th> -->
		    <!-- <th>Kecamatan</th> -->
		    <!-- <th>Kota</th> -->
		    <!-- <th>Provinsi</th> -->
		    <!-- <th>Foto</th> -->
		    <!-- <th>Tanggal Masuk</th> -->
		    <th width="200px">Action</th>
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
                    ajax: {"url": "<?php echo base_url() ?>admin/data_santri/json", "type": "POST"},
                    columns: [
                        {
                            "data": "id_santri",
                            "orderable": false
                        },
                        {"data": "nama_lengkap"},
                        // {"data": "nama_panggilan"},
                        {"data": "nomor_induk"},
                        // {"data": "tempat_lahir"},
                        // {"data": "tanggal_lahir"},
                        // {"data": "anak_ke"},
                        // {"data": "nama_ayah"},
                        // {"data": "nama_ibu"},
                        // {"data": "pekerjaan_ayah"},
                        // {"data": "pekerjaan_ibu"},
                        // {"data": "alamat_ortu"},
                        // {"data": "telepon_ortu"},
                        // {"data": "kelurahan"},
                        // {"data": "kecamatan"},
                        // {"data": "kota"},
                        // {"data": "provinsi"},
                        // {"data": "foto"},
                        // {"data": "tanggal_masuk"},
                        {
                            "data" : "action",
                            "orderable": false,
                            "className" : "text-center"
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