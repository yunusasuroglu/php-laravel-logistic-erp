@extends('layouts.layout')
@section('title', 'Yeni Dil Oluştur')
@section('content')
<div class="page-header-breadcrumb d-md-flex d-block align-items-center justify-content-between ">
    <h4 class="fw-medium mb-0">Yeni Dil</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);" class="text-white-50">Diller</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Dil Oluştur</li>
    </ol>
</div>
<div class="main-content app-content">
    <div class="container-fluid">
        <!-- Start:: row-6 -->
        <div class="row">
            <div class="col-xl-12">
                <div class="card custom-card">
                    <div class="card-header">
                        <div class="card-title">
                            Dil Oluştur
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('languages.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Dil Adı:</label>
                                    <input type="text" name="name" class="form-control" placeholder="Dil" aria-label="Dil">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Dil Kodu:</label>
                                    <input type="text" name="code" class="form-control" placeholder="Dil" aria-label="Dil">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Bayrak Logo:</label>
                                    <input type="file" name="logo" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary">Oluştur</button>
                                </div>
                            </div>   
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End:: row-6 -->
        
    </div>
</div>
@endsection