<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"F:\etereauty\public/../application/index\view\order\index.html";i:1544263984;s:54:"F:\etereauty\application\index\view\Public\header.html";i:1542607974;s:54:"F:\etereauty\application\index\view\Public\footer.html";i:1542336960;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,user-scalable=0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="<?php echo $set['host_key']; ?>">
    <meta name="description" content="<?php echo $set['host_content']; ?>">
    <title><?php echo $set['host_name']; ?>-Order</title>
    <link rel="stylesheet" href="/index/swiper/dist/css/swiper.min.css">
    <link rel="stylesheet" href="/index/css/Component.css">
    <link rel="stylesheet" href="/index/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/index/css/init.css">
    <link rel="stylesheet" href="/index/css/style.css">
    <link rel="stylesheet" href="/index/css/index.css">
    <link rel="stylesheet" href="/index/fonts/iconfont.css">
    <link rel="stylesheet" href="/index/font/css/font-awesome.min.css">


</head>
<style>
    .lable{
  display: inline-block;
  width: 23%;
}
</style>
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
        <div class="o-bj">
            <img src="/index/images/cart_bj.png" alt="">
        </div>
        <div class="container">
            <div class="login cart">
                <div class="mytit">
                    My Order
                </div>
                <div class="personal shopping order">
                    <div class="only histor shopping-box">
                        <div class="scroll-box">
                            <div class="o-tit">Confirm order information</div>
                            <div class="list-wrap">
                                <ul class="list">
                                    <li class="li-tit">
                                        <div class="name">Commodity name</div>
                                        <div class="o-price">Purchase price</div>
                                        <div class="quan">Purchase quantity</div>
                                        <div class="price">Subtotal</div>
                                    </li>
                                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <li>
                                        <div class="name">
                                            <span class="img"><img src="<?php echo $vo['pic']; ?>" alt=""></span>
                                            <span class="title"><?php echo substr($vo['proname'],0,55); ?>...</span>
                                        </div>
                                        <div class="o-price">$<?php echo $vo['price']; ?></div>
                                        <div class="quan"><?php echo $vo['num']; ?></div>
                                        <div class="price ">$<?php echo $vo['price']*$vo['num']; ?></div>
                                       
                                    </li>

                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                   
                                </ul>
                            </div>
                            <div class="o-tit">Receiving address</div>
                            <div class="address">
                                <form action="<?php echo url('order/address'); ?>">
                                <div class="m-50 item">
                                        <div class="inp"><div class="lable"><span class="msg">First Name</span><span class="icon">*</span></div>
                                        <input type="text" <?php if(!(empty($address) || (($address instanceof \think\Collection || $address instanceof \think\Paginator ) && $address->isEmpty()))): ?> value="<?php echo $address['name'][0]; ?>" <?php endif; ?> class="inp-imp" name="f_name" id="f_name"></div>
                                </div>
                                <div class="m-50 item">
                                        <div class="inp"><div class="lable"><span class="msg">Address 1</span><span class="icon">*</span></div>
                                        <input class="inp-imp" type="text" <?php if(!(empty($address) || (($address instanceof \think\Collection || $address instanceof \think\Paginator ) && $address->isEmpty()))): ?> value="<?php echo $address['address']; ?>" <?php endif; ?> name="address1" id="Street" ></div>
                                </div>
                                <div class="m-50 item">
                                        <div class="inp"><div class="lable"><span class="msg">Last Name</span><span class="icon">*</span></div>
                                        <input class="inp-imp" type="text" <?php if(!(empty($address) || (($address instanceof \think\Collection || $address instanceof \think\Paginator ) && $address->isEmpty()))): ?> value="<?php echo $address['name'][1]; ?>" <?php endif; ?> name="l_name"></div>
                                </div>
                                <div class="m-50 item">
                                        <div class="inp"><div class="lable"><span class="msg">Address 2</span><span class="icon">*</span></div>
                                        <input class="" type="text" <?php if(!(empty($address) || (($address instanceof \think\Collection || $address instanceof \think\Paginator ) && $address->isEmpty()))): ?> value="<?php echo $address['address1']; ?>" <?php endif; ?> name="address2" id="Street" ></div>
                                </div>
                     
                                    <div class="m-50 item">     
                                        <div class="inp"><div class="lable"><span class="msg">Email</span><span class="icon">*</span></div>
                                        <input type="text"  class="inp-imp" <?php if(!(empty($user_info) || (($user_info instanceof \think\Collection || $user_info instanceof \think\Paginator ) && $user_info->isEmpty()))): ?> value="<?php echo $user_info['email']; ?>" <?php endif; ?> name="email" id="Email"></div>
                                    </div>
                 
                                    <div class="m-50 item">
                                        <div class="inp"><div class="lable"><span class="msg">City</span><span class="icon">*</span></div>
                                        <input class="inp-imp" type="text" <?php if(!(empty($address) || (($address instanceof \think\Collection || $address instanceof \think\Paginator ) && $address->isEmpty()))): ?> value="<?php echo $address['city']; ?>" <?php endif; ?> name="city" id="City"></div>
                                    </div>
                            
                                    <div class="m-50 item">
                                        <div class="inp"><div class="lable"><span class="msg">Password</span><span class="icon">*</span></div>
                                        <input class="inp-imp" type="password" <?php if(!(empty($user_info) || (($user_info instanceof \think\Collection || $user_info instanceof \think\Paginator ) && $user_info->isEmpty()))): ?> value="******" <?php endif; ?> name="password" id="Password"></div>
                                    </div>
                   
                                    <div class="m-50 item">
                                        <div class="inp"><div class="lable">
                                        <span class="msg">State/Territory</span><span class="icon">*</span>
                                        </div>
                                        
                                        <?php if(!(empty($address) || (($address instanceof \think\Collection || $address instanceof \think\Paginator ) && $address->isEmpty()))): if($address['country'] == 'United States'): ?>
                                        <select class="inp-imp" name="province" id="province2">
                                        <?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $v['name']; ?>"  <?php if($v['name'] == $address['province']): ?> selected <?php endif; ?> ><?php echo $v['name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                        <input class="" type="text"  value="<?php echo $address['province']; ?>" name="province1" id="province1" style="display: none"  >
                                        <?php else: ?>
                                        <select class="inp-imp" name="province" id="province2" style="display: none">
                                        <?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $v['name']; ?>"  <?php if($v['name'] == $address['province']): ?> selected <?php endif; ?> ><?php echo $v['name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                        <input class="" type="text"  value="<?php echo $address['province']; ?>" name="province1" id="province1" >
                                        <?php endif; else: ?>
                                        <select class="" name="province" id="province2">
                                        <?php if(is_array($province) || $province instanceof \think\Collection || $province instanceof \think\Paginator): $i = 0; $__LIST__ = $province;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $v['name']; ?>"><?php echo $v['name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                        <input class="" type="text"  value="" name="province2" id="province1" style="display: none" >
                                        <?php endif; ?>
                                       
                                        </div>
                                    </div> 
                             
                                    <div class="m-50 item">
                                        <div class="inp">
                                        <div class="lable"><span class="msg">Confirm Password</span><span class="icon">*</span></div>
                                        <input class="inp-imp" type="password" <?php if(!(empty($user_info) || (($user_info instanceof \think\Collection || $user_info instanceof \think\Paginator ) && $user_info->isEmpty()))): ?> value="******" <?php endif; ?> name="cpassword" id="Password"></div>
                                    </div>
                       
                                 <div class="m-50 item">
                                        <div class="inp"><div class="lable"><span class="msg">Zip Code</span><span class="icon">*</span></div>
                                        <input class="inp-imp" type="text" <?php if(!(empty($address) || (($address instanceof \think\Collection || $address instanceof \think\Paginator ) && $address->isEmpty()))): ?> value="<?php echo $address['zip']; ?>" <?php endif; ?> name="zip" id="Zipcode" ></div>
                                </div>
                                <div class="m-50 item">
                                        <div class="inp"><div class="lable"><span class="msg">Phone Number</span><span class="icon">*</span></div>
                                        <input class="inp-imp" type="text" <?php if(!(empty($address) || (($address instanceof \think\Collection || $address instanceof \think\Paginator ) && $address->isEmpty()))): ?> value="<?php echo $address['phone']; ?>" <?php endif; ?> name="phone" id="Telephone" ></div>
                                </div>    
                                    <div class="m-50 item">
                                        <div class="inp"><div class="lable"><span class="msg">Country</span><span class="icon">*</span></div>
                                        <select class="inp-imp" name="country" id="country">
                                        <?php if(is_array($country) || $country instanceof \think\Collection || $country instanceof \think\Paginator): $i = 0; $__LIST__ = $country;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                                        <option value="<?php echo $v['name']; ?>" <?php if(!(empty($address) || (($address instanceof \think\Collection || $address instanceof \think\Paginator ) && $address->isEmpty()))): if($v['name'] == $address['country']): ?> selected <?php endif; else: if($v['name'] == 'United States'): ?> selected <?php endif; endif; ?>><?php echo $v['name']; ?></option>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select></div>
                                    </div>
                                   
                                    
                                    
                                    
                                    
                                    <input type="hidden" >
                                    <!-- <div class="m-100 item">
                                        <div class="tits">Address Line 2</div>
                                        <div class="inp"><input type="text" name="address_2"></div>
                                    </div>
                                    <div class="m-100 item">
                                        <div class="tits">Address Line 3</div>
                                        <div class="inp"><input type="text" name="address_3"></div>
                                    </div> -->
                                    <div class="m-100 item">
                                        <div class="sub">
                                            <span class="error"></span>
                                             <input type="hidden" name="userid" id="userid" value="<?php echo $user_id; ?>">
                                            <button class="save" type="submit" >Save</button>
                                            <button class="edit" type="button">Edit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <form action="<?php echo url('submit/index'); ?>" method="post">
                             <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <input type="hidden" name="price[]" class="toprice" value="<?php echo $vo['price']*$vo['num']; ?>">
                                    <input type="hidden" name="pro_name[]" value="<?php echo $vo['proname']; ?>" />
                                    <input type="hidden" name="num[]" value="<?php echo $vo['num']; ?>" />
                                    <input type="hidden" name="pro_pic[]" value="<?php echo $vo['pic']; ?>" />
                                    <input type="hidden" name="sku[]" value="<?php echo $vo['sku']; ?>" />
                                    <input type="hidden" name="proid[]" value="<?php echo $vo['id']; ?>" />
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            <div class="o-tit">Payment method</div>
                            <div class="method">
                                <div class="active">Paypal</div>
                              <!--   <div>Alipay</div>
                              <div>Credit Card (Stripe)</div> -->
                            </div>
                            <div class="o-tit">Distribution mode</div>
                            <div class="mode">

                                <div class="active" attr="0.00">FREE shipping（0.00）</div>
                                <div attr="20.00">UPS（20.00）</div>
                                <input type="hidden" name="shipping" class="ship" value="0.00">
                            </div>
                            <div class="sett">
                                <div class="left">
                                    <div class="codes">Discount code</div>
                                    <div class="inps">
                                       <input type="text" name="code" class="code" value="" />
                                    </div>
                                </div>
                                <div class="right">
                                    <div class="total">
                                        <span class="titles">Total order：</span>
                                        <span class="tmoney">$40.98</span>
                                    </div>
                                    <div class="freight">
                                        <span class="titles">freight：</span>
                                        <span class="posage">$0.00</span>
                                    </div>
                                    <div class="payable">
                                        <span class="titles">Total payable：</span>
                                        <span class="num all-price" id="totalrice">$40.98</span>
                                        <input type="hidden" name="total" class="tota" value="" />
                                    </div>
                                </div>
                            </div>
                            <div class="pays">
                                <button type="button" onclick="window.location.href='/index/car/index.html'" class="ret-btn">Return Cart</button>
                          
                                <input type="submit" class="next-btn" style="border-radius: 14px;" value="Complete Order">

                            </div>
                            </form>
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

    $("#country").change(function(){


    var country=$("#country").val();
    if(country != 'United States'){
        $("#province1").show();
        $("#province2").hide();
    }else{
        $("#province2").show();
        $("#province1").hide(); 
    }

 })
    var w = 0;
    $(".toprice").each(function(){

    w+=parseFloat($(this).val());
    })

    $(".tmoney").text(w);

    $("#totalrice").text(w);
    $(".tota").val(w);

    $(".mode div" ).click(function(){
    var ship=$(this).attr("attr");
    var totalrice=parseFloat($("#totalrice").text()).toFixed(2);
    var toice=parseFloat($(".tmoney").text()).toFixed(2);
    var total=(parseFloat(ship)+parseFloat(totalrice)).toFixed(2);
    $(".posage").text(ship);
    $(".ship").val(ship);
    if(ship == '20.00'){
    $("#totalrice").text(total);
    $(".tota").val(total);
    }else{
      $("#totalrice").text(toice);   
      $(".tota").val(toice);
    }
})

    $(".code").change(function(){
    var str="";
        $("input[name='proid[]']").each(function(){ 
        str+=$(this).val()+","; 
        })
    var code=$(this).val();

    var total=$("#totalrice").text();
    if(code.length > 0){   
    $.ajax({
            type:'post',
            url:"<?php echo url('order/code'); ?>",  
            dataType:"text",  
            data:"id="+str+"&code="+code+"&total="+total,
            success:function(data){
                $("#totalrice").text(data);
                $(".tota").val(data);
            }
         })
    }else{
        var w = 0;
        $(".to .toprice").each(function(){
        w+=parseFloat($(this).text());
        })
        $("#tmoney").text(w);
        $("#totalrice").text(w);
        $(".tota").val(w);

    }
})
    </script>
</body>

</html>