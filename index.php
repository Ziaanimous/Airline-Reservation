<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CODEJET:Airlines Reservation</title>
    <link rel="stylesheet" href="styles.css">

    <script src="script.js"></script>
    <style>
       
    </style>
</head>
<body>
    <!-- Header section -->
    <header class="header-container">
        <div class="logo-container">
            <a href="index.php">
                <img src="pastedimage-uoln-200h.png" alt="CODEJET:Airlines Logo" class="logo-img">
            </a>
            <span class="logo-text">CODEJET</span>
        </div>
        <div>
            <a href="admin.php" class="admin-link">Admin</a>
        </div>
    </header>
    <div class="home-container02">
        <img alt="image1621" src="image1621-1lya-500h-1500w.png" />
    </div>
    <h2 style="text-align: center;">Make a Reservation</h2>
    <form action="reservation.php" method="post" id="reservationForm">
        <div class="form-container">
            <div class="reservation-form">
                            <!-- Input Fields -->
                            <div class="form-row">
    <div class="form-column coolinput">
        <label for="first_name" class="text">First Name:</label>
        <input type="text" id="first_name" name="first_name" autocomplete="off" class="input">
    </div>
    <div class="form-column coolinput">
        <label for="last_name" class="text">Last Name:</label>
        <input type="text" id="last_name" name="last_name" autocomplete="off" class="input">
    </div>
    <div class="form-column coolinput">
        <label for="phone_number" class="text">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" autocomplete="off" class="input">
    </div>
</div>

            
            <!-- Dropdowns for From and To Locations -->
            <div class="form-row">
    <div class="form-column">
<div class="coolinput">
    <label for="from_location" class="text">From:</label>
    <select id="from_location" name="from_location" class="input" required>
    <option value="Manila" data-identifier="MNL">Manila (MNL)</option>
    <option value="New York" data-identifier="NYC">New York (NYC)</option>
    <option value="London" data-identifier="LON">London (LON)</option>
    <option value="Paris" data-identifier="PAR">Paris (PAR)</option>
    <option value="Tokyo" data-identifier="TOK">Tokyo (TOK)</option>
    <option value="Sydney" data-identifier="SYD">Sydney (SYD)</option>
    <option value="Berlin" data-identifier="BER">Berlin (BER)</option>
    <option value="Rome" data-identifier="ROM">Rome (ROM)</option>
    <option value="Moscow" data-identifier="MOW">Moscow (MOW)</option>
    <option value="Beijing" data-identifier="BJS">Beijing (BJS)</option>
    <option value="Toronto" data-identifier="YYZ">Toronto (YYZ)</option>
    <option value="Dubai" data-identifier="DXB">Dubai (DXB)</option>
    <option value="Singapore" data-identifier="SIN">Singapore (SIN)</option>
    <option value="Los Angeles" data-identifier="LAX">Los Angeles (LAX)</option>
    <option value="Mumbai" data-identifier="BOM">Mumbai (BOM)</option>
    <option value="Hong Kong" data-identifier="HKG">Hong Kong (HKG)</option>
    <option value="Madrid" data-identifier="MAD">Madrid (MAD)</option>
    <option value="Seoul" data-identifier="ICN">Seoul (ICN)</option>
    <option value="Bangkok" data-identifier="BKK">Bangkok (BKK)</option>
    <option value="Istanbul" data-identifier="IST">Istanbul (IST)</option>
    <option value="Amsterdam" data-identifier="AMS">Amsterdam (AMS)</option>
    <option value="Sydney" data-identifier="SYD">Sydney (SYD)</option>
    <option value="Chicago" data-identifier="ORD">Chicago (ORD)</option>
    <option value="Barcelona" data-identifier="BCN">Barcelona (BCN)</option>
    <option value="Vienna" data-identifier="VIE">Vienna (VIE)</option>
    <option value="Cairo" data-identifier="CAI">Cairo (CAI)</option>
    <option value="Canada" data-identifier="CND">Canada (CND)</option>
    <option value="Australia" data-identifier="AUS">Australia (AUS)</option>
    <option value="Brazil" data-identifier="BRA">Brazil (BRA)</option>
    <option value="Germany" data-identifier="GER">Germany (GER)</option>
    <option value="India" data-identifier="IND">India (IND)</option>
    <option value="Italy" data-identifier="ITA">Italy (ITA)</option>
    <option value="Japan" data-identifier="JPN">Japan (JPN)</option>
    <option value="Mexico" data-identifier="MEX">Mexico (MEX)</option>
    <option value="Russia" data-identifier="RUS">Russia (RUS)</option>
    <option value="South Africa" data-identifier="ZAF">South Africa (ZAF)</option>
    <option value="South Korea" data-identifier="KOR">South Korea (KOR)</option>
    <option value="Spain" data-identifier="ESP">Spain (ESP)</option>
    <option value="Switzerland" data-identifier="CHE">Switzerland (CHE)</option>
    <option value="Thailand" data-identifier="THA">Thailand (THA)</option>
    <option value="Turkey" data-identifier="TUR">Turkey (TUR)</option>
    <option value="United Kingdom" data-identifier="GBR">United Kingdom (GBR)</option>
    <option value="USA" data-identifier="USA">USA (USA)</option>
    <option value="Vietnam" data-identifier="VNM">Vietnam (VNM)</option>
    <option value="Austria" data-identifier="AUT">Austria (AUT)</option>
    <option value="Argentina" data-identifier="ARG">Argentina (ARG)</option>
    <option value="Chile" data-identifier="CHL">Chile (CHL)</option>
    <option value="Denmark" data-identifier="DNK">Denmark (DNK)</option>
    <option value="Egypt" data-identifier="EGY">Egypt (EGY)</option>
    <option value="Indonesia" data-identifier="IDN">Indonesia (IDN)</option>
    <option value="Malaysia" data-identifier="MYS">Malaysia (MYS)</option>
    <option value="Philippines" data-identifier="PHL">Philippines (PHL)</option>
                    </select>
                </div>
                </div>
      <center>
        <div class="form-column">
        <div class="form-row">
    <button type="button" onclick="swapLocations()" class="swap-btn" style="width: 40px; height: 40px; border-radius: 50%; background-image: url('sync.png'); background-size: cover ; background-repeat: no-repeat;margin-top:20px;"></button>
