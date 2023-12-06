-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 06, 2023 at 05:14 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `da1`
--

-- --------------------------------------------------------

--
-- Table structure for table `bienthe_sp`
--

CREATE TABLE `bienthe_sp` (
  `id` int NOT NULL,
  `idsp` int NOT NULL,
  `idram` int NOT NULL,
  `idmau` int NOT NULL,
  `soluong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bienthe_sp`
--

INSERT INTO `bienthe_sp` (`id`, `idsp`, `idram`, `idmau`, `soluong`) VALUES
(10, 8, 3, 5, 38),
(11, 8, 3, 3, 95),
(12, 8, 3, 1, 50),
(13, 8, 2, 3, 92),
(14, 8, 2, 5, 15),
(15, 8, 2, 1, 90);

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL,
  `iduser` int NOT NULL,
  `bill_name` varchar(50) NOT NULL,
  `bill_address` varchar(50) NOT NULL,
  `bill_tel` varchar(50) NOT NULL,
  `bill_email` varchar(50) NOT NULL,
  `bill_pttt` int NOT NULL DEFAULT '1' COMMENT '1.Thanh toán trực tiếp\r\n2.Thanh toán online',
  `ngaydh` date DEFAULT NULL,
  `total` int NOT NULL DEFAULT '0',
  `bill_status` int NOT NULL DEFAULT '1' COMMENT '1.Đơn hàng mới\r\n2.Đang xử lí\r\n3.Đang giao hàng\r\n4.Đã giao hàng\r\n5.Đơn hàng bị hủy\r\n6.Đang chờ duyệt'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`id`, `iduser`, `bill_name`, `bill_address`, `bill_tel`, `bill_email`, `bill_pttt`, `ngaydh`, `total`, `bill_status`) VALUES
