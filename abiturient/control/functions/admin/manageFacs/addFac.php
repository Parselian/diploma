<?
  require __DIR__ . '/../../db.php';
    
  $postData = file_get_contents('php://input');
  $data = json_decode($postData, true);
  
  $sql = 'INSERT INTO faculties(faculty_name) VALUES (:faculty_name)';
  
  $query = $pdo->prepare($sql);
  $query->execute(['faculty_name' => $data['add_fac_field']]);