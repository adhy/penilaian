<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">Kelola Monitoring dan Evaluasi Satker <?=$satker?></h3>
                    </div>
                    <style type="text/css">
                    .belum {background-color:#f44336;color: #ffffff;}
                    .proses {background-color:#ffc107;}
                    .sudah {background-color:#2196f3;color: #ffffff;}
                    </style>
        
        <div class="box-body">
        <?=$this->session->flashdata('message')?>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
                    <th>Indikator</th>
		    <th>Analisis</th>
		    <th>Tasks</th>
            <th>Bulan</th>
		    <th>Rtl Strategi</th>
		    <th>Potential Blocker</th>
		    <th>PIC</th>
		    <th>Tanggal Start</th>
		    <th width="130px">Tanggal Deadline</th>
		    <th width="130px">Tanggal Tercapai</th>
		    <th width="100px">Upload Bukti</th>
		    <th>Catatan PIC</th>
		    <th>Status</th>
		    <th width="50px">Status</th>
		    <th>Status</th>
		    <th>Arahan Kepala Satker</th>
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

                        <h4 class="modal-title" id="deleteModalLabel">Konfirmasi</h4>

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
                    ajax: {"url": "<?=site_url()?>msatker/json_trc", "type": "POST"},
                    columns: [
                        {
                            "data": "id_indikator",
                            "orderable": false
                        },{"data": "indikator","orderable": false,"visible": false},{"data": "analisis","orderable": false,"visible": false},{"data": "tasks","visible": false},{"data": "bulan","orderable": false,"visible": false},{"data": "rtl_strategi"},{"data": "potential_blocker"},{"data": "pic"},{"data": "tgl_start","visible": false},{"data": "tgl_deadline"},{"data": "tgl_tercapai"},{"data": "upload_bukti"},{"data": "catatan_pic"},{"data": "status","visible": false},{"data": "stwarna"},{"data": "stket","visible": false},{"data": "ara_kasatker"}
                    ],
                    order: [[ 0, 'asc' ]],
                    ordering: false,
                    rowGroup: {
            dataSrc: ['indikator','analisis','bulan','tasks']
        },
        // createdRow: function (row, data, index) {
        //    // var a = moment(data.stwarna);
        //     if (data['stket']=='Belum terlaksana') {
        //         $('td', row).eq(8).addClass('belum');
        //     }else if(data['stket'] =='Dalam Proses'){
        //         $('td', row).eq(8).addClass('proses');
        //     }else{
        //         $('td', row).eq(8).addClass('sudah');
        //     }
        //     //console.log(data['stket']);
        // },
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