<?
require __DIR__ . '/../../db.php';

$postData = file_get_contents('php://input');
$data = json_decode($postData, true);

$sql = 'UPDATE specialties SET
  specialty_name=:specialty_name,
  faculty_id=:faculty_id,
  budget_places=:budget_places,
  contract_places=:contract_places,
  study_type=:study_type,
  exam_1=:exam_1,
  exam_2=:exam_2,
  exam_3=:exam_3,
  exam_points_1=:exam_points_1,
  exam_points_2=:exam_points_2,
  exam_points_3=:exam_points_3 WHERE specialty_id=:specialty_id';

$query = $pdo->prepare($sql);
$query->execute([
  'specialty_id' => $data['upd_spec_id'],
  'specialty_name' => $data['upd_spec_specname'],
  'faculty_id' => $data['upd_spec_fac'],
  'budget_places' => $data['upd_spec_budget'],
  'contract_places' => $data['upd_spec_contract'],
  'study_type' => $data['upd_spec_type'],
  'exam_1' => $data['upd_spec_exam1'],
  'exam_2' => $data['upd_spec_exam2'],
  'exam_3' => $data['upd_spec_exam3'],
  'exam_points_1' => $data['upd_spec_points1'],
  'exam_points_2' => $data['upd_spec_points2'],
  'exam_points_3' => $data['upd_spec_points3']
]);
