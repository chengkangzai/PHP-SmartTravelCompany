
--Drop table Employee,Booking,Trip,Customer,Tour

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
    itinerary_url VARCHAR(255) NOT NULL,
    thumbnail_url VARCHAR(255) NOT NULL
);

CREATE TABLE Trip(
    Trip_ID VARCHAR(255) PRIMARY KEY,   
    Departure_date DATE not NULL,
    Fee int NOT NULL,
    Airline VARCHAR(200) not NULL,
    FK_TourCode VARCHAR(255) not null,
        FOREIGN key (FK_TourCode) REFERENCES Tour(TourCode)
);

CREATE TABLE Booking(
    Booking_ID int NOT NULL AUTO_INCREMENT primary key ,
    FK_E_username VARCHAR(255) not NULL,
        FOREIGN key (FK_E_username) REFERENCES Employee(username),
    FK_Trip_ID VARCHAR(255) NOT NULL,
        FOREIGN KEY (FK_Trip_ID) REFERENCES Trip(Trip_ID),
    FK_C_username VARCHAR(255) not NULL,
    FOREIGN KEY (FK_C_username) REFERENCES Customer(username)
);


INSERT INTO TableName (username,password,FName,LName,IC_num,Position)
VALUES (Column1_Value, Column2_Value, Column3_Value)