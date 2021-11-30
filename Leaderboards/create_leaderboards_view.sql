-- Leaderboard creation script
 
-- calculate winstreak
--write function finding most recent loss, and another function with the input of their most recent loss and counting the wins since then. 
CREATE FUNCTION most_recent_loss(TrainerID INT)
RETURN TYPE TIMESTAMP
RETURN(
    SELECT Battle_Date FROM Trainer_Battles 
    ON TrainerID = Trainer_1 OR TrainerID = Trainer_2 
    WHERE TrainerID != Winner;
);

CREATE FUNCTION count_wins(TrainerID INT, most_recent_loss TIMESTAMP)
RETURN TYPE INT 
RETURN(
    -- how do i stop it from counting past their most recent loss? 
    SELECT COUNT(Winner) AS Winstreak FROM Trainer_Battles
    WHERE TrainerID = Trainer_1 OR TrainerID = Trainer_2 AND TrainerID = Winner AND Battle_Date > most_recent_loss;
);

-- calculate ranking 
CREATE FUNCTION calc_ranking(count_wins INT)
--use count wins function to find any ties, 
--then count the amount of awards they have 
    --how do i compare outputs of a function without 
    --inputting all of the trainerids?

-- create view 
CREATE VIEW [Leaderboard] AS 
SELECT TrainerID, count_wins
FROM Trainers
WHERE ...
ORDER BY count_wins DESC;
