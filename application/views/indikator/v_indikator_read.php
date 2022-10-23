
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA INDIKATOR</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Kelompok Satker</td>
				<td><?php echo $nama_level; ?></td>
			</tr>
	
			<tr>
				<td>Indikator</td>
				<td><?php echo $indikator; ?></td>
			</tr>
	
			<tr>
				<td>Tahun</td>
				<td><?php echo $tahun; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('indikator') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>