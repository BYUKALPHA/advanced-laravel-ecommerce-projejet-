extends('frontend.main_master')
@section('content')

@section('title')
Home Oak Cafe Online Orders
@endsection

<div class="body-content outer-top-xs" id="top-banner-and-menu">
  <div class="container">
    <div class="row"> 


      <!-- ============================= SIDEBAR ================================ -->
      <div class="col-xs-12 col-sm-12 col-md-3 sidebar"> 
        




<!-- === == TOP NAVIGATION == ==== -->
       @include('frontend.common.vertical_menu')
        <!-- ===== ==== TOP NAVIGATION : END ==== ===== --> 
        




        <!-- ============================ HOT DEALS ================================ -->
        <div class="sidebar-widget hot-deals wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">
            @if(session()->get('language') == 'french') Bonnes affaires @else hot deals @endif </h3>
          <div class="owl-carousel sidebar-carousel custom-carousel owl-theme outer-top-ss">

      @foreach($hot_deals as $product)
            <div class="item">
              <div class="products">
                <div class="hot-deal-wrapper">
                  <div class="image"> <img src="{{ asset($product->product_thambnail) }}" alt=""> </div>

        @php
        $amount = $product->selling_price - $product->discount_price;
        $discount = ($amount/$product->selling_price) * 100;
        @endphp   
                  @if ($product->discount_price == NULL)
                <div class="tag new"><span>new</span></div>
              @else
              <div class="sale-offer-tag"><span>{{ round($discount) }}%<br>
                    off</span></div>

               @endif


                  <div class="timing-wrapper">
                    <div class="box-wrapper">
                      <div class="date box"> <span class="key">120</span> <span class="value">DAYS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="hour box"> <span class="key">20</span> <span class="value">HRS</span> </div>
                    </div>
                    <div class="box-wrapper">
                      <div class="minutes box"> <span class="key">36</span> <span class="value">MINS</span> </div>
                    </div>
                    <div class="box-wrapper hidden-md">
                      <div class="seconds box"> <span class="key">60</span> <span class="value">SEC</span> </div>
                    </div>
                  </div>
                </div>
                <!-- /.hot-deal-wrapper -->
                
                <div class="product-info text-left m-t-20">
                  <h3 class="name"><a href="">@if(session()->get('language') == 'french') {{ $product->product_name_fr }} @else {{ $product->product_name_en }} @endif</a></h3></a></h3>
                  <div class="rating rateit-small"></div>
                   @if ($product->discount_price == NULL)
 <div class="product-price"> <span class="price"> {{ $product->selling_price }} </span>  </div>
     @else
 <div class="product-price"> <span class="price"> {{ $product->discount_price }} </span>
  <span class="price-before-discount">{{ $product->selling_price }}</span> </div>
     @endif
                  <!-- /.product-price --> 
                
                </div>
                <!-- /.product-info -->
                
                <div class="cart clearfix animate-effect">
                  <div class="action">
                    <div class="add-cart-button btn-group">
                      <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                      <button class="btn btn-primary cart-btn" type="button">
                          @if(session()->get('language') == 'french') Ajouter au panier @else Add to cart @endif</button>
                    </div>
                  </div>
                  <!-- /.action --> 
                </div>
                <!-- /.cart --> 
              </div>
            </div>

 @endforeach <!-- // end hot deals foreach -->



    
          </div>
          <!-- /.sidebar-widget --> 
        </div>
        <!-- ======================= HOT DEALS: END ============================= --> 
        




        <!-- ====================== SPECIAL OFFER ============================ -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">
           @if(session()->get('language') == 'french') Offre spéciale @else Special Offer @endif</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">



              <div class="item">
                <div class="products special-product">

 @foreach($special_offer as $product)
  <div class="product">
    <div class="product-micro">
      <div class="row product-micro-row">
        <div class="col col-xs-5">
          <div class="product-image">
            <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"> <img src="{{ asset($product->product_thambnail) }}" alt=""> </a> </div>
            <!-- /.image --> 

          </div>
          <!-- /.product-image --> 
        </div>
        <!-- /.col -->
        <div class="col col-xs-7">
          <div class="product-info">
            <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('language') == 'french') {{ $product->product_name_fr }} @else {{ $product->product_name_en }} @endif</a></h3>
            <div class="rating rateit-small"></div>
 <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span> </div>
            <!-- /.product-price --> 

          </div>
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.product-micro-row --> 
    </div>
    <!-- /.product-micro --> 

  </div>
                  @endforeach <!-- // end special offer foreach -->




              
                </div>
              </div>
             
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- =================== SPECIAL OFFER : END ============================ --> 





 <!-- ===== ===== PRODUCT TAGS ==== ====== -->
   @include('frontend.common.product_tags')
        <!-- ==== ===== PRODUCT TAGS : END ======= ==== --> 


        <!-- ============================= SPECIAL DEALS ========================= -->
        
        <div class="sidebar-widget outer-bottom-small wow fadeInUp">
          <h3 class="section-title">
            @if(session()->get('language') == 'french') Offres spéciales @else Special Deals @endif</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel sidebar-carousel special-offer custom-carousel owl-theme outer-top-xs">
              <div class="item">
                <div class="products special-product">


