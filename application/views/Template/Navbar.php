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
                <div class="col-lg-12">
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
</div>