<?php require_once('pages/inc.php');
$conn=new mysqli(HOST,USER,PASS,DB);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$id_pokok_desa=1;
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sistem Informasi Kampung</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <!--script src="https://code.jquery.com/jquery-1.12.4.js"></script-->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


	<style type="text/css">
		.input-group{
			margin-bottom: 5px;
		}
		.input-group-addon{
			/*min-width: 200px;*/
		}
    .panel{
      min-height: 450px;
    }
    .bingkai{
      border:1px dashed #999;
      padding-bottom: 2px;
      border-radius: 5px;
      float: left;
      margin-left: 5px;
      margin-bottom: 5px;
    }
    .inputhektar{
      text-align: right;
    }
    .labelhektar{
      text-align: right;
      min-width: 200px;
    }
    .labelkapsi{
      font-size: 15px;
      font-weight: bold;
    }
    .labelinput{
      min-width: 200px;
    }

.text-luas{
max-width:100px;
text-align:right;
}

    th{
      text-align: center;
      font-weight: bold;
    }

    .tengah{text-align: center;}

    body{
      background-image: url('assets/img/wallpaper.jpg');
      margin-bottom:20px;
      /*margin-top: 50px; */
    }

  #break-point {
      position: fixed;
      height: 20px;
      background: linear-gradient(to right,#000,#333,#555,#888,#999,#aaa,#bbb,#ccc,#ddd, #ddd, #eee);
      bottom: 0px;
      left: 0px;
      right: 0px;
      margin-bottom: 0px;
      text-align: center;
      font-size: 75%;
      z-index:10001;        
  }
  #break-point a {color: #333;}

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
            <!--li><a href="?ref=personil">Personil</a></li-->
            <li role="separator" class="divider"></li>
            <li><a href="?ref=pilih-kampung">Pilih Kampung <span class="glyphicon glyphicon-tasks"></span></a></li>
            <!--li><a href="#">Data Umum</a></li>
            <li><a href="#">Keuangan</a></li>
            <li><a href="#">Kelembagaan</a></li>
            <li><a href="#">Keamanan & Ketertiban</a></li>
            <li><a href="#">Lingkungan Hidup</a></li-->
            <!--li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">One more separated link</a></li-->
          </ul>
        </li>
        <!--li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Data Keluarga<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Profil Keluarga</a></li>
            <li><a href="#">Profil Keluarga</a></li>
          </ul>
        </li-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Potensi Kampung<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="?ref=penggunaan-lahan">Penggunaan Lahan</a></li>
            <!--li><a href="?ref=sumber-daya-alam">Sumber Daya Kampung</a></li-->
            <li><a href="?ref=pertanian-perkebunan">Produksi Pertanian & Perkebunan</a></li>
            <li><a href="?ref=kehutanan">Kehutanan</a></li>
            <li><a href="?ref=peternakan">Peternakan</a></li>
            <li><a href="?ref=sumber-air">Sumber Air</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="?ref=pariwisata">Obyek Wisata</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="?ref=sdm">Sumber Daya Manusia</a></li>
          </ul>
        </li>


        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Laporan<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="pages/reports/cetak-laporan.php?rep=penggunaan-lahan" target="_blank">Penggunaan Lahan</a></li>
            <!--li><a href="?ref=sumber-daya-alam">Sumber Daya Kampung</a></li-->
            <li><a href="pages/reports/cetak-laporan.php?rep=pertanian-perkebunan" target="_blank">Produksi Pertanian & Perkebunan</a></li>
            <li><a href="pages/reports/cetak-laporan.php?rep=kehutanan" target="_blank">Kehutanan</a></li>
            <li><a href="pages/reports/cetak-laporan.php?rep=peternakan" target="_blank">Peternakan</a></li>
            <li><a href="pages/reports/cetak-laporan.php?rep=sumber-air" target="_blank">Sumber Air</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="pages/reports/cetak-laporan.php?rep=pariwisata" target="_blank">Obyek Wisata</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="?ref=sdm">Sumber Daya Manusia</a></li>
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
		<?php require_once('pages/view/konten.php'); ?>
	</div>
	<div class="kaki"></div>
</div>
<?php break_point();?>
</body>
</html>
<?php
$conn->close();
?>
