<style>

.dropdowns {
  position: relative;
  display: inline-block;
}

.dropdowns-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 250px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdowns-content a {
  color: black;
  font-size: 1rem;
    padding: 0 8px;
    padding-top: 0px;
    padding-right: 8px;
    padding-bottom: 0px;
    padding-left: 8px;
  text-decoration: none;
  display: block;
}

.dropdowns-content a:hover {background-color: #ddd;}

.dropdowns:hover .dropdowns-content {display: block;}

.dropdowns:hover .dropbtn {background-color: #3e8e41;}
</style>
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
         <li class="dropdowns"><a href="#">Statistik</a>
            <div class="dropdowns-content">
              <a href="statistik-daily">Data Masuk</a>
              <a href="statistik-status">Data Prosentase Status</a>
              <a href="statistik-aum">Data Prosentase Objek Komplain</a>
              <a href="statistik">Data Prosentase Saran & Kritik</a>
            </div>
         </li>
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
         <li class="dropdowns"><a href="#">Statistik</a>
            <div class="dropdowns-content">
              <a href="statistik-daily">Data Masuk</a>
              <a href="statistik-status">Data Prosentase Status</a>
              <a href="statistik-aum">Data Prosentase Objek Komplain</a>
              <a href="statistik">Data Prosentase Saran & Kritik</a>
            </div>
         </li>
         <li><a href="http://www.pcmbligo.or.id" target="_blank">Tentang Kami</a></li>
</ul>
<!-- End Side Nav -->