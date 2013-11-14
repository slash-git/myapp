<?php
/**
 * CYDAS Application.
 *
 * PHP 5
 *
 * Copyright 2012, CYDAS, Inc. (http://www.cydas.co.jp/)
 *
 * @copyright     Copyright 2012, CYDAS, Inc. (http://www.cydas.co.jp/)
 * @package       app.Model.Behavior
 */

App::uses('AppException', 'Error');
App::uses('AppLog', 'Common');

/**
 * memcached Behavior
 *
 * memcached ビヘイビア
 *
 * @package       app.Model.Behavior
 */
class CacheBehavior extends ModelBehavior {
	static $cacheData = array();
	public $enabled = true;

	public function setup(&$model, $config = array()) {
	}

	/**
	 * メソッドキャッシュ
	 */
	public function cacheMethod(&$model, $expire, $method, $args = array()) {

		$this->enabled = false;
		// キャッシュキー
		$cachekey = get_class($model) . '_' . $method . '_' . $expire . '_' . md5(serialize($args));

		// 変数キャッシュの場合
		if (!$expire) {
			if (isset($this->cacheData[$cachekey])) {
				$this->enabled = true;
				return $this->cacheData[$cachekey];
			}
			$ret = call_user_func_array(array($model, $method), $args);
			$this->enabled = true;
			$this->cacheData[$cachekey] = $ret;
			return $ret;
		}

		// サーバーキャッシュの場合
		$ret = Cache::read($cachekey);
		if (!empty($ret)) {
			$this->enabled = true;
			$this->log(get_class($model) . '->' . $method . ' Cache Hit!', LOG_INFO);
			return $ret;
		}
		$this->log(get_class($model) . '->' . $method . ' Cache Miss!', LOG_INFO);
		$ret = call_user_func_array(array($model, $method), $args);
		$this->enabled = true;
		Cache::set(array('duration' => '+' . $expire . ' seconds'));
		Cache::write($cachekey, $ret);

		// クリア用にモデル毎のキャッシュキーリストを作成
		$cacheListKey = get_class($model) . '_cacheMethodList';
		$list = Cache::read($cacheListKey);
		$list[$cachekey] = 1;
		Cache::write($cacheListKey, $list);
		return $ret;
	}

	/**
	 * 再帰防止判定用
	 */
	public function cacheEnabled(&$model) {

		if (!Configure::read('AppInfo.memcached.enable')) {
			return false;
		}

		return $this->enabled;
	}

	/**
	 * キャッシュクリア
	 */
	public function cacheDelete(&$model) {
		$cacheListKey = get_class($model) . '_cacheMethodList';
		$list = Cache::read($cacheListKey);
		if (empty($list))
			return;
		foreach ($list as $key => $tmp) {
			Cache::delete($key);
		}
		Cache::delete($cacheListKey);
	}

	/**
	 * 追加・変更・削除時にはキャッシュをクリア
	 */
	public function afterSave(&$model, $created) {
		$this->cacheDelete($model);
	}
	public function afterDelete(&$model) {
		$this->cacheDelete($model);
	}

}
