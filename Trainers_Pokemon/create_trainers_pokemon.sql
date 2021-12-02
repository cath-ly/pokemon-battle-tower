CREATE TABLE trainers_pokemon(
    PRIMARY KEY (trainer_id, poke_id),
    trainer_id INT (3), 
    poke_id INT (3), 
    FOREIGN KEY trainer_id REFERENCES trainers(trainer_id), 
    FOREIGN KEY poke_id REFERENCES pokemon(poke_id)
);
