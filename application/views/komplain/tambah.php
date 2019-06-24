<section class="content-header">
    <h1>
        Tambah
        <small>Komplain</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Seting</a></li>
        <li class="active">Komplain</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header">
                <div class="col-md-5">
                <?php
                    echo form_open_multipart(base_url().'complaint/add');
                ?> 
                  
                    <div class="box-body">
                        <div class="form-group">
                            <label for="">AUM/ Ortom</label>
                            <select name='id_aum' class="form-control ">
                            <option value='0'>- Select Aum/ Ortom-</option>
                                <?php
                                if (!empty($record)) {
                                    foreach ($record as $r) {
                                        echo "<option value=".$r->id_aum."".set_select('id_aum', $r->id_aum).">".$r->nama_aum."</option>";
                                    }
                                }
                                ?>
                            </select>
                            <?php echo form_error('id_aum', '<div class="text-red">', '</div>'); ?>
                        </div> 
                        <div class="form-group">
                            <label for="">Subject</label>
                            <input type="text" class="form-control" name="judul_complain" placeholder="Subject" value="<?php echo set_value('judul_complain'); ?>">
                            <?php echo form_error('judul_komplain', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis</label>
                            <select name='jenis_complain' class="form-control ">
                                <option value='0'>- Select Jenis -</option>
                                <option value='saran' <?php echo  set_select('jenis_complain', 'saran'); ?>>Saran</option>
                                <option value='kritik' <?php echo  set_select('jenis_complain', 'kritik'); ?>>Kritik</option>                               
                            </select>
                            <?php echo form_error('jenis_complain', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <input type="text" class="form-control" name="kategori" placeholder="Kategori" value="<?php echo set_value('kategori'); ?>">
                            <?php echo form_error('kategori', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Komplain</label>
                            <textarea name="isi_komplain" class="form-control" rows="2" placeholder="Apa yang Anda pikirkan?"><?php echo set_value('isi_komplain'); ?></textarea>
                            <?php echo form_error('isi_komplain', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                                <label for="userfile">Gambar</label>
                                <input type="file" name="userfile">
                                <p class="help-block">Type gambar harus .jpg/.png dan tidak lebih dari 2MB</p>
                        </div> 
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>                        
                        <a href="<?php echo base_url('complaint'); ?>" class="btn btn-primary">Kembali</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>