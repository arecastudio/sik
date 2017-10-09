<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once('../../libs/phpjasperxml/class/tcpdf/tcpdf.php');
include_once("../../libs/phpjasperxml/class/PHPJasperXML.inc.php");
include_once ('../inc.php');

#$tgl_cetak=date('d - M - Y');
#$tgl_cetak=getTanggal();

/*if (isset($_POST['nomor']) && isset($_POST['ket']) && isset($_POST['tgl']) && isset($_POST['div']) && isset($_POST['nik1']) && isset($_POST['nama1']) && isset($_POST['nik2']) && isset($_POST['nama2'])  ) {
	$nomor=$_POST['nomor'];
	$ket=$_POST['ket'];
	$tgl=$_POST['tgl'];
	$div=$_POST['div'];
	$nik1="NIK. ".$_POST['nik1'];
	$nama1=$_POST['nama1'];
	$nik2="NIK. ".$_POST['nik2'];
	$nama2=$_POST['nama2'];*/

	/*$id_pokok_desa=1;

	$PHPJasperXML = new PHPJasperXML();
	//$PHPJasperXML->debugsql=true;
	$PHPJasperXML->arrayParameter=array("parameter1"=>$id_pokok_desa);
	$PHPJasperXML->load_xml_file("penggunaan-lahan.jrxml");

	$PHPJasperXML->transferDBtoArray(HOST,USER,PASS,DB);
	$PHPJasperXML->outpage("I");*/    //page output method I:standard output  D:Download file

#}
$id_pokok_desa=1;
if (isset($_GET['rep'])) {
	switch ($_GET['rep']) {
		case 'penggunaan-lahan':
			$PHPJasperXML = new PHPJasperXML();
			//$PHPJasperXML->debugsql=true;
			$PHPJasperXML->arrayParameter=array("parameter1"=>$id_pokok_desa);
			$PHPJasperXML->load_xml_file("penggunaan-lahan.jrxml");
			$PHPJasperXML->transferDBtoArray(HOST,USER,PASS,DB);
			$PHPJasperXML->outpage("I");
			break;
		case 'pertanian-perkebunan':
			$PHPJasperXML = new PHPJasperXML();
			//$PHPJasperXML->debugsql=true;
			$PHPJasperXML->arrayParameter=array("parameter1"=>$id_pokok_desa);
			$PHPJasperXML->load_xml_file("pertanian-perkebunan.jrxml");
			$PHPJasperXML->transferDBtoArray(HOST,USER,PASS,DB);
			$PHPJasperXML->outpage("I");
			break;	
		case 'kehutanan':
			$PHPJasperXML = new PHPJasperXML();
			//$PHPJasperXML->debugsql=true;
			$PHPJasperXML->arrayParameter=array("parameter1"=>$id_pokok_desa);
			$PHPJasperXML->load_xml_file("kehutanan.jrxml");
			$PHPJasperXML->transferDBtoArray(HOST,USER,PASS,DB);
			$PHPJasperXML->outpage("I");
			break;
		case 'peternakan':
			$PHPJasperXML = new PHPJasperXML();
			//$PHPJasperXML->debugsql=true;
			$PHPJasperXML->arrayParameter=array("parameter1"=>$id_pokok_desa);
			$PHPJasperXML->load_xml_file("peternakan.jrxml");
			$PHPJasperXML->transferDBtoArray(HOST,USER,PASS,DB);
			$PHPJasperXML->outpage("I");
			break;		
		case 'sumber-air':
			$PHPJasperXML = new PHPJasperXML();
			//$PHPJasperXML->debugsql=true;
			$PHPJasperXML->arrayParameter=array("parameter1"=>$id_pokok_desa);
			$PHPJasperXML->load_xml_file("sumber-air.jrxml");
			$PHPJasperXML->transferDBtoArray(HOST,USER,PASS,DB);
			$PHPJasperXML->outpage("I");
			break;				
		case 'pariwisata':
			$PHPJasperXML = new PHPJasperXML();
			//$PHPJasperXML->debugsql=true;
			$PHPJasperXML->arrayParameter=array("parameter1"=>$id_pokok_desa);
			$PHPJasperXML->load_xml_file("pariwisata.jrxml");
			$PHPJasperXML->transferDBtoArray(HOST,USER,PASS,DB);
			$PHPJasperXML->outpage("I");
			break;	
		default:
			# code...
			break;
	}
}
?>