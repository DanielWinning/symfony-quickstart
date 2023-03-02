USE User;

CREATE TABLE tblUser (
    intUserId INT UNSIGNED NOT NULL AUTO_INCREMENT,
    strEmail VARCHAR(180) NOT NULL,
    strPassword VARCHAR(255) NOT NULL,
    objRoles JSON NOT NULL,
    CONSTRAINT UK_tblUser_strEmail UNIQUE (strEmail),
    PRIMARY KEY (intUserId)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci COMMENT = 'Stores application users';