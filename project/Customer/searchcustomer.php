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
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <div class="btn-group me-2">
                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <button type="button" class="btn btn-secondary dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Employee
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" aria-current="page" href="../Employee/query_table.php">View
                                        Employees</a>
                                    <a class="dropdown-item" aria-current="page" href="../Employee/search.php">Search
                                        Employee</a>
                                    <a class="dropdown-item" aria-current="page"
                                        href="../Employee/insert_record.php">Add
                                        Employee</a>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>

        <div class="position-relative top-0 start-50 translate-middle-x">
            <h1 style="text-align: center;">Search Customers</h1>
        </div>

        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="form-group row" style="margin-left: auto; margin-right: auto;">
                <form action="" method="GET">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="customerID" class="form-label">Customer ID:</label>
                            <input type="number" class="form-control" id="customerID" name="customerID">
                        </div>
                        <div class="col-md-6">
                            <label for="firstName" class="form-label">First Name:</label>
                            <input type="text" class="form-control" id="firstName" name="firstName">
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label">Last Name:</label>
                            <input type="text" class="form-control" id="lastName" name="lastName">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-6">
                            <label for="phoneNumber" class="form-label">Phone Number:</label>
                            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                        </div>
                        <div class="col-md-6">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" class="form-control" id="address" name="address">
                        </div>

                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary me-2">Search</button>
                            <button type="button" class="btn btn-danger"
                                onclick="window.location.href='searchcustomer.php'">Reset</button>
                        </div>
                </form>
            </div>
        </div>

        <div class="container mt-5">
            <?php
            if (
                $_SERVER["REQUEST_METHOD"] == "GET" &&
                (isset($_GET['customerID']) || isset($_GET['firstName']) || isset($_GET['lastName']) || isset($_GET['phoneNumber']) || isset($_GET['address']))
            ) {
                include 'ConnectEmployeesDB.php';

                $conditions = [];

                $customerID = $_GET['customerID'];
                $firstName = $_GET['firstName'];
                $lastName = $_GET['lastName'];
                $phoneNumber = $_GET['phoneNumber'];
                $address = $_GET['address'];

                if (!empty($_GET['customerID'])) {
                    $customerID = $conn->real_escape_string($_GET['customerID']);
                    $conditions[] = "CustomerID = '$customerID'";
                }

                if (!empty($_GET['firstName'])) {
                    $firstName = $conn->real_escape_string($_GET['firstName']);
                    $conditions[] = "fname LIKE '%$firstName%'";
                }

                if (!empty($_GET['lastName'])) {
                    $lastName = $conn->real_escape_string($_GET['lastName']);
                    $conditions[] = "lname LIKE '%$lastName%'";
                }

                if (!empty($_GET['phoneNumber'])) {
                    $phoneNumber = $conn->real_escape_string($_GET['phoneNumber']);
                    $conditions[] = "phoneNumber LIKE '%$phoneNumber%'";
                }

                if (!empty($_GET['address'])) {
                    $address = $conn->real_escape_string($_GET['address']);
                    $conditions[] = "address LIKE '%$address%'";
                }

                $sql = "SELECT CustomerID, fname AS firstName, lname AS lastName, phoneNumber, address FROM Customer";
                if (count($conditions) > 0) {
                    $sql .= " WHERE " . implode(" AND ", $conditions);
                }


                $result = $conn->query($sql);
                if ($result && $result->num_rows > 0) {
                    echo "<table class='table table-bordered table-hover'>
                    <thead>
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
                            <td>" . $row['CustomerID'] . "</td>
                            <td>" . $row['firstName'] . "</td>
                            <td>" . $row['lastName'] . "</td>
                            <td>" . $row['phoneNumber'] . "</td>
                            <td>" . $row['address'] . "</td>
                        </tr>";
                    }

                    echo "</tbody></table>";

                } else {
                    echo "<p>No customers found with the specified criteria.</p>";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>