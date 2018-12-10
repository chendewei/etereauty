let bindEvend = () => {
    var video = $('#myvideo')[0];
    var dH = $(window).height();
    var dW = $(window).width();
    $('.play-btn').on('click', function () {
        var i = $(this).find('i');
        if (i.hasClass('icon-pause')) {
            i.removeClass('icon-pause').addClass('icon-play1')
        } else {
            i.removeClass('icon-play1').addClass('icon-pause')
        }
        if (video.paused) {
            video.controls = true;
            video.play()
        } else {
            video.controls = false;
            video.pause();
        }
        setTimeout(function () {
            $('.play-btn').fadeOut()
        }, 1000)
    })
    var navLi = $('.nav-list > li');
    if (dW > 768) {
        navLi.on('mouseover', function () {
            $(this).children('div').stop().fadeIn();
        }).on('mouseout', function () {
            $(this).children('div').stop().fadeOut();
        })
        $('.se-btn').on('click', function (e) {
            $('.se-text').toggleClass('active');
            if ($('.se-text').hasClass('active')) {
                $('.se-text').find('input').focus();
                $('.icons').hide();
                $('.subs').show();
            }
            $('.navBox').fadeToggle();
            var _this = this;
            setTimeout(function () {
                $(_this).toggleClass('active');
            }, 200)
            e.stopPropagation();
        })
        $(document).on('click', function () {
            $('.navBox').fadeIn();
            $('.se-text').removeClass('active');
            $('.se-btn').removeClass('active');
            $('.icons').show();
            $('.subs').hide();
        })
        $('.iconBox .main .i-list > li').on('mouseover', function () {
            $(this).find('.sup-box').stop().fadeIn();
        }).on('mouseout', function () {
            $(this).find('.sup-box').stop().fadeOut();
        })
        $('#dragMove').dragMove({
            showLen: 7,
            targetDom: $('ul')
        })
    } else {
        $('.my-search').on('click', function () {
            $('.se-text').fadeToggle();
            $('.se-text').find('input').focus();
            $('header .h-main .h-right .iconBox .sup-box').fadeOut();
        })
        $('.my-cart').add('.my-user').add('.my-lang').on('click', function () {
            var box = $(this).find('.sup-box')
            $('header .h-main .h-right .iconBox .sup-box').fadeOut();
            $('.se-text').fadeOut();
            if (box.css('display') == 'block') {
                box.fadeOut();
            } else {
                box.fadeIn();
            }
        })
        $('header .h-main .h-right').innerHeight(dH);
        $('.nav-list .toogle-li').on('click', function () {
            var song = $(this).find('.song-box');
            $('.nav-list .toogle-li').removeClass('active');
            $('.nav-list .toogle-li').find('i').attr('class', 'iconfont icon-add')
            $('.nav-list .toogle-li .song-box').slideUp();
            if (song.css('display') == 'block') {
                song.slideUp();
                $(this).removeClass('active');
                $(this).find('i').attr('class', 'iconfont icon-add')
            } else {
                song.slideDown();
                $(this).addClass('active');
                $(this).find('i').attr('class', 'iconfont icon-minus')
            }
        })
    }
    $('.se-text').on('click', function (e) {
        e.stopPropagation();
    })
    $('.menu-icon').on('click', function () {
        $(this).toggleClass('active');
        $('header .h-main .h-right').slideToggle();
    })
    $('.top-box').backTop({
        speed: '',
        color: '#333333'
    })
    $('.checkbox').on('click', function () {
        if ($(this).hasClass('active')) {
            $(this).removeClass('active')
            $(this).find('.c-inp').val('false')
        } else {
            $(this).addClass('active')
            $(this).find('.c-inp').val('true')
        }
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
}
bindEvend();


function prompt(val) {
    $('.alert-prompt').show();
    $('.prompt .p-init').text(val);
    $('.prompt').animate({ top: '10%' }, 500).delay(1500).animate({
        top: '-50%'
    }, 500, function () {
        $('.alert-prompt').hide();
    });
}//提示框



let ajaxFn = () => {
    var reU = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/; //邮箱正则
    var reP = /^[a-zA-Z0-9_-]{6,15}$/;//密码正则
    var reI = /^\d{4,16}$/;//订单正则
    var user = $('.user_name');
    var pass = $('.pass_word');
    var code = $('.captcha');
    var id = $('.order_id');
    var num;
    user.on('input', function () {
        showI($(this), reU)
    })
    pass.on('input', function () {
        showI($(this), reP)
    })
    id.on('input', function () {
        showI($(this), reI)
    })
    function showI(dom, res) {
        var val = dom.val();
        if (res.test(val)) {
            dom.parent().find('.correct').show();
            dom.parent().find('.error').hide();
        } else {
            dom.parent().find('.correct').hide();
            dom.parent().find('.error').show();
        }
    }
    $('.sign button').on('click', function () {
        clickFn($(this), ret(), 'Login successful', 'Mail or password is incorrect')
        return false;
    })//请求登录
    $('.order button').on('click', function () {
        clickFn($(this), ret2(), 'Submitted successfully', 'Order or email is incorrect')
        return false;
    })//订单提交
    function clickFn(dom, req, ok, error) {  //ok成功时提示信息，error失败时提示信息
        var form = dom.parents('form')
        var data = form.serialize();
        if (req) {
            $.ajax({
                data: data,
                type: 'post',
                success: function (data) {
                    var b=$.parseJSON(data);

                    if (b.data == 0) {
                        prompt(error)
                    } else if (b.data == 1) {
                        prompt(ok)
                        window.location.href='/index/myaddress/index.html'
                    }
                }, error: function () {

                }

            })
        }
    }//点击ajax发送数据
    function ret2() {
        var valU = user.val();
        var valI = id.val();
        if (!reI.test(valI)) {
            id.parent().find('.error').show();
        }
        if (!reU.test(valU)) {
            user.parent().find('.error').show();
        }
        if (reI.test(valI) && reU.test(valU)) {
            return true
        } else {
            return false
        }
    }//订单验证
    function ret() {
        var valU = user.val();
        var valP = pass.val();
        if (!reP.test(valP)) {
            pass.parent().find('.error').show();
        }
        if (!reU.test(valU)) {
            user.parent().find('.error').show();
        }
        if (reP.test(valP) && reU.test(valU)) {
            return true
        } else {
            return false
        }
    }//登录验证
    function ret1() {
        var valU = user.val();
        var valP = pass.val();
        var valC = code.val();
        if (!reP.test(valP)) {
            pass.parent().find('.error').show();
        }
        if (!reU.test(valU)) {
            user.parent().find('.error').show();
        }
        if (reP.test(valP) && reU.test(valU) && num == valC) {
            return true
        } else {
            return false
        }
    }//注册验证
    $('#can').can({
        color: '#5fc9d9',
        fontSize: '24px',
        height: 26,
        word: false,
        callback: function (str) {
            num = str;
        }
    })//验证码生成
    $('.register button').on('click', function () {
        clickFn($(this), ret1(), 'Registration success', 'Registration failed')
        if (code.val() != num) {
            code.parent().find('.error').show();
            code.parent().find('.correct').hide();
            return false;
        }
        return false;
    })
    code.on('input', function () {
        if (code.val() != num) {
            $(this).parent().find('.error').show();
            $(this).parent().find('.correct').hide();
        } else {
            $(this).parent().find('.correct').show();
            $(this).parent().find('.error').hide()
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
            type: 'post',
            url: $(this).attr('ajax-url'),
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
            type: 'post',
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
}//ajax数据
ajaxFn()





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
    $('.tol .pay-allPrice').text('$' + parseFloat(initPrice()) + modes);
    $('.tol .allPrice').text('$' + initPrice());
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
            if (!reg.test(val)) {
                num = 0;
            }
            li.find('.all-price').text('$' + price * num);
            $('.tol .allPrice').text('$' + initPrice()  )
        })
        plus.on('click', function () {
            num++;
            
            li.find('.text').val(num);

            li.find('.all-price').text((price * num).toFixed(2));
            $('.tol .allPrice').text('$' + initPrice())
        })
        cut.on('click', function () {

            num--;
            if (num < 1) {
                num = 1;
            }
            li.find('.text').val(num);
            li.find('.all-price').text((price * num).toFixed(2));
            $('.tol .allPrice').text('$' + initPrice())
        })
    })
}
pay()


