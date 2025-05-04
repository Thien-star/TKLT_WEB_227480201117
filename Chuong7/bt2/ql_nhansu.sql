-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 03, 2025 lúc 01:09 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_nhansu`
--
CREATE DATABASE IF NOT EXISTS `ql_nhansu` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ql_nhansu`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `donvi`
--

CREATE TABLE `donvi` (
  `id` int(11) NOT NULL,
  `ten_khoa` varchar(100) DEFAULT NULL,
  `chucvu` varchar(100) DEFAULT NULL,
  `hoten` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `donvi`
--

INSERT INTO `donvi` (`id`, `ten_khoa`, `chucvu`, `hoten`) VALUES
(1, 'Khoa KT&CN', 'Trưởng khoa', 'Nguyễn Văn A'),
(2, 'Khoa KT&CN', 'Phó khoa', 'Lê Thị B'),
(3, 'Khoa Sư phạm', 'Trưởng khoa', 'Trần Văn C'),
(4, 'Khoa NN&TS', 'Trưởng khoa', 'Phạm Thị D'),
(5, 'Khoa Kinh tế và Luật', 'Trưởng khoa', 'Đỗ Văn E');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `luong`
--

CREATE TABLE `luong` (
  `id` int(11) NOT NULL,
  `ma_nv` varchar(10) DEFAULT NULL,
  `thang` int(11) DEFAULT NULL,
  `nam` int(11) DEFAULT NULL,
  `luong_cb` decimal(15,2) DEFAULT NULL,
  `phu_cap` decimal(15,2) DEFAULT NULL,
  `thuong` decimal(15,2) DEFAULT NULL,
  `khau_tru` decimal(15,2) DEFAULT NULL,
  `tong_luong` decimal(15,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `luong`
--

INSERT INTO `luong` (`id`, `ma_nv`, `thang`, `nam`, `luong_cb`, `phu_cap`, `thuong`, `khau_tru`, `tong_luong`) VALUES
(1, 'NV001', 4, 2025, 5000000.00, 1000000.00, 500000.00, 300000.00, 6200000.00),
(2, 'NV002', 4, 2025, 5500000.00, 800000.00, 200000.00, 250000.00, 6250000.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

CREATE TABLE `nhanvien` (
  `ma_nv` varchar(10) NOT NULL,
  `ho_ten` varchar(100) DEFAULT NULL,
  `gioi_tinh` varchar(10) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `dia_chi` text DEFAULT NULL,
  `sdt` varchar(15) DEFAULT NULL,
  `ma_dv` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`ma_nv`, `ho_ten`, `gioi_tinh`, `ngay_sinh`, `dia_chi`, `sdt`, `ma_dv`) VALUES
('NV001', 'Nguyễn Thị A', 'Nữ', '1990-01-15', 'Bạc Liêu', '0909123456', 1),
('NV002', 'Trần Văn B', 'Nam', '1988-05-22', 'Cà Mau', '0912345678', 2),
('NV003', 'Lê Thị C', 'Nữ', '1995-08-10', 'Sóc Trăng', '0933445566', 3),
('NV004', 'Phạm Văn D', 'Nam', '1982-03-18', 'Hậu Giang', '0944556677', 4),
('NV005', 'Đỗ Thị E', 'Nữ', '1993-12-25', 'Bạc Liêu', '0977665544', 5);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `donvi`
--
ALTER TABLE `donvi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `luong`
--
ALTER TABLE `luong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ma_nv` (`ma_nv`);

--
-- Chỉ mục cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`ma_nv`),
  ADD KEY `ma_dv` (`ma_dv`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `donvi`
--
ALTER TABLE `donvi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `luong`
--
ALTER TABLE `luong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `luong`
--
ALTER TABLE `luong`
  ADD CONSTRAINT `luong_ibfk_1` FOREIGN KEY (`ma_nv`) REFERENCES `nhanvien` (`ma_nv`);

--
-- Các ràng buộc cho bảng `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`ma_dv`) REFERENCES `donvi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
