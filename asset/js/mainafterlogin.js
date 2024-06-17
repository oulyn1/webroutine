var signin = document.getElementById("modal-signin");
var btnsignin = document.getElementById("openlogin");
var spansignin = document.getElementsByClassName("ti-close")[2];
btnsignin.onclick = function() {
    signin.style.display = "block";
}
spansignin.onclick = function() {
    signin.style.display = "none";
}

var love = document.getElementById("modal-love");
var btnlove = document.getElementById("openlove");
var spanlove = document.getElementsByClassName("ti-close")[0];
btnlove.onclick = function() {
    love.style.display = "block";
}
spanlove.onclick = function() {
    love.style.display = "none";
}

var shopping = document.getElementById("modal-shopping");
var btn = document.getElementById("openshopping");
var span = document.getElementsByClassName("ti-close")[1];
btn.onclick = function() {
    shopping.style.display = "block";
}
span.onclick = function() {
    shopping.style.display = "none";
}