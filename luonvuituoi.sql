-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2020 lúc 01:44 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `luonvuituoi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `idBill` int(11) NOT NULL COMMENT 'Hóa đơn',
  `idUser` int(11) NOT NULL COMMENT 'Mã khách hàng',
  `total` float NOT NULL COMMENT 'Tổng tiền',
  `date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày nhập',
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`idBill`, `idUser`, `total`, `date`, `status`) VALUES
(13, 1, 9550, '2020-12-08 06:56:46', 1),
(14, 1, 9550, '2020-12-08 07:04:44', 1),
(15, 1, 5910, '2020-12-09 12:52:12', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `billdetail`
--

CREATE TABLE `billdetail` (
  `idBillDetails` int(11) NOT NULL COMMENT 'Mã chi tiết hóa đơn',
  `idBill` int(11) NOT NULL COMMENT 'Mã hóa đơn',
  `idProductDetail` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `unitPrice` float NOT NULL COMMENT 'Đơn giá',
  `quantity` int(11) NOT NULL COMMENT 'Số lượng',
  `discount` int(11) DEFAULT NULL COMMENT '% giảm giá',
  `subtotal` float NOT NULL COMMENT 'Thành tiền'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `billdetail`
--

INSERT INTO `billdetail` (`idBillDetails`, `idBill`, `idProductDetail`, `unitPrice`, `quantity`, `discount`, `subtotal`) VALUES
(13, 13, 84, 4500, 1, NULL, 4500),
(14, 13, 79, 1150, 1, NULL, 1150),
(15, 13, 83, 3900, 1, NULL, 3900),
(16, 14, 84, 4500, 1, NULL, 4500),
(17, 14, 79, 1150, 1, NULL, 1150),
(18, 14, 83, 3900, 1, NULL, 3900),
(19, 15, 87, 1980, 1, NULL, 1980),
(20, 15, 91, 30, 1, NULL, 30),
(21, 15, 83, 3900, 1, NULL, 3900);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

CREATE TABLE `brand` (
  `idThuongHieu` int(11) NOT NULL COMMENT 'Mã thương hiệu',
  `nameBrand` varchar(50) NOT NULL COMMENT 'Tên thương hiệu'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`idThuongHieu`, `nameBrand`) VALUES
(1, 'Louis Vuitton'),
(2, 'Gucci'),
(3, 'Champion'),
(4, 'Zara'),
(5, 'Saint Laurent'),
(6, 'Burberry');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `idCategory` int(11) NOT NULL COMMENT 'Mã loại sản phẩm',
  `nameCategory` varchar(50) NOT NULL COMMENT 'Tên loại sản phẩm ( shirt, sweater,…)',
  `idGroupProduct` int(11) NOT NULL COMMENT 'Nhóm sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`idCategory`, `nameCategory`, `idGroupProduct`) VALUES
(1, 'T-shirt', 1),
(2, 'Jacket', 1),
(3, 'Sweater', 1),
(4, 'Jeans', 2),
(5, 'Baggy', 2),
(7, 'Sneakers', 3),
(8, 'Lazy shoes', 3),
(9, 'Belts', 4),
(10, 'Tech Accessories', 4),
(11, 'Sunglasses', 4),
(12, 'Analog Watches', 5),
(13, 'Digital Watches', 5),
(14, 'Hybrid Watches', 5),
(15, 'Pants', 2),
(16, 'Necklace', 4),
(17, 'Ring', 4),
(18, 'Handbags', 4),
(19, 'Outerwear', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `idComment` int(11) NOT NULL COMMENT 'id comment',
  `idUser` int(11) NOT NULL COMMENT 'id user',
  `content` varchar(100) NOT NULL COMMENT 'content',
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '(Default: 0- unapproved, 1-approved) ',
  `idProduct` int(11) NOT NULL COMMENT 'id Product'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groupproduct`
--

CREATE TABLE `groupproduct` (
  `idGroupProduct` int(11) NOT NULL COMMENT 'Mã nhóm sản phẩm',
  `nameGroupProduct` varchar(50) NOT NULL COMMENT 'Tên nhóm sản phẩm ( áo, quần,…)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `groupproduct`
--

INSERT INTO `groupproduct` (`idGroupProduct`, `nameGroupProduct`) VALUES
(1, 'Top'),
(2, 'Bottom'),
(3, 'Shoes'),
(4, 'Accessories'),
(5, 'Watch');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productdetail`
--

CREATE TABLE `productdetail` (
  `idProductDetail` int(11) NOT NULL COMMENT 'id Product Detail',
  `idProduct` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `color` varchar(50) DEFAULT NULL COMMENT 'Màu sản phẩm',
  `size` varchar(10) DEFAULT NULL COMMENT 'Size',
  `price` double NOT NULL COMMENT 'Giá',
  `oldPrice` double NOT NULL COMMENT 'Old price',
  `imgUrl` text DEFAULT NULL COMMENT 'Ảnh sản phẩm',
  `quantity` int(50) NOT NULL COMMENT 'Số lượng chi tiết sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `productdetail`
--

INSERT INTO `productdetail` (`idProductDetail`, `idProduct`, `color`, `size`, `price`, `oldPrice`, `imgUrl`, `quantity`) VALUES
(79, 33, 'CLOUD PRINT T-SHIRT SkyBlue', 'M', 1150, 1450, 'louis-vuitton-cloud-print-t-shirt-ready-to-wear--HJY79WNPG617_PM2_Front view.webp', 15),
(80, 34, 'SCULPTURAL JACKET Black', 'Free size', 8300, 10500, 'louis-vuitton-sculptural-jacket-ready-to-wear--HJJ75WTCX900_PM2_Front view.webp', 22),
(81, 35, 'CLOUDS 90S SLIM PANTS SkyBlue', '36', 2330, 2900, 'louis-vuitton-clouds-90s-slim-pants-ready-to-wear--HJP70WYFE600_PM2_Front view.webp', 9),
(83, 36, 'GIANT DAMIER WAVES DENIM JACKET GIANT DAMIER WAVES', '46', 3900, 4400, 'louis-vuitton-giant-damier-waves-monogram-denim-jacket-ready-to-wear--HJA10WUZC650_PM2_Front view.webp', 5),
(84, 37, 'TAMBOUR SLIM MONOGRAM Blue', '', 4500, 4700, 'louis-vuitton-tambour-slim-monogram-watches-and-jewellery--QBB162_PM2_Front view.webp', 4),
(85, 38, 'Men\'s Ace embroidered sneaker White', '36', 680, 700, '429446_02JP0_9064_002_100_0000_Light-Mens-Ace-embroidered-sneaker.png', 16),
(87, 39, '', '', 1980, 2080, '636706_HUHHG_8565_001_080_0000_Light-Jackie-1961-small-hobo-bag.jpg', 25),
(88, 40, 'Online Exclusive Gucci Liberty sweatshirt ', 'M', 1500, 1620, '638043_XJCZ8_4581_001_100_0000_Light-Online-Exclusive-Gucci-Liberty-sweatshirt.jpg', 9),
(89, 41, '', '46', 980, 1500, '636396_4G355_9575_002_100_0000_Light-FakeNot-print-GG-nylon-cape.jpg', 13),
(90, 34, 'SCULPTURAL JACKET Black', 'M', 8200, 10400, 'louis-vuitton-sculptural-jacket-ready-to-wear--HJJ75WTCX900_PM1_Detail view.webp', 10),
(91, 42, 'THICK CHAIN ', '', 30, 32, '8435327808_1_1_1.webp', 30),
(92, 43, 'Classic Jersey Long-Sleeve Tee, Knockout + Mini Lo', 'L', 30, 33, 'HNS_GT78H586826_Scarlet_Coed.jpg', 16),
(93, 44, 'DOUBLE-BREASTED JACKET IN CASHMERE FLANNEL Blue', 'M', 2550, 2600, 'Medium-620613Y3A434000_A.jpg', 7),
(94, 45, 'TIME OUT SNEAKER ', '', 1280, 1315, 'louis-vuitton-time-out-sneaker-shoes--AK3U1ASL33_PM2_Front view.webp', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `idProduct` int(11) NOT NULL COMMENT 'Mã sản phẩm',
  `nameProduct` varchar(50) DEFAULT NULL COMMENT 'Tên sản phẩm',
  `idCategory` int(11) NOT NULL COMMENT 'Loại sản phẩm',
  `idBrand` int(11) NOT NULL COMMENT 'Thương hiệu',
  `imgUrl` varchar(200) NOT NULL COMMENT 'Ảnh đại diện',
  `flashSale` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'flash sale',
  `note` int(10) NOT NULL COMMENT '% discount',
  `date` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'Ngày ra mắt',
  `description` varchar(300) NOT NULL COMMENT 'Description'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`idProduct`, `nameProduct`, `idCategory`, `idBrand`, `imgUrl`, `flashSale`, `note`, `date`, `description`) VALUES
(33, 'CLOUD PRINT T-SHIRT', 1, 1, 'louis-vuitton-cloud-print-t-shirt-ready-to-wear--HJY79WNPG617_PM2_Front view.webp', 1, 20, '2020-12-02 13:49:13', 'With its graphic Cloud motif, this T-shirt channels the season\'s Heaven On Earth theme. The design is digitally printed on lightweight cotton jersey, creating a vintage handcrafted feel. Tailored in a regular fit, the piece features a discreet LV Cloud signature.'),
(34, 'SCULPTURAL JACKET', 2, 1, 'louis-vuitton-sculptural-jacket-ready-to-wear--HJJ75WTCX900_PM2_Front view.webp', 1, 35, '2020-12-02 14:17:44', 'This exceptional piece channels the collection\'s reengineering of corporate dress codes, with a deconstructed version of the traditional suit jacket. Tailored from wool twill in a regular fit, it is broken up into pieces and reassembled with embroidered yarn, creating a sculptural effect. The back i'),
(35, 'CLOUDS 90S SLIM PANTS', 15, 1, 'louis-vuitton-clouds-90s-slim-pants-ready-to-wear--HJP70WYFE600_PM2_Front view.webp', 1, 23, '2020-12-02 14:19:47', 'With its graphic Cloud motif, this Pants channels the season\'s Heaven On Earth theme. The design is digitally printed on lightweight cotton jersey, creating a vintage handcrafted feel. Tailored in a regular fit, the piece features a discreet LV Cloud signature.'),
(36, 'GIANT DAMIER WAVES DENIM JACKET', 1, 1, 'louis-vuitton-giant-damier-waves-monogram-denim-jacket-ready-to-wear--HJA10WUZC650_PM2_Front view.webp', 0, 5, '2020-12-02 15:41:30', 'This exceptional piece channels the collection\'s reengineering of corporate dress codes, with a deconstructed version of the traditional suit jacket. Tailored from wool twill in a regular fit, it is broken up into pieces and reassembled with embroidered yarn, creating a sculptural effect. The back i'),
(37, 'TAMBOUR SLIM MONOGRAM', 12, 1, 'louis-vuitton-tambour-slim-monogram-watches-and-jewellery--QBB162_PM2_Front view.webp', 0, 5, '2020-12-02 16:28:16', 'Distinctive yet easy to wear, this timeless watch combines a thin Tambour Slim case with a classic shade of blue. The dial is adorned with iconic Monogram Flowers in a subtle tone-on-tone motif, with polished indexes and hands adding a sophisticated note of contrast. Ideal for everyday wear, it is a'),
(38, 'Men\'s Ace embroidered sneaker', 7, 2, '429446_02JP0_9064_002_100_0000_Light-Mens-Ace-embroidered-sneaker.png', 0, 5, '2020-12-02 16:40:31', 'The Ace low-top sneaker in leather is embellished with the gold embroidered bee against the Web stripe. The bee is an archival code first introduced in Gucci ready-to-wear in the 1970s.'),
(39, 'Jackie 1961 small hobo bag', 18, 2, '636706_HUHHG_8565_001_080_0000_Light-Jackie-1961-small-hobo-bag.jpg', 0, 5, '2020-12-08 15:26:28', 'The reintroduction of the Jackie bag for Fall Winter 2020 presents a new take on a historical Gucci icon. Brought back to the forefront, the recognizable shape is presented in GG Supreme canvas and enhanced with an additional, detachable shoulder strap. Attached to the bag with a buckle closure, the'),
(40, 'Online Exclusive Gucci Liberty sweatshirt', 3, 2, '638043_XJCZ8_4581_001_100_0000_Light-Online-Exclusive-Gucci-Liberty-sweatshirt.jpg', 0, 7, '2020-12-08 15:31:00', 'In an exclusive collaboration for Fall Winter 2020, Liberty London’s emblematic floral prints define a collection of Gucci accessories and ready-to-wear styles. With its collection of fine ornaments, fabrics and objets d’art from around the world, the Tudor revival luxury department store founded in'),
(41, '\'Fake/Not\' print GG nylon cape', 19, 2, '636396_4G355_9575_001_100_0000_Light-FakeNot-print-GG-nylon-cape.jpg', 0, 5, '2020-12-08 15:35:12', 'A hooded cape presented in GG print nylon. The ironic print ‘Fake’ in capital letters stands against a reinterpretation of the green and red Web stripe, a distinctive code from the archives. Completing the wordplay, the print ‘Not’ is displayed on the other side.'),
(42, 'THICK CHAIN', 16, 4, '8435327808_1_1_1.webp', 0, 3, '2020-12-08 20:03:54', 'SILVER - 8435/327\r\n\r\nThis item has special conditions for returns\r\n\r\nMetal thick chain with links. Lobster clasp fastening.\r\n'),
(43, 'Classic Jersey Long-Sleeve Tee, Knockout + Mini Lo', 1, 3, 'HNS_GT78H586826_Scarlet_Coed.jpg', 0, 5, '2020-12-08 20:28:39', 'The essential Men\'s Long-Sleeve Tee you need in your line-up, it layers well yet is hefty enough to wear solo. Special edition graphics for a fresh take on sport style. Part of our Champion® Made initiative, our Long-Sleeve Jersey Tee is made with traceable U.S. grown cotton and requires 2-5 times l'),
(44, 'DOUBLE-BREASTED JACKET IN CASHMERE FLANNEL', 2, 5, 'Medium-620613Y3A434000_A.jpg', 0, 6, '2020-12-08 20:31:51', '90% WOOL, 10% CASHMERE\r\nSILK LINING\r\nDOUBLE BREASTED, SIX-BUTTON CLOSURE\r\nTWO JETTED POCKETS WITH FLAP AT THE FRONT, ONE WELT POCKET AT THE CHEST\r\nPEAKED LAPEL\r\nPADDED SHOULDERS\r\nSTYLE ID 620613Y3A434000\r\nMADE IN ITALY\r\n'),
(45, 'TIME OUT SNEAKER', 7, 1, 'louis-vuitton-time-out-sneaker-shoes--AK3U1ASL33_PM2_Front view.webp', 0, 7, '2020-12-08 20:34:48', 'The Time Out sneaker is crafted from Louis Vuitton\'s signature Monogram canvas. This model is characterized by its fashionable, elevated outsole in white rubber, which is debossed with a pattern of Monogram Flowers. Bright white laces complement this design, which is finished with two engraved, gold');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `idRating` int(11) NOT NULL COMMENT 'id rating',
  `points` tinyint(4) NOT NULL COMMENT 'points rating',
  `idProduct` int(11) NOT NULL COMMENT 'id Product',
  `idUser` int(11) NOT NULL COMMENT 'id user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `report`
--

CREATE TABLE `report` (
  `idReport` int(11) NOT NULL COMMENT 'Mã report',
  `date` datetime NOT NULL COMMENT 'Ngày xuất report',
  `link` varchar(150) NOT NULL COMMENT 'link report'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role`
--

CREATE TABLE `role` (
  `idRole` int(11) NOT NULL COMMENT 'id role',
  `level` varchar(20) NOT NULL COMMENT 'Chức vụ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `role`
--

INSERT INTO `role` (`idRole`, `level`) VALUES
(1, 'admin'),
(2, 'Giữ xe'),
(3, 'Lao công'),
(4, 'Thành viên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL COMMENT 'Mã khách hàng',
  `fullName` varchar(50) DEFAULT NULL COMMENT 'Tên khách hàng',
  `email` varchar(100) DEFAULT NULL COMMENT 'Email',
  `address` varchar(100) DEFAULT NULL COMMENT 'Địa chỉ',
  `phoneNumber` varchar(15) DEFAULT NULL COMMENT 'Số điện thoại',
  `dateOfBirth` date NOT NULL COMMENT 'Ngày sinh',
  `username` varchar(50) NOT NULL COMMENT 'tài khoản',
  `password` varchar(30) NOT NULL COMMENT 'mật khẩu',
  `idRole` int(11) NOT NULL COMMENT 'id Role'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`idUser`, `fullName`, `email`, `address`, `phoneNumber`, `dateOfBirth`, `username`, `password`, `idRole`) VALUES
(1, 'Nguyễn Trà Thanh Huy', 'huytra264@gmail.com', 'Việt Nam', '0704633073', '2001-04-26', 'thanhhuy264', '778899', 1),
(2, 'Đinh Ân Đại', 'daidaps14196@fpt.edu.vn', 'Dallas', '0989999888', '2000-01-03', 'daidandon', 'cec4f5279c27538d57e0e0e3bbe867', 4);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`idBill`),
  ADD KEY `FK_bill_user` (`idUser`);

--
-- Chỉ mục cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  ADD PRIMARY KEY (`idBillDetails`),
  ADD KEY `FK_billdetail_bill` (`idBill`),
  ADD KEY `FK_billdetail_productdetail` (`idProductDetail`);

--
-- Chỉ mục cho bảng `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`idThuongHieu`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`),
  ADD KEY `FK_category_groupproduct` (`idGroupProduct`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`idComment`),
  ADD KEY `FK_comment_products` (`idProduct`),
  ADD KEY `FK_comment_user` (`idUser`);

--
-- Chỉ mục cho bảng `groupproduct`
--
ALTER TABLE `groupproduct`
  ADD PRIMARY KEY (`idGroupProduct`);

--
-- Chỉ mục cho bảng `productdetail`
--
ALTER TABLE `productdetail`
  ADD PRIMARY KEY (`idProductDetail`),
  ADD KEY `FK_productdetail_products` (`idProduct`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `FK_products_category` (`idCategory`),
  ADD KEY `FK_products_brand` (`idBrand`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`idRating`),
  ADD KEY `FK_rating_user` (`idUser`);

--
-- Chỉ mục cho bảng `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`idReport`);

--
-- Chỉ mục cho bảng `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `FK_user_role` (`idRole`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `idBill` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Hóa đơn', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  MODIFY `idBillDetails` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã chi tiết hóa đơn', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `brand`
--
ALTER TABLE `brand`
  MODIFY `idThuongHieu` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã thương hiệu', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã loại sản phẩm', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `idComment` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id comment', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `groupproduct`
--
ALTER TABLE `groupproduct`
  MODIFY `idGroupProduct` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã nhóm sản phẩm', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `productdetail`
--
ALTER TABLE `productdetail`
  MODIFY `idProductDetail` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id Product Detail', AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã sản phẩm', AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `idRating` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id rating', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `report`
--
ALTER TABLE `report`
  MODIFY `idReport` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã report';

--
-- AUTO_INCREMENT cho bảng `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id role', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Mã khách hàng', AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `FK_bill_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `billdetail`
--
ALTER TABLE `billdetail`
  ADD CONSTRAINT `FK_billdetail_productdetail` FOREIGN KEY (`idProductDetail`) REFERENCES `productdetail` (`idProductDetail`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `FK_category_groupproduct` FOREIGN KEY (`idGroupProduct`) REFERENCES `groupproduct` (`idGroupProduct`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `FK_comment_products` FOREIGN KEY (`idProduct`) REFERENCES `products` (`idProduct`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_comment_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `productdetail`
--
ALTER TABLE `productdetail`
  ADD CONSTRAINT `FK_productdetail_products` FOREIGN KEY (`idProduct`) REFERENCES `products` (`idProduct`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products_brand` FOREIGN KEY (`idBrand`) REFERENCES `brand` (`idThuongHieu`) ON DELETE CASCADE,
  ADD CONSTRAINT `FK_products_category` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `FK_rating_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_role` FOREIGN KEY (`idRole`) REFERENCES `role` (`idRole`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
