<?
  $dsn = 'mysql:host=localhost;dbname=university';
  $pdo = new PDO($dsn, 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

  $queryShowFacs = $pdo->query('SELECT * from faculties');

  $fac_id = [];
  $fac_name = [];

  while( $result = $queryShowFacs->fetch() )
  {
    array_push($fac_id, $result['faculty_id']);
    array_push($fac_name, $result['faculty_name']);
  }

  $result = (object) array(
    'id' => $fac_id,
    'name' => $fac_name
  );

  print_r( json_encode($result) );