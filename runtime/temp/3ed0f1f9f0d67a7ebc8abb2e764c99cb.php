<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:63:"F:\etereauty\public/../application/admin\view\coupon\index.html";i:1533375170;s:52:"F:\etereauty\application\admin\view\public\left.html";i:1543904915;s:54:"F:\etereauty\application\admin\view\public\header.html";i:1534387111;s:54:"F:\etereauty\application\admin\view\public\footer.html";i:1530952388;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>优惠券设置</title>
    <link rel="stylesheet" type="text/css" href="http://www.jq22.com/jquery/bootstrap-3.3.4.css">
    <link rel="stylesheet" href="/admin/layui/css/layui.css">
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
                            <span>优惠券设置</span>
                        </div>
                        <div class="vip-main" id="coupon">
                            <div class="vip">
                                <div class="vip-search">
                                    <div>
                                    <form action="<?php echo url('coupon/index'); ?>" method="get">
                                        <input type="text" name="name" class="search-text" placeholder="优惠券名称">
                                        <button type="submit" class="search-btn">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                    </div>
                                </div>
                                <button class="add-vip-btn">
                                    <i class="fa fa-plus"></i>添加优惠券
                                </button>
                                <div class="alertAdd-edit alert-edit-coupon">
                                    <div class="ed-content">
                                        <div class="ed-tit">
                                            <span>添加优惠券</span>
                                            <button class="ed-top-no"></button>
                                        </div>
                                        <div class="text">
                                            <div class="t-main">
                                                <form action="<?php echo url('admin/coupon/add'); ?>" class="edit-form">
                                                    <ul class="t-list">
                                                        <li>
                                                            <label for="">
                                                                <span class="imp-icon">*</span>优惠码名称：</label>
                                                            <input type="text" class="imp" name="name">
                                                            <span class="error">请输入优惠码名称</span>
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                <span class="imp-icon">*</span>优惠码：</label>
                                                            <input type="text" class="imp coupon-code-text" name="code">
                                                            <button class="coupon-code-btn" type="button">随机优惠码</button>
                                                            <span class="error">请输入优惠码</span>
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                <span class="imp-icon">*</span>优惠类型：</label>
                                                            <select name="class" id="">
                                                                <option value="1">减金额</option>
                                                                <option value="2">商品百分比</option>
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                <span class="imp-icon">*</span>优惠金额：</label>
                                                            <input type="text" name="price" class="imp" placeholder="当减金额时填金额，单位：元，当商品百分比时填百分比，单位：%">
                                                            <span class="error">请输入优惠金额</span>
                                                        </li>
                                                        <li>
                                                            <label for="">过期时间：</label>
                                                            <input name="dealline" class="layui-input test-item" placeholder="空为不限制" type="text">
                                                        </li>
                                                        <li>
                                                            <label for="">优惠码重复使用：</label>
                                                            <input type="radio" name="usenum" value="1" checked>
                                                            <span class="rad">一次性使用</span>
                                                            <input type="radio" name="usenum" value="2">
                                                            <span class="rad">可以重复使用</span>
                                                        </li>
                                                        <li>
                                                            <label for="">限制重复使用次数：</label>
                                                            <input type="text"  name="uselimit" placeholder="0为不限">
                                                        </li>
                                                        <li>
                                                            <label for="">满多少金额可使用：</label>
                                                            <input type="text" name="useprice" placeholder="0为不限，单位：元">
                                                        </li>
                                                        <li>
                                                            <label for="">可使用的商品ID：</label>
                                                            <input type="text" name="proid">
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                            </label>
                                                            <div class="edit-sub-btn">
                                                                <button type="submit" class="yes">提交</button>
                                                                <button type="button" class="no">取消</button>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <table class="vip-table">
                                    <tr class="tit">
                                      <!--   <th>
                                          <input class="check" type="checkbox">
                                      </th> -->
                                        <th>ID</th>
                                        <th>优惠码名称</th>
                                        <th>优惠码</th>
                                        <th>金额(元)</th>
                                        <th>重复使用</th>
                                        <th>操作</th>
                                    </tr>
                                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                                    <tr>
                                        <!-- <td>
                                            <input type="checkbox" name="check"  class="check-one"  value="{vo.id}">
                                        </td> -->
                                        <td class="id"><?php echo $k+$count; ?></td>
                                        <td><?php echo $vo['name']; ?></td>
                                        <td><?php echo $vo['code']; ?></td>
                                        <td><?php if($vo['class'] == 1): ?><?php echo $vo['price']; ?>元<?php else: ?><?php echo $vo['price']; ?>折<?php endif; ?></td>
                                        <td><?php if($vo['usenum'] == 1): ?>一次<?php else: ?><?php echo $vo['uselimit']; endif; ?></td>
                                        <td>
                                            <div class="vip-table-btn">
                                                <button class="myedit myedit-vip" title="编辑">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </button>
                                                <button class="myremove myremove-vip" ajax-url="<?php echo url('admin/coupon/del',['id'=>$vo['id']]); ?>" title="删除">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </div>
                                            <div class="alert-edit alert-edit-coupon">
                                                <div class="ed-content">
                                                    <div class="ed-tit">
                                                        <span>编辑优惠券</span>
                                                        <button class="ed-top-no"></button>
                                                    </div>
                                                    <div class="text">
                                                        <div class="t-main">
                                                            <form action="<?php echo url('admin/coupon/edit',['id'=>$vo['id']]); ?>" class="edit-form">
                                                                <ul class="t-list">
                                                                    <li>
                                                                        <label for="">
                                                                            <span class="imp-icon">*</span>优惠码名称：</label>
                                                                        <input type="text" class="imp" name="name" value="<?php echo $vo['name']; ?>">
                                                                        <span class="error">请输入优惠码名称</span>
                                                                    </li>
                                                                    <li>
                                                                        <label for="">
                                                                            <span class="imp-icon">*</span>优惠码：</label>
                                                                        <input type="text" class="imp coupon-code-text" name="code" value="<?php echo $vo['code']; ?>">
                                                                        <button class="coupon-code-btn" type="button">随机优惠码</button>
                                                                        <span class="error">请输入优惠码</span>
                                                                    </li>
                                                                    <li>
                                                                        <label for="">
                                                                            <span class="imp-icon">*</span>优惠类型：</label>
                                                                        <select name="class" id="">
                                                                            <option value="1" <?php if($vo['class'] == 1): ?> selected <?php endif; ?>>减金额</option>
                                                                            <option value="2" <?php if($vo['class'] == 2): ?> selected <?php endif; ?>>商品百分比</option>
                                                                        </select>
                                                                    </li>
                                                                    <li>
                                                                        <label for="">
                                                                            <span class="imp-icon">*</span>优惠金额：</label>
                                                                        <input type="text" class="imp" name="price" value="<?php echo $vo['price']; ?>" placeholder="当减金额时填金额，单位：元，当商品百分比时填百分比，单位：%">
                                                                        <span class="error">请输入优惠金额</span>
                                                                    </li>
                                                                    <li>
                                                                        <label for="">过期时间：</label>
                                                                        <input name="dealline" value="<?php echo date('Y-m-d',$vo['dealline']); ?>" class="layui-input test-item" placeholder="空为不限制" type="text">
                                                                    </li>
                                                                    <li>
                                                                        <label for="">优惠码重复使用：</label>
                                                                        <input type="radio" name="usenum" value="1" <?php if($vo['usenum'] == 1): ?> checked <?php endif; ?> >
                                                                        <span class="rad">一次性使用</span>
                                                                        <input type="radio" name="usenum" value="2" <?php if($vo['usenum'] == 2): ?> checked <?php endif; ?> >
                                                                        <span class="rad">可以重复使用</span>
                                                                    </li>
                                                                    <li>
                                                                        <label for="">限制重复使用次数：</label>
                                                                        <input type="text"  name="uselimit" value="<?php echo $vo['uselimit']; ?>" placeholder="0为不限">
                                                                    </li>
                                                                    <li>
                                                                        <label for="">满多少金额可使用：</label>
                                                                        <input type="text" name="useprice" value="<?php echo $vo['useprice']; ?>" placeholder="0为不限，单位：元">
                                                                    </li>
                                                                    <li>
                                                                        <label for="">可使用的商品ID：</label>
                                                                        <input type="text" name="proid" value="<?php echo $vo['proid']; ?>">
                                                                    </li>
                                                                    <li>
                                                                        <label for="">
                                                                        </label>
                                                                        <div class="edit-sub-btn">
                                                                            <button type="submit" class="yes">提交</button>
                                                                            <button type="button" class="no">取消</button>
                                                                        </div>
                                                                    </li>
                                                                </ul>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </table>
                                <div class="vip-table-operat">
                                  <!-- <div class="vip-table-allbtn">
                                       <button class="all-myremove" type="button" ajax-url="<?php echo url('admin/coupon/del_all'); ?>" >
                                           <i class="fa fa-trash-o"></i>
                                           <span>批量删除</span>
                                       </button>
                                   </div> -->
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