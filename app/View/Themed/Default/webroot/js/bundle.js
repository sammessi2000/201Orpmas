wow = new WOW(
    {
        boxClass: 'wow',      // default
        animateClass: 'animated', // default
        offset: 50,          // 0 default
        mobile: true,       // default
        live: true        // default
    }
)
wow.init();
var curr_link_ss = window.location.href;

if (curr_link_ss == DOMAIN + 'contact') {
    $('.categories-menu#438').addClass('focus-category');
}

var prePos = 0;
scrollPos = $(window).scrollTop();
var banner_height = $('.first-banner').height();
var menu_height = $('.menu')[0].offsetHeight;
var header_height = $('.header')[0].offsetHeight;
function scrollFunc() {
    if (!$(".menu").hasClass('active')) {
        if (scrollPos > banner_height - 100) {
            $(".header").css({
                'background-color': 'rgba(255, 255, 255, 0.9)',
                'padding-top': '7px',
                'padding-bottom': '7px',
                'box-shadow': 'rgba(0, 0, 0, .24) 3px 3px 3px',
            });
            $(".logo-image").css('filter', 'invert(100%)');
            $(".categories-menu>a").css('color', '#212121');
            $(".border-hover").css('border-bottom', 'solid 2px black');
            $(".btn-menu-a svg line").css('stroke', 'black');
            $('svg.down').css('stroke', 'black');
            // $(".language-dropdown-item-box").css('background-color','rgba(255, 255, 255, 0.9)')
        }
        else {
            $(".header").css({
                'background-color': 'unset',
                'padding-top': '24px',
                'padding-bottom': '24px',
                'box-shadow': 'unset',
            });
            $(".logo-image").css('filter', 'unset');
            $(".categories-menu>a").css('color', '#fff');
            $(".border-hover").css('border-bottom', 'solid 2px white');
            $(".btn-menu-a svg line").css('stroke', 'white');
            $('svg.down').css('stroke', 'white');

            // $(".language-dropdown-item-box").css('background-color','unset')
        }
    }
}
scrollFunc();
function opa(pos) {
    let o = 1, p = 75, b = '', s = 1;
    for (let i = 100; i < banner_height + 100; i += 100) {
        if (pos < i) {
            b = p + 'px';
            $('.slogan').css({ 'opacity': o, 'transform': 'scale(' + s + ')', });
            $('.welcome').css('bottom', b);
            break;
        }
        else {
            o -= 0.1;
            p += 66;
            s -= 0.01;
        }
    }
}
opa(scrollPos);

var opa1 = 1;
$(window).scroll(function () {
    scrollPos = $(this).scrollTop()
    scrollFunc();
    opa(scrollPos);
});
$("body").click(function (e) {
    //I hope it will stop the event to bubble up

    if ($(".language-dropdown-item-box").hasClass('active')) {
        $(".language-dropdown-item-box").removeClass('active');
        e.preventDefault();
        e.stopPropagation();
        return false;
    }
    if ($(".menu").hasClass('active')) {

        $(".btn-menu").click();
        e.preventDefault();
        e.stopPropagation();
        return false;
    }
    scrollFunc();

});
$('.choose-lang').click(function (e) {
    if ($(".language-dropdown-item-box").hasClass('active')) {
        $(".language-dropdown-item-box").removeClass('active');
    }
    else {
        $(".language-dropdown-item-box").addClass('active');
    }
    e.preventDefault();
    e.stopPropagation();
    return false;
});

$(".btn-menu").click(function (e) {
    if ($(".language-dropdown-item-box").hasClass('active')) {
        $(".language-dropdown-item-box").removeClass('active');
    }
    if ($(".menu").hasClass('active')) {
        $(".menu").removeClass('active');
        $('.header').css('height', header_height);
        $('.language-dropdown-item-box').css('top', '80%');
        $('.btn-menu svg.svg-menu').css('display', 'block');
        $('.btn-menu svg.svg-close').css('display', 'none');
        scrollFunc();

    }
    else {
        $('.menu').addClass('active');
        $('.header').css('height', header_height + menu_height);
        $('.language-dropdown-item-box').css('top', '15%');
        $('.btn-menu svg.svg-menu').css('display', 'none');
        $('.btn-menu svg.svg-close').css('display', 'block');
        if (scrollPos > banner_height - 100) {
            $(".header").css('background-color', 'rgba(255, 255, 255, 0.9)');
        }
        else {
            $('.header').css('background-color', 'rgba(0, 0, 0, 0.75)');
        }
    }
    e.preventDefault();
    e.stopPropagation();
    return false;
});

