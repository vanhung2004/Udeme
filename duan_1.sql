-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 22, 2024 lúc 11:24 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan_1`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id_bill` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `tel` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `payment` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1.Thanh toán khi nhận hàng ',
  `bill_startus` tinyint(4) NOT NULL DEFAULT 0 COMMENT '4.Đơn hàng mới ,\r\n0.Đang xử lí ,\r\n1.Đang giao hàng, \r\n2.Đã giao hàng ',
  `total` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id_bill`, `id_user`, `name`, `tel`, `email`, `address`, `date`, `payment`, `bill_startus`, `total`) VALUES
(125, 21, 'Trần Tuấn', 398343821, 'tuantaph33102@fpt.edu.vn', '35/53 tu hoàng', '2023-12-06 14:54:25', 1, 4, 618000),
(126, 21, 'Trần Tuấn', 398343821, 'tuantaph33102@fpt.edu.vn', '35/53 tu hoàng', '2023-12-06 14:54:55', 1, 4, 709000),
(127, 21, 'Trần Tuấn', 398343821, 'tuantaph33102@fpt.edu.vn', '35/53 tu hoàng', '2023-12-06 14:58:10', 1, 4, 29005),
(128, 1, 'Duy Lập', 343014882, 'hoangduylap124@gmail.com', 'Bắc Giang', '2023-12-07 20:43:51', 1, 4, 2209000),
(129, 1, 'Duy Lập', 343014882, 'hoangduylap124@gmail.com', 'Bắc Giang', '2023-12-07 20:44:10', 1, 3, 693000),
(130, 1, 'Duy Lập', 343014882, 'hoangduylap124@gmail.com', 'Bắc Giang', '2023-12-07 22:50:12', 1, 4, 1051219),
(131, 1, 'Duy Lập', 343014882, 'hoangduylap124@gmail.com', 'Bắc Giang', '2023-12-07 22:50:45', 1, 3, 826999),
(132, 1, 'Duy Lập', 343014882, 'hoangduylap124@gmail.com', 'Bắc Giang', '2023-12-07 23:45:53', 1, 1, 0),
(133, 1, 'Duy Lập', 343014882, 'hoangduylap124@gmail.com', 'Bắc Giang', '2023-12-09 20:53:21', 1, 3, 960996),
(134, 8, 'Hoàng Duy Lập', 343014882, 'laphdph32572@fpt.edu.vn', 'Hà Nội Việt Nam', '2023-12-13 14:29:34', 1, 0, 352222),
(135, 8, 'Hoàng Duy Lập', 343014882, 'laphdph32572@fpt.edu.vn', 'Hà Nội Việt Nam', '2023-12-13 14:33:50', 1, 1, 693000),
(136, 8, 'Hoàng Duy Lập', 343014882, 'laphdph32572@fpt.edu.vn', 'Hà Nội Việt Nam', '2023-12-13 14:50:49', 1, 0, 1236222),
(139, 1, 'Admin', 343014882, 'hoangduylap124@gmail.com', '', '2023-12-13 15:57:56', 1, 0, 2451888),
(140, 1, 'Admin', 343014882, 'hoangduylap124@gmail.com', '', '2023-12-14 14:18:48', 1, 1, 675444),
(141, 22, 'hung', 867089453, 'hung@gmail.com', 'aaaaa', '2024-01-22 11:09:29', 1, 0, 928000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `image` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) NOT NULL,
  `size` varchar(100) NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `id_bill` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id_cart`, `id_user`, `product_id`, `image`, `quantity`, `price`, `name`, `size`, `total`, `id_bill`) VALUES
