<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Pertanian & Perkebunan</h3>
  </div>
  <div class="panel-body">

<div class="form">
	<form id="form">
		<div class="input-group">
		  <span class="input-group-addon">Komoditas</span>
		  <input type="text" name="nama" class="form-control" placeholder="Nama Komoditas" />
		  <input type="hidden" name="hidden_id_pokok_desa" value="<?php echo $id_pokok_desa;?>" />
		</div>
		<button type="button" class="btn btn-sx btn-primary" id="submit"><span class="glyphicon glyphicon-floppy-disk"></span> Simpan</button>
	</form>
</div>

<div class="table-responsive col-sm-12">
	<table class="table table-bordered">
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

<script type="text/javascript">
    $(document).ready(function() {  
        $.get('pages/model/pertanian-perkebunan-show.php', function (data) {
            $('#pertanian-perkebunan-show').html(data);
        });

	  $('#submit').click(function(){
	      $.ajax({
	        type: 'post',
	        url: 'pages/model/pertanian-perkebunan-simpan.php',
	        data: $('#form').serialize(),
	        success: function (response) {
	            /*$('#myModal').modal('show');*/
	            $(".hasil-submit").html(response);
	        }
	      });
	    });

    });
</script>