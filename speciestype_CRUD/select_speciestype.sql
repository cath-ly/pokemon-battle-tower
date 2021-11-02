-- selecting table
SELECT species_name 
    FROM species_type
        INNER JOIN species
            USING (type_id);