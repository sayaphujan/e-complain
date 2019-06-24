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
              <div class="user"><img class="img-reponsive" src="<?php echo base_url($src); ?>" alt="Roger Garfield"></div>
                <form method="POST" id="signin-form" name="signin-form" class="signup-form" action="<?php echo base_url("submit");?>">
                    <h5><?php echo $title; ?></h5>
                    <input type="hidden" class="form-input" name="word" placeholder="word" value="<?php echo $word; ?>" />
                    <input type="hidden" class="form-input" name="role" placeholder="role" value="<?php echo $value; ?>" />
                    <div class="form-group">
                        <input type="text" class="form-input" name="username" placeholder="Username" value="<?php echo $username; ?>" required/>
                        <span><?php echo form_error('username'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-input" name="password" id="password" placeholder="Password" value="<?php echo $password; ?>" required/>
                        <span toggle="#password" class="fa fa-eye-slash field-icon toggle-password"></span>
                        <span><?php echo form_error('password'); ?></span>
                    </div>
                    <div class="form-group">
                      <p><?=$image;?></p>
                      <input type="text" class="form-input" name="captcha" placeholder="Kode Keamanan" value="<?php echo $captcha; ?>" required/>
                      <span><?php echo form_error('captcha'); ?></span>
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" id="login" class="form-submit submit" value="Login"/>
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>Belum memiliki akun? <a href="<?php echo base_url('registrasi');?>">Daftar</a></label>
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

/*$(function(){
  $("#signin-form").submit(function( event ){
    var captcha = $("[name='captcha']").val();
    var word    = $("[name='word']").val();
    if(captcha != word){
      $.notify({
        title: '<strong>Oops!!</strong>',
        icon: 'glyphicon glyphicon-star',
        message: "Kode keamanan tidak cocok"
      },{
        type: 'danger',
        animate: {
          enter: 'animated fadeInUp',
          exit: 'animated fadeOutRight'
        },
        placement: {
          from: "bottom",
          align: "left"
        },
        offset: 20,
        spacing: 10,
        z_index: 1031,
        delay: 5000,
        timer: 1000,
      });
    }else{
        $('form[name=signin-form]').attr('action','');
        $('form[name=signin-form]').submit();
    }
  });
});
 (function($) {

    $("#login").click(function() {
        console.log($("signin-form").attr("action"));
    });

})(jQuery);*/
  </script>

