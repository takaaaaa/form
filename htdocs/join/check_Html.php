<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link rel="stylesheet" href="../css/style.css">
<title>新規会員登録 確認</title>
</head>

<body id="Form">
  <div class="wrap">
    <div class="inner">
      <p class="img"><img src="../img/login.png" width="80"></p>
      <h1>新規会員登録 - 確認</h1>
        <form action="thanks.php" method="post">
          <dl>
            <dt>ユーザー名</dt>
            <dd>
              <?php echo(WebSecurity::htmlEncode($name, false)); ?>
              <input type="hidden" name="name" value="<?php echo(WebSecurity::htmlEncode($name, false)); ?>">
            </dd>
            <dt>メールアドレス</dt>
            <dd>
              <?php echo(WebSecurity::htmlEncode($mail, false)); ?>
              <input type="hidden" name="mail" value="<?php echo(WebSecurity::htmlEncode($mail, false)); ?>">
            </dd>
            <dt>パスワード</dt>
            <dd>
              表示されません。
              <input type="hidden" name="password" value="<?php echo(WebSecurity::htmlEncode($password, false)); ?>">
            </dd>
          </dl>
          <div class="btn-area">
            <p class="btn-n"><a href="#" onclick="document.back.submit();return false;"><button type="" class="btnBack">修正する</button></a></p>
            <p class="btn-n"><input type="submit" name="" value="登録" class="entry"></p>
          </div>
        </form>

        <form name="back" action="check.php" method="post">
          <input type="hidden" name="name" value="<?php echo(WebSecurity::htmlEncode($name, false)); ?>">
          <input type="hidden" name="mail" value="<?php echo(WebSecurity::htmlEncode($mail, false)); ?>">
          <input type="hidden" name="password" value="<?php echo(WebSecurity::htmlEncode($password, false)); ?>">

          <input type="hidden" name="pageback" value="pageback">
        </form>
      </div>
    </div>
  </body>
</html>

