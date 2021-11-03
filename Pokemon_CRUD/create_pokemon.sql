CREATE TABLE Pokemon (
    PRIMARY KEY PokemonID INT AUTO_INCREMENT,
    Pokemon_Name VARCHAR(20),
    Pokemon_Trait VARCHAR(20),
    Pokemon_Found VARCHAR(20),
    FOREIGN KEY Pokemon_Species REFERENCES Species(Species_Name),
    Mega BOOLEAN (5),
    Pokemon_Level INT(3)  
);
