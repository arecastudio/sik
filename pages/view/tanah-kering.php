<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Penggunaan Lahan</h3>
  </div>
  <div class="panel-body">
    <ul class="nav nav-tabs">
	  <li role="presentation"><a href="?ref=penggunaan-lahan">Tanah Sawah</a></li>
	  <li role="presentation" class="active"><a href="#">Tanah Kering</a></li>
	  <li role="presentation"><a href="?ref=tanah">Tanah Basah</a></li>
	  <li role="presentation"><a href="?ref=tanah">Tanah Perkebunan</a></li>
	  <li role="presentation"><a href="?ref=tanah">Tanah Fas. Umum</a></li>
	  <li role="presentation"><a href="?ref=tanah">Tanah Hutan</a></li>
	</ul>
	<br/>
	<p>Masukan Data <b>Luas Wilayah menurut Penggunaan</b> sesuai cakupan area untuk kampung <?php echo $id_pokok_desa;?></p>

<form id="form" autocomplete="off" method="post" action="">
<div class="table-responsive col-sm-6">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No.</th>
				<th width="65%">Nama</th>
				<th>Luas Area</th>
				<th>Satuan</th>
			</tr>
		</thead>
		<tbody>
<?php
$sql="SELECT t.id,t.nama,j.id,j.nama,t.satuan,td.luas,(SELECT MAX(id) FROM tanah_guna) FROM tanah_guna AS t INNER JOIN jenis_tanah AS j ON j.id=t.id_jenis LEFT OUTER JOIN tanah_desa AS td ON td.id_tanah_guna=t.id AND td.id_pokok_desa=? WHERE j.id=?;";
$stmt=$conn->prepare($sql);
$id_jenis=2;
$id_pokok_desa=1;
$stmt->bind_param('ii',$id_pokok_desa,$id_jenis);
$i=0;
if ($stmt->execute()) {
	$result = $stmt->get_result();
	while ($row = $result->fetch_row()){
		$i++;
		?>
			<tr>
				<td align="center"><?php echo $i;?></td>
				<td><?php echo $row[1];?></td>
				<td><input type="text" class="form-control inputhektar" placeholder="Nilai" name="<?php echo $row[0];?>" value="<?php echo $row[5];?>" /></td>
				<td align="center"><?php echo $row[4];?></td>
			</tr>			
		<?php
		if ($i==1) echo "
			<input type=\"hidden\" name=\"hidden_max_id_tanah_guna\" value=\"$row[6]\" />
			<input type=\"hidden\" name=\"hidden_id_pokok_desa\" value=\"$id_pokok_desa\" />
		";
	}
}
?>
		</tbody>
		<tfoot>			
			<tr>
				<td colspan="4" align="center">
					<button type="button" class="btn btn-sx btn-primary" id="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
					<span class="hasil-submit" style="font-weight: bold;color: #00f;padding: 10px;"></span>
				</td>
			</tr>			
		</tfoot>
	</table>
</div>
</form>

</div>


  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  $('#submit').click(function(){
      $.ajax({
        type: 'post',
        url: 'pages/model/penggunaan-lahan-simpan.php',
        data: $('#form').serialize(),
        success: function (response) {
            /*$('#myModal').modal('show');*/
            $(".hasil-submit").html(response);
        }
      });
    });  
});
</script>