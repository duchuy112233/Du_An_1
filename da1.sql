-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 06, 2023 lúc 07:46 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `da1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bienthe_sp`
--

CREATE TABLE `bienthe_sp` (
  `id` int(20) NOT NULL,
  `idsp` int(20) NOT NULL,
  `idram` int(20) NOT NULL,
  `idmau` int(20) NOT NULL,
  `soluong` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bienthe_sp`
--

INSERT INTO `bienthe_sp` (`id`, `idsp`, `idram`, `idmau`, `soluong`) VALUES
(5, 29, 7, 7, 77),
(6, 29, 6, 6, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int(20) NOT NULL,
  `iduser` int(20) NOT NULL,
  `bill_name` varchar(255) NOT NULL,
  `bill_address` varchar(255) NOT NULL,
  `bill_tel` varchar(255) NOT NULL,
  `bill_email` varchar(255) NOT NULL,
  `bill_pttt` int(20) NOT NULL,
  `ngaydh` date NOT NULL,
  `total` int(20) NOT NULL,
  `bill_status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `iduser`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `ngaydh`, `total`, `bill_status`) VALUES
(53, 19, 'Đức Huy', 'Hải Dương', '0796402156', 'admin@gmail.com', 1, '2023-12-06', 150024000, 4),
(54, 19, 'Đức Huy', 'Hải Dương', '0796402156', 'admin@gmail.com', 1, '2023-12-06', 13260000, 6),
(55, 19, 'Đức Huy', 'Hải Dương', '0796402156', 'admin@gmail.com', 1, '2023-12-06', 12880000, 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` int(20) NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `iduser` int(20) NOT NULL,
  `idsp` int(20) NOT NULL,
  `ngaybl` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `noidung`, `iduser`, `idsp`, `ngaybl`) VALUES
(26, 'tốt', 19, 29, '2023-12-06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id` int(20) NOT NULL,
  `iduser` int(20) NOT NULL,
  `idsp` int(20) NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `ram` int(20) NOT NULL,
  `mau` int(20) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `soluong` int(20) NOT NULL,
  `thanhtien` double(10,2) NOT NULL DEFAULT 0.00,
  `idbill` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `idsp`, `img`, `name`, `ram`, `mau`, `price`, `soluong`, `thanhtien`, `idbill`) VALUES
(27, 19, 29, '../upload/1701842407b2.jpg', 'Laptop Acer Aspire 3 A315-56-38B1 NX.HS5SV.00G', 6, 6, 7501200.00, 19, 99999999.99, 53),
(28, 19, 29, '../upload/1701842407b2.jpg', 'Laptop Acer Aspire 3 A315-56-38B1 NX.HS5SV.00G', 0, 0, 7501200.00, 1, 7501200.00, 53),
(29, 19, 27, '../upload/1701842253a3.jpg', 'Laptop MSI Gaming Bravo 15 B7ED-010VN', 0, 0, 13260000.00, 1, 13260000.00, 54),
(30, 19, 23, '../upload/1701841815hjkhujj.jpg', 'Laptop Dell Inspirion 15 3511 PDP3H', 0, 0, 12880000.00, 1, 12880000.00, 55);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `name`) VALUES
(11, 'DELL'),
(12, 'MSI'),
(13, 'ACER');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mausp`
--

CREATE TABLE `mausp` (
  `id` int(20) NOT NULL,
  `mau_sp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mausp`
--

INSERT INTO `mausp` (`id`, `mau_sp`) VALUES
(5, 'Đỏ'),
(6, 'Vàng'),
(7, 'Xám');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ramsp`
--

