<?php
	$lang = get_lang();
?>
<!-- Main content -->			
<!-- Title area -->
<div class="titleArea clearfix">
	<div class="wrapper col-md-12">
		<div class="pageTitle">
			<h5>Tùy chọn</h5>
			<span><?php echo $title;?></span>
		</div>
		<div class="horControlB menu_action">
			<ul>
				<li>
					<a href="<?php echo base_url('admin/house_type/create');?>">
						<img src="<?php echo base_url();?>public/admin/images/icons/control/16/add.png">
						<span>Thêm mới</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<div class="line"></div>

<div class="wrapper col-md-12  clearfix content">

	<?php if(isset($message) && $message){$this->load->view('admin/message',$message);} ?>
	<div class="widget">
		<div class="title clearfix">
			<span class="titleIcon"><img src="<?php echo base_url();?>public/admin/images/icons/tableArrows.png" /></span>
			<h6><?php echo $title;?></h6>
			
		 	<div class="num f12">Tổng số: <b><?php echo $total;?></b></div>
		</div>
		<div class="table-responsive">
			<table class="table sTable mTable myTable" id="checkAll">
				<thead>
					<tr>
						<td><input type="checkbox" id="titleCheck" name="titleCheck" /></td>
						<td>STT</td>
						<td>Tiện nghi</td>
						<td>Mô tả</td>
						<td>Trạng thái</td>
						<td>Ngày tạo</td>
						<td>Hành động</td>
						<td>ID</td>
					</tr>
				</thead>
	 			<tfoot class="auto_check_pages">
					<tr>
						<td colspan="9">
							<div class="list_action itemActions">
								<a href="javascript:void(0)" onclick = "deleteAll()" id="submit" class="button blueB" url="<?php echo admin_url('house_type/deleteAll');?>">
									<span class="glyphicon glyphicon-trash"></span>
									&nbsp;
									<span style='color:white;'>Xóa chọn</span>
								</a>
						 	</div>
						    <div class='pagination'>
						    	<?php
						    		echo $pagination_link;
						    	?>
				            </div>
						</td>
					</tr>
				</tfoot>
				<tbody class="list_item">
					<?php
						$i = 1;
						foreach ($list as $row) {				
					?>
				    <tr class='row_<?php echo $row->house_type_id;?>'>
				    	<td class="textC">
				    		<input type="checkbox" name="id[]" value="<?php echo $row->house_type_id;?>" />
				    	</td>
				    	<td class="textC"><?php echo $i;?></td>
						<td class="textC">
							<?php echo ($lang['lang']=='vietnamese')?$row->house_type_name:$row->house_type_name_en;?>
						</td>
						<td class="textC">
							<?php echo ($lang['lang']=='vietnamese')?$row->description:$row->description_en;?>
						</td>
						<td class="textC" id="status">
							<?php
							if($row->status == 1){
							?>
								<a href="javascript:void(0)" onclick="status(<?php echo $row->house_type_id;?>)" class="lightbox" title="block">
									<img src="<?php echo base_url();?>public/admin/images/icons/color/tick.png" />
								</a>
							<?php
							}else{
							?>
								<a href="javascript:void(0)" onclick="status(<?php echo $row->house_type_id;?>)" class="lightbox" title="active">
									<img src="<?php echo base_url();?>public/admin/images/icons/color/block.png" />
								</a>
							<?php
							}
							?>
						</td>
						<td class="textC"><?php echo date('d/m/Y - H:i:s', strtotime($row->created));?></td>
						<td class="textC">
							<a href="<?php echo admin_url('house_type/edit/'.$row->house_type_id);?>" class="lightbox" title="edit">
								<img src="<?php echo base_url();?>public/admin/images/icons/color/pencil.png" />
							</a>
							&nbsp;
							<a href="<?php echo admin_url('house_type/delete/'.$row->house_type_id);?>" class="lightbox" title="delete" onclick="return confirm('Bạn có muốn xóa?');">
								<img src="<?php echo base_url();?>public/admin/images/icons/color/uninstall.png" />
							</a>
						</td>
						<td class="textC"><?php echo $row->house_type_id;?></td>
					</tr>	
					<?php
						$i++;
					}
					?>								
				</tbody>								
			</table>
		</div>
	</div>
</div>
<script type="text/javascript">

	function status(id){
		var admin_url = "<?php echo admin_url();?>";
		var curUrl = window.location.href;
		$.ajax({
            url : admin_url+'/house_type/status',
            type : "post",
            dataType : "text",
            data : {
                 'id' : id,
            },
            success : function (){
            	$('.myTable').load(curUrl+' .myTable');
	            
            }
        });
        $(document).ajaxComplete(function() {
		    $("#titleCheck").change(function() {
                $("input:checkbox").prop('checked', $(this).prop("checked"));
            });
		});
	}


	function deleteAll(){
		var arrId = new Array();
		$('[name = "id[]"]:checked').each(function(){
			arrId.push($(this).val());
		});

		if(!arrId.length){
			confirm('Không có bản ghi được lựa chọn!');
			return false;
		}

		if(!confirm('Xóa các bản ghi đã chọn!')){
			return false;
		}

		var url = $('#submit').attr('url');
		
		$.ajax({
			url : url,
			type : 'POST',
			data : {'arrId':arrId},
			success : function(){
				$(arrId).each(function(id, val){
					$('tr.row_'+val).fadeOut();
				});
			}
		});
		return false;
	}
</script>