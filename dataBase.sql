--
-- Base de datos: `crudphpdb`
--
CREATE DATABASE IF NOT EXISTS crudphpdb;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `states`
--

CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `process` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
);
