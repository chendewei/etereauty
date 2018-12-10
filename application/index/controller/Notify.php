<?php
namespace app\index\controller;
use think\Controller;
use think\request;
use think\Db;
use think\Cookie;
/*use app\index\model\Notify as NotifyModel;*/

class Notify extends Controller
{
    public function index()
    {   
        $pay_info=Db::name('pay')->find();
        
        $dd=input('post.invoice');//订单号
        $num=input('post.num_cart_items');//订单数量
        $ship=input('post.mc_shipping');//运费
        $two_char=input('post.address_country_code');//二字码国家
        $email=input("post.payer_email");//邮箱
        $total=input("post.payment_gross");//总价
        $mc_currency=input("post.mc_currency");//二字码流通货币
        $ddtime=date("Y-m-d",time())."T".date("H:i:s",time());
        $arr_info=explode(",",input("post.custom"));
        if(count($arr_info)>1){
           $first_name=$arr_info[0]; 
           $last_name=$arr_info[0]; 
           $country=$arr_info[1]; 
           $state=$arr_info[2]; 
           $city=$arr_info[3]; 
           $address=$arr_info[4]; 
           $address1=$arr_info[5]; 
           $zip=$arr_info[6]; 
           $phone=$arr_info[7]; 
        }else{
            $first_name=input('post.first_name');//名字
            $last_name=input('post.last_name');//名字
            $address=input("post.address_street");//街道
            $address1="";//街道
            $zip=input('post.address_zip');//邮政编码
            $country=input("post.address_country");//国家
            $city=input("post.address_city");//城市
            $state=input("post.address_state");//洲
            $phone=$arr_info[0];
        }

        for ($i=1; $i <= $num ; $i++) { 
            $quantity[]=input("post.quantity{$i}");//数量
            $item_name[]=input("post.item_name{$i}");//商品名称
            $mc_gross[]=input("post.mc_gross_{$i}");//价格
            $mc_ship[]=input("post.mc_shipping{$i}");//运费
        }

        $name_num=count($item_name);
        for ($y=0; $y <$name_num ; $y++) { 
            $new_name=explode("-", $item_name[$y]);
            $pro_name[]=$new_name[0]."-".$new_name[1]."-".$new_name[2];
            $ddid=$new_name[3];
            $proid[]=$new_name[2];
        }
        
    
        //上传订单
        $str="";
        for($i=0;$i<$num;$i++){

        $str.="<ApiUploadOrderList><SellerSKU>{$pro_name[$i]}</SellerSKU><OrderItemId>{$proid[$i]}</OrderItemId><ProductNum>{$quantity[$i]}</ProductNum><ProductPrice>{$mc_gross[$i]}</ProductPrice><ShippingPrice>{$mc_ship[$i]}</ShippingPrice></ApiUploadOrderList>";
        }

        $curlPost="<?xml version='1.0' encoding='utf-8'?><soap:Envelope xmlns:xsi='http://www.w3.org/2001/XMLSchema-instance' xmlns:xsd='http://www.w3.org/2001/XMLSchema' xmlns:soap='http://schemas.xmlsoap.org/soap/envelope/'><soap:Body><UpLoadOrderV2 xmlns='http://tempuri.org/'><request><CustomerID>{$pay_info['userid']}</CustomerID><UserName>{$pay_info['user']}</UserName><Password>{$pay_info['pwd']}</Password><ApiUploadOrderInfo><CustomerID>{$pay_info['userid']}</CustomerID><OrderSourceID>{$ddid}</OrderSourceID><PayTime>{$ddtime}</PayTime><ClientOrderCode>{$dd}</ClientOrderCode><Email>{$email}</Email><TransactionId></TransactionId><Currency>{$mc_currency}</Currency><TotalPrice>{$total}</TotalPrice><TransportPay>{$ship}</TransportPay><OrderDescription></OrderDescription><FirstName>{$first_name}</FirstName><LastName>{$last_name}</LastName><Country>{$country}</Country><Province>{$state}</Province><City>{$city}</City><PostCode>{$zip}</PostCode><Telephone>{$phone}</Telephone><Address1>{$address}</Address1><Address2>{$address1}</Address2><TrackNumbers></TrackNumbers><OrderItemList>{$str}</OrderItemList></ApiUploadOrderInfo></request></UpLoadOrderV2></soap:Body></soap:Envelope>";

        $url="http://888.irobotbox.com/API/API_Irobotbox_Orders.asmx";
        $header=array();
        $header[] = "Content-type: text/xml";  

        $ch = curl_init ($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch,CURLOPT_POSTFIELDS, $curlPost);
        $response = curl_exec($ch);
        if(curl_errno($ch)){
            printcurl_error($ch);
        }
        curl_close($ch);
        print_r($response);

        $exit=Db::name("order")->where("ordernum",$dd)->find();

        if($exit){
        $up_data=array(
        'buyer'=>$first_name." ".$last_name,
        'status'=>3,
        'truename'=>$first_name." ".$last_name,
        'address'=>$address.",".$city.",".$state.",".$country,
        );
        $re=Db::name('order')->where("ordernum",$dd)->update($up_data);

        if($re){
            echo "<script>window.location.href='/';</script>";die;
            }

    }

        return $this->fetch();
    }


}
