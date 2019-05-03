
<h2>Kelas <?=$jen_kelas->nama_kelas_jenis?></h2>
<br>
<div class='table-responsive'>
	<table class='table table-striped' >
		<tr>
			<th>Nama Biaya</th>
			<th>Besaran Biaya</th>
		</tr>
		<?php
			foreach ($rincian_biaya as $res){
		?>
		<tr>
			<td><?=$res->nm_biaya_kuliah?></td>
			<td>Rp. <?=number_format($res->biaya_kuliah,0,',','.')?></td>
		</tr>
		<?php
}
?>
	</table>
</div>
