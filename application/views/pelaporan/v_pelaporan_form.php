<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA V_PELAPORAN</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Id Indikator </td><td><input type="text" class="form-control" name="id_indikator" id="id_indikator" placeholder="Id Indikator" value="<?php echo $id_indikator; ?>" /> <?php echo form_error('id_indikator') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Tahun </td><td><input type="text" class="form-control" name="tahun" id="tahun" placeholder="Tahun" value="<?php echo $tahun; ?>" /> <?php echo form_error('tahun') ?></td>
					</tr>
	    
					<tr>
						<td width='200'>Indikator </td>
						<td> <textarea class="form-control" rows="3" name="indikator" id="indikator" placeholder="Indikator"><?php echo $indikator; ?></textarea> <?php echo form_error('indikator') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Bulan </td><td><input type="text" class="form-control" name="bulan" id="bulan" placeholder="Bulan" value="<?php echo $bulan; ?>" /> <?php echo form_error('bulan') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Target </td><td><input type="text" class="form-control" name="target" id="target" placeholder="Target" value="<?php echo $target; ?>" /> <?php echo form_error('target') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Realisasi </td><td><input type="text" class="form-control" name="realisasi" id="realisasi" placeholder="Realisasi" value="<?php echo $realisasi; ?>" /> <?php echo form_error('realisasi') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Capaian </td><td><input type="text" class="form-control" name="capaian" id="capaian" placeholder="Capaian" value="<?php echo $capaian; ?>" /> <?php echo form_error('capaian') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Id Satker </td><td><input type="text" class="form-control" name="id_satker" id="id_satker" placeholder="Id Satker" value="<?php echo $id_satker; ?>" /> <?php echo form_error('id_satker') ?></td>
					</tr>
	    
					<tr>
						<td width='200'>Satker </td>
						<td> <textarea class="form-control" rows="3" name="satker" id="satker" placeholder="Satker"><?php echo $satker; ?></textarea> <?php echo form_error('satker') ?></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_indikator" value="<?php echo $id_indikator; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('pelaporan') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>