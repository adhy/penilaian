<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA ARAHAN KASATKER</h3>
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
						<td><label><?=$indikator?></label></td>
					</tr>
	    
					<tr>
						<td width='200'>Analisis </td>
						<td> <label><?=$analisis?></label></td>
					</tr>
	    
					<tr>
						<td width='200'>Strategi </td>
						<td> <label><?=$tasks?></label></td>
					</tr>
	
					<tr>
						<td width='200'>Bulan </td><td>
							
						<label><?=bulanindo($bulan)?></label></td>
					</tr>
	    
					<tr>
						<td width='200'>Kegiatan </td>
						<td> 
						<label><?=$rtl_strategi?></label></td>
					</tr>
	    
					<tr>
						<td width='200'>Permasalahan Lain dalam Pelaksanaan Kegiatan </td>
						<td> <label><?=$potential_blocker?></label></td>
					</tr>
	    
					<tr>
						<td width='200'>Penanggung jawab </td>
						<td> <label><?=$pic?></label></td>
					</tr>
	
					<tr>
						<td width='200'>Tgl Deadline </td>
						<td><label><?=tgl_indomin($tgl_deadline)?></label></td>
					</tr>
					
					<tr>
						<td width='200'>Upload Bukti </td>
						<td><label><?=add_upload($upload_bukti)?></label></td>
					</tr>
	    			<tr>
						<td width='200'>Catatan Penanggung jawab </td>
						<td> <label><?=$catatan_pic?></label></td>
					</tr>

					<tr>
						<td width='200'>Status </td>
						<td> <label><?=$stket?></label></td>
					</tr>
	    
					<tr>
						<td width='200'>Arahan Kasatker </td>
						<td> <textarea class="form-control" rows="3" name="ara_kasatker" id="ara_kasatker" placeholder="Ara Kasatker"><?php echo $ara_kasatker; ?></textarea> <?php echo form_error('ara_kasatker') ?></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_monitoring" value="<?php echo $id_monitoring; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('arahankasat') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>