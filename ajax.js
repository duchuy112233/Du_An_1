$(document).ready(function(){
$(".ram").change(function(){
var id=$(".ram").val();
var idsp=$("#idsp").val();
$.post("mau.php", {id:id, idsp:idsp},function(data){
$(".mau").html(data);
})
})

$(".mau").change(function(){
var id=$(".ram").val();
var idsp=$("#idsp").val();
var idmau=$(".mau").val();
$.post("soluong.php", {id:id, idsp:idsp, idmau:idmau},function(data){
    $("#soluonggg").html(data);
})
})

})