--
-- PostgreSQL database dump
--

-- Dumped from database version 9.6.17
-- Dumped by pg_dump version 9.6.17

-- Started on 2020-08-09 18:50:15

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

--
-- TOC entry 1 (class 3079 OID 12387)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 2155 (class 0 OID 0)
-- Dependencies: 1
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 190 (class 1259 OID 16465)
-- Name: agenda; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.agenda (
    id integer NOT NULL,
    nombre text,
    email character(250),
    celular text,
    hora text,
    fecha date
);


ALTER TABLE public.agenda OWNER TO postgres;

--
-- TOC entry 189 (class 1259 OID 16463)
-- Name: agenda_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.agenda_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.agenda_id_seq OWNER TO postgres;

--
-- TOC entry 2156 (class 0 OID 0)
-- Dependencies: 189
-- Name: agenda_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.agenda_id_seq OWNED BY public.agenda.id;


--
-- TOC entry 187 (class 1259 OID 16451)
-- Name: contacto; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.contacto (
    id integer NOT NULL,
    nombre text,
    mensaje text,
    email character(250)
);


ALTER TABLE public.contacto OWNER TO postgres;

--
-- TOC entry 188 (class 1259 OID 16454)
-- Name: contacto_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.contacto_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.contacto_id_seq OWNER TO postgres;

--
-- TOC entry 2157 (class 0 OID 0)
-- Dependencies: 188
-- Name: contacto_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.contacto_id_seq OWNED BY public.contacto.id;


--
-- TOC entry 185 (class 1259 OID 16396)
-- Name: newsletter; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.newsletter (
    id integer NOT NULL,
    nombre text,
    email character(250)
);


ALTER TABLE public.newsletter OWNER TO postgres;

--
-- TOC entry 186 (class 1259 OID 16403)
-- Name: newsletter_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.newsletter_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.newsletter_id_seq OWNER TO postgres;

--
-- TOC entry 2158 (class 0 OID 0)
-- Dependencies: 186
-- Name: newsletter_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.newsletter_id_seq OWNED BY public.newsletter.id;


--
-- TOC entry 2018 (class 2604 OID 16468)
-- Name: agenda id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.agenda ALTER COLUMN id SET DEFAULT nextval('public.agenda_id_seq'::regclass);


--
-- TOC entry 2017 (class 2604 OID 16456)
-- Name: contacto id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contacto ALTER COLUMN id SET DEFAULT nextval('public.contacto_id_seq'::regclass);


--
-- TOC entry 2016 (class 2604 OID 16405)
-- Name: newsletter id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.newsletter ALTER COLUMN id SET DEFAULT nextval('public.newsletter_id_seq'::regclass);


--
-- TOC entry 2147 (class 0 OID 16465)
-- Dependencies: 190
-- Data for Name: agenda; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.agenda (id, nombre, email, celular, hora, fecha) FROM stdin;
2	Vanessa Hurtado 	vanehurtadoq@gmail.com                                                                                                                                                                                                                                    	3175280203	15:30	2020-08-13
3	Carmen	carmen@gmail.com                                                                                                                                                                                                                                          	3001231232	15:00	2020-08-10
4	Camila	cami@outlook.com                                                                                                                                                                                                                                          	3200223333	09:00	2020-08-09
8	Engler Gonzalez 	englergonzalez@hotmail.com                                                                                                                                                                                                                                	3185288051	09:00	2020-08-10
23	Valentina	vale@outlook.com                                                                                                                                                                                                                                          	3156851234	14:00	2020-08-17
\.


--
-- TOC entry 2159 (class 0 OID 0)
-- Dependencies: 189
-- Name: agenda_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.agenda_id_seq', 24, true);


--
-- TOC entry 2144 (class 0 OID 16451)
-- Dependencies: 187
-- Data for Name: contacto; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.contacto (id, nombre, mensaje, email) FROM stdin;
10	Alvaro Caicedo	Excelente 	caicedo@outlook.com                                                                                                                                                                                                                                       
\.


--
-- TOC entry 2160 (class 0 OID 0)
-- Dependencies: 188
-- Name: contacto_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.contacto_id_seq', 10, true);


--
-- TOC entry 2142 (class 0 OID 16396)
-- Dependencies: 185
-- Data for Name: newsletter; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.newsletter (id, nombre, email) FROM stdin;
3	Karen	karen@gmail.com                                                                                                                                                                                                                                           
1	Jorge	jorge@hotmail.com                                                                                                                                                                                                                                         
4	Camila\n	cami@hotmail.com                                                                                                                                                                                                                                          
103	Cistina Salas 	salas@outlook.com                                                                                                                                                                                                                                         
105	Ster Valencia	valenciaster@gmail.com                                                                                                                                                                                                                                    
\.


--
-- TOC entry 2161 (class 0 OID 0)
-- Dependencies: 186
-- Name: newsletter_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.newsletter_id_seq', 106, true);


--
-- TOC entry 2024 (class 2606 OID 16475)
-- Name: agenda agenda_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.agenda
    ADD CONSTRAINT agenda_pkey PRIMARY KEY (id);


--
-- TOC entry 2022 (class 2606 OID 16473)
-- Name: contacto contacto_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.contacto
    ADD CONSTRAINT contacto_pkey PRIMARY KEY (id);


--
-- TOC entry 2020 (class 2606 OID 16415)
-- Name: newsletter newsletter_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.newsletter
    ADD CONSTRAINT newsletter_pkey PRIMARY KEY (id);


-- Completed on 2020-08-09 18:50:15

--
-- PostgreSQL database dump complete
--
