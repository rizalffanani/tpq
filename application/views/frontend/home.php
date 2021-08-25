
    <section class="home-slider owl-carousel">
      <?php $i=1; foreach ($slide as $key => $value) {?>
      <div class="slider-item" style="background-image: url(<?php  echo (base_url());?>coffee/images/<?= $value->images?>);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

            <div class="col-md-8 col-sm-12 text-center ftco-animate">
            	<span class="subheading">Welcome</span>
              <h1 class="mb-4"><?= $value->judul?></h1>
              <p class="mb-4 mb-md-5"><?= $value->deskripsi?></p>
              <!-- <p><a href="#" class="btn btn-primary p-3 px-xl-4 py-xl-3">Order Now</a> <a href="#" class="btn btn-white btn-outline-white p-3 px-xl-4 py-xl-3">View Menu</a></p> -->
            </div>

          </div>
        </div>
      </div>
      <?php $i++;}?>
    </section>
    <section class="ftco-menu mb-5 pb-5">
    	<div class="container">
    		<div class="row justify-content-center mb-5">
          <div class="col-md-7 heading-section text-center ftco-animate">
          	<span class="subheading">Discover</span>
            <h2 class="mb-4">Our Products</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div>
        </div>
    		<div class="row d-md-flex">
	    		<div class="col-lg-12 ftco-animate p-md-5">
		    		<div class="row">
		          <div class="col-md-12 nav-link-wrap mb-5">
		            <div class="nav ftco-animate nav-pills justify-content-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
		              <?php $i=1; foreach ($kategori as $key => $value) {?>
		              <a class="nav-link <?php echo ($i==1) ? 'active' : '' ; ?> " id="v-pills-<?php echo$i;?>-tab" data-toggle="pill" href="#v-pills-<?php echo$i;?>" role="tab" aria-controls="v-pills-<?php echo$i;?>" aria-selected="true"><?php echo$value->nama_kategori;?></a>
							   <?php $i++;}?>
		            </div>
		          </div>
		          <div class="col-md-12 d-flex align-items-center">
		            
		            <div class="tab-content ftco-animate" id="v-pills-tabContent">
					      <?php $i=1; foreach ($kategori as $key => $val) {?>
		              <div class="tab-pane fade <?php echo ($i==1) ? 'show active' : '' ; ?>" id="v-pills-<?php echo($i);?>" role="tabpanel" aria-labelledby="v-pills-<?php echo($i);?>-tab">
		              	<div class="row">
		              	<?php $a=0;foreach ($menu as $key => $value) { if ($value->id_kategori==$val->id_kategori) {?>
		              		<div class="col-md-4 text-center">
		              			<div class="menu-wrap">
		              				<a href="#" class="menu-img img mb-4" style="width: 327px;height:300px;background-image: url(<?php echo(base_url()) ?>filw/<?php echo $value->foto_menu; ?>);"></a>
		              				<div class="text">
		              					<h3><a href="#"><?php echo ($value->nama_menu)?></a></h3>
		              					<p><?php echo ($value->deskripsi_menu)?></p>
		              					<p class="price"><span>Rp.<?php echo rupiah($value->harga)?></span></p>
		              					<p><a href="#" onclick="ds('<?= $value->id_menu?>')" id="ok" class="btn btn-primary btn-outline-primary" data-toggle="modal" data-target="#myModal">Add tos cart</a></p>
		              				</div>
		              			</div>
		              		</div>
		              	<?php $a++;} }?>
                    <?php if ($a<4) {for ($a=$a; $a < 3; $a++) { ?>
                      <div class="col-md-4 text-center">
                        <div class="menu-wrap">
                          <div style="width: 327px;height:300px;"></div>
                        </div>
                      </div>
                    <?php }}?>
		              	</div>
		              </div>
						    <?php $i++;}?>
		            </div>
		          </div>
		        </div>
		      </div>
		    </div>
    	</div>
    </section> 
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" style="color: black;">Jumlah</h4>
          </div>
          <div class="modal-body">
            <div class="row">
                  <div class="col-3">
                    <button type="button" class="quantity-left-minus btn"  data-type="minus" data-field="">
                     <i class="icon-minus"></i>
                    </button>
                  </div>
                  <div class="col-3">
                    <input type="text" id="quantity" name="quantity" class="form-control" value="1" min="1" max="100">
                    <input type="hidden" id="idmenu" name="idmenu">
                  </div>
                  <div class="col-2">
                    <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                       <i class="icon-plus"></i>
                   </button>
                  </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" onclick="ok()" class="btn btn-default" data-dismiss="modal">ok</button>
          </div>
        </div>
      </div>
    </div>
    <script>
      function ds(a) {
        document.getElementById('idmenu').value = a;
      }
      $(function() {

        toastr.options = {
          "closeButton": false,
          "debug": false,
          "newestOnTop": false,
          "progressBar": false,
          "positionClass": "toast-top-center",
          "preventDuplicates": false,
          "onclick": null,
          "showDuration": "300",
          "hideDuration": "1000",
          "timeOut": "5000",
          "extendedTimeOut": "1000",
          "showEasing": "swing",
          "hideEasing": "linear",
          "showMethod": "fadeIn",
          "hideMethod": "fadeOut"
        }
      });
      function ok() {
        var a = document.getElementById('idmenu').value
        var b = document.getElementById('quantity').value
        $.ajax({
          type:"GET",
          url:"<?=site_url('web/add_to_cart');?>/"+a+'/'+b,    
          success: function(data){   
            toastr.success('Ok berhasil');
            document.getElementById('cou').style.display = "block";
            document.getElementById('count').innerHTML = data;
          }  
        });
      }
      $(document).ready(function(){
        var quantitiy=0;
        $('.quantity-right-plus').click(function(e){
            
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
                
                $('#quantity').val(quantity + 1);

              
                // Increment            
        });
        $('.quantity-left-minus').click(function(e){
            // Stop acting like a button
            e.preventDefault();
            // Get the field name
            var quantity = parseInt($('#quantity').val());
            
            // If is not undefined
          
                // Increment
                if(quantity>0){
                $('#quantity').val(quantity - 1);
                }
        });
      });
    </script>