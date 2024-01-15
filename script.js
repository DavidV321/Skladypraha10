(function($){
    $(function(){

        $(".jq--scroll-lease").click(function() {
            $("html, body").animate({scroollTop: $("#jq--lease").offset().top}, 1000);
        });

    });

})(jQuery);