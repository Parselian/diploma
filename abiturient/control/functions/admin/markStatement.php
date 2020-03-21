<?
require __DIR__ . '/../db.php';

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$query = R::load( 'abiturients', $data['abiturient_id'] );
$query->anket_status = $data['verdict'];
R::store( $query );

$queryUpdChecked = $pdo->query('UPDATE statements SET checked = 1 WHERE statement_id = '.$data["statement_id"].'');

$queryUpdChecked->fetch();

unset($_POST);
