<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Obyek Wisata</h3>
  </div>
  <div class="panel-body">
<form id="form" autocomplete="off" method="post" action="">
<div class="table-responsive col-sm-7">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No.</th>
				<th width="65%">Nama</th>
				<th>Luas (Ha)</th>
				<th>Pemanfaatan</th>
			</tr>
		</thead>
		<tbody>
<?php
$sql="SELECT p.id,p.nama,d.luas,d.pemanfaatan,(SELECT MAX(id) FROM pariwisata)  FROM pariwisata AS p LEFT OUTER JOIN pariwisata_desa AS d ON d.id_pariwisata=p.id AND d.id_pokok_desa=? WHERE 1;";
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
					<?php echo ucwords($row[1]);?>
					<input type="hidden" name="hidden_id_pariwisata" value="<?php echo $row[0];?>" />
				</td>
				<td><input type="text" name="luas<?php echo $row[0];?>" value="<?php echo $row[2];?>" class="form-control text-luas" placeholder=""/></td>
				<td align="center">
					<select name="pemanfaatan<?php echo $row[0];?>" class="form-control">
						<option value="AKTIF" <?php if($row[3]=='AKTIF') echo " selected";?> >Aktif</option>
						<option value="NON-AKTIF" <?php if($row[3]=='NON-AKTIF') echo " selected";?> >Non-Aktif</option>
					</select>
				</td>
			</tr>			
		<?php
		if ($i==1) echo "
			<input type=\"hidden\" name=\"hidden_max_pariwisata\" value=\"$row[4]\" />
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

<script type="text/javascript">
$(document).ready(function(){
  $('#submit').click(function(){
      $.ajax({
        type: 'post',
        url: 'pages/model/pariwisata.php',
        data: $('#form').serialize(),
        success: function (response) {
            /*$('#myModal').modal('show');*/
            $(".hasil-submit").html(response);
        }
      });
    });  
});
</script>