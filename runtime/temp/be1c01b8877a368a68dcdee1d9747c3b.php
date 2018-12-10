<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"F:\etereauty\public/../application/index\view\myaddress\index.html";i:1544089625;s:54:"F:\etereauty\application\index\view\Public\header.html";i:1542607974;s:54:"F:\etereauty\application\index\view\Public\footer.html";i:1542336960;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="<?php echo $set['host_key']; ?>">
    <meta name="description" content="<?php echo $set['host_content']; ?>">
    <title><?php echo $set['host_name']; ?>-My Profit</title>
    <link rel="stylesheet" href="/index/swiper/dist/css/swiper.min.css">
    <link rel="stylesheet" href="/index/css/Component.css">
    <link rel="stylesheet" href="/index/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/index/css/init.css">
    <link rel="stylesheet" href="/index/css/style.css">
    <link rel="stylesheet" href="/index/css/profit.css">
    <link rel="stylesheet" href="/index/fonts/iconfont.css">
    <link rel="stylesheet" href="/index/font/css/font-awesome.min.css">
</head>

<body>

    <header>
        <div class="h-main">
            <div class="container">
                <div class="h-left">
                    <div class="logoBox">
                        <a href="/">
                            <img src="/index/images/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="menu-icon">
                    <div class="main">
                        <span></span>
                        <span></span>
                    </div>
                </div>
                <div class="h-right">
                    <div class="navBox">
                        <div class="main">
                            <ul class="nav-list">
                                <li class="active">
                                    <a href="/">Home</a>
                                </li>
                                <li class="toogle-li">
                                    <a href="javascript:void(0)">Products
                                        <i class="iconfont icon-add"></i>
                                    </a>
                                    <div class="pro-box song-box">
                                        <div class="container">
                                            <div class="dragMove" id="dragMove">
                                                <ul class="p-list">
                                                <?php if(is_array($nav) || $nav instanceof \think\Collection || $nav instanceof \think\Paginator): $i = 0; $__LIST__ = $nav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                    <li>
                                                        <a href="<?php echo url('prolist/index',['id'=>$vo['id']]); ?>">

                                                        <?php if(!(empty($vo['son']) || (($vo['son'] instanceof \think\Collection || $vo['son'] instanceof \think\Paginator ) && $vo['son']->isEmpty()))): ?>
                                                        
                                                            <div class="img">
                                                                <img src="<?php echo $vo['son']['pic']; ?>" alt="">
                                                            </div>
                                                      
                                                        <?php else: endif; ?>
                                                            <div class="tit"><?php echo $vo['name']; ?></div>
                                                        </a>
                                                    </li>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>    
                                                </ul>
                                            </div>
                                            <div style="position: absolute;right: 315px;top: 76px;font-size: 24px;">
                                                ></div>
                                        </div>
                                        
                                    </div>
                                </li>
                                <li class="support toogle-li">
                                    <a href="javascript:void(0)">Support
                                        <i class="iconfont icon-add"></i>
                                    </a>
                                    <div class="sup-box song-box">
                                        <ul class="list">
                                            <li>
                                                <a href="<?php echo url('contact/index'); ?>">Contact</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo url('aftersale/index'); ?>">Warranty</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li>
                                    <a href="<?php echo url('big/index'); ?>">Shop</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="iconBox">
                        <div class="main">
                            <ul class="i-list">
                                <li class="my-search">
                                    <form action="<?php echo url('key/index'); ?>" method="get">
                                        <div class="se-btn">
                                        <span class="icons"><i class="iconfont icon-sousuo"></i></span>
                                        <button class="subs"><i class="iconfont icon-sousuo"></i></button>     
                                        </div>
                                        <div class="se-text">
                                            <input type="search" name="key" placeholder="Search">
                                        </div>
                                    </form>
                                </li>
                                <li class="my-cart">
                                    <i class="iconfont icon-gouwuche"></i>
                                    <div class="sup-box cart-box">
                                        <ul class="list">
                                            <li>
                                                <a href="<?php echo url('car/index'); ?>">
                                                    <i class="iconfont icon-gouwuche"></i>
                                                    <span>My Cart</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo url('myaddress/index'); ?>">
                                                    <i class="iconfont icon-dingdan"></i>
                                                    <span>My Profit</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="my-user">
                                    <i class="iconfont icon-yonghu"></i>
                                    <div class="sup-box user-box">
                                        <ul class="list">
                                        <?php if(empty($user_id) || (($user_id instanceof \think\Collection || $user_id instanceof \think\Paginator ) && $user_id->isEmpty())): ?>
                                            <li>
                                                <a href="<?php echo url('login/index'); ?>">
                                                    <i class="iconfont icon-suo"></i>
                                                    <span>Sign in</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="<?php echo url('reg/index'); ?>">
                                                    <i class="iconfont icon-account"></i>
                                                    <span>Sign up</span>
                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                            <a href="<?php echo url('login/login_out'); ?>">
                                            <i class="iconfont icon-suo"></i>
                                            <span>Logout</span>
                                            </a>
                                            </li>
                                        <?php endif; ?>
                                        </ul>
                                    </div>
                                </li>
                              <!--   <li class="my-lang">
                                  <div class="lang-btn">
                                      <img src="/index/images/USA.png" alt="">
                                  </div>
                                  <div class="sup-box user-box">
                                      <ul class="list">
                                          <li>
                                              <a href="">
                                                  <img src="/index/images/usa-c.png" alt="">
                                                  <span>America</span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="">
                                                  <img src="/index/images/mei.png" alt="">
                                                  <span>English</span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="">
                                                  <img src="/index/images/de.png" alt="">
                                                  <span>German</span>
                                              </a>
                                          </li>
                                          <li>
                                              <a href="">
                                                  <img src="/index/images/fa.png" alt="">
                                                  <span>French</span>
                                              </a>
                                          </li>
                                      </ul>
                                  </div>
                              </li> -->
                            </ul>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </header>
    <div class="con-box">
        <div class="alert-prompt">
            <div class="prompt">
                <p class="tit">Prompt</p>
                <div class="p-init"></div>
            </div>
        </div>
        <div class="personal">
            <div class="container">
                <div class="row">
                    <div class="mes">
                        <div class="text col-md-12">
                             <form action="<?php echo url('myaddress/add'); ?>" method="post">
                                <div class="item-main">
                                 <div class="item name">
                                        <input class="phone-inp"  name="f_name" style="font-size: 15px;" type="text" placeholder="Please fill in your first name" value="" readonly>
                                    </div>
                                     <div class="item name">
                                        <input class="phone-inp"  name="l_name" style="font-size: 15px;" type="text" placeholder="Please fill in your last name" value="" readonly>
                                    </div>
                                    <div class="item name">
                                        <input class="phone-inp"  name="phone" style="font-size: 15px;" type="text" placeholder="Please fill in your phone" value="" readonly>
                                    </div>
                                    <div class="item name">
                                        <input class="country-inp"  name="country" style="font-size: 15px;" type="text" placeholder="Please fill in your country" value="" readonly>
                                    </div>
                                    <div class="item name">
                                        <input class="province-inp"  name="province" style="font-size: 15px;" type="text" placeholder="Please fill in your province" value="" readonly>
                                    </div>
                                    <div class="item name">
                                        <input class="city-inp"  name="city" style="font-size: 15px;" type="text" placeholder="Please fill in your city" value="" readonly>
                                    </div>
                                    
                                    <div class="item address">
                                        <textarea class="myAddress"  name="address" id="" cols="20" rows="10" placeholder="Please fill in your address" readonly></textarea>
                                    </div>
                                    <div class="item name">
                                        <input class="zip-inp"  name="zip" style="font-size: 15px;" type="text" placeholder="Please fill in your zip" value="" readonly>
                                    </div>
                                    
                                    <span class="edit-btn">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <span class="confirm-btn">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div id="coupon"></div>
              
                    <div class="only coupon" >
                        <div class="col-md-12">
                            <div class="tit-name">
                                <span  >Coupon</span>
                               
                                <span class="confirm-btn">
                                    <i class="fa fa-check"></i>
                                </span>
                            </div>
                        </div>
                        <ul class="list">

                            <?php if(is_array($r_list) || $r_list instanceof \think\Collection || $r_list instanceof \think\Paginator): $i = 0; $__LIST__ = $r_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <li class="col-md-3">
                                <div class="main">
                                    <img src="/index/images/coupon.png" alt="">
                                    <div class="price"><?php if($v['class'] == 1): ?>$<?php echo $v['price']; else: ?><?php echo $v['price']; ?>%<?php endif; ?></div>
                                    <span class="remove-btn" ajax-url="<?php echo url('myaddress/code_del',['id'=>$v['id']]); ?>">
                                        <i class="fa fa-times"></i>
                                    </span>
                                    <input type="hidden" value="<?php echo $v['id']; ?>">
                                </div>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div id="address"></div>
                    <?php if(!(empty($list) || (($list instanceof \think\Collection || $list instanceof \think\Paginator ) && $list->isEmpty()))): ?>
                    <div class="only address" id="address">
                        <div class="col-md-12">
                            <div class="tit-name">
                                <form action="">
                                    <span  >Receiving address</span>
                                    <span class="edit-btn">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    <span class="confirm-btn">
                                        <i class="fa fa-check"></i>
                                    </span>
                                </form>
                            </div>
                        </div>
                        <ul class="list">
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                            <li class="col-md-4">
                                <div class="main">
                                <?php if($v["is_defult"] == 2): ?>
                                    <img src="/index/images/address_bj1.png" alt="">
                                    <?php else: ?>
                                    <img src="/index/images/address_bj2.png" alt="">
                                    <?php endif; ?>
                                    <div class="text">
                                        <form action="<?php echo url('Myaddress/defult',['id'=>$v['id']]); ?>">
                                            <div class="top">
                                                <textarea name="" id="" cols="20" rows="10" readonly><?php echo $v['username']; ?>(<?php echo $v['phone']; ?>)</textarea>
                                            </div>
                                            <div class="bot">
                                                <textarea name="" id="" cols="20" rows="10" readonly><?php echo $v['country']; ?>,<?php echo $v['province']; ?>,<?php echo $v['city']; ?>,<?php echo $v['address']; ?>,<?php echo $v['zip']; ?></textarea>
                                            </div>
                                            <input type="hidden" value="true">
                                        </form>
                                    </div>
                                    <span class="remove-btn" ajax-url="<?php echo url('myaddress/address_del',['id'=>$v['id']]); ?>">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </div>
                            </li>
                         <?php endforeach; endif; else: echo "" ;endif; ?> 
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <?php endif; ?>
                     <div id="order"></div>
                    
                    <div class="only histor" >
                        <div class="col-md-12">
                            <div class="tit-name">
                                <span  >Historical order</span>
                                <span class="edit-btn" style="display: none">
                                    <i class="fa fa-pencil"></i>
                                </span>
                                <span class="confirm-btn">
                                    <i class="fa fa-check"></i>
                                </span>
                            </div>
                        </div>
                        <div class="show-tit col-md-12">
                            <span class="all-check">
                                <div class="all-check-box">
                                    <i class="fa fa-check"></i>
                                    <input type="hidden" value="false">
                                </div>
                            </span>
                            <span class="tit">Total selection</span>
                            <button class="all-remove" disabled ajax-url="">Delete all</button>
                        </div>
                        <ul class="list table col-md-12">
                        <?php if(is_array($o_list) || $o_list instanceof \think\Collection || $o_list instanceof \think\Paginator): $i = 0; $__LIST__ = $o_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <li>
                                <input class="id" type="hidden" value="<?php echo $vo['id']; ?>">
                                <span class="check">
                                    <span class="check-box">
                                        <i class="fa fa-check"></i>
                                        <input class="check-inp" type="hidden" value="false">
                                    </span>
                                </span>
                                <span class="img">
                                    <img src="<?php echo $vo['pic']['filepath']; ?>" alt="" style="max-width:21%">
                                </span>
                                <span class="name"><?php echo $vo['pro']['proname']; ?></span>
                                <span class="color">    </span>
                                <span class="price"><?php echo $vo['price']; ?>$</span>
                                <span class="number"><?php echo $vo['num']; ?></span>
                                <span class="all-price"><?php echo $vo['price']; ?>$</span>
                                <span class="remove">
                                    <span class="remove-btn" ajax-url="<?php echo url('myaddress/car_del'); ?>">
                                        <i class="fa fa-times"></i>
                                    </span>
                                </span>
                            </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    
                    <div id="center"></div>
                    <div class="only security">
                        <div class="col-md-12">
                            <div class="tit-name">
                                <span  >Security center</span>
                                <span class="edit-btn">
                                    <i class="fa fa-pencil"></i>
                                </span>
                                <span class="confirm-btn" ajax-url="<?php echo url('myaddress/users_edit'); ?>">
                                    <i class="fa fa-check"></i>
                                </span>
                            </div>
                        </div>
                        <ul class="list col-md-12">
                            <li>
                                <div class="tit">Password</div>
                                <input class="oldPass" type="password" value="<?php echo $user_info['pwd']; ?>" readonly>
                            </li>
                            <li>
                                <div class="tit">New Password</div>
                                <input class="newPass" type="password" value="" readonly>
                            </li>
                            <li>
                                <div class="tit">Confirm new password</div>
                                <input class="againPass" type="password" value="" readonly>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer>
        <div class="email-box">
            <div class="container">
                <div class="main">
                    <h3>Subscribe</h3>
                    <p>Access exclusive offers, news, and more.</p>
                    <form action="<?php echo url('book/index'); ?>" method="post">
                        <div>
                            <input type="text" name="email" placeholder="Enter Your Email" class="e-text">
                        </div>
                        <div>
                            <button class="e-btn">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bot-box">
            <div class="container">
                <div class="b-logo">
                    <a href="/">
                        <img src="/index/images/logo.png" alt="">
                    </a>
                </div>
                <div class="b-nav">
                    <div class="main">
                        <ul>
                            <li>
                                <h4>Company Info</h4>
                                <div>
                                    <a href="">Privacy Policy</a>
                                </div>
                                <div>
                                    <a href="/index/article/index/id/1.html">About Us</a>
                                </div>
                            </li>
                            <li>
                                <h4>Support</h4>
                                <div>
                                    <a href="<?php echo url('contact/index'); ?>">Contact Us</a>
                                </div>
                                <div>
                                    <a href="<?php echo url('aftersale/index'); ?>">Warranty</a>
                                </div>
                            </li>
                            <li>
                                <h4>Contact Us</h4>
                                <div>
                                    <a href="">Mon-Fri 9:00-17:00 PST</a>
                                    <a href="">US/CA:+1(855)997-6688</a>
                                    <div style="color:#fff">UK：+44(808)168-0666</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="b-icon">
                    <ul>
                     <?php if(is_array($link) || $link instanceof \think\Collection || $link instanceof \think\Paginator): $i = 0; $__LIST__ = $link;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <li>
                            <a href="<?php echo $vo['url']; ?>">
                                <img src="<?php echo $vo['pic']; ?>" alt="">
                            </a>
                        </li>
                      
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="copy" style="text-align: center;margin-top: 30px;">
            <div class="container" style="color:#fff" >Copyright © 2018 etereauty Innovations Limited</div>
            <?php if(!(empty($share) || (($share instanceof \think\Collection || $share instanceof \think\Paginator ) && $share->isEmpty()))): ?><?php echo $share['url']; endif; ?>
        </div>
        </div>
        <div class="top-box">
            <i class="fa fa-angle-up"></i>
        </div>

    </footer>
    <script src="/index/js/jquery.js"></script>
    <script src="/index/swiper/dist/js/swiper.min.js"></script>
    <script src="/index/js/Component.js"></script>
    <script src="/index/js/index.js"></script>
    <script src="/index/js/profit.js"></script>
</body>

</html>