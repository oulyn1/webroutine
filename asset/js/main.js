
var login = document.getElementById("modal-login");
var btnlogin = document.getElementById("openlogin");
var btnlogin2 = document.getElementById("openlogin2");
var spanlogin = document.getElementsByClassName("ti-close")[0];
btnlogin.onclick = function() {
    login.style.display = "block";
}
spanlogin.onclick = function() {
    login.style.display = "none";
}
btnlogin2.onclick = function() {
    signin.style.display = "none";
    login.style.display = "block";
}

var signin = document.getElementById("modal-signin");
var btnsignin = document.getElementById("opensignin");
var spansignin = document.getElementsByClassName("ti-close")[1];
btnsignin.onclick = function() {
    login.style.display = "none";
    signin.style.display = "block";
}
spansignin.onclick = function() {
    signin.style.display = "none";
}

var love = document.getElementById("modal-love");
var btnlove = document.getElementById("openlove");
var spanlove = document.getElementsByClassName("ti-close")[2];
btnlove.onclick = function() {
    love.style.display = "block";
}
spanlove.onclick = function() {
    love.style.display = "none";
}

var shopping = document.getElementById("modal-shopping");
var btn = document.getElementById("openshopping");
var span = document.getElementsByClassName("ti-close")[3];
btn.onclick = function() {
    shopping.style.display = "block";
}
span.onclick = function() {
    shopping.style.display = "none";
}