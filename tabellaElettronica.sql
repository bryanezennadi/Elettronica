create database Elettronica;

CREATE TABLE Elettronica.Prodotti (

    codice INT PRIMARY KEY AUTO_INCREMENT,

    descrizione VARCHAR(255),

    costo DECIMAL(10, 2),

    quantità INT,

    data_di_produzione DATETIME

);

create table Elettronica.login(
id int primary key auto_increment,
password varchar(65),
email varchar(100),
ruolo varchar(10)

);



INSERT INTO Elettronica.Prodotti (descrizione, costo, quantità, data_di_produzione)

VALUES 

('Smartphone XYZ', 499.99, 100, '2025-01-15 08:00:00'),

('Laptop ABC', 899.99, 50, '2025-02-10 09:30:00'),

('Cuffie Bluetooth', 59.99, 200, '2025-03-01 10:00:00'),

('Smartwatch 4K', 199.99, 150, '2025-02-25 11:00:00'),

('Caricatore wireless', 29.99, 300, '2025-03-05 12:00:00'),

('Monitor LED 27" ', 329.99, 75, '2025-01-20 14:00:00'),

('Televisore 4K', 799.99, 40, '2025-02-12 15:30:00'),

('Tablet Pro Max', 499.99, 120, '2025-03-10 16:00:00');

INSERT INTO Elettronica.Prodotti (descrizione, costo, quantità, data_di_produzione)

VALUES 

('Auricolari In-Ear', 39.99, 250, '2025-01-05 13:00:00'),

('Router Wi-Fi 6', 119.99, 60, '2025-03-15 17:30:00'),

('SSD 1TB', 129.99, 90, '2025-02-20 18:00:00'),

('Macbook Pro 16"', 2399.99, 30, '2025-03-18 19:00:00'),

('Action Camera 4K', 249.99, 180, '2025-01-25 20:15:00'),

('Stampante Laser', 149.99, 120, '2025-02-28 21:45:00'),

('Cavo HDMI 2.0', 19.99, 400, '2025-03-10 22:00:00'),

('Sistema di sicurezza IP', 299.99, 50, '2025-01-30 23:30:00'),

('Telecomando universale', 14.99, 600, '2025-02-05 06:00:00'),

('Ventilatore a torre', 79.99, 150, '2025-03-12 07:15:00');

INSERT INTO Elettronica.Prodotti (descrizione, costo, quantità, data_di_produzione)

VALUES 

('Televisore OLED 55"', 1599.99, 40, '2025-03-22 10:30:00'),

('Laptop Gaming GTX 1660', 1299.99, 35, '2025-01-18 11:45:00'),

('Stazione di ricarica per veicoli elettrici', 799.99, 20, '2025-02-25 12:00:00'),

('Proiettore Full HD', 399.99, 75, '2025-03-10 14:00:00'),

('Smartphone PQR', 699.99, 150, '2025-01-28 15:30:00'),

('Drone con fotocamera 4K', 549.99, 45, '2025-02-14 16:30:00'),

('Router Mesh Wi-Fi', 249.99, 100, '2025-03-05 17:00:00'),

('Action Camera subacquea', 199.99, 120, '2025-03-18 18:15:00'),

('Box Audio Bluetooth', 99.99, 200, '2025-02-10 19:45:00'),

('Kit di illuminazione smart', 129.99, 180, '2025-03-01 20:30:00');

INSERT INTO Elettronica.Prodotti (descrizione, costo, quantità, data_di_produzione)

VALUES

('Smartphone Ultra 5G', 899.99, 120, '2025-03-20 09:00:00'),

('Televisore QLED 65"', 1899.99, 25, '2025-03-22 08:30:00'),

('Lettore Blu-Ray 4K', 129.99, 150, '2025-03-01 10:15:00'),

('Power Bank 20000mAh', 49.99, 300, '2025-02-10 11:30:00'),

('Cuffie Noise Cancelling', 299.99, 180, '2025-02-15 12:45:00'),

('Console di gioco PS5', 499.99, 50, '2025-02-28 13:00:00'),

('Disco rigido esterno 2TB', 99.99, 220, '2025-01-10 14:00:00'),

('Stampante 3D', 699.99, 30, '2025-01-20 15:30:00'),

('Monitor Curvo 32"', 399.99, 60, '2025-03-05 16:00:00'),

('Keyboard Meccanica RGB', 129.99, 150, '2025-03-12 17:15:00'),

('Mouse Gaming Wireless', 79.99, 250, '2025-03-18 18:30:00'),

('Proiettore portatile', 179.99, 100, '2025-03-07 19:45:00'),

('Fotocamera Reflex', 899.99, 70, '2025-03-11 20:00:00'),

('Frigorifero smart', 799.99, 40, '2025-02-18 21:30:00'),

('Microfono da studio', 149.99, 80, '2025-03-04 22:15:00'),

('Luce LED da scrivania', 39.99, 350, '2025-01-25 23:30:00'),

('Tablet Samsung Galaxy', 349.99, 200, '2025-03-14 06:00:00'),

('Telecamera di sorveglianza', 159.99, 90, '2025-02-22 07:00:00'),

('Altoparlante smart', 129.99, 180, '2025-03-10 08:45:00'),

('Router 5G', 249.99, 100, '2025-02-05 09:30:00'),

