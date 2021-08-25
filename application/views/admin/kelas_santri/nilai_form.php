<?php if(count($mapel)){ ?>
<form action="<?php echo $action; ?>" method="post">
    <?php foreach ($mapel as $key => $value){?>
        <?php $nilai=""; foreach (@$siswa as $key => $val) {
            if($value->id_klsmapel==$val->id_klsmapel){
                $nilai = $val->nilai;
            }
        }?>
            <div class="form-group">
                    <label for="varchar"><?= $value->nama_mapel;?></label>
                    <input type="number" class="form-control" name="nilai<?= $value->id_klsmapel;?>" id="nilai<?= $value->id_klsmapel;?>" min="0" max="100" placeholder="Range Nilai 0-100" value="<?= $nilai;?>" required />
            </div>
    <?php }?>		
    <input type="hidden" name="id_kelas_siswa" value="<?php echo $id_kelas_siswa; ?>" /> 
    <input type="hidden" name="id_klstpq" value="<?php echo $id_klstpq; ?>" /> 
    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
    <a href="<?= base_url() ?>admin/rekap_nilai/read/<?php echo $id_kelas_siswa; ?>" class="btn btn-success">Show</a>
    <a href="<?php echo site_url('admin/kelas_santri') ?>" class="btn btn-default">Cancel</a>
</form>
<?php }?>