<?php

namespace App\Http\Controllers\Backend\Marketing\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Profile Dependency Injection
    // protected $profileModel;


    // public function __construct(Profile $profileModel)
    // {
    //     $this->profileModel = $profileModel;
    // }


    // Profile Page Method
    public function index()
    {
        return view('marketing.profile.marketing_profile');
    }


    // Profile Create Page Method
    public function create()
    {
    }


    // Profile Store Method
    public function store(Request $request)
    {
    }


    // Profile Show Page Method
    public function show($id)
    {
    }


    // Profile Edit Page Method
    public function edit($id)
    {
    }


    // Profile Update Method
    public function update(Request $request, $id)
    {
    }


    // Profile Destroy Method
    public function destroy($id)
    {
    }


    // Profile Status Change Method
    public function changeStatus(Request $request)
    {
    }


    //Profile Store & Update Method
    protected function storeOrUpdate(Request $request, $id = null)
    {
        if ($id) {
            //Update Profile
        } else {
            //Create Profile
        }
    }
}
