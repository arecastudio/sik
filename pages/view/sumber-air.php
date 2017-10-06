<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Sumber Air</h3>
  </div>
  <div class="panel-body">
    <ul class="nav nav-tabs">
	  <li role="presentation" class="active" ><a href="#">Potensi</a></li>
	  <li role="presentation" ><a href="?ref=kwalitas-air">Kwalitas</a></li>
	</ul>
	<br/>

<form id="form" autocomplete="off" method="post" action="">
<div class="table-responsive col-sm-6">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No.</th>
				<th width="65%">Nama</th>
				<th>Debit / Volume</th>
			</tr>
		</thead>
		<tbody>
<?php
$sql="SELECT s.id,s.nama,v.debit,(SELECT MAX(id) FROM sumber_air)  FROM sumber_air AS s LEFT OUTER JOIN sumber_air_volume AS v ON v.id_sumber_air=s.id AND v.id_pokok_desa=? WHERE 1;";
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
					<input type="hidden" name="hidden_id_sumber_air" value="<?php echo $row[0];?>" />
				</td>
				<td align="center">
					<select name="<?php echo $row[0];?>" class="form-control">
						<option value="KOSONG" <?php if($row[2]=='KOSONG') echo " selected";?> >Kosong</option>
						<option value="KECIL" <?php if($row[2]=='KECIL') echo " selected";?> >Kecil</option>
						<option value="SEDANG" <?php if($row[2]=='SEDANG') echo " selected";?> >Sedang</option>
						<option value="BESAR" <?php if($row[2]=='BESAR') echo " selected";?> >Besar</option>
					</select>
				</td>
			</tr>			
		<?php
		if ($i==1) echo "
			<input type=\"hidden\" name=\"hidden_max_sumber_air\" value=\"$row[3]\" />
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
        url: 'pages/model/sumber-air.php?act=volume',
        data: $('#form').serialize(),
        success: function (response) {
            /*$('#myModal').modal('show');*/
            $(".hasil-submit").html(response);
        }
      });
    });  
});
</script>