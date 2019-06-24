<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/stylelogin.css'); ?>">
<style>
h5, h3{
  color: #000;
}

#fh5co-team .team-box .user img{
  border: 0px;
}

.cover{
  background-image: url(<?php echo base_url('assets/img/bg_blur.jpg'); ?>);
  height: 100%;
  width: 100%;
  background-size: cover;
  background-position: center;
}
</style>

<section id="fh5co-team" data-section="team" class="cover">
    <div class="fh5co-team">
      <div class="container">
        <div class="row">
          <div class="col-md-3"></div>
            <div class="col-md-6">
            <div class="team-box text-center to-animate-2">
              <div class="user"><img class="img-reponsive" src="<?php echo base_url('assets/img/logo.png'); ?>" alt="Roger Garfield"></div>
                <form method="POST" id="signup-form" name="signup-form" class="signup-form" action="<?php echo base_url('reg');?>">
                    <h5>Form Pendaftaran e - Complaint PCM Bligo</h5>
                    <input type="hidden" class="form-input" name="word" placeholder="word" value="<?php echo $word; ?>" />
                        <select name="jenis" id="jenis">
                          <option value="" disable selected>-- Pilih Jenis Identitas Anda--</option>
                          <option value="nbm">Kartu Anggota Muhammadiyah</option>
                          <option value="ktp">Kartu Tanda Penduduk</option>
                          <option value="sim">Surat Ijin Mengemudi</option>
                        </select>
                    <div class="form-group">
                        <input type="text" class="form-input" name="nomor" placeholder="Nomor Identitas" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="nama" placeholder="Nama Lengkap" required/>
                    </div>
                    <div class="form-group">
                        <input type="date" data-date="" data-date-format="DD MMMM YYYY" name="ttl" required>
                    </div>
                    <select name="jk" id="jk">
                          <option value="" disable selected>-- Pilih Jenis Kelamin Anda--</option>
                          <option value="pria">Pria</option>
                          <option value="wanita">Wanita</option>
                        </select>
                    <div class="form-group">
                        <textarea class="materialize-textarea" name="alamat" placeholder="Alamat Lengkap" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="telp" placeholder="No. Telp/ HP" required/>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-input" name="pekerjaan" placeholder="Pekerjaan" required/>
                    </div>
                    <select name='grup' id="grup">
                            <option value="" disable selected>-- Pilih Grup Anda --</option>
                                <?php
                                    foreach ($record as $r) {
                                        echo "<option value=".$r->grup_id."".set_select('grup', $r->grup_id).">".$r->nama_grup."</option>";
                                    }
                                ?>
                    </select>
                    <div class="form-group">
                        <input type="text" class="form-input" name="username" placeholder="Username" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="password" id="passwords" placeholder="Password" required/>
                        <span toggle="#passwords" class="fa fa-eye-slash field-icon toggle-password"></span>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" placeholder="Email" required/>
                    </div>
                    <div class="form-group">
                      <p><?=$image;?></p>
                      <input type="text" class="form-input" name="captcha" placeholder="Kode Keamanan" required/>
                      <span><?php echo form_error('captcha'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="register" class="form-submit submit" value="Daftar"/>
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>Sudah memiliki akun? <a href="<?php echo base_url('');?>#fh5co-team">Login</a></label>
                    </div>
                    <div class="form-group">
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>Lupa Password? <a href="<?php echo base_url('forget');?>">Klik disini</a></label>
                    </div>
                </form>
            </div>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
    </div>
  </section>
  <script src="<?php echo base_url('assets/frontend/js/jquery.min.js');?>"></script>
  <script>
  msValue($("[name='jenis']"), <?php echo $jenis; ?>);
  msValue($("[name='jk']"), <?php echo $jk; ?>);

  (function($) {

    $(".toggle-password").click(function() {

        $(this).toggleClass("eye-open");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
          input.attr("type", "text");
        } else {
          input.attr("type", "password");
        }
      });

})(jQuery);

function msValue (selector, value) {
 selector.val(value).closest('.select-wrapper').find('li').removeClass("active").closest('.select-wrapper').find('.select-dropdown').val(value).find('span:contains(' + value + ')').parent().addClass('selected active');
}
  </script>

