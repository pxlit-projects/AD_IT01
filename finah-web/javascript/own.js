
$( document ).ready(function() {
 
/*PROFIEL*/

/*Button Wachtwoord Wijzigen*/
    $( "#WwWijzigen" ).click(function() {
	$( "#WwAanpassen").toggle();
	if ( $("#GgAanpassen").css('display') == 'block')
    {
       	$( "#GgAanpassen").toggle();
    }
	if ( $("#ProfielData").css('display') == 'block')
    {
       	$( "#ProfielData").toggle();
    }
	if ( $("#WwAanpassen").css('display') == 'none')
    {
       	$( "#textProf").text("  ");
    }
	else
	{
		
		$( "#textProf").text("Wachtwoord Wijzigen");
	}
});

/*Button Gegevens Wijzigen*/
	$( "#GegWijzigen" ).click(function() {
	
	$( "#GgAanpassen").toggle();
	
	if ( $("#WwAanpassen").css('display') == 'block')
    {
       	$( "#WwAanpassen").toggle();
    }
	if ( $("#ProfielData").css('display') == 'block')
    {
       	$( "#ProfielData").toggle();
    }
	if ( $("#GgAanpassen").css('display') == 'none')
    {
       	$( "#textProf").text("  ");
    }
	else
	{
		$( "#textProf").text("Gegevens Wijzigen");
	}
});

/*Button Profiel Data*/
	
	$( "#DProfiel" ).click(function() {
	$( "#ProfielData").toggle();
	if ( $("#GgAanpassen").css('display') == 'block')
    {
       	$( "#GgAanpassen").toggle();
    }
	if ( $("#WwAanpassen").css('display') == 'block')
    {
       	$( "#WwAanpassen").toggle();
    }
	if ( $("#ProfielData").css('display') == 'none')
    {
       	$( "#textProf").text("  ");
    }
	else
	{
		$( "#textProf").text("Profiel Data");
	}
	
		

});

/*PATIENTEN*/

/*Button Overzicht Patienten*/
	
$( "#OPatient" ).click(function() {
	
	$( "#OverzPat").toggle();
	if ( $("#NieuwPat").css('display') == 'block')
    {
       	$( "#NieuwPat").toggle();
    }
	if ( $("#OverzPat").css('display') == 'none')
    {
       	$( "#textPat").text("  ");
    }
	else
	{
		$( "#textPat").text("Overzicht Patienten");
	}
});

/*Button Nieuwe Patient*/

$( "#NPatient" ).click(function() {
	$( "#NieuwPat").toggle();
	if ( $("#OverzPat").css('display') == 'block')
    {
       	$( "#OverzPat").toggle();
    }
	if ( $("#NieuwPat").css('display') == 'none')
    {
       	$( "#textPat").text("  ");
    }
	else
	{
		$( "#textPat").text("Nieuwe Patient");
	}
});


/*AANVRAAG*/


$( "#LAanvraag" ).click(function() {
	
	$( "#ALopende").toggle();
	if ( $("#AOngeopend").css('display') == 'block')
    {
       	$( "#AOngeopend").toggle();
    }
	if ( $("#ANieuw").css('display') == 'block')
    {
       	$( "#ANieuw").toggle();
    }
	if ( $("#ALopende").css('display') == 'none')
    {
       	$( "#textA").text("  ");
    }
	else
	{
		$( "#textA").text("Lopende");
	}
});
$( "#OAanvraag" ).click(function() {
	
	$( "#AOngeopend").toggle();
	if ( $("#ALopende").css('display') == 'block')
    {
       	$( "#ALopende").toggle();
    }
	if ( $("#ANieuw").css('display') == 'block')
    {
       	$( "#ANieuw").toggle();
    }
	if ( $("#OAanvraag").css('display') == 'none')
    {
       	$( "#textA").text("  ");
    }
	else
	{
		$( "#textA").text("Ongeopend");
	}
});
$( "#NAanvraag" ).click(function() {
	
	$( "#ANieuw").toggle();
	if ( $("#ALopende").css('display') == 'block')
    {
       	$( "#ALopende").toggle();
    }
	if ( $("#AOngeopend").css('display') == 'block')
    {
       	$( "#AOngeopend").toggle();
    }
	if ( $("#ANieuw").css('display') == 'none')
    {
       	$( "#textA").text("  ");
    }
	else
	{
		$( "#textA").text("Nieuwe Aanvraag");
	}
});

 
});