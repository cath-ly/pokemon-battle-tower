-- restrictPokemonTypes.sql
-- try to restrict like the lab!!!
-- we need to count types of movetypes should only be 1

DROP FUNCTION IF EXISTS count_poketype;
CREATE FUNCTION count_poketype(s_name CHAR)
RETURNS INT
RETURN(
    SELECT COUNT(s_name) FROM species_type
    WHERE species_name = s_name
);

CREATE OR REPLACE TRIGGER restrictPokeType
BEFORE INSERT ON species_type FOR EACH ROW
IF (count_poketype(species_name)) > 2 THEN
    SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = "Unable to add pokemon, maximum party size reached.";
;
