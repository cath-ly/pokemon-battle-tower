CREATE TABLE trainer_awards(
	PRIMARY KEY (trainer_id), 
	FOREIGN KEY (trainer_id) REFERENCES trainer_id(trainers), 
	FOREIGN KEY (award_name) REFERENCES award_name(awards);
);
