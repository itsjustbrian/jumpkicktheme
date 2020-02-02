
const $ = (id: string) => {
  return document.getElementById(id);
};

const openModal = (id: string) => {
  document.body.style.overflow = 'hidden';
  $(id).classList.add('open');
};

const closeModal = (id: string) => {
  document.body.style.overflow = 'initial';
  $(id).classList.remove('open');
}