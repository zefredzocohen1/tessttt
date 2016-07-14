<script type="text/javascript" src="<?php echo base_url();?>public/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url().'public/admin/js/jquery.toaster.js'?>"></script>

<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>Cấu hình hệ thống</h5>
            <span><?php echo isset($title)?$title:''; ?></span>
        </div>
        <div id="message"></div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                </li>
            </ul>
        </div>
    </div>
</div>

<div class="wrapper col-md-12  clearfix content">
    <form id="form-email" method="post" class="form-horizontal" action="<?php echo base_url().'admin/emails/save/'.$email->email_id;?>" role = "form">
        <div class="panel ">
          <div class="panel-heading panel-piluku">
            <h3 class="panel-title"><?php echo lang('info_resort');?></h3>
          </div>
            <div class="panel-body">      
                <div class="form-group">
                    <label for="sel1">sửa tiêu đề email: </label>
                    <input name="title_email" id="sel1" value="<?php echo $email->email_title?>" type="text" class="form-control"/>
                </div>
                <div class="form-group">
                    <label for="edit_email"><?php echo 'sửa nội dung email'?></label>
                  <?php echo form_textarea(array(
                        'name'=>'edit_email',
                        'id'=>'edit_email',
                        'class' => 'ckeditor form-control',
                        'rows'=>"5",
                        'value'=>$email->description)
                    );?>
                    
                </div>
                <div class="form-group">
                </div>
                <div class="form-group">
                    <select name ="type_email" style="width: 97%" class="form-control">
                      <?php foreach ($email_template as $key => $value){?>
                        <option value="<?php echo $value->email_template_id?>"><?php echo $value->name?></option>
                      <?php }?>
                    </select>
                </div>
            </div>
            <div class="panel-footer">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right" value="submit">Thực hiện</button>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            CKEDITOR.replace("edit_email");
        </script>
        
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $(document).on('submit', '#form-email', function(){
        var data = $(this).serialize();
        $.ajax({
           type : 'POST',
           url  : $(this).attr('action'),
           data : data,
           success :  function(data){
               $.toaster('', data.message, data.title);
               setTimeout(function(){
               window.location.href = "<?php echo base_url().'admin/emails'?>";
               },2500)
           },
           dataType:'JSON',
        });
        return false;
        });
    })
</script>
