<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA V_RTL_3</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('updatertl/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?></div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
		    <th>Id Monitoring</th>
		    <th>Id Satker</th>
		    <th>Satker</th>
		    <th>Id Indikator</th>
		    <th>Indikator</th>
		    <th>Id Analisis</th>
		    <th>Analisis</th>
		    <th>Id Tasks</th>
		    <th>Tasks</th>
		    <th>Bulan</th>
		    <th>Rtl Strategi</th>
		    <th>Potential Blocker</th>
		    <th>Pic</th>
		    <th>Tgl Start</th>
		    <th>Tgl Deadline</th>
		    <th>Tgl Tercapai</th>
		    <th>Upload Bukti</th>
		    <th>Catatan Pic</th>
		    <th>Status</th>
		    <th width="200px">Action</th>
                </tr>
            </thead>
	    
        </table>
        </div>
                    </div>
            </div>
            </div>
    </section>
</div>
<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">

                <div class="modal-content">

                    <div class="modal-header">

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                        <h4 class="modal-title" id="deleteModalLabel">Delete Confirmation</h4>

                    </div>

                    <div class="modal-body">

                        Apa anda yakin akan menghapus data ?

                    </div>

                    <div class="modal-footer">

                        <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>

                        <a class="btn btn-danger btn-ok" id="delete-confirmation"><i class="fa fa-save"></i> Ya</a>

                    </div>

                </div>

            </div>
    </div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
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
                    ajax: {"url": "updatertl/json", "type": "POST"},
                    columns: [
                        {
                            "data": "",
                            "orderable": false
                        },{"data": "id_monitoring"},{"data": "id_satker"},{"data": "satker"},{"data": "id_indikator"},{"data": "indikator"},{"data": "id_analisis"},{"data": "analisis"},{"data": "id_tasks"},{"data": "tasks"},{"data": "bulan"},{"data": "rtl_strategi"},{"data": "potential_blocker"},{"data": "pic"},{"data": "tgl_start"},{"data": "tgl_deadline"},{"data": "tgl_tercapai"},{"data": "upload_bukti"},{"data": "catatan_pic"},{"data": "status"},
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