@extends('front.layout.master')
@section('title', 'Blog')
@section('body')
        
        <!-- Blog Details Section Begin -->

        <div class="blog-details">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="blog-details-inner">
                            <div class="blog-details-title">
                                <h2>
                                    {{$blog->title}}
                                </h2>
                                <p>{{$blog->category}} <span>{{date('M d, y',strtotime($blog->created_at))}}</span></p>
                            </div>
                            <div class="blog-large-pic">
                                <img src="front/img/blog/{{$blog->image}}" alt="">
                            </div>
                            <div class="blog-details-decs">
                                <p>
                                    {{$blog->content}}
                                </p>
                            </div>
                            <div class="leave-comment">
                                <h4>Leave A Comment</h4>
                                <form action="blog/detail/{{$blog->id}}" class="comment-form" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <textarea name="" placeholder="Message" id="" cols="30" rows="10"></textarea>
                                            <button type="submit" class="site-btn">Send message</button>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Blog Details Section End  -->

@endsection