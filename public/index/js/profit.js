$(function () {
    var w = $(document).width();
    var li = $('.header1 .nav .nav-list>li');
    var liL = li.eq(0).offset().left - $('.nav .nav-main .logo').offset().left;
    var navH = $('.header1 .nav').innerHeight();
    $('.nav-list-son>li .a-tit').css({
        marginLeft: liL + 'px'
    })

    if (w > 768) {
        $('.header1 .nav-list').hover(function () {
            $('.header1 .mask').fadeIn();
        }, function () {
            $('.header1 .mask').fadeOut();
        })
        $(li).each(function () {
            var son = $(this).find('.nav-list-son .a-tit li');
            son.on('mouseover', function () {
                var imgLi = son.parents('.nav-toogle-box').find('.nav-image li')
                var i = $(this).index();
                son.removeClass('active');
                $(this).addClass('active');
                imgLi.removeClass('active');
                imgLi.eq(i).addClass('active');
            })
        })
        $(li).hover(function () {
            var toogH = $(this).find('.nav-toogle-box').innerHeight();
            $('.nav').addClass('nav-active').stop().animate({
                height: navH + toogH + 'px',
            });
            $('.nav-toogle-box').hide();
            $(this).find('.nav-toogle-box').show();
        }, function () {
            $('.header1 .nav').stop().animate({
                height: navH + 'px',
            }, function () {
                $('.nav-toogle-box').hide();
            });

        })
    } else {
        $(li).on('click', function () {
            var tog = $(this).find('.nav-toogle-box');
            $(this).toggleClass('active');
            if (tog.css('display') == 'block') {
                tog.slideUp();
                $(this).removeClass('active');
            } else {
                $('.nav-toogle-box').slideUp();
                tog.slideDown();
                $(li).removeClass('active');
                $(this).addClass('active');
            }
        })
    }
    var key = true;
    $('.header1 .cur_icon').on('click', function () {
        if (key) {
            $('.header1 .nav .nav-list').slideDown();
            setTimeout(function () {
                $('.header1 .nav .nav-list').removeClass('nav-list-active');
                $('.header1 .nav .nav-list>li').each(function (i) {
                    $(this).css({
                        transitionDelay: 0.1 + i * 0.1 + 's'
                    })
                })
            }, 200);
            key = false;
        } else {
            $('.header1 .nav .nav-list').slideUp();
            $('.header1 .nav .nav-list').addClass('nav-list-active');
            key = true;
        }

        $(this).toggleClass('cur_active');
    })
    $('.header1 .user-list .search').on('click', function () {
        $('.header1 .searchs').fadeToggle();
        $('.header1 .search-box').slideToggle();
        $('.header1 .search-text').focus();
        $('.user-box').slideUp();
        return false;
    })
    $('.search-box').on('click', function (e) {
        $(this).show();
        e.stopPropagation();
    })
    $('.user-list .user').on('click', function (e) {
        var box = $(this).find('.user-box')
        if (box.css('display') == 'none') {
            $('.user-box').slideUp();
            box.slideDown();
            $('.search-box').slideUp();
            $('.header1 .searchs').fadeOut();
        } else {
            box.slideUp();
        }
        e.stopPropagation();
    })
    $('.user-box').on('click', function (e) {
        $(this).show();
        e.stopPropagation();
    })
    $(document).on('click', function () {
        $('.search-box').slideUp();
        $('.user-box').slideUp();
        $('.header1 .searchs').fadeOut();
    })

})//导航栏1