(58, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-11-28', 73437400, 4),
(59, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-11-28', 135920000, 1),
(60, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-11-28', 12993500, 5),
(61, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-11-29', 194902500, 3),
(62, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-11-29', 421352000, 2),
(63, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-11-29', 489312000, 1),
(64, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-11-29', 239381600, 5),
(65, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-11-29', 88332000, 1),
(72, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-11-30', 1753368000, 4),
(74, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-11-30', 271840000, 1),
(86, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-11-30', 135920000, 5),
(87, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-11-30', 1386384000, 1),
(88, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-11-30', 27184000, 1),
(99, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-12-03', 1489135000, 4),
(100, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-12-04', 1359200000, 4),
(101, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-12-04', 138435000, 1),
(102, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-12-05', 29922700, 1),
(120, 16, 'Dương Văn Thảo', 'Cốc Thôn', '0376900771', 'thaodvph36484@fpt.edu.vne', 1, '2023-12-06', 25987000, 1),
(121, 16, 'Dương Văn Thảo', 'HN', '0376900771', 'thaodvph36484@gmail.com', 2, '2023-12-06', 77961000, 1),
(122, 16, 'Văn Thảo', 'Cốc Thôn', '0177628393', 'thaodvph36484@fpt.edu.vne', 1, '2023-12-06', 54368000, 1),
(123, 16, 'Thảo', 'Cốc Thôn', '0', 'thaodvph36484@fpt.edu.vne', 2, '2023-12-06', 67960000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `id` int NOT NULL,
  `noidung` varchar(255) NOT NULL,
  `iduser` int NOT NULL,
  `idsp` int NOT NULL,
  `ngaybl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `binh_luan`
--

INSERT INTO `binh_luan` (`id`, `noidung`, `iduser`, `idsp`, `ngaybl`) VALUES
(6, 'Bài khó khăn quá', 20, 13, '2023-11-17'),
(7, 'Bài khó khăn quá', 16, 13, '2023-11-17'),
(13, 'Khó quá', 20, 13, '2023-11-18'),
(14, 'Laptop này hợp với dân chơi game không ạ!', 16, 13, '2023-11-18'),
(15, 'Bài khó khăn quá', 16, 13, '2023-11-18'),
(16, 'nhà\" laptop Asus. Bởi lẽ chiếc laptop văn phòng Asus Vivobook này không chỉ sở hữu ngoại hình thời trang, \"bắt trend\" màn OLED CHUẨN MÀU 100%DCI-P3 siêu đẹp của năm 202', 16, 13, '2023-11-18'),
(17, 'liên quân mobile thắng bại tay cay', 16, 11, '2023-11-22'),
(18, 'Bài khó khăn quá', 16, 8, '2023-11-25'),
(20, 'Chán', 16, 8, '2023-11-30'),
(21, 'Khó quá', 16, 8, '2023-11-30'),
(22, 'Khó quá', 16, 8, '2023-11-30'),
(23, 'Chán', 16, 8, '2023-11-30'),
(24, 'Lại buồn', 16, 8, '2023-11-30'),
(25, 'Bài khó khăn quá', 16, 8, '2023-11-30'),
(26, 'Lại buồn', 16, 8, '2023-11-30'),
(27, 'alo', 16, 8, '2023-11-30'),
(28, 'Lại buồn', 16, 8, '2023-11-30'),
(29, 'Bài khó khăn quá', 16, 8, '2023-11-30'),
(30, 'Khó quá', 16, 8, '2023-11-30'),
(31, 'Khó quá', 16, 8, '2023-11-30'),
(32, 'Bài khó khăn quá', 16, 8, '2023-11-30'),
(33, 'Khó quá', 16, 8, '2023-11-30'),
(34, 'Bài khó khăn quá', 16, 14, '2023-11-30'),
(35, 'Khó quá', 16, 14, '2023-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int NOT NULL,
  `iduser` int NOT NULL,
  `idsp` int NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `ram` int NOT NULL DEFAULT '0' COMMENT '0.Không có biến thể',
  `mau` int NOT NULL DEFAULT '0' COMMENT '0.Không có biến thể',
  `price` int NOT NULL DEFAULT '0',
  `soluong` int NOT NULL,
  `thanhtien` int NOT NULL,
  `idbill` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `iduser`, `idsp`, `img`, `name`, `ram`, `mau`, `price`, `soluong`, `thanhtien`, `idbill`) VALUES
(53, 16, 14, '../upload/laptop7.jpg', 'Laptop Asus Zenbook Pro 14 OLED', 0, 0, 29922700, 2, 29922700, 58),
(54, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 0, 0, 13592000, 1, 13592000, 58),
(55, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 2, 3, 13592000, 10, 135920000, 59),
(56, 16, 12, '../upload/laptop5.jpg', 'Laptop Asus Vivobook 15 X1504VA', 0, 0, 12993500, 1, 12993500, 60),
(57, 16, 12, '../upload/laptop5.jpg', 'Laptop Asus Vivobook 15 X1504VA', 0, 0, 12993500, 15, 12993500, 61),
(58, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 0, 0, 13592000, 1, 13592000, 62),
(59, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 2, 3, 13592000, 30, 543680000, 62),
(60, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 0, 0, 13592000, 11, 149512000, 63),
(61, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 3, 3, 13592000, 10, 135920000, 63),
(62, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 2, 5, 13592000, 15, 203880000, 63),
(63, 16, 14, '../upload/laptop7.jpg', 'Laptop Asus Zenbook Pro 14 OLED', 0, 0, 29922700, 8, 239381600, 64),
(64, 16, 13, '../upload/laptop6.jpg', 'Laptop Asus Vivobook X1402ZA', 0, 0, 11041500, 8, 88332000, 65),
(71, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 0, 0, 13592000, 103, 13592000, 72),
(72, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 2, 3, 13592000, 20, 135920000, 72),
(73, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 2, 5, 13592000, 6, 81552000, 72),
(75, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 2, 5, 13592000, 20, 271840000, 74),
(87, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 0, 0, 13592000, 10, 13592000, 86),
(88, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 0, 0, 13592000, 102, 13592000, 87),
(89, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 0, 0, 13592000, 2, 13592000, 88),
(106, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 0, 0, 13592000, 100, 1359200000, 99),
(107, 16, 12, '../upload/laptop5.jpg', 'Laptop Asus Vivobook 15 X1504VA', 0, 0, 12993500, 10, 129935000, 99),
(108, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 0, 0, 13592000, 100, 1359200000, 100),
(109, 16, 13, '../upload/laptop6.jpg', 'Laptop Asus Vivobook X1402ZA', 0, 0, 8500000, 1, 8500000, 101),
(110, 16, 12, '../upload/laptop5.jpg', 'Laptop Asus Vivobook 15 X1504VA', 0, 0, 12993500, 10, 129935000, 101),
(111, 16, 14, '../upload/laptop7.jpg', 'Laptop Asus Zenbook Pro 14 OLED', 0, 0, 29922700, 1, 29922700, 102),
(143, 16, 12, '../upload/laptop5.jpg', 'Laptop Asus Vivobook 15 X1504VA', 0, 0, 12993500, 2, 25987000, 120),
(144, 16, 12, '../upload/laptop5.jpg', 'Laptop Asus Vivobook 15 X1504VA', 0, 0, 12993500, 6, 77961000, 121),
(145, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 2, 5, 13592000, 4, 54368000, 122),
(146, 16, 8, '../upload/laptop.jpg', 'Laptop Dell Inspiron 15 3511', 3, 5, 13592000, 5, 67960000, 123);

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_muc`
--

INSERT INTO `danh_muc` (`id`, `name`) VALUES
(3, 'Asus'),
(5, 'Lenovo'),
(6, 'Dell');

-- --------------------------------------------------------

--
-- Table structure for table `mausp`
--

CREATE TABLE `mausp` (
  `id` int NOT NULL,
  `mau_sp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mausp`
--

INSERT INTO `mausp` (`id`, `mau_sp`) VALUES
(1, 'Bạc'),
(3, 'Xám'),
(5, 'Vàng');

-- --------------------------------------------------------

--
-- Table structure for table `ramsp`
--

CREATE TABLE `ramsp` (
  `id` int NOT NULL,
  `ram_sp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ramsp`
--

INSERT INTO `ramsp` (`id`, `ram_sp`) VALUES
(2, '16GB'),
(3, '8GB');

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `mota` text NOT NULL,
  `price` double(10,2) NOT NULL DEFAULT '0.00',
  `cpu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ram` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ocung` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `card_do_hoa` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `man_hinh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `img` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `giamgia` int DEFAULT NULL,
  `luotxem` int NOT NULL DEFAULT '0',
  `iddm` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `san_pham`
--

INSERT INTO `san_pham` (`id`, `name`, `mota`, `price`, `cpu`, `ram`, `ocung`, `card_do_hoa`, `man_hinh`, `img`, `giamgia`, `luotxem`, `iddm`) VALUES
(3, 'Laptop Lenovo IdeaPad Slim 3', 'Lenovo Ideapad là một trong những dòng laptop/ máy tính xách tay được nhiều người dùng ưa chuộng đến từ thương hiệu nổi tiếng laptop Lenovo. Với thiết kế bền bỉ, cứng cáp cùng cấu hình cực ấn tượng, khả năng xử lý các tác vụ nặng mượt mà.', 17990000.00, 'Intel® Core™ i5-12450H', '16GB LPDDR5', 'SSD 512GB NVMe', 'Intel® UHD Graphics', '14 inch Full HD', 'Laptop Lenovo Ideapad 5 Pro.jpg', 20, 0, 5),
(4, 'Lenovo Ideapad Gaming 3', 'Lenovo Ideapad Gaming 3 RTX 2050 là chiếc laptop gaming cực ấn tượng trong năm 2023 của thương hiệu laptop Lenovo. Với những cải tiến vượt trội cả về ngoại hình có body cực ngon, tản nhiệt cho đến hiệu năng, nhưng vẫn có một giá thành hợp lý.', 20990000.00, 'AMD R5-7535HS', '8GB DDR5', 'SSD 512GB NVMe', 'NVIDIA® GeForce RTX™ 2050', '15.6 inch Full HD 120Hz', 'laptop1.jpg', 28, 1, 5),
(5, 'Laptop Lenovo Legion 5 Pro ', 'Hãng laptop Lenovo vẫn luôn được biết đến là một trong những thương hiệu hàng đầu về sản xuất và phân phối laptop/máy tính xách tay trên thị trường. Và nếu bạn đang tìm kiếm một sản phẩm laptop gaming có hiệu năng siêu đỉnh, giúp chiến mượt mọi tựa game.', 40990000.00, 'Intel Core i7 - 12700H', '16GB DDR5', 'SSD 512GB NMVe', 'Nvidia GeForce RTX 3060 6GB', '16 Inch WQXGA 165Hz', 'Laptop Asus VivoBook Go 14.jpg', 25, 4, 5),
(6, 'Lenovo Yoga Slim 6', 'Dòng laptop Lenovo Yoga đã rất mỏng nhẹ, mang lại tính di động cao khi sử dụng. Nhưng nếu bạn muốn sở hữu cho mình chiếc laptop mỏng nhẹ, nhỏ gọn nhưng bền chắc và được trang bị đầy đủ những tính năng cao cấp thì không thể bỏ qua mẫu laptop Lenovo Yoga Slim 6.', 99990000.00, 'Intel Core i7 13700H', 'RAM 16GB LPDDR5x 5200', 'SSD 512GB NVMe', 'Card Intel® Iris® Xe Graphics', '14 Inch WUXGA (1920x1200)', 'Laptop gaming MSI GF63 Thin 11SC.jpg', 15, 0, 5),
(7, 'Laptop Dell Inspiron 16 Plus 7620', 'Đến từ dòng Dell Inspiron của hãng laptop Dell, chiếc laptop/máy tính xách tay Dell Inspiron 16 Plus 7620 không chỉ có hiệu năng vô cùng vượt trội với chip i7 đuôi H siêu mạnh mẽ, màn hình QHD+ sắc nét kết hợp thiết kế sang trọng, bắt mắt.', 29990000.00, 'Intel Core i7-12700H', '40GB DDR5', 'SSD 1TB NVMe', 'Intel Iris Xe Graphics', '16 inch QHD+ 3K', 'Macbook Air 15 inch M2 2023.jpg', 28, 0, 6),
(8, 'Laptop Dell Inspiron 15 3511', 'Nếu bạn đang muốn sở hữu một sản phẩm laptop/máy tính xách tay với mức ngân sách “hạt dẻ” mà vẫn đảm bảo mọi tiêu chí khác thì đừng bỏ lỡ sản phẩm laptop văn phòng Dell Inspiron 15 3511.', 16990000.00, 'Intel Core i5 - 1135G7', '8GB DDR4', 'SSD 512GB NMVe', 'Intel Iris Xe Graphics', '15.6 Inch Full HD', 'laptop.jpg', 20, 581, 6),
(9, 'Laptop Dell Gaming G16 7620', 'Tiếp nối sự thành công của dòng laptop/máy tính xách tay Dell gaming G15, vào cuối năm 2022, hãng laptop Dell đã cho ra mắt dòng laptop gaming Dell G16 với đại diện nổi bật là Dell G16 7620.', 32990000.00, 'Intel Core i7 - 12700H', '16GB DDR5', 'SSD 512GB', 'Nvidia RTX 3060', '16 Inch 165Hz, 2560x1600', 'laptop2.jpg', 25, 3, 6),
(10, 'Laptop Dell XPS 9500', 'Dell XPS 9500 là mẫu laptop cao cấp mỏng nhẹ, có hiệu năng cao đi kèm tỉ lệ màn hình mới cực đẹp; mẫu laptop Dell này sẽ phù hợp với người dùng làm các công việc sáng tạo chuyên nghiệp.', 25990000.00, 'Intel Core i7 10750H', 'RAM 16GB DDR4', 'SSD 512GB NVMe', 'Card rời GTX 1650Ti 4GB', '15.6 Inch Full HD', 'laptop3.jpg', 30, 0, 6),
(11, 'Laptop Asus Zenbook 14 Oled', 'Dòng Asus ZenBook của hãng laptop Asus từ trước đến nay luôn là dòng laptop mỏng nhẹ, cao cấp luôn nhận được sự chú ý và lựa chọn của đông đảo đối tượng doanh nhân, giới văn phòng, hay những người yêu thích thiết kế sang trọng, đẹp mắt.', 29990000.00, 'Intel Core i5-1340P', '16GB LPDDR5', 'SSD 512GB NMVe', 'Intel Iris Xe Graphics', '14.0 Inch OLED WQXGA+', 'laptop4.jpg', 23, 18, 3),
(12, 'Laptop Asus Vivobook 15 X1504VA', 'Asus Vivobook 15 X1504VA là chiếc laptop / máy tính xách tay mang nhiều tính năng nổi trội của dòng Asus Vivobook, kèm theo đó là thiết kế sang trọng cùng hiệu năng mạnh mẽ với chip Gen 13 mới nhất 2023.', 19990000.00, 'Intel Core i5-1335U', '16GB DDR4', 'SSD 512GB M.2 NVMe', 'Intel Iris Xe Graphics', '15.6 inch Full HD', 'laptop5.jpg', 35, 82, 3),
(13, 'Laptop Asus Vivobook X1402ZA', 'Asus Vivobook X1402ZA là chiếc laptop/ máy tính xách giá tầm trung nhưng chắc chắn sẽ làm hài lòng mọi người dùng, đặc biệt cho những ai đang muốn tìm cho mình một chiếc laptop văn phòng', 10000000.00, 'Intel Core i5-1240P', '8GB DDR4', 'SSD 256GB NVMe', 'Intel® UHD Graphics ', '14 Inch Full HD (1920 x 1080)', 'laptop6.jpg', 15, 326, 3),
(14, 'Laptop Asus Zenbook Pro 14 OLED', 'Laptop Asus Zenbook Pro 14 OLED UX6404VV là một trong những chiếc máy tính xách tay - laptop mỏng nhẹ cao cấp tuyệt vời cho dân Design, Creator chuyên nghiệp.', 40990000.00, 'Intel Core i9-13900H', '32GB LPDDR5', 'SSD 1TB NVMe', 'NVIDIA® GeForce RTX™ 4060', '14.5 inch 2.8K OLED 100%', 'laptop7.jpg', 27, 100, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int NOT NULL,
  `user` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `role` int NOT NULL DEFAULT '0' COMMENT '0.Người dùng\r\n1.Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `user`, `pass`, `img`, `email`, `address`, `tel`, `role`) VALUES
(1, 'DThảo', 'd63wRiHQ', 'anh3.jpg', 'thaodvph36484@fpt.edu.vn', 'Cốc Thôn', '0177628393', 0),
(16, 'Văn Thảo', '123', '1700673521anh1.jpg', 'thaodvph36484@fpt.edu.vne', 'Cốc Thôn', '0177628393', 1),
(19, 'Quandubaiz', '123', '1700471321anh2.jpg', 'jjjh@gmail.com', '', '', 0),
(20, 'kaidztiviii', '123', '1700471331anh2.jpg', 'admin@fpt.edu.vne', '', '', 0),
(23, 'Quandubaiz', '123', NULL, 'lll@gmail.com', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bienthe_sp`
--
ALTER TABLE `bienthe_sp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bt_sp` (`idsp`),
  ADD KEY `fk_bt_ram` (`idram`),
  ADD KEY `fk_bt_mau` (`idmau`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bl_sp` (`idsp`),
  ADD KEY `fk_bl_tk` (`iduser`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart_bill` (`idbill`),
  ADD KEY `fk_cart_sp` (`idsp`),
  ADD KEY `fk_cart_tk` (`iduser`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mausp`
--
ALTER TABLE `mausp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ramsp`
--
ALTER TABLE `ramsp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_sp_dm` (`iddm`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bienthe_sp`
--
ALTER TABLE `bienthe_sp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `binh_luan`
--
ALTER TABLE `binh_luan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=147;

--
-- AUTO_INCREMENT for table `danh_muc`
--
ALTER TABLE `danh_muc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mausp`
--
ALTER TABLE `mausp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ramsp`
--
ALTER TABLE `ramsp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bienthe_sp`
--
ALTER TABLE `bienthe_sp`
  ADD CONSTRAINT `fk_bt_mau` FOREIGN KEY (`idmau`) REFERENCES `mausp` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_bt_ram` FOREIGN KEY (`idram`) REFERENCES `ramsp` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_bt_sp` FOREIGN KEY (`idsp`) REFERENCES `san_pham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `fk_bl_sp` FOREIGN KEY (`idsp`) REFERENCES `san_pham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_bl_tk` FOREIGN KEY (`iduser`) REFERENCES `tai_khoan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_cart_sp` FOREIGN KEY (`idsp`) REFERENCES `san_pham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_cart_tk` FOREIGN KEY (`iduser`) REFERENCES `tai_khoan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `fk_sp_dm` FOREIGN KEY (`iddm`) REFERENCES `danh_muc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
