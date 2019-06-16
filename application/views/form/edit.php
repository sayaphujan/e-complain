<section class="content-header">
    <h1>
        Edit
        <small>Komplain</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Daftar</a></li>
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
                    echo form_open_multipart(base_url().'form/edit');
                ?> 
                  
                    <div class="box-body">
                        <div class="form-group">
                            <input type="hidden"  name="id_complain" value="<?php echo $record['id_complain'] ?>" >
                            <label for="">AUM/ Ortom</label>
                            <select name='id_aum' class="form-control ">
                            <option value='0'>- Select Aum/ Ortom-</option>
                                <?php
                                if (!empty($aum)) {
                                    foreach ($aum->result() as $a) {
                                        echo "<option value='".$a->id_aum."'";
                                        echo $record['id_aum'] == $a->id_aum ? 'selected' : '';
                                        echo ">$a->nama_aum</option>";
                                    }
                                }
                                ?>
                            </select>
                            <?php echo form_error('id_aum', '<div class="text-red">', '</div>'); ?>
                        </div> 
                        <div class="form-group">
                            <label for="">Subject</label>
                            <input type="text" class="form-control" name="judul_complain" placeholder="Subject" value="<?php echo $record['judul_complain']; ?>">
                            <?php echo form_error('judul_komplain', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis</label>
                            <select name='jenis_complain' class="form-control ">
                                <option value='0'>- Select Jenis -</option>
                                <option value='saran' <?php if ($record['jenis_complain']=="saran"){ echo 'selected'; } ?>>Saran</option>
                                <option value='kritik' <?php if ($record['jenis_complain']=="kritik"){ echo 'selected'; } ?>>Kritik</option>                               
                            </select>
                            <?php echo form_error('jenis_complain', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Kategori</label>
                            <input type="text" class="form-control" name="kategori" placeholder="Kategori" value="<?php echo $record['kategori']; ?>">
                            <?php echo form_error('kategori', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Komplain</label>
                            <textarea name="isi_komplain" class="form-control" rows="2" placeholder="Apa yang Anda pikirkan?"><?php echo $record['isi_komplain']; ?></textarea>
                            <?php echo form_error('isi_komplain', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <?php
                            if(empty($record['image']))
                            {
                                echo '<img id="uploadPreview" style="width:125px;" class="img-rounded" src="'.base_url('assets/foto/placeholder.png').'" />';
                            }else{
                                echo '<img id="uploadPreview" style="width:125px;" class="img-rounded" src="'.base_url('assets/foto/'.$record['image']).'" />';
                            }
                            ?>
                                
                                <br><br>
                                <label><?php if($record['image']!="") {echo $record['image'];}else{echo '';} ?></label>
                                <br/>
                                <input  name="image" type="hidden" value="<?php echo $record['image']; ?>" />
                                <input  name="userfile" id="preview" type="file" accept="image/*"  onchange="ImagePreview();"/>
                                    <p class="help-block">Type gambar harus .jpg/.png dan tidak lebih 2MB</p>           
                        </div> 
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>                        
                        <a href="<?php echo base_url('form'); ?>" class="btn btn-primary">Kembali</a>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>