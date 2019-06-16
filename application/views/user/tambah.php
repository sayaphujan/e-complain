<section class="content-header">
    <h1>
        Tambah
        <small>Users Pengguna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Seting</a></li>
        <li class="active">Users</li>
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
                    echo form_open_multipart(base_url().'user/add');
                ?> 
                  
                    <div class="box-body">
                        <div class="form-group">
                            <label for="example">Username</label>
                            <input type="text" name="u_name" class="form-control" placeholder="Username Login" value="<?php echo set_value('u_name'); ?>">
                                   <?php echo form_error('u_name', '<div class="text-red">', '</div>'); ?>
                        </div>                                           
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Penggguna" value="<?php echo set_value('nama'); ?>">
                            <?php echo form_error('nama', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Identitas</label>
                            <input type="text" class="form-control" name="noidentitas" placeholder="Nomor Identitas" value="<?php echo set_value('noidentitas'); ?>">
                            <?php echo form_error('noidentitas', '<div class="text-red">', '</div>'); ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name='jeniskel' class="form-control ">
                                <option value='0'>- Select Jenis Kelamin -</option>
                                <option value='Pria' <?php echo  set_select('jeniskel', 'Pria'); ?>>Pria</option>
                                <option value='Wanita' <?php echo  set_select('jeniskel', 'Wanita'); ?>>Wanita</option>                                
                            </select>
                            <?php echo form_error('jeniskel', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat User</label>
                            <textarea name="alamatuser" class="form-control" rows="2" placeholder="Masukkan Alamat User"><?php echo set_value('alamatuser'); ?></textarea>
                            <?php echo form_error('alamatuser', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Grup User</label>
                            <select name='grup' class="form-control ">
                            <option value='0'>- Select Grup-</option>
                                <?php
                                if (!empty($record)) {
                                    foreach ($record as $r) {
                                        echo "<option value=".$r->grup_id."".set_select('grup', $r->grup_id).">".$r->nama_grup."</option>";
                                    }
                                }
                                ?>
                            </select>
                            <?php echo form_error('grup', '<div class="text-red">', '</div>'); ?>
                        </div> 
                        <div class="form-group">
                            <label for="">User Level</label>
                            <select name='level' class="form-control ">
                                <option value='0'>- Select Level -</option>
                                <option value='WargaMuh' <?php echo  set_select('level', 'WargaMuh'); ?>>Warga Muh</option>
                                <option value='Administrator' <?php echo  set_select('level', 'Administrator'); ?>>Administrator</option>
                                <option value='Umum' <?php echo  set_select('level', 'Umum'); ?>>Umum</option>                                 
                            </select>
                            <?php echo form_error('level', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="passwd" placeholder="Password">
                            <?php echo form_error('passwd', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Pekerjaan</label>
                            <input type="text" class="form-control" name="pekerjaan" placeholder="Pekerjaan" value="<?php echo set_value('pekerjaan'); ?>">
                            <?php echo form_error('pekerjaan', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telepon</label>
                            <input type="text" class="form-control" name="notelp" placeholder="Nomor Telepon" value="<?php echo set_value('notelp'); ?>">
                            <?php echo form_error('notelp', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
                            <?php echo form_error('email', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Lampiran User</label>
                            <textarea name="lampiran" class="form-control" rows="2" placeholder="Masukkan Lampiran User"><?php echo set_value('lampiran'); ?></textarea>
                            <?php echo form_error('lampiran', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                                <label for="userfile">Gambar</label>
                                <input type="file" name="userfile">
                                <p class="help-block">Type gambar harus .jpg/.png dan tidak lebih dari 2MB</p>
                        </div>
                                  
                    </div><!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>                        
                        <a href="<?php echo base_url('user'); ?>" class="btn btn-primary">Kembali</a>
                    </div>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>