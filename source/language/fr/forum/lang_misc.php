<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_misc.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'discuz_lang'		=> 'Divers',  //  'misc'
	'contact'		=> 'Contact:',  //  'Contact:'
	'anonymous'		=> 'Anonyme',  //   'Anoymous'
	'anonymoususer'		=> 'Anonyme',  //   'Anonymous'
	'guestuser'		=> 'Invit&#233;s',  //  'Guest'
	'has_expired'		=> 'Cette information a expir&#233;',  //  'This information has expired'
	'click_view'		=> 'Cliquez pour voir',  //  'Click to view'
	'never_expired'		=> 'Illimit&#233;',  // 'Unlimited' 
	'sort_update'		=> 'Mise &#224; jour',  //  'Update'
	'sort_upload'		=> 'T&#233;l&#233;chargez',  //  'Upload'
	'view_noperm'		=> 'Contenu cach&#233;',  //  'Hidden content'
	'post_hidden'		=> '**** Cach&#233; par Auteur ****',  //  '**** Hidden by author ****'
	'post_banned'		=> '**** Auteur est interdit ou supprim&#233; ****',  //   '**** Author has been banned or deleted ****'
	'post_single_banned'	=> '**** Ce post est interdit ou bannit ****',  //  '**** This post has been banned ****'
	'message_ishidden_hiddenreplies'	=> 'Ce post ne ??s\'affiche qu\'&#224; l\'Auteur du sujet',  // 'This post is only shown to author of the thread' 
	'post_reply_quote'	=> '{author} a post&#233; en {time}',  //  '{author} posted on {time}'
	'post_edit'		=> "[i=s] Derni&#232;re &#233;dition par {editor} sur {edittime} [/i]\n\n",  //  '[i=s] Last edited by {editor} on {edittime} [/i]\n\n'
	'post_edit_regexp'	=> '/^\[i=s\] Derni&#232;re &#233;dition par .*? sur .*? \[\/i\]\n\n/s',  //  '/^\[i=s\] Last edited by .*? on .*? \[\/i\]\n\n/s'
	'post_edithtml'		=> '[i=s] Ce post a &#233;t&#233; &#233;dit&#233; par {editor} sur {edittime} [/i]<br /><br />',  //  '[i=s] This post was edited by {editor} on {edittime} [/i]<br /><br />'
	'post_edithtml_regexp'	=> '/^\[i=s\] Ce post a &#233;t&#233; &#233;dit&#233; par .*? sur .*? \[\/i\]&lt;br \/&gt;&lt;br \/&gt;/s',  //  '/^\[i=s\] This post was edited by .*? on .*? \[\/i\]&lt;br \/&gt;&lt;br \/&gt;/s'
	'post_editnobbcode'	=> '[Derni&#232;re &#233;dition par {editor} sur {edittime}]\n\n',  //  '[Last edited by {editor} on {edittime}]\n\n'
	'post_editnobbcode_regexp'	=> '/^\[Derni&#232;re &#233;dition par .*? sur .*?\]\n\n/s',  // '/^\[Last edited by .*? on .*?\]\n\n/s' 
	'post_reply'		=> 'R&#233;ponse',  //  'Reply'
	'post_thread'		=> '\'s sujet', // "'s thread"

	'price'			=> 'Prix',  //  'Price'
	'pay_view'		=> 'Enregistrement',  //  'Record'  //销售记录
	'attachment_buy'	=> 'Acheter',  //  'Buy'

	'post_trade_yuan'	=> '$',  //  '$'
	'post_trade_seller'	=> 'Vendeur',  //  'Seller'
	'post_trade_name'	=> 'Nom Article',  //  'Item Name'
	'post_trade_price'	=> 'Prix',  //  'Price'
	'post_trade_quality'	=> 'Etat de l\'article',  //  'Item condition'
	'post_trade_locus'	=> 'Emplacement Article',  //  'Item location'
	'post_trade_transport_type'	=> 'Frais de port pay&#233;s par',  // 'Shipping fee paid by' //Modify
	'post_trade_transport_seller'	=> 'Vendeur',  //  'Seller'
	'post_trade_transport_buyer'	=> 'Acheteur',  //  'Buyer'
	'post_trade_transport_mail'	=> 'Mail',  //  'Mail'
	'post_trade_transport_express'	=> 'Express',  //  'Express'
	'post_trade_transport_virtual'	=> 'Virtuel',  // 'Virtual' 
	'post_trade_transport_physical'	=> 'comptant sur la livraison',  // 'C.O.D.' //cash on delivery
