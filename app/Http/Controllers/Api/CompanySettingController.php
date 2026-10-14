<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCompanySettingRequest;
use App\Http\Resources\CompanySettingResource;
use App\Models\CompanySetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class CompanySettingController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show()
    {
        Gate::authorize('view company-setting');

        $companySetting = CompanySetting::firstOrFail();

        return ApiResponse::response(
            new CompanySettingResource($companySetting),
            'Company settings retrieved successfully',
            200
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompanySettingRequest $request)
    {
        Gate::authorize('edit company-setting');

        $companySetting = CompanySetting::firstOrFail();

        $data = $request->validated();

        if ($request->hasFile('logo')) {

            if ($companySetting->logo) {
                Storage::disk('public')->delete($companySetting->logo);
            }

            $data['logo'] = $request
                ->file('logo')
                ->store('company', 'public');
        }

        if ($request->hasFile('favicon')) {

            if ($companySetting->favicon) {
                Storage::disk('public')->delete($companySetting->favicon);
            }

            $data['favicon'] = $request
                ->file('favicon')
                ->store('company', 'public');
        }

        $companySetting->update($data);

        $companySetting->refresh();

        return ApiResponse::response(
            new CompanySettingResource($companySetting),
            'Company settings updated successfully',
            200
        );
    }

    public function reset()
    {
        Gate::authorize('reset company-setting');

        $settings = CompanySetting::firstOrFail();

        /*
        |--------------------------------------------------------------------------
        | Delete stored images
        |--------------------------------------------------------------------------
        */

        if ($settings->logo) {
            Storage::disk('public')->delete($settings->logo);
        }

        if ($settings->favicon) {
            Storage::disk('public')->delete($settings->favicon);
        }

        $settings->update([
            'name' => '',
            'email' => '',
            'phone' => '',
            'address' => '',
            'logo' => null,
            'favicon' => null,
            'footer_description' => '',
            'facebook' => '',
            'twitter' => '',
            'instagram' => '',
            'linkedin' => '',
            'copyright' => '',
        ]);

        $settings->refresh();

        return ApiResponse::response(
            new CompanySettingResource($settings),
            'Company settings have been reset successfully',
            200
        );
    }
}
