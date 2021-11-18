CREATE DATABASE if not EXISTS DFPTDUAN;
use DFPTDUAN;

create table if not exists tblUsers(
    id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    hash_password varchar(60) not null,
    email varchar(255) not null UNIQUE
);

create table if not exists tblPasswordResets(
    id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    token varchar(255) not null UNIQUE,
    email varchar(255) not null,
    created datetime not null DEFAULT now(),
    available bit not null DEFAULT 1
);

create table if not exists tblCategories(
    id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) not null DEFAULT ''
);

create table if not exists tblProducts(
    id int(11) not null AUTO_INCREMENT PRIMARY KEY,
    name varchar(255) not null DEFAULT '',
    price decimal(5,2) not null,
    quantity int(11) not null DEFAULT 0,
    image_url varchar(255) not null DEFAULT '',
    category_id int(11) not null,
    FOREIGN key (category_id) REFERENCES tblCategories(id)
);

INSERT into tblusers(email, hash_password) values('test@gmail.com', '$2y$10$m/1m0dr7Z4hwUBhI.ihAOeS/AkzbFTjTgBwU9wj1oy3q.fkZGxT6m');

INSERT into tblCategories(name) VALUES ('Mobile'), ('Laptop'), ('Desktop'),('Accessories');



----------------------------------------------------------------
--bản admin
-- Cơ sở dữ liệu: `php1fpt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(5) NOT NULL,
  `brand_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`) VALUES
(1, 'Asus'),
(2, 'Lenovo'),
(3, 'HP'),
(4, 'Dell');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `prd_id` int(5) NOT NULL,
  `prd_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`prd_id`, `prd_name`, `image`, `price`, `quantity`, `description`, `brand_id`) VALUES
(1, 'Laptop Acer Nitro 5 Gaming AN515 57 5831 i5 11400H/8GB/512GB/6GB RTX3060/144Hz/Win10 (NH.QDGSV.003) ', 'backgroud1.jpg', 123123123, 1, 'sadas', 1),
(43, 'khang', '', 123, 123, '123', 1),
(44, '123', '', 123, 123, '123', 2),
(45, 'Laptop Acer Nitro 5 Gaming AN515 57 5831 i5 11400H/8GB/512GB/6GB RTX3060/144Hz/Win10 (NH.QDGSV.003) ', 'backgroud1.jpg', 123123123, 1, 'sadas', 1),
(46, 'Laptop Acer Nitro 5 Gaming AN515 57 5831 i5 11400H/8GB/512GB/6GB RTX3060/144Hz/Win10 (NH.QDGSV.003) ', 'backgroud1.jpg', 123123123, 1, 'sadas', 1),
(47, 'Laptop Acer Nitro 5 Gaming AN515 57 5831 i5 11400H/8GB/512GB/6GB RTX3060/144Hz/Win10 (NH.QDGSV.003) ', 'backgroud1.jpg', 123123123, 1, 'sadas', 1),
(48, 'Laptop Acer Nitro 5 Gaming AN515 57 5831 i5 11400H/8GB/512GB/6GB RTX3060/144Hz/Win10 (NH.QDGSV.003) ', 'backgroud1.jpg', 123123123, 1, 'sadas', 1),
(49, 'Laptop Acer Nitro 5 Gaming AN515 57 5831 i5 11400H/8GB/512GB/6GB RTX3060/144Hz/Win10 (NH.QDGSV.003) ', 'backgroud1.jpg', 123123123, 1, 'sadas', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(0, 'aa', 'd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'aa', 'd2222@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'aa123123213', 'd22222222@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(5, 'aa123123213qưeqw', 'd22222222@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(6, 'aa123123213qưeqw123123123', 'd22222222@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(7, 'van Teo', 'd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(8, 'van Teo dd', 'd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prd_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `prd_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;





