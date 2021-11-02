SELECT move_name 
    FROM poke_move
    INNER JOIN pokemon
        USING (poke_id);