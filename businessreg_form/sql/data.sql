CREATE TABLE barista (
    barista_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR (50),
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE mtdrinks (
    mtdrinks_id INT AUTO_INCREMENT PRIMARY KEY,
    mt_flavor VARCHAR (50),
    barista_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE user_passwords (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
