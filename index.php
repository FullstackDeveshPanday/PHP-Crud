
<!DOCTYPE html>
<html>
	<head>
		<title>Instagram Clone</title>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<link rel="stylesheet" href="/resources/demos/style.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
		<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
		<script>
		$( function() {
		$( "#datepicker" ).datepicker();
		$('#timepicker').timepicker();
		} );
		</script>
		
		
	</head>
	<body>
		<section class="text-center">
			<h2><p>Instagram Post</p><h2>
		</section>
		<form action="#" method="post"  enctype="multipart/form-data">
			<div class="container form-control ">
				<div class="row">
					<!-- first side code -->
					<div class="col-6">
						<div>
							<input type="file" name="file" class="form-control form-control-lg" id="formFileLg"  >
						
						</div>
					</div>
					<!-- Second side code  -->
					<div class="col-6">
						<div class="mb-3">
							<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="caption" name="caption" required></textarea>
							<button type="button" class="btn btn-primary" value="Ajay" onClick="document.getElementById('Textarea1').innerHTML=this.value">Ajay</button>
							<button type="button" class="btn btn-primary" value="Ranveer" onClick="document.getElementById('Textarea1').innerHTML=this.value">Ranveer</button>
							<button type="button" class="btn btn-primary" value="Akshay" onClick="document.getElementById('Textarea1').innerHTML=this.value"> Akshay</button>
							<button type="button" class="btn btn-primary" value="Dipika" onClick="document.getElementById('Textarea1').innerHTML=this.value">Dipika </button>
							<button type="button" class="btn btn-primary" value="Rani" onClick="document.getElementById('Textarea1').innerHTML=this.value">Rani</button>
							<textarea class="form-control" id="Textarea1" rows="3" placeholder="Tag people" type="submit" name="tag" required></textarea>
							<input class="form-control" id="input" rows="3" placeholder="Location" required name="location"></input>
							<textarea class="form-control" id="Textarea3" rows="3" placeholder="#HashTags" name="hash"></textarea>
							<div class="form-group mt-4">
	                            <label for="" name="skills">Skills</label>
	                            <div class="btn-group ml-2" role="group" aria-label="Basic checkbox toggle button group">
	                            <input type="checkbox" name="skills[]" value="Math" class="btn-check" id="btncheck1" autocomplete="off">
	                            <label class="btn btn-outline-primary" for="btncheck1">Math</label>

	                            <input type="checkbox"  name="skills[]" value="C++" class="btn-check" id="btncheck2" autocomplete="off">
	                            <label class="btn btn-outline-primary" for="btncheck2">C++</label>

	                            <input type="checkbox" name="skills[]" value="JavaScript" class="btn-check" id="btncheck3" autocomplete="off">
	                            <label class="btn btn-outline-primary" for="btncheck3">JavaScript</label>
                            </div>
                        </div>
							<label>Date :
								<input type="date" class="form-control"  name="datepic" /></label>
								<label>Time :
									<input type="time"  class="form-control" name="timepic" /></label>
								</div>
								<button type="submit" class="btn btn-danger">Cancel</button>
								<button type="submit" name="submit" class="col sm-6 btn btn-success">Submit</button>
							</div>
						</div>
					</div>
				</form>
				<?php
				$con=mysqli_connect("localhost","root","","assignment");
				if(isset($_POST['submit']))
				{
					$caption=$_POST['caption'];
					$tag=$_POST['tag'];
					$location=$_POST['location'];
					$hash=$_POST['hash'];
					$skills=$_POST['skills'];
					$date=$_POST['datepic'];
					$time=$_POST['timepic'];

				// Code For File Upload 
					$file =$_FILES['file']['name'];
					$dir="img/";
					if(!is_dir($dir))
					{
					mkdir("img/");
					}
					move_uploaded_file($_FILES["file"]["tmp_name"],"img/".$_FILES["file"]["name"]);

					// Code for checkbox
					$chk="";
					foreach($skills as $chk1)
					{
					$chk .= $chk1.",";
					}
					
					// echo $caption.$tag.$location.$hash.$chk.$date.$time.$file;
				
					$sql=" INSERT INTO post(img,caption,tag_people,location,hastag,checkbox,startdate,starttime) 
						VALUES ('$file', '$caption', '$tag', '$location', '$hash', '$chk', '$date', '$time') ";

					
					$res=mysqli_query($con,$sql);
					

					if($res > 0)
					{
						?>
							<script>alert('Insert One Record !')</script>
						<?php
					}
				}
				mysqli_close($con);
				?>
				<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
				<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
			</body>
		</html>