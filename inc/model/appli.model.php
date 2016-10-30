<?php

	//入力検証クラスの読み込み
	require_once(dirname(__DIR__)."../../library/validation.class.php");

	/**
	 * アプリケーションテーブルカラムサイズ定義
	 * @author
	 * @since
	 * @version 1.0
	 */
	class AppliSize {
		const NAME              = 50;
		const MAIL              = 100;
		const PASSWORD          = 20;
	}

	/**
	 * アプリケーションクラス
	 * @author
	 * @since
	 * @version 1.0
	 */
	class AppliModel {

		/**
		 * 入力値検証
		 * @param array $data_list 検証対象データ配列
		 * @return array エラーメッセージ
		 */
		public function validateEntry($data_list)
		{
			//変数宣言
			$error_message = array();

			if( array_key_exists ( "name" , $data_list )) {
				//お名前（漢字）
				$name = $data_list["name"];

				//必須入力チェック
				if( Validation::isEmpty($name) == true ) {
					$error_message += array("name" => "お名前をご入力ください。");
				} else {
					//桁数チェック
					if( Validation::isRangeLength($name, 1, AppliSize::NAME) == false ) {
						$error_message += array("name" => "50文字以内でご入力ください。");
					}
				}
			}


			//メールアドレス
			$mail = $data_list["mail"];

			if( Validation::isEmpty($mail) ) {
				$error_message += array("mail" => "メールアドレスをご入力ください。");
			} else {

				if( !Validation::isMailAddress($mail) && !Validation::isMobilephoneMailAddress($mail) ) {
					$error_message += array("mail" => "メールアドレスが不正です。再度ご確認下さい。");
					//桁数チェック
				} elseif( Validation::isRangeLength($mail, 1, AppliSize::MAIL) == false ) {
					$error_message += array("mail" => "メールアドレスは、半角英数字100文字内でご入力ください。");
				}
			}


			//パスワード
			$password = $data_list["password"];

			//必須入力チェック
			if( Validation::isEmpty($password) == true ) {
				$error_message += array("password" => "パスワードをご入力ください。");
			} else {
				//桁数チェック
				if( Validation::isRangeLength($password, 4, AppliSize::NAME) == false ) {
					$error_message += array("password" => "4文字以上20文字以内でご入力ください。");
				}
			}


			return $error_message;
		}


	}

?>