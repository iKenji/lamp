<html>
<head>
<title> test </title>
</head>
<body>

<?php
  $dsn = 'mysql:dbname=test;host=localhost';
  $user = '';
  $password = '';

 try{
   $dbh = new PDO($dsn, $user, $password);

   print('接続成功');

   $dbh->query('set names utf8');

   $sql = 'select * from personal';
   foreach ($dbh->query($sql) as $row) {
     print($row['id']);
     print($row['name']);
   }
 } catch (PDOException $e ) {
   print ('Erroe:'.$e->getMessage());
}

$dbh = null;
?>

</body>
</html>
     
