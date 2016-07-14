<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Email thông báo đặt phòng thành công</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>
    <div>
          <div style="margin:0 auto;padding:15px;font-family:'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif;max-width:600px;display:block">
            <h3 style="margin:0 0 15px 0;padding:0;font-family:'HelveticaNeue-Light','Helvetica Neue Light','Helvetica Neue',Helvetica,Arial,'Lucida Grande',sans-serif;line-height:1.1;color:#111111;font-weight:500;font-size:27px">Xin chào <?php echo 'bạn'?></h3>
    <p style="margin:15px 0;padding:10px;font-family:'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif;font-weight:normal;font-size:14px;line-height:1.6;background-color:#c7eddd;color:#111111">Chào mừng bạn đến <?php echo $home_page?>! Vui lòng dành một giây để <span class="il">xác</span> <span class="il">nhận</span> đặt phòng của bạn bằng cách nhấn vào nút bên dưới:</p>
    <a href="<?php echo base_url();?>/user/confirm=<?php echo md5($user_name.$email).'&amp;id_room='.$post_room_id.'&amp;price='.$price.'&amp;ch_in='.$check_in.'&amp;ch_out='.$check_out;?>" style="display:inline-block;background:#33b76d;font-size:16px;color:#ffffff;padding:7px 30px;font-weight:bold;text-align:center;font-family:'Helvetica Neue','Helvetica',Arial,sans-serif;text-decoration:none" target="_blank" data-saferedirecturl="https://www.google.com/url?hl=vi&amp;q=http://www.homeaway.com.vn/tracking?click%3Dhttp%253A%252F%252Fwww.homeaway.com.vn%252Fusers%252Fverify%253Ftoken%253DLS0tCjpjaWQ6IDI3MzVZUk4KOmNvZGU6ICc1MjQ1Jwo%25253D--2923272d8246d1f36f445c72f5597aaaa93bbb7b%26utm_campaign%3Dsend_email_verification_code%26utm_medium%3Demail%26utm_source%3Dhomeaway&amp;source=gmail&amp;ust=1466566012400000&amp;usg=AFQjCNEohYcdhxqywgonmHVokVhvqr7IqQ"><span class="il">Xác</span> <span class="il">nhận</span> đặt phòng&nbsp;»</a><br><br>
    <div style="margin:0;padding:10px;font-family:'Helvetica Neue','Helvetica',Arial,sans-serif;font-weight:normal;font-size:14px;line-height:1.6;background-color:#ebebeb;color:#111111"><p>Thông tin đặt phòng </p>
    <div style="margin:0 auto;font-family:'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif;max-width:600px;display:block">
        <p style="margin:0 auto;font-family:'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif;max-width:600px;display:block">Tên phòng: Villa Santai - Kuta - 4 Bedrooms</p>
        <p style="margin:0 auto;font-family:'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif;max-width:600px;display:block"> SDT: +841656228578</p>
        <p style="margin:0 auto;font-family:'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif;max-width:600px;display:block">Đặt phòng từ ngày:06/15/2016 </p>
        <p style="margin:0 auto;font-family:'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif;max-width:600px;display:block">Đặt phòng đến ngày:06/22/2016 </p>
        <p style="margin:0 auto;font-family:'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif;max-width:600px;display:block">Giá: VNĐ 1,500,000</p>
    </div> 
</div>
          </div>


    </div>
</body>
</html>