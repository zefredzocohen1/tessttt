<?php
	if($this->session->userdata('post_info') !== NULL){
		$post_info =  $this->session->userdata('post_info');
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
		<img src="<?php echo base_url();?>public/admin/images/step-1.png" alt="step-1">
		<ul>
			<li class="active">Địa chỉ</li>
			<li>Giá</li>
			<li>Hình ảnh</li>
		</ul>
	</div>
</div>
<!-- Message -->
<!-- Main content wrapper -->
<div class="wrapper col-md-12  clearfix content">
	<form class="form" id="post_info" name="post_info" action="" method="post" enctype="multipart/form-data">
		<fieldset>
			<div class="widget">
			    <div class="title">
					<img src="<?php echo base_url();?>public/admin/images/icons/dark/add.png" class="titleIcon" />
					<h6><?php echo $title;?></h6>
				</div>								
				<div class="tab_container tab-content">
				    <div id='tab1' class="tab_content pd0 tab-pane active" role="tabpanel">
				        <div class="formRow">
							<label class="formLeft" for="address_detail">Địa chỉ của bạn:<span class="req">*</span></label>
							<div class="formRight">
								<span class="oneTwo">

									<input type="text" name="address_detail" id="autocomplete" value="<?php echo (isset($post_info))?$post_info['address']['address_detail']:set_value('address_detail');?>" _autocheck="true"  placeholder="Nhập địa chỉ ... " />

									<input name="lat" id="lat" value="<?php echo (isset($post_info))?$post_info['address']['lat']:set_value('lat');?>" type="hidden" />

									<input name="lng" id="lng" value="<?php echo (isset($post_info))?$post_info['address']['lng']:set_value('lng');?>" type="hidden" />
								</span>
								<span name="name_autocheck" class="autocheck"></span>
								<div name="name_error" class="clear error"></div>
							</div>
							<div class="clear"></div>
						</div>
						<!--  Address  -->
						<div class="formRow clearfix">
							<div class="col-md-6 col-xs-12 map-responsive map" id="map">
								<!--  Map here  -->
							</div>
							<div class="col-md-6 col-xs-12 info-f">
								<div class="formRow clearfix address-first">
								    <label for="address_street" class="col-sm-4 control-label">Địa chỉ 1:</label>
								    <div class="col-sm-8">
								      	<textarea placeholder="Tên đường" id="address_1" class="required"  name="address_street"><?php echo (isset($post_info))?$post_info['address']['address_street']:set_value('address_street'); ?></textarea>
								      	<div name="image_error" class="clear error"><?php echo form_error('address_street');?></div>
								    </div>
								</div>
								<div class="formRow clearfix">
								    <label for="address_2" class="col-sm-4 control-label">Địa chỉ 2:</label>
								    <div class="col-sm-8">
								      	<textarea placeholder="Khu du lịch, Căn hộ, tòa nhà, tầng, vv" name="address_2" id="address_2"><?php echo (isset($post_info))?$post_info['address']['address_2']:set_value('address_2'); ?></textarea>
								    </div>
								</div>
								<div class="formRow clearfix">
								    <label for="district" class="col-sm-4 control-label">Quận/Huyện:</label>
								    <div class="col-sm-8">

								      	<input type="text" name="district" class="required" placeholder="Quận/huyện" id="administrative_area_level_2" readonly="true" value="<?php echo (isset($post_info))?$post_info['address']['district']:set_value('district'); ?>">

								      	<div name="image_error" class="clear error"><?php echo form_error('district');?></div>
								    </div>
								</div>
								<div class="formRow clearfix">
								    <label for="provincial" class="col-sm-4 control-label">Tỉnh/Thành phố:</label>
								    <div class="col-sm-8">
								      	<input type="text" class="required" placeholder="Tỉnh/Thành phố" name="provincial" id = "administrative_area_level_1" readonly="true" value="<?php echo (isset($post_info))?$post_info['address']['provincial']:set_value('provincial'); ?>">
								      	<div name="image_error" class="clear error"><?php echo form_error('provincial');?></div>
								    </div>
								</div>
								<div class="formRow clearfix">
								    <label for="zip_code"  class="col-sm-4 control-label">ZIP/ Mã bưu điện</label>
								    <div class="col-sm-8">

								      	<input type="text" class="required number" placeholder="ZIP/ Mã bưu điện" name="zip_code" id="postal_code" value="<?php echo (isset($post_info))?$post_info['address']['zip_code']:set_value('zip_code'); ?>">

								      	<div name="image_error" class="clear error"><?php echo form_error('zip_code');?></div>
								    </div>
								</div>
								<div class="formRow clearfix">
								    <label for="country" class="col-sm-4 control-label">Quốc gia:</label>
								    <div class="col-sm-8">

								      	<input type="text" class="required" readonly="true" name="country" id="country" value="<?php echo (isset($post_info))?$post_info['address']['country']:set_value('country'); ?>">

								      	<div name="image_error" class="clear error"><?php echo form_error('country');?></div>
								    </div>
								</div>
							</div>	
						</div><!-- End Address  -->
						<!-- info room -->
						<div class="panel panel-default info-post clearfix">
						  	<div class="panel-heading">Thông tin cho thuê</div>
						  	<div class="panel-body">
								<div class="formRow">
									<label class="formLeft">Tên bài đăng:<span class="req">*</span></label>
									<div class="formRight">
										<div class="left">
											<input type="text" class="required" minlength="20" maxlength="50"  id="post_room_name" name="post_room_name" value="<?php echo (isset($post_info))? $post_info['post_room_name'] : set_value('post_room_name');?>" >
										</div>
										<div name="image_error" class="clear error"><?php echo form_error('post_room_name');?></div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="formRow">
									<label class="formLeft">Mô tả:<span class="req">*</span></label>
									<div class="formRight">
										<div class="left">
											<textarea rows="5" name="description" class="required" minlength="300" maxlength="1000" ><?php echo (isset($post_info))? $post_info['description'] : set_value('description');?></textarea>
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
								<?php
									if(isset($list_house_type) && $list_house_type){
								?>
								<div class="formRow">
									<label class="formLeft">Loại nhà ở:</label>
									<div class="formRight">
										<div class="left">
											<select class="w150" name="house_type">
											<?php
												$selected = '';
												foreach ($list_house_type as $house) {
													if(isset($post_info)){
														if($post_info['house_type'] == $house->house_type_id){
															$selected = 'selected';
														}else{
															$selected = '';
														}
													}
											?>
												<option value="<?php echo $house->house_type_id;?>" <?php echo $selected;?>><?php echo $house->house_type_name;?></option>
											<?php
												}
											?>
											</select>
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
								<?php
									}
								?>
								<!-- room type -->
								<?php
									if(isset($list_room_type) && is_array($list_room_type) && !empty($list_room_type)){
								?>
								<div class="formRow">
									<label class="formLeft">Loại phòng:</label>
									<div class="formRight">
										<div class="left">
											<select  class="w150" name="room_type">
											<?php
												$selected = '';
												foreach ($list_room_type as $room) {
													if(isset($post_info)){
														if($post_info['room_type'] == $room->room_type_id){
															$selected = 'selected';
														}else{
															$selected = '';
														}
													}
												
											?>
												<option value="<?php echo $room->room_type_id;?>" <?php echo $selected ?>><?php echo $room->room_type_name;?></option>
											<?php
											}
											?>
											</select>
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
								<?php
									}
								?>
								<!--end room type -->
								<div class="formRow">
									<label class="formLeft">Số khách tối đa:</label>
									<div class="formRight">
										<div class="left">
											<select  class="w150" name="num_guest">
												<?php
													$more = '';
													$selected ='';
													for($i = 1; $i <= 10; $i++){
														if(isset($post_info)){
															$selected = ($post_info['num_guest'] == $i)?'selected':'';
														}
														$more = ($i==10)?'+':'';
														echo '<option value="'.$i.'" '.$selected.'>'.$i.$more.' người</option>';
													}
												?>
											</select>
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>	
								
								<div class="formRow">
									<label class="formLeft">Số phòng ngủ:</label>
									<div class="formRight">
										<div class="left">
											<select  class="w150" name="num_bedroom">
												<?php
													$more = '';
													$selected = '';
													for($i = 1; $i <= 10; $i++){
														if(isset($post_info)){
															$selected = ($post_info['num_bedroom'] == $i)?'selected':'';
														}
														$more = ($i==10)?'+':'';
														echo '<option value="'.$i.'" '.$selected.'>'.$i.$more.' phòng ngủ</option>';
													}
												?>
											</select>
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
								<div class="formRow">
									<label class="formLeft">Số giường:</label>
									<div class="formRight">
										<div class="left">
											<select  class="w150" name="num_bed">
												<?php
													$more = '';
													$selected = '';
													for($i = 1; $i <= 10; $i++){
														if(isset($post_info)){
															$selected = ($post_info['num_bed'] == $i)?'selected':'';
														}
														$more = ($i==10)?'+':'';
														echo '<option value="'.$i.'" '.$selected.'>'.$i.$more.' giường</option>';
													}
												?>
											</select>
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>	

								<div class="formRow">
									<label class="formLeft">Phòng tắm:</label>
									<div class="formRight">
										<div class="left">
											<select  class="w150" name="num_bathroom">
												<?php
													$more = '';
													$selected = '';
													for($i = 1; $i <= 10; $i++){
														if(isset($post_info)){
															$selected = ($post_info['num_bathroom'] == $i)?'selected':'';
														}
														$more = ($i==10)?'+':'';
														echo '<option value="'.$i.'" '.$selected.'>'.$i.$more.' phòng tắm</option>';
													}
												?>
											</select>
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>	
								
								<div class="formRow">
									<label class="formLeft">Diện tích:</label>
									<div class="formRight">
										<div class="left">
											<input type="text" name="acreage" class="mw160 number" value="<?php echo (isset($post_info))?$post_info['acreage']:set_value('acreage');?>"> <strong>m<sup>2</sup></strong>
										</div>
										<div for="acreage" generated="true" class="error"></div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>	
						  	</div>
						</div><!-- end info room -->

						<!-- amenities -->
						<?php
							if(isset($list_amenities) && $list_amenities){
						?>
						<div class="panel panel-default info-post clearfix">
						  	<div class="panel-heading">Tiện nghi</div>
						  	<div class="panel-body">
								<div class="formRow">

									<?php
										if(isset($post_info)){
											$amenitiesArr = explode(',', $post_info['amenities']);
										}
										$checked = '';
										foreach ($list_amenities as $amenities) {
											if(isset($amenitiesArr)){
												$checked = '';
												foreach ($amenitiesArr as $value) {
													if($value == $amenities->amenities_id){
														$checked = 'checked';
													}
												}
											}
									?>
									<fieldset class="inline w30">
										<label>
									      	<input type="checkbox" name="amenities[]" value="<?php echo $amenities->amenities_id; ?>"  <?php echo ($checked)?$checked: set_checkbox('amenities[]', $amenities->amenities_id); ?> > 
									      	&nbsp;<?php echo $amenities->name;?>
									    </label>
									</fieldset >
									<?php
										}
									?>
									<div class="clear"></div>
									<div for="amenities[]" generated="true" class="error"></div>
								</div>
								
						  	</div>
						</div>
						<?php
							}
						?>
						<!-- end amenities -->
						<!-- Experience -->	
						<?php
							if(isset($list_experience) && is_array($list_experience) && $list_experience){
						?>
						<div class="panel panel-default info-post clearfix" id="post-exp">
							<div class="panel-heading">Trải nghiệm</div>
						  	<div class="panel-body">
						  		<div class="formRow">
						  			<p class="exp-info">Chọn các thẻ thể hiện sự trải nghiệm phù hợp với địa điểm của bạn!! </p>
						  			<ul class="experience-wrap" data-toggle="buttons">
						  				<?php
						  				
						  					if(isset($post_info)){
						  						$expArr = explode(',', $post_info['experience']);

						  					}
						  					$active = '';
						  					$checked = '';
						  					foreach ($list_experience as $exp) {
						  						$active = '';
						  						$checked = '';
						  						if(isset($expArr)){
						  							foreach ($expArr as $value) {
						  								if($value == $exp->experience_id){
						  									$active = 'active';
						  									$checked = 'checked';
						  								}
						  							}		
						  						}

						  				?>
						  				<li class="btn btn-default <?php echo $active;?>" role = "tag" id="exp-tag">
											<input type="checkbox" autocomplete="off" name="experience[]" value="<?php echo $exp->experience_id;?>" <?php echo $checked;?>> 
											<div class="txt-show">
												<i class="fa <?php echo $exp->icon_value;?>"></i>
												<em><?php echo $exp->name;?></em>
												<div class="tooltip exp-tooltip"><?php echo $exp->description;?></div>	
											</div>					
						  				</li>
						  				<?php
						  					
						  				}
						  				?>
						  			</ul>
						  			<div for="experience[]" generated="true" class="error"></div>
								</div>
						  	</div>
						  	
						</div>	
						<?php
						}
						?>
						<!-- End Experience -->	
						<!-- <div class="panel panel-default info-post clearfix">
							<div class="panel-heading">Thông tin bảo mật <span class="glyphicon glyphicon-lock"></span></div>
						  	<div class="panel-body">
						  		<div class="formRow">
									<label class="formLeft">Email:<span class="req">*</span></label>
									<div class="formRight">
										<div class="left">
											<input type="email" name="email" class="mw200">
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>	
								<div class="formRow">
									<label class="formLeft">Số điện thoại:<span class="req">*</span></label>
									<div class="formRight">
										<div class="left">
											<input type="text" name="phone" class="mw200">
										</div>
										<div name="image_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>	
						  	</div>
						  	
						</div>	 -->         
						<div class="formRow hide"></div>
					</div> 
        		</div><!-- End tab_container-->
        		<div class="formSubmit">
           			<input type="submit" name="" value="Tiếp tục >>" class="redB" />
           			<!-- <input type="reset" value="Hủy bỏ" class="basic" /> -->
           		</div>
        		<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		 $("#post_info").validate({
		 	errorElement: "div",
		 	ignore: [],
		 	rules: {
	            'experience[]': {
	                required: true,
	            },
	            'amenities[]':{
	            	required: true,
	            }
	        },
	        messages: {
	            'experience[]': {
	                required: "Bạn phải chọn ít nhất 1 thẻ",
	            },
	            'amenities[]':{
	            	required: "Bạn phải chọn ít nhất 1 lựa chọn",
	            }
	        },
		 });

		// $( '#exp-tag[role = "tag"]' ).on( "click", function(){
		// 	var n = $( '#exp-tag.active').length;
		// 	if($(this).hasClass('active')){
		// 		n--;
		// 	}else{
		// 		n++;
		// 	}
		// 	if(n > 3){
		// 		alert("Chi duoc chon 3 tag!");
		// 		return false;
		// 	}
		// } );
	})
