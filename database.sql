-- PlasticPollutions Database Schema
-- Run this SQL to set up the database

CREATE DATABASE IF NOT EXISTS plasticpollutions;
USE plasticpollutions;

-- Users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    visitor_id VARCHAR(8) UNIQUE NOT NULL,
    first_name VARCHAR(50) NOT NULL,
    last_name VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    profile_image VARCHAR(255) DEFAULT NULL,
    bio TEXT DEFAULT NULL,
    phone VARCHAR(20) DEFAULT NULL,
    failed_attempts INT DEFAULT 0,
    lockout_until DATETIME DEFAULT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Donations table
CREATE TABLE IF NOT EXISTS donations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    amount DECIMAL(10, 2) NOT NULL,
    currency VARCHAR(3) DEFAULT 'USD',
    message TEXT DEFAULT NULL,
    campaign VARCHAR(100) DEFAULT 'General',
    transaction_ref VARCHAR(50) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Petitions table
CREATE TABLE IF NOT EXISTS petitions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT DEFAULT NULL,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    message TEXT DEFAULT NULL,
    signed_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Contact messages table
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    subject VARCHAR(200) NOT NULL,
    message TEXT NOT NULL,
    is_read TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Blog posts / Latest news
CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    slug VARCHAR(255) UNIQUE NOT NULL,
    excerpt TEXT,
    content LONGTEXT NOT NULL,
    author VARCHAR(100) DEFAULT 'PlasticPollutions Team',
    image_url VARCHAR(255) DEFAULT NULL,
    category VARCHAR(50) DEFAULT 'News',
    published TINYINT(1) DEFAULT 1,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Visitor counter
CREATE TABLE IF NOT EXISTS visitor_counter (
    id INT AUTO_INCREMENT PRIMARY KEY,
    ip_address VARCHAR(45) NOT NULL,
    page_visited VARCHAR(255) DEFAULT '/',
    user_agent TEXT,
    visited_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Pledges table
CREATE TABLE IF NOT EXISTS pledges (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT DEFAULT NULL,
    pledge_type VARCHAR(100) NOT NULL,
    details TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE SET NULL
);

-- Visitor registration numbers tracking
CREATE TABLE IF NOT EXISTS visitor_ids (
    id INT AUTO_INCREMENT PRIMARY KEY,
    visitor_id VARCHAR(8) UNIQUE NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample blog posts
INSERT INTO blog_posts (title, slug, excerpt, content, author, category) VALUES
('Ocean Plastic Crisis Reaches New Heights in 2025', 'ocean-plastic-crisis-2025', 
'Recent studies show that over 14 million tons of plastic end up in the ocean every year, making up 80% of all marine debris.',
'Recent studies show that over 14 million tons of plastic end up in the ocean every year, making up 80% of all marine debris found from surface waters to deep-sea sediments. The impact on marine life is devastating, with over 800 species affected by plastic pollution.\n\nResearchers have found microplastics in virtually every corner of the ocean, from the deepest trenches to Arctic ice. This pervasive contamination poses serious risks not only to marine ecosystems but also to human health through the food chain.\n\nPlasticPollutions at Pentecost University is committed to raising awareness about this crisis and taking concrete action to reduce plastic waste in our community and beyond.',
'PlasticPollutions Team', 'News'),

('Community Beach Cleanup: 500kg of Plastic Collected', 'beach-cleanup-500kg',
'Our recent community beach cleanup event was a massive success, with volunteers collecting over 500 kilograms of plastic waste.',
'Our recent community beach cleanup event was a massive success, with volunteers collecting over 500 kilograms of plastic waste from local beaches. Over 200 volunteers participated in the event, demonstrating the power of community action.\n\nThe collected waste included plastic bottles, bags, straws, fishing nets, and countless microplastic fragments. All recyclable materials were sorted and sent to recycling facilities, while non-recyclable items were properly disposed of.\n\nThis event highlights both the severity of the plastic pollution problem and the positive impact that organized community action can have.',
'PlasticPollutions Team', 'Campaign'),

('New Partnership with Local Recycling Centers', 'recycling-partnership',
'PlasticPollutions has established new partnerships with three local recycling centers to improve plastic waste management.',
'PlasticPollutions has established new partnerships with three local recycling centers to improve plastic waste management in the Pentecost University community and surrounding areas.\n\nThese partnerships will enable better collection, sorting, and processing of plastic waste, with the goal of increasing the local recycling rate from less than 5% to at least 20% within the next two years.\n\nThe collaboration includes educational workshops, collection point installations across campus, and a rewards program for consistent recyclers.',
'PlasticPollutions Team', 'Partnership'),

('The Impact of Microplastics on Human Health', 'microplastics-human-health',
'New research reveals alarming findings about microplastics found in human blood, lungs, and organs.',
'New research reveals alarming findings about microplastics found in human blood, lungs, and organs. Scientists have detected microplastic particles in 77% of blood samples tested, raising serious concerns about long-term health effects.\n\nStudies suggest that microplastics can carry harmful chemicals and pathogens, potentially contributing to inflammation, cellular damage, and other health issues. The full extent of health impacts is still being researched.\n\nThis underscores the urgent need to reduce plastic pollution at its source and transition to sustainable alternatives.',
'PlasticPollutions Team', 'Research');
