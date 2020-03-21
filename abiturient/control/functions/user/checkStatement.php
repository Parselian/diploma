<?

require '../db.php';

$sql = $pdo->query('SELECT * FROM statements');

$query = $sql->fetch();

if( $query === false || $query === null || $query === '' || $query === 0 ) 
{
  $query = false;
} 
  else 
{
  $query = true;
}

echo($query);
