-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Jul-2024 às 12:21
-- Versão do servidor: 10.4.28-MariaDB
-- versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `pap_igor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `artista`
--

CREATE TABLE `artista` (
  `Artista_id` int(9) NOT NULL,
  `Nome` varchar(150) NOT NULL,
  `foto` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `artista`
--

INSERT INTO `artista` (`Artista_id`, `Nome`, `foto`) VALUES
(9, 'Deftones', 'img/artistas/deftones.png'),
(12, 'Radiohead', 'img/artistas/radiohead.png'),
(13, 'Dua Lipa', 'img/artistas/dua-lipa.jpg'),
(14, 'Harry Styles', 'img/artistas/harry-styles.jpg'),
(15, 'The Weeknd', 'img/artistas/the-weeknd.jpg'),
(16, 'Kendrick Lamar', 'img/artistas/kendrick-lamar.jpg'),
(17, 'Kanye West', 'img/artistas/kanye-west.jpg'),
(18, 'Travis Scott', 'img/artistas/travis-scott.jpg'),
(19, 'Frank Sinatra', 'img/artistas/frank-sinatra.jpg'),
(20, 'Nina Simone', 'img/artistas/nina-simone.jpg'),
(21, 'Tony Bennett', 'img/artistas/tony-bennet.jpg'),
(22, 'James Brown', 'img/artistas/james-brown.jpg'),
(23, 'The Headhunters', 'img/artistas/the-headhunters.jpg'),
(24, 'Tower Of Power', 'img/artistas/tower-of-power.jpg'),
(25, 'Morgan Wallen', 'img/artistas/morgan-wallen.jpg'),
(26, 'Luke Combs', 'img/artistas/luke-combs.jpg'),
(27, 'Kane Brown', 'img/artistas/kane-brown.jpg'),
(28, 'Bad Bunny', 'img/artistas/bad-bunny.jpg'),
(29, 'Daddy Yankee', 'img/artistas/daddy-yankee.jpg'),
(30, 'J Balvin', 'img/artistas/j-balvin.jpg'),
(31, 'Avicii', 'img/artistas/avicii.jpg'),
(32, 'Daft Punk', 'img/artistas/daft-punk.jpg'),
(33, 'Marshmello', 'img/artistas/marshmello.jpg'),
(34, 'Gorillaz', 'img/artistas/gorillaz.jpg'),
(35, 'Eminem', 'img/artistas/eminem.jpg'),
(36, 'The Notorious B.I.G.', 'img/artistas/the-notorious-big.jpg'),
(37, 'Mitski', 'img/artistas/mitski.jpg'),
(38, 'Artic Monkeyss', 'img/artistas/artic-monkeys.jpg'),
(39, 'Steve Lacy', 'img/artistas/steve-lacy.jpg'),
(40, 'Michael Jackson', 'img/artistas/michael-jackson.jpg'),
(41, 'Stevie Wonder', 'img/artistas/stevie-wonder.jpg'),
(42, 'Aretha Franklin', 'img/artistas/aretha-franklin.jpg'),
(43, 'BTS', 'img/artistas/bts.jpg'),
(44, 'BLACKPINK', 'img/artistas/blackpink.jpg'),
(45, 'FIFTY FIFTY', 'img/artistas/fifty-fifty.jpg'),
(46, 'Wuant', 'img/artistas/wuant.jpg'),
(48, 'Nujabes', 'img/artistas/nujabes.jpg'),
(49, 'Lil Uzi Vert', 'img/artistas/lil-uzi-vert.jpg'),
(52, 'Pop Smoke', 'img/artistas/pop-smoke.jpg'),
(53, 'QUEEN', 'img/artistas/R.jpeg'),
(54, 'The White Stripes', 'img/artistas/OIP (1).jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contacto`
--

