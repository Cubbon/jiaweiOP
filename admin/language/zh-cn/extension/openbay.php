<?php
// Heading 
$_['lang_heading_title']        = 'OpenBay Pro'; 
$_['lang_text_manager']         = 'OpenBay Pro manager'; 

// Text
$_['text_install']              = '安装';
$_['text_uninstall']            = '卸载';
$_['lang_text_success']         = '成功：设定已保存';
$_['lang_text_no_results']      = '没有符合条件的结果';
$_['lang_checking_version']     = '检查软件版本';
$_['lang_btn_manage']           = '管理';
$_['lang_btn_retry']            = '重试';
$_['lang_btn_save']             = '保存';
$_['lang_btn_cancel']           = '取消';
$_['lang_btn_update']           = '更新';
$_['lang_btn_settings']         = '设定';
$_['lang_btn_patch']            = '补丁';
$_['lang_btn_test']             = '测试链接';
$_['lang_latest']               = '您使用的是最新版本';
$_['lang_installed_version']    = '已安装版本';
$_['lang_admin_dir']            = '管理者目录';
$_['lang_admin_dir_desc']       = '如果您更改管理者目录，请修改到新的位置';
$_['lang_version_old_1']        = '最新版本推出了，您现在的版本是';
$_['lang_version_old_2']        = '最新版本是';
$_['lang_use_beta']             = '使用测试(Beta)版本';
$_['lang_use_beta_2']           = '不建议如此！';
$_['lang_test_conn']            = '测试 FTP 链接';
$_['lang_text_run_1']           = '执行更新';
$_['lang_text_run_2']           = '执行';
$_['lang_no']                   = '否';
$_['lang_yes']                  = '是';
$_['lang_language']             = 'API 接口接受语言';
$_['lang_getting_messages']     = '获取 OpenBay Pro 信息';

// Column
$_['lang_column_name']          = '插件名称';
$_['lang_column_status']        = '状态';
$_['lang_column_action']        = '操作';

// Error
$_['error_permission']          = '警告：您无权限修改 eBay 扩展功能！';

// Updates
$_['lang_use_pasv']                     = '啟用被動FTP';  //'Use passive FTP';
$_['field_ftp_user']                    = 'FTP 使用者名稱'; //FTP Username
$_['field_ftp_pw']                      = 'FTP 密碼'; //FTP Password
$_['field_ftp_server_address']          = 'FTP 伺服器地址'; //FTP server address
$_['field_ftp_root_path']               = 'FTP 伺服器路徑'; //FTP path on server
$_['field_ftp_root_path_info']          = '(結尾不需斜線 如:httpdocs/www)'; //(No trailing slash e.g. httpdocs/www)
//$_['desc_ftp_updates']                  = 'Enabling updates from here means you do not have to manually update your module using the standard drag and drop through FTP. Your FTP are not sent to the API.<br />';
$_['desc_ftp_updates']                  = '启用更新是指您使用FTP时不需人手拖放您的档案，您的FTP不会发送到该API。<br />';

//Updates
$_['lang_run_patch_desc']               = '发表更新补丁<span class="help">用於手动更新</span>';
$_['lang_run_patch']                    = '执行补丁'; //run patch
$_['update_error_username']             = '请输入使用者名称';  //'Username expected';
$_['update_error_password']             = '请输入使用者密码';//'Password expected';
$_['update_error_server']               = '请输入伺服器'; //'Server expected';
$_['update_error_admindir']             = '请输入管理者资料夹位置'; //'Admin directory expected';
$_['update_okcon_noadmin']              = '连线成功，但找不到您管理者资料夹位置';//'Connection OK but your OpenCart admin directory was not found';
//$_['update_okcon_nofiles']              = 'Connection OK but OpenCart folders were not found! Is your root path correct?';
$_['update_okcon_nofiles']              = '连线成功，但找不到您Opencart资料夹位置，请检查您Opencart的的目录根';
$_['update_okcon']                      = '连线成功及已找到您Opencart的资料夹'; //'Connected to server OK. OpenCart folders found';
$_['update_failed_user']                = '使用者不能登录'; //'Could not login with that user';
$_['update_failed_connect']             = '连线错误，不能连接伺服器'; //'Could not connect to server';
$_['update_success']                    = '模組已更新至(v.%s)'; //'Module has been updated (v.%s)'; 
$_['lang_patch_notes1']                 = '阅读有关近期和过去的更新'; //'To read about the recent and past updates';
$_['lang_patch_notes2']                 =  '点击这里'; //'click here';
//$_['lang_patch_notes3']                 = "The update tool will make changes to your shop's file system. Make sure you have a backup before using this tool.";
$_['lang_patch_notes3']   				= '升級會修改您系統文件，确保您已經备份您的文件';

