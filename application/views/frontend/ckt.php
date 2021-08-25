<section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-xl-12 ftco-animate">
			<div class="billing-form ftco-bg-dark p-3 p-md-5">
				<h3 class="navbar-brand">PickUp Me<small>MALANG</small></h3>
				<?php $indo = $this->db->get_where('info', array('id_info' => '1'))->row();?>
				<center>
					<h4 class="text" style="width: 300px;text-align: center;">
						<small><?= $indo->alamat?><br><?= $indo->wa?></small>
					</h4>
				</center>
				<hr style="background: rgba(255, 255, 255, 0.1);">
		        <table class="table">
		            <tbody id="body-tabel">
		            <?php $i = 1;$b=0; $keid = array(); foreach($detail as $key) : ?>
		              <tr class="text-center">
		                <td class="price">
		                  <?= $i?>
		                </td>
		                <td class="image-prod">
		                	<div class="img" style="background-image:url(<?php echo(base_url()) ?>filw/<?php echo $key->gambar; ?>);"></div>
		                </td>		                
		                <td class="product-name">
		                  <h3><?= $key->nama_menu?> (<?= $key->qty?>)</h3>
		                  <p><?= $key->nama_kategori?></p>
		                </td>		                
		                <td class="total">
		                	Rp.<?= rupiah($key->total_harga)?>		                	
		                </td>
		              </tr><!-- END TR-->
		            <?php $i++;endforeach; ?>
		            <tr>
		            	<td colspan="3">Total</td>
		            	<td>Rp.<?= rupiah($order->total_harga)?></td>
		            </tr>
		            </tbody>
		        </table>
	        </div>
          </div> <!-- .col-md-8 -->

        </div>
      </div>
    </section> <!-- .section -->