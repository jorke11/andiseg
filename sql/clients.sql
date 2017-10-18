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
-- Data for Name: clients; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO clients (id, regimen_id, person_id, city_id, department_id, status_id, document_id, document, verification, email, address, mobil, business_name, insert_id, update_id, executive_id, created_at, updated_at) VALUES (1, 1, 1, 1, 1, 1, 1, '2343234', 1, NULL, 'testing addres', '2343243', 'Andiseg', 1, NULL, 2, NULL, NULL);
INSERT INTO clients (id, regimen_id, person_id, city_id, department_id, status_id, document_id, document, verification, email, address, mobil, business_name, insert_id, update_id, executive_id, created_at, updated_at) VALUES (2, 1, 1, 1, 1, 1, 1, '1023232365', 3, NULL, 'carrera', '3203765', 'cliente tesging', 1, NULL, 2, '2017-07-25 08:31:43', '2017-07-25 08:31:43');


--
-- Name: clients_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('clients_id_seq', 2, true);


--
-- PostgreSQL database dump complete
--

