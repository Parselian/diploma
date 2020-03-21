<?
require __DIR__ . '/../../db.php';

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$sql = 'INSERT INTO specialties(
  specialty_name,
  faculty_id,
  budget_places,
  contract_places,
  study_type,
  exam_1,
  exam_2,
  exam_3,
  exam_points_1,
  exam_points_2,
  exam_points_3
) VALUES(
  :specialty_name,
  :faculty_id,
  :budget_places,
  :contract_places,
  :study_type,
  :exam_1,
  :exam_2,
  :exam_3,
  :exam_points_1,
  :exam_points_2,
  :exam_points_3
)';

$query = $pdo->prepare($sql);
$query->execute([
  'specialty_name' => $data['add_spec_specname'],
  'faculty_id' => $data['add_spec_fac'],
  'budget_places' => $data['add_spec_budget'],
  'contract_places' => $data['add_spec_contract'],
  'study_type' => $data['add_spec_type'],
  'exam_1' => $data['add_spec_exam1'],
  'exam_2' => $data['add_spec_exam2'],
  'exam_3' => $data['add_spec_exam3'],
  'exam_points_1' => $data['add_spec_points1'],
  'exam_points_2' => $data['add_spec_points2'],
  'exam_points_3' => $data['add_spec_points3']
]);