(73, 21, 134, ',neva-fashion2535-400x599.jpg,neva-fashion2993-400x599.jpg,nevafashion35784-400x599.jpg', 1, 589000, 'áo len ', 'S', 618000, 125),
(74, 21, 133, ',nkq8228-400x599.jpg,nevafashionhienstreetstyle8420-400x599.jpg', 2, 340000, 'Áo len sọc ngang', 'M', 709000, 126),
(76, 1, 224, 'img1417-1-400x600.jpg', 4, 545000, 'Chân Váy Áo Dài (Ao Dai Skirt)', 'L', 2209000, 128),
(77, 1, 228, 'img1406-1-400x600.jpg', 1, 221000, 'Chân Váy Pleated Midi', 'M', 693000, 129),
(78, 1, 225, 'img1368-400x600.jpg', 1, 443000, 'Chân Váy Midi Đuôi Cá (Mermaid Midi Skirt)', 'S', 693000, 129),
(79, 1, 232, '4.jpg', 3, 232999, 'Chân Váy Culottes', 'S', 1051219, 130),
(80, 1, 231, '3.jpg', 1, 323222, 'Chân Váy Cắt Laser ', 'S', 1051219, 130),
(81, 1, 234, '5.jpg', 1, 565000, 'Chân Váy Nền Trắng', 'S', 826999, 131),
(82, 1, 232, '4.jpg', 1, 232999, 'Chân Váy Culottes', 'S', 826999, 131),
(83, 1, 232, '4.jpg', 4, 232999, 'Chân Váy Culottes', 'M', 960996, 133),
(84, 8, 231, '3.jpg', 1, 323222, 'Chân Váy Cắt Laser ', 'L', 352222, 134),
(85, 8, 228, 'img1406-1-400x600.jpg', 1, 221000, 'Chân Váy Pleated Midi', 'S', 693000, 135),
(86, 8, 225, 'img1368-400x600.jpg', 1, 443000, 'Chân Váy Midi Đuôi Cá (Mermaid Midi Skirt)', 'S', 693000, 135),
(87, 8, 228, 'img1406-1-400x600.jpg', 4, 221000, 'Chân Váy Pleated Midi', 'S', 1236222, 136),
(88, 8, 231, '3.jpg', 1, 323222, 'Chân Váy Cắt Laser ', 'S', 1236222, 136),
(89, 1, 234, '5.jpg', 2, 565000, 'Chân Váy Nền Trắng', 'M', 2451888, 139),
(90, 1, 231, '3.jpg', 4, 323222, 'Chân Váy Cắt Laser ', 'XL ', 2451888, 139),
(91, 1, 231, '3.jpg', 2, 323222, 'Chân Váy Cắt Laser ', 'M', 675444, 140),
(92, 22, 152, 'nkq8016-400x599.jpg,nkq7803-400x599.jpg', 1, 899000, 'Áo Vest Casual', 'S', 928000, 141);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`, `status`) VALUES
(1, 'Áo', 0),
(26, 'Quần', 0),
(27, 'Đồ ngủ', 0),
(28, 'Đầm', 0),
(29, 'Chân váy', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `date_comment` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `is_hidden` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `image`, `price`, `description`, `category_id`, `is_hidden`) VALUES
(133, 'Áo len sọc ngang', 'nkq8228-400x599.jpg,nevafashionhienstreetstyle8420-400x599.jpg', 340000, 'Áo len là một kiểu trang phục đẹp mắt và chức năng, được làm từ sợi len tự nhiên. Chất liệu len mang lại cảm giác mềm mại và ấm áp, làm cho áo trở thành một lựa chọn lý tưởng trong những ngày se lạnh.', 1, 1),
(134, 'áo len ', 'neva-fashion2535-400x599.jpg,neva-fashion2993-400x599.jpg,nevafashion35784-400x599.jpg', 589000, 'Áo len thường có sự đa dạng về màu sắc, từ các tông màu trung tính như xám, đen, đến các màu sắc tươi sáng và pastel, tạo nên nhiều lựa chọn phù hợp với sở thích cá nhân.', 1, 1),
(139, 'Áo phông cộc tay ', 'img1407-1-400x600.jpg,img1360-1-400x600.jpg', 299000, 'Áo phông có kiểu dáng đơn giản với cổ tròn hoặc cổ V, có thể có túi hoặc không tùy thuộc vào thiết kế. Dài tay giúp bảo vệ cơ thể khỏi ánh nắng mặt trời và giữ ấm trong thời tiết lạnh.', 1, 0),
(140, 'Áo phông họa tiết', 'img1355-1-400x600.jpg', 378000, 'Áo phông họa tiết có sẵn trong nhiều gam màu từ trung tính như trắng, đen, xám đến những màu sắc nổi bật như đỏ, xanh, vàng, phục vụ nhu cầu và phong cách đa dạng.', 1, 0),
(141, 'Áo phông công chúa', 'img1391-1-400x600.jpg,img1399-1-400x600.jpg', 460000, 'Áo phông cong chúa là một trang phục linh hoạt, phản ánh sự thoải mái và thời trang không gian. Đơn giản nhưng không kém phần phong cách, áo phông dài là một item thiết yếu trong tủ đồ của mọi người.', 1, 0),
(142, 'Áo len dài tay', 'nevafashion35747-400x599.jpg,nkq8228-400x599.jpg', 679000, '\r\nÁo len dài tay là một trang phục ấm áp, thoải mái và phổ biến, thường được ưa chuộng trong mùa thu và đông.', 1, 0),
(143, 'Áo len họa tiết ', 'nevafashionhienstreetstyle8420-400x599.jpg,neva-fashion2535-400x599.jpg,neva-fashion2993-400x599.jpg', 699000, ' Áo len họa tiết thường được làm từ sợi len tự nhiên hoặc kết hợp với các chất liệu khác như cotton, tạo nên sự ấm áp và mềm mại.', 1, 0),
(144, 'Áo len sang chảnh ', 'nevafashion35784-400x599.jpg,nevafashion35664-400x599.jpg,neva-fashion30802-1-400x600.jpg', 899000, 'Có nhiều kiểu dáng khác nhau, từ áo len cổ lọ, cổ tròn đến áo len dài tay ôm sát hoặc suông, phù hợp với nhiều sở thích và phong cách.', 1, 0),
(145, 'Áo len bó sát boddy', 'neva-fashion30802-1-400x600.jpg,kiotviet_bdbb3d2bdd8aa44fdc28ed35eb3c5f58.jpg', 456000, 'Áo len bó sát dễ dàng kết hợp với nhiều trang phục khác nhau, từ quần jean, chân váy đến quần âu, tạo nên phong cách ấm áp và trang nhã.', 1, 0),
(146, 'Áo sơ mi công sở', 'neva-fashion2357-400x599.jpg,neva-fashion2698-400x600.jpg', 676000, 'Áo sơ mi dài không chỉ là biểu tượng của sự lịch sự và chuyên nghiệp, mà còn là sự thể hiện cái tôi và gu thẩm mỹ trong thế giới thời trang.', 1, 0),
(147, 'Áo sơ mi lụa làn', 'neva-fashion2945-400x599.jpg,img1367-400x600.jpg,img1420-1-400x600.jpg', 456000, 'Áo sơ mi thường có kiểu dáng cơ bản với tay dài, có thể có cúc tay hoặc dây nối cúc tùy thuộc vào kiểu thiết kế.', 1, 0),
(148, 'Áo sơ mi trắng dài tay', '32487470612251427315442705621047925001526578n-400x600.jpg', 300000, 'Áo sơ mi dài dễ dàng kết hợp với nhiều loại quần, từ quần âu, quần kaki đến quần jean, tạo nên phong cách thanh lịch và truyền thống.', 1, 0),
(149, 'Vest Đeo Chéo ', '16b1c2caceca089451db-400x599.jpg,nevafashionhienstreetstyle8630-400x599.jpg', 1299000, 'Vest đeo chéo có dây đeo chéo ở phía sau, tạo nên một phong cách độc đáo và hiện đại. Thường xuất hiện trong các thiết kế casual hoặc smart-casual', 1, 0),
(150, 'ÁO Vest Dạ Hội', 'neva-fashion2468-400x599.jpg,neva-fashion2902-400x599.jpg,neva-fashion2831-400x599.jpg', 999000, 'Vest dạ hội là một phiên bản lịch sự và sang trọng của vest, thường được kết hợp với bộ suit dành cho các dịp quan trọng và dạ hội. Có thể có các chi tiết đính kèm như đá quý hay lụa.', 1, 0),
(151, 'Áo Vest Lụa', 'neva-fashion2415-400x599.jpg,neva-fashion2295-400x599.jpg,neva-fashion2555-400x599.jpg', 1499000, 'Vest lụa thường được làm từ chất liệu lụa, tạo nên sự sang trọng và mềm mại. Thường được chọn để kết hợp với áo sơ mi và quần âu trong các dịp đặc biệt.', 1, 0),
(152, 'Áo Vest Casual', 'nkq8016-400x599.jpg,nkq7803-400x599.jpg', 899000, 'Vest casual thường được làm từ vải nhẹ và có kiểu dáng đơn giản hơn so với vest chính thức. Nó có thể đi kèm với áo sơ mi và quần jean cho một phong cách thoải mái.', 1, 0),
(153, 'Quần Jogger', 'nevafashionhienstreetstyle8594-400x599.jpg,webgiare_product_f8ff1441020a8a1f4a62c3bf9a3cea03-scaled-400x599.jpg', 342000, 'Quần jogger là loại quần nỉ thể thao có phần ống quần thường rộng ở phần đầu và co lại ở mắt cá. Nó thường có dây rút ở eo và các túi hai bên hoặc túi cargo.', 26, 0),
(154, 'Quần Sweatpant', 'webgiare_product_cc5090850376cf1362b395473f2e5b0c-scaled-400x600.jpg', 299000, 'Quần sweatpant thường có kiểu dáng thoải mái, ống quần lớn và có thể có bản lề ở mắt cá. Chúng thường được làm từ chất liệu nỉ cotton hoặc polyester.', 26, 0),
(156, 'Quần Harem', 'webgiare_product_b604f707e070ad6f3fa2cf1590c53c8d-scaled-400x600.jpg', 343000, 'Quần harem có kiểu dáng ống rộng ở phần đầu và thường co lại ở mắt cá, tạo nên phong cách độc đáo và thoải mái. Thường có dây rút và có thể đi kèm với túi hai bên.', 26, 0),
(157, 'Quần Nỉ Slim Fit', 'webgiare_product_6342a0b73c2de9b66fd63e62f1577f68-scaled-400x599.jpg', 334000, 'Quần nỉ slim fit có kiểu dáng ôm sát cơ thể, thường co lại ở mắt cá. Chúng thích hợp cho những người muốn giữ phong cách thoải mái nhưng không quá rộng rãi.', 26, 0),
(158, 'Quần Culottes', 'webgiare_product_54d59ee2676b85a2f94ba5f3e5fa54af-400x601.jpg', 567000, 'Quần culottes thường có độ rộng và thoải mái giống như váy, nhưng được làm từ chất liệu nỉ, làm cho chúng trở thành sự kết hợp hoàn hảo giữa kiểu dáng thoải mái và nữ tính.', 26, 0),
(160, 'Quần Bell Bottom:', 'webgiare_product_ff9111d8e0d8d351f99f3fc9e8d8368e-scaled-400x600.jpg', 342111, 'Quần bell bottom có kiểu dáng ống quần mở rộng từ đầu đến mắt cá, tạo nên phong cách retro và thường được kết hợp với các thiết kế ưa chuộng thập niên 70.', 26, 0),
(161, 'Quần Sock Ngắn (Ankle Socks)', 'neva-24819-400x600.jpg,neva-fashion31389-400x600.jpg', 2890003, 'Quần sock ngắn thường chỉ che phủ từ mắt cá lên trên mắt cá và thường được sử dụng với giày thể thao hoặc giày sneaker. Đây là loại sock phổ biến trong các hoạt động thể thao và hàng ngày.', 26, 0),
(162, 'Quần Sock Cổ (Crew Socks)', 'nevafashionhienstreetstyle8634-400x599.jpg,nevafashionhienstreetstyle8282-400x599.jpg', 345000, 'Quần sock cổ có chiều cao lên đến phía trên mắt cá hoặc dưới cơ bắp bắp chân. Chúng thích hợp cho nhiều hoạt động và thường được sử dụng với giày thể thao và giày casual.', 26, 0),
(163, 'Quần Sock Tăng Cường', 'neva-fashion2415-400x599.jpg', 453909, 'Quần sock có lớp đệm hoặc lớp dày hơn ở phần đế chân và mắt cá, tăng cường sự thoải mái và giảm áp lực khi đi bộ hoặc thể thao.', 26, 0),
(164, 'Quần Sock Compression', 'img1378-400x600.jpg', 343211, 'Quần sock có thiết kế ôm sát chân và chế độ nén, giúp cải thiện tuần hoàn máu và giảm mệt mỏi. Thường được sử dụng trong y tế hoặc hoạt động thể thao chuyên nghiệp.', 26, 0),
(166, 'Quần Kaki (Khakis):', 'neva17336-400x600.jpg,neva-fashion32435-400x600.jpg,neva-fashion9053-400x600.jpg', 666000, 'Quần kaki là loại quần dài thường được làm từ vải kaki hoặc chất liệu tương tự. Chúng có kiểu dáng thoải mái và thích hợp cho nhiều dịp từ công việc đến những sự kiện không chính thức.', 26, 0),
(167, 'Quần Jogger', '55e48f162053f80da142-400x599.jpg,nkq7769-400x599.jpg', 456000, 'Quần jogger là loại quần dài thể thao với phần đáy thường co lại ở mắt cá và có dây rút ở eo. Chúng thường được sử dụng trong các hoạt động thể thao như jogging hoặc làm đẹp phong cách casual.', 26, 0),
(168, 'Quần Slacks', 'nkq7769-400x599.jpg,nkq8016-400x599.jpg', 332000, 'Quần slacks thường là quần dài kiểu dáng chính thức, thường được sử dụng trong bối cảnh công việc hoặc các sự kiện chính thức. Chúng có kiểu dáng ôm sát và dài đến mắt cá hoặc mắt bàn chân.', 26, 0),
(170, 'Quần Dạ Hội', 'neva-fashion2777-400x599.jpg,img1409-400x600.jpg', 567000, 'Quần dạ hội là phần của bộ dạ hội, thường được làm từ vải lụa hoặc vải dạ hội cao cấp. Chúng thường đi kèm với áo vest và áo sơ mi dạ hội.', 26, 0),
(171, 'Quần Legging', 'neva-fashion2699-400x600.jpg', 233000, 'Quần legging là loại quần dài ôm sát cơ thể, thường được làm từ chất liệu co giãn như spandex hoặc nylon. Chúng thường được sử dụng trong hoạt động thể dục hoặc làm đẹp phong cách casual.', 26, 0),
(172, 'Quần Lửng Kaki', 'webgiare_product_82cdb33a6bf8507257994a539b5bd2af-scaled-400x601.jpg,kiotviet_60a1b9fc862342ca944c103ab1ad91d6.jpg', 567000, 'Quần lửng kaki là phiên bản ngắn của quần kaki, thường được làm từ chất liệu nhẹ và thoải mái. Chúng thích hợp cho cả bối cảnh công việc không chính thức và hoạt động ngoại ô.', 26, 0),
(173, 'Quần Lửng Thể Thao', 'kiotviet_60a1b9fc862342ca944c103ab1ad91d6.jpg,kiotviet_581810ccfbd4921f2ccd9277055ac2a8.jpg,kiotviet_8c53e217b23cbd0b71619863f6858681.jpg', 342890, 'Quần lửng thể thao thường được làm từ chất liệu co giãn và thoáng khí, thiết kế để đảm bảo thoải mái trong khi tập luyện hoặc tham gia các hoạt động thể thao.', 26, 0),
(174, 'Quần Lửng Bermuda', 'kiotviet_ed19d27b99427fe40b69b5b30b219bbe.jpg,kiotviet_ee720a607bc756c1ba5e9c2dd7651bd1.jpg', 456789, 'Quần lửng Bermuda có chiều dài đến mắt đùi hoặc hơi dưới đầu gối. Chúng thường có kiểu dáng thoải mái và phù hợp cho các dịp casual hoặc thời tiết nóng.', 26, 0),
(175, 'Đầm Maxi (Maxi Dress)', 'webgiare_product_c807341d9822ab1859ae052b35a38d35-scaled-400x599.jpg,webgiare_product_3c85110abab41f7da031c0d1eec93816-scaled-400x599.jpg,neva17675-400x599.jpg', 233000, 'Đầm maxi là loại đầm dài, thường chạy xuống tận chân hoặc đất. Chúng thường thoải mái và phù hợp cho những sự kiện ngoại ô hoặc dạo phố.', 28, 0),
(176, 'Đầm Hoa (Floral Dress)', 'neva-x-tu-anh22770-400x599.jpg,neva-x-linh-truong21341-400x600.jpg', 768000, 'Đầm hoa thường có họa tiết hoa văn trên nền vải, tạo nên vẻ nữ tính và tươi tắn. Chúng phù hợp cho nhiều dịp, từ dạo phố đến dự tiệc.', 28, 0),
(177, 'Đầm A-line', 'e639d4a9f48931d76898-400x600.jpg', 545000, 'Đầm A-line có dáng chữ A, rộng từ eo xuống chân. Chúng tạo nên sự thoải mái và thích hợp cho nhiều dáng vóc.', 28, 0),
(178, 'Đầm Dài Tay (Long Sleeve Dress)', 'neva-fashion2311-400x599.jpg', 768000, 'Đầm dài tay thích hợp cho thời tiết lạnh hoặc các sự kiện chính thức. Chúng có thể có nhiều kiểu dáng khác nhau, từ cổ tròn đến cổ V.', 28, 0),
(179, 'Đầm Slip (Slip Dress)', 'img0466-400x600.jpg', 443000, 'Đầm slip có kiểu dáng tương tự như đồ ngủ với dây đeo mảnh. Chúng thường được sử dụng như trang phục lót hoặc kết hợp với áo len hoặc áo thun.', 28, 0),
(180, 'Đầm Công Sở (Office Dress)', 'img0482-400x600.jpg', 786000, 'Đầm công sở thường có kiểu dáng chính thức, với chiều dài vừa phải và màu sắc trung tính. Chúng thích hợp cho môi trường làm việc văn phòng.', 28, 0),
(181, 'Đầm Hoa (Floral Dress)', 'img0475-1-400x600.jpg', 444000, ' Đầm hoa thường có họa tiết hoa văn trên nền vải, tạo nên vẻ nữ tính và tươi tắn. Chúng phù hợp cho nhiều dịp, từ dạo phố đến dự tiệc.', 28, 0),
(182, 'Đầm Sequin (Sequin Dress)', 'img1348-400x600.jpg', 339000, 'Đầm sequin có chiều dài và kiểu dáng đa dạng, được làm từ chất liệu kim loại nhỏ giúp tạo nên vẻ lấp lánh và sang trọng. Chúng thường được chọn cho các bữa tiệc hoặc sự kiện đặc biệt.', 28, 0),
(184, 'Đầm High-Low', '2.jpg', 343000, 'Đầm high-low có phần dưới của đầm dài hơn phần trước, tạo nên kiểu dáng hiện đại và độc đáo. Chúng phù hợp cho nhiều sự kiện khác nhau.', 28, 0),
(185, 'Đầm Babydoll', '3.jpg', 433909, ' Đầm babydoll có kiểu dáng xòe từ ngực xuống dưới eo, tạo nên hình ảnh đáng yêu và thoải mái. Chúng thường có độ rộng và dài đến đầu gối hoặc ngắn hơn.', 28, 0),
(186, 'Đầm Shift Lace', '5.jpg', 544000, 'Đầm shift lace thường có chất liệu ren, tạo nên vẻ nữ tính và gợi cảm. Chúng thường được chọn cho các sự kiện đặc biệt như đám cưới hoặc tiệc tối.', 28, 0),
(187, 'Đầm Kimono', '6.jpg', 333999, 'Đầm kimono có kiểu dáng giống áo kimono truyền thống của Nhật Bản, thường có đường cắt rộng và thoải mái. Chúng thích hợp cho thời tiết nóng.', 28, 0),
(188, 'Đồ Ngủ Thun (Cotton Sleepwear)', 'webgiare_product_593a9554682540a4d02462453c8a6448-scaled-400x601.jpg', 443000, 'Đồ ngủ thun thường bao gồm áo ngủ và quần ngủ làm từ chất liệu cotton, thoải mái và thấm hút mồ hôi. Chúng là lựa chọn phổ biến cho mọi ngày', 27, 0),
(189, 'Đồ Ngủ Đôi (Matching Pajamas)', 'webgiare_product_2fefa7e74ea8a8ac45186d68f5634f9f-scaled-400x600.jpg', 332230, 'Đồ ngủ đôi thường là bộ pajama có thiết kế và màu sắc giống nhau hoặc tương tự cho cả nam và nữ. Chúng tạo nên sự đồng đội và là lựa chọn lãng mạn.', 27, 0),
(190, 'Áo Ngủ Babydoll', 'webgiare_product_fc357f9ac580b9f7388469facba3d3c3-scaled-400x600.jpg', 343000, ' Áo ngủ babydoll thường có kiểu dáng xòe từ ngực xuống dưới eo, tạo nên vẻ thoải mái và dễ chịu. Chúng thích hợp cho những người muốn cảm giác nữ tính và năng động.', 27, 0),
(191, 'Bộ Lingerie (Lingerie Set)', 'webgiare_product_af98ca0fb4c51230762d6ef4735d63e8-scaled-400x601.jpg', 44300, 'Bộ lingerie thường gồm áo ngực và quần lót được thiết kế với kiểu dáng gợi cảm và đẹp mắt. Chúng thường được chọn để tạo nên không khí lãng mạn.', 27, 0),
(192, 'Đồ Ngủ Onesie (Onesie Pajamas)', 'webgiare_product_546613a5f9f3e7180e66de5a51515b15-scaled-400x600.jpg', 879004, ' Đồ ngủ onesie là bộ nguyên mảnh, thường có hình dạng và kiểu dáng của các nhân vật hoạt hình. Chúng là sự lựa chọn vui nhộn và ấm áp.', 27, 0),
(194, 'Đầm Skater (Skater Dress)', 'nevafashion34950-400x599.jpg', 223000, 'Đầm skater có dáng xòe từ eo, tạo nên vẻ trẻ trung và năng động. Phần dưới của đầm mở rộng ra nhẹ, thích hợp cho nhiều dáng vóc và dịp sự kiện.', 28, 0),
(195, 'Đầm A-line', 'img0475-1-400x600.jpg,img0487-400x600.jpg,img1348-400x600.jpg', 434000, ' Đầm A-line có dáng chữ A, rộng từ eo xuống chân, tạo nên sự thoải mái và phù hợp cho nhiều dáng vóc. Đây là kiểu đầm truyền thống và thích hợp cho nhiều sự kiện.', 28, 0),
(197, 'Đầm Wrap', 'neva-fashion2236-400x600.jpg', 454000, 'Đầm wrap có kiểu dáng dạng chéo trước ngực và thường đi kèm với dây nịt hoặc dây buộc. Chúng tạo nên vẻ quyến rũ và linh hoạt trong việc điều chỉnh kích thước.', 28, 0),
(198, 'Đầm Maxi (Maxi Dress)', 'img0466-400x600.jpg,img0482-400x600.jpg', 565000, 'Đầm maxi là loại đầm dài, thường chạy xuống tận chân hoặc đất. Chúng thường thoải mái và phù hợp cho các sự kiện ngoại ô hoặc dạo phố.', 28, 0),
(199, 'Đầm Cocktail', 'neva-fashion2311-400x599.jpg,neva-fashion2686-400x599.jpg', 656000, 'Đầm cocktail thường có chiều dài từ đầu gối đến đầu gối dưới, phù hợp cho các buổi tiệc cocktail và sự kiện semi-formal. Chúng thường có kiểu dáng sang trọng và thoải mái.', 28, 0),
(201, 'Đầm Off-Shoulder', 'webgiare_product_3c85110abab41f7da031c0d1eec93816-scaled-400x599.jpg,neva17675-400x599.jpg', 656655, 'Đầm off-shoulder có phần vai mở ra, tạo nên vẻ quyến rũ và gợi cảm. Chúng thường được chọn để thể hiện phong cách nữ tính và tinh tế.', 28, 0),
(204, 'Đầm Shirt (Shirtdress)', '1.jpg', 433000, 'Đầm shirt có kiểu dáng giống như áo sơ mi, thường có cúc phía trước và có thể điều chỉnh bằng dây nịt ở eo. Chúng tạo nên vẻ năng động và phù hợp cho cả bối cảnh công sở và casual.', 28, 0),
(206, 'Đầm Tea Length', '2.jpg', 767000, 'Đầm tea length có chiều dài chừng giữa đầu gối và mắt cá chân, tạo nên vẻ thanh lịch và lịch lãm. Thường được chọn cho các sự kiện form', 28, 0),
(207, 'Đầm Peplum', '3.jpg', 876000, 'Đầm peplum có phần xòe hoặc váy ngắn xòe ở đường eo, tạo nên vẻ nữ tính và duyên dáng. Chúng phù hợp cho nhiều dịp.', 28, 0),
(208, 'Đầm Hi-low', '4.jpg', 787000, 'Đầm hi-low có phần trước ngắn hơn phần sau, tạo nên vẻ độc đáo và thời trang. Chúng thích hợp cho các sự kiện ngoại ô hoặc tiệc garden.', 28, 0),
(209, 'Đầm Cami (Cami Dress)', '5.jpg', 878000, 'Đầm cami là loại đầm dạng váy với dây đeo nhỏ giống như áo ngủ cami. Chúng thường thoải mái và phù hợp cho mùa hè.', 28, 0),
(210, 'Đầm Denim', '6.jpg', 776900, ' Đầm denim thường được làm từ vải jean, tạo nên vẻ cá tính và thoải mái. Chúng phù hợp cho những ngày dạo phố hoặc các sự kiện ngoại ô.', 28, 0),
(211, 'Đầm Cutout', 'neva17675-400x599.jpg', 887000, 'Đầm cutout có các đường cắt rãnh hay lỗ trên vải, tạo nên vẻ hiện đại và gợi cảm. Chúng thường được chọn cho các sự kiện đêm.', 28, 0),
(212, 'Đầm Prairie', 'img0487-400x600.jpg', 776000, 'Đầm prairie có phong cách vintage với rất nhiều đường xếp ly và hoa văn. Chúng thường mang lại vẻ thoải mái và tinh tế.', 28, 0),
(213, 'Chân Váy A-line (A-line Skirt)', 'nevafashion34950-400x599.jpg', 665000, 'Chân váy A-line có dáng chữ A, rộng từ eo xuống dưới. Chúng tạo nên vẻ thanh lịch và phù hợp cho nhiều dáng vóc.', 29, 0),
(214, 'Chân Váy Bút Chì (Pencil Skirt)', 'neva-fashion30868-1-400x599.jpg', 655000, 'Chân váy bút chì có dáng thẳng và ôm sát cơ thể, thường có chiều dài đến đầu gối hoặc dưới đầu gối. Chúng thích hợp cho môi trường công sở và các sự kiện chính thức.', 29, 0),
(216, 'Chân Váy Áo Dài (Wrap Skirt)', 'nevafashion34902-400x599.jpg', 555000, 'Chân váy áo dài có kiểu dáng giống như váy áo dài truyền thống, thường có chiều dài từ eo xuống chân. Chúng tạo nên vẻ quyến rũ và phù hợp cho nhiều sự kiện.', 29, 0),
(217, 'Chân Váy Skater (Skater Skirt)', 'd93809a1e39b3bc5628a-400x599.jpg', 676000, 'chân váy skater có dáng xòe từ eo, tạo nên vẻ nhẹ nhàng và trẻ trung. Chúng thường là sự lựa chọn phổ biến cho trang phục hàng ngày.', 29, 0),
(218, 'Chân Váy Denim', 'nkq8114-400x599.jpg', 453000, 'Chân váy denim làm từ vải jean, mang lại vẻ năng động và cá tính. Chúng phù hợp cho mùa xuân và mùa hè.', 29, 0),
(220, 'Chân Váy Cao Cấp (High-Low Skirt):', 'img1390-1-400x600.jpg', 453000, 'Chân váy high-low có phần trước ngắn hơn phần sau, tạo nên vẻ độc đáo và thích hợp cho các sự kiện ngoại ô.', 29, 0),
(221, 'Chân Váy Xếp Ly (Pleated Skirt)', 'img1406-1-400x600.jpg', 559000, 'Chân váy xếp ly có nhiều đường xếp ly, tạo nên vẻ duyên dáng và quý phái. Chúng thường được chọn cho các sự kiện chính thức.', 29, 0),
(222, 'Chân Váy Wrap Midi', 'nkq8114-400x599.jpg', 559000, 'Chân váy wrap midi có chiều dài đến giữa chân, với kiểu dáng áo dài trước. Chúng tạo nên vẻ quyến rũ và thích hợp cho nhiều dịp.', 29, 0),
(223, 'Chân Váy Skater Mini', 'img1368-400x600.jpg', 549000, 'Chân váy skater mini có dáng xòe và chiều dài ngắn, thích hợp cho phong cách trẻ trung và vui nhộn.', 29, 0),
(224, 'Chân Váy Áo Dài (Ao Dai Skirt)', 'img1417-1-400x600.jpg', 545000, 'Chân váy áo dài kết hợp với thiết kế truyền thống Áo Dài Việt Nam, tạo nên vẻ duyên dáng và lịch sự.', 29, 0),
(225, 'Chân Váy Midi Đuôi Cá (Mermaid Midi Skirt)', 'img1368-400x600.jpg', 443000, ' Chân váy midi đuôi cá có kiểu dáng mở rộng ở phía dưới giống như đuôi cá, tạo nên vẻ sang trọng và nữ tính.', 29, 0),
(228, 'Chân Váy Pleated Midi', 'img1406-1-400x600.jpg', 221000, 'Chân váy pleated midi có những đường xếp ly, tạo nên vẻ duyên dáng và phong cách retro.', 29, 0),
(229, 'Chân Váy Denim Dáng Bút Chì', '1.jpg', 322000, 'Chân váy denim dáng bút chì có kiểu dáng thẳng và ôm sát cơ thể, thích hợp cho phong cách cá nhân và năng động.', 29, 0),
(230, 'Chân Váy Tennis Pleated', '2.jpg', 239000, 'Chân váy tennis pleated với đường xếp ly và chiều dài vừa phải, tạo nên vẻ thể thao và năng động.', 29, 0),
(231, 'Chân Váy Cắt Laser ', '3.jpg', 323222, 'Chân váy cắt laser với các hoa văn được cắt tỉa bằng laser, tạo nên vẻ hiện đại và sành điệu.', 29, 0),
(232, 'Chân Váy Culottes', '4.jpg', 232999, 'Chân váy culottes có dáng rộng và giống quần short, tạo nên vẻ thoải mái và phóng khoáng.', 29, 0),
(234, 'Chân Váy Nền Trắng', '5.jpg', 565000, 'Chân váy với nền màu trắng sáng, tạo nên vẻ thanh lịch và dễ kết hợp với nhiều trang phục khác nhau.', 29, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_detail`
--

