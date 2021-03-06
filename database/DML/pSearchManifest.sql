CREATE PROCEDURE `pSearchManifest`(`search` VARCHAR(100))
  BEGIN
    SELECT  manifest.manifest_id,manifest.standards_versions AS 'title', manifest.comment AS 'description',users.username,manifest.date_created
    FROM OCDXGroup1.manifest
      INNER JOIN OCDXGroup1.users
        ON manifest.user_id = users.user_id
    WHERE manifest.title LIKE CONCAT('%',search,'%') OR manifest.comment LIKE CONCAT('%',search,'%');
  END