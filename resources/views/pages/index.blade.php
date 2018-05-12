@extends('layouts.app')

@section('content')
	<div class="row">
	  <div class="container main">
	  	<div class="row">
	    	<h1 class="popularTitle">Most popular books</h1>
	  	  {{-- <div class="first-section"> --}}
			  	<div class="parallax">
				    <div class="owl-carousel">
							@foreach($pbooks as $pbook)
						  	<div class="item">
						  		<a href="/bookDetail/{{$pbook->id}}"><h4>{{$pbook->bookName}}</h4></a>
						   		<img src="/storage/cover_images/{{$pbook->cover_image}}" alt="{{$pbook->bookName}}">
						  	</div>
					  	@endforeach
						</div>
					
						<div class="container">
							<div class="row">
								<h2 class="quote"> ipsum dolor sit amet, consectetur adipisicing elit. Quisquam dolorum at officia consequatur, minima, tempora eveniet fugiat sed cumque earum laborum obcaecati, libero doloremque quam adipisci amet necessitatibus! Possimus, voluptate.</h2>
							</div>
						</div>
			    </div>
	  	  {{-- </div> --}}
	  	</div>
	    <div class="description">
	  	  <div class="row">
	      	<div class="col-md-6">
	      	  <div class="about">
	      		<h1>What is IUT-LMS?</h1>
	      		<p>Inha University in Tashkent has been established according to the resolution of the President of the Republic of Uzbekistan as a result of the cooperation between Inha University of Korea and the government of Uzbekistan with the goal of developing professional, practical, and globally competitive IT leaders. Inha University in Korea is a distinctive leader in higher education for engineering, IT, management, logistics, and Korean studies, among others. </p>
	      	  </div>
	      	</div>
	      	<div class="col-md-6">
	      		<img src="img/library.jpg" alt="library">
	      	</div>
	      </div>
	  	</div>
	  	<div class="row">
	  	  <div class="recently-added">
    	  	<h1>Recently added</h1>
    	  	<div class="row">
    	  		@foreach($rbooks as $rbook)
		    	  <div class="col-md-3">
		    	  	<img src="/storage/cover_images/{{ $rbook->cover_image }}" alt="{{ $rbook->bookName }}">
		    	  	<a href="/bookDetail/{{$rbook->id}}"><h2>{{ $rbook->bookName }}</h2></a>
		    	  </div>
		    		@endforeach
		  	 </div>
	  	 </div>
	  	</div>
	  	<div class="more">
	  	  <div class="row">
		  	  <div class="col-md-4">
		  	  	<div>
			  	  	<h2>Service</h2>
		          <i class="fas fa-clipboard-list"></i>
		          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perspiciatis quae atque quasi enim, error impedit! Pariatur ad itaque eveniet, quisquam, in praesentium laborum voluptatum aut similique, debitis nam, odit a!</p>
            </div>
		  	  </div>
		  	  <div class="col-md-4">
		  	  	<div>
		  	  	  <h2>Entertainment</h2>
		  	  	  <i class="far fa-smile"></i>
		  	  	  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error delectus culpa ipsa. Minima laborum, aperiam necessitatibus laudantium nemo qui, fugiat deleniti praesentium odio, atque eum repellat odit. Laudantium, tempore, quaerat.</p>
		  	    </div>
		  	  </div>
		  	  <div class="col-md-4">
		  	  	<div>
		  	  	  <h2>Audio books</h2>
		  	  	  <i class="fas fa-headphones"></i>
		  	  	  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint corrupti aliquam eveniet, perferendis ipsam enim a. Ipsam voluptatibus doloribus eligendi voluptate aliquam, dicta illo, consectetur incidunt ab, sed explicabo totam?</p>
		  	    </div>
		  	  </div>
	  	  </div>
		  </div>
		<div class="info">
  		  <div class="row">
  		    <div class="col-md-6">
  		  		<div class="row">
		  		  	<div class="col-md-3">
		  		  	  <p> Inha University in <a href="#">Tashkent</a></p>
		  		  	</div>
		  		  	<div class="col-md-9">
		  		  	  <table>
		  		  	  	<tr>
		  		  	  	  <td><strong>Office:</strong></td>
		  		  	  	  <td>9, Ziyolilar str., M.Ulugbek district, Tashkent city</td>
		  		  	  	</tr>
		  		  	  	<tr>
		  		  	  	  <td><strong>Phone:</strong></td>
		  		  	  	  <td>+998 71 289-99-99</td>
		  		  	  	</tr>
		  		  	  	<tr>
		  		  	  	  <td><strong>Fax:</strong></td>
		  		  	      <td>+998 71 269-00-58</td>
		  		  	  	</tr>
		  		  	  	<tr>
		  		  	  	  <td><strong>Email:</strong></td>
		  		  	  	  <td><a href="mailto:info@inha.uz"> info@inha.uz</a></td>
		  		  	  	</tr>
		  		  	  	<tr>
		  		  	  	  <td><strong>Website:</strong></td>
		  		  	  	  <td><a href="www.iut.uz"> www.iut.uz </a><a href="www.inha.uz"> www.inha.uz</a></td>
		  		  	  	</tr>
		  		  	  </table>
		  		    </div>
		  		  </div>
		  		  </div>
		  		  <div class="col-md-6">
		  		  	<div class="row">
			  		  	<div class="col-md-3">
			  		  		<p> Inha University in <a href="#">Korea</a></p>
			  		  	</div>
			  		    <div class="col-md-9">
			  		      <table>
			  		    	 	<tr>
			  		    	  	<td><strong>Office:</strong></td>
			  		    	   	<td>INHA University Admissions office 100, INHA Avenue, Nam-gu, Incheon, Korea</td>
			  		    	 	</tr>
			  		    	 	<tr>
			  		    	   	<td><strong>Phone:</strong></td>
			  		    	   	<td>0082-32-860-7221~5</td>
			  		    	 	</tr>
			  		    	 	<tr>
			  		    	   	<td><strong>Fax:</strong></td>
			  		    	   	<td>0082-32-860-7210</td>
			  		    	 	</tr>
			  		    	 	<tr>
			  		    	   	<td><strong>Website:</strong></td>
			  		    	   	<td><a href="eng.inha.ac.kr"> eng.inha.ac.kr</a></td>
			  		    	 	</tr> 
			  		      </table>
			  		  	</div>
			  		  </div>
			  		</div>
  		  </div>
	    </div>
	 	</div> 
	</div>
  
  <script type="text/javascript" src="{{asset('js/index.js')}}"></script>
  <!-- parallax js -->
  <script type="text/javascript">
   $(window).scroll(function () {
     $(".parallax").css("background-position","50% " + ($(this).scrollTop() / -2) + "px");
   });
 </script> 
  <script type="text/javascript">
  	$('.owl-carousel').owlCarousel({
	    loop:true,
	    margin:10,
	    autoplay:true,
    	autoplayTimeout:2000,
    	autoplayHoverPause:true,
	    dots: false,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:5
	        },
	        1000:{
	            items: 10
	        }
	    }
	});
	$('.play').on('click',function(){
	    owl.trigger('play.owl.autoplay',[2000])
	})
	$('.stop').on('click',function(){
	    owl.trigger('stop.owl.autoplay')
	})
  </script>
@endsection