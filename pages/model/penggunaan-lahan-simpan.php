<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

/*if ( isset($_POST['nama']) && isset($_POST['ket']) && isset($_POST['manager']) ) {
	$nama=trim($_POST['nama']);
	$ket=trim($_POST['ket']);
	$mgr=trim($_POST['manager']);

	if (strlen($nama)>0) {
		$sql="INSERT IGNORE INTO divisi(nama, ket, nik_manager)VALUES(?,?,?);";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('sss',$nama,$ket,$mgr);
		if ($stmt->execute()) {
			echo "Berhasil menambahkan data !";
			echo "<script type=\"text/javascript\">document.getElementById('form').reset();</script>";
		}else{
			echo "Gagal menambahkan data !";
		}
		$stmt->close();
	}else echo "Data belum lengkap !";
}*/

if (isset($_POST['hidden_max_id_tanah_guna']) && isset($_POST['hidden_id_pokok_desa']) && $_POST['hidden_max_id_tanah_guna']>0 ) {
	$hidden_max_id_tanah_guna=$_POST['hidden_max_id_tanah_guna'];
	$hidden_id_pokok_desa=$_POST['hidden_id_pokok_desa'];
	$i=1;
	$sql="INSERT INTO tanah_desa(id_pokok_desa,id_tanah_guna,luas)VALUES(?,?,?) ON DUPLICATE KEY UPDATE luas=VALUES(luas);";
	$stmt=$conn->prepare($sql);
	$stmt->bind_param('iii',$hidden_id_pokok_desa,$id_tanah_guna,$luas);
	while ( $i <= $hidden_max_id_tanah_guna) {
		#if (isset($_POST[$i]) && strlen(trim($_POST[$i]))>0 ) {
		if (isset($_POST[$i])) {
			$id_tanah_guna=$i;
			$luas=$_POST[$i];
			$stmt->execute();
		}
		$i++;
	}
	$stmt->close();
	if($i>=$hidden_max_id_tanah_guna) {
		?>
<br/>
<div class="alert alert-success alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Berhasil!</strong> Data telah ter-<i>update</i> ke dalam <i>database</i>.
</div>
		<?php
	}
}

$conn->close();
?>