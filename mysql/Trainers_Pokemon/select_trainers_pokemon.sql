SELECT trainer_name, poke_name FROM trainers_pokemon
    INNER JOIN trainers USING (trainer_id)
    INNER JOIN pokemon USING (poke_id);

