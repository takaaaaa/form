<?php
/**
 * 新規登録画面
 * @author
 * @since
 * @version 1.0
 */

session_start();

//共通関数クラスの読み込み
require_once(dirname(__DIR__)."../../inc/common/common.util.php");

//アプリケーションクラスの読み込み
require_once(dirname(__DIR__)."../../inc/model/appli.model.php");

//ログインデータクラスの読み込み
require_once(dirname(__DIR__)."../../inc/model/login_data.php");

//セキュリティクラスの読み込み
require_once(dirname(__DIR__)."../../library/web.security.php");

$error_message = array();     //エラーメッセージ


$name = "";                      //ユーザー名
$mail = "";                      //メールアドレス
$password = "";                  //パスワード


// HTMLテンプレート読み込み
include("index_Html.php");

// 終了処理
exit();


?>
