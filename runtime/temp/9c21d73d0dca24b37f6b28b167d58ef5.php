<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:62:"F:\etereauty\public/../application/admin\view\index\index.html";i:1533374706;s:52:"F:\etereauty\application\admin\view\public\left.html";i:1543904915;s:54:"F:\etereauty\application\admin\view\public\header.html";i:1534387111;s:54:"F:\etereauty\application\admin\view\public\footer.html";i:1530952388;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>后台主页</title>
    <link rel="stylesheet" href="/admin/css/index.css">
    <link rel="stylesheet" href="/admin/css/loading.css">
    <link rel="stylesheet" href="/admin/fonts/css/font-awesome.css">
    <link rel="stylesheet" href="/admin/css/animate.css">
    <link rel="stylesheet" href="/admin/css/page2.css">
</head>

<body>
    <div class="index-content">
        <div class="loading">
            <div id="preloader5"></div>
        </div>
        <div class="alert-prompt">
            <div class="prompt">
                <p class="tit">提示</p>
                <div class="p-init"></div>
            </div>
        </div>
        <div class="left-menu">
            <div class="logo">
                <a href="<?php echo url('index/index'); ?>">
                    <span class="">
                        <i class="fa fa-home"></i>
                    </span>
                    <img src="/admin/images/logo.png" alt="">
                </a>
            </div>
            <ul class="menus">
                <li class="toggle-li">
                    <a href="javascript:void(0)" class="toggle-a">
                        <span class="menu-cur">
                            <i class="fa fa-tachometer" aria-hidden="true"></i>
                        </span>
                        <span class="menu-name">
                            系统管理
                            <i class="fa fa-angle-right rig"></i>
                        </span>
                    </a>
                    <ul class="menus-son">
                        <li>
                            <a href="<?php echo url('admin/set/index'); ?>">系统设置</a>
                        </li>
                    </ul>
                </li>
                <li class="toggle-li">
                    <a href="javascript:void(0)" class="toggle-a">
                        <span class="menu-cur">
                            <i style="font-size:20px" class="fa fa-gift" aria-hidden="true"></i>
                        </span>
                        <span class="menu-name">
                            产品管理
                            <i class="fa fa-angle-right rig"></i>
                        </span>
                    </a>
                    <ul class="menus-son">
                        <li>
                            <a href="<?php echo url('admin/pro/index'); ?>">产品列表</a>
                        </li>
                        <li>
                            <a href="<?php echo url('admin/article/index'); ?>">添加文章</a>
                        </li>
                        <li>
                            <a href="<?php echo url('admin/banner/index'); ?>">添加轮播</a>
                        </li>
                       
                        <li>
                            <a href="<?php echo url('admin/proclass/index'); ?>">添加栏目</a>
                        </li>
                        
                    </ul>
                </li>
                <li class="toggle-li">
                    <a href="javascript:void(0)" class="toggle-a">
                        <span class="menu-cur">
                            <i class="fa fa-suitcase" aria-hidden="true"></i>
                        </span>
                        <span class="menu-name">
                            后台管理
                            <i class="fa fa-angle-right rig"></i>
                        </span>
                    </a>
                    <ul class="menus-son">
                        <li>
                            <a href="<?php echo url('admin/users/admin_role'); ?>">角色管理</a>
                        </li>
                        <li>
                            <a href="<?php echo url('admin/users/admin_permission'); ?>">权限管理</a>
                        </li>
                        <li>
                            <a href="<?php echo url('admin/users/admin_list'); ?>">管理员列表</a>
                        </li>
                    </ul>
                </li>
                <li class="toggle-li">
                    <a href="javascript:void(0)" class="toggle-a">
                        <span class="menu-cur">
                            <i class="fa fa-diamond" aria-hidden="true"></i>
                        </span>
                        <span class="menu-name">
                            会员管理
                            <i class="fa fa-angle-right rig"></i>
                        </span>
                    </a>
                    <ul class="menus-son">
                        <li>
                            <a href="<?php echo url('admin/customer/index'); ?>">用户列表</a>
                        </li>
                        <li>
                            <a href="<?php echo url('admin/message/index'); ?>">留言板</a>
                        </li>
                         <li>
                            <a href="<?php echo url('admin/book/index'); ?>">订阅用户</a>
                        </li>
                        <li>
                            <a href="<?php echo url('admin/aftersale/index'); ?>">售后管理</a>
                        </li>
                    </ul>
                </li>
                <li class="toggle-li">
                    <a href="javascript:void(0)" class="toggle-a">
                        <span class="menu-cur">
                            <i style="font-size:20px" class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </span>
                        <span class="menu-name">
                            商城管理
                            <i class="fa fa-angle-right rig"></i>
                        </span>
                    </a>
                    <ul class="menus-son">
                        <li>
                            <a href="<?php echo url('admin/order/index'); ?>">订单管理</a>
                        </li>
                        <li>
                            <a href="<?php echo url('admin/coupon/index'); ?>">优惠券</a>
                        </li>
                        <li>
                            <a href="<?php echo url('admin/pay/index'); ?>">支付管理</a>
                        </li>
                    </ul>
                </li>
                <li class="toggle-li">
                    <a href="javascript:void(0)" class="toggle-a">
                        <span class="menu-cur">
                            <i style="font-size:20px" class="fa fa-share-alt" aria-hidden="true"></i>
                        </span>
                        <span class="menu-name">
                            链接管理
                            <i class="fa fa-angle-right rig"></i>
                        </span>
                    </a>
                    <ul class="menus-son">
                        <li>
                            <a href="<?php echo url('admin/links/index'); ?>">友情链接</a>
                        </li>
                        <li>
                            <a href="<?php echo url('admin/share/index'); ?>">代码统计</a>
                        </li>
                    </ul>
                </li>
                 <li class="toggle-li">
                    <a href="javascript:void(0)" class="toggle-a">
                        <span class="menu-cur">
                            <i style="font-size:20px" class="fa fa-share" aria-hidden="true"></i>
                        </span>
                        <span class="menu-name">
                            模板管理
                            <i class="fa fa-angle-right rig"></i>
                        </span>
                    </a>
                    <ul class="menus-son">
                        <li>
                            <a href="<?php echo url('admin/mo/index'); ?>">模板管理</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="right-content">
            <div class="top">
                <div class="left-icon" title="侧边栏伸缩">
                    <i class="fa fa-outdent" aria-hidden="true"></i>
                </div>
                <div class="personal">
                    <p>欢迎您，
                        <span class="person-name"><?php echo $user_name; ?></span>
                    </p>
                </div>
                <ul class="menu-icon">
                  <li>
                      <div class="news">
                          <a href="/" target="_blank" >
                             回到主页
                          </a>
                      </div>
                  </li>
                    <li>
                     <div class="set">
                            <a href="<?php echo url('set/index'); ?>" title="系统设置">
                                <i class="fa fa-cog" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="loginout">
                            <a href="<?php echo url('login/login_out'); ?>" title="退出登录">
                                <i class="fa fa-power-off" aria-hidden="true"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="con">
                <ul class="pic">
                    <li class="animated wow fadeInRight">
                        <div class="">
                            <div class="pic-left">
                                <img src="/admin/images/user.png" alt="">
                            </div>
                            <div class="pic-right">
                                <div class="tit">
                                    <h2><?php echo $users_count; ?></h2>
                                    <p>用户订阅</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="animated wow fadeInRight">
                        <div class="">
                            <div class="pic-left">
                                <img src="/admin/images/product.png" alt="">
                            </div>
                            <div class="pic-right">
                                <div class="tit">
                                    <h2><?php echo $pro_count; ?></h2>
                                    <p>产品数量</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="animated wow fadeInRight">
                        <div class="">
                            <div class="pic-left">
                                <img src="/admin/images/orders.png" alt="">
                            </div>
                            <div class="pic-right">
                                <div class="tit">
                                    <h2><?php echo $order_count; ?></h2>
                                    <p>订单数量</p>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="animated wow fadeInRight">
                        <div class="">
                            <div class="pic-left">
                                <img src="/admin/images/emil.png" alt="">
                            </div>
                            <div class="pic-right">
                                <div class="tit">
                                    <h2><?php echo $book_count; ?></h2>
                                    <p>邮件订阅</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
                <div class="bot">
                    <div class="b-left">
                        <div class="tit">
                            会员概况
                        </div>
                        <table class="vip-tab">
                            <tr>
                                <th>ID</th>
                                <th>用户名</th>
                                <th>邮箱</th>
                                <th>注册时间</th>
                            </tr>
                            <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                            <tr>
                                <td><?php echo $k+$count; ?></td>
                                <td><?php echo $vo['username']; ?></td>
                                <td><?php echo $vo['email']; ?></td>
                                <td><?php echo date("Y-m-d H:i:s",$vo['datetime']); ?></td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </table>
                        <div class="page-list">
                           <?php echo $page; ?>
                        </div>
                    </div>
                    <div class="b-right">
                        <div class="tit">
                            快捷菜单
                        </div>
                        <div class="fastmenu">
                            <ul>
                                <li>
                                    <a href="<?php echo url('proclass/index'); ?>">
                                        <div class="icon-content">
                                            <div class="img">
                                                <i class="fa fa-columns" aria-hidden="true"></i>
                                            </div>
                                            <p>栏目管理</p>

                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo url('pro/index'); ?>">
                                        <div class="icon-content">
                                            <div class="img">
                                                <i class="fa fa-clipboard" aria-hidden="true"></i>
                                            </div>
                                            <p>增加信息</p>

                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo url('customer/index'); ?>">
                                        <div class="icon-content">
                                            <div class="img">
                                                <i class="fa fa-diamond" aria-hidden="true"></i>
                                            </div>
                                            <p>用户列表</p>

                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo url('set/index'); ?>">
                                        <div class="icon-content">
                                            <div class="img">
                                                <i class="fa fa-newspaper-o" aria-hidden="true"></i>
                                            </div>
                                            <p>系统设置</p>

                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo url('message/index'); ?>">
                                        <div class="icon-content">
                                            <div class="img">
                                                <i class="fa fa-commenting" aria-hidden="true"></i>
                                            </div>
                                            <p>留言管理</p>

                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo url('links/index'); ?>">
                                        <div class="icon-content">
                                            <div class="img">
                                                <i class="fa fa-link" aria-hidden="true"></i>
                                            </div>
                                            <p>友情链接</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="tit">
                            系统提示
                        </div>
                        <div class="friend">
                            友情提醒: 请设置安全的管理员密码,建议字母+数字!
                        </div>
                    </div>
                </div>

            </div>
            <div class="copy">
                <a href="">智汇创想</a> Copyright © 2018 ,All Rights Reserved
            </div>
        </div>
    </div>
    <script src="/admin/js/jquery.js"></script>
    <script src="/admin/js/form.js"></script>
    <script src="/admin/js//wow.min.js"></script>
    <script src="/admin/js/paging.js" type="text/javascript"></script>
    <script src="/admin/layui/layui.js"></script>
    <script src="/admin/js/index.js"></script>
</body>

</html>