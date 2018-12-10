<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:63:"F:\etereauty\public/../application/index\view\submit\index.html";i:1544264081;s:54:"F:\etereauty\application\index\view\Public\header.html";i:1542607974;s:54:"F:\etereauty\application\index\view\Public\footer.html";i:1542336960;}*/ ?>
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
      <link rel="stylesheet" href="/index/css/index.css">
    <link rel="stylesheet" href="/index/fonts/iconfont.css">
    <link rel="stylesheet" href="/index/font/css/font-awesome.min.css">
    <meta name="keywords" content="<?php echo $set['host_key']; ?>">
    <meta name="description" content="<?php echo $set['host_content']; ?>">
    <title><?php echo $set['host_name']; ?>-Submit</title>

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
    <div class="centerbox orderbox">
        <div class="alert-prompt">
            <div class="prompt">
                <p class="tit">Prompt</p>
                <div class="p-init"></div>
            </div>
        </div>
        <div class="container">
            <div class="login cart">
                <div class="mytit">
                    Payment
                </div>
                <div class="personal shopping order pay">
                    <div class="only histor shopping-box">
                        <div class="scroll-box">
                            <div class="list-wrap">
                                <div class="list-l">
                                        <ul class="list">
                                                <li class="li-tit">
                                                    <div class="name">Commodity name</div>
                                                    <div class="price">Subtotal</div>
                                                </li>
                                                <?php echo $str; ?>
                                               
                                            </ul>
                                </div>
                                <div class="summary">
                                    <div class="names">Summary</div>
                                    <ol>
                                        <li>
                                            <div class="tits">Subtotal :</div>
                                            <div class="prices">$<?php echo $toprice; ?></div>
                                        </li>
                                        <li>
                                            <div class="tits">Shipping :</div>
                                            <div class="prices">$<?php echo $shipping; ?></div>
                                        </li>
                                       <!--  <li>
                                           <div class="tits">Taxes :</div>
                                           <div class="prices">$9.60</div>
                                       </li> -->
                                        <li>
                                            <div class="tits">Free Shipping :</div>
                                            <div class="prices">-$0</div>
                                        </li>
                                        <li class="total">
                                            <div class="tits">Total :</div>
                                            <div class="prices">$<?php echo $alltotal; ?></div>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                            <div class="invoice">
                                <div class="lef">
                                    <div class="names">Invoiced To</div>
                                    <div class="wraps">
                                        <p>Personal information</p>
                                        <p><?php echo $info['name'][0]; ?> <?php echo $info['name'][1]; ?></p>
                                        <p><?php echo $info['phone']; ?></p>
                                        <p><?php echo $info['em']; ?></p>
                                    </div>
                                </div>
                                <div class="lef rig">
                                    <div class="names">Pay To</div>
                                    <div class="wraps">
                                        <p><?php echo $info['zip']; ?> </p>
                                        <p><?php echo $info['address']; ?></p>
                                        <p><?php echo $info['city']; ?></p>
                                        <p><?php echo $info['province']; ?></p>
                                        <p><?php echo $info['country']; ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="pay-tit">
                                <h2>Payment method</h2>
                                <p>All transactions are secure and encrypted. Credit card information is never stored.</p>
                            </div>
                            <div class="method pay-method">
                                <div>Paypal</div>
                           <!--      <div>Alipay</div>
                           <div>Credit Card (Stripe)</div> -->
                            </div>
                            <div class="total-price">
                                <span class="name">TOTAL:</span>
                                <span class="all-price">$<?php echo $alltotal; ?></span>
                            </div>
                            <div class="pay-bot">
                            <form method='post' name="myform"> 
                            <input value='_cart' type='hidden' name='cmd'>    

                            <input value="724165502-facilitator@qq.com" type='hidden' name='business'> 
                            <input type="hidden" name="upload">
                            <?php echo $str2; ?>
                            <input value='USD' type='hidden' name='currency_code'>
                            <input value='http://test.quanlaoba.com/index.php/index/notify/index' type='hidden' name='return'> 
                            <input value='http://test.quanlaoba.com/index.php/index/notify/index' type='hidden' name='notify_url'>
                            <input value='http://test.quanlaoba.com' type='hidden' name='cancel_return '>
                            
                            <input type="hidden" name="rm" value="2">
                            <input type='hidden' name='invoice' value="<?php echo $dd; ?>">
                            <input type="hidden" value="utf-8" name="charset"/>
                            <input type='hidden' name='custom' value="<?php echo $info['username']; ?>,<?php echo $info['country']; ?>,<?php echo $info['province']; ?>,<?php echo $info['city']; ?>,<?php echo $info['address']; ?>,<?php echo $info['address1']; ?>,<?php echo $info['zip']; ?>,                         1info['phone']">
                            <input value='US' type='hidden' name='lc'> 
                            <button class="paypal-btn" onclick="pay()" type="submit" ><img src="/index/images/paypal_bj.png" alt=""></button>
                            </form>
                               <!--  <button class="alipay-btn">Pay Now</button>
                               <button class="credit-btn">Pay Now</button> -->
                            </div>
                        </div>
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
    <script>
    function pay(){
      document.myform.action="https://www.sandbox.paypal.com/cgi-bin/webscr";
      document.myform.submit();
   }
    </script>
</body>

</html>