@extends('layouts.app')

@section('content')

	<style>
		.pageNotFound{
			font-family: arial;
			position: absolute;
			z-index: 9999;
			top: 0;
			width: 100%;
			height: 100vh;
			border: 2px solid #0065b3;
			box-shadow: inset 0 0 50px #0065b3;
			background: #0065B3;
			color: #fff;
		}	
		.pageNotFound h1{
			position: relative;
			text-transform: uppercase;
		}
		.errorMessageBlock{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%,-50%);
			display: grid;
			width: 100%;
			grid-template-columns: 50% 50%;
		}
		span:first-child{
			grid-column: 1;
			right: 0;
			text-align: right;
			padding: 0 20px;
		}
		span:last-child{
			font-family: arial;
			letter-spacing: 1px;
			text-align: left;
			padding: 0 20px;
			grid-column: 2;
			border-left: 2px solid #fff;
		}
		h3 {
			letter-spacing: 2px;
		}
		button{
			background: #fff;
			color: #000;
		}
	</style>
	
	<div class="pageNotFound">
		<div class="container">
			<div class="errorMessageBlock">
				<span>
					<h1 style="font-size: 50px;">Error 404</h1>
					<h1>page not found</h1>
				</span>
				<span>
					<h3>Sorry...</h3>
					<h4>You're looking for was not found :(</h4>
					<h3><a href="/"><button class="btn"><i class="fas fa-arrow-left"></i></button></a> Go Main</h3>
				</span>
			</div>
		</div>
  </div>
@endsection
