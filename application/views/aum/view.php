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
        DATA AUM DAN ORTOM
        <small>Master AUM & ORTOM</small>
    </h1>
    <ol class='breadcrumb'>
        <li><a href='#'><i class='fa fa-suitcase'></i>Master</a></li>
        <li class='active'>AUM Dan ORTOM</li>
    </ol>
</section> 
<section class="content">   

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
              <div class='box-header with-border'>
                  <div class="row" style="margin-left:5px">
                    <div class="column">
                      <h3 class='box-title'><a href="<?php echo base_url('aum/tambah'); ?>" class="btn btn-primary btn-small">
                      <i class="glyphicon glyphicon-plus"></i> Tambah Data</a></h3>
                    </div>
                    <div class="column" style="width:50%">
                      <form action="<?php echo base_url(uri_string()); ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                              <div class="col-sm-4">
                                <select name="filter" class="form-control">
                                  <option value=''>- Pilih Disini -</option>
                                  <option value='takmir' <?php echo  set_select('filter', 'takmir'); ?>>Takmir</option>
                                  <option value='ranting' <?php echo  set_select('filter', 'ranting'); ?>>Ranting</option>
                                  <option value='majelis' <?php echo  set_select('filter', 'majelis'); ?>>Majelis</option>
                                  <option value='aum' <?php echo  set_select('filter', 'aum'); ?>>Aum</option>
                                  <option value='cabang' <?php echo  set_select('filter', 'cabang'); ?>>Cabang</option>
                                  <option value='ortom' <?php echo  set_select('filter', 'ortom'); ?>>Ortom</option>
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
                                <th>Nama AUM</th>
                                <th>Jenis AUM</th>
                                <th>Deskripsi AUM</th>
                                <th>Image AUM</th>
                                <th>Edit</th>
                                <th>Delete</th>                               
                            </tr>
                        </thead>
                       <?php
                       $no=1;                       
                       foreach ($record as $r): ?>
                            <tr>
                               <td><?php echo $no ?></td>
                               <td><?php echo $r->nama_aum ?></td>
                               <td><?php echo $r->jenis_aum ?></td>
                               <td><?php echo $r->deskripsi_aum ?></td>
                               <td><img src="<?php echo base_url('assets/foto/'.$r->image_aum)?>" class="img-rounded" height="100" width="100" style="border: 2px solid #666666;" /></td>               
                               <td><a href="<?php echo base_url('aum/edit/'. $r->id_aum)?>"
                                class="btn btn-info btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></a></td>
                               <td><a href="<?php echo base_url('aum/delete/'.$r->id_aum);?>" onClick="return confirm('Anda yakin akan menghapus data ini ?')" class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete" ></a></td>
                               </tr>
                               <?php $no++;?>
                           <?php endforeach;?>
                    </table> 
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->

