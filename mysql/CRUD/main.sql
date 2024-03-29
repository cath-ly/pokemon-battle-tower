-- main.sql -- 

DROP DATABASE IF EXISTS battle_towers_pers;

CREATE DATABASE battle_towers_pers;
USE battle_towers_pers;

SOURCE Awards_CRUD/crud_awards.sql;
SOURCE TypeList_CRUD/crud_typelist.sql;
SOURCE MoveList_CRUD/crud_movelist.sql;
SOURCE typead_CRUD/crud_typead.sql;
SOURCE typedisad_CRUD/crud_typedisad.sql;
SOURCE Species_CRUD/crud_species.sql;
SOURCE speciestype_CRUD/crud_speciestype.sql;
SOURCE Trainers_CRUD/crud_trainer.sql;
SOURCE Pokemon_CRUD/crud_pokemon.sql;
SOURCE PokeMove_CRUD/crud_pokemove.sql;
SOURCE Trainers_Pokemon/crud_trainers_pokemon.sql;
SOURCE Trainer_Battles_CRUD/crud_trainer_battles.sql;
SOURCE TrainersAwards_CRUD/crud_TrainersAwards.sql;
SOURCE Leaderboards/create_leaderboards_view.sql;