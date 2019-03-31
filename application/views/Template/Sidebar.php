<li class="nav-header">
  <div class="dropdown profile-element">
  <?php $img = (in_array($this->session->userdata('nama_role'), ["PENGUSUL", "REVIEWER"]) && $this->session->userdata()['id_scholar']) ? 'https://scholar.google.co.id/citations?view_op=view_photo&user=' . $this->session->userdata()['id_scholar'] : ($this->session->userdata('foto') != '' ?: base_url() . 'assets/img/profile_small.jpg')?>
    <img alt="image" class="rounded-circle" style="width:48px; height:48px;" src="<?=$img?>"/>
    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
        <span class="block m-t-xs font-bold"><?=$this->session->userdata('nama');?></span>
        <span class="text-muted text-xs block">
            <?=ucwords(strtolower(str_replace('_', ' ', $this->session->userdata('nama_role'))))?>
            <?php if($this->session->userdata('nama_prodi')){ ?>
                <?= ' - ' . $this->session->userdata('nama_prodi'); ?>
            <?php } else if($this->session->userdata('nama_fakultas')){ ?>
                <?= ' - ' . $this->session->userdata('nama_fakultas'); ?>
            <?php } ?>
            <b class="caret"></b>
        </span>
    </a>
    <ul class="dropdown-menu animated fadeInRight m-t-xs">
        <li><a class="dropdown-item" href="<?=site_url() . 'logout'?>">Logout</a></li>
    </ul>
  </div>
  <div class="logo-element">
      RU
  </div>
</li>
