<div class="titleArea clearfix">
	<div class="wrapper clearfix col-md-12">
		<div class="pageTitle">
			<h5>Tùy chọn</h5>
			<span><?php echo $title;?></span>
		</div>
		<div class="horControlB menu_action">
			<ul>
				<li>
					<a href="<?php echo admin_url('experience');?>">
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
	<form class="form" id="form" method="post">
		<fieldset>
			<div class="widget">
			    <div class="title">
					<img src="<?php echo base_url();?>public/admin/images/icons/dark/add.png" class="titleIcon" />
					<h6><?php echo $title;?></h6>
				</div>								
				<div class="tab_container tab-content">
				    <div id='tab1' class="tab_content pd0 tab-pane active" role="tabpanel">
				        <div class="formRow">
							<label class="formLeft" for="param_name">Trải nghiệm:<span class="req">*</span></label>
							<div class="formRight">
								<span class="oneTwo">
									<input type="text" name="experience_name" id="param_name" _autocheck="true" value="<?php echo set_value('experience_name');?>" />
								</span>
								<span name="name_autocheck" class="autocheck"></span>
								<div name="name_error" class="clear error"><?php echo form_error('experience_name');?></div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow">
							<label class="formLeft" for="param_name">Trải nghiệm (EN):<span class="req">*</span></label>
							<div class="formRight">
								<span class="oneTwo">
									<input type="text" name="experience_name_en" id="param_name" _autocheck="true" value="<?php echo set_value('experience_name_en');?>" />
								</span>
								<span name="name_autocheck" class="autocheck"></span>
								<div name="name_error" class="clear error"><?php echo form_error('experience_name_en');?></div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow">
							<label class="formLeft" for="param_name">Chọn icon:<span class="req">*</span></label>
							<div class="formRight">
								<span class="oneTwo">
									<ul class="icon-group" data-toggle="buttons">
									<?php
										if(isset($list_icon) && is_array($list_icon)){
											$active = '';
											$checked = '';
											$set_value = set_value('icon');
											foreach ($list_icon as $icon) {
												if($set_value && $set_value == $icon->icon_id){
													$active = 'active';
													$checked = 'checked';
												}else{
													$active = '';
													$checked = '';
												}
												
									?>
										<li class="btn icon-item <?php echo $active?>">
										    <input type="radio" autocomplete="off" name="icon" <?php echo $checked?> value="<?php echo $icon->icon_id;?>">
										    <i class="fa <?php echo $icon->icon_value;?>"></i>
										    <div class="tooltip icon-tooltip"><?php echo $icon->description;?></div>
										</li>
									<?php
											}
										}
									?>
									</ul>
									<p class="icon-info"><i class="fa fa-info-circle"></i> Chọn một icon thể hiện sự trải nghiệm này.</p>
								</span>
								<span name="name_autocheck" class="autocheck"></span>
								<div name="name_error" class="clear error"><?php echo form_error('icon');?></div>
							</div>
							<div class="clear"></div>
						</div>

						<div class="formRow">
							<label class="formLeft" for="param_des">Mô tả:</label>
							<div class="formRight">
								<span class="oneTwo">
									<textarea name="description" id="param_des" rows="4" cols=""><?php echo set_value("description");?></textarea>
								</span>
								<span name="sale_autocheck" class="autocheck"></span>
								<div name="sale_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>	
						<div class="formRow">
							<label class="formLeft" for="param_des">Mô tả (EN):</label>
							<div class="formRight">
								<span class="oneTwo">
									<textarea name="description_en" id="param_des" rows="4" cols=""><?php echo set_value("description_en");?></textarea>
								</span>
								<span name="sale_autocheck" class="autocheck"></span>
								<div name="sale_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>	

						<div class="formRow">
							<label class="formLeft" for="param_des">Trạng thái:</label>
							<div class="formRight">
								<span class="oneTwo">
									<label>
										<input type="checkbox" name="status"> Hiển thị
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
           			<input type="submit" value="Thêm mới" class="redB" />
           			<input type="reset" value="Hủy bỏ" class="basic" />
           		</div>
        		<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>