function init() {
    login();
    loading();
    menu();
    new WOW().init();
    bindEvent();
    page();
    system();
    info();
    vip();
    vipFront();
    mall();
    coupon();
    pay();
    message();
    links();
    role();
    authority();
    share();
    allCheck();
    viewFn();
    removeImg();
}
init();

var switchVlue = [
    { 'open': '开启', 'off': '关闭' },
    { 'open': '上架', 'off': '下架' },
    { 'open': '未审核', 'off': '已审核' },
]

function prompt(value, callback) {
    $('.alert-prompt').show();
    $('.prompt .p-init').text(value);
    $('.prompt').animate({ top: '10%' }).delay(1000).animate({
        top: '-50%' 
    }, callback);
}//提示框


function login() {
    $('.login-sub-btn').on('click', function () {
        if ($('.login-user').val() == '') {
            $('.login-user').parents('.inp').find('.error').fadeIn();
            return false;
        } else {
            $('.login-user').parents('.inp').find('.error').fadeOut();
        }
        if ($('.login-pass').val() == '') {
            $('.login-pass').parents('.inp').find('.error').fadeIn();
            return false;
        } else {
            $('.login-pass').parents('.inp').find('.error').fadeOut();
        }
        var admin_name=$('.login-user').val();
        var admin_pwd=$('.login-pass').val();
    

        $.ajax({
            type: 'POST',
            url: "/admin.php/login/login.html",
            data:{'admin_name':admin_name,'admin_pwd':admin_pwd},
            dataType:'JSON',
            error: function () {
                prompt('登录失败', function () {
                    $('.alert-prompt').hide();
                });
            },
            success: function (data) {
                var b=$.parseJSON(data);
              
                if (b.data == '0') {
                    prompt('登录成功', function () {
                        window.location.href = "/admin.php/Index/index";
                    });
                } else if (b.data == '1') {
                    prompt('账号或者密码错误', function () {
                        $('.alert-prompt').hide();
                    });
                }
            }
        })
        return false;
    })
}

document.onreadystatechange = loading;
function loading() {
    if (document.readyState == "complete") {
        $('.loading').hide();
    }
}


function menu() {
    var liId = sessionStorage.liId;
    var sonId = sessionStorage.sonId;
    var li = $('.index-content .left-menu .menus .toggle-li');
    var liSon = li.find('li');
    li.eq(liId).find('.menus-son').show();
    li.eq(liId).find('.toggle-a').addClass('a-active');
    li.eq(liId).find('.rig').addClass('rig-active').css({
        transition:'all ease 0s'
    });
    li.eq(liId).find('li').eq(sonId).addClass('active');
    liSon.on('click',function(e){
        var sonId=$(this).index();
        sessionStorage.sonId = sonId;
        e.stopPropagation(); 
    })
    li.on('click', function () {
        $('.right-content').removeClass('right-active');
        $('.left-menu').removeClass('left-active');
        var liId = $(this).index();
        sessionStorage.liId = liId ;
        if ($(this).find('.menus-son').css('display') == 'none') {
            $(this).find('.menus-son').slideDown();
            $(this).find('.toggle-a').addClass('a-active');
            $(this).find('.rig').css({
                transition:'all ease 0.3s' 
            }).addClass('rig-active');
            $(this).siblings('.toggle-li').find('.menus-son').slideUp();
            $(this).siblings('.toggle-li').find('.toggle-a').removeClass('a-active');
            $(this).siblings('.toggle-li').find('.rig').removeClass('rig-active');
        } else {
            $(this).find('.menus-son').slideUp();
            $(this).find('.toggle-a').removeClass('a-active');
            $(this).find('.rig').css({
                transition:'all ease 0.3s' 
            }).removeClass('rig-active');
        }
    })
    $('.index-content .right-content .top .left-icon').on('click', function () {
        $(this).parents('.right-content').toggleClass('right-active');
        $('.left-menu').toggleClass('left-active');
        var a = $('.index-content .left-menu .menus .toggle-li .a-active');
        a.siblings('.menus-son').fadeToggle();
    })
}


function bindEvent() {
    $('.pic li').each(function (i) {
        $('.pic li').eq(i).attr('data-wow-delay', 0.2 + i * 0.2 + 's')
    })
    $('.tab .tab-menus>li button').each(function (i) {
        $(this).on('click', function () {
            $('.tab .tab-content>li').hide().css({
                left: '80%'
            });
            $('.tab .tab-content>li').eq(i).show().animate({
                left: '0'
            });
            $('.tab .tab-menus>li').removeClass('active');
            $('.tab .tab-menus>li button').attr('disabled', false);
            $(this).attr('disabled', 'disabled');
            $(this).parents('li').addClass('active');
        })  
    })
    if($('.img-box .list').length==0){
        $('.img-box .no-img').fadeIn();
    }else{
        $('.img-box .no-img').hide()
    }
}