//	'post_trade_locus'		=> 'Emplacement Article',  //  'Item location'
	'post_trade_description'	=> 'Description',  //  'Description'
	'post_trade_pm_subject'		=> '[N&#233;gociation]',  //  '[Bargain]'
	'post_trade_pm_buynum'		=> 'Quantit&#233;',  //  'Quantity'
	'post_trade_pm_wishprice'	=> 'Prix d&#233;sirez',  //  'Wish Price'
	'post_trade_pm_reason'		=> 'Raison',  //  'Reason'
	'postappend_content'		=> 'Contenu suppl&#233;mentaire',  //  'Additional Content'
	'payment_unit'			=> '€',  //  '€'

	'attach'		=> 'Pi&#232;ce jointe',  //  'Attachment'
	'attach_pay'		=> 'Pi&#232;ce Jointe Ventes',  //  'Sales Attachment' //Modify
	'attach_credits_policy'	=> 'Points de vue Politique',  //  'View points policy'
	'attach_img'		=> 'Image Pi&#232;ce Jointe',  // 'Image Attachment' 
	'attach_readperm'	=> 'Permission de lecture',  //  'Read Permission'
	'attach_img_zoom'	=> 'Cliquez et ouvrir de nouvelles fen&#234;tres\\nCTRL+Utilisez la molette de la souris pour zoomer/d&#233;zoomer',  //  'Click and open in new windows\\nCTRL+Use mouse wheel to zoom in/out'
	'attach_img_thumb'	=> 'Cliquez pour voir en taille r&#233;elle l\'image dans une nouvelle fen&#234;tre',  //  'Click to view full size of image in new window'
	'attach_downloads'	=> 'T&#233;l&#233;chargements',  //  'Downloads'

	'post_trade_transport'		=> 'Frais d\'exp&#233;dition',  //   'Shipping fee'
