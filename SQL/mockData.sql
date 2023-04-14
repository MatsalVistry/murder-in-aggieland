INSERT INTO users (username, email, password) VALUES ('vatsal', 'vm@gmail.com', '123');
INSERT INTO users (username, email, password) VALUES ('rohan', 'rt@gmail.com', '123');
INSERT INTO users (username, email, password) VALUES ('ashrita', 'av@gmail.com', '123');
INSERT INTO users (username, email, password) VALUES ('anjali', 'ak@gmail.com', '123');

INSERT INTO game (game_name, creator_id, game_description, latitude, longitude) VALUES ('Murder In Aggieland', 1,  'This is the first game.', 0, 0);

INSERT INTO user_game_joiner (user_id, game_id, current_priority, is_finished) VALUES (1, 1, 0, false);
INSERT INTO user_game_joiner (user_id, game_id, current_priority, is_finished) VALUES (2, 1, 1, false);

INSERT INTO character (description, name, game_id, image_url, priority, dialogue, latitude, longitude, is_killer) VALUES 
(
    'Intro Character Desc', 
    'A&M Staff', 
    1, 
    'www.pic1.jpg', 
    0, 
    'All 5 of our suspects were found on the security footage near the Chem fountain around the time of the murder so they need to be investigated thoroughly on their alibis. \nPlease find them all and talk to them about their alibis. When you are ready to catch the killer, click the button on the top right corner with the knife icon. You have only 2 chances to correctly guess the killer. Good luck!',
    0, 
    0, 
    false
);

INSERT INTO character (description, name, game_id, image_url, priority, dialogue, latitude, longitude, is_killer) VALUES 
(
    'A brunette woman in her 30s. She is from Spain and now works as a construction worker. She is working on a renovation for Zach. She does not speak much English but is apologetic about the murder (as much as she understands).', 
    'Builder', 
    1, 
    'Builder.png', 
    1, 
    'Hola! I am the Builder. Mucho gusto! So you have heard about the news? No entiendo much pero I am happy to answer any questions. \nMy alibi? ¿qué significa eso? Ah si. I was there to help fix the leaky old fountain. fue dificil pero the job is done! \nSorry to hear about the accident. Cuidarse', 
    100, 
    100, 
    true
);

INSERT INTO character (description, name, game_id, image_url, priority, dialogue, latitude, longitude, is_killer) VALUES 
(
    'A blonde woman in her 40s. She is very smart and kind. She wants to help with solving the murder in any way possible. She is a math professor that works in Blocker.', 
    'Professor', 
    1, 
    'Professor.png', 
    2,
    'Howdy! I am the Professor. Are you here about the murder? Yes, I heard! I cannot believe something like that could actually happen here in Aggieland! I am so sorry to hear and I am praying for the fallen aggies family. \nHow can I help? My alibi? Of course! \nI had just finished up my last class here at Blocker and was headed over to my car parked in the West Campus Garage. I just pass by the fountain on the way! I would like to help so let me know if there is anything else I can do!', 
    200, 
    200, 
    false
);

INSERT INTO character (description, name, game_id, image_url, priority, dialogue, latitude, longitude, is_killer) VALUES 
(
    'A middle-aged man who is grumpy in general. He does not like to talk to students and just wants to be left alone with his cooking. He knows about the murder but does not care. He cooks at SBISA.',
    'Chef',
    1,
    'Chef.png',
    3,
    'Hello? I am the Cook here at SBISA. I spend all my time here in SBISA. If you are here about the case, I am not interested in helping. \nMy alibi? I was cooking. I cook all day. After that, I go home. \nWhy was I by the Chem fountain? I do not know. I bike home. Maybe I biked through that area on the day of the murder. I do not really pay attention. Now, I have to get back to the kitchen. So long. \nWait… I did see something suspicious though. As I was biking, I had to avoid a large metal piece on the ground near the Chem fountain. Not sure if that helps but… anyways goodbye.',
    300,
    300,
    false
);

INSERT INTO character (description, name, game_id, image_url, priority, dialogue, latitude, longitude, is_killer) VALUES 
(
    'A young man in his 20s. He recently graduated from TAMU and is now a part-time graduate assistant and part-time consulting architect. He is funny and enjoys making conversation. He is apologetic about the murder on campus and claims to know nothing about it.',
    'Architect',
    1,
    'Architect.png',
    4,
    'Howdy, I am the Architect! Nice to meet you! What can I do for you? A murder?! Here in Aggieland?! My gosh, that is so crazy to hear. No, I have not heard anything about it but I am so sorry to hear! \nMy alibi? Haha okay I guess you would have to tell me when the murder happened then. Tuesday… hmm… well I grade papers on Tuesdays so I was probably grading late. I love to sit by the Chem fountain in the evening while working because it is really nice there. So that is probably what I was doing. I wrapped up around 11 and walked back to my apartment. \nGreat talking to you and I am sorry to hear about the accident again. Hope I was helpful!',
    400,
    400,
    false
);

INSERT INTO character (description, name, game_id, image_url, priority, dialogue, latitude, longitude, is_killer) VALUES 
(
    'An old man in his 60s. He is soft-spoken but arrogant. He lives alone and spends most of his time at Evans as a librarian. He seems disinterested in the murder on campus.',
    'Librarian',
    1,
    'Librarian.png',
    5,
    'Welcome to Evans, I am the Librarian. Please keep your voice down at all times as there are people trying to read and study. Yes, I heard about that. Unfortunate to hear… \nNothing much to my alibi. I work late on Tuesdays and then head home. I am parked in the Northside Garage so I have to walk past the Chem fountain. \nAlright then, I have to get back to work. Good luck.',
    500,
    500,
    false
);
