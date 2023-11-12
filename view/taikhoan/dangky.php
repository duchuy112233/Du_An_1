<div class="body">
    <h2>Đăng ký</h2><br>
    <div class="container-sign" id="container-sign">
   
            <div class="">
                <form action="index.php?act=dangky" method="post">
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>Sử dụng phương thức đăng ký khác</span>
                <input name="user" type="text" placeholder="Tên đăng nhập" required/>
                <input name="email" type="email" placeholder="Email" required/>
                <input name="pass" type="password" placeholder="Mặt khẩu" required />
                <br>
                <p>Bạn đã có tài khoản? <a href="index.php?act=dangnhap">Đăng nhập ngay</a></p>
                <br>
               
                <input type="submit" name="dangky" class="btn btn-primary" value="Đăng ký"></input>

                <div style="color: red; font-size: 12px; font-weight: 500;">
                        <?php
                         if (isset($thongbao) && ($thongbao != "")) {
                            echo $thongbao;
                          }
                        ?>
                    </div>
            </form>

            </div>


           
    
       







    </div>
</div>