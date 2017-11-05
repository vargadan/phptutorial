FLUSH PRIVILEGES;

SET PASSWORD FOR 'root'@'localhost' = PASSWORD('root');

FLUSH PRIVILEGES;

USE sqli;

CREATE TABLE browser
(
   id               int(10),
   browser_name     varchar(20),
   latest_version   varchar(20)
);

CREATE TABLE user_info
(
   id         int(10),
   username   varchar(20),
   cc         varchar(16)
);

INSERT INTO browser VALUES(1, 'Internet Explorer', '11');
INSERT INTO browser VALUES(2, 'Firefox', '5');
INSERT INTO browser VALUES(3, 'Chrome', '5');
INSERT INTO browser VALUES(4, 'Opera', '43');
INSERT INTO browser VALUES(5, 'Safari', '11');

INSERT INTO user_info VALUE(1, 'guest', 'N/A');
INSERT INTO user_info VALUE(2, 'joe', '1111222233334444');
INSERT INTO user_info VALUE(3, 'doris', '1234567887654321');
