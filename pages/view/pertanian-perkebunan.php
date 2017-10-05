<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Pertanian & Perkebunan</h3>
  </div>
  <div class="panel-body">

<div class="table-responsive">
	<table class="table table-bordered table-hover">
		<form id="form">
			<tr align="center">
				<td colspan="2">
					<input type="text" name="nama" class="form-control" placeholder="Nama komoditas ..."/>
					<input type="hidden" name="hidden_id_pokok_desa" value="<?php echo $id_pokok_desa;?>"/>
				</td>
				<td><input type="text" name="luas" class="form-control text-luas" placeholder="luas (Ha)"/></td>
				<td><input type="text" name="hpanen" class="form-control text-luas" placeholder=""/></td>
				<td><input type="text" name="nproduk" class="form-control text-luas" placeholder=""/></td>
				<td><input type="text" name="bypupuk" class="form-control text-luas" placeholder=""/></td>
				<td><input type="text" name="bybibit" class="form-control text-luas" placeholder=""/></td>
				<td><input type="text" name="byobat" class="form-control text-luas" placeholder=""/></td>
				<td><input type="text" name="bylain" class="form-control text-luas" placeholder=""/></td>
				<td><input type="text" name="phasil" class="form-control text-luas" placeholder=""/></td>
				<td colspan="2" align="center">
					<button type="button" class="btn btn-sm btn-primary" id="submit"><span class="glyphicon glyphicon-plus"></span></button>
				</td>
			</tr>
		</form>
		<thead>
			<tr>
				<th>#</th>
				<th>Komoditas</th>
				<th>Luas</th>
				<th>Hasil Panen</th>
				<th>Nilai Produksi</th>
				<th>Biaya Pupuk</th>
				<th>Biaya Bibit</th>
				<th>Biaya Obat</th>
				<th>Biaya Lainnya</th>
				<th>Pemasaran / Hasil</th>
				<th colspan="2">Kontrol</th>
			</tr>
		</thead>
		<tbody id="pertanian-perkebunan-show">
			<!--tr>
				<td colspan="12">&nbsp;</td>
			</tr-->	
		</tbody>
		<tfoot>			
			<tr>
				<td colspan="12" align="center">					
					<span class="hasil-submit" style="font-weight: bold;color: #00f;padding: 10px;"></span>
				</td>
			</tr>			
		</tfoot>
	</table>
</div>

  </div>
</div>

<div id="dialog" title="Konfirmasi">
  Yakin untuk menghapus item ini: <span id="komoditas_hapus"></span> ?
  <input type="hidden" name="" id="id_hapus" />
</div>


<script type="text/javascript">
    $(document).ready(function() {  
        $.get('pages/model/pertanian-perkebunan.php?act=show', function (data) {
            $('#pertanian-perkebunan-show').html(data);
        });

	  $('#submit').click(function(){
	      $.ajax({
	        type: 'post',
	        url: 'pages/model/pertanian-perkebunan.php?act=simpan',
	        data: $('#form').serialize(),
	        success: function (response) {
	            /*$('#myModal').modal('show');*/
	            $(".hasil-submit").html(response);

	            $.get('pages/model/pertanian-perkebunan.php?act=show', function (data) {
		            $('#pertanian-perkebunan-show').html(data);
		        });	        
	        }
	      });
	    });

    });
</script>
