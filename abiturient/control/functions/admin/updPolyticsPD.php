<?

$document_name = 'polytics' . stristr($_FILES['upd-request-input']['name'], '.');
$document_tmp_name = $_FILES['upd-request-input']['tmp_name'];
$document_path = __DIR__ . '/../../uploads/documents/' . $document_name;

move_uploaded_file($document_tmp_name, $document_path);

unset($_FILES);
