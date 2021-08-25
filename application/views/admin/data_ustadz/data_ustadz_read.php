<table class="table">
	    <tr><td>Nip</td><td><?php echo $nip; ?></td></tr>
	    <tr><td>Nama Ustadz</td><td><?php echo $nama_ustadz; ?></td></tr>
	    <tr><td>Status</td><td><?php echo $status; ?></td></tr>
	    <tr><td>Jk</td><td><?php echo $jk; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tgl Lahir</td><td><?php echo $tgl_lahir; ?></td></tr>
	    <tr><td>Alamat</td><td><?php echo $alamat; ?></td></tr>
	    <tr><td>Nama Ayah</td><td><?php echo $nama_ayah; ?></td></tr>
	    <tr><td>Nama Ibu</td><td><?php echo $nama_ibu; ?></td></tr>
	    <tr><td>Alamat Ortu</td><td><?php echo $alamat_ortu; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr>
            <td>Foto</td>
            <td>
              <?=@$val?><br>
              <img src="<?php echo base_url()?>assets/img/guru/<?php echo $foto; ?>" class="img-circle" alt="User Image" style="height: 215px;width: 215px;">
              <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" name="foto" id="exampleInputFile">
              </div>
              <input type="hidden" name="id_ustadz" value="<?php echo $id_ustadz; ?>" />
              <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </form>
            </td>
        </tr>
	    <tr><td>Tgl Masuk</td><td><?php echo $tgl_masuk; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/data_ustadz') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>