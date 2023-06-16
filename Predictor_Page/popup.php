<?php
      $district = strtolower($_POST["district"]);
      $date = $_POST["date"];     
      $servername = "localhost";
      $username = "root";
      $password = "";
      $database = "capstone";

      // Create connection
      $conn = mysqli_connect($servername, $username, $password, $database);
?>
<Body>
  <h1 style="text-align: center; font-weight: bold; color: white;">
<?php

  try{
        if (!$conn) 
        {
          die("Connection failed: " . mysqli_connect_error());
        }
        echo "CONNECTED TO DATABASE SUCCESSFULLY";
      }
  catch (Exception)
  {
    if(!mysqli_connect_error()){
    echo "CHECK DATABASE CONNECTION".$e;
    }
  }
?>
  </h1>
</Body>
      

<?php
      $sql = "SELECT * FROM $district WHERE date = '$date'";
      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $rain = $row["rain"];
          $temp_min = $row["temp_min"];
          $temp_max = $row["temp_max"];
          $humidity_min = $row["humidity_min"];
          $humidity_max = $row["humidity_max"];
          $wind_speed_min = $row["wind_speed_max"];
          $wind_speed_max = $row["wind_speed_min"];
        }
      }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="popup.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>WeatherCast_Result_Page</title>
</head>
<body>
  <h1 style="text-align: center; font-weight: bold; color: white;" button id="open-popup"></button></h1>
  <div id="overlay"></div>
  <div id="popup-container">
    <section id="about">
      <div class="popup">
          <div class="location" id="district">
            <div class="text">
                <span> <h1><?php echo strtoupper($district) ; ?></h1></span>
                <p id="date">
                    <?php
                    $timestamp = strtotime($date);
                    $newDateString = date("d M Y", $timestamp);
                    echo $newDateString ."<br>";
                    ?>
                </p>
                <span> <h2>Telangna,IN <br>
                          <?php      
                              echo number_format(($temp_max),1); 
                          ?>
                          &#8451;</span></h2>    
            </div>
            <div class="image" id="image">
                <?php
                if ($rain > 10 and ($humidity_max + $humidity_min / 2) > 70){
                    $imageSrc = "img/rainy.png";
                }
                elseif (($temp_min + $temp_max) > 30 ){
                    $imageSrc = "img/sunny.png";
                }
                elseif ($rain > 10){
                    $imageSrc = "img/cloudy.png";
                }
                elseif (($temp_max + $temp_min / 2) < 18 and ($temp_max + $temp_min / 2) < 25){
                    $imageSrc = "img/plesant.png";
                }
                ?>
                <img src="<?php echo $imageSrc; ?>" alt="A beautiful image">
            </div>
        </div>
      
          <div class="others" id="current-weather">
              <div class="weather-condition-container">
                  <div class="weather-condition-wrapper">
                  <div class="weather-condition">
                      <div class="feels-like">
                        <h2>Feels like 
                          <?php
                              if ($rain > 10 and ($humidity_max + $humidity_min / 2) > 70){
                                echo "Rainy Weather Outside.";
                              } 
                              elseif (($temp_min + $temp_max) > 30 ){
                                echo "Hot Weather Outside.";
                              }
                              elseif ($rain > 10){
                                echo "Cloudy Weather Outside.";
                              }
                              elseif (($temp_max + $temp_min / 2) > 18 and ($temp_max + $temp_min / 2) < 25){
                                echo "Pleasant Weather Outside.";
                              }
                          ?>
                        </h2>
                      </div>
                  </div>
                  </div>
              </div>
      
              <div class="other-details">
                  <div class="rain">
                      <div >Rainfall : <?php echo $rain ?> <span> mm</span></div><br>
                  </div>
                    <div class="temp">
                          <div >Min Temprature : <?php echo $temp_min ?> <span>&#8451;</span></div>
                          <div >Max Temprature : <?php echo $temp_max ?> <span>&#8451;</span></div><br>
                    </div>
                      <div class="humidity">
                          <div >Min Humidity : <?php echo $humidity_min ?> <span>&#8451;</span></div>
                          <div >Max Humidity : <?php echo $humidity_max ?> <span>&#8451;</span></div><br>
                      </div>
                      <div class="wind-speed">
                          <div >Min Wind-Speed : <?php echo $wind_speed_min ?> Km/h <span></span></div>
                          <div >Max Wind-Speed : <?php echo $wind_speed_max ?> Km/h <span></span></div><br>
                      </div>
                  </div>
      
              </div>
              <div style= "text-align: center; width : 550px;">
                  <ul>
                    <a href="http://localhost/PHP/capstone/predictor_page/pre-page.php" class="info-btn">PREDICTOR</a>
                  </ul>
              </div>
          </div>    
</body>
</html>

  <script>
    const openPopupButton = document.getElementById("open-popup");
    const popupContainer = document.getElementById("popup-container");
    const closeButton = document.querySelector(".close-button");
    const overlay = document.getElementById("overlay");

    // Open popup when button is clicked
    openPopupButton.addEventListener("click", () => {
      popupContainer.style.display = "block";
      overlay.style.display = "block";
    });

    // Close popup when close button is clicked
    closeButton.addEventListener("click", () => {
      popupContainer.style.display = "none";
      overlay.style.display = "none";
    });

    // Close popup when overlay is clicked
    overlay.addEventListener("click", () => {
      popupContainer.style.display = "none";
      overlay.style.display = "none";
    });
  </script>
  
  <script>
  window.addEventListener('load', function() {
    document.getElementById('open-popup').click();
  });
  </script>
        