DROP FUNCTION IF EXISTS count_pokemoves;
CREATE FUNCTION count_pokemoves(p_id INT)
RETURNS INT
RETURN(
    SELECT COUNT(p_id) FROM movetypes
    WHERE poke_id = p_id
);

DELIMITER //
CREATE OR REPLACE TRIGGER restrictPokeMoves
BEFORE INSERT ON poke_move FOR EACH ROW
IF (count_pokemoves(p_id)) > 4 THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Cant have more than 4 moves per pokemon!';
END IF;
//
