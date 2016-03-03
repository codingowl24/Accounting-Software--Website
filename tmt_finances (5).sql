-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2015 at 02:08 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `tmt_finances`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountspayable`
--

CREATE TABLE IF NOT EXISTS `accountspayable` (
  `AccountName` varchar(255) NOT NULL,
  `AccountNumber` varchar(255) NOT NULL,
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL,
  `Balance` float(10,2) NOT NULL,
  `NormalSide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accountsreceivable`
--

CREATE TABLE IF NOT EXISTS `accountsreceivable` (
  `AccountName` varchar(30) NOT NULL,
  `AccountNumber` varchar(16) NOT NULL,
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL,
  `Balance` float(10,2) NOT NULL,
  `NormalSide` enum('L','R') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountsreceivable`
--

INSERT INTO `accountsreceivable` (`AccountName`, `AccountNumber`, `Debit`, `Credit`, `Balance`, `NormalSide`) VALUES
('AccountsReceivable', '', 1500.00, 0.00, 0.00, 'L'),
('AccountsReceivable', '', 100.00, 0.00, 0.00, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `automoblieexpense`
--

CREATE TABLE IF NOT EXISTS `automoblieexpense` (
  `AccountName` varchar(255) NOT NULL,
  `AccountNumber` varchar(255) NOT NULL,
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL,
  `Balance` float(10,2) NOT NULL,
  `NormalSide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `automoblieexpense`
--

INSERT INTO `automoblieexpense` (`AccountName`, `AccountNumber`, `Debit`, `Credit`, `Balance`, `NormalSide`) VALUES
('AutomoblieExpense', '', 0.00, 100.00, 0.00, ''),
('AutomoblieExpense', '', 0.00, 5.00, 0.00, ''),
('AutomoblieExpense', '', 1200.00, 0.00, 0.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE IF NOT EXISTS `buildings` (
  `AccountName` varchar(30) NOT NULL DEFAULT ' ',
  `AccountNumber` varchar(16) NOT NULL DEFAULT '',
  `Debit` float(10,2) NOT NULL DEFAULT '0.00',
  `Credit` float(10,2) NOT NULL DEFAULT '0.00',
  `Balance` float(10,2) NOT NULL DEFAULT '0.00',
  `NormalSide` enum('L','R') NOT NULL DEFAULT 'L'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `capital`
--

CREATE TABLE IF NOT EXISTS `capital` (
  `AccountName` varchar(30) NOT NULL,
  `AccountNumber` varchar(16) NOT NULL,
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL,
  `Balance` float(10,2) NOT NULL,
  `NormalSide` enum('L','R') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cash`
--

CREATE TABLE IF NOT EXISTS `cash` (
  `AccountName` varchar(255) NOT NULL,
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL,
  `Balance` float(10,2) NOT NULL,
  `NormalSide` enum('L','R') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cash`
--

INSERT INTO `cash` (`AccountName`, `Debit`, `Credit`, `Balance`, `NormalSide`) VALUES
('Cash', 10000.00, 0.00, 0.00, 'L'),
('Cash', 0.00, 4500.00, 0.00, 'L'),
('Cash', 222.00, 0.00, 0.00, 'L'),
('Cash', 5.00, 0.00, 0.00, 'L'),
('Cash', 12000.00, 0.00, 0.00, 'L'),
('Cash', 0.00, 1200.00, 0.00, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `charitablecontributions`
--

CREATE TABLE IF NOT EXISTS `charitablecontributions` (
  `AccountName` varchar(255) NOT NULL,
  `AccountNumber` varchar(255) NOT NULL,
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL,
  `Balance` float(10,2) NOT NULL,
  `NormalSide` enum('L','R') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chartofaccounts`
--

CREATE TABLE IF NOT EXISTS `chartofaccounts` (
  `AccountName` varchar(255) NOT NULL,
  `AccountNumber` varchar(16) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `NormalSide` enum('L','R') NOT NULL,
  `Balance` float(10,2) NOT NULL DEFAULT '0.00',
  `Active` int(2) NOT NULL DEFAULT '1',
  `Liquidity` int(11) NOT NULL,
  `Group` varchar(30) NOT NULL,
  `Code` varchar(10) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chartofaccounts`
--

INSERT INTO `chartofaccounts` (`AccountName`, `AccountNumber`, `Type`, `NormalSide`, `Balance`, `Active`, `Liquidity`, `Group`, `Code`, `Description`) VALUES
('Cash', '10023456789', 'Assets', 'L', 16527.00, 1, 1, 'Current Asset', '101', 'Current asset the company owns'),
('Accounts Receivable', '10123456789', 'Assets', 'L', 1600.00, 1, 12, 'Current Asset', '112', 'Invoices the company has issued to the client but had not received in cash yet'),
('Equipment', '10234567849', 'Assets', 'L', 7500.00, 1, 6, 'Fixed Asset', '157', 'Equipment that is owned and controlled by the company'),
('Supplies', '10323456789', 'Assets', 'L', 1028.00, 1, 2, 'Fixed Asset', '605', 'Supplies that are owned and controlled by the company'),
('Land', '10323456791', 'Assets', 'L', 0.00, 1, 3, 'Fixed Asset', '607', 'Real property on which company''s office buildings are located'),
('Buildings', '10323456792', 'Assets', 'L', 0.00, 1, 4, 'Fixed Asset', '608', 'Long-term asset account which shows cost of a building'),
('Machinery', '10323456793', 'Assets', 'L', 0.00, 1, 5, 'Fixed Asset', '609', 'Machinery that is owned and controlled by the company'),
('Notes Payable', '20012345678', 'Liability', 'R', 0.00, 1, 8, 'Current Liability', '200', 'Formal note the company had received from loaners but had not paid yet'),
('Short term Borrowings', '20012345694', 'Liability', 'R', 0.00, 1, 9, 'Current Liability', '215', 'Any debt incurred by a company that is due within a year'),
('Salaries payable', '20012345699', 'Liability', 'R', 0.00, 1, 11, 'Current Liability', '216', 'Salaries owed to employees, which have not been paid yet'),
('Accounts Payable', '20123456789', 'Liability', 'R', 0.00, 1, 10, 'Current Liability', '201', 'Invoices the company had received from suppliers but has not paid yet'),
('Sales Taxes Payable', '20123456791', 'Liability', 'R', 0.00, 1, 10, 'Current Liability', '204', 'Amount of taxes the company owes'),
('Capital', '30023456789', 'OwnerEquity', 'R', 0.00, 0, 16, 'Owner''s Equity', '303', 'Financial value of assets/ Investment in company by its owner'),
('Investments', '30123456789', 'OwnerEquity', 'R', 20250.00, 1, 19, 'Owner‘s Equity', '304', 'Asset/Items purchased to generate income in future'),
('Drawings', '30223456789', 'OwnerEquity', 'L', 0.00, 1, 23, 'Owner''s Equity', '306', 'Money withdrawn from the company by its owners'),
('Professional Fees', '40100234567', 'Revenues', 'R', 12000.00, 1, 28, 'Revenue', '731', 'Fee charged for services from professionals'),
('Equipment Accumulated Depreciation', '40100234570', 'Assets', 'R', 0.00, 1, 7, 'Fixed Asset', '611', 'Total amount of depreciation charged to expense since equipment was first acquired'),
('Wages Expenses', '50013456789', 'Expenses', 'L', 0.00, 1, 34, 'Expense', '726', 'Payment to employees'),
('Rent Expenses', '50123456789', 'Expenses', 'L', 4500.00, 1, 33, 'Expense', '729', 'The payment to lease area/building'),
('Telephone Expenses', '50213456789', 'Expenses', 'L', 0.00, 1, 32, 'Expense', '730', 'Expenditure incurred from business-related phone calls and phone lines'),
('Utility Expenses', '50312456789', 'Expenses', 'L', 0.00, 1, 30, 'Expense', '732', 'Expenses incurred for lighting, powering and/or other utilities'),
('Charitable Contributions', '50412356789', 'Expenses', 'L', 0.00, 0, 38, 'Equity', '301', 'Funds contributed to the company'),
('Automoblie Expense', '50512356789', 'Expenses', 'L', 1095.00, 1, 35, 'Expense', '727', 'Expenses incurred on the running of company automobiles'),
('Depreciation Expense', '50512356790', 'Expenses', 'L', 0.00, 1, 36, 'Expense', '740', 'The portion of assets that have been consumed/expired and thus became an expense');

-- --------------------------------------------------------

--
-- Table structure for table `depreciationexpense`
--

CREATE TABLE IF NOT EXISTS `depreciationexpense` (
  `AccountName` varchar(255) NOT NULL DEFAULT ' ',
  `AccountNumber` varchar(255) NOT NULL DEFAULT ' ',
  `Debit` float(10,2) NOT NULL DEFAULT '0.00',
  `Credit` float(10,2) NOT NULL DEFAULT '0.00',
  `Balance` float(10,2) NOT NULL DEFAULT '0.00',
  `NormalSide` varchar(255) NOT NULL DEFAULT 'L'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `drawings`
--

CREATE TABLE IF NOT EXISTS `drawings` (
  `AccountName` varchar(255) NOT NULL DEFAULT ' ',
  `AccountNumber` varchar(255) NOT NULL DEFAULT ' ',
  `Debit` float(10,2) NOT NULL DEFAULT '0.00',
  `Credit` float(10,2) NOT NULL DEFAULT '0.00',
  `Balance` float(10,2) NOT NULL DEFAULT '0.00',
  `NormalSide` varchar(255) NOT NULL DEFAULT 'L'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `equipment`
--

CREATE TABLE IF NOT EXISTS `equipment` (
  `AccountName` varchar(30) NOT NULL,
  `AccountNumber` varchar(16) NOT NULL,
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL,
  `Balance` float(10,2) NOT NULL,
  `NormalSide` enum('L','R') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `equipment`
--

INSERT INTO `equipment` (`AccountName`, `AccountNumber`, `Debit`, `Credit`, `Balance`, `NormalSide`) VALUES
('Equipment', '', 7500.00, 0.00, 0.00, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `equipmentaccumulateddepreciation`
--

CREATE TABLE IF NOT EXISTS `equipmentaccumulateddepreciation` (
  `AccountName` varchar(255) NOT NULL DEFAULT ' ',
  `AccountNUmber` varchar(255) NOT NULL DEFAULT ' ',
  `Debit` float(10,2) NOT NULL DEFAULT '0.00',
  `Credit` float(10,2) NOT NULL DEFAULT '0.00',
  `Balance` float(10,2) NOT NULL DEFAULT '0.00',
  `NormalSide` varchar(255) NOT NULL DEFAULT 'R'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fileupload`
--

CREATE TABLE IF NOT EXISTS `fileupload` (
`ID` int(20) NOT NULL,
  `FileName` varchar(255) NOT NULL,
  `uid` varchar(255) NOT NULL,
  `mid` int(20) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Size` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fileupload`
--

INSERT INTO `fileupload` (`ID`, `FileName`, `uid`, `mid`, `Type`, `Size`) VALUES
(14, '01.docx', 'CSmith', 75, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '11373'),
(15, '1administrator User Guide.doc', 'CSmith', 75, 'application/msword', '919040'),
(16, '2Helloworld.docx', 'CSmith', 75, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '11372'),
(17, '0', 'CSmith', 76, '', '0'),
(18, '0', 'CSmith', 77, '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `genjournal`
--

CREATE TABLE IF NOT EXISTS `genjournal` (
  `AccountName` varchar(30) NOT NULL,
  `Action` varchar(10) NOT NULL,
  `Amount` float(10,2) NOT NULL,
  `UserID` varchar(10) NOT NULL,
  `Message` varchar(50) NOT NULL,
  `Entry` int(255) NOT NULL,
  `Date` date NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `JCode` int(10) NOT NULL,
  `Status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `StatusMessage` varchar(255) NOT NULL DEFAULT 'Pending',
  `Type` varchar(255) NOT NULL,
  `NormalSide` enum('L','R') NOT NULL,
  `ManApprove` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genjournal`
--

INSERT INTO `genjournal` (`AccountName`, `Action`, `Amount`, `UserID`, `Message`, `Entry`, `Date`, `Time`, `JCode`, `Status`, `StatusMessage`, `Type`, `NormalSide`, `ManApprove`) VALUES
('Cash', 'Debit', 10000.00, 'CSmith', '', 1, '2015-04-30', '2015-04-30 22:32:46', 1, 1, 'Approved', 'Assets', 'L', ''),
('Accounts Receivable', 'Debit', 1500.00, 'CSmith', '', 1, '2015-04-30', '2015-04-30 22:32:46', 1, 1, 'Approved', 'Assets', 'L', ''),
('Equipment', 'Debit', 7500.00, 'CSmith', '', 1, '2015-04-30', '2015-04-30 22:32:46', 1, 1, 'Approved', 'Assets', 'L', ''),
('Supplies', 'Debit', 1250.00, 'CSmith', '', 1, '2015-04-30', '2015-04-30 22:32:46', 1, 1, 'Approved', 'Assets', 'L', ''),
('Investments', 'Credit', 20250.00, 'CSmith', '', 1, '2015-04-30', '2015-04-30 22:32:46', 1, 1, 'Approved', 'OwnerEquity', 'R', ''),
('Rent Expenses', 'Debit', 4500.00, 'CSmith', 'Paid Three months rent', 2, '2015-04-30', '2015-04-30 22:34:18', 1, 1, 'Approved', 'Expenses', 'L', ''),
('Cash', 'Credit', 4500.00, 'CSmith', 'Paid Three months rent', 2, '2015-04-30', '2015-04-30 22:34:18', 1, 1, 'Approved', 'Assets', 'L', ''),
('Cash', 'Debit', 222.00, 'CSmith', '222', 3, '2015-04-30', '2015-04-30 23:23:57', 1, 1, 'Approved', 'Assets', 'L', ''),
('Supplies', 'Credit', 222.00, 'CSmith', '222', 3, '2015-04-30', '2015-04-30 23:23:57', 1, 1, 'Approved', 'Assets', 'L', ''),
('Sales Taxes Payable', 'Debit', 555.00, 'CSmith', '', 4, '2015-04-30', '2015-04-30 23:24:16', 1, 1, 'Rejected', 'Liability', 'R', ''),
('Cash', 'Credit', 555.00, 'CSmith', '', 4, '2015-04-30', '2015-04-30 23:24:16', 1, 1, 'Rejected', 'Assets', 'L', ''),
('Accounts Receivable', 'Debit', 100.00, 'CSmith', '', 5, '2015-04-30', '2015-04-30 23:38:21', 1, 1, 'Approved', 'Assets', 'L', ''),
('Automoblie Expense', 'Credit', 100.00, 'CSmith', '', 5, '2015-04-30', '2015-04-30 23:38:21', 1, 1, 'Approved', 'Expenses', 'L', ''),
('Cash', 'Debit', 5.00, 'CSmith', '', 6, '2015-04-30', '2015-04-30 23:42:07', 1, 1, 'Approved', 'Assets', 'L', ''),
('Automoblie Expense', 'Credit', 5.00, 'CSmith', '', 6, '2015-04-30', '2015-04-30 23:42:07', 1, 1, 'Approved', 'Expenses', 'L', ''),
('Land', 'Debit', 20.00, 'CSmith', '', 7, '2015-04-30', '2015-04-30 23:42:37', 1, 1, 'Rejected', 'Assets', 'L', ''),
('Rent Expenses', 'Credit', 20.00, 'CSmith', '', 7, '2015-04-30', '2015-04-30 23:42:37', 1, 1, 'Rejected', 'Expenses', 'L', ''),
('Cash', 'Debit', 12000.00, 'CGreen', '', 8, '2015-05-01', '2015-05-01 00:04:56', 1, 1, 'Approved', 'Assets', 'L', ''),
('Professional Fees', 'Credit', 12000.00, 'CGreen', '', 8, '2015-05-01', '2015-05-01 00:04:56', 1, 1, 'Approved', 'Revenues', 'R', ''),
('Automoblie Expense', 'Debit', 1200.00, 'CGreen', '', 9, '2015-05-01', '2015-05-01 00:05:29', 1, 1, 'Approved', 'Expenses', 'L', ''),
('Cash', 'Credit', 1200.00, 'CGreen', '', 9, '2015-05-01', '2015-05-01 00:05:29', 1, 1, 'Approved', 'Assets', 'L', '');

-- --------------------------------------------------------

--
-- Table structure for table `genledger`
--

CREATE TABLE IF NOT EXISTS `genledger` (
  `Date` date NOT NULL,
  `AccountName` varchar(30) NOT NULL,
  `Explanation` varchar(50) NOT NULL,
  `Ref` varchar(10) NOT NULL,
  `JCode` int(255) NOT NULL,
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL,
  `Balance` float(10,2) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `NormalSide` enum('L','R') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genledger`
--

INSERT INTO `genledger` (`Date`, `AccountName`, `Explanation`, `Ref`, `JCode`, `Debit`, `Credit`, `Balance`, `Type`, `NormalSide`) VALUES
('2015-04-30', 'Cash', '', '1', 1, 10000.00, 0.00, 10000.00, 'Assets', 'L'),
('2015-04-30', 'Accounts Receivable', '', '1', 1, 1500.00, 0.00, 1500.00, 'Assets', 'L'),
('2015-04-30', 'Equipment', '', '1', 1, 7500.00, 0.00, 7500.00, 'Assets', 'L'),
('2015-04-30', 'Supplies', '', '1', 1, 1250.00, 0.00, 1250.00, 'Assets', 'L'),
('2015-04-30', 'Investments', '', '1', 1, 0.00, 20250.00, 20250.00, 'OwnerEquity', 'R'),
('2015-04-30', 'Rent Expenses', 'Paid Three months rent', '2', 1, 4500.00, 0.00, 4500.00, 'Expenses', 'L'),
('2015-04-30', 'Cash', 'Paid Three months rent', '2', 1, 0.00, 4500.00, 5500.00, 'Assets', 'L'),
('2015-04-30', 'Cash', '222', '3', 1, 222.00, 0.00, 5722.00, 'Assets', 'L'),
('2015-04-30', 'Supplies', '222', '3', 1, 0.00, 222.00, 1028.00, 'Assets', 'L'),
('2015-04-30', 'Accounts Receivable', '', '5', 1, 100.00, 0.00, 1600.00, 'Assets', 'L'),
('2015-04-30', 'Automoblie Expense', '', '5', 1, 0.00, 100.00, -100.00, 'Expenses', 'L'),
('2015-04-30', 'Cash', '', '6', 1, 5.00, 0.00, 5727.00, 'Assets', 'L'),
('2015-04-30', 'Automoblie Expense', '', '6', 1, 0.00, 5.00, -105.00, 'Expenses', 'L'),
('2015-05-01', 'Cash', '', '8', 1, 12000.00, 0.00, 17727.00, 'Assets', 'L'),
('2015-05-01', 'Professional Fees', '', '8', 1, 0.00, 12000.00, 12000.00, 'Revenues', 'R'),
('2015-05-01', 'Automoblie Expense', '', '9', 1, 1200.00, 0.00, 1095.00, 'Expenses', 'L'),
('2015-05-01', 'Cash', '', '9', 1, 0.00, 1200.00, 16527.00, 'Assets', 'L');

-- --------------------------------------------------------

--
-- Table structure for table `investments`
--

CREATE TABLE IF NOT EXISTS `investments` (
  `AccountName` varchar(255) NOT NULL DEFAULT ' ',
  `AccountNumber` varchar(255) NOT NULL DEFAULT ' ',
  `Debit` float(10,2) NOT NULL DEFAULT '0.00',
  `Credit` float(10,2) NOT NULL DEFAULT '0.00',
  `Balance` float(10,2) NOT NULL DEFAULT '0.00',
  `NormalSide` varchar(255) NOT NULL DEFAULT 'R'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `investments`
--

INSERT INTO `investments` (`AccountName`, `AccountNumber`, `Debit`, `Credit`, `Balance`, `NormalSide`) VALUES
('Investments', ' ', 0.00, 20250.00, 0.00, 'R');

-- --------------------------------------------------------

--
-- Table structure for table `land`
--

CREATE TABLE IF NOT EXISTS `land` (
  `AccountName` varchar(30) NOT NULL DEFAULT ' ',
  `AccountNumber` varchar(16) NOT NULL DEFAULT '',
  `Debit` float(10,2) NOT NULL DEFAULT '0.00',
  `Credit` float(10,2) NOT NULL DEFAULT '0.00',
  `Balance` float(10,2) NOT NULL DEFAULT '0.00',
  `NormalSide` enum('L','R') NOT NULL DEFAULT 'L'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `machinery`
--

CREATE TABLE IF NOT EXISTS `machinery` (
  `AccountName` varchar(30) NOT NULL DEFAULT ' ',
  `AccountNumber` varchar(16) NOT NULL DEFAULT '',
  `Debit` float(10,2) NOT NULL DEFAULT '0.00',
  `Credit` float(10,2) NOT NULL DEFAULT '0.00',
  `Balance` float(10,2) NOT NULL DEFAULT '0.00',
  `NormalSide` enum('L','R') NOT NULL DEFAULT 'L'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notespayable`
--

CREATE TABLE IF NOT EXISTS `notespayable` (
  `AccountName` varchar(30) NOT NULL,
  `AccountNumber` varchar(16) NOT NULL,
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL,
  `Balance` float(10,2) NOT NULL,
  `NormalSide` enum('L','R') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pm`
--

CREATE TABLE IF NOT EXISTS `pm` (
`ID` bigint(20) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `User1` varchar(255) NOT NULL,
  `User2` varchar(255) NOT NULL,
  `Message` text NOT NULL,
  `TimeStamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserRead` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pm`
--

INSERT INTO `pm` (`ID`, `Title`, `User1`, `User2`, `Message`, `TimeStamp`, `UserRead`) VALUES
(60, 'hello khoi', 'KNguyen', 'KNguyen', 'klan.kajngak.jngaklsjnga;ksdjnakdjnak.dja.dasf', '2015-04-26 17:13:18', 1),
(61, 'kygkjyg', 'CSmith', 'CSmith', 'hgvhgvkjh', '2015-04-27 00:17:15', 1),
(62, 'Yo', 'CSmith', 'CSmith', 'asdasdgasdg', '2015-04-27 00:27:34', 1),
(63, 'hello', 'CSmith', 'CSmith', 'This is khoi', '2015-04-27 21:48:58', 1),
(64, 'adfaf', 'CSmith', 'CSmith', 'adsfasdf', '2015-04-28 00:27:58', 1),
(65, 'asfasfd', 'CSmith', 'CSmith', 'adfafasdf', '2015-04-28 00:28:31', 1),
(66, '1212', 'CSmith', 'CSmith', 'sgdgadsg', '2015-04-28 17:02:12', 1),
(67, '1', 'CSmith', 'CSmith', '1234', '2015-04-28 18:50:17', 1),
(68, 'hello', 'CSmith', 'CSmith', 'Hi', '2015-04-29 19:39:45', 1),
(69, 'Good Morning!!!', 'CSmith', 'CSmith', 'How are you? ', '2015-04-30 03:19:28', 1),
(70, 'Important', 'CSmith', 'CSmith', 'This is an important message', '2015-04-30 03:20:23', 1),
(71, 'Good Evening', 'CSmith', 'CSmith', 'asdfasdfasdfasdf', '2015-04-30 03:29:45', 1),
(72, 'Water', 'CSmith', 'CSmith', 'asdasdgasdgasdg', '2015-04-30 16:48:44', 1),
(73, 'aasdfasg', 'CSmith', 'CSmith', 'sdfgsdfgsdfg', '2015-04-30 16:57:31', 1),
(74, 'what''s up', 'CSmith', 'CSmith', 'wergwergerwg', '2015-04-30 16:57:47', 1),
(75, 'Hi', 'CSmith', 'CSmith', 'This is Steven', '2015-04-30 19:59:12', 1),
(76, 'asdfasf', 'CSmith', 'CSmith', 'asdfasdfasdf', '2015-04-30 19:59:21', 0),
(77, 'asdgasdg', 'CSmith', 'CSmith', 'asdgasdasdgasdgasdgasdg', '2015-04-30 19:59:27', 0);

-- --------------------------------------------------------

--
-- Table structure for table `professionalfees`
--

CREATE TABLE IF NOT EXISTS `professionalfees` (
  `AccountName` varchar(255) NOT NULL,
  `AccountNUmber` varchar(255) NOT NULL,
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL,
  `Balance` float(10,2) NOT NULL,
  `NormalSide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `professionalfees`
--

INSERT INTO `professionalfees` (`AccountName`, `AccountNUmber`, `Debit`, `Credit`, `Balance`, `NormalSide`) VALUES
('ProfessionalFees', '', 0.00, 12000.00, 0.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `rentexpenses`
--

CREATE TABLE IF NOT EXISTS `rentexpenses` (
  `AccountName` varchar(255) NOT NULL,
  `AccountNumber` varchar(255) NOT NULL,
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL,
  `Balance` float(10,2) NOT NULL,
  `NormalSide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rentexpenses`
--

INSERT INTO `rentexpenses` (`AccountName`, `AccountNumber`, `Debit`, `Credit`, `Balance`, `NormalSide`) VALUES
('RentExpenses', '', 4500.00, 0.00, 0.00, '');

-- --------------------------------------------------------

--
-- Table structure for table `salariespayable`
--

CREATE TABLE IF NOT EXISTS `salariespayable` (
  `AccountName` varchar(30) NOT NULL DEFAULT ' ',
  `AccountNumber` varchar(16) NOT NULL DEFAULT ' ',
  `Debit` float(10,2) NOT NULL DEFAULT '0.00',
  `Credit` float(10,2) NOT NULL DEFAULT '0.00',
  `Balance` float(10,2) NOT NULL DEFAULT '0.00',
  `NormalSide` enum('L','R') NOT NULL DEFAULT 'R'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `salestaxespayable`
--

CREATE TABLE IF NOT EXISTS `salestaxespayable` (
  `AccountName` varchar(30) NOT NULL DEFAULT ' ',
  `AccountNumber` varchar(16) NOT NULL DEFAULT ' ',
  `Debit` float(10,2) NOT NULL DEFAULT '0.00',
  `Credit` float(10,2) NOT NULL DEFAULT '0.00',
  `Balance` float(10,2) NOT NULL DEFAULT '0.00',
  `NormalSide` enum('L','R') NOT NULL DEFAULT 'R'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shorttermborrowings`
--

CREATE TABLE IF NOT EXISTS `shorttermborrowings` (
  `AccountName` varchar(255) NOT NULL DEFAULT ' ',
  `AccountNumber` varchar(255) NOT NULL DEFAULT ' ',
  `Debit` float(10,2) NOT NULL DEFAULT '0.00',
  `Credit` float(10,2) NOT NULL DEFAULT '0.00',
  `Balance` float(10,2) NOT NULL DEFAULT '0.00',
  `NormalSide` enum('L','R') NOT NULL DEFAULT 'R'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supplies`
--

CREATE TABLE IF NOT EXISTS `supplies` (
  `AccountName` varchar(30) NOT NULL,
  `AccountNumber` varchar(16) NOT NULL,
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL,
  `Balance` float(10,2) NOT NULL,
  `NormalSide` enum('L','R') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplies`
--

INSERT INTO `supplies` (`AccountName`, `AccountNumber`, `Debit`, `Credit`, `Balance`, `NormalSide`) VALUES
('Supplies', '', 1250.00, 0.00, 0.00, 'L'),
('Supplies', '', 0.00, 222.00, 0.00, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `telephoneexpenses`
--

CREATE TABLE IF NOT EXISTS `telephoneexpenses` (
  `AccountName` varchar(255) NOT NULL,
  `AccountNumber` varchar(255) NOT NULL,
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL,
  `Balance` float(10,2) NOT NULL,
  `NormalSide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `AccountName` varchar(30) NOT NULL,
  `Action` varchar(7) NOT NULL,
  `Amount` float(10,2) NOT NULL,
  `UserID` varchar(10) NOT NULL,
  `Date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Ref` int(255) unsigned NOT NULL,
  `JCode` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`AccountName`, `Action`, `Amount`, `UserID`, `Date`, `Ref`, `JCode`) VALUES
('Cash', 'Debit', 10000.00, 'CSmith', '2015-04-30 18:32:46', 1, 1),
('Accounts Receivable', 'Debit', 1500.00, 'CSmith', '2015-04-30 18:32:46', 1, 1),
('Equipment', 'Debit', 7500.00, 'CSmith', '2015-04-30 18:32:46', 1, 1),
('Supplies', 'Debit', 1250.00, 'CSmith', '2015-04-30 18:32:46', 1, 1),
('Investments', 'Credit', 20250.00, 'CSmith', '2015-04-30 18:32:46', 1, 1),
('Rent Expenses', 'Debit', 4500.00, 'CSmith', '2015-04-30 18:34:18', 2, 1),
('Cash', 'Credit', 4500.00, 'CSmith', '2015-04-30 18:34:18', 2, 1),
('Cash', 'Debit', 222.00, 'CSmith', '2015-04-30 19:23:57', 3, 1),
('Supplies', 'Credit', 222.00, 'CSmith', '2015-04-30 19:23:57', 3, 1),
('Sales Taxes Payable', 'Debit', 555.00, 'CSmith', '2015-04-30 19:24:16', 4, 1),
('Cash', 'Credit', 555.00, 'CSmith', '2015-04-30 19:24:16', 4, 1),
('Accounts Receivable', 'Debit', 100.00, 'CSmith', '2015-04-30 19:38:21', 5, 1),
('Automoblie Expense', 'Credit', 100.00, 'CSmith', '2015-04-30 19:38:21', 5, 1),
('Cash', 'Debit', 5.00, 'CSmith', '2015-04-30 19:42:07', 6, 1),
('Automoblie Expense', 'Credit', 5.00, 'CSmith', '2015-04-30 19:42:07', 6, 1),
('Land', 'Debit', 20.00, 'CSmith', '2015-04-30 19:42:37', 7, 1),
('Rent Expenses', 'Credit', 20.00, 'CSmith', '2015-04-30 19:42:37', 7, 1),
('Cash', 'Debit', 12000.00, 'CGreen', '2015-04-30 20:04:56', 8, 1),
('Professional Fees', 'Credit', 12000.00, 'CGreen', '2015-04-30 20:04:56', 8, 1),
('Automoblie Expense', 'Debit', 1200.00, 'CGreen', '2015-04-30 20:05:29', 9, 1),
('Cash', 'Credit', 1200.00, 'CGreen', '2015-04-30 20:05:29', 9, 1);

-- --------------------------------------------------------

--
-- Table structure for table `transactiontrialbalance`
--

CREATE TABLE IF NOT EXISTS `transactiontrialbalance` (
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transfileupload`
--

CREATE TABLE IF NOT EXISTS `transfileupload` (
`ID` int(30) NOT NULL,
  `FileName` varchar(255) NOT NULL,
  `Entry` int(30) NOT NULL,
  `uname` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Size` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transfileupload`
--

INSERT INTO `transfileupload` (`ID`, `FileName`, `Entry`, `uname`, `Type`, `Size`) VALUES
(20, '01.docx', 1, 'CSmith', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '11373'),
(21, '0', 2, 'CSmith', '', '0'),
(22, '0', 3, 'CSmith', '', '0'),
(23, '0', 4, 'CSmith', '', '0'),
(24, '0', 5, 'CSmith', '', '0'),
(25, '0', 6, 'CSmith', '', '0'),
(26, '0', 7, 'CSmith', '', '0'),
(27, '0', 8, 'CGreen', '', '0'),
(28, '0', 9, 'CGreen', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`UserID` int(255) NOT NULL,
  `FirstName` varchar(150) NOT NULL,
  `LastName` varchar(150) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `UserType` int(10) NOT NULL,
  `Active` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `Username`, `Password`, `Email`, `UserType`, `Active`) VALUES
(12, 'Cindy', 'Smith', 'CSmith', '3c06c447ac6605f4f25572a7f8cb5a54384b7bd7', 'csmith@yahoo.com', 2, 1),
(13, 'Cody', 'Green', 'CGreen', '3c06c447ac6605f4f25572a7f8cb5a54384b7bd7', 'cgreen@lol.com', 0, 1),
(14, 'Khoi', 'Nguyen', 'KNguyen', '3c06c447ac6605f4f25572a7f8cb5a54384b7bd7', 'knguyen@tmt.com', 1, 1),
(15, 'cody', 'green', 'cgreen72', 'c504acd9e74831e04fa53d9628249cbad87c6967', 'cgreen@yahoo.com', 2, 1),
(16, 'Linsay', 'Smith', 'LSmith', 'ee2e016f2bd04766054db40f5a73a2b8a2508857', 'lsmith@yahoo.com', 0, 1),
(17, 'Jenifer', 'Lopez', 'JLopez', '9370920075da9103eac057a8a0d9dddca4c2e605', 'jlo@gmail.com', 1, 1),
(18, 'Andy', 'Collin', 'ACollin', '02a632996462cf4e01133ade03488dd39108a952', 'ACollin@hotmail.com', 0, 1),
(19, 'Jordan', 'Lopez', 'JLopez28', 'dc8d58ce8a236697995b554da40e90c09724a72f', 'JLopez@yahoo.com', 0, 1),
(20, 'Adam', 'Smith', 'ASmith', '7d7f63232ae732b922e4b63e6f82c051133aac61', 'asmith@amc.com', 2, 1),
(21, 'Aubrey', 'Pax', 'APax', 'a434ae20ecc8e29b3966cf4ae59df821da2deddc', 'APax@att.com', 2, 1),
(22, 'Nick', 'Cannon', 'NCannon', 'cdfd54ab2caefe7f89f21de9166b2b8c0cc07984', 'NCannon@yahoo.com', 2, 1),
(23, 'Adam', 'Bom', 'ABom', '564faca1c221b8ca7f51df2c72f131970bbc9be0', 'tiny_phoenix173@yahoo.com', 0, 1),
(24, 'Stacey', 'James', 'SJames', '478a126f2b986eb989681233521218ed50645453', 'SJames@hotmail.com', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilityexpenses`
--

CREATE TABLE IF NOT EXISTS `utilityexpenses` (
  `AccountName` varchar(255) NOT NULL,
  `AccountNumber` varchar(255) NOT NULL,
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL,
  `Balance` float(10,2) NOT NULL,
  `NormalSide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wagesexpenses`
--

CREATE TABLE IF NOT EXISTS `wagesexpenses` (
  `AccountName` varchar(255) NOT NULL,
  `AccountNumber` varchar(255) NOT NULL,
  `Debit` float(10,2) NOT NULL,
  `Credit` float(10,2) NOT NULL,
  `Balance` float(10,2) NOT NULL,
  `NormalSide` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chartofaccounts`
--
ALTER TABLE `chartofaccounts`
 ADD PRIMARY KEY (`AccountNumber`);

--
-- Indexes for table `fileupload`
--
ALTER TABLE `fileupload`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `pm`
--
ALTER TABLE `pm`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transfileupload`
--
ALTER TABLE `transfileupload`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fileupload`
--
ALTER TABLE `fileupload`
MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `pm`
--
ALTER TABLE `pm`
MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
--
-- AUTO_INCREMENT for table `transfileupload`
--
ALTER TABLE `transfileupload`
MODIFY `ID` int(30) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `UserID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
