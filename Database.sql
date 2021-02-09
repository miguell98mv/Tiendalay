-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-02-2021 a las 21:36:31
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `almacen_tiendalay`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`email`, `user`, `password`) VALUES
('miguel.mv999@gmail.com', 'miguel valero', '$2y$10$XobJ9GDRowtDltKSgWLxz.y8s.6kxHTCtdM7Jcnu/cgNZiGHWeNoq');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `article`
--

CREATE TABLE `article` (
  `id` int(255) NOT NULL,
  `name` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `price` int(255) NOT NULL,
  `cost` int(255) NOT NULL,
  `description` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `label` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `article`
--

INSERT INTO `article` (`id`, `name`, `price`, `cost`, `description`, `category`, `label`, `image`) VALUES
(76, 'Moto', 4000, 1000, 'Desplate rapido en moto\nY llega rapido a tu destino\nPero maneja con seguridad\n', 'Computadoras', 'Ninguno', '$2y$10$BID8Bd07xzHr.UMlmm7uJut5IH2yhBYeiBvcqlwsmqPOt5SdghgQy$2y$10$6LcKxPPLh1ofH6fVqb78TueyoKI4iRciD1.fSYt1M0t944WQzgsnK$2y$10$tps7gHW5EYK9nCN6EUoxIOQkuE9sDB.wDrpF.mVdj2WcTarxnsciGiCloud-Icon.png'),
(77, '12', 12, 12, '12', 'Computadoras', 'asdasd', '$2y$10$Wpr18o.fQkzAYxe0KXJBb.HCOOeh6NQ3noL6O4Qkc.9qpWaGfP4mS$2y$10$SnT7u1uSy0JpLYpX4omz8.Lh2VBagOdqdOudwWzNwwo6jf.kd.1.6$2y$10$vQoFXzAUMrT5wUlGxNF11uLCQ0dvywlCFlxYKPRDlpAo1D0ClGZVyserendipity-tatuajes-medium.png'),
(78, '3', 3, 3, '3', 'Computadoras', '3', '$2y$10$MW57FMaD21kGZ.PFR7r5o.wqc.Jj7V4Ad5BrDXnOqmVy9ccqPX6h6$2y$10$8okc0YIk6Z0z4TIPDbMbYueH0YioNyEFrSBQ.oXy0WsZkMrboRxja$2y$10$q2PeiYLdXooclQktseW27OmIuy3imS7hhWGJifdgZETUiuM98EEAiiCloud-Icon.png'),
(79, '3', 3, 3, '3', 'Juguetes', '3', '$2y$10$EydvDsDlaqQpvmYYZulezORr6LeUBLh35zVOGCwW9XZ1SGHxS6ghW$2y$10$ghesSqPdtEmDEc8KDE8URu1.xif2cjkoJ9y.douOo7u5N8.rjTwyu$2y$10$YGygp9HrqZHn4f59G0Bx0eEjphZTQz4o1SOMiXI3bgGw3Jg9jiFoic7c54c898d87366391255c7e72562309--bangtan-boys.jpg'),
(80, '4', 4, 4, '4', 'Juguetes', '5', '$2y$10$isBTUqLZ7JiZdx24hvZ0R.eQaGfeuFfIDnPWdSy4ebHWDqFWuCeCi$2y$10$lcbKuDdxKydgIyxEYmJ0netM3coWl55YuoPIRGxEmECv5xqQTQo62$2y$10$nQfM2HuK.ssu0vUFiumJ9uvAcaPgiLuCQ88wRdFzfZBZLV50VfZz249431882_2328377827439194_5593279495185367040_n.jpg'),
(81, 'automil', 5000, 2000, 'Auto deportivo', 'Computadoras', 'deportivo', '$2y$10$.TzWZzLNyegH4p2xbaNdTuotmxFnUfLhsU5dChoDi6a1w2czwUdVK$2y$10$ov5gIPpmOw0qsCJBTXFx6u8oP.RDR4WWIoGLprtJMjeORVn4dtVoe$2y$10$ZRM9.Zwf0oaWctOI6OkOXOzoJIV2xQ0TFXPEWOa90If2rABqe2pV220190903_jHkR1LGejluZxwT.jpg'),
(82, 'Pc', 2000, 1000, 'Pc gamer para jugar a todos lo juegos qu quieras', 'Computadoras', 'gamer', '$2y$10$ggzujye3c9HTwo7wSVcBqerieL1kKwFTiyopMVCNnOcrgJvxWPngq$2y$10$SIkJqbCzjoDAPXszwcImKe3cVU4W9QjNqdx0Hww1tXUIWIN4aDYFi$2y$10$9AIezNsN34PCQAzfw3Qeouac3N6EXW6QISA8aSBJiOQwJ70Xnne3Sc7c54c898d87366391255c7e72562309--bangtan-boys.jpg'),
(83, '2', 2, 2, '2', 'Computadoras', '2', '$2y$10$7whmzlt5rT3.taVuQQMCCerHGB6jOOOyXDAiCbxAMtdywhjoLN.Oa$2y$10$xXsK0CNS2BtkcfEMgIXF.OBcpVp98D.QMnpJboZqNTRhW5NlZChw2$2y$10$eCtT9qZWz0eOC11kO1oBoem6zqg0aHJT8606PHTMjhEq3orJrkZqK35628274_2165566510386994_794438275380019200_n.jpg'),
(84, '3', 3, 3, '3', 'Computadoras', '3', '$2y$10$I9Ci1o54OQ6GFAmrr5u8fOPitjOP4mbfnPncBhRjIvcl7xnzhhLuy$2y$10$IN59.VVLjYopphCL4XHeNOTrFW8LdSEUWDfVjEaH88D25rQgDquJG$2y$10$7pd9Q3eoeC2C46uOyqoVo..DadG3tiKo16knuKzEmceahj7qBWeEaserendipity-tatuajes-medium.png'),
(85, '4', 4, 4, '4', 'Computadoras', '4', '$2y$10$OAxWgrSUPcFOw0anhUt6QuyggSL7FoxSpyd8EtD.ghH6QU3I.vLkq$2y$10$s3YD3mRcV3sUpeuWAlKHP.fojVLaUxmkRspYN1SntmGgSuU2WnhGC$2y$10$S5k5e6ECiSjd41sdqC.ZY.f6halG.8E3o471DmijiYEyB.WjQb6TuJacquesTatu-57794f6ad8c33-tattoo.jpeg'),
(86, '12', 12, 12, '12', 'Computadoras', '12', '$2y$10$bi1oKEcJBlC0nq7EFD85UugVIHoVDaAfk2tjmJVgSNIk7C0i8L.bu$2y$10$.FST.fOsusqqxBOvT0bJJ.q67.Sva3itYfMESTj6PByTmRWnTwhbK$2y$10$6562E75uo4Zf8KxalMJB1uI8vcdBcJ3WD.9cKElti2Jb3kTOI5g76224.jpg'),
(87, '56', 56, 56, '56', 'Computadoras', '56', '$2y$10$TEbMhNZFd3V3SumEEkWs4.oJ3d395LR4V5n6ddoEALuJK16PGAhQS$2y$10$lUT73kJzRkzpjYp34FOuiOVDd3WXd6PhlNXHFox5sVD0509pCEhja$2y$10$Do8TrZ7YowbAEXD2DTekQ.Eqs5I6MjtlOxdsbaRdJH3KH0El0nftG35628274_2165566510386994_794438275380019200_n.jpg'),
(88, '7', 7, 7, '7', 'Computadoras', '7', '$2y$10$10rfIMcuLe4B8Bx7iI7NzuY3nqcjiGAJM6cuLwjPfUKgWs7HtuHr6$2y$10$lZ4u6u4w3hhN6FuX9doB1eJWIyIgKGyf4h1Sph43W2z4KQpPuw96C$2y$10$k3GHDRelVulomY7TexKFu.O5SIhgc0hQremL1Dk5qoIb.gK9uSbBOec1fe5e5ad09fda31d8baa175ae0f126.jpg'),
(89, '3', 3, 3, '3', 'Computadoras', '3', '$2y$10$R2hBbQeQ2ugBVShZ4MTzY.46lNFty6m.lT4iUb1ozAcfxNTkrOnsG$2y$10$VcLgpBLjaJtD9X4.YlNdg.7BgI82tb2wwiNyUUUdtzXvb0pqHEaD.$2y$10$96mvtq62L06PZ9iT6w9Xc.8R16XIEppooxhUVf5mhpbt8auc71cPGiCloud-Icon.png'),
(90, '3', 3, 3, '3', 'Computadoras', '3', '$2y$10$kqa75XnzmmkiNr5XHJoWYeuNErbUoPYnYwRGF6.mKD.ff07GAQRfa$2y$10$zKKUDaRo4xB64g2NU6GuPujwhosEgBdW83ZW15iaoMIPrZ0tsW.pK$2y$10$MpdxBpuxEoiVKL7iyDQvjOd2az4GJXAzBd9RQSh2ULHzq2Zl6AQJOJacquesTatu-57794f6ad8c33-tattoo.jpeg'),
(91, '3', 3, 3, '3', 'Computadoras', '3', '$2y$10$tT4JpNCmrHA2TobyydamS.dpAuKubfQSBoe1sRCTRKtj.fB82wjkO$2y$10$skzGm0g3TjUVSRoqBw0SVuA6JLbvco.2Ac0Oh7n5VV32KKLDD3HtO$2y$10$9GkP.GpsyJz6sx1A..1I8euT43DelZpYb8sRjA4ps.wrJ2ufpUNGSserendipity-tatuajes-medium.png'),
(92, '3', 3, 3, '3', 'Computadoras', '3', '$2y$10$qYJ9ogg3Nv9mtmDvJhkqFe51FXqQMKnpcFeIlmPIwAQpkfEBUx9jy$2y$10$99MvRljvhNYTrFkGPu52y.r8RLgvbbCGyHspD39oXbXK7dnY1Aesa$2y$10$DIwUSkphGAw1829tRNkfWuOR16t5nrBAyaTEM3n.VyZGT2D8kDvR.49431882_2328377827439194_5593279495185367040_n.jpg'),
(93, 'moladora', 5000, 3000, '12', 'Juguetes', 'electrodomestica', '$2y$10$ivHCmrT9nOxhOwnc3yjBdeVnj9iwG2J80T4srNQDEyEJs9yJCdUlS$2y$10$Q2vc.AUpFlFyp5GUB2G4ueEL28awz1.CWlvSWrMFlDmcumEiVoGGe$2y$10$JQv9YdU4F5bOSV0952mjd.vqiKOopyo88euj962bVOZNUqg319MdOec1fe5e5ad09fda31d8baa175ae0f126.jpg'),
(94, 'mesa', 800, 400, 'mesa para comedor', 'Juguetes', 'mesa', '$2y$10$zRQsnUqzJ.k1W7pIzDOrZesR7iWbt30oLMmTVbjtyrfy5VfWXnJGC$2y$10$zbWEWsjLgft69gMBXWnHJulIx2qSJ0as9lV2LHrw1St2NAX8Ug5zm$2y$10$hAqA97sqA7GfiIGBP2T8B.G0bVYU301nKhP9IkzLI7e2jPYCwnKRiLove_Yourself_Her_Logo_BTS.png'),
(95, '5', 5, 5, '5', 'Juguetes', '5', '$2y$10$F09yg00yrsfm8xSFhoKE5u3SkZ5mW1upPjtd1C7klTN2gawD2CVH6$2y$10$Kgb1wFxMKby.f3Hi.r02IO9rhfBVB8otJUaPcDYjniA0nCyTnXo0e$2y$10$nL9tNR9IwSlQVQEneOiBH.M0HS4k7MmgrNaeo6SV6UlglrdW88Whuec1fe5e5ad09fda31d8baa175ae0f126.jpg'),
(96, '6', 6, 6, '6', 'Juguetes', '6', '$2y$10$hdsyLvVsaAEI52NjrlcTdO8J2aD2QZOHi4YsckyYu7iImhJo.ERC6$2y$10$7YOAblmP5FdqTMluEYAmWe8o3SH78CQr10G.qBNrSozRTKxPso0Pm$2y$10$Xpm.AYq0DYS46htxDkN9U.GPhk7R3So0ExcUnBJHtRXaFknjndcS6iCloud-Icon.png'),
(97, '6', 6, 6, '6', 'Juguetes', '6', '$2y$10$fm.TL.osWHomX.9.vMjkEu8i8KysH5UxEgQhCZqrllhcMsoKzBu2i$2y$10$wFMVlkeSJGzIsfvVBX0j9OcLudc.JdR2GEDZ2zge57A2jO9tHOoL2$2y$10$ZKfqHS0kfo7.b3YPnFpQlOf6qJu3DFBUxfCQCvNmUpLSxQdtsvv7uiCloud-Icon.png'),
(98, '6', 6, 6, '6', 'Juguetes', '6', '$2y$10$XHIJjNL2NS9NlVof4wRt2uRuat1jcIC94Xa.ZMp5H5yeRzdMF995W$2y$10$kjPjXFei74QSRxeLINAdfuodZGhb7hOgCfqq9eMU3mXFERdIiKdue$2y$10$iFzwUT5QOQGR08eZ7Yo9Mu5mfC2VYKN8Suq76wkhr4QvURCSNHEhKLove_Yourself_Her_Logo_BTS.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `buyclient`
--

CREATE TABLE `buyclient` (
  `id` int(255) NOT NULL,
  `idArticle` int(255) NOT NULL,
  `client` varchar(55) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `buyclient`
--

INSERT INTO `buyclient` (`id`, `idArticle`, `client`) VALUES
(25, 82, 'm'),
(27, 93, 'm'),
(28, 76, 'm'),
(29, 83, 'miguel.mv999@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `Category` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Description` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`Category`, `Description`) VALUES
('Computadoras', 'Computadoras y articulos de computo por separado'),
('Juguetes', 'Jueguetes para niños todos los juguetes que buscas estan aqui'),
('Ropa', 'Ropa de todos los estilos para todas las personas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

CREATE TABLE `client` (
  `email` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`email`, `user`, `password`) VALUES
('m', 'm', '$2y$10$Xaw/qwYU/b1DRY9y3Y6hSexK9Rswr35qnBStdZjX/qRTOpLXyCpOq'),
('miguel.mv999@gmail.com', 'miguelmv999', '$2y$10$xqB/hcSsNcSKeX.nHfRqaenh9xIbqtRff5sLYHMKiMD4Qr4jG/saK');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `buyclient`
--
ALTER TABLE `buyclient`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idArticle` (`idArticle`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category`);

--
-- Indices de la tabla `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `article`
--
ALTER TABLE `article`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `buyclient`
--
ALTER TABLE `buyclient`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `buyclient`
--
ALTER TABLE `buyclient`
  ADD CONSTRAINT `buyclient_ibfk_1` FOREIGN KEY (`idArticle`) REFERENCES `article` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
