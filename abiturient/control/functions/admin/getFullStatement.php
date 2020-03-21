<?
require __DIR__ . '/../db.php';

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$fullStatement = $pdo->query('SELECT * from statements WHERE statement_id='.$data["state_id"].'');

$result = json_encode($fullStatement->fetch());

echo $result;  
unset($_GET);