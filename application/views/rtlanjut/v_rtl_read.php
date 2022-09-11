
<div class="content-wrapper">
	
	<section class="content">
		<div class="box box-warning box-solid">
			<div class="box-header with-border">
				<h3 class="box-title">DETAIL DATA V_RTL</h3>
			</div>
		
		<table class='table table-bordered'>        

	
			<tr>
				<td>Indikator</td>
				<td><?php echo $indikator; ?></td>
			</tr>

			<tr>
				<td>Bulan</td>
				<td><?=bulanindo($bulan)?></td>
			</tr>
	
			<tr>
				<td>Analisis</td>
				<td><?php echo $analisis; ?></td>
			</tr>
	
			<tr>
				<td>Tasks</td>
				<td><?php echo $tasks; ?></td>
			</tr>
	
			<tr>
				<td></td>
				<td><a href="<?php echo site_url('rtlanjut') ?>" class="btn btn-default">Kembali</a></td>
			</tr>
	
		</table>
		</div>
	</section>
</div>