if (curr_link_ss == DOMAIN + '404.html') {
    if (!$(".menu").hasClass('active')) {
        $(".header").css({
            'background-color': 'rgba(255, 255, 255, 0.9)',
            'padding-top': '7px',
            'padding-bottom': '7px',
        });
        $(".logo-image").css('filter', 'invert(100%)');
        $(".categories-menu a").css('color', '#555');
        $(".border-hover").css('border-bottom', 'solid 2px black');
        $(".btn-menu-a svg line").css('stroke', 'black');

    }
}

var lazyLoadInstance = new LazyLoad({});
var md_height = 0;
function matchScreen(x) {

    if (x.matches) { // If media query matches

        $('.destin-modal .modal-item-img').height(350);
    }
    else {
        setTimeout(function () {
            md_height = $('.destin-modal .modal-item-text').height();
            if (md_height < 350) {
                md_height = 350;
            } $('.destin-modal .modal-item-img').height(md_height);
            // console.log(md_height);
        }, 1000);
    }
}

function calcScreen(a) {
    matchScreen(a);
    a.addListener(matchScreen);
}
var match = window.matchMedia("(max-width: 768px)");

function show_destin_vi(node_id) {
    $('.destin-modal').addClass('scaleUp');
    $('body').css('overflow', 'hidden');
    $.ajax({
        type: "post",
        url: DOMAIN + 'default/node/get_pro_data/' + node_id,
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log('success');
            $('.destin-modal .modal-item-img img').attr({
                'src': DOMAIN + response.data['image'],
                'alt': response.data['title'],
            });
            $('.destin-modal .modal-item-title').html(response.data['title']);
            $('.destin-modal .modal-item-content').html(response.data['content']);
        },
        error: function (err) {
            console.log('error', err);
        }
    });

    calcScreen(match);

}

function show_destin_en(node_id) {
    $('.destin-modal').addClass('scaleUp');
    $('body').css('overflow', 'hidden');
    $.ajax({
        type: "post",
        url: DOMAIN + 'default/node/get_pro_data/' + node_id,
        data: "data",
        dataType: "json",
        success: function (response) {
            console.log(response);
            $('.destin-modal .modal-item-img img').attr({
                'src': DOMAIN + response.data['image'],
                'alt': response.data['title_en'],
            });
            $('.destin-modal .modal-item-title').html(response.data['title_en']);
            $('.destin-modal .modal-item-content').html(response.data['content_en']);
        }
    });

    calcScreen(match);

}

function submit_contact() {
    validate();
    if (validate()) {
        var data = {
            fullname: fullname.val(),
            email: email.val(),
            content: message.val(),
        }

        sbm_btn.removeAttr('onclick');
        $.ajax({
            type: "post",
            url: DOMAIN + 'default/contact/submit_contact',
            data: data,
            dataType: "html",
            success: function (res) {
                if (res == 'done') {

                    Swal.fire({
                        icon: "success",
                        //text: "'.$str.'",
                        text: "Success! your message was sent",
                        confirmButtonColor: '#0D88FF'
                    }).then(function () {
                        location.reload();
                    })
                }

            }
        });
    }
}

function show_destin_pr_vi(node_id) {
    $('.destin-modal-pr').addClass('scaleUp');
    $('body').css('overflow', 'hidden');
    $.ajax({
        type: "post",
        url: DOMAIN + 'default/node/get_pro_data/' + node_id,
        data: "data",
        dataType: "json",
        success: function (response) {
            $('.destin-modal-pr .modal-item-img img').attr({
                'src': DOMAIN + response.data['image'],
                'alt': response.data['title'],
            });
            $('.destin-modal-pr .modal-item-title').html(response.data['title']);
            $('.destin-modal-pr .modal-item-content').html(response.data['content']);
        }
    });
    $('.destin-modal-pr .modal-item-img').height(350);
}

