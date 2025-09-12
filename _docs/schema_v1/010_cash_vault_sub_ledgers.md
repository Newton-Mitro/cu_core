```sql
CREATE TABLE cash_accounts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,                 -- "Cash on Hand", "Petty Cash", "Bank - ABC"
    type ENUM('CASH_ON_HAND','BANK','PETTY_CASH','CASH_EQUIVALENT') NOT NULL,
    branch_id BIGINT UNSIGNED,                  -- nullable for global/head office accounts
    location VARCHAR(255),
    currency CHAR(3) DEFAULT 'BDT',
    is_active BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (branch_id) REFERENCES branches(id) ON DELETE SET NULL
);

CREATE TABLE vaults (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    branch_id BIGINT UNSIGNED NOT NULL,
    name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (branch_id) REFERENCES branches(id)
);

CREATE TABLE vault_denominations (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    vault_id BIGINT UNSIGNED NOT NULL,
    denomination INT NOT NULL,
    quantity INT NOT NULL DEFAULT 0,
    FOREIGN KEY (vault_id) REFERENCES vaults(id) ON DELETE CASCADE
);

CREATE TABLE atm_machines (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    branch_id BIGINT UNSIGNED NOT NULL,
    location VARCHAR(255),
    code VARCHAR(50) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (branch_id) REFERENCES branches(id)
);

CREATE TABLE atm_denominations (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    atm_id BIGINT UNSIGNED NOT NULL,
    denomination INT NOT NULL,
    quantity INT NOT NULL DEFAULT 0,
    FOREIGN KEY (atm_id) REFERENCES atm_machines(id) ON DELETE CASCADE
);

CREATE TABLE cash_drawers (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    branch_id BIGINT UNSIGNED NOT NULL,
    balance DECIMAL(18,2) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (branch_id) REFERENCES branches(id) ON DELETE CASCADE,
);

CREATE TABLE teller_shifts (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    drawer_id BIGINT UNSIGNED NOT NULL,
    assigned_user_id BIGINT UNSIGNED NOT NULL,
    opened_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    closed_at TIMESTAMP,
    opening_expected DECIMAL(18,2) DEFAULT 0,
    closing_expected DECIMAL(18,2),
    closing_counted DECIMAL(18,2),
    variance DECIMAL(18,2) GENERATED ALWAYS AS (closing_counted - closing_expected) STORED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (drawer_id) REFERENCES cash_drawers(id) ON DELETE CASCADE,
    FOREIGN KEY (assigned_user_id) REFERENCES users(id)
);

CREATE TABLE cash_movements (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    from_account_id BIGINT UNSIGNED NOT NULL,
    to_account_id BIGINT UNSIGNED NOT NULL,
    amount DECIMAL(18,2) NOT NULL,
    movement_date DATE NOT NULL,
    reference VARCHAR(100),
    description TEXT,
    created_by BIGINT UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (from_account_id) REFERENCES cash_accounts(id) ON DELETE CASCADE,
    FOREIGN KEY (to_account_id) REFERENCES cash_accounts(id) ON DELETE CASCADE,
    FOREIGN KEY (created_by) REFERENCES users(id)
);

CREATE TABLE cash_transactions (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cash_account_id BIGINT UNSIGNED NOT NULL,
    vault_id BIGINT UNSIGNED,
    atm_id BIGINT UNSIGNED,
    transaction_type ENUM('IN','OUT') NOT NULL,
    amount DECIMAL(18,2) NOT NULL,
    transaction_date DATE NOT NULL,
    reference VARCHAR(100),
    description TEXT,
    created_by BIGINT UNSIGNED,
    status ENUM('PENDING','POSTED') DEFAULT 'POSTED',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cash_account_id) REFERENCES cash_accounts(id),
    FOREIGN KEY (vault_id) REFERENCES vaults(id),
    FOREIGN KEY (atm_id) REFERENCES atm_machines(id),
    FOREIGN KEY (created_by) REFERENCES users(id)
);

CREATE TABLE cash_reconciliations (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    cash_account_id BIGINT UNSIGNED NOT NULL,
    counted_amount DECIMAL(18,2) NOT NULL,
    system_amount DECIMAL(18,2) NOT NULL,
    discrepancy DECIMAL(18,2) GENERATED ALWAYS AS (counted_amount - system_amount) STORED,
    reconciled_by BIGINT UNSIGNED,
    reconciled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cash_account_id) REFERENCES cash_accounts(id),
    FOREIGN KEY (reconciled_by) REFERENCES users(id)
);
```
