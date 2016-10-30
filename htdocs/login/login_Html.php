
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link rel="stylesheet" href="../css/style.css">
    <title>ログイン</title>
  </head>
  <body id="Form">
    <div class="wrap">
      <div class="inner">
        <p class="img"><img src="../img/login.png" width="80"></p>
        	<h1>ログイン</h1>
        	<p>入会手続きがまだの方は<a href="../join/" class="line">こちら</a>からどうぞ。</p>
        	<form action="login.php" method="post">
        		<dl>
              <dt>メールアドレス</dt>
              <dd>
                <input type="text" name="mail" size="35" maxlength="255" value="<?php echo(WebSecurity::htmlEncode($mail, false)); ?>">
                <?php
                echo(CommonUtil::getHtmlErrorMessageByArray($error_message, "mail"));
                ?>
              </dd>
              <dt>パスワード</dt>
              <dd>
                <input type="password" name="password" size="35" maxlength="255" value="<?php echo(WebSecurity::htmlEncode($password, false)); ?>">
                <?php
                echo(CommonUtil::getHtmlErrorMessageByArray($error_message, "password"));
                ?>
                <?php
                echo(CommonUtil::getHtmlErrorMessageByArray($error_message, "login"));
                ?>
              </dd>
            </dl>
        		<div class="btn"><input type="submit" value="ログイン"></div>
        	</form>
      </div>
    </div>
  </body>
</html>