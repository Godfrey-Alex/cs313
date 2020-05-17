psql postgres://eddiqnsuurvaga:7b2cebaa9ac7155293b821bb1092f8e25ec7301cea6a5ac5e7152c1115185e31@ec2-52-0-155-79.compute-1.amazonaws.com:5432/d383r7mmvegu51

CREATE TABLE public.user
(
	id SERIAL NOT NULL PRIMARY KEY,
	username VARCHAR(100) NOT NULL UNIQUE,
	password VARCHAR(100) NOT NULL,
	display_name VARCHAR(100) NOT NULL
);

INSERT INTO public.user (username, password, display_name)
VALUES ('alexgodfrey', 'password1', 'Alex Godfrey');

CREATE TABLE public.friend
(
	id SERIAL NOT NULL PRIMARY KEY,
	display_name VARCHAR(100) NOT NULL
);

INSERT INTO public.friend (display_name)
VALUES ('Brittany Godfrey');

CREATE TABLE public.user_friend_list
(
	id SERIAL NOT NULL PRIMARY KEY,
	user_id INT NOT NULL REFERENCES public.user(id),
	friend_id INT NOT NULL REFERENCES public.friend(id)
);

INSERT INTO public.user_friend_list (user_id, friend_id)
VALUES (1,1);

CREATE TABLE public.memory
(
	id SERIAL NOT NULL PRIMARY KEY,
	memory_name VARCHAR(25) NOT NULL,
	memory_date DATE NOT NULL,
	memory_text TEXT NOT NULL
);

INSERT INTO public.memory (memory_name, memory_date, memory_text)
VALUES ('Wedding','2013-5-25', 'We got marries at it was super awesome');

CREATE TABLE public.memory_list
(
	id SERIAL NOT NULL PRIMARY KEY,
	user_id INT NOT NULL REFERENCES public.user(id),
	friend_id INT NOT NULL REFERENCES public.friend(id),
	memory_id INT NOT NULL REFERENCES public.memory(id)	
);

INSERT INTO public.memory_list (user_id, friend_id, memory_id)
VALUES (1,1, 1);