<?php use \App\Http\Controllers\Helper\HelperController; ?>
<!--breadcrumbs-inner-part start-->
<div class="breadcrumbs-inner-part img6">
    <div class="container">
        <div class="breadcrumbs-inner-bread text-center">
            <h1 class="title">{{ $product[0]['namepro'] }}</h1>
            <?php $curent_idcategory = 0;
				if(isset($cate_selected)){
				$curent_idcategory = $cate_selected[0]['idcategory'];
			} ?>
            <ul class="breadcrumbs-trial">
                <?php HelperController::breadcrumbpost($rs_cat_product,$curent_idcategory,'breadcrumbs-trial',0); ?>
            </ul>
        </div>
    </div>
</div>
  <!--breadcrumbs-inner-part start-->
<!--Blog start-->
<div class="rs-blog-inner single-blog pt-100 pb-100 md-pt-80 md-pb-80">
   <div class="container">
       <div class="row">
         <div class="col-lg-8">
            <div class="blog-item">
                {{-- <div class="blog-img">
                  <a href="#"><img src="{{ $product[0]['url_thumbnail'] }}" alt=""></a> 
                </div> --}}
                <div class="full-blog-content">
                    <div class="blog-all-titles">
                        {{-- <div class="get-date">
                            <div class="blog-date">
                                <span class="date">19</span>
                                <span class="month">nov</span>
                            </div>
                        </div> --}}
                        <div class="title-wrap">
                              <h3 class="blog-title">
                                  <a href="#">{{ $product[0]['namepro'] }}</a>
                              </h3>
                           <div class="blog-meta">
                              <ul>
                                <li>
                                      <div class="categore-name">
                                         <a href="{{ url('/') }}/{{ $product[0]['slugcate'] }}">{{ $product[0]['namecat'] }}</a> 
                                      </div>
                                </li>
                                <li> <div class="author">{{ $product[0]['count'] }}</div></li>
                                  
                              </ul> 
                           </div> 
                        </div>
                    </div>
                    <div class="blog-desc">
                         {!! $product[0]['description'] !!}
                    </div>
                    <div class="td-post-sharing-top">
                     {{-- <a class="btn-facebook" href="javascript:void(0)">share</a> --}}
                        <div class="fb-like" 
                             data-href="{{ url('/') }}/{{ $product[0]['slug'] }}" 
                             data-width=""
                             data-layout="standard" 
                             data-action="like" 
                             data-size="small"  
                             data-share="true">
                        </div>
                    </div>

                </div>
            </div>
            @include('teamilk.canabia-news-relative')
         </div>
          <div class="col-lg-4 pl-50 md-pl-15 md-mt-60">
              @include('teamilk.canabia-sidebar')
          </div>
       </div>
   </div>
</div>
<script>
  var _url = document.URL;
  console.log(_url);
  var e_btn_share = document.getElementsByClassName("btn-facebook")[0];
  e_btn_share.addEventListener("click", function(){
      FB.ui({
      method: 'share',
      href: _url
    }, function(response){
        console.log(response);
    });
  });
  
  // window.fbAsyncInit = function() {
  //   FB.init({
  //     appId            : '128078052234955',
  //     autoLogAppEvents : true,
  //     xfbml            : true,
  //     version          : 'v10.0'
  //   });
  // };

  window.fbAsyncInit = function() {
    FB.init({
      appId      : '128078052234955',
      cookie     : true,
      xfbml      : true,
      version    : 'v10.0'
    });
      
    FB.AppEvents.logPageView();   
      
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
{{-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js"></script> --}}
   <!--Blog End-->
<!-- BEGIN: combo -->
<?php $idcrosstype = 0; ?>
@if(isset($sel_cross_byidproduct) && count($sel_cross_byidproduct) > 0 )
	@foreach($sel_cross_byidproduct as $item)
		@if($item['idcrosstype'] > $idcrosstype)
			<?php $idcrosstype = $item['idcrosstype']; ?>
				<div class="c-content-box c-size-md c-overflow-hide c-bs-grid-small-space">
					<div class="container">
						<div class="c-content-title-4">
							<h3 class="c-font-uppercase c-center c-font-bold c-line-strike"><span class="c-bg-white">{{ $item['namecross'] }}</span></h3>
						</div>
						<div class="row">
							<div data-slider="owl">
								<div class="owl-carousel owl-theme c-theme owl-small-space c-owl-nav-center" data-rtl="false" data-items="4" data-slide-speed="8000">
										@foreach($sel_cross_byidproduct as $row)
											@if($row['idcrosstype']==$idcrosstype)
											<div class="item">
												<div class="c-content-product-2 c-bg-white c-border">
													<div class="c-content-overlay">
														{{-- @if($row['price_sale_origin'])<div class="c-label c-bg-red c-font-uppercase c-font-white c-font-13 c-font-bold">Khuy???n m??i</div>@endif --}}		
														<div class="c-overlay-wrapper">
															<div class="c-overlay-content">
																<a href="{{ action('teamilk\ProductController@show',$row['idproduct']) }}" class="btn btn-md c-btn-grey-1 c-btn-uppercase c-btn-bold c-btn-border-1x c-btn-square">Xem gi?? g???c</a>
															</div>
														</div>
														<div class="c-bg-img-center-contain c-overlay-object" data-height="height" style="height: 270px; background-image: url({{ asset($row['urlfile']) }}"></div>
													</div>
													<div class="c-info">
														<p class="c-title c-font-18 c-font-slim">{{ $row['namepro'] }}</p>
														<p class="c-price c-font-16 c-font-slim"><span class="currency">{{ $row['price']}}</span><span class="vnd"></span> &nbsp;
															<span class="c-font-16 c-font-slim">x{{ $row['quality_sale'] }}(bu???i)</span>
															{{-- <span class="c-font-16 c-font-line-through c-font-red">@if($row['price_sale_origin'])<span class="currency">{{ $row['price_sale_origin'] }}</span><span class="vnd"></span>@endif</span> --}}
														</p>
													</div>
													<div class="btn-group btn-group-justified" role="group">
														<div class="btn-group c-border-top" role="group">
															<a href="javascript:void(0)" class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product">Th??ch</a>
														</div>
														<div class="btn-group c-border-left c-border-top" role="group">
															<a href="{{ action('teamilk\ProductController@show',$row['idproduct']) }}" class="btn btn-lg c-btn-white c-btn-uppercase c-btn-square c-font-grey-3 c-font-white-hover c-bg-red-2-hover c-btn-product">Mua</a>
														</div>
													</div>
												</div>
											</div>
											@endif
										@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
		@endif
	@endforeach
@endif
@section('other_scripts')

    {{-- <script src="{{ asset('dashboard/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets-tea/js/custom-post.js?v=0.0.8') }}" type="text/javascript"></script> --}}
@stop