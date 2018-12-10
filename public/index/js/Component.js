; (function ($) {
    $.fn.gmap = function (options) {
        var def = {
            targetDom: null,
            color: null
        }
        var options = $.extend(def, options);
        var self = $(this);
        var target = self.find(options.targetDom);
        var imgList = target.children();
        var len = imgList.length;
        var imgArr = [];
        imgList.each(function () {
            var src = $(this).find('img').attr('src');
            imgArr.push(src);
        })
        var color = options.color;
        var item = Math.ceil(len / 4);
        var obj = {
            init: function () {
                this.render();
                this.curHover();
                this.curBtn();
                this.viewFn();
                this.curMove();
            },
            nowIndex: 0,
            viewIndex: 0,
            render: function () {
                var html = '<div class="cur">\
                        <div class="c-left-btn">\
                            <i class="fa fa-angle-left"></i>\
                        </div>\
                        <div class="cur-box"><div class="wrap"><ul class="cur-list"></ul></div></div>\
                        <div class="c-right-btn">\
                            <i class="fa fa-angle-right"></i>\
                        </div>\
                    </div>\
                    <div class="veiw">\
                        <ul class="view-list"></ul>\
                        <div class="v-left-btn">\
                            <i class="fa fa-angle-left"></i>\
                        </div>\
                        <div class="v-right-btn">\
                            <i class="fa fa-angle-right"></i>\
                        </div>\
                    </div>';
                self.append(html);
                var str = '';
                imgArr.forEach(function (ele, index) {
                    if (index == 0) {
                        str += '<li class="active"><img src="' + ele + '" alt=""><span></span></li>'
                    } else {
                        str += '<li><img src="' + ele + '" alt=""><span></span></li>'
                    }

                })
                self.find('.cur-list').append(str);
                self.find('.view-list').append(str);
                self.find('.cur-list').width(len * 100 + '%');
                self.find('.cur-list li').width(100 / len / 4 - 0.3 + '%').css({
                    margin: 0.15 + '%'
                });
                self.find('.view-list').width((len + 1) * 100 + '%');
                self.find('.view-list li').width(100 / (len + 1) + '%');
                self.find('.cur-list .active span').css({
                    borderColor: color
                })
                var clone = self.find('.view-list li').eq(0).clone();
                self.find('.view-list').append(clone);
                if (len <= 4) {
                    self.find('.cur-box').css({
                        width: '100%'
                    })
                    self.find('.c-left-btn').hide();
                    self.find('.c-right-btn').hide();
                }
            },
            curHover: function () {
                var viewList = self.find('.view-list');
                var _this = this;
                self.find('.cur-list li').on('mouseover', function () {
                    var index = $(this).index();
                    var curBox = self.find('.cur-list');
                    curBox.find('li').removeClass('active');
                    curBox.find('span').attr('style', '');
                    $(this).addClass('active');
                    curBox.find('.active span').css({
                        borderColor: color
                    });
                    target.find('li').hide();
                    target.find('li').eq(index).show();
                    viewList.css({
                        left: -index * 100 + '%'
                    })
                    _this.viewIndex = index;
                })
            },
            curBtn: function () {
                var leftBtn = self.find('.c-left-btn');
                var rightBtn = self.find('.c-right-btn');
                var _this = this;
                leftBtn.on('click', function () {
                    move('left');
                })
                rightBtn.on('click', function () {
                    move('right');
                })
                function move(val) {
                    var curList = self.find('.cur-list');
                    if (val == 'right') {
                        _this.nowIndex++;
                        if (_this.nowIndex > item - 1) {
                            curList.animate({
                                left: 0 + '%'
                            }, function () {
                                _this.nowIndex = 0;
                            })
                        } else {
                            curList.animate({
                                left: _this.nowIndex * -100 + '%'
                            })
                        }
                    } else {
                        if (_this.nowIndex == 0) {
                            _this.nowIndex = item;
                        }
                        _this.nowIndex--;
                        curList.animate({
                            left: _this.nowIndex * -100 + '%'
                        })

                    }
                }
            },
            viewFn: function () {
                var _this = this;
                var view = self.find('.veiw');
                var viewList = view.find('.view-list');
                var li = view.find('.view-list li');
                var leftBtn = self.find('.v-left-btn');
                var rightBtn = self.find('.v-right-btn');
                var curList = self.find('.cur-list');
                var imgsLi = target.find('li');
                var _this = this;
                var lens = len + 1;
                function unScroll() {
                    var top = $(document).scrollTop();
                    $(document).on('scroll.unable', function (e) {
                        $(document).scrollTop(top);
                    })
                }
                function reScroll() {
                    $(document).off('scroll.unable');
                }
                target.find('li').on('click', function () {
                    view.fadeIn();
                    unScroll();
                })
                li.on('click', function () {
                    view.fadeOut();
                    reScroll();
                })
                leftBtn.on('click', function () {
                    anima('left');
                })
                rightBtn.on('click', function () {
                    anima('right');
                })
                function anima(val) {
                    if (val == 'left') {
                        if (_this.viewIndex == 0) {
                            viewList.css({
                                left: -(lens - 1) * 100 + '%'
                            })
                            _this.viewIndex = lens - 2;
                        } else {
                            _this.viewIndex--;
                        }
                    } else if (val == 'right') {
                        _this.viewIndex++;
                        if (_this.viewIndex == lens - 1) {
                            viewList.animate({
                                left: -(lens - 1) * 100 + '%'
                            }, function () {
                                $(this).css({
                                    left: '0%'
                                })
                            });
                            _this.viewIndex = 0;
                        }
                    }
                    viewList.animate({
                        left: -_this.viewIndex * 100 + '%'
                    })
                    curList.find('li').removeClass('active');
                    curList.find('span').attr('style', '');
                    curList.find('li').eq(_this.viewIndex).addClass('active');
                    curList.find('.active span').css({
                        borderColor: color
                    });
                    var v = Math.floor(_this.viewIndex / 4);
                    curList.animate({
                        left: -v * 100 + '%'
                    })
                    _this.nowIndex = v;
                    imgsLi.hide();
                    imgsLi.eq(_this.viewIndex).show();
                }
            },
            curMove() {
                var curList = self.find('.cur-list');
                var _this = this;
                var w = curList.width();
                curList.css({
                    left: '0%'
                });
                var l = curList.offset().left;
                var initL, lastX = 0;
                var num = 0;
                var disX;
                var speed = 0;
                curList.on('mousedown', function (event) {
                    var pad = self.find('.cur-box').width() / 10;
                    initL = curList.position().left;
                    var e = event || window.event;
                    disX = e.clientX - l;
                    $(document).on('mousemove', moveFn);
                    $(document).on('mouseup', upFn);
                })
                function moveFn(event) {
                    var e = event || window.event;
                    e.preventDefault();
                    curList.unbind('mouseover');
                    var newLeft = e.clientX - disX - l + initL;
                    curList.css({
                        left: newLeft + 'px'
                    });
                    speed = e.clientX - lastX;
                    lastX = e.clientX;
                }
                function upFn() {
                    moveAuto();
                    _this.curHover();
                    $(document).unbind('mousemove mouseup');
                }
                function moveAuto() {
                    var l = curList.position().left;
                    var maxL = w / len * (item - 1);
                    var moveL = 0;
                    if (l >= 0) {
                        moveL = 0;
                        _this.nowIndex = 0;
                    } else if (l <= -maxL) {
                        moveL = -maxL;
                        _this.nowIndex = item;
                    } else {
                        moveL = l + speed
                    }
                    curList.animate({
                        left: moveL + 'px'
                    })
                }
            }
        }
        obj.init();
    }//详情横屏组图
    $.fn.gmapVer = function (options) {
        var def = {
            targetDom: null,
            color: null
        }
        var options = $.extend(def, options);
        var self = $(this);
        var target = self.find(options.targetDom);
        var imgList = target.children();
        var len = imgList.length;
        var curW;
        var curH;
        var liW;
        var imgArr = [];
        imgList.each(function () {
            var src = $(this).find('img').attr('src');
            imgArr.push(src);
        })
        var color = options.color;
        var item = Math.ceil(len / 4);
        var obj = {
            init: function () {
                this.render();
                this.curHover();
                this.imgFn();
                this.viewFn();
                this.curMove();
            },
            nowIndex: 0,
            render: function () {
                var html = '<div class="cur">\
                        <div class="cur-box"><div class="wrap"><ul class="cur-list"></ul></div></div>\
                    </div>\
                    <div class="veiw">\
                        <ul class="view-list"></ul>\
                        <div class="v-left-btn">\
                            <i class="fa fa-angle-left"></i>\
                        </div>\
                        <div class="v-right-btn">\
                            <i class="fa fa-angle-right"></i>\
                        </div>\
                    </div>';
                var imgHtml = `<div class="left-btn">
                                    <i class="fa fa-angle-left"></i>
                                </div>
                                <div class="right-btn">
                                    <i class="fa fa-angle-right"></i>
                                </div>`;
                target.parent().append(imgHtml);
                self.prepend(html);
                var str = '';
                imgArr.forEach(function (ele, index) {
                    if (index == 0) {
                        str += '<li class="active"><img src="' + ele + '" alt=""><span></span></li>'
                    } else {
                        str += '<li><img src="' + ele + '" alt=""><span></span></li>'
                    }

                })
                function fram() {
                    curH = imgList.height();
                    imgList.parent().height(curH);
                    curW = self.find('.cur').width();
                    self.find('.cur-box').height(curH + 'px');
                    liW = self.find('.cur-list li').outerWidth();
                    requestAnimationFrame(fram)
                };
                fram();
                self.find('.cur-list').append(str);
                self.find('.view-list').append(str);
                self.find('.cur-list').height(curW * len + 'px');
                self.find('.view-list').width((len + 1) * 100 + '%');
                self.find('.view-list li').width(100 / (len + 1) + '%');
                self.find('.cur-list .active span').css({
                    borderColor: color
                })
                var clone = self.find('.view-list li').eq(0).clone();
                self.find('.view-list').append(clone);
                if (len <= 4) {
                    self.find('.cur-box').css({
                        width: '100%'
                    })
                    self.find('.c-left-btn').hide();
                    self.find('.c-right-btn').hide();
                }
            },
            imgFn: function () {
                var _this = this;
                var index;
                var viewList = self.find('.view-list');
                var leftBtn = target.siblings('.left-btn');
                var rightBtn = target.siblings('.right-btn');
                leftBtn.on('click', function () {
                    fadeFn('left');
                });
                rightBtn.on('click', function () {
                    fadeFn('right');
                });
                function fadeFn(val) {
                    if (val == 'left') {
                        if (_this.nowIndex == 0) {
                            _this.nowIndex = len;
                        }
                        _this.nowIndex--
                    } else {
                        _this.nowIndex++;
                        if (_this.nowIndex == len) {
                            _this.nowIndex = 0;
                        }
                    }
                    imgList.hide();
                    imgList.eq(_this.nowIndex).fadeIn();
                    _this.curActive(_this.nowIndex);
                    viewList.animate({
                        left: -_this.nowIndex * 100 + '%'
                    })
                }
            },
            curHover: function () {
                var viewList = self.find('.view-list');
                var _this = this;
                self.find('.cur-list li').on('mouseover', function () {
                    var index = $(this).index();
                    var curBox = self.find('.cur-list');
                    curBox.find('li').removeClass('active');
                    curBox.find('span').attr('style', '');
                    $(this).addClass('active');
                    curBox.find('.active span').css({
                        borderColor: color
                    });
                    target.find('li').hide();
                    target.find('li').eq(index).show();
                    viewList.css({
                        left: -index * 100 + '%'
                    })
                    _this.nowIndex = index;
                })
            },
            viewFn: function () {
                var _this = this;
                var view = self.find('.veiw');
                var viewList = view.find('.view-list');
                var li = view.find('.view-list li');
                var leftBtn = self.find('.v-left-btn');
                var rightBtn = self.find('.v-right-btn');
                var curList = self.find('.cur-list');
                var imgsLi = target.find('li');
                var lens = len + 1;
                function unScroll() {
                    var top = $(document).scrollTop();
                    $(document).on('scroll.unable', function (e) {
                        $(document).scrollTop(top);
                    })
                }
                function reScroll() {
                    $(document).off('scroll.unable');
                }
                target.find('li').on('click', function () {
                    view.fadeIn();
                    unScroll();
                })
                li.on('click', function () {
                    view.fadeOut();
                    reScroll();
                })
                leftBtn.on('click', function () {
                    anima('left');
                })
                rightBtn.on('click', function () {
                    anima('right');
                })
                function anima(val) {
                    var viewList = self.find('.view-list');
                    if (val == 'left') {
                        if (_this.nowIndex == 0) {
                            viewList.css({
                                left: -(lens - 1) * 100 + '%'
                            })
                            _this.nowIndex = lens - 2;
                        } else {
                            _this.nowIndex--;
                        }
                    } else if (val == 'right') {
                        _this.nowIndex++;
                        if (_this.nowIndex == lens - 1) {
                            viewList.animate({
                                left: -(lens - 1) * 100 + '%'
                            }, function () {
                                $(this).css({
                                    left: '0%'
                                })
                            });
                            _this.nowIndex = 0;
                        }
                    }
                    viewList.animate({
                        left: -_this.nowIndex * 100 + '%'
                    })
                    _this.curActive(_this.nowIndex);
                    imgsLi.hide();
                    imgsLi.eq(_this.nowIndex).show();
                }
            },
            curActive: function (index) {
                var _this = this;
                var curList = self.find('.cur-list');
                var imgsLi = target.find('li');
                curList.find('li').removeClass('active');
                curList.find('span').attr('style', '');
                curList.find('li').eq(_this.nowIndex).addClass('active');
                curList.find('.active span').css({
                    borderColor: color
                });
                if (index == 0||index==1) {
                    curList.animate({
                        top: 0
                    })
                }else if (index == len - 1) {
                    curList.animate({
                        top: -curW * (index - 4) + 'px'
                    })
                }else if(index == len- 2){
                    curList.animate({
                        top: -curW * (index-3) + 'px'
                    })
                }
                else{
                    curList.animate({
                        top: -curW * (index-2) + 'px'
                    })
                }
            },
            curMove() {
                var curList = self.find('.cur-list');
                var _this = this;
                var moveH = curH / len;
                curList.css({
                    top: '0'
                });
                var t = curList.offset().top;
                var initL, lastY = 0;
                var num = 0;
                var disY;
                var speed = 0;
                curList.on('mousedown', function (event) {
                    initT = curList.position().top;
                    var e = event || window.event;
                    disY = e.clientY - t;
                    $(document).on('mousemove', moveFn);
                    $(document).on('mouseup', upFn);
                })
                curList.on('touchstart', function (e) {
                    initT = curList.position().top;
                    disY = e.originalEvent.changedTouches[0].clientY - t;
                }).on('touchmove', function (e) {
                    e.preventDefault();
                    var newtop = e.originalEvent.changedTouches[0].clientY - disY - t + initT;
                    curList.css({
                        top: newtop + 'px'
                    });
                    speed = e.originalEvent.changedTouches[0].clientY - lastY;
                    lastY = e.originalEvent.changedTouches[0].clientY;
                }).on('touchend', function () {
                    moveAuto();
                    _this.curHover();
                })
                function moveFn(event) {
                    var e = event || window.event;
                    e.preventDefault();
                    curList.unbind('mouseover');
                    var newtop = e.clientY - disY - t + initT;
                    curList.css({
                        top: newtop + 'px'
                    });
                    speed = e.clientY - lastY;
                    lastY = e.clientY;
                }
                function upFn() {
                    moveAuto();
                    _this.curHover();
                    $(document).unbind('mousemove mouseup');
                }
                function moveAuto() {
                    var t = curList.position().top;
                    var maxT = curW * len - curH;
                    function retT() {
                        var moveT = 0;
                        var a = Math.ceil((t + speed) / liW) * liW;
                        var b = Math.floor((t + speed) / liW) * liW;
                        if (t >= 0) {
                            moveT = 0;
                        } else if (t <= -maxT) {
                            moveT = -maxT;
                        } else {
                            a >= 0 ? a = 0 : a;
                            b <= -maxT ? b = -maxT : b;
                            if (speed > 0) {
                                moveT = a;
                            } else if (speed < 0) {
                                moveT = b;
                            }
                        }
                        return moveT
                    }
                    curList.animate({
                        top: retT() + 'px'
                    })
                }
            }
        }
        obj.init();
    }//详情竖屏组图
    $.fn.slider = function (options) {
        var def = {
            targetDom: null,
            color: null
        }
        var self = $(this);
        var options = $.extend(def, options);
        var target = self.find(options.targetDom);
        var imgLi = target.children();
        var len = imgLi.length;
        var imgArr = [];
        imgLi.each(function () {
            var src = $(this).find('img').attr('src');
            imgArr.push(src);
        })
        var color = options.color;
        var dW = $(document).width();
        var nowIndex = 0, timer = null, flag = true;
        var obj = {
            init: function () {
                this.render();
                this.bind();
                this.changeStyle();
                this.autoMove();
                this.swiper();
            },
            render: function () {
                var htmlStr = '<ol class="cur-list"></ol>\
                <div class="prev-btn">\
                    <i class="fa fa-angle-left" aria-hidden="true"></i>\
                </div>\
                <div class="next-btn">\
                    <i class="fa fa-angle-right" aria-hidden="true"></i>\
                </div>'
                self.append(htmlStr);
                var curBox = self.find('.cur-list');
                var str = '';
                for (var i = 0; i < len; i++) {
                    str += '<li data=' + i + '></li>'
                }
                curBox.append(str);
                var curLi = curBox.find('li');
                var clone = target.html();
                target.append(clone);
                imgLi = target.children();
                curLi.eq(0).addClass('active');
                imgLi.width(1 / (len * 2) * 100 + '%');
                target.width((len * 2) * 100 + '%');
                imgLi.eq(0).find('.tit').show().css({
                    top: '50%'
                })
                target.css({
                    left: 0
                });
                curBox.find('li').css({
                    borderColor: color
                });
            },
            changeStyle: function () {
                var curBox = self.find('.cur-list');
                curBox.find('li').attr('style', '').css({
                    borderColor: color
                });
                if (color) {
                    curBox.find('.active').css({
                        background: color,
                        borderColor: color
                    })
                }
            },
            bind: function () {
                var curLi = self.find('.cur-list li');
                var prev = self.find('.prev-btn');
                var next = self.find('.next-btn');
                var _this = this;
                $(curLi).add($(prev)).add($(next)).on('click', function () {
                    if ($(this).attr('class') == 'prev-btn') {
                        _this.move('prev-btn');
                    } else if ($(this).attr('class') == 'next-btn') {
                        _this.move('next-btn');
                    } else {
                        _this.move($(this).index())
                    }
                })
                self.on('mouseover', function () {
                    clearTimeout(timer)
                }).on('mouseout', function () {
                    _this.autoMove();
                })
            },
            autoMove: function () {
                var _this = this;
                var lens = target.find('li').length;
                clearTimeout(timer);
                timer = setTimeout(function () {
                    _this.move('next-btn');
                }, 3000)
            },
            move: function (value) {
                var curBox = self.find('.cur-list');
                var lens = target.find('li').length;
                var w = target.find('li').width();
                var l = target.offset().left;
                if (l == -w * (lens / 2)) {
                    target.css({
                        left: '0%'
                    })
                } else if (l == -w * (lens / 2 + 1)) {
                    target.css({
                        left: '-100%'
                    })
                }
                if (flag) {
                    flag = false;
                    if (value == 'prev-btn') {
                        if (nowIndex == 0) {
                            target.css({
                                left: -len * 100 + '%'
                            })
                            nowIndex = len - 1;
                        } else {
                            nowIndex--;
                        }
                    } else if (value == 'next-btn') {
                        nowIndex++;
                        if (nowIndex == len) {
                            target.animate({
                                left: -len * 100 + '%'
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
                    this.changeIndex(nowIndex);
                    this.sliderMove();
                }
            },
            sliderMove: function () {
                var _this = this;
                target.animate({
                    left: -nowIndex * 100 + '%'
                }, function () {
                    flag = true;
                    _this.autoMove();
                })
            },
            changeIndex: function (index) {
                self.find('.cur-list .active').removeClass('active');
                self.find('.cur-list li').eq(index).addClass('active');
                this.changeStyle();
            },
            swiper: function () {
                var _this = this;
                var startX, startY, l;
                var w = target.find('li').width();
                var lens = target.find('li').length;
                var X, Y, mobTimer = null;
                self.on("touchstart", startFn);
                function startFn(e) {
                    clearTimeout(timer);
                    if (nowIndex == 0) {
                        target.css({
                            left: -w * (lens / 2) + 'px'
                        })
                    } else if (nowIndex == 1) {
                        target.css({
                            left: -w + 'px'
                        })
                    }
                    startX = e.originalEvent.changedTouches[0].pageX;
                    startY = e.originalEvent.changedTouches[0].pageY;
                    l = target.position().left;
                    self.on("touchmove", moveFn);
                    self.on("touchend", endFn);
                }
                function moveFn(e) {
                    var moveEndX = e.originalEvent.changedTouches[0].pageX,
                        moveEndY = e.originalEvent.changedTouches[0].pageY;
                    X = moveEndX - startX;
                    Y = moveEndY - startY;
                    e.preventDefault();
                    target.css({
                        left: l + X + 'px'
                    })
                }
                function endFn() {
                    if (Math.abs(X) > w / 5) {
                        if (X < 0) {
                            $(target).animate({
                                left: l + (-w) + 'px'
                            })
                            nowIndex++;
                            if (nowIndex >= lens / 2) {
                                nowIndex = 0
                            }
                        } else if (X > 0) {
                            $(target).animate({
                                left: l + w + 'px'
                            })
                            nowIndex--;
                            if (nowIndex < 0) {
                                nowIndex = lens / 2 - 1
                            }
                        }
                    } else if (Math.abs(X) < w / 5) {
                        $(target).animate({
                            left: l + 'px'
                        })
                    }
                    X = 0;
                    self.unbind('touchmove touchend');
                    _this.changeIndex(nowIndex);
                    _this.autoMove();
                }
            }

        }
        obj.init();
    }//轮播图
    $.fn.backTop = function (options) {
        var def = {
            speed: 500,
            color: null
        }
        var opt = $.extend(def, options);
        var top = opt.top;
        var speed = opt.speed;
        var color = opt.color;
        var self = this;
        self.css({
            background: color
        })
        function move() {
            $(window).scroll(function () {
                var scrollTop = $(this).scrollTop();
                if (scrollTop > 300) {
                    self.fadeIn();
                } else {
                    self.fadeOut();
                }
            })
        }
        move();
        function clickFn() {
            self.on('click', function () {
                $('html,body').animate({
                    scrollTop: 0
                }, speed)
            })
        }
        clickFn();
    }
    $.fn.sliderItem = function (options) {
        var def = {
            showLen: 4,
            running: true,
            speed: 1500,
            targetDom: null,
        };
        var opt = $.extend(def, options);
        var showLen = opt.showLen, running = opt.running, target = $(this).find(opt.targetDom), speed = opt.speed, color = opt.color, running = opt.running;
        var _this = $(this);
        var imgLi, len, key;
        var item, winW, w, timer, moveW;
        var index = 0;
        function render() {
            var html = '<div class="prev">\
                    <i class="fa fa-angle-left" aria-hidden="true"></i>\
                </div>\
                <div class="next">\
                    <i class="fa fa-angle-right" aria-hidden="true"></i>\
                </div>';
            _this.append(html);
            var clone = target.html();
            target.append(clone);
            imgLi = target.children();
            len = target.children().length;
        }
        render();
        bindEvent();
        function bindEvent() {
            var prev = _this.find('.prev');
            var next = _this.find('.next');
            prev.on('click', function () {
                clickFn('prev');
            })
            next.on('click', function () {
                clickFn('next');
            })
            _this.on('mouseover', function () {
                clearInterval(timer);
            }).on('mouseout', function () {
                move()
            })
        }
        function clickFn(val) {
            clearInterval(timer);
            if (val == 'prev') {
                if (index == 0) {
                    target.css({
                        left: -(moveW * len / 2) + '%'
                    })
                    index = len / 2 - 1;
                } else {
                    index--;
                }

            } else {
                index++;
                if (index == len / 2) {
                    target.animate({
                        left: -(moveW * (len / 2)) + '%'
                    }, function () {
                        target.css({
                            left: 0
                        })
                    })
                    index = 0;
                }
            }
            target.animate({
                left: -moveW * index + '%'
            }, function () {
                move()
            })
        }
        function frame() {
            item = Math.ceil(len / showLen);
            if (winW <= 768) {
                showLen = 1;
            } else {
                showLen = opt.showLen;
            }
            if (showLen > len / 2) {
                showLen = 4;
            }
            w = (100 / showLen / item);
            moveW = (100 / showLen);
            winW = $(document).width();
            target.width(item * 100 + '%');
            imgLi.css({
                width: w + '%'
            });
            requestAnimationFrame(frame);
        }
        frame()
        function move() {
            if (running) {
                var next = _this.find('.next');
                clearInterval(timer);
                timer = setInterval(function () {
                    clickFn('next');
                }, speed)
            }
        }
        move()
    }
    $.fn.dragMove = function (options) {
        var def = {
            showLen: 5,
            targetDom: null
        }
        var opt = $.extend(def, options);
        var showLen = opt.showLen, target = $(this).find(opt.targetDom);
        var self = $(this);
        var li = target.children();
        var len = li.length;
        var item, winW, curW, liW;
        target.width(len * 100 + '%');
        li.width(100 / len / showLen + '%');
        target.css({
            left: '0%'
        });
        var l = target.offset().left;
        var initL, lastX = 0;
        var num = 0;
        var disX;
        var speed = 0;
        var first = 0, last = 0, key = false;
        var myfirst = 0, mylast = 0;
        var hArr = [];
        var listA = target.find('a');
        listA.each(function () {
            var href = $(this).attr('href');
            hArr.push(href);
        })
        listA.attr('href', 'javascript:void(0)')
        target.on('mousedown', function (event) {
            if (len > showLen) {
                first = new Date().getTime();
                initL = target.position().left;
                var e = event || window.event;
                e.stopPropagation();
                myfirst = e.clientX;
                disX = e.clientX - l;
                $(document).on('mousemove', moveFn);
                $(document).on('mouseup', upFn);
            }
        })
        target.on('touchstart', function (e) {
            initL = target.position().left;
            disX = e.originalEvent.changedTouches[0].clientX - l;
        }).on('touchmove', function (e) {
            e.preventDefault();
            var newLeft = e.originalEvent.changedTouches[0].clientX - disX - l + initL;
            target.css({
                left: newLeft + 'px'
            });
            speed = e.originalEvent.changedTouches[0].clientX - lastX;
            lastX = e.originalEvent.changedTouches[0].clientX;
        }).on('touchend', function () {
            moveAuto();
        })
        function moveFn(event) {
            var e = event || window.event;
            e.preventDefault();
            var newLeft = e.clientX - disX - l + initL;
            target.css({
                left: newLeft + 'px'
            });
            speed = e.clientX - lastX;
            lastX = e.clientX;
        }
        function upFn(e) {
            mylast = e.clientX;
            moveAuto();
            $(document).unbind('mousemove mouseup')
        }
        function moveAuto() {
            last = new Date().getTime();
            var l = target.position().left;
            var maxL = liW * len - curW;
            function retL() {
                var moveL = 0;
                var a = Math.ceil((l + speed) / liW) * liW;
                var b = Math.floor((l + speed) / liW) * liW;
                if (l >= 0) {
                    moveL = 0;
                } else if (l <= -maxL) {
                    moveL = -maxL;
                } else {
                    a >= 0 ? a = 0 : a;
                    b <= -maxL ? b = -maxL : b;
                    if (speed > 0) {
                        moveL = a;
                    } else if (speed < 0) {
                        moveL = b;
                    }
                }
                return moveL
            }
            if (last - first < 200 && mylast - myfirst == 0) {
                hArr.forEach(function (ele, index) {
                    listA.eq(index).attr('href', ele)
                })
            } else {
                target.animate({
                    left: retL() + 'px'
                })
            }

        }
        function frame() {
            item = Math.ceil(len / showLen);
            if (winW <= 768) {
                showLen = 2;
            } else {
                showLen = opt.showLen;
            }
            if (showLen > len) {
                showLen = 5;
            }
            w = (100 / showLen / item);
            curW = self.width();
            moveW = (100 / showLen);
            winW = $(document).width();
            target.width(item * 100 + '%');
            li.css({
                width: w + '%'
            });
            liW = li.outerWidth();
            requestAnimationFrame(frame);
        }
        frame()
    }
    $.fn.can = function (options) {
        var def = {
            color: '#30a6de',
            font: '24px',
            height: 60,
            callback: null
        }
        opt = $.extend(def, options);
        var self = $(this);
        var color = opt.color;
        var font = opt.font;
        var height = opt.height;
        var callback = opt.callback;
        var word = opt.word;
        var arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        var canStr, str;
        if(word){
            for (var i = 65; i < 122; i++) {
                if (i > 90 && i < 97) {
                    continue;
                }
                arr.push(String.fromCharCode(i));
            }
        }
        function draws() {
            canStr = '';
            str = '';
            for (var i = 0; i < 4; i++) {
                var a = arr[Math.floor(Math.random() * arr.length)]
                canStr += a + ' ';
                str += a;
            }
            var can = self[0];
            if (can) {
                var cxt = can.getContext('2d');
                cxt.clearRect(0, 0, can.width, can.height);
                cxt.font = font + ' Microsoft Yahei';
                cxt.fillStyle = color;
                cxt.textAlign = "center";
                cxt.setTransform(1, -0.09, 0.2, 1, 0, 12);
                cxt.fillText(canStr, can.width / 2, height);
            }
            return str;
        }
        callback(draws())
        self.on('click', function (e) {
            callback(draws())
            e.preventDefault();
        })
    }
})(jQuery)

