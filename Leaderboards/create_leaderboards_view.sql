-- Leaderboard creation script
 
-- find most recent loss
DELIMITER //
DROP FUNCTION IF EXISTS most_recent_loss;

CREATE FUNCTION most_recent_loss(trainer_id INT)
RETURNS DATE
RETURN (
    SELECT battle_date FROM trainer_battles 
    WHERE (trainer_id = trainer_1 OR trainer_id = trainer_2) AND trainer_id != winner
);
//

-- count wins until most recent loss
DROP FUNCTION IF EXISTS count_wins;

CREATE FUNCTION count_wins(trainer_id INT, most_recent_loss DATE)
RETURNS INT 
RETURN (
    -- how do i stop it from counting past their most recent loss? 
    SELECT COUNT(winner) AS winstreak FROM trainer_battles
    WHERE trainer_id = trainer_1 OR trainer_id = trainer_2 AND trainer_id = winner AND battle_date > most_recent_loss
);
//

-- count number of awards for a given trainer
DROP FUNCTION IF EXISTS count_awards;

CREATE FUNCTION count_awards(trainer_id) 
RETURNS INT
RETURN (
    SELECT COUNT(trainer_id) AS number_of_awards FROM trainer_awards
);
//

-- create view/do i add this into the query for the viewLeaderboards.php?
CREATE VIEW leaderboard  
SELECT trainer_id, count_wins(trainer_id) AS winstreak, count_awards(trainer_id) AS number_of_awards--calc ranking in php
FROM trainers
ORDER BY winstreak DESC, number_of_awards DESC;

SELECT * FROM leaderboard;

