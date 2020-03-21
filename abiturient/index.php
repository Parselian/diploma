
<?

  require 'control/functions/db.php';

  
  
  $data = $_POST;
  
  if( isset($data['send_form']) ) 
  {
    // session_start();
    $errors = array();
    $user = R::findOne('abiturients', 'login = ?', array($data['login']) );

    if( $user )
    {
      //Логин существует
      if( password_verify( $data['password'], $user->password ) )
      {
      //Все круто, логиним юзера
        $_SESSION['abiturient'] = $user;
      // echo '<div style="color: green">Вы успешно вошли, можете перейти в <a href="admin/admin-panel.php">админку</a>!</div>';
      header('Location: ./account.php');

      } else 
      {
        $errors[] = 'вы ввели не верный пароль!';
      }
    } else 
    {
      $errors[] = 'пользователь с таким логином не найден!';
    }

    if( !empty($errors) )
    {
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
      <form action="./index.php" method="POST" class="popup-form popup-authorization">
        <h1 class="popup__title">Войти</h1>
        <!-- /.popup__title -->
        <input id="login-login" name="login" type="text" class="popup-authorization__input" placeholder="Логин">

        <input id="login-password" name="password" type="password" class="popup-authorization__input" placeholder="Пароль">

        <div class="popup-authorization-checkbox">
          <input id="login-checkbox" type="checkbox" class="popup-authorization-checkbox__field">
          <label for="login-checkbox" class="popup-authorization-checkbox__label">Запомнить меня</label> 
          <!-- /.popup-authorization-input__label -->
        </div>
        <!-- /.popup-authorization-input -->

        <div class="buttons-wrap popup-buttons-wrap">
            <input type="submit" name="send_form" class="popup-form__button button-authorization" value="Войти">
            <!-- /.authoriation__button -->

            <a href="./sign-up.php" class="popup-form__button button-authorization">
              Зарегестрироваться
            </a> 
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