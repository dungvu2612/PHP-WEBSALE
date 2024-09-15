-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th3 02, 2024 lúc 08:11 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `Projectweb1633`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, 'Tiểu thuyết', '2024-03-02', '2024-03-02'),
(5, 'Truyện cười', '2024-03-02', '2024-03-02'),
(6, 'Truyện ngôn tình', '2024-03-02', '2024-03-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `date_time`, `id_user`) VALUES
(5, '2024-03-02 08:03:49', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `num` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id`, `id_order`, `id_product`, `num`) VALUES
(8, 5, 18, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `content` varchar(500) NOT NULL,
  `id_category` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `price`, `title`, `thumbnail`, `content`, `id_category`, `created_at`, `updated_at`) VALUES
(18, 60000, ' Ghi Chép Pháp Y', 'https://cdn0.fahasa.com/media/catalog/product/b/_/b_a-tr_c-gcpy-2-1.jpg', 'Nếu kẻ thủ ác dùng cái chết để khiến một người im lặng, thì bác sĩ pháp y sẽ giúp nạn nhân “mở miệng” thông qua những mật mã để lại trên thi thể.\r\n\r\n', 4, '2024-03-02', '2024-03-02'),
(19, 99000, 'Đám Trẻ Ở Đại Dương Đen', 'https://cdn0.fahasa.com/media/catalog/product/8/9/8935325011559.jpg', 'Giá sản phẩm trên Fahasa.com đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như Phụ phí đóng gói, phí vận chuyển, phụ phí hàng cồng kềnh,...\r\n', 5, '2024-03-02', '2024-03-02'),
(20, 77000, 'Tuổi Trẻ Đâu Có Gì Để Buồn', 'https://cdn0.fahasa.com/media/catalog/product/b/i/bia_tuoi-tre-dau-co-gi-de-buon.jpg', 'Giá sản phẩm trên Fahasa.com đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như Phụ phí đóng gói, phí vận chuyển, phụ phí hàng cồng kềnh,...\r\n', 6, '2024-03-02', '2024-03-02'),
(21, 88000, 'Hãy Là Tất Cả, Hoặc Không Là Gì', 'https://cdn0.fahasa.com/media/catalog/product/b/_/b_a-hltchklg.jpg', '| Xu | - Tác giả trẻ sở hữu Fanpage hơn 1,1 triệu follow với những thông điệp truyền cảm hứng sống cho mọi người, lan tỏa yêu thương đến cộng đồng. Những dòng tâm tình đầy ấm áp, chữa lành tâm hồn của những người đang trên hành trình xây dựng tuổi trẻ rực rỡ của mình.', 5, '2024-03-02', '2024-03-02');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_db`
--

CREATE TABLE `user_db` (
  `id` int(11) NOT NULL,
  `uname` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `pass` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `user_db`
--

INSERT INTO `user_db` (`id`, `uname`, `email`, `pass`) VALUES
(4, 'dung@gmail.com', 'dung@gmail.com', 'ddad182f52c2d7cf1d3a28ef805e33e1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `user_db`
--
ALTER TABLE `user_db`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