//vot	'post_trade_transport_mail'	=> 'Mail',  //  'Mail'
	'post_trade_quality'		=> 'Etat de l\'article',  // 'Item condition'  //Modify
	'post_trade_quality_new'	=> 'Nouveau',  //  'New'
	'post_trade_quality_secondhand'	=> 'Seconde main',  //  'Secondhand'

	'trade_unstart'			=> '<font color="gray">En attente pour le processus</font>',  //  '<font color="gray">Waiting for process</font>'
	'trade_waitbuyerpay'		=> 'En attente l\'acheteur pour payer',  //  'Waitting buyer to pay'
	'trade_waitsellerconfirm'	=> 'Vendeur En attente de confirmation',  //  'Waiting seller to confirm'
	'trade_sysconfirmpay'		=> 'Syst&#232;me attente de confirmation, Svp. ne pas envoyer de marchandises maintenant',  //  'Waitting system to confirm, please do not send goods now'
	'trade_waitsellersend'		=> 'Vendeur en attente d\'envoyer des marchandises',  //  'waiting seller to send goods'
	'trade_waitbuyerconfirm'	=> 'Vendeur en attente de confirmation',  // 'Waiting seller to confirm' 
	'trade_syspayseller'		=> 'En attente Alipay pour payer le vendeur',  // 'Waitting alipay to pay the seller' 
	'trade_finished'		=> '<font color="green">Commerce termin&#233; avec Succ&#232;s</font>',  //  '<font color="green">Trade successfully completed</font>'
	'trade_closed'			=> '<font color="gray">Commerce ferm&#233; (inachev&#233;)</font>',  // '<font color="gray">Trade closed(uncompleted)</font>' 
	'trade_waitselleragree'		=> 'En attente pour le vendeur d\'approuver la restitution',  //  'Waitting for seller to approve refund'
	'trade_sellerrefusebuyer'	=> 'Le vendeur refuse, l\'acheteur attend de modifier les conditions',  //  'Seller refused, waitting buyer to change the conditions'
	'trade_waitbuyerreturn'		=> 'Le vendeur a approuv&#233; la restitution d\'attente pour l\'acheteur de retourner les marchandises',  //  'Seller approved refund, waitting for buyer to return goods' 
	'trade_waitsellerconfirmgoods'	=> 'En attente l\'acheteur pour confirmer',  //  'Waitting buyer to confirm'
	'trade_waitalipayrefund'	=> 'En attente au remboursement alipay',  // 'Waitting alipay to refund' 
	'trade_alipaycheck'		=> 'Processus d\'Alipay En attente',  //  'Waitting alipay process'
	'trade_overedrefund'		=> 'plus de restitution ',  //  'Overed refund '
	'trade_refundsuccess'		=> '<font color="green">Remboursement avec Succ&#232;s </font>',  //  '<font color="green">Successfully refunded</font>'
	'trade_refundclosed'		=> '<font color="green">Remboursement ferm&#233;</font>',  //  '<font color="green">Refund closed</font>'

	'trade_offline_1'	=> 'Effectif de la transaction.',  //  'Effective transaction.'
	'trade_offline_4'	=> 'Pay&#233; et en attente de livraison de la marchandise',  //  'Paid and waiting goods delivery'
	'trade_offline_5'	=> 'A livr&#233;',  //  'Delivered'
	'trade_offline_7'	=> 'A recu, l\'&#233;change est compl&#233;t&#233;.',  //  'Received, trade completed.'
	'trade_offline_8'	=> 'Annuler ces &#233;changes',  //  'Cancel this trade'
	'trade_offline_10'	=> 'Je veux retourner, en attendant que le vendeur s\'engage &#224; rembourser.',  //  'I want to return, waiting for the sellers agreed to refund.'
	'trade_offline_11'	=> 'Le vendeur a refus&#233; de rembourser',  //  'Seller refused to refund'
	'trade_offline_12'	=> 'Le vendeur a accept&#233; de rembourser',  //  'Seller agreed to refund'
	'trade_offline_13'	=> 'A retourn&#233;, le vendeur en attente pour recevoir des marchandises',  //  'Returned, waiting seller to receive goods'
	'trade_offline_17'	=> 'Vendeurs ont recu les retours, rembours&#233;s.',  //  'Sellers received returns, refunded.'

	'trade_message_4'	=> 'Vous pouvez entrer les paiements et les informations de compte bancaire',  // 'You can enter payments and bank account information' 
	'trade_message_5'	=> 'Vous pouvez entrer les livraisons, les factures et autres informations',  // 'You can enter shipments, invoices, and other information'  
	'trade_message_13'	=> 'Vous pouvez entrer les livraisons, les factures et autres informations',  //  'You can enter shipments, invoices, and other information'

	'credit_payment'	=> 'Approvisionner',  // 'Add Funds' 
	'credit_forum_payment'	=> 'Approvisionner',  //  'Add Funds'
	'credit_forum_royalty'	=> 'Taxes TTC',  //  'Tax fee'
	
	'credit_total'			=> 'Total Points',//'总积分',

	'invite_payment'	=> 'Acheter un code d\'invitation',  //  'Buy an invitation code'
	'invite_forum_payment'	=> 'Acheter un code d\'invitation',  // 'Buy an invitation code' 
	'invite_forum_payment_unit'	=> '$',  //  '$'
	'invite_forum_royalty'		=> 'Frais de Transaction',  //  'Transaction fees'

	'formulaperm_regdate'		=> 'Inscrit',  //  'Joined'
	'formulaperm_regday'		=> 'Inscrit en jours',  //  'Joined days'
	'formulaperm_regip'		=> 'Reg IP',  //  'Reg IP'
	'formulaperm_lastip'		=> 'Dernier IP',  //  'Last IP'
	'formulaperm_buyercredit'	=> 'Cr&#233;dit Acheteur',  //  'Buyer credit'
	'formulaperm_sellercredit'	=> 'Cr&#233;dit du Vendeur',  // 'Seller credit' 
	'formulaperm_digestposts'	=> 'R&#233;sum&#233;s',  //  'Digests'
	'formulaperm_posts'		=> 'Posts',  // 'Posts' 
	'formulaperm_threads'		=> 'Sujets',  //  'Threads'
	'formulaperm_oltime'		=> 'temps en ligne (heure)',  //  'Online time(hour)'
	'formulaperm_pageviews'		=> 'Page vues',  // 'Page views' 
	'formulaperm_and'		=> 'et',  //  'and'
	'formulaperm_or'		=> 'ou',  //  'or'
	'formulaperm_extcredits'	=> 'Personnalisation points',  //  'Customize points'

	'login_normal_mode'		=> 'En-Ligne',  // 'Online' 
	'login_switch_invisible_mode'	=> 'Statut Changer',  //  'Switch status'
	'login_switch_normal_mode'	=> 'Statut Changer',  //  'Switch status'
	'login_invisible_mode'		=> 'Invisible',  //  'Hidden'

	'eccredit_explain'	=> 'Expliquez',  //  'Explain'

	'google_site_0'		=> 'Rechercher web',  // 'Search web' 
	'google_site_1'		=> 'Rechercher site',  //  'Search site'
	'google_sa'		=> 'Rechercher',  //  'Search'

	'modcp_logs_action_home'	=> 'Message Interne',  //  'Inner Message'
	'modcp_logs_action_moderate'	=> 'Mod&#233;r&#233;',  //  'Moderate'
	'modcp_logs_action_member'	=> 'Gestion Utilisateurs',  //  'Manage users'
	'modcp_logs_action_forumaccess'	=> 'Utilisateur permission',  //  'User permission'
	'modcp_logs_action_thread'	=> 'Gestion sujets',  //  'Manage threads'
	'modcp_logs_action_forum'	=> 'Gestion forums',  // 'Manage forums' 
	'modcp_logs_action_announcement'	=> 'Annonce',  //  'Announcement'
	'modcp_logs_action_log'		=> 'Gestion journaux',  //  'Manage logs'
	'modcp_logs_action_stat'	=> 'Gestion statistiques',  //  'Manag statistics'

	'modcp_logs_action_login'	=> 'Connexion',  //  'Login'

	'uch_selectalbum'	=> 'Svp. choisissez un album',  //  'Please select an album'
	'uch_noalbum'		=> 'Vous n\'avez pas eu tout l\'album, ', // "You didn't have any album, "
	'click_here'		=> 'cliquez ici',  //  'click here'
	'uch_createalbum'	=> ' afin de cr&#233;er un!',  //  ' to create one!'

	'pm_from'	=> 'Vers',  //  'From'
	'pm_to'		=> 'De',  // 'To' 
	'pm_date'	=> 'Date',  // 'Date' 

	'share_message'	=> 'Salut!J\'ai vu ce sujet dans le {$_G[setting][bbname]},Je pense qu\'il est utile, alors je le recommande &#224; votre disposition. \\n\\n$thread[subject]\\nAdresse: [url={$threadurl}]{$threadurl}[/url]\\n\\nEsp&#233;rons qu\'il vous plaira.',  // 'Hello!I saw this thread in {$_G[setting][bbname]},I think it is valuable,so I recommend it to you. \\n\\n$thread[subject]\\nAddress: [url={$threadurl}]{$threadurl}[/url]\\n\\nHope you like it.' 

	'week_0'	=> 'Dim',  //  'Sun' 
	'week_1'	=> 'Lun',  //  'Mon'
	'week_2'	=> 'Mar',  //  'Tue'
	'week_3'	=> 'Mer',  //  'Wed' 
	'week_4'	=> 'Jeu',  //  'Thu'
	'week_5'	=> 'Ven',  //  'Fri'
	'week_6'	=> 'Sam',  //  'Sat'

	'notice_actor'	=> ' and so on. Total $actorcount personne(s)',  //  'and so on. Total $actorcount person(s)'

	'perms_allowvisit'	=> 'Acc&#232;s Forum',  //  'Access forum'
	'perms_readaccess'	=> 'R.P.',  //  'R.P.'
	'perms_allowviewpro'	=> 'Voir utilisateur\'s profil',  // "View user\'s profile",
	'perms_allowinvisible'	=> 'Cach&#233;',  // 'Hidden' 
	'perms_allowsearch'	=> 'Recherche',  //  'Search'
	'perms_allownickname'	=> 'Pseudo',  //  'Nick name'
	'perms_allowcstatus'	=> 'Personnalisez statut',  // 'Customize status' 
	'perms_allowpost'	=> 'Sujets',  // 'Threads' 
	'perms_allowreply'	=> 'Poster r&#233;ponses',  // 'Post replies' 
	'perms_allowpostpoll'	=> 'Sondage',  //  'Poll'
	'perms_allowvote'	=> 'Vote',  //  'Vote'
	'perms_allowpostreward'	=> 'R&#233;compense',  // 'Reward' 
	'perms_allowpostactivity'	=> 'Activit&#233;',  //  'Activity'
	'perms_allowpostdebate'		=> 'D&#233;bat',  //  'Debate'
	'perms_allowposttrade'		=> 'Commerce',  //  'Trade'
	'perms_maxsigsize'		=> 'Max longueur de la signature',  //  'Max length of signature'
	'perms_allowsigbbcode'		=> 'Utiliser BBCode dans la signature',  //  'Use BBCode in signature'
	'perms_allowsigimgcode'		=> 'Utiliser [img] dans la signature',  //  'Use [img] in signature'
	'perms_maxbiosize'		=> 'Max length of self-introduction',  //  'Max length of self-introduction'
	'perms_allowrecommend'		=> 'Recommended Topics',  // 'Recommended Topics' //Modify
	'perms_allowbiobbcode'		=> 'Utiliser BBCode',  //  'Use BBCode'
	'perms_allowbioimgcode'		=> 'Utiliser [img] code',  //  'Use [img] code'
	'perms_allowgetattach'		=> 'Bas/Voir pi&#232;ces jointe',  //  'Down/View attachs'
	'perms_allowgetimage'		=> 'Voir image',  //  'View image'
	'perms_allowpostattach'		=> 'T&#233;l&#233;chargez des pi&#232;ces jointes',  //  'Upload attachments'
	'perms_allowpostimage'		=> 'T&#233;l&#233;chargez image post',  // 'Upload post image' 
	'perms_allowsetattachperm'	=> 'Autorisations Pi&#232;ce jointe',  //  'Attachment permissions'
	'perms_maxspacesize'		=> 'Taille Espace',  //  'Space size'
	'perms_maxattachsize'		=> 'Taille max. de chacun',  //  'Max size each one'
	'perms_maxsizeperday'		=> 'Taille totale par jour',  //  'Total size per day'
	'perms_maxattachnum'		=> 'Montant total par jour',  //  'Total amount per day'
