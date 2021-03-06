<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: table_home_favorite.php 29149 2012-03-27 09:52:07Z chenmengshu $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

class table_home_favorite extends discuz_table
{
	public function __construct() {

		$this->_table = 'home_favorite';
		$this->_pk    = 'favid';
		$this->_pre_cache_key = 'home_favorite_';
		$this->_allowmem = memory('check');
		$this->_cache_ttl = 86400;
		parent::__construct();
	}

	public function fetch_all_by_uid_idtype($uid, $idtype, $favid = 0, $start = 0, $limit = 0) {
		$cache_key = $this->_pre_cache_key.'fetch_all_by_uid_idtype_'.$uid.'_'.$idtype;
		if($this->_allowmem){
			$result = memory('get',$cache_key);
			if($result !== false){
				return $result;
			}
		}
		
		$parameter = array($this->_table);
		$wherearr = array();
		if($favid) {
			$parameter[] = dintval($favid, is_array($favid) ? true : false);
			$wherearr[] = is_array($favid) ? 'favid IN(%n)' : 'favid=%d';
		}
		$parameter[] = $uid;
		$wherearr[] = "uid=%d";
		if(!empty($idtype)) {
			$parameter[] = $idtype;
			$wherearr[] = "idtype=%s";
		}
		$wheresql = !empty($wherearr) && is_array($wherearr) ? ' WHERE '.implode(' AND ', $wherearr) : '';

		$result = DB::fetch_all("SELECT * FROM %t $wheresql ORDER BY dateline DESC ".DB::limit($start, $limit), $parameter, $this->_pk);
		memory('set',$cache_key,$result);
		
		return $result ; 
	}

	public function count_by_uid_idtype($uid, $idtype, $favid = 0) {
		$parameter = array($this->_table);
		$wherearr = array();
		if($favid) {
			$parameter[] = dintval($favid, is_array($favid) ? true : false);
			$wherearr[] = is_array($favid) ? 'favid IN(%n)' : 'favid=%d';
		}
		$parameter[] = $uid;
		$wherearr[] = "uid=%d";
		if(!empty($idtype)) {
			$parameter[] = $idtype;
			$wherearr[] = "idtype=%s";
		}
		$wheresql = !empty($wherearr) && is_array($wherearr) ? ' WHERE '.implode(' AND ', $wherearr) : '';
		return DB::result_first("SELECT COUNT(*) FROM %t $wheresql ", $parameter);
	}

	public function fetch_by_id_idtype($id, $idtype, $uid = 0) {
		if($uid) {
			$uidsql = ' AND '.DB::field('uid', $uid);
		}
		return DB::fetch_first("SELECT * FROM %t WHERE id=%d AND idtype=%s $uidsql", array($this->_table, $id, $idtype));
	}

	public function count_by_id_idtype($id, $idtype) {
		return DB::result_first("SELECT COUNT(*) FROM %t WHERE id=%d AND idtype=%s", array($this->_table, $id, $idtype));
	}

	public function delete_by_id_idtype($id, $idtype) {
		return DB::delete($this->_table, DB::field('id', $id) .' AND '.DB::field('idtype', $idtype));
	}

	public function delete($val, $unbuffered = false, $uid = 0) {
		//删除缓存
		$favids = is_array($val) ? $val : array($val);
		$fav_res = $this->fetch_all($favids);
		foreach ($fav_res as $fav){
			$cache_key = $this->_pre_cache_key.'fetch_all_by_uid_idtype_'.$fav['uid'].'_'.$fav['idtype'];
			memory('rm',$cache_key);
		}
		
		$val = dintval($val, is_array($val) ? true : false);
		if($val) {
			if($uid) {
				$uid = dintval($uid, is_array($uid) ? true : false);
			}
			return DB::delete($this->_table, DB::field($this->_pk, $val).($uid ? ' AND '.DB::field('uid', $uid) : ''), null, $unbuffered);
		}
		return !$unbuffered ? 0 : false;
	}
	
	public function insert($data, $return_insert_id = false, $replace = false, $silent = false){
		//删除缓存
		$cache_key = $this->_pre_cache_key.'fetch_all_by_uid_idtype_'.$$data['uid'].'_'.$data['idtype'];
		memory('rm',$cache_key);
		
		return parent::insert($data, $return_insert_id, $replace, $silent);
	}

}

?>