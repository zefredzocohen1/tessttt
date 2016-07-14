<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>Tùy chọn </h5>
            <span><?php echo $title;?></span>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="<?php echo admin_url('user/index');?>">
                        <img src="<?php echo base_url();?>public/admin/images/icons/control/16/list.png" />
                        <span>Danh sách</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="line"></div>
<div class="wrapper col-md-12  clearfix content">
    <form class="form" name="create_user" id="form" method="post">
        <fieldset>
            <div class="widget">
                <div class="title">
                    <img src="<?php echo base_url();?>public/admin/images/icons/dark/add.png" class="titleIcon" />
                    <h6><?php echo $title;?></h6>
                </div>                              
                <div class="tab_container tab-content">
                    <div id='tab1' class="tab_content pd0 tab-pane active" role="tabpanel">
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Họ:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" name="last_name" id="last_name" _autocheck="true" value="<?php echo (set_value('last_name'))?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('last_name');?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tên:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" name="first_name" id="first_name" _autocheck="true" value="<?php echo set_value('first_name');?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('first_name');?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Cơ quan - Tổ chức:</label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" name="ozganzation" id="ozganzation" _autocheck="true" value="<?php echo set_value('first_name');?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('ozganzation');?></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="formRow">
                            <label class="formLeft" for="param_name">Tên đăng nhập:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="text" name="user_name" id="user_name" _autocheck="true" value="<?php echo set_value('user_name');?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('user_name');?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="param_name">Mật khẩu:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="password" name="password" id="param_name" _autocheck="true" value="<?php echo set_value('password');?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('password');?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow">
                            <label class="formLeft" for="param_name">Nhập lại mật khẩu:<span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="password" name="password_comfirm" id="password_comfirm" _autocheck="true" value="<?php echo set_value('password_comfirm');?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('password_comfirm');?></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                         <div class="formRow">
                            <label class="formLeft" for="param_des">Email: <span class="req">*</span></label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <input type="email" name="email" value="<?php echo set_value('email'); ?>">
                                </span>
                                <span name="sale_autocheck" class="autocheck"></span>
                                <div name="sale_error" class="clear error"><?php echo form_error('email');?></div>
                            </div>
                            <div class="clear"></div>
                        </div>  

                        <div class="formRow">
                            <label class="formLeft" for="param_des">Vai trò:</label>
                            <div class="formRight">
                                <span class="oneTwo">
                                    <label>
                                        <select class="w150" name="role_id">
                                        <?php
                                            if(isset($list_role)){
                                                foreach ($list_role as $role) {

                                                    echo '<option value = "'.$role->role_id.'" '.set_select('role_id', $role->role_id).'>'.$role->role_name.'</option>';
                                                }
                                            }
                                        ?>
                                        </select>
                                    </label>
                                </span>
                                <span name="sale_autocheck" class="autocheck"></span>
                                <div name="sale_error" class="clear error"></div>
                            </div>
                            <div class="clear"></div>
                        </div>

                        <div class="formRow hide"></div>
                    </div> 
                </div><!-- End tab_container-->
                <div class="formSubmit">
                    <input type="submit" value="Đăng kí" class="redB" />
                    <input type="reset" value="Hủy bỏ" class="basic" />
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>