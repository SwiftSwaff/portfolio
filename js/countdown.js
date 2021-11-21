// set countdown time
const countdownDate = "July 1";

// set countdown parameters
var currentTime = new Date().getTime();
var currentYear = new Date().getFullYear();
var countdownEnd = setCountdown(currentYear);

// if we are on the same year but past the date of the countdown, increment the year
if (countdownEnd - currentTime < -86400000) {
    currentYear++;
    countdownEnd = setCountdown(currentYear);
}

// populate the span elements on the page that reflect the time remaining
setTimeFields();

var count = setInterval(function() {
    timeRemaining = setTimeFields();

    if (timeRemaining < -86400000) {
        currentYear = new Date().getFullYear() + 1;
        countdownEnd = setCountdown(currentYear);
    }
}, 1000);

/** @return {int} countdownEnd */
function setCountdown(currentYear) {
    return new Date(countdownDate + ", " + currentYear).getTime();
}

/** @return {int} timeRemaining  */
function setTimeFields() {
    var currentTime = new Date().getTime();
    var timeRemaining = (countdownEnd - currentTime) / 1000; //convert to total seconds
    
    // if it is currently the day of the countdown, keep span elements on page at zero
    if (timeRemaining < 0 && timeRemaining > -86400) {
        document.getElementById("c-days").innerHTML = 0;
        document.getElementById("c-hours").innerHTML = 0;
        document.getElementById("c-minutes").innerHTML = 0;
        document.getElementById("c-seconds").innerHTML = 0;

        // flash red and white while it is canada day!
        var overlay = document.getElementsByClassName("overlay")[0];
        if (overlay.classList.contains("celebrate-red")) {
            overlay.classList.remove("celebrate-red");
            overlay.classList.add("celebrate-white");
        }
        else {
            overlay.classList.remove("celebrate-white");
            overlay.classList.add("celebrate-red");
        }
    }
    else {
        document.getElementById("c-days").innerHTML = Math.floor(timeRemaining / (60 * 60) / 24);
        document.getElementById("c-hours").innerHTML = Math.floor((timeRemaining / (60 * 60)) % 24);
        document.getElementById("c-minutes").innerHTML = Math.floor((timeRemaining / 60) % 60);
        document.getElementById("c-seconds").innerHTML = Math.floor(timeRemaining % 60);
    }

    return timeRemaining;
}