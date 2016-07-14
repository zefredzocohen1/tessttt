<!-- Main content -->
<!-- Title area -->
<div class="titleArea clearfix">
    <div class="wrapper clearfix col-md-12">
        <div class="pageTitle">
            <h5>Dánh sách phòng đã được đăng ký</h5>
            <span><?php echo isset($title)?$title:''; ?></span>
        </div>
        <div class="horControlB menu_action">
            <ul>
                <li>
                    <a href="<?php echo admin_url('post_room/post');?>">
                        <img src="<?php echo base_url();?>public/admin/images/icons/control/16/add.png"/>
                        <span>Đăng phòng</span>
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
            <h6><?php echo isset($title)?$title:'';?></h6>

            <div class="num f12">Tổng số: <b><?php echo isset($total)?$total:0;?></b></div>
        </div>
        <div class="table-responsive">
            <table class="table sTable mTable myTable" id="checkAll">
                <thead class="filter">
                <tr>
                    <td colspan="17">
                        <form class="form-inline form_filter form" method="get">

                            <table class="table-filter" cellpadding="0" cellspacing="0">
                                <tbody>
                                <tr>
                                    <td class="label-tit">
                                        <label for="post_room_name">Tên phòng</label>
                                    </td>
                                    <td class="item">
                                        <input name="post_room_name" value="<?php echo $this->input->get('post_room_name');?>" type="text"/>
                                    </td>
                                    <td class="label-tit">
                                        <label for="user_name">Tài khoản đăng</label>
                                    </td>
                                    <td class="item">
                                        <input name="user_name" value="<?php echo $this->input->get('user_name');?>" id="user_name" type="text"/>
                                    </td>
                                    
                                    <td colspan='2'>
                                        <input type="submit" class="button blueB" value="Lọc"/>
                                        <input type="reset" class="basic" value="Reset"
                                               onclick="window.location.href = '<?php echo admin_url('post_room');?>'; ">
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </form>
                    </td>
                </tr>
                </thead>
                <thead>
                    <tr>
                        <td>STT</td>
                        <td colspan="2">Bài đăng</td>
                        <td>Giá phòng</td>
                        <td>Người thuê phòng</td>
                        <td>Ngày nhận phòng</td>
                        <td>Ngày trả phòng</td>
                        <td>Số người ở</td>
                        <td>ID</td>
                    </tr>
                </thead>
                <tfoot class="auto_check_pages">
                    <tr>
                        <td colspan="17">
                            <div class='pagination'>
                                <?php echo isset($pagination_link)?$pagination_link:'';?>
                            </div>
                        </td>
                    </tr>
                </tfoot>
                <tbody class="list_item">
                    <?php
                        if(isset($list)){
                            $i = 0;
                            foreach ($list as $row) {
                                $i++;
                    ?>
                    <tr class='row_20'>
                        <td class="textC"><?php echo $i;?></td>
                        <td class="textC img_room" >
                        	<a href="<?php echo base_url('room/room_detail/'.$row->post_room_id);?>" target = "_blank">
                        		<?php
                        			$img = json_decode($row->image_list);
                        		?>
                        		<img src="<?php echo $img['0']?>" width = "120px" height = "90px"/>
                        	</a>
                        </td>
                        <td class="textC" style="text-align: left;">
                        	<p class="room_name">
                            <a href = "<?php echo base_url('room/room_detail/'.$row->post_room_id);?>" target = "_blank"><?php echo $row->post_room_name;?></a>
                            </p>
                        </td>
                        <td class="textC price">
                        	<p class="price_vn price-item">
                        		<label>VND: <span><?php echo number_format($row->payment_type,0,",",".");?></span></label>
                        	</p>
                        	<p class="price_en price-item">
                        		<label>USD: <span><?php echo number_format($row->price_night_en,0,",",".");?></span></label>
                        	</p>
                        </td>
                        <td class="textC">
                            <p style="font-size: 14px;font-weight: 600"><?php echo $row->user_name; ?></p>
                        </td>
                        <td class="textC" id="status">
                             <p style="font-size: 14px;font-weight: 600"><?php echo $row->checkin; ?></p>
                        </td>
                        <td class="textC" id="status">
                             <p style="font-size: 14px;font-weight: 600"><?php echo $row->checkout; ?></p>
                        </td>
                        <td class="textC" id="status">
                             <p style="font-size: 14px;font-weight: 600"><?php echo $row->guests; ?></p>
                        </td>
                        <td class="textC"><?php echo $row->post_room_id; ?></td>
                    </tr>
                    <?php
                            }
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
            <p style="color:red;font-size: 14px;padding: 0px;"><span class="glyphicon glyphicon-trash"></span> Bạn có muốn xóa bài đăng này ?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">hủy</button>
                <a href="#" id="allow-Del" class="btn btn-primary">Xóa</a>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function status(id){
        var url = '<?php echo admin_url('post_room/status');?>';
        var urlCurrent = window.location.href;
        $.ajax({
            url: url, 
            type: "POST",
            data : { 'id'  :id },
            dataType: 'text',
            success: function(result){
                $(".myTable").load(urlCurrent + " .myTable");
            }
        });
    }

    function del(id){
        var url = '<?php echo admin_url();?>';
        var urlDel = url+'/post_room/delete/'+id;
        $('#allow-Del').attr('href', urlDel);
        $("#modal_del").modal("show");
    }
</script>