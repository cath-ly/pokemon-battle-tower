-- restrictMoveType.sql
-- try to restrict like the lab!!!
DROP FUNCTION IF EXISTS count_movetype;
CREATE FUNCTION count_movetype(m_id INT)
RETURNS INT
RETURN(
    SELECT COUNT(m_id) FROM movelist
    WHERE type_id = m_id
);
-- i love ligma
DELIMITER //
CREATE OR REPLACE TRIGGER restrictMoveType
BEFORE INSERT ON movelist FOR EACH ROW
IF (count_movetype(m_id)) > 1 THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'cant have more than 1 type for a given move';
END IF;
//