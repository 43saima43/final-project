@extends('layouts.admin_master')
@section('page_title', 'Student List')
@section('admin_main_content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <h5 class="card-header">Student List</h5>
            <div class="card-body">
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Sl. No.</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Course</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="bx bxl-angular bx-sm text-danger me-3"></i> <span
                                        class="fw-medium">Angular Project</span></td>
                                <td>Albert Cook</td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" aria-label="Lilian Fuller"
                                            data-bs-original-title="Lilian Fuller">
                                            <img src="../assets/img/avatars/5.png" alt="Avatar" class="rounded-circle">
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" aria-label="Sophia Wilkerson"
                                            data-bs-original-title="Sophia Wilkerson">
                                            <img src="../assets/img/avatars/6.png" alt="Avatar" class="rounded-circle">
                                        </li>
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" aria-label="Christina Parker"
                                            data-bs-original-title="Christina Parker">
                                            <img src="../assets/img/avatars/7.png" alt="Avatar" class="rounded-circle">
                                        </li>
                                    </ul>
                                </td>
                                <td><span class="badge bg-label-primary me-1">Active</span></td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown"><i
                                                class="bx bx-dots-vertical-rounded"></i></button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="javascript:void(0);"><i
                                                    class="bx bx-trash me-1"></i> Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
