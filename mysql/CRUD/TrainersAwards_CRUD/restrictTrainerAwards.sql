-- restrictTrainerAwards.sql
DROP FUNCTION IF EXISTS find_duplicates;

CREATE FUNCTION find_duplicates(a_name VARCHAR)
RETURNS BOOLEAN 
RETURN (
    SELECT COUNT (a_name) AS num_of_a_name FROM trainer_awards
    WHERE award_name = a_name
);

DELIMITER //
CREATE OR REPLACE TRIGGER enforceUniqueAwards
AFTER INSERT ON trainer_awards FOR EACH ROW 
IF (num_of_a_name) > 1 THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cant have more than 1 of the same award. All awards are unique';
END IF;
// 
