<!DOCTYPE html>
  <html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <link rel="stylesheet" href="../css/style.css">
    <title>新規会員登録</title>
  </head>
  <body id="Form">
    <div class="wrap">
      <div class="inner">
        <p class="img"><img src="../img/login.png" width="80"></p>
        <h1>新規会員登録</h1>
        <form action="check.php" method="post">
        <dl>
          <dt>ユーザー名<font color="red">*</font></dt>
          <dd>
            <input type="text" name="name" size="35" maxlength="255" value="<?php echo(WebSecurity::htmlEncode($name, false)); ?>">
            <?php
              echo(CommonUtil::getHtmlErrorMessageByArray($error_message, "name"));
            ?>
          </dd>
          <dt>メールアドレス<font color="red">*</font></dt>
          <dd>
            <input type="text" name="mail" size="35" maxlength="255" value="<?php echo(WebSecurity::htmlEncode($mail, false)); ?>">
            <?php
            echo(CommonUtil::getHtmlErrorMessageByArray($error_message, "mail"));
            ?>
          </dd>
          <dt>パスワード<font color="red">*</font><span style="font-size: 1.2rem">(4文字以上)</span></dt>
          <dd>
            <input type="password" name="password" size="35" maxlength="255" value="<?php echo(WebSecurity::htmlEncode($password, false)); ?>">
            <?php
            echo(CommonUtil::getHtmlErrorMessageByArray($error_message, "password"));
            ?>
          </dd>
        </dl>
          <div class="btn"><input type="submit" value="入力内容を確認" class="check"></div>
        </form>
      </div>
    </div>
  </body>
</html>