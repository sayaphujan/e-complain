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
              <span style="color:red"><?php echo $message; ?></span>
                <form method="POST" id="forget-form" class="signup-form" action="<?php echo base_url('loginmuh/forget');?>">
                    <p>Kami akan mengirimkan data pemulihan ke email Anda.</p>
                    <div class="form-group">
                        <input type="email" class="form-input" name="email" placeholder="Email" required/>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="forget" class="form-submit submit" value="Kirim"/>
                    </div>
                    <div class="form-group">
                      <label for="agree-term" class="label-agree-term"><span><span></span></span>Belum memiliki akun? <a href="<?php echo base_url('registrasi');?>">Daftar</a></label>
                    </div>
                    <div class="form-group">
                      <label for="agree-term" class="label-agree-term"><span><span></span></span>Sudah memiliki akun? <a href="<?php echo base_url('');?>#fh5co-team">Login</a></label>
                    </div>
                </form>
            </div>
          </div>
          <div class="col-md-3"></div>
        </div>
      </div>
    </div>
  </section>

