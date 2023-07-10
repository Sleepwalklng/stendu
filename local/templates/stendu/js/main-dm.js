// Админка меню объявлений 


function tab(parent, i = 0) {
    try {
        let p = parent
        let t = p.querySelectorAll('.js-tab-item')
        let b = p.querySelectorAll('.advertisement-content-js')

        function tabActive(index) {
            t.forEach(item => {
                item.classList.remove('active-item')
            });
            t[index].classList.add('active-item')
            b.forEach(item => {
                item.classList.remove('active-block-cont')
            });
            b[index].classList.add('active-block-cont')
        }

        tabActive(i)

        t.forEach((element, index) => {
            element.addEventListener('click', function(e) {
                e.preventDefault()
                tabActive(index)
            })
        });
    } catch {
        console.log('tabs error')
    }
}

if (document.querySelector('.admin-st__right')) {
    let myTabs = document.querySelectorAll('.admin-st__right')
    myTabs.forEach(element => {
        tab(element)
    });
}


// Админка глоальные блоки


function global(parent, i = 0) {
    try {
        let p = parent
        let t = p.querySelectorAll('.sidebar-item-js')
        let b = p.querySelectorAll('.global-block-js')

        function tabActive(index) {
            t.forEach(item => {
                item.classList.remove('active-item-js')
            });
            t[index].classList.add('active-item-js')
            b.forEach(item => {
                item.classList.remove('active-global-block')
            });
            b[index].classList.add('active-global-block')
        }

        tabActive(i)

        t.forEach((element, index) => {
            element.addEventListener('click', function(e) {
                e.preventDefault()
                tabActive(index)
            })
        });
    } catch {
        console.log('tabs error')
    }
}

if (document.querySelector('.admin-st__wrapper')) {
    let myTabs = document.querySelectorAll('.admin-st__wrapper')
    myTabs.forEach(element => {
        global(element)
    });
}


// Админка отзывы


function reviews(parent, i = 0) {
    try {
        let p = parent
        let t = p.querySelectorAll('.reviews-item-js')
        let b = p.querySelectorAll('.reviews-content-js')

        function tabActive(index) {
            t.forEach(item => {
                item.classList.remove('reviews-item-js-active')
            });
            t[index].classList.add('reviews-item-js-active')
            b.forEach(item => {
                item.classList.remove('reviews-content-js-active')
            });
            b[index].classList.add('reviews-content-js-active')
        }

        tabActive(i)

        t.forEach((element, index) => {
            element.addEventListener('click', function(e) {
                e.preventDefault()
                tabActive(index)
            })
        });
    } catch {
        console.log('tabs error')
    }
}

if (document.querySelector('.admin-st__reviews')) {
    let myTabs = document.querySelectorAll('.admin-st__reviews')
    myTabs.forEach(element => {
        reviews(element)
    });
}


// Админка избранное



function fav(parent, i = 0) {
    try {
        let p = parent
        let t = p.querySelectorAll('.fav-tab-js')
        let b = p.querySelectorAll('.fav-content-js')

        function tabActive(index) {
            t.forEach(item => {
                item.classList.remove('fav-item-active')
            });
            t[index].classList.add('fav-item-active')
            b.forEach(item => {
                item.classList.remove('fav-content-active')
            });
            b[index].classList.add('fav-content-active')
        }

        tabActive(i)

        t.forEach((element, index) => {
            element.addEventListener('click', function(e) {
                e.preventDefault()
                tabActive(index)
            })
        });
    } catch {
        console.log('tabs error')
    }
}

if (document.querySelector('.admin-st__fav')) {
    let myTabs = document.querySelectorAll('.admin-st__fav')
    myTabs.forEach(element => {
        fav(element)
    });
}


// сладер в разделе избранное


