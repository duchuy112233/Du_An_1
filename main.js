// //banner
var album = [];
for (var i = 1; i < 4; i++) {
    album[i] = new Image();
    album[i].src = "../image/anh" + i + ".jpg";
}
var interval = setInterval(slideshow, 1500);
index = 0;
function slideshow() {
    index++;
    if (index > 3) {
        index = 0;
    }
    document.getElementById("banner").src = album[index].src;
}
function next() {
    index++;
    if (index > 3) {
        index = 0;
    }
    document.getElementById("banner").src = album[index].src;
}
function pre() {
    index--;
    if (index < 0) {
        index = 3;
    }
    document.getElementById("banner").src = album[index].src;
}