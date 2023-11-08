<?php
function viewcart($del)
{
    global $img_path;
    $tong = 0;
    $i = 0;
    if ($del == 1) {
        $xoasp_th = '<th scope="col">Hành động</th>';
    } else {
        $xoasp_th = '';
    }
    echo ' <tr>
        <th scope="col">STT</th>
        <th scope="col">Sản phẩm</th>
        <th scope="col">Đơn giá</th>
        <th scope="col">Số lượng</th>
        <th scope="col">Thành tiền</th>
        ' . $xoasp_th . '
    </tr>';
    $a = 1;
    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $img_path . $cart[2];
        $ttien = $cart[3]  * $cart[4];
        $tong += $ttien;
        if ($del == 1) {
            $xoasp_td = '<td><a href="index.php?act=delcart&idcart=' . $i . '"> <button class="btn btn-danger">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z" />
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z" />
            </svg>
        </button> </a></td>';
        } else {
            $xoasp_td = '';
        }
        echo '
            <tr>
                <th scope="row"> ' . $a . '  </th>
                <td>
                    <img src="' . $hinh . '" width="50" /><br/>
                    <span>' . $cart[1] . '</span>
                </td>
                <td>' .  number_format($cart[3])  . ' VNĐ</td>
                <td>' . $cart[4] . '</td>
                <td>' . number_format($ttien)  . ' VNĐ</td>
                    ' . $xoasp_td . '
            </tr>
        ';
        $i += 1;
        $a++;
    }
    echo '
        <td colspan="4">Tổng tiền đơn hàng</td>
        <td style="color: red;">'.number_format($tong).  ' VNĐ</td>
    ';
}

function tongdonhang()
{
    $tong = 0;
    foreach ($_SESSION['mycart'] as $cart) {
        $ttien = $cart[3]  * $cart[4];
        $tong += $ttien;
    }
    return $tong;
}
function insert_bill($name, $email, $address, $tel, $ngaydathang, $tongdonhang)
{
    $sql = "insert into bill(name,email,address,tel,ngaydathang, tongdonhang) values ('$name','$email','$address','$tel')";
    pdo_execute($sql);
}



function loadall_thongke()
{
    $sql = "SELECT danhmuc.id as madm,
    danhmuc.name as tendm, 
    count(sanpham.id) as soluong, 
    min(sanpham.price) as giathap,
    max(sanpham.price) as giacao,
    avg(sanpham.price) as giatb";
    $sql .= " from sanpham left join danhmuc on danhmuc.id = sanpham.iddm";
    $sql .= " group by danhmuc.id order by danhmuc.id desc";
    $listtk = pdo_query($sql);
    return $listtk;
}
