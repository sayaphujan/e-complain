<header class="main-header">
    <a href="<?php echo base_url('dashboard'); ?> " class="logo">
		<span class="logo-mini"><img src="<?php echo base_url('assets/img/ecomplaint.png'); ?>"></span>
		<span class="logo-lg"><img src="<?php echo base_url('assets/img/ecomplaint.png'); ?>"></span>
	</a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- Messages: style can be found in dropdown.less-->

                <!-- Notifications: style can be found in dropdown.less -->

                <!-- Tasks: style can be found in dropdown.less -->

                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url('assets/foto/'. $this->session->userdata('image_user')); ?>" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?php echo $this->session->userdata('username'); ?> </span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo base_url('assets/foto/'. $this->session->userdata('image_user')); ?>" class="img-circle" alt="User Image" />
                            <p>
                                <?php 
                                if($this->session->userdata('role') == 'WargaMuh'){ $role = 'Warga Muhammadiyah'; }
                                    else if($this->session->userdata('role') == 'Umum'){ $role = 'Masyarakat Umum'; }
                                        else { $role = 'Administrator';}
                                echo $role; 
                                ?> 
                                <small>Last Login , <?php echo date('d-M-Y H:i:s',strtotime($this->session->userdata('last_login'))); ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->                                    
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url('user/profile/' . $this->session->userdata('id_user')); ?>" class="btn btn-default btn-flat">Profile</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url('logout'); ?>" class="btn btn-default btn-flat">Sign out</a>
                            </div>
                        </li>                        
                    </ul>
                </li>
                </ul>
        </div>
    </nav>
</header>
