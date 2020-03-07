import MicroModal from 'micromodal';
import bodyScroll from 'body-scroll-toggle';

const $ = (id) => document.getElementById(id);
const $$ = (selector) => document.querySelector(selector);
const body = document.body;

const onSearchButtonClicked = (event) => {
  const searchBox = $('searchBox');
  searchBox.addEventListener('transitionend', () => {
    $('searchBox').focus({ preventScroll: true });
  }, { once: true });
  const overlay = document.createElement('div');
  overlay.addEventListener('click', () => {
    $('searchBox').blur();
  }, { once: true });
  $('searchBox').addEventListener('blur', () => {
    overlay.remove();
    searchBox.classList.remove('is-open');
  }, { once: true });
  overlay.classList.add('search-overlay');
  body.append(overlay);
  searchBox.classList.add('is-open');
};

window['onSearchButtonClicked'] = onSearchButtonClicked;

const iOS = /(iPad|iPhone|iPod)/g.test(navigator.userAgent);

if (iOS) {
  $$('header.main-header').style.position = 'relative'; // No sticky header for iOS
  body.addEventListener('touchstart', () => { /* Make buttons work on iOS */ });
}

MicroModal.init({
  onShow: () => bodyScroll.disable(),
  onClose: () => bodyScroll.enable()
});