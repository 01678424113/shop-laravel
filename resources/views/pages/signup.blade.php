@extends('layout.index')
@section('content')
    <div class="inner-header">
        <div class="container">
            @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
            @endif
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors as $err)
                        {{$err}}
                    @endforeach
                </div>
            @endif
            <div class="pull-left">
                <h6 class="inner-title">Đăng kí</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb">
                    <a href="/">Home</a> / <span>Đăng kí</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">

            <form action="signup" method="post" class="beta-form-checkout">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6">
                        <h4>Đăng kí</h4>
                        <div class="space20">&nbsp;</div>


                        <div class="form-block">
                            <label for="email">Email address*</label>
                            <input type="email" name="email" id="email" required>
                        </div>

                        <div class="form-block">
                            <label for="your_last_name">Full name*</label>
                            <input type="text" name="full_name" id="your_last_name" required>
                        </div>

                        <div class="form-block">
                            <label for="adress">Address*</label>
                            <input type="text" id="adress" name="address" value="Street Address" required>
                        </div>


                        <div class="form-block">
                            <label for="phone">Phone*</label>
                            <input type="text" id="phone" name="phone" required>
                        </div>
                        <div class="form-block">
                            <label for="phone">Password*</label>
                            <input type="password" id="phone" name="password" required>
                        </div>
                        <div class="form-block">
                            <label for="phone">Password Again*</label>
                            <input type="password" id="phone" name="passwordAgain" required>
                        </div>
                        <div class="form-block">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
@section('script')
    <script type="text/javascript">
        $(function () {
            // this will get the full URL at the address bar
            var url = window.location.href;

            // passes on every "a" tag
            $(".main-menu a").each(function () {
                // checks if its the same on the address bar
                if (url == (this.href)) {
                    $(this).closest("li").addClass("active");
                    $(this).parents('li').addClass('parent-active');
                }
            });
        });


    </script>
    <script>
        jQuery(document).ready(function ($) {
            'use strict';

// color box

//color
            jQuery('#style-selector').animate({
                left: '-213px'
            });

            jQuery('#style-selector a.close').click(function (e) {
                e.preventDefault();
                var div = jQuery('#style-selector');
                if (div.css('left') === '-213px') {
                    jQuery('#style-selector').animate({
                        left: '0'
                    });
                    jQuery(this).removeClass('icon-angle-left');
                    jQuery(this).addClass('icon-angle-right');
                } else {
                    jQuery('#style-selector').animate({
                        left: '-213px'
                    });
                    jQuery(this).removeClass('icon-angle-right');
                    jQuery(this).addClass('icon-angle-left');
                }
            });
        });
    </script>
@endsection