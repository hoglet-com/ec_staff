<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <title>EC-SITE</title>
  </head>
  <body>
      <?php

          $staff_code=$_POST['code'];
          $staff_name=$_POST['name'];
          $staff_pass=$_POST['pass'];
          $staff_pass2=$_POST['pass2'];

          $satff_name=htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
          $staff_pass=htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');
          $staff_pass2=htmlspecialchars($staff_pass2,ENT_QUOTES,'UTF-8');

          if($staff_name=='')
          {
              print 'スタッフ名が入力されていません<br />';
          }else{
              print 'スタッフ名：';
              print $staff_name;
              print '<br />';
              print '入力したパスワード：';
              print $staff_pass;
              print '<br />';
              print '入力したパスワード2：';
              print $staff_pass2;
              print '<br />';
          }

          if($staff_pass==''){
              print 'パスワードが入力されていません';
              print '<br />';
          }

          if($staff_pass != $staff_pass2){
              print 'パスワードが一致しません<br />';
              print '<br />';
              print '入力したパスワード：';
              print $staff_pass;
              print '<br />';
              print '入力したパスワード2：';
              print $staff_pass2;
              print '<br />';
          }

          if($staff_name=='' || $staff_pass=='' || $staff_pass!=$staff_pass2){
                print '<form>';
                print '<input type="button" onclick="history.back()" value="戻る">';
                print '</form>';
          }else{
              $staff_pass=md5($staff_pass);
              print '<form method="post" action="staff_edit_done.php">';
              #次のページに変数を引き継ぐために必要！
              print '<input type="hidden" name="code" value="'.$staff_code.'">';
              print '<br />';
              print '<input type="hidden" name="name" value="'.$staff_name.'">';
              print '<br />';
              print '<input type="hidden" name="pass" value="'.$staff_pass.'">';
              print '<br />';
              print '<input type="button" onclick="history.back()" value="戻る">';
              print '<input type="submit" value="OK">';
              print '</form>';
            }
      ?>
  </body>
</html>
