<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA V_GRAFIKVIEW</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Id Satker </td><td><input type="text" class="form-control" name="id_satker" id="id_satker" placeholder="Id Satker" value="<?php echo $id_satker; ?>" /> <?php echo form_error('id_satker') ?></td>
					</tr>
	    
					<tr>
						<td width='200'>Satker </td>
						<td> <textarea class="form-control" rows="3" name="satker" id="satker" placeholder="Satker"><?php echo $satker; ?></textarea> <?php echo form_error('satker') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Bulan </td><td><input type="text" class="form-control" name="bulan" id="bulan" placeholder="Bulan" value="<?php echo $bulan; ?>" /> <?php echo form_error('bulan') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Status </td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> <?php echo form_error('status') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Stket </td><td><input type="text" class="form-control" name="stket" id="stket" placeholder="Stket" value="<?php echo $stket; ?>" /> <?php echo form_error('stket') ?></td>
					</tr>
	
					<tr>
						<td width='200'>St0 </td><td><input type="text" class="form-control" name="st0" id="st0" placeholder="St0" value="<?php echo $st0; ?>" /> <?php echo form_error('st0') ?></td>
					</tr>
	
					<tr>
						<td width='200'>St1 </td><td><input type="text" class="form-control" name="st1" id="st1" placeholder="St1" value="<?php echo $st1; ?>" /> <?php echo form_error('st1') ?></td>
					</tr>
	
					<tr>
						<td width='200'>St2 </td><td><input type="text" class="form-control" name="st2" id="st2" placeholder="St2" value="<?php echo $st2; ?>" /> <?php echo form_error('st2') ?></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_satker" value="<?php echo $id_satker; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('vrafikview') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>