$(document).ready(function () {
    //Chọn ram hiện màu
    $(".ram").change(function () {
        var id = $(".ram").val();
        var idsp = $("#idsp").val();
        $.post("mau.php", { id: id, idsp: idsp }, function (data) {
            $(".mau").html(data);
        })
    })
    //Chọn màu hiện số lượng
    $(".mau").change(function () {
        var id = $(".ram").val();
        var idsp = $("#idsp").val();
        var idmau = $(".mau").val();
        $.post("soluong.php", { id: id, idsp: idsp, idmau: idmau }, function (data) {
            $("#sl-hienthi").html(data);
        })
    })

})