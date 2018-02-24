-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 05, 2018 lúc 03:58 AM
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
-- Cơ sở dữ liệu: `db_dulichcantho10`
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
(1, 'Nhà Hàng Du Thuyền Ninh Kiều', 1, NULL, NULL),
(2, 'Pizzahut Cần Thơ', 2, NULL, NULL),
(3, 'Ốc mẹt cần thơ', 3, NULL, NULL),
(4, 'Kichi Kichi Vincom', 4, NULL, NULL),
(5, 'Bamboo Dimsum', 5, NULL, NULL),
(6, 'Daruma vincom', 6, NULL, NULL),
(7, 'Cà phê mèo', 7, NULL, NULL),
(8, 'Coffee Bar Mường Thanh ', 8, NULL, NULL),
(9, 'Rễ tranh mậu thân', 9, NULL, NULL),
(10, 'Mỹ Phụng - Gỏi Cuốn Cần Thơ', 10, NULL, NULL);

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
  `dg_tieude` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `dg_noidung` text COLLATE utf8_unicode_ci NOT NULL,
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
(1, 'Nhà hàng du thuyền ninh kiều', '', 'Bến Ninh Kiều, P. Tân An,  Quận Ninh Kiều, Cần Thơ', '', '105.788074', '10.032165', 1, NULL, NULL),
(2, 'pizza hut ', '', 'Lô 1 KDC Hưng Phú 1, P. Hưng Phú,  Quận Cái Răng, Cần Thơ', '', '105.784712', '10.014363', 1, NULL, NULL),
(3, 'Ốc mẹt ', '', '206/92 Lê Lợi, P. Cái Khế,  Quận Ninh Kiều, Cần Thơ', '', '105.789451', '10.044601', 1, NULL, NULL),
(4, 'Kichi kichi vincom', '', 'Vincom Cần Thơ, 2 Hùng Vương,  Quận Ninh Kiều, Cần Thơ', '', '105.779695', '10.045209', 1, NULL, NULL),
(5, 'bamboo disum', '', 'Tầng 1, Lotte Mart Cần Thơ, 84 Mậu Thân, P. An Hòa,  Quận Ninh Kiều, Cần Thơ', '', '105.766648', '10.042589', 1, NULL, NULL),
(6, 'daruma vincom', '', 'Lầu 4 Vincom Cần Thơ, 2 Hùng Vương,  Quận Ninh Kiều, Cần Thơ', '', '105.779695', '10.045209', 1, NULL, NULL),
(7, 'Ca phe meo', '', '72 Nguyễn Cư Trinh, P. An Nghiệp,  Quận Ninh Kiều, Cần Thơ', '', '105.772886', '10.037299', 1, NULL, NULL),
(8, 'cà phê bar Mường Thanh', 'không xác định', 'Lê Lợi,  Quận Ninh Kiều, Cần Thơ', '', '105.790601', '10.042169', 1, NULL, NULL),
(9, 'Rễ tranh mậu thân', 'không xác định', '11C Mậu Thân,  Quận Ninh Kiều, Cần Thơ', '', '105.772505', '10.035333', 1, NULL, NULL),
(10, 'gỏi cuốn mỹ phụng', 'không xác định', '164 Nguyễn Việt Hồng, P. An Phú,  Quận Ninh Kiều, Cần Thơ', '', '105.776318', '10.030385', 1, NULL, NULL),
(21, 'không xác định', 'không xác định', '1/2A Đường 30 Tháng 4, P. Xuân Khánh,  Quận Ninh Kiều, Cần Thơ', '', '105.775116', '10.025405', 1, NULL, NULL),
(22, 'không xác định', 'không xác định', '59-61-63-65 Phạm Ngọc Thạch, Phường Cái Khế, Quận Ninh Kiều, 900000, Cần Thơ, Việt Nam', '', '105.786160', '10.043751', 1, NULL, NULL),
(23, 'không xác định', 'không xác định', '2, Hai Bà Trưng, Tân An , 900000, Cần Thơ, Việt Nam', '', '105.789856', '10.036186', 1, NULL, NULL),
(24, 'không xác định', 'không xác định', 'Số 3 Hòa Bình, Tân An , 901803, Cần Thơ, Việt Nam', '', '105.785999', '10.034956', 1, NULL, NULL),
(25, 'không xác định', 'không xác định', '199 Nguyễn Trãi, Ninh Kiều, 270000, Cần Thơ, Việt Nam', '', '105.781759', '10.043694', 1, NULL, NULL),
(26, 'không xác định', 'không xác định', 'Khu E1 Cồn Cái Khế, Phường Cái Khế, Ninh Kiều, Cần Thơ', '', '105.790753', '10.042154', 1, NULL, NULL),
(27, 'không xác định', 'không xác định', 'số 2 Nguyên Văn Cừ, Khu vực 3, Cồn Khương, Phường Cái Khế, Ninh Kiều, Cần Thơ', '', '105.783306', '10.060977', 1, NULL, NULL),
(28, 'không xác định', 'không xác định', '141 Tran Van Kheo Street, Cai Khe Ward, Ninh Kieu, Cái Khế, Cần Thơ, Việt Nam ', '', '105.786659', '10.046392', 1, NULL, NULL),
(29, 'không xác định', 'không xác định', 'Số 209, Đường 30/4, Ninh Kiều, Cần Thơ, Việt Nam, Trung tâm thành phố Cần Thơ, Cần Thơ, Việt Nam', '', '105.774412', '10.024793', 1, NULL, NULL),
(30, 'không xác định', 'không xác định', '52 Quang Trung, An Lạc, Ninh Kiều, Cần Thơ', '', '105.780422', '10.027171', 1, NULL, NULL),
(31, 'không xác định', 'không xác định', '79B Phạm Ngọc Thạch,Cai Khe, Ninh Kieu, Cái Khế, Cần Thơ, Việt Nam ', '', '105.786665', '10.043091', 1, NULL, NULL),
(32, 'không xác định', 'không xác định', 'Hem 142, duong Mau Than, Quan Ninh Kieu., Trung tâm thành phố Cần Thơ, Cần Thơ, Việt Nam ', '', '105.775264', '10.031290', 1, NULL, NULL),
(33, 'không xác định', 'không xác định', 'Lô 91B, Nguyễn Văn Linh, P. Hưng Lợi, Q.Ninh Kiều, Tp. Cần Thơ.', '', '105.759213', '10.025229\r\n', 1, NULL, NULL),
(34, 'không xác định', 'không xác định', 'Hưng Thanh, Cái Răng, Cần Thơ', '', '105.772505', '10.005464', 1, NULL, NULL),
(35, 'taxi Mai linh', 'không xác định', 'Cần thơ', '02923828282', '105.772505', '10.005464', 1, NULL, NULL),
(36, 'Taxi Green', 'không xác định', 'Cằn thơ', '02923739739', '', '', 1, NULL, NULL),
(37, 'Taxi Happy', 'không xác định', 'Cần Thơ', '02923777777', '', '', 1, NULL, NULL),
(38, 'Taxi hoàng anh', 'không xác định', 'Cần Thơ', '02923797979', '', '', 1, NULL, NULL),
(39, 'Ben ninh kieu', 'không xác định', 'Hai Bà Trưng, Tân An, Ninh Kiều, Cần Thơ', '', '105,788479', '10,033687', 1, NULL, NULL),
(40, 'Cầu đi bộ Cần Thơ', 'không xác định', 'Hai Bà Trưng, Tân An, Ninh Kiều, Cần Thơ', '', '105,790143', '10,036534', 1, NULL, NULL),
(41, 'Den Binh Thuy', 'không xác định', '46/11A Lê Hồng Phong, Bình Thuỷ, Bình Thủy, Cần Thơ, Vietnam', '', '105,752500', '10,072172', 1, NULL, NULL),
(42, 'Bảo tàng Cần Thơ', 'không xác định', '1 Hòa Bình, Tân An, Ninh Kiều, Cần Thơ, Vietnam', '', '105,786534', '10,035388', 1, NULL, NULL),
(43, 'Cong vien luu huu phuoc', 'không xác định', 'Hòa Bình, An Lạc, Ninh Kiều, Cần Thơ, Vietnam', '', '105,782071', '10,031656', 1, NULL, NULL),
(44, 'bai bien nhan tao', 'không xác định', 'Sông Hậu, Cái Khế, Ninh Kiều, Cần Thơ, Vietnam', '', '105,795501', '10,043000', 1, NULL, NULL),
(45, 'thien vien truc lam', 'không xác định', 'ĐT923, Mỹ Khánh, Phong Điền, Cần Thơ, Vietnam', '', '105,703743', '9,990274', 1, NULL, NULL),
(46, 'lang my khanh', 'không xác định', '335 Lộ Vòng Cung, Xã Mỹ Khánh,  Phong Điền, Cần Thơ', '', '105,706555', '9,988018', 1, NULL, NULL),
(47, 'cong vien mien tay\r\n', 'không xác định', '57B Cách Mạng Tháng 8, P. An Thới,  Quận Ninh Kiều, Cần Thơ', '', '105,770874', '10,054605', 1, NULL, NULL),
(48, 'cong vien nuoc can tho', 'không xác định', 'Lô D1, KV1, Phường Cái Khế, Quận Ninh Kiều, Cái Khế, Ninh Kiều, Cần Thơ, Vietnam', '', '105,786082', '10,049863', 1, NULL, NULL);

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
  `dv_sodienthoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `dd_iddiadiem` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_dichvu`