</script>	
<script type="text/javascript">
	var autocomplete;
	var componentForm = {
		street_number: 'short_name',
        route: 'long_name',
        administrative_area_level_2: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };
    var lat;
    var lng;
    var zoom;
    var address;
    function initMap(){

    	if(($("#lat").val() == '') || ($("#lng").val() == '') || ($("#autocomplete").val() == '')){
		    lat = 21.0379924;
		    lng = 105.81424949999999;
		    // address='';
		    zoom = 4;
		    var mapOption = {
		        zoom: zoom, 
		        center: {lat: lat, lng: lng},
		    }
		    var map = new google.maps.Map(document.getElementById('map'), mapOption);
	    	// setMarker(lat,lng,address,map);
		}else{
			lat = Number($("#lat").val());
			lng = Number($("#lng").val());
			address = $("#autocomplete").val();
			zoom = 16;
			var mapOption = {
		        zoom: zoom, 
		        center: {lat: lat, lng: lng},
		    }
			var map = new google.maps.Map(document.getElementById('map'), mapOption);
	    	setMarker(lat,lng,address,map);
		}
	   

	   	autoCompleteSearch();
  	}

  	function autoCompleteSearch(){
  		autocomplete = new google.maps.places.Autocomplete(
	          (document.getElementById('autocomplete')),
	          {types: ['geocode']}
	    );
	    google.maps.event.addListener(autocomplete, 'place_changed',function(){
	    	resetMap();
	    }); 
  	}

  	function resetMap(){
  		var place = autocomplete.getPlace();
        address = $('#autocomplete').val();
        lat = place.geometry.location.lat();
        lng = place.geometry.location.lng();
        $('#lat').val(lat);
        $('#lng').val(lng);

        mapOption = {
          	zoom: 16, 
          	center: {lat: lat, lng: lat},
        }

        var map = new google.maps.Map(document.getElementById('map'), mapOption);

        fillAddress(place);
        setMarker(lat,lng,address,map);   
  	}

  	function setMarker(lat,lng,address,map){
		var contentString = '<div>Dragging this pin until the address on the left is as close to your real address as possible</div>'+'<br />'+'<div id="content"><b>'+address+'</b></div>';

        var infowindow = new google.maps.InfoWindow({
            content: contentString,
            maxWidth: 300
        });

        var marker = new google.maps.Marker({
        	position: {lat: lat, lng: lng},
        	animation: google.maps.Animation.DROP,
        	draggable: true
        });
        marker.setMap(map);
        infowindow.open(map, marker);
        marker.addListener('click', function() {
            infowindow.open(map, marker);
        });

        var geocoder = new google.maps.Geocoder;
        google.maps.event.addListener(marker,'dragend',function(){
        	dragMaker(marker,map,geocoder,infowindow);
        });
  	}

  	function fillAddress(place){

  		document.getElementById('address_1').value = '';
        for (var component in componentForm) {
        	if(component != 'street_number' && component != 'route'){
	          document.getElementById(component).value = '';
	          document.getElementById(component).readOnly = false;
	        }
        }

        address1 = '';
        for (var i = 0; i < place.address_components.length; i++) {

	        var addressType = place.address_components[i].types[0];
	        if (componentForm[addressType]) {
	            if(addressType == 'street_number' || addressType == 'route' ){
		            var street = place.address_components[i][componentForm[addressType]];
		            if(addressType == 'street_number'){
		                street += ' ';
		            }
		            address1 += street;
		            document.getElementById('address_1').value = address1;
	            }else{
		            var val = place.address_components[i][componentForm[addressType]];
		            document.getElementById(addressType).value = val;
		            // document.getElementById(addressType).value != '';
		            document.getElementById(addressType).readOnly = true;
	            }
	        }
        }
  	}

  	function dragMaker(marker,map,geocoder,infowindow){
  		var latlng = {lat: marker.getPosition().lat(), lng: marker.getPosition().lng()};
    	$('#lat').val(marker.getPosition().lat());
    	$('#lng').val(marker.getPosition().lng());
    	geocoder.geocode({location: latlng}, function(results, status){
    		 if (status === google.maps.GeocoderStatus.OK) {
    		 	if(results[0]){
    		 		var resultsAdrress = results[0].formatted_address;
    		 		$("#autocomplete").val(resultsAdrress);
    		 		infowindow.setContent('<div>Continute dragging this pin until the address on the left is as close to your real address as possible</div>'+'<br />'+'<div id="content"><b>'+resultsAdrress+'</b></div>');
        			infowindow.open(map, marker);
        			place = results[0];
        			fillAddress(place);
    		 	}else{
    		 		alert("No results found");
    		 	}
    		 }else{
    		 	window.alert('Geocoder failed due to: ' + status);
    		 }
    	});
    }
    //enter not submit
    document.getElementById('autocomplete').addEventListener('keypress', function(event) {
        if (event.keyCode == 13) {
            event.preventDefault();
        }
    });
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBwl-pYart0L9n0XPX_V5AuFFPmk-o-rlM&libraries=places&callback=initMap"></script>




