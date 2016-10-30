<?php
// 多重定義判定
if(!defined("__DEFINED_CLASS_LOGGER__")) {

	// 定義済定数
	define("__DEFINED_CLASS_LOGGER__", true);

	/**
	 * ロガークラス
	 * @access public
	 * @author
	 * @since
	 * @version
	 * @copyright
	 * @license
	 */
	class logger {

		/**
		 * コンストラクタ
		 */
		//インスタンスの生成時に自動的に実行される
		public function __construct() {}

		/**
		 * ファイルに書き出す
		 * @param string $path
		 * @param string $content
		 */
		//\r\n 改行
		static public function write($path, $content) {
			return file_put_contents($path, sprintf("[%s] %s\r\n", date("Y-m-d H:i:s"), $content), FILE_APPEND);
		}
	}
}
?>