$(function () {
    var len = $('.img-list li').length + 1,
        nowIndex = 0,
        timer = null,
        flag = true,
        dW = $(document).width();

    createSlider();
    autoMove();
    bindEventSlider();


    function createSlider() {
        $('.img-list li').eq(0).clone().appendTo('.img-list');
        $('.img-list li').eq(0).addClass('active');
        $('.img-list li').width(1 / len * 100 + '%');
        $('.img-list').width(len * 100 + '%');
        $('.img-list li').eq(0).find('.tit').show().css({
            top: '50%'
        })
        var str = '';
        for (var i = 0; i < $('.img-list li').length - 1; i++) {
            if (i == 0) {
                str += '<li class="active"></li>'
            } else {
                str += '<li></li>'
            }
        }
        $('.cur-list').append(str);
        $('.img-list li').eq(0).find('.tit').show().css({
            top: '50%'
        })
    }

    function bindEventSlider() {
        $('.cur-list li').add('.prev-btn').add('.next-btn').on('click', function () {
            if ($(this).attr('class') == 'prev-btn') {
                move('prev-btn')
            } else if ($(this).attr('class') == 'next-btn') {
                move('next-btn')
            } else {
                move($(this).index())
            }
        })
        $('.slider').on('mouseover', function () {
            clearTimeout(timer)
        }).on('mouseout', function () {
            autoMove();
        })
        swiper()
    }

    function swiper() {
        var startX, startY, firsTime, lastTime;
        $(".img-list").on("touchstart", function (e) {
            startX = e.originalEvent.changedTouches[0].pageX;
            startY = e.originalEvent.changedTouches[0].pageY;
            firstTime = new Date();

        });
        $(".img-list").on("touchmove", function (e) {
            var moveEndX = e.originalEvent.changedTouches[0].pageX,
                moveEndY = e.originalEvent.changedTouches[0].pageY,
                X = moveEndX - startX,
                Y = moveEndY - startY;
            lastTime = new Date();
            var time = lastTime - firstTime;
            e.preventDefault();
            if (X > 0 && Y) {
                move('prev-btn');
            }
            else if (X < 0) {
                move('next-btn');
            }
        });
    }//移动端左右滑动事件



    function move(value) {
        if (flag) {
            flag = false;
            if (value == 'prev-btn') {
                if (nowIndex == 0) {
                    $('.img-list').css({
                        left: -(len - 1) * 100 + '%'
                    })
                    nowIndex = len - 2;
                } else {
                    nowIndex--;
                }
            } else if (value == 'next-btn') {
                nowIndex++;
                if (nowIndex == len - 1) {
                    $('.img-list').animate({
                        left: -(len - 1) * 100 + '%'
                    }, function () {
                        $(this).css({
                            left: '0%'
                        })
                    });
                    nowIndex = 0;
                }
            } else {
                nowIndex = value
            }
            changeIndex(nowIndex);
            sliderMove();
        }
    }

    function sliderMove() {
        $('.img-list').animate({
            left: -nowIndex * 100 + '%'
        }, function () {
            flag = true;
            autoMove();
        })
    }

    function changeIndex(index) {
        $('.cur-list .active').removeClass('active');
        $('.cur-list li').eq(index).addClass('active');
    }

    function autoMove() {
        clearTimeout(timer);
        timer = setTimeout(function () {
            move('next-btn');
        }, 3000)
    }

})//轮播


function bind() {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 600) {
            $('.service').add('.top-box').fadeIn();
        } else {
            $('.service').add('.top-box').fadeOut();
        }
        $('.about .context-box').fadeIn();
    })
    $('.top-box').on('click', function () {
        $('html,body').animate({
            scrollTop: '0'
        })
    })
    $('.color').on('click', 'li', function () {
        $('.color li').removeClass('active');
        $(this).addClass('active');
    })
    $('.checkbox .cur').on('click', function () {
        var par = $(this).parents('.checkbox')
        if (par.hasClass('active')) {
            par.removeClass('active');
            par.find('input').val('false');
        } else {
            par.addClass('active');
            par.find('input').val('true');
        }
    })
    $('.thumb .t-box').one('click', function () {
        $(this).parent().addClass('active');
        var num = parseFloat($(this).find('.num').text());
        num++;
        $(this).find('.num').text(num);
    })
    $('.tab-btn button').on('click', function () {
        $('.tab-btn button').removeClass('active');
        $(this).addClass('active');
        $('.tab-list>li').fadeOut();
        $('.tab-list>li').eq($(this).index()).fadeIn();
    })

    $('.settle-box .check-box-a').on('click', function () {
        var risk = parseFloat($('.mon .risk').text());
        var modes = parseFloat($('.mon .modes').text());
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).find('input').val('false');
            $('.tol .pay-allPrice').text(parseFloat(initPrice()) + modes + '$');
        } else {
            $(this).addClass('active');
            $(this).find('input').val('true');
            $('.tol .pay-allPrice').text((parseFloat(initPrice()) + modes + parseFloat(risk)).toFixed(2) + '$');
        }
    })
}
bind()

