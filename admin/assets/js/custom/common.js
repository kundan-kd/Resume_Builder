// toast success alert start---------
function toastSuccessAlert(message){
  $('.toast-alert-success-msg').html('');
  $('.toast-alert-success-msg').html(message);
  var toastElement = document.getElementById('liveToastSuccessAlert');
  var toast = new bootstrap.Toast(toastElement);
  toast.show();
}
// toast alert ends---------
// toast warning alert start---------
function toastWarningAlert(message){
  $('.toast-alert-warning-msg').html('');
  $('.toast-alert-warning-msg').html(message);
  var toastElement = document.getElementById('liveToastWarningAlert');
  var toast = new bootstrap.Toast(toastElement);
  toast.show();
}
// toast alert ends---------
// toast failed alert start---------
function toastErrorAlert(message){
  $('.toast-alert-error-msg').html('');
  $('.toast-alert-error-msg').html(message);
  var toastElement = document.getElementById('liveToastErrorAlert');
  var toast = new bootstrap.Toast(toastElement);
  toast.show();
}
// toast alert ends---------