<div class="formtitle mb10">
    <h1>DANH SÁCH DANH MỤC</h1>
</div>
<div class="formcontent">
    <form action="index.php?act=adddm" method="post">
        <div class="mb10 formds_loai">
            <table border="1" class="mb10">
                <tr>
                    <th>Chọn nhanh</th>
                    <th>Mã danh mục</th>
                    <th>Tên Danh Mục</th>
                    <th>Chức năng</th>
                </tr>
                <tr>
                        <td><input type="checkbox" name=""></td>
                        <td>A</td>
                        <td>A</td>
                        <td><a href=""><input type="button" value="Sửa"></a>
                            <a onclick="return confirm('Bạn có chắc chắn muốn xóa')" href=""><input type="button" value="Xóa"></a>
                        </td>
                </tr>
            </table>
        </div>
        <input type="button" value="Chọn tất cả">
        <input type="button" value="Bỏ chọn tất cả">
        <input type="button" value="Xóa các mục đã chọn">
        <a href="index.php?act=adddm"><input type="button" value="Thêm mới"></a>
    </form>
</div>