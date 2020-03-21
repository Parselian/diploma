<?
  require __DIR__ . '/../../db.php';

  $postData = file_get_contents('php://input');
  $data = json_decode($postData, true);

  $sql = 'TRUNCATE TABLE algorithm';
  $query = $pdo->prepare($sql);
  $query->execute();

  $sql = 'INSERT INTO algorithm(
      admin_id,
      date,
      content
      ) VALUES (
        :admin_id,
        :date,
        :content
      )';

  $counter = 0;

  foreach( $data['date'] as $value ) 
  {
    $query = $pdo->prepare($sql);
    
    $query->execute([
      'admin_id' => $_SESSION['admin']->id,
      'date' => $value,
      'content' => $data['content'][$counter]
    ]);

    $counter++;
  }

  print_r($data['date']);