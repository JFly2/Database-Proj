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
            <h1 style="text-align: center;">Add Event</h1>
        </div>

        <div class="position-absolute top-50 start-50 translate-middle">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <label for="startDate" class="form-label">Start Date:</label>
                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                    </div>
                    <div class="col-md-6">
                        <label for="endDate" class="form-label">End Date:</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <label for="pickupDate" class="form-label">Pickup Date:</label>
                        <input type="date" class="form-control" id="pickupDate" name="pickupDate" required>
                    </div>
                    <div class="col-md-6">
                        <label for="totalPrice" class="form-label">Total Price:</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" class="form-control" id="totalPrice" name="totalPrice" required>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-4">
                    <button type="submit" class="btn btn-primary">Insert</button>
                </div>
            </form>
        </div>


        <div class="container mt-5">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include '../connect.php';

                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $pickupDate = $_POST['pickupDate'];
                $totalPrice = $_POST['totalPrice'];

                $newEventID = 0;
                $largestID = "SELECT MAX(EventID) FROM Party_Event;";
                $result = $conn->query($largestID);
                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $newEventID = $row['MAX(EventID)'] + 1;
                } else {
                    echo "<div class='alert alert-warning'>No event IDs found, defaulting to 0.</div>";
                }

                $query = "INSERT INTO Party_Event (EventID, startDate, endDate, pickupDate, totalPrice) VALUES (?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($query);
                $stmt->bind_param("issss", $newEventID, $startDate, $endDate, $pickupDate, $totalPrice);
                $status = $stmt->execute();
                if ($status) {
                    echo "<div class='alert alert-success'>Successfully inserted new event with ID $newEventID.</div>";
                } else {
                    echo "<div class='alert alert-danger'>Failed to insert new event.</div>";
                }
            }
            ?>
        </div>
    </div>
    </div>
</body>

</html>