<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Profil Kampung / Kelurahan</h3>
  </div>
  <div class="panel-body">
  	<a href="?ref=profil-kampung-entry" class="btn btn-success btn-sm">+ Tambah Data Kampung / Kelurahan</a>
  	<div class="table-responsive">
  	<table class="table table-bordered">
  		<thead>
  			<tr class="info">
  				<th>#</th>
  				<th>Kode</th>
  				<th>Nama</th>
  				<th>Lokasi</th>
  				<th>Thn.<br/>Bentuk</th>
  				<th>Dasar<br/>Hukum</th>
  				<th>Peta<br/>Resmi</th>
  				<th>Koordinat</th>
  				<th>Bts.<br/>Utara</th>
  				<th>Bts.<br/>Selatan</th>
  				<th>Bts.<br/>Timur</th>
  				<th>Bts.<br/>Barat</th>
  				<th colspan="2">Aksi</th>
  			</tr>
  		</thead>
  		<tbody>
  			<?php
  			$i=1;
			$sql="
			SELECT 
				id, kode_desa_pum, desa_kelurahan, kecamatan, kabupaten_kota, provinsi, tahun_bentuk, dasar_hukum, peta_resmi_wilayah, lat, lon, utara, selatan, timur, barat
			FROM 
				pokok_desa;";

			$stmt=$conn->prepare($sql);
			if ($stmt->execute()) {
				$result = $stmt->get_result();
				while ($row = $result->fetch_row()){
          $share="";
          if(strlen(trim($row[9]))>5) $share="<a href=\"pages/view/peta.php\" target=\"_blank\"><span class=\"glyphicon glyphicon-share-alt\"></span></a>";
					echo "
					<tr>
		  				<td>$i</td>
		  				<td>$row[1]</td>
		  				<td>$row[2]</td>
		  				<td>$row[3] - $row[4] - $row[5]</td>
		  				<td>$row[6]</td>
		  				<td>$row[7]</td>
		  				<td>$row[8]</td>
		  				<td>$row[9],$row[10] $share</td>
		  				<td>$row[11]</td>
		  				<td>$row[12]</td>
		  				<td>$row[13]</td>
		  				<td>$row[14]</td>
		  				<td><a href=\"#\" class=\"btn btn-sm btn-danger\"><span class=\"glyphicon glyphicon-trash\"></span></a></td>
              
		  				<td><a href=\"?ref=profil-kampung-edit&id=$row[0]&kode_desa_pum=$row[1]&desa_kelurahan=$row[2]&kecamatan=$row[3]&kabupaten_kota=$row[4]&provinsi=$row[5]&tahun_bentuk=$row[6]&dasar_hukum=$row[7]&peta_resmi_wilayah=$row[8]&lat=$row[9]&lon=$row[10]&utara=$row[11]&selatan=$row[12]&timur=$row[13]&barat=$row[14]\" class=\"btn btn-sm btn-warning\"><span class=\"glyphicon glyphicon-pencil\"></span></a></td>
		  			</tr>
					";
					$i++;
				}
			}	
  			?>
  		</tbody>
  	</table>
  	</div>
  </div>
</div>