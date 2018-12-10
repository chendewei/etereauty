<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:60:"F:\etereauty\public/../application/admin\view\set\index.html";i:1535016664;s:52:"F:\etereauty\application\admin\view\public\left.html";i:1534766022;s:54:"F:\etereauty\application\admin\view\public\header.html";i:1534387111;s:54:"F:\etereauty\application\admin\view\public\footer.html";i:1530952388;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>基本设置</title>
    <link rel="stylesheet" href="/admin/css/index.css">
    <link rel="stylesheet" href="/admin/css/loading.css">
    <link rel="stylesheet" href="/admin/fonts/css/font-awesome.css">
    <link rel="stylesheet" href="/admin/css/animate.css">
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
                <div class="system-con">
                    <div class="main">
                        <div class="home-tit">
                            <i class="fa fa-home"></i>当前位置：
                            <a href="<?php echo url('index/index'); ?>">首页</a>
                            <font>></font>
                            <span>系统设置</span>
                        </div>
                        <div class="tab">
                            <ul class="tab-menus">
                                <li class="active">
                                    <button>基本信息</button>
                                </li>
                                <li>
                                    <button>SMTP设置</button>
                                </li>
                                <li>
                                    <button>发送邮件</button>
                                </li>
                            </ul>
                            <ol class="tab-content">
                                <li style="display:block;left:0;">
                                    <form action="<?php echo url('admin/set/host'); ?>">
                                        <ul class="inp">
                                            <li>
                                                <label for=""><span class="imp-icon">*</span>站点名称</label>
                                                <input type="text" name="host_name" value="<?php echo $host_info['host_name']; ?>" class="imp">
                                                <span class="error">
                                                    请输入站点名称
                                                </span>
                                            </li>
                                            <li>
                                                <label for=""><span class="imp-icon">*</span>网站地址</label>
                                                <input type="text" name="host_url" value="<?php echo $host_info['host_url']; ?>" class="imp">
                                                <span class="error">
                                                        请输入网站地址
                                                </span>
                                            </li>
                                            <li>
                                                <label for=""><span class="imp-icon">*</span>附件地址</label>
                                                <input type="text" name="host_file" value="<?php echo $host_info['host_file']; ?>" class="imp">
                                                <span class="error">
                                                        请输入附件地址
                                                </span>
                                            </li>
                                            <li>
                                                <label for=""><span class="imp-icon">*</span>客服邮箱</label>
                                                <input type="text" name="host_email" value="<?php echo $host_info['host_email']; ?>" class="imp">
                                                <span class="error">
                                                    请输入管理员邮箱
                                                </span>
                                            </li>
                                            <li>
                                                <label for=""><span class="imp-icon">*</span>网站关键字</label>
                                                <input type="text" name="host_key" value="<?php echo $host_info['host_key']; ?>" class="imp">
                                                <span class="error">
                                                        请输入网站关键字
                                                </span>
                                            </li>
                                            <li>
                                                <label for="">网站简介</label>
                                                <textarea name="host_content" id="" cols="30" rows="10"><?php echo $host_info['host_content']; ?></textarea>
                                            </li>
                                            <li>
                                                <button class="inp-sub">提交</button>
                                            </li>
                                        </ul>
                                    </form>
                                </li>
                                <li>
                                    <form action="<?php echo url('admin/set/smtp'); ?>">
                                        <ul class="inp">
                                            <li>
                                                <label for=""><span class="imp-icon">*</span>邮件发送模式</label>
                                                <input type="radio" name="smtp_class" value="0" <?php if($smtp_info['smtp_class'] == 0): ?> checked <?php endif; ?> >
                                                <span class="rad">mail函数发送</span>
                                                <input type="radio" name="smtp_class" value="1" <?php if($smtp_info['smtp_class'] == 1): ?> checked <?php endif; ?>>
                                                <span class="rad">SMTP模块发送</span>
                                            </li>
                                            <li>
                                                <label for=""><span class="imp-icon">*</span>SMTP服务器</label>
                                                <input type="text" name="smtp_host" value="<?php echo $smtp_info['smtp_host']; ?>" class="imp">
                                                <span class="error">
                                                    请输入SMTP服务器
                                                </span>
                                            </li>
                                            <li>
                                                <label for=""><span class="imp-icon">*</span>SMTP端口</label>
                                                <input type="text" name="smtp_port" value="<?php echo $smtp_info['smtp_port']; ?>" class="imp">
                                                <span class="error">
                                                        请输入SMTP端口
                                                </span>
                                            </li>
                                            <li>
                                                <label for=""><span class="imp-icon">*</span>发信人地址</label>
                                                <input type="text" name="smtp_send" value="<?php echo $smtp_info['smtp_send']; ?>" class="imp">
                                                <span class="error">
                                                        请输入发信人地址
                                                </span>
                                            </li>
                                            <li>
                                                <label for=""><span class="imp-icon">*</span>发信人呢称</label>
                                                <input type="text" name="smtp_sendname" value="<?php echo $smtp_info['smtp_sendname']; ?>" class="imp">
                                                <span class="error">
                                                        请输入发信人呢称
                                                </span>
                                            </li>
                                            <li>
                                                <label for="">是否需要登录验证</label>
                                                <input type="radio"  name="smtp_login" value="0" <?php if($smtp_info['smtp_login'] == 0): ?> checked <?php endif; ?>>
                                                <span class="rad">是</span>
                                                <input type="radio"  name="smtp_login"  value="1" <?php if($smtp_info['smtp_login'] == 1): ?> checked <?php endif; ?> >
                                                <span class="rad">否</span>
                                            </li>
                                            <li>
                                                <label for=""><span class="imp-icon">*</span>邮箱登录用户名</label>
                                                <input type="text" name="smtp_user" value="<?php echo $smtp_info['smtp_user']; ?>" class="imp">
                                                <span class="error">
                                                        请输入邮箱登录用户名
                                                </span>
                                            </li>
                                            <li>
                                                <label for=""><span class="imp-icon">*</span>邮箱登录密码</label>
                                                <input type="password" name="smtp_pwd" value="<?php echo $smtp_info['smtp_pwd']; ?>" class="imp">
                                                <span class="error">
                                                        请输入邮箱登录密码
                                                </span>
                                            </li>
                                            <li>
                                                <button class="inp-sub">提交</button>
                                            </li>
                                        </ul>
                                    </form>
                                </li>
                                <li>
                                    <form action="<?php echo url('set/send'); ?>">
                                        <ul class="inp">
                                            <li>
                                                <label for=""><span class="imp-icon">*</span>收件人</label>
                                                <input type="text"  class="imp" name="tomail" >
                                                <span class="error">
                                                    请输入收件人
                                                </span>
                                            </li>
                                            <li>
                                                <label for=""><span class="imp-icon">*</span>收件人名称</label>
                                                <input type="text"  class="imp" name="name" >
                                                <span class="error">
                                                    请输入收件人名称
                                                </span>
                                            </li>
                                            <li>
                                                <label for=""><span class="imp-icon">*</span>主题</label>
                                                <input type="text"  class="imp" name="subject" >
                                                <span class="error">
                                                        请输入主题
                                                </span>
                                            </li>
                                            <li>
                                                <label for="">正文</label>
                                                <textarea name="sent_text" id="" cols="30" rows="10" placeholder="说点什么吧..."></textarea>
                                            </li>
                                            <li>
                                                <button class="inp-sub" type="submit">发送</button>
                                            </li>
                                        </ul>
                                    </form>
                                </li>
                            </ol>
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