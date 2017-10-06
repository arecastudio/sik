<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

if (isset($_GET['act']) && $_GET['act']!='') {
	$act=$_GET['act'];
	switch ($act) {
		case 'volume':
			if (
				isset($_POST['hidden_max_sumber_air']) &&
				isset($_POST['hidden_id_pokok_desa'])
			) {
				$i=1;
				$max=$_POST['hidden_max_sumber_air'];
				$id_pokok_desa=$_POST['hidden_id_pokok_desa'];
				$sql="INSERT INTO sumber_air_volume(id_sumber_air,id_pokok_desa,debit)VALUES(?,?,?) ON DUPLICATE KEY UPDATE debit=VALUES(debit);";
				$stmt=$conn->prepare($sql);
				$stmt->bind_param('iis',$id_sumber_air,$id_pokok_desa,$debit);
				while ($i<=$max) {
					if (isset($_POST[$i])) {
						$id_sumber_air=$i;
						$debit=$_POST[$i];
						$stmt->execute();
					}
					$i++;
				}
				$stmt->close();
				if ($i>=$max) {
					echo "<br/><br/>Data telah berhasil ter-update ke dalam Database !";
				}
			}
			break;
		case 'kwalitas':
			if (
				isset($_POST['hidden_max_kwalitas_air']) &&
				isset($_POST['hidden_id_pokok_desa'])
			) {
				$i=1;
				#echo "kjhsdfkjhdsf".$_POST['kwalitas1'];
				$max=$_POST['hidden_max_kwalitas_air'];
				$id_pokok_desa=$_POST['hidden_id_pokok_desa'];
				$sql="
				INSERT INTO kwalitas_air_desa
				(id_kwalitas_air, id_pokok_desa, jumlah, rusak, pemanfaat, kwalitas)
				VALUES(?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE jumlah=VALUES(jumlah),rusak=VALUES(rusak),pemanfaat=VALUES(pemanfaat),kwalitas=VALUES(kwalitas)
				;";
				$stmt=$conn->prepare($sql);
				$stmt->bind_param('iiiiis',$id_kwalitas_air,$id_pokok_desa,$jumlah,$rusak,$pemanfaat,$kwalitas);
				while ($i<=$max) {
					if (isset($_POST['hidden_id_kwalitas_air'.$i])) {
						$id_kwalitas_air=$_POST['hidden_id_kwalitas_air'.$i];
						$id_pokok_desa=$_POST['hidden_id_pokok_desa'];
						$jumlah=$_POST['jumlah'.$i];
						$rusak=$_POST['rusak'.$i];
						$pemanfaat=$_POST['pemanfaat'.$i];
						$kwalitas=$_POST['kwalitas'.$i];
						$stmt->execute();
					}
					$i++;
				}
				$stmt->close();
				if ($i>=$max) {
					echo "<br/><br/>Data telah berhasil ter-update ke dalam Database !";
				}
			}
			break;
		default:
			# code...
			break;
	}
}

$conn->close();
?>