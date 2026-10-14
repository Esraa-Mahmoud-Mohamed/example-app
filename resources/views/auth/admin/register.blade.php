<x-guest-layout>
    <div class="wrapper vh-100">
        <div class="row align-items-center h-100">
            <form class="col-lg-6 col-md-8 col-10 mx-auto" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                <div class="mx-auto text-center my-4">
                    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
                        <svg version="1.1" id="logo" class="navbar-brand-img brand-md" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
                            <g>
                                <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
                                <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
                                <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
                            </g>
                        </svg>
                    </a>
                    <h2 class="my-3">Register</h2>
                </div>
                <div class="form-group">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" name="email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />
                </div>
                <!-- <div class="form-row"> -->
                <div class="form-group">
                    <label for="firstname">Fullname</label>
                    <input type="text" id="name" class="form-control" name="name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2 text-danger" />
                </div>
                <!-- </div> -->
                <div class="form-group">
                    <label for="customFile">Upload Image</label>
                    <div class="custom-file">
                        <input type="file" class="form-control" id="customFile" name="image">
                        <label class="custom-file-label" for="customFile" id="fileLabel">
                            Choose file
                        </label>
                    </div>
                    <x-input-error :messages="$errors->get('image')" class="mt-2 text-danger" />
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {

                        const input = document.getElementById('customFile');
                        const label = document.getElementById('fileLabel');

                        input.addEventListener('change', function() {

                            const fileName = this.files && this.files.length > 0 ?
                                this.files[0].name :
                                'Choose file';

                            label.innerText = fileName;
                        });

                    });
                </script>

                <hr class="my-4">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputPassword5">New Password</label>
                            <input type="password" class="form-control" id="inputPassword5" name="password">
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-danger" />
                        </div>
                        <div class="form-group">
                            <label for="inputPassword6">Confirm Password</label>
                            <input type="password" class="form-control" id="inputPassword6" name="password_confirmation">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-danger" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-2">Password requirements</p>
                        <p class="small text-muted mb-2"> To create a new password, you have to meet all of the following requirements: </p>
                        <ul class="small text-muted pl-4 mb-0">
                            <li> Minimum 8 character </li>
                            <li>At least one special character</li>
                            <li>At least one number</li>
                            <li>Can’t be the same as a previous password </li>
                        </ul>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
                <p class="mt-5 mb-3 text-muted text-center">© 2020</p>
            </form>
        </div>
    </div>
</x-guest-layout>