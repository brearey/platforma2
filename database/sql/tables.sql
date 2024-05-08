CREATE TABLE IF NOT EXISTS tasks (
    `id` INT AUTO_INCREMENT,
	`name` VARCHAR(512),
    `is_done` BOOLEAN,
    PRIMARY KEY (id)
);
