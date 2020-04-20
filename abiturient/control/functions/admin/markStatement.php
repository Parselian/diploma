<?
require __DIR__ . '/../db.php';

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);


$query = R::load( 'abiturients', $data['abiturient_id'] );
$query->anket_status = $data['verdict'];
R::store( $query );

if ($data['verdict'] === 'approved') {
  $anketVerdict = 1;  
} else if ($data['verdict'] === 'denied') {
  $anketVerdict = -1;
} else {
  $anketVerdict = 0;
}
print_r($anketVerdict);

$queryUpdChecked = $pdo->query('UPDATE statements SET checked = '. $anketVerdict .' WHERE statement_id = '.$data["statement_id"].'');

$queryUpdChecked->fetch();

unset($_POST);
