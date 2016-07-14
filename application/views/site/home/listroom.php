<section id="search">
    <div class="home-search">
        <div class="container">
            <div class="row">
               <?php echo $this->load->view('site/home/block_search');?>
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
                        <div class="panel panel-default fill-item room-type">
                            <div class="panel-heading room-type-heading clearfix" data-toggle="collapse" data-target="#room-type-body" >
                                <h3>Loại phòng</h3>
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </div>
                            <div class="panel-body collapse in" id="room-type-body" role="group" aria-label="...">
                                <div class="wrap-fill btn-group" data-toggle="buttons">
                                    <label class="btn btn-default">
                                        <input type="checkbox" name="room_types" id="entry-home" autocomplete="off">
                                        <span class="icon icon-house"></span>
                                        <span class="icon-active icon-house-active"></span>
                                        Nguyên căn
                                    </label>
                                    <label class="btn btn-default">
                                        <input type="checkbox" name="room_types" id="private-room" autocomplete="off">
                                        <span class="icon icon-room"></span>
                                        <span class="icon-active icon-room-active"></span>
                                        Phòng riêng
                                    </label>
                                </div>
                            </div>

                        </div>
                        <!--size-->
                        <div class="panel panel-default fill-item size-type">
                            <div class="panel-heading size-type-heading clearfix" data-toggle="collapse" data-target="#size-type-body" >
                                <h3>Diện tích</h3>
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </div>
                            <div class="panel-body collapse in" id="size-type-body" role="group" aria-label="...">
                                <div class="wrap-fill btn-group">
                                    <div class="form-group">
                                        <label for="">Phòng ngủ</label>
                                        <select name="bedroom" class="form-control" id="">
                                            <option>Bất kỳ</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10+</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Phòng tắm</label>
                                        <select name="bedroom" class="form-control" id="">
                                            <option>Bất kỳ</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10+</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Giường</label>
                                        <select name="bedroom" class="form-control" id="">
                                            <option>Bất kỳ</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7</option>
                                            <option>8</option>
                                            <option>9</option>
                                            <option>10+</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--amenities-->
                        <div class="panel panel-default fill-item amenities-type">
                            <div class="panel-heading amenities-type-heading clearfix" data-toggle="collapse" data-target="#amenities-type-body" >
                                <h3>Tiện nghi</h3>
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </div>
                            <div class="panel-body collapse in" id="amenities-type-body" role="group" aria-label="...">
                                <div class="wrap-fill btn-group">
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            TV
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            Có người bảo vệ
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            Mạng viễn thông không dây
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            Có chỗ đậu xe
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            Có máy lạnh
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            Thang máy
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            Hồ bơi riêng
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            Lò sưởi trong nhà
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- price-range -->
                        <div class="panel panel-default fill-item price-range">
                            <div class="panel-heading price-range-heading clearfix" data-toggle="collapse" data-target="#price-range-body" >
                                <h3>Giá</h3>
                                <span class="glyphicon glyphicon-chevron-down"></span>

                            </div>
                            <div class="panel-body collapse in" id="price-range-body" role="group" aria-label="...">
                                <div class="wrap-fill btn-group">
                                    <div id="slider-range"></div>
                                    <div class="clearfix">
                                        <!-- <label for="amount">Price range:</label> -->
                                        <input type="text" id="min-amount" class="w50 pull-left" readonly style="border:0; color:#398fd1; font-weight:bold;text-align:left">
                                        <input type="text" id="max-amount" class="w50 pull-left" readonly style="border:0; color:#398fd1; font-weight:bold;text-align:right">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- experience -->
                        <div class="panel panel-default fill-item price-range">
                            <div class="panel-heading experience-heading clearfix" data-toggle="collapse" data-target="#experience-body" >
                                <h3>Trải nghiệm</h3>
                                <span class="glyphicon glyphicon-chevron-down"></span>
                            </div>
                            <div class="panel-body collapse in" id="experience-body" role="group" aria-label="...">
                                <div class="wrap-fill btn-group">
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            Bãi biển
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            Mua sắm
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            Tiết kiệm
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            Lãng mạn
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            Độc đáo
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            Độc đáo
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            Độc đáo
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                    <div class="checkbox inline w50">
                                        <label>
                                            <input type="checkbox">
                                            Độc đáo
                                            <small>(120)</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div id="result-list" class="col-md-8 col-sm-12 col-xs-12">
                <div id="sort-pager" class="row">
                    <div id="sort" class="col-sm-6 form-group">
                        <label>Sắp xếp theo:</label>
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default active">
                                <input type="radio" name="options" id="option1" autocomplete="off" checked>
                                Phổ biến
                            </label>
                            <label class="btn btn-default" id="price-sort">
                                <input type="radio" name="options" id="option2" autocomplete="off">
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
                    <div class="list-room-item clearfix">
                        <div class="photo col-sm-5 col-xs-12">
                            <a href="bookroom.html">
                                <img src="<?php echo base_url();?>public/site/images/room-1.jpg" class="img-responsive" />
                                <span class="label label-default tag sales">-15%</span>
                            </a>
                        </div>
                        <div class="info-r col-sm-7 col-xs-12">
                            <div class="info-data">
                                <h3 class="title-r">
                                    <a href="bookroom.html">Dormitory in Hanoi Old Quarter</a>
                                </h3>
                                <p class="type-location">
                                    <span class="type">Khách sạn</span>
                                    <span class="location">- Hà Nội, Hà Nội, Việt Nam</span>
                                </p>
                                <p class="type-r hidden-xs">Phòng riêng</p>
                                <p class="bedr-numguest">
                                    <span>Phòng ngủ: 1</span>
                                    <span>- Số khách tối đa: 5</span>
                                </p>
                            </div>
                            <div class="info-price more">
                                <p class="price-currency">
                                    <span>VND</span>
                                </p>
                                <p class="price-r">
                                    <span class="price-old">30</span>
                                    <span class="price-cur">20</span>
                                </p>
                                <p class="per-night">Một đêm</p>
                                <p class="type-sales">
                                    <span class="label label-default tag sales-text">Khuyến mãi phút cuối</span>
                                </p>
                                <a href="bookroom.html" class="btn btn-default more-show">Hiển thị thêm</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="list-room-item clearfix">
                        <div class="photo col-sm-5 col-xs-12">
                            <a href="bookroom.html">
                                <img src="<?php echo base_url();?>public/site/images/room-2.jpg" class="img-responsive" />
                                <span class="label label-default tag sales">-15%</span>
                            </a>
                        </div>
                        <div class="info-r col-sm-7 col-xs-12">
                            <div class="info-data">
                                <h3 class="title-r">
                                    <a href="bookroom.html">Dormitory in Hanoi Old Quarter</a>
                                </h3>
                                <p class="type-location">
                                    <span class="type">Khách sạn</span>
                                    <span class="location">- Hà Nội, Hà Nội, Việt Nam</span>
                                </p>
                                <p class="type-r hidden-xs">Phòng riêng</p>
                                <p class="bedr-numguest">
                                    <span>Phòng ngủ: 1</span>
                                    <span>- Số khách tối đa: 5</span>
                                </p>
                            </div>
                            <div class="info-price more">
                                <p class="price-currency">
                                    <span>VND</span>
                                </p>
                                <p class="price-r">
                                    <span class="price-old">30</span>
                                    <span class="price-cur">20</span>
                                </p>
                                <p class="per-night">Một đêm</p>
                                <p class="type-sales">
                                    <span class="label label-default tag sales-text">Khuyến mãi phút cuối</span>
                                </p>
                                <a href="bookroom.html" class="btn btn-default more-show">Hiển thị thêm</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="list-room-item clearfix">
                        <div class="photo col-sm-5 col-xs-12">
                            <a href="bookroom.html">
                                <img src="<?php echo base_url();?>public/site/images/room-3.jpg" class="img-responsive" />
                                <span class="label label-default tag sales">-15%</span>
                            </a>
                        </div>
                        <div class="info-r col-sm-7 col-xs-12">
                            <div class="info-data">
                                <h3 class="title-r">
                                    <a href="bookroom.html">Dormitory in Hanoi Old Quarter</a>
                                </h3>
                                <p class="type-location">
                                    <span class="type">Khách sạn</span>
                                    <span class="location">- Hà Nội, Hà Nội, Việt Nam</span>
                                </p>
                                <p class="type-r hidden-xs">Phòng riêng</p>
                                <p class="bedr-numguest">
                                    <span>Phòng ngủ: 1</span>
                                    <span>- Số khách tối đa: 5</span>
                                </p>
                            </div>
                            <div class="info-price more">
                                <p class="price-currency">
                                    <span>VND</span>
                                </p>
                                <p class="price-r">
                                    <span class="price-old">30</span>
                                    <span class="price-cur">20</span>
                                </p>
                                <p class="per-night">Một đêm</p>
                                <p class="type-sales">
                                    <span class="label label-default tag sales-text">Khuyến mãi phút cuối</span>
                                </p>
                                <a href="bookroom.html" class="btn btn-default more-show">Hiển thị thêm</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="list-room-item clearfix">
                        <div class="photo col-sm-5 col-xs-12">
                            <a href="bookroom.html">
                                <img src="<?php echo base_url();?>public/site/images/room-4.jpg" class="img-responsive" />
                                <span class="label label-default tag sales">-15%</span>
                            </a>
                        </div>
                        <div class="info-r col-sm-7 col-xs-12">
                            <div class="info-data">
                                <h3 class="title-r">
                                    <a href="bookroom.html">Dormitory in Hanoi Old Quarter</a>
                                </h3>
                                <p class="type-location">
                                    <span class="type">Khách sạn</span>
                                    <span class="location">- Hà Nội, Hà Nội, Việt Nam</span>
                                </p>
                                <p class="type-r hidden-xs">Phòng riêng</p>
                                <p class="bedr-numguest">
                                    <span>Phòng ngủ: 1</span>
                                    <span>- Số khách tối đa: 5</span>
                                </p>
                            </div>
                            <div class="info-price more">
                                <p class="price-currency">
                                    <span>VND</span>
                                </p>
                                <p class="price-r">
                                    <span class="price-old">30</span>
                                    <span class="price-cur">20</span>
                                </p>
                                <p class="per-night">Một đêm</p>
                                <p class="type-sales">
                                    <span class="label label-default tag sales-text">Khuyến mãi phút cuối</span>
                                </p>
                                <a href="bookroom.html" class="btn btn-default more-show">Hiển thị thêm</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="list-room-item clearfix">
                        <div class="photo col-sm-5 col-xs-12">
                            <a href="bookroom.html">
                                <img src="<?php echo base_url();?>public/site/images/room-5.jpg" class="img-responsive" />
                                <span class="label label-default tag sales">-15%</span>
                            </a>
                        </div>
                        <div class="info-r col-sm-7 col-xs-12">
                            <div class="info-data">
                                <h3 class="title-r">
                                    <a href="bookroom.html">Dormitory in Hanoi Old Quarter</a>
                                </h3>
                                <p class="type-location">
                                    <span class="type">Khách sạn</span>
                                    <span class="location">- Hà Nội, Hà Nội, Việt Nam</span>
                                </p>
                                <p class="type-r hidden-xs">Phòng riêng</p>
                                <p class="bedr-numguest">
                                    <span>Phòng ngủ: 1</span>
                                    <span>- Số khách tối đa: 5</span>
                                </p>
                            </div>
                            <div class="info-price more">
                                <p class="price-currency">
                                    <span>VND</span>
                                </p>
                                <p class="price-r">
                                    <span class="price-old">30</span>
                                    <span class="price-cur">20</span>
                                </p>
                                <p class="per-night">Một đêm</p>
                                <p class="type-sales">
                                    <span class="label label-default tag sales-text">Khuyến mãi phút cuối</span>
                                </p>
                                <a href="bookroom.html" class="btn btn-default more-show">Hiển thị thêm</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="list-room-item clearfix">
                        <div class="photo col-sm-5 col-xs-12">
                            <a href="bookroom.html">
                                <img src="<?php echo base_url();?>public/site/images/room-6.jpg" class="img-responsive" />
                                <span class="label label-default tag sales">-15%</span>
                            </a>
                        </div>
                        <div class="info-r col-sm-7 col-xs-12">
                            <div class="info-data">
                                <h3 class="title-r">
                                    <a href="bookroom.html">Dormitory in Hanoi Old Quarter</a>
                                </h3>
                                <p class="type-location">
                                    <span class="type">Khách sạn</span>
                                    <span class="location">- Hà Nội, Hà Nội, Việt Nam</span>
                                </p>
                                <p class="type-r hidden-xs">Phòng riêng</p>
                                <p class="bedr-numguest">
                                    <span>Phòng ngủ: 1</span>
                                    <span>- Số khách tối đa: 5</span>
                                </p>
                            </div>
                            <div class="info-price more">
                                <p class="price-currency">
                                    <span>VND</span>
                                </p>
                                <p class="price-r">
                                    <span class="price-old">30</span>
                                    <span class="price-cur">20</span>
                                </p>
                                <p class="per-night">Một đêm</p>
                                <p class="type-sales">
                                    <span class="label label-default tag sales-text">Khuyến mãi phút cuối</span>
                                </p>
                                <a href="bookroom.html" class="btn btn-default more-show">Hiển thị thêm</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="list-room-item clearfix">
                        <div class="photo col-sm-5 col-xs-12">
                            <a href="bookroom.html">
                                <img src="<?php echo base_url();?>public/site/images/room-7.jpg" class="img-responsive" />
                                <!-- <span class="label label-default tag sales">-15%</span> -->
                            </a>
                        </div>
                        <div class="info-r col-sm-7 col-xs-12">
                            <div class="info-data">
                                <h3 class="title-r">
                                    <a href="bookroom.html">Dormitory in Hanoi Old Quarter</a>
                                </h3>
                                <p class="type-location">
                                    <span class="type">Khách sạn</span>
                                    <span class="location">- Hà Nội, Hà Nội, Việt Nam</span>
                                </p>
                                <p class="type-r hidden-xs">Phòng riêng</p>
                                <p class="bedr-numguest">
                                    <span>Phòng ngủ: 1</span>
                                    <span>- Số khách tối đa: 5</span>
                                </p>
                            </div>
                            <div class="info-price more">
                                <p class="price-currency">
                                    <span>VND</span>
                                </p>
                                <p class="price-r">
                                    <!-- <span class="price-old">30</span> -->
                                    <span class="price-cur">20</span>
                                </p>
                                <p class="per-night">Một đêm</p>
                                <p class="type-sales">
                                    <!-- <span class="label label-default tag sales-text">Khuyến mãi phút cuối</span> -->
                                </p>
                                <a href="bookroom.html" class="btn btn-default more-show">Hiển thị thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
                <nav id="pagination">
                    <ul class="pagination">
                        <li>
                            <a href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li>
                            <a href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <!-- </div> -->
        </div>
    </div>
</section>
