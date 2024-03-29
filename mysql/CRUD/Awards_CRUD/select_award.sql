SELECT award_name
FROM awards
INNER JOIN trainer_awards
USING(award_name);

