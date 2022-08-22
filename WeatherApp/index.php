<?php

  error_reporting(E_ERROR | E_PARSE);

  $weather = "";

  $error = "";

  if(isset($_GET['city'])){

    $urlContent = file_get_contents('https://api.openweathermap.org/data/2.5/weather?q='.$_GET['city'].'&units=metric&appid=e26fbcf1d6e728a5a2bd51c9a23b2dcd');

    $forcastArray = json_decode($urlContent, true);

    

    if($forcastArray['cod'] == 200) {

      $weather = 'The weather in '.$_GET['city'].' is '.$forcastArray['weather'][0]['description'];

      $weather = $weather.'. The temperature is '.$forcastArray['main']['temp'].'&#8451;'.'. The speed of wind is '.$forcastArray['wind']['speed'].' m/sec';

    } else {
      $error = "The city name is incorrect, please try another name";
    }

    

  }

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="styles/style.css">

    <title>Weather App</title>
  </head>
  <body>
    

    <div class="container" id="mainDiv">
      <h1>Weather In The City</h1>

      <form>
        <div class="form-group">
          <label for="city">Input a city name</label>
          <input class="form-control" id="city" name="city" aria-describedby="Forcast city" placeholder="Enter city name">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

    <div id="forecastDiv">
      
      

        <?php

          if($weather){

              echo '<div class="alert alert-primary" role="alert">'.$weather.'</div>';

          } else if($error) {
              echo '<div class="alert alert-danger" role="alert">'.$error.'</div>';
          }

          ?>
        
      

    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>