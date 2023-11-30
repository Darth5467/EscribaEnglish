-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2023 at 08:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aprendaenglish`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `first_name`, `last_name`, `username`, `email`, `password`) VALUES
(1, 'Richard', 'David', 'Rgrant', 'Garo@gmail.com', '$2y$10$Fa197m/W.mvumkM0jGkTP.mmiSW7Xg9kOBZN0GTve/Txrr6TtYNvm'),
(9, 'Jack', 'Johnson', 'JJ', 'JJ@gmail.com', '$2y$10$yCgV59UgtnxG2kyilMMhWOyzHH0oRWZ44f40wPzbc94sIjmBQpFhO');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminid` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fgrade`
--

CREATE TABLE `fgrade` (
  `fgradeid` int(11) NOT NULL,
  `input` text NOT NULL,
  `correct_answer` text NOT NULL,
  `fgrade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fgrade`
--

INSERT INTO `fgrade` (`fgradeid`, `input`, `correct_answer`, `fgrade`) VALUES
(1, 'He', 'I', 0),
(2, 'I', 'I', 100),
(3, 'He', 'He', 100),
(4, 'talk', 'walk', 0),
(5, 'storm', 'walk', 0),
(6, 'walk', 'walk', 100),
(7, 'They', 'They', 100);

-- --------------------------------------------------------

--
-- Table structure for table `fillinblanks`
--

CREATE TABLE `fillinblanks` (
  `id` int(11) NOT NULL,
  `question` text NOT NULL,
  `c_answer` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fillinblanks`
--

INSERT INTO `fillinblanks` (`id`, `question`, `c_answer`) VALUES
(1, '_____am going to work', 'I'),
(2, '_____is my brother', 'He'),
(3, 'I am taking the dog for a _______', 'walk'),
(4, 'In order to get in, the door needs to be______', 'open'),
(5, 'I love playing ________games', 'video'),
(7, 'He _______ in the office', 'works'),
(8, 'I eat because I am __________', 'hungry'),
(9, '___________are my friends', 'They'),
(10, '__________ is a dish best served cold', 'Revenge');

-- --------------------------------------------------------

--
-- Table structure for table `mgrade`
--

