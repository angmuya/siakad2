<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <?php $this->load->view('Template/profile'); ?>
                <li>
                    <a href="<?=site_url().''?>"><i class="fa fa-home"></i> <span class="nav-label">HOME</span></a>
                </li>
                <?php
                 $id['id_role'] = $this->session->userdata('lvl');
                 $this->db->order_by('urut_grup_master','ASC');
                $data = $this->db->get_where('tb_master_menu',$id)->result();
                foreach ($data as $link){
                ?>
                <li>
                    <a href="#"><i class="fa <?=$link->css_class?>"></i> <span class="nav-label"><?=$link->grup_name?></span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                    <?php
                    $sub['grup_id'] = $link->id_menu;
                    $this->db->order_by('urut_m_submenu','ASC');
                    $data = $this->db->get_where('tb_master_submenu',$sub)->result();
                    foreach ($data as $linksub){
                    ?>
                        <li><a href='<?=site_url().$linksub->link?>'><?=$linksub->sub_menu?></a></li>
                    <?php
                    }
                        ?>
                    </ul>
                </li>
                <?php
                }
                ?>
             </ul>

        </div>
    </nav>