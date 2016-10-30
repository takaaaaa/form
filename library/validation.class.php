<?php
if(!defined("__DEFINED_CLASS_VALIDATION__")) {

	define("__DEFINED_CLASS_VALIDATION__", true);

	/**
	 * 入力値検証関数ライブラリ
	 * 入力された値を検証するための関数を揃えたライブラリ
	 *
	 * @author
	 * @since
	 * @version
	 * @copyright
	 * @license
	 */
	class Validation {

		/**
		 * 桁数検証関数（桁数の範囲指定版）
		 *   指定された値の桁数が、下限桁数、上限桁数の範囲内か判断する
		 *   範囲内の時は真を返し、それ以外なら偽を返す
		 *   ※全角、半角関係なしで、単純に桁数で判断する
		 *   例：$parameter = 1234、 $min_length=1、$max_length=4 の場合はtrue

		 * @static
		 * @access public
		 * @param $parameter string
		 * @param $min_length string
		 * @param $max_length string
		 * @return bool
		 */
		static public function isRangeLength($parameter,$min_length,$max_length) {

			if (strlen($parameter) < $min_length || $max_length < strlen($parameter))
			{
				return false;
			}

			return true;
		}

		//---------------------------------------------------------------
		/**
		 * 必須検証関数
		 * 検証値になんらかの値があれば真を返し、値がないなら偽を返す
		 * @static
		 * @access public
		 * @param $parameter mixed 検証値
		 * @return bool
		 */
		static public function isEmpty($parameter) {
			if(
				!is_null($parameter)
				&&
				(
					$parameter !== ""
					||
					(
						is_array($parameter)
						&&
						count($parameter)
					)
				)
			) {
				return false;
			} else {
				return true;
			}
		}


		//---------------------------------------------------------------

		/**
		 * メールアドレス検証関数
		 * @static
		 * @access public
		 * @param $parameter string
		 * @return bool メールアドレスとして認識できるならば真、それ以外は偽を返す。
		 */
		static public function isMailAddress($parameter) {
			return	!is_array($parameter)
					&&
					!is_object($parameter)
					&&
					preg_match("/^[\.!#%&\-_0-9a-z\?\/\+]+\@[!#%&\-_0-9a-z]+(\.[!#%&\-_0-9a-z]+)+$/i",$parameter);
		}

		//---------------------------------------------------------------

		/**
		 * 携帯電話メールアドレス検証関数
		 * @static
		 * @access public
		 * @param $parameter
		 * @return bool 携帯電話のメールアドレスとして認識できるならば真、それ以外は偽を返す。
		 */
		static public function isMobilephoneMailAddress($parameter) {
			return	!is_array($parameter)
					&&
					!is_object($parameter)
					&&
					preg_match(
						  "/^(?!\\.)[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x5C\\x2F\\x30-\\x39\\x3D\\x3F\\x41-\\x5A\\x5E-\\x7E]{1,}(\\.?[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x5C\\x2F\\x30-\\x39\\x3D\\x3F\\x41-\\x5A\\x5E-\\x7E]{1,})*(?!\\.)@((docomo\\.ne|([^\\.]+\\.biz\\.)?ezweb\\.ne|sky\\.tk[kc]\\.ne|sky\\.tu\\-ka\\.ne|softbank\\.ne|i\\.softbank|disney\\.ne|[dhtcrknsq]\\.vodafone\\.ne|jp\\-[dhtcrknsq]|((d[ijk]|wm)\\.)?pdx\\.ne|emnet\\.ne)\\.jp|willcom\\.com)$/"
						, $parameter
					);
		}


	}

}
?>