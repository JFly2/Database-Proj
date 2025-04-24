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
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                <a class="dropdown-item" aria-current="page" href="../Customer/customertable.php">View
                  Customers</a>
                <a class="dropdown-item" aria-current="page" href="../Customer/searchcustomer.php">Search Customer</a>
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
                <a class="dropdown-item" aria-current="page" href="query_table.php">View
                  Employees</a>
                <a class="dropdown-item" aria-current="page" href="search.php">Search
                  Employee</a>
                <a class="dropdown-item" aria-current="page" href="insert_record.php">Add
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
        <form method="POST" action="">

          <label for="search"> Enter employee ID: </label>
          <input type="number" id="search" name="search" required>
          <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary me-2">Search</button>
            <button type="button" class="btn btn-danger" onclick="window.location.href='search.php'">Reset</button>
          </div>

        </form>
      </div>
    </div>

    <div class="container mt-5">
      <?php
      include("connect.php");

      if (isset($_POST['search'])) {
        $employeeID = $_POST['search'];

        // Directly use the variable in the query
        $sqlEmp = "SELECT * FROM `Employee` WHERE EmployeeID = $employeeID";
        $result = $conn->query($sqlEmp) or die('Error: ' . $conn->error);

        if ($result && $result->num_rows > 0) {
          echo "<h2>Results</h2>";
          echo "<table class='table table-bordered'>";
          echo "<tr>
              <th>Employee ID</th>
              <th>Name</th>
              <th>Wage</th>
            </tr>";

          while ($row = $result->fetch_assoc()) {
            echo "<tr>" .
              "<td>" . $row["EmployeeID"] . "</td>" .
              "<td>" . $row["name"] . "</td>" .
              "<td>" . $row["wage"] . "</td>" .
              "</tr>";
          }
          echo "</table>";
        } else {
          echo "<p>No results found for Employee ID: $employeeID</p>";
        }
      }

      $conn->close();
      ?>
    </div>
  </div>
  </div>
</body>

</html>