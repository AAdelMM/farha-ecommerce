@extends('layouts.main')

@section('content')
<div class="breadcrumb-option">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcrumb__links">
					<a href="./index.html"><i class="fa fa-home"></i> @lang('messages.home')</a>
					<span>@lang('messages.contact')</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Contact Section Begin -->
<section class="contact spad">
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="contact__content">
					<div class="contact__address">
						<h5>Contact info</h5>
						<ul>
							<li>
								<h6><i class="fa fa-map-marker"></i> Address</h6>
								<p>54v fv </p>
							</li>
							<li>
								<h6><i class="fa fa-phone"></i> Phone</h6>
								<p><span>123-456-789</span><span>123-456-789</span></p>
							</li>
							<li>
								<h6><i class="fa fa-headphones"></i> Support</h6>
								<p>info@farha.com</p>
							</li>
						</ul>
					</div>
					
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="contact__form">
					<h5>SEND MESSAGE</h5>
					<form name="sentMessage" id="form" novalidate="novalidate" action="{{url('/')}}/form-submit" method="post">
						@csrf
						  <div class="sb-group-input">
							<label>@lang('messages.name')</label>
						  <input type="text" name="name" required placeholder="@lang('messages.name')">
						  <p class="help-block text-danger"></p>
						</div>
						<div class="sb-group-input">
							<label>@lang('messages.email')</label>
						  <input type="email" name="email" required placeholder="@lang('messages.email')">
						  <p class="help-block text-danger"></p>
						</div>
						<input type="hidden" name="subject" value="website"/>
						<div class="sb-group-input">
							<label>@lang('messages.message')</label>
						  <textarea name="text" required placeholder="@lang('messages.message')"></textarea>
						  <p class="help-block text-danger"></p>
						</div>
						<!-- button -->
						<button class="sb-btn sb-cf-submit sb-show-success btn btn-primary" id="sendMessageButton">
							@lang('messages.sendmessage')
						</button>
						<!-- button end -->
					  </form>
					  {{-- <div class="sb-success-result">
						<img src="{{url('/')}}/img/ui/success.jpg" alt="success" class="sb-mb-15">
						<div class="sb-success-title sb-mb-15">Success!</div>
						@if (App::currentLocale() == 'en')
						<p class="sb-text sb-mb-15">Your message has been sent <br>successfully</p>
						@else
						<p class="sb-text sb-mb-15">تم ارسال الرسالة بنجاح</p>
						@endif
						<!-- button -->
						<a href="{{url('/')}}" class="sb-btn sb-btn-2">
						  <span class="sb-icon">
							<img src="{{url('/')}}/img/ui/icons/arrow-2.svg" alt="icon">
						  </span>
						  @if (App::currentLocale() == 'en')
						  <span>Back to home</span>
						  @else
						  <span>الرجوع للرئيسية</span>
						  @endif
						</a>
						<!-- button end -->
					  </div> --}}
				</div>
			</div>
			{{-- <div class="col-lg-6 col-md-6">
				<div class="contact__map">
					<iframe
					src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d48158.305462977965!2d-74.13283844036356!3d41.02757295168286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2e440473470d7%3A0xcaf503ca2ee57958!2sSaddle%20River%2C%20NJ%2007458%2C%20USA!5e0!3m2!1sen!2sbd!4v1575917275626!5m2!1sen!2sbd"
					height="780" style="border:0" allowfullscreen="">
				</iframe>
			</div>
		</div> --}}
	</div>
</div>
</section>
<!-- Contact Section End -->
    @endsection

