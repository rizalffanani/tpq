    <form action="<?php echo $action; ?>" method="post">

          <div class="col-12 col-sm-6 col-lg-12">
            <div class="card card-primary card-outline card-outline-tabs">
              <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                  <li class="nav-item">
                    <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Web</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Santri</a>
                  </li>
                </ul>
              </div>
              <div class="card-body">
                <div class="tab-content" id="custom-tabs-three-tabContent">
                  <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                    <div class="form-group">
                        <label for="varchar">Nama Web <?php echo form_error('nama_web') ?></label>
                        <input type="text" class="form-control" name="nama_web" id="nama_web" placeholder="Nama Web" value="<?php echo $nama_web; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="tentang">Tentang <?php echo form_error('tentang') ?></label>
                        <textarea class="form-control" rows="3" name="tentang" id="tentang" placeholder="Tentang"><?php echo $tentang; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Slogan <?php echo form_error('slogan') ?></label>
                        <input type="text" class="form-control" name="slogan" id="slogan" placeholder="Slogan" value="<?php echo $slogan; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat <?php echo form_error('alamat') ?></label>
                        <textarea class="form-control" rows="3" name="alamat" id="alamat" placeholder="Alamat"><?php echo $alamat; ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="varchar">Email <?php echo form_error('email') ?></label>
                        <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
                    </div>
                    <div class="form-group">
                        <label for="varchar">Wa <?php echo form_error('wa') ?></label>
                        <input type="text" class="form-control" name="wa" id="wa" placeholder="Wa" value="<?php echo $wa; ?>" />
                    </div> 
                  </div>
                  <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                    <div class="form-group">
                        <label for="varchar">Format Nomer Induk Santri <?php echo form_error('format_nis') ?></label>
                        <input type="number" class="form-control" name="format_nis" id="format_nis" placeholder="10005" value="<?php echo $format_nis; ?>" />
                    </div> 
                  </div>
                </div>
              </div>
              <!-- /.card -->
            </div>
          </div>
        
        <input type="hidden" name="id_info" value="<?php echo $id_info; ?>" /> 
        <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
        <a href="<?php echo site_url('admin/info') ?>" class="btn btn-default">Cancel</a>
    </form>