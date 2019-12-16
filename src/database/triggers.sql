-- Trigger: PhotoUpdated
DROP TRIGGER IF EXISTS PhotoUpdated;
CREATE TRIGGER PhotoUpdated
AFTER
UPDATE
      OF idPhoto ON "User-Photo" BEGIN
DELETE FROM
      Photo
WHERE
      Photo.idPhoto > 0
      AND Old.idPhoto = Photo.idPhoto;

END;
