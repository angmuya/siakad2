<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <?php $this->load->view('Template/profile'); ?>
                <li>
                    <a href="<?=site_url().''?>"><i class="fa fa-home"></i> <span class="nav-label">HOME</span></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-database"></i> <span class="nav-label">Master</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href='<?=site_url().'admin/fakultas'?>'>Fakultas</a></li>
                        <li><a href='<?=site_url().'admin/program_studi'?>'>Program Studi</a></li>
                        <li><a href='<?=site_url().'admin/mata_kuliah'?>'>Mata kuliah</a></li>
                        <li><a href='#'>Nilai</a></li>
                    </ul>
                </li>
				
				<li>
                    <a href="#"><i class="fa fa-laptop"></i> <span class="nav-label">Account</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href='<?=site_url().'admin/dosen'?>'>Dosen</a></li>
                        <li><a href='<?=site_url().'admin/mahasiswa'?>'>Mahasiswa</a></li>
                    </ul>
                </li>
             </ul>

        </div>
    </nav>