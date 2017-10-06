<?php
if (isset($_GET['ref'])) {
	$ref=$_GET['ref'];
	switch ($ref) {
		case 'profil-kampung-list':
			require_once('pages/view/profil-kampung-list.php');
			break;
		case 'profil-kampung-entry':
			require_once('pages/view/profil-kampung-entry.php');
			break;
	    case 'profil-kampung-edit':
	      require_once('pages/view/profil-kampung-edit.php');
	      break;
		case 'personil':
			require_once('pages/view/personil.php');
			break;
		case 'sumber-daya-alam':
			require_once('pages/view/sumber-daya-alam.php');
			break;
	    case 'penggunaan-lahan':
	      require_once('pages/view/penggunaan-lahan.php');
	      break;
	    case 'tanah-kering':
	      require_once('pages/view/tanah-kering.php');
	      break;
	    case 'pertanian-perkebunan':
	      require_once('pages/view/pertanian-perkebunan.php');
	      break;
	    case 'kehutanan':
	      require_once('pages/view/kehutanan.php');
	      break;
	     case 'peternakan':
	     	require_once('pages/view/peternakan.php');
	     	break;
	     case 'sumber-air':
	     	require_once('pages/view/sumber-air.php');
	     	break;
		default:
			# code...
			break;
	}
}
?>