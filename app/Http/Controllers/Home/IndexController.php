<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Route;
use think\response\Redirect;

class IndexController extends Controller
{
    # 扫码选择支付方式
    function index(Request $request){
        // 展示两种支付方式
        
        // 生成店铺唯一标识
        $ship_id = md5('sunshaolei');
        
        echo '欢迎来到孙少雷的讹死你不偿命的小店铺<hr/>';

        # 生成二维码扫描后的地址
        $qr_code = 'http://directory.yzzznh.cn/web_larvael/public/index.php/pay';
        
        # 携带参数
        $qr_data = $qr_code.'/'.$ship_id;

        echo '打开微信 支付宝扫一扫即可付款<hr/>';
        
        # 引入QRcode文件
        require_once app_path().'/lib/phpqrcode/phpqrcode.php';
        
        # 生成照片路径
        $qr_png = '/data/wwwroot/default/web_larvael/'.$ship_id.'.png';

        # 传递参数
        \QRcode::png($qr_data , $qr_png , 'H' , 5 , 1 );
        
        # 拼接路径并展示
        $qr_png_url = 'http://directory.yzzznh.cn/web_larvael/'.$ship_id.'.png';
        
        # 展示二维码
        echo '<img src="'.$qr_png_url.'">';
        
    }
    
    # 进入选择支付 页面
    function pay(Request $request ,$pay_type){
        
        # 通过$_SERVER 接收全部信息
        # $_SERVER;
        
        # 检查是微信支付还是支付报支付
        if( strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger') !== false ){
            
            # 微信支付
            $pay_type = 1;

        }elseif( strpos($_SERVER['HTTP_USER_AGENT'],'AlipayClient') !== false){

            # 支付宝支付
            $pay_type = 2;

        };
        
        return view('Home.pay',['pay_type'=>$pay_type]);
    }
    
    # 获取支付方式地址
    function pays(Request $request , $pay_type){
     
        
        if($pay_type == 1 ){
            
            echo  route('wechat',['money'=>""]);
        }else{

            echo  route('alipay',['money'=>""]);
            
        }
    }
    
    # 微信支付
    public function wechat(Request $request,$money){
    
        
        // 引入文件包含
        require_once app_path()."/lib/phpsdk/lib/WxPay.Api.php";
        require_once app_path()."/lib/phpsdk/example/WxPay.NativePay.php";
        require_once app_path().'/lib/phpsdk/example/log.php';
    
        //初始化日志
        $logHandler= new \CLogFileHandler(app_path()."/lib/phpsdk/logs/".date('Y-m-d').'.log');
        $log = \Log::Init($logHandler, 15);
    
        //模式一
        //不再提供模式一支付方式
        /**
     
         * 流程：
         * 1、组装包含支付信息的url，生成二维码
         * 2、用户扫描二维码，进行支付
         * 3、确定支付之后，微信服务器会回调预先配置的回调地址，在【微信开放平台-微信支付-支付配置】中进行配置
         * 4、在接到回调通知之后，用户进行统一下单支付，并返回支付信息以完成支付（见：native_notify.php）
         * 5、支付完成之后，微信服务器会通知支付成功
         * 6、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
         */
    
    
        $notify = new \NativePay();
        //$url1 = $notify->GetPrePayUrl("123456789");
    
        //模式二
        /**
         * 流程：
         * 1、调用统一下单，取得code_url，生成二维码
         * 2、用户扫描二维码，进行支付
         * 3、支付完成之后，微信服务器会通知支付成功
         * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
         */
        $input = new \WxPayUnifiedOrder();
        $input->SetBody("test");
        $input->SetAttach("test");
        $input->SetOut_trade_no("sdkphp123456789".date("YmdHis"));
        $input->SetTotal_fee("111");
        $input->SetTime_start(date("YmdHis"));
        $input->SetTime_expire(date("YmdHis", time() + 600));
        $input->SetGoods_tag("test");
        $input->SetNotify_url("http://paysdk.weixin.qq.com/notify.php");
        $input->SetTrade_type("NATIVE");
        $input->SetProduct_id("123456789");
    
        $result = $notify->GetPayUrl($input);
    
        $url2 = $result["code_url"];
       
        return 111;
        Route::redirect('/wechat');
//        return view('Home.wechat')->with('url2',$url2);
        
    
    }
    
