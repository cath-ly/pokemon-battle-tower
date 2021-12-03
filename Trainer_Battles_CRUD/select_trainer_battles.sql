SELECT * FROM trainer_battles
    INNER JOIN trainers
    ON trainer_battles.trainer_id = trainers.trainer_id
GROUP BY trainer_name
ORDER BY battle_date DESC;