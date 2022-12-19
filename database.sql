-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 19, 2022 lúc 05:18 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `air_plane`
--
CREATE DATABASE IF NOT EXISTS `air_plane` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `air_plane`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `destination`
--

CREATE TABLE `destination` (
  `id_des` varchar(50) NOT NULL,
  `name_des` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `destination`
--

INSERT INTO `destination` (`id_des`, `name_des`) VALUES
('DS0001', 'Thành phố Hồ Chí Minh'),
('DS0002', 'Hà Nội'),
('DS0003', 'Đà Nẵng'),
('DS0004', 'Singapore'),
('DS0005', 'Kuala Lumpur - Malaysia'),
('DS0006', 'Phuket - Thái Lan'),
('DS0007', 'Malaysia'),
('DS0008', 'Vinh'),
('DS0009', 'Úc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flight`
--

CREATE TABLE `flight` (
  `flight_id` varchar(50) NOT NULL,
  `airline_id` varchar(50) NOT NULL,
  `airline_name` varchar(50) NOT NULL,
  `from_location` varchar(100) NOT NULL,
  `to_location` varchar(100) NOT NULL,
  `departure_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `duration` time NOT NULL,
  `total_seats` int(11) DEFAULT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `flight`
--

INSERT INTO `flight` (`flight_id`, `airline_id`, `airline_name`, `from_location`, `to_location`, `departure_time`, `arrival_time`, `duration`, `total_seats`, `price`) VALUES
('PT0001', 'AL0001', 'VietNam AirLine', 'Hà Nội', 'Thành phố Hồ Chí Minh', '2023-01-13 05:00:00', '2023-01-13 09:00:00', '04:00:00', 50, 3000000),
('PT0002', 'AL0001', 'VietNam AirLine', 'Thành phố Hồ Chí Minh', 'Vinh', '2022-12-29 18:00:00', '2022-12-29 21:00:00', '03:00:00', 50, 2000000),
('PT0003', 'AL0001', 'VietNam AirLine', 'Thành phố Hồ Chí Minh', 'Kuala Lumpur - Malaysia', '2022-12-24 10:00:00', '2022-12-24 01:00:00', '15:00:00', 50, 6000000),
('PT0004', 'AL0001', 'VietNam AirLine', 'Thành phố Hồ Chí Minh', 'Phuket - Thái Lan', '2022-12-25 18:07:00', '2022-12-25 22:07:00', '03:00:00', 50, 6000000),
('PT0005', 'AL0001', 'VietNam Airlines', 'Thành phố Hồ Chí Minh', 'Hà Nội', '2022-12-27 06:00:00', '2022-12-27 09:00:00', '03:00:00', 50, 3000000),
('TG0001', 'AL0001', 'VietNam Airlines', 'Thành phố Hồ Chí Minh', 'Đà Nẵng', '2023-01-01 05:00:00', '2023-01-01 10:00:00', '05:00:00', 60, 2000000),
('TG0002', 'AL0001', 'VietNam AirLine', 'Hà Nội', 'Úc', '2022-12-29 05:00:00', '2022-12-29 07:00:00', '02:00:00', 60, 5000000),
('TG0003', 'AL0001', 'VietNam AirLine', 'Thành phố Hồ Chí Minh', 'Singapore', '2023-02-05 14:27:00', '2023-02-05 18:27:00', '04:00:00', 50, 3000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hight_light`
--

CREATE TABLE `hight_light` (
  `id_hight` varchar(50) NOT NULL,
  `flight_name` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hight_light`
--

INSERT INTO `hight_light` (`id_hight`, `flight_name`, `image`, `date`, `description`, `price`) VALUES
('HL0001', 'Hà Nội (HN) đến TP. Hồ Chí Minh (HCM)', 'img1.jpg', '13/01/2023', 'Áp dụng cho tới khi bán hết', '669000'),
('HL0002', 'TP. Hồ Chí Minh (HCM) đến Hà Nội (HN)', 'img2.jpg', '01/02/2023', 'Áp dụng cho tới khi bán hết', '399000'),
('HL0003', 'TP. Hồ Chí Minh (HCM) đến Đà Nẵng (DN)', 'img3.png', '01/01/2023', 'Áp dụng cho tới khi bán hết', '399000'),
('HL0004', 'TP. Hồ Chí Minh (HCM) đến Singapore (SGP)', 'img5.jpg', '05/02/2023', 'Áp dụng cho tới khi bán hết', '1525000'),
('HL0005', 'TP. Hồ Chí Minh (HCM) đến Kuala Lumpur - Malaysia (KL)', 'img6.jpg', '24/12/2022', 'Áp dụng cho tới khi bán hết', '1650000'),
('HL0006', 'TP. Hồ Chí Minh (HCM) đến Phuket - Thái Lan(PK)', 'img7.jpg', '25/12/2022', 'Áp dụng cho tới khi bán hết', '1800000'),
('HL0007', 'Hà Nội (HN) đến Penang - Malaysia(PN) ', 'img8.jpg', '29/01/2023', 'Áp dụng cho tới khi bán hết', '1800000'),
('HL0008', 'Tp. Hồ Chí Minh (HCM) đến Vinh (VH) ', 'img9.jpg', '29/12/2022', 'Áp dụng cho tới khi bán hết', '669000'),
('HL0009', 'Hà Nội (HN) đến Sydney - Úc (SYD) ', 'img10.jpg', '29/12/2022', 'Áp dụng cho tới khi bán hết', '5625000 đ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `profile_id` varchar(50) NOT NULL,
  `ticket_id` varchar(50) NOT NULL,
  `flight_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manager_profile`
--

CREATE TABLE `manager_profile` (
  `manager_id` varchar(50) NOT NULL,
  `manager_username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `manager_profile`
--

INSERT INTO `manager_profile` (`manager_id`, `manager_username`, `password`, `firstname`, `lastname`, `gender`, `address`, `phone`, `email`) VALUES
('MN0001', 'admin', '123456', 'Nguyễn', 'Danh', 'male', 'Nguyễn Hữu Thọ, Thành phố Hồ Chí Minh', '0589609376', 'manager@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `passenger_profile`
--

CREATE TABLE `passenger_profile` (
  `profile_id` varchar(50) NOT NULL,
  `passenger_username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `passenger_profile`
--

INSERT INTO `passenger_profile` (`profile_id`, `passenger_username`, `password`, `first_name`, `last_name`, `gender`, `address`, `phone`, `email`) VALUES
('PS0001', 'user', '123456', 'Nguyễn', 'Danh', 'male', '7 Nguyễn hữu Thọ', '0589609376', 'danh@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seat`
--

CREATE TABLE `seat` (
  `seat_id` varchar(10) NOT NULL,
  `flight_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `seat`
--

INSERT INTO `seat` (`seat_id`, `flight_id`) VALUES
('5D', 'PT0001'),
('5E', 'PT0001'),
('5F', 'PT0001'),
('1A', 'TG0003');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `start_place`
--

CREATE TABLE `start_place` (
  `id_start` varchar(50) NOT NULL,
  `name_start` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `start_place`
--

INSERT INTO `start_place` (`id_start`, `name_start`) VALUES
('ST0001', 'Thành phố Hồ Chí Minh'),
('ST0002', 'Hà Nội'),
('ST0003', 'Đà Nẵng'),
('ST0004', 'Singapore'),
('ST0005', 'Kuala Lumpur - Malaysia'),
('ST0006', 'Phuket - Thái Lan'),
('ST0007', 'Malaysia'),
('ST0008', 'Vinh'),
('ST0009', 'Úc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket_info`
--

CREATE TABLE `ticket_info` (
  `ticket_id` varchar(50) NOT NULL,
  `profile_id` varchar(50) NOT NULL,
  `flight_id` varchar(50) NOT NULL,
  `price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id_des`);

--
-- Chỉ mục cho bảng `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_id`);

--
-- Chỉ mục cho bảng `hight_light`
--
ALTER TABLE `hight_light`
  ADD PRIMARY KEY (`id_hight`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD KEY `flight_id` (`flight_id`),
  ADD KEY `profile_id` (`profile_id`),
  ADD KEY `ticket_id` (`ticket_id`);

--
-- Chỉ mục cho bảng `manager_profile`
--
ALTER TABLE `manager_profile`
  ADD PRIMARY KEY (`manager_id`);

--
-- Chỉ mục cho bảng `passenger_profile`
--
ALTER TABLE `passenger_profile`
  ADD PRIMARY KEY (`profile_id`);

--
-- Chỉ mục cho bảng `seat`
--
ALTER TABLE `seat`
  ADD KEY `flight_id` (`flight_id`);

--
-- Chỉ mục cho bảng `start_place`
--
ALTER TABLE `start_place`
  ADD PRIMARY KEY (`id_start`);

--
-- Chỉ mục cho bảng `ticket_info`
--
ALTER TABLE `ticket_info`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `passenger_profile` (`profile_id`),
  ADD CONSTRAINT `history_ibfk_3` FOREIGN KEY (`ticket_id`) REFERENCES `ticket_info` (`ticket_id`);

--
-- Các ràng buộc cho bảng `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
