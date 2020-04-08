<?
require 'control/functions/db.php';
require 'control/functions/user/select-specialities.php';

// echo '<pre>'.
//   var_dump($_SESSION['abiturient'])
// .'</pre>';

if (empty($_SESSION['abiturient'])) {
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
  <link rel="stylesheet" href="assets/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/css/reset.css">
  <link rel="stylesheet" href="assets/css/account.css">
  <title>Document</title>
</head>

<body>

  <header class="header header_bordered">
    <div class="container header-wrap">
      <a href="#" class="header-logo">
        <img src="control/img/logo.png" alt="лого ВУЗа" class="header-logo__img">
      </a>
      <!-- /.header__link -->

      <svg class="ham hamRotate ham4 header-burger__btn" viewBox="0 0 100 100" width="60" onclick="this.classList.toggle('active')">
        <path class="line top" d="m 70,33 h -40 c 0,0 -8.5,-0.149796 -8.5,8.5 0,8.649796 8.5,8.5 8.5,8.5 h 20 v -20" />
        <path class="line middle" d="m 70,50 h -40" />
        <path class="line bottom" d="m 30,67 h 40 c 0,0 8.5,0.149796 8.5,-8.5 0,-8.649796 -8.5,-8.5 -8.5,-8.5 h -20 v 20" />
      </svg>

      <div class="buttons-wrap">
        <a href="./control/functions/user/logout.php" class="button button-authorization">
          <span class="button-authorization__text">Выйти</span>
        </a>
        <!-- /.authoriation__button -->
      </div>
      <!-- /.buttons-wrap -->
    </div>
    <!-- /.container -->
  </header>

  <section class="account">
    <div class="container account-wrap">
      <nav class="account-menu">
        <ul class="account-menu-list">
          <li class="account-menu-list__item">
            <a href="#timeline" class="account-menu-list__link active">Главная</a>
          </li>
          <!-- /.account-menu-list__item -->

          <li class="account-menu-list__item">
            <a href="#section-form" class="account-menu-list__link">Анкета</a>
          </li>
          <!-- /.account-menu-list__item -->

          <li class="account-menu-list__item">
            <a href="#statements" class="account-menu-list__link">Загрузка документов</a>
          </li>
          <!-- /.account-menu-list__item -->
        </ul>
        <!-- /.account-menu-list -->
      </nav>
      <!-- /.account-menu -->

      <div id="timeline" class="account-content timeline">
        <h2 class="account-content__title">план поступления</h2>

        <div id="popup-status" class="section-content-attention">
          <div class="section-content-attention__text">Для участия в конкурсе необходимо заполнить анкету!</div>
        </div>

        <div class="timeline-wrap"></div>
        <!-- /.section-content-wrap -->
      </div>

      <div id="section-form" class="account-content hidden">
        <form id="form" method="POST" action="control/functions/user/send-form.php" enctype="application/json">
          <div class="account-content-attention">
            <span class="account-content-attention__close">&times;</span>
            <!-- /.account-content-attention__close -->
            <div class="account-content-attention__text">Заполните все поля!</div>
            <!-- /.account-content-attention__text -->
          </div>
          <!-- /.account-content-attention -->
          
          <div class="account-form-block account-form-block_personal">
            <h2 class="account-content__title">Персональные данные</h2>
            <!-- /.account-content__title -->

            <div class="account-form-group">
              <label for="personal-surname" class="account-form__label account-form__label_required">Фамилия</label>
              <input id="personal-surname" type="text" class="account-form__input" name="form-surname" value="Вождаев" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="personal-name" class="account-form__label account-form__label_required">Имя</label>
              <input id="personal-name" type="text" name="form-abiname" class="account-form__input" value="Вячеслав" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="personal-patronymic" class="account-form__label account-form__label_required">Отчество</label>
              <input id="personal-patronymic" type="text" name="form-patronymic" class="account-form__input" value="Алексеевич" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="personal-borndate" class="account-form__label account-form__label_required">
                Дата рождения
              </label>
              <input id="personal-borndate" type="date" name="form-born_date" class="account-form__input" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="personal-country" class="account-form__label account-form__label_required">
                Страна рождения
              </label>
              <input id="personal-country" type="text" name="form-born_country" class="account-form__input" value="Россия" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="personal-city" class="account-form__label account-form__label_required">
                Город рождения
              </label>
              <input id="personal-city" type="text" name="form-born_city" class="account-form__input" value="Санкт-Петербург" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="personal-citizenship" class="account-form__label account-form__label_required">Гражданство</label>
              <input id="personal-citizenship" type="text" name="form-citizenship" class="account-form__input" value="Российское" required>
            </div>
            <!-- /.account-form-group -->

            <input id="button_personal" type="button" class="button account-form__button account-form__button_next" value="Далее">
            <!-- /.account-form__button -->
          </div>
          <!-- /.account-form-block -->

          <div class="account-form-block account-form-block_passport hidden">
            <h2 class="account-content__title">Паспортные данные</h2>
            <!-- /.account-content__title -->

            <div class="account-form-group">
              <label for="passport-series" class="account-form__label account-form__label_required">Серия</label>
              <input id="passport-series" type="text" name="form-pass_series" class="account-form__input" value="1234" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="passport-number" class="account-form__label account-form__label_required">Номер</label>
              <input id="passport-number" type="text" name="form-pass_number" class="account-form__input" value="123456" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="passport-place" class="account-form__label account-form__label_required">Кем выдан</label>
              <input id="passport-place" type="text" name="form-pass_whogive" class="account-form__input" value="УФМС" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="passport-date" class="account-form__label account-form__label_required">
                Дата выдачи
              </label>
              <input id="passport-date" type="date" name="form-pass_date" class="account-form__input" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="passport-SNILS" class="account-form__label account-form__label">СНИЛС</label>
              <input id="passport-SNILS" type="text" name="form-pass_snils" class="account-form__input" value="123-456-789-01">
            </div>
            <!-- /.account-form-group -->

            <input type="button" class="button account-form__button account-form__button_prev account-form__button_passport" value="Назад">
            <!-- /.account-form__button -->

            <input type="button" class="button account-form__button account-form__button_next" value="Далее">
            <!-- /.account-form__button -->
          </div>
          <!-- /.account-form-block -->

          <div class="account-form-block account-form-block_contacts hidden">
            <h2 class="account-content__title">Контакты</h2>
            <!-- /.account-content__title -->

            <div class="account-form-group">
              <label for="contacts-phone" class="account-form__label account-form__label_required">Телефон</label>
              <input id="contacts-phone" type="text" name="form-contacts_phone" class="account-form__input" value="+7 (921) 574-15-42" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="contacts-email" class="account-form__label account-form__label_required">
                EMAIL
              </label>
              <input id="contacts-email" type="email" name="form-contacts_email" class="account-form__input" value="example@ya.ru" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-content__subtitle">Адрес регистрации:</div>
            <!-- /.account-content__title -->

            <div class="account-form-group">
              <label for="contacts-city" class="account-form__label account-form__label_required">Город</label>
              <input id="contacts-city" type="text" name="form-contacts_regcity" class="account-form__input" value="Санкт-Петербург" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="contacts-street" class="account-form__label account-form__label_required">Улица</label>
              <input id="contacts-street" type="text" name="form-contacts_regstreet" class="account-form__input" value="Руставелли" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="contacts-house" class="account-form__label account-form__label account-form__label_required">Дом</label>
              <input id="contacts-house" type="text" name="form-contacts_reghouse" class="account-form__input" value="12 лит.А" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="contacts-flat" class="account-form__label account-form__label_required">Квартира</label>
              <input id="contacts-flat" type="text" name="form-contacts_regflat" class="account-form__input" value="142" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="contacts-index" class="account-form__label account-form__label account-form__label_required">Индекс</label>
              <input id="contacts-index" type="text" name="form-contacts_regindex" class="account-form__input" value="123456" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-content__subtitle">Адрес проживания (если отличается):</div>
            <!-- /.account-content__title -->

            <div class="account-form-group unnecessary">
              <label for="contacts-alt-city" class="account-form__label account-form__label">Город</label>
              <input id="contacts-alt-city" type="text" name="form-contacts_livecity" class="account-form__input" value="Москва">
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group unnecessary">
              <label for="contacts-alt-street" class="account-form__label account-form__label">Улица</label>
              <input id="contacts-alt-street" type="text" name="form-contacts_livestreet" class="account-form__input" value="Ленина">
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group unnecessary">
              <label for="contacts-alt-house" class="account-form__label account-form__label account-form__label">Дом</label>
              <input id="contacts-alt-house" type="text" name="form-contacts_livehouse" class="account-form__input" value="8">
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group unnecessary">
              <label for="contacts-alt-flat" class="account-form__label account-form__label">Квартира</label>
              <input id="contacts-alt-flat" type="text" name="form-contacts_liveflat" class="account-form__input" value="14">
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group unnecessary">
              <label for="contacts-alt-index" class="account-form__label account-form__label account-form__label">Индекс</label>
              <input id="contacts-alt-index" type="text" name="form-contacts_liveindex" class="account-form__input" value="123456">
            </div>
            <!-- /.account-form-group -->

            <input type="button" class="button account-form__button account-form__button_prev" value="Назад">
            <!-- /.account-form__button -->

            <input type="button" class="button account-form__button account-form__button_next" value="Далее">
            <!-- /.account-form__button -->
          </div>
          <!-- /.account-form-block -->

          <div class="account-form-block account-form-block_education hidden">
            <h2 class="account-content__title">Образование</h2>
            <!-- /.account-content__title -->

            <div class="account-form-group">
              <label for="education-completed" class="account-form__label account-form__label_required">Последнее образование</label>
              <select name="form-edu_lastedu" id="education-completed" class="account-form__input">
                <option value="школа">Школа</option>
                <option value="ВУЗ">ВУЗ</option>
                <option value="СПО">СПО</option>
                <option value="НПО">НПО</option>
              </select>
              <!-- <input id="education-completed" type="text" class="account-form__input" value="думаю вставить список с заранее сделанными вариками" required> -->
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="education-name" class="account-form__label account-form__label_required">
                Название уч. заведения
              </label>
              <input id="education-name" type="text" name="form-edu_name" class="account-form__input" value="шарага" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="education-country" class="account-form__label account-form__label_required">Страна обучения</label>
              <input id="education-country" type="text" name="form-edu_country" class="account-form__input" value="Россия" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="education-date" class="account-form__label account-form__label_required">дата окончания</label>
              <input id="education-date" type="date" name="form-edu_date" class="account-form__input" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="education-series" class="account-form__label account-form__label account-form__label_required">Серия</label>
              <input id="education-series" type="text" name="form-edu_series" class="account-form__input" value="123456" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="education-number" class="account-form__label account-form__label_required">Номер</label>
              <input id="education-number" type="text" name="form-edu_number" class="account-form__input" value="1234567" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="education-points" class="account-form__label account-form__label account-form__label">Средний балл</label>
              <input id="education-points" type="text" name="form-edu_points" class="account-form__input" value="4.2" required>
            </div>
            <!-- /.account-form-group -->

            <div class="account-form-group">
              <label for="education-specialty" class="account-form__label account-form__label_required">Желаемая специальность</label>

              <select name="form-edu_specialty" id="education-specialty" class="account-form__input">
                <?
                while ($spec = $querySpecs->fetch()) {
                  echo "
                      <option value=" . $spec['specialty_id'] . ">" . $spec['specialty_name'] . "
                      </option>";
                }
                ?>
              </select>
            </div>
            <!-- /.account-form-group -->

            <input type="button" class="button account-form__button account-form__button_prev" value="Назад">
            <!-- /.account-form__button -->

            <input type="submit" name="send_btn" class="button account-form__button account-form__button_next" value="Отправить">
            <!-- /.account-form__button -->
          </div>
          <!-- /.account-form-block -->
        </form>
        <!-- /.account-form -->
      </div>
      <!-- /.account-content -->

      <div id="statements" class="account-content hidden">
        <h2 class="account-content__title">Загрузка документов</h2>
        <!-- /.account-content__title -->

        <div id="documents-alert" class="section-content-attention hidden">
          <div class="section-content-attention__text">Сначала необходимо отправить анкету!</div>
        </div>

        <div class="account-documents__statement">
          Скачать образец заявления вы можете
          <a href="control/uploads/documents/document.docx" class="account-documents__link">по этой ссылке</a>
        </div>
        <!-- /.account-documents__statement -->

        <form id="form-files" class="account-form" action="control/functions/user/update-statement.php" method="POST" enctype="multipart/form-data">
          <ul class="account-documents-list">
            <li class="account-documents-list__item">
              <div class="account-documents-list__item-title">Паспорт</div>
              <!-- /.account-list__item-title -->
              <input type="file" name="documents_passport" class="account-documents-list__item-input" required>
            </li>
            <!-- /.account-documents-list__item -->
            <li class="account-documents-list__item">
              <div class="account-documents-list__item-title">Фото</div>
              <!-- /.account-list__item-title -->
              <input type="file" name="documents_photo" class="account-documents-list__item-input" required>
            </li>
            <!-- /.account-documents-list__item -->
            <li class="account-documents-list__item">
              <div class="account-documents-list__item-title">Заявление</div>
              <!-- /.account-list__item-title -->
              <input type="file" name="documents_statement" class="account-documents-list__item-input" required>
            </li>
            <!-- /.account-documents-list__item -->
          </ul>
          <!-- /.account-documents-list -->

          <button type="submit" class="button account-form__button account-form__button_next" name="send_files_btn">отправить</button>
        </form>
        <!-- /.account-form -->
      </div>
      <!-- /.account-content -->

    </div>
    <!-- /.container -->
  </section>
  <!-- /.account -->

  <script src="./assets/js/script-account.js"></script>
</body>

</html>