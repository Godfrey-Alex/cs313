CREATE SEQUENCE user_id_seq;
CREATE TABLE public.user
(
	id INTEGER DEFAULT NEXTVAL('user_id_seq')UNIQUE,
	username VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL
);

CREATE SEQUENCE friend_id_seq;
CREATE TABLE public.friend
(
	id INTEGER DEFAULT NEXTVAL('friend_id_seq') UNIQUE,
	display_name VARCHAR(100) NOT NULL
);

CREATE SEQUENCE user_friend_id_seq;
CREATE TABLE public.user_friend_list
(
	id INTEGER DEFAULT NEXTVAL('user_friend_id_seq')UNIQUE,
	user_id INT NOT NULL REFERENCES public.user(id),
	friend_id INT NOT NULL REFERENCES public.friend(id)
);

CREATE SEQUENCE memory_id_seq;
CREATE TABLE public.memory
(
	id INTEGER DEFAULT NEXTVAL('memory_id_seq')UNIQUE,
	memory_name VARCHAR(25) NOT NULL,
	memory_date DATE NOT NULL,
	memory_text TEXT NOT NULL
);

CREATE SEQUENCE memory_list_id_seq;
CREATE TABLE public.memory_list
(
	id INTEGER DEFAULT NEXTVAL('memory_list_id_seq')UNIQUE,
	user_id INT NOT NULL REFERENCES public.user(id),
	friend_id INT NOT NULL REFERENCES public.friend(id),
	memory_id INT NOT NULL REFERENCES public.memory(id)	
);