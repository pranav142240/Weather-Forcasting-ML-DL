// Set the initial page title
document.title = "WeatherCast";
// Listen for page visibility change events
document.addEventListener("visibilitychange", function() {
    if (document.hidden) {
        document.title = "Come back (:";
    } else {
        document.title = "WeatherCast";
    }
});