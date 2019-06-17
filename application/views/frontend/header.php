<!-- Navbar -->

  <div class="navbar-fixed">
    <nav class="blue darken-2">
     <div class="container">
      <div class="nav-wrapper">
        <a href="<?php echo base_url(); ?>#home" class="brand-logo flow-text"><img class="responsive-img" src="<?php echo base_url('assets/img/logo.png'); ?>"></a>
        <a href="#home" data-target="mobile-nav" class="sidenav-trigger"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
         <li><a href="<?php echo base_url(); ?>#home">Beranda</a></li>
         <?php 
         if($this->uri->segment('1') != '#home'){
          echo '<li><a href="'.base_url().'#fh5co-team">Pengguna</a></li>';
        } else{
         echo '<li><a href="#fh5co-team">Pengguna</a></li>';
         } 
         ?>
         <li><a href="<?php echo base_url('statistik'); ?>">Statistik</a></li>
         <li><a href="http://www.pcmbligo.or.id" target="_blank">PCM Bligo</a></li>
       </ul>
     </div>
   </div>
 </nav>
</div>

<!-- Side Nav -->
<ul class="sidenav" id="mobile-nav">
  <li>
    <a href="<?php echo base_url(); ?>#home" class="brand-logo flow-text"><img class="responsive-img" style="max-height: 40px; margin-top: 10px;" src="<?php echo base_url('assets/img/logo.png'); ?>"></a>
    <hr/>
  </li>
 <li><a href="<?php echo base_url(); ?>#home">Beranda</a></li>
         <?php 
         if($this->uri->segment('1') != '#home'){
          echo '<li><a href="'.base_url().'#fh5co-team">Pengguna</a></li>';
        } else{
         echo '<li><a href="#fh5co-team">Pengguna</a></li>';
         } 
         ?>
         <li><a href="<?php echo base_url('statistik'); ?>">Statistik</a></li>
         <li><a href="http://www.pcmbligo.or.id" target="_blank">Tentang Kami</a></li>
</ul>
<!-- End Side Nav -->