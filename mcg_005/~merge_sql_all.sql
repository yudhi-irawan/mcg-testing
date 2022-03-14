-- File name   : ~merge_*.sql
-- Last Edited : 2022-03-14


-- Modul Description : Tabel Sex
-- Date              : 2022-01-20
-- Created by.       : yudhi irawan
-- Contact person    : IG: @iam.yudhi_irawan

-- File name   : sex.sql
-- Last Edited : 2022-03-14


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




-- Modul Description : Table Education Level
-- Date              : 2022-01-20
-- Created by.       : yudhi irawan
-- Contact person    : IG: @iam.yudhi_irawan

-- File name   : edu.sql
-- Last Edited : 2022-03-14


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




-- Modul Description : Employee
-- Date              : 2022-01-20
-- Created by.       : yudhi irawan
-- Contact person    : IG: @iam.yudhi_irawan

-- File name   : emp.sql
-- Last Edited : 2022-03-14


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




