CREATE TABLE trainers_pokemon(
    PRIMARY KEY (trainer_id, poke_id),
    trainer_id INT, 
    poke_id INT, 
    FOREIGN KEY (trainer_id) REFERENCES trainers(trainer_id)
    ON DELETE CASCADE, 
    FOREIGN KEY (poke_id) REFERENCES pokemon(poke_id)
    ON DELETE RESTRICT
);