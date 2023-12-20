<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('home/js/popper.js')}}"></script>
<script type="text/javascript" src="{{asset('home/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('home/js/main.js')}}"></script>
<script type="text/javascript" src="{{asset('home/js/slick.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.11/js/intlTelInput.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
  $(document).ready(function () {
    // Initialize intl-tel-input
    var input = document.querySelector("#phone");
    var iti = window.intlTelInput(input, {
      initialCountry: "pk", // Use "pk" for Pakistan
      separateDialCode: true,
    });

    // Listen for changes to the selected country
    input.addEventListener("countrychange", function () {
      var selectedCountryData = iti.getSelectedCountryData();
      document.querySelector("#country-code-dropdown").textContent =
        "+" + selectedCountryData.dialCode;
    });
  });
</script>
<script>
  AOS.init();
</script>
</body>
</div>

</html>