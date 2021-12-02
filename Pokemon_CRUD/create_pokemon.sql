CREATE TABLE pokemon (
    poke_id INT AUTO_INCREMENT,
    poke_name VARCHAR(20),
    poke_trait VARCHAR(20),
    poke_found VARCHAR(20),
    mega BOOLEAN,
    poke_level INT(3),
    PRIMARY KEY (poke_id),
    species_name VARCHAR(11),
    FOREIGN KEY (species_name) REFERENCES species(species_name)
);
