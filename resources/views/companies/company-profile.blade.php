@extends('layouts.layout')
@php
$title = trans_dynamic('company_profile_page_title');
@endphp
@section('title', $title)
@section('content')
<link rel="stylesheet" href="{{asset('/')}}/assets/libs/gridjs/theme/mermaid.min.css">
<style>
    #datatable-basic_wrapper .row{
        margin-bottom: 20px;
    }
</style>
<div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
    <h4 class="fw-medium mb-0">{{ $company->name }}</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">{{trans_dynamic('company_profile_edit_name')}}</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">{{ $company->name }}</li>
    </ol>
</div>
<div class="main-content app-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xxl-12 col-xl-12">
                <div class="card custom-card overflow-hidden">
                    <div class="card-body d-sm-flex align-items-top p-4   main-profile-cover">
                        <p class="avatar avatar-xxl avatar-rounded online me-3 my-auto">
                            <img src="{{ asset($company->profile_image) }}" alt="">
                        </p>
                        <div class="flex-fill main-profile-info my-auto">
                            <h5 class="fw-semibold mb-1 ">{{ $company->name }}</h5>
                            <div>
                                <p class="mb-1 text-muted">{{trans_dynamic('company_profile_reference_no')}} <b>{{ $company->reference_token }}</b></p>
                                <div class="fs-12 op-7 mb-0 d-flex">
                                    <p class="me-3 mb-0"><i class="ri-building-line me-1 align-middle d-inline-flex"></i>{{ $address['country'] ?? 'NULL' }}</p>
                                    <p class="mb-0"><i class="ri-map-pin-line me-1 align-middle d-inline-flex"></i>{{ $address['city'] ?? 'NULL' }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="main-profile-info ms-auto">
                            <div class="">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex mb-0 ms-auto">
                                        <div class="me-4">
                                            <p class="fw-bold fs-20  text-shadow mb-0">{{$shipmentsCount}}</p>
                                            <p class="mb-0 fs-12 text-muted ">{{trans_dynamic('company_profile_shipments')}}</p>
                                        </div>
                                        <div class="me-4">
                                            <p class="fw-bold fs-20  text-shadow mb-0">{{$employees->count()}}</p>
                                            <p class="mb-0 fs-12 text-muted ">{{trans_dynamic('company_profile_workers')}}</p>
                                        </div>
                                        <div class="">
                                            <p class="fw-bold fs-20  text-shadow mb-0">{{$shipmentsCount}}</p>
                                            <p class="mb-0 fs-12 text-muted ">{{trans_dynamic('company_profile_invoices')}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-0  mt-2 text-end">
                                <a href="{{ route('company.profile.edit', ['id' => $company->id, 'reference_token' => $company->reference_token]) }}" class="btn btn-secondary btn-sm btn-wave"><i class="ri-pencil-line me-1 align-middle"></i>{{trans_dynamic('company_profile_edit_button')}}</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3">
                <div class="card custom-card">
                    <div class="">
                        <div class="p-4  border-bottom border-block-end-dashed">
                            <div>
                                <p class="fs-15 mb-2 me-4 fw-semibold">{{trans_dynamic('company_profile_sidebar_name')}}</p>
                            </div>
                            <ul class="list-group">
                                <li class="list-group-item border-0">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            {{trans_dynamic('company_profile_sidebar_company_name')}}
                                        </div>
                                        <span class="fs-12 text-muted">{{ $company->name }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            {{trans_dynamic('company_profile_sidebar_email')}}
                                        </div>
                                        <span class="fs-12 text-muted">{{ $company->email }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            {{trans_dynamic('company_profile_sidebar_fax')}}
                                        </div>
                                        <span class="fs-12 text-muted">{{ $company->fax }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            {{trans_dynamic('company_profile_sidebar_hrb')}}
                                        </div>
                                        <span class="fs-12 text-muted">{{ $company->hrb }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            {{trans_dynamic('company_profile_sidebar_iban')}}
                                        </div>
                                        <span class="fs-12 text-muted">{{ $company->iban }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            {{trans_dynamic('company_profile_sidebar_bic')}}
                                        </div>
                                        <span class="fs-12 text-muted">{{ $company->bic }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            {{trans_dynamic('company_profile_sidebar_stnr')}}
                                        </div>
                                        <span class="fs-12 text-muted">{{ $company->stnr }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            {{trans_dynamic('company_profile_sidebar_ustidnr')}}
                                        </div>
                                        <span class="fs-12 text-muted">{{ $company->ust_id_nr }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            {{trans_dynamic('company_profile_sidebar_registry_court')}}
                                        </div>
                                        <span class="fs-12 text-muted">{{ $company->registry_court }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            {{trans_dynamic('company_profile_sidebar_general_manager')}}
                                        </div>
                                        <span class="fs-12 text-muted">{{ $company->general_manager }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            {{trans_dynamic('company_profile_sidebar_phone')}}
                                        </div>
                                        <span class="fs-12 text-muted">{{ $company->phone }}</span>
                                    </div>
                                </li>
                                <li class="list-group-item border-0">
                                    <div class="d-flex flex-wrap align-items-center">
                                        <div class="me-2 fw-semibold">
                                            {{trans_dynamic('company_profile_sidebar_workers')}}
                                        </div>
                                        <span class="fs-12 text-muted">{{$employees->count()}}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="p-4 border-bottom border-block-end-dashed">
                            <p class="fs-15 mb-2 me-4 fw-semibold">{{trans_dynamic('company_profile_sidebar_contact_name')}}</p>
                            <div class="text-muted">
                                <p class="mb-3">
                                    <span class="avatar avatar-sm avatar-rounded me-2 bg-info-transparent">
                                        <i class="ri-mail-line align-middle fs-14"></i>
                                    </span>
                                    {{ $company->email }}
                                </p>
                                <p class="mb-3">
                                    <span class="avatar avatar-sm avatar-rounded me-2 bg-warning-transparent">
                                        <i class="ri-phone-line align-middle fs-14"></i>
                                    </span>
                                    {{ $company->phone }}
                                </p>
                                <div class="d-flex">
                                    <p class="mb-0">
                                        <span class="avatar avatar-sm avatar-rounded me-2 bg-success-transparent">
                                            <i class="ri-map-pin-line align-middle fs-14"></i>
                                        </span>
                                    </p>
                                    <p class="mb-0">
                                        {{ $address['street'] }}, {{ $address['city'] }}, {{ $address['country'] }}, {{ $address['zip_code'] }} </p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-9 col-xl-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class=" custom-card">
                                <div class="card-body p-0">
                                    <div class="border-block-end-dashed  bg-white rounded-2 p-2">
                                        <div>
                                            <ul class="nav nav-pills nav-justified gx-3 tab-style-6 d-sm-flex d-block " id="myTab" role="tablist">
                                                <li class="nav-item rounded" role="presentation">
                                                    <button class="nav-link active" id="employees-tab" data-bs-toggle="tab"
                                                    data-bs-target="#employees-tab-pane" type="button" role="tab"
                                                    aria-controls="employees-tab-pane" aria-selected="true"><i
                                                    class="bx bxs-user-detail me-1 align-middle d-inline-block fs-16"></i>{{trans_dynamic('company_profile_tab_workers')}}</button>
                                                </li>
                                                <li class="nav-item rounded" role="presentation">
                                                    <button class="nav-link" id="persons-customer-tab" data-bs-toggle="tab"
                                                    data-bs-target="#persons-customer-tab-pane" type="button" role="tab"
                                                    aria-controls="persons-customer-tab-pane" aria-selected="false"><i
                                                    class="bx bxs-user-circle me-1 align-middle d-inline-block fs-16"></i>{{trans_dynamic('company_profile_tab_customers')}}</button>
                                                </li>
                                                <li class="nav-item rounded" role="presentation">
                                                    <button class="nav-link" id="persons-carrier-tab" data-bs-toggle="tab"
                                                    data-bs-target="#persons-carrier-tab-pane" type="button" role="tab"
                                                    aria-controls="persons-carrier-tab-pane" aria-selected="false"><i
                                                    class="bx bxs-truck me-1 align-middle d-inline-block fs-16"></i>{{trans_dynamic('company_profile_tab_carriers')}}</button>
                                                </li>
                                                <li class="nav-item rounded" role="presentation">
                                                    <button class="nav-link" id="shipments-tab" data-bs-toggle="tab"
                                                    data-bs-target="#shipments-tab-pane" type="button" role="tab"
                                                    aria-controls="shipments-tab-pane" aria-selected="false"><i
                                                    class="bx bxs-box me-1 align-middle d-inline-block fs-16"></i>{{trans_dynamic('company_profile_tab_shipments')}}</button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="py-4">
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane show active fade p-0 border-0  p-4 rounded-3" id="employees-tab-pane" role="tabpanel" aria-labelledby="employees-tab" tabindex="0">
                                                <div class="row mb-4">
                                                    <div class="col-md-6 text-end">
                                                        <select id="employeeEntriesSelect" class="form-select w-auto">
                                                            <option value="6">6</option>
                                                            <option value="9">9</option>
                                                            <option value="12">12</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" id="employeeSearchInput" class="form-control" placeholder="{{trans_dynamic('company_profile_tab_workers_search')}}">
                                                    </div>
                                                </div>
                                                <div class="row" id="employeeContainer">
                                                    @foreach ($employees as $employee)
                                                    <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 col-sm-12 employee-card">
                                                        <div class="card custom-card shadow-none border">
                                                            <div class="card-body p-4">
                                                                <div class="text-center">
                                                                    <span class="avatar avatar-xl avatar-rounded">
                                                                        <img src="../assets/images/faces/2.jpg" alt="">
                                                                    </span>
                                                                    <div class="mt-2">
                                                                        <p class="mb-0 fw-semibold employee-name">{{$employee->name}} {{$employee->surname}}</p>
                                                                        <p class="fs-12 op-7 mb-1 text-muted">{{$employee->email}}</p>
                                                                        <p class="fs-12 op-7 mb-1 text-muted">{{$employee->phone}}</p>
                                                                        @if($employee->roles->isNotEmpty())
                                                                        <span class="badge bg-info-transparent rounded-pill">{{$employee->roles->first()->name}}</span>
                                                                        @else
                                                                        <span class="badge bg-danger-transparent rounded-pill">Standard</span>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-footer text-center">
                                                                <div class="btn-list d-flex justify-content-center">
                                                                    <form action="{{ route('persons.destroy', $employee->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="btn btn-sm btn-danger-light btn-wave"><i class="bx bxs-trash"></i></button>
                                                                    </form>
                                                                    <a href="{{ route('persons.edit', $employee->id) }}" class="btn btn-sm btn-success-light btn-wave"><i class="bx bxs-edit"></i></a>
                                                                    <button type="button" class="btn btn-sm btn-warning-light btn-wave" data-bs-toggle="modal" data-bs-target="#userDetail{{$employee->id}}"><i class="bi bi-eye-fill"></i></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="userDetail{{$employee->id}}" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                                            <div class="modal-content modal-content-demo">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">{{$employee->name}} {{$employee->surname}} {{trans_dynamic('company_profile_tab_workers_modal_header')}}</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body text-start">
                                                                    <p style="margin-left: auto; margin-right:auto;" class="avatar avatar-xxl d-block  avatar-rounded online mb-4 my-auto">
                                                                        <img src="../assets/images/faces/5.jpg" alt="">
                                                                    </p>
                                                                    <h5 class="fw-semibold mb-4 text-center ">{{$employee->name}} {{$employee->surname}}</h5>
                                                                    <div>
                                                                        <p class="mb-1 text-muted text-center"><b>{{trans_dynamic('company_profile_tab_workers_modal_company_name')}}</b> <br> <span class="text-primary">{{$employee->company->name ?? 'Şirket Yok'}}</span></p>
                                                                        <p class="mb-1 text-muted text-center"><b> <span ></span>{{trans_dynamic('company_profile_tab_workers_modal_phone')}}</b> <br><span class="text-primary">{{$employee->phone}}</span></p>
                                                                        <p class="mb-1 text-muted text-center"><b>{{trans_dynamic('company_profile_tab_workers_modal_email')}}</b> <br> <span class="text-primary">{{$employee->email}}</span></p>
                                                                        <p class="mb-1 text-muted text-center"><b>{{trans_dynamic('company_profile_tab_workers_modal_role')}}</b> <br><span class="text-primary">{{$employee->roles->first()->name ?? 'Rol Yok'}}</span></p>
                                                                        <p class="mb-4 text-muted text-center"><b>{{trans_dynamic('company_profile_tab_workers_modal_created')}}</b> <br> <span class="text-primary">{{$employee->created_at->format('d/m/Y')}}</span></p>
                                                                        <div class="fs-12 op-7 mb-0 justify-content-center d-flex">
                                                                            <p class="me-3 mb-0 text-center"><i class="ri-building-line me-1 align-middle d-inline-flex"></i>{{ $employee->address['country'] ?? 'NULL' }}</span></p>
                                                                            <p class="mb-0 text-center"><i class="ri-map-pin-line me-1 align-middle d-inline-flex"></i>{{ $employee->address['street'] ?? 'NULL' }},{{ $employee->address['zip_code'] ?? 'NULL' }},{{ $employee->address['city'] ?? 'NULL' }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ route('persons.edit', $employee->id) }}" class="btn btn-outline-primary">{{trans_dynamic('company_profile_tab_workers_modal_edit_button')}}</a>
                                                                    <button class="btn btn-light" data-bs-dismiss="modal">{{trans_dynamic('company_profile_tab_workers_modal_review_button')}}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <ul class="pagination justify-content-end" id="employeePagination">
                                                            <!-- Pagination buttons will be generated here -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade p-0 border-0" id="persons-customer-tab-pane" role="tabpanel" aria-labelledby="persons-customer-tab" tabindex="0">
                                                <div class="row mb-4">
                                                    <div class="col-md-6 text-end">
                                                        <select id="customerEntriesSelect" class="form-select w-auto">
                                                            <option value="12">12</option>
                                                            <option value="16">16</option>
                                                            <option value="20">20</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" id="customerSearchInput" class="form-control" placeholder="{{trans_dynamic('company_profile_tab_customers_search')}}">
                                                    </div>
                                                </div>
                                                <div class="row" id="customerContainer">
                                                    @foreach ($customers as $customer)
                                                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-sm-6 customer-card">
                                                        <div class="card custom-card text-center">
                                                            <div class="card-body contact-action">
                                                                <div class="contact-overlay"></div>
                                                                <div class="align-items-top">
                                                                    <div class="">
                                                                        <div class="avatar avatar-xl avatar-rounded mb-1 bg-warning-transparent">
                                                                            {{$customer->initials}}
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 fw-semibold customer-name">
                                                                                {{$customer->name}}
                                                                            </h6>
                                                                            <p class="mb-1 text-muted contact-mail text-truncate">{{$customer->email}}</p>
                                                                            <p class="fw-semibold fs-11 mb-0 text-warning">
                                                                                {{$customer->phone}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <button class="btn btn-sm btn-icon contact-hover-fave btn-primary btn-wave waves-effect waves-light" type="button" data-bs-toggle="modal" data-bs-target="#customerDetail{{$customer->id}}">
                                                                        <i class="bi bi-eye-fill fs-16 text-fixed-white"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="dropdown contact-hover-dropdown">
                                                                    <button aria-label="button" class="btn btn-sm btn-icon btn-primary btn-wave waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="mailto:{{$customer->email}}"><i class="bi bi-envelope me-2 align-middle d-inline-block"></i>{{trans_dynamic('company_profile_tab_customer_select_email')}}</a></li>
                                                                        <li><a class="dropdown-item" href="tel:{{$customer->phone}}"><i class="ri-phone-line me-2 align-middle d-inline-block"></i>{{trans_dynamic('company_profile_tab_customer_select_phone')}}</a></li>
                                                                        <li><a class="dropdown-item" href="{{ route('contacts.edit', $customer->id) }}"><i class="ri-edit-2-line me-2 align-middle d-inline-block"></i>{{trans_dynamic('company_profile_tab_customer_select_edit')}}</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="bi bi-eye-fill me-2 align-middle d-inline-block"></i>{{trans_dynamic('company_profile_tab_customer_select_view')}}</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle d-inline-block"></i>{{trans_dynamic('company_profile_tab_customer_select_delete')}}</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="customerDetail{{$customer->id}}" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                                            <div class="modal-content modal-content-demo">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">{{$customer->name}} {{trans_dynamic('company_profile_tab_customer_modal_name')}}</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body text-start">
                                                                    <p style="margin-left: auto; margin-right:auto;" class="avatar avatar-xxl d-block  avatar-rounded online mb-4 my-auto">
                                                                        <img src="../assets/images/faces/5.jpg" alt="">
                                                                    </p>
                                                                    <h5 class="fw-semibold mb-4 text-center ">{{$customer->name}}</h5>
                                                                    <div>
                                                                        <p class="mb-1 text-muted text-center"><b>{{trans_dynamic('company_profile_tab_customer_modal_company_name')}}</b> <br> <span class="text-primary">{{$customer->company_name ?? trans_dynamic('company_profile_tab_customer_modal_company_no_company')}}</span></p>
                                                                        <p class="mb-1 text-muted text-center"><b> <span ></span>{{trans_dynamic('company_profile_tab_customer_modal_company_phone')}}</b> <br><span class="text-primary">{{$customer->phone}}</span></p>
                                                                        <p class="mb-1 text-muted text-center"><b>{{trans_dynamic('company_profile_tab_customer_modal_company_email')}}</b> <br> <span class="text-primary">{{$customer->email}}</span></p>
                                                                        <div class="fs-12 op-7 mb-0 justify-content-center d-flex">
                                                                            <p class="me-3 mb-0 text-center"><i class="ri-building-line me-1 align-middle d-inline-flex"></i>{{ $customer->address['country'] ?? 'NULL' }}</span></p>
                                                                            <p class="mb-0 text-center"><i class="ri-map-pin-line me-1 align-middle d-inline-flex"></i>{{ $customer->address['street'] ?? 'NULL' }},{{ $customer->address['zip_code'] ?? 'NULL' }},{{ $customer->address['city'] ?? 'NULL' }}</p>
                                                                        </div>
                                                                        <p class="mb-1 text-muted text-center">
                                                                            <b>{{trans_dynamic('company_profile_tab_customer_modal_company_reverse_charge')}}</b> <br>
                                                                            @if ($customer->reverse_charge == 2)
                                                                            <span class="badge ms-3 bg-success-transparent">{{trans_dynamic('company_profile_tab_customer_modal_company_active')}}</span>
                                                                            @else
                                                                            <span class="badge ms-3 bg-info-transparent">{{trans_dynamic('company_profile_tab_customer_modal_company_passive')}}</span>
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ route('contacts.edit', $customer->id) }}" class="btn btn-outline-primary">{{trans_dynamic('company_profile_tab_customer_modal_company_edit')}}</a>
                                                                    <button class="btn btn-light" data-bs-dismiss="modal">{{trans_dynamic('company_profile_tab_customer_modal_company_exit')}}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <ul class="pagination justify-content-end" id="customerPagination">
                                                            <!-- Pagination buttons will be generated here -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane fade p-0 border-0" id="persons-carrier-tab-pane" role="tabpanel" aria-labelledby="persons-carrier-tab" tabindex="0">
                                                <div class="row mb-4">
                                                    <div class="col-md-6 text-end">
                                                        <select id="carrierEntriesSelect" class="form-select w-auto">
                                                            <option value="12">12</option>
                                                            <option value="16">16</option>
                                                            <option value="20">20</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input type="text" id="carrierSearchInput" class="form-control" placeholder="{{trans_dynamic('company_profile_tab_carriers_search')}}">
                                                    </div>
                                                </div>
                                                <div class="row" id="carrierContainer">
                                                    @foreach ($carriers as $carrier)
                                                    <div class="col-xxl-3 col-xl-4 col-lg-4 col-sm-6 carrier-card">
                                                        <div class="card custom-card text-center">
                                                            <div class="card-body contact-action">
                                                                <div class="contact-overlay"></div>
                                                                <div class="align-items-top">
                                                                    <div class="">
                                                                        <div class="avatar avatar-xl avatar-rounded mb-1 bg-danger-transparent">
                                                                            {{$carrier->initials}}
                                                                        </div>
                                                                        <div>
                                                                            <h6 class="mb-1 fw-semibold carrier-name">
                                                                                {{$carrier->name}}
                                                                            </h6>
                                                                            <p class="mb-1 text-muted contact-mail text-truncate">{{$carrier->email}}</p>
                                                                            <p class="fw-semibold fs-11 mb-0 text-danger">
                                                                                {{$carrier->phone}}
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div>
                                                                    <button class="btn btn-sm btn-icon contact-hover-fave btn-primary btn-wave waves-effect waves-light" type="button" data-bs-toggle="modal" data-bs-target="#carrierDetail{{$carrier->id}}">
                                                                        <i class="bi bi-eye-fill fs-16 text-fixed-white"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="dropdown contact-hover-dropdown">
                                                                    <button aria-label="button" class="btn btn-sm btn-icon btn-primary btn-wave waves-effect waves-light" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        <i class="ri-more-2-fill"></i>
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="mailto:{{$carrier->email}}"><i class="bi bi-envelope me-2 align-middle d-inline-block"></i>{{trans_dynamic('company_profile_tab_carrier_select_email')}}</a></li>
                                                                        <li><a class="dropdown-item" href="tel:{{$carrier->phone}}"><i class="ri-phone-line me-2 align-middle d-inline-block"></i>{{trans_dynamic('company_profile_tab_carrier_select_phone')}}</a></li>
                                                                        <li><a class="dropdown-item" href="{{ route('contacts.edit', $carrier->id) }}"><i class="ri-edit-2-line me-2 align-middle d-inline-block"></i>{{trans_dynamic('company_profile_tab_carrier_select_edit')}}</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="bi bi-eye-fill me-2 align-middle d-inline-block"></i>{{trans_dynamic('company_profile_tab_carrier_select_view')}}</a></li>
                                                                        <li><a class="dropdown-item" href="javascript:void(0);"><i class="ri-delete-bin-5-line me-2 align-middle d-inline-block"></i>{{trans_dynamic('company_profile_tab_carrier_select_delete')}}</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal fade" id="carrierDetail{{$carrier->id}}" style="display: none;" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered text-center" role="document">
                                                            <div class="modal-content modal-content-demo">
                                                                <div class="modal-header">
                                                                    <h6 class="modal-title">{{$carrier->name}} {{trans_dynamic('company_profile_tab_carrier_modal_name')}}</h6><button aria-label="Close" class="btn-close" data-bs-dismiss="modal"></button>
                                                                </div>
                                                                <div class="modal-body text-start">
                                                                    <p style="margin-left: auto; margin-right:auto;" class="avatar avatar-xxl d-block  avatar-rounded online mb-4 my-auto">
                                                                        <img src="../assets/images/faces/5.jpg" alt="">
                                                                    </p>
                                                                    <h5 class="fw-semibold mb-4 text-center ">{{$carrier->name}}</h5>
                                                                    <div>
                                                                        <p class="mb-1 text-muted text-center"><b>{{trans_dynamic('company_profile_tab_carrier_modal_company_name')}}</b> <br> <span class="text-primary">{{$carrier->company_name ?? trans_dynamic('company_profile_tab_carrier_modal_company_no_company')}}</span></p>
                                                                        <p class="mb-1 text-muted text-center"><b> <span ></span>{{trans_dynamic('company_profile_tab_carrier_modal_company_phone')}}</b> <br><span class="text-primary">{{$carrier->phone}}</span></p>
                                                                        <p class="mb-1 text-muted text-center"><b>{{trans_dynamic('company_profile_tab_carrier_modal_company_email')}}</b> <br> <span class="text-primary">{{$carrier->email}}</span></p>
                                                                        <div class="fs-12 op-7 mb-0 justify-content-center d-flex">
                                                                            <p class="me-3 mb-0 text-center"><i class="ri-building-line me-1 align-middle d-inline-flex"></i>{{ $carrier->address['country'] ?? 'NULL' }}</span></p>
                                                                            <p class="mb-0 text-center"><i class="ri-map-pin-line me-1 align-middle d-inline-flex"></i>{{ $carrier->address['street'] ?? 'NULL' }},{{ $carrier->address['zip_code'] ?? 'NULL' }},{{ $carrier->address['city'] ?? 'NULL' }}</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a href="{{ route('contacts.edit', $carrier->id) }}" class="btn btn-outline-primary">{{trans_dynamic('company_profile_tab_carrier_modal_company_edit')}}</a>
                                                                    <button class="btn btn-light" data-bs-dismiss="modal">{{trans_dynamic('company_profile_tab_carrier_modal_company_exit')}}</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                                <div class="row">
                                                    <div class="col-12">
                                                        <ul class="pagination justify-content-end" id="carrierPagination">
                                                            <!-- Pagination buttons will be generated here -->
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="tab-pane fade p-0 border-0" id="shipments-tab-pane" role="tabpanel" aria-labelledby="shipments-tab-pane" tabindex="0">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="card custom-card">
                                                            <div class="card-header justify-content-between">
                                                                <div class="col-md-6">
                                                                    <div class="card-title">
                                                                        {{trans_dynamic('company_profile_tab_shipments_table_name')}}
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 text-end" id="datatable-controls">
                                                                    <!-- DataTable arama kutusu ve diğer kısa yol butonları burada olacak -->
                                                                </div>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="table-responsive">
                                                                    <table id="datatable-basic" class="table text-nowrap table-hover border table-bordered">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col">{{trans_dynamic('company_profile_tab_shipments_table_shipment_no')}}</th>
                                                                                <th scope="col">{{trans_dynamic('company_profile_tab_shipments_table_customer')}}</th>
                                                                                <th scope="col">{{trans_dynamic('company_profile_tab_shipments_table_author')}}</th>
                                                                                <th scope="col">{{trans_dynamic('company_profile_tab_shipments_table_status')}}</th>
                                                                                <th scope="col">{{trans_dynamic('company_profile_tab_shipments_table_created_time')}}</th>
                                                                                <th scope="col">{{trans_dynamic('company_profile_tab_shipments_table_updated_time')}}</th>
                                                                                <th scope="col">{{trans_dynamic('company_profile_tab_shipments_table_amount')}}</th>
                                                                                <th scope="col">{{trans_dynamic('company_profile_tab_shipments_table_details')}}</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            @foreach ($shipments as $shipment)
                                                                            <tr>
                                                                                <td>#{{$shipment->s_code}}</td>
                                                                                <td>
                                                                                    <div class="d-flex align-items-center fw-semibold">
                                                                                        {{$shipment->customer['name']}}
                                                                                    </div>
                                                                                </td>
                                                                                <td>{{$shipment->author}}</td>
                                                                                <td>
                                                                                    @if ($shipment->status == 4)
                                                                                    <span class="badge bg-danger-transparent">{{trans_dynamic('company_profile_tab_shipments_table_status_cancel')}}</span>
                                                                                    @elseif ($shipment->status == 3)
                                                                                    <span class="badge bg-primary-transparent">{{trans_dynamic('company_profile_tab_shipments_table_status_draft')}}</span>
                                                                                    @elseif ($shipment->status == 2)
                                                                                    <span class="badge bg-warning-transparent">{{trans_dynamic('company_profile_tab_shipments_table_status_continues')}}</span>
                                                                                    @elseif ($shipment->status == 1)
                                                                                    <span class="badge bg-success-transparent">{{trans_dynamic('company_profile_tab_shipments_table_status_approved')}}</span>
                                                                                    @else
                                                                                    <span class="badge bg-warning-transparent">{{trans_dynamic('company_profile_tab_shipments_table_status_not')}}</span>
                                                                                    @endif
                                                                                </td>
                                                                                <td>{{$shipment->created_at->format('d/m/Y')}}</td>
                                                                                <td>
                                                                                    {{ $shipment->updated_at->format('d/m/Y')}}
                                                                                </td>
                                                                                <td>
                                                                                    <span class="ms-1">{{$shipment->price}} €</span>
                                                                                </td>
                                                                                <td class="text-center">
                                                                                    <div class="hstack justify-content-center gap-2 fs-15">
                                                                                        <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-info-light"><i class="bi bi-eye-fill"></i></a>
                                                                                        <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="bi bi-pencil"></i></a>
                                                                                        <a aria-label="anchor" href="javascript:void(0);" class="btn btn-icon btn-wave waves-effect waves-light btn-sm btn-primary-light"><i class="ri-delete-bin-5-line"></i></a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                            @endforeach
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection