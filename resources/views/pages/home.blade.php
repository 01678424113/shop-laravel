@extends('layout.index')
@section('content')
    <div class="rev-slider">
        <div class="fullwidthbanner-container">
            <div class="fullwidthbanner">
                <div class="bannercontainer">
                    <div class="banner">
                        <ul>
                            <!-- THE FIRST SLIDE -->
                            @foreach($slide as $sl)
                                <li data-transition="boxfade" data-slotamount="20" class="active-revslide"
                                    style="width: 100%; height: 100%; overflow: hidden; z-index: 18; visibility: hidden; opacity: 0;">
                                    <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined"
                                         data-zoomstart="undefined" data-zoomend="undefined"
                                         data-rotationstart="undefined" data-rotationend="undefined"
                                         data-ease="undefined" data-bgpositionend="undefined"
                                         data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined"
                                         data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined"
                                         data-oheight="undefined">
                                        <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover"
                                             data-bgposition="center center" data-bgrepeat="no-repeat"
                                             data-lazydone="undefined" src="image/slide/{{$sl->image}}"
                                             data-src="image/slide/{{$sl->image}}"
                                             style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('image/slide/{{$sl->image}}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="tp-bannertimer"></div>
            </div>
        </div>
        <!--slider-->
    </div>
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>New Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">{{count($product_new)}} styles found</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach($product_new as $prn)
                                    @if($prn->new == 1 )
                                        <div class="col-sm-3">
                                            <div class="single-item">
                                                @if($prn->promotion_price != 0)
                                                    <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                                @endif
                                                <div class="single-item-header">
                                                    <a href="product/{{$prn->id}}"><img height="250px"
                                                                                              src="image/product/{{$prn->image}}"
                                                                                              alt=""></a>
                                                </div>
                                                <div class="single-item-body">
                                                    <p class="single-item-title">{{$prn->name}}</p>
                                                    <p class="single-item-price">
                                                        @if($prn->promotion_price != 0)
                                                            <span class="flash-del">{{$prn->unit_price}}</span>
                                                            <span class="flash-sale">{{$prn->promotion_price}}</span>
                                                        @else
                                                            <span class="flash-del">{{$prn->unit_price}}</span>
                                                        @endif
                                                    </p>
                                                </div>
                                                <div class="single-item-caption">
                                                    <a class="add-to-cart pull-left" href="session-cart/{{$prn->id}}"><i
                                                                class="fa fa-shopping-cart"></i></a>
                                                    <a class="beta-btn primary" href="product/{{$prn->id}}">Details <i
                                                                class="fa fa-chevron-right"></i></a>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div> <!-- .beta-products-list -->
                        <div>
                            {{$product_new->links()}}
                        </div>
                        <div class="space50">&nbsp;</div>
                        <div class="beta-products-list">
                            <h4>Top Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">438 styles found</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach($product_all as $pra)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            @if($pra->promotion_price != 0)
                                                <div class="ribbon-wrapper"><div class="ribbon sale">Sale</div></div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="product/{{$pra->id}}"><img height="250px"
                                                                            src="image/product/{{$pra->image}}"
                                                                            alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{$pra->name}}</p>
                                                <p class="single-item-price">
                                                    @if($pra->promotion_price != 0)
                                                        <span class="flash-del">{{$pra->unit_price}}</span>
                                                        <span class="flash-sale">{{$pra->promotion_price}}</span>
                                                    @else
                                                        <span class="flash-del">{{$pra->unit_price}}</span>
                                                    @endif
                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="session-cart/{{$pra->id}}"><i
                                                            class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="product/{{$pra->id}}">Details <i
                                                            class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="space40">&nbsp;</div>
                            <div>
                                {{$product_all->links()}}
                            </div>
                        </div> <!-- .beta-products-list -->

                    </div>
                </div> <!-- end section with sidebar and main content -->


            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection