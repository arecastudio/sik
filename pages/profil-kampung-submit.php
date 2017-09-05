<?php
require_once('inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

	$pum=trim($_POST['keys']);
	$kampung=trim($_POST['kampung']);
	$kecamatan=trim($_POST['kecamatan']);
	$kabupaten=trim($_POST['kabupaten']);
	$provinsi=trim($_POST['provinsi']);
	$tahun=trim($_POST['tahun']);
	$hukum=trim($_POST['hukum']);
	$peta=trim($_POST['peta']);
	$lat=trim($_POST['lat']);
	$lon=trim($_POST['lon']);
	$selatan=trim($_POST['selatan']);
	$utara=trim($_POST['utara']);
	$timur=trim($_POST['timur']);
	$barat=trim($_POST['barat']);

if (strlen($pum)>0 && strlen($kampung)>0 && strlen($kecamatan)>0 && strlen($kabupaten)>0 && strlen($provinsi)>0 && strlen($tahun)>0 && strlen($hukum)>0 && strlen($peta)>0 && strlen($lat)>0 && strlen($lon)>0 && strlen($selatan)>0 && strlen($utara)>0 && strlen($timur)>0 && strlen($barat)>0 ) {
	
	$sql="INSERT IGNORE INTO pokok_desa(kode_desa_pum,desa_kelurahan,kecamatan,kabupaten_kota,provinsi,tahun_bentuk,dasar_hukum,peta_resmi_wilayah,lat,lon,utara,selatan,timur,barat)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?);";

	$stmt=$conn->prepare($sql);
	$stmt->bind_param('ssssssssssssss',$pum,$kampung,$kecamatan,$kabupaten,$provinsi,$tahun,$hukum,$peta,$lat,$lon,$selatan,$utara,$timur,$barat);
	if ($stmt->execute()) {
		?>
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <strong>Success!</strong> Data berhasil ditambahkan.
		</div>
		<script type="text/javascript">document.getElementById('form-submit-entry-data-kampung').reset();</script>
		<?php
	}
	$stmt->close();

}else{
	?>	
	<div class="alert alert-danger alert-dismissible" role="alert">
	  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	  <strong>Warning!</strong> Data yang di-input belum lengkap.
	</div>	
	<?php
}

$conn->close();
?>