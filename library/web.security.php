<?php
// 読込済判定
if(!defined("__DEFINED_CLASS_WEB_SECURITY__")) {

	// 読込済定数定義
	define("__DEFINED_CLASS_WEB_SECURITY__", true);

	/**
	 * Webセキュリティ用ユーリティティクラス
	 * @author
	 * @since
	 * @version
	 */
	class WebSecurity {

		/**
		 * HTML変換対象文字
		 */
		static private function htmlSpecialCharacters() {
			return array(
				  "&"	=> "&amp;"
				, "\""	=> "&quot;"
				, "'"	=> "&#039;"
				, "<"	=> "&lt;"
				, ">"	=> "&gt;"
			);
		}

		/**
		 * HTML特殊文字へ変換を行う。
		 * @param string $text
		 * @param bool $with_crlf [optional] default true 改行コードもbr要素へ変換する
		 * @return string
		 */
		static public function htmlEncode($text, $with_crlf = true) {
			$encode = self::htmlSpecialCharacters();
			$result = str_replace(array_keys($encode), array_values($encode), $text);
			if($with_crlf) {
				return self::breakLineEncode($result);
			} else {
				return $result;
			}
		}

		/**
		 * 改行コードをbr要素に変換する
		 * @param string $text
		 * @param bool $is_xhtml
		 * @return string
		 */
		static public function breakLineEncode($text, $is_xhtml = true) {
			return preg_replace("/(?:\r\n|\n|\r)/is", "<br />", $text);
		}


	}
}
?>