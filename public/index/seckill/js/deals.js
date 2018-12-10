; (function ($) {

    $.fn.countdown = function (options) {
        var def = {
            callback: null
        }
        var options = $.extend(def, options);
        $(this).each(function () {
            var arr = [];
            var leftTime = 0;
            var startStr = $(this).find('.start').val();
            var endStr = $(this).find('.end').val();
            var endArr = endStr.split('/');
            var startArr = startStr.split('/');
            var w;
            startArr.forEach(function(ele){
                arr.push(parseInt(ele));
            })
            var myDate = $(this).find('.date');
            var pr = $(this).find('.progress-in');
            var prt = $(this).find('.percent-show .prt');
            var startDate = new Date(arr[0], arr[1] - 1, arr[2], arr[3], arr[4], arr[5]).getTime();
            timer(endArr[0], endArr[1], endArr[2], endArr[3], endArr[4], endArr[5]);
            function timer(year, month, day, hour, minute, second) {
                delDate = new Date(year, month - 1, day, hour, minute, second).getTime();
                nowDate = new Date().getTime();
                leftTime = (new Date(year, month - 1, day, hour, minute, second)) - (new Date());
                w = Math.ceil(leftTime / (delDate - startDate) * 100);
                var days = parseInt(leftTime / 1000 / 60 / 60 / 24, 10);
                var hours = parseInt(leftTime / 1000 / 60 / 60 % 24, 10);
                var minutes = parseInt(leftTime / 1000 / 60 % 60, 10);
                var seconds = parseInt(leftTime / 1000 % 60, 10);
                hours = checkTime(hours);
                minutes = checkTime(minutes);
                seconds = checkTime(seconds);
                setTimeout(function () {
                    timer(endArr[0], endArr[1], endArr[2], endArr[3], endArr[4], endArr[5])
                }, 1000);
                if (leftTime > 0 && leftTime) {
                    render(days, hours, minutes, seconds);
                }else if(leftTime<=0){
                    w = 0;
                }
                if(w>=100){
                    w=100
                } 
                pr.width(w + '%');
                prt.html(w);       
            }
            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
            function render(days, hours, minutes, seconds) {
                var str;
                if (days <= 0) {
                    var str = '<span>' + hours + ":" + minutes + ":" + seconds + '<span>'
                } else {
                    str = '<span>' + days + "Day  " + hours + ":" + minutes + ":" + seconds + '<span>'
                }
                myDate.html(str);
            }
            typeof callback=='function' ? options.callback() : ''
        })
    }//倒计时

})(jQuery)

