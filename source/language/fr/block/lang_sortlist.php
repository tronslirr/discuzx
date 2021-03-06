<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_sortlist.php by Valery Votintsev at sources.ru
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'sortlist_fids'			=> 'Dans le forum',
	'sortlist_fids_comment'		=> 'R&#233;glage permet &#224; l\'appel&#233; &#224; participer &#224; des posts nouveaux du Forum, vous pouvez maintenir enfonc&#233;e la touche CTRL aux choix multiples, Choisir Tout ou Effacer Toutes les limitations qui ne sont pas',
	'sortlist_startrow'		=> 'Nombre initial de lignes de donn&#233;es',
	'sortlist_startrow_comment'	=> 'Pour la premi&#232;re s&#233;rie de lignes de donn&#233;es, entrez la valeur 0 sp&#233;cifiques de la premi&#232;re ligne, et ainsi',
	'sortlist_showitems'		=> 'Afficher les donn&#233;es sur le nombre',
	'sortlist_showitems_comment'	=> 'Fixant un th&#232;me sur le nombre d\'entr&#233;es affich&#233;es, d&#233;fini comme un entier sup&#233;rieur &#224; 0',
	'sortlist_titlelength'		=> 'Nombre maximum de titre octets',
	'sortlist_titlelength_comment'	=> 'D&#233;fini lorsque le titre est plus long que le r&#233;glage, si le titre r&#233;duit automatiquement le nombre d\'octets dans le jeu, 0 n\'est pas automatiquement r&#233;duite',
	'sortlist_fnamelength'		=> 'Nom du Forum Titre qui contient le nombre maximum d\'octets',
	'sortlist_fnamelength_comment'	=> 'D&#233;finit le Titre en sa Longueur est la Longueur du Nom du Forum o&#249; le compte avec',
	'sortlist_summarylength'	=> 'Th&#232;me contenus de ce texte plus courts',
	'sortlist_summarylength_comment'	=> 'D&#233;finissez le contenu texte d\'un peu de sujets courts, utilisez la valeur par d&#233;faut de 0 &#224; 255',
	'sortlist_tids'			=> 'Pr&#233;cisez le sujet',
	'sortlist_tids_comment'		=> 'Pour sp&#233;cifier l\'affichage th&#232;me impos&#233; tid, plus d\'un Identifiant Svp. utilisez une virgule "," s&#233;par&#233;es. Remarque: vierge est sans filtrage',
	'sortlist_keyword'		=> 'Mot-cl&#233; Titre',
	'sortlist_keyword_comment'	=> 'R&#233;glez le titre contient des mots-cl&#233;s Remarque: vierge est sans filtrage; mots-cl&#233;s peuvent utiliser le joker *; plusieurs mots cl&#233;s, des espaces disponibles, ou et de connexion, telles que Win32 et Unix; correspondre &#224; un certain nombre de cl&#233;s certains de ces mots peuvent &#234;tre utilis&#233;s | ou OR connexion, comme win32 ou unix',
	'sortlist_typeids'		=> 'Classement des Sujets',
	'sortlist_typeids_comment'	=> 'D&#233;finissez une cat&#233;gorie de sujet sp&#233;cifique. Remarque: Choisir Tout ou Effacer Tout qui &#233;taient sans aucun filtrage',
	'sortlist_typeids_all'		=> 'Tout les Classements des Sujets',
	'sortlist_sortids'		=> 'Renseignements Class&#233;s',
	'sortlist_sortids_comment'	=> 'R&#233;glez l\'objet d\'informations classifi&#233;es. NOTE: Choisir Tout ou Effacer Tout &#233;tait sans aucun filtrage',
	'sortlist_sortids_all'		=> 'Toutes Infos. Class&#233;es',
	'sortlist_digest'		=> 'Liste Contacts par Filtrage',
	'sortlist_digest_comment'	=> 'D&#233;finissez un domaine sp&#233;cifique. Remarque: Choisir ou effacer Tous qui &#233;taient sans aucun filtrage',
	'sortlist_digest_0'		=> 'Sujet Hot',
	'sortlist_digest_1'		=> 'Sommaire I',
	'sortlist_digest_2'		=> 'Sommaire II',
	'sortlist_digest_3'		=> 'Sommaire III',
	'sortlist_stick'		=> 'Filtres Sujet &#233;pingl&#233;',
	'sortlist_stick_comment'	=> 'D&#233;finissez un domaine sp&#233;cifique. Remarque: Choisir ou effacer Tous qui &#233;taient sans aucun filtrage',
	'sortlist_stick_0'		=> 'Sujet Hot',
	'sortlist_stick_1'		=> 'Scotch I',
	'sortlist_stick_2'		=> 'Scotch II',
	'sortlist_stick_3'		=> 'Scotch III',
	'sortlist_special'		=> 'Filtre Th&#232;me sp&#233;cial',
	'sortlist_special_comment'	=> 'D&#233;finissez un domaine sp&#233;cifique. Remarque: Choisir Tout ou Effacer Tout qui &#233;taient sans aucun filtrage',
	'sortlist_special_1'		=> 'Th&#232;me Sondage',
	'sortlist_special_2'		=> 'Biens Envoy&#233;s',
	'sortlist_special_3'		=> 'Th&#232;me R&#233;comp.',
	'sortlist_special_4'		=> 'Activit&#233;s Th&#232;mes',
	'sortlist_special_5'		=> 'Th&#232;me D&#233;bats',
	'sortlist_special_0'		=> 'Sujet Hot',
	'sortlist_special_reward'	=> 'Filtre Px. R&#233;comp. par Sujet',
	'sortlist_special_reward_comment'	=> 'D&#233;finissez le th&#232;me d\'un type particulier de r&#233;compense',
	'sortlist_special_reward_0'	=> 'Tout',
	'sortlist_special_reward_1'	=> 'R&#233;solus',
	'sortlist_special_reward_2'	=> 'En Suspens.',
	'sortlist_recommend'		=> 'Filtre recommand&#233; le sujet',
	'sortlist_recommend_comment'	=> 'D&#233;finissez si pour afficher seulement les sujets recommand&#233;s',
	'sortlist_orderby'		=> 'Trier par Sujet',
	'sortlist_orderby_comment'	=> 'Param&#232;tres pour lesquels le champ du sujet ou la mani&#232;re de trier',
	'sortlist_orderby_lastpost'	=> 'Trier par Time Dernier message D&#233;croissant',
	'sortlist_orderby_dateline'	=> 'Ordre inverse selon la fonction de l\'heure',
	'sortlist_orderby_replies'	=> 'Trier par r&#233;ponses DESC',
	'sortlist_orderby_views'	=> 'Trier Vues par inversion',
	'sortlist_orderby_heats'	=> 'Ordre inverse en Redu',
	'sortlist_orderby_recommends'	=> 'Tri invers&#233; par Evaluation du Th&#232;me',
	'sortlist_lastpost'		=> 'Affich&#233; th&#232;me',
	'sortlist_lastpost_nolimit'	=> 'Aucune restriction',
	'sortlist_lastpost_hour'	=> 'Dans l\'heure',
	'sortlist_lastpost_day'		=> 'Dans un jour',
	'sortlist_lastpost_week'	=> 'Dans la semaine',
	'sortlist_lastpost_month'	=> 'Dans le mois',
	'sortlist_orderby_hours_comment'	=> 'Vues dans le d&#233;lai sp&#233;cifi&#233; dans un Ordre inverse de la valeur temps',
);

