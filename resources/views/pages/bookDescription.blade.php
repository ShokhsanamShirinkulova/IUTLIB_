@extends('layouts.app')

@section('content')
  <style>
  	
/*book details main block
*/
.bookDetailMainBlock{
	background: #fff;
	border-radius: 4px;
	width: 100%;
	border:1px solid #E0E0E0;
	box-shadow: 0 3px 10px #919191;
}
.bookDetailMainBlock #boxread
{
	border: 1px solid blue;
	padding: 8px;
	text-align: center;
	background-color: blue;
	color: white;
}
.bookDetailMainBlock .rating, label
{
    margin: 0;
    padding: 0;
    border: none;
    float: left;
}
.rating_Stars{
	list-style: none;
	width: 5px;
	display: inline;
	margin: 0;
	padding: 0;
}
.ratingBlock{
	position: relative;
	left: 30%;
	transform: translateX(-50%);
}
.ratingBlock h5{
	text-align: center;
}
.bookDetail{
	text-align: center;
	margin-top: 10px;
}
.bookDetailInfo{
	position: relative;
	left: 40%;
	transform: translateX(-50%);
	float: left;
}
.sideDetails, .sideDetails img{
	width: 80%;
	left: 50%;
	position: relative;
	transform: translateX(-50%);
}
div.stars {
  width: 100%;
  display: inline;
  float: right;
  position: relative;
  left: 10%;
}
input.star { display: none; }
label.star {
  float: right;
  left: 0;
  padding: 2px;
  font-size: 25px;
  color: #444;
  transition: all .2s;
}
input.star:checked ~ label.star:before {
  content: '\2605';
  color: #FD4;
  transition: all .25s;
}
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 3px #9E9E9E;
}
input.star-1:checked ~ label.star:before { color: #F62; }
label.star:hover { transform: scale(1.3); }
label.star:before {
  content: '★';
  font-family: FontAwesome;
}
/*end of book detail main block*/

/*Book detail sidebar*/
.bookDetailSidebar{
	background: #fff;
	border-radius: 4px;
	width: 100%;
	border:1px solid #E0E0E0;
	box-shadow: 0 3px 10px #919191;
	padding: 10px;
}
.bookDetailSidebar h4{
	text-align: center;
	position: relative;
	left: 50%;
	transform: translateX(-50%);
}
.bookDetailMain,.bookDetailCommentBlock{
	background: #fff;
	border-radius: 4px;
	width: 100%;
	border:1px solid #E0E0E0;
	box-shadow: 0 3px 10px #919191;
	padding: 10px;
}
.bookDetailCommentBlock textarea{
	width: 100%;
	resize: none;
	padding: 10px;
	font-size: 18px;
	border-radius: 5px;
	border: 1px solid #0065b3;
}
.bookDetailCommentBlock a{
	position: relative;
	margin: 12px 18px 0 18px;
}
.commentText{
	width: 95%;
	left: 50%;
	position: relative;
	transform: translateX(-50%);
}
.commentText h5{
	line-height: 18px;
} 
.sideDetailsInfo{
	text-align: center;
	position: relative;
	left: 50%;
	transform: translateX(-50%);
}
.book-img{
	width: 70%;
}
  </style>

	  	<div class="container-fluid">
	  		<div class="row">
		  		<div class="col-md-8">
		  			<div class="bookDetailMainBlock">
		  				<div class="row">
			  				<div class="col-md-3 col-sm-3">
				  					<div class="book-img">
				  					<img src="/storage/cover_images/{{$book->cover_image}}" style="width: 100%;" alt="bookImage"></div>
			  				</div>
			  				<div class="col-md-5 col-sm-5">
			  					<div class="bookDetail">
				  					<h5 class="bookDetailName"> {{$book->bookName}}</h5>
				  					<h5> {{$book->bookAuthor}}</h5>
				  					<p>Genre:</p>
				  					<p><a href="">Fantasy </a>, <a href="">Romance</a></p><br>
				  					<a class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
			  					</div>
			  				</div>
			  				<div class="col-md-3 col-sm-3">
			  					<div class="container-fluid">
				  					<div class="row">
					  					<div class="ratingBlock">
					  							<h5>Rate book:</h5>
													<div class="stars">
													  <form action="">
													    <input class="star star-5" id="star-5" type="radio" name="star"/>
													    <label class="star star-5" for="star-5"></label>
													    <input class="star star-4" id="star-4" type="radio" name="star"/>
													    <label class="star star-4" for="star-4"></label>
													    <input class="star star-3" id="star-3" type="radio" name="star"/>
													    <label class="star star-3" for="star-3"></label>
													    <input class="star star-2" id="star-2" type="radio" name="star"/>
													    <label class="star star-2" for="star-2"></label>
													    <input class="star star-1" id="star-1" type="radio" name="star"/>
													    <label class="star star-1" for="star-1"></label>
													  </form>
					  						</div>
					  					</div>
				  					</div>
				  					<div class="row">
				  						<div class="bookDetailInfo">
							                  <h5>Country: {{$book->country}}</h5>
							                  <h5>Language: {{$book->language}}</h5>
							                  <h5>Published: {{$book->publishedYear}}</h5>
							                  <h5>Pages: 560</h5>
							                  <h5>ISBN: {{$book->isbn}}</h5>
						                  </div>
				  					</div>
				  					<div class="row">
				  						<div class="bottom-bar">
						                    <div class="tooltip">
						                      <i class="fas fa-download"></i> 402
						                      <span class="tooltiptext">Number of downloads</span>
						                    </div>
						                    <div class="tooltip">
						                      <i class="fas fa-comments"></i> 56
						                     <span class="tooltiptext">Number of comments</span>
						                    </div>
						                </div>
				  					</div>
			  					</div>
			  				</div>
		  				</div>
		  			</div>
		  			<br>
						<div class="bookDetailMain">
							<h4>Book details: </h4><hr>
							<p>{{$book->describtion}}</p>
						</div>
						<br>
						<div class="bookDetailCommentBlock">
							<h4>Leave a Comment: </h4><hr>
								<div class="row">
									<div class="col-md-12">
										<textarea name="" id="" cols="10" rows="3" placeholder="comments:"></textarea>
										<div class="row">
											<a href="#" class="btn btn-primary pull-right">Send</a>
									</div>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-12">
									<h4>Comments: </h4><hr>
									<div class="commentText">
										<h4><span>Name of the user </span> <span>| 03.05.2018, 11:28:43</span></h4>
										<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit reprehenderit consectetur officia dolor illum libero praesentium veniam assumenda culpa nobis iste, quisquam cupiditate molestias rerum facere placeat itaque aperiam hic.</h5>
									</div><hr>
									<div class="commentText">
										<h4><span>Name of the user </span> <span>| 03.05.2018, 11:28:43</span></h4>
										<h5>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Velit reprehenderit consectetur officia dolor illum libero praesentium veniam assumenda culpa nobis iste, quisquam cupiditate molestias rerum facere placeat itaque aperiam hic.</h5>
									</div>
								</div>
							</div>
						</div>
						<br>
		  		</div>
		  		<div class="col-md-4">
		  			<div class="bookDetailSidebar">
		  				<div class="row">
				  			<h4>The most popular</h4><br>
				  			<div class="row">
				  				<div class="sideDetails">
				  					<img src="/storage/cover_images/{{$pbook->cover_image}}" alt="">
				  				</div>
				  				<br>
				  				<div class="sideDetailsInfo">
				  					<a href=""><h4 style="margin: 0;"> {{$pbook->bookName}}</h4></a>
				  				</div>
				  			</div>
			  			</div>
			  			<hr>
			  			<div class="row">
			  				<h4>Recently added</h4><br>
				  			<div class="row">
				  				<div class="sideDetails">
				  					<img src="/storage/cover_images/{{$rbook->cover_image}}" alt="">
				  				</div>
				  				<br>
				  				<div class="sideDetailsInfo">
				  					<a href=""><h4 style="margin: 0;">{{$rbook->bookName}}</h4></a>
				  				</div>
				  			</div>
			  			</div>
		  			</div>
		  		</div>
		  	</div>
  	</div>
@endsection