function page() {
    $("#page1").paging({
        pageNo: 1,
        totalPage: 10,//总页数
        totalSize: 100,//总记录
        callback: function (num) {
            console.log(num);
        }

    })//分页
    $("#page2").paging({
        pageNo: 1,
        totalPage: 10,//总页数
        totalSize: 100,//总记录
        callback: function (num) {
            console.log(num);
        }

    })//分页
}


function system() {
    $('.system-con .inp-sub').on('click', function () {
        var imp = $(this).parents('form').find('.imp');
        var textarea = $(this).parents('form').find('textarea');
        for (var i = 0; i < imp.length; i++) {
            if ($(imp[i]).val() == '') {
                $(imp[i]).focus();
                $(imp[i]).parent('li').find('.error').fadeIn();
                return false;
            } else {
                $(imp[i]).parent('li').find('.error').fadeOut();
            }
        }
        var form = $(this).parents('form');

        var data=$(form).serialize();

        var url = form.attr('action');
     
        $(form).ajaxForm({
            type: 'POST',
            url: url,
            dataType:'text',
            data:form,
            error: function () {
                prompt('提交失败', function () {
                    $('.alert-prompt').hide();
                });
            },
            success: function (data) {
                
                     prompt('提交成功', function () {
                    $('.alert-prompt').hide();
                });
            }
        })
    })
}


function info() {
    $('#info').on('click', '.myremove', function () {
        var par = $(this).parents('td');
        var id = $(par).find('.id').text();
        var data = { 'id': id };
        appendRemove(par, '删除', data);
    })
    $('.info .all-myremove').on('click', function () {
        var name = $(this).attr('id');
        var par = $(this).parents('#info');
        mycheck(par, '删除',name)
    })
    $('.info .tj .all-tj').on('click', function () {
        var name = $(this).attr('id');
        var par = $(this).parents('#info');
        mycheck(par, '推荐',name);
    })
    $('#info').on('click', '.mystop', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var dom = par.parents('tr').find('.drops');
        var tit = dom.text();
        var btn = $(this);
        var data;
        if (tit == switchVlue[1].off) {
            data = { 'id': id, 'status': 1 }
            appendStop(par, switchVlue[0].open, data, dom, btn, 0, 'fa-check-circle-o', 'fa-ban', 'mystyle-open', 'mystyle-off');
        } else if (tit == switchVlue[1].open) {
            data = { 'id': id, 'status': 1 }
            appendStop(par, switchVlue[0].off, data, dom, btn, 0, 'fa-check-circle-o', 'fa-ban', 'mystyle-open', 'mystyle-off');
        }
    })

   $('#info .check').on('change', function () {
        var checks = $('#info tr td').find('input[type="checkbox"]');
        var self = this;
        if (self.checked) {
            $(checks).each(function () {
                this.checked = true;
            })
        } else {
            $(checks).each(function () {
                this.checked = false;
            })
        }
    })
    $('#info').on('click', '.myedit', function () {
        var par = $(this).parents('td');
        appendEdit(par, 'info_edit');
    })
    $('#info .add-info-btn').on('click', function () {
        appendAdd('info_add');
    })
    infoMenu();
    function infoMenu() {
        $('.info-menu .menus>li>a').on('click', function () {
            if ($(this).parent().find('.info-menu-son').css('display') == 'none') {
                $(this).parent().find('.info-menu-son').slideDown();
                $(this).parent().find('.rig').addClass('rig-active');
                $(this).parent().siblings('.toggle-li').find('.info-menu-son').slideUp();
                $(this).parent().siblings('.toggle-li').find('.rig').removeClass('rig-active');
                $(this).parent().addClass('active');
                $(this).parent().siblings().removeClass('active');
            } else {
                $(this).parent().find('.info-menu-son').slideUp();
                $(this).parent().find('.rig').removeClass('rig-active');
                $(this).parent().removeClass('active');
            }
        })
        $('.menus li .fa-clear').on('click', function () {
            var par = $(this).parent('li');
            var id = par.find('.menu-name').attr("data_id");
            var data = { 'id': id };
            if (par.find('li').length > 0) {
                prompt('存在子分类，请重试', function () {
                    $('.alert-prompt').hide();
                });
                return false;
            }
            appendRemove(par, '删除', data);
        })//分类管理一级分类删除
        $('.menus li .son-clear').on('click', function () {
            var par = $(this).parent();
            var id = par.find('.menu-son-name').attr("data_id");
            var data = { 'id': id };
            appendRemove(par, '删除', data);
        })//分类管理二级分类删除
    }
   $('.info .info-list ul li .info-list-btn').on('click', function () {
        var form = $(this).parents('.info-list-form');
        var val = form.find('.imp').val();

        if (val == '') {
            form.find('.error').fadeIn();
            form.find('.imp').focus();
            return false;
        } else {
            
            form.find('.error').fadeOut();
            form.ajaxForm({
                type: 'post',
                url: form.attr('action'),
                error: function () {
                    prompt('添加失败', function () {
                        $('.alert-prompt').hide();
                    });
                },
                success: function () {
                    prompt('添加成功', function () {
                        window.location.reload();
                    });
                }
            })
        }

    })
   $('.info .info-left-btn').on('click', function () {
        $(this).toggleClass('info-left-btn-active');
        $(this).parent().toggleClass('info-my-active');
        $(this).parents('.info-main').find('.info-menu').toggleClass('info-menu-active');
    })//分类管理侧边栏伸缩
}//产品管理



