-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 20, 2024 at 05:59 PM
-- Server version: 8.0.35
-- PHP Version: 8.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodsandrecipes`
--

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `FoodID` int NOT NULL,
  `Photo` varchar(300) DEFAULT NULL,
  `FoodName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`FoodID`, `Photo`, `FoodName`) VALUES
(1, 'foodsimg\\apple.png', 'Apple'),
(2, 'foodsimg\\banana.png', 'Banana'),
(4, 'foodsimg\\milk.png', 'Cow Milk'),
(5, 'foodsimg\\honey.png', 'Honey'),
(6, 'foodsimg\\cinnamon.png', 'Cinnamon'),
(7, 'foodsimg\\salt.png', 'Salt'),
(8, 'foodsimg\\peanutbutter.png', 'PeanutButter'),
(9, 'foodsimg\\oats.png', 'Oats'),
(10, 'foodsimg/blackpepper.png', 'Black Pepper'),
(11, 'foodsimg/65a2b10a864b8-egg.png', 'Egg'),
(12, 'foodsimg/65a2c04522758-eggwhite.png', 'Egg White'),
(13, 'foodsimg/65a4200561d7f-eggwhite.png', 'Egg Yolk'),
(14, 'foodsimg/65a55dffd1f95-cannedcorn.png', 'Canned Corn'),
(15, 'foodsimg/65a55ec0c4cfd-pep.png', 'Pepper'),
(16, 'foodsimg/65a55f023fe80-tomato.png', 'Tomato'),
(17, 'foodsimg/65a55f334d79d-tuna.png', 'Canned Tuna'),
(18, 'foodsimg/65a55f7e03d17-arugula.png', 'Arugula'),
(19, 'foodsimg/65a925d2a5447-arugula.png', 'castravete');

-- --------------------------------------------------------

--
-- Table structure for table `nutritionalvaluesper100grams`
--

