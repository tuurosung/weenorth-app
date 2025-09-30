CREATE TABLE members (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    member_id VARCHAR(20) UNIQUE NOT NULL,           -- Custom member ID (e.g., MEM001, MEM002)
    cohort VARCHAR(25),
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NULL,
    phone VARCHAR(20),
    date_of_birth DATE,
    gender,

    -- Address Information
    address TEXT,
    region_id BIGINT UNSIGNED, -- Links to regions table
    district_id BIGINT UNSIGNED, -- Links to districts table

    -- Professional Information
    trade_id BIGINT UNSIGNED, -- Links to trades table
    experience_years INT UNSIGNED,
    skill_level,

    -- Membership Information
    membership_type,
    membership_status,
    joined_date DATE NOT NULL,

    -- Additional Information
    profile_photo VARCHAR(255), -- File path for profile image
    bio TEXT NULL, -- Member biography/description
    certification_documents JSON NULL, -- Store certification file paths

    -- Status and Timestamps
    is_verified BOOLEAN DEFAULT FALSE,
    email_verified_at TIMESTAMP NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,

    -- Foreign Key Constraints
    FOREIGN KEY (region_id) REFERENCES regions (id) ON DELETE SET NULL,
    FOREIGN KEY (district_id) REFERENCES districts (id) ON DELETE SET NULL,
    FOREIGN KEY (trade_id) REFERENCES trades (id) ON DELETE SET NULL,

;
