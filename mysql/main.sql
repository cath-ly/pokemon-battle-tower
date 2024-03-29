-- main.sql -- 

DROP DATABASE IF EXISTS battle_towers_pers;

CREATE DATABASE battle_towers_pers;
USE battle_towers_pers;

SOURCE CRUD/Awards_CRUD/crud_awards.sql;
SOURCE CRUD/TypeList_CRUD/crud_typelist.sql;
SOURCE CRUD/MoveList_CRUD/crud_movelist.sql;
SOURCE CRUD/typead_CRUD/crud_typead.sql;
SOURCE CRUD/typedisad_CRUD/crud_typedisad.sql;
SOURCE CRUD/Species_CRUD/crud_species.sql;
SOURCE CRUD/speciestype_CRUD/crud_speciestype.sql;
SOURCE CRUD/Trainers_CRUD/crud_trainer.sql;
SOURCE CRUD/Pokemon_CRUD/crud_pokemon.sql;
SOURCE CRUD/PokeMove_CRUD/crud_pokemove.sql;
SOURCE CRUD/Trainers_Pokemon/crud_trainers_pokemon.sql;
SOURCE CRUD/Trainer_Battles_CRUD/crud_trainer_battles.sql;
SOURCE CRUD/TrainersAwards_CRUD/crud_TrainersAwards.sql;
SOURCE CRUD/Leaderboards/create_leaderboards_view.sql;