function big() {
    $('.big-list li').each(function () {
        var plus = $(this).find('.plus-btn');
        var cut = $(this).find('.cut-btn');
        var inp = $(this).find('.numtext');
        var num = 1;
        plus.on('click', function () {
            num++;
            inp.val(num);
        })
        cut.on('click', function () {
            num--;
            if (num < 1) {
                num = 1;
            }
            inp.val(num);
        })
        inp.on('input', function () {
            var val = $(this).val();
            if (isNaN(val)) {
                val = 0
            }
            num = val;
        })
    })
}
big();



function review() {
    var li = $('.star-box');
    li.each(function () {
        var num = $(this).find('.s-num').val();
        var int = num[0];
        var dec = num[2];
        var star = $(this).find('i');
        var len = 5;
        for (var i = 0; i < int; i++) {
            star.eq(i).attr('class', 'fa fa-star');
        }
        star.eq(int).attr('class', rename());
        function rename() {
            if (dec > 0) {
                return 'fa fa-star-half-o'
            } else {
                return 'fa fa-star-o'
            }
        }
    })
}
review()

$(function () {
    function alertFn() {
        var box = $('.s-content .alert-box');
        var open = $('.why-btn');
        var close = $('.alert-box .close-btn');
        var ok = $('.alert-box .ok-btn');
        open.on('click', function () {
            box.show();
            box.find('.a-bg').fadeIn();
            box.find('.a-main').animate({
                top: '50%'
            });
        })
        close.add($(ok)).on('click', function () {
            box.find('.a-bg').fadeOut();
            box.find('.a-main').animate({
                top: '30%'
            }, function () {
                box.hide();
            });

        })
    }
    alertFn()
    function warrEvent() {
        var wra = $('.e-inp .main .wra');
        var form = wra.parents('form');
        var inp = wra.find('input');
        var email = wra.find('.email');
        var order = wra.find('.order');
        var btn = wra.find('.mybtn');
        var len = inp.length;
        var data = form.serialize();
        btn.on('click', function () {
            check()
            return false;
        })
        function check() {
             var regE = /^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/g;
            // var regO = /^\d{3,}-\d{3,}-\d{3,}/g;
             var regO = /\S/;
           
        
            
            if (!email.val().match(regE)) {
                email.siblings('.error').fadeIn();
                email.focus();
                return false;
            } else {
                email.siblings('.error').hide();
            }
            if (!order.val().match(regO)) {
                order.siblings('.error').fadeIn();
                order.focus();
                return false;
            } else {
                order.siblings('.error').hide();

            }

              var e = email.val();
             var o = order.val();

            $.ajax({
                data:{email:e,orderno:o},
                type: 'post',
                url: form.attr('action'),
                error: function () {
                    prompt('Submitted failed');
                },
                success: function (data) {
                    prompt('Submitted successfully');
                }
            })
        }
    }
    warrEvent()
})//售后