@foreach($special_deals as $product)
      <div class="product">
        <div class="product-micro">
          <div class="row product-micro-row">

            <div class="col col-xs-5">
              <div class="product-image">
                <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"> <img src="{{ asset($product->product_thambnail) }}"  alt=""> </a> </div>
                <!-- /.image --> 
                       
                            
          </div>
                          <!-- /.product-image --> 
             </div>
                        <!-- /.col -->
                         <div class="col col-xs-7">
              <div class="product-info">
                <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('language') == 'french') {{ $product->product_name_fr }} @else {{ $product->product_name_en }} @endif</a></h3>
                <div class="rating rateit-small"></div>
                <div class="product-price"> <span class="price"> {{ $product->selling_price }} </span> </div>
                <!-- /.product-price --> 
                            
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>

                 @endforeach <!-- // end special deals foreach --> 
                  
                </div>
              </div>


            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ======================= SPECIAL DEALS : END ================================ --> 





        <!-- ===================================== NEWSLETTER ======================= -->
        <div class="sidebar-widget newsletter wow fadeInUp outer-bottom-small">
          <h3 class="section-title">
           @if(session()->get('language') == 'french') Bulletins d'information @else Newsletters @endif</h3>
          <div class="sidebar-widget-body outer-top-xs">
            <p>
             @if(session()->get('language') == 'french') Inscrivez-vous à notre lettre d'information! @else Sign Up for Our Newsletter! @endif</p>
            <form>
              <div class="form-group">
                <label class="sr-only" for="exampleInputEmail1">
                  @if(session()->get('language') == 'french') Adresse e-mail @else Email address @endif</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Subscribe to our newsletter">
              </div>
              <button class="btn btn-primary">
                @if(session()->get('language') == 'french') S'abonner @else Subscribe @endif</button>
            </form>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ================== NEWSLETTER: END ==================== --> 




        
       <!-- == ==== Testimonials=== ===== -->
         @include('frontend.common.testimonials')

      
        <!-- === ======== Testimonials: END ==== =========== -->
        
        <div class="home-banner"> <img src="{{ asset('frontend/assets/images/banners/LHS-banner.jpg')}}" alt="Image"> </div>
      </div>
      <!-- /.sidemenu-holder --> 
      <!-- ================= SIDEBAR : END ========================== --> 
      




      <!-- ========================= CONTENT =========================== -->
      <div class="col-xs-12 col-sm-12 col-md-9 homebanner-holder"> 
        <!-- ============================ SECTION – HERO ============================ -->
        
        <div id="hero">
          <div id="owl-main" class="owl-carousel owl-inner-nav owl-ui-sm">

       
            
      @foreach($sliders as $slider)
    <div class="item" style="background-image: url({{ asset($slider->slider_img) }});">
      <div class="container-fluid">
        <div class="caption bg-color vertical-center text-left">

          <div class="big-text fadeInDown-1">{{ $slider->title }} </div>
          <div class="excerpt fadeInDown-2 hidden-xs"> <span>{{ $slider->description }}</span> </div>
          <div class="button-holder fadeInDown-3"> <a href="index.php?page=single-product" class="btn-lg btn btn-uppercase btn-primary shop-now-button">Shop Now</a> </div>
        </div>
        <!-- /.caption --> 
      </div>
      <!-- /.container-fluid --> 
    </div>
    <!-- /.item -->
    @endforeach
            
          </div>
          <!-- /.owl-carousel --> 
        </div>
        
        <!-- ============== SECTION – HERO : END ============================ --> 
        
        <!-- ========================== INFO BOXES ============== -->
        <div class="info-boxes wow fadeInUp">
          <div class="info-boxes-inner">
            <div class="row">
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">money back</h4>
                    </div>
                  </div>
                  <h6 class="text">30 Days Money Back Guarantee</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="hidden-md col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">free shipping</h4>
                    </div>
                  </div>
                  <h6 class="text">Shipping on orders over $99</h6>
                </div>
              </div>
              <!-- .col -->
              
              <div class="col-md-6 col-sm-4 col-lg-4">
                <div class="info-box">
                  <div class="row">
                    <div class="col-xs-12">
                      <h4 class="info-box-heading green">Special Sale</h4>
                    </div>
                  </div>
                  <h6 class="text">Extra $5 off on all items </h6>
                </div>
              </div>
              <!-- .col --> 
            </div>
            <!-- /.row --> 
          </div>
          <!-- /.info-boxes-inner --> 
          
        </div>
        <!-- /.info-boxes --> 
        <!-- ======================== INFO BOXES : END ======================= --> 







        <!-- ================= SCROLL TABS ================================== -->
        <div id="product-tabs-slider" class="scroll-tabs outer-top-vs wow fadeInUp">
          <div class="more-info-tab clearfix ">
            <h3 class="new-product-title pull-left">
              @if(session()->get('language') == 'french') Nouveaux produits @else New Products @endif</h3>
            <ul class="nav nav-tabs nav-tab-line pull-right" id="new-products-1">
              <li class="active"><a data-transition-type="backSlide" href="#all" data-toggle="tab">
                @if(session()->get('language') == 'french') Tous @else All @endif</
              </a></li>
   @foreach($categories as $category)
                <li><a data-transition-type="backSlide" href="#category{{ $category->id }}" data-toggle="tab">
                  @if(session()->get('language') == 'french') {{ $category->category_name_fr }} @else {{ $category->category_name_en }} @endif</a></li>
           @endforeach
            <!--   <li><a data-transition-type="backSlide" href="#laptop" data-toggle="tab">Electronics</a></li>
              <li><a data-transition-type="backSlide" href="#apple" data-toggle="tab">Shoes</a></li> -->
            </ul>
            <!-- /.nav-tabs --> 
          </div>
          <div class="tab-content outer-top-xs">


            <div class="tab-pane in active" id="all">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                  

         @foreach($products as $product)
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->
                          
                          <div class="tag new"><span>@if(session()->get('language') == 'french') Nouveau @else New @endif</span></div>
                        </div>
                        <!-- /.product-image -->
                        
                        <div class="product-info text-left">
                          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">@if(session()->get('language') == 'french') {{ $product->product_name_fr }} @else {{ $product->product_name_en }} @endif</a></h3>
                          <div class="rating rateit-small"></div>
                          <div class="description"></div>
                          <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                          <!-- /.product-price --> 
                          
                        </div>
                        <!-- /.product-info -->
                        <div class="cart clearfix animate-effect">
                          <div class="action">
                            <ul class="list-unstyled">
                              <li class="add-cart-button btn-group">
                                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                                <button class="btn btn-primary cart-btn" type="button">@if(session()->get('language') == 'french') Ajouter au panier @else Add to cat @endif</button>
                              </li>
                              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                            </ul>
                          </div>
                          <!-- /.action --> 
                        </div>
                        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
          @endforeach   <!-- end all option products foreach -->     
                  


                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
            



            @foreach($categories as $category)
            <div class="tab-pane" id="category{{ $category->id }}">
              <div class="product-slider">
                <div class="owl-carousel home-owl-carousel custom-carousel owl-theme" data-item="4">
                  