//	'perms_allowbioimgcode'		=> 'Utiliser [img] dans l\'auto-pr&#233;sentation',  //  'Use [img] in self-introduction'
	'perms_attachextensions'	=> 'Types de pi&#232;ces jointes',  //  'Attachment types'
	'perms_allowstickthread'	=> 'Scotch&#233;',  //  'Stick'
	'perms_allowdigestthread'	=> 'R&#233;sum&#233;',  //  'Digest'
	'perms_allowstickthread_value'	=> 'Scotch',  //  'Stick'
	'perms_allowdigestthread_value'	=> 'R&#233;sum&#233;',  // 'Digest' 
	'perms_allowbumpthread'		=> 'Choc',  // 'Bump' 
	'perms_allowhighlightthread'	=> 'Souligner',  // 'Hightlight' 
	'perms_allowrecommendthread'	=> 'Recommander',  // 'Recommend' 
	'perms_allowstampthread'	=> 'Evaluer',  //  'Evaluate'
	'perms_allowclosethread'	=> 'Fermer',  //  'Close'
	'perms_allowmovethread'		=> 'D&#233;placez',  // 'Move' 
	'perms_allowedittypethread'	=> 'Modifier type de sujet',  //  'Edit thread type'
	'perms_allowcopythread'		=> 'Copier',  //  'Copy'
	'perms_allowmergethread'	=> 'Fusionner',  //  'Merge'
	'perms_allowsplitthread'	=> 'Couper',  // 'Split' 
	'perms_allowrepairthread'	=> 'R&#233;paration',  // 'Repair' 
	'perms_allowrefund'		=> 'Remboursement en vigueur',  //  'Force refund' //Modify
	'perms_alloweditpoll'		=> 'Modifier sondages',  // 'Edit polls' 
	'perms_allowremovereward'	=> 'Retirer r&#233;compense',  //  'Remove reward'
	'perms_alloweditactivity'	=> 'Gestion activit&#233;s',  //  'Manage activities'
	'perms_allowedittrade'		=> 'Gestion Commerces',  //  'Manage trades'
	'perms_alloweditpost'		=> 'Modifier posts',  //  'Edit posts'
	'perms_allowwarnpost'		=> 'Alertes posts',  // 'Warn posts' 
	'perms_allowbanpost'		=> 'Ban posts',  //  'Ban posts'
	'perms_allowdelpost'		=> 'Supprimer posts',  //  'Delete posts'
	'perms_allowviewreport'		=> 'Voir les Rapports Utilisateurs',  //  'View user reports'
	'perms_allowmodpost'		=> 'Mod&#233;rer sujets',  // 'Moderate threads' 
	'perms_allowmoduser'		=> 'Mod&#233;rer Utilisateurs',  //  'Moderate users'
	'perms_allowbanuser'		=> 'Ban Utilisateurs',  //  'Ban users'
	'perms_allowbanip'		=> 'Ban IP',  //  'Ban IP'
	'perms_allowedituser'		=> 'Modifier Utilisateurs',  // 'Edit users' 
	'perms_allowmassprune'		=> 'Posts supprimer en vrac',  // 'Bulk delete posts' 
	'perms_allowpostannounce'	=> 'Post annonces',  //  'Post announcements'
	'perms_disablepostctrl'	=> 'D&#233;sactiver "post limiter"',  // 'Disable "Post limit"' //Modify
	'perms_allowviewip'	=> 'Voir IP',  // 'View IP' 
	'perms_viewperm'	=> 'Acc&#232;s Forum',  //   'Access forum'
	'perms_postperm'	=> 'Post sujets',  //  'Post threads'
	'perms_replyperm'	=> 'Post r&#233;ponses',  // 'Post replies' 
	'perms_getattachperm'	=> 'T&#233;l&#233;ch./Voir pi&#232;ces jointe',  //  'Download/View attachments'
	'perms_postattachperm'	=> 'Charger pi&#232;ces jointe',  //  'Upload attachments'
	'perms_postimageperm'	=> 'Charger images',  //  'Upload images'
	'perms_allowblog'	=> 'Post blogs',  //  'Post blogs'
	'perms_allowdoing'	=> 'Post Agiss.',  // 'Post doings' 
	'perms_allowupload'	=> 'Charger images',  //  'Upload images' 
	'perms_allowshare'	=> 'Post partages',  // 'Post shares' 
	'perms_allowpoke'	=> 'Appuie',  //  'Poke'
	'perms_allowfriend'	=> 'Ajouter ami',  // 'Add friend' 
	'perms_allowclick'	=> 'Autoriser la position',  // 'Allow the position' //Modify
	'perms_allowmyop'	=> 'Utiliser applications',  //  'Use applications'
	'perms_allowcomment'	=> 'Post commentaires',  //  'Post comments'
	'perms_allowstatdata'	=> 'Voir statistique',  //  'View statistic'
	'perms_allowstat'	=> 'Voir Stats. &#233;volution',  //  'View stats trend'
	'perms_allowpostarticle'	=> 'Post articles',  //  'Post articles'
	'perms_raterange'	=> 'Autoriser notations',  //  'Allow to ratings'
	'perms_allowcommentpost'	=> 'Allow to comment',//'允许参与点评',
	'perms_allowat'			=> 'Allow the number of @name',//'允许 @ 的人数',
	'perms_allowreplycredit'	=> 'Allow to set replies reward',//'允许设置回帖奖励',
	'perms_allowposttag'		=> 'Allow to use tags',//'允许使用标签',
	'perms_allowcreatecollection'	=> 'Allow to create collections',//'允许创建淘专辑的数量',
	'perms_allowsendpm'	=> 'Autoriser envoie M.P',  //  'Allow Send PM'
	'perms_maximagesize'	=> 'Taille de l\'image Max.',  //  'Max size of picture'
	'perms_allowmediacode'	=> 'Code multim&#233;dia',  //  'Multimedia code'

	'join_topic'	=> 'Se joint aux sujets',  // 'Join threads' 
	'join_poll'	=> 'Se joint aux sondages',  //  'Join polls'
	'buy_trade'	=> 'Se joint aux commerces',  // 'Join trades' 
	'join_reward'	=> 'Se joint aux r&#233;compenses',  // 'Join rewards' 
	'join_activity'	=> 'Se joint aux activit&#233;s',  // 'Join activities' 
	'join_debate'	=> 'Se joint aux d&#233;bats',  //  'Join debates'
	'at_invite'		=> '@name for friends',//'@我的好友',

	'lower'			=> ' inf&#233;rieure &#224; ',  //  ' lower than '
	'higher'		=> ' plus &#233;lev&#233; que ',  //  ' higher than '
	'report_msg_your'	=> 'Vos ',  //  'Your '
	'report_noreward'	=> 'Aucune incitation',  //  'No incentive'
	'activity_viewimg'	=> 'Click to view',//'点击查看',

	'crime_postreason'	=> '{reason} &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="xi2">Details</a>',//'{reason} &nbsp; <a href="forum.php?mod=redirect&goto=findpost&pid={pid}&ptid={tid}" target="_blank" class="xi2">查看详情</a>',
	'crime_reason'		=> '{reason}',

	'connectguest_message_search'	=> array('Not logged in', 'Logged'),//array('尚未登录', '先登录'),
	'connectguest_message_replace'	=> array('Not yet <a href="member.php?mod=connect">Improve current account</a> or <a href="member.php?mod=connect&ac=bind">Bind existing account</a>', 'You need to <a href="member.php?mod=connect">Improve account information</a> or <a href="member.php?mod=connect&ac=bind">Bind existing account</a> '),//array('尚未 <a href="member.php?mod=connect">完善帐号信息</a> 或 <a href="member.php?mod=connect&ac=bind">绑定已有帐号</a> ', '您需要先 <a href="member.php?mod=connect">完善帐号信息</a> 或 <a href="member.php?mod=connect&ac=bind">绑定已有帐号</a> '),
	'connectguest_message_mobile_search'	=> array('Not logged in', 'Logged'),//array('尚未登录', '先登录'),
	'connectguest_message_mobile_replace'	=> 'Provide your account information or Bind existing account, ',//'在电脑版完善资料或绑定已有帐号，',

	'avatar'		=> 'Avatar',//'头像',
	'signature'		=> 'Signature',//'签名',
	'custom_title'		=> 'Custom Title',//'自定义头衔',

	'forum_guide'		=> 'Guide',//'导读',

	'patch_site_have'	=> 'Your site have',//'您的网站有',
	'patch_is_fixed'	=> 'Security vulnerabilities, has been fixed',//'个安全漏洞，已修复',
	'patch_need_fix'	=> 'Security vulnerabilities',//'个安全漏洞，请尽快修复',
	'patch_fixed_status'	=> 'Fixed',//'已修复',
	'patch_unfix_status'	=> 'NOT fixed',//'未修复',
	'patch_fix_failed_status'	=> 'Repair failed',//'修复失败',
	'patch_fix_right_now'	=> 'Repair right now',//'立即修复',
	'patch_view_fix_detail'	=> 'Details',//'查看详情',
	'patch_name'		=> 'Vulnerability',//'漏洞名称',
	'patch_dateline'	=> 'Date',//'发布日期',
	'patch_status'		=> 'Status',//'当前状态',
	'patch_close'		=> 'Close',//'关闭',

	'plugin_title'		=> 'Application update reminder',//'应用更新提醒',
	'plugin_memo'		=> 'Updates available: <span class="xi1">{number}</span>',//'您有 <span class="xi1">{number}</span> 款应用有可用更新',
	'plugin_link'		=> 'Update Now',//'现在更新',

);

