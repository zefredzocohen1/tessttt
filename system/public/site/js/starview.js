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
        $("#price-sort").on("click",function(){
            $("#price-sort").toggleClass("sort-reverse");
        });
    });
    $(function(){
        $('.checkbox input[type="checkbox"]', '.checkbox-inline input[type="checkbox"]').each(function () {
        $(this).prop("checked") && $(this).parent("label").addClass("checked"), $(this).prop("disabled") && $(this).parent("label").addClass("disabled")
        }), $(document).on("change", '.checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"]', function () {
            $(this).prop("checked") ? $(this).parent("label").addClass("checked") : $(this).parent("label").removeClass("checked")
        })
    });
    $(function(){
        var room_type = [];
        var amenities = '';
        var experiences = '';
        var bedroom =   '' ;
        var bathroom = '';
        var beds = '';
        var checkin = '';
        var checkout = '';
        var guest = '';
        $('.tclick').click(function(){
            var amenities = '';
            var experiences = '';
            var bedroom     =$('#bedroom').val();
            var bathroom    =$('#bathroom').val();
            var beds        =$('#beds').val();
            $('[name="amenities"]:checked').each(function(){
                amenities +=$(this).data('tloc')+',';
            })
            $('[name="experiences"]:checked').each(function(){
                experiences +=$(this).data('tloc')+',';
            })

            $("#room_type label.tclick ").each(function(index){
                var cur = $(this);
                data_tloc = cur.data('tloc');
    //            if(room_type.length==0){room_type.push(data_tloc);}
    //            else{
                    var index = room_type.indexOf(data_tloc);
                    if(index==-1){
                        room_type.push(data_tloc);
                    }else{
                        room_type.splice(index,1);
                    }
    //            }
            })
            $.ajax({
                url:url+'room/search',
                data:amenities,
                type:'POST',
                success:function(data){

                    console.log(data);
                },
                error:'',
                dataType: 'json',
            });
        })
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