<li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="<?=site_url()?>assets/img/profile_small.jpg"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold"><?=$this->session->userdata('nama_user')?></span>
                            <span class="text-muted text-xs block"><?php echo strtoupper($this->session->userdata('nama_role'))?><b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Contacts</a></li>
                            <li><a class="dropdown-item" href="<?=site_url(). 'change-password'?>">Change password</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?=site_url(). 'logout'?>">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        AD+
                    </div>
                </li>