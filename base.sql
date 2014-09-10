
--
-- Структура таблицы `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `test`
--

INSERT INTO `test` (`id`, `name`, `code`) VALUES
(1, 'Vlad', '123'),
(2, 'Jenya', '132'),
(3, 'Nina', '22'),
(4, 'Kolya', '33');
 
