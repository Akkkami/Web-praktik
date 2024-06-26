CREATE DATABASE parking;
GO

USE parking;
GO

CREATE TABLE Car (
    ID_Car INT IDENTITY(1,1) PRIMARY KEY,
    VehicleType CHAR(1)
);
GO
CREATE TABLE Result (
    ID_Result INT IDENTITY(1,1) PRIMARY KEY,
    Successful_Parking CHAR(1),
    ID_Car INT,
    FOREIGN KEY (ID_Car) REFERENCES Car(ID_Car)
);
GO