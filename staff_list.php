<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>EC-SITE</title>
  </head>
  <body>
      <?php
        try{
            $dsn = 'mysql:dbname=shop;host=localhost;charset=utf8';
            $user = 'root';
            $password = '';
            $dbh = new PDO($dsn, $user, $password);
            $dbh -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // 1は全部という意味
            $sql='SELECT * FROM mst_staff WHERE 1';
            //クエリー作成
            $stmt=$dbh->prepare($sql);
            //プレースホルダに値をセットし、SQL文を実行
            $stmt->execute();

            $dbh=null;

            print 'スタッフ一覧 <br/><br/>';
            print '<form method="post" action="staff_branch.php">';

            while(true){
                // $stmtから1レコードを取り出す
                $rec=$stmt->fetch(PDO::FETCH_ASSOC);
                if($rec==false){
                    break;
                }

                // 連結演算子( . ) で連結して print をしている
                print '<input type="radio" name="staffcode" value="' . $rec['code'] . '">';
                print $rec['name'];
                print '<br/>';
            }

            print '<input type="submit" name="disp" value="参照">';
            print '<input type="submit" name="add" value="追加">';
            print '<input type="submit" name="edit" value="修正">';
            print '<input type="submit" name="delete" value="削除">';
            print '</form>';

        }catch(Exception $e){
            print 'ただいま障害によりご迷惑をお掛けしております。';
            print $e->getMessage ();
            exit();
        }
      ?>
  </body>
</html>
