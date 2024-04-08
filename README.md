# PHP Backend for Auto Sales Database

This repository contains the PHP backend code designed to manage an auto sales database. The project is a part of the "Internet Programming SIS3410" course assignment.

## Description

The backend implements CRUD operations for two main tables: `Autos` and `Clientes`. Additionally, it features an intermediary component to associate multiple autos with respective clients.

### Database Tables

- `Autos`: Stores information about the cars for sale.
- `Clientes`: Contains customer data.
- `Cliente_Auto`: A junction table to establish relationships between clients and autos.

### Endpoints

The backend provides endpoints for each CRUD operation:

- `createAuto`
- `readAutoCliente`
- `updateAuto`
- `deleteAuto`

## Technologies Used

- PHP
- MySQL
- XAMPP (Apache Server, MySQL Database)
- Postman for testing endpoints

## Getting Started

To get the backend up and running:

1. Clone the repository to your local server.
2. Set up your MySQL database according to the provided schema.
3. Ensure XAMPP is running Apache and MySQL services.
4. Use Postman to interact with the endpoints.