</div>
</div></center>

    <div class="form-column">
<div class="coolinput">
    <label for="to_location" class="text">To:</label>
    <select id="to_location" name="to_location" class="input" required>
                    <option value="Canada" data-identifier="CND">Canada (CND)</option>
    <option value="Australia" data-identifier="AUS">Australia (AUS)</option>
    <option value="Brazil" data-identifier="BRA">Brazil (BRA)</option>
    <option value="Germany" data-identifier="GER">Germany (GER)</option>
    <option value="India" data-identifier="IND">India (IND)</option>
    <option value="Italy" data-identifier="ITA">Italy (ITA)</option>
    <option value="Japan" data-identifier="JPN">Japan (JPN)</option>
    <option value="Mexico" data-identifier="MEX">Mexico (MEX)</option>
    <option value="Russia" data-identifier="RUS">Russia (RUS)</option>
    <option value="South Africa" data-identifier="ZAF">South Africa (ZAF)</option>
    <option value="South Korea" data-identifier="KOR">South Korea (KOR)</option>
    <option value="Spain" data-identifier="ESP">Spain (ESP)</option>
    <option value="Switzerland" data-identifier="CHE">Switzerland (CHE)</option>
    <option value="Thailand" data-identifier="THA">Thailand (THA)</option>
    <option value="Turkey" data-identifier="TUR">Turkey (TUR)</option>
    <option value="United Kingdom" data-identifier="GBR">United Kingdom (GBR)</option>
    <option value="USA" data-identifier="USA">USA (USA)</option>
    <option value="Vietnam" data-identifier="VNM">Vietnam (VNM)</option>
    <option value="Austria" data-identifier="AUT">Austria (AUT)</option>
    <option value="Argentina" data-identifier="ARG">Argentina (ARG)</option>
    <option value="Chile" data-identifier="CHL">Chile (CHL)</option>
    <option value="Denmark" data-identifier="DNK">Denmark (DNK)</option>
    <option value="Egypt" data-identifier="EGY">Egypt (EGY)</option>
    <option value="Indonesia" data-identifier="IDN">Indonesia (IDN)</option>
    <option value="Malaysia" data-identifier="MYS">Malaysia (MYS)</option>
    <option value="Philippines" data-identifier="PHL">Philippines (PHL)</option>
    <option value="Manila" data-identifier="MNL">Manila (MNL)</option>
    <option value="New York" data-identifier="NYC">New York (NYC)</option>
    <option value="London" data-identifier="LON">London (LON)</option>
    <option value="Paris" data-identifier="PAR">Paris (PAR)</option>
    <option value="Tokyo" data-identifier="TOK">Tokyo (TOK)</option>
    <option value="Sydney" data-identifier="SYD">Sydney (SYD)</option>
    <option value="Berlin" data-identifier="BER">Berlin (BER)</option>
    <option value="Rome" data-identifier="ROM">Rome (ROM)</option>
    <option value="Moscow" data-identifier="MOW">Moscow (MOW)</option>
    <option value="Beijing" data-identifier="BJS">Beijing (BJS)</option>
    <option value="Toronto" data-identifier="YYZ">Toronto (YYZ)</option>
    <option value="Dubai" data-identifier="DXB">Dubai (DXB)</option>
    <option value="Singapore" data-identifier="SIN">Singapore (SIN)</option>
    <option value="Los Angeles" data-identifier="LAX">Los Angeles (LAX)</option>
    <option value="Mumbai" data-identifier="BOM">Mumbai (BOM)</option>
    <option value="Hong Kong" data-identifier="HKG">Hong Kong (HKG)</option>
    <option value="Madrid" data-identifier="MAD">Madrid (MAD)</option>
    <option value="Seoul" data-identifier="ICN">Seoul (ICN)</option>
    <option value="Bangkok" data-identifier="BKK">Bangkok (BKK)</option>
    <option value="Istanbul" data-identifier="IST">Istanbul (IST)</option>
    <option value="Amsterdam" data-identifier="AMS">Amsterdam (AMS)</option>
    <option value="Sydney" data-identifier="SYD">Sydney (SYD)</option>
    <option value="Chicago" data-identifier="ORD">Chicago (ORD)</option>
    <option value="Barcelona" data-identifier="BCN">Barcelona (BCN)</option>
    <option value="Vienna" data-identifier="VIE">Vienna (VIE)</option>
    <option value="Cairo" data-identifier="CAI">Cairo (CAI)</option>
                    </select>
                </div>
                </div>
            </div>
            
            <!-- Departure and Return Dates -->
            <div class="form-row">
    <div class="form-column">
        <div class="coolinput">
    <label for="departure_date" class="text">Departure Date:</label>
    <input type="date" id="departure_date" name="departure_date" class="input" required>
