<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Sumber Air</h3>
  </div>
  <div class="panel-body">
    <ul class="nav nav-tabs">
	  <li role="presentation" ><a href="?ref=sumber-air">Potensi</a></li>
	  <li role="presentation" class="active" ><a href="#">Kwalitas</a></li>
	</ul>
	<br/>

<form id="form" autocomplete="off" method="post" action="">
<div class="table-responsive col-sm-7">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No.</th>
				<th width="45%">Nama</th>
				<th>Jml Unit</th>
				<th>Jml Rusak</th>
				<th>KK Pengguna</th>
				<th>Kwalitas</th>
			</tr>
		</thead>
		<tbody>
<?php
$sql="
SELECT k.id,k.nama, d.jumlah, d.rusak, d.pemanfaat, d.kwalitas,(SELECT MAX(id) FROM kwalitas_air)
FROM kwalitas_air AS k
LEFT OUTER JOIN kwalitas_air_desa AS d ON d.id_kwalitas_air=k.id AND d.id_pokok_desa=?
WHERE 1
;";
$stmt=$conn->prepare($sql);
#$id_jenis=$conn->real_escape_string($id_jenis);
$id_pokok_desa=1;
$stmt->bind_param('i',$id_pokok_desa);
$i=0;
if ($stmt->execute()) {
	$result = $stmt->get_result();
	while ($row = $result->fetch_row()){
		$i++;
		?>
			<tr>
				<td align="center"><?php echo $i;?></td>
				<td>
					<?php echo $row[1];?>
					<input type="hidden" name="hidden_id_kwalitas_air<?php echo $row[0];?>" value="<?php echo $row[0];?>" />
				</td>
				<td align="center"><input type="text" name="jumlah<?php echo $row[0];?>" class="form-control text-luas" value="<?php echo $row[2];?>" /></td>
				<td align="center"><input type="text" name="rusak<?php echo $row[0];?>" class="form-control text-luas" value="<?php echo $row[3];?>" /></td>
				<td align="center"><input type="text" name="pemanfaat<?php echo $row[0];?>" class="form-control text-luas" value="<?php echo $row[4];?>" /></td>
				<td align="center">
					<select name="kwalitas<?php echo $row[0];?>" class="form-control">
						<option value="BAIK" <?php if($row[5]=='BAIK') echo " selected";?> >Baik</option>
						<option value="BERBAU" <?php if($row[5]=='BERBAU') echo " selected";?> >Berbau</option>
						<option value="BERWARNA" <?php if($row[5]=='BERWARNA') echo " selected";?> >Berwarna</option>
						<option value="BERASA" <?php if($row[5]=='BERASA') echo " selected";?> >Berasa</option>
					</select>
				</td>
			</tr>			
		<?php
		if ($i==1) echo "
			<input type=\"hidden\" name=\"hidden_max_kwalitas_air\" value=\"$row[6]\" />
			<input type=\"hidden\" name=\"hidden_id_pokok_desa\" value=\"$id_pokok_desa\" />
		";
	}
}
?>
		</tbody>
		<tfoot>			
			<tr>
				<td colspan="6" align="center">
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

<script type="text/javascript">
$(document).ready(function(){
  $('#submit').click(function(){
      $.ajax({
        type: 'post',
        url: 'pages/model/sumber-air.php?act=kwalitas',
        data: $('#form').serialize(),
        success: function (response) {
            /*$('#myModal').modal('show');*/
            $(".hasil-submit").html(response);
        }
      });
    });  
});
</script>