import './bootstrap'; // from js/bootstrap.js
import '../sass/app.scss';
import * as bootstrap from 'bootstrap'; // from node_modules/bootstrap

const toastElList = document.querySelectorAll('.toast');
const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl));

Livewire.on('dispatch-toast', function(event) {
   const toastID = document.getElementById('toast');
   const toast = bootstrap.Toast.getOrCreateInstance(toastID);
   const toastIcon = document.getElementById('toast-icon');
   const toastMessage = document.getElementById('toast-message');
   const { detail } = event;

   //remove all classes
   toastElList[0].classList.remove('text-bg-success', 'text-bg-danger', 'text-bg-warning', 'text-bg-info');

   if(detail.type === 'success') {
      toastElList[0].classList.add('text-bg-success');
      toastIcon.innerHTML = '<i class="fa-solid fa-circle-check"></i>';
   } else if(detail.type === 'danger') {
      toastElList[0].classList.add('text-bg-danger');
      toastIcon.innerHTML = '<i class="fa-solid fa-circle-xmark"></i>';
   } else if(detail.type === 'warning') {
      toastElList[0].classList.add('text-bg-warning');
      toastIcon.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i>';
   } else if(detail.type === 'info') {
      toastElList[0].classList.add('text-bg-info');
      toastIcon.innerHTML = '<i class="fa-solid fa-circle-info"></i>';
   }

   toastMessage.innerHTML = detail.message;

   toast.show()
});