document.querySelector('form').addEventListener('submit', function(event) {
  var districtInput = document.querySelector('input[name="district"]');
  var districtList = document.querySelector('#district');
  if (!districtList.querySelector('option[value="' + districtInput.value + '"]')) {
    event.preventDefault();
    var errorContainer = document.querySelector('.error-container');
    var errorText = document.querySelector('#error');
    errorText.innerText = 'Sorry, we cannot predict the weather for this city.';
    errorContainer.style.display = 'block';
  }
});