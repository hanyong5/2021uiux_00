$(".menu>li").mouseenter(function(){
    $(this).children("a").css("background","blue");
    $(this).find(".submenu").stop().slideDown(200);

});
$(".menu>li").mouseleave(function(){
    $(".menu>li>a").css("background","initial")
    $(".submenu").stop().slideUp(100)
})

// $(".menu").mouseover(function(){
//     $(".submenu").stop().fadeIn(300)
// })
// $(".menu").mouseout(function(){
//     $(".submenu").stop().fadeOut(100)
// })