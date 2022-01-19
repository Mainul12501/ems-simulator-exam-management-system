<div class="{{ (empty($answer) or (!empty($loop) and $loop->iteration == 1)) ? 'main-row-answer' : '' }} answer-box ans-b">
    <div class="col-md-12 answer-card">
        <div class="form-group">
            <label class="control-label tab-con">{{ trans('main.answer') }}</label>
            <button type="button" class="mrb12 btn btn-xs remove-btn btn-danger pull-right {{ !empty($answer) ? 'show' : '' }}"><i class="mdi mdi-close"></i></button>

            <input type="text" name="answers[{{ (empty($answer) or (!empty($loop) and $loop->iteration == 1)) ? 'record' : $answer->id }}][title]" value="{{ !empty($answer) ? $answer->title : '' }}" placeholder="{{ trans('main.add_answer') }}" class="form-control">

            <div class="help-block"></div>
        </div>
        <div class="row">
            <!-- <div class="col-md-8 pull-left">
                <div class="form-group">
                    <label class="control-label">{{ trans('main.images') }}</label>
                    <div class="dflx">
                        <button type="button" data-input="answer_image" data-preview="holder" class="lfm-btn btn btn-primary">
                            Choose
                        </button>
                        <input name="answers[{{ (empty($answer) or (!empty($loop) and $loop->iteration == 1)) ? 'record' : $answer->id }}][image]" value="{{ !empty($answer) ? $answer->image : '' }}" id="answer_image" class="form-control lfm-input" dir="ltr" type="text">
                    </div>
                </div>
            </div> -->


            <div class="col-md-4 pull-left">
                <div class="form-group">
                    <!-- <label class="control-label tab-con" style="margin-right: 10px; margin-top: 3px">{{ trans('main.correct') }}</label> -->
                    <input type="checkbox" name="to">
{{--                    <div class="switch switch-sm switch-primary swch">--}}
{{--                        <input type="hidden" class="correct-toggle" value="0" name="answers[{{ (empty($answer) or (!empty($loop) and $loop->iteration == 1)) ? 'record' : $answer->id }}][correct]">--}}
{{--                        <input type="checkbox" class="correct-toggle" name="answers[{{ (empty($answer) or (!empty($loop) and $loop->iteration == 1)) ? 'record' : $answer->id }}][correct]" @if(!empty($answer) and $answer->correct) checked @endif value="1" data-plugin-ios-switch />--}}
{{--                    </div>--}}
                    <div class="" >
                        <!-- <input type="radio" class="" name="answers[{{ (empty($answer) or (!empty($loop) and $loop->iteration == 1)) ? 'record' : $answer->id }}][correct]" value="1" @if(!empty($answer) and $answer->correct) checked @endif> <span class="" style="font-size: 16px">Correct</span>
                        <input type="radio" class="" name="answers[{{ (empty($answer) or (!empty($loop) and $loop->iteration == 1)) ? 'record' : $answer->id }}][correct]" value="0" @if(!empty($answer) and !$answer->correct) checked @endif> <span class="" style="font-size: 16px">Incorrect</span> -->
                        <input type="radio" class="" name="answers[{{ (empty($answer) or (!empty($loop) and $loop->iteration == 1)) ? 'record' : $answer->id }}][correct]" value="1" @if(!empty($answer) and $answer->correct) checked @endif> <span class="" style="font-size: 16px">Correct</span>
                        <input type="radio" class="" name="answers[{{ (empty($answer) or (!empty($loop) and $loop->iteration == 1)) ? 'record' : $answer->id }}][correct]" value="0" {{ !empty($answer) ? '' : 'checked' }} @if(!empty($answer) and !$answer->correct) checked @endif> <span class="" style="font-size: 16px">Incorrect</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{--switchery js--}}
{{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.css" integrity="sha512-uyGg6dZr3cE1PxtKOCGqKGTiZybe5iSq3LsqOolABqAWlIRLo/HKyrMMD8drX+gls3twJdpYX0gDKEdtf2dpmw==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/switchery/0.8.2/switchery.min.js" integrity="sha512-lC8vSUSlXWqh7A/F+EUS3l77bdlj+rGMN4NB5XFAHnTR3jQtg4ibZccWpuSSIdPoPUlUxtnGktLyrWcDhG8RvA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>--}}
