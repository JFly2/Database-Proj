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
                                <a class="dropdown-item" aria-current="page" href="table.php">View Events</a>
                                <a class="dropdown-item" aria-current="page" href="search.php">Search Events</a>
                                <a class="dropdown-item" aria-current="page" href="insert.php">Add Event</a>
                            </div>
                        </div>
                        <div class="btn-group me-2">
                            <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Customer
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" aria-current="page" href="../Customer/customertable.php">View
                                    Customers</a>
                                <a class="dropdown-item" aria-current="page"
                                    href="../Customer/searchcustomer.php">Search Customer</a>
                                <a class="dropdown-item" aria-current="page" href="../Customer/addcustomer.php">Add
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
            <h1 style="text-align: center;">View Events</h1>

            <div style="margin-left: 10%; margin-right: 10%;">
                <?php
                include '../connect.php';

                $query = "SELECT * FROM `Party_Event`";
                $result = $conn->query($query) or die('Could not run query: ' . $conn->error);

                if ($result->num_rows > 0) {
                    echo "<table class='table table-striped table-bordered'>";
                    echo "<thead>
            <tr>
                <th>Event ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Pickup Date</th>
                <th>Total Price</th>
                <th></th>
            </tr>
          </thead>";
                    echo "<tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["EventID"] . "</td>
                            <td>" . $row["startDate"] . "</td>
                            <td>" . $row["endDate"] . "</td>
                            <td>" . $row["pickupDate"] . "</td>
                            <td>" . "$" . $row["totalPrice"] . "</td>
                            <td>
                                <form method='GET' action='delete.php'>
                                    <input type='hidden' name='EventID' value='" . $row["EventID"] . "'>
                                    <button type='submit' class='btn btn-danger'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash3' viewBox='0 0 16 16'>
                                            <path d='M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.'></path>
                                        </svg>
                                    </button>
                                </form>
                            </td>
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