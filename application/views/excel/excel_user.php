<?php
$nama_file = "Laporan Data User -_-".$filter.'-_-'.$key.".xls";    
header("Pragma: public");   
header("Expires: 0");   
header("Cache-Control: must-revalidate, post-check=0,pre-check=0");     
header("Content-Type: application/force-download");     
header("Content-Type: application/octet-stream");   
header("Content-Type: application/download");   
header("Content-Disposition: attachment;filename=".$nama_file."");  
header("Content-Transfer-Encoding: binary ");
?>
<style type="text/css">
              table{
                      border-collapse: collapse;
                      font-family: arial;
                      width: 100%;
                    }

              th{
                      background-color: #4CAF50;
                      font-color : white;
                    }
               
              td{
                      border-top: 1px solid #e3e3e3;
                      border-left: 1px solid #e3e3e3;
                      border-right: 1px solid #e3e3e3;
                      border-bottom: 1px solid #e3e3e3;
                      padding: 10px;
                    }

                </style>
                <!--<img src='<?php echo base_url();?>assets/img/kop.jpg' width="150%">
                  <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />-->
              <img src='<?php echo base_url();?>assets/img/logo.png' width="25%" height="25%">
            <center>
              <h2><b>PIMPINAN CABANG MUHAMMADIYAH</b><br/>
              <b>BLIGO BUARAN</b><br/>
              <b>DAERAH KABUPATEN PEKALONGAN</b></h2>
              Surat Ketetapan PP Muhammadiyah No. 2056 / A tgl 1-8-1965
              <hr/>
              Alamat Kantor : Gedung Dakwah Muhammadiyah Bligo Jalan Raya Bligo No. 07 Buaran  Pekalongan 51171
              <br/>
              Telepon/HP: 085201139973  Email : secretariat@pcmbligo.or.id
              <hr/>
              <h3 class="box-title"><b>LAPORAN DATA USER e-Complaint PCM Bligo</b></h3>
               <p>Berdasarkan <?php echo $filter; ?></p>
               <!--<p>Periode : <?php echo $awal; ?> s/d <?php echo $akhir; ?></p>-->
            </center>
                <table class="table table-bordered table-striped table-hover" id="example1">
           <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Pengguna</th>
                    <th>Username</th>
                    <th>Level User</th>
                    <th>User Group</th>  
                </tr>
            </thead>
            <tbody>
              <?php
              $no=1;
                    foreach ($tampil->result_array() as $key => $value) {
              echo"
                  <tr>
                    <td>".$no++."</td>
                    <td>".strtoupper($value['nama_user'])."</td>
                    <td>".$value['username']."</td>
                    <td>".$value['role']."</td>
                    <td>".$value['nama_grup']."</td>
                  </tr>
              ";
                    }
              ?>
            </tbody>
        </table>
        <br /><br />
        <font size="2">Dicetak tgl : <?php echo date('d-m-Y'); ?> jam : <?php echo date('H:i:s'); ?> oleh : <?php echo strtoupper($this->session->userdata('nama_user')); ?> </font>