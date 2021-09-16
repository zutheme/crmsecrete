<?php use \App\Http\Controllers\Helper\HelperController; 
     $option = new HelperController();
	 $_bannerbig = $option->getoptionbyid(1071);
	 $_backgroundbig = $option->getoptionbyid(1072);
?>
<section class="section-chat">
	<div class="container">
		<div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Send message</div>
                    <form class="post">
                        <input type="textarea" name="note" >
                    </form>
                </div>
            </div>
        </div>
		<div class="row">
			<div class="col-lg-6">
					<div class="row chat-row">
						<div class="chat-content">
							<ul>
							  
							</ul>
						</div>
						<input class="control" id="chatInput" type="textarea" name="note">
					</div>
			</div>	
		</div>
	</div>
</section>