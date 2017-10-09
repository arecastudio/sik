<?php
require_once('../inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

	$id=trim($_POST['id']);$id=$conn->real_escape_string($id);
	#$pum=trim($_POST['kode_desa_pum']);$pum=$conn->real_escape_string($pum);
	$kampung=trim($_POST['kampung']);$kampung=$conn->real_escape_string($kampung);
	$kecamatan=trim($_POST['kecamatan']);$kecamatan=$conn->real_escape_string($kecamatan);
	$kabupaten=trim($_POST['kabupaten']);$kabupaten=$conn->real_escape_string($kabupaten);
	$provinsi=trim($_POST['provinsi']);$provinsi=$conn->real_escape_string($provinsi);
	$tahun=trim($_POST['tahun']);$tahun=$conn->real_escape_string($tahun);
	$hukum=trim($_POST['hukum']);$hukum=$conn->real_escape_string($hukum);
	$peta=trim($_POST['peta']);$peta=$conn->real_escape_string($peta);
	$lat=trim($_POST['lat']);$lat=$conn->real_escape_string($lat);
	$lon=trim($_POST['lon']);$lon=$conn->real_escape_string($lon);
	$selatan=trim($_POST['selatan']);$selatan=$conn->real_escape_string($selatan);
	$utara=trim($_POST['utara']);$utara=$conn->real_escape_string($utara);
	$timur=trim($_POST['timur']);$timur=$conn->real_escape_string($timur);
	$barat=trim($_POST['barat']);$barat=$conn->real_escape_string($barat);

	#echo "string============================";

if (strlen($id)>0 && strlen($kampung)>0 && strlen($kecamatan)>0 && strlen($kabupaten)>0 && strlen($provinsi)>0 && strlen($tahun)>0 && strlen($hukum)>0 && strlen($peta)>0 && strlen($lat)>0 && strlen($lon)>0 && strlen($selatan)>0 && strlen($utara)>0 && strlen($timur)>0 && strlen($barat)>0 ) {
	
	#$sql="INSERT IGNORE INTO pokok_desa(kode_desa_pum,desa_kelurahan,kecamatan,kabupaten_kota,provinsi,tahun_bentuk,dasar_hukum,peta_resmi_wilayah,lat,lon,utara,selatan,timur,barat)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
	$sql="
	UPDATE pokok_desa SET 
		desa_kelurahan=?,
		kecamatan=?, 
		kabupaten_kota=?,
		provinsi=?,
		tahun_bentuk=?,
		dasar_hukum=?,
		peta_resmi_wilayah=?,
		lat=?,
		lon=?,
		utara=?,
		selatan=?,
		timur=?,
		barat=?
	WHERE id=?
	;";

	$stmt=$conn->prepare($sql);
	$stmt->bind_param('sssssssssssssi',$kampung,$kecamatan,$kabupaten,$provinsi,$tahun,$hukum,$peta,$lat,$lon,$selatan,$utara,$timur,$barat,$id);
	if ($stmt->execute()) {
		?>
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Success!</strong> Data berhasil diubah.
		</div>
		<!--script type="text/javascript">document.getElementById('form-submit-entry-data-kampung').reset();</script-->
		<?php
	}else{
		?>	
		<div class="alert alert-danger alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Warning!</strong> Terjadi kesalahan input data.
		</div>	
		<?php
	}
	$stmt->close();

}else{
	?>	
	<div class="alert alert-warning alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Warning!</strong> Data yang di-input belum lengkap.
	</div>	
	<?php
}

$conn->close();
?>