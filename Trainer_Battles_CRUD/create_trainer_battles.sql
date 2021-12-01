CREATE TABLE trainer_battles(
    PRIMARY KEY (trainer_1, trainer_2, winner, battle_date),
    FOREIGN KEY trainer_1 REFERENCES trainers(trainer_name),
    FOREIGN KEY trainer_2 REFERENCES trainers(trainer_name), 
    FOREIGN KEY winner REFERENCES trainers(trainer_name),
    battle_date DATE   
);
