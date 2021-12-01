CREATE TABLE trainer_awards(
	PRIMARY KEY (trainer_id, award_name), 
	trainer_id INT(8),
	award_name VARCHAR(12),
	FOREIGN KEY (trainer_id) REFERENCES trainer_id(trainers), 
	FOREIGN KEY (award_name) REFERENCES award_name(awards);
);
