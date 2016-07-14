<!-- Main content -->			
<!-- Title area -->
<div class="titleArea clearfix">
	<div class="wrapper col-md-12">
		<div class="pageTitle">
			<h5>Địa điểm</h5>
			<span><?php echo $title;?></span>
		</div>
		<div class="horControlB menu_action">
			<ul>
				<li>
					<a href="<?php echo base_url('admin/provincial/create');?>">
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

	<?php if($message){$this->load->view('admin/message',$message);} ?>
	<div class="widget">
		<div class="title clearfix">
			<span class="titleIcon"><img src="<?php echo base_url();?>public/admin/images/icons/tableArrows.png" /></span>
			<h6>Danh sách tỉnh thành</h6>
			
		 	<div class="num f12">Tổng số: <b><?php echo $total;?></b></div>
		</div>
		<div class="table-responsive">
			<table class="table sTable mTable myTable" id="checkAll">
				<thead>
					<tr>
						<td>STT</td>
						<td>Mã số</td>
						<td>Tên tỉnh</td>
						<td>Hành động</td>
					</tr>
				</thead>
	 			<tfoot class="auto_check_pages">
					<tr>
						<td colspan="9">
						    <div class='pagination'>
						    	<?php
						    		echo $this->pagination->create_links();
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
				    <tr class='row_20'>
				    	<td class="textC"><?php echo $i;?></td>
						<td class="textC"><?php echo $row->provincial_id;?></td>
						<td class="textC"><?php echo $row->provincial_name;?></td>
						<td class="textC">
							<a href="<?php echo base_url('admin/provincial/edit/'.$row->provincial_id);?>" class="lightbox" title="edit">
								<img src="<?php echo base_url();?>public/admin/images/icons/color/pencil.png" />
							</a>
							&nbsp;
							<a href="<?php echo base_url('admin/provincial/delete/'.$row->provincial_id);?>" class="lightbox" title="delete" onclick="return confirm('Bạn có muốn xóa?');">
								<img src="<?php echo base_url();?>public/admin/images/icons/color/uninstall.png" />
							</a>
						</td>
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
