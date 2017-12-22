-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2017 lúc 04:02 PM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_dulichcantho`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_hinhanh`
--

CREATE TABLE `dlct_hinhanh` (
  `id` int(10) UNSIGNED NOT NULL,
  `banner` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chitiet1` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `chitiet2` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_hinhanh`
--

INSERT INTO `dlct_hinhanh` (`id`, `banner`, `chitiet1`, `chitiet2`, `dv_iddichvu`, `created_at`, `updated_at`) VALUES
(4, 'banner_2017_12_22foody-mobile--15-_hinhmob-jpg-647-635780150737028844.jpg', '2017_12_22foody-com-tam-ba-bay-nguyen-van-cu-174-636269175402618684.jpg', 'chitiet2_2017_12_22foody-mobile-t7-jpg-690-635948455894259081.jpg', 1, '2017-12-22 15:01:01', '2017-12-22 15:01:01'),
(5, 'banner_2017_12_22khach-san-riverside-quang-binh-8.jpg', '2017_12_22large_swb1464082634_khach_san_marguerite.jpg', 'chitiet2_2017_12_22prop-img-full-hataw9p1-fwtn0j5zu2o(1).jpg', 2, '2017-12-22 15:01:24', '2017-12-22 15:01:24'),
(6, 'banner_2017_12_2237092180.jpg', '2017_12_22foody-cong-vien-van-hoa-mien-tay-479-636027306170888760.jpg', 'chitiet2_2017_12_22foody-mobile-t2-jpg-297-635948411126708920.jpg', 3, '2017-12-22 15:01:53', '2017-12-22 15:01:53');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dlct_hinhanh`
--
ALTER TABLE `dlct_hinhanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_hinhanh_dv_iddichvu_foreign` (`dv_iddichvu`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dlct_hinhanh`
--
ALTER TABLE `dlct_hinhanh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dlct_hinhanh`
--
ALTER TABLE `dlct_hinhanh`
  ADD CONSTRAINT `dlct_hinhanh_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
