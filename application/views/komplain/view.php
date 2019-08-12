<style>
.dt-buttons{
  display: none;
}

.dataTables_filter{
  display: none;
}

.column {
  float: left;
  width: 33.33%;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>
<section class='content-header'>
    <h1>
        DATA KOMPLAIN
        <small>Master Komplain</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Master</a></li>
        <li class='active'>Komplain</li>
    </ol>
</section> 
<section class="content">   

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
               <div class='box-header with-border'>
                  <div class="row" style="margin-left:5px">
                    <div class="column">
                      &nbsp;
                    </div>
                    <div class="column" style="width:50%">
                      <form action="<?php echo base_url(uri_string()); ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                              <div class="col-sm-4">
                                <select name="filter" class="form-control">
                                  <option value=''>- Pilih Disini -</option>
                                  <option value='level' <?php echo  set_select('filter', 'level'); ?>>Level User</option>
                                  <option value='grup' <?php echo  set_select('filter', 'grup'); ?>>User Group</option>
                                  <option value='jenis' <?php echo  set_select('filter', 'jenis'); ?>>Jenis Komplain</option>
                                </select>
                              </div>
                              <div class="col-sm-4">
                              <input type="text" class="form-control" name="key" placeholder="Kata Kunci" value="<?php echo set_value('key'); ?>">
                              </div>
                              <div class="col-sm-2">
                                <input type="submit" value="submit" name="submit" class="btn btn-primary">
                              </div>
                              <div class="col-sm-1">
                                <a href="<?php echo base_url(uri_string()); ?>"><i class="fa fa-refresh fa-2x" title="Refresh"></i></a>
                              </div>
                            </div>
                          </form>
                    </div>
                    <div class="column" style="width:10%">
                      <form action="<?php echo base_url(uri_string().'/excel'); ?>" method="post">
                            <input type="hidden" name="filter_" value="<?= $filter; ?>">
                            <input type="hidden" name="key_" value="<?= $key; ?>">
                            <button type="submit" id="submit" name="submit" class="btn btn-primary">Ekspor XLS</button>
                          </form>
                    </div>
                  </div>
                </div>
                    <div style="margin-top: 8px" id="message">
                        <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                    </div>
                <div class="box-body table-responsive">
                    <table id="tb-datatables" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                               <th>No.</th>
                                <th>Nama User</th>
                                <th>Level User</th>
                                <th>Grup</th>
                                <th>Objek Komplain</th>
                                <th>Judul Komplain</th>
                                <th>Jenis Komplain</th>
                                <th>Kategori</th>
                                <th>Tgl Komplain</th>
                                <th>Solusi</th>
                                <th>Status Complain</th>
                                <th>Status</th>
                                <!--<th>Edit</th>
                                <th>Hapus</th>-->
                                <th>Detail</th>
                                <th>Tanggapi</th>
                            </tr>
                        </thead>
                       <?php
                       $no=1;                       
                       foreach ($record as $r): ?>
                            <tr>
                               <td><?php echo $no ?></td>
                               <td><?php echo $r->nama_user ?></td>
                               <td><?php echo $r->role ?></td>
                               <td><?php echo $r->nama_grup ?></td>
                               <td><?php echo $r->nama_aum ?></td>
                               <td><?php echo $r->judul_complain ?></td>
                               <td><?php echo $r->jenis_complain ?></td>
                               <td><?php echo $r->kategori ?></td>
                               <td><?php echo $r->tgl_complain ?></td>
                               <td><?php echo $r->solusi ?></td>
                               <td><?php echo $r->status_complain ?></td>
                               <td><?php echo $r->status ?></td>
                               <!--<td>
                                <a href="<?php echo base_url('form/edit/'. $r->id_complain)?>"
                                  class="btn btn-info btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit">
                                </a>
                               </td>
                               <td>-->
                                <!--<?php if($r->status == 'pending'){
                                  echo '<a href="'.base_url('form/delete/'.$r->id_complain).'" onClick="return confirm("Anda yakin akan menghapus data ini ?")" class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete" ></a>';
                                }else{
                                  echo '<a class="btn-sm btn-default glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete" ></a>';
                                }
                                ?>
                               </td>-->
                               <td>
                                <a href="<?php echo base_url('detail/'. $r->id_complain)?>"
                                  class="btn btn-info btn-sm glyphicon glyphicon-eye-open" data-toggle="tooltip" title="Detail">
                                </a>
                               </td>
                               <td><a href="<?php echo base_url('complaint/edit/'. $r->id_complain)?>"
                                class="btn btn-info btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Tanggapi"></a></td>
                               </tr>
                               <?php $no++;?>
                           <?php endforeach;?>
                    </table> 
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->

