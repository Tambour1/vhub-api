-- Insertion des données gunpla (test)
INSERT INTO gunpla (name,description,grade,echelle,is_custom,style_rating,durability_rating,image_url,created_at,updated_at)
VALUES ('YMS-15 Gyan','Principality of Zeon Prototype Close-Combat Mobile Suit','HG','1/144',false,7,7,'gyan.jpeg',NOW(),NOW());

INSERT INTO gunpla (name,description,grade,echelle,is_custom,style_rating,durability_rating,image_url,created_at,updated_at)
VALUES ('MS-08TX/S Efreet Schneid','Principality of Zeon Prototype Close-Combat Mobile Suit','HG','1/144',false,7,8,'schneid.jpeg',NOW(),NOW());

-- Insertion des données poses (test)
INSERT INTO poses (id, name, image_url, gunpla_id, created_at, updated_at)
VALUES ('Chevalery Pose', 'chevalery_pose.jpeg', '769c667b-3e10-11ef-b21a-0242ac1b0002', NOW(), NOW());