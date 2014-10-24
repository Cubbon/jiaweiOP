<?php
//Headings
$_['heading_title'] = 'PayPal Payflow Pro iFrame';
$_['heading_refund'] = '退款';

//Table columns
$_['column_transaction_id'] = '交易编号';
$_['column_transaction_type'] = '交易类型';
$_['column_amount'] = '金额';
$_['column_time'] = '时间';
$_['column_actions'] = '操作';

//Text
$_['text_payment'] = '支付管理';
$_['text_success'] = '成功：您已經修改了PayPal Payflow Pro iFrame的帐户资料！';
$_['text_pp_payflow_iframe'] = '<a onclick="window.open(\'\');"><img src="view/image/payment/paypal.png" alt="PayPal Payflow Pro" title="PayPal Payflow Pro iFrame" style="border: 1px solid #EEEEEE;" /></a>';
$_['text_authorization'] = 'Authorization';
$_['text_sale'] = 'Sale';
$_['text_authorise'] = 'Authorise';
$_['text_capture'] = 'Delayed Capture';
$_['text_void'] = '作废';
$_['text_payment_info'] = '付款信息';
$_['text_complete'] = '完成';
$_['text_incomplete'] = '未完成';
$_['text_transaction'] = '交易';
$_['text_confirm_void'] = '如果您确定取消您将不能获得任何额外资金';
$_['text_refund'] = '退款';
$_['text_refund_issued'] = '已成功发还了退款';
$_['text_redirect'] = 'Redirect';
$_['text_iframe'] = 'Iframe';
$_['help_vendor'] = '您的商戶登录编号会在您注册Website Payments Pro 的帐户时建立了';
$_['help_user'] = '如果您在这个帐户设置了一个或多个其他用户, 这个数值是获授权处理交易用户的ID。但是，如果您没有在这个帐户设置其他用户，用戶(USER)的数值和卖家(VENDOR)相同。';
$_['help_password'] = '在您注册帐户时设置的一个由6到32个字符组成的密码';
$_['help_partner'] = '这个ID由为您注册Payflow SDK的PayPal授权经销商提供。如果您是直接从PayPal购买帐户，请使用PayPal';
$_['help_checkout_method'] = "如果您没有安装SSL或者您没有在您的托管支付页面关闭PayPal付款选项,请使用Redirect方法";
$_['help_debug'] = "纪录其他更多的讯息";

//Buttons
$_['button_refund'] = '退款';
$_['button_void'] = '作废';
$_['button_capture'] = '捕获';

//Tabs
$_['tab_settings'] = '设定';
$_['tab_order_status'] = '订单状态';
$_['tab_checkout_customisation'] = '自定义结帐';

//Form entry
$_['entry_vendor'] = '卖家:';
$_['entry_user'] = '用戶:';
$_['entry_password'] = '密码:';
$_['entry_partner'] = '搭档:';
$_['entry_test'] = '测试模式:<br /><span class="help">使用实时(live)或测试(sandbox)网关服务器来处理交易?测试可能会在Internet Explorer中失败</span>';
$_['entry_total'] = '订单合计:<br /><span class="help">在这种支付方式被激活之前必须达到这个订单合计的总额</span>';
$_['entry_order_status'] = '订单状态:';
$_['entry_geo_zone'] = '区域群组:';
$_['entry_status'] = '状态:';
$_['entry_sort_order'] = '排序:';
$_['entry_transaction_method'] = '交易方法:';
$_['entry_transaction_id'] = '交易编号';
$_['entry_full_refund'] = '全额退款';
$_['entry_amount'] = '金额';
$_['entry_message'] = '信息';
$_['entry_ipn_url'] = 'IPN URL:';
$_['entry_checkout_method'] = '结帐方法:';
$_['entry_debug'] = '调试模式:';
$_['entry_transaction_reference'] = '交易参考';
$_['entry_transaction_amount'] = '交易金额';
$_['entry_refund_amount'] = '退款金额';
$_['entry_capture_status'] = '捕获状态';
$_['entry_void'] = '作废';
$_['entry_capture'] = '捕获';
$_['entry_transactions'] = '交易';
$_['entry_complete_capture'] = '完成捕获';
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
$_['entry_cancel_url'] = '取消 URL:';
$_['entry_error_url'] = '错误 URL:';
$_['entry_return_url'] = '返回 URL:';
$_['entry_post_url'] = 'Silent POST URL:';

//Errors
$_['error_permission'] = '警告：您没有权限修改PayPal Website Payment Pro iFrame (UK)!';
$_['error_vendor'] = '必须填写卖家!';
$_['error_user'] = '必须填写用戶!';
$_['error_password'] = '必须填写密码!';
$_['error_partner'] = '必须填写搭档!';
$_['error_missing_data'] = '漏填数据';
$_['error_missing_order'] = '找不到订单';
$_['error_general'] = '这里有一个错误';
$_['error_capture_amt'] = '输入一个数量来捕获';
?>