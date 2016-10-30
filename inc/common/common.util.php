<?php

	//定数宣言ファイルの読み込み
	require_once(dirname(__DIR__)."../../library/logger.class.php");

	/**
	 * 共通関数クラス
	 * @access  public
	 * @author
	 * @since
	 * @version 1.0
	 */
	class CommonUtil
	{

		/**
		 * 配列内の指定した要素の値を返す
		 * @static
		 * @access public
		 * @param $array array
		 * @param $key string
		 * @return string
		 */
		static public function getArrayValue($array,$key)
		{
			if( isset($array[$key]) )
			{
				return $array[$key];

			}

			return "";
		}


		/**
		 * 引数で受け取ったエラーメッセージを、<span>タグで装飾して返す
		 * @static
		 * @access public
		 * @param $val string
		 * @return string
		 */
		static public function getHtmlErrorMessage($val)
		{
			if( $val != "" )
			{
				return '<span class="error">'.$val.'</span>';
			}

			return "";
		}


		/**
		 * 引数で受け取ったエラーメッセージを、<span>タグで装飾して返す
		 * @static
		 * @access public
		 * @param $val string
		 * @return string
		 */
		static public function getHtmlErrorMessageByArray($array,$key)
		{
			//配列内の指定した要素の値を返す
			$val = self::getArrayValue($array,$key);

			//<span>タグで装飾して返す
			$val = self::getHtmlErrorMessage($val);

			return $val;
		}


	}