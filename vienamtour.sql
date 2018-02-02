-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 02, 2018 lúc 12:20 PM
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
-- Cơ sở dữ liệu: `vienamtour`
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
(89, '2014_10_12_100000_create_password_resets_table', 1),
(90, '2018_01_28_155733_create_users_group_table', 1),
(91, '2018_01_28_160046_create_users_table', 1),
(92, '2018_01_31_223327_create_enterprise_users_table', 1),
(93, '2018_01_31_224028_create_persional_users_table', 1),
(94, '2018_01_31_224714_create_tourist_places_table', 1),
(95, '2018_02_01_104809_create_services_table', 1),
(96, '2018_02_01_105209_create_likes_table', 1),
(97, '2018_02_01_105431_create_visitor_ratings_table', 1),
(98, '2018_02_01_110443_create_keyworks_table', 1),
(99, '2018_02_01_110741_create_service_ketwork', 1),
(100, '2018_02_01_110947_create_images_table', 1),
(101, '2018_02_01_111453_create_types_event_ketwork', 1),
(102, '2018_02_01_111605_create_events_table', 1),
(103, '2018_02_01_112732_create_eating_table', 1),
(104, '2018_02_01_113545_create_sightseeing_table', 1),
(105, '2018_02_01_115729_create_transport_table', 1),
(106, '2018_02_01_115901_create_hotels_table', 1),
(107, '2018_02_01_120151_create_entertainments_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Cấu trúc bảng cho bảng `vnt_entertainments`
--

CREATE TABLE `vnt_entertainments` (
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
  `hotel_website` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `hotel_number_star` int(11) NOT NULL,
  `hotel_status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `service_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_service_keywork`
--

CREATE TABLE `vnt_service_keywork` (
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
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Cấu trúc bảng cho bảng `vnt_types`
--

CREATE TABLE `vnt_types` (
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
  `user_status` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `user_groups_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vnt_user_groups`
--

CREATE TABLE `vnt_user_groups` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_groups` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- Chỉ mục cho bảng `vnt_entertainments`
--
ALTER TABLE `vnt_entertainments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_entertainments_service_id_foreign` (`service_id`);

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
-- Chỉ mục cho bảng `vnt_services`
--
ALTER TABLE `vnt_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_services_tourist_places_id_foreign` (`tourist_places_id`);

--
-- Chỉ mục cho bảng `vnt_service_keywork`
--
ALTER TABLE `vnt_service_keywork`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_service_keywork_service_id_foreign` (`service_id`),
  ADD KEY `vnt_service_keywork_keywork_id_foreign` (`keywork_id`);

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
  ADD KEY `vnt_tourist_places_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `vnt_transport`
--
ALTER TABLE `vnt_transport`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_transport_service_id_foreign` (`service_id`);

--
-- Chỉ mục cho bảng `vnt_types`
--
ALTER TABLE `vnt_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vnt_users`
--
ALTER TABLE `vnt_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_users_user_groups_id_foreign` (`user_groups_id`);

--
-- Chỉ mục cho bảng `vnt_user_groups`
--
ALTER TABLE `vnt_user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `vnt_visitor_ratings`
--
ALTER TABLE `vnt_visitor_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vnt_visitor_ratings_user_id_foreign` (`user_id`),
  ADD KEY `vnt_visitor_ratings_service_id_foreign` (`service_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT cho bảng `vnt_eating`
--
ALTER TABLE `vnt_eating`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_enterprise_users`
--
ALTER TABLE `vnt_enterprise_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_entertainments`
--
ALTER TABLE `vnt_entertainments`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_images`
--
ALTER TABLE `vnt_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_keyworks`
--
ALTER TABLE `vnt_keyworks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_likes`
--
ALTER TABLE `vnt_likes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_persional_users`
--
ALTER TABLE `vnt_persional_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_services`
--
ALTER TABLE `vnt_services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_service_keywork`
--
ALTER TABLE `vnt_service_keywork`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_transport`
--
ALTER TABLE `vnt_transport`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_types`
--
ALTER TABLE `vnt_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_users`
--
ALTER TABLE `vnt_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_user_groups`
--
ALTER TABLE `vnt_user_groups`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `vnt_visitor_ratings`
--
ALTER TABLE `vnt_visitor_ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

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
-- Các ràng buộc cho bảng `vnt_entertainments`
--
ALTER TABLE `vnt_entertainments`
  ADD CONSTRAINT `vnt_entertainments_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`);

--
-- Các ràng buộc cho bảng `vnt_events`
--
ALTER TABLE `vnt_events`
  ADD CONSTRAINT `vnt_events_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`),
  ADD CONSTRAINT `vnt_events_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `vnt_types` (`id`);

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
-- Các ràng buộc cho bảng `vnt_service_keywork`
--
ALTER TABLE `vnt_service_keywork`
  ADD CONSTRAINT `vnt_service_keywork_keywork_id_foreign` FOREIGN KEY (`keywork_id`) REFERENCES `vnt_keyworks` (`id`),
  ADD CONSTRAINT `vnt_service_keywork_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`);

--
-- Các ràng buộc cho bảng `vnt_sightseeing`
--
ALTER TABLE `vnt_sightseeing`
  ADD CONSTRAINT `vnt_sightseeing_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`);

--
-- Các ràng buộc cho bảng `vnt_tourist_places`
--
ALTER TABLE `vnt_tourist_places`
  ADD CONSTRAINT `vnt_tourist_places_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `vnt_users` (`id`);

--
-- Các ràng buộc cho bảng `vnt_transport`
--
ALTER TABLE `vnt_transport`
  ADD CONSTRAINT `vnt_transport_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`);

--
-- Các ràng buộc cho bảng `vnt_users`
--
ALTER TABLE `vnt_users`
  ADD CONSTRAINT `vnt_users_user_groups_id_foreign` FOREIGN KEY (`user_groups_id`) REFERENCES `vnt_user_groups` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `vnt_visitor_ratings`
--
ALTER TABLE `vnt_visitor_ratings`
  ADD CONSTRAINT `vnt_visitor_ratings_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `vnt_services` (`id`),
  ADD CONSTRAINT `vnt_visitor_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `vnt_users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