CREATE TABLE `ramsp` (
  `id` int(20) NOT NULL,
  `ram_sp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ramsp`
--

INSERT INTO `ramsp` (`id`, `ram_sp`) VALUES
(5, '600G'),
(6, '512G'),
(7, '1T');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mota` varchar(255) NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT 0.00,
  `man_hinh` varchar(255) NOT NULL,
  `card_do_hoa` varchar(255) NOT NULL,
  `ram` varchar(255) NOT NULL,
  `cpu` varchar(255) NOT NULL,
  `ocung` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `giamgia` int(20) NOT NULL,
  `luotxem` int(20) NOT NULL,
  `iddm` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `san_pham`
--

INSERT INTO `san_pham` (`id`, `name`, `mota`, `price`, `man_hinh`, `card_do_hoa`, `ram`, `cpu`, `ocung`, `img`, `giamgia`, `luotxem`, `iddm`) VALUES
(22, 'Laptop Dell Inspiron 14 Plus 7420 T9K26', 'ĐẶC ĐIỂM NỔI BẬT\r\nSở hữu thiết kế thời thượng với lớp vỏ nhôm cứng cáp, bảo vệ tốt linh kiện bên trong.\r\nMàn hình 14 inch cùng độ phân giải 2.2K sắc nét, cho hình ảnh sống động, chân thực.\r\nRAM 16GB kết hợp ổ cứng 512 GB SSD đa nhiệm, cho mọi thao tác trơ', 21000000.00, '15.6\" FHD 144Hz', 'RTX 4050', '16GB', 'i7', '512GB SSD ', '1701841669jklkj.jpg', 6, 1, 11),
(23, 'Laptop Dell Inspirion 15 3511 PDP3H', 'Laptop Dell Inspiron 15 3511 PDP3H - Hiệu suất ổn định, kiểu dáng bền bỉ, đẹp mắt\r\nLaptop Dell Inspiron 15 3511 PDP3H đang được người tiêu dùng hết mực săn đón nhờ thiết kế bên ngoài mỏng nhẹ cùng cấu hình mượt tới từ chipset Intel hiện đại. Bên cạnh đó l', 14000000.00, '15.6\" Full HD 144Hz', 'Nvidia RTX 2050 4GB', '8GB DDR5', 'i5-12450H', 'SSD 512GB NMVe', '1701841815hjkhujj.jpg', 8, 0, 11),
(24, 'Laptop Dell Latidude 7320 9PPWV', 'Laptop Dell Latitude 7320 9PPWV - Xử lý dữ liệu nhanh chóng, lưu trữ thả ga \r\nLaptop Dell Latitude 7320 9PPWV là chiếc laptop được thiết kế chuyên nghiệp để xử lý các tác vụ văn phòng, duyệt web, email,...Màn hình 13.3 inch tiện lợi cho di chuyển, bộ vi x', 17000000.00, '15.6\" Full HD 144Hz', 'Nvidia RTX 4050', '8GB DDR5', 'i7 - 12650H', 'SSD 512GB', '1701841913fhfgg.jpg', 12, 0, 11),
(25, 'Laptop MSI Gaming GF63 12UC-887VN', 'CPU Intel Core i7-12650H đem lại khả năng xử lý những tác vụ làm việc nhanh chóng\r\nCard đồ họa RTX 3050 cân mọi tựa game như Esport hoặc game AAA ở mức đồ họa Medium\r\nRAM 8GB giúp bạn có thể thực hiện công việc trên nhiều tác vụ cùng lúc\r\nỔ cứng 512GB SSD', 20000000.00, '15.6\" Full HD 144Hz', 'RTX', '8GB DDR5', 'i7 - 12650H', 'SSD 512GB NMVe', '1701842131a1.jpg', 15, 0, 12),
(26, 'Laptop MSI Modern 14 C11M-011VN', 'Laptop MSI Modern 14 C11M-011VN - Hiệu năng tạo nên thương hiệu\r\nKhông chỉ nổi tiếng với các sản phẩm laptop gaming, MSI còn được đánh giá cao trong phân khúc laptop văn phòng với sản phẩm laptop MSI Modern 14 C11M-011VN. Mẫu laptop MSI Modern này sở hữu ', 10000000.00, '15.6', 'RTX 4050', '8GB DDR5', 'i5-12450H', 'SSD 512GB NMVe', '1701842451a2.jpg', 10, 0, 12),
(27, 'Laptop MSI Gaming Bravo 15 B7ED-010VN', 'Laptop MSI gaming BRAVO 15 B7ED-010VN – Hiệu năng vượt trội, chơi game mượt mà\r\nLaptop MSI gaming BRAVO 15 B7ED-010VN là dòng laptop gaming đến từ thương hiệu MSI. Sản phẩm laptop MSI gaming này với cấu hình mạnh mẽ có thể đáp ứng tốt các trải nghiệm gami', 17000000.00, '15.6\" Full HD 144Hz', 'RTX 4090', '6GB DDR5', 'i7 - 12650H', 'SSD 512GB NMVe', '1701842253a3.jpg', 22, 0, 12),
(28, 'Laptop Acer Aspire 7 A715-76G-5806', 'Laptop Acer Aspire 7 A715 76G 5806 - Hiệu năng mạnh mẽ, đồ họa mượt mà\r\nLaptop Acer Aspire 7 A715 76G 5806 là chiếc máy gaming sở hữu hiệu năng mạnh mẽ, dung lượng lưu trữ lớn và màn hình sắc nét đỉnh cao. Ngoài ra, laptop còn nổi bật với thiết kế bền bỉ,', 20980000.00, '16.6\" Full HD 144Hz', 'RTX 4090 IT', '8GB DDR5', 'i7 - 12650H', 'SSD 512GB NMVe', '1701842338b3.jpg', 16, 1, 13),
(29, 'Laptop Acer Aspire 3 A315-56-38B1 NX.HS5SV.00G', 'Laptop Acer Aspire 3 A315-56-38B1 – Hiệu năng ổn định\r\nLaptop Acer Aspire 3 A315-56-38B1 được các chuyên gia đánh giá cao về hiệu quả mà sản phẩm mang đến trong phân khúc tầm trung. Thông qua cấu hình mạnh mẽ ẩn chứa trong diện mạo sang trọng, chắc chắc p', 7980000.00, '15.6\" Full HD 144Hz', 'RTX 4050', '8GB DDR5', 'i5 - 12650H', 'SSD 250GB NMVe', '1701842407b2.jpg', 6, 5, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int(20) NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `pass` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `role` int(20) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `user`, `pass`, `img`, `email`, `address`, `tel`, `role`) VALUES
(19, 'Đức Huy', '123', '1701841064635d12f94775d.png', 'admin@gmail.com', 'Hải Dương', '0796402156', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bienthe_sp`
--
ALTER TABLE `bienthe_sp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_bienthe_sanpham` (`idsp`),
  ADD KEY `lk_bienthe_ramsp` (`idram`),
  ADD KEY `lk_bienthe_mausp` (`idmau`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_binhluan_taikhoan` (`iduser`),
  ADD KEY `lk_binhluan_sanpham` (`idsp`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_cart_sanpham` (`idsp`),
  ADD KEY `lk_cart_taikhoan` (`iduser`),
  ADD KEY `lk_cart_bill` (`idbill`);

--
-- Chỉ mục cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `mausp`
--
ALTER TABLE `mausp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ramsp`
--
ALTER TABLE `ramsp`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_iddm_danhmuc` (`iddm`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bienthe_sp`
--
ALTER TABLE `bienthe_sp`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `mausp`
--
ALTER TABLE `mausp`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `ramsp`
--
ALTER TABLE `ramsp`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bienthe_sp`
--
ALTER TABLE `bienthe_sp`
  ADD CONSTRAINT `lk_bienthe_mausp` FOREIGN KEY (`idmau`) REFERENCES `mausp` (`id`),
  ADD CONSTRAINT `lk_bienthe_ramsp` FOREIGN KEY (`idram`) REFERENCES `ramsp` (`id`),
  ADD CONSTRAINT `lk_bienthe_sanpham` FOREIGN KEY (`idsp`) REFERENCES `san_pham` (`id`);

--
-- Các ràng buộc cho bảng `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `lk_binhluan_sanpham` FOREIGN KEY (`idsp`) REFERENCES `san_pham` (`id`),
  ADD CONSTRAINT `lk_binhluan_taikhoan` FOREIGN KEY (`iduser`) REFERENCES `tai_khoan` (`id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `lk_cart_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`),
  ADD CONSTRAINT `lk_cart_sanpham` FOREIGN KEY (`idsp`) REFERENCES `san_pham` (`id`),
  ADD CONSTRAINT `lk_cart_taikhoan` FOREIGN KEY (`iduser`) REFERENCES `tai_khoan` (`id`);

--
-- Các ràng buộc cho bảng `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `lk_iddm_danhmuc` FOREIGN KEY (`iddm`) REFERENCES `danh_muc` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
