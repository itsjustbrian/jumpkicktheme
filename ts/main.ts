import MicroModal from 'micromodal';
import bodyScroll from 'body-scroll-toggle';
import { $, $$ } from './include/helpers';

const body = document.body;

// Show search input and add clickable overlay
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

// Allows this to be directly referenced in HTML
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

//clickable menu items in mobile

const onMobileContentTabClicked = (event : MouseEvent) => {
  const node = event.target as Element;
  const num_children = node.parentNode.children.length;
  for (let i = 0; i < num_children; i++) {
    const child = node.parentNode.children[i];
    child.classList.remove('selected');
    const show_class = child.attributes.getNamedItem('show').value;
    const show_node = $(show_class);
    show_node.hidden = true;
  }
  node.classList.add('selected');
  const show_class = node.attributes.getNamedItem('show').value;
  const show_node = $(show_class);
  show_node.hidden = false;
  
}

window['onMobileContentTabClicked'] = onMobileContentTabClicked;