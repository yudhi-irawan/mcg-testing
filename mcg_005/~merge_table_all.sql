-- File name   : ~merge_*.sql
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

-- Sample----------------------------------------------------------

-- database: mcg_db
-- hostname: localhost
-- Character set: utf8 (UTF-8 Unicode)
-- Collation: utf8_general_ci

-- CREATE DATABASE `mcg_db`
--     CHARACTER SET 'utf8'
--     COLLATE 'utf8_general_ci';

-- Sample----------------------------------------------------------

CREATE TABLE sex
(
	sex_id integer not null auto_increment primary key
	,sex_desc varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE edu
(
	edu_id integer not null auto_increment primary key
	,edu_code varchar(255)
	,edu_desc varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

CREATE TABLE emp
(
	emp_id integer not null auto_increment primary key
	,emp_name varchar(255)
	,emp_bday date
	,sex_id integer
	,edu_code varchar(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

