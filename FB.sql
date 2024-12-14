DROP DATABASE IF EXISTS FundBridge;
CREATE DATABASE FundBridge;
USE FundBridge;

DROP TABLE IF EXISTS Users;
CREATE TABLE Users(
	userID INT AUTO_INCREMENT PRIMARY KEY,
    userName VARCHAR(50) NOT NULL, -- fullname
    password VARCHAR(250) NOT NULL,
    contactNumber VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    userAccountNumber INT NOT NULL,
    nbg VARCHAR(20) UNIQUE  NOT NULL,-- nid_birthCertificateNumber_govtApprovalNumber = nbg
	userType VARCHAR(20) 
);
      

DROP TABLE IF EXISTS Admin;
CREATE TABLE Admin (
    adminID INT AUTO_INCREMENT PRIMARY KEY, 
    email VARCHAR(50) UNIQUE NOT NULL,      
    password VARCHAR(250) NOT NULL
);

DROP TABLE IF EXISTS CentralStorage;
CREATE TABLE CentralStorage(
	accountNumber INT Primary key,
    storedFund INT NULL DEFAULT 0
);

Insert into CentralStorage(accountNumber,storedFund)
VALUES (87654321, 100);

--
-- Relations
--
DROP TABLE IF EXISTS Donates;
CREATE TABLE Donates(
	donationNumber INT AUTO_INCREMENT PRIMARY KEY,
    donatedAmount INT,
    userID INT,
    accountNumber INT,
    FOREIGN KEY(userID) REFERENCES Users(userID),
	FOREIGN KEY(accountNumber) REFERENCES CentralStorage(accountNumber)
);

DROP TABLE IF EXISTS Requests;
CREATE TABLE Requests(
	requestNumber INT AUTO_INCREMENT PRIMARY KEY,
    reason VARCHAR(250) NOT NULL,
    status ENUM('unchecked', 'approved', 'rejected', 'fundDelivered') DEFAULT 'unchecked',
    neededAmount INT NOT NULL,
    userID INT NOT NULL,
    accountNumber INT NOT NULL,
    FOREIGN KEY(userID) REFERENCES Users(userID),
    FOREIGN KEY(accountNumber) REFERENCES CentralStorage(accountNumber)
);

DROP TABLE IF EXISTS Deliver_donation;
CREATE TABLE Deliver_donation(
	deliveredNumber INT AUTO_INCREMENT PRIMARY KEY,
	deliveredAmount INT,
    requestNumber INT NOT NULL,
    FOREIGN KEY(requestNumber) REFERENCES Requests(requestNumber)
);