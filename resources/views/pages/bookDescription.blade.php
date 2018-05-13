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
	left: 84%;
	transform: translateX(-50%);
}
.ratingBlock h5{
	text-align: left;
	transform: translateX(-80%);
}
.bookDetail{
	position: relative;
	top: 50%;
	transform: translateY(-50%);
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
.right-block{
	position: relative;
	top: 50%;
	transform: translateY(-50%);
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
	width: 100%;
}
  </style>

	  	<div class="container-fluid">
	  		<div class="row">
		  		<div class="col-md-9">
		  			<div class="bookDetailMainBlock">
		  				<div class="row">
			  				<div class="col-md-3 col-sm-3">
				  					<div class="book-img">
				  					<img src="/storage/cover_images/{{$book->cover_image}}" style="width: 100%;" alt="bookImage"></div>
			  				</div>
			  				<div class="col-md-5 col-sm-5">
			  					<div class="bookDetail">
				  					<h3 class="bookDetailName"> {{$book->bookName}}</h3>
				  					<h4> {{$book->bookAuthor}}</h4>
				  					<p>Genre:</p>
				  					<p><a href="">Fantasy </a>, <a href="">Romance</a></p><br>
				  					@if(!empty($book->attachedFile))
				  							<a href="/bookDownload/{{ $book->id }}" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
				  					@else
				  							<h4>There is no attachment, yet</h4>
				  					@endif
			  					</div>
			  				</div>
			  				<div class="col-md-3 col-sm-3">
			  					<div class="container-fluid right-block">
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
				  					<?php
												function count_pages($pdfname) {
												  $pdftext = file_get_contents('./storage/attached_files/'.$pdfname);
												  $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
												  return $num;
												}
											?>
				  					<div class="row">
				  						<div class="bookDetailInfo">
							                  <h5>Country: {{$book->country}}</h5>
							                  <h5>Language: {{$book->language}}</h5>
							                  <h5>Published: {{$book->publishedYear}}</h5>
							                  <h5>Pages: {{ ((empty($book->attachedFile) ||file_exists(public_path('attached_files/'.$book->attachedFile))) ? 0 : count_pages($book->attachedFile)) }}</h5>
							                  <h5>ISBN: {{$book->isbn}}</h5>
						                  </div>
				  					</div>
				  					<div class="row">
				  						<div class="bottom-bar">
						                    <div class="tooltip">
						                      <i class="fas fa-download"></i> {{ $book->downloads }}
						                      <span class="tooltiptext">Number of downloads</span>
						                    </div>
						                    <div class="tooltip">
						                      <i class="fas fa-comments"></i> {{ count($comments) }}
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
						@guest
						@else
							<h4>Leave a Comment: </h4><hr>
							<div class="row">
								<form class="col-md-12" action="/comments" method="POST">
									{{ csrf_field() }}
									<textarea name="body" cols="10" rows="3" placeholder="comments:"></textarea>
									<input type="hidden" name="book_id" value="{{ $book->id }}">
									<input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
										<input class="btn btn-primary" type="submit" value="Send">
								</forms>
							</div>
						@endif
							<br>
							<div class="row">
								<div class="col-md-12">
									<h4>Comments: </h4><hr>
									@if(count($comments)>0)
										@foreach($comments as $comment)
											<div class="commentText">
												<h4><span>{{ $comment->user->firstName . ' ' . $comment->user->lastName }}</span> <span>| {{ $comment->created_at }}</span></h4>
												<h5>{{ $comment->body }}</h5>
												@guest
												@else
													@if(auth()->user()->id == $comment->user->id)
														<a href="/comments/{{ $comment->id }}/delete" class="btn btn-danger">Delete</a>
													@endif
												@endif
											</div>
											<hr>
										@endforeach
									@else
										<h4>There is No Comments</h4>
									@endif
								</div>
							</div>
						</div>
						<br>
		  		</div>
		  		<div class="col-md-3">
		  			<div class="bookDetailSidebar">
		  				<div class="container">
			  				<div class="row">
					  			<h4>The most popular</h4><br>
					  			<div class="row">
						  				<div class="sideDetails">
						  					<a href="/bookDetail/{{ $pbook->id }}"><img src="/storage/cover_images/{{$pbook->cover_image}}" alt=""></a>
						  				</div>
					  				<div class="sideDetailsInfo">
					  					<a href="/bookDetail/{{ $pbook->id }}"><h4 style="margin: 0;"> {{$pbook->bookName}}</h4></a>
					  				</div>
					  			</div>
				  			</div>
				  			<hr>
				  			<div class="row">
					  			<h4>The most popular</h4><br>
					  			<div class="row">
						  			<div class="row">
						  				<div class="sideDetails">
						  					<a href="/bookDetail/{{ $rbook->id }}"><img src="/storage/cover_images/{{$rbook->cover_image}}" alt=""></a>
						  				</div>
						  			</div>
					  				<div class="sideDetailsInfo">
					  					<a href="/bookDetail/{{ $rbook->id }}"><h4 style="margin: 0;">{{$rbook->bookName}}</h4></a>
					  				</div>
					  			</div>
				  			</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>
  	</div>
@endsection