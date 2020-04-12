
CREATE TABLE source_feed (
    id SERIAL PRIMARY KEY,
    source_name TEXT NOT NULL
);

INSERT INTO source_feed (source_name) VALUES ('ferra');
INSERT INTO source_feed (source_name) VALUES ('3dnews');
INSERT INTO source_feed (source_name) VALUES ('mobiltelefon');
INSERT INTO source_feed (source_name) VALUES ('helpix');

CREATE TABLE vk_feeder (
    id SERIAL PRIMARY KEY,
    url TEXT NOT NULL,
    add_time DATE NOT NULL,
    is_published BOOLEAN NOT NULL,
    source_id INTEGER REFERENCES source_feed (id) ON DELETE CASCADE ON UPDATE CASCADE
);