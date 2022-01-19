@extends($user['vendor'] == 1 ? getTemplate() . '.user.layout.videolayout' : getTemplate() . '.user.layout_user.quizzes')

@if($user['vendor'] == 1)
    @section('tab3','active')
@else
    @section('tab1','active')
@endif

@section('tab')
    @if($user->vendor)
        <div class="row">
            <div class="accordion-off col-xs-12">
                <ul id="accordion" class="accordion off-filters-li">
                    <li class="open">
                         <div class="link">
                            <h2>{{ !empty($quiz) ? trans('main.edit_quizzes') : trans('main.create_new_quizzes') }}</h2>
                            <i class="mdi mdi-chevron-down"></i>
                        </div>
                        <ul class="submenu submenud">
                            <div class="h-10"></div>
                            <form action="/user/quizzes/{{ !empty($quiz) ? 'update/'.$quiz->id : 'store' }}" method="post" class="form">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-6 pull-left">
                                        <div class="form-group @error('name') has-error @enderror">
                                            <label class="control-label tab-con">{{ trans('main.quiz_name') }}</label>
                                            <input type="text" name="name" value="{{ !empty($quiz) ? $quiz->name : old('name') }}" class="form-control">
                                            <div class="help-block">@error('name') {{ $message }} @enderror</div>
                                        </div>
                                    </div>

                                    <div class="col-md-6 pull-left">
                                        <div class="form-group @error('content_id') has-error @enderror">
                                            <label class="control-label tab-con">{{ trans('main.course') }}</label>
                                            <select name="content_id" class="form-control font-s">
                                                <option selected disabled>{{ trans('main.select_course') }}</option>
                                                @foreach($user->contents as $content)
                                                    <option value="{{ $content->id }}" {{ (!empty($quiz) and $quiz->content_id == $content->id) ? 'selected' : '' }}>{{ $content->title }}</option>
                                                @endforeach
                                            </select>
                                            <div class="help-block">@error('content_id') {{ $message }} @enderror</div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 pull-left">
                                        <div class="form-group">
                                            <label class="control-label tab-con">{{ trans('main.quiz_time') }} ({{ trans('main.minute') }})</label>
                                            <input type="number" name="time" value="{{ !empty($quiz) ? $quiz->time : old('time') }}" placeholder="Empty means infinity" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-md-6 pull-left">
                                        <div class="form-group">
                                            <label class="control-label tab-con">{{ trans('main.quiz_number_attempt') }}</label>
                                            <input type="number" name="attempt" value="{{ !empty($quiz) ? $quiz->attempt : old('attempt') }}" placeholder="Empty means infinity" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6 pull-left">
                                        <div class="form-group @error('pass_mark') has-error @enderror">
                                            <label class="control-label tab-con">{{ trans('main.quiz_pass_mark') }}</label>
                                            <input type="number" name="pass_mark" value="{{ !empty($quiz) ? $quiz->pass_mark : old('pass_mark') }}" class="form-control">
                                            <div class="help-block">@error('pass_mark') {{ $message }} @enderror</div>
                                        </div>
                                    </div>

                                    <!-- <div class="col-md-6 pull-left">
                                        <div class="form-group">
                                            <label class="control-label tab-con">{{ trans('main.certificate') }}</label>
                                            <div class="switch switch-sm switch-primary swch">
                                                <input type="hidden" value="0" name="certificate">
                                                <input type="checkbox" name="certificate" value="1" data-plugin-ios-switch {{ (!empty($quiz) and $quiz->certificate) ? 'checked' : '' }} />
                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- new edited start -->
                                <div class="col-md-6 pull-left mb-4">
                                    <label class="control-label tab-con">Mega Quiz</label>
                                    <div style="margin-left: 10px">
                                        <input type="radio" name="mega_quiz" value="0" {{ (!empty($quiz) and $quiz->mega_quiz == 0) ? 'checked' : 'checked' }}> No
                                        <input type="radio" name="mega_quiz" value="1"  {{ (!empty($quiz) and $quiz->mega_quiz == 1) ? 'checked' : '' }}> Yes
                                    </div>
                                </div>
 <!-- new edited end  -->

                                </div>