CREATE TABLE `contacto` (
  `morada` text NOT NULL,
  `telemovel` char(9) NOT NULL,
  `email` varchar(200) NOT NULL,
  `localizacao` text NOT NULL,
  `facebook` text NOT NULL,
  `twitter` text NOT NULL,
  `instagram` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `contacto`
--

INSERT INTO `contacto` (`morada`, `telemovel`, `email`, `localizacao`, `facebook`, `twitter`, `instagram`) VALUES
('Avenida dos Aliados, 251', '913234231', 'moodyrecords@gmail.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3004.3683251390903!2d-8.613389723569545!3d41.14831361078973!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd2464e35940fd8f%3A0x738dcce6546dd210!2sAv.%20dos%20Aliados%2C%20Porto!5e0!3m2!1spt-PT!2spt!4v1719245890716!5m2!1spt-PT!2spt', 'https://www.facebook.com/', 'https://x.com/', 'https://www.instagram.com/');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomenda`
--

CREATE TABLE `encomenda` (
  `encomenda_id` int(9) NOT NULL,
  `utilizador_id` int(9) NOT NULL,
  `rua` varchar(300) NOT NULL,
  `codigo_postal` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `pais` varchar(200) NOT NULL,
  `distrito` varchar(200) NOT NULL,
  `MetodoPagamento_Id` int(9) NOT NULL,
  `Numero_Cartao` varchar(256) DEFAULT NULL,
  `Titular` varchar(200) DEFAULT NULL,
  `Data_Validade` date DEFAULT NULL,
  `Codigo` varchar(256) DEFAULT NULL,
  `MetodoEnvio_Id` int(11) NOT NULL,
  `Preco_Total` float(9,2) NOT NULL,
  `Data_Criado` date NOT NULL,
  `status` varchar(100) NOT NULL COMMENT 'Pagamento pendente, Enviada, Cancelada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `encomenda`
--

INSERT INTO `encomenda` (`encomenda_id`, `utilizador_id`, `rua`, `codigo_postal`, `cidade`, `pais`, `distrito`, `MetodoPagamento_Id`, `Numero_Cartao`, `Titular`, `Data_Validade`, `Codigo`, `MetodoEnvio_Id`, `Preco_Total`, `Data_Criado`, `status`) VALUES
(16, 43, 'Rua Ramalho Ortigão, 167', '1234-233', 'Vila Nova de Gaia', 'Portugal', 'Porto', 2, '1376151d963cad089697872af7dcec48bbd3ae29', 'Igor Gabriel Violante Moreira', '2000-01-01', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 4, 392.90, '2024-05-10', 'Pedido Excluido'),
(17, 43, 'Rua Ramalho sOrtigão, 167x', '1234-212', 'Vila Nova de GaY', 'Azerbaijan (Azərbaycan)', 'Porto', 2, '1183189885b8c6078babddfc015205810522f7b2', 'Goncalo Alves Rosa Costa', '2020-03-01', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 4, 69.97, '2024-06-24', 'Pedido Excluido'),
(18, 43, 'Rua Ramalho Ortigão, 167', '1234-233', 'Vila Nova de Gaia', 'Portugal', 'Porto', 2, '1376151d963cad089697872af7dcec48bbd3ae29', 'Goncalo Alves Rosa Costa', '2000-02-01', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 4, 259.96, '2024-06-24', 'Entregue'),
(19, 43, 'Rua Ramalho Ortigão, 167', '1234-233', 'Vila Nova de Gaia', 'Portugal', 'Porto', 2, '4f092e61a4271e98f0f5d8b8c1238ab49ec8a9dd', 'Igor Gabriel Violante Moreira', '2020-06-01', '123', 4, 107.96, '2024-06-24', 'Pedido Recebido'),
(20, 43, 'Rua Ramalho Ortigão, 167', '1234-233', 'Vila Nova de Gaia', 'Portugal', 'Porto', 2, '84e8f9211ad7eb71504f830ef6bcdb27f4416c4e', 'Igor Gabriel Violante Moreira', '2020-01-01', '4ac2bbff5b524a7870db72e80334fa26fee02817', 4, 156.97, '2024-06-24', 'Pedido Recebido'),
(21, 43, 'Rua Ramalho Ortigão, 167', '1234-233', 'Vila Nova de Gaia', 'Portugal', 'Porto', 2, '1376151d963cad089697872af7dcec48bbd3ae29', 'aaaaaaa', '2020-01-01', '43814346e21444aaf4f70841bf7ed5ae93f55a9d', 4, 53.99, '2024-06-26', 'Pedido Recebido'),
(22, 43, 'Rua Ramalho Ortigão, 167', '1234-233', 'Vila Nova de Gaia', 'Portugal', 'Porto', 2, '1376151d963cad089697872af7dcec48bbd3ae29', 'Goncalo Alves Rosa Costa', '2020-03-01', 'f38cfe2e2facbcc742bad63f91ad55637300cb45', 4, 138.98, '2024-06-30', 'Pedido Recebido'),
(23, 43, 'Rua Ramalho Ortigão, 167', '1234-233', 'Vila Nova de Gaia', 'Portugal', 'Porto', 2, '4f092e61a4271e98f0f5d8b8c1238ab49ec8a9dd', 'Goncalo Alves Rosa Costa', '2020-01-01', '123', 4, 134.93, '2024-07-07', 'Pedido Excluido'),
(24, 43, 'Rua Ramalho Ortigão, 167', '1234-233', 'Vila Nova de Gaia', 'Paraguay', 'Porto', 2, '1376151d963cad089697872af7dcec48bbd3ae29', 'Goncalo Alves Rosa Costa', '2020-04-01', '321', 4, 53.99, '2024-07-07', 'Pedido Recebido'),
(26, 43, 'Rua Ramalho Ortigão, 167', '1234-233', 'Vila Nova de Gaia', 'Portugal', 'Porto', 2, '1376151d963cad089697872af7dcec48bbd3ae29', 'Igor Gabriel Violante Moreira', '2000-04-01', '123', 4, 53.99, '2024-07-10', 'Pedido Recebido'),
(27, 43, 'Rua Ramalho Ortigão, 167', '1234-233', 'Vila Nova de Gaia', 'Portugal', 'Porto', 2, '1376151d963cad089697872af7dcec48bbd3ae29', 'Goncalo Alves Rosa Costa', '2020-03-01', '123', 4, 53.99, '2024-07-11', 'Pedido Recebido'),
(28, 43, 'Rua Ramalho Ortigão, 167', '1234-233', 'Vila Nova de Gaia', 'Portugal', 'Porto', 2, '1376151d963cad089697872af7dcec48bbd3ae29', 'Igor Gabriel Violante Moreira', '2020-04-01', '123', 4, 53.99, '2024-07-12', 'Pedido Recebido'),
(29, 43, 'Rua Ramalho Ortigão, 167', '1234-233', 'Vila Nova de Gaia', 'Portugal', 'Porto', 2, '1376151d963cad089697872af7dcec48bbd3ae29', 'Igor Gabriel Violante Moreira', '0000-00-00', '123', 4, 94.95, '2024-07-14', 'Pedido Recebido'),
(30, 43, 'Rua Ramalho Ortigão, 167', '1234-233', 'Vila Nova de Gaia', 'Portugal', 'Porto', 2, '4f092e61a4271e98f0f5d8b8c1238ab49ec8a9dd', 'Igor Gabriel Violante Moreira', '0000-00-00', '123', 1, 539.87, '2024-07-14', 'Pedido Recebido'),
(33, 43, 'Rua Teste Ortigão, 167', '1214-233', 'Vila Nova de Gaya', 'Portugal', 'Porta', 2, '1376151d963cad089697872af7dcec48bbd3ae29', 'Antonio Oliveira', '0000-00-00', '696', 1, 96.98, '2024-07-15', 'Pedido Recebido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `encomenda_vinil`
--

CREATE TABLE `encomenda_vinil` (
  `encomenda_id` int(9) NOT NULL,
  `vinil_id` int(9) NOT NULL,
  `Qtd` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `encomenda_vinil`
--

INSERT INTO `encomenda_vinil` (`encomenda_id`, `vinil_id`, `Qtd`) VALUES
(16, 10, 2),
(16, 17, 1),
(16, 16, 1),
(16, 7, 1),
(16, 18, 1),
(16, 14, 1),
(16, 20, 1),
(16, 21, 1),
(16, 15, 1),
(16, 22, 1),
(16, 23, 1),
(17, 37, 1),
(17, 41, 1),
(18, 7, 1),
(18, 22, 1),
(18, 19, 1),
(18, 24, 1),
(19, 16, 1),
(19, 22, 1),
(19, 21, 1),
(20, 7, 1),
(20, 10, 1),
(20, 14, 1),
(20, 22, 1),
(21, 7, 1),
(22, 15, 1),
(22, 7, 1),
(23, 41, 6),
(24, 7, 1),
(26, 7, 1),
(27, 7, 1),
(28, 7, 1),
(29, 14, 4),
(30, 37, 10),
(30, 7, 3),
(30, 10, 1),
(30, 14, 2),
(33, 92, 1),
(33, 7, 1),
(33, 10, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `evento`
--

CREATE TABLE `evento` (
  `evento_id` int(11) NOT NULL,
  `imagem` varchar(300) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `nome` varchar(250) NOT NULL,
  `link` varchar(300) NOT NULL,
  `local` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `evento`
--

INSERT INTO `evento` (`evento_id`, `imagem`, `data_inicio`, `data_fim`, `nome`, `link`, `local`) VALUES
(1, 'img/eventos/rock-in-rio.png', '2024-06-15', '2024-06-23', 'Rock In Rio', 'https://rockinriolisboa.pt/pt', 'Lisboa'),
(3, 'img/eventos/o-sol-da-caparica.jpg', '2024-08-15', '2024-08-18', 'O Sol Da Caparica', 'https://festivalosoldacaparica.pt/', 'Costa da Caparica'),
(5, 'img/eventos/super-bock.jpg', '2024-07-14', '2024-07-16', 'Super Bock Super Rock', 'https://superbocksuperrock.pt/', 'Meco, Sesimbra');

-- --------------------------------------------------------

--
-- Estrutura da tabela `faq`
--

CREATE TABLE `faq` (
  `faq_id` int(9) NOT NULL,
  `topico_id` int(11) NOT NULL,
  `pergunta` text NOT NULL,
  `resposta` text NOT NULL,
  `status` varchar(100) NOT NULL COMMENT 'Incompleto, Disponivel, Eliminado...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `genero`
--

CREATE TABLE `genero` (
  `genero_id` int(9) NOT NULL,
  `nome` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `genero`
--

INSERT INTO `genero` (`genero_id`, `nome`) VALUES
(1, 'Rock'),
(2, 'Hip Hop'),
(3, 'Jazz'),
(4, 'Pop'),
(5, 'Funk'),
(6, 'Reggaeton'),
(7, 'R&B'),
(8, 'Rap'),
(9, 'Country'),
(10, 'Eletronic'),
(11, 'Indie'),
(12, 'Kpop');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gravadora`
--

CREATE TABLE `gravadora` (
  `gravadora_id` int(9) NOT NULL,
  `nome` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `gravadora`
--

INSERT INTO `gravadora` (`gravadora_id`, `nome`) VALUES
(1, 'Oppium'),
(2, 'Sony'),
(3, 'Universal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_noticia`
--

CREATE TABLE `imagem_noticia` (
  `imagem_id` int(11) NOT NULL,
  `noticia_id` int(11) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `local` char(1) NOT NULL COMMENT 'N- noticia, F- frente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `imagem_noticia`
--

INSERT INTO `imagem_noticia` (`imagem_id`, `noticia_id`, `imagem`, `descricao`, `local`) VALUES
(1, 1, 'img/noticias/utopia-f.jpg', 'Foto do Album', 'F'),
(2, 2, 'img/noticias/primavera-sound-f.jpg', 'Imagem do primavera sound', 'F'),
(3, 2, 'img/noticias/primavera-sound-n2.jpg', 'Imagem de um primavera sound anterior', 'N'),
(4, 1, 'img/noticias/utopia-n.jpg', 'Imagem do Vinil', 'N'),
(5, 1, 'img/noticias/utopia-n2.jpg', 'Imagem do Artista', 'N'),
(6, 2, 'img/noticias/primavera-sound-n.jpg', 'Imagem do cartaz', 'N'),
(42, 6, 'img/noticias/Eventoss.PNG', 'Evento', 'N'),
(43, 6, 'img/noticias/eventos.PNG', 'Imagem da página de eventos', 'F');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_principal`
--

CREATE TABLE `imagem_principal` (
  `imagem_id` int(11) NOT NULL,
  `imagem` varchar(200) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `subtitulo` varchar(100) NOT NULL,
  `botao` varchar(100) NOT NULL,
  `link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `imagem_principal`
--

INSERT INTO `imagem_principal` (`imagem_id`, `imagem`, `descricao`, `titulo`, `subtitulo`, `botao`, `link`) VALUES
(1, 'img/banners/primavera-sound.jpeg', 'Evento Primavera Sound', 'Primavera Sound', 'Porto', 'Ver Evento', 'https://www.primaverasound.com/pt/porto'),
(2, 'img/banners/starboy.png', 'Novo Album Starboy', 'Starboy', 'Novo Album!!!', 'Comprar', 'index.php?op=7&v=16'),
(3, 'img/banners/thriller.png', 'Novo album Thriller', 'Thriller', 'Novo Album!!!', 'Comprar', 'index.php?op=7&v=47');

-- --------------------------------------------------------

--
-- Estrutura da tabela `imagem_vinil`
--

CREATE TABLE `imagem_vinil` (
  `imagem_id` int(9) NOT NULL,
  `vinil_id` int(9) NOT NULL,
  `imagem` varchar(500) NOT NULL,
  `descricao` char(1) NOT NULL COMMENT 'I- Imagem ,F- Front, B- Back,'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `imagem_vinil`
--

INSERT INTO `imagem_vinil` (`imagem_id`, `vinil_id`, `imagem`, `descricao`) VALUES
(1, 7, 'img/vinis/Around-the-Fur.png', 'I'),
(8, 10, 'img/vinis/The-Bends.jpg', 'I'),
(9, 14, 'img/vinis/future-nostalgia.jpg', 'I'),
(10, 15, 'img/vinis/harry-house.jpg', 'I'),
(11, 16, 'img/vinis/starboy.jpg', 'I'),
(12, 17, 'img/vinis/to-pimp-a-butterfly.jpg', 'I'),
(13, 18, 'img/vinis/graduation.jpg', 'I'),
(14, 19, 'img/vinis/utopia.jpg', 'I'),
(15, 20, 'img/vinis/the-world-we-knew.jpg', 'I'),
(16, 21, 'img/vinis/i-put-a-spell-on-you.jpg', 'I'),
(17, 22, 'img/vinis/duets-an-american-classic.jpg', 'I'),
(19, 24, 'img/vinis/speakers-in-the-house.jpg', 'I'),
(21, 23, 'img/vinis/get-on-up.jpg', 'I'),
(22, 26, 'img/vinis/one-thing-at-a-time.jpg', 'I'),
(23, 27, 'img/vinis/this-one-for-you-too-deluxe-edition.jpg', 'I'),
(25, 32, 'img/vinis/un-verano-sin-ti.jpg', 'I'),
(26, 33, 'img/vinis/barrio-fino.jpg', 'I'),
(27, 34, 'img/vinis/OASIS.jpg', 'I'),
(28, 37, 'img/vinis/happier.jpg', 'I'),
(29, 35, 'img/vinis/true.jpg', 'I'),
(30, 36, 'img/vinis/random-acess-memories.jpg', 'I'),
(31, 42, 'img/vinis/the-eminem-show.jpg', 'I'),
(32, 43, 'img/vinis/life-after-death-2014.jpg', 'I'),
(33, 41, 'img/vinis/demon-days.jpg', 'I'),
(34, 45, 'img/vinis/AM.jpg', 'I'),
(35, 44, 'img/vinis/be-the-cowboy.jpg', 'I'),
(36, 46, 'img/vinis/dark-red.jpg', 'I'),
(40, 49, 'img/vinis/aretha-now.jpg', 'I'),
(41, 47, 'img/vinis/thriller.jpg', 'I'),
(58, 75, 'img/vinis/wunderland-b.jpg', 'I'),
(59, 75, 'img/vinis/wunderland-f.jpg', 'F'),
(60, 75, 'img/vinis/wunderland-i.jpg', 'B'),
(76, 50, 'img/vinis/be.jpg', 'I'),
(77, 51, 'img/vinis/the-album.jpg', 'I'),
(78, 52, 'img/vinis/cupid.jpg', 'I'),
(97, 92, 'img/vinis/R (1) - Copy.jpeg', 'I'),
(98, 92, 'img/vinis/R (1).jpeg', 'F'),
(99, 92, 'img/vinis/R (2) - Copy.jpeg', 'B'),
(100, 7, 'img/vinis/Around-the-Fur-f.png', 'F'),
(101, 7, 'img/vinis/Around-the-Fur-b.png', 'B'),
(102, 10, 'img/vinis/The-Bends-f.jpg', 'F'),
(103, 10, 'img/vinis/The-Bends-b.jpg', 'B'),
(104, 14, 'img/vinis/future-nostalgia-f.jpg', 'F'),
(105, 14, 'img/vinis/future-nostalgia-b.jpg', 'B'),
(106, 15, 'img/vinis/harry-house-f.jpg', 'F'),
(107, 15, 'img/vinis/harry-house-b.jpg', 'B'),
(108, 16, 'img/vinis/starboy-f.jpg', 'F'),
(109, 16, 'img/vinis/starboy-b.jpg', 'B'),
(110, 17, 'img/vinis/to-pimp-a-butterfly-f.jpg', 'F'),
(111, 17, 'img/vinis/to-pimp-a-butterfly-b.jpg', 'B'),
(112, 18, 'img/vinis/graduation-f.jpg', 'F'),
(113, 18, 'img/vinis/graduation-b.jpg', 'B'),
(114, 19, 'img/vinis/utopia-f.jpg', 'F'),
(115, 19, 'img/vinis/utopia-b.jpg', 'B'),
(116, 20, 'img/vinis/the-world-we-knew-f.jpg', 'F'),
(117, 20, 'img/vinis/the-world-we-knew-b.jpg', 'B'),
(118, 21, 'img/vinis/i-put-a-spell-on-you-f.jpg', 'F'),
(119, 21, 'img/vinis/i-put-a-spell-on-you-b.jpg', 'B'),
(120, 22, 'img/vinis/duets-an-american-classic-f.jpg', 'F'),
(121, 22, 'img/vinis/duets-an-american-classic-b.jpg', 'B'),
(122, 23, 'img/vinis/get-on-up-f.jpg', 'F'),
(123, 23, 'img/vinis/get-on-up-b.jpg', 'B'),
(124, 24, 'img/vinis/speakers-in-the-house-f.jpg', 'F'),
(125, 24, 'img/vinis/speakers-in-the-house-b.jpg', 'B'),
(126, 26, 'img/vinis/one-thing-at-a-time-f.jpg', 'F'),
(127, 26, 'img/vinis/one-thing-at-a-time-b.jpg', 'B'),
(128, 27, 'img/vinis/this-one-for-you-too-deluxe-edition-f.jpg', 'F'),
(129, 27, 'img/vinis/this-one-for-you-too-deluxe-edition-b.jpg', 'B'),
(130, 32, 'img/vinis/un-verano-sin-ti-f.jpg', 'F'),
(131, 32, 'img/vinis/un-verano-sin-ti-b.jpg', 'B'),
(132, 33, 'img/vinis/barrio-fino-f.jpg', 'F'),
(133, 33, 'img/vinis/barrio-fino-b.jpg', 'B'),
(134, 34, 'img/vinis/OASIS-f.jpg', 'F'),
(135, 34, 'img/vinis/OASIS-b.jpg', 'B'),
(136, 35, 'img/vinis/true-f.jpg', 'F'),
(137, 35, 'img/vinis/true-b.jpg', 'B'),
(138, 36, 'img/vinis/random-acess-memories-f.jpg', 'F'),
(139, 36, 'img/vinis/random-acess-memories-b.jpg', 'B'),
(140, 37, 'img/vinis/happier-f.jpg', 'F'),
(141, 37, 'img/vinis/happier-b.jpg', 'B'),
(142, 41, 'img/vinis/demon-days-f.jpg', 'F'),
(143, 41, 'img/vinis/demon-days-b.jpg', 'B'),
(144, 42, 'img/vinis/the-eminem-show-f.jpg', 'F'),
(145, 42, 'img/vinis/the-eminem-show-b.jpg', 'B'),
(146, 43, 'img/vinis/life-after-death-2014-f.jpg', 'F'),
(147, 43, 'img/vinis/life-after-death-2014-b.jpg', 'B'),
(148, 44, 'img/vinis/be-the-cowboy-f.jpg', 'F'),
(149, 44, 'img/vinis/be-the-cowboy-b.jpg', 'B'),
(150, 45, 'img/vinis/AM-f.jpg', 'F'),
(151, 45, 'img/vinis/AM-b.jpg', 'B'),
(152, 46, 'img/vinis/dark-red-f.jpg', 'F'),
(153, 46, 'img/vinis/dark-red-b.jpg', 'B'),
(154, 47, 'img/vinis/thriller-f.jpg', 'F'),
(155, 47, 'img/vinis/thriller-b.jpg', 'B'),
(156, 49, 'img/vinis/aretha-now-f.jpg', 'F'),
(157, 49, 'img/vinis/aretha-now-b.jpg', 'B'),
(158, 50, 'img/vinis/be-f.jpg', 'F'),
(159, 50, 'img/vinis/be-b.jpg', 'B'),
(160, 51, 'img/vinis/the-album-f.jpg', 'F'),
(161, 51, 'img/vinis/the-album-b.jpg', 'B'),
(162, 52, 'img/vinis/cupid-f.jpg', 'F'),
(163, 52, 'img/vinis/cupid-b.jpg', 'B'),
(164, 75, 'img/vinis/wunderland-b-f.jpg', 'F'),
(165, 75, 'img/vinis/wunderland-b-b.jpg', 'B'),
(166, 75, 'img/vinis/wunderland-f-f.jpg', 'F'),
(167, 75, 'img/vinis/wunderland-f-b.jpg', 'B'),
(168, 92, 'img/vinis/R (1) - Copy-f.jpeg', 'F'),
(169, 92, 'img/vinis/R (1) - Copy-b.jpeg', 'B'),
(170, 92, 'img/vinis/R (1)-f.jpeg', 'F'),
(171, 92, 'img/vinis/R (1)-b.jpeg', 'B'),
(172, 92, 'img/vinis/R (2) - Copy-f.jpeg', 'F'),
(173, 92, 'img/vinis/R (2) - Copy-b.jpeg', 'B');

-- --------------------------------------------------------

--
-- Estrutura da tabela `lista_desejos`
--

CREATE TABLE `lista_desejos` (
  `utilizador_id` int(9) NOT NULL,
  `vinil_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `lista_desejos`
--

INSERT INTO `lista_desejos` (`utilizador_id`, `vinil_id`) VALUES
(44, 7),
(44, 14),
(44, 10),
(44, 15),
(44, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `logfile`
--

CREATE TABLE `logfile` (
  `logfile_id` int(9) NOT NULL,
  `Date` date NOT NULL,
  `User_id` int(9) NOT NULL,
  `operacao` varchar(100) NOT NULL COMMENT 'Insert, Update, Delete',
  `descricao` text NOT NULL COMMENT 'Comando SQL ou SQL exception'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `logfile`
--

INSERT INTO `logfile` (`logfile_id`, `Date`, `User_id`, `operacao`, `descricao`) VALUES
(2, '2024-07-11', 43, 'Insert', 'INSERT INTO vinil VALUES\r\n    (null, \'Houdini\', \'dsffdgdsfdsf\', \'Single\', \'35\', \'2\', \'3\', \'LP\', \'987123456\', \'2024-05-31\', \'2024-07-11\', \'29.99\', \r\n    \'300\', \'\',\'0\',\'23\',\'\',\'Publico\')'),
(3, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(4, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Desativado\' WHERE vinil_id = 7 '),
(5, '2024-07-11', 43, 'Delete', 'UPDATE vinil set status = \'Desativado\' WHERE vinil_id = 7'),
(6, '2024-07-11', 43, 'Update', 'UPDATE vinil set status = \'Desativado\' WHERE vinil_id = 7'),
(7, '2024-07-11', 43, 'Update', 'UPDATE vinil set status = \'Desativado\' WHERE vinil_id = 7'),
(8, '2024-07-11', 43, 'Update', 'UPDATE vinil set status = \'Desativado\' WHERE vinil_id = 7'),
(9, '2024-07-11', 43, 'Update', 'UPDATE vinil set status = \'Publico\' WHERE vinil_id = 7'),
(10, '2024-07-11', 43, 'Update', 'UPDATE vinil set status = \'Desativado\' WHERE vinil_id = 7'),
(11, '2024-07-11', 43, 'Update', 'UPDATE vinil set status = \'Desativado\' WHERE vinil_id = 10'),
(15, '2024-07-11', 43, 'Update', 'UPDATE vinil set status = \'Publico\' WHERE vinil_id = 10'),
(16, '2024-07-11', 43, 'Update', 'UPDATE vinil set status = \'Desativado\' WHERE vinil_id = 7'),
(17, '2024-07-11', 43, 'Update', 'UPDATE utilizador set status = \'Bloqueado\' where utilizador_id = 50'),
(18, '2024-07-11', 43, 'Update', 'UPDATE utilizador  SET\r\n     email = \'feyiv11241@carspure.com\', login =  \'feye\', tipo = \'U\', nome = \'asdadassa\', apelido = \'asdsa\', telemovel = \'123456789\', \r\n     rua = \'sdfs\', codigo_postal = \'1123-456\', cidade = \'sdfsf\', pais = \'Portugal\', distrito = \'Porto\', metodopagamento_id = null, metodoenvio_id = null, status = \'pendente\' WHERE utilizador_id = 69'),
(19, '2024-07-11', 43, 'Insert', 'INSERT INTO utilizador  VALUES \r\n   (null,\'zxzzzxzxzz@gmail.com\', \'asdsa\', SHA1(\'asddsasda\'), \'U\', \'asda\', \'asdada\', \'943543575\', \'sds\', \'1234-233\',\'fdsd\', \'Bosnia and Herzegovina (Босна и Херцеговина)\', \'Porto\', null, 1,\'pendente\')'),
(22, '2024-07-11', 43, 'Update', 'UPDATE encomenda  SET \r\n     rua = \'Rua Ramalho Ortigão, 167\', codigo_postal = \'1234-233\', cidade = \'Vila Nova de Gaia\', pais = \'Paraguay\', distrito = \'Porto\', status = \'Pedido Recebido\'\r\n     WHERE encomenda_id = 24'),
(23, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Desativado\' WHERE vinil_id = 7 '),
(24, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Desativado\' WHERE vinil_id = 7 '),
(25, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Desativado\' WHERE vinil_id = 7 '),
(26, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Desativado\' WHERE vinil_id = 7 '),
(27, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Desativado\' WHERE vinil_id = 7 '),
(28, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Desativado\' WHERE vinil_id = 7 '),
(29, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Desativado\' WHERE vinil_id = 7 '),
(30, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Desativado\' WHERE vinil_id = 7 '),
(31, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(32, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(33, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(34, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(35, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(36, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(37, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(38, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(39, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(40, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(41, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(42, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(43, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(44, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(45, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(46, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(47, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(48, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(49, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(50, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(51, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(52, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(53, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(54, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(55, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(56, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(57, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(58, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(59, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(60, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(61, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(62, '2024-07-11', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-06\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'2\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(63, '2024-07-11', 43, 'Insert', 'INSERT INTO vinil VALUES\r\n    (null, \'HOUDINI\', \'AISHITE AISHITE\', \'Single\', \'35\', \'2\', \'3\', \'LP\', \'987123456\', \'2024-05-31\', \'2024-07-11\', \'45.99\', \r\n    \'323\', \'23\',\'0\',\'3\',\'\',\'Publico\')'),
(64, '2024-07-11', 43, 'Update', 'UPDATE vinil set status = \'Desativado\' WHERE vinil_id = 10'),
(65, '2024-07-11', 43, 'Update', 'UPDATE vinil set status = \'Publico\' WHERE vinil_id = 10'),
(66, '2024-07-14', 43, 'Update', 'UPDATE encomenda  SET \r\n     rua = \'sadfds\', codigo_postal = \'5123-465\', cidade = \'Porto\', pais = \'Portugal\', distrito = \'Porto\', status = \'Entregue\'\r\n     WHERE encomenda_id = 31'),
(67, '2024-07-14', 43, 'Insert', 'INSERT INTO vinil VALUES \r\n    (null, \'Elephant\', \'Teste teste elephant\', \'Album\', \'54\', \'1\', \'3\', \'LP\', \'012345678\', \'2024-07-14\', \'2003-04-01\', \'45.99\', \r\n    \'250\', \'34\',\'\',\'\',\'\',\'Publico\')'),
(68, '2024-07-14', 43, 'Insert', 'INSERT INTO vinil VALUES \r\n    (null, \'Elephant\', \'Teste Teste ELepaht\', \'Album\', \'54\', \'1\', \'3\', \'LP\', \'12315312\', \'2003-04-01\', \'2024-07-14\', \'29.99\', \r\n    \'232\', \'\',\'\',\'\',\'\',\'Publico\')'),
(69, '2024-07-14', 43, 'Update', 'UPDATE  vinil SET nome = \'Elephant\', descricao = \'Teste Teste ELepaht\', tipo = \'Album\', artista_id = \'54\', genero_id = \'1\', gravadora_id = \'3\', formato = \'LP\',\r\n    catalogo_numero = \'12315312\', data_lancamento = \'2003-04-01\', data = \'2024-07-14\', preco = \'29.99\', peso = \'232\', Qtd_stock = \'0\', Qtd_vistas = \'0\', \r\n    Qtd_comprados = \'0\', desconto = \'0\', status = \'Publico\' WHERE vinil_id = 92 '),
(70, '2024-07-14', 43, 'Update', 'UPDATE  vinil SET nome = \'Elephanta\', descricao = \'Teste Teste ELepahta\', tipo = \'Ep\', artista_id = \'17\', genero_id = \'2\', gravadora_id = \'1\', formato = \'7\\\"\',\r\n    catalogo_numero = \'12313312\', data_lancamento = \'2003-04-02\', data = \'2024-07-13\', preco = \'21.99\', peso = \'300\', Qtd_stock = \'0\', Qtd_vistas = \'0\', \r\n    Qtd_comprados = \'0\', desconto = \'1\', status = \'Publico\' WHERE vinil_id = 92 '),
(71, '2024-07-14', 43, 'Update', 'UPDATE  vinil SET nome = \'Elephant\', descricao = \'Teste Teste ELepaht\', tipo = \'Album\', artista_id = \'54\', genero_id = \'1\', gravadora_id = \'3\', formato = \'LP\',\r\n    catalogo_numero = \'12313312\', data_lancamento = \'2003-04-01\', data = \'2024-07-14\', preco = \'24.99\', peso = \'300\', Qtd_stock = \'0\', Qtd_vistas = \'0\', \r\n    Qtd_comprados = \'0\', desconto = \'0\', status = \'Publico\' WHERE vinil_id = 92 '),
(72, '2024-07-14', 43, 'Update', 'UPDATE  vinil SET nome = \'Elephant\', descricao = \'Teste Teste ELepaht\', tipo = \'Album\', artista_id = \'54\', genero_id = \'1\', gravadora_id = \'3\', formato = \'LP\',\r\n    catalogo_numero = \'12313312\', data_lancamento = \'2003-04-01\', data = \'2024-07-14\', preco = \'24.99\', peso = \'300\', Qtd_stock = \'0\', Qtd_vistas = \'0\', \r\n    Qtd_comprados = \'0\', desconto = \'0\', status = \'Publico\' WHERE vinil_id = 92 '),
(73, '2024-07-14', 43, 'Update', 'UPDATE  vinil SET nome = \'Elephant\', descricao = \'Teste Teste ELepaht\', tipo = \'Album\', artista_id = \'54\', genero_id = \'1\', gravadora_id = \'3\', formato = \'LP\',\r\n    catalogo_numero = \'12313312\', data_lancamento = \'2003-04-01\', data = \'2024-07-14\', preco = \'24.99\', peso = \'300\', Qtd_stock = \'0\', Qtd_vistas = \'0\', \r\n    Qtd_comprados = \'0\', desconto = \'0\', status = \'Publico\' WHERE vinil_id = 92 '),
(74, '2024-07-14', 43, 'Update', 'UPDATE vinil set status = \'Desativado\' WHERE vinil_id = 92'),
(75, '2024-07-14', 43, 'Update', 'UPDATE vinil set status = \'Publico\' WHERE vinil_id = 92'),
(76, '2024-07-14', 43, 'Insert', 'INSERT INTO utilizador  VALUES \r\n   (null,\'teste@gmail.ccom\', \'EURPAPAAAA\', SHA1(\'PA\'), \'U\', \'Wunderland\', \'Moreiras\', \'943543575\', \'Rua Ramalho Ortigão, 167\', \'1234-233\',\'Vila Nova de Gayaaaa\', \'Bermuda\', \'Portoa\', null, null,\'Ativo\')'),
(77, '2024-07-14', 43, 'Update', 'UPDATE utilizador  SET\r\n     email = \'teste@gmail.ccoma\', login =  \'EURPAPAAAA\', tipo = \'G\', nome = \'Wunderlands\', apelido = \'Moreirass\', telemovel = \'943543575\', \r\n     rua = \'Rua Ramalho Ortigão, 1672\', codigo_postal = \'2234-233\', cidade = \'Vila Nova de Gaia\', pais = \'Bolivia\', distrito = \'Portoas\', metodopagamento_id = 2, metodoenvio_id = 1, status = \'Ativo\', password = SHA1(\'39a0f31b2a7446e0041c02281ac2fd664aeae8e6\') WHERE utilizador_id = 71'),
(78, '2024-07-14', 43, 'Update', 'UPDATE utilizador  SET\r\n     email = \'teste@gmail.ccoma\', login =  \'EURPAPAAAA\', tipo = \'G\', nome = \'Wunderlands\', apelido = \'Moreirass\', telemovel = \'943543575\', \r\n     rua = \'Rua Ramalho Ortigão, 1672\', codigo_postal = \'2234-233\', cidade = \'Vila Nova de Gaia\', pais = \'Bolivia\', distrito = \'Portoas\', metodopagamento_id = 2, metodoenvio_id = 1, status = \'Ativo\', password = SHA1(\'PAU\') WHERE utilizador_id = 71'),
(79, '2024-07-14', 43, 'Update', 'UPDATE utilizador  SET\r\n     email = \'teste@gmail.ccoma\', login =  \'EURPAPAAAA\', tipo = \'G\', nome = \'Wunderlands\', apelido = \'Moreirass\', telemovel = \'943543575\', \r\n     rua = \'Rua Ramalho Ortigão, 1672\', codigo_postal = \'2234-233\', cidade = \'Vila Nova de Gaia\', pais = \'Bolivia\', distrito = \'Portoasa\', metodopagamento_id = 2, metodoenvio_id = 1, status = \'Ativo\' WHERE utilizador_id = 71'),
(80, '2024-07-14', 43, 'Update', 'UPDATE utilizador set status = \'Bloqueado\' where utilizador_id = 71'),
(81, '2024-07-14', 43, 'Update', 'UPDATE utilizador set status = \'Bloqueado\' where utilizador_id = 71'),
(82, '2024-07-14', 43, 'Update', 'UPDATE utilizador set status = \'Bloqueado\' where utilizador_id = 71'),
(83, '2024-07-14', 43, 'Update', 'UPDATE utilizador set status = \'Bloqueado\' where utilizador_id = 71'),
(84, '2024-07-14', 43, 'Update', 'UPDATE utilizador set status = \'Bloqueado\' where utilizador_id = 71'),
(85, '2024-07-14', 43, 'Update', 'UPDATE utilizador set status = \'Ativo\' where utilizador_id = 71'),
(86, '2024-07-14', 43, 'Update', 'UPDATE encomenda  SET \r\n     rua = \'Rua Ramalho sOrtigão, 167x\', codigo_postal = \'1234-212\', cidade = \'Vila Nova de GaY\', pais = \'Azerbaijan (Azərbaycan)\', distrito = \'Porto\', status = \'Transporte\'\r\n     WHERE encomenda_id = 17'),
(87, '2024-07-14', 43, 'Update', 'UPDATE encomenda set status = \'Pedido Excluido\' where encomenda_id = 17'),
(88, '2024-07-14', 43, 'Update', 'UPDATE  vinil SET nome = \'Wunderland\', descricao = \'bla blablasdadasd\', tipo = \'EP\', artista_id = \'46\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'123421234\', data_lancamento = \'2024-06-25\', data = \'2024-06-26\', preco = \'12.00\', peso = \'123\', Qtd_stock = \'5\', Qtd_vistas = \'5\', \r\n    Qtd_comprados = \'3\', desconto = \'0\', status = \'Publico\' WHERE vinil_id = 75 '),
(89, '2024-07-14', 43, 'Update', 'UPDATE  vinil SET nome = \'Around the Fur\', descricao = \'aasdsaaa\', tipo = \'Album\', artista_id = \'9\', genero_id = \'1\', gravadora_id = \'2\', formato = \'LP\',\r\n    catalogo_numero = \'567890123\', data_lancamento = \'1997-10-28\', data = \'2024-07-12\', preco = \'39.00\', peso = \'455\', Qtd_stock = \'0\', Qtd_vistas = \'6\', \r\n    Qtd_comprados = \'3\', desconto = \'60\', status = \'Publico\' WHERE vinil_id = 7 '),
(90, '2024-07-15', 43, 'Update', 'UPDATE  vinil SET nome = \'Graduation\', descricao = \'\', tipo = \'Album\', artista_id = \'17\', genero_id = \'8\', gravadora_id = \'3\', formato = \'LP\',\r\n    catalogo_numero = \'456987123\', data_lancamento = \'2007-09-11\', data = \'2024-07-12\', preco = \'21.99\', peso = \'334\', Qtd_stock = \'23\', Qtd_vistas = \'0\', \r\n    Qtd_comprados = \'12\', desconto = \'\', status = \'Publico\' WHERE vinil_id = 18 '),
(91, '2024-07-15', 43, 'Update', 'UPDATE  vinil SET nome = \'Demon Days\', descricao = \'Albu\', tipo = \'Album\', artista_id = \'34\', genero_id = \'2\', gravadora_id = \'3\', formato = \'LP\',\r\n    catalogo_numero = \'111000999\', data_lancamento = \'2005-05-23\', data = \'2024-05-24\', preco = \'19.99\', peso = \'444\', Qtd_stock = \'12\', Qtd_vistas = \'1\', \r\n    Qtd_comprados = \'50\', desconto = \'\', status = \'Publico\' WHERE vinil_id = 41 ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `metodo_envio`
--

CREATE TABLE `metodo_envio` (
  `MetodoEnvio_id` int(9) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `preco` float(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `metodo_envio`
--

INSERT INTO `metodo_envio` (`MetodoEnvio_id`, `nome`, `descricao`, `preco`) VALUES
(1, 'CTT', 'A encomenda será enviada através da transportadora CTT com o custo de 9,99€. A encomenda será entregue em 10-15 dias úteis.', 9.99),
(4, 'DPD', 'A encomenda será enviada através da transportadora DPD com o custo de 14,99€. A encomenda será entregue em 1-3 dias úteis.', 14.99);

-- --------------------------------------------------------

--
-- Estrutura da tabela `metodo_pagamento`
--

CREATE TABLE `metodo_pagamento` (
  `MetodoPagamento_id` int(11) NOT NULL,
  `Nome` varchar(150) NOT NULL,
  `descricao` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `metodo_pagamento`
--

INSERT INTO `metodo_pagamento` (`MetodoPagamento_id`, `Nome`, `descricao`) VALUES
(2, 'Cartão de Crédito', 'Podes pagar com Visa, Mastercard. Podes pagar no final da encomenda ao clicar no botão comprar colocando todos os dados do seu cartão'),
(3, 'PayPal', 'Podes pagar com PayPal. Podes pagar no final da encomenda ao clicar no botão comprar colocando a sua conta do PayPal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `musica`
--

CREATE TABLE `musica` (
  `musica_id` int(9) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `lado` char(2) NOT NULL,
  `preview` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `musica`
--

INSERT INTO `musica` (`musica_id`, `nome`, `lado`, `preview`) VALUES
(17, 'My Own Summer (Shove It)', 'A1', 'https://open.spotify.com/embed/track/1158ckiB5S4cpsdYHDB9IF?utm_source=generator'),
(18, 'Lhabia', 'A2', 'https://open.spotify.com/embed/track/28q0pUwcJRS2tGZsYH6xL5?utm_source=generator'),
(19, 'Lotion', 'A3', 'https://open.spotify.com/embed/track/7iiULg8Kmbnh1vWbh9rnBA?utm_source=generator'),
(20, 'Just', 'A1', 'https://open.spotify.com/embed/track/1dyTcli07c77mtQK3ahUZR?utm_source=generator&theme=0'),
(21, 'High and Dry', 'A2', 'https://open.spotify.com/embed/track/2a1iMaoWQ5MnvLFBDv4qkf?utm_source=generator&theme=0'),
(22, 'Fake Plastic Trees', 'A3', 'https://open.spotify.com/embed/track/73CKjW3vsUXRpy3NnX4H7F?utm_source=generator&theme=0'),
(26, 'Levitating (feat. DaBaby)', 'A1', 'https://open.spotify.com/embed/track/13XqsZn5dWZ6mhaL8IyUw6?utm_source=generator'),
(27, 'Love Again', 'A2', 'https://open.spotify.com/embed/track/2V8CmjYqBXszQmZlA9CvtX?utm_source=generator'),
(28, 'Cool', 'A3', 'https://open.spotify.com/embed/track/2U9dDFMtSXyniF0uGW4CF2?utm_source=generator'),
(29, 'As It Was', 'A1', 'https://open.spotify.com/embed/track/4Dvkj6JhhA12EX05fT7y2e?utm_source=generator'),
(30, 'Cinema', 'A2', 'https://open.spotify.com/embed/track/35TyJIMR3xRouUuo2sjS6v?utm_source=generator'),
(31, 'Daylight', 'A3', 'https://open.spotify.com/embed/track/51Zw1cKDgkad0CXv23HCMU?utm_source=generator'),
(32, 'Starboy', 'A1', 'https://open.spotify.com/embed/track/7MXVkk9YMctZqd1Srtv4MB?utm_source=generator'),
(33, 'Die For You', 'A2', 'https://open.spotify.com/embed/track/2Ch7LmS7r2Gy2kc64wv3Bz?utm_source=generator'),
(34, 'All I Know', 'A3', 'https://open.spotify.com/embed/track/0NWqNXBJTpXbkI5rPWNy3p?utm_source=generator'),
(35, 'I', 'A1', 'https://open.spotify.com/embed/track/3ODXRUPL44f04cCacwiCLC?utm_source=generator'),
(36, 'King Kunta', 'A2', 'https://open.spotify.com/embed/track/0N3W5peJUQtI4eyR6GJT5O?utm_source=generator'),
(37, 'Alright', 'A3', 'https://open.spotify.com/embed/track/3iVcZ5G6tvkXZkZKlMpIUs?utm_source=generator'),
(38, 'Good Morning', 'A1', 'https://open.spotify.com/embed/track/6MXXY2eiWkpDCezVCc0cMH?utm_source=generator'),
(39, 'Champion', 'A2', 'https://open.spotify.com/embed/track/4UQMOPSUVJVicIQzjAcRRZ?utm_source=generator'),
(40, 'Stronger', 'A3', 'https://open.spotify.com/embed/track//0j2T0R9dR9qdJYsB7ciXhf?utm_source=generator'),
(41, 'FE!N (feat. Playboi Carti)', 'A1', 'https://open.spotify.com/embed/track/42VsgItocQwOQC3XWZ8JNA?utm_source=generator'),
(42, 'THANK GOD', 'A2', 'https://open.spotify.com/embed/track/1PH2MDbcBAU094DlgTIND1?utm_source=generator'),
(43, 'I KNOW?', 'A3', 'https://open.spotify.com/embed/track/6wsqVwoiVH2kde4k4KKAFU?utm_source=generator'),
(44, 'This Is My Love', 'A1', 'https://open.spotify.com/embed/track/127BTXG9UgUWPDrIEbHxuK?utm_source=generator'),
(45, 'You Are There', 'A2', 'https://open.spotify.com/embed/track/2CoTCYjp9RKq4KPeu9HOmh?utm_source=generator'),
(46, 'This Town', 'A3', 'https://open.spotify.com/embed/track/13qzHYbEqzcq34eZzYsKIs?utm_source=generator'),
(47, 'Feeling Good', 'A1', 'https://open.spotify.com/embed/track/6Rqn2GFlmvmV4w9Ala0I1e?utm_source=generator'),
(48, 'I Put A Spell On You', 'A2', 'https://open.spotify.com/embed/track/0sjxRg1VlYfx4YG7uxurrq?utm_source=generator'),
(49, 'July Tree', 'A3', 'https://open.spotify.com/embed/track/6CqX2ZEoFm854CRVAbmhby?utm_source=generator'),
(50, 'Because of You', 'A1', 'https://open.spotify.com/embed/track/1hVEHu6SemMvlYAP5MWkDj?utm_source=generatorA'),
(51, 'Smile (with Barbra Streisand)', 'A2', 'https://open.spotify.com/embed/track/2nXdwNjPLt1F51vCBWSnnX?utm_source=generator'),
(52, 'If I Ruled the World (CÃ©lÃ¬ne Dion)', 'A3', 'https://open.spotify.com/embed/track/57GQHVnq4UIAgxU38lJwUC?utm_source=generator'),
(53, 'Clever Girl', 'A1', 'https://open.spotify.com/embed/track/36ah2OVrFr7zFQgjMm9Xcw?utm_source=generator'),
(54, 'What Is Hip?', 'A2', 'https://open.spotify.com/embed/track/66TSoVnJ1P9Tyok03zUlTr?utm_source=generator'),
(55, 'Just Another Day', 'A3', 'https://open.spotify.com/embed/track/7rIRVdWTwHCYMMgRmLuAai?utm_source=generator'),
(56, 'Out Of Sight', 'A1', 'https://open.spotify.com/embed/track/4YnmnuwKxJ3apVPkB3ygt4?utm_source=generator'),
(57, 'Caldonia', 'A2', 'https://open.spotify.com/embed/track/3ERdSYicyIi1e9Wk7diCGY?utm_source=generator'),
(58, 'The Playback - Part 1', 'A3', 'https://open.spotify.com/embed/track/2FYC7TFj3ZEukBoulVtvf7?utm_source=generator'),
(59, 'Kongo Square', 'A1', 'https://open.spotify.com/embed/track/16dr3yEnLH4oNoRxdG6a7s?utm_source=generator'),
(60, 'HH 75', 'A2', 'https://open.spotify.com/embed/track/7tdWh5uY7mhaNdnZMNy9xP?utm_source=generator'),
(61, 'Stoop', 'A3', 'https://open.spotify.com/embed/track/3KcYJRddebZVWToAhgoUxs?utm_source=generator'),
(62, 'Last Night', 'A1', 'https://open.spotify.com/embed/track/7K3BhSpAxZBznislvUMVtn?utm_source=generator'),
(63, 'You Proof', 'A2', 'https://open.spotify.com/embed/track/5W4kiM2cUYBJXKRudNyxjW?utm_source=generator'),
(64, 'Thinkin\'Bout Me', 'A3', 'https://open.spotify.com/embed/track/0PAcdVzhPO4gq1Iym9ESnK?utm_source=generator'),
(65, 'Beatiful Crazy', 'A1', 'https://open.spotify.com/embed/track/2rxQMGVafnNaRaXlRMWPde?utm_source=generator'),
(66, 'She Got the Best of Me', 'A2', 'https://open.spotify.com/embed/track/698eQRku24PIYPQPHItKlA?utm_source=generator'),
(67, 'One Number Away', 'A3', 'https://open.spotify.com/embed/track/7ElHqs46U65NOaSwha2eMv?utm_source=generator'),
(68, 'What Ifs (feat. Lauren Alaina)', 'A1', 'https://open.spotify.com/embed/track/7zVCrzzEJU7u24sbJPXA5W?utm_source=generator'),
(69, 'Thunder in the Rain', 'A2', 'https://open.spotify.com/embed/track/1A8s182NfOT6dOXjPsWfTn?utm_source=generator'),
(70, 'Better Place', 'A3', 'https://open.spotify.com/embed/track/0vtKLjkpdHoysT5ZPcwgA7?utm_source=generator'),
(71, 'Me Porto Bonito', 'A1', 'https://open.spotify.com/embed/track/6Sq7ltF9Qa7SNFBsV5Cogx?utm_source=generator'),
(72, 'TitÃ­ Me PerguntÃ³', 'A2', 'https://open.spotify.com/embed/track/1IHWl5LamUGEuP4ozKQSXZ?utm_source=generator'),
(73, 'Callaita', 'A3', 'https://open.spotify.com/embed/track/71wFwRo8xGc4lrcyKwsvba?utm_source=generator'),
(74, 'Gasolina', 'A1', 'https://open.spotify.com/embed/track/228BxWXUYQPJrJYHDLOHkj?utm_source=generator'),
(75, 'Lo Que PasÃ³, PasÃ³', 'A2', 'https://open.spotify.com/embed/track/26QKsGW4hMuwiEE1ftUMHe?utm_source=generator'),
(76, 'Tu PrÃ­ncipe', 'A3', 'https://open.spotify.com/embed/track/2FNqnsX74ZlwduUAcnmzee?utm_source=generator'),
(77, 'LA CANCIÃ“N', 'A1', 'https://open.spotify.com/embed/track/0fea68AdmYNygeTGI4RC18?utm_source=generator'),
(78, 'QUE PRETENDES', 'A2', 'https://open.spotify.com/embed/track/25ZAibhr3bdlMCLmubZDVt?utm_source=generatora'),
(79, 'COMO UN BEBÃ‰', 'A3', 'https://open.spotify.com/embed/track/7knLcYCOSaURD0d7HUULFM?utm_source=generator'),
(80, 'Wake Me Up', 'A1', 'https://open.spotify.com/embed/track/0nrRP2bk19rLc0orkWPQk2?utm_source=generator'),
(81, 'Hey Brother', 'A2', 'https://open.spotify.com/embed/track/4lhqb6JvbHId48OUJGwymk?utm_source=generator'),
(82, 'Addicted To You', 'A3', 'https://open.spotify.com/embed/track/4eDYMhIin1pSLIG96f1aD0?utm_source=generator'),
(83, 'Get Lucky (feat. Pharrell Williams and Nile Rodgers)', 'A1', 'https://open.spotify.com/embed/track/69kOkLUCkxIZYexIgSG8rq?utm_source=generator'),
(84, 'Instant Crush (feat. Julian Casablancas)', 'A2', 'https://open.spotify.com/embed/track/2cGxRwrMyEAp8dEbuZaVv6?utm_source=generator'),
(85, 'Lose Yourself to Dance (feat. Pharrell Williams)', 'A3', 'https://open.spotify.com/embed/track/5CMjjywI0eZMixPeqNd75R?utm_source=generator'),
(86, 'Happier', 'A1', 'https://open.spotify.com/embed/track/7BqHUALzNBTanL6OvsqmC1?utm_source=generator'),
(87, 'Intro', 'A1', 'https://open.spotify.com/embed/track/2zavoMfVVPJMikH57fd8yK?utm_source=generator'),
(88, 'Last Living Souls', 'A2', 'https://open.spotify.com/embed/track/7JzmCjvB6bk48JghLyrg8N?utm_source=generator'),
(89, 'Kids with Guns', 'A3', 'https://open.spotify.com/embed/track/0eEgMbSzOHmkOeVuNC3E0k?utm_source=generator'),
(90, 'Without Me', 'A1', 'https://open.spotify.com/embed/track/7lQ8MOhq6IN2w8EYcFNSUk?utm_source=generator'),
(91, 'Superman', 'A2', 'https://open.spotify.com/embed/track/4woTEX1wYOTGDqNXuavlRC?utm_source=generator'),
(92, 'Till I Collapse', 'A3', 'https://open.spotify.com/embed/track/4xkOaSrkexMciUUogZKVTS?utm_source=generator'),
(93, 'Hypnotize - 2014 Remaster', 'A1', 'https://open.spotify.com/embed/track/7KwZNVEaqikRSBSpyhXK2j?utm_source=generator'),
(94, 'Mo Money Mo Problems (feat. Puff Daddy & Mase) - 2014 Remaster', 'A2', 'https://open.spotify.com/embed/track/4INDiWSKvqSKDEu7mh8HFz?utm_source=generator'),
(95, 'Notorious Thugs - 2014 Remaster', 'A3', 'https://open.spotify.com/embed/track/19FsxX4RthRMZGfXkImdCb?utm_source=generator'),
(96, 'Washing Machine Heart', 'A1', 'https://open.spotify.com/embed/track/3jjsRKEsF42ccXf8kWR3nu?utm_source=generator'),
(97, 'Nobody', 'A2', 'https://open.spotify.com/embed/track/2P5yIMu2DNeMXTyOANKS6k?utm_source=generator'),
(98, 'Me and My Husband', 'A3', 'https://open.spotify.com/embed/track/3pANfZVFdtuVnJsE6xa5Ox?utm_source=generator'),
(99, 'I Wanna Be Yours', 'A1', 'https://open.spotify.com/embed/track/5XeFesFbtLpXzIVDNQP22n?utm_source=generator'),
(100, 'Do I Wanna Know?', 'A2', 'https://open.spotify.com/embed/track/5FVd6KXrgO9B3JPmC8OPst?utm_source=generator'),
(101, 'Why\'d You Only Call Me When You\'re High?', 'A3', 'https://open.spotify.com/embed/track/086myS9r57YsLbJpU0TgK9?utm_source=generator'),
(102, 'Dark Red', 'A1', 'https://open.spotify.com/embed/track/3EaJDYHA0KnX88JvDhL9oa?utm_source=generator'),
(103, 'Billie Jean', 'A1', 'https://open.spotify.com/embed/track/7J1uxwnxfQLu4APicE5Rnj?utm_source=generator'),
(104, 'Beat It', 'A2', 'https://open.spotify.com/embed/track/3BovdzfaX4jb5KFQwoPfAw?utm_source=generator'),
(105, 'Thriller', 'A3', 'https://open.spotify.com/embed/track/2LlQb7Uoj1kKyGhlkBf9aC?utm_source=generator'),
(106, 'Sir Duke', 'A1', 'https://open.spotify.com/embed/track/4pNiE4LCVV74vfIBaUHm1b?utm_source=generator'),
(107, 'Isn\'t She Lovely', 'A2', 'https://open.spotify.com/embed/track/6RANU8AS5ICU5PEHh8BYtH?utm_source=generator'),
(108, 'I Wish', 'A3', 'https://open.spotify.com/embed/track/687YZan9Gol1UVvbpUSO6Y?utm_source=generator'),
(109, 'I Say a Litle Prayer', 'A1', 'https://open.spotify.com/embed/track/3NfxSdJnVdon1axzloJgba?utm_source=generator'),
(110, 'Think', 'A2', 'https://open.spotify.com/embed/track/4yQw7FR9lcvL6RHtegbJBh?utm_source=generator'),
(111, 'You Send Me', 'A3', 'https://open.spotify.com/embed/track/4VijLEUxHEzbWKYL5u9wuN?utm_source=generator'),
(112, 'Dynamite', 'A1', 'https://open.spotify.com/embed/track/5QDLhrAOJJdNAmCTJ8xMyW?utm_source=generator'),
(113, 'Life Goes On', 'A2', 'https://open.spotify.com/embed/track/5FVbvttjEvQ8r2BgUcJgNg?utm_source=generator'),
(114, 'Blue & Grey', 'A3', 'https://open.spotify.com/embed/track/7Ki0hse0IfXEcXUlpyECbJ?utm_source=generator'),
(115, 'How You Like That', 'A1', 'https://open.spotify.com/embed/track/4SFknyjLcyTLJFPKD2m96o?utm_source=generator'),
(116, 'Lovesick Girls', 'A2', 'https://open.spotify.com/embed/track/4Ws314Ylb27BVsvlZOy30C?utm_source=generator'),
(117, 'Ice Cream (with Selena Gomez)', 'A3', 'https://open.spotify.com/embed/track/4JUPEh2DVSXFGExu4Uxevz?utm_source=generator'),
(118, 'Cupid - Twin Ver.', 'A1', 'https://open.spotify.com/embed/track/70BZ2NRLR7fRb9xBYD4jQ0?utm_source=generator'),
(121, 'Save You', 'Sa', 'https://open.spotify.com/embed/track/2s1jovUCZA3TlWlKU7jVi5?utm_source=generator'),
(122, 'Out of My head', 'Ou', 'https://open.spotify.com/embed/track/24irrB0KIg5NON7ZBRkLr7?utm_source=generator'),
(123, 'Dead inside', 'De', 'https://open.spotify.com/embed/track/59aA9E9MK5RGXlhdUXyQVH?utm_source=generator'),
(124, 'Save You', 'A1', 'https://open.spotify.com/embed/track/2s1jovUCZA3TlWlKU7jVi5?utm_source=generator'),
(125, 'Out of My head', 'A2', 'https://open.spotify.com/embed/track/24irrB0KIg5NON7ZBRkLr7?utm_source=generator'),
(126, 'Dead inside', 'A3', 'https://open.spotify.com/embed/track/59aA9E9MK5RGXlhdUXyQVH?utm_source=generator'),
(150, 'Seven Nation Army', 'A1', 'https://open.spotify.com/embed/track/3dPQuX8Gs42Y7b454ybpMR?utm_source=generator'),
(151, 'The Hardest Button to Button', 'A2', 'https://open.spotify.com/embed/track/3RdQfyk7BBxxIx0zSnCBIw?utm_source=generator'),
(152, 'Ball and Biscuit', 'A3', 'https://open.spotify.com/embed/track/0O2SYh5AZ0y8MAPOVC4Mxz?utm_source=generator'),
(153, 'Seven Nation Army', 'A1', 'https://open.spotify.com/embed/track/3dPQuX8Gs42Y7b454ybpMR?utm_source=generator'),
(154, 'The Hardest Button to Button', 'A2', 'https://open.spotify.com/embed/track/3RdQfyk7BBxxIx0zSnCBIw?utm_source=generator'),
(155, 'Ball and Biscuit', 'A3', 'https://open.spotify.com/embed/track/0O2SYh5AZ0y8MAPOVC4Mxz?utm_source=generator'),
(156, 'Black Math', 'A3', 'https://open.spotify.com/embed/track/47daaR9V5NnoSo68Geb8wm?utm_source=generator'),
(157, 'I Wonder', 'A4', 'https://open.spotify.com/embed/track/7rbECVPkY5UODxoOUVKZnA?utm_source=generator'),
(158, 'Good Life', 'B1', 'https://open.spotify.com/embed/track/4ZPdLEztrlZqbJkgHNw54L?utm_source=generator'),
(159, 'Cant\'t Tell Me Nothing', 'B2', 'https://open.spotify.com/embed/track/0mEdbdeRFQwBhN4xfyIeUM?utm_source=generator'),
(160, 'Barry Bonds', 'B3', 'https://open.spotify.com/embed/track/7387VaiHpOsSIZ5nmjseya?utm_source=generator'),
(161, 'Drunk and Hot Girls', 'B4', 'https://open.spotify.com/embed/track/7DRuzSlhjKadgdsQRYZ0tr?utm_source=generator'),
(162, 'Flashing Lights', 'C1', 'https://open.spotify.com/embed/track/5TRPicyLGbAF2LGBFbHGvO?utm_source=generator'),
(163, 'Everything I Am', 'C2', 'https://open.spotify.com/embed/track/0NrtwAmRAdLxua31SzHvXr?utm_source=generator'),
(164, 'The Glory', 'C3', 'https://open.spotify.com/embed/track/0lWjRSzq5chA9fps3pM8Zr?utm_source=generator'),
(165, 'Homecoming', 'C4', 'https://open.spotify.com/embed/track/4iz9lGMjU1lXS51oPmUmTe?utm_source=generator'),
(166, 'Big Brother', 'D1', 'https://open.spotify.com/embed/track/2L47m9erkB5KBZcaqWtYen?utm_source=generator'),
(167, 'Good Night', 'D2', 'https://open.spotify.com/embed/track/3bhyo2ED5Yd4RLydQBDtD6?utm_source=generator'),
(168, 'O Green World', 'A4', 'https://open.spotify.com/embed/track/4hNPMfFHauPIbOKvdYqFt7?utm_source=generator'),
(169, 'Feel Good Inc', 'B1', 'https://open.spotify.com/embed/track/0d28khcov6AiegSCpG5TuT?utm_source=generator'),
(170, 'El Mañana', 'B2', 'https://open.spotify.com/embed/track/0dcMqjeDpwqB2xhzMsld0p?utm_source=generator'),
(171, 'Every Planet We Reach Is Dead', 'B3', 'https://open.spotify.com/embed/track/2pw9RZWZibttZzoFhwjuy6?utm_source=generator'),
(172, 'November Has Come', 'B4', 'https://open.spotify.com/embed/track/6lrDckuosGpwEHtm1hHBcf?utm_source=generator'),
(173, 'All Alone', 'C1', 'https://open.spotify.com/embed/track/76Ug1q4l6rGwJ2ubV5wh3X?utm_source=generator'),
(174, 'White Light', 'C2', 'https://open.spotify.com/embed/track/7hnW9af7GuGH5lyUUTa8UH?utm_source=generator'),
(175, 'DARE', 'C3', 'https://open.spotify.com/embed/track/4Hff1IjRbLGeLgFgxvHflk?utm_source=generator'),
(176, 'Fire Coming out of the Monkey\'s Head', 'C4', 'https://open.spotify.com/embed/track/1S9tfxdFr4TqoqA14gnKj3?utm_source=generator'),
(177, 'Dont\'t Get Lost in Heave', 'D1', 'https://open.spotify.com/embed/track/4hjGZN8poACfjWCK3Og6vY?utm_source=generator'),
(178, 'Demon Days', 'D2', 'https://open.spotify.com/embed/track/2k6hpKTyubRVOmQR11ViY3?utm_source=generator');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

CREATE TABLE `noticia` (
  `noticia_id` int(9) NOT NULL,
  `autor_id` int(11) NOT NULL COMMENT 'Noticia ou evento',
  `titulo` varchar(150) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `texto` text NOT NULL,
  `link` text NOT NULL,
  `Qtd_vistas` int(11) NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `status` varchar(150) NOT NULL COMMENT 'Incompleto, Disponível,  Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`noticia_id`, `autor_id`, `titulo`, `tipo`, `texto`, `link`, `Qtd_vistas`, `data_inicio`, `data_fim`, `status`) VALUES
(1, 44, 'Travis Scott lança novo album \"Utopia\"aaaaa', 'Musica', 'Travis scott lancou novo album em 2024, bla bla bla bla bla bla bla bla bla bla bla bla\r\nbla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla ele disse bla bla bla bla bla bla bla bla bla bla bla bla  .', 'https://open.spotify.com/intl-pt/album/18NOKLkZETa4sWwLMIm0UZ', 1, '2024-07-07', '2024-07-31', 'Publico'),
(2, 43, 'Cartaz da Primavera Sound Anunciado!!', 'Festivais', 'O cartaz da Primavera Sound ja esta disponivel e já com as compras dos bilhetes disponeis!!, bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla bla', 'https://www.primaverasound.com/pt/porto', 0, '2024-05-26', '2024-05-31', 'Publico'),
(6, 43, 'Nova página de eventos na Moody Records', 'Moody Records', 'Agora está disponivel a página de eventos na Moody Records que permite ver os eventos que estão acontecer no mundo da música!!', '?op=2', 0, '2024-07-15', '2024-07-16', 'Publico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `topico`
--

CREATE TABLE `topico` (
  `topico_id` int(11) NOT NULL,
  `nome` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizador`
--

CREATE TABLE `utilizador` (
  `utilizador_id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `tipo` char(1) DEFAULT NULL COMMENT 'U- User, E- Editor A-Admin O- owner',
  `nome` varchar(100) NOT NULL,
  `apelido` varchar(100) NOT NULL,
  `telemovel` char(9) NOT NULL,
  `rua` text NOT NULL,
  `codigo_postal` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `pais` varchar(200) NOT NULL,
  `distrito` varchar(200) NOT NULL,
  `metodopagamento_id` int(9) DEFAULT NULL,
  `metodoenvio_id` int(9) DEFAULT NULL,
  `status` varchar(200) DEFAULT NULL COMMENT 'pendente, ativo, bloqueado, eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `utilizador`
--

INSERT INTO `utilizador` (`utilizador_id`, `email`, `login`, `password`, `tipo`, `nome`, `apelido`, `telemovel`, `rua`, `codigo_postal`, `cidade`, `pais`, `distrito`, `metodopagamento_id`, `metodoenvio_id`, `status`) VALUES
(43, 'admin@gmail.com', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'O', 'Igors', 'Moreiras', '133421123', 'Rua Teste Ortigão, 167', '1214-233', 'Vila Nova de Gaya', 'Portugal', 'Porta', 2, 1, 'Ativo'),
(44, 'joanamoreira172006@gmail.com', 'joana', '2b9bb7d574d844ab4c00a1537715cfbc62cd3347', 'U', 'Joana', 'Moreira', '123456789', 'Rua da Joana', '1567-123', 'Cidade da joana', 'Brazil (Brasil)', 'Portalegre', NULL, 1, 'Ativo'),
(48, 'poo@gmail.com', 'pola', 'dc4071f4d33778d3867f2af51d5735e3ccf18378', 'A', 'POLA', 'reizao', '12345678', 'rfzfd', '4430-244', 'fd', 'Portugal', 'Porto', NULL, NULL, 'Ativo'),
(50, 'admina@gmail.com', 'admina', '435ea7373ec02574d8688b19fd589b9c2454bb59', 'U', 'zxz', 'dfs', '12', 'JH', '4430-244', 'fd', 'Belize', 'Porto', NULL, NULL, 'Bloqueado'),
(51, 'igor@gmail.com', 'igor', '7451c7708ae87e4f0977a641ded48f960e4d7abc', 'U', 'asda', 'asdada', '943543575', 'sds', '1234-233', 'fdsd', 'Bosnia and Herzegovina (Босна и Херцеговина)', 'Porto', NULL, NULL, 'pendente');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinil`
--

CREATE TABLE `vinil` (
  `vinil_id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `descricao` text DEFAULT NULL,
  `tipo` varchar(100) NOT NULL COMMENT 'Album, Ep, Single',
  `artista_id` int(9) NOT NULL,
  `genero_id` int(9) NOT NULL,
  `gravadora_id` int(9) NOT NULL,
  `formato` varchar(100) NOT NULL COMMENT 'LP 12"10"7"',
  `catalogo_numero` varchar(100) NOT NULL,
  `data_lancamento` date NOT NULL,
  `data` date NOT NULL,
  `preco` float(9,2) NOT NULL,
  `peso` int(9) NOT NULL,
  `Qtd_stock` int(9) NOT NULL,
  `Qtd_vistas` int(9) DEFAULT NULL,
  `Qtd_comprados` int(11) DEFAULT NULL,
  `desconto` int(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL COMMENT 'Incompleto,Disponivel, Eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `vinil`
--

INSERT INTO `vinil` (`vinil_id`, `nome`, `descricao`, `tipo`, `artista_id`, `genero_id`, `gravadora_id`, `formato`, `catalogo_numero`, `data_lancamento`, `data`, `preco`, `peso`, `Qtd_stock`, `Qtd_vistas`, `Qtd_comprados`, `desconto`, `status`) VALUES
(7, 'Around the Fur', 'aasdsaaa', 'Album', 9, 1, 2, 'LP', '567890123', '1997-10-28', '2024-07-12', 39.00, 455, 0, 7, 3, 60, 'Publico'),
(10, 'The Bends', NULL, 'Album', 12, 1, 3, 'LP', '135464123', '1995-03-13', '2024-07-12', 23.00, 234, 12, 6, 1, 50, 'Publico'),
(14, 'Future Nostalgia (The Moonlight Edition)', 'Future Nostalgia is the second studio album by singer Dua Lipa. It was released on 27 March 2020 by Warner Records. Lipa enlisted writers and producers such as Jeff Bhasker, Ian Kirkpatrick, Stuart Price, the Monsters & Strangerz, and Koz to create a \"nostalgic\" pop and disco record with influences from dance-pop and electronic music, inspired by the music that Lipa enjoyed during her childhood.', 'Album', 13, 4, 3, 'LP', '123451233', '2021-02-11', '2024-07-12', 19.99, 300, 34, 0, 23, NULL, 'Publico'),
(15, 'Harry\'s House', NULL, 'Album', 14, 4, 2, 'LP', '987123456', '2022-05-20', '2024-07-12', 45.99, 200, 2, 0, 21, NULL, 'Publico'),
(16, 'Starboy', NULL, 'Album', 15, 4, 3, 'LP', '244566778', '2016-09-21', '2024-07-12', 12.99, 345, 22, 3, 12, NULL, 'Publico'),
(17, 'To Pimp A Butterfly', NULL, 'Album', 16, 8, 2, 'LP', '123675345', '2015-03-15', '2024-07-12', 29.99, 250, 23, 0, NULL, NULL, 'Publico'),
(18, 'Graduation', '', 'Album', 17, 8, 3, 'LP', '456987123', '2007-09-11', '2024-07-12', 21.99, 334, 23, 2, 12, 0, 'Publico'),
(19, 'Utopia', NULL, 'Album', 18, 8, 1, 'LP', '567123456', '2023-07-28', '2024-07-12', 45.99, 342, 12, 0, 34, NULL, 'Publico'),
(20, 'The World We Knew', NULL, 'Album', 19, 3, 3, 'LP', '123980212', '1967-01-01', '2024-07-12', 59.99, 232, 15, 0, 23, NULL, 'Publico'),
(21, 'I Put A Spell On You', NULL, 'Album', 20, 3, 2, 'LP', '987123456', '1965-06-01', '2024-07-12', 19.99, 123, 34, 0, 23, NULL, 'Publico'),
(22, 'Duets An American Classic', NULL, 'Album', 21, 3, 2, 'LP', '743123451', '2006-09-26', '2024-05-15', 59.99, 233, 43, 0, 1, NULL, 'Publico'),
(23, 'Get On Up - The James Brown Story', NULL, 'Album', 22, 5, 3, 'LP', '123654123', '2014-07-29', '2024-05-20', 21.99, 300, 21, 0, 12, NULL, 'Publico'),
(24, 'Speakers In The House', NULL, 'Album', 23, 5, 1, 'LP', '654123098', '2022-11-04', '2024-05-22', 99.99, 200, 31, 0, 2, NULL, 'Publico'),
(26, 'One Thing At A Time', NULL, 'Album', 25, 9, 2, 'LP', '123456231', '2023-03-03', '2024-05-22', 19.99, 444, 12, 0, 1, NULL, 'Publico'),
(27, 'This One\'s for You Too (Deluxe Edition)', NULL, 'Album', 26, 9, 1, 'LP', '453234875', '2018-06-01', '2024-05-23', 45.99, 334, 12, 0, 53, NULL, 'Publico'),
(32, 'Un Verano Sin Ti', NULL, 'Album', 28, 6, 3, 'LP', '222333444', '2022-05-06', '2024-05-23', 29.99, 343, 21, 2, 50, NULL, 'Publico'),
(33, 'Barrio Fino', NULL, 'Album', 29, 6, 2, 'LP', '343222111', '2004-07-13', '2024-05-24', 23.99, 123, 12, 0, 34, NULL, 'Publico'),
(34, 'OASIS', NULL, 'Album', 30, 6, 2, 'LP', '111333444', '2019-06-28', '2024-05-21', 34.99, 433, 23, 0, 13, NULL, 'Publico'),
(35, 'True', NULL, 'Album', 31, 10, 1, 'LP', '122333444', '2013-01-01', '2024-05-18', 29.99, 444, 12, 0, 43, NULL, 'Publico'),
(36, 'Random Acess Memories', NULL, 'Album', 32, 10, 3, 'LP', '222111444', '2013-05-20', '2024-05-22', 23.99, 334, 12, 0, 12, NULL, 'Publico'),
(37, 'Happier', NULL, 'Single', 33, 10, 2, '12\"', '123987021', '2018-08-17', '2024-05-23', 34.99, 123, 23, 0, 32, NULL, 'Publico'),
(41, 'Demon Days', 'Albu', 'Album', 34, 2, 3, 'LP', '111000999', '2005-05-23', '2024-05-24', 19.99, 444, 12, 1, 50, 0, 'Publico'),
(42, 'The Eminem Show', NULL, 'Album', 35, 2, 2, 'LP', '111999888', '2002-05-26', '2024-05-22', 45.99, 222, 12, 0, 21, NULL, 'Publico'),
(43, 'Life After Death (2014 Remastered Edition)', NULL, 'Album', 36, 2, 2, 'LP', '111333222', '1997-03-04', '2024-05-08', 34.99, 500, 33, 0, 24, NULL, 'Publico'),
(44, 'Be the Cowboy', NULL, 'Album', 37, 11, 3, 'LP', '111222677', '2018-08-17', '2024-05-23', 29.99, 443, 12, 0, 15, NULL, 'Publico'),
(45, 'AM', NULL, 'LP', 38, 11, 2, 'LP', '111333222', '2013-09-09', '2024-05-18', 23.99, 222, 32, 0, 43, NULL, 'Publico'),
(46, 'Dark Red', NULL, 'Single', 39, 11, 1, 'LP', '11445666', '2017-02-20', '2024-05-23', 34.99, 500, 54, 0, 21, NULL, 'Publico'),
(47, 'Thriller', NULL, 'Album', 40, 7, 2, 'LP', '111666333', '1982-11-30', '2024-05-23', 99.99, 554, 12, 0, 250, NULL, 'Publico'),
(49, 'Aretha Now', NULL, 'Album', 42, 7, 2, 'LP', '777111222', '1968-06-14', '2024-05-23', 34.99, 222, 33, 0, 12, NULL, 'Publico'),
(50, 'BE', NULL, 'Album', 43, 12, 3, 'LP', '111666222', '2020-11-20', '2024-05-23', 39.99, 343, 43, 0, 150, NULL, 'Publico'),
(51, 'THE ALBUM', NULL, 'Album', 44, 12, 3, 'LP', '000999222', '2020-10-02', '2024-05-22', 23.99, 230, 12, 0, 43, NULL, 'Publico'),
(52, 'Cupid', NULL, 'Single', 45, 12, 2, 'LP', '222333111', '2023-02-24', '2024-05-23', 34.99, 433, 54, 1, 20, NULL, 'Publico'),
(75, 'Wunderland', 'bla blablasdadasd', 'EP', 46, 1, 2, 'LP', '123421234', '2024-06-25', '2024-06-26', 12.00, 123, 5, 6, 3, 0, 'Publico'),
(92, 'Elephant', 'Teste Teste ELepaht', 'Album', 54, 1, 3, 'LP', '12313312', '2003-04-01', '2024-07-14', 24.99, 300, 0, 4, 0, 0, 'Publico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `vinil_musica`
--

CREATE TABLE `vinil_musica` (
  `vinil_id` int(9) NOT NULL,
  `musica_id` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `vinil_musica`
--

INSERT INTO `vinil_musica` (`vinil_id`, `musica_id`) VALUES
(7, 19),
(7, 17),
(7, 18),
(10, 20),
(10, 22),
(10, 21),
(14, 26),
(14, 27),
(14, 28),
(15, 29),
(15, 31),
(15, 30),
(16, 33),
(16, 34),
(16, 32),
(19, 43),
(19, 42),
(19, 41),
(18, 40),
(18, 38),
(18, 39),
(17, 35),
(17, 36),
(17, 37),
(21, 48),
(21, 47),
(21, 49),
(22, 52),
(22, 51),
(22, 50),
(20, 44),
(20, 46),
(20, 45),
(24, 59),
(24, 60),
(24, 61),
(23, 56),
(23, 58),
(23, 57),
(26, 62),
(26, 64),
(26, 63),
(27, 65),
(27, 66),
(27, 67),
(32, 71),
(32, 72),
(32, 73),
(33, 74),
(33, 75),
(33, 76),
(34, 77),
(34, 78),
(34, 79),
(37, 86),
(35, 81),
(35, 80),
(35, 82),
(36, 85),
(36, 83),
(36, 84),
(43, 94),
(43, 95),
(43, 93),
(42, 90),
(42, 91),
(42, 92),
(41, 87),
(41, 89),
(41, 88),
(44, 98),
(44, 96),
(44, 97),
(45, 100),
(45, 99),
(45, 101),
(46, 102),
(47, 105),
(47, 103),
(47, 104),
(49, 111),
(49, 110),
(49, 109),
(52, 118),
(50, 112),
(50, 113),
(50, 114),
(51, 115),
(51, 117),
(51, 116),
(75, 124),
(75, 125),
(75, 126),
(92, 153),
(92, 154),
(92, 156),
(18, 157),
(18, 158),
(18, 159),
(18, 160),
(18, 161),
(18, 162),
(18, 163),
(18, 164),
(18, 165),
(18, 166),
(18, 167),
(41, 168),
(41, 169),
(41, 170),
(41, 171),
(41, 172),
(41, 173),
(41, 174),
(41, 175),
(41, 176),
(41, 177),
(41, 178);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`Artista_id`);

--
-- Índices para tabela `encomenda`
--
ALTER TABLE `encomenda`
  ADD PRIMARY KEY (`encomenda_id`),
  ADD KEY `utilizador_id` (`utilizador_id`),
  ADD KEY `MetodoPagamento_Id` (`MetodoPagamento_Id`),
  ADD KEY `MetodoEnvio_Id` (`MetodoEnvio_Id`);

--
-- Índices para tabela `encomenda_vinil`
--
ALTER TABLE `encomenda_vinil`
  ADD KEY `encomenda_id` (`encomenda_id`),
  ADD KEY `vinil_id` (`vinil_id`);

--
-- Índices para tabela `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`evento_id`);

--
-- Índices para tabela `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`faq_id`),
  ADD KEY `topico_id` (`topico_id`);

--
-- Índices para tabela `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`genero_id`);

--
-- Índices para tabela `gravadora`
--
ALTER TABLE `gravadora`
  ADD PRIMARY KEY (`gravadora_id`);

--
-- Índices para tabela `imagem_noticia`
--
ALTER TABLE `imagem_noticia`
  ADD PRIMARY KEY (`imagem_id`),
  ADD KEY `noticia_id` (`noticia_id`);

--
-- Índices para tabela `imagem_principal`
--
ALTER TABLE `imagem_principal`
  ADD PRIMARY KEY (`imagem_id`);

--
-- Índices para tabela `imagem_vinil`
--
ALTER TABLE `imagem_vinil`
  ADD PRIMARY KEY (`imagem_id`),
  ADD KEY `vinil_id` (`vinil_id`);

--
-- Índices para tabela `lista_desejos`
--
ALTER TABLE `lista_desejos`
  ADD KEY `utilizador_id` (`utilizador_id`),
  ADD KEY `vinil_id` (`vinil_id`);

--
-- Índices para tabela `logfile`
--
ALTER TABLE `logfile`
  ADD PRIMARY KEY (`logfile_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Índices para tabela `metodo_envio`
--
ALTER TABLE `metodo_envio`
  ADD PRIMARY KEY (`MetodoEnvio_id`);

--
-- Índices para tabela `metodo_pagamento`
--
ALTER TABLE `metodo_pagamento`
  ADD PRIMARY KEY (`MetodoPagamento_id`);

--
-- Índices para tabela `musica`
--
ALTER TABLE `musica`
  ADD PRIMARY KEY (`musica_id`);

--
-- Índices para tabela `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`noticia_id`),
  ADD KEY `autor_id` (`autor_id`);

--
-- Índices para tabela `topico`
--
ALTER TABLE `topico`
  ADD PRIMARY KEY (`topico_id`);

--
-- Índices para tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD PRIMARY KEY (`utilizador_id`),
  ADD KEY `metodopagamento_id` (`metodopagamento_id`),
  ADD KEY `metodoenvio_id` (`metodoenvio_id`);

--
-- Índices para tabela `vinil`
--
ALTER TABLE `vinil`
  ADD PRIMARY KEY (`vinil_id`),
  ADD KEY `artista_id` (`artista_id`),
  ADD KEY `genero_id` (`genero_id`),
  ADD KEY `gravadora_id` (`gravadora_id`);

--
-- Índices para tabela `vinil_musica`
--
ALTER TABLE `vinil_musica`
  ADD KEY `vinil_id` (`vinil_id`),
  ADD KEY `musica_id` (`musica_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artista`
--
ALTER TABLE `artista`
  MODIFY `Artista_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de tabela `encomenda`
--
ALTER TABLE `encomenda`
  MODIFY `encomenda_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `evento`
--
ALTER TABLE `evento`
  MODIFY `evento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `faq`
--
ALTER TABLE `faq`
  MODIFY `faq_id` int(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `genero`
--
ALTER TABLE `genero`
  MODIFY `genero_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `gravadora`
--
ALTER TABLE `gravadora`
  MODIFY `gravadora_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `imagem_noticia`
--
ALTER TABLE `imagem_noticia`
  MODIFY `imagem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de tabela `imagem_principal`
--
ALTER TABLE `imagem_principal`
  MODIFY `imagem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `imagem_vinil`
--
ALTER TABLE `imagem_vinil`
  MODIFY `imagem_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;

--
-- AUTO_INCREMENT de tabela `logfile`
--
ALTER TABLE `logfile`
  MODIFY `logfile_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de tabela `metodo_envio`
--
ALTER TABLE `metodo_envio`
  MODIFY `MetodoEnvio_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `metodo_pagamento`
--
ALTER TABLE `metodo_pagamento`
  MODIFY `MetodoPagamento_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `musica`
--
ALTER TABLE `musica`
  MODIFY `musica_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;

--
-- AUTO_INCREMENT de tabela `noticia`
--
ALTER TABLE `noticia`
  MODIFY `noticia_id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `topico`
--
ALTER TABLE `topico`
  MODIFY `topico_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `utilizador`
--
ALTER TABLE `utilizador`
  MODIFY `utilizador_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de tabela `vinil`
--
ALTER TABLE `vinil`
  MODIFY `vinil_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `encomenda`
--
ALTER TABLE `encomenda`
  ADD CONSTRAINT `encomenda_ibfk_1` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizador` (`utilizador_id`),
  ADD CONSTRAINT `encomenda_ibfk_2` FOREIGN KEY (`MetodoPagamento_Id`) REFERENCES `metodo_pagamento` (`MetodoPagamento_id`),
  ADD CONSTRAINT `encomenda_ibfk_3` FOREIGN KEY (`MetodoEnvio_Id`) REFERENCES `metodo_envio` (`MetodoEnvio_id`);

--
-- Limitadores para a tabela `encomenda_vinil`
--
ALTER TABLE `encomenda_vinil`
  ADD CONSTRAINT `encomenda_vinil_ibfk_1` FOREIGN KEY (`encomenda_id`) REFERENCES `encomenda` (`encomenda_id`),
  ADD CONSTRAINT `encomenda_vinil_ibfk_2` FOREIGN KEY (`vinil_id`) REFERENCES `vinil` (`vinil_id`);

--
-- Limitadores para a tabela `faq`
--
ALTER TABLE `faq`
  ADD CONSTRAINT `faq_ibfk_1` FOREIGN KEY (`topico_id`) REFERENCES `topico` (`topico_id`);

--
-- Limitadores para a tabela `imagem_noticia`
--
ALTER TABLE `imagem_noticia`
  ADD CONSTRAINT `imagem_noticia_ibfk_1` FOREIGN KEY (`noticia_id`) REFERENCES `noticia` (`noticia_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `imagem_vinil`
--
ALTER TABLE `imagem_vinil`
  ADD CONSTRAINT `imagem_vinil_ibfk_1` FOREIGN KEY (`vinil_id`) REFERENCES `vinil` (`vinil_id`) ON DELETE CASCADE;

--
-- Limitadores para a tabela `lista_desejos`
--
ALTER TABLE `lista_desejos`
  ADD CONSTRAINT `lista_desejos_ibfk_1` FOREIGN KEY (`utilizador_id`) REFERENCES `utilizador` (`utilizador_id`),
  ADD CONSTRAINT `lista_desejos_ibfk_2` FOREIGN KEY (`vinil_id`) REFERENCES `vinil` (`vinil_id`);

--
-- Limitadores para a tabela `logfile`
--
ALTER TABLE `logfile`
  ADD CONSTRAINT `logfile_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `utilizador` (`utilizador_id`);

--
-- Limitadores para a tabela `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `noticia_ibfk_1` FOREIGN KEY (`autor_id`) REFERENCES `utilizador` (`utilizador_id`);

--
-- Limitadores para a tabela `utilizador`
--
ALTER TABLE `utilizador`
  ADD CONSTRAINT `utilizador_ibfk_1` FOREIGN KEY (`metodopagamento_id`) REFERENCES `metodo_pagamento` (`MetodoPagamento_id`),
  ADD CONSTRAINT `utilizador_ibfk_2` FOREIGN KEY (`metodoenvio_id`) REFERENCES `metodo_envio` (`MetodoEnvio_id`);

--
-- Limitadores para a tabela `vinil`
--
ALTER TABLE `vinil`
  ADD CONSTRAINT `vinil_ibfk_1` FOREIGN KEY (`artista_id`) REFERENCES `artista` (`Artista_id`),
  ADD CONSTRAINT `vinil_ibfk_2` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`genero_id`),
  ADD CONSTRAINT `vinil_ibfk_3` FOREIGN KEY (`gravadora_id`) REFERENCES `gravadora` (`gravadora_id`);

--
-- Limitadores para a tabela `vinil_musica`
--
ALTER TABLE `vinil_musica`
  ADD CONSTRAINT `vinil_musica_ibfk_1` FOREIGN KEY (`vinil_id`) REFERENCES `vinil` (`vinil_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `vinil_musica_ibfk_2` FOREIGN KEY (`musica_id`) REFERENCES `musica` (`musica_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
