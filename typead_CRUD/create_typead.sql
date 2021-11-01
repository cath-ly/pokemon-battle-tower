CREATE TABLE typead(
    PRIMARY KEY (type_id, type_strength),
    type_id         INT,
    type_strength   VARCHAR(15),
    FOREIGN KEY (type_id) FROM typelist(type_id)
);