function contactFn() {
    var wra = $('.c-inp .main .wra');
    var form = wra.parents('form');
    var inp = wra.find('.imp');
    
    var send = wra.find('.mybtn-send');
    var len = inp.length;
    var clear = wra.find('.mybtn-clear')
    var allinp = wra.find('.myinp');
    send.on('click',function(){
    var data = form.serialize();
        for(var i = 0; i<len;i++){
            var p = $(inp[i]);
            if(p.val()==''){
                p.siblings('.error').fadeIn();
                p.focus();
                return false;
            }else{
                p.siblings('.error').hide();
            }
        }
        $.ajax({
            type: 'post',
            url: form.attr('action'),
            data: data,
            error: function () {
                prompt('Submitted failed');
            },
            success: function (data) {
                prompt('Submitted successfully');
            }
        })
        return false;
    })
    clear.on('click',function(){
        allinp.val('');
        allinp.eq(0).focus();
        wra.find('.error').hide();
    })
}//联系我们
contactFn()

function myorder(){
    var inps = $('.address').find('input')
    var seps = $('.address').find('select')
    var btnIndex =  localStorage.getItem('btnIndex');
    if(btnIndex){
        $('.method>div').removeClass('active')
        $('.method>div').eq(btnIndex).addClass('active')
        $('.pay-bot button').hide()
        $('.pay-bot button').eq(btnIndex).show()
    }else{
        $('.pay-method>div').eq(0).addClass('active') 
    }
    if(inps.val() !=''){
        inps.addClass('off').attr('disabled','disabled')
        seps.addClass('off').attr('disabled','disabled')
        $('.address .edit').show()
        $('.address .save').hide()
        $('.next-btn').show()
    }
    $('.address .save').on("click",function(){
        var form = $(this).parents('form')
        var data = form.serialize()
        var inp = form.find('.inp-imp')
        var allInp = form.find('input')
        var allSep = form.find('select')
        var _this = this
        for(var i = 0; i < inp.length; i++){
            if($(inp[i]).val() == ''){
                var text = $(inp[i]).parents('.item').find('.msg').text()
                $(inp[i]).focus()
                form.find('.error').text("Please Enter Your " + text).fadeIn()
                return false
            }else{
                form.find('.error').text('').hide()
            }
        }
        $.ajax({
            url:form.attr("action"),
            type:'post',
            data:data,
            success:(res) => {
                if(res == 1){
                prompt('Successfully saved')
                $(_this).hide()
                $('.next-btn').show()
                allInp.attr('disabled','disabled').addClass('off')
                allSep.attr('disabled','disabled').addClass('off')
                $('.address .edit').show()
                }
                if(res == 3){
                 prompt('Password error')   
                }
            },
            error: () => {
                prompt('Save failed')
            }
        })
        return false
    })
    $('.method>div').on('click',function(){
        $(this).siblings('div').removeClass('active')
        $(this).addClass('active')
        var index = $(this).index()
        $('.pay-bot button').hide()
        $('.pay-bot button').eq(index).show()
        localStorage.setItem("btnIndex",index)
    })
    $('.mode>div').on('click',function(){
        $(this).siblings('div').removeClass('active')
        $(this).addClass('active')
    })
    $('.address .edit').on('click',function(){
        var form = $(this).parents('form')
        var allInp = form.find('input')
        var allSep = form.find('select')
        allInp.attr('disabled',false).removeClass('off')
        allSep.attr('disabled',false).removeClass('off')
        $(this).hide()
        $('.address .save').show()
    })

}
myorder()