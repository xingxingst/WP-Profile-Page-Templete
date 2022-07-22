var t_options = {
    speed_vary: true,
    mistype:0.1,
    blink	: true,
    blink_perm: true,
}

const skillitem =  document.querySelectorAll('#skills .column-half');
const CardsAnimatedClass = 'animated';


typeFirstAnimation()
initSkillCards()

$('a[href^=#]').click(function() {
    // スクロールの速度
    var speed = 500; // ミリ秒
    // アンカーの値取得
    var href= $(this).attr("href");
    // 移動先を取得
    var target = $(href == "#" || href == "" ? 'html' : href);
    // 移動先を数値で取得
    var position = target.offset().top;
    // スムーススクロール
    $('body,html').animate({scrollTop:position}, speed, 'swing');
    return false;
});


$('#skills .content-title').click(function() {
    $('#skills').removeClass(CardsAnimatedClass);
    initSkillCards()
    dealCardsAnimation(0,0,true)
});


$(window).scroll(function() {
    let scroll = $(window).scrollTop();
    let windowHeight = $(window).height();
    typeTitlesAnimation(scroll, windowHeight);
    dealCardsAnimation(scroll, windowHeight);
})


function initSkillCards(){
    let x = 0;
    let y = 0;
    let upIndex = 0;
    for(var i = 0; i < skillitem.length; i++){
        if(i === 0) continue
        x = i % 2 === 0 || window.outerWidth < 480? 0 : -110;
        upIndex = window.outerWidth < 480 ? -i : -Math.floor(i/2) ;
        y = (skillitem[i].offsetHeight +38) * upIndex - 4 * i;
        gsap.set(skillitem[i], {transform: `translate(${x}%, ${y}px)`,'z-index':skillitem.length - i});
    }
}



function typeFirstAnimation(){
    let first_options = t_options
    first_options['fin'] = elm => {
        elm.t_off();
        t_options['fin'] = elm => elm.t_off();
        $('.sub-title').t(t_options);
    }

    $('.glitch').t(first_options);
}


function typeTitlesAnimation(scroll, windowHeight){
    t_options['fin'] = elm => elm.t_off();
    $('.content-title > span').each(function() {
        if($(this).hasClass('typed')) return;
        var position = $(this).offset().top;
        if (scroll >position - windowHeight + windowHeight/3) {
            $(this).t(t_options);
            $(this).addClass('typed');
        }
    })
}



function dealCardsAnimation(scroll, windowHeight,exec = false){
    if($('#skills').hasClass(CardsAnimatedClass)) return;
    let position = $('#skills').offset().top;
    if (scroll < position - windowHeight + windowHeight/5 * 4 && !exec) return
    $('#skills').addClass(CardsAnimatedClass);
    for(var i = 0; i < skillitem.length; i++){
        if(i === 0) continue
        let amination_time = 0.3 * i; 
        var tl = new TimelineLite();
        tl.to(skillitem[i],(amination_time),{transform: 'translate(0, 0)','z-index':1, delay:amination_time});
    }
}
