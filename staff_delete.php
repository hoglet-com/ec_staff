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
            $staff_code=$_GET['staffcode'];
            //$staff_name=$_GET['staffname'];

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

            //$staff_nameにDBに保存されているnameを格納している
            $rec=$stmt->fetch(PDO::FETCH_ASSOC);
            $staff_name=$rec['name'];

            $dbh=null;

        }catch(Exception $e){
            print 'ただいま障害によりご迷惑をお掛けしております。';
            print $e->getMessage ();
            exit();
        }
      ?>

        スタッフ削除<br/>
        <br/>
        スタッフコード<br/>
        <?php print $staff_code; ?>
        <br/>
        スタッフ名<br/>
        <?php print $staff_name; ?>
        <br/>
        <form method="POST" action="staff_delete_done.php">
        <input type="hidden" name="code" value="<?php print $staff_code; ?>">
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
      </form>








  </body>
</html>
