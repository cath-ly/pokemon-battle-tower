CREATE TABLE pokemon (
    PRIMARY KEY poke_id INT AUTO_INCREMENT,
    poke_name VARCHAR(20),
    poke_trait VARCHAR(20),
    poke_found VARCHAR(20),
    mega BOOLEAN (5),
    poke_level INT(3),
    in_party BOOLEAN (5),
    FOREIGN KEY poke_species REFERENCES species(species_name)
);
