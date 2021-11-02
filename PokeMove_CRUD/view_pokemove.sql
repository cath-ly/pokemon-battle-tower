-- view of pokemon move?
CREATE VIEW pokemove AS
    SELECT move_name 
        FROM poke_move
        INNER JOIN pokemon
            USING (poke_id);