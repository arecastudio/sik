<script type="text/javascript">
	function SubmitData() {
	    var id = $("[name='hidden_id']").val(),
	    pum =$("#kode_pum").val(),
	    kampung = $("[name='nama-kampung']").val(),
	    kecamatan =$("#kecamatan").val(),
	    kabupaten =$("#kabupaten").val(),
	    provinsi =$("#provinsi").val(),
	    tahun =$("#tahun").val(),
	    hukum =$("#dasar_hukum").val(),
	    peta =$("#peta_resmi").val(),
	    lat =$("#lat").val(),
	    lon =$("#lon").val(),
	    selatan =$("#selatan").val(),
	    utara =$("#utara").val(),
	    timur =$("#timur").val(),
	    barat =$("#barat").val();
	    
	    $.post("pages/model/profil-kampung-update.php", {id:id,kampung:kampung,kecamatan:kecamatan,kabupaten:kabupaten,provinsi:provinsi,tahun:tahun,hukum:hukum,peta:peta,lat:lat,lon:lon,selatan:selatan,utara:utara,timur:timur,barat:barat},
	    function(data) {
		 $('#hasil-submit').html(data);
		 /*$('#form-submit-entry-data-kampung')[0].reset();*/
	    });
	}
</script>

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Entry Profil Kampung / Kelurahan</h3>
  </div>
  <div class="panel-body">
  	<div class="col-sm-5">  	
    <form method="post" action="" id="form-submit-entry-data-kampung">
    	<div class="input-group">
		  <span class="input-group-addon labelinput" id="basic-addon1">Kode PUM</span>
		  <input type="hidden" name="hidden_id" id="hidden_id" value="<?php echo $_GET['id'];?>" />
		  <input type="text" name="kode_pum" id="kode_pum2" class="form-control" placeholder="Masukkan kode Kampung" aria-describedby="basic-addon1" readonly value="<?php echo $_GET['kode_desa_pum'];?>" />
		</div>
		<div class="input-group">
		  <span class="input-group-addon labelinput" id="basic-addon2">Nama Kampung</span>
		  <input type="text" name="nama-kampung" class="form-control" placeholder="Masukkan nama Kampung" aria-describedby="basic-addon2" value="<?php echo $_GET['desa_kelurahan'];?>">
		</div>
		<div class="input-group">
		  <span class="input-group-addon labelinput" id="basic-addon1">Kecamatan</span>
		  <input type="text" id="kecamatan" class="form-control" placeholder="Masukkan nama Kecamatan" aria-describedby="basic-addon1" value="<?php echo $_GET['kecamatan'];?>">
		</div>
		<div class="input-group">
		  <span class="input-group-addon labelinput" id="basic-addon1">Kabupaten</span>
		  <input type="text" id="kabupaten" class="form-control" placeholder="Masukkan nama Kabupaten" aria-describedby="basic-addon1" value="<?php echo $_GET['kabupaten_kota'];?>">
		</div>
		<div class="input-group">
		  <span class="input-group-addon labelinput" id="basic-addon1">Provinsi</span>
		  <input type="text" id="provinsi" class="form-control" placeholder="Masukkan nama Provinsi" aria-describedby="basic-addon1" value="<?php echo $_GET['provinsi'];?>">
		</div>
		<div class="input-group">
		  <span class="input-group-addon labelinput" id="basic-addon1">Tahun Bentuk</span>
		  <input type="text" id="tahun" class="form-control" placeholder="" aria-describedby="basic-addon1" value="<?php echo $_GET['tahun_bentuk'];?>">
		</div>
		<div class="input-group">
		  <span class="input-group-addon labelinput" id="basic-addon1">Dasar Hukum</span>
		  <input type="text" id="dasar_hukum" class="form-control" placeholder="" aria-describedby="basic-addon1" value="<?php echo $_GET['dasar_hukum'];?>">
		</div>
		<div class="input-group">
		  <span class="input-group-addon labelinput" id="basic-addon1">Peta Resmi</span>
		  <input type="text" id="peta_resmi" class="form-control" placeholder="" aria-describedby="basic-addon1" value="<?php echo $_GET['peta_resmi_wilayah'];?>">
		</div>
		<div class="input-group">
		  <span class="input-group-addon labelinput" id="basic-addon1">Koordinat Lat.</span>
		  <input type="text" id="lat" class="form-control" placeholder="Masukkan koordinat Lintang" aria-describedby="basic-addon1" value="<?php echo $_GET['lat'];?>">
		</div>
		<div class="input-group">
		  <span class="input-group-addon labelinput" id="basic-addon1">Koordinat Lon.</span>
		  <input type="text" id="lon" class="form-control" placeholder="Masukkan koordinat Bujur" aria-describedby="basic-addon1" value="<?php echo $_GET['lon'];?>">
		</div>
		<div class="input-group">
		  <span class="input-group-addon labelinput" id="basic-addon1">Batas Utara</span>
		  <input type="text" id="utara" class="form-control" placeholder="" aria-describedby="basic-addon1" value="<?php echo $_GET['utara'];?>">
		</div>
		<div class="input-group">
		  <span class="input-group-addon labelinput" id="basic-addon1">Batas Selatan</span>
		  <input type="text" id="selatan" class="form-control" placeholder="" aria-describedby="basic-addon1" value="<?php echo $_GET['selatan'];?>">
		</div>
		<div class="input-group">
		  <span class="input-group-addon labelinput" id="basic-addon1">Batas Timur</span>
		  <input type="text" id="timur" class="form-control" placeholder="" aria-describedby="basic-addon1" value="<?php echo $_GET['timur'];?>">
		</div>
		<div class="input-group">
		  <span class="input-group-addon labelinput" id="basic-addon1">Batas Barat</span>
		  <input type="text" id="barat" class="form-control" placeholder="" aria-describedby="basic-addon1" value="<?php echo $_GET['barat'];?>">
		</div>

<center>
    <p id="hasil-submit" style="font-weight: bold;color: #00f;padding: 10px;"></p>
</center>
		
		<div class="btn-group pull-right" role="group" aria-label="...">
		  <a href="?ref=profil-kampung-list" class="btn btn-warning btn-lg">Kembali</a>
		  <button type="button" onclick="SubmitData()" class="btn btn-primary btn-lg">Simpan</button>
		</div>
    </form>
	</div>
  </div>
</div>