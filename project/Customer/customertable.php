<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>CS321 Project</title>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</head>

<body>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.html">Party Rental</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Party Event
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" aria-current="page" href="../PartyEvent/table.php">View
                                    Events</a>
                                <a class="dropdown-item" aria-current="page" href="../PartyEvent/search.php">Search
                                    Events</a>
                                <a class="dropdown-item" aria-current="page" href="../PartyEvent/insert.php">Add
                                    Event</a>
                            </div>
                        </div>
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Customer
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" aria-current="page" href="customertable.php">View
                                    Customers</a>
                                <a class="dropdown-item" aria-current="page" href="searchcustomer.php">Search
                                    Customer</a>
                                <a class="dropdown-item" aria-current="page" href="addcustomer.php">Add
                                    Customer</a>
                            </div>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Employee
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" aria-current="page" href="../Employee/query_table.php">View
                                    Employees</a>
                                <a class="dropdown-item" aria-current="page" href="../Employee/search.php">Search
                                    Employee</a>
                                <a class="dropdown-item" aria-current="page" href="../Employee/insert_record.php">Add
                                    Employee</a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="position-relative top-0 start-50 translate-middle-x">
            <h1 style="text-align: center;">View Customers</h1>

            <div style="margin-left: 10%; margin-right: 10%;">
                <?php
                include 'ConnectEmployeesDB.php';

                $query = "SELECT * FROM `customer`";
                $result = $conn->query($query) or die('Could not run query: ' . $conn->error);

                if ($result->num_rows > 0) {
                    echo "<table class='table table-striped table-bordered'>";
                    echo "<thead>
            <tr>
                <th>Customer ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Address</th>
            </tr>
          </thead>";
                    echo "<tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["CustomerID"] . "</td>
                            <td>" . $row["fname"] . "</td>
                            <td>" . $row["lname"] . "</td>
                            <td>" . $row["phoneNumber"] . "</td>
                            <td>" . $row["address"] . "</td>
                        </tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";
                } else {
                    echo "<div class='alert alert-warning'>No results found</div>";
                }
                ?>
            </div>

        </div>
</body>

</html>