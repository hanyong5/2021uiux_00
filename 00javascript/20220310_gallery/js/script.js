console.log("연결완료");

$(document).ready(function(){

    // tab 이미지
    $(".thumb li").click(function(){
        let i = $(this).index();
        console.log(i);
        $("#image p").hide().eq(i).show();
    })


    let current = 0;
 
 
    // $(".right").click(function(){
    //     current++; //current = current + 1;
    // });
    // $(".left").click(function(){
    //     current--;
    // })


    //버튼적용
    $(".right").click(function(){ // next
        current++; //current = current + 1;
        if(current == 3) current = 0;
        console.log(current);
        move();
    });
    $(".left").click(function(){  // prev
        current--;
        if(current == -1) current = 2;
        console.log(current);
        move();
    });

    function move(){
        //$(".thumb ul").css("left",current * -760);
        
        $(".thumb ul").css({left : current * -100 + "%" });
        
        // let cNum = current * -760;
        // $(".thumb ul").stop().animate({left:cNum},300)
        
    }
})