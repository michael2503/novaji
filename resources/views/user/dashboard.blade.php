<x-app-layout>

    <h1>Welcome to dashboard</h1>


    <div class="row d-flex">
        <div class="col-xl-6">
            <div class="uploadCSV">
                <form action="{{ route('encryptString') }}" method="post">
                    @csrf
                    <div class="card card-header mt-3">
                        <h4>Encryt A Text</h4>

                        <div class="form-group mt-5">
                            <label for="">{{ __('Enter Text to encrypt') }}</label>
                            <input type="text" class="form-control" name="text" required>
                        </div>

                        @if (Session::get('response'))
                            <div class="mt-4 alert alert-success">
                                <b>{{ Session::get('response') }}</b>
                            </div>
                        @endif

                        <div class="mt-3">
                            <button class="btn btn-primary">SUBMIT</button>
                        </div>
                    </div>
                </form>


                <form action="{{ route('decryptString') }}" method="post" class="mt-5 mb-5">
                    @csrf
                    <div class="card card-header mt-3">
                        <h4>Decrypt An encrypted string</h4>

                        <div class="form-group mt-5">
                            <label for="">{{ __('Enter the encrypted string') }}</label>
                            <input type="text" class="form-control" name="text" required>
                        </div>

                        @if (Session::get('decResponse'))
                            <div class="mt-4 alert alert-success">
                                <b>{{ Session::get('decResponse') }}</b>
                            </div>
                        @endif

                        <div class="mt-3">
                            <button class="btn btn-primary">SUBMIT</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-app-layout>
