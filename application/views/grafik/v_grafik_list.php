<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-warning box-solid">
    
                    <div class="box-header">
                        <h3 class="box-title">KELOLA DATA V_GRAFIK</h3>
                    </div>
        
        <div class="box-body">
        <div style="padding-bottom: 10px;"'>
        <?php echo anchor(site_url('grafik/create'), '<i class="fa fa-wpforms" aria-hidden="true"></i> Tambah Data', 'class="btn btn-danger btn-sm"'); ?></div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="30px">No</th>
		    <th>Id Satker</th>
		    <th>Satker</th>
		    <th>Tahun</th>
		    <th>Bulan</th>
		    <th>S0jan</th>
		    <th>S1jan</th>
		    <th>S2jan</th>
		    <th>Stask1</th>
		    <th>Bstask1</th>
		    <th>S0feb</th>
		    <th>S1feb</th>
		    <th>S2feb</th>
		    <th>Stask2</th>
		    <th>Bstask2</th>
		    <th>S0mar</th>
		    <th>S1mar</th>
		    <th>S2mar</th>
		    <th>Stask3</th>
		    <th>Bstask3</th>
		    <th>S0apr</th>
		    <th>S1apr</th>
		    <th>S2apr</th>
		    <th>Stask4</th>
		    <th>Bstask4</th>
		    <th>S0mei</th>
		    <th>S1mei</th>
		    <th>S2mei</th>
		    <th>Stask5</th>
		    <th>Bstask5</th>
		    <th>S0jun</th>
		    <th>S1jun</th>
		    <th>S2jun</th>
		    <th>Stask6</th>
		    <th>Bstask6</th>
		    <th>S0jul</th>
		    <th>S1jul</th>
		    <th>S2jul</th>
		    <th>Stask7</th>
		    <th>Bstask7</th>
		    <th>S0aug</th>
		    <th>S1aug</th>
		    <th>S2aug</th>
		    <th>Stask8</th>
		    <th>Bstask8</th>
		    <th>S0sept</th>
		    <th>S1sept</th>
		    <th>S2sept</th>
		    <th>Stask9</th>
		    <th>Bstask9</th>
		    <th>S0okt</th>
		    <th>S1okt</th>
		    <th>S2okt</th>
		    <th>Stask10</th>
		    <th>Bstask10</th>
		    <th>S0nov</th>
		    <th>S1nov</th>
		    <th>S2nov</th>
		    <th>Stask11</th>
		    <th>Bstask11</th>
		    <th>S0des</th>
		    <th>S1des</th>
		    <th>S2des</th>
		    <th>Stask12</th>
		    <th>Bstask12</th>
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
                    ajax: {"url": "grafik/json", "type": "POST"},
                    columns: [
                        {
                            "data": "",
                            "orderable": false
                        },{"data": "id_satker"},{"data": "satker"},{"data": "tahun"},{"data": "bulan"},{"data": "s0jan"},{"data": "s1jan"},{"data": "s2jan"},{"data": "stask1"},{"data": "bstask1"},{"data": "s0feb"},{"data": "s1feb"},{"data": "s2feb"},{"data": "stask2"},{"data": "bstask2"},{"data": "s0mar"},{"data": "s1mar"},{"data": "s2mar"},{"data": "stask3"},{"data": "bstask3"},{"data": "s0apr"},{"data": "s1apr"},{"data": "s2apr"},{"data": "stask4"},{"data": "bstask4"},{"data": "s0mei"},{"data": "s1mei"},{"data": "s2mei"},{"data": "stask5"},{"data": "bstask5"},{"data": "s0jun"},{"data": "s1jun"},{"data": "s2jun"},{"data": "stask6"},{"data": "bstask6"},{"data": "s0jul"},{"data": "s1jul"},{"data": "s2jul"},{"data": "stask7"},{"data": "bstask7"},{"data": "s0aug"},{"data": "s1aug"},{"data": "s2aug"},{"data": "stask8"},{"data": "bstask8"},{"data": "s0sept"},{"data": "s1sept"},{"data": "s2sept"},{"data": "stask9"},{"data": "bstask9"},{"data": "s0okt"},{"data": "s1okt"},{"data": "s2okt"},{"data": "stask10"},{"data": "bstask10"},{"data": "s0nov"},{"data": "s1nov"},{"data": "s2nov"},{"data": "stask11"},{"data": "bstask11"},{"data": "s0des"},{"data": "s1des"},{"data": "s2des"},{"data": "stask12"},{"data": "bstask12"},
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