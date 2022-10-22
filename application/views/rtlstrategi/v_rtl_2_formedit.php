<link rel="stylesheet" href="<?php echo base_url() ?>assets/datepicker/datepicker3.css">
<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA RTL STRATEGI</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr><?php $tahun=$this->session->userdata('tahun'); $idsatker=$this->session->userdata('idsatker');?>
						<td width='200'>Tahun </td><td>
						<input type="hidden" name="satker" value="<?php echo $idsatker; ?>" />
						<input type="hidden" name="tahun" value="<?php echo $tahun; ?>" />
						<input type="text" class="form-control" name="tahunshow" disabled="disabled" id="tahunshow" placeholder="Tahun" value="<?php echo $tahun; ?>" /> <?php echo form_error('tahun') ?></td>
					</tr>
	    
					<tr>
					<td width='200'>Indikator </td>
						<td> 
						<input type="hidden" name="indikator" value="<?php echo $indikator; ?>" />
						<label><?=$indikator?></label>
						</td>
					</tr>
	    
					<tr>
						<td width='200'>Bulan </td><td>
						<input type="hidden" name="bulan" value="<?php echo $bulan; ?>" />
						<label><?=bulanindo($bulan)?></label>
						</td>
					</tr>

					<tr>
						<td width='200'>Analisis </td><td>
						<input type="hidden" name="analisis" value="<?php echo $analisis; ?>" />
						<label><?=$analisis?></label>
						</td>
					</tr>
	
					<tr>
						<td width='200'>Tasks </td><td>

						<input type="hidden" name="tasks" value="<?php echo $tasks; ?>" />
						<label><?=$tasks?></label>

						</td>
					</tr>
	    
					<tr>
						<td width='200'>Rtl/Strategi </td>
						<td> <textarea class="form-control" rows="3" name="rtl_strategi" id="rtl_strategi" placeholder="Rtl Strategi"><?php echo $rtl_strategi; ?></textarea> <?php echo form_error('rtl_strategi') ?></td>
					</tr>
	    
					<tr>
						<td width='200'>Potential Blocker </td>
						<td> <textarea class="form-control" rows="3" name="potential_blocker" id="potential_blocker" placeholder="Potential Blocker"><?php echo $potential_blocker; ?></textarea> <?php echo form_error('potential_blocker') ?></td>
					</tr>
	    
					<tr>
						<td width='200'>Pic </td>
						<td> <input type="text" class="form-control" name="pic" id="pic" placeholder="Pic" value="<?php echo $pic; ?>" /><?php echo form_error('pic') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Tanggal Deadline </td>
						<td>
						<?php 
						$date = new DateTime($tgl_deadline);
    					$datef=$date->format('d-F-Y');
						?>
						<div class="input-group date">
							<div class="input-group-addon">
								<i class="fa fa-calendar"></i>
							</div>
							<input type="text" class="form-control pull-right datepicker" name="tgl_deadline" id="tgl_deadline" autocomplete="off" placeholder="dd/mm/yyyy" value="<?php echo $datef;?>" />
						</div><?php echo form_error('tgl_deadline') ?>
						</td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_monitoring" value="<?php echo $id_monitoring; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('rtlstrategi') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datepicker/bootstrap-datepicker.js') ?>" charset="UTF-8"></script>

<script type="text/javascript">
// 	$.fn.datepicker.dates['id'] = {
//     days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
//     daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
//     daysMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
//     months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
//     monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
//     today: "Hari Ini",
//     clear: "Clear",
//     format: "mm/dd/yyyy",
//     titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
//     weekStart: 0
// };
	$('[name="indikator"]').attr('id', 'indikator');
	//$.datepicker.setDefaults( $.datepicker.regional[ "" ] );
	$('.datepicker').datepicker({
                format: 'dd-MM-yyyy',
                //format: 'yyyy-mm-dd',
                language: 'id',
                //language: "id",
                autoclose: true
            });
// 	$.fn.datepicker.dates['id'] = {
// days: ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"],
// daysShort: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
// daysMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
// months: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"],
// monthsShort: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"],
// today: "Hari Ini",
// clear: "Clear",
// format: "dd-mm-yyyy",
// titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
// weekStart: 0
// };
	$(function() {
    $('#indikator').on('change', function() {
        $.post('gbulan', {
            indikator: $('#indikator').val()
        }, function(e) {
			console.log(e);
			var sampleArray =e;
			$('#bulan').empty().trigger("change");
			//$('#bulan option').remove().trigger("change");
			//$('#bulan').select2('data', null);
			$("#bulan").select2({ data: sampleArray,placeholder: "Please select a country" });
			
			;
                //$("#ubah").html(e).select2();
        })
    });
	$('#bulan').on('change', function() {
        $.post('ganalisis', {
            indikator: $('#indikator').val(),
            bulan: $('#bulan').val(),
        }, function(e) {
			console.log(e);
			var sampleArray =e;
			$('#analisis').empty().trigger("change");
			//$('#bulan option').remove().trigger("change");
			//$('#bulan').select2('data', null);
			$("#analisis").select2({ data: sampleArray,placeholder: "-- Pilih Analisis --" });
			
			;
                //$("#ubah").html(e).select2();
        })
    });
	$('#analisis').on('change', function() {
        $.post('gtasks', {
            indikator: $('#indikator').val(),
            bulan: $('#bulan').val(),
            analisis: $('#analisis').val(),
        }, function(e) {
			console.log(e);
			var sampleArray =e;
			$('#tasks').empty().trigger("change");
			//$('#bulan option').remove().trigger("change");
			//$('#bulan').select2('data', null);
			$("#tasks").select2({ data: sampleArray,placeholder: "-- Pilih Tasks --" });
			
			;
                //$("#ubah").html(e).select2();
        })
    });
});
</script>