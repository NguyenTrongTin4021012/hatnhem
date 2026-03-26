CREATE TABLE IF NOT EXISTS cafes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    district VARCHAR(50),
    lat DECIMAL(10, 8),
    lng DECIMAL(10, 8),
    vibe VARCHAR(50), -- Quiet, Industrial, Garden
    roast_type VARCHAR(20), -- Light, Medium, Dark
    extraction VARCHAR(50), -- V60, Espresso, Syphon
    machine VARCHAR(100),
    grinder VARCHAR(100),
    tds VARCHAR(20),
    roast_date DATE,
    alley_video_url VARCHAR(255)
);

-- Seed HCMC Specialty Cafes
INSERT INTO cafes (name, district, lat, lng, vibe, roast_type, extraction, machine, grinder, tds, roast_date, alley_video_url) VALUES 
('Bosgaurus Coffee', 'Bình Thạnh', 10.7935, 106.7075, 'Industrial', 'Light', 'Espresso', 'Black Eagle Gravimetric', 'Mahlkönig EK43', '110ppm', '2023-10-25', '#'),
('Every Half Roastery', 'District 3', 10.7818, 106.6905, 'Garden', 'Medium', 'V60', 'La Marzocco Linea PB', 'Mahlkönig E65S', '90ppm', '2023-10-26', '#'),
('96B Cafe & Roastery', 'District 1', 10.7892, 106.6913, 'Quiet', 'Light', 'V60', 'Modbar', 'EK43', '100ppm', '2023-10-24', '#'),
('Soul Specialty Coffee', 'District 1', 10.7765, 106.6920, 'Industrial', 'Light', 'Espresso', 'Slayer LP', 'Mythos II', '105ppm', '2023-10-26', '#');