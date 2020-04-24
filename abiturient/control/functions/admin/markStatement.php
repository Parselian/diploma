<?
$dsn = 'mysql:host=localhost;dbname=university';
$pdo = new PDO($dsn, 'windmymind', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$anketVerdict;
$anket_status = 'in-process';
$statement_id;

if ($data['verdict'] === 'approved') 
{
  $anket_status = 'new';
  $anketVerdict = 'approved';  
  $statement_id = $data['statement_id'];
} 
else if ($data['verdict'] === 'denied') 
{
  $anket_status = 'new';
  $anketVerdict = 'denied';
  $statement_id = $data['statement_id'];
}
else if ($data['verdict'] === 'close')
{
  $anket_status = 'new';
  $statement_id = $data['statement_id'];
}
else
{
  $statement_id = $data['state_id'];
}

if($data['verdict'] === 'approved' || $data['verdict'] === 'denied') 
{
  $sqlUpdChecked = 'UPDATE statements SET checked = :checked_status, anket_status = :anket_status WHERE statement_id = :statement_id';

  $queryUpdChecked = $pdo->prepare($sqlUpdChecked);
  $queryUpdChecked->execute([
    'checked_status' => $anketVerdict,
    'anket_status' => $anket_status,
    'statement_id' => $statement_id
  ]);
} 
else
{
  $anketVerdict = $pdo->query('SELECT checked FROM statements WHERE statement_id = '. $statement_id .'');
  $anketVerdict = $anketVerdict->fetch();

  $sqlUpdChecked = 'UPDATE statements SET checked = :checked_status, anket_status = :anket_status WHERE statement_id = :statement_id';
  
  $queryUpdChecked = $pdo->prepare($sqlUpdChecked);
  $queryUpdChecked->execute([
    'checked_status' => $anketVerdict['checked'],
    'anket_status' => $anket_status,
    'statement_id' => $statement_id
  ]);
}

unset($_POST);
