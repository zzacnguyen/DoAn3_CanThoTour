-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 21, 2018 lúc 05:16 AM
-- Phiên bản máy phục vụ: 10.1.30-MariaDB
-- Phiên bản PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vietnamtour`
--

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
(216, '2018_03_21_004552_create_district_table', 1),
(218, '2018_03_21_004906_create_province_table', 2),
(240, '2018_03_21_010216_create_province_city_table', 3),
(241, '2018_03_21_010249_create_district_table', 3),
(242, '2018_03_21_010421_create_ward_table', 3),
(243, '2018_03_21_010628_create_users_table', 3),
(244, '2018_03_21_010823_create_user_enterprise_table', 3),
(245, '2018_03_21_010928_create_user_persional_table', 3),
(246, '2018_03_21_011111_create_tourist_places_table', 3),
(247, '2018_03_21_011238_create_services_table', 3),
(248, '2018_03_21_011324_create_likes_table', 3),
(249, '2018_03_21_011412_create_vnt_visitor_ratings_table', 3),
(250, '2018_03_21_011509_create_vnt_keyworks_table', 3),
(251, '2018_03_21_011614_create_service_ketwork_table', 3),
(252, '2018_03_21_011704_create_vnt_images_table', 3),
(253, '2018_03_21_011808_create_types_event_table', 3),
(254, '2018_03_21_011853_create_vnt_events_table', 3),
(255, '2018_03_21_012133_create_vnt_eating_table', 4),
(256, '2018_03_21_012153_create_vnt_hotels_table', 4),
(257, '2018_03_21_012217_create_vnt_transport_table', 4),
(258, '2018_03_21_012245_create_vnt_sightseeing_table', 4),
(259, '2018_03_21_012311_create_vnt_entertaimets_table', 4),
(260, '2018_03_21_012527_create_vnt_userseacrh_table', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_district`
--

