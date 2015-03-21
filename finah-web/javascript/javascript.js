function hideFeedbackDiv() {
    var feedback = document.getElementById("feedback");
    feedback.style.visibility = "hidden";
}

function showFeedbackDiv() {
    $('#feedback').css('visibility','visible').hide().fadeIn(1500);    
}