-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2024 at 09:30 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `compsys`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
`cust_id` int(11) NOT NULL,
  `nom_entreprise` char(50) NOT NULL,
  `adresse` char(50) NOT NULL,
  `number_register` char(40) NOT NULL,
  `nom_contact` char(40) NOT NULL DEFAULT '',
  `tel` int(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--
-- Insérer des enregistrements dans la table customers
INSERT INTO `customers` (`cust_id`, `nom_entreprise`, `adresse`, `number_register`, `nom_contact`, `tel`) VALUES
(1, 'Tech Solutions', '123 Tech Street', '1234567890', 'John Doe', 123456789),
(2, 'Computer Services', '456 Comp Avenue', '1234567890', 'Jane Smith', 234567890),
(3, 'IT Experts', '789 IT Blvd', '1234567890', 'Alice Brown', 345678901),
(4, 'Gadget Fix', '101 Gadget Road', '1234567890', 'Bob White', 456789012),
(5, 'Repair Hub', '202 Repair Lane', '1234567890', 'Charlie Green', 567890123),
(6, 'Tech Repairs', '303 Tech Place', '1234567890', 'David Black', 678901234),
(7, 'Quick Fix', '404 Quick Street', '1234567890', 'Eve Blue', 789012345),
(8, 'Device Doctors', '505 Device Drive', '1234567890', 'Frank Yellow', 890123456),
(9, 'Computer Clinic', '606 Comp Court', '1234567890', 'Grace Purple', 901234567),
(10, 'Laptop Lab', '707 Laptop Avenue', '1234567890', 'Hank Orange', 123456789);






-- --------------------------------------------------------

--
-- Stand-in structure for view `monthlyrepairs`
--
CREATE TABLE IF NOT EXISTS `monthlyrepairs` (
`status` enum('New','In Progress','Resolved','Waiting for Parts','Waiting for Customer','Validated','Invoiced','Estimate Assigned')
,`total` bigint(21)
);
-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE IF NOT EXISTS `orderitems` (
`ordItems_id` int(11) NOT NULL,
  `ord_id` int(11) NOT NULL,
  `stock_id` int(11) NOT NULL DEFAULT '0',
  `quatity` int(11) DEFAULT NULL,
  `total` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
`ord_id` int(11) NOT NULL,
  `rep_id` int(11) NOT NULL DEFAULT '0',
  `staf_id` int(11) NOT NULL DEFAULT '0',
  `ordate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `repairs`
--

CREATE TABLE IF NOT EXISTS `repairs` (
  `rep_id` int(11) NOT NULL,
  `cust_id` int(11) ,
  `staff_id` int(11) NOT NULL,
  `machine_id` varchar(50) NOT NULL,
  `contrat` enum('Oui','Non') NOT NULL,
  `facturer` enum('Oui','Non') NOT NULL,
  `description_P` varchar(1000) NOT NULL,
  `description_R` varchar(1000) NOT NULL,
  `changed_pieces` TEXT DEFAULT NULL,
  `recommended_pieces` TEXT DEFAULT NULL,
  `repairDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `collectionDate` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` enum('New','In Progress','Resolved','Waiting for Parts','Waiting for Customer','Validated','Invoiced','Estimate Assigned') NOT NULL DEFAULT 'New'
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
`staff_id` int(11) NOT NULL,
  `forename` char(25) NOT NULL,
  `surname` char(25) NOT NULL,
  `username` varchar(11) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `town` char(20) DEFAULT NULL,
  `county` char(20) DEFAULT NULL,
  `tel` char(15) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `forename`, `surname`, `username`, `password`, `email`, `town`, `county`, `tel`) VALUES
(1, 'Nazmul', 'Alam', 'admin', 'admin', 'danazzy@live.com', 'Castleisland', 'Kerry', 0833114171),
(2, 'Samina', 'Nazmul Alam', 'Samboo', 'mag1cwand', 'Saminas14@hotmail.com', 'Roscrea', 'Tipperary', 0879820417);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE IF NOT EXISTS `stock` (
`stock_id` int(11) NOT NULL,
  `description` varchar(40) NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` decimal(4,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `description`, `quantity`, `price`) VALUES
(1, 'Labour', 1000, '45.00'),
(2, 'Rush Labour', 500, '75.00'),
(3, 'Printer', 1, '15.00'),
(4, 'Anti-Virus Software', 1, '30.00'),
(5, 'Backup & Restore', 1, '45.00'),
(6, '500GB HDD', 5, '25.99'),
(7, '128GB SSD Drive', 5, '69.99');

-- --------------------------------------------------------
--
-- Table structure for table `machines`
--

CREATE TABLE IF NOT EXISTS `machines` (
  `machine_id` varchar(50) NOT NULL,
  `marque` enum('Canon', 'Océ','autre') NOT NULL,
  `compteur` int(11) NOT NULL DEFAULT 0,
  `type` enum('B&W', 'color') NOT NULL,
  `debit` enum('Haut volume', 'volume moyen','petit volume','presse impression') NOT NULL,
  `contrat` enum('Oui', 'Non') NOT NULL,
  `garantie` enum('Oui', 'Non') NOT NULL,
  `localisation` varchar(100) NOT NULL,
  `cust_id` int(11) 
  
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;



--
-- Structure for view `monthlyrepairs`
--
DROP TABLE IF EXISTS `monthlyrepairs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `monthlyrepairs` AS select `repairs`.`status` AS `status`,count(`repairs`.`status`) AS `total` from `repairs` where (month(`repairs`.`repairDate`) = extract(month from now())) group by `repairs`.`status` order by `repairs`.`repairDate` desc;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
 ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
 ADD PRIMARY KEY (`ordItems_id`,`ord_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
 ADD PRIMARY KEY (`ord_id`,`rep_id`);

--
-- Indexes for table `repairs`
--
ALTER TABLE `repairs`
 ADD PRIMARY KEY (`rep_id`,`cust_id`,`staff_id`), ADD KEY `fk_Repairs_Cust` (`cust_id`), ADD KEY `fk_Repairs_Staff` (`staff_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
 ADD PRIMARY KEY (`staff_id`), ADD UNIQUE KEY `username` (`username`), ADD UNIQUE KEY `password` (`password`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
 ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `machines`
--
ALTER TABLE `machines`
  ADD PRIMARY KEY (`machine_id`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
MODIFY `cust_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
MODIFY `ordItems_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `repairs`
--
ALTER TABLE `repairs`
MODIFY `rep_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--
ALTER TABLE `repairs`
 MODIFY `cust_id` INT NULL;

--
-- Constraints for table `repairs`
--
ALTER TABLE `repairs`
ADD CONSTRAINT `fk_Repairs_Cust` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_id`),
ADD CONSTRAINT `fk_Repairs_Staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`),
ADD CONSTRAINT `fk_Repairs_machine` FOREIGN KEY (`machine_id`) REFERENCES `machines` (`machine_id`) ON DELETE CASCADE;

-- Constraints for table `machines`
--

ALTER TABLE `machines`
ADD CONSTRAINT `fk_Machines_Customers` FOREIGN KEY (`cust_id`) REFERENCES `customers` (`cust_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