@php
  $catwiseProduct = App\Models\Product::where('category_id',$category->id)->orderBy('id','DESC')->get(); 
@endphp

           @forelse($catwiseProduct as $product)

        
                  <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                         <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->

        @php
        $amount = $product->selling_price - $product->discount_price;
        $discount = ($amount/$product->selling_price) * 100;
        @endphp 
      

                          <div>
            @if ($product->discount_price == NULL)
            <div class="tag new"><span>new</span></div>
            @else
            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
          </div>
                         </div>
                        <!-- /.product-image -->
                        
    <div class="product-info text-left">
         <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
@if(session()->get('language') == 'french') {{ $product->product_name_fr }} @else {{ $product->product_name_en }} @endif
            </a></h3>
          <div class="rating rateit-small"></div>
          <div class="description"></div>
            @if ($product->discount_price == NULL)
    <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
         @else
 <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
         @endif
          <!-- /.product-price --> 

        </div>
        <!-- /.product-info -->
        <div class="cart clearfix animate-effect">
          <div class="action">
            <ul class="list-unstyled">
              <li class="add-cart-button btn-group">
                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                <button class="btn btn-primary cart-btn" type="button">@if(session()->get('language') == 'french') Ajouter au panier @else Add to cat @endif</button>
              </li>
              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
            </ul>
          </div>
          <!-- /.action --> 
        </div>
        <!-- /.cart -->




                      </div>
                      <!-- /.product --> 
                      
                    </div>
                    <!-- /.products --> 
                  </div>
                  <!-- /.item -->
          @empty
                  <h5 class="text-danger">
                  @if(session()->get('language') == 'french') Aucun produit trouvé @else No Product Found @endif</h5>

                  @endforelse<!--  // end all optionproduct foreach  -->


                </div>
                <!-- /.home-owl-carousel --> 
              </div>
              <!-- /.product-slider --> 
            </div>
            <!-- /.tab-pane -->
            
       @endforeach <!-- end categor foreach -->



            
          </div>
          <!-- /.tab-content --> 
        </div>
        <!-- /.scroll-tabs --> 
        <!-- ========================= SCROLL TABS : END ============================ --> 
        <!-- ================================== WIDE PRODUCTS ============================= -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-7 col-sm-7">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner1.jpg" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col -->
            <div class="col-md-5 col-sm-5">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="assets/images/banners/home-banner2.jpg" alt=""> </div>
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 

        
        <!-- ============================= WIDE PRODUCTS : END =========================== --> 




        <!-- ============================ FEATURED PRODUCTS ================================= -->
        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
            @if(session()->get('language') == 'french') Produits populaires @else Featured products @endif</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            
      @foreach($featured as $product)

        <div class="item item-carousel">
            
          <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->

        @php
        $amount = $product->selling_price - $product->discount_price;
        $discount = ($amount/$product->selling_price) * 100;
        @endphp                  

          <div>
            @if ($product->discount_price == NULL)
            <div class="tag new"><span>new</span></div>
            @else
            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
          </div>
                         </div>

                        <!-- /.product-image -->

        <div class="product-info text-left">
          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
