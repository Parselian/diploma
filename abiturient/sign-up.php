<?
require __DIR__ . '/control/functions/db.php';

$data = $_POST;

if (isset($data['send_form'])) {
  //регистрируем пользователя

  if (trim($data['login'] === '')) {
    $errors[] = 'Введите логин!';
  }

  if (trim($data['email'] === '')) {
    $errors[] = 'Введите email!';
  }

  if ($data['password'] === '') {
    $errors[] = 'Введите пароль!';
  }

  if ($data['password_2'] !== $data['password']) {
    $errors[] = 'Повторный пароль введен неверно!';
  }

  if (R::count('abiturients', 'login = ?', array($data['login'])) > 0) {
    $errors[] = 'Пользователь с таким логином уже существует!';
  }

  if (R::count('abiturients', 'email = ?', array($data['email'])) > 0) {
    $errors[] = 'Пользователь с таким email уже существует!';
  }

  if (empty($errors)) {
    //Все гуд, регистрируем пользователя
    $user = R::dispense('abiturients');
    $user->login = $data['login'];
    $user->email = $data['email'];
    $user->password = password_hash($data['password'], PASSWORD_DEFAULT);
    R::store($user);

    header('Location: success.php');
    // echo '<div style="color: green">Вы успешно зареганы!</div>';
  } else {
    echo '<div style="color: red">' . array_shift($errors) . '</div>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700&display=swap&subset=cyrillic" rel="stylesheet">
  <link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/css/reset.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <title>Document</title>
</head>

<body>
  <section class="popup">
    <div class="container popup-wrap">
      <form action="sign-up.php" method="POST" class="popup-form popup-authorization">
        <h1 class="popup__title">Регистрация</h1>
        <!-- /.popup__title -->
        <input id="login-login" name="login" type="text" class="popup-authorization__input" placeholder="Логин" value="<? echo @$data['login'] ?>">

        <input id="login-email" name="email" type="text" class="popup-authorization__input" placeholder="Email" value="<? echo @$data['email'] ?>">

        <input id="login-password" name="password" type="password" class="popup-authorization__input" placeholder="Пароль" value="<? echo @$data['password'] ?>">

        <input id="login-password_2" name="password_2" type="password" class="popup-authorization__input" placeholder="Пароль еще раз" value="<? echo @$data['password_2'] ?>">

        <div class="popup-authorization-checkbox">
          <input id="login-checkbox" type="checkbox" class="popup-authorization-checkbox__field" required>
          <label for="login-checkbox" class="popup-authorization-checkbox__label">
            Согласие на <a href="./control/uploads/documents/polytics.doc" class="personal-data__link">обработку персональных данных</a>
          </label>
          <!-- /.popup-authorization-input__label -->
        </div>
        <!-- /.popup-authorization-input -->

        <div class="buttons-wrap popup-buttons-wrap">
          <a href="index.php" class="popup-form__button button-authorization">
            Войти
          </a>
          <!-- /.authoriation__button -->
          <button type="submit" name="send_form" class="popup-form__button button-authorization">
            Зарегестрироваться
          </button>
          <!-- /.authoriation__button -->
        </div>
        <!-- /.buttons-wrap -->
      </form>
      <!-- /.popup popup-authorization -->
    </div>
    <!-- /.container wrap -->
  </section>
  <!-- /.login -->
</body>

</html>