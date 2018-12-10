<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:62:"F:\etereauty\public/../application/admin\view\order\index.html";i:1534928231;s:52:"F:\etereauty\application\admin\view\public\left.html";i:1543904915;s:54:"F:\etereauty\application\admin\view\public\header.html";i:1534387111;s:54:"F:\etereauty\application\admin\view\public\footer.html";i:1530952388;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>订单管理</title>
    <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
    <link href="/admin/dist/summernote.css" rel="stylesheet" />
    <link rel="stylesheet" href="/admin/css/index.css">
    <link rel="stylesheet" href="/admin/css/loading.css">
    <link rel="stylesheet" href="/admin/fonts/css/font-awesome.css">
    <link rel="stylesheet" href="/admin/css/animate.css">
    <link rel="stylesheet" href="/admin/css/page.css">
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
                <div class="system-con">
                    <div class="main">
                        <div class="home-tit">
                            <i class="fa fa-home"></i>当前位置：
                            <a href="<?php echo url('index/index'); ?>">首页</a>
                            <font>></font>
                            <span>订单管理</span>
                        </div>
                        <div class="vip-main" id="mall">
                            <div class="vip">
                                <div class="vip-search">
                                    <div>
                                    <form action="<?php echo url('order/index'); ?>" method="get">
                                        <input type="text" name="key" class="search-text" placeholder="邮箱、订购者">
                                        <button type="submit" class="search-btn">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>    
                                    </div>
                                </div>
                                <table class="vip-table">
                                    <tr class="tit">
                                        <th>
                                            <input class="check" type="checkbox">
                                        </th>
                                        <th>订单号(点击查看)</th>
                                        <th>订购时间</th>
                                        <th>订购者</th>
                                        <th>总金额</th>
                                        <th>支付方式</th>
                                        <th>状态</th>
                                        <th>操作</th>
                                    </tr>
                                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="check"  class="check-one"  value="<?php echo $v['id']; ?>">
                                        </td>
                                        <td class="id">
                                            <a href="javascript:void(0)" title="点击查看" class="order"><?php echo $v['ordernum']; ?></a>
                                            <div class="alert-edit alert-edit-mall">
                                                <div class="ed-content">
                                                    <div class="ed-tit">
                                                        <span>订单详情</span>
                                                        <button class="ed-top-no"></button>
                                                    </div>
                                                    <div class="text">
                                                        <div class="t-main">
                                                            <form action="" class="edit-form">
                                                                <ul class="t-list">
                                                                    <li>
                                                                        <label for="">真实姓名：</label>
                                                                        <div class="mall-con"><?php echo $v['truename']; ?></div>
                                                                    </li>
                                                                    <li>
                                                                        <label for="">手机：</label>
                                                                        <div class="mall-con"><?php echo $v['phone']; ?></div>
                                                                    </li>
                                                                    <li>
                                                                        <label for="">联系邮箱：</label>
                                                                        <div class="mall-con"><?php echo $v['email']; ?></div>
                                                                    </li>
                                                                    <li>
                                                                        <label for="">联系地址：</label>
                                                                        <div class="mall-con"><?php echo $v['address']; ?></div>
                                                                    </li>
                                                                    <li>
                                                                        <label for="">邮编：</label>
                                                                        <div class="mall-con"><?php echo $v['zip']; ?></div>
                                                                    </li>
                                                                </ul>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><?php echo date("Y-m-d H:i:s",$v['ordertime']); ?></td>
                                        <td><?php echo $v['buyer']; ?></td>
                                        <td><?php echo $v['price']; ?></td>
                                        <td><?php echo $v['paytype']; ?></td>
                                        <td><?php if($v['status'] == 1): ?>未付款<?php elseif($v['status'] == 2): ?>已付款<?php else: ?>已发货<?php endif; ?></td>
                                        <td>
                                            <div class="vip-table-btn">
                                                <button class="myremove myremove-only" ajax-url="<?php echo url('admin/order/del',['id'=>$v['id']]); ?>">删除</button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </table>
                                <div class="vip-table-operat">
                                    <div class="vip-table-allbtn">
                                        <button class="all-myremove" id="all-myremove" ajax-url="<?php echo url('admin/order/del_all'); ?>">
                                            <i class="fa fa-trash-o"></i>
                                            <span>批量删除</span>
                                        </button>
                                    </div>
                                 <div class="page-list">
                                    <?php echo $page; ?>
                                 </div>
                                </div>
                            </div>
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
    <script src='http://apps.bdimg.com/libs/bootstrap/3.3.4/js/bootstrap.min.js'></script>
    <script src="/admin/dist/summernote.js"></script>
    <script src="/admin/dist/lang/summernote-zh-CN.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script type="text/javascript" src="/admin/js/zyupload.drag-1.0.0.js"></script>
    <script src="/admin/js/form.js"></script>
    <script src="/admin/js//wow.min.js"></script>
    <script src="/admin/js/paging.js" type="text/javascript"></script>
    <script src="/admin/layui/layui.js"></script>
    <script src="/admin/js/index.js"></script>
</body>

</html>