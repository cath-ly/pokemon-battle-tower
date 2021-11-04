SELECT award_name
FROM Awards
INNER JOIN TrainerAwards
USING(award_name);

