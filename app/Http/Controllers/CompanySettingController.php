<?php

namespace App\Http\Controllers;

use App\Helpers\Notify;
use App\Http\Requests\StoreCompanySettingRequest;
use App\Http\Requests\UpdateCompanySettingRequest;
use App\Models\CompanySetting;
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
        return view('admin.company-settings.show', compact('companySetting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        Gate::authorize('edit company-setting');
        $companySetting = CompanySetting::firstOrFail();
        return view('admin.company-settings.edit', compact('companySetting'));
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

                $data['logo'] = $request->file('logo')->store('company', 'public');
            }

            if ($request->hasFile('favicon')) {

                if ($companySetting->favicon) {
                    Storage::disk('public')->delete($companySetting->favicon);
                }

                $data['favicon'] = $request->file('favicon')->store('company', 'public');
            }

        $companySetting->update($data);
        Notify::success('Company Settings updated successfully.');

        return view('admin.company-settings.show', compact('companySetting'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function reset()
    {
        Gate::authorize('reset company-setting');
        $settings = CompanySetting::firstOrFail();

        $settings->update([
            'name' => '',
            'email' => '',
            'phone' => '',
            'address' => '',
            'logo' => null,
            'favicon' => null,
            'footer_description' => '',
            'facebook' => null,
            'twitter' => null,
            'instagram' => null,
            'linkedin' => null,
        ]);


        Notify::success('Company settings have been reset.');

        return back();
    }
}
