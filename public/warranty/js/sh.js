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
    function bindEvent() {
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
            var regO = /^\d{3,}\d{3,}\d{3,}/g;
            var e = regE.test(email.val());
            var o = regO.test(order.val());
            var ev= $('.email').val();
            var ov= $('.order').val();
       
            if (!e) {
                email.siblings('.error').fadeIn();
                return false;
            } else {
                email.siblings('.error').hide();
            }
            if (!o) {
                order.siblings('.error').fadeIn();
                return false;
            } else {
                order.siblings('.error').hide();

            }
            $.ajax({
                type: 'post',
                url: form.attr('action'),
                data:{ 'email': ev,'orderno':ov },
                error: function () {
                    prompt('Submitted failed');
                },
                success: function (data) {
                    prompt('Submitted successfully');
                }
            })
        }
    }
    bindEvent()

    function prompt(val) {
        $('.alert-prompt').show();
        $('.prompt .p-init').text(val);
        $('.prompt').animate({ top: '10%' }, 500).delay(1500).animate({
            top: '-50%'
        }, 500, function () {
            $('.alert-prompt').hide();
        });
    }//提示框
})