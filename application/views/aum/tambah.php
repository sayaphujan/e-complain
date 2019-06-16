<section class="content-header">
    <h1>
        Tambah
        <small>Master AUM & ORTOM</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Master</a></li>
        <li class="active">AUM & ORTOM</li>
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
                    echo form_open_multipart(base_url().'aum/tambah');
                ?> 
                    <div class="box-body">
                        <div class="form-group">
                            <label for="example">Nama AUM</label>
                            <input type="text" name="nama_aum" class="form-control" placeholder="Masukan Nama AUM" value="<?php echo set_value('nama_aum'); ?>" size="50" required/>
                                   <?php echo form_error('nama_aum', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jenis_aum">Jenis AUM</label>
                            <select name='jenis_aum' class="form-control " required >
                                <option value='0'>--Pilih Jenis AUM--</option>
                                <option value='takmir' <?php echo  set_select('jenis_aum', 'takmir'); ?>>Takmir</option>
                                <option value='ranting' <?php echo  set_select('jenis_aum', 'ranting'); ?>>Ranting</option>
                                <option value='majelis' <?php echo  set_select('jenis_aum', 'majelis'); ?>>Majelis</option>
                                <option value='aum' <?php echo  set_select('jenis_aum', 'aum'); ?>>AUM</option>
                                <option value='cabang' <?php echo  set_select('jenis_aum', 'cabang'); ?>>Cabang</option>
                                <option value='ortom' <?php echo  set_select('jenis_aum', 'ortom'); ?>>ORTOM</option>                          
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="example">Deskripsi AUM</label>
                            <textarea name="deskripsi_aum" class="form-control" placeholder="Deskripsi AUM & ORTOM" required ><?php echo set_value('deskripsi_aum'); ?></textarea>
                        </div> 
                        <div class="form-group">
                                <label for="userfile">Image AUM</label>
                                <input type="file" name="userfile">
                                <p class="help-block">Type gambar harus .jpg/.png dan tidak lebih dari 2MB</p>
                        </div>                         
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>                        
                        <a href="javascript:history.back()" class="btn btn-primary">Kembali</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>