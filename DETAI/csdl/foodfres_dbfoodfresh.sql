-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 16, 2021 lúc 05:28 PM
-- Phiên bản máy phục vụ: 10.3.32-MariaDB-cll-lve
-- Phiên bản PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `foodfres_dbfoodfresh`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `tenmuc` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `tenmuc`) VALUES
(1, 'Rau củ quả'),
(2, 'Trái cây'),
(3, 'Trái cây nhập khẩu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(10) UNSIGNED NOT NULL,
  `hinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tensp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gia` float NOT NULL,
  `id_sanpham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `hinh`, `tensp`, `gia`, `id_sanpham`) VALUES
(86, '1637245214_ca-chua1.jpg', 'Cà chua', 38000, 0),
(87, '1637289436_bau-xanh-l.jpg', 'Bầu Xanh I', 40000, 0),
(88, '1637289337_xa-lach-carol.png', 'Xà lách carol', 45000, 0),
(89, '1637289436_bau-xanh-l.jpg', 'Bầu Xanh I', 40000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) UNSIGNED NOT NULL,
  `hinh` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `tensp` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gia` float NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `id_muc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `hinh`, `tensp`, `gia`, `mota`, `id_muc`) VALUES
(21, '1637244379_cam-cara-ruot-do-uc.jpg', 'Cam cara ruột đỏ ÚC', 150000, 'Hàng nhập khẩu', 3),
(22, '1637244746_dua-luoi-taki.jpg', 'Dưa lưới Taki', 250000, 'Hàng nhập khẩu', 3),
(25, '1637245214_ca-chua1.jpg', 'Cà chua', 38000, 'Xuất xứ: Đà Lạt', 1),
(26, '1637245441_Bap-cai-tim.jpg', 'Bắp cải tím ', 72000, 'Xuất xứ: Đà Lạt', 1),
(30, '1637289035_dua-leo-baby.jpg', 'Dưa leo baby', 40000, 'Giống rau: Ôn đới\r\n<br>\r\nXuất xứ: Đà Lạt', 1),
(31, '1637289337_xa-lach-carol.png', 'Xà lách carol', 45000, 'Giống rau: Ôn đới\r\n<br>\r\nXuất xứ: Đà Lạt', 1),
(32, '1637289436_bau-xanh-l.jpg', 'Bầu Xanh I', 40000, 'Giống rau: Nhiệt đới<br>\r\n\r\nXuất xứ: Long An', 1),
(33, '1637289713_bi-do-ho-lo.jpg', 'Bí đỏ hồ lô', 63000, 'Giống: Nhiệt đới', 1),
(34, '1637289983_bo-dac-lac.jpg', 'Bơ sáp Đắk Lắc', 10000, '– Xuất Xứ: Đắk Lắc<br>\r\n– Đơn vị tính: Kg', 2),
(35, '1637290591_oi-le-ruot-do.jpg', 'Ổi lê ruột đỏ', 50000, 'Đơn vị tính: Kg', 2),
(37, '1637290842_Inkedchuoi-gia-huu-co.jpg', 'Chuối già hữu cơ', 38000, 'Đơn vị tính: Kg', 2),
(39, '1639296865_xoai-cat-hoa-loc.jpg', 'Xoài cát Hòa lộc', 149000, 'Đơn vị tính: KG', 2),
(40, '1639297001_nho-xanh-ninh-thuan.jpg', 'Nho xanh Ninh Thuận', 85000, 'Nho xanh Ninh Thuận, bán nho xanh Phan Rang-Ninh Thuận loại 1, nguồn gốc rõ ràng, chất lượng đảm bảo.<br> Giá nho xanh Ninh Thuận: 85.000đ/kg', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hodem` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phanquyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `username`, `password`, `hodem`, `ten`, `phanquyen`) VALUES
(1, 'adfoodfresh', '1406de24c55e75eb8adba18e6c6bf07d', 'Text', 'Admin', 1),
(2, 'adminff', '2a60bc1f15995300293f8f7711037b3f', 'Nguyen Van', 'A', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `password` (`password`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
