CREATE TABLE `crsc`.`gala_results2` (`Id` INT NULL , `gala_id` INT NOT NULL , `user_id` INT NOT NULL , `position` INT NOT NULL , `stroke` VARCHAR NOT NULL , PRIMARY KEY (`Id`),FOREIGN KEY(gala_id) REFERENCES galas(Id),FOREIGN KEY(user_id) REFERENCES user(Id)) ENGINE = InnoDB;
CREATE TABLE `crsc`.`gala_results2` (`Id` INT NOT NULL AUTO_INCREMENT, `gala_id` INT NOT NULL REFERENCES galas(Id), `user_id` INT NOT NULL REFERENCES user(Id) , `position` INT NOT NULL , `stroke` VARCHAR NOT NULL , PRIMARY KEY (`Id`)) ENGINE = InnoDB;
CREATE TABLE Orders (
    OrderID int NOT NULL,
    OrderNumber int NOT NULL,
    PersonID int,
    PRIMARY KEY (OrderID),
    FOREIGN KEY (PersonID) REFERENCES Persons(PersonID)
);

CREATE TABLE gala_results (
    Id int NOT NULL  AUTO_INCREMENT,
    position int NOT NULL,
    stroke VARCHAR(20) NOT NULL,
    user_id int,
    gala_id int,
    PRIMARY KEY (Id),
    FOREIGN KEY (user_id) REFERENCES user(Id),
    FOREIGN KEY (gala_id) REFERENCES galas(Id)
);

CREATE TABLE performance (
    Id int NOT NULL  AUTO_INCREMENT,
    week int NOT NULL,
    backstroke VARCHAR(20) NOT NULL,
    breaststroke VARCHAR(20) NOT NULL,
    butterfly VARCHAR(20) NOT NULL,
    sidestroke VARCHAR(20) NOT NULL,
    user_id int,
    PRIMARY KEY (Id),
    FOREIGN KEY (user_id) REFERENCES user(Id)
);
