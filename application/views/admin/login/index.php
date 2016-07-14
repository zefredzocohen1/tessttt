<div class="loginWrapper clearfix">
    <div class="widget" id="admin_login">
        <div class="title clearfix">
            <img src="<?php echo base_url();?>public/admin/images/icons/dark/laptop.png" alt="" class="titleIcon"/>
            <h6>Đăng nhập</h6>
        </div>

        <form class="form" id="form_login" action="" method="post">
            <fieldset>
                <div class="formRow clearfix" style="color: red;"><?php echo form_error('login'); ?></div>
                <div class="formRow clearfix">
                    <label for="param_username">Tên đăng nhập:</label>
                    <div class="loginInput">
                        <input type="text" name="user_name" id="user_name" value="<?php echo set_value('user_name', '');?>"/>
                        
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="formRow clearfix">
                    <label for="param_password">Mật khẩu:</label>
                    <div class="loginInput">
                        <input type="password" name="password"  id="param_password" value="<?php echo set_value('password');?>"/>
                        
                    </div>
                    <div class="clear"></div>
                </div>
               
                <div class="loginControl">
                    <input type="submit" name="login" value="Đăng nhập" class="dredB logMeIn"/>
                    <div class="clear"></div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
         $("#form_login").validate({
            errorElement: "div",
            ignore: [],
            rules: {
                'user_name': {
                    required: true,
                },
                'password':{
                    required: true,
                }
            },
            messages: {
                'user_name': {
                    required: "(*) Bạn chưa nhập tài khoản",
                },
                'password':{
                    required: "(*) Bạn chưa nhập mật khẩu",
                }
            },
         });
    });
</script>