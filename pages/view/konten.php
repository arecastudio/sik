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
	     case 'kwalitas-air':
	     	require_once('pages/view/kwalitas-air.php');
	     	break;
	     case 'pariwisata':
	     	require_once('pages/view/pariwisata.php');
	     	break;
	     case 'pilih-kampung':
	     	require_once('pages/view/pilih-kampung.php');
	     	break;
		default:
			# code...
			break;
	}
}
?>