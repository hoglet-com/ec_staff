<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>EC-SITE</title>
  </head>
  <body>
      <?php
        try{

            // staff_listでのstaffcodeを受け取っている
            $staff_code=$_POST['staffcode'];
            $staff_name=$_POST['staffname'];

            $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';
            $dbh = new PDO($dsn, $user, $password);
            $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // スタッフコードで絞り込みます
            $sql='SELECT name FROM mst_staff WHERE code=?';
            //クエリー作成
            $stmt=$dbh->prepare($sql);
            $data[]=$staff_code;
            //プレースホルダに値をセットし、SQL文を実行
            $stmt->execute($data);

            $dbh=null;

        }catch(Exception $e){
            print 'ただいま障害によりご迷惑をお掛けしております。';
            print $e->getMessage ();
            exit();
        }
      ?>

        スタッフ修正<br/>
        <br/>
        スタッフコード<br/>
        <?php print $staff_code; ?>
        <br/>
        <br/>
        <form method="POST" action="staff_edit_check.php">
        <input type="hidden" name="code" value="<?php print $staff_code; ?>">
        スタッフ名<br/>
        <input type="text" name="name" style="width:200px" value="<?php print $staff_name; ?>"><br/>

        パスワードを入力してください。<br/>
        <input type="password" name="pass" style="width:100px"><br/>
        パスワードをもう一度入力してください<br />
          <input type="password" name="pass2" style="width:100px"><br />
          <br />
          <input type="button" onclick="history.back()" value="戻る">
          <input type="submit" value="OK">
      </form>








  </body>
</html>