function vip() {
    $('#vip').on('click', '.myremove', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var data = { 'id': id };
        appendRemove(par, '删除', data);
    })
    $('#vip').on('click', '.mystop', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var dom = par.parents('tr').find('.mystyle');
        var tit = dom.text();
        var btn = $(this);
        var data;
        if (tit == switchVlue[0].off) {
            data = { 'id': id, 'status': 1 }
            appendStop(par, switchVlue[0].open, data, dom, btn, 0, 'fa-check-circle-o', 'fa-ban', 'mystyle-open', 'mystyle-off');
        } else if (tit == switchVlue[0].open) {
            data = { 'id': id, 'status': 0 }
            appendStop(par, switchVlue[0].off, data, dom, btn, 0, 'fa-check-circle-o', 'fa-ban', 'mystyle-open', 'mystyle-off');
        }
    })
    $('#vip .all-myremove').on('click', function () {
        var name = $(this).attr('id');
        var par = $(this).parents('#vip');
        mycheck(par, '删除',name)
    })
    $('#vip').on('click', '.myedit', function () {
        var par = $(this).parents('td');
        appendEdit(par);
    })
    $('#vip .add-vip-btn').on('click', function () {
        var par = $(this).parents('#vip');
        appendAdd('vip_add');
    })
    $('#vip .check').on('change', function () {
        var checks = $('#vip tr td').find('input[type="checkbox"]');
        var self = this;
        if (self.checked) {
            $(checks).each(function () {
                this.checked = true;
            })
        } else {
            $(checks).each(function () {
                this.checked = false;
            })
        }
    })
}//VIP后台用户管理








function role() {
    $('#role').on('click', '.myremove', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var data = { 'id': id };
        appendRemove(par, '删除', data);
    })

    $('#role .all-myremove').on('click', function () {
        var name = $(this).attr('id');
        var par = $(this).parents('#role');
        mycheck(par, '删除',name)
    })
    $('#role').on('click', '.myedit', function () {
        var par = $(this).parents('td');
        appendEdit(par);
    })
    $('#role .add-vip-btn').on('click', function () {
        appendAdd('role_add');
    })
    $('#role .check').on('change', function () {
        var checks = $('#role tr td').find('input[type="checkbox"]');
        var self = this;
        if (self.checked) {
            $(checks).each(function () {
                this.checked = true;
            })
        } else {
            $(checks).each(function () {
                this.checked = false;
            })
        }
    })
}//VIP后台角色管理

function authority() {
    $('#authority').on('click', '.myremove', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var data = { 'id': id };
        appendRemove(par, '删除', data);
    })
    $('#authority .all-myremove').on('click', function () {
        var name = $(this).attr('id');
        var par = $(this).parents('#authority');
        mycheck(par, '删除',name)
    })
    $('#authority').on('click', '.myedit', function () {
        var par = $(this).parents('td');
        appendEdit(par);
    })
    $('#authority .add-vip-btn').on('click', function () {
        appendAdd('authority_add');
    })
    $('#authority .check').on('change', function () {
        var checks = $('#authority tr td').find('input[type="checkbox"]');
        var self = this;
        if (self.checked) {
            $(checks).each(function () {
                this.checked = true;
            })
        } else {
            $(checks).each(function () {
                this.checked = false;
            })
        }
    })
}//VIP后台权限管理





