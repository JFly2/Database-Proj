# Party Rental Database Project

This project models a mock database for a **Party Rental business**. It manages customers, employees, rental items, events, and customer feedback. It's useful for practicing SQL queries, designing ER diagrams, or building database-driven apps.

---

## Database Overview

Database Name: `party_rental`  
Engine: MyISAM  
Charset: utf8mb4  

---

## Tables & Structure

### Customer

Stores information about customers.

| Column       | Type        | Description              |
|--------------|-------------|--------------------------|
| CustomerID   | INT (PK)    | Unique customer ID       |
| fname        | VARCHAR(15) | First name               |
| lname        | VARCHAR(20) | Last name                |
| phoneNumber  | VARCHAR(11) | Contact phone number     |
| address      | VARCHAR(30) | Home address             |

---

### Employee

Tracks rental service employees.

| Column      | Type        | Description              |
|-------------|-------------|--------------------------|
| EmployeeID  | INT (PK)    | Unique employee ID       |
| name        | VARCHAR(10) | Employee name            |
| wage        | DOUBLE      | Hourly wage              |

---

### Party_Event

Details individual rental events.

| Column      | Type        | Description              |
|-------------|-------------|--------------------------|
| EventID     | INT (PK)    | Unique event ID          |
| startDate   | DATE        | Event start date         |
| endDate     | DATE        | Event end date           |
| pickupDate  | DATE        | Equipment pickup date    |
| totalPrice  | DOUBLE      | Total price of event     |

---

### RentalItem

Catalog of items available for rent.

| Column   | Type        | Description                |
|----------|-------------|----------------------------|
| ItemID   | INT (PK)    | Unique item ID             |
| name     | VARCHAR(10) | Item name (e.g., Chair)    |
| type     | VARCHAR(11) | Item type (Furniture, etc) |
| status   | VARCHAR(10) | Availability (Available/Rented) |
| price    | DOUBLE      | Price per unit             |

---

### CustomerFeedback

Captures customer feedback for events.

| Column      | Type     | Description                                 |
|-------------|----------|---------------------------------------------|
| FeedbackID  | INT (PK) | Unique feedback ID                          |
| EventID     | INT      | ID of the associated party event            |
| CustomerID  | INT      | ID of the customer giving feedback          |
| starRating  | INT      | Rating out of 5                             |

---

## Relationships (Logical, not enforced via FK in schema)

- Each **CustomerFeedback** entry links to a `Customer` and a `Party_Event`.
- Each **Party_Event** is indirectly tied to customers (via feedback) and items (in implementation scenarios).
- Employees are not directly linked in the schema but could be linked to events in an extended version.

---

## Sample Data Includes

- 🎭 3 Customers (`Freddy Krueger`, `Ellen Ripley`, `Michael Myers`)
- 👥 3 Employees (`James`, `Allison`, `Donato`)
- 🛠️ 5 Rental Items (e.g., Chair, Tent, Projector)
- 📆 3 Party Events
- ⭐ 3 Customer Feedback records

---

## How to Use

1. Import `DataDump.sql` into MySQL using phpMyAdmin or CLI.
2. Explore or query the data:
   ```sql
   SELECT * FROM customer;
   SELECT * FROM rentalitem WHERE status = 'Available';
