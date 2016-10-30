<?php
/**
 * 完了画面
 * @author
 * @since
 * @version 1.0
 */

//共通関数クラスの読み込み
require_once(dirname(__DIR__)."../../inc/common/common.util.php");

//アプリケーションクラスの読み込み
require_once(dirname(__DIR__)."../../inc/model/appli.model.php");

//エントリーデータクラスの読み込み
require_once(dirname(__DIR__)."../../inc/model/entry_data.php");

//セキュリティクラスの読み込み
require_once(dirname(__DIR__)."../../library/web.security.php");

//変数宣言
$appli_model = new AppliModel();  //アプリケーションモデルクラス
$entry_data = new EntryData();    //エントリーデータクラス

$error_message = array();         //エラーメッセージ
$input_values = array();      //入力メッセージ

$name = "";                      //ユーザー名
$mail = "";                      //メールアドレス
$password = "";                  //パスワード


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


$error_message = $appli_model->validateEntry($input_values);

//入力エラーが発生した場合は、画面にてエラーを表示させる
if( count($error_message) != 0 ){
  //入力画面を表示
  include("index_Html.php");
  exit();
} else {
  //データベース 登録処理
  $entry_data->insertinfo($input_values["name"],$input_values["mail"],$input_values["password"]);
  $entry_data->close();
}

// HTMLテンプレート読み込み
include("thanks_Html.php");

// 終了処理
exit();

?>