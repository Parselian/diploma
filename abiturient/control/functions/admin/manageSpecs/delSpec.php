<?
require __DIR__ . '/../../db.php';

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$queryDelSpec = $pdo->query('DELETE FROM specialties WHERE specialty_id=' . $data['del_spec_specid'] . '');