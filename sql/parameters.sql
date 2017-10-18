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
-- Data for Name: parameters; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (1, 'Creado', NULL, 'events', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (2, 'Asignado', NULL, 'events', 2, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (3, 'Revision Biografica', NULL, 'events', 3, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (4, 'Revision academica', NULL, 'events', 4, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (5, 'Revision Juridica', NULL, 'events', 5, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (6, 'Revision anotaciones', NULL, 'events', 6, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (7, 'Revision Laboral', NULL, 'events', 6, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (8, 'Visitar domiciliaria', NULL, 'events', 7, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (9, 'cedula', NULL, 'type_document', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (10, 'nit', NULL, 'type_document', 2, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (11, 'nuevo', NULL, 'status_order', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (12, 'En proceso', NULL, 'status_order', 2, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (13, 'Finalizado', NULL, 'status_order', 3, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (14, 'A1', NULL, 'category', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (15, 'A12', NULL, 'category', 2, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (16, 'primaria', NULL, 'type_study', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (17, 'bachillerato', NULL, 'type_study', 2, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (18, 'pregunta?', NULL, 'questions', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (19, 'testing anotations', NULL, 'anotations', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (20, 'testing results', NULL, 'results', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (21, 'Union libre', NULL, 'civil_status', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (22, 'Primera', NULL, 'class_military', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (23, 'sala', NULL, 'photo', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (24, 'natural', NULL, 'person_id', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (25, 'comun', NULL, 'regimen_id', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (26, 'administrador', NULL, 'role_id', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (27, 'Ejecutivo', NULL, 'role_id', 2, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (29, 'cliente', NULL, 'role_id', 4, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (30, 'cruz blanca', NULL, 'eps_id', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (31, 'porvenir', NULL, 'pension_id', 1, NULL, NULL);
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (28, 'analista', '', 'role_id', 3, NULL, '2017-08-02 11:06:37');
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (32, 'Aparta Estudio', '0', 'features_home', 1, '2017-10-09 04:35:27', '2017-10-09 04:35:27');
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (33, 'Bueno', '0', 'status_house', 1, '2017-10-09 06:29:33', '2017-10-09 06:29:33');
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (34, 'Agua', '0', 'service', 1, '2017-10-09 06:40:23', '2017-10-09 06:40:23');
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (35, 'Televisor', '0', 'inventory', 1, '2017-10-09 06:41:03', '2017-10-09 06:41:03');
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (36, 'Vivienda', '0', 'property', 1, '2017-10-09 07:30:39', '2017-10-09 07:30:39');
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (37, 'Casa', '0', 'property_type', 1, '2017-10-09 07:31:48', '2017-10-09 07:31:48');
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (38, 'Creditos bancarios', '0', 'financial_obligation', 1, '2017-10-13 12:24:22', '2017-10-13 12:24:22');
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (39, 'bancolombia', '0', 'finantial_entities', 1, '2017-10-13 12:25:59', '2017-10-13 12:25:59');
INSERT INTO parameters (id, description, value, "group", code, created_at, updated_at) VALUES (40, 'libre', '0', 'investment_type', 1, '2017-10-13 12:27:43', '2017-10-13 12:27:43');


--
-- Name: parameters_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('parameters_id_seq', 40, true);


--
-- PostgreSQL database dump complete
--

