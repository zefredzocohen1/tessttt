<section id="step">
    <div class="container">
        <div class="row">
            <div class="block">
                <div class="step-item">
                    <img src="<?php echo base_url();?>public/site/images/step-2.png" alt="step-1">
                    <ul>
                        <li>Địa chỉ</li>
                        <li class="active">Giá</li>
                        <li>Hình ảnh</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="main-post">
    <div class="container">
        <div class="row">
            <div class="block col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form class="form-horizontal">
                            <div class="panel panel-default post-item price-basic">

                                <div class="panel-heading">Mức giá cơ bản</div>
                                <div class="panel-body">
                                    <p>Đây là giá cơ sở tính theo đêm cho danh sách của bạn. Nếu không có các tùy chỉnh giá khác, giá cơ bản này sẽ được áp dụng cho tất cả các ngày trong lịch của bạn.</p>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Loại tiền tệ:</label>
                                        <div class="col-sm-2">
                                            <select class="form-control">
                                                <option>VNĐ</option>
                                                <option>USD</option>
                                                <option>EUR</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Theo đêm:</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Cuối tuần:</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-4 control-label">Chọn ngày để thiết lập giá cuối tuần:</label>
                                        <div class="col-sm-6">
                                            <label>
                                                <input type="checkbox"> Thứ 6
                                            </label>
                                            &nbsp;&nbsp;
                                            <label>
                                                <input type="checkbox"> Thứ 7
                                            </label>
                                            &nbsp;&nbsp;
                                            <label>
                                                <input type="checkbox"> Chủ nhật
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default price-long">
                                <div class="panel-heading">Định giá dài hạn</div>
                                <div class="panel-body">
                                    <p>Nếu bạn muốn có giá theo tuần hoặc theo tháng dành cho lưu trú dài hạn, bạn có thể sử dụng tùy chọn này. Thông thường chủ khách sạn sử dụng tùy chọn này để cung cấp giảm giá cho đợt lưu trú dài hơn.</p>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Theo tuần:</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Theo tháng:</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-default tien-nghi">
                                <div class="panel-heading">Tiền đặt cọc (Tùy chọn)</div>
                                <div class="panel-body">
                                    <p>Số tiền này được thu khi nhận phòng và trả lại khi trả phòng để bảo vệ các thiệt hại hoặc các vật dụng bị mất.  </p>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Tiền đặt cọc:</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <p>Lưu ý: Tiền đặt cọc (nếu có) chỉ được thu vào thời điểm nhận phòng. Chúng tôi KHÔNG xử lý khoản thanh toán này hoặc bồi hoàn tiền đặt cọc này.</p>
                                </div>
                            </div>

                            <div class="panel panel-default tien-nghi">
                                <div class="panel-heading">Chi phí bổ sung</div>
                                <div class="panel-body">

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Phí cho mỗi khách thêm:</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                            <span>Một đêm cho 1 khách sau số khách</span>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2 control-label">Phí dọn dẹp:</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control">
                                            <label>
                                                <input type="radio" name="price_clr" /> Một ngày/đêm
                                            </label>
                                            <label>
                                                <input type="radio" name="price_clr" /> Một lần ở
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="panel panel-default info">
                                <div class="panel-heading">Điều khoản</div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2">Chính sách hủy bỏ:</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control" />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputEmail3" class="col-sm-2">Quy định</label>
                                        <div class="col-sm-8">
                                            <textarea class="form-control" rows="5"></textarea>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="sub-step">
                                <div class="prev-step">
                                    <a href="postnews1.html" class="btn btn-default"><< Quay lại</a>
                                </div>
                                <div class="next-tep">
                                    <input type="submit" id="s-step2" value="Tiếp theo >>" class="btn btn-default" />
                                    <a href="postnews3.html" style="display:block;width: 127px; height:50px;z-index: 999;position: absolute;top:0;left:0"></a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>