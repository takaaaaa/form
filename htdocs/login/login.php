<?php
/**
 * ログイン画面
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

//変数宣言
$appli_model = new AppliModel();  //アプリケーションモデルクラス
$login_data = new LoginData();    //ログインデータクラス

$error_message = array();     //エラーメッセージ
$input_values = array();      //入力メッセージ

$mail = "";                      //メールアドレス
$password = "";                  //パスワード

//ログインボタンを押したとき
if(!empty($_POST)){

  //POSTから各パラメータを取得して変数に格納
  foreach($_POST as $key => $value) {
      //$$keyのダラー2つでキーが変数になる。上部にセットしてあったら。参考url http://ameblo.jp/enpc/entry-11330127963.html
      //変数が存在していれば。$fullname、$phoneticなど。。
      if (isset($$key)) {

        if(isset($value)){
          switch ($key) {
            case "mail":
              //全角なら半角に変換する
              $$key = mb_convert_kana(trim($value), "a");
              break;
            default:
              $$key = trim($value);
          }
        }else{
          $$key = "";
        }
          $input_values[$key] = $$key;
      }
  }

  //エラーメッセージを$error_messageに代入
  $error_message = $appli_model->validateEntry($input_values);

  //入力エラーが発生した場合は、画面にてエラーを表示させる
  if( count($error_message) != 0 ){
    //入力画面を表示
    include("login_Html.php");
    exit();
  } else {
    //データベース処理、ログイン成功
    $re = $login_data->selectinfo($input_values["mail"],$input_values["password"]);
    if($re == true){
      $login_data->close();
      header('Location: calendar/index.php');
      exit();
    }else {
      $login_data->close();
      $error_message += array("login" => "ログインに失敗しました。正しくご記入ください。");
      include("login_Html.php");
      exit();
    }
  }
}

//HTMLテンプレート読み込み
include("login_Html.php");

//終了処理
exit();

?>

