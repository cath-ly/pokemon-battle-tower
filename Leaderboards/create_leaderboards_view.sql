-- Leaderboard creation script
 
-- find most recent loss
CREATE FUNCTION most_recent_loss(trainer_id INT)
RETURN TYPE TIMESTAMP
RETURN(
    SELECT battle_date FROM trainer_battles 
    ON trainerID = trainer_1 OR trainer_id = trainer_2 
    WHERE trainer_id != winner;
);

-- count wins until most recent loss
CREATE FUNCTION count_wins(trainer_id INT, most_recent_loss TIMESTAMP)
RETURN TYPE INT 
RETURN(
    -- how do i stop it from counting past their most recent loss? 
    SELECT COUNT(Winner) AS winstreak FROM trainer_battles
    WHERE trainer_id = trainer_1 OR trainer_id = trainer_2 AND trainer_id = Winner AND battle_date > most_recent_loss;
);

-- count number of awards for a given trainer
CREATE FUNCTION count_awards(trainer_id) 
RETURN TYPE INT
RETURN(
    SELECT count(trainer_id) AS number_of_awards FROM trainer_awards;
);

-- create view 
CREATE VIEW [Leaderboard] AS 
SELECT trainer_id, count_wins(trainer_id) AS winstreak, count_awards(trainer_id) AS number_of_awards--calc ranking in php
FROM trainers
ORDER BY winstreak DESC, number_of_awards DESC;