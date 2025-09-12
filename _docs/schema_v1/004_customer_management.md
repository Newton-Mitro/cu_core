```sql
-- Start of Customer Management
CREATE TABLE customers (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_no VARCHAR(50) UNIQUE NOT NULL,
    type ENUM('Individual','Organization') NOT NULL,
    name VARCHAR(150) NOT NULL,
    phone VARCHAR(50),
    email VARCHAR(100),
    kyc_level ENUM('MIN','STD','ENH') DEFAULT 'MIN',
    status ENUM('PENDING','ACTIVE','SUSPENDED','CLOSED') DEFAULT 'ACTIVE',

    -- Person Info
    dob DATE,
    gender ENUM('MALE','FEMALE','OTHER') DEFAULT NULL,
    religion ENUM('CHRISTIANITY','ISLAM','HINDUISM','BUDDHISM','OTHER') DEFAULT NULL,
    identification_type ENUM('NID','NBR','PASSPORT','DRIVING_LICENSE') NOT NULL,
    identification_number VARCHAR(50) NOT NULL,
    photo VARCHAR(255),

    -- Organization Info
    registration_no VARCHAR(150),// For organizations

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE customer_addresses (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_id BIGINT UNSIGNED NOT NULL,
    line1 VARCHAR(255) NOT NULL,
    line2 VARCHAR(255),
    city VARCHAR(100) NOT NULL,
    state VARCHAR(100),
    postal_code VARCHAR(20),
    country_code CHAR(2) NOT NULL DEFAULT 'BD',  -- ISO 3166-1 alpha-2
    type ENUM('CURRENT','PERMANENT','MAILING','WORK','REGISTERED','OTHER')
        NOT NULL DEFAULT 'CURRENT',
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
);

CREATE TABLE customer_family_relations (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_id BIGINT UNSIGNED NOT NULL,
    relative_id BIGINT UNSIGNED NOT NULL,
    relation_type ENUM(
        'FATHER','MOTHER','SON','DAUGHTER',
        'BROTHER','SISTER','HUSBAND','WIFE',
        'GRANDFATHER','GRANDMOTHER','GRANDSON','GRANDDAUGHTER',
        'UNCLE','AUNT','NEPHEW','NIECE',
        'FATHER-IN-LAW','MOTHER-IN-LAW','SON-IN-LAW','DAUGHTER-IN-LAW',
        'BROTHER-IN-LAW','SISTER-IN-LAW'
    ) NOT NULL,
    reverse_relation_type ENUM(
        'FATHER','MOTHER','SON','DAUGHTER',
        'BROTHER','SISTER','HUSBAND','WIFE',
        'GRANDFATHER','GRANDMOTHER','GRANDSON','GRANDDAUGHTER',
        'UNCLE','AUNT','NEPHEW','NIECE',
        'FATHER-IN-LAW','MOTHER-IN-LAW','SON-IN-LAW','DAUGHTER-IN-LAW',
        'BROTHER-IN-LAW','SISTER-IN-LAW'
    ) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE,
    FOREIGN KEY (relative_id) REFERENCES customers(id) ON DELETE CASCADE,
    UNIQUE KEY uq_customer_relative (customer_id, relative_id),
    INDEX idx_relative (relative_id),
    INDEX idx_relation_type (relation_type)
);

CREATE TABLE customer_signatures (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_id BIGINT UNSIGNED NOT NULL,
    signature_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE CASCADE
);

CREATE TABLE online_users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_id BIGINT UNSIGNED NOT NULL UNIQUE,
    username VARCHAR(100) UNIQUE NOT NULL,
    email VARCHAR(150) UNIQUE,
    phone VARCHAR(20) UNIQUE,
    password VARCHAR(255) NOT NULL,
    last_login_at TIMESTAMP NULL,
    status ENUM('ACTIVE','SUSPENDED','CLOSED') DEFAULT 'ACTIVE',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id)
);
-- End of Customer Management
```
