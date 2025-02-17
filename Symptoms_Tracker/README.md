Overview

 At SymptomTracker, we are dedicated to making health monitoring effortless and insightful. Our platform allows users to track symptoms, recognize patterns, and connect with healthcare professionals seamlessly.
We believe that understanding your health should be simple and accessible. SymptomTracker provides a user-friendly interface designed to help individuals log their symptoms, visualize trends over time, and receive tailored recommendations.

Features

- User Signup with secure password hashing

- User Login with password verification

- Profile update functionality with CURD opeartion

- Responsive design using HTML, CSS ,JS

- Secure authentication system using password_hash() and password_verify()
- User can enter their symptoms and also choose symptoms given in dropdown list andd see the matching condition of their symptoms along with     their age and gender
- Users can book an appoinment and see their appoinment details in their  profile(Dashboard)
- Users cann't make an doctor appoinment until and unless they register
- User can 

Technologies Used

- Frontend: HTML, CSS ,JS

- Backend: PHP

- Database: MySQL


Run the following SQL query to create the users table:

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    telephone_number VARCHAR(20),
    dob DATE

);
CREATE TABLE symptoms (
    id INT PRIMARY KEY AUTO_INCREMENT,
    age INT NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL,
    symptoms TEXT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    user_id INT DEFAULT 0
);

CREATE TABLE mapping_symptoms (
    id INT PRIMARY KEY AUTO_INCREMENT,
    symptom VARCHAR(255) NOT NULL,
    condition VARCHAR(255) NOT NULL
);

INSERT INTO mapping_symptoms (symptom, condition) VALUES
('Wet Cough', 'Bronchitis, Pneumonia'),
('Persistent Cough', 'Asthma, COVID-19'),
('Pulsating Headache', 'Migraine'),
('Throbbing Headache', 'Migraine, Hypertension'),
('Severe Headache', 'Brain Tumor, Stroke'),
('New Onset Headache', 'Sinus Infection, Dehydration'),
('Mild Fever', 'Common Cold, Mild Viral Infection'),
('High Fever', 'Flu, Pneumonia, Dengue'),
('Body Ache', 'Flu, Pneumonia, Dengue'),
('Dry Cough', 'Asthma, Allergy, COVID-19'),
('Wet Cough', 'Bronchitis, Pneumonia'),
('Persistent Cough', 'Asthma, COVID-19');

CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    counselor VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    time VARCHAR(10) NOT NULL,
    specialization VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

