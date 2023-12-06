<?php

namespace App\Http\Controllers\Backend\Admin\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Dashboard Dependency Injection
    // protected $dashboardModel;


    // public function __construct(Dashboard $dashboardModel)
    // {
    //     $this->dashboardModel = $dashboardModel;
    // }


    // Dashboard Page Method
    public function index()
    {
        return view('admin.admin_dashboard');
    }


    // Dashboard Create Page Method
    public function create()
    {
    }


    // Dashboard Store Method
    public function store(Request $request)
    {
    }


    // Dashboard Show Page Method
    public function show($id)
    {
    }


    // Dashboard Edit Page Method
    public function edit($id)
    {
    }


    // Dashboard Update Method
    public function update(Request $request, $id)
    {
    }


    // Dashboard Destroy Method
    public function destroy($id)
    {
    }


    // Dashboard Status Change Method
    public function changeStatus(Request $request)
    {
    }


    //Dashboard Store & Update Method
    protected function storeOrUpdate(Request $request, $id = null)
    {
        if ($id) {
            //Update Dashboard
        } else {
            //Create Dashboard
        }
    }
}
