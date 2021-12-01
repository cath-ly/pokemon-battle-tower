-- Leaderboard creation script
 
-- find most recent loss
DELIMITER //
CREATE FUNCTION most_recent_loss(trainer_id INT)
RETURNs DATE
RETURN (
    SELECT battle_date FROM trainer_battles 
    ON trainerID = trainer_1 OR trainer_id = trainer_2 
    WHERE trainer_id != winner;
);
//

-- count wins until most recent loss
CREATE FUNCTION count_wins(trainer_id INT, most_recent_loss DATE)
RETURNs INT 
RETURN (
    -- how do i stop it from counting past their most recent loss? 
    SELECT COUNT(winner) AS winstreak FROM trainer_battles
    WHERE trainer_id = trainer_1 OR trainer_id = trainer_2 AND trainer_id = Winner AND battle_date > most_recent_loss;
);
//

-- count number of awards for a given trainer
CREATE FUNCTION count_awards(trainer_id) 
RETURNs INT
RETURN (
    SELECT COUNT(trainer_id) AS number_of_awards FROM trainer_awards;
);
//


CALL most_recent_loss(trainer_id);
CALL count_wins(trainer_id, most_recent_loss);
CALL count_awards(trainer_id);

-- create view/do i add this into the query for the viewLeaderboards.php?
CREATE VIEW [leaderboard] AS 
SELECT trainer_id, count_wins(trainer_id) AS winstreak, count_awards(trainer_id) AS number_of_awards--calc ranking in php
FROM trainers
ORDER BY winstreak DESC, number_of_awards DESC;

SELECT * FROM leaderboard;

