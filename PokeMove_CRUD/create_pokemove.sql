CREATE TABLE poke_move(
    PRIMARY KEY (poke_id, move_name),
    poke_id     INT,
    move_name   VARCHAR(25);
    FOREIGN KEY (poke_id) REFERENCES pokemon(poke_id),
    FOREIGN KEY (move_name) REFERENCES movelist(move_name)
);