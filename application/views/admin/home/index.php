<!-- Main content -->
<!-- Title area -->
<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>Home</h5>
            <span><?php echo isset($title)?$title:''; ?></span>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="<?php echo admin_url('user/create');?>">
                        <img src="<?php echo base_url();?>public/admin/images/icons/control/16/add.png"/>
                        <span>Thêm tài khoản</span>
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
    <?php if(isset($message) && $message){$this->load->view('admin/message',$message);} ?>
    <div class="widget">
        <div class="title">
            <span class="titleIcon"><img src="<?php echo base_url();?>public/admin/images/icons/tableArrows.png"/></span>
            <h6>Thông tin đăng nhập</h6>

            <div class="num f12">Tổng số: <b>1</b></div>
        </div>
        <div class="table-responsive">
            <table class="table sTable mTable myTable" id="checkAll">
                <thead>
                    <tr>
                        <td>Tên đăng nhập</td>
                        <td>Email</td>
                        <td>Số điện thoại</td>
                        <td>Tổ chức</td>
                        <td>Vai trò</td>
                        <td>trạng thái</td>
                        <td>Created</td>
                        <td>Hành động</td>
                        <td>ID</td>
                    </tr>
                </thead>
                <tfoot class="auto_check_pages">
                    <tr>
                        <td colspan="17">
                            <div class='pagination'>
                                
                            </div>
                        </td>
                    </tr>
                </tfoot>
                <tbody class="list_item">
                    <?php
                        if(isset($admin_info)){
                    ?>
                    <tr class='row_20'>
                        <td class="textC" >
                            <a href="#" title="<?php echo $admin_info->last_name.' '.$admin_info->first_name;?>">
                                <?php echo $admin_info->user_name;?>
                            </a>
                        </td>
                        <td class="textC"><?php echo $admin_info->email;?></td>
                        <td class="textC"><?php echo $admin_info->phone; ?></td>
                        <td class="textC"><?php echo $admin_info->ozganzation; ?></td>
                        <td class="textC"><?php echo $admin_info->role_name;?></td>
                        <td class="textC" id="status">
                            <?php
                            if($admin_info->status == 1){
                            ?>
                                
                                <img src="<?php echo base_url();?>public/admin/images/icons/color/tick.png" />
                               
                            <?php
                            }else{
                            ?>
                                <img src="<?php echo base_url();?>public/admin/images/icons/color/block.png" />
                                
                            <?php
                            }
                            ?>
                        </td>
                        <td class="textC"><?php echo date('d-m-Y - H:i:s',strtotime($admin_info->created));?></td>
                        <td class="textC">
                            <a href="<?php echo admin_url('user/edit/'.$admin_info->user_id);?>" class="lightbox" title="edit">
                                <img src="<?php echo base_url();?>public/admin/images/icons/color/pencil.png" />
                            </a>
                        </td>
                        <td class="textC"><?php echo $admin_info->user_id; ?></td>
                    </tr>
                    <?php
                        }  
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="clear mt30"></div>
</div>
<div class="modal fade bs-example-modal-sm" id="modal_del" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Xóa</h4>
            </div>
            <div class="modal-body">
            <p style="color:red;font-size: 14px;padding: 0px;"><span class="glyphicon glyphicon-trash"></span> Bạn có muốn xóa tài khoản ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">hủy</button>
                <a href="#" id="allow-Del" class="btn btn-primary">Xóa</a>
            </div>
        </div>
    </div>
</div>