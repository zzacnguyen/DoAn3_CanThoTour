-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 27, 2017 lúc 01:57 PM
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
-- Cấu trúc bảng cho bảng `dlct_anuong`
--

CREATE TABLE `dlct_anuong` (
  `id` int(10) UNSIGNED NOT NULL,
  `au_ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_anuong`
--

INSERT INTO `dlct_anuong` (`id`, `au_ten`, `dv_iddichvu`, `created_at`, `updated_at`) VALUES
(1, 'Bamboo Dimsum - Lotte Mart Cần Thơ', 4, NULL, NULL),
(2, 'Sủi Cảo A Chảy - Nam Kỳ Khởi Nghĩa', 5, NULL, NULL);

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
  `dd_sodienthoai` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
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
(1, 'Bến Ninh Kiều', 'Bến Ninh Kiều nay được gọi là Công viên Ninh Kiều là một bến nước và là địa danh du lịch, văn hóa của thành phố Cần Thơ hình thành từ thế kỷ 19. Bến Ninh Kiều tọa lạc ở bờ phải sông Hậu, nằm giữa ngã ba sông Hậu và sông Cần Thơ tiếp giáp với đường Hai Bà Trưng, phường Tân An, quận Ninh Kiều thuộc thành phố Cần Thơ.\r\n\r\nBến Ninh Kiều là một địa danh du lịch có từ lâu và hấp dẫn du khách bởi phong cảnh sông nước hữu tình và vị trí thuận lợi nhìn ra dòng sông Hậu.[1][2] Từ lâu bến Ninh Kiều đã trở thành biểu tượng về nét đẹp thơ mộng bên bờ sông Hậu của cả Thành phố Cần Thơ, thu hút nhiều du khách đến tham quan [3] và đi vào thơ ca.', '68 Hai Bà Trưng, Tân An, Cần Thơ, Việt Nam', '0292 3821 476', '105.7880508\r\n', '10.0321821', 1, NULL, NULL),
(2, 'Cầu đi bộ Ninh Kiều', 'Mặc dù mới được khánh thành cách đây chưa lâu (từ ngày 6/2/2016), nhưng cầu đi bộ bến Ninh Kiều nối bến Ninh Kiều và Cồn Cái Khế thu hút nhiều khách đến chiêm ngưỡng và tham quan từ khắp mọi nơi.\r\n\r\nĐược xây dựng trong khoảng 12 tháng, cầu đi bộ có chiều dài 200m, rộng 7,2m do Ban quản lý dự án đầu tư xây dựng TP. Cần Thơ làm chủ đầu tư với kinh phí xây dựng hơn 49 tỷ đồng.\r\n\r\nCầu đi bộ có vị trí khá “đẹp” khi nằm giữa ngã ba sông Hậu, đứng từ trên cầu có thể nhìn khá rõ cầu Cần Thơ, cồn Ấu và gần như toàn cảnh bến Ninh Kiều. Không những thế, vào buổi chiều, cầu đi bộ là nơi đi dạo của những du khách đến du lịch Cần Thơ và người dân trên địa bàn thành phố.', 'Sông Rạch Khai Luông, Cái Khế, Ninh Kiều, Cần Thơ, Việt Nam', 'Đang cập nhật', '105.7913446\r\n', '10.0372003', 1, NULL, NULL),
(3, 'Bãi cát', 'Đang cập nhật', 'Cồn Cái Khế, Ninh Kiều, Cần Thơ', 'Đang cập nhật', '105.7915484\r\n', '10.0415424', 1, NULL, NULL),
(4, 'Công viên Sông Hậu', 'Đang cập nhật', '\r\nCái Khế, Ninh Kiều, Cần Thơ, Việt Nam', '090 845 80 52', '105.7909905\r\n', '10.0493811\r\n', 1, NULL, NULL),
(5, 'Chợ Đêm Trần Phú', 'Đang cập nhật', 'Cái Khế, Ninh Kiều, Cần Thơ, Việt Nam', 'Đang cập nhật', '105.7891345', '10.0508073', 1, NULL, NULL),
(6, 'Trung tâm Hội chợ Triển lãm Quốc tế Cần Thơ (EFC)', 'Trung tâm Hội chợ Triển lãm Quốc tế TP Cần Thơ (viết tắt EFC) là đơn vị sự nghiệp có thu trực thuộc Uỷ ban nhân dân thành phố Cần Thơ, được tiếp nối từ Công ty Hội chợ triển lãm quốc tế Cần Thơ (thành lập ngày 30 tháng 9 năm 1986), là thành viên chính thức của Hội đồng Hội nghị Triển lãm Châu Á – Thái Bình Dương (APECC), thành viên Hiệp hội triển lãm và Hội nghị Việt Nam.\r\n\r\nQua 25 năm hoạt động, EFC đã thiết lập mối quan hệ rộng rãi với các tổ chức kinh tế trong và ngoài nước, khẳng định được chỗ đứng vững chắc và uy tín của một đơn vị chuyên nghiệp tổ chức hội chợ triển lãm, quảng cáo thương mại và tham gia các hoạt động dịch vụ trên phạm vi của vùng và cả nước.\r\n\r\nTừ ngày 16 tháng 9 năm 2011, Trung tâm chính thức với tên gọi: Trung tâm Hội chợ Triển lãm Quốc tế TP Cần Thơ (EFC). Đây được xem là cơ hội để EFC nâng cấp, phát triển cơ sở vật chất khang trang, hiện đại, phát huy sáng tạo, năng động trong hoạt động kinh doanh theo chủ trương chung của Chính phủ…xứng tầm Trung tâm Hội chợ triển lãm quốc tế của khu vực và cả nước.', '108 Lê Lợi, Cái Khế, Ninh Kiều, Cần Thơ, Việt Nam', '0292 3764 646', '105.7886570', '10.0458104', 1, NULL, NULL),
(7, 'Sense City Cần Thơ', 'Đang cập nhaajt', '\r\nĐại Lộ Hòa Bình Tân An Cần Thơ Tân An Ninh Kiều, Tân An, Can Tho, Cần Thơ, Việt Nam', '+84 292 3688 988', '105.7857173', '10.0344588', 1, NULL, NULL),
(10, 'Bảo Tàng Quân Khu 9', 'Đang cập nhật', 'Đại lộ Hoà Bình, Tân An, Ninh Kiều, Cần Thơ, Việt Nam', '+84 292 3822 173', '105.7853204', '10.0359801', 1, NULL, NULL),
(11, 'Công viên Lưu Hữu Phước', 'Đang cập nhật', 'Hòa Bình, An Lạc, Ninh Kiều, Cần Thơ, Việt Nam', '+84 292 3838 128', '105.7818603', '10.0318704', 1, NULL, NULL),
(12, 'Chùa Phật Học', 'Đang cập nhật', '\r\n11 Đại Lộ, Hòa Bình, Tân An, Ninh Kiều, Cần Thơ, Việt Nam', '+84 292 3827 685', '105.7841670', '10.0330590', 1, NULL, NULL),
(13, 'Chợ Cái Khế', 'Đang cập nhật', 'phố B1, An Hội, Ninh Kiều, Cần Thơ, Việt Nam', '+84 292 3761 748', '105.7844460', '10.0438560', 1, NULL, NULL),
(14, 'LOTTE Mart Cần Thơ', 'Siêu thị LOTTE Mart Cần Thơ', ' 84 Mậu Thân, Phường An Hòa, Quận Ninh Kiều, Tp. Cần Thơ.', '(0292) 3696 888', '10.0468232', '105.7766386', 1, NULL, NULL),
(15, 'A Chay Restaurant', 'Hôm trước tối học ra mình và bạn đói bụng nên có ghé đây ăn tối. Quán này bán cũng khá lâu năm rồi, mình ăn từ lúc học cấp 3 đến giờ. Thường khách đông lắm. Quán bán giá khá phải chăng, tô sủi cảo 15k nhưng được tầm 5-6 viên sủi cảo to, nước dùng ngon, có cải xanh nữa. Bạn mình ăn miến sủi tô 22k, miến cũng nhiều, nói chung nhìn hấp dẫn lắm. Không gian phía ngoài của quán khá rộng, thoáng mát. Bên trong thì hơi ngộp chút nhưng bàn cao, dễ ngồi hơn, có tầm 3-4 bàn thôi. Đồ ăn làm ra nhanh lắm.', '28/1, Nam Ky Khoi Nghia Street, Tan An Ward, Ninh Kieu District, Can Tho City, Tân An, Ninh Kiều, Cần Thơ, Việt Nam', '+84 292 3814 259', '10.031999', '105.7839053', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_dichvu`
--

CREATE TABLE `dlct_dichvu` (
  `id` int(10) UNSIGNED NOT NULL,
  `dv_gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `dv_giomocua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dv_giodongcua` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `dv_giacaonhat` int(11) NOT NULL,
  `dv_giathapnhat` int(11) NOT NULL,
  `dv_loaihinh` int(11) NOT NULL,
  `dd_iddiadiem` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_dichvu`
--

INSERT INTO `dlct_dichvu` (`id`, `dv_gioithieu`, `dv_giomocua`, `dv_giodongcua`, `dv_giacaonhat`, `dv_giathapnhat`, `dv_loaihinh`, `dd_iddiadiem`, `created_at`, `updated_at`) VALUES
(1, 'Đêm ở Bến Ninh Kiều, công viên, phố thị rực rỡ đèn màu, nhà hàng đầy ắp người vào ra, du thuyền trên sông chật kín chỗ… Đối diện bên kia sông, Xóm chài buồn yên vắng. Ánh sáng của những tấm bảng quảng cáo càng làm cho Xóm Chài lọt thỏm trong bóng đêm. \r\n\r\nMuốn qua Xóm Chài phải đi đò hoặc phà, nếu không thì chạy vòng lên cầu Quang Trung quay ngược xuống. Xóm Chài nghèo, đường sá nhỏ hẹp, đi lại khó khăn. Nhà cửa chen chúc nhiều tầng nhiều lớp, phần lớn là nhà ổ chuột. Cụ bà Trương Thị Liễu (75 tuổi) chua chát: “Hồi mới lập ra Xóm Chài đã nghèo. Bây giờ tuy đỡ hơn một chút nhưng vẫn khó khăn. Cậu em thấy đó, phía bên kia sông nhà cao cửa rộng, giàu sang bao nhiêu thì bên này ngược lại, nghèo bấy nhiêu', '6:00 AM', '11:00 PM', 0, 0, 4, 1, '2017-12-26 17:00:00', '2017-12-26 17:00:00'),
(2, 'Chợ Cần Thơ còn gọi là chợ Hàng Dương hay \\\" chợ lục tỉnh\\\", nằm trên đường Hai Bà Trưng. Chợ có từ hơn một trăm năm được xây dựng cùng thời với hai ngôi chợ lớn ở Sài Gòn là chợ Bến Thành và chợ Bình Tây theo kiến trúc truyền thống rất đẹp và độc đáo, đặc biệt là vào ban đêm. Đây là nơi mua sắm sầm uất nằm ngay trung tâm thành phố, tập trung nhiều du khách...', '6:00 AM', '11:00 PM', 0, 0, 4, 1, NULL, NULL),
(3, 'Công viên Ninh Kiều là một bến nước và là địa danh du lịch, văn hóa của thành phố Cần Thơ hình thành từ thế kỷ 19. Bến Ninh Kiều tọa lạc ở bờ phải sông Hậu, nằm giữa ngã ba sông Hậu và sông Cần Thơ tiếp giáp với đường Hai Bà Trưng, phường Tân An, quận Ninh Kiều thuộc thành phố Cần Thơ.\r\n\r\nBến Ninh Kiều là một địa danh du lịch có từ lâu và hấp dẫn du khách bởi phong cảnh sông nước hữu tình và vị trí thuận lợi nhìn ra dòng sông Hậu.[1][2] Từ lâu bến Ninh Kiều đã trở thành biểu tượng về nét đẹp thơ mộng bên bờ sông Hậu của cả Thành phố Cần Thơ, thu hút nhiều du khách đến tham quan [3] và đi vào thơ ca.', '0:00 AM', '0:00 AM', 0, 0, 5, 1, NULL, NULL),
(4, 'imsum chỗ này theo mình là ngon nhất trong mấy chỗ mình ăn ở Cần Thơ rồi, mặc dù khá đắt vì một phần hơi ít. Món bánh bao xá xíu với chả giò cực ngon, mùi vị không lẫn với chỗ nào hết. Bánh bao kim sa ăn cũng được nhưng không có gì đặc biệt. Há cảo tôm cũng ngon. Không gian rộng rãi, thoáng mát. Có cái thấy phục vụ không được như lúc đầu, khá thờ ơ. Có bình nước trà để đó ai uống cũng được nhưng không thấy để ly, mình xin ly thì lần nào cũng đưa mấy cái ly cũ mèm, đen đúa.', '8:30 AM', '22:30 PM', 15000, 50000, 1, 14, NULL, NULL),
(5, 'Hôm trước tối học ra mình và bạn đói bụng nên có ghé đây ăn tối. Quán này bán cũng khá lâu năm rồi, mình ăn từ lúc học cấp 3 đến giờ. Thường khách đông lắm. Quán bán giá khá phải chăng, tô sủi cảo 15k nhưng được tầm 5-6 viên sủi cảo to, nước dùng ngon, có cải xanh nữa. Bạn mình ăn miến sủi tô 22k, miến cũng nhiều, nói chung nhìn hấp dẫn lắm. Không gian phía ngoài của quán khá rộng, thoáng mát. Bên trong thì hơi ngộp chút nhưng bàn cao, dễ ngồi hơn, có tầm 3-4 bàn thôi. Đồ ăn làm ra nhanh lắm.', '8:00', '22:00', 13, 50, 1, 15, NULL, NULL);

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
(1, 'banner__2017_12_23_12_14_42.jpg', 'chitiet1__2017_12_23_12_14_42.jpg', 'chitiet2__2017_12_23_12_14_42.jpg', 2, '2017-12-21 20:14:43', '2017-12-21 20:14:43'),
(23, 'banner__2017_12_23_12_25_39.jpg', 'chitiet1__2017_12_23_12_25_39.jpg', 'chitiet2__2017_12_23_12_25_39.jpg', 1, '2017-12-21 20:25:40', '2017-12-21 20:25:40'),
(28, 'banner__2017_12_23_12_49_54.jpg', 'chitiet1__2017_12_23_12_49_54.jpg', 'chitiet2__2017_12_23_12_49_54.jpg', 3, '2017-12-21 20:49:55', '2017-12-21 20:49:55');

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_nguoidung`
--

CREATE TABLE `dlct_nguoidung` (
  `id` int(10) UNSIGNED NOT NULL,
  `nd_tendangnhap` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_facebook_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_email_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_quocgia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nd_ngonngu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_nguoidung`
--

INSERT INTO `dlct_nguoidung` (`id`, `nd_tendangnhap`, `password`, `nd_facebook_id`, `nd_email_id`, `nd_avatar`, `nd_quocgia`, `nd_ngonngu`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'phanvantinh', 'phanvantinh', '2003006393316200', 'phanvantinh1303@gmail.com', 'https://scontent.fsgn5-2.fna.fbcdn.net/v/t1.0-9/21617833_2003006393316200_2773611479451376251_n.jpg?oh=ccf21f2e1964444bcbf1fdd109eda710&oe=5ACDE5F0', 'vietnamese', 'vietnamse', NULL, NULL, NULL),
(2, 'nguyendongtuong', 'nguyendongtuong', '937845406352461', 'zzacnguyen@gmail.com', 'https://scontent.fsgn5-2.fna.fbcdn.net/v/t1.0-9/15873315_937845406352461_6526995619077913865_n.jpg?oh=d6f58a0f65b47af56dcb28b5b47801e9&oe=5ABA296E', 'vietnamese', 'vietnamse', NULL, NULL, NULL),
(3, 'vophantrongnghia', 'vophantrongnghia', 'nghia.vophantrong', 'nghia.vophantrong@gmail.com', 'https://scontent.fsgn5-2.fna.fbcdn.net/v/t1.0-9/21151724_688700711339420_8615175024259709099_n.jpg?oh=3e8187b21617f7be2aa8c14341534606&oe=5AC190AB', 'vietnamese', 'vietnamese', NULL, NULL, NULL),
(4, 'tranduclam', 'tranduclam', 'lam.themen', 'lam.themen', 'https://scontent.fsgn5-2.fna.fbcdn.net/v/t1.0-9/20799314_799891783504249_8125381775365042959_n.jpg?oh=2b6e577a8e1c9b1f40c7cfa0942e7152&oe=5AC427B2', 'VietNamese', 'VietNamese', NULL, NULL, NULL),
(5, 'thaingochuy', 'thaingochuy', '100007852937581', '100007852937581', 'https://scontent.fsgn5-2.fna.fbcdn.net/v/t1.0-9/12019775_1671251109813304_7459011053426605892_n.jpg?oh=0f7d06aad35e3cebf783a5583301e72c&oe=5ABED879', 'VietNamese', 'VietNamese', NULL, NULL, NULL);

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
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `lhsk_idloaihinhsukien` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_thamquan`
--

CREATE TABLE `dlct_thamquan` (
  `id` int(10) UNSIGNED NOT NULL,
  `tq_tendiemthamquan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_vuichoi`
--

INSERT INTO `dlct_vuichoi` (`id`, `vc_tendiemvuichoi`, `dv_iddichvu`, `created_at`, `updated_at`) VALUES
(1, 'Bến phà xóm chài', 2, '2017-12-26 17:00:00', '2017-12-26 17:00:00'),
(2, 'Chợ Cần Thơ', 2, NULL, NULL),
(3, 'Công viên Ninh Kiều', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dlct_yeuthich`
--

CREATE TABLE `dlct_yeuthich` (
  `id` int(10) UNSIGNED NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
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
(229, '2014_10_12_100000_create_password_resets_table', 1),
(230, '2017_11_02_142109_create_nguoidung_table', 1),
(231, '2017_11_02_143248_create_diadiem_table', 1),
(232, '2017_11_02_143901_create_lichtrinh_table', 1),
(233, '2017_11_02_144022_create_chitietlichtrinh_table', 1),
(234, '2017_11_02_144140_create_dichvu_table', 2),
(235, '2017_11_02_144243_create_loaihinhsukien_table', 2),
(236, '2017_11_02_144358_create_sukien_table', 2),
(237, '2017_11_02_144540_create_binhluan_table', 2),
(238, '2017_11_02_151955_create_danhgia_table', 2),
(239, '2017_11_02_152627_create_thamquan_table', 2),
(240, '2017_11_02_152802_create_phuongtien_table', 2),
(241, '2017_11_02_152910_create_anuong_table', 2),
(242, '2017_11_02_152958_create_khachsan_table', 2),
(243, '2017_11_02_153038_create_vuichoi_table', 2),
(244, '2017_11_09_123423_create_yeuthich_table', 2),
(245, '2017_11_13_141540_create_tukhoa_table', 2),
(246, '2017_11_13_144257_create_tukhoa_dichvu_table', 2),
(247, '2017_12_13_233705_create_nguoidungcanhan_table', 2),
(248, '2017_12_13_235129_create_nguoidungdoanhnghiep_table', 2),
(249, '2017_12_18_141111_create_hinhanh_table', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  ADD KEY `dlct_sukien_dv_iddichvu_foreign` (`dv_iddichvu`),
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
  ADD UNIQUE KEY `nd_idnguoidung` (`dv_iddichvu`),
  ADD KEY `dlct_yeuthich_nd_idnguoidung_foreign` (`nd_idnguoidung`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dlct_anuong`
--
ALTER TABLE `dlct_anuong`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `dlct_binhluan`
--
ALTER TABLE `dlct_binhluan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_chitietlichtrinh`
--
ALTER TABLE `dlct_chitietlichtrinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_danhgia`
--
ALTER TABLE `dlct_danhgia`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_diadiem`
--
ALTER TABLE `dlct_diadiem`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `dlct_dichvu`
--
ALTER TABLE `dlct_dichvu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `dlct_hinhanh`
--
ALTER TABLE `dlct_hinhanh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `dlct_khachsan`
--
ALTER TABLE `dlct_khachsan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_lichtrinh`
--
ALTER TABLE `dlct_lichtrinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_loaihinhsukien`
--
ALTER TABLE `dlct_loaihinhsukien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_nguoidung`
--
ALTER TABLE `dlct_nguoidung`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `dlct_yeuthich`
--
ALTER TABLE `dlct_yeuthich`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

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
  ADD CONSTRAINT `dlct_sukien_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE,
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
  ADD CONSTRAINT `dlct_yeuthich_dv_iddichvu_foreign` FOREIGN KEY (`dv_iddichvu`) REFERENCES `dlct_dichvu` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dlct_yeuthich_nd_idnguoidung_foreign` FOREIGN KEY (`nd_idnguoidung`) REFERENCES `dlct_nguoidung` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