CREATE TABLE `nutritionalvaluesper100grams` (
  `NutritionalValueID` int NOT NULL,
  `FoodID` int DEFAULT NULL,
  `Calories` decimal(10,2) NOT NULL,
  `Protein` decimal(10,2) NOT NULL,
  `Carbs` decimal(10,2) NOT NULL,
  `Fat` decimal(10,2) NOT NULL,
  `Fiber` decimal(10,2) NOT NULL,
  `Sugar` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `nutritionalvaluesper100grams`
--

INSERT INTO `nutritionalvaluesper100grams` (`NutritionalValueID`, `FoodID`, `Calories`, `Protein`, `Carbs`, `Fat`, `Fiber`, `Sugar`) VALUES
(1, 12, '52.00', '11.00', '1.00', '0.20', '0.00', '0.60'),
(12, 1, '52.00', '0.30', '14.00', '0.20', '2.40', '10.00'),
(13, 2, '89.00', '1.10', '23.00', '0.30', '2.60', '12.00'),
(14, 4, '61.00', '3.20', '4.80', '3.30', '0.00', '5.10'),
(15, 5, '304.00', '0.30', '82.40', '0.00', '0.20', '82.10'),
(16, 6, '247.00', '3.90', '80.60', '1.20', '53.10', '2.20'),
(17, 7, '0.00', '0.00', '0.00', '0.00', '0.00', '0.00'),
(18, 8, '588.00', '25.10', '21.10', '50.00', '6.00', '9.20'),
(19, 9, '389.00', '16.90', '66.30', '6.90', '10.60', '0.80'),
(20, 10, '255.00', '10.40', '64.80', '3.30', '25.30', '0.60'),
(21, 11, '143.00', '13.00', '1.10', '9.50', '0.00', '1.10'),
(22, 13, '78.00', '4.00', '89.00', '8.00', '5.00', '4.00'),
(23, 14, '46.90', '16.00', '8.60', '0.90', '1.40', '3.10'),
(24, 15, '16.90', '0.60', '3.90', '0.20', '0.20', '2.70'),
(25, 16, '21.90', '1.10', '3.30', '0.20', '1.50', '3.20'),
(26, 17, '118.80', '17.50', '0.00', '4.90', '0.00', '0.00'),
(27, 18, '25.00', '2.60', '2.00', '0.70', '1.60', '2.00'),
(28, 19, '45.00', '78.00', '90.00', '89.00', '56.00', '12.00');

-- --------------------------------------------------------

--
-- Table structure for table `recipeingredients`
--

CREATE TABLE `recipeingredients` (
  `RecipeIngredientID` int NOT NULL,
  `RecipeID` int DEFAULT NULL,
  `FoodID` int DEFAULT NULL,
  `QuantityInGrams` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recipeingredients`
--

INSERT INTO `recipeingredients` (`RecipeIngredientID`, `RecipeID`, `FoodID`, `QuantityInGrams`) VALUES
(4, 5, 4, '150.00'),
(5, 5, 2, '100.00'),
(6, 5, 9, '150.00'),
(7, 5, 8, '20.00'),
(8, 5, 5, '15.00'),
(9, 5, 7, '3.00'),
(10, 5, 6, '5.00'),
(11, 6, 11, '50.00'),
(12, 6, 18, '150.00'),
(13, 6, 17, '80.00'),
(14, 6, 16, '150.00'),
(15, 6, 15, '150.00'),
(16, 6, 14, '70.00');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `RecipeID` int NOT NULL,
  `UserID` int DEFAULT NULL,
  `RecipeName` varchar(255) NOT NULL,
  `Description` text,
  `PreparationInstructions` text,
  `Photo` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `recipes`
--

INSERT INTO `recipes` (`RecipeID`, `UserID`, `RecipeName`, `Description`, `PreparationInstructions`, `Photo`) VALUES
(5, 5, 'Porridge with Peanut Butter ', 'A delightful breakfast option for those who want something fast and filling ', 'You start by mashing the banana and then you need to take a pot and add all the ingredients in the (the order doesn\'t matter) and then you need to let it boil for about 5 minutes. Enjoy!', 'recipesimg/porridge.png'),
(6, 5, 'Salad alla Tudor', 'This is a lightweight salad, fresh and high in protein', 'All you have to do is cut all the ingredients and add them together in a bowl! Fresh and healthy!', 'recipesimg/salad.png');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `ReviewID` int NOT NULL,
  `RecipeID` int DEFAULT NULL,
  `UserID` int DEFAULT NULL,
  `Rating` int NOT NULL,
  `Comment` text,
  `Timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `Username`, `Email`, `Password`) VALUES
(4, 'Catalin Feier', 'cata@yahoo.com', '$2y$10$xzGxEGkhnkvAoJFkWUn6sOr2fw34TA/541cgL/R7vvyuUCU9soToW'),
(5, 'Nora', 'norica@yagoo.com', '$2y$10$ucdDgQwZEi4EW2bDoFqC3eIH5JkOMr1OusaQAPLicLGGCTlpGCYHa'),
(6, 'Tudor', 'tudor.tudor@yahho.com', '$2y$10$vG.UvvgQ//2wGPjzrQiocOwO8kggRHxi2NeIlVM3UjOIqOBexcPN.'),
(7, 'Calin', 'calin.teac@yahoo.com', '$2y$10$8PdVBqoRv2JQuqTF2rhZY.7e41GkPhfV5Pc2hWkM9U7epWv7jfIie'),
(8, 'Gabi Nico', 'gabi.nico@yahoo.com', '$2y$10$OXVGKlFEHBhcjK0gLqFPqeVC3JeZmKXkGaE0n6aIqCmsPcJINvEFG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`FoodID`);

--
-- Indexes for table `nutritionalvaluesper100grams`
--
ALTER TABLE `nutritionalvaluesper100grams`
  ADD PRIMARY KEY (`NutritionalValueID`),
  ADD KEY `FoodID` (`FoodID`);

--
-- Indexes for table `recipeingredients`
--
ALTER TABLE `recipeingredients`
  ADD PRIMARY KEY (`RecipeIngredientID`),
  ADD KEY `RecipeID` (`RecipeID`),
  ADD KEY `FoodID` (`FoodID`);

--
-- Indexes for table `recipes`
--
ALTER TABLE `recipes`
  ADD PRIMARY KEY (`RecipeID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `RecipeID` (`RecipeID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `FoodID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nutritionalvaluesper100grams`
--
ALTER TABLE `nutritionalvaluesper100grams`
  MODIFY `NutritionalValueID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `recipeingredients`
--
ALTER TABLE `recipeingredients`
  MODIFY `RecipeIngredientID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `recipes`
--
ALTER TABLE `recipes`
  MODIFY `RecipeID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `ReviewID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `nutritionalvaluesper100grams`
--
ALTER TABLE `nutritionalvaluesper100grams`
  ADD CONSTRAINT `nutritionalvaluesper100grams_ibfk_1` FOREIGN KEY (`FoodID`) REFERENCES `foods` (`FoodID`);

--
-- Constraints for table `recipeingredients`
--
ALTER TABLE `recipeingredients`
  ADD CONSTRAINT `recipeingredients_ibfk_1` FOREIGN KEY (`RecipeID`) REFERENCES `recipes` (`RecipeID`),
  ADD CONSTRAINT `recipeingredients_ibfk_2` FOREIGN KEY (`FoodID`) REFERENCES `foods` (`FoodID`);

--
-- Constraints for table `recipes`
--
ALTER TABLE `recipes`
  ADD CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`RecipeID`) REFERENCES `recipes` (`RecipeID`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
