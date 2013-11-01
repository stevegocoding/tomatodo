-- Fragment begins: 1 --
INSERT INTO changelog
                                (change_number, delta_set, start_dt, applied_by, description) VALUES (1, 'Main', NOW(), 'dbdeploy', '1-create-user-table.sql');
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB;


UPDATE changelog
	                         SET complete_dt = NOW()
	                         WHERE change_number = 1
	                         AND delta_set = 'Main';
-- Fragment ends: 1 --
-- Fragment begins: 2 --
INSERT INTO changelog
                                (change_number, delta_set, start_dt, applied_by, description) VALUES (2, 'Main', NOW(), 'dbdeploy', '2-insert-user-data.sql');
INSERT INTO `user` (`id`, `username`, `password`, `email`) VALUES
(0, 'stevegocoding', 'ee19c76e3b059256cdfdc8439b9774cf', 'stevegocoding@gmail.com');

UPDATE changelog
	                         SET complete_dt = NOW()
	                         WHERE change_number = 2
	                         AND delta_set = 'Main';
-- Fragment ends: 2 --
-- Fragment begins: 3 --
INSERT INTO changelog
                                (change_number, delta_set, start_dt, applied_by, description) VALUES (3, 'Main', NOW(), 'dbdeploy', '3-create-todolist-table.sql');
CREATE TABLE IF NOT EXISTS `todolist` (
  `id` int(11) NOT NULL,
  `name` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

UPDATE changelog
	                         SET complete_dt = NOW()
	                         WHERE change_number = 3
	                         AND delta_set = 'Main';
-- Fragment ends: 3 --
-- Fragment begins: 4 --
INSERT INTO changelog
                                (change_number, delta_set, start_dt, applied_by, description) VALUES (4, 'Main', NOW(), 'dbdeploy', '4-alter-fk-todolist-user.sql');
ALTER TABLE `todolist`
  ADD CONSTRAINT `todolist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION;

UPDATE changelog
	                         SET complete_dt = NOW()
	                         WHERE change_number = 4
	                         AND delta_set = 'Main';
-- Fragment ends: 4 --
-- Fragment begins: 5 --
INSERT INTO changelog
                                (change_number, delta_set, start_dt, applied_by, description) VALUES (5, 'Main', NOW(), 'dbdeploy', '5-create-todo-table.sql');
CREATE TABLE IF NOT EXISTS `todo` (
  `id` int(11) NOT NULL,
  `content` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `priority` int(11) NOT NULL,
  `done` tinyint(1) NOT NULL,
  `list_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `list_id` (`list_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


UPDATE changelog
	                         SET complete_dt = NOW()
	                         WHERE change_number = 5
	                         AND delta_set = 'Main';
-- Fragment ends: 5 --
-- Fragment begins: 6 --
INSERT INTO changelog
                                (change_number, delta_set, start_dt, applied_by, description) VALUES (6, 'Main', NOW(), 'dbdeploy', '6-alter-fk-todo-todolist.sql');
ALTER TABLE `todo`
  ADD CONSTRAINT `todo_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `todolist` (`id`);

UPDATE changelog
	                         SET complete_dt = NOW()
	                         WHERE change_number = 6
	                         AND delta_set = 'Main';
-- Fragment ends: 6 --
