--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

SET search_path = public, pg_catalog;

--
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO users (id, name, last_name, document, email, password, role_id, client_id, status_id, remember_token, created_at, updated_at) VALUES (6, 'CAMILA', 'FLOREZ', '1010207959', 'coorinvestigaciones@andiseg.com', '$2y$10$6Hq4LIT8BFAYEBZPH4pIXuzVpbdy.FTUqXUAh.GINaFzp/QIm.J56', 3, 1, 1, 'eykudTLx5lghdheAqY32njHZaPQX9pBsQkoOBAdUOlsVZEYw0YBNuNpiu7KE', '2017-07-19 17:56:04', '2017-07-19 18:11:47');
INSERT INTO users (id, name, last_name, document, email, password, role_id, client_id, status_id, remember_token, created_at, updated_at) VALUES (5, 'NATALY ', 'CASTRO', '1018403257', 'calidad@andiseg.com', '$2y$10$ePwAGiePolVd6s4IGjXyD.spiyIAcAMK4yc/3v/x/zjn7HsL24bAy', 2, 1, 1, 'jicmo5jKElpZZHDTDiKLAxRaEMJs36UZacKRJBr1NUg6UsEZpc7wrPoFbdWc', '2017-07-19 17:54:29', '2017-07-19 18:21:53');
INSERT INTO users (id, name, last_name, document, email, password, role_id, client_id, status_id, remember_token, created_at, updated_at) VALUES (7, 'ALEXANDER', 'BENAVIDEZ', '234234234', 'dirinvestigaciones@andiseg.com', '$2y$10$S4gWSSq2ZKpxWMXlcUdNDu6wRWzoGpIsdWCN4JQDhiFKHAsCPEb3.', 4, 3, 1, 'r0teVhz03gvY6G3aZNjAxQhWPrtqrTHUmcSV646poaNCNoBjVFyAm2iyckoQ', '2017-07-19 17:57:39', '2017-07-19 18:30:50');
INSERT INTO users (id, name, last_name, document, email, password, role_id, client_id, status_id, remember_token, created_at, updated_at) VALUES (1, 'jorge', 'pinedo', '1234', 'jpinedom@hotmail.com', '$2y$10$940HOjD8FLd1ciDszY2FIerZzz60l2n/agfjSRPzEHrwecAfKh14e', 1, 1, 1, 'fDwsXpTckj4SAyTFkGxeGCGo9j00Q7cKFTR5qbzM4r2vGQepUEfp8hBVWHjJ', NULL, '2017-07-25 07:17:36');
INSERT INTO users (id, name, last_name, document, email, password, role_id, client_id, status_id, remember_token, created_at, updated_at) VALUES (4, 'client', 'client', '3434', 'jorgep_1987@hotmail.com', '$2y$10$8UqG4v9nGxK0uFXjV4ykneSwYa7.2gSpFS2t3Cqy5HUj/InoZDBKG', 4, 2, 1, 'Ba5cZc0ZfrCYZUKczyMX8woCLOhudeSgwgvOP4JpXUBKQ9jNf4BkwfAMWwER', '2017-07-19 15:12:20', '2017-07-25 08:14:20');
INSERT INTO users (id, name, last_name, document, email, password, role_id, client_id, status_id, remember_token, created_at, updated_at) VALUES (3, 'operador', 'operadro', '343434', 'jorke8710@gmail.com', '$2y$10$yHVsjGBIUqfUBeRH3dzB6eaObL.wtpozUD5rnumbVJ6Gyfn2bYfRe', 3, 1, 1, 'wgrdZTDg6o4Qm4NaOYKNsjBuBsvBSiT9eOesv9qjw1U0WUtz2zNgecp77GGV', '2017-07-19 15:11:06', '2017-07-25 08:19:08');
INSERT INTO users (id, name, last_name, document, email, password, role_id, client_id, status_id, remember_token, created_at, updated_at) VALUES (2, 'ejecutivo', 'ejecutivo', '121122', 'jopinedom@gmail.com', '$2y$10$XiManCaAy7Kfoxi6BtnN6.wtWTeYMG.VNinWw.AULgVZHxJQ9Se/.', 2, 1, 1, 'y7iX8zasCKY20GswV5KOvarxPnVKJlVWUsWLv9OxBny2iLYNJ92xpAYA9Sqv', '2017-07-19 15:10:41', '2017-07-25 08:20:03');


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 7, true);


--
-- PostgreSQL database dump complete
--

