CREATE TABLE trainer_awards(
	PRIMARY KEY (trainer_id, award_name), 
	trainer_id INT,
	award_name VARCHAR(12),
	FOREIGN KEY (trainer_id) REFERENCES trainers(trainer_id), 
	FOREIGN KEY (award_name) REFERENCES awards(award_name)
);
