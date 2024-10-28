<x-guest-layout>


    <div class="loginform">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-7 mt-5">
                    <form action="{{ route('register') }}" method="post">
                        @csrf
                        <div class="card card-body">
                            <h4 class="text-center">REGISTER</h4>

                            <div class="row mt-4">
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="">First Name</label>
                                        <input type="text" onkeyup="checkCapital('first_name')" class="form-control firstname" name="first_name" value="{{ old('first_name') }}">
                                        <p class="text-danger"><small>{{ $errors->first('first_name') }}</small></p>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="">Last Name</label>
                                        <input type="text" onkeyup="checkCapital('last_name')" class="form-control lastname" name="last_name" value="{{ old('last_name') }}">
                                        <p class="text-danger"><small>{{ $errors->first('last_name') }}</small></p>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
                                        <p class="text-danger"><small>{{ $errors->first('email') }}</small></p>
                                    </div>
                                </div>
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label for="">Phone Number</label>
                                        <input type="text" class="form-control" name="phone" value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="password">
                                        <p class="text-danger"><small>{{ $errors->first('password') }}</small></p>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group">
                                        <label for="">Date of Birth</label>
                                        <input type="date" class="form-control" name="dob" value="{{ old('dob') }}">
                                        <p class="text-danger"><small>{{ $errors->first('dob') }}</small></p>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4 text-center">
                                <button class="btn btn-success">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function checkCapital(params) {
            if(params == 'first_name'){
                var getfirst = document.querySelector('.firstname').value;
                console.log(getfirst);
                document.querySelector('.firstname').value = getfirst.toUpperCase();
            }
            if(params == 'last_name'){
                var getfirst = document.querySelector('.lastname').value;
                console.log(getfirst);
                document.querySelector('.lastname').value = getfirst.toUpperCase();
            }
        }
    </script>


</x-guest-layout>
