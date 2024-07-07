CREATE TABLE gunpla (
    id CHAR(36) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    grade VARCHAR(10),
    echelle VARCHAR(20),
    is_custom BOOLEAN,
    style_rating INT CHECK (style_rating BETWEEN 1 AND 10),
    durability_rating INT CHECK (durability_rating BETWEEN 1 AND 10),
    image_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

DELIMITER $$

CREATE TRIGGER before_insert_gunpla
BEFORE INSERT ON gunpla
FOR EACH ROW
BEGIN
    SET NEW.id = UUID();
END$$

DELIMITER ;