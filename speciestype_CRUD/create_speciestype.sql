CREATE TABLE species_type(
    PRIMARY KEY (species_name, type_id),
    species_name     VARCHAR(30),
    type_id          INT,
    FOREIGN KEY (species_name) REFERENCES species(species_name),
    FOREIGN KEY (type_id) REFERENCES typelist(type_id)
);
