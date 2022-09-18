<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA ANALISIS</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>

					<tr><?php $tahun=$this->session->userdata('tahun'); ?>
						<td width='200'>Tahun </td><td>
						<input type="hidden" class="form-control" name="tahun" disabled="disabled" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" />
						<input type="text" class="form-control" name="tahunshow" disabled="disabled" id="tahunshow" placeholder="Tahun" value="<?php echo $tahun; ?>" /> <?php echo form_error('tahun') ?></td>
					</tr>

					<tr>
						<td width='200'>Indikator </td>
						<td> 
						<?php
						$intahun=$this->session->userdata('tahun');
						$inwhere=$this->session->userdata('idsatker');
						//var_dump($intahun,$inwhere);
						$where=array('id_satker'=>$inwhere,'tahun'=>$intahun);
						//echo cmb_dinamiswhereorder('indikator', 'v_target', 'indikator', 'id_indikator', $indikator,'ASC',$where,'-- Pilih Indikator --','id_indikator');
						echo cmb_dinamiswhere('indikator', 'v_targetanalisis', 'indikator', 'id_indikator', $indikator,'ASC',$where,'-- Pilih Indikator --')
						?>	
						<?php echo form_error('indikator') ?></td>
					</tr>

					<tr>
						<td width='200'>Bulan </td><td>
						<select name="bulan" class="form-control select2" data-placeholder="-- Pilih Bulan --" id="bulan" tabindex="-1" aria-hidden="true">
							<option></option>
						</select>
						</td>
					</tr>
	
					<tr>
						<td width='200'>Analisis </td>
						<td> <textarea class="form-control" rows="3" name="analisis" id="analisis" placeholder="Analisis"><?php echo $analisis; ?></textarea> <?php echo form_error('analisis') ?>
					<span id="ubah"></span>
					</td>
					</tr>					
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_analisis" value="<?php echo $id_analisis; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('analisis') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
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