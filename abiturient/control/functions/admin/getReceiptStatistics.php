<?
require __DIR__ . '/../db.php';

$result = [];

$abiturientStatus = R::findAll('abiturients');

foreach($abiturientStatus as $key) {
  array_push($result, $key->anket_status);
}

return print_r( json_encode($result));

print_r($result);