function vipFront() {
    $('#vipfront').on('click', '.myremove', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var data = { 'id': id };
        appendRemove(par, '删除', data);
    })
    $('#vipfront').on('click', '.mystop', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var dom = par.parents('tr').find('.mystyle');
        var tit = dom.text();
        var btn = $(this);
        var data;
        if (tit == switchVlue[0].off) {
            data = { 'id': id, 'status': 1 }
            appendStop(par, switchVlue[0].open, data, dom, btn, 0, 'fa-check-circle-o', 'fa-ban', 'mystyle-open', 'mystyle-off');
        } else if (tit == switchVlue[0].open) {
            data = { 'id': id, 'status': 0 }
            appendStop(par, switchVlue[0].off, data, dom, btn, 0, 'fa-check-circle-o', 'fa-ban', 'mystyle-open', 'mystyle-off');
        }
    })
    $('#vipfront .all-myremove').on('click', function () {
        var name = $(this).attr('id');
        var par = $(this).parents('#vipfront');
        mycheck(par,'删除',name);
    })
    $('#vipfront .all-mystop').on('click', function () {
        var par = $(this).parents('#vipfront');
        mycheck(par, '', '停用');
    })
    $('#vipfront').on('click', '.myedit', function () {
        var par = $(this).parents('td');
        appendEdit(par);
    })
    $('#vipfront .add-vip-btn').on('click', function () {
        appendAdd( 'vip_edit');
    })
    $('#vipfront .check').on('change', function () {
        var checks = $('#vipfront tr td').find('input[type="checkbox"]');
        var self = this;
        if (self.checked) {
            $(checks).each(function () {
                this.checked = true;
            })
        } else {
            $(checks).each(function () {
                this.checked = false;
            })
        }
    })
}//VIP前台用户管理



function mall() {
    $('#mall').on('click', '.myremove', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var data = { 'id': id };
        appendRemove(par, '删除', data);
    })
    $('#mall .all-myremove').on('click', function () {
        var name = $(this).attr('id');
        var par = $(this).parents('#mall');
        mycheck(par,'删除',name);
    })
    $('#mall .check').on('change', function () {
        var checks = $('#mall tr td').find('input[type="checkbox"]');
        var self = this;
        if (self.checked) {
            $(checks).each(function () {
                this.checked = true;
            })
        } else {
            $(checks).each(function () {
                this.checked = false;
            })
        }
    })
    $('#mall .vip-table .id .order').on('click', function () {
        var par = $(this).parent();
        par.find('.alert-edit').fadeIn();
        par.find('.alert-edit .ed-content').addClass('ed-content-active');
        $('.ed-top-no').on('click', function () {
            par.find('.alert-edit').fadeOut();
        })
    })
}//商城管理




function coupon() {
    $('#coupon').on('click', '.myremove', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var data = { 'id': id };
        appendRemove(par, '删除', data);
    })
    $('#coupon').on('click', '.mystop', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var tit = par.parents('tr').find('.mystyle').text();
        var data = { 'id': id };
        appendRemove(par, tit, data);

    })
    $('.coupon .all-myremove').on('click', function () {
        var par = $(this).parents('#coupon');
        var name = $(this).attr('id');
        mycheck(par, '删除',name)
    })
    $('#coupon .all-mystop').on('click', function () {
        var par = $(this).parents('#coupon');
        mycheck(par, 'all_stop', '停用')
    })
    $('#coupon').on('click', '.myedit', function () {
        var par = $(this).parents('td');
        appendEdit(par);
    })
    $('#coupon .add-vip-btn').on('click', function () {
        appendAdd('coupon_add');
    })
    $('#coupon .check').on('change', function () {
        var checks = $('#coupon tr td').find('input[type="checkbox"]');
        var self = this;
        if (self.checked) {
            $(checks).each(function () {
                this.checked = true;
            })
        } else {
            $(checks).each(function () {
                this.checked = false;
            })
        }
    })
}//优惠券



function pay() {
    $('#pay').on('click', '.myedit', function () {
        var par = $(this).parents('td');
        appendEdit(par);
    })
}




function message() {
    $('#message').on('click', '.myremove', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var data = { 'id': id };
        appendRemove(par, '删除', data);
    })
    $('#message').on('click', '.myreview', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var data = { 'id': id };
        appendRemove(par, '审核', data);
    })
    $('#message .all-myremove').on('click', function () {
        var par = $(this).parents('#message');
        var name = $(this).attr('id');
        mycheck(par, '删除',name)
    })
    $('#message').on('click', '.myedit', function () {
        var par = $(this).parents('td');
        appendEdit(par);
    })
    $('#message .add-vip-btn').on('click', function () {
        appendAdd('message_add');
    })
    $('#message .check').on('change', function () {
        var checks = $('#message tr td').find('input[type="checkbox"]');
        var self = this;
        if (self.checked) {
            $(checks).each(function () {
                this.checked = true;
            })
        } else {
            $(checks).each(function () {
                this.checked = false;
            })
        }
    })
}//留言板


