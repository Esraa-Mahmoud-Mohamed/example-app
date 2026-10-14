<div class="col-md-6 mb-5 mb-md-0">
    <h2 class="h3 mb-3 text-black">Billing Details</h2>
    <div class="p-3 p-lg-5 border bg-white">
        <form action="{{ route('enduser.checkout.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="billing_country" class="text-black">
                    Country <span class="text-danger">*</span>
                </label>

                <select id="billing_country" name="billing_country"
                    class="form-control @error('billing_country') is-invalid @enderror">

                    <option value="">Select Country</option>

                    @php
                        $countries = [
                            'Afghanistan',
                            'Albania',
                            'Algeria',
                            'Andorra',
                            'Angola',
                            'Argentina',
                            'Armenia',
                            'Australia',
                            'Austria',
                            'Azerbaijan',
                            'Bahrain',
                            'Bangladesh',
                            'Belarus',
                            'Belgium',
                            'Belize',
                            'Bolivia',
                            'Bosnia and Herzegovina',
                            'Botswana',
                            'Brazil',
                            'Brunei',
                            'Bulgaria',
                            'Cambodia',
                            'Cameroon',
                            'Canada',
                            'Chile',
                            'China',
                            'Colombia',
                            'Costa Rica',
                            'Croatia',
                            'Cyprus',
                            'Czech Republic',
                            'Denmark',
                            'Dominican Republic',
                            'Ecuador',
                            'Egypt',
                            'El Salvador',
                            'Estonia',
                            'Ethiopia',
                            'Finland',
                            'France',
                            'Georgia',
                            'Germany',
                            'Ghana',
                            'Greece',
                            'Guatemala',
                            'Hong Kong',
                            'Hungary',
                            'Iceland',
                            'India',
                            'Indonesia',
                            'Iran',
                            'Iraq',
                            'Ireland',
                            'Italy',
                            'Japan',
                            'Jordan',
                            'Kazakhstan',
                            'Kenya',
                            'Kuwait',
                            'Latvia',
                            'Lebanon',
                            'Libya',
                            'Lithuania',
                            'Luxembourg',
                            'Malaysia',
                            'Mexico',
                            'Morocco',
                            'Netherlands',
                            'New Zealand',
                            'Nigeria',
                            'Norway',
                            'Oman',
                            'Pakistan',
                            'Palestine',
                            'Panama',
                            'Peru',
                            'Philippines',
                            'Poland',
                            'Portugal',
                            'Qatar',
                            'Romania',
                            'Russia',
                            'Saudi Arabia',
                            'Serbia',
                            'Singapore',
                            'Slovakia',
                            'Slovenia',
                            'South Africa',
                            'South Korea',
                            'Spain',
                            'Sri Lanka',
                            'Sudan',
                            'Sweden',
                            'Switzerland',
                            'Syria',
                            'Thailand',
                            'Tunisia',
                            'Turkey',
                            'Ukraine',
                            'United Arab Emirates',
                            'United Kingdom',
                            'United States',
                            'Uruguay',
                            'Uzbekistan',
                            'Vietnam',
                            'Yemen',
                            'Zimbabwe'
                        ];
                    @endphp

                    @foreach($countries as $country)
                        <option value="{{ $country }}" @selected(old('country') == $country)>
                            {{ $country }}
                        </option>
                    @endforeach

                </select>

                @error('country')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>


            <div class="form-group row">

                <div class="col-md-6">
                    <label>First Name <span class="text-danger">*</span></label>

                    <input type="text" name="billing_first_name" value="{{ old('billing_first_name') }}"
                        class="form-control @error('billing_first_name') is-invalid @enderror">

                    @error('billing_first_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">

                    <label>Last Name <span class="text-danger">*</span></label>

                    <input type="text" name="billing_last_name" value="{{ old('billing_last_name') }}"
                        class="form-control @error('billing_last_name') is-invalid @enderror">

                    @error('billing_last_name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

            </div>


            <div class="form-group mt-3">

                <label>Company</label>

                <input type="text" name="billing_company_name" value="{{ old('billing_company_name') }}"
                    class="form-control">

            </div>


            <div class="form-group mt-3">

                <label>Address <span class="text-danger">*</span></label>

                <input type="text" name="billing_address" value="{{ old('billing_address') }}"
                    class="form-control @error('billing_address') is-invalid @enderror">

                @error('billing_address')
                    <small class="text-danger">{{ $message }}</small>
                @enderror

            </div>


            {{-- <div class="form-group mt-3">

                <label>Apartment / Suite</label>

                <input type="text" name="apartment" value="{{ old('apartment') }}" class="form-control">

            </div> --}}


            <div class="form-group row mt-3">

                <div class="col-md-6">

                    <label>State / City <span class="text-danger">*</span></label>

                    <input type="text" name="billing_city" value="{{ old('billing_city') }}"
                        class="form-control @error('billing_city') is-invalid @enderror">

                    @error('billing_city')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <div class="col-md-6">

                    <label>Postal Code <span class="text-danger">*</span></label>

                    <input type="text" name="billing_postal_code" value="{{ old('billing_postal_code') }}"
                        class="form-control @error('billing_postal_code') is-invalid @enderror">

                    @error('billing_postal_code')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

            </div>


            <div class="form-group row mt-3">

                <div class="col-md-6">

                    <label>Email <span class="text-danger">*</span></label>

                    <input type="email" name="billing_email" value="{{ old('billing_email') }}"
                        class="form-control @error('billing_email') is-invalid @enderror">

                    @error('billing_email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

                <div class="col-md-6">

                    <label>Phone <span class="text-danger">*</span></label>

                    <input type="text" name="billing_phone" value="{{ old('billing_phone') }}"
                        class="form-control @error('billing_phone') is-invalid @enderror">

                    @error('billing_phone')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror

                </div>

            </div>


            <div class="form-group mt-4">

                <label>Order Notes</label>

                <textarea name="notes" rows="5" class="form-control">{{ old('notes') }}</textarea>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-black btn-lg py-3 btn-block">
                    Place Order
                </button>
            </div>
        </form>
    </div>
</div>