CREATE TABLE `vnt_district` (
  `id` int(10) UNSIGNED NOT NULL,
  `district_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `province_city_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vnt_district`
--

INSERT INTO `vnt_district` (`id`, `district_name`, `province_city_id`, `created_at`, `updated_at`) VALUES
(1, '1', 1, '2018-03-20 18:27:39', '2018-03-20 18:27:42');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_eating`
--

CREATE TABLE `vnt_eating` (
  `id` int(10) UNSIGNED NOT NULL,
  `eat_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `eat_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vnt_eating`
--

INSERT INTO `vnt_eating` (`id`, `eat_name`, `eat_status`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'Highlands Coffee - Sense City Cần Thơ\r\n', 'Active', 3, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(2, 'Kem Baskin Robbins - Sense City', 'Active', 2, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(3, 'Jollibee - CoopMart Cần Thơ', 'Active', 5, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(4, 'Công Ty TNHH MTV Phân Phối Sài Gòn Co.op - Coopmart Cần Thơ', 'Active', 6, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(5, 'Cafe 59 Ngô Văn Sở', 'Active', 8, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(7, 'Cà Phê Gió và Nước', 'Active', 10, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(8, 'ĂN UỐNG', 'Active', 12, '2018-03-07 08:02:49', '2018-03-07 08:02:49'),
(9, 'TÊN QUÁN ĂN', 'Active', 16, '2018-03-10 00:02:06', '2018-03-10 00:02:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_enterprise_users`
--

CREATE TABLE `vnt_enterprise_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `eu_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `eu_website` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `eu_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `eu_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `eu_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_entertaiments`
--

CREATE TABLE `vnt_entertaiments` (
  `id` int(10) UNSIGNED NOT NULL,
  `entertainments_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `entertainments_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_events`
--

CREATE TABLE `vnt_events` (
  `id` int(10) UNSIGNED NOT NULL,
  `event_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `event_start` date NOT NULL,
  `event_end` date NOT NULL,
  `event_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_hotels`
--

CREATE TABLE `vnt_hotels` (
  `id` int(10) UNSIGNED NOT NULL,
  `hotel_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_number_star` int(11) NOT NULL,
  `hotel_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vnt_hotels`
--

INSERT INTO `vnt_hotels` (`id`, `hotel_name`, `hotel_number_star`, `hotel_status`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'TÊN KHÁCH SẠN', 3, 'Active', 18, '2018-03-10 01:26:19', '2018-03-10 01:26:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_images`
--

CREATE TABLE `vnt_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `image_banner` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image_details_1` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image_details_2` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `image_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vnt_images`
--

INSERT INTO `vnt_images` (`id`, `image_banner`, `image_details_1`, `image_details_2`, `image_status`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'banner__2018_02_23_10_54_57.jpg', 'details1__2018_02_23_10_54_57.jpg', 'details2__2018_02_23_10_54_57.jpg', 'Active', 1, '2018-02-23 08:55:00', '2018-02-23 08:55:00'),
(2, 'banner__2018_02_24_08_25_23.jpg', 'details1__2018_02_24_08_25_23.png', 'details2__2018_02_24_08_25_23.jpg', 'Active', 2, '2018-02-23 18:25:27', '2018-02-23 18:25:27'),
(3, 'banner__2018_02_24_08_35_27.jpg', 'details1__2018_02_24_08_35_27.jpg', 'details2__2018_02_24_08_35_27.jpg', 'Active', 3, '2018-02-23 18:35:28', '2018-02-23 18:35:28'),
(4, 'banner__2018_02_24_09_53_56.jpg', 'details1__2018_02_24_09_53_56.jpg', 'details2__2018_02_24_09_53_56.jpg', 'Active', 4, '2018-02-23 19:53:57', '2018-02-23 19:53:57'),
(5, 'banner__2018_02_24_10_13_06.jpg', 'details1__2018_02_24_10_13_06.jpg', 'details2__2018_02_24_10_13_06.jpg', 'Active', 5, '2018-02-23 20:13:08', '2018-02-23 20:13:08'),
(6, 'banner__2018_02_24_10_18_14.png', 'details1__2018_02_24_10_18_14.jpg', 'details2__2018_02_24_10_18_14.jpg', 'Active', 6, '2018-02-23 20:18:15', '2018-02-23 20:18:15'),
(7, 'banner__2018_02_24_10_27_47.jpg', 'details1__2018_02_24_10_27_47.jpg', 'details2__2018_02_24_10_27_47.png', 'Active', 7, '2018-02-23 20:27:50', '2018-02-23 20:27:50'),
(8, 'banner__2018_02_24_10_40_14.jpg', 'details1__2018_02_24_10_40_14.jpg', 'details2__2018_02_24_10_40_14.jpg', 'Active', 8, '2018-02-23 20:40:16', '2018-02-23 20:40:16'),
(9, 'banner__2018_02_24_11_55_37.jpg', 'details1__2018_02_24_11_55_37.jpg', 'details2__2018_02_24_11_55_37.jpg', 'Active', 9, '2018-02-23 21:55:39', '2018-02-23 21:55:39'),
(10, 'banner__2018_02_24_12_01_23.jpg', 'details1__2018_02_24_12_01_23.jpg', 'details2__2018_02_24_12_01_23.jpg', 'Active', 10, '2018-02-23 22:01:25', '2018-02-23 22:01:25'),
(11, 'banner__2018_02_24_12_07_27.jpg', 'details1__2018_02_24_12_07_27.jpg', 'details2__2018_02_24_12_07_27.jpg', 'Active', 11, '2018-02-23 22:07:29', '2018-02-23 22:07:29'),
(12, 'banner__2018_03_07_10_02_47.jpg', 'details1__2018_03_07_10_02_47.jpg', 'details2__2018_03_07_10_02_47.jpg', 'Active', 12, '2018-03-07 08:02:49', '2018-03-07 08:02:49'),
(13, 'banner__2018_03_08_11_29_01.png', 'details1__2018_03_08_11_29_01.png', 'details2__2018_03_08_11_29_01.png', 'Active', 1, '2018-03-07 21:29:05', '2018-03-07 21:29:05'),
(14, 'banner__2018_03_08_11_29_36.png', 'details1__2018_03_08_11_29_36.png', 'details2__2018_03_08_11_29_36.png', 'Active', 1, '2018-03-07 21:29:39', '2018-03-07 21:29:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_keyworks`
--

CREATE TABLE `vnt_keyworks` (
  `id` int(10) UNSIGNED NOT NULL,
  `kw_name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `kw_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_likes`
--

CREATE TABLE `vnt_likes` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vnt_likes`
--

INSERT INTO `vnt_likes` (`id`, `user_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_persional_users`
--

CREATE TABLE `vnt_persional_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `pu_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ep_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_province_city`
--

CREATE TABLE `vnt_province_city` (
  `id` int(10) UNSIGNED NOT NULL,
  `province_city_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vnt_province_city`
--

INSERT INTO `vnt_province_city` (`id`, `province_city_name`, `created_at`, `updated_at`) VALUES
(1, '1', '2018-03-20 18:27:19', '2018-03-20 18:27:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_services`
--

CREATE TABLE `vnt_services` (
  `id` int(10) UNSIGNED NOT NULL,
  `sv_description` text COLLATE utf8_unicode_ci NOT NULL,
  `sv_open` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `sv_close` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `sv_highest_price` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `sv_lowest_price` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `sv_phone_number` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `sv_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sv_types` int(11) NOT NULL,
  `tourist_places_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vnt_services`
--

INSERT INTO `vnt_services` (`id`, `sv_description`, `sv_open`, `sv_close`, `sv_highest_price`, `sv_lowest_price`, `sv_phone_number`, `sv_status`, `sv_types`, `tourist_places_id`, `created_at`, `updated_at`) VALUES
(1, 'Bustling riverfront park with a promenade, shade trees & nearby shops & restaurants.\r\n\r\nCông viên ven sông nhộn nhịp với lối đi dạo, cây bóng mát và các cửa hàng gần đó và nhà hàng.', '0:00', '0:00', '0', '0', '012931872172', 'active', 5, 1, '2018-02-21 10:00:00', '2018-02-21 10:00:00'),
(2, 'Hình này mình đi ăn tầm mười mấy 20 tháng 1 mà đến giờ mới review, hôm đó vẫn còn chương trình mua 1 viên kem giá 10k chứ chưa có chương trình mừng u23 2 viên kem 23k. Nhưng mình thấy hôm mình ăn ngợi hơn. Viên kem 10k mà to đùng còn 2 viên 23k lại khá nhỏ nên đỡ tiếc :)) Kem ở Baskin Robin thiệt tình không có gì để chê. Vốn là 1 đứa không thích kem mà giờ vô đều đặn 1 tháng mấy lần là thấy sức hút mãnh liệt rồi. Có mấy vị kem cũng thanh, không quá béo, bên trong có hạt nữa nên cũng đỡ ngán. Mà tốt nhất mỗi người 1 viên là vừa ngon, không nên ăn nhiều.', '10:00', '22:00', '110.000đ', '39.000đ', '+84 90 371 20 94', 'Active', 1, 2, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(3, 'Highlands Coffee - Sense City Cần Thơ\r\nHighlands Coffee là một trong những thương hiệu cũng khá nổi tiếng trong thị trường ăn uống. Tình cờ thấy quán đã có trên delivery now của Foody mà trúng đợt code giảm giá nữa nên mình order Bánh mì và cafe sữa highlands trên đây để về ăn xem thế nào. \r\nSau khoảng thời gian ngắn chờ đợi giao hàng thì thức ăn và nước uống cũng đã về tới. \r\nBánh mì thơm nóng giòn, cafe tuyệt lắm. Giá chỉ 19k đối với bánh mì và 29k đối với cafe. Mình có code giảm giá nên trả ít hơn nữa. Nói chung là tuyệt lắm.\r\nSẽ thử thêm một số thức uống khác của thương hiệu này.', '09:00', '22:00', '19.000đ', '59.000đ', 'Đang cập nhật', 'Active', 1, 2, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(4, 'CJ CGV trực thuộc CJ Group, một trong những tập đoàn kinh tế đa ngành lớn nhất của Hàn Quốc có mặt ở 21 quốc gia trên thế giới. CJ CGV là một trong top 5 cụm rạp chiếu phim lớn nhất toàn cầu và là nhà phát hành, cụm rạp chiếu phim lớn nhất Việt Nam. Mục tiêu của chúng tôi là trở thành hình mẫu công ty điển hình đóng góp cho sự phát triển không ngừng của ngành công nghiệp điện ảnh Việt Nam.\r\nCJ CGV đã tạo nên khái niệm độc đáo về việc chuyển đổi rạp chiếu phim truyền thống thành tổ hợp văn hóa “Cultureplex”, nơi khán giả không chỉ đến thưởng thức điện ảnh đa dạng thông qua các công nghệ tiên tiến như IMAX, STARIUM, 4DX, Dolby Atmos, cũng như thưởng thức ẩm thực hoàn toàn mới và khác biệt trong khi trải nghiệm dịch vụ chất lượng nhất tại CGV.\r\nThông qua những nỗ lực trong việc xây dựng chương trình Lớp học làm phim TOTO, CGV ArtHouse cùng việc tài trợ cho các hoạt động liên hoan phim lớn trong nước như Liên hoan Phim quốc tế Hà Nội, Liên hoan Phim Việt Nam, CJ CGV Việt Nam mong muốn sẽ khám phá và hỗ trợ phát triển cho các nhà làm phim trẻ tài năng của Việt Nam.\r\nCJ CGV cũng tập trung quan tâm đến đối tượng khán giả ở các khu vực không có điều kiện tiếp cận nhiều với điện ảnh, bằng cách tạo cơ hội để họ có thể thưởng thức những bộ phim chất lượng cao thông qua các chương trình vì cộng đồng như Trăng cười và Điện ảnh cho mọi người.\r\nCJ CGV Việt Nam sẽ tiếp tục cuộc hành trình bền bỉ trong việc góp phần xây dựng một nền công nghiệp điện ảnh Việt Nam ngày càng vững mạnh hơn cùng các khách hàng tiềm năng, các nhà làm phim, các đối tác kinh doanh uy tín, và cùng toàn thể xã hội.', '8:00', '22:00', '2.000.000đ', '30.000đ', '1900 6017', 'Active', 5, 2, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(5, 'Jollibee - CoopMart Cần Thơ\r\nCó giảm giá nên chạy đi mua cái món thần thánh này về ăn.\r\nGà cay siêu cấp vô địch của Jollibee không ở đâu có thể sánh bằng. Ai không ăn được cay thì xác định là chống chỉ định với món này vì nó quá ư là cay, mà ngon đến lạ thường.\r\nCái hộp cơm mang về mà làm nhìn cũng hấp dẫn và đầy đủ chất dinh dưỡng cực. Rau khá tươi và vị quá là ngon. Cơm thì có thể chọn cơm trắng hoặc cơm cháy tỏi, cơm nào ăn cũng ngon nên chả biết nói sao :v \r\nVề không gian chỗ này thì hồi xưa bự lắm, bây giờ ọp ẹp quá và lại đông nữa nên hơi ngạt.', '08:30', '21:00', '44.000đ', '15.000đ', '+84 292 3819 600', 'Active', 1, 2, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(6, 'Sai Gon Co.op Distribution Limited Company - Can Tho Coopmart\r\nOn January 20th, 2014, for purpose of promoting economic cooperation – association program between Ho Chi Minh City and areas in country, as well as diversifying retail business models of unit and better satisfying the plentiful and diversified shopping demand in accordance with general development tendency of market, Ho Chi Minh City Union of Trading Co-operatives - Saigon Co.op, Saigon Co.op Investment and Development Joint Stock Company and Can Tho General Trading Joint Stock Company - C.T.C, officially launched new business operation model - Can Tho Sense City Trading Center with basic investment capital of over VND 200 billion, located on the most breeding ground of Can Tho centre, at No. 01, Hoa Binh Avenue, Tan An Ward, Ninh Kieu District, Can Tho City.\r\n\r\nCan Tho Sense City Trading Center is invested and constructed by Sai Gon Can Tho Trading Company Limited – a joint-venture company between Saigon Co.op, SCID and C.T.C with area of over 22.000 m2, including 4 floors for shopping, entertainment and 1 basement for parking with area of 3,500 m2\r\n\r\nAlong with area of over 4,000 m2 for Co.opmart optional supermarket, Can Tho Sense City Trading Center is integrated with diversified products and services in a modern shopping space, which is arranged harmoniously between product groups of fashion, cosmetics, jewelry, accessories, household appliances, entertainment area and multi-regional Foodcourt area, etc. Especially, appearance of domestic and international famous trademarks appearing in Can Tho for the first time and complex group for families, youth, servants, officials with over 4,000 m2 for Games/ Bowling equipped with ultramodern equipments, entertainment area for children with many interesting games with 6 groups of 2D & 3D movie theater in accordance with international standards appearing in Mekong Delta of CGV Group (Megastar),Can Tho Sense City Trading Center shall help customer to relax, “Enjoy shopping feeling” and have relaxed time with interesting shopping experiences.\r\n\r\nInheriting sharp understanding about retail market and shopping hobby of customers from Saigon Co.op, with desire to share and accompany with customer of investors as well as support, consideration and guideline of competent agencies of Ho Chi Minh City and Can Tho City, the Can Tho Sense City Trading Center believes to become a destination satisfying many selections for shopping and entertainment demands of families, youth and tourism visitors in Can Tho City in specific and Mekong Delta in general.', '9:00', '21:30', '1.000đ', '1.000.000đ', '+84 292 3818 009', 'Active', 4, 2, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(7, 'Vàng Bạc, Đồ Trang Sức Cao Cấp - Chế Tác Và Kinh Doanh', '8:00 AM', '9:30 PM', '1.000.000', '100.000.000đ', '+84 292 3815 305', 'Active', 4, 2, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(8, 'Address: 4 Đồng Khởi, Tân An, Ninh Kiều, Cần Thơ\r\nPhone: 0123 418 0028', '8:00', '23:00', '50.000đ', '15.000đ', '0123 418 0028', 'Active', 1, 3, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(9, 'Nhà mình ở gần Hồ Xáng Thổi nên tối tối thường ra chỗ này tập thể dục với đi dạo cho mát. Sáng hay tối ngoài này cũng khá đông người đi tập thể dục hoặc mấy gia đình dắt con cháu ra hóng mát. Tuỳ hôm nếu nước cạn thì hồ có mùi hơi khó chịu, còn bình thường cũng ok lắm. Chuẩn bị Tết tới là trên mặt hồ có trang trí thêm mấy biểu tượng hình 12 con giáp sáng đèn, bắt mắt. Chợ Hoa mỗi năm bây giờ cũng tổ chức dọc theo 2 bên bờ hồ kéo dài ra đường Hoàng Văn Thụ, khá nhộn nhịp.', '0:00', '0:00', '0đ', '0đ', 'Đang cập nhật', 'Active', 4, 4, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(10, 'Gió và Nước Cafe Cuối tuần có dịp rãnh thì ông anh lại rũ rê qua quán này để ăn sáng uống cà phê với ổng miết à, mình và ổng gọi 2 tô hủ tiếu xương để ăn sáng và 1 ly cà phê đá với 1 ly cà phê sữa, phải nói hủ tiếu của quán ăn khá là ngon và vừa miệng lắm nước súp khá là đậm đà, giá cả cũng không quá cao hay thấp và tầm tầm à, nên mấy dịp cuối tuần quán này cũng đông khách cực kỳ luôn nhe, nhân viên thì lịch sự quán khá là mát mẻ', '07:00', '22:30 ', '55.000đ', '30.000đ', 'Đang cập nhật', 'Active', 1, 4, '2018-02-23 10:00:00', '0000-00-00 00:00:00'),
(11, 'Thật sự không đánh giá cao về đồ uống của quán cả về trà sữa và các loại khác. Trà sữa tự chọn á mà giá combo khá cao nc là giá hơi chát. Trà sữa vị của quán không còn hấp dẫn hay nói đúng hơn là vị này quá bình thường rồi nhưng bữa mình có ghé thì có gọi soda chanh dây... Nói chung uống tạm nếu ko chọn trà sữa ha. \r\nMột điều mình vẫn công nhận không gian của quán rất tốt cho học tập, trò chuyện bạn bè này kia, bàn ghế dựa, rồi rộng rãi, mát đặc biệt trưa tránh nóng là cực êm.', ' 07:00', '22:30', '30.000đ', '10.000đ', '+84 292 6538 538', 'Active', 1, 5, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(12, 'MÔ TẢ DỊCH VỤ', 'GIỜ MỞ CỬA', 'GIỜ ĐÓNG CỬA', '10', '1', 'SỐ ĐIỆN THOẠI', 'Active', 1, 6, '2018-03-07 08:02:47', '2018-03-07 08:02:47'),
(13, 'GIỚI THIỆU', 'GIỜ MỞ CỬA', 'GIỜ ĐÓNG CỬA', '10', '1', '12312312', 'Active', 2, 4, '2018-03-07 21:33:43', '2018-03-07 21:33:43'),
(14, 'MÔ TẢ', 'GIỜ MỞ CỬA', 'GIỜ ĐÓNG CỬA', '0', '0', '123912', 'Active', 193129, 1, '2018-03-09 23:56:36', '2018-03-09 23:56:36'),
(15, 'MÔ TẢ', 'GIỜ MỞ CỬA', 'GIỜ ĐÓNG CỬA', '0', '0', '123912', 'Active', 193129, 1, '2018-03-10 00:01:16', '2018-03-10 00:01:16'),
(16, 'MÔ TẢ', 'GIỜ MỞ CỬA', 'GIỜ ĐÓNG CỬA', '0', '0', '123912', 'Active', 1, 1, '2018-03-10 00:02:06', '2018-03-10 00:02:06'),
(17, 'MÔ TẢ', 'GIỜ MỞ CỬA', 'GIỜ ĐÓNG CỬA', '0', '0', '123912', 'Active', 1, 2, '2018-03-10 01:25:59', '2018-03-10 01:25:59'),
(18, 'MÔ TẢ', 'GIỜ MỞ CỬA', 'GIỜ ĐÓNG CỬA', '0', '0', '123912', 'Active', 2, 2, '2018-03-10 01:26:19', '2018-03-10 01:26:19'),
(19, 'a', '3', 'a', '21', '12', '12', 'Active', 3, 1, '2018-03-13 23:48:19', '2018-03-13 23:48:19'),
(20, 'a', '3', 'a', '21', '12', '12', 'Active', 3, 1, '2018-03-13 23:48:39', '2018-03-13 23:48:39'),
(21, 'a', '3', 'a', '21', '12', '12', 'Active', 3, 1, '2018-03-15 04:49:15', '2018-03-15 04:49:15');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_service_ketwork`
--

CREATE TABLE `vnt_service_ketwork` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `keywork_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_sightseeing`
--

CREATE TABLE `vnt_sightseeing` (
  `id` int(10) UNSIGNED NOT NULL,
  `sightseeing_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sightseeing_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_tourist_places`
--

CREATE TABLE `vnt_tourist_places` (
  `id` int(10) UNSIGNED NOT NULL,
  `pl_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pl_details` text COLLATE utf8_unicode_ci NOT NULL,
  `pl_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pl_phone_number` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `pl_latitude` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pl_longitude` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pl_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `id_ward` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vnt_tourist_places`
--

INSERT INTO `vnt_tourist_places` (`id`, `pl_name`, `pl_details`, `pl_address`, `pl_phone_number`, `pl_latitude`, `pl_longitude`, `pl_status`, `id_ward`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Công Viên Bến Ninh Kiều Cần Thơ', 'Công viên ven sông nhộn nhịp với lối đi dạo, cây bóng mát và các cửa hàng gần đó và nhà hàng.\r\nBustling riverfront park with a promenade, shade trees & nearby shops & restaurants.', '68 Hai Bà Trưng, Tân An, Cần Thơ, Vietnam', '01231828391', '105.7805257', '10.0272431', 'Active', 1, 1, '2018-02-21 10:00:00', '2018-02-21 10:00:00'),
(2, 'Sense City Can Tho', 'Siêu thị co.opmart cần thơ', 'Đại Lộ Hòa Bình Tân An Cần Thơ Tân An Ninh Kiều, Tân An, Can Tho, Cần Thơ, Vietnam', '+84 292 3688 988', '105.7857849', '10.0342963', 'Active', 1, 2, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(3, 'Cafe 59 Ngô Văn Sở', 'Cafe', '4 Đồng Khởi, Tân An, Ninh Kiều, Cần Thơ, Vietnam', '+84 123 418 0028', '105.7844896', '10.0338002', 'Active', 1, 3, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(4, 'Hồ Xáng Thổi', '\r\nMấy bữa Tết Hồ Xáng Thổi trang trí đèn 12 con giáp giữa lòng hồ khá là đẹp và để đến giờ vẫn chưa tháo luôn. Tối bờ hồ giờ khá nhiều người đi tập thể dục. Trên mấy cây xanh cũng có trang trí đèn treo nữa, cực đẹp luôn. Giờ nước dưới hồ cũng trong hơn rồi, hồ đỡ dơ với ít rác hơn hẳn. Không khí buổi tối hơi lạnh với không trong lành bằng buổi sáng. 1 vòng bờ hồ tròn khoảng 700-800m, đêm nào mình cũng đi tầm 3 vòng là hơn 2 cây số ^^', 'Phường An Cư, Quận Ninh Kiều, Cần Thơ', 'Đang cập nhật', '105.779966', '10.0359292', 'Active', 1, 5, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(5, 'Trà Sữa 2Tea - Mậu Thân', 'Lâu lắm rồi chưa ghé quán,, hôm nay mình mới ghe quán nè.\r\nGọi 1 ly trà thêm nhiều phần topping để thử món luôn nha,\r\nNhân viên vui vẻ, nhiệt tình từ cổng vào đến lên bàn phục vụ luôn nha. Không gian siêu rộng nè, muốn chọn góc nào để ngồi hoặc làm việc đều ổn hết nha.\r\nTrân châu sợi ăn lạ lạ ngon lắm, lại nhiều màu sắc bắt mắt nữa,\r\nNói chung rất thích quán và sẽ quay lại quán nữa nha', '3c Mậu Thân, An Phú, Ninh Kiều, Cần Thơ, Vietnam', '+84 292 6538 538', '105.7738654', '10.0329299', 'Active', 1, 2, '2018-02-23 10:00:00', '2018-02-23 10:00:00'),
(6, 'TÊN ĐỊA ĐIỂM', 'MÔ TẢ', 'ĐỊA CHỈ', 'SỐ ĐIỆN THOẠI', 'VĨ ĐỘ', 'KINH ĐỘ', 'Active', 1, 1, '2018-03-07 07:53:55', '2018-03-07 07:53:55'),
(7, 'TÊN ĐỊA ĐIỂM', 'MÔ TẢ', 'ĐỊA CHỈ', 'SỐ ĐIỆN THOẠI', 'VĨ ĐỘ', 'KINH ĐỘ', 'Active', 1, 1, '2018-03-07 07:55:22', '2018-03-07 07:55:22');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_transport`
--

CREATE TABLE `vnt_transport` (
  `id` int(10) UNSIGNED NOT NULL,
  `transport_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `transport_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_types_event`
--

CREATE TABLE `vnt_types_event` (
  `id` int(10) UNSIGNED NOT NULL,
  `type_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_users`
--

CREATE TABLE `vnt_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_facebook_id` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_email_id` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `user_avatar` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_country` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_language` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vnt_users`
--

INSERT INTO `vnt_users` (`id`, `username`, `password`, `user_facebook_id`, `user_email_id`, `user_avatar`, `user_country`, `user_language`, `user_status`, `created_at`, `updated_at`) VALUES
(1, 'phanvantinh', '$2y$10$nQZLz5GjYKS34p6JMRB8we86IArgYSROdO2Mz8kJdIlr9XH/kPpTe', 'OgjqBk3jUu@facebook.com', 'YLf6bta7aT@facebook.com', 'CBDuO6gVz1png', 'Y915eHn61x', 'HPiKXwxRC2', 'active', NULL, NULL),
(2, 'nguyendongtuong', '$2y$10$i563gfJqNOXrCZJVAOVtjudgkUM1PI/heMQy4QUdixL7Tahv7X4CO', 'jQ2Agb9uma@facebook.com', 'Lq5bsqW6t0@facebook.com', 'nUHNPhV2uHpng', 'pEsI7Maa5j', 'uKIG53WmTA', 'active', NULL, NULL),
(3, 'thaingochuy', '$2y$10$VPzqfoXTugXqKSFMlb2HFepdzru4qZjJ1WInmCJ3SY//E8JH4foYy', '15Y4Q7tvl1@facebook.com', 'GLOejaMgU6@facebook.com', 'vIyQUZZhLmpng', 'Jn3fSfGWih', 'RUrvFebMl6', 'active', NULL, NULL),
(4, 'tranduclam', '$2y$10$hzXp1cB43nFAK859vojeAuTcv4xLlf/EXfLMt14Cpb7PX1eWfSRtG', 'GNCkHA6Xcb@facebook.com', 'qfI2jJBVK1@facebook.com', 'LgVr8Yryk1png', 'QoxmKcZiAq', 'tPvgIl2hMT', 'active', NULL, NULL),
(5, 'vophantrongnghia', '$2y$10$B1BiwZZ5wyjCKYs9Dw3l4erEqba3WtbH/wKSKMKt8VTbYlhygE.5K', 'glfd6o6KC0@facebook.com', 'mTwDCNZjdk@facebook.com', 'j6PUDCePlnpng', 'l1bKEZsj1j', 'vUjQKE3SLk', 'active', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_usersearch`
--

CREATE TABLE `vnt_usersearch` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `id_service` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vnt_usersearch`
--

INSERT INTO `vnt_usersearch` (`id`, `id_users`, `id_service`, `created_at`, `updated_at`) VALUES
(1, 3, 3, '2018-03-10 19:45:11', '2018-03-10 19:45:11'),
(2, 1, 1, '2018-03-15 06:14:36', '2018-03-15 06:14:36'),
(3, 3, 2, '2018-03-15 06:17:08', '2018-03-15 06:17:08'),
(4, 3, 3, '2018-03-15 06:17:12', '2018-03-15 06:17:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_visitor_ratings`
--

CREATE TABLE `vnt_visitor_ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `vr_title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `vr_ratings_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `vr_rating` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_ward`
--

CREATE TABLE `vnt_ward` (
  `id` int(10) UNSIGNED NOT NULL,
  `ward_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vnt_ward`
--

INSERT INTO `vnt_ward` (`id`, `ward_name`, `district_id`, `created_at`, `updated_at`) VALUES
(1, '1', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vnt_district`
--
ALTER TABLE `vnt_district`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_district_province_city_id_foreign` (`province_city_id`);

--
-- Chỉ mục cho bảng `vnt_eating`
--
ALTER TABLE `vnt_eating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_eating_service_id_foreign` (`service_id`);

--
-- Chỉ mục cho bảng `vnt_enterprise_users`
--
ALTER TABLE `vnt_enterprise_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_enterprise_users_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `vnt_entertaiments`
--
ALTER TABLE `vnt_entertaiments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_entertaiments_service_id_foreign` (`service_id`);

--
-- Chỉ mục cho bảng `vnt_events`
--
ALTER TABLE `vnt_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_events_type_id_foreign` (`type_id`),
  ADD KEY `vnt_events_service_id_foreign` (`service_id`);

--
-- Chỉ mục cho bảng `vnt_hotels`
--
ALTER TABLE `vnt_hotels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_hotels_service_id_foreign` (`service_id`);

--
-- Chỉ mục cho bảng `vnt_images`
--
ALTER TABLE `vnt_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_images_service_id_foreign` (`service_id`);

--
-- Chỉ mục cho bảng `vnt_keyworks`
--
ALTER TABLE `vnt_keyworks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vnt_likes`
--
ALTER TABLE `vnt_likes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_likes_user_id_foreign` (`user_id`),
  ADD KEY `vnt_likes_service_id_foreign` (`service_id`);

--
-- Chỉ mục cho bảng `vnt_persional_users`
--
ALTER TABLE `vnt_persional_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_persional_users_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `vnt_province_city`
--
ALTER TABLE `vnt_province_city`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vnt_services`
--
ALTER TABLE `vnt_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_services_tourist_places_id_foreign` (`tourist_places_id`);

--
-- Chỉ mục cho bảng `vnt_service_ketwork`
--
ALTER TABLE `vnt_service_ketwork`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_service_ketwork_service_id_foreign` (`service_id`),
  ADD KEY `vnt_service_ketwork_keywork_id_foreign` (`keywork_id`);

--
-- Chỉ mục cho bảng `vnt_sightseeing`
--
ALTER TABLE `vnt_sightseeing`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_sightseeing_service_id_foreign` (`service_id`);

--
-- Chỉ mục cho bảng `vnt_tourist_places`
--
ALTER TABLE `vnt_tourist_places`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_tourist_places_id_ward_foreign` (`id_ward`),
  ADD KEY `vnt_tourist_places_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `vnt_transport`
--
ALTER TABLE `vnt_transport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_transport_service_id_foreign` (`service_id`);

--
-- Chỉ mục cho bảng `vnt_types_event`
--
ALTER TABLE `vnt_types_event`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vnt_users`
--
ALTER TABLE `vnt_users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vnt_usersearch`
--
ALTER TABLE `vnt_usersearch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_usersearch_id_users_foreign` (`id_users`),
  ADD KEY `vnt_usersearch_id_service_foreign` (`id_service`);

--
-- Chỉ mục cho bảng `vnt_visitor_ratings`
--
ALTER TABLE `vnt_visitor_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_visitor_ratings_user_id_foreign` (`user_id`),
  ADD KEY `vnt_visitor_ratings_service_id_foreign` (`service_id`);

--
-- Chỉ mục cho bảng `vnt_ward`
--
ALTER TABLE `vnt_ward`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_ward_district_id_foreign` (`district_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=261;

--
-- AUTO_INCREMENT cho bảng `vnt_district`
--
ALTER TABLE `vnt_district`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vnt_eating`
--
ALTER TABLE `vnt_eating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `vnt_enterprise_users`
--
ALTER TABLE `vnt_enterprise_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_entertaiments`
--
ALTER TABLE `vnt_entertaiments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_events`
--
ALTER TABLE `vnt_events`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_hotels`
--
ALTER TABLE `vnt_hotels`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vnt_images`
--
ALTER TABLE `vnt_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `vnt_keyworks`
--
ALTER TABLE `vnt_keyworks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_likes`
--
ALTER TABLE `vnt_likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vnt_persional_users`
--
ALTER TABLE `vnt_persional_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_province_city`
--
ALTER TABLE `vnt_province_city`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `vnt_services`
--
ALTER TABLE `vnt_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `vnt_service_ketwork`
--
ALTER TABLE `vnt_service_ketwork`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_sightseeing`
--
ALTER TABLE `vnt_sightseeing`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_tourist_places`
--
ALTER TABLE `vnt_tourist_places`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `vnt_transport`
--
ALTER TABLE `vnt_transport`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_types_event`
--
ALTER TABLE `vnt_types_event`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_users`
--
ALTER TABLE `vnt_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `vnt_usersearch`
--
ALTER TABLE `vnt_usersearch`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `vnt_visitor_ratings`
--
ALTER TABLE `vnt_visitor_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_ward`
--
ALTER TABLE `vnt_ward`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `vnt_district`
--
ALTER TABLE `vnt_district`
  ADD CONSTRAINT `vnt_district_province_city_id_foreign` FOREIGN KEY (`province_city_id`) REFERENCES `vnt_province_city` (`id`);

--
-- Các ràng buộc cho bảng `vnt_eating`
--
ALTER TABLE `vnt_eating`
  ADD CONSTRAINT `vnt_eating_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`);

--
-- Các ràng buộc cho bảng `vnt_enterprise_users`
--
ALTER TABLE `vnt_enterprise_users`
  ADD CONSTRAINT `vnt_enterprise_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `vnt_users` (`id`);

--
-- Các ràng buộc cho bảng `vnt_entertaiments`
--
ALTER TABLE `vnt_entertaiments`
  ADD CONSTRAINT `vnt_entertaiments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`);

--
-- Các ràng buộc cho bảng `vnt_events`
--
ALTER TABLE `vnt_events`
  ADD CONSTRAINT `vnt_events_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`),
  ADD CONSTRAINT `vnt_events_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `vnt_types_event` (`id`);

--
-- Các ràng buộc cho bảng `vnt_hotels`
--
ALTER TABLE `vnt_hotels`
  ADD CONSTRAINT `vnt_hotels_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`);

--
-- Các ràng buộc cho bảng `vnt_images`
--
ALTER TABLE `vnt_images`
  ADD CONSTRAINT `vnt_images_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`);

--
-- Các ràng buộc cho bảng `vnt_likes`
--
ALTER TABLE `vnt_likes`
  ADD CONSTRAINT `vnt_likes_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`),
  ADD CONSTRAINT `vnt_likes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `vnt_users` (`id`);

--
-- Các ràng buộc cho bảng `vnt_persional_users`
--
ALTER TABLE `vnt_persional_users`
  ADD CONSTRAINT `vnt_persional_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `vnt_users` (`id`);

--
-- Các ràng buộc cho bảng `vnt_services`
--
ALTER TABLE `vnt_services`
  ADD CONSTRAINT `vnt_services_tourist_places_id_foreign` FOREIGN KEY (`tourist_places_id`) REFERENCES `vnt_tourist_places` (`id`);

--
-- Các ràng buộc cho bảng `vnt_service_ketwork`
--
ALTER TABLE `vnt_service_ketwork`
  ADD CONSTRAINT `vnt_service_ketwork_keywork_id_foreign` FOREIGN KEY (`keywork_id`) REFERENCES `vnt_keyworks` (`id`),
  ADD CONSTRAINT `vnt_service_ketwork_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`);

--
-- Các ràng buộc cho bảng `vnt_sightseeing`
--
ALTER TABLE `vnt_sightseeing`
  ADD CONSTRAINT `vnt_sightseeing_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`);

--
-- Các ràng buộc cho bảng `vnt_tourist_places`
--
ALTER TABLE `vnt_tourist_places`
  ADD CONSTRAINT `vnt_tourist_places_id_ward_foreign` FOREIGN KEY (`id_ward`) REFERENCES `vnt_ward` (`id`),
  ADD CONSTRAINT `vnt_tourist_places_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `vnt_users` (`id`);

--
-- Các ràng buộc cho bảng `vnt_transport`
--
ALTER TABLE `vnt_transport`
  ADD CONSTRAINT `vnt_transport_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`);

--
-- Các ràng buộc cho bảng `vnt_usersearch`
--
ALTER TABLE `vnt_usersearch`
  ADD CONSTRAINT `vnt_usersearch_id_service_foreign` FOREIGN KEY (`id_service`) REFERENCES `vnt_services` (`id`),
  ADD CONSTRAINT `vnt_usersearch_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `vnt_users` (`id`);

--
-- Các ràng buộc cho bảng `vnt_visitor_ratings`
--
ALTER TABLE `vnt_visitor_ratings`
  ADD CONSTRAINT `vnt_visitor_ratings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`),
  ADD CONSTRAINT `vnt_visitor_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `vnt_users` (`id`);

--
-- Các ràng buộc cho bảng `vnt_ward`
--
ALTER TABLE `vnt_ward`
  ADD CONSTRAINT `vnt_ward_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `vnt_district` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
