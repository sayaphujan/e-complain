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
<section class="content-header">
    <h1>
        Users Pengguna
        <small>Seting Users</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-suitcase"></i>Seting</a></li>
        <li class="active">Users</li>
    </ol>
</section>
<section class="content">   

    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class='box-header with-border'>
                  <div class="row" style="margin-left:5px">
                    <div class="column">
                      <h3 class='box-title'><a href="<?php echo base_url('user/add'); ?>" class="btn btn-primary btn-small">
                      <i class="glyphicon glyphicon-plus"></i> Tambah Data</a></h3>
                    </div>
                    <div class="column" style="width:50%">
                      <form action="<?php echo base_url(uri_string()); ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                              <div class="col-sm-4">
                                <select name="filter" class="form-control">
                                  <option value=''>- Pilih Disini -</option>
                                  <option value='level' <?php echo  set_select('filter', 'level'); ?>>Level User</option>
                                  <option value='grup' <?php echo  set_select('filter', 'grup'); ?>>User Group</option>
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
                <div class="box-body table-responsive">
                    <table id="tb-datatables" class="table table-bordered table-striped" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pengguna</th>
                                <th>Username</th>
                                <th>Level User</th>
                                <th>User Group</th>                                                              
                                <th>Edit</th>   
                                <th>Delete</th>                                 
                            </tr>
                        </thead>
                       <?php
                       $no=1;                       
                       foreach ($record as $r){
                       $gid=$this->db->get_where('tb_grup',array('grup_id'=>$r->grup_id))->row_array();  
                           echo"
                               <tr>
                               <td>$no</td>
                               <td>".$r->nama_user."</td>
                               <td>".$r->username."</td>
                               <td>".$r->role."</td>
                               <td>".$gid['nama_grup']."</td>                                                       
                               <td>" . anchor(base_url().'user/edit/' . $r->id_user, '<i class="btn btn-info btn-sm glyphicon glyphicon-edit" data-toggle="tooltip" title="Edit"></i>') . "</td>
                               <td>" . anchor(base_url().'user/delete/' . $r->id_user, '<i class="btn-sm btn-info glyphicon glyphicon-trash" data-toggle="tooltip" title="Delete"></i>', array('onclick' => "return confirm('Data Akan di Hapus?')")) . "</td>
                               </tr>";
                           $no++;
                       }
                       ?>
                    </Table> 
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
</section><!-- /.content -->