function show_destin_pr_en(node_id) {
    $('.destin-modal-pr').addClass('scaleUp');
    $('body').css('overflow', 'hidden');
    $.ajax({
        type: "post",
        url: DOMAIN + 'default/node/get_pro_data/' + node_id,
        data: "data",
        dataType: "json",
        success: function (response) {
            $('.destin-modal-pr .modal-item-img img').attr({
                'src': DOMAIN + response.data['image'],
                'alt': response.data['title_en'],
            });
            $('.destin-modal-pr .modal-item-title').html(response.data['title_en']);
            $('.destin-modal-pr .modal-item-content').html(response.data['content_en']);
        }
    });
    $('.destin-modal-pr .modal-item-img').height(350);
}

var fullname = $('.frmcontact .name');
var email = $('.frmcontact .email');
var message = $('.frmcontact .message');
var sbm_btn = $('.frmcontact .submit-btn');

function validate() {
    if (fullname.val() == '') {
        Swal.fire({
            icon: 'warning',
            text: 'Please type your name!',
            confirmButtonColor: '#0D88FF'
        });
        return false;
    }
    if (email.val() == '') {
        Swal.fire({
            icon: 'warning',
            text: 'Please type your email!',
            confirmButtonColor: '#0D88FF'
        });
        return false;
    }

    // let re = /((09|03|07|08|05)+([0-9]{8})\b)/g;
    // // console.log(phone);

    // if (re.test(phone) == false || phone.length != 10) {
    //     Swal.fire({
    //         icon: 'warning',
    //         // title: 'Vui lòng nhập số điện thoại!',
    //         text: 'Số điện thoại của bạn sai định dạng!',
    //         confirmButtonColor: '#ed6522'
    //     });

    //     return false;
    // }

    // return true;
    let re = /\S+@\S+\.\S+/;
    // console.log(email.val());

    if (re.test(email.val()) == false) {
        Swal.fire({
            icon: 'warning',
            // title: 'Vui lòng nhập số điện thoại!',
            text: 'Your email format was wrong!',
            confirmButtonColor: '#0D88FF',
        });
        return false;
    }

    if (message.val() == '') {
        Swal.fire({
            icon: 'warning',
            text: 'Please type your message!',
            confirmButtonColor: '#0D88FF'
        });
        return false;
    }
    return true;
}

$(document).ready(function () {
    let i = -180;
    $('.scroll').css('transform', 'rotate(-180deg)');
    setInterval(function () {
        i -= 180;
        let rotate = 'rotate(' + i + 'deg)';
        $('.scroll').css('transform', rotate);
    }, 20000);
    $('.arrow').click(function () {
        let cPos = $('.first-banner')[0].offsetTop + $('.first-banner')[0].offsetHeight;

        $("html, body").animate({ scrollTop: (cPos / 3) }, 300);

    });

    $('.destin-modal').css('display', 'flex');
    $('.destin-modal-pr').css('display', 'flex');
    $('.modal-shadow').click(function () {
        $('.destin-modal').removeClass('scaleUp');
        $('.destin-modal-pr').removeClass('scaleUp');
        $('body').css('overflow', 'unset');
        $('.modal-item-img img').attr({
            'src': '',
            'alt': '',
        });
        $('.modal-item-title').html('');
        $('.modal-item-content').html('');
        $('.modal-item-img').height(0);
    });
    $('.destin-modal svg').click(function () {
        $('.destin-modal').removeClass('scaleUp');
        $('body').css('overflow', 'unset');
        $('.modal-item-img img').attr({
            'src': '',
            'alt': '',
        });
        $('.modal-item-title').html('');
        $('.modal-item-content').html('');
        $('.modal-item-img').height(0);
    });

    $('.destin-modal-pr svg').click(function () {
        $('.destin-modal-pr').removeClass('scaleUp');
        $('body').css('overflow', 'unset');
        $('.modal-item-img img').attr({
            'src': '',
            'alt': '',
        });
        $('.modal-item-title').html('');
        $('.modal-item-content').html('');
        $('.modal-item-img').height(0);
    });

});