</div>
    </div>
    <div class="form-column">
    <div class="coolinput">
    <label for="return_date" class="text">Return Date:</label>
    <input type="date" id="return_date" name="return_date" class="input">
</div>
    </div>
</div>

                <div class="form-row">
                    <div class="form-column" style="text-align: center;">
                        <button type="button" onclick="openPopup()">
                         <span class="box">Submit</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Confirmation Modal -->
   <center><div id="confirmationModal" class="modal">
        <div class="modal-content">
            <h3>Confirm</h3>
            <!-- Display form data here for confirmation -->
            <div id="confirmationDetails"></div>
          <p>Take Screenshot!</p>
            <div class="button-container">
                <button class="confirm" onclick="submitReservation()">Confirm</button>
                <button class="cancel-btn" onclick="closePopup()">Cancel</button>
            </div>
        </div></center>
    </div>
    <script>
        function swapLocations() {
    console.log("Swap button clicked.");

    var fromSelect = document.getElementById("from_location");
    var toSelect = document.getElementById("to_location");

    console.log("From value:", fromSelect.value);
    console.log("To value:", toSelect.value);

    // Swap logic
    var tempValue = fromSelect.value;
    var tempText = fromSelect.options[fromSelect.selectedIndex].text;
    var tempIdentifier = fromSelect.options[fromSelect.selectedIndex].getAttribute("data-identifier");

    fromSelect.value = toSelect.value;
    fromSelect.options[fromSelect.selectedIndex].text = toSelect.options[toSelect.selectedIndex].text;
    fromSelect.options[fromSelect.selectedIndex].setAttribute("data-identifier", toSelect.options[toSelect.selectedIndex].getAttribute("data-identifier"));

    toSelect.value = tempValue;
    toSelect.options[toSelect.selectedIndex].text = tempText;
    toSelect.options[toSelect.selectedIndex].setAttribute("data-identifier", tempIdentifier);

    console.log("After swap - From value:", fromSelect.value);
    console.log("After swap - To value:", toSelect.value);
}

    </script>
</body>
</html>
