'use-strict';

document.addEventListener('DOMContentLoaded', () => {

  /* УПРАВЛЕНИЕ САЙДБАРОМ */
  const toggleMenu = () => {
    const sidebar = document.querySelector('.sidebar'),
          sidebarImg = sidebar.querySelector('.sidebar-list-item__img_toggle');

    if( document.documentElement.clientWidth > 993 ) {
      sidebar.classList.remove('toggled');
      sidebarImg.classList.remove('rotated');
    }

    sidebar.addEventListener('click', (e) => {
      e.preventDefault();
      const target = e.target;
      
      if ( target.matches('.sidebar-list-item__link_toggle, .sidebar-list-item__img_toggle') ) {
        sidebar.classList.toggle('toggled');
        sidebarImg.classList.toggle('rotated');
      }
    });
  };
  toggleMenu();

  /* ПЕРЕКЛЮЧЕНИЕ СЕКЦИЙ АДМИНКИ */
  const toggleTabs = () => {

    const sidebar = document.querySelector('.sidebar'),
          menuTabs = sidebar.querySelectorAll('li.sidebar-list-item > a'),
          sections = document.querySelectorAll('.section'),
          sidebarImg = sidebar.querySelector('.sidebar-list-item__img_toggle');

    sidebar.addEventListener('click', (e) => {
      e.preventDefault();
      const target = e.target;

      const showSection = (index) => {
        sections.forEach(item => {
          if( !item.classList.contains('hidden') ) {
            item.classList.add('hidden');
          }
        });

        menuTabs.forEach( item => {
          if( item.classList.contains('active') ) {
            item.classList.remove('active');
          }
        });

        sections[index].classList.remove('hidden');
        menuTabs[index].classList.add('active');
      };

      if (target.matches('.sidebar-list-item__link')) {
        menuTabs.forEach((item, i) => {
          
          if ( target === item && !target.classList.contains('sidebar-list-item__link_toggle') ) {
            showSection(i);

            if( document.documentElement.clientWidth <= 993 ) {
              sidebar.classList.toggle('toggled');
              sidebarImg.classList.toggle('rotated');
            }
          }
        });
      }
    });
  };
  toggleTabs();

  /* GET RECEIPT STATISTICS */
  const getReceiptStatistics = () => {
    const statisticsApproved = document.getElementById('statistics-approved'),
          statisticsDenied = document.getElementById('statistics-denied');
    
    return fetch('functions/admin/getReceiptStatistics.php')
      .then(response => {
        if( response.status !== 200 ) {
          manageAttention('Ошибка!', 'section-content-attention_error');
          
          throw new Error('Error! Network status not 200');
        }
        return response.json();
      })
      .then(data => {
        let approvedCounter = 0,
            deniedCounter = 0;

        data.forEach(item => {
          if( item === 'approved' ) {
            approvedCounter++;
          } else if( item === 'denied' ) {
            deniedCounter++;
          }
        });

        statisticsApproved.textContent = approvedCounter;
        statisticsDenied.textContent = deniedCounter;
      })
      .catch(error => console.error(error));
  };
  getReceiptStatistics();

  /* ОТОБРАЖЕНИЕ СПИСКА ЗАЯВОК НА ВКЛАДКЕ "ЗАЯВКИ" */
  const outputStatements = () => {
    const sectionProps = document.querySelector('.section-props');

    return fetch('functions/admin/manageStatements.php')
      .then(response => {
        if( response.status !== 200 ) {
          manageAttention('Ошибка!', 'section-content-attention_error');
          throw new Error('Error! network status not 200');
        }

        return response.json();
      })
      .then(data => {
        const allStatements = document.querySelectorAll('.section-props-block');

        allStatements.forEach(item => {
          item.remove();
        });

        data.statementsId.forEach((item, i) => {
          let button;

          if (data.anketStatus[i] === 'in-process') {
            button = `
            <div class="section-props-block__buttons">
              <input type="submit" name="get_statement_btn" class="button section-props-block__btn" value="Посмотреть">
              <div class="section-props-block__hourglasses"></div>
            </div>
            `;
          } else if (data.checked[i] === 'approved' &&
          data.anketStatus[i] === 'new') {
            button = `
            <div class="section-props-block__buttons">
              <input type="submit" name="get_statement_btn" class="button section-props-block__btn" value="Посмотреть">
              <div class="section-props-block__glockoma"></div>
            </div>
            `;
          } else if (data.checked[i] === 'denied' &&
          data.anketStatus[i] === 'new') {
            button = `
            <div class="section-props-block__buttons">
              <input type="submit" name="get_statement_btn" class="button section-props-block__btn" value="Посмотреть">
              <div class="section-props-block__denied"></div>
            </div>
            `;
          } else {
            button = `
            <div class="section-props-block__buttons">
              <input type="submit" name="get_statement_btn" class="button section-props-block__btn" value="Посмотреть">
            </div>`;
          }

          sectionProps.insertAdjacentHTML('beforeend', `
            <div class="section-props-block">
              <form id="statement-${item}" method="GET" class="form section-props-form">
                <input type="text" name="state_id" value="${item}" class="section-props-block__input hidden" required>

                <div class="section-props-block__info">
                  <div class="section-props-block__name">
                    ${data.abiNames[i]}
                  </div>
                  <!-- /.section-props-block__name -->

                  <div class="section-props-block__spec">
                    ${data.specialtyNames[i]}
                  </div>
                  <!-- /.section-props-block__spec -->
                </div>
                <!-- /.section-props-block__info -->
                
                ${button}

              </form>
              <!-- /.form -->
            </div>
          `);
        });

        sortStatements();
      })
      .catch(error => console.error(error));
  };
  outputStatements();

  /* UPDATING STATEMENTS LIST */
  const updStatementsList = () => {
    const updButton = document.getElementById('upd-button'),
          filtrationSelect = document.querySelector('.section-props-filtration__select');
    
    updButton.addEventListener('click', () => {
      filtrationSelect.value = 'none';
      outputStatements();
    });
  };
  updStatementsList();

  /* SORTING STATEMENTS */
  const sortStatements = () => {
    const sectionProps = document.querySelector('.section-props'),
          filtrationWrap = document.querySelector('.section-props-filtration'),
          filtrationSelect = filtrationWrap.querySelector('.section-props-filtration__select');
      
    const buttonCheck = () => {
      const allStatements = document.querySelectorAll('.section-props-block');
      
      allStatements.forEach(item => {
        let statementButton = item.children[0].lastElementChild.lastElementChild;

        switch (filtrationSelect.value) {
          case 'new':
            if (statementButton.getAttribute('name') === 'get_statement_btn') {
              item.remove();
              filtrationWrap.insertAdjacentElement('afterend', item);
            }
            return;
          case 'in_process':
            if (statementButton.classList.contains('section-props-block__hourglasses')) {
              item.remove();
              filtrationWrap.insertAdjacentElement('afterend', item);
            }
            return;
          case 'approved':
            if (statementButton.classList.contains('section-props-block__glockoma')) {
              item.remove();
              filtrationWrap.insertAdjacentElement('afterend', item);
            }
            return;
          case 'denied':
            if (statementButton.classList.contains('section-props-block__denied')) {
              item.remove();
              filtrationWrap.insertAdjacentElement('afterend', item);
            }
            return;
        }
      });
    };

    const alphabetSort = () => {
      let array = Array.from(document.querySelectorAll('.section-props-block'));
      
      array.sort( (a, b) => a.innerText > b.innerText ? 1 : -1 );
      
      array.forEach(item => {
        item.remove();

        sectionProps.insertAdjacentElement('beforeend', item);
      });
    };

    filtrationSelect.addEventListener('change', () => {
      if (filtrationSelect.value !== 'alphabet') {
        buttonCheck();
      } else {
        alphabetSort();
      }
    });
  };

  /* ОТОБРАЖЕНИЕ ПОДРОБНОЙ ИНФОРМАЦИИ ПО ВЫБРАННОЙ ЗАЯВКЕ */
  const showStatement = () => {
    const propsWrap = document.querySelector('.section-props'),
          mainWrap = document.querySelector('.main');

    propsWrap.addEventListener('click', (e) => {
      const target = e.target;

      if( target.matches('.section-props-block__btn') ) {
        target.closest('form').addEventListener('submit', (e) => {
          e.preventDefault();

          let formData = new FormData(target.parentNode.parentNode);

          formData.append('verdict', 'in-process');
          
          let body = {};

          for (let val of formData.entries()) {
            body[val[0]] = val[1];
          }

          const sendForm = (data) => {
            return fetch('../control/functions/admin/markStatement.php', {
              method: 'POST',
              headers: {
                'Content-Type': 'application / json'
              },
              body: JSON.stringify(data)
            });
          };

          sendForm(body)
            .then(response => {
              if (response.status !== 200) {
                manageAttention('Ошибка!', 'section-content-attention_error');

                throw new Error('Ошибка! статус ответа от сервера не 200!');
              }
            })
            .catch(error => console.error(error));

          getFullInfo(body);
        });
      }
    });

    const getFullInfo = (data) => {
      fetch('../control/functions/admin/getFullStatement.php', {
        method: 'POST', 
        headers: {
          'Content-Type': 'application / json'
        },
        body: JSON.stringify(data)
      })
        .then(response => {
          if( response.status !== 200 ) {
            throw new Error('Ошибка, статус ответа не 200!');
          }

          return response.json();
        })
        .then(data => {

          [...mainWrap.children].forEach(item => {
            if(!item.classList.contains('hidden')) {
              item.classList.add('hidden');
            }
          });

          mainWrap.insertAdjacentHTML('beforeend', `
          <section class="section section-statement">
            <div class="section-statement-column">
              <div class="section-statement-block">
                <div class="section-statement-block__title">Личные данные</div>
                <!-- /.section-statement-block__title -->

                <div class="section-statement-field">
                  <div class="section-statement-field__title">Фамилия</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[4]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Имя</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[5]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Отчество</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[6]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Дата рождения</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[7]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Страна</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[8]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Город</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[9]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Гражданство</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[10]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
              </div>
              <!-- /.section-statement-block -->

              <div class="section-statement-block section-statement-block_second">
                <div class="section-statement-block__title">Паспортные данные</div>
                <!-- /.section-statement-block__title -->

                <div class="section-statement-field">
                  <div class="section-statement-field__title">Серия</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[11]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Номер</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[12]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Кем выдан</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[13]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Дата выдачи</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[14]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">СНИЛС</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[15]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
              </div>
              <!-- /.section-statement-block -->
            </div>
            <!-- /.section-statement-column -->

            <div class="section-statement-column">
              <div class="section-statement-block">
                <div class="section-statement-block__title">Контакты</div>
                <!-- /.section-statement-block__title -->

                <div class="section-statement-field">
                  <div class="section-statement-field__title">Телефон</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[16]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Эл. почта</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[17]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->

                <div class="section-statement-block__title">Адрес регистрации</div>
                <!-- /.section-statement-block__title -->

                <div class="section-statement-field">
                  <div class="section-statement-field__title">Город</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[18]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Улица</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[19]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Дом</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[20]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Квартира</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[21]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Индекс</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[22]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
              </div>
              <!-- /.section-statement-block -->

              <div class="section-statement-block">
                <div class="section-statement-block__title">Адрес проживания</div>
                <!-- /.section-statement-block__title -->

                <div class="section-statement-field">
                  <div class="section-statement-field__title">Город</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[23]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Улица</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[24]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Дом</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[25]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                <div class = "section-statement-field__title"> Квартира </div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[26]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
                <div class="section-statement-field">
                  <div class="section-statement-field__title">Индекс</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[27]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
              </div>
              <!-- /.section-statement-block -->
            </div>
            <!-- /.section-statement-column -->

            <div class="section-statement-column">
              <div class="section-statement-block">
                <div class="section-statement-block__title">Образование</div>
                <!-- /.section-statement-block__title -->

                <div class="section-statement-field">
                  <div class="section-statement-field__title">
                    Последнее образование
                  </div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[28]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->

                <div class="section-statement-field">
                  <div class="section-statement-field__title">
                    Название уч. заведения
                  </div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[29]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->

                <div class="section-statement-field">
                  <div class="section-statement-field__title">
                    Страна обучения
                  </div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[30]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->

                <div class="section-statement-field">
                  <div class="section-statement-field__title">Год окончания</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[31]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->

                <div class="section-statement-field">
                  <div class="section-statement-field__title">Серия</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[32]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->

                <div class="section-statement-field">
                  <div class="section-statement-field__title">Номер</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[33]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->

                <div class="section-statement-field">
                  <div class="section-statement-field__title">Средний балл</div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data[34]}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->

                <div class="section-statement-field">
                  <div class="section-statement-field__title">
                    Желаемая спец-ность
                  </div>
                  <!-- /.section-statement-field__title -->
                  <div class="section-statement-field__field">
                    ${data['specialty_name']}
                  </div>
                  <!-- /.section-statement-field__field -->
                </div>
                <!-- /.section-statement-field -->
              </div>
              <!-- /.section-statement-block -->

              <div class="section-statement-block">
                <div class="section-statement-link">
                  <span class="section-statement-link__label">Паспорт - </span>
                  <a href="../${data[36]}" class="section-statement-link__link" target="_blank">
                    Ссылка на файл
                  </a>
                </div>
                <!-- /.section-statement-link -->

                <div class="section-statement-link">
                  <span class="section-statement-link__label">Фото - </span>
                  <a href="../${data[37]}" class="section-statement-link__link" target="_blank">
                    Ссылка на файл
                  </a>
                </div>
                <!-- /.section-statement-link -->

                <div class="section-statement-link">
                  <span class="section-statement-link__label">Заявление - </span>
                  <a href="../${data[38]}"
                  class="section-statement-link__link"
                  target="_blank">
                    Ссылка на файл
                  </a>
                </div>
                <!-- /.section-statement-link -->

                <form id="check-statement" method="POST" class="section-statement-buttons">
                  <input type="text" name="abiturient_id" value="${data[1]}" class="section-props-block__input hidden">

                  <button type="submit" name="check-statement_approved"
                  class="button button_granted section-statement-buttons__button" value="approved">прошёл</button>

                  <button type="submit" name="check-statement_button" class="button button_denied section-statement-buttons__button" value="denied">не прошёл</button>

                  <button type="submit" name="check-statement_button" class="button button_close section-statement-buttons__button" value="close">закрыть</button>
                </form>
                <!-- /.section-statement-buttons -->
              </div>
              <!-- /.section-statement-block -->
            </div>
            <!-- /.section-statement-column -->
        </section>
          `);

          updateDBInfo('check-statement', '../control/functions/admin/markStatement.php', data[0]);

          outputStatements();
        })
        .catch(error => console.error(error));
    };
  };
  showStatement();

  /* ПОЛУЧЕНИЕ АЛГОРИТМА ПОСТУПЛЕНИЯ ИЗ БД */
  const getAlgorithm = (wrap, block) => {
    return fetch('functions/admin/manageAlgorithm/getAlgorithm.php')
      .then(response => {
        if (response.status !== 200) {
          throw new Error('Error! network status not 200');
        }

        return response.json();
      })
      .then(data => {
        data.dates.forEach((item, i) => {
          let cloneBlock = block.cloneNode(true);

          cloneBlock.children[0].setAttribute('name', `alg-date-${i+1}`);
          cloneBlock.children[0].value = item;

          cloneBlock.children[1].setAttribute('name', `alg-content-${i+1}`);
          cloneBlock.children[1].value = data.contents[i];

          wrap.insertAdjacentElement('beforebegin', cloneBlock);
        });
      })
      .catch(error => console.error(error));
  };

  /* ДОБАВЛЕНИЕ НОВЫХ ИНПУТОВ В СЕКЦИИ АЛГОРИТМ ПОСТУПЛЕНИЯ */
  const addInputs = () => {
    const algorithmForm = document.querySelector('.section-algorithm-form'),
          algorithmInput = document.createElement('div'),
          algorithmInputDelete = document.createElement('div'),
          algorithmInputDate = document.createElement('input'),
          algorithmInputContent = document.createElement('textarea'),
          algorithmButtons = algorithmForm.querySelector('.section-algorithm-form-buttons');

    algorithmInput.classList.add('section-algorithm-form__input');
    algorithmInputDelete.classList.add('section-algorithm-form__delete');
    algorithmInputDelete.innerHTML = '&times;';
    algorithmInputDate.classList.add('form__input');
    algorithmInputDate.classList.add('section-algorithm-form__date');
    algorithmInputDate.setAttribute('type', 'date');
    algorithmInputContent.classList.add('form__input');
    algorithmInputContent.classList.add('section-algorithm-form__content');

    algorithmInput.appendChild(algorithmInputDate);
    algorithmInput.appendChild(algorithmInputContent);
    algorithmInput.appendChild(algorithmInputDelete);

    getAlgorithm(algorithmButtons, algorithmInput);
    
    /* ОТПРАВКА ДАННЫХ ИЛИ ДОБАВЛЕНИЕ НОВЫХ ПОЛЕЙ ПРИ КЛИКЕ*/
    algorithmForm.addEventListener('click', (e) => {
      const target = e.target;

      if( target.id === 'add-field' ) {
        e.preventDefault();

        let algorithmCloneInput = algorithmInput.cloneNode(true),
            inputsCounter = algorithmForm.querySelectorAll('.section-algorithm-form__input').length + 1;
        
        [...algorithmCloneInput.children].forEach(item => {
          item.removeAttribute('name');

          if( item.tagName === 'INPUT') {
            item.setAttribute('name', `alg-date-${inputsCounter}`);
          } else if( item.tagName === 'TEXTAREA' ) {
            item.setAttribute('name', `alg-content-${inputsCounter}`);
          }
          item.value = '';
        });

        algorithmButtons.insertAdjacentElement('beforebegin', algorithmCloneInput);
    } else if ( target.matches('.section-algorithm-form__delete') ) {
      target.parentNode.remove();
    } else if ( target.id === 'send-algorithm' ) {
        e.preventDefault();

        const formData = new FormData(algorithmForm);

        let body = {
          date: [],
          content: []
        };

        for (let val of formData.entries()) {
          if( val[0].slice(0, 8) === 'alg-date' ) {
            body.date.push(val[1]);
          } else if( val[0].slice(0, 11) === 'alg-content' ) {
            body.content.push(val[1]);
          }
        }

        return fetch('functions/admin/manageAlgorithm/updAlgorithm.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application / json'
          },
          body: JSON.stringify(body)
        })
        .then(response => {
          if( response.status !== 200 ) {
            throw new Error('Error! Network status not 200');
          }

          showSelectOptions('.form__select-fac', 'functions/admin/manageFacs/getFacs.php');
          showSelectOptions('.form__select-spec', 'functions/admin/manageSpecs/getSpecs.php');

          manageAttention('Успешно!');
        })
        .catch(error => console.error(error));
      }
    });
  };
  addInputs();

  /* АЯКС НА ОБНОВЛЕНИЕ/УДАЛЕНИЕ/ДОБАВЛЕНИЕ ДАННЫХ В БД */
  const updateDBInfo = (id, url, statementId) => {
    const form = document.getElementById(id),
          sidebar = document.querySelector('.sidebar'),
          sectionProps = document.querySelector('.section-props'),
          sectionStatement = document.querySelector('.section-statement');

    let buttonValue = null;
    
    form.addEventListener('click', (e) => {

      if(e.target.matches('button')) {
        buttonValue = e.target.value;
      }
    });

    form.addEventListener('submit', (e) => {
      e.preventDefault();

      const data = new FormData(form);

      if( id === 'check-statement' ) {
        data.append('verdict', buttonValue);
        data.append('statement_id', statementId);
      }

      let body = {};

      for (let val of data.entries()) {
        body[val[0]] = val[1];
      }

      sendForm(body)
        .then(response => {
          if( response.status !== 200 ) {
            manageAttention('Ошибка!', 'section-content-attention_error');
        
            throw new Error('Ошибка! статус ответа от сервера не 200!');
          }

          if (id === 'check-statement') {
            outputStatements();
            getReceiptStatistics();

            sectionStatement.remove();
            sidebar.classList.remove('hidden');
            sectionProps.classList.remove('hidden');
          }

          showSelectOptions('.form__select-fac', 'functions/admin/manageFacs/getFacs.php');
          showSelectOptions('.form__select-spec', 'functions/admin/manageSpecs/getSpecs.php');

          if (body['verdict'] === 'close') {
            return;
          } else {
            manageAttention('Успешно!');
          }
        })
        .catch(error => console.error(error));
    });

    const sendForm = (data) => {
      return fetch(url, {
        method: 'POST',
        headers: {
          'Content-Type': 'application / json'
        }, 
        body: JSON.stringify(data)
      });
    };
  };
  updateDBInfo('add-fac', 'functions/admin/manageFacs/addFac.php');
  updateDBInfo('upd-fac', 'functions/admin/manageFacs/updFac.php');
  updateDBInfo('del-fac', 'functions/admin/manageFacs/delFac.php');

  updateDBInfo('add-spec', 'functions/admin/manageSpecs/addSpec.php');
  updateDBInfo('upd-spec', 'functions/admin/manageSpecs/updSpec.php');
  updateDBInfo('del-spec', 'functions/admin/manageSpecs/delSpec.php');

  /* OUTPUT OPTIONS WITH DATA FROM DB */
  const showSelectOptions = (selector, url) => {
    const selectFields = document.querySelectorAll(selector);

    return fetch(url)
      .then(response => {
        if( response.status !== 200 ) {
          manageAttention();
          throw new Error('Error! Network status not 200');
        }

        return response.json();
      })
      .then(data => {
        selectFields.forEach(item => {
          const fieldOptions = item.querySelectorAll('option');

          data.id.forEach((item2, i) => {
            const option = document.createElement('option');
            
            option.setAttribute('value', item2);
            option.textContent = data.name[i];

            fieldOptions.forEach(item3 => {
              if( item3.value !== 'none' ) {
                item3.remove();
              }
            });
            
            item.appendChild(option);
          });

          item.value = 'none';
        });
      })
      .catch(error => console.error(error));
  };
  showSelectOptions('.form__select-fac', 'functions/admin/manageFacs/getFacs.php');
  showSelectOptions('.form__select-spec', 'functions/admin/manageSpecs/getSpecs.php');

  /* УПРАВЛЛЕНИЕ ИНФОРМАЦИОННЫМ ПОП-АПОМ */
  const manageAttention = (message, error) => {
    const header = document.querySelector('header'),
          block = document.querySelector('.section-content-attention');
    
    let autoClosePopup;

    if (block) {
      block.remove();
    }

    let attentionBlock = document.createElement('div'),
        attentionClose = document.createElement('span'),
        attentionMessage = document.createElement('div');

    attentionBlock.classList.add('section-content-attention', error);
    attentionBlock.appendChild(attentionClose);
    attentionBlock.appendChild(attentionMessage);
    
    attentionClose.classList.add('section-content-attention__close');
    attentionMessage.classList.add('section-content-attention__text');

    attentionClose.innerHTML = '&times;';
    attentionMessage.textContent = message;

    header.insertAdjacentElement('afterend', attentionBlock);

    autoClosePopup = setTimeout(() => {
      attentionBlock.remove();
      clearTimeout(autoClosePopup);
    }, 2500);

    attentionBlock.addEventListener('click', (e) => {
      const target = e.target;

      if (target.matches('span.section-content-attention__close')) {
        attentionBlock.remove();
        clearTimeout(autoClosePopup);
      }
    });
  };

  /* АЯКС ОБРАБОТЧИК ФАЙЛОВ */
  const sendFiles = (id, url) => {
    const formFiles = document.getElementById(id),
          fileInput = formFiles.querySelector('input[type="file"]');
    
    formFiles.addEventListener('submit', (e) => {
      e.preventDefault();

      const formData = new FormData(formFiles);

      let ext = fileInput.value.split('.').pop().toLowerCase();

      if( id !== 'form-upd-logo' && ext !== 'pdf' ) {
        manageAttention('Ошибка! Файл должен быть в формате PDF!', 'section-content-attention_error');
      } else if (id === 'form-upd-logo' && ext !== 'png' ) {
        manageAttention('Ошибка! Лого должно быть в формате PNG!', 'section-content-attention_error');
      } else {
        postFiles(formData)
          .then(response => {
            if (response.status !== 200) {
              manageAttention('Ошибка! Что-то пошло не так', 'section-content-attention_error');
              throw new Error('Ошибка, статус ответа сервера не 200!');
            }
  
            manageAttention('Документы успешно отправлены!');
          })
          .catch(error => console.error(error));
      }
    });

    const postFiles = (files) => {
      return fetch(url, {
        method: 'POST',
        body: files
      });
    };
  };
  sendFiles('form-upd-logo', 'functions/admin/updateLogo.php');
  sendFiles('form-upd-request', 'functions/admin/updDocTemplate.php');
  sendFiles('form-upd-polytics', 'functions/admin/updPolyticsPD.php');
});




const catchClosingWindow = () => {
  window.onbeforeunload = request;

  function request() {
    const test = document.getElementById('check-statement');
    console.log(test);

    let formData = new FormData(test);

    formData.append('verdict', 'closed');

    let body = {};

    for (let val of formData.entries()) {
      body[val[0]] = val[1];
    }

    const sendForm = (data) => {
      return fetch('../control/functions/admin/markStatement.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application / json'
        },
        body: JSON.stringify(data)
      });
    };

    sendForm(body)
      .then(response => {
        if (response.status !== 200) {
          manageAttention('Ошибка!', 'section-content-attention_error');

          throw new Error('Ошибка! статус ответа от сервера не 200!');
        }

        return null;
      })
      .catch(error => console.error(error));
  }
}
// catchClosingWindow();