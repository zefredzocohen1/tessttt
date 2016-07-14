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
                        <span>Tiêu biểu</span>
                    </a>
                </li>
                <li>
                    <a href="product.html">
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
        <div class="title">
            <span class="titleIcon"><img src="<?php echo base_url();?>public/admin/images/icons/tableArrows.png"/></span>
            <h6><?php echo isset($title)?$title:'';?></h6>
        </div>
        <div class="tab_container tab-content">
            <div id='tab1' class="tab_content pd0 tab-pane active" role="tabpanel">
                <form class="form" id="edit_account" name="edit_account" action="" method="post" enctype="multipart/form-data">
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Ảnh đại diện:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <img src="<?php echo base_url()?>/public/admin/images/no_avatar.jpg" width = "100px" height = "100px">
                            </span>
                            <p class="oneTwo">
                                <input type="file" name="avata" id="avata" _autocheck="true" />
                            </p>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"><?php echo form_error('last_name');?></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Họ:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <input type="text" name="last_name" id="last_name" value="" class="mw200" />
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"><?php echo form_error('last_name');?></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Tên:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <input type="text" name="first_name" id="first_name" class="mw200"/>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Email:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <input type="text" name="first_name" id="first_name" class="mw200"/>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Số điện thoại:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <input type="text" name="first_name" id="first_name" class="mw200"/>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Mô tả về bạn:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <textarea rows="5" class="mw300" name="description"></textarea>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Giới tính:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <label>
                                    <input type="radio" name="gender"> Nam
                                </label>
                                <label>
                                    <input type="radio" name="gender"> Nữ
                                </label>
                                <label>
                                    <input type="radio" name="gender"> Khác
                                </label>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Ngày sinh:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <input type="text" name="birthday" class="mw200">
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Địa chỉ:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <textarea rows="3" class="mw300" name="address"></textarea>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Nơi làm việc:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <textarea rows="3" class="mw300" name="workplace"></textarea>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="formRow">
                        <label class="formLeft" for="param_name">Quốc gia:</label>
                        <div class="formRight">
                            <span class="oneTwo">
                                <select name="country" class="w150">
                                    <option>Việt Nam</option>
                                </select>
                            </span>
                            <span name="name_autocheck" class="autocheck"></span>
                            <div name="name_error" class="clear error"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </form>
            </div>
        </div> 
    </div>
</div>