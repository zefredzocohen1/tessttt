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
                                    <input type="text" name="last_name" id="last_name" _autocheck="true" value="<?php echo (set_value('last_name'))?set_value('last_name'):$info->last_name;?>" />
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
                                    <input type="text" name="first_name" id="first_name" _autocheck="true" value="<?php echo (set_value('first_name'))?set_value('first_name'):$info->first_name;?>" />
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
                                    <input type="text" name="ozganzation" id="ozganzation" _autocheck="true" value="<?php echo (set_value('ozganzation'))?set_value('ozganzation'):$info->ozganzation;?>" />
                                </span>
                                <span name="name_autocheck" class="autocheck"></span>
                                <div name="name_error" class="clear error"><?php echo form_error('ozganzation');?></div>
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
                                            	$selected = '';
                                                foreach ($list_role as $role) {
                                                	if(isset($info) && $role->role_id == $info->role_id){
                                                		$selected = 'selected';
                                                	}else{
                                                		$selected = '';
                                                	}

                                                    echo '<option value = "'.$role->role_id.'" '.$selected.'>'.$role->role_name.'</option>';
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
                    <input type="submit" value="Cập nhật" class="redB" />
                    <input type="reset" value="Hủy bỏ" class="basic" onclick="if(confirm('Bạn muốn hủy cập nhật và quay lại trang danh sách')){window.location='<?php echo admin_url('user');?>';}" />
                </div>
                <div class="clear"></div>
            </div>
        </fieldset>
    </form>
</div>