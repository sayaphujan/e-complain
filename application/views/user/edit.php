<section class="content-header">
    <h1>
        Edit
        <small>User Pengguna</small>
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
                    echo form_open_multipart(base_url().'user/edit');
                ?>                    
                    <div class="box-body">
                        <div class="form-group">
                            <label for="example">Username</label>
                            <input type="hidden"  name="id" value="<?php echo $record['id_user'] ?>" >
                            <input type="text" disabled name="u_name" class="form-control" placeholder="Username Login" value="<?php echo $record['username']; ?>" readonly />
                            <?php echo form_error('u_name', '<div class="text-red">', '</div>'); ?>
                        </div>                                           
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Penggguna" value="<?php echo $record['nama_user']; ?>" redquired />
                            <?php echo form_error('nama', '<div class="text-red">', '</div>'); ?>
                        </div> 
                        <div class="form-group">
                            <label for="">Jenis Identitas</label>
                            <select name='jenisid' class="form-control " required>
                                <option value='nbm' <?php if ($record['jenis_identitas']=="nbm"){ echo 'selected'; } ?> >Kartu Anggota Muhammadiyah</option>
                                <option value='ktp' <?php if ($record['jenis_identitas']=="ktp"){ echo 'selected'; } ?>>Kartu Tanda Penduduk</option>
                                <option value='sim' <?php if ($record['jenis_identitas']=="sim"){ echo 'selected'; } ?>>Surat Ijin Mengemudi</option>
                            </select>
                            <?php echo form_error('level', '<div class="text-red">', '</div>'); ?>
                        </div> 
                        <div class="form-group">
                            <label for="">Nomor Identitas Lengkap</label>
                            <input type="text" class="form-control" name="noidentitas" placeholder="Nomor Identitas" value="<?php echo $record['no_identitas']; ?>" required />
                            <?php echo form_error('noidentitas', '<div class="text-red">', '</div>'); ?>
                        </div> 
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <select name='jeniskel' class="form-control " required>
                                <option value='pria' <?php if ($record['jenis_kelamin']=="pria"){ echo 'selected'; } ?>>Pria</option>
                                <option value='wanita' <?php if ($record['jenis_kelamin']=="wanita"){ echo 'selected'; } ?>>Wanita</option>
                            </select>
                            <?php echo form_error('jeniskel', '<div class="text-red">', '</div>'); ?>
                        </div> 
                        <div class="form-group">
                            <label for="">Alamat User</label>
                            <textarea name="alamatuser" class="form-control" rows="2" placeholder="Alamat User" required><?php echo $record['alamat']; ?></textarea>
                            <?php //echo form_error('alamatuser', '<div class="text-red">', '</div>'); ?>
                        </div> 
                        <div class="form-group">
                            <label for="">Grup User</label>
                            <select name='grup' class="form-control " required>                           
                                <?php
                                if (!empty($grup)) {
                                    foreach ($grup as $g) {
                                        echo "<option value='$g->grup_id'";
                                        echo $record['grup_id'] == $g->grup_id ? 'selected' : '';
                                        echo">$g->nama_grup</option>";
                                    }
                                }
                                ?>
                            </select>
                            <?php echo form_error('grup', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">User Level</label>
                            <select name='level' class="form-control " required>
                                <option value='WargaMuh' <?php if ($record['role']=="WargaMuh"){ echo 'selected'; } ?> >Warga Muh</option>
                                <option value='Umum' <?php if ($record['role']=="Umum"){ echo 'selected'; } ?>>Masyarakat Umum</option>
                                <option value='Administrator' <?php if ($record['role']=="Administrator"){ echo 'selected'; } ?>>Administrator</option>
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
                            <input type="text" class="form-control" name="pekerjaan" placeholder=" Pekerjaan" value="<?php echo $record['pekerjaan']; ?>" required />
                            <?php echo form_error('pekerjaan', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telepon</label>
                            <input type="text" class="form-control" name="notelp" placeholder="Nomor Telepon" value="<?php echo $record['no_telp']; ?>" required />
                            <?php echo form_error('notelp', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Alamat Email" value="<?php echo $record['email']; ?>" required />
                            <?php echo form_error('email', '<div class="text-red">', '</div>'); ?>
                        </div> 
                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea name="lampiran" class="form-control" rows="2" placeholder="Silakan jelaskan tentang diri Anda" required><?php echo $record['lampiran_user']; ?></textarea>
                            <?php //echo form_error('alamatuser', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">  
                        <?php
                        if(empty($record['image_user']))
                        {
                            echo '<img id="uploadPreview" style="width:125px;" class="img-rounded" src="'.base_url('assets/foto/placeholder.png').'" />';
                        }else{
                            echo '<img id="uploadPreview" style="width:125px;" class="img-rounded" src="'.base_url('assets/foto/'.$record['image_user']).'" />';
                        }
                        ?>
                            
                            <br><br>
                            <label><?php if($record['image_user']!="") {echo $record['image_user'];}else{echo '';} ?></label>
                            <br/>
                            <input  name="image" type="hidden" value="<?php echo $record['image_user']; ?>" />
                            <input  name="userfile" id="preview" type="file" accept="image/*"  onchange="ImagePreview();"/>
                                <p class="help-block">Type gambar harus .jpg/.png dan tidak lebih 2MB</p>
                            </div>                                            
                    </div>
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