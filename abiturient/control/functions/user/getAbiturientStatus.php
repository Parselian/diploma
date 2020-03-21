<?
require '../db.php';

$sql = $pdo->query('SELECT * FROM statements');
$query = $sql->fetch();

$result;

if ($query === false || $query === null || $query === '' || $query === 0) 
{
  $result = false;
} 
  else 
{
  $abiturientStatus = R::findOne( 'abiturients', ' id = ? ', [(int) $_SESSION['abiturient']->id] );
  
  $result = $abiturientStatus->anket_status;
}

echo $result;
// echo $abiturientStatus->anket_status;

