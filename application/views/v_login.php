<?php $this->load->view('Template/Header',['title' => $title]); ?>

<div class="loginColumns animated fadeInDown">
  <div class="row">
    <div class="col-md-6">
      <span class="text-center">
        <h3><img class="col-xs-6 col-lg-6" src="<?php echo base_url('assets');?>/img/logo-unsri.png"></h3>
        <h3 class="font-bold">Selamat datang di LPPM Universitas Sriwijaya</h3>
      </span>
      <h4 class="font-bold">Panduan: </h4>
      <div>1. <a href="#" target="_blank">Buku Panduan Pelaksanaan Penelitian dan Pengabdian Kepada Masyarakat Tahun 2019</a></div>
      <div>2. <a href="#" target="_blank">Panduan Sinkronisasi Perbaikan Data dan Profile Dosen</a></div>
    </div>
    <div class="col-md-6">
      <div class="ibox-content">
        <form id="" action='<?=site_url('login-proses')?>' method='post'  class="m-t" role="form">
          <h3>Masuk Sebagai User</h3>
          <h5 class="text-warning">Untuk :</h5>
          <div class="form-group">
            <input type="text" class="form-control" name="id_user" placeholder="Username" required="required">
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
          </div>
          <button type="submit" id="loginBtn" class="btn btn-primary block full-width m-b" data-loading-text="Loging In...">Login</button>
        </form>
        <p class="m-t">
          <small>LPPM Unsri</small>
        </p>
      </div>
    </div>
  </div>
  <hr>
  <div class="row">
      <div class="col-md-6">
          Universitas Sriwijaya
      </div>
      <div class="col-md-6 text-right">
          <small>© 2019</small>
          </div>
      </div>
  </div>
</div>

<script>
  $(document).ready(function() {

    var loginForm = $('#loginForm');
    var submitBtn = loginForm.find('#loginBtn');

    loginForm.on('submit', (ev) => {
      ev.preventDefault();
      buttonLoading(submitBtn);
      $.ajax({
        url: "<?=site_url() . 'login-proses'?>",
        type: "POST",
        data: loginForm.serialize(),
        success: (data) => {
          buttonIdle(submitBtn);
          json = JSON.parse(data);
          if(json['error']){
            swal("Login Gagal", json['message'], "error");
            return;
          }
          $(location).attr('href', '<?=site_url()?>' + json['user']['nama_role'].toLowerCase());
        },
        error: () => {
          buttonIdle(submitBtn);
        }
      });
    });

  });
</script>
<style> body { background-color: #f3f3f4!important; } </style>
<?php $this->load->view('Template/Footer'); ?>
