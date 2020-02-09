
--Drop table Employee,Booking,Trip,Customer,Tour,Tour_des,C_selected_Tour,Feedback

CREATE TABLE Employee (
    username varchar(255) primary key,
    password varchar(255)not null,
    FName varchar(255) not NULL,
    LName varchar(255) not NULL,
    IC_num varchar(12) not NULL,
    Position varchar(150) not NULL,
    Agency VARCHAR(100)NOT NULL
);

CREATE TABLE Customer(
    username VARCHAR(255) PRIMARY key,
    password VARCHAR(255) NOT NULL,
    FName VARCHAR(255) NOT NULL,
    LName VARCHAR(255) NOT NULL,
    Phone_num VARCHAR(12) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Passport VARCHAR(30) NOT NULL
);

CREATE TABLE Tour(
    TourCode VARCHAR(255) primary key,
    Name VARCHAR(255) NOT NULL,
    Destination VARCHAR(255) NOT NULL,
    Category VARCHAR(100) not NULL,
    FK_E_username VARCHAR(255) NOT NULL,
        FOREIGN KEY (FK_E_username) REFERENCES Employee(username),
    itinerary_url VARCHAR(255) NOT NULL,
    thumbnail_url VARCHAR(255) NOT NULL
);

CREATE TABLE Trip(
    Trip_ID int AUTO_INCREMENT PRIMARY KEY,   
    Departure_date DATE not NULL,
    Fee int NOT NULL,
    Airline VARCHAR(200) not NULL,
    FK_TourCode VARCHAR(255) not null,
        FOREIGN key (FK_TourCode) REFERENCES Tour(TourCode)
);

CREATE TABLE Booking(
    Booking_ID int NOT NULL AUTO_INCREMENT primary key ,
    FK_Trip_ID int NOT NULL,
        FOREIGN KEY (FK_Trip_ID) REFERENCES Trip(Trip_ID),
    FK_C_username VARCHAR(255) not NULL,
    FOREIGN KEY (FK_C_username) REFERENCES Customer(username)
);

CREATE table Tour_des(
    FK_TourCode varchar(255),
        FOREIGN KEY(FK_TourCode) REFERENCES Tour(TourCode),
    Point_1 varchar(255),
    Des_1 varchar(255),
    Point_2 varchar(255),
    Des_2 varchar(255),
    Point_3 varchar(255),
    Des_3 varchar(255),
    Point_4 varchar(255),
    Des_4 varchar(255)
);

CREATE TABLE C_selected_Tour(
    ID INT AUTO_INCREMENT PRIMARY KEY,
    FK_C_username VARCHAR(255),
        FOREIGN KEY (FK_C_username) REFERENCES Customer(username),
    FK_TourCode VARCHAR(255),
        FOREIGN KEY(FK_TourCode) REFERENCES Tour(TourCode)
)

CREATE TABLE Feedback(
    Feedback_ID INT AUTO_INCREMENT PRIMARY key,
    Feedback VARCHAR(255) not null ,
    Complete INT(1) NULL DEFAULT '0',
)



INSERT INTO TableName (username,password,FName,LName,IC_num,Position)
VALUES (Column1_Value, Column2_Value, Column3_Value)