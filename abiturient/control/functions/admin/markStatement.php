<?
$dsn = 'mysql:host=localhost;dbname=university';
$pdo = new PDO($dsn, 'windmymind', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

// print_r($data);

if ($data['verdict'] === 'approved') {
  $anketVerdict = 'approved';  
} else if ($data['verdict'] === 'denied') {
  $anketVerdict = 'denied';
} else if ($data['verdict'] === 'in-process') {
  $anketVerdict = "in-process";

  $sqlUpdChecked = 'UPDATE statements SET checked = :checked_status WHERE statement_id = :statement_id';

  $queryUpdChecked = $pdo->prepare($sqlUpdChecked);
  $queryUpdChecked->execute([
    'checked_status' => $anketVerdict,
    'statement_id' => $data["state_id"]
  ]);
} 

$sqlUpdChecked = 'UPDATE statements SET checked = :checked_status WHERE statement_id = :statement_id';

$queryUpdChecked = $pdo->prepare($sqlUpdChecked);
$queryUpdChecked->execute([
  'checked_status' => $anketVerdict,
  'statement_id' => $data["statement_id"]
]);

$queryUpdChecked->fetch();

unset($_POST);
