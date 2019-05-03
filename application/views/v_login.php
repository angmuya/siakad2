<?php $this->load->view('Template/Header',['title' => $title]); ?>

<div class="loginColumns animated fadeInDown">
  <div class="row">
    <div class="col-md-6">
	<div id='error' class="text-danger text-center"></div>
      <div class="ibox-content animated fadeInUp">
        <form id="formLogin"  method='post'  class="m-t" role="form">
          <h3>Sign in to Start Session</h3>
          <br>
          <label>Username *</label>
          <div class="input-group m-b">
            <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
            </div>
             <input type="text" class="form-control" name="id_user" placeholder="Enter Your ID User" >
          </div>
          <label>Password *</label>
          <div class="input-group m-b">
            <div class="input-group-prepend">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
            </div>
             <input type="password" class="form-control" name="password" placeholder="Enter Your Password" >
          </div>
          <button type="submit" id="loginBtn" class="btn btn-primary block full-width m-b" >Login</button>
        </form>
        
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
 $(function(){
    
    var loginBtn = document.querySelector('#loginBtn');
    
    loginBtn.addEventListener("click", function() {
        loginBtn.innerHTML = "<span class='fa fa-spinner fa-spin' ></span>";
        loginBtn.classList.add('spinning');
        
    }, false);
    


   $(document).ready(function(){
		var loginForm = $('#formLogin');
		var submitButton = $('#loginBtn');
		
		$("#formLogin").on('submit',(e) => {
			e.preventDefault();
			var data = loginForm.serialize();	
			$.ajax({
				type: "POST",
				dataType: "html",
				url: "login-proses",
				data: data,
				success: function(msg){
					if (msg == '1'){
						window.location.href = "";
					}else{
						loginBtn.classList.remove('spinning');
						loginBtn.innerHTML = "Login";
						$("#error").html(msg);
					}						
				}
			}); 			
		});
   });
});
</script>
<style> body { background-color: #f3f3f4!important; } </style>
<?php $this->load->view('Template/Footer'); ?>
