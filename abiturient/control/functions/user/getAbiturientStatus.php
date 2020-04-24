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
  $anket_specs = [];
  $anket_verdicts = [];

  $anket_status = $pdo->query('SELECT * from statements st JOIN specialties sp ON st.edu_specialty=sp.specialty_id WHERE abiturient_id='. $_SESSION['abiturient']->id .'');
  $abiturientStatus = R::findOne( 'abiturients', ' id = ? ', [(int) $_SESSION['abiturient']->id] );

  while ( $anket_list = $anket_status->fetch() ) 
  {
    array_push($anket_verdicts, $anket_list['checked']);
    array_push($anket_specs, $anket_list['specialty_name']);
  }

  $result = (object) array(
    'abiturientStatus' => $abiturientStatus['anket_status'],
    'anketVerdicts' => $anket_verdicts,
    'anketSpecs' => $anket_specs
  );

  
  // $result = $abiturientStatus->anket_status;
}
print_r(json_encode($result));


// echo $result;
// echo $abiturientStatus->anket_status;

