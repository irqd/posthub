import './bootstrap'; // from js/bootstrap.js
import '../sass/app.scss';
import * as bootstrap from 'bootstrap'; // from node_modules/bootstrap

const toastElList = document.querySelectorAll('.toast');
const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl));

document.addEventListener('dispatch-toast', function(event) {
   const { detail } = event['detail'];

   const toast = document.getElementById('toast');
   const toastIcon = document.getElementById('toast-icon');
   const toastTitle = document.getElementById('toast-title');
   const toastMessage = document.getElementById('toast-message');
   const toastInstance = new bootstrap.Toast(toast);
   let iconName = '';

   if(detail.type == 'success') {
      iconName = 'fa-circle-check';
   } else if (detail.type == 'danger') {
      iconName = 'fa-circle-xmark';
   } else if (detail.type == 'warning') {
      iconName = 'fa-circle-exclamation';
   } else if (detail.type == 'info') {
      iconName = 'fa-circle-info';
   }

   toastIcon.classList.add(iconName);
   toastTitle.innerHTML = detail.title;
   toastMessage.innerHTML = detail.message;

   toast.classList.add('text-bg-' + detail.type);

   toastInstance.show();

   toast.addEventListener('hidden.bs.toast', function() {
      toast.classList.remove('text-bg-' + detail.type);
      toastIcon.classList.remove(iconName);
   });
});
