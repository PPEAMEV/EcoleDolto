$(document).ready(function () {

    //Fix Errors - http://www.learningjquery.com/2009/01/quick-tip-prevent-animation-queue-buildup/

    //Remove outline from links
    $("a").click(function () {
        $(this).blur();
    });

    //When mouse rolls over
    $("li").mouseover(function () {
        $(this).stop().animate({
            height: '400px'
        }, {
            queue: false,
            duration: 150,
            easing: 'easeInQuad'
        })
    });

    //When mouse is removed
    $("li").mouseout(function () {
        $(this).stop().animate({
            height: '50px'
        }, {
            queue: false,
            duration: 600,
            easing: 'easeOutBounce'
        })
    });

});