CREATE TABLE Trainer_Battles(
    PRIMARY KEY (Trainer_1, Trainer_2, Winner, Battle_Date),
    FOREIGN KEY Trainer_1 REFERENCES Trainers(TrainerID),
    FOREIGN KEY Trainer_2 REFERENCES Trainers(TrainerID), 
    FOREIGN KEY Winner REFERENCES Trainers(TrainerID),
    Battle_Date TIMESTAMP   
);