const largeSlider = ()=>{
	let largeSliders = document.querySelectorAll('.admin-st__fav-swiper')
	let prevArrow = document.querySelectorAll('.admin-st__fav-seller-arrow-prev')
	let nextArrow = document.querySelectorAll('.admin-st__fav-seller-arrow-next')
	largeSliders.forEach((slider, index)=>{
    // this bit checks if there's more than 1 slide, if there's only 1 it won't loop
		let sliderLength = slider.children[0].children.length
		let result = (sliderLength > 1) ? true : false
		const metropolis = new Swiper(slider, {
            slidesPerView: 2,
            direction: 'horizontal',
            loop: true,
            slideClass: 'admin-st__fav-slide',
            spaceBetween: 10,
            wrapperClass: 'admin-st__fav-swiper-wrapper',
            navigation: {
              
                        nextEl: nextArrow[index],
                        prevEl: prevArrow[index],
                    },

                    breakpoints: {
                      
                        748: {
                          slidesPerView: 3,
                          spaceBetween: 29
                        }
                      },
                      pagination: {
                        el: ".admin-st__fav-swiper-pagination",
                        clickable: true,
                      },
        
        });	
	})
}
window.addEventListener('load', largeSlider)




document.addEventListener('DOMContentLoaded', () => {

    const forms = document.querySelectorAll('form');
    const inputFile = document.querySelectorAll('.upload-file__input');

    /////////// Кнопка «Прикрепить файл» /////////// 
    inputFile.forEach(function(el) {
        let textSelector = document.querySelector('.upload-file__text');
        let fileList;

        // Событие выбора файла(ов) 
        el.addEventListener('change', function(e) {

            // создаём массив файлов 
            fileList = [];
            for (let i = 0; i < el.files.length; i++) {
                fileList.push(el.files[i]);
            }

            // вызов функции для каждого файла 
            fileList.forEach(file => {
                uploadFile(file);
            });
        });

        // Проверяем размер файлов и выводим название 
        const uploadFile = (file) => {

            // файла <5 Мб 
            if (file.size > 5 * 1024 * 1024) {
                alert('Файл должен быть не более 5 МБ.');
                return;
            }

            // Показ загружаемых файлов 
            if (file && file.length > 1) {
                if (file.length <= 4) {
                    textSelector.textContent = `Выбрано ${file.length} файла`;
                }
                if (file.length > 4) {
                    textSelector.textContent = `Выбрано ${file.length} файлов`;
                }
            } else {
                textSelector.textContent = file.name;
            }
        }

    });

    // Отправка формы на сервер 
    const postData = async(url, fData) => { // имеет асинхронные операции 

        // начало отправки 
        // здесь можно оповестить пользователя о начале отправки 

        // ждём ответ, только тогда наш код пойдёт дальше 
        let fetchResponse = await fetch(url, {
            method: 'POST',
            body: fData
        });

        // ждём окончания операции 
        return await fetchResponse.text();
    };

    if (forms) {
        forms.forEach(el => {
            el.addEventListener('submit', function(e) {
                e.preventDefault();

                // создание объекта FormData 
                let fData = new FormData();

                // Добавление всех input, кроме type="file" 
                el.querySelectorAll('input:not([type="file"])').forEach(input => {
                    fData.append(input.name, input.value);
                });

                // Добавление файлов input type file 
                let file = el.querySelector('.upload-file__input');
                for (let i = 0; i < (file.files.length); i++) {
                    fData.append('files[]', file.files[i]); // добавляем файлы в объект FormData() 
                }

                // Отправка на сервер 
                postData('./mail.php', fData)
                    .then(fetchResponse => {
                        console.log('Данные успешно отправлены!');
                        console.log(fetchResponse);
                    })
                    .catch(function(error) {
                        console.log('Ошибка!');
                        console.log(error);
                    });
            });
        });
    };

});


// Табуляция в чате


function chat(parent, i = 0) {
    try {
        let p = parent
        let t = p.querySelectorAll('.chat__salesman')
        let b = p.querySelectorAll('.massage')

        function tabActive(index) {
            t.forEach(item => {
                item.classList.remove('active-salesman')
            });
            t[index].classList.add('active-salesman')
            b.forEach(item => {
                item.classList.remove('massage-active')
            });
            b[index].classList.add('massage-active')
        }

        tabActive(i)

        t.forEach((element, index) => {
            element.addEventListener('click', function(e) {
                e.preventDefault()
                tabActive(index)
            })
        });
    } catch {
        console.log('tabs error')
    }
}

