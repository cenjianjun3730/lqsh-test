(function ($){
    $(function (){
        $(".introduction .ScrCont").width( ( $(".introduction .pro-case").parent().innerWidth() + parseInt($(".introduction .pro-case").parent().css("margin-right")) ) * ($(".introduction .pro-case").length * 2) );


        picrun_ini();
        
        $(".pro-case").hover(function (){
            $(this).find('img').addClass('blur');
            $(this).find('.pro-shade .search').stop().animate({
                opacity : 1
            }, 400);
            $(this).find('.pro-shade .title').stop().animate({
                bottom : 0
            }, 400);
        }, function (){
            $(this).find('img').removeClass('blur');
            $(this).find('.pro-shade .search').stop().animate({
                opacity : 0
            }, 400);
            $(this).find('.pro-shade .title').stop().animate({
                bottom : "-40px"
            }, 400);
        });

    });
})(jQuery);