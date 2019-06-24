<section class='content-header'>
    <h1>
        DAFTAR KOMPLAIN
        <small>Daftar Komplain</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Daftar</a></li>
        <li class='active'>Komplain</li>
    </ol>
</section> 
<section class="content">   

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                    <div style="margin-top: 8px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                <div class="box-body table-responsive">
                    <table id="tb-datatables" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                               <th>No.</th>
                                <th>Objek Komplain</th>
                                <th>Grup</th>
                                <th>Judul Komplain</th>
                                <th>Jenis Komplain</th>
                                <th>Kategori</th>
                                <th>Tgl Komplain</th>
                                <th>Status Komplain</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Hapus</th>
                                <th>Detail</th>
                            </tr>
                        </thead>
                       <?php
                       $no=1;                       
                       foreach ($record as $r): ?>
                            <tr>
                               <td><?php echo $no ?></td>
                               <td><?php echo $r->nama_aum ?></td>
                               <td><?php echo $r->nama_grup ?></td>
                               <td><?php echo $r->judul_complain ?></td>
                               <td><?php echo $r->jenis_complain ?></td>
                               <td><?php echo $r->kategori ?></td>
                               <td><?php echo $r->tgl_complain ?></td>
                               <td><?php echo $r->status_complain ?></td>
                               <td><?php echo $r->status ?></td>
                               <td>
                                <a href="<?php echo base_url('form/edit/'. $r->id_complain)?>"
                                  class="btn btn-info btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit">
                                </a>
                               </td>
                               <td>
                                <?php if($r->status == 'pending'){
                                  echo '<a href="'.base_url('form/delete/'.$r->id_complain).'" onClick="return confirm("Anda yakin akan menghapus data ini ?")" class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete" ></a>';
                                }else{
                                  echo '<a class="btn-sm btn-default glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete" ></a>';
                                }
                                ?>
                               </td>
                               <td>
                                <a href="<?php echo base_url('detail/'. $r->id_complain)?>"
                                  class="btn btn-info btn-sm glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Detail">
                                </a>
                               </td>
                               </tr>
                               <?php $no++;?>
                           <?php endforeach;?>
                    </table> 
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->

