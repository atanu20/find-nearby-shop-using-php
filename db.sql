CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `shop_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `shop_id`, `product_name`, `image`, `price`) VALUES
(1, 1, 'Product1', 'img1.jpg', 100),
(2, 1, 'Product2', 'img2.jpg', 200),
(3, 1, 'Product3', 'img3.jpg', 320),
(4, 2, 'Product4', 'img4.jpg', 125),
(5, 2, 'Product5', 'img5.jpg', 325),
(6, 2, 'Product6', 'img6.jpg', 410);

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `latitude` float(10,6) NOT NULL,
  `longitude` float(10,6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `shop_name`, `latitude`, `longitude`) VALUES
(1, 'Greater Noida Sector 110', 28.443451, 77.466942),
(2, 'Noida Sector 18', 28.559120, 77.361427);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
