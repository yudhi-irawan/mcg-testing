-- Modul Description : Table Education Level
-- Date              : 2022-01-20
-- Created by.       : yudhi irawan
-- Contact person    : IG: @iam.yudhi_irawan

-- File name   : edu.sql
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

DROP VIEW IF EXISTS edu_one_view;
DELIMITER $$
CREATE VIEW edu_one_view
AS
	-- empty(SELECT Script)

	SELECT
		edu.edu_id
		,edu.edu_code
		,edu.edu_desc
	FROM edu

$$
DELIMITER;

DROP PROCEDURE IF EXISTS edu_one_add;
DELIMITER $$
CREATE PROCEDURE edu_one_add(
	IN _edu_id integer
	,IN _edu_code varchar(255)
	,IN _edu_desc varchar(255)
	)
BEGIN
	DECLARE result varchar (6);
	DECLARE nCount integer;

	SET nCount =
    (
		SELECT count(*)
		FROM edu
		WHERE 1=1
			 and CONVERT(edu_code USING utf8)=CONVERT(_edu_code USING utf8)
    );
	IF (nCount IS NOT NULL AND nCount > 0) THEN
		SET result = "DOUBLE";
	ELSE
		SET result = "OK";
		INSERT INTO edu(
			edu_code
			,edu_desc
		) values(
			_edu_code
			,_edu_desc
		);
	END IF;
	SELECT result;
END;
$$
DELIMITER;

DROP PROCEDURE IF EXISTS edu_one_edit;
DELIMITER $$
CREATE PROCEDURE edu_one_edit(
	IN _edu_id integer
	,IN _edu_code varchar(255)
	,IN _edu_desc varchar(255)
	)
BEGIN
	DECLARE result varchar (6);

	UPDATE edu SET
		edu_code=_edu_code
		,edu_desc=_edu_desc
	WHERE 
		edu_id=_edu_id
	;

	SET result = "OK";
	SELECT result;
END;
$$
DELIMITER;

DROP PROCEDURE IF EXISTS edu_one_delete;
DELIMITER $$
CREATE PROCEDURE edu_one_delete(
	IN _edu_id integer
	)
BEGIN
	DECLARE result varchar (6);

	DELETE FROM edu
	WHERE 
		edu_id=_edu_id
	;

	SET result = "OK";
	SELECT result;
END;
$$
DELIMITER;




