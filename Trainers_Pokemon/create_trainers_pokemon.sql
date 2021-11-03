CREATE TABLE Trainers_Pokemon(
    PRIMARY KEY (TrainerID, PokemonID),
    FOREIGN KEY TrainerID REFERENCES Trainers(TrainerID), 
    FOREIGN KEY PokemonID REFERENCES Pokemon(PokemonID)
);
