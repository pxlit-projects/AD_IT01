$(document).ready(function() {

$('body').css('display', 'none');

$('body').fadeIn(2000);
});



function playVid() { 
	var vid = document.getElementById("inleidingVideo");
    vid.play(); 
} 

function pauseVid() { 
    vid.pause(); 
}

function hideFeedbackDiv() {
    var feedback = document.getElementById("feedback");
    feedback.style.visibility = "hidden";
}

function showFeedbackDiv() {
    $('#feedback').css('visibility','visible').hide().fadeIn(1500);    
}

function hideVideoIntroDiv() {
    var videoIntro = document.getElementById("videoIntro");
    videoIntro.style.visibility = "hidden";
}

function showVideoIntroDiv() {
	$('#videoIntro').css('display','block');
    $('#videoIntro').css('visibility','visible').hide().fadeIn(1500); 
}
function showStartEnqueteDiv() {
    $('#startEnquete').css('visibility','visible').hide().fadeIn(1500); 
}

function hideInfoDiv() {
    $('#info').fadeOut(900);
	$('#startInleiding').fadeOut(900);
	setTimeout(function(){showVideoIntroDiv()},1000);
	setTimeout(function(){showStartEnqueteDiv()},1000);
	setTimeout(function(){playVid()},5000);
}

