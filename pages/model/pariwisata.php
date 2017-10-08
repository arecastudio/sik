<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
			if (
				isset($_POST['hidden_max_pariwisata']) &&
				isset($_POST['hidden_id_pokok_desa'])
			) {
				$i=1;#echo "string";
				$max=$_POST['hidden_max_pariwisata'];
				$id_pokok_desa=$_POST['hidden_id_pokok_desa'];
				$sql="INSERT INTO pariwisata_desa(id_pariwisata,id_pokok_desa,luas,pemanfaatan)VALUES(?,?,?,?) ON DUPLICATE KEY UPDATE luas=VALUES(luas), pemanfaatan=VALUES(pemanfaatan);";
				$stmt=$conn->prepare($sql);
				$stmt->bind_param('iiis',$id_pariwisata,$id_pokok_desa,$luas,$pemanfaatan);
				while ($i<=$max) {
					if (isset($_POST['luas'.$i])) {
						$id_pariwisata=$i;
						$luas=$_POST['luas'.$i];
						$pemanfaatan=$_POST['pemanfaatan'.$i];
						$stmt->execute();
						#echo $i."<br/>";
					}
					$i++;
				}
				$stmt->close();
				if ($i>=$max) {
					echo "<br/><br/>Data telah berhasil ter-update ke dalam Database !";
				}
			}

$conn->close();
?>

