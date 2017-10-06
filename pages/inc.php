<?php
#inc.php
define('HOST', 'localhost');
define('USER', 'rail');
define('PASS', '');
define('DB', 'db_sik');

error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set('Asia/Jayapura');
$tanggal=date('d-M-Y [H:i:s]',time());


/*$con=mysqli_connect(HOST,USER,PASS,DB);


if (mysqli_connect_errno()){
  echo "Failed to connect to MySQL: ".mysqli_connect_error();
}*/

function base_url(){
	return "http://localhost/sik/";
}

function break_point(){
	echo "<div id=\"break-point\">Pemerintah Kab. Jayapura &copy; 2017. All right reserved. Powered by <a href=\"http://arecastudio.github.io/\" target=\"_blank\">Developer</a>.</div>";
}

function satuan_panen($val){
	$rtn="";
	switch ($val) {
		case 'tonpt':
			$rtn="Ton/th";
			break;
		case 'kubikpt':
			$rtn="M&sup3;/th";
			break;
		default:
			$rtn="Liter/th";
			break;
	}
	echo $rtn;
}

?>