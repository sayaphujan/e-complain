<section class="content-header">
    <h1>
        Edit
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
                    echo form_open_multipart('aum/edit');
                ?>
                    
                    <div class="box-body">
                        <div class="form-group">
                            <label for="example">Nama AUM & ORTOM</label>
                            <input type="hidden"  name="id_aum" value="<?php echo $record['id_aum'] ?>" >
                            <input type="text" name="nama_aum" class="form-control" id="inputError" placeholder="Masukan Nama AUM & ORTOM" value="<?php echo $record['nama_aum']; ?>" >
                            <?php //echo form_error('nama_aum', '<div class="text-red">', '</div>'); ?>
                        </div>
                        <div class="form-group">
                            <label for="jenis_aum">Jenis AUM & ORTOM</label>
                            <select name='jenis_aum' class="form-control ">
                                <?php 
                                  if ($record['jenis_aum']=="takmir"){
                                    echo "<option value='takmir' selected>Takmir</option>
                                        <option value='ranting'>Ranting</option>
                                        <option value='majelis'>Majelis</option>
                                        <option value='aum'>AUM</option>
                                        <option value='cabang'>Cabang</option>
                                        <option value='ortom'>ORTOM</option>";
                                  }elseif ($record['jenis_aum']=="ranting"){
                                    echo "<option value='ranting' selected>Ranting</option>
                                        <option value='takmir'>Takmir</option>
                                        <option value='majelis'>Majelis</option>
                                        <option value='aum'>AUM</option>
                                        <option value='cabang'>Cabang</option>
                                        <option value='ortom'>ORTOM</option>";
                                }elseif ($record['jenis_aum']=="majelis"){
                                    echo "<option value='majelis' selected>Majelis</option>
                                        <option value='takmir'>Takmir</option>
                                        <option value='ranting'>Ranting</option>
                                        <option value='aum'>AUM</option>
                                        <option value='cabang'>Cabang</option>
                                        <option value='ortom'>ORTOM</option>";
                                }elseif ($record['jenis_aum']=="aum"){
                                    echo "<option value='aum' selected>AUM</option>
                                        <option value='takmir'>Takmir</option>
                                        <option value='ranting'>Ranting</option>
                                        <option value='majelis'>Majelis</option>
                                        <option value='cabang'>Cabang</option>
                                        <option value='ortom'>ORTOM</option>";
                                }elseif ($record['jenis_aum']=="cabang"){
                                    echo "<option value='cabang' selected>Cabang</option>
                                        <option value='takmir'>Takmir</option>
                                        <option value='ranting'>Ranting</option>
                                        <option value='majelis'>Majelis</option>
                                        <option value='aum'>AUM</option>
                                        <option value='ortom'>ORTOM</option>";
                                  }else{
                                    echo "<option value='ortom' selected>ORTOM</option>
                                        <option value='takmir'>Takmir</option>
                                        <option value='ranting'>Ranting</option>
                                        <option value='majelis'>Majelis</option>
                                        <option value='aum'>AUM</option>
                                        <option value='cabang'>Cabang</option>";
                                  }
                                ?>                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="example">Deskripsi AUM & ORTOM</label>
                            <input type="text" name="deskripsi_aum" class="form-control" placeholder="Isikan Deskripsi AUM & ORTOM" value="<?php echo $record['deskripsi_aum']; ?>" >
                        </div>                        
                        <div class="form-group">                                   
                            <img src="<?php echo base_url() . '/assets/foto/' . $record['image_aum']; ?> " whith="200" height="200">  
                                <input type="hidden" name="image_aum" value="<?php echo $record['image_aum']; ?>" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Ganti Gambar</label>
                                <input type="file" name="userfile" id="exampleInputFile">
                                <p class="help-block">Type gambar harus .jpg/.png dan tidak lebih 2MB</p>
                            </div>                                            
                    </div>              
                    
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