<table class="table">
	    <tr><td>Nama Lengkap</td><td><?php echo $nama_lengkap; ?></td></tr>
	    <tr><td>Nama Panggilan</td><td><?php echo $nama_panggilan; ?></td></tr>
	    <tr><td>Nomor Induk</td><td><?php echo $nomor_induk; ?></td></tr>
	    <tr><td>Tempat Lahir</td><td><?php echo $tempat_lahir; ?></td></tr>
	    <tr><td>Tanggal Lahir</td><td><?php echo $tanggal_lahir; ?></td></tr>
	    <tr><td>Anak Ke</td><td><?php echo $anak_ke; ?></td></tr>
	    <tr><td>Nama Ayah</td><td><?php echo $nama_ayah; ?></td></tr>
	    <tr><td>Nama Ibu</td><td><?php echo $nama_ibu; ?></td></tr>
	    <tr><td>Pekerjaan Ayah</td><td><?php echo $pekerjaan_ayah; ?></td></tr>
	    <tr><td>Pekerjaan Ibu</td><td><?php echo $pekerjaan_ibu; ?></td></tr>
	    <tr><td>Alamat Ortu</td><td><?php echo $alamat_ortu; ?></td></tr>
	    <tr><td>Telepon Ortu</td><td><?php echo $telepon_ortu; ?></td></tr>
	    <tr><td>Kelurahan</td><td><?php echo $kelurahan; ?></td></tr>
	    <tr><td>Kecamatan</td><td><?php echo $kecamatan; ?></td></tr>
	    <tr><td>Kota</td><td><?php echo $kota; ?></td></tr>
	    <tr><td>Provinsi</td><td><?php echo $provinsi; ?></td></tr>
	    <tr><td>Foto</td><td><?php echo $foto; ?></td></tr>
	    <tr>
            <td>Foto</td>
            <td>
              <?=@$val?><br>
              <img src="<?php echo base_url()?>assets/img/siswa/<?php echo $foto; ?>" class="img-circle" alt="User Image" style="height: 215px;width: 215px;">
              <form action="<?php echo $action; ?>" method="post"  enctype="multipart/form-data">
              <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" name="foto" id="exampleInputFile">
              </div>
              <input type="hidden" name="id_santri" value="<?php echo $id_santri; ?>" />
              <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
            </form>
            </td>
          </tr>
	    <tr><td>Tanggal Masuk</td><td><?php echo $tanggal_masuk; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('admin/data_santri') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>