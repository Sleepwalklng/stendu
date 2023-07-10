const showAll = document.querySelector('.info__parameters');
const additionalInfo = document.querySelector('.info__additional');
const linkBtn = document.querySelector('.link__btn');
const infoItem = document.querySelectorAll('.info__item');
const infoList = document.querySelectorAll('.info__list');

if (showAll) {
  showAll.addEventListener('click', () => {
    additionalInfo.classList.toggle('active');
    linkBtn.classList.toggle('active');
  });
}
// infoItem.forEach((item) => {
//   item.addEventListener('click', (e) => {
//     const infoList = e.currentTarget.querySelector('.info__list');
//     infoList.classList.toggle('active');
//   });
// });
const elMore = document.querySelector('.menu__item-more');
const menuMore = document.querySelector('.menu__list__more');
elMore &&
  elMore.addEventListener('click', (e) => {
    menuMore.classList.toggle('active');
  });
const categoriesText = document.querySelectorAll('.categories__text');
categoriesText &&
  categoriesText.forEach((category, id) => {
    if (category.textContent.trim() === ('Недвижимость' || 'real estate')) {
      category.closest('.categories__item').classList.add('real_estate');
    }
    if (category.textContent.trim() === ('Личные вещи' || 'personal items')) {
      category.closest('.categories__item').classList.add('personal_items');
    }
  });

infoList.length > 0 &&
  infoList.forEach((list) => {
    let listItems = list.children;
    console.log(listItems);
    listItems.length > 8
      ? (list.style.overflowY = 'scroll') && (list.style.height = '23.3rem')
      : null;
  });
