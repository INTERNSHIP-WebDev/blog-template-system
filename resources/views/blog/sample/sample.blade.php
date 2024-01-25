{{-- Your Blade file --}}
@extends("blog.layouts.layout")

@section("title", "Sample Blog")

@section("content")

<?php
// COMPONENT VALUES DUMMY DATA
// COMPONENT VALUES DUMMY DATA
// COMPONENT VALUES DUMMY DATA

$target = $blog;

$title_ex = "13 Amazing Poems from Shel Silverstein with Valuable Life Lessons";
$description = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam nemo temporibus similique corrupti recusandae cumque delectus natus odio atque ea! Nemo similique recusandae veritatis et delectus fugiat quae quisquam vitae, debitis error laborum adipisci voluptates, nesciunt veniam tempora odio corrupti doloribus perferendis! Quos earum eos unde quidem itaque, dignissimos facilis accusantium recusandae quas eaque excepturi animi, blanditiis cupiditate. Earum eum ipsa illo nesciunt accusamus facilis ducimus, cum veniam pariatur quisquam esse enim perspiciatis beatae quas debitis incidunt ad temporibus totam aut quaerat optio animi, labore odit recusandae. Veniam est, impedit quibusdam similique cupiditate, fugiat sapiente iure maiores ratione quas pariatur?";
$image = "asset('backend/assets/img/post-landscape-1.jpg')";
$desc = "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam nemo temporibus similique corrupti recusandae cumque delectus natus odio atque ea! Nemo similique recusandae veritatis et delectus fugiat quae quisquam vitae, debitis error laborum adipisci voluptates, nesciunt veniam tempora odio corrupti doloribus perferendis! Quos earum eos unde quidem itaque, dignissimos facilis accusantium recusandae quas eaque excepturi animi, blanditiis cupiditate. Earum eum ipsa illo nesciunt accusamus facilis ducimus, cum veniam pariatur quisquam esse enim perspiciatis beatae quas debitis incidunt ad temporibus totam aut quaerat optio animi, labore odit recusandae. Veniam est, impedit quibusdam similique cupiditate, fugiat sapiente iure maiores ratione quas pariatur?";
$comment = [
    'image' => "backend/assets/img/person-5.jpg",
    'author' => "Sam Joshua",
    'body' => "This post is so bad it makes me want to throw up and punch an elephant!"
];
$header = [
    'head' => "Jucille Mae Escala's Dog Blog",
    'banner' => "backend/assets/img/post-landscape-1.jpg"
];
// END OF COMPONENT VALUES DUMMY DATA
// END OF COMPONENT VALUES DUMMY DATA
// END OF COMPONENT VALUES DUMMY DATA
?>

<main id="main">

    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12 post-content" data-aos="fade-up">

                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">

                        {{ $target }}

                        <!-- COMPONENT = Blog Details -->
                        <x-header :header="$header" />

                        <!-- COMPONENT = Blog Details -->
                        <div class="post-meta"><span class="date">{{ $target->user->name }}</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>

                        <!-- COMPONENT = Blog Header -->
                        <x-title :title="$title_ex" />

                        <!-- COMPONENT = First Description -->
                        <x-first-description :desc="$desc" />

                        <!-- COMPONENT = Description -->
                        <x-description :description="$description" />

                        <!-- COMPONENT = Image -->
                        <x-image :image="$image" />

                    </div><!-- End Single Post Content -->

                    <!-- ======= Comments ======= -->
                    <div class="comments">
                        <h5 class="comment-title py-4">2 Comments</h5>

                        <!-- COMPONENT = Comment -->
                        <x-comment :comment="$comment" />

                        <!-- COMPONENT = Comment -->
                        <x-comment :comment="$comment" />

                        <!-- COMPONENT = Comment -->
                        <x-comment :comment="$comment" />

                        <!-- COMPONENT = Comment -->
                        <x-comment :comment="$comment" />

                        <!-- COMPONENT = Comment -->
                        <x-comment :comment="$comment" />

                    </div><!-- End Comments -->

                    <!-- ======= Comments Form ======= -->
                    <div class="row justify-content-center mt-5">

                        <div class="col-lg-12">
                            <h5 class="comment-title">Leave a Comment</h5>
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="comment-name">Name</label>
                                    <input type="text" class="form-control" id="comment-name" placeholder="Enter your name">
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <label for="comment-email">Email</label>
                                    <input type="text" class="form-control" id="comment-email" placeholder="Enter your email">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="comment-message">Message</label>

                                    <textarea class="form-control" id="comment-message" placeholder="Enter your name" cols="30" rows="10"></textarea>
                                </div>
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary" value="Post comment">
                                </div>
                            </div>
                        </div>
                    </div><!-- End Comments Form -->

                </div>
            </div>
        </div>
    </section>
</main><!-- End #main -->
@endsection