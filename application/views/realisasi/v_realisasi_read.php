
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA REALISASI</h3>
			</div>
		
		<table class='table table-bordered'>        
	
			<tr>
				<td>Indikator</td>
				<td><?php echo $indikator; ?></td>
			</tr>
	
			<tr>
				<td>Tahun</td>
				<td><?php echo $tahun; ?></td>
			</tr>
	
			<tr>
				<td>Bulan</td>
				<td><?php echo bulanindo($bulan); ?></td>
			</tr>
	
			<tr>
				<td>Target</td>
				<td><?php echo $target; ?></td>
			</tr>
	
			<tr>
				<td>Realisasi</td>
				<td><?php echo $realisasi; ?></td>
			</tr>
	
			<tr>
				<td>Capaian</td>
				<td><?php echo $capaian.' %'; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('realisasi') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>