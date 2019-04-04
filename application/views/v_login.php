<?php $this->load->view('Template/Header',['title' => $title]); ?>

<div class="loginColumns animated fadeInDown">
  <div class="row">
    <div class="col-md-6">
      <div class="ibox-content">
        <form id="" action='<?=site_url('login-proses')?>' method='post'  class="m-t" role="form">
          <h3>Sign in to Start Session</h3>
          <br>
          <label>Username *</label>
          <div class="input-group m-b">
            <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
            </div>
             <input type="text" class="form-control" name="id_user" placeholder="Enter Your ID User" required="required" >
          </div>
          <label>Password *</label>
          <div class="input-group m-b">
            <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            </div>
             <input type="password" class="form-control" name="password" placeholder="Enter Your Password" required="required" >
          </div>
          <button type="submit" id="loginBtn" class="btn btn-primary block full-width m-b" data-loading-text="Loging In...">Login</button>
        </form>
        <h5 class="text-danger"><i><?=$this->session->flashdata('message');?></i></h5>
        <p class="m-t">
          <small>Sistem Informasi Akademik</small>
        </p>
      </div>
    </div>

    <div class="col-md-6">
      <span class="text-center">
        <h3><img class="col-xs-4 col-lg-4" src="<?php echo base_url('assets');?>/img/stia.png"></h3>
        <h3 class="font-bold">Selamat datang di Sistem Informasi Akademik</h3>
      </span>
      <h4 class="font-bold">Panduan: </h4>
      <div>1. <a href="#" target="_blank">Panduan Cara penggunaan Sistem Informasi Akademik</a></div>
      <div>2. <a href="#" target="_blank">Panduan Mendapatkan Password yang hilang karena lupa</a></div>
      <div>3. <a href="#" target="_blank">Informasi Yang bisa di dapatkan di web</a></div>
    </div>

  </div>
  <hr>
  <div class="row">
      <div class="col-md-6">
          STIA SATYA Negara Palembang
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
