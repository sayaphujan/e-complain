<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/foto/'. $this->session->userdata('image_user')); ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo $this->session->userdata('nama_user'); ?>  </p>
                <p><i class="fa fa-group text-primary"></i> <?php echo $this->session->userdata('grup'); ?></p>
            </div>
        </div>
        
        <!-- search form -->                    
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <?php
            if ($this->session->userdata('role')=='Administrator'){

                ############## parent 0 role WargaMuh #########################################################
                /*$main = $this->db->get_where('tb_menu', array('parent' => 0,'role'=>'WargaMuh', 'aktif'=>'Y'));

                foreach ($main->result() as $m) {
                    // chek ada submenu atau tidak
                    $sub = $this->db->get_where('tb_menu', array('parent' => $m->id_menu, 'role'=>'WargaMuh', 'aktif'=>'Y'));

                    ############## parent 0 role WargaMuh with sub class ######################################
                    if ($sub->num_rows() > 0) {
                        // buat menu + sub menu
                        $uri=$this->uri->segment(1);
                        $idclass=$this->db->get_where('tb_menu',array('link'=>$uri))->row_array();
                            if ($m->id_menu==$idclass['parent']){
                                $class="active treeview";
                            }else{
                                $class="";
                            }

                        echo '<li class='.$class.'>' . anchor(base_url().$m->link, '<i class="' . $m->icon . '"></i>
                            <span class="treeview">' . strtoupper($m->nama_menu) . '</span>
                            <b class="fa fa-angle-left pull-right"></b>', array('class' => 'dropdown-toggle'));

                        echo "<ul class='treeview-menu'>";
                        foreach ($sub->result() as $s) {
                            $uri=$this->uri->segment(1);
                            if ($s->link==$uri){
                                $class1="active treeview";
                            }else{
                                $class1="";
                            }
                            echo '<li class='.$class1.'>' . anchor(base_url().$s->link, '<i class="' . $s->icon . '"></i>' . strtoupper($s->nama_menu)) . '</li>';
                        }
                        echo "</ul>";
                        echo '</li>';
                    } else {

                        ############## parent 0 role WargaMuh without sub class ######################################
                        // single menu
                        $uri=$this->uri->segment(1);
                        if ($m->link==$uri){
                            $class2="active";
                        }else{
                            $class2="";
                        }
                        echo '<li class='.$class2.'>' . anchor(base_url().$m->link, '<i class="' . $m->icon . ' fa-lg">
                            </i>  <span class="treeview">' . strtoupper($m->nama_menu) . '</span>') . '</li>';
                    }                
                }*/

                echo '<li class="header bg-green-active">ADMIN NAVIGATION</li> '; 
                    $admin = $this->db->get_where('tb_menu', array('parent' => 0,'role'=>'Administrator','aktif'=>'Y'));
                    foreach ($admin->result() as $m) {
                        // chek ada submenu atau tidak
                        $sub = $this->db->get_where('tb_menu', array('parent' => $m->id_menu, 'aktif'=>'Y'));
                        if ($sub->num_rows() > 0) {
                            // buat menu + sub menu
                            $uri=$this->uri->segment(1);
                            $idclass=$this->db->get_where('tb_menu',array('link'=>$uri))->row_array();
                            if ($m->id_menu==$idclass['parent']){
                                $class="active treeview";
                            }else{
                                $class="";
                            }
                            echo '<li class='.$class.'>' . anchor(base_url().$m->link, '<i class="' . $m->icon . '"></i>
                                <span class="treeview '.$m->link.'">' . strtoupper($m->nama_menu) . '</span>
                                <b class="fa fa-angle-left pull-right"></b>', array('class' => 'dropdown-toggle'));
                            echo "<ul class='treeview-menu'>";
                            foreach ($sub->result() as $s) {
                                $uri=$this->uri->segment(1);
                                if ($s->link==$uri){
                                    $class1="active treeview";
                                }else{
                                    $class1="";
                                }
                                echo '<li class='.$class1.'>' . anchor(base_url().$s->link, '<i class="' . $s->icon . '"></i>' . strtoupper($s->nama_menu)) . '</li>';
                            }
                            echo "</ul>";
                            echo '</li>';
                        } else {
                            // single menu
                            $uri=$this->uri->segment(1);
                            if ($m->link==$uri){
                                $class2="active";
                            }else{
                                $class2="";
                            }
                            echo '<li class='.$class2.'>' . anchor(base_url().$m->link, '<i class="' . $m->icon . ' fa-lg">
                                </i>  <span class="treeview">' . strtoupper($m->nama_menu) . '</span>') . '</li>';
                        }                
                    }           
            }elseif($this->session->userdata('role')=='WargaMuh' || $this->session->userdata('role')=='Umum'){
            echo '<li class="header bg-green-active">MAIN NAVIGATION</li>     ';           
                $main = $this->db->get_where('tb_menu', array('parent' => 0,'role'=>'WargaMuh', 'aktif'=>'Y'));
                foreach ($main->result() as $m) {
                    // chek ada submenu atau tidak
                    $sub = $this->db->get_where('tb_menu', array('parent' => $m->id_menu, 'aktif'=>'Y'));
                    if ($sub->num_rows() > 0) {
                        // buat menu + sub menu
                        $uri=$this->uri->segment(1);
                        $idclass=$this->db->get_where('tb_menu',array('link'=>$uri))->row_array();
                            if ($m->id_menu==$idclass['parent']){
                                $class="active treeview";
                            }else{
                                $class="";
                            }
                        echo '<li class='.$class.'>' . anchor(base_url().$m->link, '<i class="' . $m->icon . '"></i>
                            <span>' . strtoupper($m->nama_menu) . '</span>
                            <b class="fa fa-angle-left pull-right"></b>', array('class' => 'dropdown-toggle'));
                        echo "<ul class='treeview-menu'>";
                        foreach ($sub->result() as $s) {
                            $uri=$this->uri->segment(1);
                            if ($s->link==$uri){
                                $class1="active treeview";
                            }else{
                                $class1="";
                            }
                            echo '<li class='.$class1.'>' . anchor(base_url().$s->link, '<i class="' . $s->icon . '"></i>' . strtoupper($s->nama_menu)) . '</li>';
                        }
                        echo "</ul>";
                        echo '</li>';
                    } else {
                        $uri=$this->uri->segment(1);
                        if ($m->link==$uri){
                            $class2="active";
                        }else{
                            $class2="";
                        }
                        echo '<li class='.$class2.'>'. anchor(base_url().$m->link, '<i class="' . $m->icon . ' fa-lg">
                            </i>  <span>' . strtoupper($m->nama_menu) . '</span>') . '</li>';
                    }
                } 
            }else{
                $main1 = $this->db->get_where('tb_menu', array('parent' => 41, 'aktif'=>'Y'))->row();
                // single menu
                    $uri=$this->uri->segment(1);
                    if ($main1->link==$uri){
                        $class2="active";
                    }else{
                        $class2="";
                    }
                    echo '<li class='.$class2.'>' . anchor(base_url().$main1->link, '<i class="' . $main1->icon . ' fa-lg">
                        </i>  <span class="treeview">' . strtoupper($main1->nama_menu) . '</span>') . '</li>';

                $main = $this->db->get_where('tb_menu', array('parent' => 50, 'aktif'=>'Y'));
                foreach ($main->result() as $m) {
                    // chek ada submenu atau tidak
                    $sub = $this->db->get_where('tb_menu', array('parent' => $m->id_menu, 'aktif'=>'Y'));
                        // buat menu + sub menu
                        $uri=$this->uri->segment(1);
                        $idclass=$this->db->get_where('tb_menu',array('link'=>$uri))->row_array();
                            if ($m->id_menu==$idclass['parent']){
                                $class="active treeview";
                            }else{
                                $class="";
                            }
                        echo '<li class='.$class.'>' . anchor(base_url().$m->link, '<i class="' . $m->icon . '"></i>
                            <span class="treeview">' . strtoupper($m->nama_menu) . '</span>
                            <b class="fa fa-angle-left pull-right"></b>', array('class' => 'dropdown-toggle'));
                        echo "<ul class='treeview-menu'>";
                        foreach ($sub->result() as $s) {
                            $uri=$this->uri->segment(1);
                            if ($s->link==$uri){
                                $class1="active treeview";
                            }else{
                                $class1="";
                            }
                            echo '<li class='.$class1.'>' . anchor(base_url().$s->link, '<i class="' . $s->icon . '"></i>' . strtoupper($s->nama_menu)) . '</li>';
                        }
                        echo "</ul>";
                        echo '</li>';            
                }
                $main2 = $this->db->get_where('tb_menu', array('parent' => 40, 'aktif'=>'Y'))->row();
                // single menu
                    $uri=$this->uri->segment(1);
                    if ($main2->link==$uri){
                        $class2="active";
                    }else{
                        $class2="";
                    }
                    echo '<li class='.$class2.'>' . anchor(base_url().$main2->link, '<i class="' . $main2->icon . ' fa-lg">
                        </i>  <span class="treeview">' . strtoupper($main2->nama_menu) . '</span>') . '</li>';
            }        
            ?>
            
        </ul><!--/.nav-list-->             
    </section>
    <!-- /.sidebar -->
</aside>
