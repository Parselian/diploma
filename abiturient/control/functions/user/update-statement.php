<?
require __DIR__ . '/../db.php';

if (isset($_POST['send_files_btn'])) {
  // var_dump($_FILES);

  $passport_name = 'user_id_' . $_SESSION['abiturient']->id;
  $passport_tmp_name = $_FILES['documents_passport']['tmp_name'];
  $passport_path = __DIR__ . '/../../uploads/passports/' . $passport_name;
  $passport_db_path = 'control/uploads/passports/' . $passport_name;

  $photo_name = 'user_id_' . $_SESSION['abiturient']->id;
  $photo_tmp_name = $_FILES['documents_photo']['tmp_name'];
  $photo_path = __DIR__ . '/../../uploads/photos/' . $photo_name;
  $photo_db_path = 'control/uploads/photos/' . $photo_name;

  $statement_name = 'user_id_' . $_SESSION['abiturient']->id;
  $statement_tmp_name = $_FILES['documents_statement']['tmp_name'];
  $statement_path = __DIR__ . '/../../uploads/statements/' . $statement_name;
  $statement_db_path = 'control/uploads/statements/' . $statement_name;

  move_uploaded_file($photo_tmp_name, $photo_path);
  move_uploaded_file($passport_tmp_name, $passport_path);
  move_uploaded_file($statement_tmp_name, $statement_path);

  $sql_send_docs = 'UPDATE statements SET
      checked = :checked_status,
      passport_link = :passport_path,
      photo_link = :photo_path,
      statement_link = :statement_path 
      WHERE abiturient_id = ' . $_SESSION['abiturient']->id . '';

  $query_send_docs = $pdo->prepare($sql_send_docs);
  $query_send_docs->execute([
    'checked_status' => 'documents-sent',
    'passport_path' => $passport_db_path,
    'photo_path' => $photo_db_path,
    'statement_path' => $statement_db_path
  ]);

  // $abiturient = R::load( 'abiturients', $_SESSION['abiturient']->id );
  // $abiturient->anket_status = 'documents-sent';
  // R::store( $abiturient );

  unset($_POST);
  unset($_FILES);
  header('Location: ../../../account.php');
}