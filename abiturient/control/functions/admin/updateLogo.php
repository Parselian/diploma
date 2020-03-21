<?

$logo_name = 'logo' . stristr($_FILES['upd-logo-input']['name'], '.');
$logo_tmp_name = $_FILES['upd-logo-input']['tmp_name'];
$logo_path = __DIR__ . '/../../img/' . $logo_name;

move_uploaded_file($logo_tmp_name, $logo_path);

unset($_FILES);
