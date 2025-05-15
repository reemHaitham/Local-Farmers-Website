CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `rating` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Sample data
INSERT INTO `reviews` (`name`, `text`, `rating`, `date`) VALUES
('Zainab Salim', 'Amazing produce, always fresh and delivered on time!', 'Excellent', NOW()),
('Ali Abdullah', 'The eggs from Sunny Acres are the best I''ve ever had!', 'Good', NOW()),
('Kothar Ahmed', 'Great experience! Will definitely buy again.', 'Excellent', NOW());