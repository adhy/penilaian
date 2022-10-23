<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA SATKER</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
					<tr>
						<td width='200'>Kelompok Satker </td><td>
						<?php echo cmb_dinamis('nama_level', 'tbl_user_level', 'nama_level', 'id_user_level', $nama_level,'DESC','-- Pilih Kelompok Satker --') ?>	
						
						<?php echo form_error('nama_level') ?></td>
					</tr>
	    
					<tr>
						<td width='200'>Satker </td>
						<td> <textarea class="form-control" rows="3" name="satker" id="satker" placeholder="Satker"><?php echo $satker; ?></textarea> <?php echo form_error('satker') ?></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_satker" value="<?php echo $id_satker; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('satker') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>