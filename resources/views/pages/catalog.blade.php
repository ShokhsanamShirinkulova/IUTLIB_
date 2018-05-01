@extends('layouts.app')

@section('content')
    <div class="row">
        <!--filter bar-->
        <div class="col-md-3">
            <div class="sidebar">
                <h4 class="sidebar-title">Selection of books</h4>
                <form action="">
                    <label for=""><span>Search:</span><input type="text" name="bookSearch" /></label>
                    <label for="">
                        <span>Genre:</span> 
                        <select name="genre" id="genre" class="genre">
                            <option value="0" disabled hidden selected>Not selected</option>
                            <option value="1">Fantasy</option>
                            <option value="2">Romance</option>
                            <option value="3">Detective</option>
                            <option value="4">Prose</option>
                            <option value="5">Thriller</option>
                        </select>
                    </label>
                </form>
            </div>
        </div>
        <!--end of filter bar-->

        <!-- main content -->
        <div class="col-md-9">
            <div class="catalog-main">
                <!-- sorting box -->
                <div class="container-fluid">
                    <div class="sorting-box">
                        <ul class="sorting-box-list">
                            <li>Sort by:</li>
                            <li>
                                <a href="">top</a>
                            </li>
                            <li>
                                <a href="">novelty</a>
                            </li>
                            <li>
                                <a href="">popularity</a>
                            </li>
                            <li>
                                <a href="">comments</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- end sorting box -->

                <!-- book items -->
                <div class="container-fluid">
                    <div class="bookItem-box">
                        <div class="row">
                            <div class="bookItem">
                                
                                <div class="col-md-3">
                                    <div class="book-img">
                                      <a href="">
                                        <img src="data/images/books-title/Fahrenheit_451_1st_ed_cover.jpg" alt="book-title">
                                        </a>
                                    </div>
                                </div>
                                
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <h3 class="book-title">
                                                <a href="">Fahrenheit 451</a>
                                            </h3>
                                            <h4 class="book-author">
                                                <a href="#">Ray Bradbury</a>
                                            </h4>
                                            <p class="book-description">
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum vitae tempora officiis reprehenderit expedita iure in praesentium voluptatum ipsam nulla cumque, hic odio enim, corrupti neque recusandae nam. Distinctio, rerum. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim omnis dignissimos perspiciatis exercitationem. Vel ex, aliquid. Excepturi temporibus corporis, ad maxime tenetur laborum est fugiat quam! Corporis tempora, fugit deleniti.
                                                <a href="">more...</a>
                                            </p>
                                        </div>
                          
                                        <div class="col-md-4">
                                            <div class="book-info">
                                                <h5>Overall Rating: 98% <span class="glyphicon glyphicon-star"></span></h5>
                                                <br>
                                                <h5>Genre: <a href="#">Dystopian</a></h5>
                                                <h5>Country: United States</h5>
                                                <h5>Language: English</h5>
                                                <h5>Published: 1953</h5>
                                                <h5>Pages: 158</h5>
                                                <h5>ISBN: 978-0-7432-4722-1</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="bottom-bar">
                                    <div class="tooltip"><i class="fas fa-eye"></i> 15689 
                                        <span class="tooltiptext">Seen times</span>
                                    </div>
                                    <div class="tooltip"><i class="fas fa-download"></i> 402
                                        <span class="tooltiptext">Number of downloads</span>
                                    </div>
                                    <div class="tooltip"><i class="fas fa-comments"></i> 56
                                        <span class="tooltiptext">Number of comments</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end of book items section -->
            </div>
        </div>
    </div>

    @if(count($books) > 0)  
        <br>
        <br>
        <div class="container">
            <div class="jumbotron">

                <div class="row">
                    <div class="col-md-2">
                        {{--  --}}
                    </div>
                    <div class="col-md-2">
                        <b>Book Name</b>
                    </div>
                    <div class="col-md-2">
                        <b>Book Author</b>
                    </div>
                    <div class="col-md-2">
                        <b>Book Type</b>
                    </div>
                    <div class="col-md-2">
                        <b>Published Year</b>
                    </div>
                    <div class="col-md-2">
                        <b>Book Rank</b>
                    </div>
                </div>
                <div class="row">
                    @foreach($books as $book)
                        <div class="col-md-2">
                            {{--  --}}
                        </div>
                        <div class="col-md-2">
                            {{ $book->bookName }}
                        </div>
                        <div class="col-md-2">
                            {{ $book->bookAuthor }}
                        </div>
                        <div class="col-md-2">
                            {{ $book->bookType }}
                        </div>
                        <div class="col-md-2">
                            {{ $book->publishedYear }}
                        </div>
                        <div class="col-md-2">
                            {{ $book->bookRank }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif    
@endsection