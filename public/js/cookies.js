
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays*24*60*60*1000));
  let expires = "expires="+ d.toUTCString();
  document.cookie = cname + "=" + cvalue + "; " + expires + " ;path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for(let i = 0; i <ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}


function hideCookieBanner() {
  document.getElementById("cookie-banner").style.display = "none";
}

function acceptCookies() {
  setCookie("cookieAccepted", true, 365); // Establece una cookie de aceptación por 365 días
  hideCookieBanner();
}

function rejectCookies() {
  setCookie("cookieAccepted", false, 365); // Establece una cookie de rechazo por 365 días
  hideCookieBanner();
}

function checkCookieAccepted() {
  var cookieAccepted = getCookie("cookieAccepted");
  if (cookieAccepted !== "true" && cookieAccepted !== "false") {
    document.getElementById("cookie-banner").style.display = "block";
  }
}

document.getElementById("cookie-accept").addEventListener("click", function(e) {
  e.preventDefault();
  acceptCookies();
});

document.getElementById("cookie-reject").addEventListener("click", function(e) {
  e.preventDefault();
  rejectCookies();
});

window.addEventListener("load", checkCookieAccepted);

