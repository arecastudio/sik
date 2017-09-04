<?php require_once('pages/inc.php');?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Kampung</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style type="text/css">
		.input-group{
			margin-bottom: 5px;
		}
		.input-group-addon{
			min-width: 200px;
		}
	</style>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SIK</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <!--li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Link</a></li-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Pokok<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?ref=profil-kampung-list">Profil Kampung/Kelurahan</a></li>
            <li><a href="?ref=personil">Personil</a></li>
            <li><a href="#">Data Umum</a></li>
            <li><a href="#">Keuangan</a></li>
            <li><a href="#">Kelembagaan</a></li>
            <li><a href="#">Keamanan & Ketertiban</a></li>
            <li><a href="#">Lingkungan Hidup</a></li>
            <!--li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li-->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Keluarga<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profil Keluarga</a></li>
            <li><a href="#">Profil Keluarga</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Potensi Kampung<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profil Keluarga</a></li>
            <li><a href="#">Profil Keluarga</a></li>
          </ul>
        </li>
      </ul>        
      <!--form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form-->
      <ul class="nav navbar-nav navbar-right">
        <!--li><a href="#">Link</a></li-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Utility <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="wrapper">
	<div class="kepala"></div>
	<div class="konten">
		<?php
if (isset($_GET['ref'])) {
	$ref=$_GET['ref'];
	switch ($ref) {
		case 'profil-kampung-list':
			require_once('pages/profil-kampung-list.php');
			break;
		case 'profil-kampung-entry':
			require_once('pages/profil-kampung-entry.php');
			break;
		case 'personil':
			require_once('pages/personil.php');
			break;
		default:
			# code...
			break;
	}
}
		?>
	</div>
	<div class="kaki"></div>
</div>

</body>
</html>
