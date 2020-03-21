<?
  require __DIR__ . '/../libs/rb-mysql.php';

  R::setup(
    'mysql:host=localhost;dbname=university',
    'root',
    ''
  );

  $dsn = 'mysql:host=localhost;dbname=university';
  $pdo = new PDO($dsn, 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

  session_start();
?>