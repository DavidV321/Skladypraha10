(function($){
    $(function(){

        $(".jq--scroll-lease").click(function() {
            $("html, body").animate({scroolTop: $(".jq--lease").offset().top}, 1000);
        });

    });

})(jQuery);