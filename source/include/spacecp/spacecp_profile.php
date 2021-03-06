<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: spacecp_profile.php 33688 2013-08-02 03:00:15Z nemohou $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}
$defaultop = '';
	$profilegroup = C::t('common_setting')->fetch('profilegroup', true);
	foreach($profilegroup as $key => $value) {
		if($value['available']) {
			$defaultop = $key;
			break;
		}
	}

$operation = in_array($_GET['op'], array('base', 'contact', 'edu', 'work', 'info', 'password', 'verify')) ? trim($_GET['op']) : $defaultop;
$space = getuserbyuid($_G['uid']);
space_merge($space, 'field_home');
space_merge($space, 'profile');

list($seccodecheck, $secqaacheck) = seccheck('password');
@include_once DISCUZ_ROOT.'./data/cache/cache_domain.php';
$spacedomain = isset($rootdomain['home']) && $rootdomain['home'] ? $rootdomain['home'] : array();
//note 过滤插件ID
$_GET['id'] = $_GET['id'] ? preg_replace("/[^A-Za-z0-9_:]/", '', $_GET['id']) : '';
if($operation != 'password') {

	include_once libfile('function/profile');

	// 获取 profile setting
	loadcache('profilesetting');
	if(empty($_G['cache']['profilesetting'])) {
		require_once libfile('function/cache');
		updatecache('profilesetting');
		loadcache('profilesetting');
	}
}

// 是否允许自定义个人头衔
$allowcstatus = !empty($_G['group']['allowcstatus']) ? true : false;
$verify = C::t('common_member_verify')->fetch($_G['uid']);
$validate = array();
if($_G['setting']['regverify'] == 2 && $_G['groupid'] == 8) {
	$validate = C::t('common_member_validate')->fetch($_G['uid']);
	if(empty($validate) || $validate['status'] != 1) {
		$validate = array();
	}
}
if($_G['setting']['connect']['allow']) {
	$connect = C::t('#qqconnect#common_member_connect')->fetch($_G['uid']);
	$conisregister = $operation == 'password' && $_G['setting']['connect']['allow'] && $connect['conisregister'];
}

