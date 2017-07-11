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

INSERT INTO users (id, name, last_name, document, email, password, role_id, client_id, status_id, remember_token, created_at, updated_at) VALUES (1, 'jorge', 'pinedo', '1234', 'jpinedom@hotmail.com', '$2y$10$9IMiRihUsU5gjD0YkvD1J.Kgmmy89jgG/N6XmPcLvl8Ywx2Z0exYK', 1, 1, 1, NULL, NULL, NULL);
INSERT INTO users (id, name, last_name, document, email, password, role_id, client_id, status_id, remember_token, created_at, updated_at) VALUES (2, 'ejecutivo', 'ejecutivo', '122121', 'jopinedom@gmail.com', '$2y$10$lEJYKsX4sw47V3CQQ3nwyeyjbJ7FVoDtXD6cv2lPg0aMj0veCCWPS', 2, 1, 1, NULL, '2017-07-10 02:35:42', '2017-07-10 02:35:42');
INSERT INTO users (id, name, last_name, document, email, password, role_id, client_id, status_id, remember_token, created_at, updated_at) VALUES (3, 'operador', 'operador', '343443', 'jorke8710@gmail.com', '$2y$10$xNruEdaRIwz7dh2rYX/pNujzRMhCICjLMAU6B7PdD8ktVXC2SD1I6', 3, 1, 1, NULL, '2017-07-10 02:35:59', '2017-07-10 02:35:59');
INSERT INTO users (id, name, last_name, document, email, password, role_id, client_id, status_id, remember_token, created_at, updated_at) VALUES (4, 'client', 'client', '343434', 'jorgep_1987@hotmail.com', '$2y$10$Ff91hoadIJfP2UvyIzptl.1ublFpr/C0E5FJk6hK3C8kw3LxNU4mS', 4, 2, 1, NULL, '2017-07-11 02:23:16', '2017-07-11 02:23:16');


--
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('users_id_seq', 4, true);


--
-- PostgreSQL database dump complete
--

