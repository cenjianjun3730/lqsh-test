(function ($){
    $(function (){
        $(".card a").hover(function (){
            $(this).find('.card-more').children('span').hide() && $(this).find('.card-more').children('div').show();
        }, function (){
            $(this).find('.card-more').children('span').show() && $(this).find('.card-more').children('div').hide();
        })
    })
})(jQuery);