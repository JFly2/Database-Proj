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
            <h1 style="text-align: center;">Search Events</h1>
        </div>

        <div class="position-absolute top-50 start-50 translate-middle">
            <div class="form-group row" style="margin-left: auto; margin-right: auto;">
                <form action="" method="GET">
                    <div>
                        <select name="criteria" id="criteria" class="form-control btn btn-secondary dropdown-toggle"
                            data-bs-toggle="dropdown" onchange="updateInputField()">
                            <option value="eventID">Event ID</option>
                            <option value="startDate">Start Date</option>
                            <option value="endDate">End Date</option>
                        </select>
                    </div>
                    <br>

                    <div id="inputContainer">
                        <input type="number" id="inputField" class="form-control" placeholder="Enter Event ID" required
                            name="userInput">
                    </div>
                    <br>

                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary me-2">Search</button>
                        <button type="button" class="btn btn-danger"
                            onclick="window.location.href='search.php'">Reset</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="container mt-5">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['userInput'])) {
                include '../connect.php';

                $criteria = $_GET['criteria'];
                $userInput = $_GET['userInput'];

                $query = "";
                $dateCondition = "";

                if (isset($_GET['dateCriteria'])) {
                    $dateCondition = $_GET['dateCriteria'];
                }

                if ($criteria == "eventID") {
                    $query = "SELECT * FROM Party_Event WHERE eventID = ?";
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s", $userInput);
                } elseif ($criteria == "startDate") {
                    if ($dateCondition == "before") {
                        $query = "SELECT * FROM Party_Event WHERE startDate < ?";
                    } elseif ($dateCondition == "after") {
                        $query = "SELECT * FROM Party_Event WHERE startDate > ?";
                    } else {
                        $query = "SELECT * FROM Party_Event WHERE startDate = ?";
                    }

                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s", $userInput);
                } elseif ($criteria == "endDate") {
                    if ($dateCondition == "before") {
                        $query = "SELECT * FROM Party_Event WHERE endDate < ?";
                    } elseif ($dateCondition == "after") {
                        $query = "SELECT * FROM Party_Event WHERE endDate > ?";
                    } else {
                        $query = "SELECT * FROM Party_Event WHERE endDate = ?";
                    }

                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("s", $userInput);
                }

                if ($stmt) {
                    $stmt->execute();
                    $result = $stmt->get_result();

                    if ($result->num_rows > 0) {
                        echo "<table class='table table-bordered table-hover'>";
                        echo "<thead><tr><th>Event ID</th><th>Start Date</th><th>End Date</th><th>Pickup Date</th><th>Total Price</th></tr></thead>";
                        echo "<tbody>";
                        while ($row = $result->fetch_assoc()) {

                            echo "<tr>
                                <td>" . $row["EventID"] . "</td>
                                <td>" . $row["startDate"] . "</td>
                                <td>" . $row["endDate"] . "</td>
                                <td>" . $row["pickupDate"] . "</td>
                                <td>" . "$" . $row["totalPrice"] . "</td>
                            </tr>";
                        }
                        echo "</tbody></table>";
                    } else {
                        echo "<div class='alert alert-warning'>No results found for the given input.</div>";
                    }

                    $stmt->close();
                    $conn->close();
                } else {
                    echo "<div class='alert alert-danger'>Error: " . $conn->error . "</div>";
                }
            }
            ?>
        </div>
    </div>
    </div>
    <script>
        function updateInputField() {
            const criteria = document.getElementById("criteria").value;
            var inputField = document.getElementById("inputContainer");

            inputField.innerHTML = '';

            if (criteria === 'eventID') {
                inputField.innerHTML = `<input type="number" id="inputField" class="form-control" placeholder="Enter Event ID" required name="userInput">`;
            } else {
                inputField.innerHTML = `
                    <div class="row">
                        <div class="col-6">
                            <input type="date" id="inputField" class="form-control" required name="userInput">
                        </div>
                        <div class="col-6">
                            <select id="dateCriteria" class="form-control btn btn-secondary dropdown-toggle" required name="dateCriteria">
                                <option value="on">On</option>
                                <option value="before">Before</option>
                                <option value="after">After</option>
                            </select>
                        </div>
                    </div>
                `;
            }
        }

    </script>
</body>

</html>