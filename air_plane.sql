-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 25, 2022 lúc 01:08 PM
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flight`
--

CREATE TABLE `flight` (
  `flight_id` varchar(50) NOT NULL,
  `airline_id` varchar(50) NOT NULL,
  `airline_name` varchar(50) NOT NULL,
  `form_location` varchar(100) NOT NULL,
  `to_location` varchar(100) NOT NULL,
  `departure_time` datetime NOT NULL,
  `arrival_time` datetime NOT NULL,
  `duration` time NOT NULL,
  `total_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `flight_detail`
--

CREATE TABLE `flight_detail` (
  `flight_id` varchar(50) NOT NULL,
  `flight_departure_date` datetime NOT NULL,
  `price` int(11) NOT NULL,
  `available_seats` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket_info`
--

CREATE TABLE `ticket_info` (
  `ticket_id` varchar(50) NOT NULL,
  `profile_id` varchar(50) NOT NULL,
  `flight_id` varchar(50) NOT NULL,
  `flight_departure_date` datetime NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`flight_id`);

--
-- Chỉ mục cho bảng `flight_detail`
--
ALTER TABLE `flight_detail`
  ADD PRIMARY KEY (`flight_departure_date`),
  ADD KEY `flight_id` (`flight_id`);

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
-- Chỉ mục cho bảng `ticket_info`
--
ALTER TABLE `ticket_info`
  ADD PRIMARY KEY (`ticket_id`),
  ADD UNIQUE KEY `flight_departure_date` (`flight_departure_date`),
  ADD UNIQUE KEY `profile_id` (`profile_id`),
  ADD UNIQUE KEY `flight_id` (`flight_id`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `flight_detail`
--
ALTER TABLE `flight_detail`
  ADD CONSTRAINT `flight_detail_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`);

--
-- Các ràng buộc cho bảng `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`),
  ADD CONSTRAINT `history_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `passenger_profile` (`profile_id`),
  ADD CONSTRAINT `history_ibfk_3` FOREIGN KEY (`ticket_id`) REFERENCES `ticket_info` (`ticket_id`);

--
-- Các ràng buộc cho bảng `ticket_info`
--
ALTER TABLE `ticket_info`
  ADD CONSTRAINT `ticket_info_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `passenger_profile` (`profile_id`),
  ADD CONSTRAINT `ticket_info_ibfk_2` FOREIGN KEY (`flight_id`) REFERENCES `flight_detail` (`flight_id`),
  ADD CONSTRAINT `ticket_info_ibfk_3` FOREIGN KEY (`flight_id`) REFERENCES `flight` (`flight_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