if(submitcheck('profilesubmit')) {// 更新用户资料

	require_once libfile('function/discuzcode');

	$forum = $setarr = $verifyarr = $errorarr = array();
	$forumfield = array('customstatus', 'sightml');

	$censor = discuz_censor::instance();

	//取认证的资料
	if($_GET['vid']) {
		$vid = intval($_GET['vid']);
		$verifyconfig = $_G['setting']['verify'][$vid];
		if($verifyconfig['available'] && (empty($verifyconfig['groupid']) || in_array($_G['groupid'], $verifyconfig['groupid']))) {
			$verifyinfo = C::t('common_member_verify_info')->fetch_by_uid_verifytype($_G['uid'], $vid);
			if(!empty($verifyinfo)) {
				$verifyinfo['field'] = dunserialize($verifyinfo['field']);
			}
			//补全需要认证的字段
			foreach($verifyconfig['field'] as $key => $field) {
				if(!isset($verifyinfo['field'][$key])) {
					$verifyinfo['field'][$key] = $key;
				}
			}
		} else {
			$_GET['vid'] = $vid = 0;
			$verifyconfig = array();
		}
	}
	//特殊处理,当有提交省级变更
	if(isset($_POST['birthprovince'])) {
		$initcity = array('birthprovince', 'birthcity', 'birthdist', 'birthcommunity');
		foreach($initcity as $key) {
			$_GET[''.$key] = $_POST[$key] = !empty($_POST[$key]) ? $_POST[$key] : '';
		}
	}
	if(isset($_POST['resideprovince'])) {
		$initcity = array('resideprovince', 'residecity', 'residedist', 'residecommunity');
		foreach($initcity as $key) {
			$_GET[''.$key] = $_POST[$key] = !empty($_POST[$key]) ? $_POST[$key] : '';
		}
	}
	foreach($_POST as $key => $value) {
		$field = $_G['cache']['profilesetting'][$key];
		// 检查敏感词
		if(in_array($field['formtype'], array('text', 'textarea')) || in_array($key, $forumfield)) {
			$censor->check($value);
			if($censor->modbanned() || $censor->modmoderated()) {
				profile_showerror($key, lang('spacecp', 'profile_censor'));
			}
		}
		if(in_array($key, $forumfield)) {// 论坛项
			if($key == 'sightml') {
				loadcache(array('smilies', 'smileytypes'));
				//截取签名长度
				$value = cutstr($value, $_G['group']['maxsigsize'], '');
				foreach($_G['cache']['smilies']['replacearray'] AS $skey => $smiley) {
					$_G['cache']['smilies']['replacearray'][$skey] = '[img]'.$_G['siteurl'].'static/image/smiley/'.$_G['cache']['smileytypes'][$_G['cache']['smilies']['typearray'][$skey]]['directory'].'/'.$smiley.'[/img]';
				}
				$value = preg_replace($_G['cache']['smilies']['searcharray'], $_G['cache']['smilies']['replacearray'], trim($value));
				$forum[$key] = discuzcode($value, 1, 0, 0, 0, $_G['group']['allowsigbbcode'], $_G['group']['allowsigimgcode'], 0, 0, 1);
			} elseif($key=='customstatus' && $allowcstatus) {// 个人头衔
				$forum[$key] = dhtmlspecialchars(trim($value));
			}
			continue;
		} elseif($field && !$field['available']) {//未启用的资料项
			continue;
		} elseif($key == 'timeoffset') {
			if($value >= -12 && $value <= 12 || $value == 9999) {
				C::t('common_member')->update($_G['uid'], array('timeoffset' => intval($value)));
			}
		} elseif($key == 'site') {
			if(!in_array(strtolower(substr($value, 0, 6)), array('http:/', 'https:', 'ftp://', 'rtsp:/', 'mms://')) && !preg_match('/^static\//', $value) && !preg_match('/^data\//', $value)) {
				$value = 'http://'.$value;
			}
		}
		//处理file类型的字段
		if($field['formtype'] == 'file') {
			if((!empty($_FILES[$key]) && $_FILES[$key]['error'] == 0) || (!empty($space[$key]) && empty($_GET['deletefile'][$key]))) {
				$value = '1';
			} else {
				$value = '';
			}
		}
		if(empty($field)) {//非资料项数据
			continue;
		} elseif(profile_check($key, $value, $space)) {//有效数据
			$setarr[$key] = dhtmlspecialchars(trim($value));
		} else {// 有误
			if($key=='birthprovince') {
				$key = 'birthcity';
			} elseif($key=='resideprovince' || $key=='residecommunity'||$key=='residedist') {
				$key = 'residecity';
			} elseif($key=='birthyear' || $key=='birthmonth') {
				$key = 'birthday';
			}
			profile_showerror($key);
		}
		//删除文件类型的内容
		if($field['formtype'] == 'file') {
			unset($setarr[$key]);
		}
		//判断是否为认证数据
		if($vid && $verifyconfig['available'] && isset($verifyconfig['field'][$key])) {
			if(isset($verifyinfo['field'][$key]) && $setarr[$key] !== $space[$key]) {
				$verifyarr[$key] = $setarr[$key];
			}
			unset($setarr[$key]);
		}
		// 该项合法但需要审核
		if(isset($setarr[$key]) && $_G['cache']['profilesetting'][$key]['needverify']) {
			if($setarr[$key] !== $space[$key]) {
				$verifyarr[$key] = $setarr[$key];
			}
			unset($setarr[$key]);
		}
	}
	//note 删除图片
	if($_GET['deletefile'] && is_array($_GET['deletefile'])) {
		foreach($_GET['deletefile'] as $key => $value) {
			if(isset($_G['cache']['profilesetting'][$key])) {
				@unlink(getglobal('setting/attachdir').'./profile/'.$space[$key]);
				@unlink(getglobal('setting/attachdir').'./profile/'.$verifyinfo['field'][$key]);
				$verifyarr[$key] = $setarr[$key] = '';
			}
		}
	}
	if($_FILES) {
		$upload = new discuz_upload();
		foreach($_FILES as $key => $file) {
			if(!isset($_G['cache']['profilesetting'][$key])) {
				continue;
			}
			$field = $_G['cache']['profilesetting'][$key];
			if((!empty($file) && $file['error'] == 0) || (!empty($space[$key]) && empty($_GET['deletefile'][$key]))) {
				$value = '1';
			} else {
				$value = '';
			}
			if(!profile_check($key, $value, $space)) {
				profile_showerror($key);
			} elseif($field['size'] && $field['size']*1024 < $file['size']) {
				profile_showerror($key, lang('spacecp', 'filesize_lessthan').$field['size'].'KB');
			}
			$upload->init($file, 'profile');
			$attach = $upload->attach;

			if(!$upload->error()) {
				$upload->save();

				//验证写入的文件是否是图片，不是删除
				if(!$upload->get_image_info($attach['target'])) {
					@unlink($attach['target']);
					continue;
				}
				$setarr[$key] = '';
				$attach['attachment'] = dhtmlspecialchars(trim($attach['attachment']));
				//判断是否为认证数据
				if($vid && $verifyconfig['available'] && isset($verifyconfig['field'][$key])) {
					if(isset($verifyinfo['field'][$key])) {
						@unlink(getglobal('setting/attachdir').'./profile/'.$verifyinfo['field'][$key]);
						$verifyarr[$key] = $attach['attachment'];
					}
					continue;
				}
				// 该项合法但需要审核
				if(isset($setarr[$key]) && $_G['cache']['profilesetting'][$key]['needverify']) {
					@unlink(getglobal('setting/attachdir').'./profile/'.$verifyinfo['field'][$key]);
					$verifyarr[$key] = $attach['attachment'];
					continue;
				}
				//删除原图片
				@unlink(getglobal('setting/attachdir').'./profile/'.$space[$key]);
				$setarr[$key] = $attach['attachment'];
			}

		}
	}
	//如果图片保持默认，将值复制回审核资料中
	if($vid && !empty($verifyinfo['field']) && is_array($verifyinfo['field'])) {
		foreach($verifyinfo['field'] as $key => $fvalue) {
			//踢除不需不认证的数据
			if(!isset($verifyconfig['field'][$key])) {
				unset($verifyinfo['field'][$key]);
				continue;
			}
			if(empty($verifyarr[$key]) && !isset($verifyarr[$key]) && isset($verifyinfo['field'][$key])) {
				$verifyarr[$key] = !empty($fvalue) && $key != $fvalue ? $fvalue : $space[$key];
			}
		}
	}
	if($forum) {
		//关闭签名清空签名内容
		if(!$_G['group']['maxsigsize']) {
			$forum['sightml'] = '';
		}
		C::t('common_member_field_forum')->update($_G['uid'], $forum);

	}

	if(isset($_POST['birthmonth']) && ($space['birthmonth'] != $_POST['birthmonth'] || $space['birthday'] != $_POST['birthday'])) {
		$setarr['constellation'] = get_constellation($_POST['birthmonth'], $_POST['birthday']);
	}
	if(isset($_POST['birthyear']) && $space['birthyear'] != $_POST['birthyear']) {
		$setarr['zodiac'] = get_zodiac($_POST['birthyear']);
	}
	// 直接修改
	if($setarr) {
		C::t('common_member_profile')->update($_G['uid'], $setarr);
	}

	// 需要审核的字段
	if($verifyarr) {
		C::t('common_member_verify_info')->delete_by_uid($_G['uid'], $vid);
		$setverify = array(
				'uid' => $_G['uid'],
				'username' => $_G['username'],
				'verifytype' => $vid,
				'field' => serialize($verifyarr),
				'dateline' => $_G['timestamp']
			);

		C::t('common_member_verify_info')->insert($setverify);
		if(!(C::t('common_member_verify')->count_by_uid($_G['uid']))) {
			C::t('common_member_verify')->insert(array('uid' => $_G['uid']));
		}
		if($_G['setting']['verify'][$vid]['available']) {
			manage_addnotify('verify_'.$vid, 0, array('langkey' => 'manage_verify_field', 'verifyname' => $_G['setting']['verify'][$vid]['title'], 'doid' => $vid));
		}
	}

	if(isset($_POST['privacy'])) {
		foreach($_POST['privacy'] as $key=>$value) {
			if(isset($_G['cache']['profilesetting'][$key])) {
				$space['privacy']['profile'][$key] = intval($value);
			}
		}
		C::t('common_member_field_home')->update($space['uid'], array('privacy'=>serialize($space['privacy'])));
	}

	//变更记录
	manyoulog('user', $_G['uid'], 'update');

	// 资料更新feed
	include_once libfile('function/feed');
	feed_add('profile', 'feed_profile_update_'.$operation, array('hash_data'=>'profile'));
	countprofileprogress();
	$message = $vid ? lang('spacecp', 'profile_verify_verifying', array('verify' => $verifyconfig['title'])) : '';
	profile_showsuccess($message);

} elseif(submitcheck('passwordsubmit', 0, $seccodecheck, $secqaacheck)) {

	$membersql = $memberfieldsql = $authstradd1 = $authstradd2 = $newpasswdadd = '';
	$setarr = array();
	$emailnew = dhtmlspecialchars($_GET['emailnew']);
	$ignorepassword = 0;
	if($_G['setting']['connect']['allow']) {
		$connect = C::t('#qqconnect#common_member_connect')->fetch($_G['uid']);
		if($connect['conisregister']) {
			$_GET['oldpassword'] = '';
			$ignorepassword = 1;
			if(empty($_GET['newpassword'])) {
				showmessage('profile_passwd_empty');
			}
		}
	}

	if($_GET['questionidnew'] === '') {
		$_GET['questionidnew'] = $_GET['answernew'] = '';
	} else {
		$secquesnew = $_GET['questionidnew'] > 0 ? random(8) : '';
	}

	if(!empty($_GET['newpassword']) && $_G['setting']['strongpw']) {
		$strongpw_str = array();
		if(in_array(1, $_G['setting']['strongpw']) && !preg_match("/\d+/", $_GET['newpassword'])) {
			$strongpw_str[] = lang('member/template', 'strongpw_1');
		}
		if(in_array(2, $_G['setting']['strongpw']) && !preg_match("/[a-z]+/", $_GET['newpassword'])) {
			$strongpw_str[] = lang('member/template', 'strongpw_2');
		}
		if(in_array(3, $_G['setting']['strongpw']) && !preg_match("/[A-Z]+/", $_GET['newpassword'])) {
			$strongpw_str[] = lang('member/template', 'strongpw_3');
		}
		if(in_array(4, $_G['setting']['strongpw']) && !preg_match("/[^a-zA-z0-9]+/", $_GET['newpassword'])) {
			$strongpw_str[] = lang('member/template', 'strongpw_4');
		}
		if($strongpw_str) {
			showmessage(lang('member/template', 'password_weak').implode(',', $strongpw_str));
		}
	}
	if(!empty($_GET['newpassword']) && $_GET['newpassword'] != addslashes($_GET['newpassword'])) {
		showmessage('profile_passwd_illegal', '', array(), array('return' => true));
	}
	if(!empty($_GET['newpassword']) && $_GET['newpassword'] != $_GET['newpassword2']) {
		showmessage('profile_passwd_notmatch', '', array(), array('return' => true));
	}

	loaducenter();
	if($emailnew != $_G['member']['email']) {
		include_once libfile('function/member');
		checkemail($emailnew);
	}
	$ucresult = uc_user_edit(addslashes($_G['username']), $_GET['oldpassword'], $_GET['newpassword'], '', $ignorepassword, $_GET['questionidnew'], $_GET['answernew']);
	if($ucresult == -1) {
		showmessage('profile_passwd_wrong', '', array(), array('return' => true));
	} elseif($ucresult == -4) {
		showmessage('profile_email_illegal', '', array(), array('return' => true));
	} elseif($ucresult == -5) {
		showmessage('profile_email_domain_illegal', '', array(), array('return' => true));
	} elseif($ucresult == -6) {
		showmessage('profile_email_duplicate', '', array(), array('return' => true));
	}

	if(!empty($_GET['newpassword']) || $secquesnew) {
		$setarr['password'] = md5(random(10));
	}
	if($_G['setting']['connect']['allow']) {
		C::t('#qqconnect#common_member_connect')->update($_G['uid'], array('conisregister' => 0));
	}

	$authstr = false;
	if($emailnew != $_G['member']['email']) {
		$authstr = true;
		emailcheck_send($space['uid'], $emailnew);
		dsetcookie('newemail', "$space[uid]\t$emailnew\t$_G[timestamp]", 31536000);
	}
	if($setarr) {
		if($_G['member']['freeze'] == 1) {
			$setarr['freeze'] = 0;
		}
		C::t('common_member')->update($_G['uid'], $setarr);
	}
	if($_G['member']['freeze'] == 2) {
		C::t('common_member_validate')->update($_G['uid'], array('message' => dhtmlspecialchars($_G['gp_freezereson'])));
	}

	if($authstr) {
		showmessage('profile_email_verify', 'home.php?mod=spacecp&ac=profile&op=password');
	} else {
		showmessage('profile_succeed', 'home.php?mod=spacecp&ac=profile&op=password');
	}
}

