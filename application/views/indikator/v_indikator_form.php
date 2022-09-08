<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA V_INDIKATOR</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	
					<tr>
						<td width='200'>Kelompok Satker </td><td>
						<select id="e1" name="nama_level" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" data-placeholder="-- Pilih Kelompok Satker --">
						<option></option>
						<?php 
						//var_dump($SatOption);
						foreach($SatOption as $row):   
							if(isset($SatOptionSel1)){            
							   echo '<option value="'.$row->id_user_level?>"<?=$row->id_user_level==$SatOptionSel1 ? ' selected="selected"' : '';?>><?=$row->nama_level?></option>                                                           
                            <?php   
							   }else {
								echo '<option value="'.$row->id_user_level.'">'.$row->nama_level.'</option>';
                            } endforeach; ?>
						</select>
						
						 <?php echo form_error('nama_level') ?></td>
					</tr>
	    
					<tr>
						<td width='200'>Indikator </td>
						<td> <textarea class="form-control" rows="3" name="indikator" id="indikator" placeholder="Indikator"><?php echo $indikator; ?></textarea> <?php echo form_error('indikator') ?></td>
					</tr>
	
					<tr>
						<td width='200'>Tahun </td><td>
						<?php $tahun=$this->session->userdata('tahun'); ?>
						<input type="number" name="tahun" value="<?php echo $tahun; ?>" disabled="disabled" class="form-control" />

						 <?php echo form_error('tahun') ?></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_indikator" value="<?php echo $id_indikator; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('indikator') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>