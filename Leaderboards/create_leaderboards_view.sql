-- Leaderboard creation script
 
-- find most recent loss
-- DELIMITER //
DROP FUNCTION IF EXISTS most_recent_loss;

CREATE FUNCTION most_recent_loss(trainer_id INT)
RETURNS DATE
RETURN (
    SELECT battle_date 
      FROM trainer_battles 
     WHERE (trainer_id = trainer_1 OR trainer_id = trainer_2) AND trainer_id != winner
     ORDER BY battle_date DESC
     LIMIT 1
);
-- //

-- count wins until most recent loss
--DROP FUNCTION IF EXISTS count_wins;

CREATE FUNCTION count_wins(trainer_id INT, most_recent_loss DATE)
RETURNS INT 
RETURN (
    -- how do i stop it from counting past their most recent loss? 
    SELECT COUNT(winner) AS winstreak FROM trainer_battles
    WHERE trainer_id = trainer_1 OR trainer_id = trainer_2 AND trainer_id = winner AND battle_date > most_recent_loss
);
-- //
-- SELECT count_wins(2, most_recent_loss(2));

SELECT trainer_id, trainer_name, TB1.battle_date, TB1.winner, TB1.trainer_1, TB1.trainer_2
  FROM trainers 
       INNER JOIN trainer_battles as TB1 ON (TB1.trainer_1 = trainer_id)
       INNER JOIN trainer_battles as TB2 ON (TB2.trainer_2 = trainer_id)
 WHERE trainer_id = 2 
 ORDER BY TB1.battle_date;
-- //
-- count number of awards for a given trainer
--DROP FUNCTION IF EXISTS count_awards;

CREATE FUNCTION count_awards(t_id INT) 
RETURNS INT
RETURN (
    SELECT COUNT(trainer_id) AS number_of_awards 
      FROM trainer_awards
     WHERE t_id = trainer_id
);
-- //

-- create view/do i add this into the query for the viewLeaderboards.php?
CREATE VIEW leaderboard AS
SELECT trainer_name, count_wins(trainer_id, most_recent_loss(trainer_id)) AS winstreak, count_awards(trainer_id) AS number_of_awards
  FROM trainers
 ORDER BY winstreak DESC, number_of_awards DESC;

SELECT * FROM leaderboard;

