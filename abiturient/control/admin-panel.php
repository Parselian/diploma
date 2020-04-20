<?

require 'functions/db.php';
// echo '<pre>';
//   var_dump($_SESSION['admin']);
// echo '</pre>';

if (empty($_SESSION['admin'])) {
  header('Location: ./index.php');
}
?>

<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap&subset=cyrillic" rel="stylesheet">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/main.css">
  <title>Админ-панель</title>
</head>

<body>

  <header class="header">
    <div class="container">
      <img src="img/logo.png" alt="Лого" class="header__logo">
      <div class="header-logined-wrap">
        <div class="header-logined-wrap__text">Здравствуйте, <? echo $_SESSION['admin']->login; ?></div>
        <!-- /.header-logined-wrap__text -->
        <a href="./functions/admin/logout.php" class="button header-logined-wrap__btn">выйти</a>
        <!-- /.header-logined-wrap__btn -->
      </div>
      <!-- /.header-logined-wrap -->
    </div>
    <!-- /.container -->
  </header>
  <!-- /.header -->

  <main class="main">
    <aside class="sidebar toggled">
      <ul class="sidebar-list">
        <li class="sidebar-list-item">
          <img src="img/home.svg" alt="home" class="sidebar-list-item__img">
          <a href="" class="sidebar-list-item__link active">Главная</a>
        </li>
        <!-- /.sidebar-list-item -->

        <li class="sidebar-list-item">
          <img src="img/document.svg" alt="form" class="sidebar-list-item__img">
          <a href="" class="sidebar-list-item__link">Заявки</a>
        </li>
        <!-- /.sidebar-list-item -->

        <li class="sidebar-list-item">
          <img src="img/faculty.svg" alt="fac" class="sidebar-list-item__img">
          <a href="" class="sidebar-list-item__link">Факультеты</a>
        </li>
        <!-- /.sidebar-list-item -->

        <li class="sidebar-list-item">
          <img src="img/specialty.svg" alt="spec" class="sidebar-list-item__img">
          <a href="" class="sidebar-list-item__link">Специальности</a>
        </li>
        <!-- /.sidebar-list-item -->

        <li class="sidebar-list-item">
          <img src="img/connection.svg" alt="user" class="sidebar-list-item__img">
          <a href="#algorithm" class="sidebar-list-item__link">Алгоритм</a>
        </li>
        <!-- /.sidebar-list-item -->

        <li class="sidebar-list-item">
          <img src="img/arrow.svg" alt="toggle" class="sidebar-list-item__img sidebar-list-item__img_toggle rotated">
          <a href="" class="sidebar-list-item__link sidebar-list-item__link_toggle">Свернуть</a>
        </li>
        <!-- /.sidebar-list-item -->
      </ul>
      <!-- /.sidebar-list -->
    </aside>
    <!-- /.sidebar -->

    <section class="section section-general">
      <h1 class="section__title">Добро пожаловать!</h1>
      <!-- /.section__title -->

      <div class="section-general-block">
        <h3 class="section-general-block__title">
          Обновить лого
        </h3>
        <!-- /.section-general-block__text -->
        
        <p class="section-general-block__subtext">
          Примечанине: логотип должен быть в формате .PNG!
        </p>

        <form id="form-upd-logo" class="section-general-form" method="POST" action="functions/admin/manageGenForms.php">
          <input type="file" name="upd-logo-input" class="section-general-form__input">

          <button type="submit" name="upd-logo-btn" class="form__button section-general-form__button">
            Обновить
          </button> <!-- /.form__button section-general-form__button -->
        </form>
        <!-- /.section-general-form -->
      </div>
      <!-- /.section-general-block -->

      <div class="section-general-block">
        <h3 class="section-general-block__title">
          Обновить шаблон заявки
        </h3>
        <!-- /.section-general-block__text -->

        <p class="section-general-block__subtext">
          Примечанине: шаблон должен быть в формате .PDF!
        </p>

        <form id="form-upd-request" class="section-general-form" method="POST" enctype="multipart/form-data">
          <input type="file" name="upd-request-input" class="section-general-form__input">

          <button type="submit" name="upd-request-btn" class="form__button section-general-form__button">
            Обновить
          </button> <!-- /.form__button section-general-form__button -->
        </form>
        <!-- /.section-general-form -->
      </div>
      <!-- /.section-general-block -->

      <div class="section-general-block">
        <h3 class="section-general-block__title">
          Обновить политику обработки ПД
        </h3>
        <!-- /.section-general-block__text -->

        <p class="section-general-block__subtext">
          Примечанине: политика должна быть в формате .PDF!
        </p>

        <form id="form-upd-polytics" class="section-general-form" method="POST" enctype="multipart/form-data">
          <input type="file" name="upd-request-input" class="section-general-form__input">

          <button type="submit" name="upd-request-btn" class="form__button section-general-form__button">
            Обновить
          </button> <!-- /.form__button section-general-form__button -->
        </form>
        <!-- /.section-general-form -->
      </div>
      <!-- /.section-general-block -->

      <div id="statistics-block" class="section-general-block">
        <h3 class="section-general-block__title">
          Статистика поступивших
        </h3>
        <!-- /.section-general-block__text -->
        <ul class="section-general-block__list">
          <li class="section-general-block__item">
            Прошли: <span id="statistics-approved"></span> чел.
          </li>
          <li class="section-general-block__item">
            Не прошли: <span id="statistics-denied"></span> чел.
          </li>
        </ul>
        <!-- /.section-general-block__text -->
      </div>
      <!-- /.section-general-block -->
    </section>
    <!-- /.section section-general -->

    <section class="section section-props hidden">
      <h2 class="section__title">Заявки</h2>
      <!-- /.section__title -->

      <div class="section-props-filtration">
        <select name="add_spec_fac" class="form__select section-props-filtration__select" required>
          <option value="none" disabled selected>Сортировка:</option>
          <option value="new">Сначала новые</option>
          <option value="checked">Сначала просмотренные</option>
          <option value="approved">Сначала принятые</option>
          <option value="denied">Сначала отклонённые</option>
          <option value="alphabet">По алфавиту</option>
        </select>

        <input id="upd-button" type="submit" class="button section-props-filtration__button" value="Обновить">
      </div>
      <!-- /.section-props-filtration -->
    </section>
    <!-- /.section section-props -->

    <section class="section section-faculty hidden">
      <div class="section-faculty-wrap">
        <form id="add-fac" action="admin-panel.php" method="POST" class="form section-faculty-form">
          <h2 class="form__title">Добавить факультет</h2>
          <!-- /.form__title -->

          <input type="text" name="add_fac_field" class="form__input" placeholder="Введите название" required>
          <button type="submit" name="add_fac_btn" class="button button_granted form__button">добавить</button>
        </form>
        <!-- /.form section-faculty-form -->

        <form id="upd-fac" action="admin-panel.php" method="POST" class="form section-faculty-form">
          <h2 class="form__title">Обновить факультет</h2>
          <!-- /.form__title -->

          <select name="upd_selected_fac" class="form__select form__select-fac" required>
            <option value="none" disabled selected>Выберите факультет</option>
          </select>

          <input type="text" class="form__input" name="upd_fac_field" placeholder="Введите название" required>
          <button type="submit" name="upd_fac_btn" class="button button_granted form__button">обновить</button>
        </form>
        <!-- /.form section-faculty-form -->

        <form id="del-fac" action="admin-panel.php" method="POST" class="form section-faculty-form">
          <h2 class="form__title">Удалить факультет</h2>
          <!-- /.form__title -->

          <select name="del_selected_fac" class="form__select  form__select-fac" required>
            <option value="none" disabled selected>Выберите факультет</option>
          </select>

          <button type="submit" name="del_fac_btn" class="button button_denied form__button">удалить</button>
        </form>
        <!-- /.form section-faculty-form -->
      </div>
      <!-- /.section-faculty-wrap -->
    </section>
    <!-- /.section section-faculty -->

    <section class="section section-specialty hidden">
      <form id="add-spec" action="admin-panel.php" method="POST" class="form section-specialty-form">
        <h2 class="form__title">Добавить специальность</h2>
        <!-- /.form__title -->

        <input type="text" name="add_spec_specname" class="form__input" placeholder="Введите название" required>

        <select name="add_spec_fac" class="form__select form__select-fac" required>
          <option value="none" disabled selected>Выберите факультет</option>
        </select>

        <div class="section-specialty-form-block">
          <input type="text" name="add_spec_exam1" class="form__input section-specialty-form__input_short" placeholder="назв. экзамена 1" required>
          <input type="text" name="add_spec_exam2" class="form__input section-specialty-form__input_short" placeholder="назв. экзамена 2" required>
          <input type="text" name="add_spec_exam3" class="form__input section-specialty-form__input_short" placeholder="назв. экзамена 3" required>
        </div>
        <!-- /.section-specialty-form-block -->

        <div class="section-specialty-form-block">
          <input type="text" name="add_spec_points1" class="form__input section-specialty-form__input_short" placeholder="баллы экзамен 1" required>
          <input type="text" name="add_spec_points2" class="form__input section-specialty-form__input_short" placeholder="баллы экзамен 2" required>
          <input type="text" name="add_spec_points3" class="form__input section-specialty-form__input_short" placeholder="баллы экзамен 3" required>
        </div>
        <!-- /.section-specialty-form-block -->

        <div class="section-specialty-form-block">
          <input type="text" name="add_spec_budget" class="form__input section-specialty-form__input_short" placeholder="бюджетных мест" required>
          <input type="text" name="add_spec_contract" class="form__input section-specialty-form__input_short" placeholder="платных мест" required>
          <input type="text" name="add_spec_type" class="form__input section-specialty-form__input_short" placeholder="тип обучения" required>
        </div>
        <!-- /.section-specialty-form-block -->

        <input type="submit" name="add_spec_btn" value="добавить" class="button button_granted form__button">
      </form>
      <!-- /.form section-specialty-form -->

      <form id="upd-spec" action="admin-panel.php" method="POST" class="form section-specialty-form">
        <h2 class="form__title">Обновить специальность</h2>
        <!-- /.form__title -->

        <select name="upd_spec_id" class="form__select form__select-spec" required>
          <option value="none" disabled selected>Выберите специальность</option>
        </select>

        <input type="text" name="upd_spec_specname" class="form__input" placeholder="Введите новое название" required>

        <select name="upd_spec_fac" class="form__select form__select-fac" required>
          <option value="none" disabled selected>Выберите факультет</option>
        </select>

        <div class="section-specialty-form-block">
          <input type="text" name="upd_spec_exam1" class="form__input section-specialty-form__input_short" placeholder="назв. экзамена 1" required>
          <input type="text" name="upd_spec_exam2" class="form__input section-specialty-form__input_short" placeholder="назв. экзамена 2" required>
          <input type="text" name="upd_spec_exam3" class="form__input section-specialty-form__input_short" placeholder="назв. экзамена 3" required>
        </div>
        <!-- /.section-specialty-form-block -->

        <div class="section-specialty-form-block">
          <input type="text" name="upd_spec_points1" class="form__input section-specialty-form__input_short" placeholder="баллы экзамен 1" required>
          <input type="text" name="upd_spec_points2" class="form__input section-specialty-form__input_short" placeholder="баллы экзамен 2" required>
          <input type="text" name="upd_spec_points3" class="form__input section-specialty-form__input_short" placeholder="баллы экзамен 3" required>
        </div>
        <!-- /.section-specialty-form-block -->

        <div class="section-specialty-form-block">
          <input type="text" name="upd_spec_budget" class="form__input section-specialty-form__input_short" placeholder="бюджетных мест" required>
          <input type="text" name="upd_spec_contract" class="form__input section-specialty-form__input_short" placeholder="платных мест" required>
          <input type="text" name="upd_spec_type" class="form__input section-specialty-form__input_short" placeholder="тип обучения" required>
        </div>
        <!-- /.section-specialty-form-block -->

        <input type="submit" name="upd_spec_btn" value="добавить" class="button button_granted form__button">
      </form>
      <!-- /.form section-specialty-form -->

      <form id="del-spec" action="admin-panel.php" method="POST" class="form section-specialty-form">
        <h2 class="form__title">Удалить специальность</h2>
        <!-- /.form__title -->

        <select name="del_spec_specid" class="form__select form__select-spec" required>
          <option value="none" disabled selected>
            Выберите специальность
          </option>
        </select>

        <input type="submit" name="del_spec_btn" value="удалить" class="button button_denied form__button">
      </form>
      <!-- /.form section-specialty-form -->
    </section>
    <!-- /.section section-specialty -->

    <section class="section section-algorithm hidden">
      <div class="section-algorithm-wrap">
        <form id="algorithm-form" action="admin-panel.php" method="POST" class="form section-algorithm-form">
          <h2 class="form__title">Алгоритм поступления</h2>
          <!-- /.form__title -->

          <div class="section-algorithm-form-buttons">
            <button id="add-field" class="button section-algorithm-form__button">
              Добавить поле
            </button> 
            <!-- /.button algorithm-form__button -->
            <button type="submit" id="send-algorithm" class="button section-algorithm-form__button">
              Отправить
            </button> 
            <!-- /.button algorithm-form__button -->
          </div>
          <!-- /.algorithm-form-buttons -->
        </form>
        <!-- /.form algorithm-form -->
      </div>
      <!-- /.section-algorithm-wrap -->
    </section>
    <!-- /.section section-algorithm hidden -->
  </main>
  <!-- /.main -->

  <script src="js/script.js"></script>
</body>

</html>