CREATE TABLE `product_detail` (
  `product_detail_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product_detail`
--

INSERT INTO `product_detail` (`product_detail_id`, `product_id`, `size`, `quantity`) VALUES
(761, 139, 'S', 2),
(762, 139, 'M', 5),
(763, 139, 'L', 4),
(764, 139, 'XL ', 8),
(765, 140, 'S', 3),
(766, 140, 'M', 5),
(767, 140, 'L', 8),
(768, 140, 'XL ', 9),
(769, 141, 'S', 3),
(770, 141, 'M', 4),
(771, 141, 'L', 3),
(772, 141, 'XL ', 2),
(773, 142, 'S', 3),
(774, 142, 'M', 5),
(775, 142, 'L', 2),
(776, 142, 'XL ', 2),
(777, 143, 'S', 3),
(778, 143, 'M', 4),
(779, 143, 'L', 2),
(780, 143, 'XL ', 1),
(781, 144, 'S', 2),
(782, 144, 'M', 3),
(783, 144, 'L', 1),
(784, 144, 'XL ', 2),
(785, 145, 'S', 44),
(786, 145, 'M', 4),
(787, 145, 'L', 3),
(788, 145, 'XL ', 6),
(789, 146, 'S', 2),
(790, 146, 'M', 3),
(791, 146, 'L', 3),
(792, 146, 'XL ', 34),
(793, 147, 'S', 2),
(794, 147, 'M', 3),
(795, 147, 'L', 3),
(796, 147, 'XL ', 4),
(797, 148, 'S', 3),
(798, 148, 'M', 2),
(799, 148, 'L', 3),
(800, 148, 'XL ', 2),
(801, 149, 'S', 3),
(802, 149, 'M', 2),
(803, 149, 'L', 3),
(804, 149, 'XL ', 44),
(805, 150, 'S', 2),
(806, 150, 'M', 33),
(807, 150, 'L', 4),
(808, 150, 'XL ', 7),
(809, 151, 'S', 23),
(810, 151, 'M', 3),
(811, 151, 'L', 6),
(812, 151, 'XL ', 5),
(813, 152, 'S', 2),
(814, 152, 'M', 4),
(815, 152, 'L', 3),
(816, 152, 'XL ', 5),
(817, 153, 'S', 1),
(818, 153, 'M', 2),
(819, 153, 'L', 3),
(820, 153, 'XL ', 2),
(821, 154, 'S', 2),
(822, 154, 'M', 3),
(823, 154, 'L', 3),
(824, 154, 'XL ', 5),
(829, 156, 'S', 7),
(830, 156, 'M', 6),
(831, 156, 'L', 8),
(832, 156, 'XL ', 6),
(833, 157, 'S', 2),
(834, 157, 'M', 7),
(835, 157, 'L', 5),
(836, 157, 'XL ', 4),
(837, 158, 'S', 4),
(838, 158, 'M', 5),
(839, 158, 'L', 6),
(840, 158, 'XL ', 7),
(845, 160, 'S', 1),
(846, 160, 'M', 8),
(847, 160, 'L', 99),
(848, 160, 'XL ', 7),
(849, 161, 'S', 2),
(850, 161, 'M', 3),
(851, 161, 'L', 1),
(852, 161, 'XL ', 2),
(853, 162, 'S', 3),
(854, 162, 'M', 4),
(855, 162, 'L', 3),
(856, 162, 'XL ', 2),
(857, 163, 'S', 3),
(858, 163, 'M', 4),
(859, 163, 'L', 5),
(860, 163, 'XL ', 6),
(861, 164, 'S', 5),
(862, 164, 'M', 35),
(863, 164, 'L', 4),
(864, 164, 'XL ', 6),
(869, 166, 'S', 5),
(870, 166, 'M', 4),
(871, 166, 'L', 5),
(872, 166, 'XL ', 6),
(873, 167, 'S', 4),
(874, 167, 'M', 5),
(875, 167, 'L', 3),
(876, 167, 'XL ', 3),
(877, 168, 'S', 7),
(878, 168, 'M', 5),
(879, 168, 'L', 6),
(880, 168, 'XL ', 4),
(885, 170, 'S', 6),
(886, 170, 'M', 5),
(887, 170, 'L', 3),
(888, 170, 'XL ', 4),
(889, 171, 'S', 3),
(890, 171, 'M', 2),
(891, 171, 'L', 2),
(892, 171, 'XL ', 1),
(893, 172, 'S', 5),
(894, 172, 'M', 6),
(895, 172, 'L', 3),
(896, 172, 'XL ', 4),
(897, 173, 'S', 2),
(898, 173, 'M', 3),
(899, 173, 'L', 4),
(900, 173, 'XL ', 5),
(901, 174, 'S', 2),
(902, 174, 'M', 3),
(903, 174, 'L', 4),
(904, 174, 'XL ', 5),
(905, 175, 'S', 3),
(906, 175, 'M', 2),
(907, 175, 'L', 3),
(908, 175, 'XL ', 4),
(909, 176, 'S', 3),
(910, 176, 'M', 2),
(911, 176, 'L', 2),
(912, 176, 'XL ', 2),
(913, 177, 'S', 4),
(914, 177, 'M', 3),
(915, 177, 'L', 4),
(916, 177, 'XL ', 5),
(917, 178, 'S', 4),
(918, 178, 'M', 3),
(919, 178, 'L', 2),
(920, 178, 'XL ', 1),
(921, 179, 'S', 3),
(922, 179, 'M', 2),
(923, 179, 'L', 3),
(924, 179, 'XL ', 4),
(925, 180, 'S', 3),
(926, 180, 'M', 333333),
(927, 180, 'L', 2),
(928, 180, 'XL ', 2),
(929, 181, 'S', 3),
(930, 181, 'M', 2),
(931, 181, 'L', 1),
(932, 181, 'XL ', 2),
(933, 182, 'S', 4),
(934, 182, 'M', 3),
(935, 182, 'L', 2),
(936, 182, 'XL ', 3),
(941, 184, 'S', 5),
(942, 184, 'M', 4),
(943, 184, 'L', 3),
(944, 184, 'XL ', 4),
(945, 185, 'S', 2),
(946, 185, 'M', 2),
(947, 185, 'L', 3),
(948, 185, 'XL ', 4),
(949, 186, 'S', 2),
(950, 186, 'M', 3),
(951, 186, 'L', 4),
(952, 186, 'XL ', 5),
(953, 187, 'S', 4),
(954, 187, 'M', 4),
(955, 187, 'L', 3),
(956, 187, 'XL ', 2),
(957, 188, 'S', 3),
(958, 188, 'M', 2),
(959, 188, 'L', 3),
(960, 188, 'XL ', 2),
(961, 189, 'S', 6),
(962, 189, 'M', 5),
(963, 189, 'L', 4),
(964, 189, 'XL ', 3),
(965, 190, 'S', 2),
(966, 190, 'M', 1),
(967, 190, 'L', 2),
(968, 190, 'XL ', 1),
(969, 191, 'S', 3),
(970, 191, 'M', 2),
(971, 191, 'L', 1),
(972, 191, 'XL ', 2),
(973, 192, 'S', 2),
(974, 192, 'M', 3),
(975, 192, 'L', 4),
(976, 192, 'XL ', 4),
(981, 194, 'S', 3),
(982, 194, 'M', 2),
(983, 194, 'L', 3),
(984, 194, 'XL ', 4),
(985, 195, 'S', 2),
(986, 195, 'M', 3),
(987, 195, 'L', 4),
(988, 195, 'XL ', 5),
(993, 197, 'S', 2),
(994, 197, 'M', 3),
(995, 197, 'L', 4),
(996, 197, 'XL ', 5),
(997, 198, 'S', 2),
(998, 198, 'M', 3),
(999, 198, 'L', 4),
(1000, 198, 'XL ', 4),
(1001, 199, 'S', 2),
(1002, 199, 'M', 3),
(1003, 199, 'L', 4),
(1004, 199, 'XL ', 5),
(1009, 201, 'S', 2),
(1010, 201, 'M', 3),
(1011, 201, 'L', 4),
(1012, 201, 'XL ', 5),
(1021, 204, 'S', 3),
(1022, 204, 'M', 4),
(1023, 204, 'L', 5),
(1024, 204, 'XL ', 8),
(1029, 206, 'S', 3),
(1030, 206, 'M', 4),
(1031, 206, 'L', 5),
(1032, 206, 'XL ', 4),
(1033, 207, 'S', 3),
(1034, 207, 'M', 4),
(1035, 207, 'L', 5),
(1036, 207, 'XL ', 6),
(1037, 208, 'S', 3),
(1038, 208, 'M', 4),
(1039, 208, 'L', 4),
(1040, 208, 'XL ', 4),
(1041, 209, 'S', 5),
(1042, 209, 'M', 6),
(1043, 209, 'L', 7),
(1044, 209, 'XL ', 8),
(1045, 210, 'S', 6),
(1046, 210, 'M', 5),
(1047, 210, 'L', 4),
(1048, 210, 'XL ', 5),
(1049, 211, 'S', 4),
(1050, 211, 'M', 3),
(1051, 211, 'L', 3),
(1052, 211, 'XL ', 3),
(1053, 212, 'S', 3),
(1054, 212, 'M', 3),
(1055, 212, 'L', 3),
(1056, 212, 'XL ', 2),
(1057, 213, 'S', 3),
(1058, 213, 'M', 2),
(1059, 213, 'L', 3),
(1060, 213, 'XL ', 4),
(1061, 214, 'S', 4),
(1062, 214, 'M', 3),
(1063, 214, 'L', 4),
(1064, 214, 'XL ', 4),
(1069, 216, 'S', 6),
(1070, 216, 'M', 7),
(1071, 216, 'L', 6),
(1072, 216, 'XL ', 5),
(1073, 217, 'S', 3),
(1074, 217, 'M', 2),
(1075, 217, 'L', 3),
(1076, 217, 'XL ', 2),
(1077, 218, 'S', 4),
(1078, 218, 'M', 5),
(1079, 218, 'L', 6),
(1080, 218, 'XL ', 7),
(1085, 220, 'S', 3),
(1086, 220, 'M', 4),
(1087, 220, 'L', 5),
(1088, 220, 'XL ', 6),
(1089, 221, 'S', 3),
(1090, 221, 'M', 2),
(1091, 221, 'L', 3),
(1092, 221, 'XL ', 4),
(1093, 222, 'S', 3),
(1094, 222, 'M', 3),
(1095, 222, 'L', 4),
(1096, 222, 'XL ', 5),
(1097, 223, 'S', 2),
(1098, 223, 'M', 3),
(1099, 223, 'L', 4),
(1100, 223, 'XL ', 2),
(1101, 224, 'S', 3),
(1102, 224, 'M', 4),
(1103, 224, 'L', 5),
(1104, 224, 'XL ', 2),
(1105, 225, 'S', 3),
(1106, 225, 'M', 2),
(1107, 225, 'L', 3),
(1108, 225, 'XL ', 2),
(1117, 228, 'S', 3),
(1118, 228, 'M', 2),
(1119, 228, 'L', 3),
(1120, 228, 'XL ', 1),
(1121, 229, 'S', 2),
(1122, 229, 'M', 3),
(1123, 229, 'L', 1),
(1124, 229, 'XL ', 2),
(1125, 230, 'S', 2),
(1126, 230, 'M', 3),
(1127, 230, 'L', 5),
(1128, 230, 'XL ', 4),
(1129, 231, 'S', 2),
(1130, 231, 'M', 3),
(1131, 231, 'L', 1),
(1132, 231, 'XL ', 2),
(1133, 232, 'S', 3),
(1134, 232, 'M', 4),
(1135, 232, 'L', 5),
(1136, 232, 'XL ', 6),
(1141, 234, 'S', 3),
(1142, 234, 'M', 4),
(1143, 234, 'L', 5),
(1144, 234, 'XL ', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tel` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `email`, `password`, `tel`, `address`, `role`) VALUES
(1, 'Admin', 'hoangduylap124@gmail.com', '1123', 867089453, 'aaaa', 1),
(8, 'Hoàng Duy Lập', 'laphdph32572@fpt.edu.vn', '1123', 343014882, 'Hà Nội Việt Nam', 0),
(21, 'Trần Tuấn', 'tuantaph33102@fpt.edu.vn', '2004', 398343821, '35/53 tu hoàng', 0),
(22, 'hung', 'hung@gmail.com', '123', 867089453, 'aaaaa', 0),
(23, 'admin', 'admin@gmail.com', '123', 867089453, 'No', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id_bill`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `cart_detail_ibfk_1` (`id_user`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `id_bill` (`id_bill`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`product_detail_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id_bill` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `product_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1149;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`id_bill`) REFERENCES `bill` (`id_bill`);

--
-- Các ràng buộc cho bảng `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`);

--
-- Các ràng buộc cho bảng `product_detail`
--
ALTER TABLE `product_detail`
  ADD CONSTRAINT `product_detail_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
