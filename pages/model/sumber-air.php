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
				$debit="KOSONG";
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
		
		default:
			# code...
			break;
	}
}

$conn->close();
?>