ALTER TABLE `todolist`
  ADD CONSTRAINT `todolist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION;

