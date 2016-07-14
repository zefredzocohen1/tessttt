<?php
    // Lay du lieu tu adminLogin
    if($this->session->userdata('adminLogin')){
        $adminLogin = $this->session->userdata('adminLogin');
    }
?>
<div class="wrapper clearfix col-md-12">
    <div id="toggle-sidebar" class="visible-xs pull-left">
        <button class="btn btn-default ">
            <span class="glyphicon glyphicon-menu-hamburger"></span>
        </button>
    </div>
    <div class="welcome hidden-xs">
        <span><?php echo lang('hello');?>: <b><?php echo (isset($adminLogin))? $adminLogin['user_name'] : '';?></b></span>
        <span><a href="<?php echo base_url('admin/amenities/lang/english').'?redirect='.$_SERVER['PATH_INFO'];?>"><b>EN</b></a></span>
        <span><a href="<?php echo base_url('admin/amenities/lang/vietnamese').'?redirect='.$_SERVER['PATH_INFO'];?>"><b>VN</b></a></span>
    </div>
    <div class="userNav">
        <ul>
            <li>
                <a href="<?php echo admin_url('post_room/post');?>">
                    <img style="margin-top: 7px;" src="<?php echo base_url();?>public/admin/images/icons/light/create.png"/>
                    <span><?php echo lang('post news');?></span>
                </a>
            </li>
            <li>
                <a href="#" target="_blank">
                    <img style="margin-top:7px;" src="<?php echo base_url();?>public/admin/images/icons/light/home.png"/>
                    <span><?php echo lang('home');?></span>
                </a>
            </li>
            <!-- Logout -->
            <li>
                <a href="<?php echo admin_url('user/logout');?>">
                    <img src="<?php echo base_url();?>public/admin/images/icons/topnav/logout.png"/>
                    <span><?php echo lang('logout');?></span>
                </a>
            </li>
        </ul>
    </div>
</div>