function links() {
    $('#links').on('click', '.myremove', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var data = { 'id': id };
        appendRemove(par, '删除', '', data);
    })
    $('#links').on('click', '.mystop', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var dom = par.parents('tr').find('.mystyle');
        var tit = dom.text();
        var btn = $(this);
        var data;
        if (tit == switchVlue[0].off) {
            data = { 'id': id, 'status': 1 }
            appendStop(par, switchVlue[0].open, data, dom, btn, 0, 'fa-check-circle-o', 'fa-ban', 'mystyle-open', 'mystyle-off');
        } else if (tit == switchVlue[0].open) {
            data = { 'id': id, 'status': 0 }
            appendStop(par, switchVlue[0].off, data, dom, btn, 0, 'fa-check-circle-o', 'fa-ban', 'mystyle-open', 'mystyle-off');
        }
    })
    $('#links .all-myremove').on('click', function () {
        var par = $(this).parents('#links');
        var name = $(this).attr('id');
        mycheck(par, '删除',name)
    })
    $('#links').on('click', '.myedit', function () {
        var par = $(this).parents('td');
        appendEdit(par, 'links_edit');
    })
    $('#links .add-vip-btn').on('click', function () {
        var par = $(this).parents('#links');
        appendAdd('links_edit');
    })
    $('#links .check').on('change', function () {
        var checks = $('#links tr td').find('input[type="checkbox"]');
        var self = this;
        if (self.checked) {
            $(checks).each(function () {
                this.checked = true;
            })
        } else {
            $(checks).each(function () {
                this.checked = false;
            })
        }
    })
}//友情链接

function share() {
    $('#share').on('click', '.myremove', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var data = { 'id': id };
        appendRemove(par, '删除', data);
    })

    $('#share').on('click', '.mystop', function () {
        var par = $(this).parents('td');
        var id = $(par).siblings('.id').text();
        var dom = par.parents('tr').find('.mystyle');
        var tit = dom.text();
        var btn = $(this);
        var data;
        if (tit == switchVlue[0].off) {
            data = { 'id': id, 'status': 1 }
            appendStop(par, switchVlue[0].open, data, dom, btn, 0, 'fa-check-circle-o', 'fa-ban', 'mystyle-open', 'mystyle-off');
        } else if (tit == switchVlue[0].open) {
            data = { 'id': id, 'status': 0 }
            appendStop(par, switchVlue[0].off, data, dom, btn, 0, 'fa-check-circle-o', 'fa-ban', 'mystyle-open', 'mystyle-off');
        }
    })

    $('#share .all-myremove').on('click', function () {
        var par = $(this).parents('#share');
        var name = $(this).attr('id');
        mycheck(par,'删除',name)
    })
    $('#share').on('click', '.myedit', function () {
        var par = $(this).parents('td');
        appendEdit(par);
    })
    $('#share .add-vip-btn').on('click', function () {
        appendAdd('share_add');
    })
    $('#share .check').on('change', function () {
        var checks = $('#share tr td').find('input[type="checkbox"]');
        var self = this;
        if (self.checked) {
            $(checks).each(function () {
                this.checked = true;
            })
        } else {
            $(checks).each(function () {
                this.checked = false;
            })
        }
    })
}//分享代码




function appendAdd(url) {
    $('.alertAdd-edit .img-file').append('<div id="zyupload" class="zyupload"></div>');
    $('.ed-top-no').add('.edit-sub-btn button.no').on('click', function () {
        $('.alertAdd-edit').hide();
        $('.alertAdd-edit .ed-content').removeClass('ed-content-active');
        $('.alertAdd-edit .img-file').find('#zyupload').remove();
    })
    addEditFn();
    $('.alertAdd-edit').fadeIn();
    $('.alertAdd-edit .ed-content').addClass('ed-content-active');
    $('.edit-sub-btn .yes').on('click', function () {
        var imp = $('.alertAdd-edit .imp');
        for (var i = 0; i < imp.length; i++) {
            if ($(imp[i]).val() == '') {
                $(imp[i]).parent().find('.error').fadeIn();
                $(imp[i]).focus();
                return false;
            }
            else {
                $(imp[i]).parent().find('.error').fadeOut();
            }
        }
        var imgs = $('.upload_image');
        var arr = [];
        for (var i = 0; i < imgs.length; i++) {
            arr.push($(imgs[i]).attr('src'));
        }
        var sHTML = $('#summ').summernote('code');
        console.log(sHTML.length);
        var data;
        function data(){
            if(sHTML.length>0){
                return  data = { "img": arr ,"content":sHTML};
            }else{
                return data = { "img": arr }
            }
        }
        

        
        console.log(data);
        $('.alertAdd-edit .edit-form').ajaxForm({
            type: 'POST',
            url: $(this).attr('action'),
            data: data(),
            error: function () {
                prompt('提交失败', function () {
                    $('.alert-prompt').hide();
                });
            },
            success: function (data) {
                var b=$.parseJSON(data);
            
                if(b.data == 2){
                    prompt('提交成功', function () {
                    $('.alert-prompt').hide();
                    $("#url").val("");
                    $("#proname").val("");
                    $("#price").val("");
                    $("#external").val("");
                    $("#abstract").val("");
                    $("#sku").val("");
                    $('#edit-text-a').find('.note-editable').html("");
                    
                    });
                }else{
                   prompt('提交成功', function () {
                    window.location.reload();
                    }); 
                }
             
            }
        })
        
    })

}//添加弹出框