function demap() {
    var bigList = $('.main-pic li');
    var len = bigList.length;
    var img = bigList.find('img');
    var arr = [];
    var w = $('.map .left').width();
    var index = 0;
    var now;
    var left = $('.alert-box .left-btn');
    var right = $('.alert-box .right-btn');
    var marginL = 1 / 4 / len * 5;
    var moveS = 1 / 4 / len * 100;
    var moveB = 1 / len * 100;
    bigList.width(1 / len * 99.6 + '%').css({
        margin: 1 / len * 0.2 + '%'
    });
    $('.main-pic').width(len * 100 + '%');
    img.each(function () {
        var src = $(this).attr('src');
        arr.push(src);
    })
    function render() {
        var str = '';
        arr.forEach(function (ele, index) {
            if (index == 0) {
                str += '<li class="active"><img src="' + ele + '"<li>'
            } else {
                str += '<li><img src="' + ele + '"<li>'
            }
        })
        $('.cur-pic').append(str);
        $('.alert-img').append(str);
    }
    render();
    var sList = $('.cur-pic li');
    $('.cur-pic').width(len * 100 + '%');
    sList.width(1 / 4 / len * 95 + '%').css({
        marginRight: marginL + '%'
    });
    $('.cur-pic').on('mouseover', 'li', function () {
        index = $(this).index();
        sList.removeClass('active');
        $(this).addClass('active');
        $('.main-pic').css({
            transform: 'translateX(' + -moveB * index + '%)'
        })
        if (index == 0) {
            $(this).parent().css({
                transform: 'translateX(0%)'
            })
        } else if (index == len - 1) {
            $(this).parent().css({
                transform: 'translateX(' + -moveS * (index - 3) + '%)'
            })
        } else if (index == len - 2) {
            $(this).parent().css({
                transform: 'translateX(' + -moveS * (index - 2) + '%)'
            })
        } else {
            $(this).parent().css({
                transform: 'translateX(' + -moveS * (index - 1) + '%)'
            })
        }
        $('.alert-img').css({
            transform: 'translateX(' + -moveB * index + '%)'
        })
    })
    var aList = $('.alert-img li');
    aList.width(1 / len * 100 + '%');
    $('.alert-img').width(len * 100 + '%');
    left.on('click', function () {
        index--;
        if (index < 0) {
            index = len - 1
        }
        $('.alert-img').css({
            transform: 'translateX(' + -moveB * index + '%)'
        })
    })
    right.on('click', function () {
        index++;
        if (index > len - 1) {
            index = 0;
        }
        $('.alert-img').css({
            transform: 'translateX(' + -moveB * index + '%)'
        })
    })
    $('.main-pic li').on('click', function () {
        $('.alert-box').fadeIn();
        unScroll();
    })
    $('.alert-box').on('click', 'li', function () {
        $('.alert-box').fadeOut();
        reScroll();
    })
    function unScroll() {
        var top = $(document).scrollTop();
        $(document).on('scroll.unable', function (e) {
            $(document).scrollTop(top);
        })
    }
    function reScroll() {
        $(document).off('scroll.unable');
    }

}//详情组图事件
demap();

function prompt(val) {
    $('.alert-prompt').show();
    $('.prompt .p-init').text(val);
    $('.prompt').animate({ top: '10%' }, 500).delay(1500).animate({
        top: '-50%'
    }, 500, function () {
        $('.alert-prompt').hide();
    });
}//提示框

