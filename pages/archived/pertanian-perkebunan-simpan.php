<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if ( isset($_POST['nama']) && isset($_POST['hidden_id_pokok_desa']) ) {
	$nama=trim($_POST['nama']);
	$id_pokok_desa=trim($_POST['hidden_id_pokok_desa']);

	if (strlen($nama)>0) {
		$sql="INSERT IGNORE INTO tani_kebun(id_pokok_desa,nama_komoditas)VALUES(?,?);";
		$stmt=$conn->prepare($sql);
		$stmt->bind_param('ss',$id_pokok_desa,$nama);
		$nama=ucwords($nama);
		if ($stmt->execute()) {
			echo "Berhasil menambahkan data !";
			echo "<script type=\"text/javascript\">document.getElementById(\"form\").reset();</script>";
		}else{
			echo "Gagal menambahkan data !";
		}
		$stmt->close();
	}else echo "Data belum lengkap !";
}
$conn->close();
?>
