CREATE TABLE trainer_battles(
    PRIMARY KEY(battle_id),
    battle_id INT AUTO_INCREMENT,
    trainer_1 VARCHAR (30), 
    trainer_2 VARCHAR (30), 
    winner VARCHAR (20),
    battle_date DATE,
    FOREIGN KEY (trainer_1) REFERENCES trainers(trainer_name),
    FOREIGN KEY (trainer_2) REFERENCES trainers(trainer_name), 
    FOREIGN KEY (winner) REFERENCES trainers(trainer_name) 
);
