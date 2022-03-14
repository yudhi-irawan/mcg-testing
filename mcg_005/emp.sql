-- Modul Description : Employee
-- Date              : 2022-01-20
-- Created by.       : yudhi irawan
-- Contact person    : IG: @iam.yudhi_irawan

-- File name   : emp.sql
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

DROP VIEW IF EXISTS emp_one_view;
DELIMITER $$
CREATE VIEW emp_one_view
AS
	-- empty(SELECT Script)

	SELECT
		emp.emp_id
		,emp.emp_name
		,emp.emp_bday
		,emp.sex_id
		,sex.sex_desc
		,emp.edu_code
		,edu.edu_desc
	FROM emp
	LEFT JOIN edu ON edu.edu_code = emp.edu_code
	LEFT JOIN sex ON sex.sex_id = emp.sex_id

$$
DELIMITER;

DROP PROCEDURE IF EXISTS emp_one_add;
DELIMITER $$
CREATE PROCEDURE emp_one_add(
	IN _emp_id integer
	,IN _emp_name varchar(255)
	,IN _emp_bday date
	,IN _sex_id integer
	,IN _edu_code varchar(255)
	)
BEGIN
	DECLARE result varchar (6);

		SET result = "OK";
		INSERT INTO emp(
			emp_name
			,emp_bday
			,sex_id
			,edu_code
		) values(
			_emp_name
			,_emp_bday
			,_sex_id
			,_edu_code
		);

	SELECT result;
END;
$$
DELIMITER;

DROP PROCEDURE IF EXISTS emp_one_edit;
DELIMITER $$
CREATE PROCEDURE emp_one_edit(
	IN _emp_id integer
	,IN _emp_name varchar(255)
	,IN _emp_bday date
	,IN _sex_id integer
	,IN _edu_code varchar(255)
	)
BEGIN
	DECLARE result varchar (6);

	UPDATE emp SET
		emp_name=_emp_name
		,emp_bday=_emp_bday
		,sex_id=_sex_id
		,edu_code=_edu_code
	WHERE 
		emp_id=_emp_id
	;

	SET result = "OK";
	SELECT result;
END;
$$
DELIMITER;

DROP PROCEDURE IF EXISTS emp_one_delete;
DELIMITER $$
CREATE PROCEDURE emp_one_delete(
	IN _emp_id integer
	)
BEGIN
	DECLARE result varchar (6);

	DELETE FROM emp
	WHERE 
		emp_id=_emp_id
	;

	SET result = "OK";
	SELECT result;
END;
$$
DELIMITER;