@if(session()->get('language') == 'french') {{ $product->product_name_fr }} @else {{ $product->product_name_en }} @endif
            </a></h3>
          <div class="rating rateit-small"></div>
          <div class="description"></div>

         @if ($product->discount_price == NULL)
    <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
         @else
 <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
         @endif


          <!-- /.product-price --> 

        </div>
        <!-- /.product-info -->
        <div class="cart clearfix animate-effect">
          <div class="action">
            <ul class="list-unstyled">
              <li class="add-cart-button btn-group">
                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                <button class="btn btn-primary cart-btn" type="button">
                 @if(session()->get('language') == 'french') Ajouter au panier @else Add to cart @endif</button>
              </li>
              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
            </ul>
          </div>
          <!-- /.action --> 
        </div>
        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 



            </div>
            <!-- /.item -->

       </div>
      @endforeach


          
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ====================== FEATURED PRODUCTS : END ====================== --> 




<!-- == === skip_product_0 PRODUCTS == ==== -->

        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
@if(session()->get('language') == 'french') {{ $skip_category_0->category_name_fr }} @else {{ $skip_category_0->category_name_en }} @endif
            </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


            @foreach($skip_product_0 as $product)
            <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->

        @php
        $amount = $product->selling_price - $product->discount_price;
        $discount = ($amount/$product->selling_price) * 100;
        @endphp                  

          <div>
            @if ($product->discount_price == NULL)
            <div class="tag new"><span>new</span></div>
            @else
            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
          </div>
                         </div>

                        <!-- /.product-image -->

        <div class="product-info text-left">
          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
