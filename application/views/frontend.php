
<!DOCTYPE html>
<html>
<head>
  <!--Import materialize.css-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/bootstrap.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/frontend/css/font-awesome.min.css'); ?>">
  <link type="text/css" rel="stylesheet" href="<?php echo base_url('assets/frontend/css/materialize.min.css'); ?>"  media="screen,projection"/>

  <!-- My Css -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/style.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/styletwist.css'); ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/css/animate.css'); ?>">

  <!-- Favicon --> 
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/logo.png'); ?>">

  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <title>e-Complaint PCM Bligo | Muhammadiyah Cabang Bligo</title>
  <style>
  [data-notify="progressbar"] {
    margin-bottom: 0px;
    position: absolute;
    bottom: 0px;
    left: 0px;
    width: 100%;
    height: 5px;
  }
  #buttontop {
      display: inline-block;
      background-color: #1976d2;
      width: 50px;
      height: 50px;
      text-align: center;
      border-radius: 4px;
      position: fixed;
      bottom: 30px;
      right: 30px;
      transition: background-color .3s, 
        opacity .5s, visibility .5s;
      opacity: 0;
      visibility: hidden;
      z-index: 1000;
    }
    #buttontop::after {
      content: "\f077";
      font-family: FontAwesome;
      font-weight: normal;
      font-style: normal;
      font-size: 2em;
      line-height: 50px;
      color: #fff;
    }

    #buttontop:hover {
      cursor: pointer;
      background-color: #333;
    }
    #buttontop:active {
      background-color: #555;
    }
    #buttontop.show {
      opacity: 1;
      visibility: visible;
    }

    .eye-open:before{
      content: "\f06e";
    }
  </style>
</head>

<body>
<a id="buttontop"></a>
<?php echo $header; ?>
<?php echo $content; ?>
<?php echo $footer; ?>

<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/js/materialize.min.js');?>"></script>
<script src="<?php echo base_url('assets/frontend/js/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-notify.min.js');?>"></script>
<script>
 var btn = $('#buttontop');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 300) {
      btn.addClass('show');
    } else {
      btn.removeClass('show');
    }
  });

  btn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
  });


  const sideNav = document.querySelectorAll('.sidenav');
  M.Sidenav.init(sideNav);  


  const slider = document.querySelectorAll('.slider');
  M.Slider.init(slider, {
    indicators : false,
    height : 400,
    transition : 600,
    interval : 5000
  });


  const parallax = document.querySelectorAll('.parallax');
  M.Parallax.init(parallax);


  const materialbox = document.querySelectorAll('.materialboxed');
  M.Materialbox.init(materialbox);


  const scroll = document.querySelectorAll('.scrollspy');
  M.ScrollSpy.init(scroll,{
    scrollOffset : 50
  });


  const modal = document.querySelectorAll('.modal');
  M.Modal.init(modal);

  
  // const tabs = document.querySelectorAll('.tabs');
  // M.Tabs.init(tabs);
  
  const fs = document.querySelectorAll('select');
  M.FormSelect.init(fs);  

</script>
</body>
</html>
