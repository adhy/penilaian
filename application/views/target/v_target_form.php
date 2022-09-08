<div class="content-wrapper">
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title"><?php echo strtoupper($button) ?> DATA V_TARGET</h3>
			</div>
			<form action="<?php echo $action; ?>" method="post">
			
				<table class='table table-bordered'>
	    
					<tr>
						<td width='200'>Indikator </td>
						<td> 
						<?php 
						//$inwhere=3;
						$inwhere=$this->session->userdata('id_user_level');
						$where=array('id_user_level'=>$inwhere);
						echo cmb_dinamiswhere('indikator', 'tbl_indikator', 'indikator', 'id_indikator', $id_indikator,'DESC',$where,'-- Pilih Indikator --') ?>
						<?php echo form_error('indikator') ?></td>
					</tr>

	
					<tr>
						<td width='200'>Bulan </td><td>
						<select id="e1" name="bulan" class="form-control select2 select2-hidden-accessible" style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true" data-placeholder="-- Pilih Bulan --">
						<option></option>
						<?php $month = array('Januari' => 1, 'Febuari' => 2, 'Maret' => 3, 'April' => 4, 'Mei' => 5, 'Juni' => 6,'Juli' => 7,'Agustus' => 8,'September' => 9,'Oktober' => 10,'November' => 11,'Desember' => 12,);
						foreach($month as $key=>$row):   
							if(isset($bulan)){            
							   echo '<option value="'.$row?>"<?=$row==$bulan ? ' selected="selected"' : '';?>><?=($key)?></option>                                                           
                            <?php   
							   }else {
								echo '<option value="'.$row.'">'.($key).'</option>';
                            } endforeach; ?>
						</select> <?php echo form_error('bulan') ?>	
					</tr>
	
					<tr>
						<td width='200'>Target </td><td><input type="text" class="form-control PerNum" name="target" id="target" placeholder="Target" value="<?php echo $target; ?>" /> <?php echo form_error('target') ?></td>
					</tr>
	
					<tr>
						<td></td>
						<td>
							<input type="hidden" name="id_target" value="<?php echo $id_target; ?>" /> 
							<button type="submit" class="btn btn-danger"><i class="fa fa-floppy-o"></i> <?php echo $button ?></button> 
							<a href="<?php echo site_url('target') ?>" class="btn btn-info"><i class="fa fa-sign-out"></i> Kembali</a>
						</td>
					</tr>
	
				</table>
			</form>
		</div>
	</section>
</div>