--

INSERT INTO `dlct_dichvu` (`id`, `dv_gioithieu`, `dv_giomocua`, `dv_giodongcua`, `dv_giacaonhat`, `dv_giathapnhat`, `dv_loaihinh`, `dv_sodienthoai`, `dd_iddiadiem`, `created_at`, `updated_at`) VALUES
(1, 'Du Thuyền Ninh Kiều nằm ngay Bến Ninh Kiều trên dòng Sông Hậu. Du Thuyền Ninh Kiều được thiết kế hiện đại sang trọng, trang thiết bị nội thất cao cấp, sức chứa 500 khách. Tầng trệt được thiết kế chuyên để phục vụ tiệc cưới, sinh nhật, liên hoan..., tầng 1 thiết kế các phòng ăn VIP có máy lạnh, rất thích hợp cho các buổi tiệc chiêu đãi sang trọng. Sân thượng tầng 2 không gian thoáng mát khí hậu sông nước rất trong lành sẽ mang đến cho quý khách không gian thưởng thức ẩm thực hoàn hảo. Với đội ngũ nhân viên chuyên nghiệp được đào tạo từ các trường du lịch, có nhiều năm kinh nghiệm phục tận tình chu đáo chắc chắn sẽ làm hài lòng quý khách', '7:30', '9:00', 250000, 50000, 1, '', 1, NULL, NULL),
(2, 'Không gian: ahihi không nhớ nữa, không biết có thay đổi gì không vì mình order giao tận nơi để được khuyến mãi nên không ghé nhà hàng Thức ăn: ngon, mà mình order bò nướng phô mai, với thịt xông khói dạng giá sốc nên chịu, không có hải sản để ăn Menu: menu khuyến mãi chỉ có 5 vị nên không có nhiều lựa chọn Nhân viên: nhanh nhẹn, và giao rất nhanh Giá tiền: rẻ, vì giá khuyến mãi. Nhà vệ sinh: mình nhớ là đi nhà vệ sinh của siêu thị bigc nên không thể đánh gi', '7:00', '22:00', 250000, 40000, 1, '', 2, NULL, NULL),
(3, 'Mình là mình cuồng ăn ốc lắm , nghe nói có quán ốc Mẹt nhiều loại ốc mà còn ngon nữa thế là rủ nhau đi ăn. Một mẹt ốc có 9 loại: ốc tỏi, càng ghẹ, ốc móng tay, ốc hương, hàu, ốc len, nghêu... Giá 350k/một mẹt. Trong lúc chờ thì tụi mình gọi 2 thố ốc hấp tiêu như hình. Cũng có thể gọi thêm bánh mì để ăn kèm với nước sốt. Quán ở 206/92 Lê Lợi, phường Cái Khế, quận Ninh Kiều. Không gian quán thoáng mát, sạch sẽ, chỗ để xe rộng rãi. Giá thì không phải là rẻ :v', '15:00', '22:00', 350000, 50000, 1, '', 3, NULL, NULL),
(4, 'Đồ ăn của quán này phải nói rằng ngon đúng chuẩn khỏi bàn cải rồi, tùy vào mỗi người mà nên gọi phần nước lẩu khác nhau cho phù hợp khẩu vị vì nước lẩu có mấy mùi vị lận nên làm cho ta cảm nhận cũng sẽ khác theo, đồ ăn thì mình thấy nhiều món và đa dạng lắm luôn nhe, cái nào cái nấy nhìn cũng hấy dẫn hết nên nào cũng phải ăn thử 1 tý cho biết với người ta mới đã cái miệng ấy chứ, ăn mà ta nói dĩa chồng 1 chồng cao nhân viên tới dọn liên tục luôn mới ghê chứ', '9:00', '21:00', 250000, 150000, 1, '', 4, NULL, NULL),
(5, 'Dimsum chỗ này theo mình là ngon nhất trong mấy chỗ mình ăn ở Cần Thơ rồi, mặc dù khá đắt vì một phần hơi ít. Món bánh bao xá xíu với chả giò cực ngon, mùi vị không lẫn với chỗ nào hết. Bánh bao kim sa ăn cũng được nhưng không có gì đặc biệt. Há cảo tôm cũng ngon. Không gian rộng rãi, thoáng mát. Có cái thấy phục vụ không được như lúc đầu, khá thờ ơ. Có bình nước trà để đó ai uống cũng được nhưng không thấy để ly, mình xin ly thì lần nào cũng đưa mấy cái ly cũ mèm, đen đúa', '8:00', '21:00', 50000, 15000, 1, '', 5, NULL, NULL),
(6, 'Ăn được nhiêu đây cũng bộn tiền còn hình con cá nữa nhưng nhỏ quá nên đã xóa rồi . Thấy quán sang trọng giá cả thì tất nhiên phải cao rồi phục vụ chu đáo , đồ ăn thì chắc không hợp khẩu vị của mình nên mình thấy cũng bình thường không đặc biệt gì mỗi phần thì được vài miếng như vậy ăn không đủ no gì hết ... Chắc lần sau sẽ ghé lại để thử những món khác coi như thế nào', '8:00', '22:00', 249000, 19000, 1, '', 6, NULL, NULL),
(7, 'Ai yêu mèo thì đây là địa chỉ quen thuộc rồi. Bên ngoài để bảng là cafe 72. Đến trước cửa là sẽ có chị chủ mở cửa. Lần đầu đi cứ sợ quán đóng cửa vì quán lúc nào cũng có cái hàng rào sợ mèo nó chạy ra. Không gian quán chỉ có gian trước, thường có 7 8 chú mèo ở gian trước chơi nhưng theo mình biết thì chị chủ nuôi trong nhà còn nhiều hơn nữa. Mèo thì đa số là giống mèo Anh nên con nào con nấy mập ú dễ cưng vô cùng nhưng rất chảnh. Nước uống quán pha khá ngon, hợp khẩu vị.', '8:00', '22:00', 25000, 15000, 1, '', 7, NULL, NULL),
(8, 'Có điều kiện buổi tối lên đây làm vài lon bia, nhìn xuống thành phố về đêm nhỏ xíu nhưng lộng lẫy với nhiều ánh đèn màu. Cảm giác đó thật là bình yên, gió thổi mát rượi làm như cũng thổi hết những muộn phiền. Giá nước ở đây tuy không rẻ nhưng đổi lại được tận hưởng không gian xinh đẹp thế này. Nhân viên phục vụ cũng có thái độ tốt, phong cách chuyên nghiệp. Thật ra lâu lâu cũng nên đổi gió vào khách sạn Mường Thanh sang trọng cho biết cảm giác nó như thế nào', '7:00', '22:00', 100000, 35000, 1, '', 8, NULL, NULL),
(9, 'Rễ tranh thì khá nổi tiếng với các bạn trẻ ở Cần Thơ rồi. Tuy bây giờ đi đâu cũng thấy quán trà sữa nhưng uống nhiều cũng ngán, nên lại quay lại đây mua rễ tranh uống cho mát. Bên chỗ đường Mậu Thân này còn có để mấy bàn bên ngoài, có thể ngồi uống tại chỗ. Kế bên còn có xe hủ tiếu gõ, có thể vừa ăn vừa uống, rất tiện lợi. Giá 1 ly rễ tranh như hình là 7k, rất hợp túi tiền sinh viên, cũng rất phù hợp chất lượng. Sẽ còn mua uống hoài ^^', '8:00', '21:00', 22000, 8000, 1, '', 9, NULL, NULL),
(10, 'Cô bán hàng vui vẻ mà gỏi cuốn hay gỏi đu đủ gì cũng ngon lắm, mà giá cả phải chẳng nữa. Hè hè, đang giờ chiều mà được thưởng thức giống như buồn ngủ mà gặp chiếu manh vậy á  ', '11:00', '18:00', 20000, 4000, 1, '', 10, NULL, NULL),
(11, '', '9:00', '23:00', 55000, 3000, 1, '', 21, NULL, NULL),
(12, '', '9:00', '23:00', 55000, 3000, 1, '', 21, NULL, NULL),
(13, ' Khách sạn Holiday One tọa lạc ngay trung tâm thành phố Cần Thơ, rất thuận tiện cho hành trình khám phá các điểm du lịch nổi tiếng nơi đây, đặc biệt chỉ mất 15 phút đến sân bay Quốc tế Cần Thơ  và vài phút đi bộ đến Trung tâm Hội chợ Triển lãm Quốc tế.            Khách sạn cao 16 tầng với hơn 80 phòng được xây dựng theo tiêu chuẩn 4 sao, độc đáo với loại phòng Penthouse đẳng cấp duy nhất tại Cần Thơ. Holiday One nổi bật bởi sự mới lạ khi được kết hợp tinh tế giữa kiến trúc cổ điển đặc trưng với sự sang trọng và đặc sắc của những tiện nghi hiện đại bậc nhất. Quý khách cũng sẽ luôn hài lòng với dịch vụ massage chuyên nghiệp chăm sóc sức khỏe và sắc đẹp được đầu tư rất công phu từ tầng 10 đến tầng 11. Đặc biệt ấn tượng hơn bởi một Sky Bar độc đáo nằm dọc theo hồ bơi xanh mát ngay tầng thượng - nơi chắc chắn sẽ chạm đến từng xúc cảm của du khách khi lần đầu tiên được nhìn thấy.', '9:00', '23:00', 2500000, 791800, 2, '', 22, NULL, NULL),
(14, 'Khách sạn Ninh Kiều được thành lập từ năm 1994, là một trong những khách sạn tiện nghi và được yêu thích nhất tại thành phố Cần Thơ, tọa lạc tại vị trí đắc địa của trung tâm thành phố với hai mặt tiền tiếp giáp hai dòng sông Cần Thơ và sông Hậu hiền hòa, ngay cạnh khuôn viên Bến Ninh Kiều thơ mộng và cầu đi bộ lộng lẫy về đêm, gần các siêu thị, trung tâm mua sắm hiện đại, bảo tàng thành phố và khu công viên cây xanh chỉ với 15 phút đi bộ.  Cùng với sự thay đổi thăng trầm theo thời gian của thủ phủ miền sông nước Tây Đô, khách sạn Ninh Kiều với diện tích 17.000m2 nay được đầu tư thiết kế hiện đại mang hình dáng của một con tàu vững chãi, uy nghi trên miền sông nước. Lối kiến trúc độc đáo, không gian rộng và ấm áp cùng với các trang thiết bị hiện đại, nội thất cao cấp nhập khẩu tiêu chuẩn 4 sao với 162 phòng nghỉ được thiết kế hơn 70% có hướng nhìn về dòng sông Hậu, cầu Cần Thơ và Cồn Ấu bốn mùa trĩu quả, đảm bảo mang lại cho hành trình của Quý khách và Gia đình sự thoải mái và tiện nghi.', '9:00', '23:00', 2500000, 684900, 2, '', 23, NULL, NULL),
(15, '  Tọa lạc tại số 03 Đại Lộ Hòa Bình, Q. Ninh Kiều, TP. Cần Thơ. Khách Sạn Ninh Kiều 2 có vị trí thuận lợi cho việc đi lại của Quý Khách đến Trung Tâm Thương Mại, Bến Ninh Kiều và các điểm Du Lịch lân cận... Khách Sạn là nơi lý tưởng để tổ chức các sự kiện lớn, nghỉ dưỡng. Bao gồm 108 phòng, Nội Thất được trang bị hoàn toàn bằng Gỗ Cao Cấp, Khóa điện từ. Khách sạn được chia làm 04 loại phòng khác nhau được khách hàng ưa chuộng...', '9:00', '23:00', 1800000, 380000, 2, '', 24, NULL, NULL),
(16, 'TỔNG QUAN KHÁCH SẠN Cần Thơ là thành phố trung tâm của vùng đồng bằng sông Cửu Long. Cái tên Cần Thơ xuất phát từ tên cổ \"Cầm Thi Giang\", gợi vẻ đẹp nên thơ của \"đô thị miền sông nước\", với hệ thống sông ngòi dày đặc, vườn cây ăn trái bạt ngàn, đồng ruộng mênh mông, nổi tiếng với Bến Ninh Kiều, chợ nổi Cái Răng, nơi vẫn còn lưu giữ một nét sinh hoạt đặc trưng văn hoá Nam Bộ.   Được xây dựng vào năm 2015, Mường Thanh Luxury Cần Thơ là khách sạn đầu tiên của chuỗi khách sạn Mường Thanh ở Đồng bằng sông Cửu Long – đồng thời cũng là khách sạn sang trọng đầu tiên và duy nhất tại đây. Nằm tại vị trí đắc địa trước vòng xoay Cồn Cái Khế và là tòa nhà cao nhất thành phố Cần Thơ với 27 tầng, từ cửa sổ khách sạn, du khách có thể ngắm ánh nắng mặt trời trong buổi sớm mai trên sông Hậu hay phóng tầm mắt ngắm nhìn cây cầu Cần Thơ hùng vĩ.  Khách sạn tọa lạc tại vị trí cách Sân bay Quốc tế Cần Thơ 10km, cách TPHCM 169 km với giao thông thủy bộ thuận lợi đi đến các vùng Nam Bộ và nối liền với Campuchia', '9:00', '23:00', 2087000, 1218000, 2, '', 26, NULL, NULL),
(17, 'Van Phat Riverside Hotel nằm trên một hòn đảo thanh bình gần Sông Mekong, chỉ cách trung tâm thành phố 1 km. Khách sạn có các phòng nghỉ sang trọng, hồ bơi ngoài trời và trung tâm thể dục. Quý khách có thể truy cập Wi-Fi miễn phí tại trung tâm dịch vụ doanh nhân.  Van Phat 1 Hotel cách Công viên Giải trí Mỹ Khánh 30 phút lái xe và Sân bay Cần Thơ 10 km. Ga tàu Cần Thơ và ngôi nhà cổ Bình Thủy đều nằm cách khách sạn 4 km. Chợ nổi Cái Răng cách đó 20 phút đi thuyền.  Các phòng tại Van Phat Riverside Hotel được trang bị máy lạnh toàn bộ, TV truyền hình cáp màn hình phẳng, minibar và khu vực tiếp khách thoải mái. Phòng tắm riêng đi kèm bồn tắm và tiện nghi vòi sen. Đồ vệ sinh cá nhân được cung cấp miễn phí.  Các tiện nghi giải trí bao gồm nhiều phòng karaoke. Quý khách còn có thể thư giãn với liệu pháp mát-xa hoặc trong phòng xông hơi khô.  Nhà hàng Thuy Ta phục vụ đủ loại món ăn Âu và Á. Quán bar cung cấp đồ uống giải khát. Dịch vụ ăn uống tại phòng cũng được đáp ứng.   Chỗ nghỉ này cũng được đánh giá là đáng giá tiền nhất ở Cần Thơ! Khách sẽ tiết kiệm được nhiều hơn so với nghỉ tại những chỗ nghỉ khác ở thành phố này.  Chúng tôi sử dụng ngôn ngữ của bạn!', '9:00', '23:00', 1305000, 606000, 2, '', 27, NULL, NULL),
(18, 'Dong Ha Fortuneland Hotel có hồ bơi ngoài trời, bể sục, sân tennis, trung tâm thể dục, lễ tân 24 giờ, truy cập WiFi miễn phí trong tất cả các khu vực và chỗ đỗ xe miễn phí trong khuôn viên.  Tọa lạc tại trung tâm Thành phố Cần Thơ, khách sạn này cách Chùa Phật Học, Nhà cổ Bình Thủy và ga Cần Thơ 2 km, sân bay quốc tế Cần Thơ 4 km và Chợ nổi Cái Răng 30 phút đi thuyền.  Với tầm nhìn ra quang cảnh thành phố, phòng nghỉ gắn máy điều hòa tại đây được trang bị phòng tắm riêng đi kèm máy sấy tóc, vòi sen và đồ vệ sinh cá nhân miễn phí, TV truyền hình cáp màn hình phẳng, tủ quần áo, tủ lạnh mini và khu vực ghế ngồi.  Dong Ha Fortuneland Hotel cung cấp trung tâm dịch vụ doanh nhân cho khách sử dụng miễn phí, phòng giữ hành lý và báo. Du khách có thể đến bàn đặt tour để yêu cầu dịch vụ cho thuê xe hơi và thu xếp việc đi tham quan. Dịch vụ giặt là và các liệu pháp spa được cung cấp với một khoản phụ phí.  Nhà hàng Fortune của khách sạn phục vụ các món ăn Kiểu Âu và Á hảo hạng từ 06:30 - 22:00. Du khách có thể thưởng thức bữa sáng tự chọn hàng ngày và yêu cầu dịch vụ phòng.   Chỗ nghỉ này cũng được đánh giá là đáng giá tiền nhất ở Cần Thơ! Khách sẽ tiết kiệm được nhiều hơn so với nghỉ tại những chỗ nghỉ khác ở thành phố này.  Chúng tôi sử dụng ngôn ngữ của bạn!', '9:00', '23:00', 130000, 20000, 2, '', 28, NULL, NULL),
(19, 'Tự hào là thương hiệu dẫn đầu, đại diện cho ngành khách sạn nghỉ dưỡng tại Việt Nam, Vinpearl mang trong mình sứ mệnh nâng tầm trải nghiệm nghỉ dưỡng, mang đến những kỳ nghỉ 5* cho du khách Việt Nam và du khách quốc tế.  Vinpearl có 17 cơ sở khách sạn, biệt thự nghỉ dưỡng trải dài trên mảnh đất hơn 3000 km đường bờ biển. Mỗi lựa chọn điểm đến tại Vinpearl sẽ là một điểm dừng chân lý tưởng để trải nghiệm nghỉ dưỡng chuẩn quốc tế và cảm nhận trọn vẹn vẻ đẹp của từng thắng cảnh địa phương.  Bên cạnh cơ sở nghỉ dưỡng, Vinpearl còn sở hữu 3 sân Vinpearl Golf, khu vui chơi giải trí đẳng cấp thế giới Vinpearl Land, công viên động vật hoang dã Vinpearl Safari, các khu chăm sóc sức khỏe và sắc đẹp Vincharm Spa, hệ thống phòng họp sang trọng, cùng các nhà hàng ẩm thực chất lượng quốc tế, hứa hẹn mang đến cho du khách kỳ nghỉ ngập tràn cảm hứng, trọn vẹn niềm vui.', '9:00', '23:00', 1200000, 100000, 2, '', 29, NULL, NULL),
(20, 'Khách sạn Cửu Long là một trong các đơn vị kinh doanh chủ lực của Công ty CATACO trực thuộc Thành ủy Thành phố Cần Thơ, được xây dựng từ năm 1986, tiền thân là Nhà khách Tỉnh ủy Hậu Giang (cũ). Năm 1988 đưa vào hoạt động với tên là Khách sạn Cửu Long. Ngày 02/02/2000 được công nhận là khách sạn đạt tiêu chuẩn 2 sao do Tổng cục trưởng Tổng cục du lịch Việt Nam cấp. Ngày 01/07/2008 khách sạn tiếp tục được công nhận là Khách sạn 3 sao cho đến nay.   Tự hào là đơn vị kinh doanh hiệu quả, khách sạn Cửu Long Cần Thơ liên tiếp trong 8 năm liền từ 2008 đến 2015 đã được bình chọn và nhận cúp Top ten khách sạn 3 sao hàng đầu Việt Nam do Bộ Văn hóa Thể thao và Du lịch, Hiệp hội khách sạn Việt Nam trao tặng.    Ngoài hoạt động kinh doanh lưu trú, Khách sạn Cửu Long Cần Thơ còn là thương hiệu nổi tiếng với Hệ thống 07 nhà hàng tổ chức Hội nghị, Tiệc cưới chuyên nghiệp. Sự phong phú các món ăn Á - Âu, món ngon đặc sản vùng miền được bàn tay khéo léo của các đầu bếp nhiều năm kinh nghiệm luôn mê hoặc thực khách và để lại hương vị đậm đà khó quên đặc trưng trong từng món ăn. Năm 2009, Nhà hàng Cửu Long đã vinh dự đạt Huy chương vàng tại Liên hoan ẩm thực toàn quốc tại Hà Nội.', '9:00', '23:00', 130000, 30000, 2, '', 30, NULL, NULL),
(21, 'Nằm cách Bến Ninh Kiều chỉ 1,2 km. Aura Hotel cung cấp chỗ ở đầy đủ tiện nghi tại thành phố Cần Thơ. Các phòng nghỉ ở đây được làm mát bằng máy lạnh và khách có thể truy cập Wi-Fi miễn phí trong toàn bộ khách sạn.  Tất cả các phòng nghỉ đều có minibar, khu vực tiếp khách và truyền hình cáp. Ngoài ra còn đi kèm phòng tắm riêng với máy sấy tóc và đồ vệ sinh cá nhân miễn phí.  Lễ tân 24 giờ rất sẵn lòng hỗ trợ du khách với các dịch vụ giữ hành lý, cho thuê xe hơi và giặt là. Nhân viên tại đây cũng có thể thu xếp dịch vụ vận chuyển và đưa đón sân bay với một khoản phụ phí.  Aura Hotel tọa lạc tại một vị trí trung tâm nằm trong bán kính chỉ 900 m từ Bảo tàng Cần Thơ. Du khách đi 6,8 km là đến Chợ Nổi Cái Răng trong khi Sân bay Cần Thơ cách đó khoảng 15 phút lái xe. ', '9:00', '23:00', 786558, 373524, 2, '', 31, NULL, NULL),
(22, 'Khách sạn Phương Nga tọa lạc tại 199 Nguyễn Trãi, ngay trung tâm Thành phố Cần Thơ và được thiết kế theo tiêu chuẩn Quốc Tế 2 sao với kiến trúc hiện đại, sang trọng và không gian thoáng mát được quản lý bởi Công ty TNHH TM-DV Phương Nga. Khách sạn Phương Nga gồm 5 tầng với 52 phòng ấm cúng , đầy đủ tiện nghi và trang thiết bị hiện đại gồm: Standard, Superior, Deluxe, Family và V.I.P Hệ thống truyền hình cáp và Internet rộng khắp. Café Bar: nằm ở tầng 1 với không gian thoáng mát, tầm nhìn phù hợp để thư giãn', '9:00', '23:00', 1800000, 380000, 2, '', 25, NULL, NULL),
(23, '', '9:00', '23:00', 54000, 30000, 2, '', 32, NULL, NULL),
(24, 'Trụ sở: Lộ 91B, Nguyễn Văn Linh, Phường Hưng Lợi , Ninh Kiều, Thành phố Cần ThơTrước khi xây dựng bến xe mới, TP. Cần Thơ có 2 bến xe là bến xe khách Cần Thơ (91B) xây dựng vào năm 2003 và một bến xe đã có từ lâu đời là bến xe Hùng Vương (ở ngã tư vòng xoay đường Hùng Vương và đường Nguyễn Trãi). Sau đó, Bến xe Hùng Vương đã chính thức giải tỏa vào cuối tháng 2 năm 2015 (sau Tết nguyên đán Ất Mùi) để xây dựng công viên nên toàn bộ lượng xe ở đây đã điều chuyển về Bến xe 91B.   Ban đầu, diện tích xây dựng bến xe 91B khá rộng, lên tới hơn 30 ngàn m2 nhưng sau đó đã bị đơn vị quản lý cắt 20 ngàn m2 làm Trung tâm Đào tào và sát hạch lái xe cơ giới, vì vậy, sau khi dời toàn bộ lượng xe ở bến xe Hùng Vương về, bến xe 91B lại quá tải. Đây cũng là lý do chính thành phố đã xây dựng thêm Bến xe khách trung tâm thành phố Cần Thơ để giảm ùn tắc giao thông cục bộ cho đường Nguyễn Văn Linh và giao lộ giữa đường 3/2 và Nguyễn Văn Linh.', '9:00', '23:00', 54000, 30000, 3, '', 33, NULL, NULL),
(25, 'Được xây dựng và chính thức đi vào hoạt động đầu năm 2016, Bến xe khách trung tâm thành phố Cần Thơ nằm ở Khu đô thị Nam Cần Thơ (Quốc lộ 1, phường Hưng Thạnh, quận Cái Răng), có tổng diện tích 39.292m2 rất hiện đại, khang trang và đạt chuẩn bến xe khách loại 1. Trong đó, diện tích bãi đỗ xe ôtô chờ vào vị trí đón khách 6.000m2, bãi đỗ xe dành cho các phương tiện khác 3.400m2 và phòng chờ cho hành khách 1.000m2. Mỗi ngày, bến xe có thể đáp ứng cho khoảng gần 40.000 lượt hành khách, 1.000 lượt phương tiện các loại ra vào. Từ ngày 1/1/2016, bến xe này đã tiếp nhận 50% lưu lượng phương tiện (khoảng 200 đầu xe ôtô) của các doanh nghiệp từ bến xe khách Cần Thơ (đường Nguyễn văn Linh, quận Ninh Kiều) về hoạt động tại đây', '9:00', '23:00', 54000, 30000, 3, '', 34, NULL, NULL),
(26, '“Taxi Mai Linh” với màu xanh lá cây đặc trưng đại diện cho Màu xanh cuộc sống, Màu xanh môi trường và Màu xanh an toàn giao thông, nay đã là một thương hiệu quen thuộc, gần gũi với không chỉ người tiêu dùng trong nước mà cả du khách nước ngoài.  Với phương châm “Khách hàng là tất cả” và “An toàn, tiện lợi, mọi lúc, mọi nơi”, từ ngày đầu thành lập đến nay Mai Linh không ngừng mở rộng địa bàn, nâng cao chất lượng phương tiện, phát triển dịch vụ, huấn luyện đội ngũ lái xe, ứng dụng cập nhật công nghệ trong phục vụ khách hàng.  Với sự nỗ lực không ngừng, Tập đoàn Mai Linh đã khẳng định được vị trí thương hiệu hàng đầu trong ngành vận tải hành khách ở Việt Nam.  Là doanh nghiệp taxi đầu tiên của Việt Nam được Tuv Nord cấp Chứng nhận “Hệ thống quản lý An toàn giao thông đường bộ theo tiêu chuẩn Quốc tế ISO 39001:2012”', '9:00', '22:00', 0, 0, 3, '', 35, NULL, NULL),
(27, 'Địa chỉ: 60A, Đường 3/2, Phường Hưng Lợi, Quận Ninh Kiều, Cần Thơ Điện thoại: 7103739739', '9:00', '22:00', 0, 0, 3, '', 36, NULL, NULL),
(28, 'Sau khi hoạt động tại thành phố Hồ Chí Minh, Long An, Tiền Giang mang lại nhiều tiện ích cho hành khách, Happy Taxi tiếp tục mở chi nhánh tại Cần Thơ. Bước đầu chi nhánh đưa vào hoạt động 15 xe, gồm 10 xe loại 7 chỗ, 5 xe loại 4 chỗ. Văn phòng đơn vị đặt tại Cần Thơ. Khách hàng có nhu cầu, xin gọi: 36.77 77 77.', '9:00', '22:00', 0, 0, 3, '', 37, NULL, NULL),
(29, 'TAXI HOÀNG ANH GROUP  *Chất lượng tốt nhất. *Giá cả hợp lý nhất. *Thời gian phục vụ nhanh nhất. *Phong cách phục vụ chuyên nghiệp nhất. *An toàn , thoải mái, thuận tiện nhất.  \"SẮC HỒNG THÂN THIỆN\"  Thường xuyên nhận hồ sơ tuyển dụng lái xe', '9:00', '22:00', 0, 0, 3, '', 38, NULL, NULL),
(30, 'Bến Ninh Kiều nay được gọi là Công viên Ninh Kiều là một bến nước và là địa danh du lịch, văn hóa của thành phố Cần Thơ hình thành từ thế kỷ 19. Bến Ninh Kiều tọa lạc ở bờ phải sông Hậu, nằm giữa ngã ba sông Hậu và sông Cần Thơ tiếp giáp với đường Hai Bà Trưng, phường Tân An, quận Ninh Kiều thuộc thành phố Cần Thơ.  Bến Ninh Kiều là một địa danh du lịch có từ lâu và hấp dẫn du khách bởi phong cảnh sông nước hữu tình và vị trí thuận lợi nhìn ra dòng sông Hậu.[1][2] Từ lâu bến Ninh Kiều đã trở thành biểu tượng về nét đẹp thơ mộng bên bờ sông Hậu của cả Thành phố Cần Thơ, thu hút nhiều du khách đến tham quan [3] và đi vào thơ ca.', '9:00', '22:00', 0, 0, 4, '', 39, NULL, NULL),
(31, 'Mặc dù mới được khánh thành cách đây chưa lâu (từ ngày 6/2/2016), nhưng cầu đi bộ bến Ninh Kiều nối bến Ninh Kiều và Cồn Cái Khế thu hút nhiều khách đến chiêm ngưỡng và tham quan từ khắp mọi nơi.  Được xây dựng trong khoảng 12 tháng, cầu đi bộ có chiều dài 200m, rộng 7,2m do Ban quản lý dự án đầu tư xây dựng TP. Cần Thơ làm chủ đầu tư với kinh phí xây dựng hơn 49 tỷ đồng.  Cầu đi bộ có vị trí khá “đẹp” khi nằm giữa ngã ba sông Hậu, đứng từ trên cầu có thể nhìn khá rõ cầu Cần Thơ, cồn Ấu và gần như toàn cảnh bến Ninh Kiều. Không những thế, vào buổi chiều, cầu đi bộ là nơi đi dạo của những du khách đến du lịch Cần Thơ và người dân trên địa bàn thành phố.', '9:00', '22:00', 0, 0, 4, '', 40, NULL, NULL),
(32, 'Đình Bình Thủy nay nằm trên khoảnh đất rộng hơn 4000 m². Cách kiến trúc ngôi đình này khác rất nhiều so với kiến trúc ở miền Bắc. Đình được cất trên một nền cao ráo và có chiều sâu, nhà trước và nhà sau đều là hình vuông nên chiều nào cũng có 6 hàng cột, các chân cột to, tròn và đều hơi choãi ra làm cho đình càng thêm vững chắc.  Về trang trí ngoại thất, nhìn trên nóc đình, ta thấy nhà trước hai mái chồng lên nhau, nhà chánh điện sau 3 mái chồng lên nhau theo kiểu kiến trúc \"thượng lầu hạ hiên\". Trên nóc đình có gắn tượng hình người, hình kỳ lân, hình cá hóa rồng. Nhìn sang bên trái nóc đình có mảng trang trí bằng xi măng giữa là quyển thư (tựa như cuốn thư đình được bày trí ở các đình miền Bắc) bên cạnh đó là giỏ lam đào và bình hoa, ở bìa mái ngói dưới cùng có ốp lá xoài màu xanh đen và ống ngói cũng được bịt lại bằng sành tráng men xanh. Mặt trước nhà là các cột xi măng trang trí các hình hoa lá đắp nổi thật tinh tế.   Hình Hoa văn trang trí bên ngoài Trong đình, các bàn thờ được bố trí như sau: Tại tòa tiền đường có bàn thờ Nghi Hạ, Nghi Trung đặt ở gian giữa. Nơi nhà vuông nhỏ đặt bàn thờ Nghi Thượng dùng làm lễ chính của các ngày lễ hội.  Ở tòa chính điện: chính giữa nhà là bàn thờ chính, bên trái sát vách phía ngoài là bàn thờ Hương chức Tiên Giác, phía trong là bàn thờ Hậu tiền. Đối diện ở sát vách bên phải là bàn thờ chức sắc Tiên Giác và bàn thờ Tiền Hiền. Sát vách trong cùng ở gian giữa có bàn thờ Hậu thần, hai bên là hai bàn thờ Hữu Bang và Tả Bang. Bên ngoài đình có hai miếu lớn thờ thần Nông và thần Hổ, gần cổng có hai miếu thờ thần Rừng và thần Khai kênh dẫn nước.  Đình Bình thủy là một công trình có giá trị về kiến trúc nghệ thuật. Tuy được xây dựng vào đầu thế kỷ 20 nhưng kiến trúc của đình còn giữ được nhiều yếu tố kiến trúc truyền thống của dân tộc. Đình còn giữ được những mảng chạm, những họa tiết trang trí gần gũi với nghệ thuật dân tộc. Nghệ thuật chạm khắc gỗ ở nơi đây hết sức tinh tế và sinh động. Tiềm ẩn dưới mái đình này không chỉ là lịch sử truyền thống cội nguồn của một làng cổ Nam Bộ mà còn là nơi gìn giữ những giá trị tinh hoa của văn hóa, văn minh sông nước miệt vườn Cần Thơ nói riêng và Miền Tây Nam Bộ nói chung.  Cùng với những sinh hoạt văn hóa khác, đình Bình Thủy đã tạo nên một bản sắc riêng của ngôi đình làng ở một vùng đất mới khai phá năm xưa. Nay đình Bình Thủy vẫn được giữ gìn, trùng tu và bảo vệ tốt.', '9:00', '22:00', 0, 0, 4, '', 41, NULL, NULL),
(33, 'Bảo tàng Thành phố Cần Thơ gồm 2 tầng lầu. Ở tầng trệt được trưng bày khái quát về đặc điểm tự nhiên – xã hội Cần Thơ xưa và nay, giới thiệu vị trí địa lý, đất đai, khí hậu sông ngòi, động thực vật, cảnh quan, văn hóa óc eo, văn hóa 3 dân tộc Kinh – Khmer – Hoa, triển lảm ảnh chụp Cần Thơ xưa và nay.', '9:00', '22:00', 0, 0, 4, '', 42, NULL, NULL),
(34, 'Lưu Hữu Phước(1921-1989) là một nhạc sĩ đa tài, là Giáo sư, là Viện sĩ, Nhà lý luận âm nhạc; nguyên Bộ trưởng Bộ Thông tin Văn hóa của Chính phủ Cách mạng Lâm thời Cộng hòa miền Nam Việt Nam; nguyên Đại biểu Quốc hội, Chủ nhiệm Ủy ban Văn hóa và Giáo dục của Quốc hội nước Cộng hòa Xã hội Chủ nghĩa Việt Nam. Ông là tác giả của những bản hùng ca bi tráng. Tác phẩm của ông luôn gắn liền với những sự kiện lịch sử trọng đại của dân tộc.  Với những đóng góp to lớn của ông vào nền âm nhạc Việt Nam, ông đã được Nhà nước tặng thưởng nhiều huân chương, huy chương, trong đó có Huân chương Độc lập hạng nhất, giải thưởng Hồ Chí Minh về văn học nghệ thuật 1996 và được đặt tên cho một công viên lớn của thành phố Cần Thơ – công viên Lưu Hữu Phước.', '9:00', '22:00', 0, 0, 4, '', 43, NULL, NULL),
(35, '“Biển Cần Thơ” là bãi biển nhân tạo, khoảng 400m bãi bờ sông được đổ hơn 1 triệu mét khối cát xuống để làm bãi tắm không bùn. Từ biển, khách tham quan có thể ngắm cầu Cần Thơ với khoảng cách khá gần. Hít một hơi vào lồng ngực, và cảm nhận luồng không khí tươi mới của vùng sông nước. Lắng nghe tiếng sóng vỗ và động cơ của tàu bè qua lại, cảm nhận cuộc sống hàng ngày đang trôi theo con nước lên xuống và ngắm nhìn Cầu Cần Thơ, niềm tự hào của người Miền Tây. Đứng từ nơi này, bạn sẽ cảm giác như được kết nối với thế giới của sông Mekong, tránh xa sự ồn ào nhộn nhịp của trung tâm.', '9:00', '22:00', 0, 0, 4, '', 44, NULL, NULL),
(36, 'Đây là một công trình kiến trúc độc đáo bên cạnh hồ Tuyền Lâm. Đi lên từ phía hồ Tuyền Lâm là một con đường dốc có 140 bậc thang bằng đá, hai bên là những rặng thông cao vút dẫn qua 3 cổng tam quan để vào chính điện. Chính điện có diện tích 192m2, bên trong thờ tự đơn giản, nhưng mang đầy ý nghĩa của nhà Phật. Giữa điện thờ tượng Phật Thích Ca cao khoảng 2m, tay phải cầm cành hoa sen đưa lên gọi là bức tượng \"Phật Thích Ca Niêm Hoa Vi Tiếu\" (vì miêu tả theo điển tích \"Niêm Hoa Vi Tiếu\"). Bên phải đức phật là Bồ Tát Văn Thù cưỡi sư tử. Bên trái là Bồ Tát Phổ Hiền cưỡi voi trắng 6 ngà. Chung quanh phía trên chính điện là các bức phù điêu chạm khắc 8 tướng thị hiện của đức phật và các bao lam, án thờ bằng gỗ được chạm khắc rất công phu. Hành lang phía trước chính điện là hàng cột gồm bốn cột tròn giả gỗ. Trần được lợp bằng ngói tráng men sáng loáng, mái ngói uốn nhẹ toát lên nét khiêm cung của người Việt, nét thanh thoát của nhà thiền. Phía bên phải của chính điện là lầu chuông được chạm khắc phù điêu mang ý nghĩa sâu sắc của Phật giáo rất tinh xảo và đẹp mắt. Bên trong là quả đại hồng chung nặng khoảng 1,1 tấn, trên mình khắc chạm những bài kệ có ý nghĩa thanh thoát mang đầy đạo lý.   Gác trống Từ trên chính điện nhìn xuống là hồ Tuyền Lâm, phong cảnh ở đây rất đẹp, hồ nước trong xanh in bóng rặng thông bên đồi Thanh Lương. Bên dưới lưng chừng đồi, gần hồ Tĩnh Tâm là nhà khách 2 tầng nằm gọn trên một ngọn đồi có khu vườn xanh mát. Đây là nơi những phụ nữ đến xin tập tu ngắn hạn tại thiền viện. Phía trước nhà là rừng trúc xanh tươi. Đứng trước sân nhà có thể thấy đỉnh núi voi phục soi bóng xuống hồ Tuyền Lâm hùng vĩ.', '9:00', '22:00', 0, 0, 4, '', 45, NULL, NULL),
(37, 'Đến với Làng Du Lịch Mỹ Khánh, quý khách thỏa sức khám phá, tìm hiểu về đời sống cư dân miệt vườn như: tham quan Nhà cổ Nam bộ , thưởng thức chương trình văn nghệ “Đờn ca tài tử”, “Một ngày làm Điền Chủ” với bữa cơm điền chủ, “Một ngày làm nông dân”, “Tát mương bắt cá…”, tham quan Làng nghề văn hóa truyền thống, vườn cây ăn trái, các dịch vụ tại chỗ như đi xe ngựa, bơi thuyền, Taxi điện, đua heo, đua chó, xiếc khỉ, câu cá sấu…và nhiều chương trình khác theo yêu cầu của quý khách.  Ngoài hệ thống nhà nghỉ(Bungalows) đầy đủ tiện nghi,mang phong cách miệt vườn hiệ có tại Làng, chúng tôi còn hợp tác với hơn 20 nhà vườn phát triển mô hình dịch vụ du lịch Làng nghề văn hóa truyền thống và Homestay đã thu hút khá đông du khách trong và ngoài nước có nhu cầu  đến lưu trú -nghĩ dưỡng,sẽ đem đến cho quý khách những trãi nghiệm thú vị!  Với đội ngũ nhân viên phục vụ tận tình,chu đáo và chuyên nghiệp Làng Du Lịch Mỹ Khánh hứa hẹn sẽ là điểm đến hấp dẫn, làm hài lòng du khách gần xa.  Trân trọng kính chào và mong được phục vụ quý khách!', '9:00', '22:00', 0, 0, 0, '', 46, NULL, NULL),
(38, 'Sống ở Cần Thơ từ nhỏ tới lớn, nên chỗ này cũng rất quen thuộc đối với mình. Lúc trước, chỗ này là khu du lịch, sở thú, nhưng sau này đã bị chia ra làm hai phần. Một phần là quán cà phê và chợ đêm, phần còn lại trở thành công viên giải trí. Lúc nhỏ rất thường xuyên đi đến đây chơi, nhưng bây giờ đa số là chở em lại cho nó chơi. Cho tới bây giờ thì đã có mở rộng thêm rất nhiều trò chơi hiện đại, cảm giác mạnh, và còn có cả trò chơi cho con nít như câu cá và nặn đất sét,... Giá mỗi loại trò chơi chỉ từ 20k trở xuống. Giá cả hợp lí, phù hợp với từng loại trò chơi. Sẽ tiếp tục dẫn em đi chơi, để được chơi ké ^^', '9:00', '22:00', 0, 0, 0, '', 47, NULL, NULL),
(39, 'Ở cần thơ chứ lần đầu tiên mình với tụi bạn mới ghé đây chơi. Rất hao hức vì ở đây khá rộng và y như lạc vào một thế giới khác. Nhưng điều mình không hài lòng nhất là gía để gởi đồ là 10k một lượt/người. Nước thì không được sạch lắm. Dù có nhiều trò chơi nhưng đối với mình mọi thứ vẫn không được hài lòng. Có thể mình sẽ đi một lần cho biết rồi thôi chứ không quay lại. Hoặc cũng có thể chỗ này chỉ dành cho con nít chăng?', '9:00', '22:00', 0, 0, 5, '', 48, NULL, NULL);

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
(1, 'banner__2018_01_04_11_18_31.jpg', 'chitiet1__2018_01_04_11_18_31.jpg', 'chitiet2__2018_01_04_11_18_31.jpg', 1, '2018-01-04 16:18:34', '2018-01-04 16:18:34'),
(2, 'banner__2018_01_04_11_20_03.jpg', 'chitiet1__2018_01_04_11_20_03.jpg', 'chitiet2__2018_01_04_11_20_03.jpg', 2, '2018-01-04 16:20:05', '2018-01-04 16:20:05'),
(3, 'banner__2018_01_04_11_24_46.jpg', 'chitiet1__2018_01_04_11_24_46.jpg', 'chitiet2__2018_01_04_11_24_46.jpg', 3, '2018-01-04 16:24:49', '2018-01-04 16:24:49'),
(4, 'banner__2018_01_04_11_27_47.jpg', 'chitiet1__2018_01_04_11_27_47.jpg', 'chitiet2__2018_01_04_11_27_47.jpg', 4, '2018-01-04 16:27:49', '2018-01-04 16:27:49'),
(5, 'banner__2018_01_04_11_28_26.jpg', 'chitiet1__2018_01_04_11_28_26.jpg', 'chitiet2__2018_01_04_11_28_26.jpg', 5, '2018-01-04 16:28:28', '2018-01-04 16:28:28'),
(6, 'banner__2018_01_04_11_34_23.jpg', 'chitiet1__2018_01_04_11_34_23.jpg', 'chitiet2__2018_01_04_11_34_23.jpg', 6, '2018-01-04 16:34:25', '2018-01-04 16:34:25'),
(7, 'banner__2018_01_04_11_35_29.jpg', 'chitiet1__2018_01_04_11_35_29.jpg', 'chitiet2__2018_01_04_11_35_29.jpg', 7, '2018-01-04 16:35:31', '2018-01-04 16:35:31'),
(8, 'banner__2018_01_04_11_36_02.jpg', 'chitiet1__2018_01_04_11_36_02.jpg', 'chitiet2__2018_01_04_11_36_02.jpg', 8, '2018-01-04 16:36:04', '2018-01-04 16:36:04'),
(9, 'banner__2018_01_04_11_38_29.jpg', 'chitiet1__2018_01_04_11_38_29.jpg', 'chitiet2__2018_01_04_11_38_29.jpg', 9, '2018-01-04 16:38:31', '2018-01-04 16:38:31'),
(10, 'banner__2018_01_04_11_39_43.jpg', 'chitiet1__2018_01_04_11_39_43.jpg', 'chitiet2__2018_01_04_11_39_43.jpg', 10, '2018-01-04 16:39:45', '2018-01-04 16:39:45'),
(11, 'banner__2018_01_04_11_48_05.jpg', 'chitiet1__2018_01_04_11_48_05.jpg', 'chitiet2__2018_01_04_11_48_05.jpg', 13, '2018-01-04 16:48:07', '2018-01-04 16:48:07'),
(12, 'banner__2018_01_04_11_49_43.jpg', 'chitiet1__2018_01_04_11_49_43.jpg', 'chitiet2__2018_01_04_11_49_43.jpg', 14, '2018-01-04 16:49:45', '2018-01-04 16:49:45'),
(13, 'banner__2018_01_04_11_50_21.jpg', 'chitiet1__2018_01_04_11_50_21.jpg', 'chitiet2__2018_01_04_11_50_21.jpg', 15, '2018-01-04 16:50:22', '2018-01-04 16:50:22'),
(14, 'banner__2018_01_04_11_51_02.jpg', 'chitiet1__2018_01_04_11_51_02.jpg', 'chitiet2__2018_01_04_11_51_02.jpg', 16, '2018-01-04 16:51:04', '2018-01-04 16:51:04'),
(15, 'banner__2018_01_04_11_51_29.jpg', 'chitiet1__2018_01_04_11_51_29.jpg', 'chitiet2__2018_01_04_11_51_29.jpg', 17, '2018-01-04 16:51:30', '2018-01-04 16:51:30'),
(16, 'banner__2018_01_04_11_51_58.jpg', 'chitiet1__2018_01_04_11_51_58.jpg', 'chitiet2__2018_01_04_11_51_58.jpg', 18, '2018-01-04 16:51:59', '2018-01-04 16:51:59'),
(17, 'banner__2018_01_04_11_52_30.jpg', 'chitiet1__2018_01_04_11_52_30.jpg', 'chitiet2__2018_01_04_11_52_30.jpg', 19, '2018-01-04 16:52:32', '2018-01-04 16:52:32'),
(18, 'banner__2018_01_04_11_53_01.jpg', 'chitiet1__2018_01_04_11_53_01.jpg', 'chitiet2__2018_01_04_11_53_01.jpg', 20, '2018-01-04 16:53:03', '2018-01-04 16:53:03'),
(19, 'banner__2018_01_04_11_53_36.jpg', 'chitiet1__2018_01_04_11_53_36.jpg', 'chitiet2__2018_01_04_11_53_36.jpg', 21, '2018-01-04 16:53:38', '2018-01-04 16:53:38'),
(20, 'banner__2018_01_04_11_54_13.jpg', 'chitiet1__2018_01_04_11_54_13.jpg', 'chitiet2__2018_01_04_11_54_13.jpg', 22, '2018-01-04 16:54:15', '2018-01-04 16:54:15'),
(21, 'banner__2018_01_04_11_55_29.jpg', 'chitiet1__2018_01_04_11_55_29.jpg', 'chitiet2__2018_01_04_11_55_29.jpg', 24, '2018-01-04 16:55:31', '2018-01-04 16:55:31'),
(22, 'banner__2018_01_04_11_56_06.jpg', 'chitiet1__2018_01_04_11_56_06.jpg', 'chitiet2__2018_01_04_11_56_06.jpg', 25, '2018-01-04 16:56:07', '2018-01-04 16:56:07'),
(23, 'banner__2018_01_04_11_56_36.jpg', 'chitiet1__2018_01_04_11_56_36.gif', 'chitiet2__2018_01_04_11_56_36.jpg', 26, '2018-01-04 16:56:38', '2018-01-04 16:56:38'),
(24, 'banner__2018_01_04_11_57_04.jpg', 'chitiet1__2018_01_04_11_57_04.jpg', 'chitiet2__2018_01_04_11_57_04.jpg', 27, '2018-01-04 16:57:05', '2018-01-04 16:57:05'),
(25, 'banner__2018_01_04_11_57_28.JPG', 'chitiet1__2018_01_04_11_57_28.JPG', 'chitiet2__2018_01_04_11_57_28.jpg', 28, '2018-01-04 16:57:30', '2018-01-04 16:57:30'),
(26, 'banner__2018_01_04_11_57_57.jpg', 'chitiet1__2018_01_04_11_57_57.jpg', 'chitiet2__2018_01_04_11_57_57.jpg', 29, '2018-01-04 16:57:59', '2018-01-04 16:57:59'),
(27, 'banner__2018_01_04_11_58_31.jpg', 'chitiet1__2018_01_04_11_58_31.jpg', 'chitiet2__2018_01_04_11_58_31.jpg', 30, '2018-01-04 16:58:33', '2018-01-04 16:58:33'),
(28, 'banner__2018_01_04_11_58_56.jpg', 'chitiet1__2018_01_04_11_58_56.jpg', 'chitiet2__2018_01_04_11_58_56.jpg', 31, '2018-01-04 16:58:57', '2018-01-04 16:58:57'),
(29, 'banner__2018_01_04_11_59_25.jpg', 'chitiet1__2018_01_04_11_59_25.jpg', 'chitiet2__2018_01_04_11_59_25.jpg', 32, '2018-01-04 16:59:27', '2018-01-04 16:59:27'),
(30, 'banner__2018_01_04_11_59_49.jpeg', 'chitiet1__2018_01_04_11_59_49.jpg', 'chitiet2__2018_01_04_11_59_49.jpg', 33, '2018-01-04 16:59:51', '2018-01-04 16:59:51'),
(31, 'banner__2018_01_05_12_01_04.jpg', 'chitiet1__2018_01_05_12_01_04.jpg', 'chitiet2__2018_01_05_12_01_04.jpg', 34, '2018-01-04 17:01:06', '2018-01-04 17:01:06'),
(32, 'banner__2018_01_05_12_01_32.jpg', 'chitiet1__2018_01_05_12_01_32.jpg', 'chitiet2__2018_01_05_12_01_32.jpg', 35, '2018-01-04 17:01:33', '2018-01-04 17:01:33'),
(33, 'banner__2018_01_05_12_02_09.jpg', 'chitiet1__2018_01_05_12_02_09.jpg', 'chitiet2__2018_01_05_12_02_09.JPG', 36, '2018-01-04 17:02:12', '2018-01-04 17:02:12'),
(34, 'banner__2018_01_05_12_03_14.jpg', 'chitiet1__2018_01_05_12_03_14.jpg', 'chitiet2__2018_01_05_12_03_14.jpg', 37, '2018-01-04 17:03:16', '2018-01-04 17:03:16'),
(35, 'banner__2018_01_05_12_03_53.jpg', 'chitiet1__2018_01_05_12_03_53.jpg', 'chitiet2__2018_01_05_12_03_53.jpg', 38, '2018-01-04 17:03:54', '2018-01-04 17:03:54'),
(36, 'banner__2018_01_05_12_04_13.jpg', 'chitiet1__2018_01_05_12_04_13.jpg', 'chitiet2__2018_01_05_12_04_13.jpg', 39, '2018-01-04 17:04:15', '2018-01-04 17:04:15');

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
(1, 'Khách sạn Holiday - One', 'holidayonehotel.com', '', 13, NULL, NULL),
(2, 'Khách sạn Ninh Kiều 1', 'Ninhkieuhotel.vn', '', 14, NULL, NULL),
(3, 'Khách sạn Ninh Kiều 2', 'Ninhkieuhotel.vn', '', 15, NULL, NULL),
(4, 'Khách sạn Phương Nga', 'Phuongngahotel.com', '', 22, NULL, NULL),
(5, 'Khách sạn Mường Thanh', 'luxurycantho.muongthanh.com/', '', 16, NULL, NULL),
(6, 'Vạn Phát Riverside', '', '', 17, NULL, NULL),
(7, 'Fortuneland', '', '', 18, NULL, NULL),
(8, 'Vinpearl Cần Thơ', '', '', 19, NULL, NULL),
(9, 'Khách sạn Cửu Long', '', '', 20, NULL, NULL),
(10, 'Khách sạn Aura', '', '', 21, NULL, NULL);

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
(1, 'Hội thảo và hội nghị', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(2, 'Triển lãm thương mại', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(3, 'Chương trình ưu đãi\r\n', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(4, 'Ăn tối và giải trí', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(5, 'Thi đấu thể thao\r\n', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(6, 'Lễ hội âm nhạc\r\n', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(7, 'Lễ hội', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(8, 'Lễ kỷ niệm', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(9, 'Lễ tưởng niệm', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(10, 'Tiếp thị', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(11, 'Giáo dục', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(12, 'Hội họp', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(13, 'Gây quỹ', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(14, 'Từ thiện', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(15, 'SK chuyên ngành', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(16, 'Live show', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(17, 'Triễn lãm', '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(18, 'Hội chợ', '2018-01-03 17:00:00', '2018-01-03 17:00:00');

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
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dlct_nguoidung`
--

INSERT INTO `dlct_nguoidung` (`id`, `nd_tendangnhap`, `password`, `nd_facebook_id`, `nd_email_id`, `nd_avatar`, `nd_quocgia`, `nd_ngonngu`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'phanvantinh', 'phanvantinh', '2003006393316200', 'phanvantinh1303@gmail.com', 'https://scontent.fsgn5-2.fna.fbcdn.net/v/t1.0-9/21617833_2003006393316200_2773611479451376251_n.jpg?oh=ccf21f2e1964444bcbf1fdd109eda710&oe=5ACDE5F0', 'vietnamese', 'vietnamse', 0, NULL, NULL, NULL),
(2, 'nguyendongtuong', 'nguyendongtuong', '937845406352461', 'zzacnguyen@gmail.com', 'https://scontent.fsgn5-2.fna.fbcdn.net/v/t1.0-9/15873315_937845406352461_6526995619077913865_n.jpg?oh=d6f58a0f65b47af56dcb28b5b47801e9&oe=5ABA296E', 'vietnamese', 'vietnamse', 0, NULL, NULL, NULL),
(3, 'vophantrongnghia', 'vophantrongnghia', 'nghia.vophantrong', 'nghia.vophantrong@gmail.com', 'https://scontent.fsgn5-2.fna.fbcdn.net/v/t1.0-9/21151724_688700711339420_8615175024259709099_n.jpg?oh=3e8187b21617f7be2aa8c14341534606&oe=5AC190AB', 'vietnamese', 'vietnamese', 0, NULL, NULL, NULL),
(4, 'tranduclam', 'tranduclam', 'lam.themen', 'lam.themen', 'https://scontent.fsgn5-2.fna.fbcdn.net/v/t1.0-9/20799314_799891783504249_8125381775365042959_n.jpg?oh=2b6e577a8e1c9b1f40c7cfa0942e7152&oe=5AC427B2', 'VietNamese', 'VietNamese', 0, NULL, NULL, NULL),
(5, 'thaingochuy', 'thaingochuy', '100007852937581', '100007852937581', 'https://scontent.fsgn5-2.fna.fbcdn.net/v/t1.0-9/12019775_1671251109813304_7459011053426605892_n.jpg?oh=0f7d06aad35e3cebf783a5583301e72c&oe=5ABED879', 'VietNamese', 'VietNamese', 0, NULL, NULL, NULL);

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
(1, 'Bến xe Khách Cần Thơ', '3', 24, NULL, NULL),
(2, 'Bến xe trung tâm thành phố Cần thơ', '3', 25, NULL, NULL),
(3, 'Taxi MaiLinh', '3', 26, NULL, NULL),
(4, 'Taxi green', '3', 27, NULL, NULL),
(5, 'Taxi Happy', '3', 28, NULL, NULL),
(6, 'Taxi Hoàng Anh', '3', 29, NULL, NULL);

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

--
-- Đang đổ dữ liệu cho bảng `dlct_sukien`
--

INSERT INTO `dlct_sukien` (`id`, `sk_tensukien`, `sk_ngaybatdau`, `sk_ngayketthuc`, `dv_iddichvu`, `lhsk_idloaihinhsukien`, `created_at`, `updated_at`) VALUES
(1, 'Chiếu sáng nghệ thuật', '2018-01-01', '2018-01-02', 1, 7, '2018-01-03 17:00:00', '2018-01-03 17:00:00'),
(2, 'Pháo hoa nghệ thuật', '2018-01-04', '2018-01-06', 1, 8, '2018-01-03 17:00:00', '2018-01-03 17:00:00');

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

--
-- Đang đổ dữ liệu cho bảng `dlct_thamquan`
--

INSERT INTO `dlct_thamquan` (`id`, `tq_tendiemthamquan`, `dv_iddichvu`, `created_at`, `updated_at`) VALUES
(1, 'Bến Ninh Kiều', 30, NULL, NULL),
(2, 'Cầu đi bộ bến Ninh Kiều', 31, NULL, NULL),
(3, 'Đền Bình Thủy', 32, NULL, NULL),
(4, 'Bảo tàng Cần Thơ', 33, NULL, NULL),
(5, 'Công viên Lưu Hữu Phước', 34, NULL, NULL),
(6, 'Bãi biển nhân tạo Cần Thơ', 35, NULL, NULL),
(7, 'Thiền viện Trúc Lâm', 36, NULL, NULL);

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
(1, 'Làng du lịch Mỹ Khánh', 37, NULL, NULL),
(2, 'Công viên văn hóa miền Tây', 38, NULL, NULL),
(3, 'Công viên nước Cần Thơ', 39, NULL, NULL);

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
(23, '2014_10_12_100000_create_password_resets_table', 1),
(24, '2017_11_02_142109_create_nguoidung_table', 1),
(25, '2017_11_02_143248_create_diadiem_table', 1),
(26, '2017_11_02_143901_create_lichtrinh_table', 1),
(27, '2017_11_02_144022_create_chitietlichtrinh_table', 1),
(28, '2017_11_02_144140_create_dichvu_table', 1),
(29, '2017_11_02_144243_create_loaihinhsukien_table', 1),
(30, '2017_11_02_144358_create_sukien_table', 1),
(31, '2017_11_02_144540_create_binhluan_table', 1),
(32, '2017_11_02_151955_create_danhgia_table', 1),
(33, '2017_11_02_152627_create_thamquan_table', 1),
(34, '2017_11_02_152802_create_phuongtien_table', 1),
(35, '2017_11_02_152910_create_anuong_table', 1),
(36, '2017_11_02_152958_create_khachsan_table', 1),
(37, '2017_11_02_153038_create_vuichoi_table', 1),
(38, '2017_11_09_123423_create_yeuthich_table', 1),
(39, '2017_11_13_141540_create_tukhoa_table', 1),
(40, '2017_11_13_144257_create_tukhoa_dichvu_table', 1),
(41, '2017_12_13_233705_create_nguoidungcanhan_table', 1),
(42, '2017_12_13_235129_create_nguoidungdoanhnghiep_table', 1),
(43, '2017_12_18_141111_create_hinhanh_table', 1);

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
  ADD KEY `dlct_yeuthich_dv_iddichvu_foreign` (`dv_iddichvu`),
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT cho bảng `dlct_dichvu`
--
ALTER TABLE `dlct_dichvu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT cho bảng `dlct_hinhanh`
--
ALTER TABLE `dlct_hinhanh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT cho bảng `dlct_khachsan`
--
ALTER TABLE `dlct_khachsan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT cho bảng `dlct_lichtrinh`
--
ALTER TABLE `dlct_lichtrinh`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `dlct_loaihinhsukien`
--
ALTER TABLE `dlct_loaihinhsukien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `dlct_sukien`
--
ALTER TABLE `dlct_sukien`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
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
