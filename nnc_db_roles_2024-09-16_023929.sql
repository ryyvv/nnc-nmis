--
-- PostgreSQL database dump
--

-- Dumped from database version 14.13 (Ubuntu 14.13-0ubuntu0.22.04.1)
-- Dumped by pg_dump version 14.13 (Ubuntu 14.13-0ubuntu0.22.04.1)

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: roles; Type: TABLE; Schema: public; Owner: nnc_dbuser
--

CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    codename character varying(255) NOT NULL,
    guard_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.roles OWNER TO nnc_dbuser;

--
-- Name: roles_id_seq; Type: SEQUENCE; Schema: public; Owner: nnc_dbuser
--

CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.roles_id_seq OWNER TO nnc_dbuser;

--
-- Name: roles_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: nnc_dbuser
--

ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;


--
-- Name: roles id; Type: DEFAULT; Schema: public; Owner: nnc_dbuser
--

ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);


--
-- Data for Name: roles; Type: TABLE DATA; Schema: public; Owner: nnc_dbuser
--

COPY public.roles (id, name, codename, guard_name, created_at, updated_at) FROM stdin;
1	Central Admin	is_centraladmin	web	2024-06-11 01:37:52	2024-06-11 01:37:52
2	Central Officer	is_centralofficer	web	2024-06-11 01:37:52	2024-06-11 01:37:52
3	Central Staff	is_centralstaff	web	2024-06-11 01:37:52	2024-06-11 01:37:52
4	Regional Officer	is_regionalofficer	web	2024-06-11 01:37:52	2024-06-11 01:37:52
5	Regional Staff	is_regionalstaff	web	2024-06-11 01:37:52	2024-06-11 01:37:52
7	Provincial Staff	is_provincialstaff	web	2024-06-11 01:37:52	2024-06-11 01:37:52
8	Barangay Scholar	is_barangayscholar	web	2024-06-11 01:37:52	2024-06-11 01:37:52
6	Provincial Officer	is_provincialofficer	web	2024-06-11 01:37:52	2024-06-11 01:37:52
\.


--
-- Name: roles_id_seq; Type: SEQUENCE SET; Schema: public; Owner: nnc_dbuser
--

SELECT pg_catalog.setval('public.roles_id_seq', 8, true);


--
-- Name: roles roles_name_guard_name_unique; Type: CONSTRAINT; Schema: public; Owner: nnc_dbuser
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_name_guard_name_unique UNIQUE (name, guard_name);


--
-- Name: roles roles_pkey; Type: CONSTRAINT; Schema: public; Owner: nnc_dbuser
--

ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);


--
-- PostgreSQL database dump complete
--