    # 支付宝支付
    public function alipay(Request $request , $money){
        /* *
            * 功能：支付宝手机网站支付接口(alipay.trade.wap.pay)接口调试入口页面
            * 版本：2.0
            * 修改日期：2016-11-01
            * 说明：
            * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。
            请确保项目文件有可写权限，不然打印不了日志。
            */
        $order_no ='111111';

        $config = require app_path() . '/lib/alipay/config.php';
        /*require_once app_path().'/lib/alipay/wappay/buildermodel/AlipayTradeWapPayContentBuilder.php';
        require_once app_path().'/lib/alipay/wappay/service/AlipayTradeService.php';
        */
        
        
//        echo 111;die;
        //商户订单号，商户网站订单系统中唯一订单号，必填
//        $out_trade_no = $this->_createOrderNo($request);//
    
    
        //订单名称，必填
        $subject = '测试';//$_POST['WIDsubject'];
    
        //付款金额，必填
        $total_amount = $money; //$_POST['WIDtotal_amount'];
    
        //商品描述，可空
        $body = ''; // $_POST['WIDbody'];
        
        //超时时间
        $timeout_express = "1m";
    
        $payRequestBuilder = new \AlipayTradeWapPayContentBuilder();
        $payRequestBuilder->setBody($body);
        $payRequestBuilder->setSubject($subject);
        $payRequestBuilder->setOutTradeNo($order_no);
        $payRequestBuilder->setTotalAmount($total_amount);
        $payRequestBuilder->setTimeExpress($timeout_express);
        $payResponse = new \AlipayTradeService($config);
    
        $result = $payResponse->wapPay($payRequestBuilder, $config['return_url'], $config['notify_url']);
    }
 
    // 统一下单
    public function wpay()
    {
        $uniq_id = uniqid();
        # 统一下单接口网址
        $url = "https://api.mch.weixin.qq.com/pay/unifiedorder";
        $param = [
            'appid' => 'wx3d751ea7a2f7c064',
            'mch_id' =>'1499304962',
            'nonce_str' => $uniq_id,
            'sign_type' => 'MD5',
            'body' => '1805test',
            'detail' => '1805 test detail',
            'out_trade_no' => date('Ymd') . rand(10000, 99999),
            'total_fee' => 1,
            'spbill_create_ip' => $_SERVER['SERVER_ADDR'],
            'notify_url' => 'http://limq.wx1027.cn/admin/wpay',
            'trade_type' => 'NATIVE',
        ];
        ksort($param);
        
        $sign_str = urldecode(http_build_query($param));
        
        $sign_str .= '&key=sdg634fghgu5654rtghfghgfy4575htg';
        $sign_str= md5($sign_str);
        
        $param['sign'] = strtoupper($sign_str);
        
        
        function CurlPost($url, $param = [], $is_Post = 1, $timeout = 120)
        {
            //初始化curl
            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, $url); // 设置请求的路径
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            if ($is_Post) {
                curl_setopt($curl, CURLOPT_POST, 1); //设置POST提交
                curl_setopt($curl, CURLOPT_SAFE_UPLOAD, true);
                //提交数据
                if (is_array($param)) {
                    #不能使用http_bulid_query
                    curl_setopt($curl, CURLOPT_POSTFIELDS, ($param));
                    //            @curl_setopt($curl, CURLOPT_POSTFIELDS, ($param));
                } else {
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $param);
                }
            }
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); //显示输出结果
            curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
            //执行请求
            $data = $data_str = curl_exec($curl);
            //处理错误
            if ($error = curl_error($curl)) {
                $logdata = array(
                    'url' => $url,
                    'param' => $param,
                    'error' => '<span style="color:red;font-weight: bold">' . $error . '</span>',
                );
                var_dump($logdata);
                exit;
            }
            curl_close($curl);
            //json数据转换为数组
            $data = json_decode($data, true);
            if (!is_array($data)) {
                $data = $data_str;
            }
            return $data;
        }
        
      
        
        $xml=$this->arr2Xml($param);
    
        var_dump($xml);die;
        $result=CurlPost($url,$xml);
        
        
//     var_dump(simplexml_load_string($result, 'SimpleXMLElement', LIBXML_NOCDATA));die;
        $arr = json_decode(json_encode(simplexml_load_string($result, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
      
        var_dump($arr);die;
        if($arr['return_code']=='SUCCESS'){
            require_once app_path().'/lib/phpqrcode/phpqrcode.php';
      
//            header("content-type:image/png;");
            $file_name = '/data/wwwroot/default/laravel/public/qrcode/' . $uniq_id . '.png';
            \QRcode::png($arr['code_url'],$file_name,'H',6,2);
        }
//        echo '<img src="">';
//        echo 111;
        //return view('admin.wechat.wpay',['uid'=>$uniq_id]);
    }
    
    function arr2Xml($arr)
    {
        if(!is_array($arr) || count($arr) == 0) return '';
        
        $xml = "<xml>";
        foreach ($arr as $key=>$val)
        {
            if (is_numeric($val)){
                $xml.="<".$key.">".$val."</".$key.">";
            }else{
                $xml.="<".$key."><![CDATA[".$val."]]></".$key.">";
            }
        }
        $xml.="</xml>";
        return $xml;
    }



    
}
