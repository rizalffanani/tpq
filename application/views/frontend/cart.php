<section class="ftco-section ftco-cart">
  <div class="container">
    <div class="row">
      <div class="col-md-12 ftco-animate">
        <div class="cart-list">
          <table class="table">
            <thead class="thead-primary">
              <tr class="text-center">
                <th>&nbsp;</th>
                <th>&nbsp;</th>
                <th>Product</th>
                <th>Price</th>
                <th width="200px">Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody id="body-tabel">
            <?php $i = 1;$b=0; $keid = array(); foreach($this->cart->contents() as $key) : ?>
              <tr class="text-center" id="table<?= $key['rowid']; ?>">
                <td class="product-remove"><a href="#" onclick="hapus('<?= $key['rowid']; ?>')"><span class="icon-close"></span></a></td>
                
                <td class="image-prod"><div class="img" style="background-image:url(<?php echo(base_url()) ?>filw/<?php echo $key['gambar']; ?>);"></div></td>
                
                <td class="product-name">
                  <h3><?= $key['name']?></h3>
                  <p><?= $key['nama_kategori']?></p>
                </td>
                
                <td class="price">
                  Rp.<?= rupiah($key['price'])?>
                  <input type="hidden" id="price<?= $key['rowid']; ?>" value="<?= $key['price']?>">
                </td>
        
                <td >
                  <div class="input-group d-flex mb-3">
                    <span class="input-group-btn mr-2">
                        <button type="button" onclick="kurang('<?= $key['rowid']; ?>')" class="quantity-left-minus btn"  data-type="minus" data-field="">
                         <i class="icon-minus"></i>
                        </button>
                      </span>
                    <input type="text" value="<?= $key['qty']?>" id="quantity<?= $key['rowid']; ?>" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                    <span class="input-group-btn ml-2">
                        <button type="button" onclick="tambah('<?= $key['rowid']; ?>')"  class="quantity-right-plus btn" data-type="plus" data-field="">
                           <i class="icon-plus"></i>
                       </button>
                    </span>
                  </div>
                </td>
                
                <td class="total" id="sb<?= $key['rowid']; ?>">Rp.<?= rupiah($key['subtotal'])?></td>
              </tr><!-- END TR-->
            <?php $i++;endforeach; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row justify-content-end" id="total-tabel">
      <div class="col col-lg-3 col-md-6 mt-5 cart-wrap ftco-animate">
        <div class="cart-total mb-3">
          <h3>Cart Totals</h3>
          <!-- <p class="d-flex">
            <span>Subtotal</span>
            <span>$20.60</span>
          </p>
          <hr> -->
          <p class="d-flex total-price">
            <span>Total</span>
            <span id="totals">Rp.<?php echo rupiah($this->cart->total()); ?></span>
          </p>
        </div>
        <p class="text-center"><a href="#" data-toggle="modal" data-target="#myModal"  class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" style="color: black;">Atas Nama</h4>
      </div>
      <div class="modal-body">
        <div class="row">
              <div class="col-12">
                <input type="text" id="quantity" name="quantity" class="form-control" placeholder="Nama" min="1" max="100">
              </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" onclick="checkout()" class="btn btn-default" data-dismiss="modal">ok</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
  });
  function hapus(a) {
    $.ajax({
      type:"GET",
      dataType : "JSON",
      url:"<?=site_url('web/hapus_cart');?>/"+a,    
      success: function(data){   
        document.getElementById('table'+a).innerHTML = "<tr></tr>";    
        document.getElementById('cou').style.display = "block";
        document.getElementById('count').innerHTML = data.jml;
        document.getElementById('totals').innerHTML = "Rp."+data.format;
      }  
    });
  }
  function tambah(a) {
    var quantity = parseInt($('#quantity'+a).val());
    var qty = quantity + 1;
    var price = parseInt($('#price'+a).val());
        $('#quantity'+a).val(qty);
        document.getElementById('sb'+a).innerHTML="Rp."+(qty*price);
        update(a,qty);
  }
  function kurang(a) {
    var quantity = parseInt($('#quantity'+a).val());
    var qty = quantity - 1;
    var price = parseInt($('#price'+a).val());
        // Increment
        if(quantity>1){
        $('#quantity'+a).val(qty);
        document.getElementById('sb'+a).innerHTML="Rp."+(qty*price);
        update(a,qty);
        }
  }
  function update(a,b) {
    $.ajax({
      type:"GET",
      url:"<?=site_url('web/update_cart');?>/"+a+'/'+b,  
      dataType : "JSON",    
      success: function(data){   
        document.getElementById('totals').innerHTML = "Rp."+data.format;   
      }  
    });
  }
  function checkout() {
    var b = document.getElementById('quantity').value
    if (b) {      
      $.ajax({
        type:"GET",
        url:"<?=site_url('web/checkout');?>/"+b,    
        success: function(data){   
          toastr.success('Ok berhasil');
          document.getElementById('cou').style.display = "block";
          document.getElementById('count').innerHTML = data;
          document.getElementById('body-tabel').style.display = "none";
          document.getElementById('total-tabel').style.display = "none";
          window.location.href = "<?=site_url('web/ckt');?>/"+data;
        }  
      });
    }
  }
</script>