<?php
/**
 * PHP 5
 *
 * CYDAS Application.
 * Copyright 2012, CYDAS, Inc. (http://www.cydas.co.jp/)
 *
 * @copyright     Copyright 2012, CYDAS, Inc. (http://www.cydas.co.jp/)
 * @package       app.Model
 */

App::uses('Mysql', 'Model/Datasource/Database');

/**
 * アプリケーション基底Model
 *
 * @package       app.Model.Datasource
 */
class MysqlLog extends Mysql {

	/**
	 * Queries the database with given SQL statement, and obtains some metadata about the result
	 * (rows affected, timing, any errors, number of rows in resultset). The query is also logged.
	 * If Configure::read('debug') is set, the log is shown all the time, else it is only shown on errors.
	 *
	 * ### Options
	 *
	 * - log - Whether or not the query should be logged to the memory log.
	 *
	 * @param string $sql SQL statement
	 * @param array $options
	 * @param array $params values to be bound to the query
	 * @return mixed Resource or object representing the result set, or false on failure
	 */
	public function execute($sql, $options = array(), $params = array()) {
		$config = Configure::read('AppInfo.sql');
		$prefix = '';
		if ($config['log']) {
			$start = microtime(true);
			$prefix = Configure::read('AppInfo.process.process_uuid') . '|';
			CakeLog::write('sql', $prefix . $sql);
		}
		$result = parent::execute($sql, $options, $params);
		if ($config['log']) {
			$end = microtime(true);
			CakeLog::write('sql', $prefix . 'end|' . ($end - $start) . ' ms');
		}
		return $result;
	}

}
