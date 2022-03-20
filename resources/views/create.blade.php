@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3 class="float-start">{{ __('Add Employee') }}</h3> <a class="float-end" href="{{route("home")}}"><button class="btn btn-default">Back</button></a></div>

                    <div class="card-body">
                        <form method="post" action="{{route("create")}}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Enter full name of employee" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Enter email id of employee">

                                    @error('email')
                                    <span class="invalid-feedback email" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>

                                <div class="col-md-6">

                                    <select id="gender" type="text" class="form-control @error('gender') is-invalid @enderror" name="gender" required>
                                        <option value="">Select employee's gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>

                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="contact" class="col-md-4 col-form-label text-md-right">{{ __('Contact') }}</label>

                                <div class="col-md-6">
                                    <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}"  pattern="[0-9]{10}" placeholder="Enter contact number of employee" required>

                                    @error('contact')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>

                                <div class="col-md-6">
                                    <textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Enter full address of employee" required>{{ old('address') }}</textarea>
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="photo" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                                <div class="col-md-6">
                                    <input id="photo" type="file" class="form-control @error('photo') is-invalid @enderror" accept="image/*" name="photo" value="{{ old('photo') }}" required>

                                    @error('photo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="j_date" class="col-md-4 col-form-label text-md-right">{{ __('Joining Date') }}</label>

                                <div class="col-md-6">
                                    <input id="j_date" type="date" class="form-control @error('j_date') is-invalid @enderror" name="j_date" value="{{ old('j_date') }}" required>

                                    @error('j_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date of Birth') }}</label>

                                <div class="col-md-6">
                                    <input id="dob" type="date" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required>

                                    @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="department" class="col-md-4 col-form-label text-md-right">{{ __('Department') }}</label>

                                <div class="col-md-6">
                                    <select id="department" type="text" class="form-control @error('department') is-invalid @enderror" name="department" required>
                                        <option value="">Select employee's department level</option>
                                        @foreach($departments as $department)
                                            <option value="{{$department->id}}">{{$department->depart_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="education" class="col-md-4 col-form-label text-md-right">{{ __('Education') }}</label>

                                <div class="col-md-6">
                                    <select id="education" type="text" class="form-control @error('education') is-invalid @enderror" name="education" required>
                                        <option value="">Select employee's education level</option>
                                        @foreach($educations as $education)
                                            <option value="{{$education->id}}">{{$education->edu_name}}</option>
                                        @endforeach
                                    </select>

                                    @error('education')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="exp" class="col-md-4 col-form-label text-md-right">{{ __('Experience') }}</label>

                                <div class="col-md-6">
                                    <input id="exp" type="text" class="form-control @error('exp') is-invalid @enderror" name="exp" value="{{ old('exp') }}" pattern="[0-9.]{1,3}" placeholder="Enter employee's experience" required>

                                    @error('exp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-3">
                                <label for="hobby" class="col-md-4 col-form-label text-md-right">{{ __('Hobby') }}</label>

                                <div class="col-md-6">
                                    <select id="hobby" type="text" class="form-control @error('hobby') is-invalid @enderror" name="hobby" required>
                                        <option value="">Select employee's hobby</option>
                                        @foreach($hobbies as $hobby)
                                            <option value="{{$hobby->id}}">{{$hobby->hobby_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('hobby')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push("scriptBottom")
    <script>
        $(document).ready(function() {
            var startTimer;
            $('#email').on('keyup', function () {
                clearTimeout(startTimer);
                let email = $(this).val();
                startTimer = setTimeout(checkEmail, 500, email);
            });

            $('#email').on('keydown', function () {
                clearTimeout(startTimer);
            });

            function checkEmail(email) {
                $('#email-error').remove();
                if (email.length > 1) {
                    $.ajax({
                        type: 'post',
                        url: "{{ route('checkEmail') }}",
                        data: {
                            email: email,
                            _token: "{{ csrf_token() }}"
                        },
                        success: function(data) {
                            if (data.success == false) {
                                $('#email').after('<div id="email-error" class="text-danger" <strong>'+data.message[0]+'<strong></div>');
                            } else {
                                $('.email').hide();
                                $('[name="email"]').removeClass("is-invalid");
                                $('#email').after('<div id="email-error" class="text-success" <strong>'+data.message+'<strong></div>');
                            }
                        }
                    });
                } else {
                    $('#email').after('<div id="email-error" class="text-danger" <strong>Email address can not be empty.<strong></div>');
                }
            }
        });
    </script
@endpush
