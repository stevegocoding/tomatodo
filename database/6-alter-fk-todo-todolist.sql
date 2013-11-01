ALTER TABLE `todo`
  ADD CONSTRAINT `todo_ibfk_1` FOREIGN KEY (`list_id`) REFERENCES `todolist` (`id`);

