<div class="titleArea clearfix">
	<div class="wrapper clearfix col-md-12">
		<div class="pageTitle">
			<h5>Quản lý phòng</h5>
			<span><?php echo $title;?></span>
		</div>
		<div class="horControlB menu_action">
			<ul>
				<li>
					<a href="product/add.html">
						<img src="<?php echo base_url();?>public/admin/images/icons/control/16/add.png" />
						<span>Thêm mới</span>
					</a>
				</li>
			
				<li>
					<a href="product/?feature=1.html">
						<img src="<?php echo base_url();?>public/admin/images/icons/control/16/feature.png" />
						<span>Tiêu biểu</span>
					</a>
				</li>

				<li>
					<a href="product.html">
						<img src="<?php echo base_url();?>public/admin/images/icons/control/16/list.png" />
						<span>Danh sách</span>
					</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<div class="line"></div>
<div id="step" class="clearfix">
	<div class="step-item">
		<img src="<?php echo base_url();?>public/admin/images/step-3.png" alt="step-3">
		<ul>
			<li>Địa chỉ</li>
			<li>Giá</li>
			<li class="active">Hình ảnh</li>
		</ul>
	</div>
</div>
<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper col-md-12  clearfix content">
	<form class="form" id="post_photo" name="post_photo" action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
			    <div class="title">
					<img src="<?php echo base_url();?>public/admin/images/icons/dark/add.png" class="titleIcon" />
					<h6><?php echo $title;?></h6>
				</div>								
				<div class="tab_container tab-content">
				    <div id='tab1' class="tab_content pd0 tab-pane active" role="tabpanel">
						

						<div class="panel panel-default info-post clearfix">
						  	<div class="panel-heading">Ảnh kèm theo</div>
						  	<div class="panel-body">
						  		<p class="info-guide">Ảnh không được nặng quá 4MB với kích thước chuẩn là 662pixels x 400 pixels</p>
								<div class="formRow">
									<ul class="block-up">
										<li id="btn-up">
											<!-- <div class="btn btn-default" >
												<span class="glyphicon glyphicon-plus"></span>
											</div> -->
											<input type="file" id="up-input" name="image_list[]" multiple="true">
										</li>
									</ul>
									<div class="clear"></div>
								</div>	
						  	</div>
						</div>
						<div class="formRow hide"></div>
					</div> 
        		</div><!-- End tab_container-->
        		<div class="formSubmit">
        			<div class="prev-step">
						<a href="<?php echo admin_url('post_room/post_price');?>" class="btn btn-default redB"><< Quay lại</a>
					</div>
					<div class="next-tep"> 
           				<input type="submit" name="submit" value="Tiếp tục >>" class="redB" />
           			</div>
           		</div>
        		<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>