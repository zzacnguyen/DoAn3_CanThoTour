-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 22, 2017 lúc 07:32 PM
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
  `au_gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `dv_iddichvu` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_anuong`
--

INSERT INTO `dlct_anuong` (`id`, `au_ten`, `au_gioithieu`, `dv_iddichvu`, `created_at`, `updated_at`) VALUES
(1, 'Senior Coffee', 'Không gian đẹp thoáng mát nằm gần trung tâm, nhân viên chu đáo phong cách phục vụ chuyên nghiệp, thức ăn và đồ uống ở mức khá, chỉ một điểm trừ là mức giá hơi cao so với những nơi khác.\r\n', 8, NULL, NULL),
(2, 'Cafe English', 'Địa chỉ: 11 Trần Quốc Toản, phường Tân An, quận Ninh Kiều, Tp. Cần Thơ, Việt Nam.\r\n\r\nĐiện thoại: 07103 79 777.\r\n\r\nMở cửa: từ 7h00 đến 23h00.\r\n\r\nFacebook: https://www.facebook.com/Cafe-English-and-4Friends-473553099507164/\r\nCafe English với không gian thư giãn, thân thiện là điểm đến lý tưởng cho tất cả mọi người đến để vừa thưởng thức những thức uống ngon vừa có dịp thực hành tiếng Anh với người bản xứ (là giáo viên tiếng Anh) hoặc với bạn bè. Cafe English cũng là điểm để các bạn làm quen với bạn mới những người có cùng chung niềm yêu thích học tiếng Anh.\r\n', 9, NULL, NULL),
(3, 'Nhà hàng Phương Nam', 'Số 1 trong số 107 Nhà hàng tại Cần Thơ}$Kiểu Á, Kiểu Việt, Phù hợp với người ăn chay\r\n48 Hai Bà Trưng - khu vực 1, Q. Ninh Kiều, Cần Thơ, Việt Nam\r\n+84 710 3812 077\r\nTrang web: http://www.phuongnamcantho.com/', 10, NULL, NULL),
(4, 'DU THUYỀN NINH KIỀU', 'Du Thuyền Ninh Kiều nằm ngay Bến Ninh Kiều trên dòng Sông Hậu. Du Thuyền Ninh Kiều được thiết kế hiện đại sang trọng, trang thiết bị nội thất cao cấp, sức chứa 500 khách. Tầng trệt được thiết kế chuyên để phục vụ tiệc cưới, sinh nhật, liên hoan..., tầng 1 thiết kế các phòng ăn VIP có máy lạnh, rất thích hợp cho các buổi tiệc chiêu đãi sang trọng. Sân thượng tầng 2 không gian thoáng mát khí hậu sông nước rất trong lành sẽ mang đến cho quý khách không gian thưởng thức ẩm thực hoàn hảo. ', 15, NULL, NULL);

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
(13, 'Chợ Cái Khế', 'Đang cập nhật', 'phố B1, An Hội, Ninh Kiều, Cần Thơ, Việt Nam', '+84 292 3761 748', '105.7844460', '10.0438560', 1, NULL, NULL);

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
  `dv_trangthai` tinyint(1) NOT NULL,
  `dd_iddiadiem` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_dichvu`
--

INSERT INTO `dlct_dichvu` (`id`, `dv_gioithieu`, `dv_giomocua`, `dv_giodongcua`, `dv_giacaonhat`, `dv_giathapnhat`, `dv_trangthai`, `dd_iddiadiem`, `created_at`, `updated_at`) VALUES
(5, 'Chợ Cần Thơ còn gọi là chợ Hàng Dương hay \" chợ lục tỉnh\", nằm trên đường Hai Bà Trưng. Chợ có từ hơn một trăm năm được xây dựng cùng thời với hai ngôi chợ lớn ở Sài Gòn là chợ Bến Thành và chợ Bình Tây theo kiến trúc truyền thống rất đẹp và độc đáo, đặc biệt là vào ban đêm. Đây là nơi mua sắm sầm uất nằm ngay trung tâm thành phố, tập trung nhiều du khách...', '6:00 AM', 'Closed', 0, 0, 1, 1, '2017-12-22 17:00:00', '2017-12-22 17:00:00'),
(6, 'Bến phà Xóm Chài nằm trong Thành phố Cần Thơ. Bến phà Xóm Chài', '6:00 AM', 'Closed', 0, 0, 1, 1, NULL, NULL),
(7, 'Chùa Ông (Cần Thơ), tên gốc là Quảng Triệu Hội Quán (chữ Hán: 廣肇會館；广肇会馆） )[1]; tọa lạc tại số 32 đường Hai Bà Trưng, thuộc phường Tân An, quận Ninh Kiều, thành phố Cần Thơ, Việt Nam. Đây là một ngôi chùa của người Hoa gốc Quảng Đông tại Cần Thơ, và là một di tích lịch sử cấp quốc gia kể từ năm 1993[2].', '6:00 AM', 'Closed', 0, 0, 1, 1, NULL, NULL),
(8, 'Quán này nằm ngay đường Ngô gia tự luôn, sát bên khám lớn, và kế bên Hợp phố. quán có không gian hơi bị được, nhưng giá hơi bị cao. điều đặc biệt khiến mình lại đây là ở đây có pokeshop, nên thích ở đây lì lợm bắt pokemon. nước uống không ngon gì hết. nhà vệ sinh sạch sẽ. phục vụ cũng lịch sự. mà quán mới 9h30 gì là nhân viên lại xin tính tiền, tự hiểu phải đi về. ở đây buổi sáng có bán điểm tâm, nên buổi sáng gia đình có thể lại đây thưởng thức.', '6:00 AM', '22:00 PM', 15000, 35000, 1, 1, NULL, NULL),
(9, 'Lựa chọn ăn uống: Đêm muộn, Bữa trưa, Bữa tối, Bữa nửa buổi, Bữa sáng, Đồ uống, Giao hàng, Wifi miễn phí, Quầy bar đầy đủ, Ngồi ngoài trời, Có bãi đỗ xe, Đặt chỗ, Chỗ ngồi, Phục vụ đồ uống có cồn, Bãi đỗ xe đường phố, Cửa hàng bán thức ăn mang về, Nhân viên phục vụ, Lối vào ra cho xe lăn', '7:00', '23:00', 0, 0, 1, 1, NULL, NULL),
(10, 'Quán nằm ngay trung tâm quận ninh kiều, công tác vài lần ở Cần Thơ nhưng đây là lần đầu tiên ghé quán này, không gian quám không rộng nhưng ấm cúng, nhân viên phục vụ nhiệt tình mà nhanh nữa, gọi 3 món : canh chua tôm, heo kho tiêu, rau muống xào, phải nói là món ăn rất ngon, nước chấm vừa miệng, cơm trắng dẻo mà lại thơm ngon lạ lùng, phục vụ tốt mà đồ ăn lại rẻ nữa, chắc chắn sẽ ghé nữa', '11:00 AM', '11:00 PM', 0, 0, 1, 1, NULL, NULL),
(11, 'Công viên bến ninh kiều ến Ninh Kiều ngày nay trở thành công viên Ninh Kiều, nằm bên bờ sông Hậu hiền hòa, ngay trung tâm thành phố Cần Thơ. Nơi đây vốn là niềm tự hào đối với người dân địa phương qua đôi câu ví - Cần Thơ có bến Ninh Kiều, có dòng sông đẹp với nhiều giai nhân.\r\n\r\nCông viên Ninh Kiều rộng lớn và khang trang, có bờ kè tản bộ dọc sông, cùng những chiếc ghế đá kê dưới hàng dừa lao xao theo gió. Bên trong công viên được trồng nhiều cây kiểng, hoa kiểng đẹp mắt, điểm tô những thảm cỏ xanh mọc len lỏi giữa những tấm xi măng trắng, và có tượng Bác Hồ bằng đồng cao 7.2m, bố trí tôn nghiêm trên bệ cao 3.6m. Xung quanh công viên là các nhà hàng thủy tạ, phục vụ nhiều món ăn đặc sản địa phương.', 'Open', 'Closed', 0, 0, 1, 1, NULL, NULL),
(12, 'Cathedral Diocese of Can Tho - 14 Nguyễn Thị Minh Khai, Tân An, Ninh Kiều, Cần Thơ, Vietnam\r\n', 'Open', 'Closed', 0, 0, 1, 1, NULL, NULL),
(13, 'Chợ Cần Thơ còn gọi là chợ Hàng Dương hay \" chợ lục tỉnh\", nằm trên đường Hai Bà Trưng. Chợ có từ hơn một trăm năm được xây dựng cùng thời với hai ngôi chợ lớn ở Sài Gòn là chợ Bến Thành và chợ Bình Tây theo kiến trúc truyền thống rất đẹp và độc đáo, đặc biệt là vào ban đêm. Đây là nơi mua sắm sầm uất nằm ngay trung tâm thành phố, tập trung nhiều du khách...', '6:00 AM', 'Closed', 0, 0, 1, 1, NULL, NULL),
(14, 'Chiều cuối tuần xuống “du thuyền” ngắm cảnh trên sông Hậu', '6:00 PM', '0:00 AM', 0, 0, 1, 1, NULL, NULL),
(15, 'Du Thuyền Ninh Kiều nằm ngay Bến Ninh Kiều trên dòng Sông Hậu. Du Thuyền Ninh Kiều được thiết kế hiện đại sang trọng, trang thiết bị nội thất cao cấp, sức chứa 500 khách. Tầng trệt được thiết kế chuyên để phục vụ tiệc cưới, sinh nhật, liên hoan..., tầng 1 thiết kế các phòng ăn VIP có máy lạnh, rất thích hợp cho các buổi tiệc chiêu đãi sang trọng. Sân thượng tầng 2 không gian thoáng mát khí hậu sông nước rất trong lành sẽ mang đến cho quý khách không gian thưởng thức ẩm thực hoàn hảo. Với đội ngũ nhân viên chuyên nghiệp được đào tạo từ các trường du lịch, có nhiều năm kinh nghiệm phục tận tình chu đáo chắc chắn sẽ làm hài lòng quý khách.', '6:00 PM', '0:00 AM', 0, 0, 1, 1, NULL, NULL),
(16, 'Cầu đi bộ bến Ninh Kiều – điểm dừng chân mới cho du khách đến Cần Thơ', 'Open', 'Closed', 0, 0, 1, 2, NULL, NULL),
(17, 'Khách sạn Ninh Kiều 1 tọa lạc ngay trung tâm của Thành phố Cần Thơ, vị trí nằm ngay trên Bến Ninh kiều\r\n+ Cách TPHCM khoảng 168km.\r\n+ Sân bay Quốc tế Cần Thơ khoảng 10.8km, cách bến xe khách Cần Thơ khoảng 4.7km.\r\n+ Cách Chợ nổi Cái Răng khoảng 7.0km, cách Nhà Cổ Bình Thủy khoảng 6.7km, cách Làng du lịch Mỹ Khánh khoảng 12.2km, cách Vườn Cò Bằng Lăng khoảng 48.7km.', 'Open', 'Closed', 500000, 3000000, 1, 1, NULL, NULL),
(18, '  HỆ THỐNG TTC HOTEL', 'Open', 'Closed', 0, 0, 1, 1, NULL, NULL),
(19, 'Du khách có thể tìm thấy các suite và phòng nghỉ hiện đại với Wi-Fi miễn phí cùng máy lạnh tại Hau Giang Hotel. Nằm ở thành phố Cần Thơ, khách sạn có nhà hàng riêng và cung cấp chỗ đỗ xe miễn phí.', 'Open', 'Closed', 0, 0, 1, 1, NULL, NULL);

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
(22, 'banner__2017_12_23_12_14_42.jpg', 'chitiet1__2017_12_23_12_14_42.jpg', 'chitiet2__2017_12_23_12_14_42.jpg', 5, '2017-12-22 17:14:43', '2017-12-22 17:14:43'),
(23, 'banner__2017_12_23_12_25_39.jpg', 'chitiet1__2017_12_23_12_25_39.jpg', 'chitiet2__2017_12_23_12_25_39.jpg', 6, '2017-12-22 17:25:40', '2017-12-22 17:25:40'),
(24, 'banner__2017_12_23_12_32_21.jpg', 'chitiet1__2017_12_23_12_32_21.jpg', 'chitiet2__2017_12_23_12_32_21.jpg', 7, '2017-12-22 17:32:22', '2017-12-22 17:32:22'),
(25, 'banner__2017_12_23_12_38_51.jpg', 'chitiet1__2017_12_23_12_38_51.jpg', 'chitiet2__2017_12_23_12_38_51.jpg', 8, '2017-12-22 17:38:52', '2017-12-22 17:38:52'),
(26, 'banner__2017_12_23_12_42_25.jpg', 'chitiet1__2017_12_23_12_42_25.jpg', 'chitiet2__2017_12_23_12_42_25.jpg', 9, '2017-12-22 17:42:26', '2017-12-22 17:42:26'),
(27, 'banner__2017_12_23_12_47_23.jpg', 'chitiet1__2017_12_23_12_47_23.jpg', 'chitiet2__2017_12_23_12_47_23.jpg', 10, '2017-12-22 17:47:24', '2017-12-22 17:47:24'),
(28, 'banner__2017_12_23_12_49_54.jpg', 'chitiet1__2017_12_23_12_49_54.jpg', 'chitiet2__2017_12_23_12_49_54.jpg', 11, '2017-12-22 17:49:55', '2017-12-22 17:49:55'),
(29, 'banner__2017_12_23_12_55_09.jpg', 'chitiet1__2017_12_23_12_55_09.jpg', 'chitiet2__2017_12_23_12_55_09.jpg', 12, '2017-12-22 17:55:12', '2017-12-22 17:55:12'),
(30, 'banner__2017_12_23_12_57_29.jpg', 'chitiet1__2017_12_23_12_57_29.jpg', 'chitiet2__2017_12_23_12_57_29.jpg', 13, '2017-12-22 17:57:31', '2017-12-22 17:57:31'),
(31, 'banner__2017_12_23_01_01_07.jpg', 'chitiet1__2017_12_23_01_01_07.jpg', 'chitiet2__2017_12_23_01_01_07.jpg', 14, '2017-12-22 18:01:08', '2017-12-22 18:01:08'),
(33, 'banner__2017_12_23_01_03_38.jpg', 'chitiet1__2017_12_23_01_03_38.jpg', 'chitiet2__2017_12_23_01_03_38.jpg', 15, '2017-12-22 18:03:40', '2017-12-22 18:03:40'),
(34, 'banner__2017_12_23_01_23_09.jpg', 'chitiet1__2017_12_23_01_23_09.jpg', 'chitiet2__2017_12_23_01_23_09.jpg', 17, '2017-12-22 18:23:10', '2017-12-22 18:23:10'),
(35, 'banner__2017_12_23_01_26_30.jpg', 'chitiet1__2017_12_23_01_26_30.jpg', 'chitiet2__2017_12_23_01_26_30.jpg', 18, '2017-12-22 18:26:32', '2017-12-22 18:26:32'),
(36, 'banner__2017_12_23_01_32_01.jpg', 'chitiet1__2017_12_23_01_32_01.jpg', 'chitiet2__2017_12_23_01_32_01.jpg', 19, '2017-12-22 18:32:02', '2017-12-22 18:32:02');

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
(1, 'TTC HOTEL', 'http://cantho.ttchotels.com/vi', 'Hệ Thống Phòng Nghỉ\r\nĐược thiết kế với 107 phòng rộng rãi, thoải mái và hiện đại nhất để đáp ứng sự hài lòng của du khách. Khách sạn TTC Hotel Premium - Cần Thơ có 5 loại phòng khác nhau từ: Deluxe City View, Deluxe River View, Premium Suite, TTC Suite và loại phòng cao cấp nhất President Suite - nơi du khách có thể ngắm nhìn cảnh bình minh và hoàng hôn từ phía ban công; đồng thời tận hưởng toàn bộ phong cảnh thành phố và sông Hậu, hứa hẹn sẽ mang đến cho du khách những giây phút thư giãn tuyệt vời cùng các dịch vụ hoàn hảo nhất.', 18, NULL, NULL),
(2, 'Ninh Kieu', 'http://ninhkieuhotel.vn/', 'Located in the center of Ninh Kieu quay, Can Tho city, the 4 star Ninh Kieu Riverside Hotel, with the unique and impressive architecture in Can Tho city, has created its brand and prestige from the opening.\r\n\r\nWith the best location in Can Tho city, fully modern facilities equipped, professional & enthusiastic staff, and experienced management team as well. We believe that you will be satisfied when enjoying our services.', 17, NULL, NULL),
(3, 'Hau Giang Hotel ', 'Đang cập nhật', 'Du khách có thể tìm thấy các suite và phòng nghỉ hiện đại với Wi-Fi miễn phí cùng máy lạnh tại Hau Giang Hotel. Nằm ở thành phố Cần Thơ, khách sạn có nhà hàng riêng và cung cấp chỗ đỗ xe miễn phí.\r\n\r\nHau Giang Hotel nằm trong bán kính chỉ 300 m từ Chợ Cần Thơ cổ và 400 m từ Bến Ninh Kiều cũng như Bảo tàng Cần Thơ. Bến Tàu Cần Thơ cách đó 500 m. Cách khách sạn 5,8 km là Chợ Nổi Cái Răng.\r\n\r\nTất cả các phòng đều được trang bị truyền hình cáp màn hình phẳng, khu vực tiếp khách, bàn làm việc và minibar. Phòng tắm riêng đi kèm với bồn tắm hoặc vòi sen cùng đồ vệ sinh cá nhân miễn phí.\r\n\r\nHau Giang Hotel có lễ tân 24 giờ và sân hiên. Dịch vụ đặt vé và bàn đặt tour cũng nằm trong số các tiện nghi tại đây.\r\n\r\nNhà hàng của khách sạn phục vụ tuyển chọn các món Việt Nam và phương Tây. \r\n\r\nChỗ nghỉ này là một trong những vị trí được đánh giá tốt nhất ở Cần Thơ! Khách thích nơi đây hơn so với những chỗ nghỉ khác trong khu vực.\r\n\r\nCác cặp đôi đặc biệt thích địa điểm này — họ cho điểm 9,2 cho kỳ nghỉ dành cho 2 người.\r\n\r\nChỗ nghỉ này cũng được đánh giá là đáng giá tiền nhất ở Cần Thơ! Khách sẽ tiết kiệm được nhiều hơn so với nghỉ tại những chỗ nghỉ khác ở thành phố này.\r\n\r\nChúng tôi sử dụng ngôn ngữ của bạn!', 19, NULL, NULL);

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

--
-- Đang đổ dữ liệu cho bảng `dlct_loaihinhsukien`
--

INSERT INTO `dlct_loaihinhsukien` (`id`, `lhsk_ten`, `created_at`, `updated_at`) VALUES
(2, 'Giới thiệu sản phẩm', NULL, NULL),
(3, 'Lễ khai trương', NULL, NULL),
(4, 'Lễ kỷ niệm', NULL, NULL),
(5, 'Triển lãm', NULL, NULL),
(6, 'Lễ hội', NULL, NULL),
(7, 'Hội nghị ', NULL, NULL),
(8, 'Hội nghị chuyên đề', NULL, NULL);

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

--
-- Đang đổ dữ liệu cho bảng `dlct_phuongtien`
--

INSERT INTO `dlct_phuongtien` (`id`, `pt_tenphuongtien`, `pt_loaihinh`, `dv_iddichvu`, `created_at`, `updated_at`) VALUES
(1, 'Du thuyền Cần Thơ', 'Thuyền', 14, NULL, NULL);

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
(2, 'Cần Thơ lần đầu tiên tổ chức Đêm hoa đăng Ninh Kiều', '2017-12-23', '2017-12-30', 1, 6, NULL, NULL),
(3, 'Đêm hoa đăng Ninh Kiều 2017', '2017-12-29', '2017-12-31', 1, 6, NULL, NULL),
(4, ' Lễ Khánh Thành Cầu Đi Bộ Ninh Kiều - Cần Thơ', '2017-12-23', '2017-12-30', 2, 3, NULL, NULL),
(5, 'Chiếu sáng nghệ thuật', '2017-12-29', '2017-12-30', 1, 4, NULL, NULL);

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

--
-- Đang đổ dữ liệu cho bảng `dlct_thamquan`
--

INSERT INTO `dlct_thamquan` (`id`, `tq_tendiemthamquan`, `tq_gioithieu`, `dv_iddichvu`, `created_at`, `updated_at`) VALUES
(4, 'Chợ Cần Thơ', 'Chợ Cần Thơ còn gọi là chợ Hàng Dương hay \" chợ lục tỉnh\", nằm trên đường Hai Bà Trưng. Chợ có từ hơn một trăm năm được xây dựng cùng thời với hai ngôi chợ lớn ở Sài Gòn là chợ Bến Thành và chợ Bình Tây theo kiến trúc truyền thống rất đẹp và độc đáo, đặc biệt là vào ban đêm. Đây là nơi mua sắm sầm uất nằm ngay trung tâm thành phố, tập trung nhiều du khách...\r\n\r\nChợ Cần Thơ nằm trên đường Hai Bà Trưng, gần công viên Ninh Kiều, thuộc địa bàn phường Tân An, quận Ninh Kiều, thành phố Cần Thơ. Chợ xưa có tên là Lục Tỉnh, sau đổi thành chợ Hàng Dương, nay quen gọi là chợ cổ Cần Thơ.\r\nChợ Cần Thơ được xây dựng cùng thời với các ngôi chợ lớn ở Sài Gòn như chợ Bến Thành, chợ Bình Tây, đến nay, đã trải qua hàng trăm năm tuổi. Đây được xem là ngôi chợ có kiến trúc đẹp nhất vùng Đồng bằng Sông Cửu Long, là nơi tập kết, buôn bán hàng hoá của khu vực Nam Kỳ lục tỉnh, gắn liền với nếp sinh hoạt xưa của người dân nơi đây. Chợ mở cửa hằng ngày từ 7h - 20h.\r\nTheo tài liệu ghi chép, chợ Cần Thơ được xây dựng vào khoảng năm 1915 nhưng nhiều năm trước đây đã xuống cấp. Thời gian qua, Công ty Thương nghiệp Tổng hợp thành phố Cần Thơ (CTC) đầu tư gần 3,5 tỷ đồng để trùng tu tôn tạo theo hướng giữ nguyên hiện trạng mô hình kiến trúc cổ dưới thời Pháp. Công trình được khánh thành trong dịp kỷ niệm 30-04-2005.\r\n', 5, NULL, NULL),
(5, 'Bến phà xóm chài', 'Bến phà Xóm Chài nằm trong Thành phố Cần Thơ. Bến phà Xóm Chài - Thành phố Cần Thơ trên bản đồ.', 6, NULL, NULL),
(6, 'Chùa Ông', 'Tên gọi, nguồn gốc[sửa | sửa mã nguồn]\r\nSở dĩ có tên Quảng Triệu Hội Quán（廣肇會館；广肇会馆） là vì chùa vốn là hội quán của một nhóm người Hoa Quảng Đông thuộc hai phủ Quảng Châu 廣州 và Triệu Khánh 肇慶 (đều thuộc tỉnh Quảng Đông 廣東, Trung Quốc) theo dòng di dân sang lưu trú ở đất Trấn Giang (tức Cần Thơ xưa) vào thế kỷ 17-18. Tuy nhiên, người dân vẫn quen gọi là Chùa Ông, vì ở chính điện thờ Quan Thánh Đế quân (tức Quan Công)[3].\r\n\r\nChùa được khởi công xây dựng trên phần đất 532m2 vào năm 1894 (năm Quang Tự thứ 20, và là năm Thành Thái thứ 6), đến năm 1896 thì hoàn thành. Và cũng như một số ngôi chùa của người Hoa khác, Chùa Ông không nằm biệt lập mà nằm trong một khu dân cư đông đúc, ngay giữa trung tâm thành phố Cần Thơ, cạnh bến Ninh Kiều.', 7, NULL, NULL),
(7, 'Cầu Đi Bộ Ninh Kiều', 'Cầu đi bộ bến Ninh Kiều – điểm dừng chân mới cho du khách đến Cần Thơ\r\nNhìn từ trên cao, hình dạng của cầu khá giống hình chữ S – bản đồ Việt Nam, và hai bông sen lớn ở giữa cầu là nơi được trang trí các cụm đèn led nghệ thuật mang nét hiện đại và sống động cho cây cầu vào ban đêm. Hai bên lan can bên ngoài thành cầu, các chậu hoa rực rỡ được đặt để trang trí mang điểm nhấn cho cầu vào ban ngày và có hệ thống tưới nước đảm bảo hoa luôn tươi tốt. Đặc biệt, chính giữa cầu đi bộ được xây dựng mái che nghiêng dành cho du khách ngồi nghỉ mát. Ngoài ra, cầu có độ dốc thấp, người lớn tuổi và người ngồi xe lăn có thể dễ dàng di chuyển trên cầu cũng được lòng người dân.\r\n\r\nSau khi khánh thành cầu đi bộ bến Ninh Kiều, đây cũng là nơi được nhiều bạn trẻ check-in mới thay cho các địa điểm vui chơi quen thuộc khác trong địa bàn thành phố. Tuy nhiên, hiện nay đang xảy ra tình trạng nhiều bạn trẻ gắn các “ổ khóa tình yêu” với dây xích lòng thòng trên lan can cầu khiến cây cầu phần nào mất đi vẻ đẹp và gây khó chịu cho khách đến tham quan trên cầu.', 16, NULL, NULL);

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
(1, 'Công viên bến ninh kiều', 'Bến Ninh Kiều - Cần Thơ\r\nBến Ninh Kiều\r\n\r\nBến Ninh Kiều ngày nay trở thành công viên Ninh Kiều, nằm bên bờ sông Hậu hiền hòa, ngay trung tâm thành phố Cần Thơ. Nơi đây vốn là niềm tự hào đối với người dân địa phương qua đôi câu ví - Cần Thơ có bến Ninh Kiều, có dòng sông đẹp với nhiều giai nhân.\r\n\r\nCông viên Ninh Kiều rộng lớn và khang trang, có bờ kè tản bộ dọc sông, cùng những chiếc ghế đá kê dưới hàng dừa lao xao theo gió. Bên trong công viên được trồng nhiều cây kiểng, hoa kiểng đẹp mắt, điểm tô những thảm cỏ xanh mọc len lỏi giữa những tấm xi măng trắng, và có tượng Bác Hồ bằng đồng cao 7.2m, bố trí tôn nghiêm trên bệ cao 3.6m. Xung quanh công viên là các nhà hàng thủy tạ, phục vụ nhiều món ăn đặc sản địa phương.\r\n\r\n- Ngoài ra, từ công viên bến Ninh Kiều có thể nhìn thấy cầu Cần Thơ bề thế, nhìn sang là Xóm Chài mộc mạc và một dải cù lao xanh mướt. Nằm cạnh công viên là khu Chợ Nhà Lồng cổ Cần Thơ; và cảng Cần Thơ hiện đại, có khả năng tiếp nhận tàu trọng tải đến 5.000 tấn.\r\n\r\nDưới bến Ninh Kiều là tấp nập tàu thuyền xuôi ngược, chở đầy những sản vật vùng đồng bằng sông nước Cửu Long. Nơi đây còn có một số tàu thuyền phục vụ khách du lịch, cùng du thuyền Ninh Kiều vốn là một nhà hàng nổi, thường đưa khách thưởng ngoạn trên sông vào buổi tối, và trình diễn những tiết mục văn nghệ, đờn ca tài tử đặc sắc. Giữa sông nước mênh mang, dưới ánh trăng dìu dịu, nghe điệu vọng cổ mượt mà, sẽ là một trải nghiệm thi vị .\r\n\r\nQuanh bến Ninh Kiều cũng đã hình thành các tuyến phố đi bộ, ẩm thực và chợ đêm Ninh Kiều, hoạt động từ 4 giờ chiều đến tầm 12 giờ đêm. Cứ cách một đoạn lại có dãy phố chạy dài, bán nhiều loại mặt hàng khác nhau, đông vui, tấp nập người qua lại ăn uống, mua sắm.\r\n\r\n- Tiểu thương ở chợ đêm bến Ninh Kiều vẫn giữ được bản tính nồng hậu, khoáng đạt của người miền Tây trong buôn bán với thái độ phục vụ dễ chịu, và hầu như không nói “thách” người mua, dần chiếm được cảm tình của người dân địa phương cũng như du khách.\r\n\r\nBến Ninh Kiều về đêm lung linh giăng mắc ánh đèn rực rỡ, soi bóng xuống mặt nước phù sa lấp loáng, trở thành nơi hẹn hò, dạo chơi lý tưởng của người dân Cần Thơ và du khách gần xa. \r\n\r\n\r\n* Địa chỉ Bến Ninh Kiều ở đâu : dọc đường Hai Bà Trưng, ngay dưới chân cầu Ninh Kiều.\r\n', 11, NULL, NULL),
(2, 'Giáo phận cần thơ', 'Họ đạo Chánh Tòa bao trọn phường An Lạc và mở rộng thêm những phường lân cận như Tân An, Xuân Khánh, Hưng Lợi. Giáp ranh với các Họ đạo lân cận:\r\n-         Tòa Giám Mục: Đường Ngô Gia Tự, đại lộ Hòa Bình, Đề Thám\r\n-         Thới Thạnh: Đề Thám, Hẻm 1 đường Lý Tự Trọng\r\n-         Tham Tướng: Nguyễn Việt Hồng, rạch Tham Tướng\r\nVà giáp các Họ đạo: Cái Răng, Cái Chanh, Rạch Vọp, An Thạnh.', 12, NULL, NULL),
(3, 'Chợ Cần Thơ', 'Chợ Cần Thơ còn gọi là chợ Hàng Dương hay \" chợ lục tỉnh\", nằm trên đường Hai Bà Trưng. Chợ có từ hơn một trăm năm được xây dựng cùng thời với hai ngôi chợ lớn ở Sài Gòn là chợ Bến Thành và chợ Bình Tây theo kiến trúc truyền thống rất đẹp và độc đáo, đặc biệt là vào ban đêm. Đây là nơi mua sắm sầm uất nằm ngay trung tâm thành phố, tập trung nhiều du khách...', 13, NULL, NULL);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `dlct_dichvu`
--
ALTER TABLE `dlct_dichvu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `dlct_hinhanh`
--
ALTER TABLE `dlct_hinhanh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT cho bảng `dlct_khachsan`
--
ALTER TABLE `dlct_khachsan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `dlct_lichtrinh`
--
ALTER TABLE `dlct_lichtrinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dlct_loaihinhsukien`
--
ALTER TABLE `dlct_loaihinhsukien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `dlct_sukien`
--
ALTER TABLE `dlct_sukien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `dlct_thamquan`
--
ALTER TABLE `dlct_thamquan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
