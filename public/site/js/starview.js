//--------------------------------Bookroom---------------------------------------

    $(document).ready(function(){
        if( $(window).width() > 768){
            $(function() {
                var offset = $("#book-right").offset();
                var bottom = $("#book-main").outerHeight(true) ;
                var topPadding = 0;
//                $(window).scroll(function() {
//                    alert($(window).scrollTop());
//                    if ($(window).scrollTop() >= offset.top & $(window).scrollTop() < bottom) {
//                        $("#book-right").stop().animate({
//                            marginTop: $(window).scrollTop() - offset.top + topPadding
//                        });
//                    } else if($(window).scrollTop() >= bottom){
//                        $("#book-right").stop().animate({
//                            marginTop: bottom - offset.top
//                        });
//
//                    }
//                    else{
//                        $("#book-right").stop().animate({
//                            marginTop: 0
//                        });
//                    };
//
//                });
            });
        }
    });

//------------------------------------------Listroom------------------------------------------

$(document).ready(function(){
    $(function() {
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 1000,
            values: [ 0, 1000 ],
            slide: function( event, ui ) {
                $( "#min-amount" ).val( "$" + ui.values[ 0 ] );
                $( "#max-amount" ).val( "$" + ui.values[ 1 ] );
            },
            change:function(ev, ui){
                $('#list-room').html('');
                var data = {};
                var location = $('#location');
                var checkin = $('#checkin');
                var checkout=$('#checkout');
                var guest=$('#guest');
                var amenities = '';
                var experiences = '';
                var bedroom = $('#bedroom');
                var bathroom =$('#bathroom');
                var beds =$('#beds');
                var popular_sort = $('#popular-sort');
                var price_sort = $('#price-sort');
                
                if(typeof location !==undefined && location.val() !='')data['location'] = location.val();
                if(typeof checkin !==undefined && checkin.val() !='')data['checkin'] = checkin.val();
                if(typeof checkout !==undefined && checkout.val() !='')data['checkout'] = checkout.val();
                if(typeof guest !==undefined && guest.val() !='')data['guest'] = guest.val();
                
                if(typeof amenities !==undefined && amenities !='')data['amenities'] = amenities;
                if(typeof experiences !==undefined && experiences !='')data['experiences'] = experiences;
                if(typeof bedroom !==undefined && $.isNumeric(bedroom.val()))data['bedroom'] = bedroom.val();
                if(typeof bathroom !==undefined && $.isNumeric(bathroom.val()))data['bathroom'] = bathroom.val();
                if(typeof beds !==undefined && $.isNumeric(beds.val()))data['beds'] = beds.val();
                var t = $(this);
                if(typeof popular_sort !==undefined && popular_sort.val()!=''){
                    if(t.hasClass('active')&&t.hasClass('popular')){
                        data['sort'] = 0;
                    }
                }
                if(typeof price_sort !==undefined && t.hasClass('sort')){
                    if(t.hasClass('active')){
                        if(t.hasClass('sort-reverse'))data['sort']=1;
                        else data['sort'] = 2;
                    }
                }
                if(ui.values[0] >0){
                    data['min_amount'] = ui.values[0];
                }
                if(ui.values[1]<1000 ){
                    data['max_amount'] = ui.values[1];
                };
                var xhr = $.ajax({
                    url:url+'room/ajax_search',
                    data:data,
                    type:'GET',
                    success:function(data){
                        if(typeof data['error']!==undefined){
                            $('#list-room').html('');
                        }
                        if(typeof data['table_content'] !==undefined){
                            $('#list-room').html(data['table_content']);
                        }
                    },
                    error:'',
                    dataType: 'json',
                })
            }
        });
        $( "#min-amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ));
        $( "#max-amount" ).val( "$" + $( "#slider-range" ).slider( "values", 1 ));
    });

    $(function(){
        $("#filter-control").on("click",function(){
            $("#sidebar").toggleClass("show");
        });
    });

    $(function(){
//        $("#price-sort").on("click",function(){
//            $("#price-sort").toggleClass("sort-reverse");
//        });
    });
    $(function () {
    $(document).on("click.bs.button.data-api", ".btn-group .btn", function () {
        var t = $(this);
        if (t.hasClass("sort") && !t.hasClass("active")) {
        }else if (t.hasClass("sort") && t.hasClass("active")) {
            var e = $(this).find("input");
            if (t.hasClass("sort-reverse")) {
                t.removeClass("sort-reverse");
                var i = e.attr("data-value");
                i && e.val(i);
            } else {
                t.addClass("sort-reverse");
                var i = e.attr("data-value-reverse");
                i && e.val(i);
            }
            e.change();
        }
        
        if(t.hasClass('popular')&&!t.hasClass('active')){
            console.log('search: popular '+$(this).find('input').val());
        }
    }).on("click.bs.button.data-api", ".btn.disabled", function (t) {
        t.stopPropagation();
    })
})
    $(function(){
        $('.checkbox input[type="checkbox"]', '.checkbox-inline input[type="checkbox"]').each(function () {
        $(this).prop("checked") && $(this).parent("label").addClass("checked"), $(this).prop("disabled") && $(this).parent("label").addClass("disabled")
        }), $(document).on("change", '.checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"]', function () {
            $(this).prop("checked") ? $(this).parent("label").addClass("checked") : $(this).parent("label").removeClass("checked")
        })
    });
    $(function(){
        var room_type = '';
        var amenities = '';
        var experiences = '';
        var bedroom = $('#bedroom');
        var bathroom =$('#bathroom');
        var beds =$('#beds');
        var min_amount =$('#min-amount');
        var max_amount =$('#max-amount');
        var popular_sort = $('#popular-sort');
        var price_sort = $('#price-sort');
        var location = $('#location');
        var checkin = $('#checkin');
        var checkout=$('#checkout');
        var guest=$('#guest');
        $('.tclick').click(function(){
            var currentclick = $(this);
            if(currentclick.parent().hasClass('book-action')){
                var checkin = $('#bookin-dpk');
                var checkout = $('#bookout-dpk');
                var guest = $('#guests');
                console.log(typeof $('#name_customer'));
                if(typeof $('#name_customer')==undefined || $('#name_customer').val()=='' ||typeof $('#phone_number')==undefined || $('#phone_number').val()=='' ||typeof $('#email')==undefined || $('#email').val()=='')
                {
                    $('#myModal').modal('show');
                    return;
                }
                if(checkin.val()==''||typeof checkin.val() == undefined){
                    $('.info-book').html('nhập ngày nhận phòng');
                    return;
                }
                if(checkout.val()==''||typeof checkout.val() == undefined){
                    $('.info-book').html('nhập ngày trả phòng');
                    return;
                }
                if(guest.val()==''||typeof guest.val() == undefined){
                    $('.info-book').html('nhập số khách');
                    return;
                }
                window.location.href = url+'room/order_room/'+id+'?checkin='+checkin.val()+"&checkout="+checkout.val()+"&guests="+guest.val();
            }
            else{
                var checkin = $('#checkin');
                var checkout=$('#checkout');
                var guest=$('#guest');
                var amenities = '';
                var experiences = '';      
                $('[name="amenities"]:checked').each(function(){
                    amenities +=$(this).data('tloc')+',';
                })
                $('[name="experiences"]:checked').each(function(){
                    experiences +=$(this).data('tloc')+',';
                })
                var currentthis = $(this);
                var room_types = '';
                var data = {};
                if(typeof location !==undefined && location.val() !='')data['location'] = location.val();
                if(typeof checkin !==undefined && checkin.val() !='')data['checkin'] = checkin.val();
                if(typeof checkout !==undefined && checkout.val() !='')data['checkout'] = checkout.val();
                if(typeof guest !==undefined && guest.val() !='')data['guest'] = guest.val();
                
                if(typeof amenities !==undefined && amenities !='')data['amenities'] = amenities;
                if(typeof experiences !==undefined && experiences !='')data['experiences'] = experiences;
                if(typeof bedroom !==undefined && $.isNumeric(bedroom.val()))data['bedroom'] = bedroom.val();
                if(typeof bathroom !==undefined && $.isNumeric(bathroom.val()))data['bathroom'] = bathroom.val();
                if(typeof beds !==undefined && $.isNumeric(beds.val()))data['beds'] = beds.val();
                if(typeof min_amount !==undefined ){
                    var min_value = min_amount.val().split('$')[1];
                    if(parseInt(min_value)>0) data['min_amount'] = min_value;
                }
                if(typeof max_amount !==undefined ){
                    var max_value = max_amount.val().split('$')[1];
                    if(parseInt(max_value)<1000) data['max_amount'] = max_value;
                }
                var t = $(this);
                if(typeof popular_sort !==undefined && popular_sort.val()!=''){
                    if(!t.hasClass('active')&&t.hasClass('popular')){
                        data['sort'] = 0;
                    }
                }
                if(typeof price_sort !==undefined && t.hasClass('sort')){
                    if(!t.hasClass('active')){
                        if(t.hasClass('sort-reverse'))data['sort'] = 2;
                        else data['sort'] = 1;
                    }else{
                        if(t.hasClass('sort-reverse'))data['sort']=1;
                        else data['sort'] = 2;
                    }
                }
//                if(!t.hasClass('active')&&t.attr('data-tloc')=='entire_home_or_apt'){
//                    console.log('nguyen can');
//                };
                var xhr = $.ajax({
                    url:url+'room/ajax_search',
                    data:data,
                    type:'GET',
                    success:function(data){
                        if(typeof data['error']!==undefined){
                            $('#list-room').html('');
                        }
                        if(typeof data['table_content'] !==undefined){
                            $('#list-room').html(data['table_content']);
                        }
                    },
                    error:'',
                    dataType: 'json',
                })
            }
        })
    });
    $(function(){
            $('#language li').click(function(){
                var language = $(this).find('a');
                var data = {language:language.data('value')};
            $('#language').find('.icon-language span').html(language.html());
            var urlCurrent = window.location.href;
            $.ajax({
                url:url+'language',
                    dataType: 'json',
                    success: function (data) {
                        window.location.href = urlCurrent;
                    },
                    data: data,
                    type: 'POST'
            });
        });
        }); 
})

//----------------------------------------------------Index--------------------------------------------

    $(document).ready(function(){
        //sticky navigation
        var nav = document.querySelector('#navigation');
        document.addEventListener('scroll', function(){
            if(window.scrollY >= 20){
                nav.classList.add('sticky');
            }else{
                nav.classList.remove('sticky');
            }
        });

        //wow.js
        new WOW().init();


        //owl-caorousel
        var owl = $(".owl-carousel");
        owl.owlCarousel({
            margin:100,
            loop:true,
            autoplay:true,
            // nav:true,
            // navText:['<i class="glyphicon glyphicon-menu-left"></i>','<i class="glyphicon glyphicon-menu-right"></i>'],
            autoplayTimeout:1500,
            autoplayHoverPause:true,
            autoplaySpeed: 1000,
            dotsSpeed: 400,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                },
                600:{
                    items:3,
                },
                1000:{
                    items:3,
                }
            }
        });
    });