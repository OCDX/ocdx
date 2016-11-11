DELIMITER $$
CREATE DEFINER=`daniel`@`%` PROCEDURE `pSearchByFilename`(IN filename_input VARCHAR(50))
BEGIN
    SELECT *
    FROM OCDXGroup1.manifest
      INNER JOIN OCDXGroup1.research_object
        ON manifest.manifest_id = research_object.manifest_id
      INNER JOIN OCDXGroup1.users
        ON manifest.user_id = users.user_id
      INNER JOIN OCDXGroup1.files
        ON research_object.research_object_id = files.research_object_id
    WHERE files.name = 'filename.json';
  END$$
DELIMITER ;