@if(session()->get('language') == 'french') {{ $product->product_name_fr }} @else {{ $product->product_name_en }} @endif
            </a></h3>
          <div class="rating rateit-small"></div>
          <div class="description"></div>

         @if ($product->discount_price == NULL)
    <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
         @else
 <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
         @endif


          <!-- /.product-price --> 

        </div>
        <!-- /.product-info -->
        <div class="cart clearfix animate-effect">
          <div class="action">
            <ul class="list-unstyled">
              <li class="add-cart-button btn-group">
                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                <button class="btn btn-primary cart-btn" type="button">@if(session()->get('language') == 'french') Ajouter au panier @else Add to cart @endif</button>
              </li>
              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
            </ul>
          </div>
          <!-- /.action --> 
        </div>
        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 

                    </div>
                    <!-- /.products --> 
                  </div>
            <!-- /.item -->
            @endforeach


          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- == ==== skip_product_0 PRODUCTS : END ==== === --> 







<!-- == === skip_product_1 PRODUCTS == ==== -->

        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
@if(session()->get('language') == 'french') {{ $skip_category_1->category_name_fr }} @else {{ $skip_category_1->category_name_en }} @endif
            </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


            @foreach($skip_product_1 as $product)
            <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->

        @php
        $amount = $product->selling_price - $product->discount_price;
        $discount = ($amount/$product->selling_price) * 100;
        @endphp                  

          <div>
            @if ($product->discount_price == NULL)
            <div class="tag new"><span>new</span></div>
            @else
            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
          </div>
                         </div>

                        <!-- /.product-image -->

        <div class="product-info text-left">
          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
@if(session()->get('language') == 'french') {{ $product->product_name_fr }} @else {{ $product->product_name_en }} @endif
            </a></h3>
          <div class="rating rateit-small"></div>
          <div class="description"></div>

         @if ($product->discount_price == NULL)
    <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
         @else
 <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
         @endif


          <!-- /.product-price --> 

        </div>
        <!-- /.product-info -->
        <div class="cart clearfix animate-effect">
          <div class="action">
            <ul class="list-unstyled">
              <li class="add-cart-button btn-group">
                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                <button class="btn btn-primary cart-btn" type="button">@if(session()->get('language') == 'french') Ajouter au panier @else Add to cart @endif</button>
              </li>
              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
            </ul>
          </div>
          <!-- /.action --> 
        </div>
        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 

                    </div>
                    <!-- /.products --> 
                  </div>
            <!-- /.item -->
            @endforeach


          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- == ==== skip_product_1 PRODUCTS : END ==== === -->






<!-- == === skip_brand_product_1 PRODUCTS == ==== -->

        <section class="section featured-product wow fadeInUp">
          <h3 class="section-title">
@if(session()->get('language') == 'french') {{ $skip_brand_1->brand_name_fr }} @else {{ $skip_brand_1->brand_name_en }} @endif
            </h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">


            @foreach($skip_brand_product_1 as $product)
            <div class="item item-carousel">
                    <div class="products">
                      <div class="product">
                        <div class="product-image">
                          <div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{ asset($product->product_thambnail) }}" alt=""></a> </div>
                          <!-- /.image -->

        @php
        $amount = $product->selling_price - $product->discount_price;
        $discount = ($amount/$product->selling_price) * 100;
        @endphp                  

          <div>
            @if ($product->discount_price == NULL)
            <div class="tag new"><span>new</span></div>
            @else
            <div class="tag hot"><span>{{ round($discount) }}%</span></div>
            @endif
          </div>
                         </div>

                        <!-- /.product-image -->

        <div class="product-info text-left">
          <h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
