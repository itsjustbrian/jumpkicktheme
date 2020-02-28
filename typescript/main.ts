import MicroModal from 'micromodal';

MicroModal.init({
  onShow: () => {
    document.body.style.overflow = 'hidden';
  },

  onClose: () => {
    document.body.style.overflow = 'auto';
  }
});