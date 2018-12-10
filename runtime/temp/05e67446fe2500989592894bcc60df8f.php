<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"F:\etereauty\public/../application/index\view\detail\index.html";i:1542185782;s:54:"F:\etereauty\application\index\view\Public\header.html";i:1542607974;s:54:"F:\etereauty\application\index\view\Public\footer.html";i:1542336960;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/index/swiper/dist/css/swiper.min.css">
    <link rel="stylesheet" href="/index/css/Component.css">
    <link rel="stylesheet" href="/index/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/index/css/init.css">
    <link rel="stylesheet" href="/index/css/style.css">
    <link rel="stylesheet" href="/index/fonts/iconfont.css">
    <link rel="stylesheet" href="/index/font/css/font-awesome.min.css">
    <meta name="keywords" content="<?php echo $set['host_key']; ?>">
    <meta name="description" content="<?php echo $set['host_content']; ?>">
    <title><?php echo $set['host_name']; ?>-<?php echo $info['proname']; ?></title>

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
    <div class="centerbox detabox">
        <div class="alert-prompt">
            <div class="prompt">
                <p class="tit">Prompt</p>
                <div class="p-init"></div>
            </div>
        </div>
        <div class="details">
            <div class="d-top">
                <div class="container">
                    <div class="main">
                        <div class="row">
                            <div class="gmap gmapVer col-sm-6" id="gmap">
                                <div class="imgs">
                                    <ul class="imgs-list">
                                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <li>
                                            <img src="<?php echo $vo['filepath']; ?>" alt="">
                                        </li>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>    
                                    </ul>
                                </div>
                            </div>
                            <div class="rig-info col-sm-6">
                                <div class="tit"><?php echo $info['proname']; ?></div>
                                <div class="test"><?php echo $info['abstract']; ?></div>
                                <div class="price-start">
                                   <!--  <div class="star-box">
                                       <span class="s-icon">
                                           <i class="fa fa-star-o"></i>
                                           <i class="fa fa-star-o"></i>
                                           <i class="fa fa-star-o"></i>
                                           <i class="fa fa-star-o"></i>
                                           <i class="fa fa-star-o"></i>
                                       </span>
                                       <input class="s-num" value="4.5" type="hidden">
                                       <span class="myreview">99 Reviews</span>
                                   </div> -->
                                    <div class="price">$ <?php echo $info['price']; ?></div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="color-box">
                                    <span class="c-tit">Color :</span>
                                      <?php switch($info['color']): case "1": break; case "2": ?>
                                            <span class="c-dic" style="background:linear-gradient(#fff,#cdcdcb)"></span>
                                            <?php break; case "3": ?>
                                            <span class="c-dic" style="background:linear-gradient(#fff,#d267a3)"></span>
                                            <?php break; case "4": ?>
                                            <span class="c-dic" style="background:linear-gradient(#fff,#bc6481)"></span>
                                            <?php break; case "5": ?>
                                            <span class="c-dic" style="background:linear-gradient(#fff,#307ef5)"></span>
                                            <?php break; case "6": ?>
                                            <span class="c-dic" style="background:linear-gradient(#fff,#5ab7c6)"></span>
                                            <?php break; case "7": ?>
                                            <span class="c-dic" style="background:linear-gradient(#fff,#b1c2da)"></span>
                                            <?php break; default: endswitch; ?>
                                </div>
                                <div class="btn-box">
                                <form action="<?php echo url('car/index'); ?>" method="post">
                                    <div>
                                    <input  name="num" type="hidden" value="1">
                                    <input type="hidden" name="proid" value="<?php echo $info['id']; ?>" >
                                        <button type="submit">ADD TO CART</button>
                                    </div>
                                </form>
                                    <?php if($info['is_show'] == 1): ?>
                                    <div>
                                        <button onclick="location='<?php echo $info["external"]; ?>'" >BUY ON AMAZON</button>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-bottom">
                <div class="container">
                    <div class="main">
                        <div class="deta-info">
                            <div class="d-title">About the Product</div>
                            <?php echo html_entity_decode($info['text']); ?>
                        </div>
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
    <script>
        $('#gmap').gmapVer({
            targetDom: $('.imgs-list'),
            color: '#5fc9d9'
        })
        $(".imgs-list li ").eq(0).css("display","block");
    </script>
</body>

</html>