//Help tab
$_['lang_help_title']                   = '资讯及支援'; //'Information on help & support';
$_['lang_help_support_title']           = '支援'; //'Support';
//$_['lang_help_support_description']     = 'You should read our FAQ section to see if your question is already answered <a href="http://shop.openbaypro.com/index.php?route=information/faq" title="OpenBay Pro for OpenCart support FAQ">here</a>. <br />If you cannot find an answer then you can create a support ticket, <a href="http://support.welfordmedia.co.uk" title="OpenBay Pro for OpenCart support site">click here</a>';
$_['lang_help_support_description']     = '您应该先阅读我们的常见问题，看看有没有您的问题<a href="http://shop.openbaypro.com/index.php?route=information/faq" title="OpenBay Pro for OpenCart support FAQ">这里</a>. <br />,如果您无法找到答案，可以创建一个新档案 <a href="http://support.welfordmedia.co.uk" title="OpenBay Pro 支援网页">点击这里</a>';
$_['lang_help_template_title']          = '创建 eBay模板'; //'Creating eBay templates';
//$_['lang_help_template_description']    = 'Information for developers &amp; designers on creating custom templates for their eBay listings, <a href="http://shop.openbaypro.com/index.php?route=information/faq&topic=30" title="OpenBay Pro HTML templates for eBay">click here</a>';
$_['lang_help_template_description']    = '开发者信息&amp; 设计师为他们的eBay商品创造自定义模板, <a href="http://shop.openbaypro.com/index.php?route=information/faq&topic=30" title="OpenBay Pro HTML templates for eBay">点击这里</a>';

$_['lang_tab_help']                     = '帮助';//'Help';
$_['lang_help_guide']                   = '用户指南'; //'User guides';
$_['lang_help_guide_description']       = '下载和查看eBay和亚马逊的用户指南<a href="http://shop.openbaypro.com/index.php?route=information/faq&topic=37" title="OpenBay Pro user guides">点击这里</a>';

$_['lang_mcrypt_text_false']            = 'PHP函数“mcrypt_encrypt”未启用。请联系您的托管服务提供商';//'PHP function "mcrypt_encrypt" is not enabled. Contact your hosting provider.';
$_['lang_mb_text_false']                = 'PHP库 “mb strings”未启用。请联系您的托管服务提供商。';//'PHP library "mb strings" is not enabled. Contact your hosting provider.';
$_['lang_ftp_text_false']               = 'PHP的FTP功能未启用。请联系您的托管服务提供商'; //'PHP FTP functions are not enabled. Contact your hosting provider.';
$_['lang_error_oc_version']             = '您的Opencart的版本没有测试这个模块的工作，您可能会遇到的问题'; //'Your version of OpenCart is not tested to work with this module. You may experience problems.';
$_['lang_patch_applied']                = '应用补丁'; //'Patch applied';
$_['faqbtn']                            = '查看常见问题'; //'View FAQ';
$_['lang_clearfaq']                     = '清除隐藏常见问题'; //'Clear hidden FAQ popups';
$_['lang_clearfaqbtn']                  =  '清除'; //'Clear';

// Ajax elements
$_['lang_ajax_ebay_shipped']            = '该订单在eBay已经配运';//'The order will be marked as shipped on eBay automatically';
//$_['lang_ajax_play_shipped']            = 'The order will be marked as shipped on Play.com automatically';
$_['lang_ajax_amazoneu_shipped']        = '该订单在Amazon EU 已经配运';//'The order will be marked as shipped on Amazon EU automatically';
$_['lang_ajax_amazonus_shipped']        = '该订单在Amazon US 已经配运';//'The order will be marked as shipped on Amazon US automatically';
//$_['lang_ajax_play_refund']             = 'A refund will be issued to play.com for this order automatically';

$_['lang_ajax_refund_reason']           = '退款原因'; //'Refund reason';
$_['lang_ajax_refund_message']          = '退款信息'; //'Refund message';
$_['lang_ajax_refund_entermsg']         = '必需输入退款讯息'; //'You must enter a refund message';
$_['lang_ajax_refund_charmsg']          = '您的退信息必须少于1000个字符'; //'Your refund message must be less than 1000 characters';
$_['lang_ajax_refund_charmsg2']         = '您的信息不能包含字符>或<';//'Your message cannot contain the characters > or <';
$_['lang_ajax_courier']                 = '快递';//'Courier';  邮务员
$_['lang_ajax_courier_other']           = '其他快递'; //Other courier
$_['lang_ajax_tracking']                = '追踪號碼#'; //Tracking #
$_['lang_ajax_tracking_msg']            = '您必须输入追踪號碼，如果沒有選擇None'; //'You must enter a tracking id, use "none" if you do not have one';
$_['lang_ajax_tracking_msg2']           = '您的追踪號碼不能包含字符>或<';
$_['lang_ajax_tracking_msg3']           = '您必须选择快递，如果您想上传追踪號碼';//'You must select courier if you want to upload tracking no.';
$_['lang_ajax_tracking_msg4']           = '请您把快递留空，如果您想使用自定义快递'; //'Please leave courier field empty if you want to use custom courier.';

$_['lang_title_help']                   = '需要帮助使用OpenBay Pro?'; //与OpenBay专业Need help with OpenBay Pro?
$_['lang_pod_help']                     = '帮助';
$_['lang_title_manage']                 = '管理OpenBay Pro：更新，设定及更多'; //'Manage OpenBay Pro: updates, settings and more';
$_['lang_pod_manage']                   = '管理';
$_['lang_title_shop']                   = 'OpenBay Pro 商店: 插件，模板和更多';
$_['lang_pod_shop']                     = '商店';

$_['lang_checking_messages']            = '检查信息'; //'Checking for messages';
$_['lang_title_messages']               = '消息通知'; //'Messages &amp; notifications';
$_['lang_error_retry']          		= '无法链接到 OpenBay 服务器。 ';
?>
