<!DOCTYPE html>
<?php 
  $infoweb=$this->db->get_where('info', array('id_info' => '1'))->row();
  $tema=$this->db->get_where('tema', array('id_tema' => '1'))->row();
  $rs=$this->db->get_where('view_saran', array('status' => 'new'))->result();
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= $infoweb->nama_web?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php  echo (base_url());?>assets/backend/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php  echo (base_url());?>assets/backend/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <script src="<?php  echo (base_url());?>assets/backend/plugins/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url() ?>assets/plugins/js/canvajs.js"></script>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-<?= $tema->navbar_bg_color?> navbar-<?= $tema->navbar_font_color?>">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge"><?= count($rs)?></span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header"><?= count($rs)?> Saran Baru</span>
          <div class="dropdown-divider"></div>
          <?php foreach ($rs as $key => $value) {?>
          <a href="<?php echo site_url('admin/saran/read/'.$value->id_saran) ?>" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> <?= $value->first_name?>
            <span class="float-right text-muted text-sm">New</span>
          </a>
          <div class="dropdown-divider"></div>
          <?php }?>
          <a href="<?php echo site_url('admin/saran') ?>" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <!-- <span class="badge badge-danger navbar-badge">3</span> -->
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="<?php echo site_url('admin/users/read/'.$this->session->userdata("user_id")); ?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="<?php echo base_url()?>assets/img/profil/<?=$this->session->userdata("fot")?>" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  <?php echo $this->session->userdata("first_name"); ?>
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3> 
                <!-- <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p> -->
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?php echo site_url('users/update_pass') ?>" class="dropdown-item">
            <button type="button" class="btn btn-block btn-primary btn-xs">Ganti Password</button>
          </a>
          <div class="dropdown-divider"></div>

          <?php
            echo anchor('login/logout','Sing out',array('class'=>'dropdown-item dropdown-footer'));
          ?>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-<?= $tema->sidebar_bg_color?>-<?= $tema->sidebar_font_color?> elevation-4">
    <!-- Brand Logo -->
    <a href="<?php echo site_url('dashboard') ?>" class="brand-link">
      <img src="<?php echo base_url(); ?>assets/img/<?= $infoweb->logo_web?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8;width: 33px;height: 33px;">
      <span class="brand-text font-weight-light"><?= $infoweb->nama_web?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php
            $uris = $this->uri->segment(1).'/'.$this->uri->segment(2);
            $menus = $this->db->get_where('menu', array('link' => $uris))->row();
            // echo($uris);
            // exit();

            $menu = $this->db->get_where('view_akses', array('is_parent' => 0,'is_active'=>1,'tipe!='=>'pager','username'=>$this->session->userdata('user_id')));
            foreach ($menu->result() as $m) {
                $mlink = explode("/", $m->link);
                $uris = (count($mlink)>2) ? $this->uri->uri_string() : $this->uri->segment(1).'/'.$this->uri->segment(2) ;
                $menuaktif = ($uris==$m->link) ? "active ".$uris.'=='.$m->link : "" ;
                // print_r($menus->is_parent);print_r($m->id);exit();
                $menuktif = ($menus->is_parent==$m->id) ? "active" : '' ;
                // chek ada sub menu
                $submenu = $this->db->get_where('view_auth_child',array('parent'=>$m->name_level,'is_parent'=>$m->id_child,'is_active'=>1));
                if($submenu->num_rows()>0){
                    $datas = array();
                    foreach ($submenu->result() as $s){
                      $datas[] = $s->link;
                    }
                    // print_r($datas);
                    $subaktif2 = (in_array($uris, $datas)) ? "active" : "" ;
                    // echo($subaktif2);
                    $roleaktf = (in_array($uris, $datas)) ? 'menu-open' : '' ;
                    // tampilkan submenu
                    echo "<li class='nav-item has-treeview ".$roleaktf."'>
                        ".anchor('#',  "<i class='nav-icon fas $m->icon'></i><p>".strtoupper($m->name).'<i class="right fas fa-angle-left"></i></p>',' class="nav-link '.$subaktif2.'" ')."
                            <ul class='nav nav-treeview'>";
                    foreach ($submenu->result() as $s){
                        $subaktif = ($uris==$s->link) ? "active" : '' ;
                        echo "<li class='nav-item'>" . anchor($s->link, "<i class='far $s->icon nav-icon'></i> <p>" . strtoupper($s->name)."</p>", " class='nav-link ".$subaktif."' ") . "</li>";
                    }
                       echo"</ul>
                        </li>";
                }else{
                    echo "<li class='nav-item '>" . anchor($m->link, "<i class='nav-icon $m->icon'></i> <p>" . strtoupper($m->name)."</p>", " class='nav-link ".$menuaktif."' ") . "</li>";
                }
                
            }
          ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"><?= @$title?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <?php foreach ($this->uri->segments as $segment): ?>
                  <?php 
                      $url = substr($this->uri->uri_string, 0, strpos($this->uri->uri_string, $segment)) . $segment;
                      $is_active =  $url == $this->uri->uri_string;
                  ?>


                  <li class="breadcrumb-item <?php echo $is_active ? 'active': '' ?>">
                      <?php if($is_active): ?>
                          <?php echo ucfirst($segment) ?>
                      <?php else: ?>
                          <a href="<?php echo site_url($url) ?>"><?php echo ucfirst($segment) ?></a>
                      <?php endif; ?>
                  </li>
              <?php endforeach; ?>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
          <?php
            echo $contents;
          ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date("Y")?> <a href="<?php echo site_url('dashboard') ?>"><?= $infoweb->nama_web?></a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<!-- Bootstrap 4 -->
<script src="<?php  echo (base_url());?>assets/backend/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php  echo (base_url());?>assets/backend/plugins/datatables/jquery.dataTables.js"></script>
<script src="<?php  echo (base_url());?>assets/backend/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="<?php  echo (base_url());?>assets/backend/dist/js/adminlte.min.js"></script>

</body>
</html>
