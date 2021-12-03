-- restrictMoveType.sql
-- try to restrict like the lab!!!
CREATE TRIGGER restrictMoveType
BEFORE INSERT ON move_type FOR EACH ROW

;

DROP FUNCTION IF EXISTS count_party;
CREATE FUNCTION count_party(t_id INT)
RETURNS INT
RETURN(
    SELECT COUNT(t_id) FROM trainers_party_members
    WHERE trainer_id = t_id
);
-- i love ligma
DELIMITER //
CREATE OR REPLACE TRIGGER max_party
    BEFORE INSERT ON trainers_pokemon FOR EACH ROW
    IF (count_party(trainer_id)) >= 6 THEN
        -- error here
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Too many Pokemon/max party';
END IF;
//