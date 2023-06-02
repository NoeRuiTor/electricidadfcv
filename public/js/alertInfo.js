document.addEventListener("DOMContentLoaded", function() {
    var customAlert = document.getElementById("custom-alert");
    var customAlertClose = document.getElementById("custom-alert-close");
  
    customAlertClose.addEventListener("click", function() {
      customAlert.style.display = "none";
    });
  });
  
  function showCustomAlert(message) {
    var customAlert = document.getElementById("custom-alert");
    var customAlertMessage = document.getElementById("custom-alert-message");
  
    customAlertMessage.textContent = message;
    customAlert.style.display = "block";
  }
  
  
 

  