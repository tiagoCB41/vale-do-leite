-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Out-2022 às 15:37
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `vale`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(50) NOT NULL,
  `titulo` varchar(200) DEFAULT NULL,
  `descricao` varchar(600) DEFAULT NULL,
  `img` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `descricao`, `img`) VALUES
(1, 'O time da Vale do Leite se reuniu para reunião trimestral com o objetivo de apresentar o desempenho da equipe comercial, bem como traçar novas metas para encerrarmos o ano.\r\n', 'Um agradecimento especial a toda nossa equipe de vendas, e ao nosso administrativo, pelo trabalho incansável nos últimos meses. Juntos, vamos muito mais longe! 🚀', '1.jpeg'),
(2, 'Qual é a sua combinação favorita para o Romeu e Julieta? Conta pra gente.', 'O clássico é o Queijo de Coalho, mas, por aqui, não acreditamos em regras quando o assunto é comida. e o nosso queijo combina com tudo e vai bem com goiabada. <br>\r\nMade in Piaui <br>\r\n📱 (86) 9. 9991-1476 ( pedidos e onde encontrar) <br>\r\n#valedoleite #laticinios #sabor #piaui #vaquinha #nossosprodutos #pedidos #vendas', '2.jpg'),
(4, 'Já conhece a Linha de Cremes Vale do Leite?', 'Ela é perfeita para quem procura inovar em suas receitas de molhos, patês, acompanhamentos, recheios.\r\nA nossa dica de hoje é o Requeijão Cremoso Vale do Leite, que vai deixar tudo ainda mais cremoso e saboroso. <br>\r\n. <br>\r\nMade in Piaui <br>\r\n📱 (86) 9. 9991-1476 ( pedidos e onde encontrar) <br>\r\n#valedoleite #laticinios #sabor #piaui #vaquinha #nossosprodutos #pedidos #vendas', '3.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `data_log` timestamp NOT NULL DEFAULT current_timestamp(),
  `tipo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `logs`
--

INSERT INTO `logs` (`id`, `nome`, `data_log`, `tipo`) VALUES
(44, 'tiago carvalho', '2022-10-14 18:12:58', 'login'),
(45, 'tiago carvalho', '2022-10-14 18:14:04', 'login'),
(46, 'tiago carvalho', '2022-10-15 17:00:10', 'login');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(50) NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  `infoNutri` text DEFAULT NULL,
  `preco` float DEFAULT NULL,
  `img1` varchar(200) DEFAULT NULL,
  `img2` varchar(200) DEFAULT NULL,
  `img3` varchar(200) DEFAULT NULL,
  `categoria` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `nome`, `infoNutri`, `preco`, `img1`, `img2`, `img3`, `categoria`) VALUES
(1, 'MANTEIGA DE PRIMEIRA QUALIDADE COM SAL\r\n', 'Porção: 200g <br>\r\nValor Calórico: 75kcal (4%) <br>\r\nCarboidrato: 0g (0%)<br>\r\nProteínas: 0g <br>\r\nGorduras Totais: 8,2g (15%)<br>\r\nGorduras Saturadas: 5,5g (25%)<br>\r\nGordura Trans 0g <br>\r\nFibra Alimentar: 0g (0%)<br>\r\nSódio: 330mg (%)<br>\r\n*Valores diários de referência com base em uma dieta de 2.000 calorias.<br>\r\n**Mantenha o resfriado até 7ºC.\r\n', 9.99, 'manteiga.jpg', NULL, NULL, 'manteiga'),
(2, 'QUEIJO DE COALHO\r\n', 'Valor Energético: 105kcal (5%) <br>\r\nCarboidrato: 1,4g (0%) <br>\r\nProteínas: 7,1g  (9%) <br>\r\nGorduras Totais: 7,9g (14%) <br>\r\nGorduras Saturadas: 5,6g (25%) <br>\r\nGordura Trans 0g <br>\r\nFibra Alimentar: 0g (0%) <br>\r\nSódio: 351mg (15%) <br>\r\n*Valores diários de referência com base em uma dieta de 2.000 calorias. <br>\r\n**Mantenha o resfriado de 1°C até 7ºC após aberto.\r\n', 12.99, 'QUEIJODECOALHO.jpeg', NULL, NULL, 'queijo'),
(3, 'REQUEIJÃO CREMOSO', 'Porção: 200g <br>\r\nValor Calórico: 73kcal (4%)<br>\r\nCarboidrato: 1g (0%)<br>\r\nProteínas: 6g (8%)<br>\r\nGorduras Totais: 6,5g (12%)<br>\r\nGorduras Saturadas: 2,6g (12%)<br>\r\nGordura Trans 0g <br>\r\nFibra Alimentar: 0g (0%)<br>\r\nSódio: 141mg (6%)<br>\r\nCálcio: 17mg (2%)<br>\r\n*Valores diários de referência com base em uma dieta de 2.000 calorias.<br>\r\n**Mantenha o resfriado de 1º C até 8ºC.\r\n', 9.99, 'REQUEIJAOCREMOSO.jpg', NULL, NULL, NULL),
(4, 'NATA POTINHO 200g', 'Valor Energético: 57kcal (3%)<br>\r\nCarboidrato: 0,5g (0%)<br>\r\nProteínas: 0,3g  (0%)<br>\r\nGorduras Totais: 6g (11%)<br>\r\nGorduras Saturadas: 3,7g (17%)<br>\r\nGordura Trans 0g <br>\r\nFibra Alimentar: 0g (0%) <br>\r\nSódio: 7,5mg (0%) <br>\r\n*Valores diários de referência com base em uma dieta de 2.000 calorias ou 8400 kj. <br>\r\n**Manter refrigerado até 5ºC após aberto.\r\n', 9.99, 'nata.jpg', NULL, NULL, NULL),
(5, 'CREME DE LEITE 300g\r\n', 'Valor Energético: 33kcal (2%) <br>\r\nCarboidrato: 0g (0%) <br>\r\nProteínas: 0g  (0%) <br>\r\n', 9.99, 'CREME DE LEITE.jpg', NULL, NULL, NULL),
(6, 'BEBIDA LÁCTEA  180g\r\n', 'Valor Energético: 73 kcal (4%)<br>\r\nCarboidrato: 9,6g (3%)<br>\r\nGlicose: 5,9g<br>\r\nGelatose: 3,7<br>\r\nProteínas: 6,7g  (9%)<br>\r\nGorduras Totais: 0,9g (2%)<br>\r\nGorduras Saturadas: 0,6g (3%)<br>\r\nGordura Trans 0g <br>\r\nColesterol: 2,3 mg (1%)<br>\r\nFibra Alimentar: 0g (0%)<br>\r\nSódio: 64 mg (3%)<br>\r\nCálcio: 92 mg (9%)<br>\r\n*Valores diários de referência com base em uma dieta de 2.000 calorias ou 8400 kj.\r\n**Manter refrigerado até 5ºC após aberto.\r\n', 9.99, 'BEBIDA LACTEA 180g.jpg', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `tipo` int(11) DEFAULT NULL,
  `img` varchar(200) DEFAULT NULL,
  `data_create` timestamp NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `email`, `senha`, `tipo`, `img`, `data_create`, `status`) VALUES
(5, 'cairo felipe', 'cairo', NULL, '12345', NULL, NULL, '2022-09-27 06:18:51', NULL),
(6, 'tiago carvalho', 'tiagoADM', NULL, '12345', NULL, NULL, '2022-09-27 13:21:25', NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
