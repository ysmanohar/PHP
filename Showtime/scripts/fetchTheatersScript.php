<?php
  session_start();
  include '../functions.php';
//Database Connection
$conn = new conn;
$connect = $conn->connectDatabase();

  if (isset($_POST["movie"])){
      $movie = $_POST["movie"];
      $city = $_SESSION["currentCity"];
      $_SESSION["movie"] = $movie;

      //Procedure call to fetch movies
      $query = "CALL getTheatresByMovie(?, ?)";
      $stmt = $connect->prepare($query);
      $stmt->bind_param('ss', $movie, $city);
      $stmt->execute();
      $result = $stmt->get_result();
      echo "<h4>Select Theatre</h4>";
      echo "<select id='theatres' name='theatres' onChange='theatreChanged();'>";
      echo "<option value=''>--</option>";
      while ($row = $result->fetch_assoc()){
        echo "<option value=".$row['name'].">".$row['name']."</option>";
      }
      echo "</select>";
  }else if (isset($_POST['theatre'])){

      $theatre = $_POST['theatre'];
      $movie = $_SESSION['movie'];
      $_SESSION['theatre'] = $theatre;

      $query = "CALL showsByTheatreAndMovie(?, ?)";
      $stmt = $connect->prepare($query);
      $stmt->bind_param('ss', $theatre, $movie);
      $stmt->execute();
      $result = $stmt->get_result();
      echo "<br><br>";
      echo "<div class='table-wrapper'>
      <table id='showsTable'>
      <thead>
      <tr>
      <th>Date</th>
      <th>Time</th>
      <th>Choose</th>
      </tr>
      </thead>
      <tbody> ";
	  
      while($row = $result->fetch_assoc()){
        echo "<tr class='rows'><td>".$row['date']."</td>";
        echo "<td>".$row['timing']."</td>";
        echo "<td><input type='radio' id='demo-priority-low' name='selectedShow' value=".$row['id']."></td></tr>";
      }
	  
	  
      echo "</tbody></table></div>";
      // Tickets count
	  echo "<b>Number of Tickets:</b>";
      echo "<Select name='ticketsCount'>";
      for($i=1; $i<11; $i++){
        echo "<option value=".$i.">".$i."</option>";
      }
	
	  
	
	 
	 
	  echo "</Select><br>";
	  echo "<b> Cost per Ticket: &nbsp;&nbsp;&nbsp</b>";
	  
		$sql = "SELECT * FROM `theatre` WHERE name='$theatre'";
		$conn = new conn;
		$connect = $conn->connectDatabase();	
		$result = mysqli_query($connect, $sql);
		while ($row = mysqli_fetch_object($result))
		{
			$_SESSION['cost'] = $row->Cost;
			echo $row->Cost;
		}
		
	  echo "<br>";	
	  echo "<br>";
	  echo "<b> Synopsis: &nbsp;&nbsp;&nbsp</b>";
	  echo "<br>";
		$sql = "SELECT * FROM `movie` WHERE title='$movie'";
		$conn = new conn;
		$connect = $conn->connectDatabase();	
		$result = mysqli_query($connect, $sql);
		while ($row = mysqli_fetch_object($result))
		{
     	echo $row->synopsis;
		}
		
		echo "<br>";
	  echo "<br>";	
	   echo "<b> Rating: &nbsp;&nbsp;&nbsp</b>";
	  	$sql = "SELECT * FROM `movie` WHERE title='$movie'";
		$conn = new conn;
		$connect = $conn->connectDatabase();	
		$result = mysqli_query($connect, $sql);
		while ($row = mysqli_fetch_object($result))
		{
     	echo $row->rating;
		}
		
		echo "<br>";
		echo "<br>";	
	   echo "<b> Review: &nbsp;&nbsp;&nbsp</b>";
	  	$sql = "SELECT * FROM `movie` WHERE title='$movie'";
		$conn = new conn;
		$connect = $conn->connectDatabase();	
		$result = mysqli_query($connect, $sql);
		while ($row = mysqli_fetch_object($result))
		{
     	echo $row->review;
		}
		
		echo "<br>";
		echo "<br>";	
	    echo "<b> Trailer: &nbsp;&nbsp;&nbsp</b>";
	  	$sql = "SELECT * FROM `movie` WHERE title='$movie'";
		$conn = new conn;
		$connect = $conn->connectDatabase();	
		$result = mysqli_query($connect, $sql);
		while ($row = mysqli_fetch_object($result))
		{
     	echo $row->trailer;
		}
		
		echo "<br>";
		echo "<br>";
      echo "<input type='submit' value='Book Ticket' class='special'/>";
  }else if (isset($_POST['bookings'])){

    $query = "CALL userBookings(?)";
    $stmt = $connect->prepare($query);
    $stmt->bind_param('s', $_SESSION['userId']);
    $stmt->execute();
    $result = $stmt->get_result();
    echo "<br><h2 style='text-align:center;'>Booking History</h2>";
    echo "<div class='table-wrapper'>
    <table id='historyTable'>
    <thead>
    <tr>
    <th>City</th>
    <th>Theatre</th>
    <th>Movie</th>
    <th>Date</th>
    <th>Show Time</th>
    <th>Tickets</th>
    <th>Select to Cancel</th>
    </tr>
    </thead>
    <tbody> ";
    while($row = $result->fetch_assoc()){
      echo "<tr class='rows'><td>".$row['city']."</td>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['title']."</td>";
      echo "<td>".$row['date']."</td>";
      echo "<td>".$row['timing']."</td>";
      echo "<td>".$row['num_tickets']."</td>";
      echo "<td><input type='radio' id='demo-priority-low' name='selectedBooking' value=".$row['booking_id']."></td></tr>";
    }
    echo "</tbody></table></div>";
    echo "<div style='text-align:center;'> <input type='button' class='button special' value='Cancel Ticket' onClick='cancelTicket();'></div>";
  }else if (isset($_POST['cancelId'])){

    $query = "CALL cancelBooking(?)";
    $stmt = $connect->prepare($query);
    $stmt->bind_param('i', $_POST['cancelId']);
    $stmt->execute();
    $result = $stmt->get_result();
  }
 ?>
