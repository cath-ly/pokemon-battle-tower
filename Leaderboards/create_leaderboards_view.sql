-- Leaderboard creation script
 
-- find most recent loss
CREATE FUNCTION most_recent_loss(TrainerID INT)
RETURN TYPE TIMESTAMP
RETURN(
    SELECT Battle_Date FROM Trainer_Battles 
    ON TrainerID = Trainer_1 OR TrainerID = Trainer_2 
    WHERE TrainerID != Winner;
);

-- count wins until most recent loss
CREATE FUNCTION count_wins(TrainerID INT, most_recent_loss TIMESTAMP)
RETURN TYPE INT 
RETURN(
    -- how do i stop it from counting past their most recent loss? 
    SELECT COUNT(Winner) AS Winstreak FROM Trainer_Battles
    WHERE TrainerID = Trainer_1 OR TrainerID = Trainer_2 AND TrainerID = Winner AND Battle_Date > most_recent_loss;
);

-- count number of awards for a given trainer
CREATE FUNCTION count_awards(TrainerID) 
RETURN TYPE INT
RETURN(
    SELECT count(TrainerID) AS Number_of_Awards FROM TrainerAwards;
);

-- create view 
CREATE VIEW [Leaderboard] AS 
SELECT TrainerID, count_wins(TrainerID) AS Winstreak, count_awards(TrainerID) AS Number_of_Awards--calc ranking in php
FROM Trainers
ORDER BY Winstreak DESC, Number_of_Awards DESC;