if (document.querySelector('.chat')) {
    let myTabs = document.querySelectorAll('.chat')
    myTabs.forEach(element => {
        chat(element)
    });
}


$(document).ready(function(){
    // появление настроек чата 
	$('.massage__salesman-button').on('click', function() {
        $('.massage__setting').slideToggle(200, function(){ 
            $('.massage__setting').toggleClass('active-setting');
              
		return false;
        });
		
	});
});



$(document).ready(function() {
    var progressbar = $('.progressbar'),
        max = progressbar.attr('max'),
        time = (1000/max)*5,
        value = progressbar.val();
    var loading = function() {
        value += 1;
        addValue = progressbar.val(value);
        if (value == max) {
            clearInterval(animate);
        }
    };
    var animate = setInterval(function() {
        loading();
    }, time);
});


const openSize = () => {
    const button = document.querySelector(`.js-open-size`);
    if (!button) return;
  
    const sizeText = document.querySelector(`.js-size`);
    button.addEventListener(`click`, (evt) => {
      button.classList.toggle(`open`);
  
  
      if (evt.target.closest(`.admin-st__sidebar-item`)) {
          const block = evt.target.closest(`.admin-st__sidebar-item`)
        const text = block.innerHTML;
        sizeText.innerHTML = text;
      }
  
    })
  }
  
openSize();


$(document).ready(function() {
    //  modal 4

    // .js-modal-overlay Оверлэй закрывает окна

    $('.js-modal-overlay').click(function(event) {
        event.preventDefault();
        closePopup();
    });

    // .js-modal-close класс для крестиков хакрыть в нутри окон
    $('.js-modal-close').click(function(event) {
        event.preventDefault();
        closePopup();
        $("body").css("owerflow", "initial");
    });

    // .js-open-modal класс для всех кнопок "ПОЛУЧИТЬ ПОМОЩЬ"
    $('.js-open-register').click(function(event) {
        event.preventDefault();
        openForm();
    });

    // .submit-form класс для всех кнопок "ОТПРАВИТЬ"
    $('.submit-exit').click(function(event) {
        event.preventDefault();
        closeForm();
    });


    function closePopup() {
        $('.registration-js').css("display", "none");
        $(".overlay").css("display", "none");
        $("body").css("overflow", "inherit");


    }

    function openForm() {
        $('.registration-js ').css("display", "block");
        $(".overlay").css("display", "block");
        $("body").css("overflow", "hidden");



    }

    function closeForm() {
        $('.registration-js').css("display", "none");
        $('.exit-js').css("display", "block");
        $(".overlay").css("display", "block");
        $("body").css("overflow", "hidden");

    }


    //  modal 5

    // .js-modal-overlay Оверлэй закрывает окна

    $('.js-modal-overlay').click(function(event) {
        event.preventDefault();
        closePopup();
    });

    // .js-modal-close класс для крестиков хакрыть в нутри окон
    $('.js-modal-close').click(function(event) {
        event.preventDefault();
        closePopup();
        $("body").css("owerflow", "initial");
    });

    // .js-open-modal класс для всех кнопок "ПОЛУЧИТЬ ПОМОЩЬ"
    $('.submit-exit').click(function(event) {
        event.preventDefault();
        openForm();
    });

    // .submit-form класс для всех кнопок "ОТПРАВИТЬ"
    $('.submit-register').click(function(event) {
        event.preventDefault();
        closeForm();
    });


    function closePopup() {
        $('.exit-js').css("display", "none");
        $('.registration-js').css("display", "none");
        $(".overlay").css("display", "none");
        $("body").css("overflow", "inherit");


    }

    function openForm() {
        $('.exit-js').css("display", "block");
        $(".overlay").css("display", "block");
        $(".registration-js").css("display", "none");
        $("body").css("overflow", "hidden");



    }

    function closeForm() {
        $('.registration-js').css("display", "block");
        $('.exit-js').css("display", "none");
        $(".overlay").css("display", "block");
        $("body").css("overflow", "hidden");

    }







 
});