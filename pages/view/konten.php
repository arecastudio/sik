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
		default:
			# code...
			break;
	}
}
?>