```sql
CREATE TABLE share_policies (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) UNIQUE NOT NULL,             -- e.g., "REG_SHR", "KIDS_CLUB"
    name VARCHAR(150) NOT NULL,                   -- Share product name
    description TEXT,
    min_opening_balance DECIMAL(18,2) DEFAULT 0.00,
    min_balance DECIMAL(18,2) DEFAULT 0.00,
    dividend_rate DECIMAL(5,2) DEFAULT 0.00,      -- Annual dividend %
    protection_fee DECIMAL(18,2) DEFAULT 0.00,    -- Yearly share protection fee
    dividend_frequency ENUM('QUARTERLY','ANNUAL') DEFAULT 'ANNUAL',
    withdrawal_limit INT DEFAULT NULL,            -- Optional: # withdrawals per period
    status ENUM('ACTIVE','INACTIVE') DEFAULT 'ACTIVE',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE share_accounts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    account_no VARCHAR(50) UNIQUE NOT NULL,       -- Unique share account number
    customer_id BIGINT UNSIGNED NOT NULL,           -- FK to members table
    policy_id BIGINT UNSIGNED NOT NULL,           -- FK to share_policies
    opened_date DATE NOT NULL,
    status ENUM('OPEN','FROZEN','CLOSED') DEFAULT 'OPEN',
    current_balance DECIMAL(18,2) DEFAULT 0.00,
    last_dividend_posted DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customers(id),
    FOREIGN KEY (policy_id) REFERENCES share_policies(id)
);

CREATE TABLE share_ledger (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    share_account_id BIGINT UNSIGNED NOT NULL,    -- FK to share_accounts
    txn_date DATE NOT NULL,
    description VARCHAR(255),
    debit DECIMAL(18,2) DEFAULT 0.00,             -- Withdrawals, fees
    credit DECIMAL(18,2) DEFAULT 0.00,            -- Deposits, dividends
    balance DECIMAL(18,2) DEFAULT 0.00,           -- Running balance
    reference_no VARCHAR(50),                     -- Receipt or journal reference
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (share_account_id) REFERENCES share_accounts(id)
);

CREATE TABLE dividend_provisions (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    share_account_id BIGINT UNSIGNED NOT NULL,    -- FK to share_accounts
    provision_date DATE NOT NULL,
    provision_amount DECIMAL(18,2) NOT NULL,
    recognized BOOLEAN DEFAULT FALSE,             -- TRUE when posted to ledger
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (share_account_id) REFERENCES share_accounts(id)
);

CREATE TABLE share_penalties (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    share_account_id BIGINT UNSIGNED NOT NULL,
    txn_date DATE NOT NULL,
    description VARCHAR(255),
    penalty_amount DECIMAL(18,2) NOT NULL,
    settled BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (share_account_id) REFERENCES share_accounts(id)
);

CREATE TABLE share_protection_fees (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    share_account_id BIGINT UNSIGNED NOT NULL,
    fee_year INT NOT NULL,
    amount DECIMAL(18,2) NOT NULL,
    charged_on DATE NOT NULL,
    settled BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (share_account_id) REFERENCES share_accounts(id)
);
```
