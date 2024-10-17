const hamburger = document.querySelector('.astra-book-library-nav .hamburger');
const navLink = document.querySelector('.astra-book-library-nav .nav__link');

hamburger.addEventListener('click', () => {
  navLink.classList.toggle('hide');
});