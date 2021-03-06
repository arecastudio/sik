<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$sql="
SELECT id, id_pokok_desa, nama_komoditas, luas, hasil_panen, nilai_produksi, biaya_pupuk, biaya_bibit, biaya_obat, biaya_lainnya, pemasaran_hasil
FROM tani_kebun
WHERE id_pokok_desa=?;
";
$stmt=$conn->prepare($sql);
$stmt->bind_param('i',$id_pokok_desa);
$i=0;
$id_pokok_desa=1;
if ($stmt->execute()) {
	$result=$stmt->get_result();
	while ($row=$result->fetch_row()) {
		$i++;
		?>
			<tr align="center">
				<td><?php echo $i;?></td>
				<td align="left"><?php echo $row[2];?></td>
				<td><?php echo $row[3];?></td>
				<td><?php echo $row[4];?></td>
				<td><?php echo $row[5];?></td>
				<td><?php echo $row[6];?></td>
				<td><?php echo $row[7];?></td>
				<td><?php echo $row[8];?></td>
				<td><?php echo $row[9];?></td>
				<td><?php echo $row[10];?></td>
				<td><button class="btn btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span></button></td>
				<td><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></td>
			</tr>
		<?php
	}
	if ($i==0) {
		?>
			<tr>
				<td colspan="12">
<div class="alert alert-warning tengah" role="alert">
  <a href="#" class="alert-link">Data belum ada</a>
</div>
				</td>
			</tr>
		<?php
	}
}
?>
