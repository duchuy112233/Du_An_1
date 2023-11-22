//banner
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
//tăng giảm số lượng giỏ hàng
function tang(x){
var cha= x.parentElement;
var soluongcu=cha.children[1];
var soluongmoi=parseInt(soluongcu.innerHTML)+1;
soluongcu.innerHTML=soluongmoi;
}
function giam(x){
    var cha= x.parentElement;
    var soluongcu=cha.children[1];
    if(parseInt(soluongcu.innerHTML) > 1){
        var soluongmoi=parseInt(soluongcu.innerHTML)-1;
        soluongcu.innerHTML=soluongmoi;
    }
    else{
    alert("Tối thiếu là 1");
    }
}