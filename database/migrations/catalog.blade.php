@extends('layouts.app')

@section('content')
<div class="container-fluid">
<div class="row">
  <!--filter bar-->
  <div class="col-md-3">
    <div class="sidebar">
      <h3 class="sidebar-title">Selection of books</h3>
      <form action="/search">
        <label for=""><span>Search:</span><input type="text" name="search" /></label>
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
      <div class="row">
        <div class="yearRange">
          <h3>Years</h3><br>
          <div id="slider" name="slider"></div>
          <div class="yearR">Between <span class="min"></span> and <span class="max"></span></div>
        </div>
      </div>
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
            <li><a href="">top</a></li>
            <li><a href="">novelty</a></li>
            <li><a href="">popularity</a></li>
            <li><a href="">comments</a></li>
          </ul>
        </div>
      </div>
      <!-- end sorting box -->
                          <?php
                            function count_pages($pdfname) {
                              $pdftext = file_get_contents('./storage/attached_files/'.$pdfname);
                              $num = preg_match_all("/\/Page\W/", $pdftext, $dummy);
                              return $num;
                            }
                          ?>
      <!-- book items -->
      <div class="container-fluid">
       @foreach($books as $book)
      {{-- {!! Form::open(['action' => ['PagesController@bookDescription',$book->id], 'method' => 'POST'])!!} --}}
        <div class="bookItem-box">
          <div class="row">
            <div class="container">
              <div class="bookItem">
                <div class="row">
                <div class="col-md-2">
                  <div class="book-img">
                    <a href="/bookDetail/{{$book->id}}">
                      <img src="/storage/cover_images/{{$book->cover_image}}" alt="cover_image">
                    </a>
                  </div>
                </div>
                <div class="col-md-10">
                  <div class="row">
                    <div class="col-md-8">
                      <h3 class="book-title">
                        <a href="/bookDetail/{{$book->id}}">{{$book->bookName}}</a>
                      </h3>
                      <h4 class="book-author">
                        <a href="#">{{$book->bookAuthor}}</a>
                      </h4>
                      <p class="book-description">
                        {{ $book->describtion }}
                      </p>
                      <a href="/bookDetail/{{$book->id}}">more...</a>
                    </div>
          
                      <div class="col-md-4">
                        <div class="book-info">
                          <h5 style="margin-bottom: 15px;">
                            <div class="ratingBlock">
                              <span>Rating:</span>
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
                          </h5>
                        
                          <h5>Country: {{$book->country}}</h5>
                          <h5>Language: {{$book->language}}</h5>
                          <h5>Published: {{$book->publishedYear}}</h5>
                          <h5>Pages: {{ count_pages($book->attachedFile) }}</h5>
                          <h5>ISBN: {{$book->isbn}}</h5>
                        </div>
                        <div class="row">
                          <div class="bottom-bar">
                            <div class="tooltip">
                              <i class="fas fa-download"></i> {{ $book->downloads }}
                              <span class="tooltiptext">Number of downloads</span>
                            </div>
                            <div class="tooltip">
                              <i class="fas fa-comments"></i> {{ count($book->comments) }}
                             <span class="tooltiptext">Number of comments</span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              {{-- <div class="row">
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
              </div> --}}
            </div>
          </div>
        </div>
    {{-- / {!! Form::close() !!} --}}
        @endforeach
      </div>
      <div class="paginateCatalog">
        {{ $books->links() }}
      </div>
      <!-- end of book items section -->
    </div>
  </div>
</div>
  <br>
  <br>
    </div>  
@endsection