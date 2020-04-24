<?
require __DIR__ . '/../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  $postData = file_get_contents('php://input');
  $data = json_decode($postData, true);

  var_dump($postData);
  var_dump($data);
  
  $sql = 'INSERT INTO statements(
      abiturient_id,
      checked,
      anket_status,
      surname,
      abiname,
      patronymic,
      born_date,
      born_country,
      born_city,
      citizenship,
      passport_series,
      passport_number,
      passport_whogive,
      passport_date,
      snils,
      contacts_phone,
      contacts_email,
      contacts_regcity,
      contacts_regstreet,
      contacts_reghouse,
      contacts_regflat,
      contacts_regindex,
      contacts_livecity,
      contacts_livestreet,
      contacts_livehouse,
      contacts_liveflat,
      contacts_liveindex,
      edu_last,
      edu_name,
      edu_country,
      edu_finishyear,
      edu_series,
      edu_number,
      edu_points,
      edu_specialty
      ) VALUES (
        :abiturient_id,
        :checked,
        :anket_status,
        :surname,
        :abiname,
        :patronymic,
        :born_date,
        :born_country,
        :born_city,
        :citizenship,
        :pass_series,
        :pass_number,
        :pass_whogive,
        :pass_date,
        :snils,
        :contacts_phone,
        :contacts_email,
        :contacts_regcity,
        :contacts_regstreet,
        :contacts_reghouse,
        :contacts_regflat,
        :contacts_regindex,
        :contacts_livecity,
        :contacts_livestreet,
        :contacts_livehouse,
        :contacts_liveflat,
        :contacts_liveindex,
        :edu_last,
        :edu_name,
        :edu_country,
        :edu_finishyear,
        :edu_series,
        :edu_number,
        :edu_points,
        :edu_specialty    
    )';

  $query = $pdo->prepare($sql);

  $query->execute([
    'abiturient_id' => $_SESSION['abiturient']->id,
    'checked' => 'questionnaire-sent',
    'anket_status' => 'new',
    'surname' => $data["form-surname"],
    'abiname' => $data["form-abiname"],
    'patronymic' => $data["form-patronymic"],
    'born_date' => $data["form-born_date"],
    'born_country' => $data["form-born_country"],
    'born_city' => $data["form-born_city"],
    'citizenship' => $data["form-citizenship"],
    'pass_series' => (int) $data["form-pass_series"],
    'pass_number' => (int) $data["form-pass_number"],
    'pass_whogive' => $data["form-pass_whogive"],
    'pass_date' => $data["form-pass_date"],
    'snils' => (int) $data["form-pass_snils"],
    'contacts_phone' => $data["form-contacts_phone"],
    'contacts_email' => $data["form-contacts_email"],
    'contacts_regcity' => $data["form-contacts_regcity"],
    'contacts_regstreet' => $data["form-contacts_regstreet"],
    'contacts_reghouse' => $data["form-contacts_reghouse"],
    'contacts_regflat' => $data["form-contacts_regflat"],
    'contacts_regindex' => (int) $data["form-contacts_regindex"],
    'contacts_livecity' => $data["form-contacts_livecity"],
    'contacts_livestreet' => $data["form-contacts_livestreet"],
    'contacts_livehouse' => $data["form-contacts_livehouse"],
    'contacts_liveflat' => $data["form-contacts_liveflat"],
    'contacts_liveindex' => (int) $data["form-contacts_liveindex"],
    'edu_last' => $data["form-edu_lastedu"],
    'edu_name' => $data["form-edu_name"],
    'edu_country' => $data["form-edu_country"],
    'edu_finishyear' => $data["form-edu_date"],
    'edu_series' => $data["form-edu_series"],
    'edu_number' => $data["form-edu_number"],
    'edu_points' => $data["form-edu_points"],
    'edu_specialty' => $data["form-edu_specialty"]
  ]);

  // $abiturient = R::load( 'abiturients', $_SESSION['abiturient']->id );
  // $abiturient->anket_status = 'questionnaire-sent';
  // R::store( $abiturient );

  // unset($_POST);
  // header('Location: account.php');
}
