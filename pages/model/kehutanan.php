<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
if (isset($_GET['act'])) {
	$act=$_GET['act'];
	switch ($act) {
		case 'simpan':
			if ( isset($_POST['nama']) && isset($_POST['hidden_id_pokok_desa']) ) {
				$nama=trim($_POST['nama']);$nama=ucwords($nama);
				$id_pokok_desa=trim($_POST['hidden_id_pokok_desa']);
				$hpanen=trim($_POST['hpanen']);
				$satuan=trim($_POST['satuan']);
				$nproduk=trim($_POST['nproduk']);
				$bbaku=trim($_POST['bbaku']);
				$bpenolong=trim($_POST['bpenolong']);
				$byantara=trim($_POST['byantara']);
				$phasil=trim($_POST['phasil']);
				if (strlen($nama)>0) {
					$sql="
INSERT INTO hasil_hutan
(id_pokok_desa, nama_komoditas, hasil_panen, satuan, nilai_produksi, nilai_baku, biaya_penolong, biaya_antara, pemasaran_hasil)
VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)
					;";
					$stmt=$conn->prepare($sql);
					$stmt->bind_param('isisiiiii',$id_pokok_desa,$nama,$hpanen,$satuan,$nproduk,$bbaku,$bpenolong,$byantara,$phasil);
					if ($stmt->execute()) {
						echo "Berhasil menambahkan data !";
						echo "<script type=\"text/javascript\">document.getElementById(\"form\").reset();</script>";
					}else{
						echo "Gagal menambahkan data !";
					}
					$stmt->close();
				}else echo "Data belum lengkap !";
			}
			break;
		case 'hapus':
			if(isset($_GET['id_hapus'])){
				$id_hapus=$_GET['id_hapus'];
				#echo "menghapus data ".$id_hapus;
				$sql="DELETE FROM  hasil_hutan WHERE id=?;";
				$stmt=$conn->prepare($sql);
				$stmt->bind_param('i',$id_hapus);
				if ($stmt->execute()) {
					echo "Berhasil manghapus data !";
				}
				$stmt->close();
			}			
			break;
		default:
			$sql="
			SELECT id, id_pokok_desa, nama_komoditas, hasil_panen, satuan, nilai_produksi, nilai_baku, biaya_penolong, biaya_antara, pemasaran_hasil, tanggal
			FROM hasil_hutan
			WHERE id_pokok_desa=?
			ORDER BY tanggal DESC;
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
							<td colspan="2"><button class="btn btn-xs btn-danger btn-hapus" id="<?php echo $row[0];?>"  name="<?php echo $row[2];?>" ><span class="glyphicon glyphicon-trash"></span></button></td>
							<!--td><button class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></td-->
						</tr>
					<?php
				}
				if ($i==0) {
					?>
						<tr>
							<td colspan="11">
			<p class="alert alert-warning tengah" role="alert">
			  <a href="#" class="alert-link">Data belum ada</a>
			</p>
							</td>
						</tr>
					<?php
				}
			}
			break;
	}#switch eof
}#get act var eof
$conn->close();
?>

<script type="text/javascript">
$(document).ready(function() {  

	  $("#dialog").dialog({
	     autoOpen: false,
	     modal: true,
	     buttons : {
          "Ya" : function() {
              /*alert("You have confirmed!");*/
              var id_hapus=$('#id_hapus').val();
	        	$.get('pages/model/kehutanan.php?act=hapus&id_hapus='+id_hapus, function (data) {
	            	$('.hasil-submit').html(data);
	        	});
              $(this).dialog("close");

	            $.get('pages/model/kehutanan.php?act=show', function (data) {
		            $('#kehutanan-show').html(data);
		        });	

          },
          "Tidak" : function() {
            $(this).dialog("close");
          }
        }
      });

	  $(".btn-hapus").click(function() {
	    var id = $(this).attr('id'); // $(this) refers to button that was clicked
	    /*alert(id);*/
        var nama_komoditas = $(this).attr('name');
        $('#komoditas_hapus').html('<br/><strong>'+nama_komoditas+'</strong>');
        $('#id_hapus').val(id);

        $("#dialog").dialog("open");

	  });
});
</script>