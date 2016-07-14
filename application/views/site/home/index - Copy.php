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
                <h2>Khám phá nơi ở du lịch tốt nhất</h2>
                <div class="block search">
                    <form action="">
                        <div class="col-md-4 col-sm-12">
                            <input type="text" name="location" id="location" class="form-control" placeholder="Điểm đến của bạn ?" />
                        </div>
                        <script language="JavaScript" type="text/javascript">
                        $(document).ready(function($){
                                  $( "#location" ).autocomplete({
        minLength: 2,
        source: function( request, response ) {
            $.ajax({
                url: "<?php echo base_url().'site/home/process'?>",
                data: { query: request.term},
                type: "POST",
                success: function(data){
                    console.log(data);
                    response(data);
                },
                error: function(jqXHR, textStatus, errorThrown){
                    alert("error handler!");                        
                },
              dataType: 'json'
            });
        }
    })
                        });

                            </script>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <input type="text" name="checkin" id="checkin" class="form-control" placeholder="Nhận phòng"/>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <input type="text" name="checkout" id="checkout" class="form-control" placeholder="Trả phòng" />
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <input type="text" name="guest" id="guest" class="form-control" placeholder="Khách"/>
                        </div>
                        <div class="col-md-2 col-sm-3 col-xs-6">
                            <input type="submit" name="search" id="action-search" class="btn btn-primary" value="Tìm kiếm" />
                        </div>
                        <div class="clear"></div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</section>
<section id="home-news">
    <div class="container">
        <div class="row">
            <div class="block">
                <div class="col-sm-4 col-xs-12 item-news">
                    <h3>Tìm kiếm và Khám phá</h3>
                    <p>Tìm chỗ ở phù hợp với ngân sách và phong cách của bạn.</p>
                    <div class="img-item">
                        <img src="<?php echo base_url();?>public/site/images/img-news1.png" class="img-responsive wow pulse" data-wow-duration = "1000ms" data-wow-delay = "600ms">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12 item-news">
                    <h3>Liên lạc và Đặt chỗ</h3>
                    <p>Liên lạc với các chủ nhà tiềm năng, xác nhận ngày du lịch và đặt phòng an toàn.</p>
                    <div class="img-item">
                        <img src="<?php echo base_url();?>public/site/images/img-news2.png" class="img-responsive wow bounce" data-wow-duration = "600ms" data-wow-delay = "1200ms">
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12 item-news">
                    <h3>Du lịch và Tận hưởng</h3>
                    <p>Sống như người địa phương ở bất kỳ nơi nào trên thế giới.</p>
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
                <h3>Điểm đến phổ biến</h3>
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
                <h3>Tiện nghi & Tiết kiệm hơn</h3>
                <p>Nghỉ tại nhà ở địa phương thay vì một khách sạn đắt tiền.</p>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-resize-full wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "700ms"></span>
                </div>
                <h3>Tận hưởng nhiều không gian hơn</h3>
                <p>Với chi phí tương đương một phòng khách sạn, bạn có thể thuê toàn bộ căn nhà, đồng nghĩa với việc có thêm nhiều không gian và tiện nghi cho kỳ nghỉ của mình.</p>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-check wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "900ms"></span>
                </div>
                <h3>Trải nghiệm như một người bản xứ</h3>
                <p>Trải nghiệm cuộc sống bản địa để có một chuyến du lịch đầy màu sắc, chân thực và khó quên.</p>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-lock wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "1100ms"></span>
                </div>
                <h3>An toàn tuyệt đối</h3>
                <p>Với một hệ thống chi trả trực tuyến an toàn, chúng tôi sẽ giúp bạn đảm trách việc thanh toán. Bạn có thể thực hiện giao dịch bằng thẻ tín dụng hoặc thông qua PayPal.</p>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-home wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "1300ms"></span>
                </div>
                <h3>Như đang ở nhà</h3>
                <p>Sinh hoạt thoải mái như thể bạn đang ở nhà. Chuẩn bị bữa sáng trong nhà bếp của riêng mình, sử dụng tiện nghi giặt ủi hay Wi-Fi mà không phải trả thêm bất kỳ chi phí nào.</p>
            </div>
            <div class="col-md-4 col-xs-12 tinh-nang-item">
                <div class="icon-item">
                    <span class="glyphicon glyphicon-list-alt wow zoomIn" data-wow-duration = "400ms" data-wow-delay = "1500ms"></span>
                </div>
                <h3>Nhiều lựa chọn</h3>
                <p>Từ phòng riêng, căn hộ, biệt thự biệt lập cho đến những căn nhà truyền thống, chúng tôi không ngừng mở rộng danh sách bài đăng của mình.</p>
            </div>
        </div>
    </div>
</section>
<section id="subjects">
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
</section>
<section id="partner">
    <div class="container">
        <div class="row">
            <div class="block col-md-8 col-md-offset-2">
                <h3>Được giới thiệu trên</h3>
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