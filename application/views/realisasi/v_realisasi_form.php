<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA V_REALISASI</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	    
					<tr>
						<td width='200'>Indikator </td>
						<td> <input type="text" class="form-control" rows="3" name="indikator" disabled="disabled" id="indikator" placeholder="Indikator" value="<?php echo $indikator; ?>"> <?php echo form_error('indikator') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Tahun </td><td><input type="text" class="form-control" name="tahun" disabled="disabled" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" /> <?php echo form_error('tahun') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Bulan </td><td><input type="text" class="form-control" name="bulan" disabled="disabled" id="bulan" placeholder="Bulan" value="<?php echo bulanindo($bulan); ?>" /> <?php echo form_error('bulan') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Target </td><td>
							<input type="hidden" class="form-control" name="target2" id="target2" value="<?php echo $target; ?>" />
							<input type="text" class="form-control" name="target" disabled="disabled" id="target" placeholder="Target" value="<?php echo $target; ?>" /> <?php echo form_error('target') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Realisasi </td><td><input type="text" class="form-control RealIsasi" name="realisasi" id="realisasi" placeholder="Realisasi" value="<?php echo $realisasi; ?>" /> <?php echo form_error('realisasi') ?></td>
					</tr>
		
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_target" value="<?php echo $id_target; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('realisasi') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>