function appendEdit(par) {
    par.find('.alert-edit .img-file').append('<div id="zyupload" class="zyupload"></div>');
    $('.ed-top-no').add('.edit-sub-btn button.no').on('click', function () {
        par.find('.alert-edit').hide();
        par.find('.alert-edit .ed-content').removeClass('ed-content-active')
        par.find('.alert-edit .img-file').find('#zyupload').remove();
    })
    par.find('.alert-edit').fadeIn();
    par.find('.alert-edit .ed-content').addClass('ed-content-active');
    addEditFn();
    par.find('.edit-sub-btn .yes').on('click', function () {
        var imp = par.find('.alert-edit .imp');
        for (var i = 0; i < imp.length; i++) {
            if ($(imp[i]).val() == '') {
                $(imp[i]).parent().find('.error').fadeIn();
                $(imp[i]).focus();
                return false;
            }
            else {
                $(imp[i]).parent().find('.error').fadeOut();
            }
        }



        var imgs = par.find('.upload_image');

        var arr = [];
        for (var i = 0; i < imgs.length; i++) {
            arr.push($(imgs[i]).attr('src'));
        }
        var sHTML = par.find('.edit-sum').summernote('code');

        var data;
        function data(){
            if(sHTML.length>0){
                return  data = { "img": arr ,"content":sHTML};
            }else{
                return data = { "img": arr }
            }
        }
 
        par.find('.alert-edit .edit-form').ajaxForm({
            type: 'POST',
            url: $(this).attr('action'),
            data: data(),
            error: function () {
                prompt('提交失败', function () {
                    $('.alert-prompt').hide();
                });
            },
            success: function (data) {
                var b=$.parseJSON(data);
            
                if(b.data == 2){
                    prompt('提交成功', function () {
                    $('.alert-prompt').hide();
                    });
                }else{
                   prompt('提交成功', function () {
                    window.location.reload();
                    }); 
                }
             
            }
        })

    })
}//编辑弹出框


function removeImg(){
    var imgRemove =$('.img-box .list .remove-img-btn');
    imgRemove.on('click',function(){
        data=$(this).parents('.list').find('img').attr('data-id');
        console.log(data,$(this).attr('ajax-url'));
        var selfs=$(this);
        $.ajax({
            type:"post",
           url:$(this).attr('ajax-url'),
           data:{'imgid':data},
           error:function(){
                prompt('删除失败', function () {
                    $('.alert-prompt').hide();
                });
           },
           success:function(){
                prompt('删除成功', function () {
                    $('.alert-prompt').hide();
                });
                selfs.parents('.list').animate({
                    opacity:'0'
                },function(){
                    $(this).remove();
                    if($('.img-box .list').length==0){
                        $('.img-box .no-img').fadeIn();
                    }else{
                        $('.img-box .no-img').hide()
                    }
                });
           }  
        })
    })
}


function impImg(){
    $('.list-main').on('click',function(){
        $('.list-main').removeClass('imp-img');
        $(this).addClass('imp-img');
        var id=$(this).attr('data-id');
        $.ajax({
            type:"post",
            url:$(this).attr('ajax-url'),
            data:{'id':id},
            error:function(){

            },
            success:function(){

            }
        })

    })
}
impImg()
function addEditFn() {
    $("#zyupload").zyUpload({
        width: "100%",                 // 宽度
        height: "",                 // 宽度
        itemWidth: "120px",                 // 文件项的宽度
        itemHeight: "120px",                 // 文件项的高度
        url: '',              // 上传文件的路径
        fileType: ["jpg", "png", "js", "exe"],// 上传文件的类型
        fileSize: 51200000,                // 上传文件的大小
        multiple: true,                    // 是否可以多个文件上传
        dragDrop: true,                    // 是否可以拖动上传文件
        tailor: false,                    // 是否可以裁剪图片
        del: true,                    // 是否可以删除文件
        finishDel: false,  				  // 是否在上传文件完成后删除预览
    });
    $('.edit-sum').summernote({
        height: 500,
        tabsize: 2,
        lang: 'zh-CN',
        focus: false,
    });
    layui.use('laydate', function () {
        var laydate = layui.laydate;
        lay('.test-item').each(function () {
            laydate.render({
                elem: this
                , trigger: 'click',
                theme: '#2ab46f'
            });
        });
    })
    $('.coupon-code-btn').on('click', function () {
        $(this).siblings('.coupon-code-text').val(promoCode());
    })
    function promoCode() {
        var arr = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
        for (var i = 65; i < 122; i++) {
            if (i > 65 && i < 97) {
                continue;
            }
            arr.push(String.fromCharCode(i).toUpperCase());
        }
        var value = '';
        for (var i = 0; i < 6; i++) {
            value += arr[Math.floor(Math.random() * arr.length)];
        }
        return value;
    }//随机生成6位优惠码
    roleCheck();
    function roleCheck() {
        $('.max-all-check').on('change', function () {
            var checks = $(this).parents('.list').find('.role-http-con input[type="checkbox"]');
            var self = this;
            if (self.checked) {
                $(checks).each(function () {
                    this.checked = true;
                })
            } else {
                $(checks).each(function () {
                    this.checked = false;
                })
            }
        })
        $('.min-all-check').on('change', function () {
            var checks = $(this).parents('.role-list').find('.role-list-right input[type="checkbox"]');
            var self = this;
            if (self.checked) {
                $(checks).each(function () {
                    this.checked = true;
                })
            } else {
                $(checks).each(function () {
                    this.checked = false;
                })
            }
        })
    }//复选框勾选时事件
}//添加编辑公共事件








