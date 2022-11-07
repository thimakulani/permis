<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Performance</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  
 
</head>
<body class="container">

<center><legend> Jobholder’s Details</legend></center>

<form class="container" style = "height:600px;overflow-y:auto">
  <fieldset>
    <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Contract Type</label>
      <select class="form-select" id="exampleSelect1">
        <option>PERMANENT</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
    <div class="form-group">
      <label for="employeeName" class="form-label mt-4">Name</label>
      <input  class="form-control" id="employeeName" placeholder="Name(s)">
    </div>
    <div class="form-group">
      <label for="persalNumber" class="form-label mt-4">Persal Number</label>
      <input  class="form-control" id="persalNumber" placeholder="Persal">
    </div>
    <div class="form-group">
      <label for="jobTitle" class="form-label mt-4">Job Title</label>
      <input  class="form-control" id="jobTitle" placeholder="Job Title">
    </div>

    <div class="form-group">
                  <label>Salary Entry Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>

    <div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Salary Level</label>
      <select class="form-select" id="exampleSelect1">
        <option>PERMANENT</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>

    <div class="form-group">
      <label for="notch" class="form-label mt-4">Notch</label>
      <input  class="form-control" id="notch" placeholder="notch">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form> 

<!--  Second Part of the form -->

<center><legend> Performance Plan</legend></center>

<form class="container" style ="height:1000px;overflow-y:auto">
  <fieldset>
    <div class="form-group">
      <label for="responsibility" class="form-label mt-4">Key Responsibilty</label>
      <input  class="form-control" id="responsibility" placeholder="Key Responsibilty">
    </div>
    <div class="form-group">
      <label for="gafs" class="form-label mt-4">GAFS(Generic Assessment Factors)</label>
      <input  class="form-control" id="gafs" placeholder="GAFS">
    </div>
    <div class="form-group">
      <label for="outcome" class="form-label mt-4">Performance Outcome</label>
      <input  class="form-control" id="outcome" placeholder="Performance Outcome">
    </div>

    <div class="form-group">
      <label for="weight" class="form-label mt-4">Weight Of Outcome (in %)</label>
      <select class="form-select" id="weight">
        <option>1%</option>
        <option>2%</option>
        <option>3%</option>
        <option>4%</option>
        <option>5%</option>
        <option>6%</option>
        <option>7%</option>
        <option>8%</option>
        <option>9%</option>
        <option>10%</option>
        <option>11%</option>
        <option>12%</option>
      </select>
    </div>

    <div class="form-group">
      <label for="Expected Output" class="form-label mt-4">Expected Output
(specific criteria that must be achieved against the jobholder’s performance will be assessed = minimum 5 expected outputs per performance outcome)</label>
      <input  class="form-control" id="Expected Output" placeholder="Expected Output">
    </div>

    <div class="form-group">
      <label for="PerformanceMeasurement" class="form-label mt-4">Performance Measurement
(Specific activities and tasks that stipulate quality and legal requirements)</label>
      <input  class="form-control" id="PerformanceMeasurement" placeholder="Performance Measurement">
    </div>

    <div class="form-group">
      <label for="Timeframes" class="form-label mt-4">Timeframes</label>
      <input  class="form-control" id="Timeframes" placeholder="Timeframes">
    </div>

    <div class="form-group">
      <label for="Resources" class="form-label mt-4">Resources</label>
      <input  class="form-control" id="Resources" placeholder="Resources">
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </fieldset>
</form> 


</body>
</html>
