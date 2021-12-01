CREATE TABLE trainer_battles(
    PRIMARY KEY (trainer_1, trainer_2, winner, battle_date),
    trainer_1 VARCHAR (20), 
    trainer_2 VARCHAR (20), 
    winner INT (20)
    FOREIGN KEY trainer_1 REFERENCES trainers(trainer_name),
    FOREIGN KEY trainer_2 REFERENCES trainers(trainer_name), 
    FOREIGN KEY winner REFERENCES trainers(trainer_name),
    battle_date DATE;  
);
