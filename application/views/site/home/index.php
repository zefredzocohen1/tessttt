<section id="banner-search">
    <div class="block-banner">
        <div class="container-fluid">
            <div class="row">
                <div class="banner-bg" style = "background:url(public/site/images/hero2w.jpg) no-repeat center center scroll;background-size:cover;"></div>
            </div>
        </div>
    </div>
    <div class="home-search">
        <div class="container">
            <div class="row">
                <h2><?php echo lang('home_discover_the_best_travel_accommodation')?></h2>
                <?php $this->load->view('site/home/block_search');?>
            </div>
        </div>
    </div>
</section>
<section id="home-news">
    <div class="container">
        <div class="row">
            <div class="block">
                <div class="col-sm-4 col-xs-12 item-news">
                    <h3><?php echo lang('home_search_and_discovery')?></h3>
                    <p><?php echo lang('home_find_suitable_budget_style')?></p>
                    <div class="img-item">
                        <img src="<?php echo base_url();?>public/site/images/img-news1.png" class="img-responsive wow pulse" data-wow-duration = "1000ms" data-wow-delay = "600ms">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12 item-news">
                    <h3><?php echo lang('home_contact_and_booking')?></h3>
                    <p><?php echo lang('home_contact_homeowners_travel_confirmation_booking')?></p>
                    <div class="img-item">
                        <img src="<?php echo base_url();?>public/site/images/img-news2.png" class="img-responsive wow bounce" data-wow-duration = "600ms" data-wow-delay = "1200ms">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12 item-news">
                    <h3><?php echo lang('home_travel_and_enjoy')?></h3>
                    <p><?php echo lang('home_live_local_any_place_world')?></p>
                    <div class="img-item">
                        <img src="<?php echo base_url();?>public/site/images/img-news3.png" class="img-responsive wow swing" data-wow-duration = "600ms" data-wow-delay = "1800ms">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="location-to">
    <div class="container">
        <div class="row">
            <div class="block">
                <h3><?php echo lang('home_popular_destination');?></h3>
                <ul>
                    <li class="location-item col-sm-4 col-xs-6">
                        <a href="listroom.html">
                            <img src="<?php echo base_url();?>public/site/images/singapore.jpg" class="img-responsive">
                            <p>Singapore</p>
                        </a>
                    </li>
                    <li class="location-item col-sm-4 col-xs-6">
                        <a href="listroom.html">
                            <img src="<?php echo base_url();?>public/site/images/hong-kong.jpg" class="img-responsive">
                            <p>Hong Kong</p>
                        </a>
                    </li>
                    <li class="location-item col-sm-4 col-xs-6">
                        <a href="listroom.html">
                            <img src="<?php echo base_url();?>public/site/images/sydney.jpg" class="img-responsive">
                            <p>Sydney</p>
                        </a>
                    </li>
                    <li class="location-item col-xs-6">
                        <a href="listroom.html">
                            <img src="<?php echo base_url();?>public/site/images/tokyo.jpg" class="img-responsive">
                            <p>Tokyo</p>
                        </a>
                    </li>
                    <li class="location-item col-xs-6">
                        <a href="listroom.html">
                            <img src="<?php echo base_url();?>public/site/images/taipei.jpg" class="img-responsive">
                            <p>Đài Bắc</p>
                        </a>
                    </li>
                    <li class="location-item col-sm-4 col-xs-6">
                        <a href="listroom.html">
                            <img src="<?php echo base_url();?>public/site/images/phuket.jpg" class="img-responsive">
                            <p>Phuket</p>
                        </a>
                    </li>
                    <li class="location-item col-sm-4 col-xs-6">
                        <a href="listroom.html">
                            <img src="<?php echo base_url();?>public/site/images/bali.jpg" class="img-responsive">
                            <p>Bali</p>
                        </a>
                    </li>
                    <li class="location-item col-sm-4 col-xs-6">
                        <a href="listroom.html">
                            <img src="<?php echo base_url();?>public/site/images/seoul.jpg" class="img-responsive">
                            <p>Seoul</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section id="tinh-nang">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-usd wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "500ms"></span>
                </div>
                <h3><?php echo lang('home_facilities_save_more')?></h3>
                <p><?php echo lang('home_stay_home_instead_of_local')?></p>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-resize-full wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "700ms"></span>
                </div>
                <h3><?php echo lang('home_enjoy_more_space')?></h3>
                <p><?php echo lang('home_cost_of_hotel_room_info')?></p>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-check wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "900ms"></span>
                </div>
                <h3><?php echo lang('home_experience_as_native_speaker')?></h3>
                <p><?php echo lang('home_experience_life_with_trip')?></p>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-lock wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "1100ms"></span>
                </div>
                <h3><?php echo lang('home_absolute_safety')?></h3>
                <p><?php echo lang('home_system_secure_online_payment_info')?></p>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-home wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "1300ms"></span>
                </div>
                <h3><?php echo lang('home_like_home')?></h3>
                <p><?php echo lang('home_comfortable_living')?></p>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-list-alt wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "1500ms"></span>
                </div>
                <h3><?php echo lang('home_many_choose')?></h3>
                <p><?php echo lang('home_list_room')?></p>
            </div>
        </div>
    </div>
</section>
<!--<section id="subjects">
    <div class="container">
        <div class="row">
            <div class="block">
                <div class="col-sm-4 col-xs-12 item owner-item">
                    <a href="#">
                        <div class="tit">
                            <h4>Chủ nhà</h4>
                            <p>Đăng tin và nhận thêm thu nhập từ việc cho thuê phòng</p>
                        </div>
                        <span>Tìm hiểu thêm</span>
                    </a>
                </div>
                <div class="col-sm-4 col-xs-12 item visitor-item">
                    <a href="#">
                        <div class="tit">
                            <h4>Chủ nhà</h4>
                            <p>Đăng tin và nhận thêm thu nhập từ việc cho thuê phòng</p>
                        </div>
                        <span>Tìm hiểu thêm</span>
                    </a>
                </div>
                        
                <div class="col-sm-4 col-xs-12 item mobile-item">
                    <div>
                        <b>Di động</b>
                        <a href="#">
                            <img src="<?php echo base_url();?>public/site/images/store-appstore.svg" class="img-responsive"/>
                        </a>
                        <a href="#">
                            <img src="<?php echo base_url();?>public/site/images/store-googleplay.svg" class="img-responsive"/>
                        </a>
                        <a href="#" class="th">
                            <span>Tìm hiểu thêm</span>
                        </a>
                    </div>
                    <a href="#" class="mb">

                    </a>
                </div>
            </div>
        </div>
    </div>
</section>-->
<section id="partner">
    <div class="container">
        <div class="row">
            <div class="block col-md-8 col-md-offset-2">
                <h3><?php echo lang('home_introduced_on');?></h3>
                <div class="owl-carousel" >
                    <div class="item">
                        <img src="<?php echo base_url();?>public/site/images/featured-cosmo.png" alt ="" class="img-resposive"/>
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url();?>public/site/images/featured-bbc.png" alt ="" class="img-resposive"/>
                    </div>
                    <div class="item">
                        <img src="<?php echo base_url();?>public/site/images/featured-techcrunch.png" alt ="" class="img-resposive"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>