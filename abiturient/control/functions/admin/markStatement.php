<?
require __DIR__ . '/../db.php';

$postData = file_get_contents('php://input');

$data = json_decode($postData, true);

print_r($data);

$query = R::load( 'abiturients', $data['abiturient_id'] );
// $query->anket_status = $data['verdict'];
// R::store( $query );


if ($data['verdict'] === 'approved') {
  $anketVerdict = 1;  
} else if ($data['verdict'] === 'denied') {
  $anketVerdict = -1;
} else if ($data['verdict'] === 'in-process') {
  $anketVerdict = 2;

  $queryUpdChecked = $pdo->query('UPDATE statements SET checked = '. $anketVerdict .' WHERE statement_id = '.$data["state_id"].'');

$queryUpdChecked->fetch();
} else if ($postData == null) {
  $anketVerdict = 0;
}
echo $anketVerdict;

$queryUpdChecked = $pdo->query('UPDATE statements SET checked = '. $anketVerdict .' WHERE statement_id = '.$data["statement_id"].'');

$queryUpdChecked->fetch();

unset($_POST);
