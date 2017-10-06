<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Kehutanan</h3>
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
				<td><input type="text" name="hpanen" class="form-control text-luas" placeholder=""/></td>
				<td>
					<select id="satuan" name="satuan" class="form-control">
						<option value="kubikpt">M&sup3;/th</option>
						<option value="tonpt">Ton/th</option>
						<option value="literpt">Liter/th</option>
					</select>
				</td>
				<td><input type="text" name="nproduk" class="form-control text-luas" placeholder=""/></td>
				<td><input type="text" name="bbaku" class="form-control text-luas" placeholder=""/></td>
				<td><input type="text" name="bpenolong" class="form-control text-luas" placeholder=""/></td>
				<td><input type="text" name="byantara" class="form-control text-luas" placeholder=""/></td>
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
				<th>Hasil Panen</th>
				<th>Satuan</th>
				<th>Nilai Produksi</th>

				<th>Bahan Baku</th>
				<th>Bahan Penolong</th>
				<th>Biaya Antara</th>

				<th>Pemasaran / Hasil</th>
				<th colspan="2">Kontrol</th>
			</tr>
		</thead>
		<tbody id="kehutanan-show">
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
        $.get('pages/model/kehutanan.php?act=show', function (data) {
            $('#kehutanan-show').html(data);
        });

	  $('#submit').click(function(){
	      $.ajax({
	        type: 'post',
	        url: 'pages/model/kehutanan.php?act=simpan',
	        data: $('#form').serialize(),
	        success: function (response) {
	            /*$('#myModal').modal('show');*/
	            $(".hasil-submit").html(response);

	            $.get('pages/model/kehutanan.php?act=show', function (data) {
		            $('#kehutanan-show').html(data);
		        });	        
	        }
	      });
	    });

    });
</script>
