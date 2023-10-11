-- problem - find sessions with duplicate actions, highly likely areas where things are causing problems.
SELECT
    sid,
    aid,
    COUNT(*) AS `count`
FROM
    session_table
GROUP BY
    aid, sid
HAVING
        count > 1;

-- DATABASE and data
CREATE TABLE session_table (
                               id int NOT NULL AUTO_INCREMENT,
                               sid int,
                               uid int,
                               aid int,
                               PRIMARY KEY (id)
);

INSERT INTO `session_table` (`sid`, `uid`, `aid`) VALUES
                                                      ('1001', '100', '1'),
                                                      ('1001', '100', '2'),
                                                      ('1001', '100', '3'),
                                                      ('1001', '100', '4'),
                                                      ('1001', '100', '5'),
                                                      ('1002', '100', '1'),
                                                      ('1002', '100', '2'),
                                                      ('1002', '100', '3'),
                                                      ('1002', '100', '3'),
                                                      ('1003', '100', '1'),
                                                      ('1003', '100', '2'),
                                                      ('1003', '100', '3'),
                                                      ('1003', '100', '3'),
                                                      ('1004', '101', '1'),
                                                      ('1004', '101', '2'),
                                                      ('1004', '101', '3'),
                                                      ('1004', '101', '4'),
                                                      ('1004', '101', '5'),
                                                      ('1005', '102', '1'),
                                                      ('1005', '102', '2'),
                                                      ('1005', '102', '3'),
                                                      ('1005', '102', '4'),
                                                      ('1005', '102', '5'),
                                                      ('1006', '100', '1'),
                                                      ('1006', '100', '2'),
                                                      ('1006', '100', '3'),
                                                      ('1006', '100', '3');


