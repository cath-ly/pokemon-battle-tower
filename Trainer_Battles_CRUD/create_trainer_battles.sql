CREATE TABLE trainer_battles(
    PRIMARY KEY(battle_id),
    battle_id INT AUTO_INCREMENT,
    trainer_1 INT, 
    trainer_2 INT, 
    winner INT,
    battle_date DATE,
    FOREIGN KEY (trainer_1) REFERENCES trainers(trainer_id),
    FOREIGN KEY (trainer_2) REFERENCES trainers(trainer_id), 
    FOREIGN KEY (winner) REFERENCES trainers(trainer_id)
);
