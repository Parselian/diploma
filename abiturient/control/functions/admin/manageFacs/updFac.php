<?
require __DIR__ . '/../../db.php';

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$sql = 'UPDATE faculties SET faculty_name=:faculty_name WHERE faculty_id=:faculty_id';

$query = $pdo->prepare($sql);
$query->execute([
  'faculty_name' => $data['upd_fac_field'],
  'faculty_id' => $data['upd_selected_fac']
]);
