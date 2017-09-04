<?php

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

if (strlen($pum)>0 && strlen($kampung)>0 && strlen($kecamatan)>0 && strlen($kabupaten)>0 && strlen($provinsi)>0 && strlen($tahun)>0 && strlen($hukum)>0 && strlen(peta)>0 && strlen($lat)>0 && strlen($lon)>0 && strlen($selatan)>0 && strlen($utara)>0 && strlen($timur)>0 && strlen($barat)>0  ) {
	
	echo "Siap Simpan Data";
}else{
	?>
<div class="alert alert-warning alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> Data yang di-input belum lengkap.
</div>
	<?php
}

?>