<?php


// Heading
$_['heading_title']      = 'PayPal Express';

// Text 
$_['text_payment']       = '支付管理';
$_['text_success']       = '成功：PayPal Express Checkout 快速结账帐户以更新！';
$_['text_pp_express']    = '<a onclick="window.open(\'https://www.paypal.com/uk/mrb/pal=W9TBB5DTD6QJW\');"><img src="view/image/payment/paypal.png" alt="PayPal" title="PayPal" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_authorization'] = 'Authorization';
$_['text_sale']          = 'Sale';
$_['text_clear']                        = 'Clear';
$_['text_browse']                       = 'Browse';
$_['text_image_manager']                = 'Image manager';
$_['text_ipn']                          = 'IPN url<span class="help">Required for subscriptions</span>';



// Entry
$_['entry_username']   				 = 'API 户名：';
$_['entry_password']   				 = 'API 密码：';
$_['entry_signature']   			 = 'API 签名：';
$_['entry_test']        			 = '测试模式：';
$_['entry_method']      			 = '交易方法：';
$_['entry_geo_zone']    			 = '区域群组：';
$_['entry_status']      			 = '状态：';
$_['entry_sort_order']  			 = '排序：';
$_['entry_icon_sort_order']          = '图标排序:'; //'Icon Sort Order:';
$_['entry_order_status']			 = '订单状态：';
$_['entry_debug']                    = '除虫日志:'; //'Debug logging:';
$_['entry_total']       			 = '订单合计：<br /><span class="help">当结帐时订单合计必须大于此数置才可使用本支付方式。</span>';
//$_['entry_currency']                    = 'Default currency<span class="help">Used for transaction searches</span>';
$_['entry_currency']                 = '默认货币<span class="help">用于交易搜索</span>';
$_['entry_profile_cancellation']     = '允许客户取消个人档案';//'Allow customers to cancel profiles';


// Order Status
$_['entry_canceled_reversal_status']    = '订单取消保留状态:';
$_['entry_completed_status']            = '订单完成状态：';
$_['entry_denied_status']			    = '订单拒绝状态:';
$_['entry_expired_status']              = '订单过期状态：';
$_['entry_failed_status']               = '订单失败状态：';
$_['entry_pending_status']              = '订单订单待定：';
$_['entry_processed_status']            = '订单已处理状态：';
$_['entry_refunded_status']             = '订单退款状态：';
$_['entry_reversed_status']             = '订单保留状态：'; //保留状态 //爭議状态
$_['entry_voided_status']		        = '订单作废状态:';


// Customise area
$_['entry_display_checkout']            = '显示快速结帐图标:'; //'Display quick checkout icon:';
$_['entry_allow_notes']                 = '允许注释:'; //'Allow notes:';
$_['entry_logo']                        = '标志<span class="help">Max 750px(w) x 90px(h)<br />如果您已经设置SSL，您应该只使用一个标志</span>';
$_['entry_border_colour']               = '标题边框颜色:<span class="help">6字符HTML颜色代码</span>';
$_['entry_header_colour']               = '标题背景颜色:<span class="help">6字符HTML颜色代码</span>';
$_['entry_page_colour']                 = '页面背景颜色:<span class="help">6字符HTML颜色代码</span>';


// Error
$_['error_permission'] 					= '警告： 您没权限修改 PayPal Express Checkout！';
$_['error_username']    				= '必须填写API 户名！'; 
$_['error_password']    				= '必须填写API 密码！'; 
$_['error_signature']   				= '必须填写API 签名！'; 
$_['error_data']                        = '询问资料有遗漏';//'Data missing from request';
$_['error_timeout']                     = '请求超时'; //'Request timed out';

// Tab headings
$_['tab_general']                       = '一般'; //'General';
$_['tab_api_details']                   = 'API详细信息';//'API details';
$_['tab_order_status']                  = '订单状态'; //'Order status';
$_['tab_customise']                     = '自定义结帐'; //'Customise checkout';
?>