<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:60:"F:\etereauty\public/../application/admin\view\pro\index.html";i:1542106132;s:52:"F:\etereauty\application\admin\view\public\left.html";i:1543904915;s:54:"F:\etereauty\application\admin\view\public\header.html";i:1534387111;s:54:"F:\etereauty\application\admin\view\public\footer.html";i:1530952388;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>产品管理</title>
   
    <link href="/admin/css/bootstrap.css" rel="stylesheet" />
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
                            <span>产品管理</span>
                        </div>
                        <div class="info-main" id="info">
                            <div class="info-menu">
                                <ul class="menus">
                                <?php if(is_array($nav_list) || $nav_list instanceof \think\Collection || $nav_list instanceof \think\Paginator): $i = 0; $__LIST__ = $nav_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;if($vo['pid'] == 0): ?>
                                    <li class="toggle-li">
                                        <a href="<?php echo url('pro/index',['tid'=>$vo['id']]); ?>" class="toggle-a">
                                            <span class="menu-name">
                                                <?php echo $vo['name']; ?>
                                                <i class="fa fa-angle-right rig"></i>
                                            </span>
                                        </a>
                                        <ul class="info-menu-son">
                                        <?php if(is_array($vo['son']) || $vo['son'] instanceof \think\Collection || $vo['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?> 
                                            <li>
                                                <a href="<?php echo url('pro/index',['tid'=>$v1['id']]); ?>"><?php echo $v1['name']; ?></a>
                                            </li>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>    
                                        </ul>
                                    </li>
                                    <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                </ul>
                            </div>
                            <div class="info">
                                <div class="info-left-btn">
                                    <i class="fa fa-caret-left" aria-hidden="true"></i>
                                </div>
                                <div class="info-search">
                                    <div>
                                        <form action="<?php echo url('pro/index'); ?>" method="get">
                                        <input type="text" name="sku" class="search-text" placeholder="产品SKU">
                                        <button type="submit" class="search-btn">
                                            <i class="fa fa-search"></i>
                                        </button>
                                        </form>
                                    </div>
                                </div>
                                <button class="add-info-btn">
                                    <i class="fa fa-plus"></i>添加产品
                                </button>
                                <div class="alertAdd-edit">
                                    <div class="ed-content">
                                        <div class="ed-tit">
                                            <span>添加产品</span>
                                            <button class="ed-top-no"></button>
                                        </div>
                                        <div class="text">
                                            <div class="t-main">
                                            
                                                <div class="myhttp">
                                                    <input type="text" name="url" id="url"  placeholder="输入网址">
                                                    <button id="cj">采集</button>
                                                </div>
                                              
                                                <form action="<?php echo url('pro/add'); ?>" class="edit-form">
                                                    <ul class="t-list">
                                                        <li>
                                                            <label for="">
                                                                <span class="imp-icon">*</span>产品标题：</label>
                                                            <input type="text" id="proname" class="imp" name="proname">
                                                            <span class="error">请输入标题</span>
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                <span class="imp-icon">*</span>分类栏目：</label>
                                                            <select name="tid" id="">
                                                            <?php if(is_array($class_list) || $class_list instanceof \think\Collection || $class_list instanceof \think\Paginator): $i = 0; $__LIST__ = $class_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                                <option value="<?php echo $vo['id']; ?>,<?php echo $vo['pid']; ?>"><span><?php echo $vo['name']; ?></span> <?php echo $vo['level']; ?>级分类</option>
                                                            <?php endforeach; endif; else: echo "" ;endif; ?> 
                                                            </select>
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                SKU：
                                                            </label>
                                                            <input type="text" name="sku" placeholder="填写sku">
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                            产品原价格：
                                                            </label>
                                                            <input type="text" name="yprice" class="imp"  placeholder="产品价格$计算，填写数字">
                                                            <span class="error">请输入原价</span>
                                                        </li>

                                                        <li>
                                                            <label for="">
                                                               <span class="imp-icon">*</span> 产品价格：
                                                            </label>
                                                            <input type="text" name="price" class="imp" id="price" placeholder="产品价格$计算，填写数字">
                                                            <span class="error">请输入价格</span>
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                类型：
                                                            </label>
                                                            <input type="radio" name="is_lx" value="1" checked>无
                                                            <input type="radio" name="is_lx" value="2" >New Release
                                                            <input type="radio" name="is_lx" value="3" >Gifts Ideas
                                                            <input type="radio" name="is_lx" value="4" >Big Deals    
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                颜色：
                                                            </label>
                                                            <input type="radio" name="color" value="1" checked>无
                                                            <input type="radio" name="color" value="2" >白色
                                                            <input type="radio" name="color" value="3" >玫瑰红色
                                                            <input type="radio" name="color" value="4" >红色
                                                            <input type="radio" name="color" value="5" >蓝色
                                                            <input type="radio" name="color" value="6" >青色
                                                            <input type="radio" name="color" value="7" >灰蓝色
                                                            
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                是否开启秒杀：
                                                            </label>
                                                            <input type="radio" name="is_open" value="1" >是
                                                            <input type="radio" name="is_open" value="2" checked >否
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                秒杀价：
                                                            </label>
                                                            <input type="text" name="ms_price" placeholder="产品价格$计算，填写数字">
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                开启时间：
                                                            </label>
                                                            <input type="text" class="layui-input test-item" name="opentime"  placeholder="活动开启时间">
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                结束时间：
                                                            </label>
                                                            <input type="text" class="layui-input test-item" name="dietime"  placeholder="活动结束时间">
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                存库：
                                                            </label>
                                                            <input type="text" name="inventory" value="100">
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                外部链接：
                                                            </label>
                                                            <input type="text" name="external" id="external"  placeholder="填写后信息连接地址将为此链接">
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                是否显示外部链接：：
                                                            </label>
                                                            <input type="radio" name="is_show" value="1" checked >是
                                                            <input type="radio" name="is_show" value="2"  >否
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                产品摘要：
                                                            </label>
                                                            <textarea type="text" name="abstract" id="abstract" placeholder="说点什么..."></textarea>
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                图片上传：
                                                            </label>
                                                            <div class="img-file">
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                                详细内容：
                                                            </label>
                                                            <div class="text-edit" id="edit-text-a">
                                                                <div class="summernote edit-sum" id="summ"  ></div>
                                                            </div>
                                                        </li>
                                                        <li>
                                                            <label for="">
                                                            <input type="hidden" id="picid" name="cpicid" >
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
                                <table class="info-table">
                                    <tr class="tit">
                                        <th>
                                            <input class="check" type="checkbox">
                                        </th>
                                        <th class="id">ID</th>
                                        <th>标题</th>
                                        <th>价格</th>
                                        <th>存库</th>
                                        <th>发布时间</th>
                                        <th>状态</th>
                                        <th>是否推荐</th>
                                        <th>操作</th>
                                    </tr>
                                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="check" value="<?php echo $vo['id']; ?>" class="check-one">
                                        </td>
                                        <td  class="id"><?php echo $k+$count; ?></td>
                                        <td><a target="_blank" href="/index/detail/index/id/<?php echo $vo['id']; ?>.html"><?php echo substr($vo['proname'],0,60); ?></a></td>
                                        <td><?php echo $vo['price']; ?></td>
                                        <td><?php echo $vo['inventory']; ?></td>
                                        <td><?php echo date("Y-m-d H:i:s",$vo['datetime']); ?></td>
                                        <td><?php if($vo['status'] == 1): ?><span class="drops">上架</span><?php else: ?><span class="drops">下架</span><?php endif; ?></td>
                                        <td><?php if($vo['is_tj'] == 1): ?>否<?php else: ?>是<?php endif; ?></td>
                                        <td>
                                            <div class="info-table-btn">
                                                <button class="mydrop mystop" ajax-url="<?php echo url('pro/status',['id'=>$vo['id']]); ?>">
                                                    <i class="fa"></i>
                                                </button>
                                                <button class="fa fa-comments" onclick="openwin('<?php echo url("commont/index",["id"=>$vo["id"]]); ?>')" title="评论">
                                                    <i class="fa"></i>
                                                </button>
                                                <button class="myedit" title="编辑">
                                                    <i class="fa fa-pencil-square-o"></i>
                                                </button>
                                                <button class="myremove" ajax-url="<?php echo url('pro/del',['id'=>$vo['id']]); ?>" title="删除">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </div>
                                            <div class="alert-edit">
                                                <div class="ed-content">
                                                    <div class="ed-tit">
                                                        <span>编辑产品</span>
                                                        <button class="ed-top-no"></button>
                                                    </div>
                                                    <div class="text">
                                                        <div class="t-main">

                                                            <form action="<?php echo url('pro/edit',['id'=>$vo['id']]); ?>" class="edit-form">
                                                                <ul class="t-list">
                                                                    <li>
                                                                        <label for="">
                                                                            <span class="imp-icon">*</span>产品标题：</label>
                                                                        <input type="text" class="imp" name="proname" value="<?php echo $vo['proname']; ?>">
                                                                        <span class="error">请输入标题</span>
                                                                    </li>
                                                                    <li>
                                                                        <label for="">
                                                                            <span class="imp-icon">*</span>分类栏目：</label>
                                                                        <select name="tid" id="">
                                                                        <?php if(is_array($class_list) || $class_list instanceof \think\Collection || $class_list instanceof \think\Paginator): $i = 0; $__LIST__ = $class_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v1): $mod = ($i % 2 );++$i;?>
                                                                            <option value="<?php echo $v1['id']; ?>,<?php echo $v1['pid']; ?>" <?php if($v1['id'] == $vo['tid']): ?> selected <?php endif; ?> ><span><?php echo $v1['name']; ?></span> <?php echo $v1['level']; ?>级分类</option>
                                                                        <?php endforeach; endif; else: echo "" ;endif; ?> 
                                                                        </select>
                                                                    </li>
                                                                    <li>
                                                                        <label for="">
                                                                            SKU：
                                                                        </label>
                                                                        <input type="text" name="sku" placeholder="填写sku" value="<?php echo $vo['sku']; ?>">
                                                                    </li>
                                                                    <li>
                                                                    <label for="">
                                                                        产品原价格：
                                                                    </label>
                                                                    <input type="text" name="yprice" value="<?php echo $vo['yprice']; ?>" class="imp"  placeholder="产品价格$计算，填写数字">
                                                                    <span class="error">请输入原价</span>
                                                                    </li>

                                                                    <li>
                                                                        <label for="">
                                                                        <span class="imp-icon">*</span>产品价格：
                                                                        </label>
                                                                        <input type="text" class="imp" name="price" value="<?php echo $vo['price']; ?>" placeholder="产品价格$计算，填写数字">
                                                                        <span class="error">请输入价格</span>
                                                                    </li>

                                                                    <li style="text-align: left;" >
                                                                    <label for="">
                                                                    类型：
                                                                    </label>
                                                                    <input type="radio" name="is_lx" value="1" <?php if($vo['is_lx'] == 1): ?> checked <?php endif; ?>>无
                                                                    <input type="radio" name="is_lx" value="2" <?php if($vo['is_lx'] == 2): ?> checked <?php endif; ?>>New Release
                                                                    <input type="radio" name="is_lx" value="3" <?php if($vo['is_lx'] == 3): ?> checked <?php endif; ?>>Gifts Ideas
                                                                    <input type="radio" name="is_lx" value="4" <?php if($vo['is_lx'] == 4): ?> checked <?php endif; ?>>Big Deals    
                                                                    </li>
                                                                    <li style="text-align: left;" >
                                                                        <label for="">
                                                                        颜色：
                                                                        </label>
                                                                        <input type="radio" name="color" value="1" <?php if($vo['color'] == 1): ?> checked <?php endif; ?> >无
                                                                        <input type="radio" name="color" value="2" <?php if($vo['color'] == 2): ?> checked <?php endif; ?> >白色
                                                                        <input type="radio" name="color" value="3" <?php if($vo['color'] == 3): ?> checked <?php endif; ?> >玫瑰红色
                                                                        <input type="radio" name="color" value="4" <?php if($vo['color'] == 4): ?> checked <?php endif; ?> >红色
                                                                        <input type="radio" name="color" value="5" <?php if($vo['color'] == 5): ?> checked <?php endif; ?> >蓝色
                                                                        <input type="radio" name="color" value="6" <?php if($vo['color'] == 6): ?> checked <?php endif; ?> >青色
                                                                        <input type="radio" name="color" value="7" <?php if($vo['color'] == 7): ?> checked <?php endif; ?> >灰蓝色
                                                                    </li>
                                                                    <li style="text-align: left;">
                                                                        <label for="">
                                                                        是否开启秒杀：
                                                                        </label>
                                                                        <input type="radio" name="is_open" value="1" <?php if($vo['is_open'] == 1): ?> checked <?php endif; ?> >是
                                                                        <input type="radio" name="is_open" value="2" <?php if($vo['is_open'] == 2): ?> checked <?php endif; ?> >否
                                                                    </li>
                                                                    <li>
                                                                        <label for="">
                                                                        秒杀价：
                                                                        </label>
                                                                    <input type="text"  name="ms_price" value="<?php echo $vo['ms_price']; ?>" placeholder="产品价格$计算，填写数字">
                                                                    </li>
                                                                        <li>
                                                                        <label for="">
                                                                        开启时间：
                                                                        </label>
                                                                        <input type="text" class="layui-input test-item" name="opentime" <?php if($vo['opentime'] != ''): ?> value="<?php echo date('Y-m-d',$vo['opentime']); ?>" <?php endif; ?>    placeholder="活动开启时间">
                                                                    </li>
                                                                    <li>
                                                                        <label for="">
                                                                        结束时间：
                                                                        </label>
                                                                        <input type="text" class="layui-input test-item" name="dietime" <?php if($vo['dietime'] != ''): ?> value="<?php echo date('Y-m-d',$vo['dietime']); ?>" <?php endif; ?>  placeholder="活动结束时间">
                                                                    </li>
                                                                    <li>
                                                                        <label for="">
                                                                        存库：
                                                                        </label>
                                                                        <input type="text" name="inventory" value="<?php echo $vo['inventory']; ?>" value="100">
                                                                    </li>
                                                                    <li>
                                                                        <label for="">
                                                                        外部链接：
                                                                        </label>
                                                                        <input type="text" name="external" value="<?php echo $vo['external']; ?>" placeholder="填写后信息连接地址将为此链接">
                                                                    </li>
                                                                    <li style="text-align: left;">
                                                                        <label for="">
                                                                        是否显示外部链接：
                                                                        </label>
                                                                        <input type="radio" name="is_show" value="1" <?php if($vo['is_show'] == 1): ?> checked <?php endif; ?> >是
                                                                        <input type="radio" name="is_show" value="2" <?php if($vo['is_show'] == 2): ?> checked <?php endif; ?> >否
                                                                    </li>
                                                                    <li>
                                                                        <label for="">
                                                                        产品摘要：
                                                                        </label>
                                                                        <textarea type="text" name="abstract" placeholder="说点什么..."><?php echo strip_tags($vo['abstract']); ?></textarea>
                                                                    </li>
                                                                    <li>
                                                                        <label for="">
                                                                            图片上传：
                                                                        </label>
                                                                        <div class="img-file">
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                    <label for="">已添加图片：</label>
                                                                    <div class="img-box">
                                                                    <?php if(is_array($vo['picture']) || $vo['picture'] instanceof \think\Collection || $vo['picture'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo['picture'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;if($v['is_default'] == 1): ?>
                                                                    <div class="list imp-img">
                                                                    <div class="list-main imp-img" data-id="<?php echo $v['id']; ?>,<?php echo $vo['id']; ?>" ajax-url="<?php echo url('pro/pic_watch'); ?>">
                                                                    <?php else: ?>
                                                                    <div class="list">
                                                                    <div class="list-main" data-id="<?php echo $v['id']; ?>,<?php echo $vo['id']; ?>" ajax-url="<?php echo url('pro/pic_watch'); ?>">
                                                                    <?php endif; ?>
                                                                        
                                                                            <img src="<?php echo $v['filepath']; ?>" alt="" data-id="<?php echo $v['id']; ?>">
                                                                            <span class="remove-img-btn" title="删除" ajax-url="<?php echo url('pro/pic_del'); ?>"><i class="fa fa-times"></i></span>
                                                                        </div>                                                                      
                                                                    </div>
                                                                   

                                                                    
                                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                                    <span class="no-img">无图片</span>
                                                                    </div>
                                                                    </li>
                                                                    <li>
                                                                        <label for="">
                                                                            详细内容：
                                                                        </label>
                                                                        <div class="text-edit">
                                                                            <div class="summernote edit-sum"><?php echo html_entity_decode($vo['text']); ?></div>
                                                                        </div>
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
                                <div class="info-table-operat">
                                    <div class="info-table-allbtn">
                                        <button class="all-myremove" id="all-myremove" ajax-url="<?php echo url('pro/del_all'); ?>">
                                            <i class="fa fa-trash-o"></i>
                                            <span>批量删除</span>
                                        </button>
                                    </div>

                                    <div class="tj">
                                        <button class="all-tj" id="all-tj" ajax-url="<?php echo url('pro/tj'); ?>">
                                            <i class="fa fa-paper-plane-o"></i>
                                            <span>首页推荐</span>
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
    <script src='/admin/js/bootstrap.min.js'></script>
    <script src="/admin/dist/summernote.js"></script>
    <script src="/admin/dist/lang/summernote-zh-CN.js"></script>
    <script src="/admin/js/summernote.js"></script>
    <script type="text/javascript" src="/admin/js/zyupload.drag-1.0.0.js"></script>
    <script src="/admin/js/form.js"></script>
    <script src="/admin/js//wow.min.js"></script>
    <script src="/admin/js/paging.js" type="text/javascript"></script>
    <script src="/admin/layui/layui.js"></script>
    <script src="/admin/js/index.js"></script>
    <script>
       
        $("#cj").click(function(){
            var url=$("#url").val();
        $.ajax({
            type:'post',
            url:"<?php echo url('pro/cj'); ?>",  
            dataType:"json",
            data:{"url":url},
            success:function(data){

                $("#proname").val(data.proname);
                $("#price").val(data.price);
                $("#external").val(data.external);
                $("#abstract").val(data.abstract);
                $("#picid").val(data.picid);
                var a=$('#edit-text-a').find('.note-editable').html(data.content);
               
              
            },
            error:function(){
            }
           })


      });


      function openwin(url) {
    
    window.open (url, "评论", "height=780, width=600, top=100, left=600,toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, status=no")
    }  
    </script>
</body>

</html>