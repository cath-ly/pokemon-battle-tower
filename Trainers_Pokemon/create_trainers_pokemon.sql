CREATE TABLE trainers_pokemon(
    PRIMARY KEY (trainer_id, poke_id),
    trainer_id INT, 
    poke_id INT, 
    FOREIGN KEY (trainer_id) REFERENCES trainers(trainer_id), 
    FOREIGN KEY (poke_id) REFERENCES pokemon(poke_id)
);

ALTER TABLE battle_towers_pers.trainers_pokemon WITH CHECK ADD CONSTRAINT trainers_pokemon.trainer_id FOREIGN KEY (trainer_id) REFERENCES battle_towers_pers.trainers(trainer_id) ON DELETE CASCADE;