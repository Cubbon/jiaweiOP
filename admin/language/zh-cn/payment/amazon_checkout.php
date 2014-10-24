<?php
//Payment page links
$_['text_amazon_checkout'] = '<a onclick="window.open(\'http://go.amazonservices.com/UKCBASPOpenCart.html\');"><img src="view/image/payment/amazon.png" alt="Amazon Payments" title="Amazon Payments" border: 1px solid #EEEEEE;" /></a>';
$_['text_amazon_join'] = '<a href="http://go.amazonservices.com/UKCBASPOpenCart.html" title="点击这里加入Amazon Payments">点击这里申请Amazon Payments 结帐户口</a>';

//Headings
$_['heading_title'] 	= 'Amazon Payments';
$_['text_home']			= '主页'; //home
$_['text_payment']		= '支付管理'; //payment

//Text
$_['text_cron_job_url']			= "Cron Job's 网址:"; //"Cron Job's URL:";
$_['help_cron_job_url'] 		= "设置cron job呼唤网址"; //"Set a cron job to call this URL";
$_['text_cron_job_token']		= "加密字串(Secret Token)"; //"Secret Token";
$_['help_cron_job_token']		= "请用较长和难猜的加密字串"; //"Make this long and hard to guess";
$_['text_access_key']			= '连接密钥(Access Key):'; //Access Key
$_['text_access_secret']		= '秘密密钥(Secret Key):'; //Secret Key
$_['text_merchant_id']			= '商户编号(Merchant ID):'; //'Merchant ID:';
$_['text_marketplace']			= '市場(Marketplace):'; //Marketplace
$_['text_germany']				= '德国'; //'Germany';
$_['text_uk']					= '英国'; //'United Kingdom';
$_['text_checkout_mode']		= '结帐模式:'; //'Checkout mode:';
$_['text_geo_zone']				= '区域群组:'; //'Geo Zone:'; 
$_['text_status']				= '状态：:'; 
$_['text_live']					= 'Live'; //現貨？現場？

$_['text_sandbox'] 					= '测试模式(Sandbox)'; //Sandbox
$_['text_sort_order']				= '排序：'; //'Sort Order:';
$_['text_minimum_total']			= '最低消费:'; //'Minimum Order Total:';
$_['text_all_geo_zones']			= '所有区域群组';//'All Geo Zones';
$_['text_status_enabled']			= '启用';// 'Enabled';
$_['text_status_disabled']			= '停用'; //'Disabled';
$_['text_default_order_status']		= '等待:'; //'Pending:';
$_['text_ready_order_status']		= '准备货运状态:'; //'Ready to be Shipped status:';
$_['text_canceled_order_status']	= '取消订单状态:'; //'Canceled order status:';
$_['text_shipped_order_status']		= '已货运状态:'; //'Shipped order status:';
$_['text_last_cron_job_run']		= "最后cron job运行时间:"; // "Last cron job's run time:";
$_['text_allowed_ips']				= "允许的IP地址"; //"IPs allowed";
$_['text_add']						= "添加"; // Add
$_['text_upload_success']			= '文件上传成功'; //'File was uploaded successfully';
$_['help_adjustment']				= '最少有一个调整栏还没输入'; //'Bold fields and at least one "-adj" field are required';
$_['help_allowed_ips']				= "留空让所有客户看见结帐按扭"; //"Leave empty if you want everyone to see the checkout button";

// Buttons
$_['button_cancel']				= '取消'; 
$_['button_save']				= '保存'; 

// Errors
$_['error_permissions'] 			= '您没有权限修改Amazon Payments支付模块'; //'You do not have permissions to modify this module';
$_['error_empty_access_secret']		= '请输入秘密密钥(Secret Key)'; // 'Secret Key is required';
$_['error_empty_access_key']		= '请输入连接密钥(Access Key)'; // 'Access Key is required';
$_['error_empty_merchant_id']		= '请输入商户编号(Merchant ID)'; //'Merchant ID is required';
$_['error_curreny']					= '确定您的商店已安装及启用 %s货币'; //'Your shop must have %s currency installed and enabled';
$_['error_upload']					= '上传失败'; //'Upload failed';

// Checkout button settings
$_['text_button_settings']		= '结帐设定'; //'Checkout button settings'; 
$_['text_colour']				= '颜色:'; //'Colour:';
$_['text_orange']				= '橘色'; //'Orange';
$_['text_tan']					= '黄褐色'; //'Tan';
$_['text_white']				= '白色'; // 'White';
$_['text_light']				= '淡光'; //'Light';
$_['text_dark']					= '暗黑'; //'Dark';
$_['text_size']					= '尺寸:'; //'Size:';
$_['text_medium']				= '中等'; //'Medium';
$_['text_large']				= '大型'; //'Large';
$_['text_x_large']				= '巨大'; //'Extra large';
$_['text_background']			= '背景:'; //'Background:';
$_['text_download']				= '<a href="%s">下载</a> 模板下载';

// Messages
$_['text_success']				= 'Amazon支付模块已更新';//'Amazon Payments module has been updated';

// Order Info
$_['text_amazon_details']		= 'Amazon 详细信息'; // 'Amazon Details';
$_['text_amazon_order_id']		= 'Amazon 订单ID:'; //'Amazon Order ID:';
$_['text_upload']				= '上载'; //'Upload';
//$_['text_upload_template'] 	= 'Upload the filled in template by clicking on the button below. Make sure it is saved as a tab-delimited file.';
$_['text_upload_template']		= '按下上传模板，确保它保存为分隔文件.';
$_['tab_order_adjustment']		= '订单调整'; //'Order Adjustment';

//Table columns
$_['column_submission_id'] = '提交ID'; // 'Submission ID';
$_['column_status'] = '状态';  
$_['column_text'] = '回应'; // Response
$_['column_amazon_order_item_code'] = 'Amazon订购产品编号'; //'Amazon Order Product Code';
?>