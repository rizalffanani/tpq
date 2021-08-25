<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function warn_msg($data)
{
	return "<div class='alert alert-block'><button data-dismiss='alert' class='close'></button><h4 class='alert-heading'>Perhatian !</h4>".$data."</div>";
}

function succ_msg($data)
{
	return '<div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <h4><i class="icon fa fa-check"></i> Alert!</h4>'.$data.'</div>';
}

function err_msg($data)
{
	return '<div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i>Peringatan!</h5>
                  '.$data.'
            </div>';
}
