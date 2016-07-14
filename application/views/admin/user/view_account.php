<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>User</h5>
            <span><?php echo isset($title)?$title:''; ?></span>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="<?php echo admin_url('user/create');?>">
                        <img src="<?php echo base_url();?>/public/admin/images/icons/control/16/add.png"/>
                        <span>Thêm tài khoản</span>
                    </a>
                </li>
                <li>
                    <a href="product/?feature=1.html">
                        <img src="<?php echo base_url();?>/public/admin/images/icons/control/16/feature.png" />
                        <span>Chỉnh sửa tài khoản</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo admin_url('user/index');?>">
                        <img src="<?php echo base_url();?>/public/admin/images/icons/control/16/list.png" />
                        <span>Danh sách</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="line"></div>
<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper col-md-12  clearfix content">
    <div class="widget">
        <div class="title clearfix">
            <span class="titleIcon"><img src="<?php echo base_url();?>public/admin/images/icons/tableArrows.png"/></span>
            <h6><?php echo isset($title)?$title:'';?></h6>
        </div>
        <div class="tab_container">
            <div id='view-account' class="tab_content">
                <div class="col-md-3 col-xs-4 avata" id="avata">
                    <div class="avata-img">
                        <img src="<?php echo base_url() ?>/public/admin/images/no_avatar.png" class="img-responsive">
                    </div>
                </div>
                <div class="col-md-9 col-xs-8 info-account">
                    <div class="title-acc">Xin chào, Tôi là: Bùi Ngọc Hưởng</div>
                    <p class="since">Là thành viên từ tháng 4 - 2016</p>
                    <p class="gender-acc">Giới tính : Nam</p>
                    <p class="address">Nơi làm việc: Đội Cấn - Hà Nội</p>
                    <div class="des-acc">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat error, hic itaque distinctio autem voluptatibus provident tempora suscipit non vero sed molestias totam! Temporibus nam quae dignissimos laudantium optio. Soluta.
                    </div>
                    <div class="edit-acc">
                        <a href="<?php echo admin_url("");?>" class="btn btn-default">Chỉnh sửa trang cá nhân</a>
                    </div>
                </div>
                <div class="formRow clearfix">
                    <div class="title">
                        <span class="titleIcon"><img src="<?php echo base_url();?>public/admin/images/icons/tableArrows.png"/></span>
                        <h6>Bài đăng của tôi</h6>

                        <div class="num f12">Tổng số: <b><?php echo isset($total)?$total:0;?></b></div>
                    </div>
                    <div class="table-responsive">
                </div>
            </div>
        </div>
    </div>
</div>