<form action="<?php echo $action; ?>" method="post">
    <?php 
    $color = array('blue','secondary','green','yellow','red','black','gray','light','indigo','navy','purple','fuchsia','pink','maroon','orange','lime','teal','olive');
    $color2 = array('light','dark');
    ?>
	    <div class="form-group">
            <label for="varchar">Navbar Bg Color <?php echo form_error('navbar_bg_color') ?></label>            
            <select class="form-control" name="navbar_bg_color" id="navbar_bg_color" >
                <option>pilih</option>
                <?php for ($i=0; $i < count($color); $i++) { ?>
                    <option value="<?= $color[$i];?>" <?php echo ($navbar_bg_color==$color[$i]) ? "Selected" : "" ; ?>><?= $color[$i];?></option>
                <?php }?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Navbar Font Color <?php echo form_error('navbar_font_color') ?></label>
            <select class="form-control" name="navbar_font_color" id="navbar_font_color" >
                <option>pilih</option>
                <?php for ($i=0; $i < count($color2); $i++) { ?>
                    <option value="<?= $color2[$i];?>" <?php echo ($navbar_font_color==$color2[$i]) ? "Selected" : "" ; ?>><?= $color2[$i];?></option>
                <?php }?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Sidebar Bg Color <?php echo form_error('sidebar_bg_color') ?></label>
            <select class="form-control" name="sidebar_bg_color" id="sidebar_bg_color" >
                <option>pilih</option>
                <?php for ($i=0; $i < count($color2); $i++) { ?>
                    <option value="<?= $color2[$i];?>" <?php echo ($sidebar_bg_color==$color2[$i]) ? "Selected" : "" ; ?>><?= $color2[$i];?></option>
                <?php }?>
            </select>
        </div>
	    <div class="form-group">
            <label for="varchar">Sidebar Menu Color <?php echo form_error('sidebar_font_color') ?></label>
            <select class="form-control" name="sidebar_font_color" id="sidebar_font_color" >
                <option>pilih</option>
                <?php for ($i=0; $i < count($color); $i++) { ?>
                    <option value="<?= $color[$i];?>" <?php echo ($sidebar_font_color==$color[$i]) ? "Selected" : "" ; ?>><?= $color[$i];?></option>
                <?php }?>
            </select>
        </div>
	    <input type="hidden" name="id_tema" value="<?php echo $id_tema; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('admin/tema') ?>" class="btn btn-default">Cancel</a>
	</form>