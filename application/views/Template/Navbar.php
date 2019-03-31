<div id="page-wrapper" class="gray-bg">
<div class="row border-bottom">
    <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
        <ul class="nav navbar-top-links navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#" aria-expanded="false">
                    <i class="fa fa-bell"></i>  <span class="label label-warning" id="unFinishNotificaiton">-</span>
                </a>
                <ul class="dropdown-menu dropdown-messages dropdown-menu-right" id="navbarNotificationContainer">
   
                    <li id="showAllNotificationContainer">
                        <div class="text-center link-block">
                            <a href="#" class="dropdown-item" id="showAllNotificationButton">
                                <i class="fa fa-bell"></i> <strong>Semua Notification</strong>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <li>
                <a href="<?=site_url() . 'logout'?>">
                    <i class="fa fa-sign-out"></i> Log out
                </a>
            </li>
        </ul>

    </nav>
</div>

<div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2><?=$title?></h2>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="<?=site_url()?>">Home</a>
                        </li>
						<?php
						if($title !== "Home"){
						?>
                        <li class="breadcrumb-item active">
                            <strong><?=$title?></strong>
                        </li>
						<?php
						}
						?>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
</div>

<script>
$(document).ready(function() {

  var navbarNotificationContainer = $('#navbarNotificationContainer');
  var showAllNotificationContainer = $('#showAllNotificationContainer');
  var showAllNotificationButton = $('#showAllNotificationButton');
  var unFinishNotificaiton = $('#unFinishNotificaiton');
  var dataNotification = {};

  $.getNotification = function getNotification(){
    $.ajax({
      url: "<?=site_url('NotificationController/getall')?>",
      success: (data) => {
        json = JSON.parse(data);
        dataNotification = json['notification'];
        $.renderNavbarNotification(dataNotification);
      },
      error: () => {}
    });
  }
  $.getNotification();

  $.renderNavbarNotification = function renderNavbarNotification(data){
    if(data == null || typeof data != "object"){
      console.log("Notification::UNKNOWN DATA");
      return;
    }

    var finish = 0;
    Object.keys(data).forEach((k) => {
      var n = data[k];
      if(parseInt(n['finish']) != 0) return;
      var notifThumbnail = '';
      var notification = '';
      switch(n['type']){
        case 'REQUEST_ANGGOTA':
          notifThumbnail = `<i class="fa fa-plus fa-2x text-primary"></i>`;
          notification = `<strong>${n['nama_from']}</strong> mengundang kamu masuk jadi anggota <strong>${capFirstLetter(n['subject'])}</strong>`;
          break;
        case 'CONFIRM_ANGGOTA':
          notifThumbnail = `<i class="fa fa-check fa-2x text-navy"></i>`;
          notification = `<strong>${n['nama_from']}</strong> menerima permintaan menjadi anggota <strong>${capFirstLetter(n['subject'])}</strong>`;
          break;
        case 'REQUEST_REVIEWER':
          notifThumbnail = `<i class="fa fa-plus fa-2x text-primary"></i>`;
          notification = `<strong>${n['nama_from']}</strong> menunjuk kamu jadi reviewer <strong>${capFirstLetter(n['subject'])}</strong>`;
          break;
        case 'CONFIRM_REVIEWER':
          notifThumbnail = `<i class="fa fa-check fa-2x text-navy"></i>`;
          notification = `<strong>${n['nama_from']}</strong> menerima permintaan menjadi reviewer <strong>${capFirstLetter(n['subject'])}</strong>`;
      }
      var renderNotification = `
        <li>
          <a style="padding:0px" href="<?=site_url('NotificationController/get/')?>${k}"> 
            <div class="dropdown-messages-box"> 
              <span class="dropdown-item float-left">
                ${notifThumbnail}
              </span>
              <div class="media-body" style="line-height: 1.5">
                ${notification} <br>
                <small class="text-muted">${n['tanggal_entri'].substring(0, 16)}</small>
              </div>
            </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
      `;
      showAllNotificationContainer.before(renderNotification);
      finish += parseInt(n['finish']) == 0 ? 1 : 0;
    });
    unFinishNotificaiton.html(finish);
  }
});
</script>