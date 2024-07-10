CREATE TABLE IF NOT EXISTS gunpla (
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

CREATE TRIGGER IF NOT EXISTS before_insert_gunpla
BEFORE INSERT ON gunpla
FOR EACH ROW
BEGIN
    SET NEW.id = UUID();
END$$

DELIMITER ;

CREATE TABLE IF NOT EXISTS poses (
    id CHAR(36) PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    image_url VARCHAR(255),
    gunpla_id CHAR(36),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT fk_gunpla
        FOREIGN KEY (gunpla_id) REFERENCES gunpla(id)
        ON DELETE CASCADE
        ON UPDATE CASCADE
);

DELIMITER $$

CREATE TRIGGER IF NOT EXISTS before_insert_poses
BEFORE INSERT ON poses
FOR EACH ROW
BEGIN
    SET NEW.id = UUID();
END$$

DELIMITER ;

DELIMITER //

-- Supprimer la procédure si elle existe
DROP PROCEDURE IF EXISTS add_pose_to_gunpla //

-- Créer la procédure
CREATE PROCEDURE add_pose_to_gunpla(
    IN p_gunpla_name VARCHAR(255),
    IN p_pose_name VARCHAR(255),
    IN p_image_url VARCHAR(255)
)
BEGIN
    DECLARE v_gunpla_id CHAR(36);

    -- Récupérer l'ID du gunpla à partir de son nom
    SELECT id INTO v_gunpla_id
    FROM gunpla
    WHERE name = p_gunpla_name
    LIMIT 1;

    -- Insérer la nouvelle pose avec l'ID du gunpla récupéré
    INSERT INTO poses (name, image_url, gunpla_id, created_at, updated_at)
    VALUES (p_pose_name, p_image_url, v_gunpla_id, NOW(), NOW());
END //

DELIMITER ;
