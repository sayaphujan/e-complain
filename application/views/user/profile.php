<section class="content-header">
    <h1>
        Edit
        <small>Profile Pengguna</small>
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
                    echo form_open_multipart(base_url().'user/profile');
                ?>                    
                    <div class="box-body">
                        <div class="form-group">
                            <label for="example">Username</label>
                            <input type="hidden"  name="id" value="<?php echo $record['id_user'] ?>" >
                            <input type="hidden"  name="notif" value="<?php echo $notif; ?>" >
                            <input type="text" disabled name="u_name" class="form-control" placeholder="Username Login" value="<?php echo $record['username']; ?>" >
                        </div>                                           
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama" placeholder="Nama Penggguna" value="<?php echo $record['nama_user']; ?>" required />
                            <?php echo form_error('nama', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="">User Level</label>
                            <input type="hidden" name="role" class="form-control" readonly="readonly" value="<?php echo $record['grup_id']; ?>">
                            <input type="text" name="role" class="form-control" readonly="readonly" value="<?php echo $record['role']; ?>">
                        </div> 
                         <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="passwd" placeholder="Password" />
                            <?php echo form_error('passwd', '<div class="text-red">', '</div>'); ?>
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
                            <input  name="gambar" type="hidden" value="<?php echo $record['image_user']; ?>" />
                            <input  name="userfile" id="preview" type="file" accept="image/*"  onchange="ImagePreview();"/>
                                <p class="help-block">Type gambar harus .jpg/.png dan tidak lebih 2MB</p>
                            </div>                                            
                    </div>
                    <div class="box-footer">
                        <button type="submit" name="submit" class="btn btn-primary"><i class="glyphicon glyphicon-hdd"></i> Simpan</button>
                        <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-primary">Kembali</a>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</section>
