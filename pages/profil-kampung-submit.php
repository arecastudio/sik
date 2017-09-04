<?php
if(isset($_POST['keys'])){
	$keys=trim($_POST['keys']);
	$nama_kampung=trim($_POST['nama_kampung']);
	$kecamatan=trim($_POST['kecamatan']);
	echo $nama_kampung."<br/>".$keys."<br/>".$kecamatan;
	?>

<div class="alert alert-info alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Warning!</strong> Better check yourself, you're not looking too good.
</div>

<script type="text/javascript">
	$('#form-submit-entry-data-kampung')[0].reset();
</script>

	<?php
}

?>