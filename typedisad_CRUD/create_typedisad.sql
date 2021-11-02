CREATE TABLE typedisad(
    PRIMARY KEY (type_id, type_weakness),
    type_id         INT,
    type_weakness   VARCHAR(15),
    FOREIGN KEY (type_id) FROM typelist(type_id)
);