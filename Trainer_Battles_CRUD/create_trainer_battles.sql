CREATE TABLE Trainer_Battles(
    PRIMARY KEY (Trainer_1, Trainer_2, Winner, Battle_Date),
    FOREIGN KEY Trainer_1 REFERENCES trainers(trainer_id),
    FOREIGN KEY Trainer_2 REFERENCES trainers(trainer_id), 
    FOREIGN KEY Winner REFERENCES trainers(trainer_id),
    Battle_Date TIMESTAMP   
);
