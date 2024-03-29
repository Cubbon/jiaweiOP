<?php
// Text
$_['text_title']          = 'Klarna发票';
$_['text_fee']            = 'Klarna发票 - 在14天内支付 <span id="klarna_invoice_toc_link"></span> (+%s)<script text="javascript\">$.getScript(\'http://cdn.klarna.com/public/kitt/toc/v1.0/js/klarna.terms.min.js\', function(){ var terms = new Klarna.Terms.Invoice({ el: \'klarna_invoice_toc_link\', eid: \'%s\', country: \'%s\', charge: %s});})</script>';
$_['text_no_fee']         = 'Klarna发票 - 在14天内支付 <span id="klarna_invoice_toc_link"></span><script text="javascript">$.getScript(\'http://cdn.klarna.com/public/kitt/toc/v1.0/js/klarna.terms.min.js\', function(){ var terms = new Klarna.Terms.Invoice({ el: \'klarna_invoice_toc_link\', eid: \'%s\', country: \'%s\'});})</script>';
$_['text_additional']      = 'Klarna帐户需要一些额外的信息，才可以处理您的订单。';
$_['text_wait']            = '请耐心等待！';
$_['text_male']            = '男';
$_['text_female']          = '女';
$_['text_year']            = '年';
$_['text_month']           = '月';
$_['text_day']             = '日';
$_['text_comment']        = "Klarna的发票编号： %s\n%s/%s: %.4f";

// Entry
$_['entry_gender']         = '性别:';
$_['entry_pno']            = '个人号码：<br /><span class="help">请在此处输入您的社会安全号码。</span>';
$_['entry_dob']            = '出生日期：';
$_['entry_phone_no']       = '电话号码：<br /><span class="help">请输入您的电话号码。</span>';
$_['entry_street']         = '街道：<br /><span class="help">請注意使用Klarna時，送货只可以使用巳注册的地址。</span>';
$_['entry_house_no']       = '门牌号:<br /><span class="help">请输入您的门牌号码。</span>';
$_['entry_house_ext']      = '房子延伸:<br /><span class="help">请在这里提交您的房子延伸。 E.g. A, B, C, Red, Blue ect.</span>';
$_['entry_company']        = '公司注册号：<br /><span class="help">请输入您的公司的注册号码</span>';

// Error
$_['error_deu_terms']      = '您必须同意Klarna的隐私政策 (Datenschutz)';
$_['error_address_match']  = '如果您想使用Klarna发票，支付和发货地址必须相符';
$_['error_network']        = '在连接到Klarna时发生错误。请稍后再试。';
?>
