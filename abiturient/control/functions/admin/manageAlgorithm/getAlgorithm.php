<?
  require '../../db.php';

  $query = $pdo->query('SELECT * FROM algorithm');

  $algDate = [];
  $algContent = [];

  while( $response = $query->fetch() )
  {
  // $formatedDate = date('j M', strtotime($response['date']));

  // array_push($algDate, $formatedDate);

    array_push($algDate, $response['date']);
    array_push($algContent, $response['content']);
  }

  $result = (object) array (
    'dates' => $algDate,
    'contents' => $algContent
  );

  print_r( json_encode($result) );