CREATE TABLE `mgrade` (
  `mgradeid` int(11) NOT NULL,
  `select_opt` varchar(255) NOT NULL,
  `correct_opt` varchar(255) NOT NULL,
  `mgrade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mgrade`
--

INSERT INTO `mgrade` (`mgradeid`, `select_opt`, `correct_opt`, `mgrade`) VALUES
(1, 'Me voy', 'Me voy', 100),
(2, 'Vida', 'Vida', 100),
(3, 'Dog', 'Dog', 100),
(4, 'hungry', '', 0),
(5, 'House', 'House', 100),
(6, 'Me voy', 'Me voy', 100),
(7, 'Size', 'Size', 100),
(8, 'He', 'He', 100),
(9, 'House', 'House', 100),
(10, 'Size', 'Size', 100),
(11, 'Dog', 'Dog', 100),
(12, 'Vida', 'Vida', 20),
(13, 'want', 'want', 20),
(14, 'Dog', 'Dog', 20),
(15, 'He', 'House', 0),
(16, 'House', 'House', 5),
(17, 'He', 'House', 1),
(18, 'Dog', 'Dog', 5),
(19, 'Unlikely', 'Unlikely', 5);

-- --------------------------------------------------------

--
-- Table structure for table `multiplechoice`
--

CREATE TABLE `multiplechoice` (
  `questionid` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `optionA` varchar(255) NOT NULL,
  `optionB` varchar(255) NOT NULL,
  `optionC` varchar(255) NOT NULL,
  `optionD` varchar(255) NOT NULL,
  `right_answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `multiplechoice`
--

INSERT INTO `multiplechoice` (`questionid`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `right_answer`) VALUES
(1, 'The English word for \"Casa\" is', 'House', 'Place', 'Home', 'Checkpoint', 'House'),
(2, 'The English translation of \"I am leaving\" is', 'Estoy llegando', 'Ya llegue', 'Me voy', 'Me fui', 'Me voy'),
(3, 'What is the english word for the animal known as man\'s best friend?', 'Dog', 'Cat', 'Horse', 'Bird', 'Dog'),
(4, 'The Spanish word for \"life\" is', 'Vida', 'Muerte', 'Trabajo', 'Vivienda', 'Vida'),
(5, 'I _____ to swim. The missing verb is', 'charge', 'want', 'paint', 'point', 'want'),
(6, 'We are being defeated by small bears. This situation is __________. Which option is the missing adverb?', 'Unlikely', 'Bad', 'Horrible', 'Weird', 'Unlikely'),
(7, 'Which of the following is a noun?', 'House', 'Left', 'Practically', 'He', 'House'),
(8, 'Which of the following is a pronoun?', 'House', 'Left', 'Practically', 'He', 'He'),
(9, 'When a man is arriving home, he says:', 'Hello', 'Hi', 'I am home', 'I am here', 'I am home'),
(10, 'How can you complete this famous movie phrase: ________ matters not', 'Size', 'Strenght', 'Weakness', 'Weight', 'Size');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `scoreid` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `testid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sentences`
--

CREATE TABLE `sentences` (
  `sentenceid` int(11) NOT NULL,
  `EnglishS` text NOT NULL,
  `SpanishS` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sentences`
--

INSERT INTO `sentences` (`sentenceid`, `EnglishS`, `SpanishS`) VALUES
(1, 'I walk the dog', 'Yo camino al perro.'),
(2, 'I would like to buy a hamburger', 'Quisiera comprar una hamburguesa'),
(3, 'I love videogames', 'Me gustan los videojuegos.'),
(4, 'My friends and I', 'Mis amigos y yo'),
(5, 'There is a ghost in the mansion', 'Hay un fantasma en la mansion'),
(6, 'I am going to see a movie.', 'Voy a ver la pelicula'),
(7, 'I have to learn how to swim', 'Tengo que aprender a como nadar'),
(8, 'Life is hard', 'La vida es dura'),
(9, 'Its complicted', 'Es complicado'),
(10, 'I am here', 'Estoy aqui'),
(11, 'I would like to time tarvel', 'Quisiera viajar en el tiempo'),
(12, 'IT is diffiult', 'IT es dificil'),
(13, 'I have to go to work', 'Tengo que ir al trabajo'),
(14, 'This is unexpected.', 'Esto es inesperado'),
(15, 'I like ice cream', 'Me gusta el helado'),
(16, 'I am looking for gold', 'Hestoy buscando oro'),
(17, 'I have to destroy my creation', 'Tengo que destruir  mi creacion'),
(18, 'This is impossible', 'Esto es imposible'),
(19, 'He is talking', 'El esta hablando.'),
(20, 'She is talking', 'Ella esta hablando');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `testIid` int(11) NOT NULL,
  `mgradeid` int(11) NOT NULL,
  `fgradeid` int(11) NOT NULL,
  `tgradeid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tgrade`
--

CREATE TABLE `tgrade` (
  `tgradeid` int(11) NOT NULL,
  `input` text NOT NULL,
  `correct_text` int(11) NOT NULL,
  `tgrade` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tgrade`
--

INSERT INTO `tgrade` (`tgradeid`, `input`, `correct_text`, `tgrade`) VALUES
(1, 'I am trying to build a giant robot.', 0, 1250),
(2, 'I have so many secrets.', 0, 100),
(3, 'I am trying to build a giant robot.', 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `typing`
--

CREATE TABLE `typing` (
  `textid` int(11) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `typing`
--

INSERT INTO `typing` (`textid`, `text`) VALUES
(1, 'I have seen things, you people would not believe.'),
(2, 'Take me to your leader, earthling.'),
(3, 'I would like to buy some food for my dog.'),
(4, 'I do not see why it has to happen this way.'),
(5, 'I have seen the dark side of the moon.'),
(6, 'Join the revolution, It\'s great.'),
(7, 'I have so many secrets.'),
(8, 'I am trying to build a giant robot.'),
(9, 'What happens in Vegas, stays in vegas'),
(10, 'The power of the sun is too strong.');

-- --------------------------------------------------------

--
-- Table structure for table `words`
--

CREATE TABLE `words` (
  `wordid` int(11) NOT NULL,
  `English` varchar(100) NOT NULL,
  `Spanish` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `words`
--

INSERT INTO `words` (`wordid`, `English`, `Spanish`) VALUES
(1, 'He', 'El'),
(2, 'She', 'Ella'),
(3, 'Dog', 'Perro'),
(4, 'Cat', 'Gato'),
(5, 'Computer', 'Computadora'),
(6, 'To', 'A'),
(7, 'The', 'El'),
(8, 'They', 'Ellos'),
(9, 'Beach', 'Playa'),
(10, 'The', 'La'),
(11, 'Walk', 'Caminar'),
(12, 'Use', 'Usar'),
(13, 'Me', 'Mi'),
(14, 'Will', 'Voluntad'),
(15, 'Like', 'Gustar'),
(16, 'Man', 'Hombre'),
(17, 'Woman', 'Mujer'),
(18, 'Have', 'Tener'),
(19, 'A', 'Un'),
(20, 'Hamburger', 'Hamburguesa'),
(21, 'White', 'Blanco'),
(22, 'Blue', 'Azul'),
(23, 'Glass', 'Vidrio');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminid`);

--
-- Indexes for table `fgrade`
--
ALTER TABLE `fgrade`
  ADD PRIMARY KEY (`fgradeid`);

--
-- Indexes for table `fillinblanks`
--
ALTER TABLE `fillinblanks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mgrade`
--
ALTER TABLE `mgrade`
  ADD PRIMARY KEY (`mgradeid`);

--
-- Indexes for table `multiplechoice`
--
ALTER TABLE `multiplechoice`
  ADD PRIMARY KEY (`questionid`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`scoreid`),
  ADD KEY `id` (`id`,`testid`),
  ADD KEY `Grades` (`testid`);

--
-- Indexes for table `sentences`
--
ALTER TABLE `sentences`
  ADD PRIMARY KEY (`sentenceid`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`testIid`),
  ADD KEY `mgradeid` (`mgradeid`,`fgradeid`,`tgradeid`),
  ADD KEY `gradeF` (`fgradeid`),
  ADD KEY `gradeT` (`tgradeid`);

--
-- Indexes for table `tgrade`
--
ALTER TABLE `tgrade`
  ADD PRIMARY KEY (`tgradeid`);

--
-- Indexes for table `typing`
--
ALTER TABLE `typing`
  ADD PRIMARY KEY (`textid`);

--
-- Indexes for table `words`
--
ALTER TABLE `words`
  ADD PRIMARY KEY (`wordid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fgrade`
--
ALTER TABLE `fgrade`
  MODIFY `fgradeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `fillinblanks`
--
ALTER TABLE `fillinblanks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mgrade`
--
ALTER TABLE `mgrade`
  MODIFY `mgradeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `multiplechoice`
--
ALTER TABLE `multiplechoice`
  MODIFY `questionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `scoreid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `testIid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tgrade`
--
ALTER TABLE `tgrade`
  MODIFY `tgradeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `typing`
--
ALTER TABLE `typing`
  MODIFY `textid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `words`
--
ALTER TABLE `words`
  MODIFY `wordid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `Grades` FOREIGN KEY (`testid`) REFERENCES `tests` (`testIid`),
  ADD CONSTRAINT `Users` FOREIGN KEY (`id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `tests`
--
ALTER TABLE `tests`
  ADD CONSTRAINT `gradeF` FOREIGN KEY (`fgradeid`) REFERENCES `fgrade` (`fgradeid`),
  ADD CONSTRAINT `gradeM` FOREIGN KEY (`mgradeid`) REFERENCES `mgrade` (`mgradeid`),
  ADD CONSTRAINT `gradeT` FOREIGN KEY (`tgradeid`) REFERENCES `tgrade` (`tgradeid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
