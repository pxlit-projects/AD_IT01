<div class="container">
	<div class="row" id="rowTopMargin50px">
	    <div class="col-md-offset-2 col-md-8 portfolio-item">
	        <legend>Inleidend filmpje</legend>
	        <video id="inleidingVideo" class="video-js vjs-default-skin" controls
				 preload="auto" width="100%" height="400px" poster="images/logo/logo.png"
				 data-setup="{}">
				 <source src=http://techslides.com/demos/sample-videos/small.mp4 type=video/mp4>
				 <source src=http://techslides.com/demos/sample-videos/small.webm type=video/webm>
				 <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
			</video>
	    </div>
	</div>
	<div class="row" id="rowTopMargin50px">
        <form class="form-horizontal" method="get" action="enquete.php">
            <fieldset>
                <div class="form-group">
                <?php
                	echo '<input type="text" class="form-control" id="vraagid" name="surveyuser" value="' . $_GET['surveyuser'] . '">';
                	echo '<input type="text" class="form-control" id="vraagid" name="authkey" value="' . $_GET['authkey'] . '">';
                	echo '<input type="text" class="form-control" id="vraagid" name="vraagid" value="1">';
                ?>
                <div class="progress">
				  <div class="progress-bar progress-bar-info" style="width: 0%"></div>
				</div>
                    <div class="col-lg-2 col-md-offset-8">
                        <button type="submit" class="btn btn-default btn-lg btn-block">Volgende</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <?php 
    	$amountofquestions = $database->count("vragen", "*"); 
    ?>
    
</div>
	
		
		   
