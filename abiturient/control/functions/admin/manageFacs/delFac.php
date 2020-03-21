<?
require __DIR__ . '/../../db.php';

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$queryDelFac = $pdo->query('DELETE FROM faculties WHERE faculty_id=' . $data['del_selected_fac'] . '');