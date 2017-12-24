-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 23, 2017 lúc 05:00 PM
-- Phiên bản máy phục vụ: 10.1.26-MariaDB
-- Phiên bản PHP: 7.1.8

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
-- Cấu trúc bảng cho bảng `dlct_anuong`
--

CREATE TABLE `dlct_anuong` (
  `id` int(10) UNSIGNED NOT NULL,
  `au_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `au_gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_anuong`
--

INSERT INTO `dlct_anuong` (`id`, `au_ten`, `au_gioithieu`, `dv_iddichvu`, `created_at`, `updated_at`) VALUES
(14, 'Phương Nam Restaurant', 'Bình dân, phù hợp cho trẻ em, nhóm', 4, NULL, NULL),
(15, 'Trà sữa BoBaPop', 'Ấm cúng, bình dân, nhóm', 4, NULL, NULL),
(16, 'Mekong Restaurant', 'Bình dân, phù hợp cho trẻ em, nhóm', 4, NULL, NULL),
(17, 'Cafe Hoa Cau', 'Ấm cúng, bình dân, nhóm', 4, NULL, NULL),
(18, 'Lotus Coffee', 'Ấm cúng, bình dân, phù hợp cho trẻ em. Góc nhìn sô...\r\n', 4, NULL, NULL),
(19, 'Nhà Hàng Sao Hôm', 'Rượu cocktail ngon, ấm cúng, bình dân', 4, NULL, NULL),
(20, 'Xôi Gà Uyên Uyên', 'Bình dân', 4, NULL, NULL),
(21, 'Khu ẩm thực Chợ đêm Bến Ninh Kiều', 'Thức ăn, nước uống đa dạng', 4, NULL, NULL),
(22, 'Cà phê Hợp Phố', 'Đang cập nhật', 4, NULL, NULL),
(23, 'Amavo Coffee Shop', 'Đang cập nhật', 4, NULL, NULL),
(24, 'Quán Trà Sữa Miss Donut 1', 'Đang cập nhật', 4, NULL, NULL),
(25, 'Nhà Hàng Gony Spa Cafe Lounge', 'Đang cập nhật', 4, NULL, NULL),
(26, 'Sìl Mỳ', 'Đang cập nhật', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_binhluan`
--

CREATE TABLE `dlct_binhluan` (
  `id` int(10) UNSIGNED NOT NULL,
  `bl_binhluan` longtext COLLATE utf8_unicode_ci NOT NULL,
  `bl_trangthai` tinyint(1) NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `nd_idnguoidung` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_chitietlichtrinh`
--

CREATE TABLE `dlct_chitietlichtrinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `ctlt_gioithieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ctlt_ngaygiodukien` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `lt_idlichtrinh` int(10) UNSIGNED NOT NULL,
  `dd_iddiadiem` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_chitietlichtrinh`
--

INSERT INTO `dlct_chitietlichtrinh` (`id`, `ctlt_gioithieu`, `ctlt_ngaygiodukien`, `lt_idlichtrinh`, `dd_iddiadiem`, `created_at`, `updated_at`) VALUES
(2, 'Thời gian', '1', 1, 15, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_danhgia`
--

CREATE TABLE `dlct_danhgia` (
  `id` int(10) UNSIGNED NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `nd_idnguoidung` int(10) UNSIGNED NOT NULL,
  `dg_diem` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_diadiem`
--

CREATE TABLE `dlct_diadiem` (
  `id` int(10) UNSIGNED NOT NULL,
  `dd_tendiadiem` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dd_gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `dd_diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dd_sodienthoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dd_kinhdo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dd_vido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_idnguoidung` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_diadiem`
--

INSERT INTO `dlct_diadiem` (`id`, `dd_tendiadiem`, `dd_gioithieu`, `dd_diachi`, `dd_sodienthoai`, `dd_kinhdo`, `dd_vido`, `nd_idnguoidung`, `created_at`, `updated_at`) VALUES
(15, 'Bến Ninh Kiều', 'Bến Ninh Kiều nay được gọi là Công viên Ninh Kiều là một bến nước và là địa danh du lịch, văn hóa của thành phố Cần Thơ hình thành từ thế kỷ 19. Bến Ninh Kiều tọa lạc ở bờ phải sông Hậu, nằm giữa ngã ba sông Hậu và sông Cần Thơ tiếp giáp với đường Hai Bà Trưng, phường Tân An, quận Ninh Kiều thuộc thành phố Cần Thơ.\r\n\r\nBến Ninh Kiều là một địa danh du lịch có từ lâu và hấp dẫn du khách bởi phong cảnh sông nước hữu tình và vị trí thuận lợi nhìn ra dòng sông Hậu.[1][2] Từ lâu bến Ninh Kiều đã trở thành biểu tượng về nét đẹp thơ mộng bên bờ sông Hậu của cả Thành phố Cần Thơ, thu hút nhiều du khách đến tham quan [3] và đi vào thơ ca.', '68 Hai Bà Trưng, Tân An, Cần Thơ, Việt Nam', '0292 3821 476', '105.7880508', '10.0321821', 1, NULL, NULL),
(16, 'Cầu đi bộ Ninh Kiều', 'Mặc dù mới được khánh thành cách đây chưa lâu (từ ngày 6/2/2016), nhưng cầu đi bộ bến Ninh Kiều nối bến Ninh Kiều và Cồn Cái Khế thu hút nhiều khách đến chiêm ngưỡng và tham quan từ khắp mọi nơi.\r\n\r\nĐược xây dựng trong khoảng 12 tháng, cầu đi bộ có chiều dài 200m, rộng 7,2m do Ban quản lý dự án đầu tư xây dựng TP. Cần Thơ làm chủ đầu tư với kinh phí xây dựng hơn 49 tỷ đồng.\r\n\r\nCầu đi bộ có vị trí khá “đẹp” khi nằm giữa ngã ba sông Hậu, đứng từ trên cầu có thể nhìn khá rõ cầu Cần Thơ, cồn Ấu và gần như toàn cảnh bến Ninh Kiều. Không những thế, vào buổi chiều, cầu đi bộ là nơi đi dạo của những du khách đến du lịch Cần Thơ và người dân trên địa bàn thành phố.', 'Sông Rạch Khai Luông, Cái Khế, Ninh Kiều, Cần Thơ, Việt Nam', 'Đang cập nhật', '105.7931446', '10.0372003', 1, NULL, NULL),
(17, 'Bãi cát', 'Đang cập nhật', 'Cồn Cái Khế, Ninh Kiều, Cần Thơ', 'Đang cập nhật', '105.7915484', '10.0415424', 1, NULL, NULL),
(18, 'Công viên Sông Hậu', 'Đang cập nhật', '\r\nCái Khế, Ninh Kiều, Cần Thơ, Việt Nam', '090 845 80 52', '105.7909905', '10.0493811', 1, NULL, NULL),
(19, 'Chợ Đêm Trần Phú', 'Đang cập nhật', 'Cái Khế, Ninh Kiều, Cần Thơ, Việt Nam', 'Đang cập nhật', '105.7891345', '10.0508073', 1, NULL, NULL),
(20, 'Trung tâm Hội chợ Triển lãm Quốc tế Cần Thơ (EFC)', 'Trung tâm Hội chợ Triển lãm Quốc tế TP Cần Thơ (viết tắt EFC) là đơn vị sự nghiệp có thu trực thuộc Uỷ ban nhân dân thành phố Cần Thơ, được tiếp nối từ Công ty Hội chợ triển lãm quốc tế Cần Thơ (thành lập ngày 30 tháng 9 năm 1986), là thành viên chính thức của Hội đồng Hội nghị Triển lãm Châu Á – Thái Bình Dương (APECC), thành viên Hiệp hội triển lãm và Hội nghị Việt Nam.\r\n\r\nQua 25 năm hoạt động, EFC đã thiết lập mối quan hệ rộng rãi với các tổ chức kinh tế trong và ngoài nước, khẳng định được chỗ đứng vững chắc và uy tín của một đơn vị chuyên nghiệp tổ chức hội chợ triển lãm, quảng cáo thương mại và tham gia các hoạt động dịch vụ trên phạm vi của vùng và cả nước.\r\n\r\nTừ ngày 16 tháng 9 năm 2011, Trung tâm chính thức với tên gọi: Trung tâm Hội chợ Triển lãm Quốc tế TP Cần Thơ (EFC). Đây được xem là cơ hội để EFC nâng cấp, phát triển cơ sở vật chất khang trang, hiện đại, phát huy sáng tạo, năng động trong hoạt động kinh doanh theo chủ trương chung của Chính phủ…xứng tầm Trung tâm Hội chợ triển lãm quốc tế của khu vực và cả nước.', '108 Lê Lợi, Cái Khế, Ninh Kiều, Cần Thơ, Việt Nam', '0292 3764 646', '105.7886570', '10.0458104', 1, NULL, NULL),
(21, 'Sense City Cần Thơ', 'Đang cập nhật', '\r\nĐại Lộ Hòa Bình Tân An Cần Thơ Tân An Ninh Kiều, Tân An, Can Tho, Cần Thơ, Việt Nam', '+84 292 3688 988', '105.7857173', '10.0344588', 1, NULL, NULL),
(22, 'Bảo Tàng Quân Khu 9', 'Đang cập nhật', 'Đại lộ Hoà Bình, Tân An, Ninh Kiều, Cần Thơ, Việt Nam', '+84 292 3822 173', '105.7853204', '10.0359801', 1, NULL, NULL),
(23, 'Công viên Lưu Hữu Phước', 'Đang cập nhật', 'Hòa Bình, An Lạc, Ninh Kiều, Cần Thơ, Việt Nam', '+84 292 3838 128', '105.7818603', '10.0318704', 1, NULL, NULL),
(24, 'Chùa Phật Học', 'Chùa Phật Học', '\r\n11 Đại Lộ, Hòa Bình, Tân An, Ninh Kiều, Cần Thơ, Việt Nam', '+84 292 3827 685', '105.7841670', '10.0330590', 1, NULL, NULL),
(26, 'Chợ Cái Khế', 'Chợ Cái Khế', 'phố B1, An Hội, Ninh Kiều, Cần Thơ, Việt Nam', '+84 292 3761 748', '105.7844460', '10.0438560', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_dichvu`
--

CREATE TABLE `dlct_dichvu` (
  `id` int(10) UNSIGNED NOT NULL,
  `dv_gioithieu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dv_giomocua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dv_giodongcua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dv_giacaonhat` int(11) NOT NULL,
  `dv_giathapnhat` int(11) NOT NULL,
  `dv_trangthai` tinyint(1) NOT NULL,
  `dd_iddiadiem` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_dichvu`
--

INSERT INTO `dlct_dichvu` (`id`, `dv_gioithieu`, `dv_giomocua`, `dv_giodongcua`, `dv_giacaonhat`, `dv_giathapnhat`, `dv_trangthai`, `dd_iddiadiem`, `created_at`, `updated_at`) VALUES
(4, 'Ăn uống', '8:00', '22:00', 200000, 10000, 1, 15, NULL, NULL),
(5, 'Khách sạn', '6:00', '23:59', 1200000, 150000, 1, 15, NULL, NULL),
(6, 'Vui chơi', '8:00', '22:00', 50000, 20000, 1, 15, NULL, NULL);

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
(4, 'banner_2017_12_20DA3_DIADIEM1_1.jpg', '2017_12_20DA3_DIADIEM1_3.jpg', 'chitiet2_2017_12_20DA3_DIADIEM1_5.jpg', 4, '2017-12-20 12:49:14', '2017-12-20 12:49:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_khachsan`
--

CREATE TABLE `dlct_khachsan` (
  `id` int(10) UNSIGNED NOT NULL,
  `ks_tenkhachsan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ks_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ks_gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_khachsan`
--

INSERT INTO `dlct_khachsan` (`id`, `ks_tenkhachsan`, `ks_website`, `ks_gioithieu`, `dv_iddichvu`, `created_at`, `updated_at`) VALUES
(9, 'Ninh Kieu Riverside Hote', 'ninhkieuhotel.vn', 'Located in the center of Ninh Kieu quay, Can Tho city, the 4 star Ninh Kieu Riverside Hotel, with the unique and impressive architecture in Can Tho city, has created its brand and prestige from the opening.\r\n\r\nWith the best location in Can Tho city, fully modern facilities equipped, professional & enthusiastic staff, and experienced management team as well. We believe that you will be satisfied when enjoying our services.', 5, NULL, NULL),
(10, 'Khách sạn TTC', 'ttccantho.com', 'TTC Hotel Premium - Cần Thơ, một điểm đến lý tưởng, tọa lạc tại Bến Ninh Kiều, Cần Thơ. Chỉ mất 2 phút là Bạn có thể thưởng thức phong cảnh tuyệt đẹp tại Bến Ninh kiều. Khách sạn cao 10 tầng, tại đây bạn có thể ngắm nhìn toàn bộ phong cảnh thành phố và sông Hậu. Với số lượng 107 phòng được trang bị tốt, với không gian rộng rãi thoáng mái sẽ làm cho bạn cảm thấy thật tuyệt vời khi ở tại đây. Bất cứ khi nào bạn đến với TTC Hotel Premium - Cần Thơ cho một kỳ nghỉ hoặc công tác, Bạn sẽ được hân hoan chào đón bởi sự chuyên nghiệp, thân thiện, mến khách từ nhân viên của chúng tôi.', 5, NULL, NULL),
(11, 'International Hotel', 'internationalhotel.vn', 'Khách sạn International vinh hạnh là khách sạn đạt chuẩn 3 sao đầu tiên của Thành phố Cần Thơ với địa thế chiến lược tọa lạc ngay trung tâm Thành phố. Hơn 30 năm cùng sự chuyển mình  của thành phố, khách sạn International được xây dựng lại và khai trương vào tháng 4 năm 2015 với mong muốn trở thành một trong những khách sạn hiện đại, sang trọng và đáng tin cậy nhất nhằm phục vụ nhu cầu của quý khách. Đến với  khách sạn International chúng tôi, quý khách có thể tận hưởng hoàn toàn vẻ đẹp tuyệt vời của dòng sông Hậu và công viên bến Ninh Kiều.  Khách sạn được trang bị 56 phòng với nội thất thiết kế cao cấp, đầy đủ tiện nghi và hiện đại. Bên cạnh đó, khách sạn còn có nhà hàng , hội trường phục vụ Hội nghị, tập huấn, quán cà  phê và bar đáp ứng nhu cầu phục vụ mọi đối tượng khách hàng.', 5, NULL, NULL),
(12, 'Khách Sạn Kim Thơ', 'kimtho.com', 'Đang cập nhật', 5, NULL, NULL),
(13, 'Khách sạn Caravelle Cần Thơ', 'Đang cập nhật', 'Đang cập nhật', 5, NULL, NULL),
(14, 'Khách sạn Tây Hồ', 'Đang cập nhật', 'Đang cập nhật', 5, NULL, NULL),
(15, 'Nam Bộ Boutique Hotel & restaurants', 'nambocantho.com', 'Đang cập nhật', 5, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_lichtrinh`
--

CREATE TABLE `dlct_lichtrinh` (
  `id` int(10) UNSIGNED NOT NULL,
  `lt_ngaylichtrinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `lt_tenlichtrinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lt_gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_lichtrinh`
--

INSERT INTO `dlct_lichtrinh` (`id`, `lt_ngaylichtrinh`, `lt_tenlichtrinh`, `lt_gioithieu`, `created_at`, `updated_at`) VALUES
(1, '1', 'Du lịch Cần Thơ', 'Cần Thơ, một vùng đất miền Tây sông nước hiền hòa. Cần Thơ là một đô thị lớn của vùng Đồng bằng sông Cửu Long, có mạng lưới kênh rạch chằng chịt kết hợp sự nhộn nhịp của chợ nổi Cái Răng vào sáng sớm, vườn trái cây trĩu quả và kiến trúc độc đáo của nhà cổ. Tất cả tạo nên vẻ đẹp sông nước đặc biệt không lẫn vào đâu, khiến du khách tìm đến với nơi đây ngày một đông. Hãy cùng Mytour lên lịch trình cho tour du lịch Cần Thơ 1 ngày của bạn nhé!', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_loaihinhsukien`
--

CREATE TABLE `dlct_loaihinhsukien` (
  `id` int(10) UNSIGNED NOT NULL,
  `lhsk_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_loaihinhsukien`
--

INSERT INTO `dlct_loaihinhsukien` (`id`, `lhsk_ten`, `created_at`, `updated_at`) VALUES
(1, 'Triển Lãm', NULL, NULL),
(2, 'Mua sắm', NULL, NULL),
(3, 'Vui chơi giải trí', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_nguoidung`
--

CREATE TABLE `dlct_nguoidung` (
  `id` int(10) UNSIGNED NOT NULL,
  `nd_tendangnhap` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nd_matkhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_facebook_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_email_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_quocgia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_ngonngu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_nguoidung`
--

INSERT INTO `dlct_nguoidung` (`id`, `nd_tendangnhap`, `nd_matkhau`, `nd_facebook_id`, `nd_email_id`, `nd_avatar`, `nd_quocgia`, `nd_ngonngu`, `created_at`, `updated_at`) VALUES
(1, 'js1smiller', '123456', '1968517156765124', '1968517156765124', 'https://www.facebook.com/photo.php?fbid=1968517156765124&set=a.1377120442571468.1073741825.100008205754126&type=3&source=11&referrer_profile_id=100008205754126', 'Việt Nam', 'Tiếng Việt', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_nguoidungcanhan`
--

CREATE TABLE `dlct_nguoidungcanhan` (
  `id` int(10) UNSIGNED NOT NULL,
  `cn_tennguoidung` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `nd_idnguoidung` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_nguoidungdoanhnghiep`
--

CREATE TABLE `dlct_nguoidungdoanhnghiep` (
  `id` int(10) UNSIGNED NOT NULL,
  `dn_website` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dn_tendoanhnghiep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dn_diachi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dn_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_idnguoidung` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_phuongtien`
--

CREATE TABLE `dlct_phuongtien` (
  `id` int(10) UNSIGNED NOT NULL,
  `pt_tenphuongtien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pt_loaihinh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_sukien`
--

CREATE TABLE `dlct_sukien` (
  `id` int(10) UNSIGNED NOT NULL,
  `sk_tensukien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sk_ngaybatdau` date NOT NULL,
  `sk_ngayketthuc` date NOT NULL,
  `dd_iddiadiem` int(10) UNSIGNED NOT NULL,
  `lhsk_idloaihinhsukien` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_sukien`
--

INSERT INTO `dlct_sukien` (`id`, `sk_tensukien`, `sk_ngaybatdau`, `sk_ngayketthuc`, `dd_iddiadiem`, `lhsk_idloaihinhsukien`, `created_at`, `updated_at`) VALUES
(4, 'Hội chợ Nông nghiệp Quốc tế Việt Nam 2017', '2017-12-13', '2017-12-22', 20, 1, NULL, NULL),
(5, 'Mua 1 tặng 1', '2017-12-22', '2017-12-23', 21, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_thamquan`
--

CREATE TABLE `dlct_thamquan` (
  `id` int(10) UNSIGNED NOT NULL,
  `tq_tendiemthamquan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tq_gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_tukhoa`
--

CREATE TABLE `dlct_tukhoa` (
  `id` int(10) UNSIGNED NOT NULL,
  `tk_tukhoa` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_tukhoa_dichvu`
--

CREATE TABLE `dlct_tukhoa_dichvu` (
  `id` int(10) UNSIGNED NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `tk_idtukhoa` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_vuichoi`
--

CREATE TABLE `dlct_vuichoi` (
  `id` int(10) UNSIGNED NOT NULL,
  `vc_tendiemvuichoi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vc_gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_vuichoi`
--

INSERT INTO `dlct_vuichoi` (`id`, `vc_tendiemvuichoi`, `vc_gioithieu`, `dv_iddichvu`, `created_at`, `updated_at`) VALUES
(4, 'Sense City Game Center', 'Game center tại trung tâm thương mại Sense City', 6, NULL, NULL),
(5, 'V18 Club', 'Đang cập nhật', 6, NULL, NULL),
(6, 'Công Viên Nước Cần Thơ', 'Đến với Công viên Nước Cần Thơ, du khách sẽ đựợc phục vụ các hoạt động vui chơi, giải trí với các trang thiết bị hiện đại nhất của CANADA. Đây cũng là điểm đến hấp dẫn cho du khách trong và ngoài nước vào những ngày nghỉ lễ, những buổi thư giãn cuối tuần hay những buổi sinh hoạt của gia đình, bè bạn hay đối tác kinh doanh sau những giờ làm việc mệt nhọc.\\r\\nHãy đến và cảm nhận sự lôi cuốn từ các trò chơi cảm giác mạnh như: máng trượt bốn làn, máng siêu mở trực tiếp, ống trượt xoáy lốc. Đặc biệt, máng trượt phao lắc ngang lần đầu tiên có mặt ở Đông Nam Á tại Công viên nước Cần Thơ, cùng với nhiều loại hình trò chơi nước khác như: hồ tạo sóng, dòng sông lười, sân phun nước, hồ tạo sương mù…Ngoài ra, Công viên Nước Cần Thơ còn có khu vui chơi dành cho các em thiếu nhi với lâu đài nước, những máng trượt hình thú dễ thương để các em có thể chui vào bụng thú và ra bằng đầu thú thật vui tươi và hấp dẫn', 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_yeuthich`
--

CREATE TABLE `dlct_yeuthich` (
  `id` int(10) UNSIGNED NOT NULL,
  `dd_iddiadiem` int(10) UNSIGNED NOT NULL,
  `nd_idnguoidung` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(63, '2017_11_02_142109_create_nguoidung_table', 1),
(64, '2017_11_02_143248_create_diadiem_table', 1),
(65, '2017_11_02_143901_create_lichtrinh_table', 1),
(66, '2017_11_02_144022_create_chitietlichtrinh_table', 1),
(67, '2017_11_02_144140_create_dichvu_table', 1),
(68, '2017_11_02_144243_create_loaihinhsukien_table', 1),
(69, '2017_11_02_144358_create_sukien_table', 1),
(70, '2017_11_02_144540_create_binhluan_table', 1),
(71, '2017_11_02_151955_create_danhgia_table', 1),
(72, '2017_11_02_152627_create_thamquan_table', 1),
(73, '2017_11_02_152802_create_phuongtien_table', 1),
(74, '2017_11_02_152910_create_anuong_table', 1),
(75, '2017_11_02_152958_create_khachsan_table', 1),
(76, '2017_11_02_153038_create_vuichoi_table', 1),
(77, '2017_11_09_123423_create_yeuthich_table', 1),
(78, '2017_11_13_141540_create_tukhoa_table', 1),
(79, '2017_11_13_144257_create_tukhoa_dichvu_table', 1),
(80, '2017_12_13_233705_create_nguoidungcanhan_table', 1),
(81, '2017_12_13_235129_create_nguoidungdoanhnghiep_table', 1),
(82, '2017_12_18_141111_create_hinhanh_table', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dlct_anuong`
--
ALTER TABLE `dlct_anuong`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_anuong_dv_iddichvu_foreign` (`dv_iddichvu`);

--
-- Chỉ mục cho bảng `dlct_binhluan`
--
ALTER TABLE `dlct_binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_binhluan_dv_iddichvu_foreign` (`dv_iddichvu`),
  ADD KEY `dlct_binhluan_nd_idnguoidung_foreign` (`nd_idnguoidung`);

--
-- Chỉ mục cho bảng `dlct_chitietlichtrinh`
--
ALTER TABLE `dlct_chitietlichtrinh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_chitietlichtrinh_lt_idlichtrinh_foreign` (`lt_idlichtrinh`),
  ADD KEY `dlct_chitietlichtrinh_dd_iddiadiem_foreign` (`dd_iddiadiem`);

--
-- Chỉ mục cho bảng `dlct_danhgia`
--
ALTER TABLE `dlct_danhgia`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dlct_danhgia_dv_iddichvu_nd_idnguoidung_unique` (`dv_iddichvu`,`nd_idnguoidung`),
  ADD KEY `dlct_danhgia_nd_idnguoidung_foreign` (`nd_idnguoidung`);

--
-- Chỉ mục cho bảng `dlct_diadiem`
--
ALTER TABLE `dlct_diadiem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_diadiem_nd_idnguoidung_foreign` (`nd_idnguoidung`);

--
-- Chỉ mục cho bảng `dlct_dichvu`
--
ALTER TABLE `dlct_dichvu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_dichvu_dd_iddiadiem_foreign` (`dd_iddiadiem`);

--
-- Chỉ mục cho bảng `dlct_hinhanh`
--
ALTER TABLE `dlct_hinhanh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_hinhanh_dv_iddichvu_foreign` (`dv_iddichvu`);

--
-- Chỉ mục cho bảng `dlct_khachsan`
--
ALTER TABLE `dlct_khachsan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_khachsan_dv_iddichvu_foreign` (`dv_iddichvu`);

--
-- Chỉ mục cho bảng `dlct_lichtrinh`
--
ALTER TABLE `dlct_lichtrinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dlct_loaihinhsukien`
--
ALTER TABLE `dlct_loaihinhsukien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dlct_nguoidung`
--
ALTER TABLE `dlct_nguoidung`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dlct_nguoidung_nd_tendangnhap_unique` (`nd_tendangnhap`);

--
-- Chỉ mục cho bảng `dlct_nguoidungcanhan`
--
ALTER TABLE `dlct_nguoidungcanhan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_nguoidungcanhan_nd_idnguoidung_foreign` (`nd_idnguoidung`);

--
-- Chỉ mục cho bảng `dlct_nguoidungdoanhnghiep`
--
ALTER TABLE `dlct_nguoidungdoanhnghiep`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_nguoidungdoanhnghiep_nd_idnguoidung_foreign` (`nd_idnguoidung`);

--
-- Chỉ mục cho bảng `dlct_phuongtien`
--
ALTER TABLE `dlct_phuongtien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_phuongtien_dv_iddichvu_foreign` (`dv_iddichvu`);

--
-- Chỉ mục cho bảng `dlct_sukien`
--
ALTER TABLE `dlct_sukien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_sukien_dd_iddiadiem_foreign` (`dd_iddiadiem`),
  ADD KEY `dlct_sukien_lhsk_idloaihinhsukien_foreign` (`lhsk_idloaihinhsukien`);

--
-- Chỉ mục cho bảng `dlct_thamquan`
--
ALTER TABLE `dlct_thamquan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_thamquan_dv_iddichvu_foreign` (`dv_iddichvu`);

--
-- Chỉ mục cho bảng `dlct_tukhoa`
--
ALTER TABLE `dlct_tukhoa`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dlct_tukhoa_dichvu`
--
ALTER TABLE `dlct_tukhoa_dichvu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_tukhoa_dichvu_dv_iddichvu_foreign` (`dv_iddichvu`),
  ADD KEY `dlct_tukhoa_dichvu_tk_idtukhoa_foreign` (`tk_idtukhoa`);

--
-- Chỉ mục cho bảng `dlct_vuichoi`
--
ALTER TABLE `dlct_vuichoi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dlct_vuichoi_dv_iddichvu_foreign` (`dv_iddichvu`);

--
-- Chỉ mục cho bảng `dlct_yeuthich`
--
ALTER TABLE `dlct_yeuthich`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nd_idnguoidung` (`dd_iddiadiem`),
  ADD KEY `dlct_yeuthich_nd_idnguoidung_foreign` (`nd_idnguoidung`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dlct_anuong`
--
ALTER TABLE `dlct_anuong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT cho bảng `dlct_binhluan`
--
ALTER TABLE `dlct_binhluan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dlct_chitietlichtrinh`
--
ALTER TABLE `dlct_chitietlichtrinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `dlct_danhgia`
--
ALTER TABLE `dlct_danhgia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dlct_diadiem`
--
ALTER TABLE `dlct_diadiem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT cho bảng `dlct_dichvu`
--
ALTER TABLE `dlct_dichvu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `dlct_hinhanh`
--
ALTER TABLE `dlct_hinhanh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `dlct_khachsan`
--
ALTER TABLE `dlct_khachsan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT cho bảng `dlct_lichtrinh`
--
ALTER TABLE `dlct_lichtrinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `dlct_loaihinhsukien`
--
ALTER TABLE `dlct_loaihinhsukien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `dlct_nguoidung`
--
ALTER TABLE `dlct_nguoidung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `dlct_nguoidungcanhan`
--
ALTER TABLE `dlct_nguoidungcanhan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dlct_nguoidungdoanhnghiep`
--
ALTER TABLE `dlct_nguoidungdoanhnghiep`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dlct_phuongtien`
--
ALTER TABLE `dlct_phuongtien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dlct_sukien`
--
ALTER TABLE `dlct_sukien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `dlct_thamquan`
--
ALTER TABLE `dlct_thamquan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dlct_tukhoa`
--
ALTER TABLE `dlct_tukhoa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dlct_tukhoa_dichvu`
--
ALTER TABLE `dlct_tukhoa_dichvu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dlct_vuichoi`
--
ALTER TABLE `dlct_vuichoi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `dlct_yeuthich`
--
ALTER TABLE `dlct_yeuthich`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `dlct_anuong`
--
ALTER TABLE `dlct_anuong`
  ADD CONSTRAINT `dlct_anuong_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_binhluan`
--
ALTER TABLE `dlct_binhluan`
  ADD CONSTRAINT `dlct_binhluan_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dlct_binhluan_nd_idnguoidung_foreign` FOREIGN KEY (`nd_idnguoidung`) REFERENCES `dlct_nguoidung` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_chitietlichtrinh`
--
ALTER TABLE `dlct_chitietlichtrinh`
  ADD CONSTRAINT `dlct_chitietlichtrinh_dd_iddiadiem_foreign` FOREIGN KEY (`dd_iddiadiem`) REFERENCES `dlct_diadiem` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dlct_chitietlichtrinh_lt_idlichtrinh_foreign` FOREIGN KEY (`lt_idlichtrinh`) REFERENCES `dlct_lichtrinh` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_danhgia`
--
ALTER TABLE `dlct_danhgia`
  ADD CONSTRAINT `dlct_danhgia_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dlct_danhgia_nd_idnguoidung_foreign` FOREIGN KEY (`nd_idnguoidung`) REFERENCES `dlct_nguoidung` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_diadiem`
--
ALTER TABLE `dlct_diadiem`
  ADD CONSTRAINT `dlct_diadiem_nd_idnguoidung_foreign` FOREIGN KEY (`nd_idnguoidung`) REFERENCES `dlct_nguoidung` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_dichvu`
--
ALTER TABLE `dlct_dichvu`
  ADD CONSTRAINT `dlct_dichvu_dd_iddiadiem_foreign` FOREIGN KEY (`dd_iddiadiem`) REFERENCES `dlct_diadiem` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_hinhanh`
--
ALTER TABLE `dlct_hinhanh`
  ADD CONSTRAINT `dlct_hinhanh_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_khachsan`
--
ALTER TABLE `dlct_khachsan`
  ADD CONSTRAINT `dlct_khachsan_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_nguoidungcanhan`
--
ALTER TABLE `dlct_nguoidungcanhan`
  ADD CONSTRAINT `dlct_nguoidungcanhan_nd_idnguoidung_foreign` FOREIGN KEY (`nd_idnguoidung`) REFERENCES `dlct_nguoidung` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_nguoidungdoanhnghiep`
--
ALTER TABLE `dlct_nguoidungdoanhnghiep`
  ADD CONSTRAINT `dlct_nguoidungdoanhnghiep_nd_idnguoidung_foreign` FOREIGN KEY (`nd_idnguoidung`) REFERENCES `dlct_nguoidung` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_phuongtien`
--
ALTER TABLE `dlct_phuongtien`
  ADD CONSTRAINT `dlct_phuongtien_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_sukien`
--
ALTER TABLE `dlct_sukien`
  ADD CONSTRAINT `dlct_sukien_dd_iddiadiem_foreign` FOREIGN KEY (`dd_iddiadiem`) REFERENCES `dlct_diadiem` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dlct_sukien_lhsk_idloaihinhsukien_foreign` FOREIGN KEY (`lhsk_idloaihinhsukien`) REFERENCES `dlct_loaihinhsukien` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_thamquan`
--
ALTER TABLE `dlct_thamquan`
  ADD CONSTRAINT `dlct_thamquan_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_tukhoa_dichvu`
--
ALTER TABLE `dlct_tukhoa_dichvu`
  ADD CONSTRAINT `dlct_tukhoa_dichvu_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dlct_tukhoa_dichvu_tk_idtukhoa_foreign` FOREIGN KEY (`tk_idtukhoa`) REFERENCES `dlct_tukhoa` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_vuichoi`
--
ALTER TABLE `dlct_vuichoi`
  ADD CONSTRAINT `dlct_vuichoi_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `dlct_yeuthich`
--
ALTER TABLE `dlct_yeuthich`
  ADD CONSTRAINT `dlct_yeuthich_dd_iddiadiem_foreign` FOREIGN KEY (`dd_iddiadiem`) REFERENCES `dlct_diadiem` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dlct_yeuthich_nd_idnguoidung_foreign` FOREIGN KEY (`nd_idnguoidung`) REFERENCES `dlct_nguoidung` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
