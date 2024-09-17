<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-dpuaG1suU0eT09tx5plTaGMLBsfDLzUCCUXOY2j/LSvXYuG6Bqs43ALlhIqAJVRb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Calculator</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <a class="navbar-brand" href="#">PHP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link" href="index.php">Home </a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="country.php">Country</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="state.php">State</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="city.php">City</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="connectdrop.php">Connected Dropdown</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="calc.php">Calculator</a>
            </li>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="logout.php">logout</a>
            </li>
        </ul>
        </div>
    </nav>
    <center>
        <h1>Calculator</h1></br>
    </center>
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            $input1 = $_POST['input1'];
            $input2 = $_POST['input2'];
            $opp = $_POST['operator'];

            if($input1 == '' || $input2 == ''){
                $Error = "The Input Values Are Required.";
            }
            elseif (filter_var($input1, FILTER_VALIDATE_FLOAT) === false || filter_var($input2, FILTER_VALIDATE_FLOAT) === false) {
                $Error = "The Input Value Must Be A Number Only.";
            }
            elseif($opp=="division" && ($input1 == 0 || $input2 == 0)){
                $Error = "Cannot Divide By Zero.";
            }
            else{
                if($opp=="addition")
                    $Result=$input1+$input2;
                else if($opp=="subtraction")
                    $Result=$input1-$input2;

                else if($opp=="multiplication")
                    $Result=$input1*$input2;
                else if($opp=="division")
                    $Result=$input1/$input2;
                else{
                    $Error = "You Have To Select An Operation To Perform.";
                }
            }
        }
    ?>
    <center>
        <form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="form-group col-md-3">
                <label for="inputPassword4">Input 1</label>
                <input type="text" id="input1" name="input1" placeholder="Enter Your First Input" >
            </div>      
            <div class="form-group col-md-3">
                <label for="inputEmail4">Input 2</label>
                <input type="text"  id="input2" name="input2" placeholder="Enter Your Second Input" >
            </div>    
            <div class="form-group col-md-3">
                <label for="inputEmail4">Operation</label>  
                <select name = "operator" id ="operator"  >
                    <option value = "">---Select operation---</option>
                    <option value = "addition">addition</option>
                    <option value = "subtraction">Subtraction</option>
                    <option value = "multiplication">Multiplication</option>
                    <option value = "division">Division</option>
                </select>
            </div>
            
        
            <?php if(isset($Result) && is_numeric($Result)){?>
            <!-- Display Result -->
            <div class="row justify-content-center">
                <div class="col">
                    <center>
                        <div class="alert alert-success shadow-sm" role="alert">Result : <?php echo $opp; ?> Of <?php echo $input1; ?> and <?php echo $input2; ?> is :  <?php echo $Result; ?></div>
                    </center>
                </div>
            </div>
            <?php } if(isset($Error)){?>
            <!-- for error msg -->
            <div class="row justify-content-center">
                <div class="col">
                    <center>
                        <div class="alert alert-danger shadow-sm" role="alert">Error: <?php echo $Error; ?></div>
                    <center>
                </div>
            </div>
            <?php } ?>
        
            <button type="submit" class="btn btn-primary">Get Result</button>   
        </form>
    </center>
</body>
</html>