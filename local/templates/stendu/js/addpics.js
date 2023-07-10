

    //Добавление фото в создание заказа
    class AddPortfolio {
        constructor(selector, options) {
            this.$element = document.querySelector('.announcement-content__appearance-photos-wrap');
            this.setUp();
        }
        setUp() {
            if (this.$element) {
                this.$file = this.$element.querySelector('.announcement-content__appearance-photo-input');
                this.$list = this.$element.querySelector('.announcement-content__appearance-photos');
                this.fileHendler();
                this.removeHendler();
            }
        }
        fileHendler() {
            this.$file.addEventListener('change', () => {
                if (this.$file.files.length > 0) {
                    let path = this.imgPath = window.URL.createObjectURL(this.$file.files[0]);
                    this.addItem(path);
                }
            })
        }
        removeHendler() {
            this.$list.addEventListener('click', (e) => {
                if (e.target.dataset.appearancephotoremove) {
                    this.removeItem(e.target.dataset.appearancephotoremove);
                }
            })
        }
        removeItem(id) {
            document.querySelector(`.announcement-content__appearance-photo[data-appearance-photo="${id}"]`).remove();
        }
        addItem(path) {
            let items = document.querySelectorAll('.announcement-content__appearance-photo');
            let id = items.length > 0 ? items[items.length - 1].getAttribute('data-appearance-photo') : 0;
            this.$list.insertAdjacentHTML('beforeend', this.getTemplate(path, +id + 1));
            this.$file.value = "";
        }
        getTemplate(path, id) {
            return `
        <div class="announcement-content__appearance-photo" data-appearance-photo="${id}">
          <div class="announcement-content__appearance-photo-img">
            <img src="${path}" alt="">
          </div>
          <div class="announcement-content__appearance-photo-remove" data-appearancePhotoRemove="${id}">
            <img src="images/announcement/appearance-photo-delete.svg" alt="">
          </div>
        </div>
      `;
        }
    }

    const addPOrtfolio = new AddPortfolio();

  