<div class="container-fluid newest-container">
    <div class="container">
        <div class="row">
            <div class="header">
                <!-- <span class="pull-left">{{ trans('main.newest_courses') }}</span> -->
                <!-- <br><br><br> -->
                <!-- <div class="link"><h2>{{ trans('main.promotion_plans') }}</h2></div> -->
                <!-- <a href="/category?order=new" class="more-link pull-right">{{ trans('main.load_more') }}</a> -->
            </div>
            <div class="body body-s-r" dir="ltr">
                <!-- <span class="nav-right"></span> -->
                <!-- <div class="owl-carousel"> -->
               
                <div class="row card1">
               
               <div class="col-md-3 plan-box tab-con">
                                    <div class="price-section">Free 50 Questions</div>
                                    <div class="plan-box-section plan-box-section-s">Get Free Access to Simulator</div>
                                    <div class="plan-box-section plan-box-section-r">Price $149</div>
                                    <div class="plan-box-section"><a href="/example1" class="btn btn-custom">Get Access</a></div>
                             
                </div> 
                <div class="col-md-4 plan-box tab-con">
                                    <div class="price-section">Full Feature</div>
                                    <div class="plan-box-section plan-box-section-s">Feature</div>
                                    <!-- <div class="plan-box-section plan-box-section-r">Begin Exam</div> -->
                                    <!-- <div class="plan-box-section"><a href="/example1" class="btn btn-custom">Begin Exam</a></div> -->
                                    <div class="plan-box-section"><a href="/product/12" class="btn btn-custom"><b>Purchase<b></a></div>
                             
                </div>
                {{-- <div class="col-md-3 plan-box tab-con">
                                    <div class="price-section">Simulator</div>
                                    <div class="plan-box-section plan-box-section-s">Simulator with 1000 Questions</div>
                                    <div class="plan-box-section plan-box-section-r">Price $200</div>
                                    <div class="plan-box-section"><a href="/example1" class="btn btn-custom">{{ trans('main.purchase_plan') }}</a></div>
                             
                </div> --}}
                </div>
                
                    <!-- @foreach($new_content as $new)
                        <?php $meta = arrayToList($new->metas, 'option', 'value'); ?>
                        <div class="owl-car-s" dir="rtl">
                            <a href="/product/{{ $new->id }}" title="{{ $new->title }}" class="content-box">
                                <img src="{{ !empty($meta['thumbnail']) ? $meta['thumbnail'] : '' }}"/>
                                <h3>{!! truncate($new->title,30) !!}</h3>
                                <div class="footer">
                                    @if(isset($new->user))
                                    <span class="avatar" title="{{ $new->user->name }}" onclick="window.location.href = '/profile/{{ $new->user->id }}'">
                                        <img src="{{ get_user_meta($new->user_id,'avatar',get_option('default_user_avatar','')) }}"/>
                                    </span>
                                    @endif
                                    <label class="pull-right content-clock">{!! contentDuration($new->id) !!}</label>
                                    <span class="boxicon mdi mdi-clock pull-right"></span>
                                    <span class="boxicon mdi mdi-wallet pull-left"></span>
                                    <label class="pull-left">
                                        @if(isset($meta['price']) && $meta['price']>0)
                                            {{currencySign()}}{{ price($new->id,$new->category_id,$meta['price'])['price'] }}
                                        @else
                                            {{ trans('main.free') }}
                                        @endif
                                    </label>
                                </div>
                            </a>
                        </div>
                    @endforeach -->
                <!-- </div> -->
                <!-- <span class="nav-left pull-right"></span> -->
            </div>
        </div>
    </div>
</div>
