@extends('layout2')

@section('title', 'Checkout')

@section('extra-css')

@endsection

@section('content')
	
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="blog-post-area">
						<h2 class="title text-center">Latest From our Blog</h2>
						<div class="single-blog-post">
							<h3>Girls Pink T Shirt arrived in store</h3>
							<div class="post-meta">
								<ul>
									<li><i class="fa fa-user"></i> Mac Doe</li>
									<li><i class="fa fa-clock-o"></i> 1:33 pm</li>
									<li><i class="fa fa-calendar"></i> DEC 5, 2013</li>
								</ul>
							</div>
							<a href="{{ asset('/images/blog/blog-one.jpg') }}" data-lightbox="images" data-title="">
								<img src="{{ asset('/images/blog/blog-one.jpg') }}" alt="">
							</a>
							<div class="product-section-images">
								<div class="product-section-thumbnail selected">
									<a href="{{ asset('/images/products/appliance-1.jpg') }}" data-lightbox="images" data-title="">
										<img src="{{ asset('/images/products/appliance-1.jpg') }}" width="95px" height="82px" alt="">
									</a>
								</div>
								<a href="{{ asset('/images/products/appliance-2.jpg') }}" data-lightbox="images" data-title="">
									<img src="{{ asset('/images/products/appliance-2.jpg') }}" width="95px" height="82px" alt="">
								</a>
								<a href="{{ asset('/images/products/appliance-3.jpg') }}" data-lightbox="images" data-title="">
									<img src="{{ asset('/images/products/appliance-3.jpg') }}" width="95px" height="82px" alt="">
								</a>
								<a href="{{ asset('/images/products/appliance-4.jpg') }}" data-lightbox="images" data-title="">
									<img src="{{ asset('/images/products/appliance-4.jpg') }}" width="95px" height="82px" alt="">
								</a>
							</div>
							<div style="border-top:2px solid black;margin:10px 0;"></div>
							<p>
								Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p> <br>

							<p>
								Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p> <br>

							<p>
								Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p> <br>

							<p>
								Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.
							</p>
							<div class="pager-area">
								<ul class="pager pull-right">
									<li><a href="#">Pre</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div><!--/blog-post-area-->
				</div>	
			</div>
		</div>
	</section>
@endsection

@section('extra-js')
<script>
    (function(){
        const currentImage = document.querySelector('#currentImage');
        const images = document.querySelectorAll('.product-section-thumbnail');

        images.forEach((element) => element.addEventListener('click', thumbnailClick));

        function thumbnailClick(e) {

            currentImage.classList.remove('active');

            currentImage.addEventListener('transitionend',() => {
                currentImage.src = this.querySelector('img').src;
                currentImage.classList.add('active');
            })

            images.forEach((element) => element.classList.remove('selected'));
            this.classList.add('selected');
        }
    })();
</script>

<script>
    lightbox.option({
      'resizeDuration': 200,
      'wrapAround': true,
	  'maxHeight' : 100%,
    })
</script>

@endsection