function edit() {
    $('.item-main .edit-btn').on('click', function () {
        var par = $(this).parents('.item-main');
        $(this).hide();
        $(this).siblings('.confirm-btn').fadeIn();
        par.find('input').addClass('active').attr('readonly', false).focus();
        par.find('textarea').addClass('active').attr('readonly', false);
    })
    $('.item-main .confirm-btn').on('click', function () {
        var par = $(this).parents('.item-main');
        $(this).hide();
        $(this).siblings('.edit-btn').fadeIn();
        var form = par.parent('form');
       /* var url= $(form).attr('action');
        alert(url);*/
        var name = par.find('.name-inp').val();
        var phone = par.find('.phone-inp').val();
        var country = par.find('.country-inp').val();
        var province = par.find('.province-inp').val();
        var city = par.find('.city-inp').val();
        var zip = par.find('.zip-inp').val();
        var address = par.find('textarea').val();
        var data = { 'name': name, 'address': address,'phone':phone,'zip':zip,'country':country,'province':province,'city':city };
        par.find('input').removeClass('active').attr('readonly', 'readonly');
        par.find('textarea').removeClass('active').attr('readonly', 'readonly');
        $('.address .myAdd').find('textarea').eq(1).val(address);
        $.ajax({
            url: $(form).attr('action'),
            data: data,
            type:"post",
            error: function () {

            },
            success: function (data) {
                var b=$.parseJSON(data);
                if(b.data == 1){
                prompt('Successfully modified');
                $('.address .myAdd').find('textarea').eq(0).val(address);
                }else if(b.data == 0){
                  prompt('Please fill in the complete information.');  
                }
            }
        })
    })

    $('.coupon .edit-btn').on('click', function () {
        var par = $(this).parents('.coupon');
        $(this).hide();
        $(this).siblings('.confirm-btn').fadeIn();
        par.find('.remove-btn').show();
    })
    $('.coupon .confirm-btn').on('click', function () {
        var par = $(this).parents('.coupon ');
        $(this).hide();
        $(this).siblings('.edit-btn').fadeIn();
        par.find('.remove-btn').fadeOut();
    })
    $('.coupon .remove-btn').on('click', function () {
        var id = $(this).parents('li').find('input').val();
        var data = { 'id': id };
        $.ajax({
            type:"POST",
            url: $(this).attr('ajax-url'),
            data: data,
            error: function () {

            },
            success: function () {
                prompt('Successfully deleted');
                $(this).parents('li').remove();
            }
        })
    })
    $('.address .edit-btn').on('click', function () {
        var par = $(this).parents('.address');
        $(this).hide();
        $(this).siblings('.confirm-btn').fadeIn();
        par.find('.remove-btn').show();
        par.find('textarea').attr('readonly', false);
        par.find('textarea').eq(0).focus();
    })
    $('.address .confirm-btn').on('click', function () {
        var par = $(this).parents('.address');
        var li = par.find('li');
        var arr = [];
        var form = par.find('form');
        $(this).hide();
        $(this).siblings('.edit-btn').fadeIn();
        par.find('.remove-btn').fadeOut();
        par.find('textarea').attr('readonly', 'readonly');
        li.each(function () {
            var topAdd = $(this).find('textarea').eq(0).val();
            var botAdd = $(this).find('textarea').eq(1).val();
            var myAdd = $(this).find('input').val();
            list = { 'topAdd': topAdd, 'botAdd': botAdd, 'myAdd': myAdd };
            arr.push(list);
        })
        var data = { 'arr': arr };
        $.ajax({
            url: form.attr('action'),
            type:"post",
            data: data,
            error: function () {

            },
            success: function () {
                prompt('Successfully modified');
            }
        })
    })
    $('.address .remove-btn').on('click', function () {
        var id = $(this).parents('li').find('input').val();
        var data = { 'id': id };
        $.ajax({
            url: $(this).attr('ajax-url'),

            data: data,
            error: function () {

            },
            success: function () {
                prompt('Successfully deleted');
                $(this).parents('li').remove();
            }
        })
    })
    $('.address .main').on('click', function () {
        var topAdd = $(this).find('textarea').eq(0).val();
        var botAdd = $(this).find('textarea').eq(1).val();
        var myAdd = $(this).find('input').val();
        var form = $(this).find('form');
        $('.address img').attr('src', '/index/images/address_bj2.png');
        $('.address input').val('false');
        $(this).find('input').val('ture');
        $(this).find('img').attr('src', '/index/images/address_bj1.png');
        $('.address').find('li').removeClass('myAdd');
        $(this).parents('li').addClass('myAdd');
        var data = { 'topAdd': topAdd, 'botAdd': botAdd, 'myAdd': myAdd };
        $('.myAddress').val(botAdd);
        $.ajax({
            type:'get',
            url: form.attr('action'),
            data: '',
            error: function () {

            },
            success: function () {

            }
        })
    })
    $('.address li').each(function () {
        if ($(this).find('input').val() == 'true') {
            $(this).addClass('myAdd');
        }
    })
    $('.histor').each(function () {
        var par = $(this);
        var edit = $(this).find('.edit-btn');
        var table = $(this).find('.table');
        var confirm = $(this).find('.confirm-btn');
        edit.on('click', function () {
            $(this).hide();
            $(this).siblings('.confirm-btn').fadeIn();
            par.find('.show-tit').fadeIn();
            table.find('.check').fadeIn();
            table.find('.remove').fadeIn();
        })
        confirm.on('click', function () {
            $(this).hide();
            $(this).siblings('.edit-btn').fadeIn();
            par.find('.show-tit').fadeOut();
            table.find('.check').fadeOut();
            table.find('.remove').fadeOut();
        })
    })
    $('.all-check-box').on('click', function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            $(this).parents('.histor').find('.check-box').removeClass('active');
            $(this).parents('.histor').find('.check-inp').val('false');
            $(this).parents('.histor').find('.all-remove').attr('disabled', 'disabled');
        } else {
            $(this).addClass('active');
            $(this).parents('.histor').find('.check-box').addClass('active');
            $(this).parents('.histor').find('.check-inp').val('true');
            $(this).parents('.histor').find('.all-remove').attr('disabled', false);
        }
    })
    $('.check-box').on('click', function () {
        var li = $(this).parents('li');
        var par = $(this).parents('.histor')
        if ($(this).hasClass('active')) {
            $(this).removeClass('active');
            li.find('.check-inp').val('false');
        } else {
            $(this).addClass('active');
            li.find('.check-inp').val('true');
        }
        if (par.find('.check-box').hasClass('active')) {
            par.find('.all-check-box').addClass('active');
            par.find('.all-remove').attr('disabled', false);
        } else {
            par.find('.all-check-box').removeClass('active');
            par.find('.all-remove').attr('disabled', 'disabled');
        }
    })
    $('.all-remove').on('click', function () {
        var par = $(this).parents('.histor');
        var reArr = [];
        var li = par.find('li');
        var check = par.find('.check .active');
        li.each(function () {
            var id = $(this).find('.id').val();
            var re = $(this).find('.check-inp').val();
            if (re == 'true') {
                reArr.push(id);
            }
        })
        $.ajax({
            url: $(this).attr('ajax-url'),
            type:"post",
            data: { 'reArr': reArr },
            error: function () {

            },
            success: function () {
                prompt('Batch delete succeeded');
                par.find('.all-check-box').removeClass('active');
                $(this).attr('disabled', 'disabled');
                check.parents('li').remove();
            }
        })
    })
    $('.table .remove-btn').on('click', function () {
        var par = $(this).parents('li');
        var id = par.find('.id').val();
        $.ajax({
            url: $(this).attr('ajax-url'),
            data: { 'reid': id },
            error: function () {

            },
            success: function () {
                prompt('Successfully deleted');
                par.remove();
            }
        })
    })
    $('.security .edit-btn').on('click', function () {
        var par = $(this).parents('.security');
        $(this).hide();
        $(this).siblings('.confirm-btn').fadeIn();
        par.find('.newPass').attr('readonly', false).addClass('active');
        par.find('.againPass').attr('readonly', false).addClass('active');
        par.find('input').eq(1).focus();
    })
    $('.security .confirm-btn').on('click', function () {
        var par = $(this).parents('.security');
        var oldPas = par.find('.oldPass').val();
        var newPass = par.find('.newPass').val();
        var againPass = par.find('.againPass').val();
        var data = { 'oldPas': oldPas, 'newPass': newPass };
        if (newPass == againPass) {
            $(this).hide();
            $(this).siblings('.edit-btn').fadeIn();
            par.find('.newPass').attr('readonly', 'readonly').removeClass('active');
            par.find('.againPass').attr('readonly', 'readonly').removeClass('active');
            if (newPass != '') {
                $.ajax({
                    url: $(this).attr('ajax-url'),
                    data: data,
                    type:"post",
                    error: function () {

                    },
                    success: function () {
                        prompt('Successfully modified');
                        par.find('.oldPass').val(newPass);
                    }
                })
            }
        } else {
            prompt('The passwords are inconsistent, please re-enter');
            return false;
        }
    })
}
edit();