function appendRemove(par, tit, data, dom, btn, index, openIcon, offIcon, openClass, offClass) {               //par代表父级元素, url代表ajax提交地址, tit代表标题,data代表提交数据
    var str = '<div class="alert-remove">\
                    <div class="re-content">\
                        <div class="re-tit">\
                            <span>信息</span>\
                            <button class="re-top-no"></button>\
                        </div>\
                        <div class="text">\
                            <p>确认'+ tit + '吗？</p>\
                        </div>\
                            <div class="btn-r">\
                                <button class="yes">确定</button>\
                                <button class="no">取消</button>\
                            </div>\
                    </div>\
                </div>'
    $(par).append(str);
    $(par).find('.alert-remove').fadeIn();
    $(par).find('.alert-remove .re-content').addClass('re-content-active');
    $('.re-top-no').add('.btn-r .no').on('click', function () {
        $(this).parents('.alert-remove').fadeOut().remove();
    })
    var view = par.parents('tr').find('.myviews')
    $(par).find('.btn-r .yes').on('click', function () {
        try {
            if ($(dom).text() == switchVlue[index].open) {
                btn.find('i').removeClass(offIcon).addClass(openIcon);
                $(dom).text(switchVlue[index].off).removeClass(openClass).addClass(offClass);
                btn.attr('title', switchVlue[index].open);
            } else if ($(dom).text() == switchVlue[index].off) {
                btn.find('i').removeClass(openIcon).addClass(offIcon);
                $(dom).text(switchVlue[index].open).removeClass(offClass).addClass(openClass);
                btn.attr('title', switchVlue[index].off);
            }
        } catch (err) {

        }

        if (view.text() == '未审核') {
            view.addClass('myviews-off').removeClass('myviews-open').text('已审核');
            par.find('.myreview').addClass('myreview-off').attr({ 'disabled': 'disabled', 'title': '已审核' });
        }
        $(par).find('.alert-remove').fadeOut().remove();
        var url=par.find('.myremove').attr('ajax-url');
        $.ajax({
            type: 'POST',
            url:url,
            data: data,
            error: function () {
                prompt(tit + '失败', function () {
                    $('.alert-prompt').hide();
                });
            },
            success: function (data) {
                prompt(tit + '成功', function () {
                    window.location.reload();
                });
            }
        })
    })
}//删除弹出框





function appendStop(par, tit, data, dom, btn, index, openIcon, offIcon, openClass, offClass) {               //par代表父级元素, url代表ajax提交地址, tit代表标题,data代表提交数据
    var str = '<div class="alert-remove">\
                    <div class="re-content">\
                        <div class="re-tit">\
                            <span>信息</span>\
                            <button class="re-top-no"></button>\
                        </div>\
                        <div class="text">\
                            <p>确认'+ tit + '吗？</p>\
                        </div>\
                            <div class="btn-r">\
                                <button class="yes">确定</button>\
                                <button class="no">取消</button>\
                            </div>\
                    </div>\
                </div>'
    $(par).append(str);
    $(par).find('.alert-remove').fadeIn();
    $(par).find('.alert-remove .re-content').addClass('re-content-active');
    $('.re-top-no').add('.btn-r .no').on('click', function () {
        $(this).parents('.alert-remove').fadeOut().remove();
    })
    var view = par.parents('tr').find('.myviews')
    $(par).find('.btn-r .yes').on('click', function () {
        try {
            if ($(dom).text() == switchVlue[index].open) {
                btn.find('i').removeClass(offIcon).addClass(openIcon);
                $(dom).text(switchVlue[index].off).removeClass(openClass).addClass(offClass);
                btn.attr('title', switchVlue[index].open);
            } else if ($(dom).text() == switchVlue[index].off) {
                btn.find('i').removeClass(openIcon).addClass(offIcon);
                $(dom).text(switchVlue[index].open).removeClass(offClass).addClass(openClass);
                btn.attr('title', switchVlue[index].off);
            }
        } catch (err) {

        }

        if (view.text() == '未审核') {
            view.addClass('myviews-off').removeClass('myviews-open').text('已审核');
            par.find('.myreview').addClass('myreview-off').attr({ 'disabled': 'disabled', 'title': '已审核' });
        }
        $(par).find('.alert-remove').fadeOut().remove();
        var url=par.find('.mystop').attr('ajax-url');
        $.ajax({
            type: 'POST',
            url:url,
            data: data,
            error: function () {
                prompt(tit + '失败', function () {
                    $('.alert-prompt').hide();
                });
            },
            success: function (data) {
                var b=$.parseJSON(data);
            
                if(b.data == 2){
                    prompt('提交成功', function () {
                    $('.alert-prompt').hide();
                    });
                }else{
                   prompt('提交成功', function () {
                    window.location.reload();
                    }); 
                }
             
            }
        })
    })
}//删除弹出框



