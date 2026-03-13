CREATE TABLE riddles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    riddle VARCHAR(255) NOT NULL,
    answer VARCHAR(100) NOT NULL,
    hint VARCHAR(255),
    roomId INT NOT NULL
);

INSERT INTO riddles (riddle, answer, hint, roomId)
VALUES
-- Kamer 1 (Gevangeniscel)
('Ik heb tralies maar ben geen dierentuin. Waar ben je?', 'Cel', 'Hier zit een gevangene.', 1),
('Ik open deuren maar ben geen deur. Wat ben ik?', 'Sleutel', 'Bewakers dragen er veel.', 1),
('Wat gebruikt een gevangene soms om door de muur te graven?', 'Lepel', 'Je krijgt het bij eten.', 1),

-- Kamer 2 (Bewakerskantoor)
('Wie bewaakt de gevangenen?', 'Bewaker', 'Hij loopt rond met sleutels.', 2),
('Wat gaat af als iemand probeert te ontsnappen?', 'Alarm', 'Het maakt veel lawaai.', 2),
('Hoe noem je iemand die in de gevangenis zit?', 'Gevangene', 'Hij mag niet naar buiten.', 2),

-- Kamer 3 (Gevangenis Binnenplaats)
('Waar bewaren bewakers belangrijke papieren van gevangenen?', 'Archief', 'Hier liggen dossiers.', 3),
('Wat gebruik je om een cel op slot te doen?', 'Slot', 'Hier past een sleutel in.', 3),
('Wat zit er op de muur om de gevangenis in de gaten te houden?', 'Camera', 'Bewaking kijkt hiernaar.', 3);
