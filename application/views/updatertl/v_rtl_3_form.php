<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA V_RTL_3</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Id Monitoring </td><td><input type="text" class="form-control" name="id_monitoring" id="id_monitoring" placeholder="Id Monitoring" value="<?php echo $id_monitoring; ?>" /> <?php echo form_error('id_monitoring') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Id Satker </td><td><input type="text" class="form-control" name="id_satker" id="id_satker" placeholder="Id Satker" value="<?php echo $id_satker; ?>" /> <?php echo form_error('id_satker') ?></td>
					</tr>
	    
					<tr>
						<td width='200'>Satker </td>
						<td> <textarea class="form-control" rows="3" name="satker" id="satker" placeholder="Satker"><?php echo $satker; ?></textarea> <?php echo form_error('satker') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Id Indikator </td><td><input type="text" class="form-control" name="id_indikator" id="id_indikator" placeholder="Id Indikator" value="<?php echo $id_indikator; ?>" /> <?php echo form_error('id_indikator') ?></td>
					</tr>
	    
					<tr>
						<td width='200'>Indikator </td>
						<td> <textarea class="form-control" rows="3" name="indikator" id="indikator" placeholder="Indikator"><?php echo $indikator; ?></textarea> <?php echo form_error('indikator') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Id Analisis </td><td><input type="text" class="form-control" name="id_analisis" id="id_analisis" placeholder="Id Analisis" value="<?php echo $id_analisis; ?>" /> <?php echo form_error('id_analisis') ?></td>
					</tr>
	    
					<tr>
						<td width='200'>Analisis </td>
						<td> <textarea class="form-control" rows="3" name="analisis" id="analisis" placeholder="Analisis"><?php echo $analisis; ?></textarea> <?php echo form_error('analisis') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Id Tasks </td><td><input type="text" class="form-control" name="id_tasks" id="id_tasks" placeholder="Id Tasks" value="<?php echo $id_tasks; ?>" /> <?php echo form_error('id_tasks') ?></td>
					</tr>
	    
					<tr>
						<td width='200'>Tasks </td>
						<td> <textarea class="form-control" rows="3" name="tasks" id="tasks" placeholder="Tasks"><?php echo $tasks; ?></textarea> <?php echo form_error('tasks') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Bulan </td><td><input type="text" class="form-control" name="bulan" id="bulan" placeholder="Bulan" value="<?php echo $bulan; ?>" /> <?php echo form_error('bulan') ?></td>
					</tr>
	    
					<tr>
						<td width='200'>Rtl Strategi </td>
						<td> <textarea class="form-control" rows="3" name="rtl_strategi" id="rtl_strategi" placeholder="Rtl Strategi"><?php echo $rtl_strategi; ?></textarea> <?php echo form_error('rtl_strategi') ?></td>
					</tr>
	    
					<tr>
						<td width='200'>Potential Blocker </td>
						<td> <textarea class="form-control" rows="3" name="potential_blocker" id="potential_blocker" placeholder="Potential Blocker"><?php echo $potential_blocker; ?></textarea> <?php echo form_error('potential_blocker') ?></td>
					</tr>
	    
					<tr>
						<td width='200'>Pic </td>
						<td> <textarea class="form-control" rows="3" name="pic" id="pic" placeholder="Pic"><?php echo $pic; ?></textarea> <?php echo form_error('pic') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Start </td>
						<td><input type="date" class="form-control" name="tgl_start" id="tgl_start" placeholder="Tgl Start" value="<?php echo $tgl_start; ?>" /> <?php echo form_error('tgl_start') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Deadline </td>
						<td><input type="date" class="form-control" name="tgl_deadline" id="tgl_deadline" placeholder="Tgl Deadline" value="<?php echo $tgl_deadline; ?>" /> <?php echo form_error('tgl_deadline') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Tercapai </td>
						<td><input type="date" class="form-control" name="tgl_tercapai" id="tgl_tercapai" placeholder="Tgl Tercapai" value="<?php echo $tgl_tercapai; ?>" /> <?php echo form_error('tgl_tercapai') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Upload Bukti </td><td><input type="text" class="form-control" name="upload_bukti" id="upload_bukti" placeholder="Upload Bukti" value="<?php echo $upload_bukti; ?>" /> <?php echo form_error('upload_bukti') ?></td>
					</tr>
	    
					<tr>
						<td width='200'>Catatan Pic </td>
						<td> <textarea class="form-control" rows="3" name="catatan_pic" id="catatan_pic" placeholder="Catatan Pic"><?php echo $catatan_pic; ?></textarea> <?php echo form_error('catatan_pic') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Status </td><td><input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" /> <?php echo form_error('status') ?></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="" value="<?php echo $; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('updatertl') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>