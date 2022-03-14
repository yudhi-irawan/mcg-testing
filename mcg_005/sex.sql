-- Modul Description : Tabel Sex
-- Date              : 2022-01-20
-- Created by.       : yudhi irawan
-- Contact person    : IG: @iam.yudhi_irawan

-- File name   : sex.sql
-- Last Edited : 2022-03-14


-- MCG - Massive CRUD Generator for PHP-Easyui-MySQL-PDO ver. Mar 2022-Free Version

-- Private message at Telegram        : @yudhi_irawan
-- Private activity feeds at Instagram: @iam.yudhi_irawan

-- Download Massive CRUD Generator on telegram and github link
-- MCG Application: https://t.me/MCGFreeVersion
-- Documentation  : https://yudhi-irawan.github.io/mcg-documentation
-- Testing        : https://github.com/yudhi-irawan/mcg_testing
-- Template       : 

-- Donation and Support link
-- Ko-fi   : https://ko-fi.com/MassiveCrudGenerator
-- Trakteer: https://trakteer.id/MassiveCrudGenerator

-- Please follow us for information about new releases

DROP VIEW IF EXISTS sex_one_view;
DELIMITER $$
CREATE VIEW sex_one_view
AS
	-- empty(SELECT Script)

	SELECT
		sex.sex_id
		,sex.sex_desc
	FROM sex

$$
DELIMITER;

DROP PROCEDURE IF EXISTS sex_one_add;
DELIMITER $$
CREATE PROCEDURE sex_one_add(
	IN _sex_id integer
	,IN _sex_desc varchar(255)
	)
BEGIN
	DECLARE result varchar (6);
	DECLARE nCount integer;

	SET nCount =
    (
		SELECT count(*)
		FROM sex
		WHERE 1=1
			 and CONVERT(sex_desc USING utf8)=CONVERT(_sex_desc USING utf8)
    );
	IF (nCount IS NOT NULL AND nCount > 0) THEN
		SET result = "DOUBLE";
	ELSE
		SET result = "OK";
		INSERT INTO sex(
			sex_desc
		) values(
			_sex_desc
		);
	END IF;
	SELECT result;
END;
$$
DELIMITER;

DROP PROCEDURE IF EXISTS sex_one_edit;
DELIMITER $$
CREATE PROCEDURE sex_one_edit(
	IN _sex_id integer
	,IN _sex_desc varchar(255)
	)
BEGIN
	DECLARE result varchar (6);

	UPDATE sex SET
		sex_desc=_sex_desc
	WHERE 
		sex_id=_sex_id
	;

	SET result = "OK";
	SELECT result;
END;
$$
DELIMITER;

DROP PROCEDURE IF EXISTS sex_one_delete;
DELIMITER $$
CREATE PROCEDURE sex_one_delete(
	IN _sex_id integer
	)
BEGIN
	DECLARE result varchar (6);

	DELETE FROM sex
	WHERE 
		sex_id=_sex_id
	;

	SET result = "OK";
	SELECT result;
END;
$$
DELIMITER;