@if(session()->get('language') == 'french') {{ $product->product_name_fr }} @else {{ $product->product_name_en }} @endif
            </a></h3>
          <div class="rating rateit-small"></div>
          <div class="description"></div>

         @if ($product->discount_price == NULL)
    <div class="product-price"> <span class="price"> ${{ $product->selling_price }} </span>  </div>
         @else
 <div class="product-price"> <span class="price"> ${{ $product->discount_price }} </span> <span class="price-before-discount">$ {{ $product->selling_price }}</span> </div>
         @endif


          <!-- /.product-price --> 

        </div>
        <!-- /.product-info -->
        <div class="cart clearfix animate-effect">
          <div class="action">
            <ul class="list-unstyled">
              <li class="add-cart-button btn-group">
                <button data-toggle="tooltip" class="btn btn-primary icon" type="button" title="Add Cart"> <i class="fa fa-shopping-cart"></i> </button>
                <button class="btn btn-primary cart-btn" type="button">@if(session()->get('language') == 'french') Ajouter au panier @else Add to cart @endif</button>
              </li>
              <li class="lnk wishlist"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
              <li class="lnk"> <a data-toggle="tooltip" class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
            </ul>
          </div>
          <!-- /.action --> 
        </div>
        <!-- /.cart --> 
                      </div>
                      <!-- /.product --> 

                    </div>
                    <!-- /.products --> 
                  </div>
            <!-- /.item -->
            @endforeach


          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- == ==== skip_brand_product_1 PRODUCTS : END ==== === -->



        <!-- ============================ WIDE PRODUCTS ============================== -->
        <div class="wide-banners wow fadeInUp outer-bottom-xs">
          <div class="row">
            <div class="col-md-12">
              <div class="wide-banner cnt-strip">
                <div class="image"> <img class="img-responsive" src="{{ asset('frontend/assets/images/banners/home-banner.jpg')}}" alt=""> </div>
                <div class="strip strip-text">
                  <div class="strip-inner">
                    <h2 class="text-right">New Mens Fashion<br>
                      <span class="shopping-needs">Save up to 40% off</span></h2>
                  </div>
                </div>
                <div class="new-label">
                  <div class="text">NEW</div>
                </div>
                <!-- /.new-label --> 
              </div>
              <!-- /.wide-banner --> 
            </div>
            <!-- /.col --> 
            
          </div>
          <!-- /.row --> 
        </div>
        <!-- /.wide-banners --> 
        <!-- ====================== WIDE PRODUCTS : END ========================= --> 



        <!-- =========================== BEST SELLER ======================== -->
        
        <div class="best-deal wow fadeInUp outer-bottom-xs">
          <h3 class="section-title">Best seller
          </h3>
          <div class="sidebar-widget-body outer-top-xs">
            <div class="owl-carousel best-seller custom-carousel owl-theme outer-top-xs">
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="assets/images/products/p20.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="assets/images/products/p21.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="assets/images/products/p22.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="assets/images/products/p23.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="assets/images/products/p24.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="assets/images/products/p25.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="products best-product">
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="assets/images/products/p26.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                  <div class="product">
                    <div class="product-micro">
                      <div class="row product-micro-row">
                        <div class="col col-xs-5">
                          <div class="product-image">
                            <div class="image"> <a href="#"> <img src="assets/images/products/p27.jpg" alt=""> </a> </div>
                            <!-- /.image --> 
                            
                          </div>
                          <!-- /.product-image --> 
                        </div>
                        <!-- /.col -->
                        <div class="col2 col-xs-7">
                          <div class="product-info">
                            <h3 class="name"><a href="#">Floral Print Buttoned</a></h3>
                            <div class="rating rateit-small"></div>
                            <div class="product-price"> <span class="price"> $450.99 </span> </div>
                            <!-- /.product-price --> 
                            
                          </div>
                        </div>
                        <!-- /.col --> 
                      </div>
                      <!-- /.product-micro-row --> 
                    </div>
                    <!-- /.product-micro --> 
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.sidebar-widget-body --> 
        </div>
        <!-- /.sidebar-widget --> 
        <!-- ===================== BEST SELLER : END ======================= --> 
        
        <!-- ============================ BLOG SLIDER ============================== -->
        <section class="section latest-blog outer-bottom-vs wow fadeInUp">
          <h3 class="section-title">
            @if(session()->get('language') == 'french') Dernières nouvelles du blog @else latest from blog @endif</h3>
          <div class="blog-slider-container outer-top-xs">
            <div class="owl-carousel blog-slider custom-carousel">
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post1.jpg" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Voluptatem accusantium doloremque laudantium</a></h3>
                    <span class="info">By Jone Doe &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
              
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post2.jpg" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item --> 
              
              <!-- /.item -->
              
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post1.jpg" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
              
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post2.jpg" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item -->
              
              <div class="item">
                <div class="blog-post">
                  <div class="blog-post-image">
                    <div class="image"> <a href="blog.html"><img src="assets/images/blog-post/post1.jpg" alt=""></a> </div>
                  </div>
                  <!-- /.blog-post-image -->
                  
                  <div class="blog-post-info text-left">
                    <h3 class="name"><a href="#">Dolorem eum fugiat quo voluptas nulla pariatur</a></h3>
                    <span class="info">By Saraha Smith &nbsp;|&nbsp; 21 March 2016 </span>
                    <p class="text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium</p>
                    <a href="#" class="lnk btn btn-primary">Read more</a> </div>
                  <!-- /.blog-post-info --> 
                  
                </div>
                <!-- /.blog-post --> 
              </div>
              <!-- /.item --> 
              
            </div>
            <!-- /.owl-carousel --> 
          </div>
          <!-- /.blog-slider-container --> 
        </section>
        <!-- /.section --> 
        <!-- ======================= BLOG SLIDER : END ================== --> 

        
        <!-- =================== New Arrivals ========================= -->
        <section class="section wow fadeInUp new-arriavls">
          <h3 class="section-title">
          @if(session()->get('language') == 'french') Nouvelles Arrivées @else New Arrivals @endif</h3>
          <div class="owl-carousel home-owl-carousel custom-carousel owl-theme outer-top-xs">
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="assets/images/products/p19.jpg" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="assets/images/products/p28.jpg" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag new"><span>new</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="assets/images/products/p30.jpg" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag hot"><span>hot</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="assets/images/products/p1.jpg" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag hot"><span>hot</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="assets/images/products/p2.jpg" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag sale"><span>sale</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item -->
            
            <div class="item item-carousel">
              <div class="products">
                <div class="product">
                  <div class="product-image">
                    <div class="image"> <a href="detail.html"><img  src="assets/images/products/p3.jpg" alt=""></a> </div>
                    <!-- /.image -->
                    
                    <div class="tag sale"><span>sale</span></div>
                  </div>
                  <!-- /.product-image -->
                  
                  <div class="product-info text-left">
                    <h3 class="name"><a href="detail.html">Floral Print Buttoned</a></h3>
                    <div class="rating rateit-small"></div>
                    <div class="description"></div>
                    <div class="product-price"> <span class="price"> $450.99 </span> <span class="price-before-discount">$ 800</span> </div>
                    <!-- /.product-price --> 
                    
                  </div>
                  <!-- /.product-info -->
                  <div class="cart clearfix animate-effect">
                    <div class="action">
                      <ul class="list-unstyled">
                        <li class="add-cart-button btn-group">
                          <button class="btn btn-primary icon" data-toggle="dropdown" type="button"> <i class="fa fa-shopping-cart"></i> </button>
                          <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
                        </li>
                        <li class="lnk wishlist"> <a class="add-to-cart" href="detail.html" title="Wishlist"> <i class="icon fa fa-heart"></i> </a> </li>
                        <li class="lnk"> <a class="add-to-cart" href="detail.html" title="Compare"> <i class="fa fa-signal" aria-hidden="true"></i> </a> </li>
                      </ul>
                    </div>
                    <!-- /.action --> 
                  </div>
                  <!-- /.cart --> 
                </div>
                <!-- /.product --> 
                
              </div>
              <!-- /.products --> 
            </div>
            <!-- /.item --> 
          </div>
          <!-- /.home-owl-carousel --> 
        </section>
        <!-- /.section --> 
        <!-- ====================== New Arrivals : END ============================== --> 
        





      </div>
      <!-- /.homebanne======== CONTENT : END ==================== --> 
    </div>
    <!-- /.row --> 
    <!-- ===================== BRANDS CAROUSEL ============================ -->
   




   @include('frontend.body.brands')
    <!-- /.logo-slider --> 
    <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> 
  </div>
  <!-- /.container --> 
</div>


@endsection