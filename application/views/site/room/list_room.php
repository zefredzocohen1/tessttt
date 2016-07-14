<section id="search">
    <div class="home-search">
        <div class="container">
            <div class="row">
                <?php $this->load->view('site/home/block_search');?>
            </div>
        </div>
    </div>
</section>
<section id="breadcrum-wrap">
    <div class="container">
        <div class="row">
            <div class="col-md-12 block">
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Library</a></li>
                    <li class="active">Data</li>
                </ol>
            </div>
        </div>
    </div>
</section>
<section id="btn-option">
    <div class="container">
        <div class="row">
            <div class="col-md-12 block">
                <div class="filter-btn">
                    <button type="button" id="filter-control" class="btn btn-default hidden-md hidden-lg"  data-toggle="button" aria-pressed="false" autocomplete="off">
                        <span class="show-filter">Bộ lọc</span>
                        <span class="hide-filter">Ẩn bộ lọc <<</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="main-list">
	<div class="container">
		<div class="row">
		<!-- <div  style="max-width: 1170px;margin: 0 auto;"> -->
			<div id="sidebar" class="col-md-4  visible-lg visible-md">
				<div class="map">
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d119175.98717794055!2d105.83696370000004!3d21.02269665!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab9bd9861ca1%3A0xe7887f7b72ca17a9!2zSGFub2ksIEhvw6BuIEtp4bq_bSwgSGFub2ksIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1461656965356" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				<div class="filter">
					<form>
						<!--room-type-->
                                            <div id="room_type" name="room_type" class="panel panel-default fill-item room-type">
                                                <div class="panel-heading room-type-heading clearfix" data-toggle="collapse" data-target="#room-type-body" >
                                                    <h3>Loại phòng</h3>
                                                    <span class="glyphicon glyphicon-chevron-down"></span>
                                                </div>
                                                <div class="panel-body collapse in" id="room-type-body" role="group" aria-label="...">
                                                    <div class="wrap-fill btn-group" data-toggle="buttons">
                                                        <label class="btn btn-default tclick" data-tloc="entire_home_or_apt" data-tkey="Room Type" >
                                                            <input type="checkbox" name="room_types" id="entry-home" autocomplete="off">
                                                            <span class="icon icon-house"></span>
                                                            <span class="icon-active icon-house-active"></span>
                                                            Nguyên căn
                                                        </label>
                                                        <label class="btn btn-default tclick" data-tloc="private_room" data-tkey="Room Type">
                                                            <input type="checkbox" name="room_types" id="private-room" autocomplete="off">
                                                            <span class="icon icon-room"></span>
                                                            <span class="icon-active icon-room-active"></span>
                                                            Phòng riêng
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
						<!--size-->
						<div id="size_type" class="panel panel-default fill-item size-type">
							<div class="panel-heading size-type-heading clearfix" data-toggle="collapse" data-target="#size-type-body" >
								<h3>Diện tích</h3>
								<span class="glyphicon glyphicon-chevron-down"></span>
							</div>
							<div class="panel-body collapse in" id="size-type-body" role="group" aria-label="...">
								<div class="wrap-fill btn-group">
									<div class="form-group">
									    <label for="">Phòng ngủ</label>
									    <select name="bedroom" class="form-control" id="bedroom">
									    	<option  class="tclick" data-tloc="0" data-tkey="Bedrooms" role="presentation">Bất kỳ</option>
                                                                                <?php for($i=1;$i<10;$i++){?>
                                                                                    <option  class="tclick" data-tloc="<?php echo $i;?>" data-tkey="Bedrooms" role="presentation"><?php echo $i?></option>
                                                                                <?php }?>
                                                                                    <option  class="tclick" data-tloc="<?php echo $i;?>" data-tkey="Bedrooms" role="presentation"><?php echo $i.'+'?></option>
									    </select>
									</div>
									<div class="form-group">
									    <label for="">Phòng tắm</label>
									    <select name="bathroom" class="form-control" id="bathroom">
									    	<option  class="tclick" data-tloc="0" data-tkey="bathroom" role="presentation">Bất kỳ</option>
                                                                                <?php for($i=1;$i<10;$i++){?>
                                                                                    <option  class="tclick" data-tloc="<?php echo $i;?>" data-tkey="bathroom" role="presentation"><?php echo $i?></option>
                                                                                <?php }?>
                                                                                    <option  class="tclick" data-tloc="<?php echo $i;?>" data-tkey="bathroom" role="presentation"><?php echo $i.'+'?></option>
									    </select>
									</div>
									<div class="form-group">
									    <label for="">Giường</label>
									    <select name="beds" class="form-control" id="beds">
									    	<option  class="tclick" data-tloc="0"  data-tkey="beds" role="presentation">Bất kỳ</option>
                                                                                <?php for($i=1;$i<10;$i++){?>
                                                                                    <option  class="tclick" data-tloc="<?php echo $i;?>" data-tkey="beds" role="presentation"><?php echo $i?></option>
                                                                                <?php }?>
                                                                                    <option  class="tclick" data-tloc="<?php echo $i;?>" data-tkey="beds" role="presentation"><?php echo $i.'+'?></option>
									    </select>
									</div>
								</div>
							</div>
						</div>
						<!--amenities-->
                                                <?php 
                                                if(isset($table_amenities)&&$table_amenities !='')echo $table_amenities?>
						<!-- price-range -->
						<div id = "price_range" class="panel panel-default fill-item price-range">
							<div class="panel-heading price-range-heading clearfix" data-toggle="collapse" data-target="#price-range-body" >
								<h3>Giá</h3>
								<span class="glyphicon glyphicon-chevron-down"></span>
								
							</div>
							<div class="panel-body collapse in" id="price-range-body" role="group" aria-label="...">
                                                            <div class="wrap-fill btn-group">
                                                                <div id="slider-range"></div>
                                                                <div class="clearfix">
                                                                    <!-- <label for="amount">Price range:</label> -->
                                                                    <input  class="tclick" type="text" id="min-amount" class="w50 pull-left" readonly style="border:0; color:#398fd1; font-weight:bold;text-align:left">
                                                                    <input  class="tclick" type="text" id="max-amount" class="w50 pull-left" readonly style="border:0; color:#398fd1; font-weight:bold;text-align:right">
                                                                </div> 
                                                            </div>
							</div>
						</div>
						<!-- experience -->
						<?php if(isset($table_experiences)&&$table_experiences!='')echo $table_experiences?>
					</form>
				</div>
			</div>
			<div id="result-list" class="col-md-8 col-sm-12 col-xs-12">
				<div id="sort-pager" class="row">
					<div id="sort" class="col-sm-6 form-group">
						<label>Sắp xếp theo:</label>
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default popular active tclick">
							    <input  class="" type="radio" name="popular-value" id="popular-value" value='0' autocomplete="off" checked> 
							    Phổ biến
							</label>
							<label class="btn btn-default sort tclick" id="price-sort">
							    <input  class="" type="radio" name="options" data-value-reverse="2" data-value="1" id="option2" autocomplete="off"> 
							    Giá
							    <span class="glyphicon glyphicon-sort-by-attributes up"></span>
							    <span class="glyphicon glyphicon-sort-by-attributes-alt down"></span>
							    
							</label>
						</div>
					</div>
					<div id="pager" class="col-sm-6">
						<span> 1 - 4 trong số 4 Bài đăng</span>
					</div>
					<div id="filter-active">
						
					</div>	
				</div>
				<div id="list-room">
					<?php
                                        if(isset($list_room)&&count($list_room)>0){
                                            $query = "?";
                                            if(isset ($checkin))$query .= '&ch_in='.$checkin;
                                            if(isset ($checkout))$query .= '&ch_out='.$checkout;
                                            if(isset ($guest))$query .= '&guest='.$guest;
                                            if($query=='?')$query = '';
						foreach ($list_room as $key => $room) {?>
					<div class="list-room-item clearfix">
                                            <div class="photo col-sm-5 col-xs-12">
                                                <a href="<?php 
                                                echo base_url('room/room_detail/'.$encode->encode($room->post_room_id).$query);?>">
                                                <?php $arr_img = json_decode($room->image_list);?>
                                                <img src="<?php echo $arr_img[0];?>" class="img-responsive" />
                                                    <!-- <span class="label label-default tag sales">-15%</span> -->
                                                </a>
                                            </div>
                                        <div class="info-r col-sm-7 col-xs-12">
                                            <div class="info-data">
                                                <h3 class="title-r">
                                                    <a href="<?php echo base_url('room/room_detail/'.$encode->encode($room->post_room_id).$query);?>"><?php echo $room->post_room_name;?></a>
                                                </h3>
                                                <p class="type-location">
                                                    <span class="type"><?php echo $room->house_type_name;?></span>
                                                    <span class="location"> - <?php echo $room->address_detail;?></span>
                                                </p>
                                                <p class="type-r hidden-xs"><?php echo $room->room_type_name;?></p>
                                                <p class="bedr-numguest">
                                                    <span>Phòng ngủ: <?php echo $room->num_bedroom?></span>
                                                    <span>- Số khách tối đa: <?php echo $room->num_guest?></span>
                                                </p>
							</div>
							<div class="info-price more">
								<p class="price-currency">
									<span>VND</span>
								</p>
								<p class="price-r">
									<!-- <span class="price-old">30</span> -->
									<span class="price-cur"><?php echo number_format($room->price_night_vn);?></span>
								</p>
								<p class="per-night">Một đêm</p>
								<p class="type-sales">
									<!-- <span class="label label-default tag sales-text">Khuyến mãi phút cuối</span> -->
								</p>
								<a href="<?php echo base_url('room/room_detail/'.$room->post_room_id);?>" class="btn btn-default more-show">Hiển thị thêm</a>
							</div>
						</div>
					</div>
					<?php
						}
                                        }else{
                                            $this->load->view('site/error/search_no_result');
                                        }
					?>
				</div>
				<nav id="pagination"> 
                                    <?php echo $pagination_link;?>
				</nav>
			</div>
		</div>
	</div>
</section>