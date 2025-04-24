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
            <form method = "POST" action = "" >

                <div class="mb-3">
                <label for="id" class="form-label">Employee ID</label>
                <input type="text" class="form-control" id="id" name="employee_id" placeholder="Enter id #">
                </div>
              
                <div class="mb-3">
                  <label for="name" class="form-label">Employee Name</label>
                  <input type="text" class="form-control" id="name" name="employee_name" placeholder="Enter name">
                </div>
              
                <div class="mb-3">
                  <label for="wage" class="form-label">Employee Wage</label>
                  <input type="text" class="form-control" id="wage" name="employee_wage" placeholder="Enter wage ">
                </div>
              
                <button class = "btn btn-success">Add Employee</button>
              
                <div class = "center-container">
                  <a href="../index.html">Home</a>
                </div>
              </form>
        </div>


        <div class="container mt-5">
        <?php
include ("connect.php");
if(isset($_POST['employee_id']) && isset($_POST['employee_name']) && isset($_POST['employee_wage'])){

  $employee_id = $_POST['employee_id'];
$employee_name = $_POST['employee_name'];
$employee_wage = $_POST['employee_wage'];

$sqlInsert = "INSERT INTO employee (EmployeeID, name, wage)VALUES ('$employee_id', '$employee_name', '$employee_wage')";

if ($conn -> query($sqlInsert) === TRUE) {
  echo("New employee inserted successfully");
} else {
  echo ("Error inserting new employee: " . $conn->error);
}

 $conn->close();
}
?>
        </div>
    </div>
    </div>
</body>

</html>