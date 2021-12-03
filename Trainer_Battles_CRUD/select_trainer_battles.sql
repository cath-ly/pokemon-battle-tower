-- try this out and see how it fairs
SELECT trainer_1, trainer_2, winner, trainer_name, battle_date FROM trainer_battles
    INNER JOIN trainers
    ON (trainer_battles.winner = trainers.trainer_id) AS Name_of_Winner
-- GROUP BY trainer_name
ORDER BY battle_date DESC;

/*SELECT * FROM trainer_battles
    INNER JOIN trainers
    ON trainer_battles.trainer_1 = trainers.trainer_id AND trainer_battles.trainer_2 = trainers.trainer_id AND trainer_battles.winner = trainers.trainer_id
GROUP BY trainer_name
ORDER BY battle_date DESC;*/