function mycheck(par, tit,name) {                         //par代表父级元素, url代表ajax提交地址, tit代表标题
    var check = par.find('.check-one');
    var checked = par.find(".check-one:checked");
    var arr = [];
    for (var i = 0; i < check.length; i++) {
        if (check[i].checked) {
            arr.push(check[i].value);
        }
    }
    var data = { 'id': arr };
    console.log(data);
    var str = '<div class="alert-remove">\
                    <div class="re-content">\
                        <div class="re-tit">\
                            <span>信息</span>\
                            <button class="re-top-no"></button>\
                        </div>\
                        <div class="text">\
                            <p>确认'+ tit + '吗？</p>\
                        </div>\
                            <div class="btn-r">\
                                <button class="yes">确定</button>\
                                <button class="no">取消</button>\
                            </div>\
                    </div>\
                </div>';
    $(par).append(str);
    $(par).find('.alert-remove').fadeIn();
    $(par).find('.alert-remove .re-content').addClass('re-content-active');
    $('.re-top-no').add('.btn-r .no').on('click', function () {
        $(this).parents('.alert-remove').fadeOut().remove();
    })
    var view = par.parents('tr').find('.myviews')
    $(par).find('.btn-r .yes').on('click', function () {
        $(par).find('.alert-remove').fadeOut().remove();
        var url=par.find('#'+name).attr('ajax-url');
        $.ajax({
            type: 'POST',
            url:url,
            data: data,
            error: function () {
                prompt(tit + '失败', function () {
                    $('.alert-prompt').hide();
                });
            },
            success: function (data) {
                var b=$.parseJSON(data);
            
                if(b.data == 2){
                    prompt(tit + '成功', function () {
                    $('.alert-prompt').hide();
                    });
                }else{
                   prompt(tit + '成功', function () {
                    window.location.reload();
                    }); 
                }
            }
            
        })
    })

}//批量处理事件  


function allCheck() {
    $('.all-myremove').add('.tj .all-tj').attr('disabled', 'disabled');
    var len;
    $('.check-one').add('.check').on('change', function () {
        len = $('.check-one:checked').length;
        if (this.checked) {
            $('.all-myremove').add('.tj .all-tj').attr('disabled', false).addClass('active');
        } else if (len == 0) {
            $('.all-myremove').add('.tj .all-tj').attr('disabled', 'disabled').removeClass('active');
        }
    })
}//批量删除按钮高亮



function viewFn() {
    $('.myviews').each(function () {
        if ($(this).text() == '已审核') {
            $(this).addClass('myviews-off').removeClass('hover');
            $(this).parents('tr').find('.myreview').addClass('myreview-off').attr({ 'disabled': 'disabled', 'title': '已审核' });
        } else if ($(this).text() == '未审核') {
            $(this).addClass('myviews-open');
        }
    })
}

function switchsInit(dom, btn, index, openIcon, offIcon, openClass, offClass) {
    $(dom).each(function () {
        var text = $(this).text();
        if (text == switchVlue[index].open) {
            $(this).parents('tr').find(btn).find('i').addClass(offIcon);
            $(this).parents('tr').find(btn).attr('title', switchVlue[index].off);
            $(this).addClass(openClass);
        } else if (text == switchVlue[index].off) {
            $(this).parents('tr').find(btn).find('i').addClass(openIcon);
            $(this).parents('tr').find(btn).attr('title', switchVlue[index].open);
            $(this).addClass(offClass);
        }
    })
}
switchsInit('.mystyle', '.mystop', 0, 'fa-check-circle-o', 'fa-ban', 'mystyle-open', 'mystyle-off');
switchsInit('.drops', '.mydrop', 1, 'fa-level-down', 'fa-level-down', 'drops-open', 'drops-off');