<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA STRATEGI</h3>
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
						<?php echo form_error('indikator') ?></td>
					</tr>

					<tr>
						<td width='200'>Bulan </td><td>
						<input type="hidden" name="bulan" value="<?php echo $bulan; ?>" />
						<label><?=bulanindo($bulan)?></label>
						</td>
					</tr>
	    
					<tr>
						<td width='200'>Permasalahan </td><td>
						<input type="hidden" name="analisis" value="<?php echo $analisis; ?>" />
						<label><?=$analisis?></label>
						</td>
					</tr>
	    
					<tr>
						<td width='200'>STrategi </td>
						<td> <textarea class="form-control" rows="3" name="tasks" id="tasks" placeholder="Tasks"><?php echo $tasks; ?></textarea> <?php echo form_error('tasks') ?></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_tasks" value="<?php echo $id_tasks; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('rtlanjut') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script type="text/javascript">
	$('[name="indikator"]').attr('id', 'indikator');
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
});
// $(document).ready(function(){
	
//     $('#indikator').change(function(){
//         var selectedCountry = $('#indikator option:selected').val();
//         $.ajax({
//             type: 'POST',
//             url: 'gbulan',
// 			dataType: "json",
//             data: { indikator : selectedCountry },
// 			success : function(data) {
// 				$("#bulan").select2().val(data).trigger("change");
//         },
//         })
//     });
// });

</script>