CREATE TABLE pokemon (
    poke_id INT AUTO_INCREMENT,
    poke_name VARCHAR(20),
    poke_trait VARCHAR(20),
    poke_found VARCHAR(20),
    mega BOOLEAN,
    poke_level INT(3),
    PRIMARY KEY (poke_id),
    poke_species VARCHAR(11),
    FOREIGN KEY (poke_species) REFERENCES species(species_name)
);
