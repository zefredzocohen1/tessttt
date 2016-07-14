<?php
	if($this->session->userdata('post_price') !== NULL){
		$post_price = $this->session->userdata('post_price');
		// pre($post_price);
	}
?>

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
		<img src="<?php echo base_url();?>public/admin/images/step-2.png" alt="step-2">
		<ul>
			<li>Địa chỉ</li>
			<li class="active">Giá</li>
			<li>Hình ảnh</li>
		</ul>
	</div>
</div>
<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper col-md-12  clearfix content">
	<form class="form" id="post_price" name="post_price" action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
			    <div class="title">
					<img src="<?php echo base_url();?>public/admin/images/icons/dark/add.png" class="titleIcon" />
					<h6><?php echo $title;?></h6>
				</div>								
				<div class="tab_container tab-content">
				    <div id='tab1' class="tab_content pd0 tab-pane active" role="tabpanel">
						<!-- price basic -->
						<div class="panel panel-default info-post clearfix">
						  	<div class="panel-heading">Mức giá cơ bản</div>
						  	<div class="panel-body">
						  		<p class="info-guide">Đây là giá cơ sở tính theo đêm cho danh sách của bạn. Nếu không có các tùy chỉnh giá khác, giá cơ bản này sẽ được áp dụng cho tất cả các ngày trong lịch của bạn.</p>
								<div class="formRow">
									<label class="formLeft">Giá theo đêm:<span class="req">*</span></label>
									<div class="formRight">
										<div class="left">
											<label for="name">
												<span>VNĐ</span>
												<input type="text" class="required digits mw150" id="price_night_vn" name="price_night_vn" value="<?php echo (isset($post_price))?$post_price['price_night_vn']: set_value('price_night_vn') ;?>">
											</label>
											<label for="name">
												<span>USD</span>
												<input type="text" class="required digits mw150" id="price_night_en" name="price_night_en" value="<?php echo (isset($post_price))?$post_price['price_night_en']: set_value('price_night_en') ;?>">
											</label>
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>	

								<div class="formRow">
									<label class="formLeft">Giá cuối tuần:</label>
									<div class="formRight">
										<div class="left">
											<label for="">
												<span>VNĐ</span>
												<input type="text" class="digits mw150"  id="price_lastweek_vn" name="price_lastweek_vn" value="<?php echo (isset($post_price))?$post_price['price_lastweek_vn']: set_value('price_lastweek_vn') ;?>">
											</label>
											<label for="">
												<span>USD</span>
												<input type="text" class="digits mw150"  id="price_lastweek_en" name="price_lastweek_en" value="<?php echo (isset($post_price))?$post_price['price_lastweek_en']: set_value('price_lastweek_en') ;?>">
											</label>
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>	
								<div class="formRow">
									<label class="formLeft">Thiết lập ngày cuối tuần:</label>
									<div class="formRight">
										<div class="left clearfix">
										<?php
											$arrValue = array('6','7','8');
											$day = '';
											if(isset($post_price)){
												$set_last_week = explode(',', $post_price['type_last_week']);
											}
											foreach ($arrValue as $value) {
												$checked = '';
												$day = ($value == '8')?'Chủ nhật':'Thứ '.$value;
												if(isset($set_last_week)){
													foreach ($set_last_week as $item) {
														if($item == $value){
															$checked = 'checked';
														}
													}
												}
										?>
											<label>
											    <input type="checkbox" name="type_last_week[]" value="<?php echo $value;?>" <?php echo $checked;?>> <?php echo $day?>
											</label>
											&nbsp;&nbsp;
										<?php 
											}
										?>
										</div>
										<div name="image_error" class="clear error" ></div>
										<div for="type_last_week[]" generated="true" class="error"></div>
									</div>
									<div class="clear"></div>
								</div>
						  	</div>
						</div><!-- end price basic -->

						<!-- price long time -->
						<div class="panel panel-default info-post clearfix">
						  	<div class="panel-heading">Định giá dài hạn</div>
						  	<div class="panel-body">
						  		<p class="info-guide">Nếu bạn muốn có giá theo tuần hoặc theo tháng dành cho lưu trú dài hạn, bạn có thể sử dụng tùy chọn này. Thông thường chủ khách sạn sử dụng tùy chọn này để cung cấp giảm giá cho đợt lưu trú dài hơn.</p>
								<div class="formRow">
									<label class="formLeft">Giá theo tuần:</label>
									<div class="formRight">
										<div class="left">
											<label for="name">
												<span>VNĐ</span>
												<input type="text" class="digits mw150" id="price_week_vn" name="price_week_vn" value="<?php echo (isset($post_price))?$post_price['price_week_vn']:set_value('price_week_vn');?>">
											</label>
											<label for="name">
												<span>USD</span>
												<input type="text" class="digits mw150" id="price_week_en" name="price_week_en" value="<?php echo (isset($post_price))?$post_price['price_week_en']:set_value('price_week_en');?>">
											</label>
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>	

								<div class="formRow">
									<label class="formLeft">Giá theo tháng:</label>
									<div class="formRight">
										<div class="left">
											<label for="">
												<span>VNĐ</span>
												<input type="text" class="digits mw150"  id="price_month_vn" name="price_month_vn" value="<?php echo (isset($post_price))?$post_price['price_month_vn']:set_value('price_month_vn');?>">
											</label>
											<label for="">
												<span>USD</span>
												<input type="text" class="digits mw150" id="price_month_en" name="price_month_en" value="<?php echo (isset($post_price))?$post_price['price_month_en']:set_value('price_month_en');?>">
											</label>
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
						  	</div>
						</div><!-- end long time -->
						<!-- deposit -->
						<div class="panel panel-default info-post clearfix">
						  	<div class="panel-heading">Tiền đặt cọc (Tùy chọn)</div>
						  	<div class="panel-body">
						  		<p class="info-guide">Số tiền này được thu khi nhận phòng và trả lại khi trả phòng để bảo vệ các thiệt hại hoặc các vật dụng bị mất.</p>
						  		<p class="info-guide">Lưu ý: Tiền đặt cọc (nếu có) chỉ được thu vào thời điểm nhận phòng. Chúng tôi KHÔNG xử lý khoản thanh toán này hoặc bồi hoàn tiền đặt cọc này.</p>
								<div class="formRow">
									<label class="formLeft">Tiền đặt cọc:</label>
									<div class="formRight">
										<div class="left">
											<label for="name">
												<span>VNĐ</span>
												<input type="text" class="digits mw150" id="deposit_vn" name="deposit_vn" value="<?php echo (isset($post_price))?$post_price['deposit_vn']:set_value('deposit_vn');?>">
											</label>
											<label for="name">
												<span>USD</span>
												<input type="text" class="digits mw150" id="deposit_en" name="deposit_en" value="<?php echo (isset($post_price))?$post_price['deposit_en']:set_value('deposit_en');?>">
											</label>
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
						  	</div>
						</div><!-- end deposit -->
						<!-- clearning fee -->
						<div class="panel panel-default info-post clearfix">
						  	<div class="panel-heading">Chi phí bổ sung</div>
						  	<div class="panel-body">
								<div class="formRow">
									<label class="formLeft">Phí cho mỗi khách thêm:</label>
									<div class="formRight">
										<div class="left clearfix">
											<label for="name">
												<span>VNĐ</span>
												<input type="text" class="digits mw150" id="price_guest_more_vn" name="price_guest_more_vn" value="<?php echo (isset($post_price))?$post_price['price_guest_more_vn']:set_value('price_guest_more_vn');?>">
											</label>
											<label for="name">
												<span>USD</span>
												<input type="text" class="digits mw150" id="price_guest_more_en" name="price_guest_more_en" value="<?php echo (isset($post_price))?$post_price['price_guest_more_en']:set_value('price_guest_more_en');?>">
											</label>
										</div>
										<div name="image_error" class="clear error"></div>
										<p class="info-guide" style="margin-top: 10px;">Một đêm cho một khách sau số khách tối đa!</p>
									</div>
									<div class="clear"></div>
								</div>
								
								<div class="formRow">
									<label class="formLeft">Phí dọn dẹp:</label>
									<div class="formRight">
										<div class="left clearfix">
											<label for="name">
												<span>VNĐ</span>
												<input type="text" class="digits mw150" id="clearning_fee_vn" name="clearning_fee_vn" value="<?php echo (isset($post_price))?$post_price['clearning_fee_vn']:set_value('clearning_fee_vn');?>">
											</label>
											<label for="name">
												<span>USD</span>
												<input type="text" class="digits mw150" id="clearning_fee_en" name="clearning_fee_en" value="<?php echo (isset($post_price))?$post_price['clearning_fee_en']:set_value('clearning_fee_en');?>">
											</label>
										</div>
										<div class="clearfix">
										<?php
											$arr_clearning_type = array('0'=>'Một lần ở','1'=>'Một ngày/đêm');
											if(isset($post_price)){
												$clearning_type = $post_price['clearning_type'];
											}
											$checked = '';
											foreach ($arr_clearning_type as $key => $value) {
												if(isset($clearning_type) && $clearning_type == $key){
													$checked = 'checked';
												}else{
													$checked = '';
												}
										?>
											<label>
												<input type="radio" name="clearning_type" value="<?php echo $key;?>" <?php echo $checked;?>> <?php echo $value;?> 
											</label>
										<?php
											}
										?>
										</div>
										<div name="image_error" class="clear error"></div>
										<div for="clearning_type" generated="true" class="error"></div>
									</div>
									<div class="clear"></div>
								</div>
						  	</div>
						</div><!-- end clearning fee -->
						<!-- deposit -->
						<div class="panel panel-default info-post clearfix">
						  	<div class="panel-heading">Chính sách hủy bỏ</div>
						  	<div class="panel-body">
								<div class="formRow">
									<label class="formLeft">Chính sách hủy bỏ:</label>
									<div class="formRight">
										<div class="left">	
											<input type="text" class="" id="cancel_police" name="cancel_police" value="<?php echo (isset($post_price))?$post_price['cancel_police']:set_value('cancel_police');?>">
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>

								<div class="formRow">
									<label class="formLeft">Quy định:</label>
									<div class="formRight">
										<div class="left">	
											<textarea rows="5" name="regulations"><?php echo (isset($post_price))?$post_price['regulations']:set_value('regulations');?></textarea>
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
						  	</div>
						</div><!-- end deposit -->
						<div class="formRow hide"></div>
					</div> 
        		</div><!-- End tab_container-->
        		<div class="formSubmit">
        			<div class="prev-step">
						<a href="<?php echo admin_url('post_room/post');?>" class="btn btn-default redB"><< Quay lại</a>
					</div>
					<div class="next-tep"> 
           				<input type="submit" name="" value="Tiếp tục >>" class="redB" />
           			</div>
           		</div>
        		<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#post_price").validate({
		 	errorElement: "div",
		 	ignore: [],
	 		rules: {
	            'set_last_week[]': {
		            required: {
		                depends: function(element){
		                	if ($("#price_lastweek_vn").val() == '' && $("#price_lastweek_en").val() == ''){
		                		return false;
		                	}else{
		                		return true;
		                	}
		                }
		            }
	            },
	            'clearning_type':{
	            	required: {
		                depends: function(element){
		                	if ($("#clearning_fee_vn").val() == '' && $("#clearning_fee_en").val() == ''){
		                		return false;
		                	}else{
		                		return true;
		                	}
		                }
		            }
	            }
        	},
        	messages: {
	            'set_last_week[]': {
	                required: "Vui lòng chọn ngày để thiết lập giá cuối tuần.",
	            },
	            'clearning_type': {
	                required: "Vui lòng chọn thiết lập cho dịch vụ.",
	            },
	        },
		});
	})
</script>