{{--                                free and mock start 4-1-22--}}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group" style="font-size: 15px;">
                                            <label for="" class="col-form-label">Is For Free Students</label>
                                            <label for=""><input type="radio" name="is_free_quize" value="0" {{ (!empty($quiz) and $quiz->is_free_quize == 0) ? 'checked' : '' }} class="align-content-end" checked/> No</label>
                                            <label for=""><input type="radio" name="is_free_quize" value="1" {{ (!empty($quiz) and $quiz->is_free_quize == 1) ? 'checked' : '' }} class="align-content-end" /> Yes</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6 pull-left">
                                        <div class="form-group">
                                            <label class="control-label tab-con">Is Mock Test</label>
                                            <select name="mock_status" class="form-control font-s">
                                                <option value="0" {{ (!empty($quiz) and $quiz->mock_status == 0) ? 'selected' : '' }} selected>Not for Mock Test</option>
                                                <option value="1" {{ (!empty($quiz) and $quiz->mock_status == 1) ? 'selected' : '' }} >Mock Test One</option>
                                                <option value="2" {{ (!empty($quiz) and $quiz->mock_status == 2) ? 'selected' : '' }} >Mock Test Two</option>
                                                <option value="3" {{ (!empty($quiz) and $quiz->mock_status == 3) ? 'selected' : '' }} >Mock Test Three</option>
                                                <option value="4" {{ (!empty($quiz) and $quiz->mock_status == 4) ? 'selected' : '' }} >Mock Test Four</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
{{--                                free and mock ends 4-1-22--}}

                                <div class="row">
                                    <div class="col-md-6 pull-left">
                                        <div class="form-group">
                                            <label class="control-label tab-con">{{ trans('main.status') }}</label>
                                            <select name="status" class="form-control font-s">
                                                <option value="disabled" {{ (!empty($quiz) and $quiz->status == 'disabled') ? 'selected' : '' }}>{{ trans('main.disabled') }}</option>
                                                <option value="active" {{ (!empty($quiz) and $quiz->status == 'active') ? 'selected' : '' }}>{{ trans('main.active') }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    <?php
                                        $roles  = \App\Models\StudentRole::all();
                                    ?>
                                    <style>
                                        .off-filters-li li {
                                            list-style: none!important;
                                             width: auto!important;
                                        }
                                    </style>
                                    <div class="col-md-6 pull-left">
                                        <div class="form-group" style="margin-bottom: 10px">
                                            <label for="student_type" class="control-label tab-con">Student Type</label>
                                            <span>
                                                @if(isset($studentRoles))
                                                    @foreach($studentRoles as $studentRole)

                                                        {{ $studentRole->student->display_name.', ' }}

                                                    @endforeach
                                                @endif
                                            </span>
                                            <div>
                                                <select name="student_type[]" id="" style="width: 100%" class="form-control w-100 student-role" multiple>
                                                    @foreach($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-custom mrt20">
                                                <span>{{ trans('main.save_changes') }}</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            <div class="h-10"></div>
                        </ul>
                    </li>

                    @if (empty($quiz))
                        <li class="open">
                            <div class="link"><h2>{{ trans('main.quizzes_list') }}</h2><i class="mdi mdi-chevron-down"></i></div>
                            <ul class="submenu dblock">
                                <div class="h-10"></div>
                                {{--count($lists)--}}
                                @if(empty($quizzes))
                                    <div class="text-center">
                                        <img src="/assets/default/images/empty/Request.png">
                                        <div class="h-20"></div>
                                        <span class="empty-first-line">{{ trans('main.no_quizzes') }}</span>
                                        <div class="h-10"></div>

                                        <div class="h-20"></div>
                                    </div>
                                @else
                                    <div class="table-responsive">
                                        <table class="table ucp-table" id="request-table">
                                            <thead class="thead-s">
                                            <th class="text-center">{{ trans('main.name') }}</th>
                                            <th class="text-center">{{ trans('main.students') }}</th>
                                            <th class="text-center">{{ trans('main.questions') }}</th>
                                            {{-- <th class="text-center">{{ trans('main.average_grade') }}</th>  --}}
                                            <!-- <th class="text-center">{{ trans('main.review_needs') }}</th> -->
                                            <th class="text-center">{{ trans('main.status') }}</th>
                                            <th class="text-center">Mega Quiz</th>
                                            <th class="text-center" width="100">{{ trans('main.controls') }}</th>
                                            </thead>
                                            <tbody>
                                            @foreach ($quizzes as $quiz)
                                                <tr>
                                                    <td class="text-center">
                                                        {{ $quiz->name }}
                                                        <small class="dblock">({{ $quiz->content->title }})</small>
                                                    </td>
                                                    <td class="text-center">{{ count($quiz->QuizResults) }}</td>
                                                    <!-- <td class="text-center">{{ count($quiz->questions) }}</td> -->
                                                    <!-- <td class="text-center"> {{ count($quiz->mega_quiz == 1 ? $quiz->megaQuiz : $quiz->questions) }}</td> -->
                                                    <td class="text-center"> {{ $quiz->mega_quiz == 1 ? count(\App\Models\MegaQuiz::all()) : count($quiz->questions) }}</td>
                                                    {{-- <td class="text-center">{{ $quiz->average_grade }}</td>  --}}
                                                     <!-- <td class="text-center">{{ $quiz->review_needs }}</td> -->
                                                    <td class="text-center">
                                                        @if($quiz->status == 'active')
                                                            <b class="c-g">{{ trans('admin.active') }}</b>
                                                        @else
                                                            <span class="c-r">{{ trans('admin.disabled') }}</span>
                                                        @endif
                                                    </td>
                                                    <td class="text-center">{{ $quiz->mega_quiz == 1 ? 'Yes' : 'No' }}</td>
                                                    <td class="text-center" width="250">
                                                        <a href="/user/quizzes/edit/{{ $quiz->id }}" class="gray-s" data-toggle="tooltip" title="{{ trans('main.edit_quizzes') }}"><span class="crticon mdi mdi-lead-pencil"></span></a>
                                                        <a href="/user/quizzes/{{ $quiz->id }}/questions" class="gray-s" data-toggle="tooltip" title="{{ trans('main.questions') }}">
                                                            <span class="crticon mdi mdi-account-question"></span>
                                                        </a>
                                                        <a href="/user/quizzes/{{ $quiz->id }}/results" class="gray-s" data-toggle="tooltip" title="{{ trans('main.show_results') }}">
                                                             <span class="crticon mdi mdi-eye"></span>
                                                        </a>
                                                        <button data-id="{{ $quiz->id }}" class="gray-s btn-transparent btn-delete-quiz" data-toggle="tooltip" title="{{ trans('main.delete') }}"><span class="crticon mdi mdi-delete-forever"></span></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="h-10"></div>
                                @endif
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    @else
        <div class="row">
            <div class="h-20"></div>
            <div class="off-filters-li p-15">
                <div class="table-responsive">
                    <table class="table ucp-table" id="request-table">
                        <thead class="thead-s">
                        <th class="cell-ta">{{ trans('main.name') }}</th>
                        <th class="text-center">{{ trans('main.questions') }}</th>
                        {{-- <th class="text-center">{{ trans('main.course') }}</th> --}}
                        <th class="text-center">{{ trans('main.quiz_grade') }}</th>
                        <!-- <th class="text-center">{{ trans('main.you_grade') }}</th> -->
                        {{-- <th class="text-center">{{ trans('main.quiz_number_attempt') }}</th> --}}
                        <th class="text-center">{{ trans('main.quiz_time') }} (min)</th>
                        <th class="text-center">Your Last Exam grade</th>
                        {{-- <th class="text-center">{{ trans('main.time_and_date') }}</th> --}}
                        <th class="text-center">{{ trans('main.status') }}</th>
                        <th class="text-center">{{ trans('main.controls') }}</th>
                        </thead>
{{--                        get times--}}
                        <?php
                        $getValidity    = \App\Models\StudentRole::where('id', \Illuminate\Support\Facades\Auth::user()->student_role_id)->first();
                        $currentDate    = \Carbon\Carbon::now()->toDateTimeString();
                        $expireDate =  \Carbon\Carbon::parse(\Illuminate\Support\Facades\Auth::user()->created_at)->addDays($getValidity->validity)->toDateTimeString();

                        ?>
                        <tbody>
                        @foreach ($quizzes as $quiz)
                            <tr>
                                <td class="text-center">
                                    {{ $quiz->name }}
                                </td>
                                <!-- <td class="text-center"> {{ count($quiz->mega_quiz == 1 ? $quiz->megaQuiz : $quiz->questions) }}</td> -->
                                {{-- <td class="text-center">{{ $quiz->content->title }}</td> --}}
                                @if($quiz->mega_quiz == 1)
                                    <?php
                                        $quizeQuestions = \App\Models\MegaQuiz::all();
                                        $megaCount  = count($quizeQuestions);
                                        $grade  = 0;
                                        foreach ($quizeQuestions as $quize)
                                            {
                                                $grade  = $grade+$quize->grade;
                                            }
                                    ?>
                                    <td class="text-center"> {{ $megaCount }}</td>
                                    <td class="text-center">{{ $grade }}</td>
                                @else
                                    <td class="text-center">{{ (count($quiz->questionsGradeSum) > 0) ? $quiz->questionsGradeSum[0]->grade_sum : 0 }}</td>
                                @endif
                                <!-- <td class="text-center">{{ (!empty($quiz->result) and isset($quiz->result)) ? $quiz->result->user_grade : 'No grade' }}</td> -->

                                {{-- <td class="text-center">{{ $quiz->attempt - $quiz->result_count }}</td> --}}
                                <td class="text-center">{{ $quiz->time }}</td>
                                <td class="text-center">{{ (!empty($quiz->result) and isset($quiz->result)) ? $quiz->result->user_grade : 'No grade' }}</td>
                                {{-- <td class="text-center">{{ date('Y-m-d | H:i', $quiz->created_at) }}</td> --}}
                                <td class="text-center">
                                    @if (!empty($quiz->result) and isset($quiz->result))
                                        @if ($quiz->result->status == 'pass')
                                            <span class="badge badge-success">{{ trans('main.passed') }}</span>
                                        @else
                                            <!-- <span class="badge badge-warning">{{ trans('main.waiting') }}</span> -->
                                            <span class="badge badge-danger">Failed</span>
                                        @endif
                                    @else
                                        <span class="badge badge-warning">{{ trans('main.no_term') }}</span>

                                    @endif
                                </td>
                                <td class="text-center">
                                    <!-- <a href="{{ ($quiz->can_try) ? '/user/quizzes/'. $quiz->id .'/start' : ''}}" target="_blank" {{ (!$quiz->can_try) ? 'disabled="disabled"' : '' }} class="btn btn-success btn-round">{{ trans('main.start') }}</a> -->
                                    <!-- <a href="{{ ($quiz->can_try) ? '/user/quizzes/'. $quiz->id .'/start' : ''}}" target="_blank" {{ (!$quiz->can_try) ? 'enabled="enabled"' : '' }} class="btn btn-success btn-round">{{ trans('main.start') }}</a> -->
                                    @if(!$quiz->mega_quiz == 1)
                                        @if($currentDate > $expireDate)
                                        <a href="{{ ($quiz->can_try) ? '/user/quizzes/'. $quiz->id .'/start' : ''}}" target="_blank"  onclick="alertMsg()" class="btn btn-success btn-round">{{ trans('main.start') }}</a>
                                            @else
                                        <a href="{{ ($quiz->can_try) ? '/user/quizzes/'. $quiz->id .'/start' : ''}}" target="_blank" {{ (!$quiz->can_try) ? 'disabled="disabled"' : '' }} class="btn btn-success btn-round">{{ trans('main.start') }}</a>
                                            @endif
                                    <!-- <a href="{{ ($quiz->can_try) ? '/user/quizzes/'. $quiz->id .'/start' : ''}}" target="_blank" {{ (!$quiz->can_try) ? 'enabled="enabled"' : '' }} class="btn btn-success btn-round">{{ trans('main.start') }}</a> -->
                                    @else
                                            @if($currentDate > $expireDate)
{{--                                                free and mock start 4-1-22--}}
                                        <a href="/user/simulator" target="_blank" onclick="" class="btn btn-success btn-round">{{ trans('main.start') }}</a>
{{--                                                free and mock end 4-1-22--}}
                                            @else
                                        <a href="/user/simulator" target="_blank" class="btn btn-success btn-round">{{ trans('main.start') }}</a>
                                        @endif
                                    @endif
                                    @if (!empty($quiz->result) and isset($quiz->result))
                                        {{-- @if ($quiz->result->status == 'pass')
                                        <a href="{{'/user/simulator/answer'}}"  class="btn btn-primary btn-round">Review</a><br><br>
                                        @endif --}}
                                        @endif
                                        <!-- <a href="{{'/user/simulator'}}"  class="btn btn-success btn-round">{{ trans('main.start') }}</a> -->
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endif

    <div id="quizzesDelete" class="modal fade" role="dialog">
        <div class="modal-dialog zinun">
            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <h3>{{ trans('main.delete') }}</h3>
                </div>
                <div class="modal-body modst">
                    <p>{{ trans('main.quiz_delete_alert') }}</p>
                    <div>
                        <a href="" class=" btn btn-danger delete">
                            {{ trans('main.yes_sure') }}
                        </a>
                        <button type="button" data-dismiss="modal" class="btn btn-info">{{ trans('main.cancel') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function alertMsg(e){
            event.preventDefault();
            toastr.error('please upgrade your account.');
        }
    </script>
    <script>
        "use strict";
        $('body').on('click', '.btn-delete-quiz', function (e) {
            e.preventDefault();
            var quiz_id = $(this).attr('data-id');
            $('#quizzesDelete').modal('show');
            $('#quizzesDelete').find('.delete').attr('href', '/user/quizzes/delete/' + quiz_id);
        })
    </script>

{{--    select 2 js--}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(function (){
            $('.student-role').select2({
                theme: "classic",
                placeholder: "Select a type"
            });
        })
    </script>
    @if(isset($types))
        <script>
            $(function (){
                $('.student-role').val({!! json_encode($types) !!}).trigger('change');
            })
        </script>
    @endif
@endsection

