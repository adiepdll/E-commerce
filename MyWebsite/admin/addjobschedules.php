<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="updatejobschedules.css">
</head>
<body>
    <div class="sidenav">
        <?php
            include "adminpage.php";
        ?>
    </div>

<div class="main">
    <br><br><br>
    <h2>New Job Schedule</h2>
    <div class="container">
        <form action="../includes/addjobscheduleshandler.inc.php" method="post" >
            <div class="row">
                <div class="col-25">
                    <label for="jobtype">Job Type</label>
                </div>
                <div class="col-75">
                    <select id="jobtype" name="jobtype">
                        <option value="Cook">Cook</option>
                        <option value="Plumber">Plumber</option>
                        <option value="Home Cleaning">Home Cleaning</option>
                        <option value="Electrical Repair">Electrical Repair</option>
                        <option value="Driver">Driver</option>
                        <option value="Movers">Movers</option>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="schedule">Schedule</label>
                </div>
                <div class="col-75">
                    <input type="datetime-local" id="schedule" name="schedule" value="" placeholder="YYYY-MM-DD hh:mm:ss" style="width: 100%;
                        padding: 12px;
                        border: 1px solid #ccc;
                        border-radius: 4px;
                        resize: vertical;
                        font-size: 12px;
                        font-family: Verdana, Geneva, Tahoma, sans-serif;">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="city">City</label>
                </div>
                <div class="col-75">
                    <input type="text" id="city" name="city" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="skilledprofessional">Skilled Professional</label>
                </div>
                <div class="col-75">
                    <input type="text" id="skilledprofessional" name="skilledprofessional" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="description">Description</label>
                </div>
                <div class="col-75">
                    <textarea id="description" name="description" rows="4" cols="50" placeholder="Enter description for the job"></textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="price">Price</label>
                </div>
                <div class="col-75">
                    <input type="text" id="price" name="price" value="">
                </div>
            </div>

            <div class="row">
                <div class="col-25">
                    <label for="status">Status</label>
                </div>
                <div class="col-75">
                    <select id="status" name="status" value="">
                    <option value="open">Open</option>
                    <option value="closed">Closed</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <button class='button-18'>Save</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>