function initPrice() {
    var arr = [];
    var allPrice = 0;
    $('.shopping-box .table .all-price').each(function () {
        arr.push(parseFloat($(this).text()));
    })
    arr.forEach(function (ele, index) {
        allPrice += ele;
    });

    return allPrice.toFixed(2);
}

function pay() {
    var modes = parseFloat($('.mon .modes').text());
    /*alert(parseFloat(initPrice())+ parseFloat(modes));*/
     $('.tol .pay-allPrice').text(parseFloat(initPrice()) + modes + '$');
    $('.tol .allPrice').text(initPrice() + '$');
    $('.shopping-box .table li').each(function () {
        var allPrice = 0;
        var par = $('.shopping-box');
        var num = parseFloat($(this).find('.text').val());
        var price = parseFloat($(this).find('.price').text());
        var plus = $(this).find('.plus');
        var cut = $(this).find('.cut');
        var li = $(this);
        var text = $(this).find('.text');
        text.on('input', function () {
            var val = $(this).val();
            num = val;
            var reg = /^[1-9]\d*|0$/;
            if(!reg.test(val)){
                num=0;
            }
            console.log(price * num);
            li.find('.all-price').text(price * num + '$');
            $('.tol .allPrice').text(initPrice() + '$')
        })
        plus.on('click', function () {
            num++;
            li.find('.text').val(num);
            li.find('.all-price').text(price * num + '$');
            $('.tol .allPrice').text(initPrice() + '$')
        })
        cut.on('click', function () {
            function initPrice() {
                var arr = [];
                var allPrice = 0;
                $('.shopping-box .table .all-price').each(function () {
                    arr.push(parseFloat($(this).text()));
                })
                arr.forEach(function (ele, index) {
                    allPrice += ele;
                });
                return allPrice.toFixed(2);
            }
            num--;
            if (num < 1) {
                num = 1;
            }
            li.find('.text').val(num);
            li.find('.all-price').text(price * num + '$');
            $('.tol .allPrice').text(initPrice() + '$')
        })
    })
}
pay()



function loginFn() {
    $('.login-box .btn').on('click', function () {
        var form = $(this).parents('form');
        var self = $(this);
        var user = $('.login-box .user').val();
        var pass = $('.login-box .pass').val();
        if (user == '' || pass == '') {
            prompt('Please enter an account or password');
            return false;
        }
        form.ajaxForm({
            url: self.attr('action'),
            error: function () {

            },
            success: function (data) {
                if (data.data == 0) {
                    prompt('Incorrect username or password');
                } else if (data.data == 1) {
                    prompt('login successful');
                    window.location.href = 'index.html'
                }
            }
        })
    })
}
loginFn()