('Ferro da stiro a vapore', 69.99, 220, '2025-03-08 10:00:00'),

('Presa smart Wi-Fi', 19.99, 500, '2025-03-18 11:15:00'),

('Smart Glasses', 299.99, 60, '2025-02-14 12:00:00'),

('Batteria per auto elettrica', 999.99, 15, '2025-01-30 13:45:00'),

('Frullatore smart', 99.99, 150, '2025-03-20 14:15:00'),

('Scanner documenti', 129.99, 140, '2025-03-11 15:30:00'),

('TV Box Android', 49.99, 300, '2025-02-10 16:30:00'),

('Caricabatterie auto wireless', 39.99, 400, '2025-02-02 17:00:00'),

('Barra audio Bluetooth', 169.99, 180, '2025-03-16 18:30:00'),

('Tastiera wireless', 49.99, 250, '2025-03-02 19:00:00'),

('Videocamera sportiva', 299.99, 100, '2025-03-12 20:00:00'),

('Borsa per laptop', 69.99, 350, '2025-02-01 21:30:00'),

('Alimentatore universale', 29.99, 600, '2025-03-05 22:30:00');

INSERT INTO Elettronica.Prodotti (descrizione, costo, quantità, data_di_produzione)

VALUES

('Smartphone 5G Ultra', 999.99, 150, '2025-03-27 09:00:00'),

('Televisore 8K 75"', 2499.99, 20, '2025-03-15 10:30:00'),

('Altoparlante Bluetooth Portatile', 129.99, 200, '2025-03-20 11:00:00'),

('Mini Frigorifero da Scrivania', 89.99, 250, '2025-02-28 12:15:00'),

('Macbook Air M2', 1199.99, 60, '2025-03-10 13:00:00'),

('Hard Disk Esterno 4TB', 149.99, 180, '2025-03-17 14:30:00'),

('Sicurezza Smart per Casa', 349.99, 40, '2025-02-20 15:00:00'),

('Cuffie True Wireless', 79.99, 300, '2025-01-25 16:30:00'),

('Smartwatch Sport', 199.99, 150, '2025-03-22 17:00:00'),

('Caricatore Rapido Wireless', 39.99, 500, '2025-03-12 18:00:00'),

('Tablet 10" HD', 299.99, 120, '2025-03-14 19:30:00'),

('Scanner portatile', 159.99, 70, '2025-03-18 20:00:00'),

('Videocamera 360°', 499.99, 45, '2025-02-25 21:15:00'),

('Frullatore a Immersione', 49.99, 350, '2025-03-08 22:30:00'),

('Telecomando Smart TV', 19.99, 600, '2025-03-11 23:00:00'),

('Proiettore 1080p', 249.99, 150, '2025-02-26 06:00:00'),

('Cuffie Gaming con Microfono', 59.99, 220, '2025-03-06 07:30:00'),

('Smartphone Pieghevole', 1499.99, 30, '2025-01-30 08:00:00'),

('Kit di illuminazione LED RGB', 79.99, 180, '2025-03-03 09:30:00'),

('Lettore MP3 Bluetooth', 39.99, 400, '2025-03-01 10:15:00');

INSERT INTO Elettronica.Prodotti (descrizione, costo, quantità, data_di_produzione)

VALUES

('Smart TV 55" 4K', 799.99, 120, '2025-03-28 09:00:00'),

('Smartphone X1', 649.99, 150, '2025-03-25 10:30:00'),

('Stazione di Ricarica Wireless', 79.99, 200, '2025-03-15 11:45:00'),

('Mouse Gaming RGB', 59.99, 300, '2025-03-10 12:30:00'),

('Speaker Bluetooth 360°', 169.99, 180, '2025-03-07 13:15:00'),

('Videocamera 1080p per auto', 249.99, 70, '2025-03-05 14:00:00'),

('Echo Dot 5', 49.99, 250, '2025-02-28 15:45:00'),

('Sistema di Sorveglianza 4 Camere', 399.99, 40, '2025-03-12 16:30:00'),

('Frigorifero Mini', 169.99, 180, '2025-02-20 17:30:00'),

('Tablet Pro 12"', 499.99, 100, '2025-02-15 18:00:00'),

('Caricatore Auto QC3.0', 19.99, 500, '2025-03-22 20:00:00'),

('Drone Professionale 4K', 599.99, 60, '2025-02-18 21:00:00'),

('Cuffie Wireless con Microfono', 79.99, 200, '2025-02-25 22:15:00'),

('Batteria Esterna per Laptop', 129.99, 180, '2025-03-01 23:30:00'),

('Docking Station per Laptop', 99.99, 150, '2025-03-20 06:30:00'),

('Smart Plug Wi-Fi', 24.99, 400, '2025-03-10 07:00:00'),

('Lettore di impronte USB', 39.99, 300, '2025-03-03 08:00:00'),

('Tastiera Ergonomica', 49.99, 250, '2025-03-18 09:15:00'),

('Stazione Meteo Smart', 99.99, 120, '2025-02-28 10:00:00');



 drop table Elettronica.login;

insert into Elettronica.login(email, password, ruolo) values ('bryan@gmail.com', 'MM', 'Admin');

select * from Elettronica.login;
-- drop table Elettronica.prodotti;
UPDATE Elettronica.login
SET ruolo = 'Admin'
WHERE id = 1;




select * from Elettronica.prodotti p;