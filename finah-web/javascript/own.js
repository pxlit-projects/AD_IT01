
$( document ).ready(function() {
 
    $( "#WwWijzigen" ).click(function() {
	$( "#WwAanpassen").toggle();
});

	$( "#GegWijzigen" ).click(function() {
	$( "#GgAanpassen").toggle();
});

$( "#OPatient" ).click(function() {
	$( "#OverzPat").toggle();
});
$( "#NPatient" ).click(function() {
	$( "#NieuwPat").toggle();
});

$( "#LAanvraag" ).click(function() {
	$( "#textA").text("Lopende");
});
$( "#OAanvraag" ).click(function() {
	$( "#textA").text("Ongeopend");
});
$( "#NAanvraag" ).click(function() {
	$( "#textA").text("Nieuwe Aanvraag");
});

 
});