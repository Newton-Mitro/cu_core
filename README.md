# Credit Union Software System

### 1. Overview

The 'CU Core' is a modular banking solution designed to handle:

- Customer accounts
- Loans
- Deposits
- Insurance
- Cash management
- Journals & GL
- Cheques
- Audit logs

**Core Principles:**

1. All money movement is represented via **journal entries** (double-entry bookkeeping).
2. Product transactions are **derived from journals**, ensuring a clean audit trail.
3. Multi-branch, multi-user, teller-level operations supported.
4. Fully **KYC-compliant** customer management.

---

### 2. Actors & Organization

**Entities:**

- **Customers** – Individuals or organizations, KYC-verified.
- **Branches** – Operational units of the credit union.
- **Users** – Staff: tellers, ops, managers, admin.
- **Roles** – TELLER, OPS, MANAGER, ADMIN.

**Relationships:**

```bash
branches ──< users
customers ──< accounts (via account_customers)
```

---

### 3. Products

**Supported Product Types:**

| Type      | Description                             |
| --------- | --------------------------------------- |
| SAVINGS   | Standard savings accounts               |
| SHARE     | Share accounts with member equity       |
| RD        | Recurring deposits                      |
| FD        | Term deposits                           |
| LOAN      | Standard loans / loans against deposits |
| INSURANCE | Insurance policies linked to customers  |

**Tables:**

- `products`
- `insurance_policies`

**Fields Highlights:**

- **Deposit-specific:** `rate_bp`, `interest_method`, `gl_control_id`, `lock_in_days`
- **Loan-specific:** `schedule_method`, `penalty_bp`, `collateral_required`, `ltv_percent`

---

### 4. Accounts

**Tables:**

- `accounts` – Core account record per product
- `account_customers` – Customer ownership (primary/joint)
- `account_introducers` – Introducer linkage
- `account_nominees` – Nominee & share info
- `account_signatories` – Authorized signatories & mandate

**Account Types:**

- SAVINGS, SHARE, RD, FD, LOAN, INSURANCE

**Notes:**

- `balance` tracks current balance / loan outstanding
- `accrued_interest` tracks interest earned or payable
- `maturity_date` applies to FD, RD, or loans

---

### 5. Term & Recurring Deposits

**Tables:**

- `term_deposits` – Principal, rate, start/maturity, compounding, auto-renew
- `recurring_deposits` – Installment amount, rate, cycle, tenor

**Business Rules:**

- Interest can be compounded: monthly, quarterly, semi-annual, annual, or at maturity

---

### 6. Loans

**Tables:**

- `loan_applications`
- `loan_sureties`
- `loan_collaterals`
- `loan_guarantors`
- `loan_applicant_work_details`
- `loan_applicant_assets`
- `loan_applicant_incomes`
- `loan_applicant_expenses`
- `loan_application_supporting_docs`
- `loan_approvals`
- `loan_disbursements`
- `loan_application_status_history`

**Loan Flow:**

1. **Application Stage** – Customer submits loan; all supporting data is recorded.
2. **Approval Stage** – Credit officer approves and sets schedule.
3. **Account Creation** – Approved loan gets a new `accounts` entry.
4. **Disbursement Stage** – Loan credited to borrower account.
5. **Repayment Schedule** – Generated and linked to loan account.
6. **Repayment Stage** – Payments update balances & schedules.
7. **Closure / Write-off** – Loan is closed when fully repaid or waived.

---

### 7. Bank / Cash / Vault / Teller

**Tables:**

- `bank_accounts` – Bank accounts per branch
- `vaults` – Cash vault per branch
- `vault_denominations` – Denomination count in vaults
- `cash_drawers` – Teller drawers
- `teller_shifts` – Shift management, variance calculation
- `cash_transactions` – Cash inflow/outflow
- `transactions` – Customer-level ledger transactions

**Notes:**

- All teller and vault cash movements must **link to journal entries**.
- `transactions` table represents **customer perspective**.

---

### 8. Journals / GL

**Tables:**

- `gl_accounts` – Chart of accounts
- `journal_entries` – Master journal record
- `journal_lines` – Debits and credits per GL

**Business Rules:**

- Double-entry system: total debits = total credits
- Each `transaction` links to a `journal_entry`

---

### 9. Payments / Schedules / Interest / Charges

**Tables:**

- `schedules` – Loan/RD/FD schedule rows
- `insurance_premiums` – Premium payments
- `payments` – Payment receipts for accounts/schedules
- `interest_accruals` – Interest posting
- `charges` – Fees and penalties
- `insurance_claims` – Insurance claim records

---

### 10. Cheques

**Tables:**

- `cheque_books` – Customer cheque books
- `cheques` – Individual cheques
- `pending_cheque_debits` – Hold amounts for pending cheques

**Notes:**

- Cheque statuses: ISSUED, PENDING, CLEARED, BOUNCED, CANCELLED
- System handles posting, clearing, and pending holds automatically

---

### 11. Audit Log

**Tables:**

- `audits` – Tracks CRUD changes across the system

**Fields:**

- `auditable_type`, `auditable_id` – Entity changed
- `user_id` – Who made the change
- `event` – CREATED, UPDATED, DELETED, RESTORED
- `old_values`, `new_values` – JSON snapshots
- `branch_id`, `ip_address`, `user_agent` – Context

---

### 12. Principles & Notes

- All money movements are **backed by journal lines**.
- Customer account balance is **derived from transactions**.
- Teller shifts and cash drawer balances are **auditable**.
- KYC & family relations are fully tracked.
- Loan schedules, repayments, and interest accruals maintain **full auditability**.