if($operation == 'password') {

	$resend = getcookie('resendemail');
	$resend = empty($resend) ? true : (TIMESTAMP - $resend) > 300;
	$newemail = getcookie('newemail');
	$space['newemail'] = !$space['emailstatus'] ? $space['email'] : '';
	if(!empty($newemail)) {
		$mailinfo = explode("\t", $newemail);
		$space['newemail'] = $mailinfo[0] == $_G['uid'] && isemail($mailinfo[1]) ? $mailinfo[1] : '';
	}

	if($_GET['resend'] && $resend) {
		//重新发送邮箱验证
		$toemail = $space['newemail'] ? $space['newemail'] : $space['email'];
		emailcheck_send($space['uid'], $toemail);
		dsetcookie('newemail', "$space[uid]\t$toemail\t$_G[timestamp]", 31536000);
		dsetcookie('resendemail', TIMESTAMP);
		showmessage('send_activate_mail_succeed', "home.php?mod=spacecp&ac=profile&op=password");
	} elseif ($_GET['resend']) {
		showmessage('send_activate_mail_error', "home.php?mod=spacecp&ac=profile&op=password");
	}
	if(!empty($space['newemail'])) {
		$acitvemessage = lang('spacecp', 'email_acitve_message', array('newemail' => $space['newemail'], 'imgdir' => $_G['style']['imgdir']));
	}
	$actives = array('password' =>' class="a"');
	$navtitle = lang('core', 'title_password_security');
	if($_G['member']['freeze'] == 2) {
		$fzvalidate = C::t('common_member_validate')->fetch($space['uid']);
		$space['freezereson'] = $fzvalidate['message'];
	}

} else {

	space_merge($space, 'field_home');
	space_merge($space, 'field_forum');

	require_once libfile('function/editor');
	$space['sightml'] = html2bbcode($space['sightml']);

	$vid = $_GET['vid'] ? intval($_GET['vid']) : 0;

	// 隐私
	$privacy = $space['privacy']['profile'] ? $space['privacy']['profile'] : array();
	$_G['setting']['privacy'] = $_G['setting']['privacy'] ? $_G['setting']['privacy'] : array();
	$_G['setting']['privacy'] = is_array($_G['setting']['privacy']) ? $_G['setting']['privacy'] : dunserialize($_G['setting']['privacy']);
	$_G['setting']['privacy']['profile'] = !empty($_G['setting']['privacy']['profile']) ? $_G['setting']['privacy']['profile'] : array();
	$privacy = array_merge($_G['setting']['privacy']['profile'], $privacy);

	$actives = array('profile' =>' class="a"');
	$opactives = array($operation =>' class="a"');
	//归类选项
	$allowitems = array();
	if(in_array($operation, array('base', 'contact', 'edu', 'work', 'info'))) {
		$allowitems = $profilegroup[$operation]['field'];
	} elseif($operation == 'verify') {
		//如果为空默认取一个
		if($vid == 0) {
			foreach($_G['setting']['verify'] as $key => $setting) {
				if($setting['available'] && (empty($setting['groupid']) || in_array($_G['groupid'], $setting['groupid']))) {
					$_GET['vid'] = $vid = $key;
					break;
				}
			}
		}

		if(empty($_G['setting']['verify'][$vid]['groupid']) || in_array($_G['groupid'], $_G['setting']['verify'][$vid]['groupid'])) {
			$actives = array('verify' =>' class="a"');
			$opactives = array($operation.$vid =>' class="a"');
			$allowitems = $_G['setting']['verify'][$vid]['field'];
		}
	}
	$showbtn = ($vid && $verify['verify'.$vid] != 1) || empty($vid);
	//取出认证通过的资料，禁止修改
	if(!empty($verify) && is_array($verify)) {
		foreach($verify as $key => $flag) {
			if(in_array($key, array('verify1', 'verify2', 'verify3', 'verify4', 'verify5', 'verify6', 'verify7')) && $flag == 1) {
				$verifyid = intval(substr($key, -1, 1));
				//关闭认证允许修改
				if($_G['setting']['verify'][$verifyid]['available']) {
					foreach($_G['setting']['verify'][$verifyid]['field'] as $field) {
						$_G['cache']['profilesetting'][$field]['unchangeable'] = 1;
					}
				}
			}
		}
	}
	//如果是认证页面直接显示提交的值
	if($vid) {
		if($value = C::t('common_member_verify_info')->fetch_by_uid_verifytype($_G['uid'], $vid)) {
			$field = dunserialize($value['field']);
			foreach($field as $key => $fvalue) {
				$space[$key] = $fvalue;
			}
		}
	}
	$htmls = $settings = array();
	foreach($allowitems as $fieldid) {
		if(!in_array($fieldid, array('sightml', 'customstatus', 'timeoffset'))) {
			$html = profile_setting($fieldid, $space, $vid ? false : true);
			if($html) {
				$settings[$fieldid] = $_G['cache']['profilesetting'][$fieldid];
				$htmls[$fieldid] = $html;
			}
		}
	}

}

include template("home/spacecp_profile");

function profile_showerror($key, $extrainfo) {
	echo '<script>';
	echo 'parent.show_error("'.$key.'", "'.$extrainfo.'");';
	echo '</script>';
	exit();
}

function profile_showsuccess($message = '') {
	echo '<script type="text/javascript">';
	echo "parent.show_success('$message');";
	echo '</script>';
	exit();
}

?>