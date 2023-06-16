<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="pre-page.css" />
    <link
      rel="stylesheet"
      href="https://unicons.iconscout.com/release/v4.0.0/css/line.css"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>WeatherCast_Predictor_Page</title>
  </head>
  <body>
    <div class="container">
      <div class="search wrapper" id="search">
        <h1>WeatherCast</h1>
        <div class="input-container">
          <form style = " font-size: 16px;
                          flex: 100%;
                          resize: none;
                          background-color: transparent;
                          border: none;
                          margin: 0;
                          padding: 0;
                          color: #e8eaed;
                          display: flex;
                          justify-content: center;
                          align-items: center;
                          word-wrap: break-word;
                          outline: none;
                          display: flex;
                          -webkit-tap-highlight-color: transparent;
                          font-family: arial,sans-serif;
                          line-height: 22px;
                          margin-bottom: 8px;" 
                        action="popup.php" method="POST" >
            <input type="text" name="district" placeholder="Enter District Name" spellcheck="false" list="district" />
              <datalist id="district" >
                <option value="Adilabad"></option>
                <!-- <option value="Bhadradri-Kothagudem"></option> -->
                <option value="Hyderabad"></option>
                <option value="Jagtial"></option>
                <option value="Jangaon"></option>
                <!-- <option value="Jayashankar-Bhupalpally"></option> -->
                <!-- <option value="Jogulamba-Gadwal"></option> -->
                <option value="Kamareddy"></option>
                <option value="Karimnagar"></option>
                <option value="Khammam"></option>
                <!-- <option value="Kumuram Bheem - Asifabad"></option> -->
                <option value="Mahabubabad"></option>
                <option value="Mahabubnagar"></option>
                <option value="Mancherial"></option>
                <option value="Medak"></option>
                <!-- <option value="Medchal-Malkajgiri"></option> -->
                <!-- <option value="Mulug"></option> -->
                <option value="Nagarkurnool"></option>
                <option value="Nalgonda"></option>
                <!-- <option value="Narayanpet"></option> -->
                <option value="Nirmal"></option>
                <option value="Nizamabad"></option>
                <option value="Peddapalli"></option>
                <!-- <option value="Rajanna-Siricilla"></option> -->
                <!-- <option value="Rangareddy"></option> -->
                <option value="Sangareddy"></option>
                <option value="Siddipet"></option>
                <option value="Suryapet"></option>
                <option value="Vikarabad"></option>
                <option value="Wanaparthy"></option>
                <!-- <option value="Warangal Rural"></option>
                <option value="Warangal Urban"></option> -->
                <!-- <option value="Yadadri-Bhongir"></option> -->
              </datalist>
            
            <!-- <button class="btn"><i class="uil uil-location-point"></i></button> -->
          </div>
          <<div class="row">
            <div class="col-md-6 date-container">
              <label for="date">Select a date:</label>
              <input type="date" id="date" name="date" min="2019-01-01" max="2023-12-31" class="form-control">
            </div>
          </div>
          
          <div class="search-button-container">
            <button class="info-btn"><input type="submit" name="submit" value="Submit"> </button>
          </div>

          <div class="error-container">
            <p class="error-text" id="error"></p> 
          </div>
      </form>
      </div>
    </div>
    <footer id="Contact"> 
      <nav>
        <ul>
          <a href="http://localhost/PHP/capstone/Home_Page/" class="info-btn">HOME</a>
        </ul>
      </nav>
      <p>&copy; 2023 WeatherCast Website. All rights reserved.</p>
    </footer>

    <script>
      document.querySelector('form').addEventListener('submit', function(event) 
      {
        var districtInput = document.querySelector('input[name="district"]');
        var districtList = document.querySelector('#district');
        if (!districtList.querySelector('option[value="' + districtInput.value + '"]')) 
        {
          event.preventDefault();
          var errorContainer = document.querySelector('.error-container');
          var errorText = document.querySelector('#error');
          errorText.innerText = 'Sorry, we cannot predict the weather for this city.';
          errorContainer.style.display = 'block';
        }
      });
      
    </script>
    </div> 
  </body>
</html>
