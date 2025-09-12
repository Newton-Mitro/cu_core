```sql
CREATE TABLE gl_accounts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(50) UNIQUE NOT NULL,
    name VARCHAR(100) NOT NULL,
    type ENUM('ASSET','LIABILITY','EQUITY','INCOME','EXPENSE') NOT NULL,
    is_leaf BOOLEAN DEFAULT TRUE,
    parent_id BIGINT UNSIGNED,
    FOREIGN KEY (parent_id) REFERENCES gl_accounts(id)
);

CREATE TABLE journal_entries (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    tx_code VARCHAR(50),         -- e.g., 'PAY_VOUCHER', 'RCPT_VOUCHER', 'JOURNAL_VOUCHER'
    tx_ref VARCHAR(50),          -- optional reference number
    posted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    branch_id BIGINT UNSIGNED,
    user_id BIGINT UNSIGNED,
    memo TEXT,
    FOREIGN KEY (branch_id) REFERENCES branches(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE journal_lines (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    journal_entry_id BIGINT UNSIGNED NOT NULL,
    gl_account_id BIGINT UNSIGNED NOT NULL,
    subledger_type ENUM('DEPOSIT','LOAN','SHARE','INSURANCE','CASH','FIXED_ASSET','PAYROLL','VENDOR','FEE'),
    subledger_id BIGINT UNSIGNED,
    debit DECIMAL(18,2) DEFAULT 0,
    credit DECIMAL(18,2) DEFAULT 0,
    CHECK ((debit = 0 AND credit > 0) OR (credit = 0 AND debit > 0)),
    FOREIGN KEY (entry_id) REFERENCES journal_entries(id) ON DELETE CASCADE,
    FOREIGN KEY (gl_account_id) REFERENCES gl_accounts(id),
    FOREIGN KEY (account_id) REFERENCES accounts(id)
    FOREIGN KEY (cash_account_id) REFERENCES cash_accounts(id),
);
```
