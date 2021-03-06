@extends('admin.layouts.index', ['criteria' => 'active'])

@section('title','Criteria')

@section('content_header')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Criterias</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Criterias</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
@endsection

@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">
                            Criterias
                        </div>
                    </div>
                    <div class="card-body">
                        <div>
                            <div class="btn-group w-100 mb-2">
                                <button class="w3-bar-item btn btn-info tablink w3-red"
                                    onclick="openLink(event, 'All')">All
                                    Criterias</button>
                                <button class="w3-bar-item btn btn-info tablink"
                                    onclick="openLink(event, 'Agility')">Agility</button>
                                <button class="w3-bar-item btn btn-info tablink"
                                    onclick="openLink(event, 'Risk')">Risk</button>
                                <button class="w3-bar-item btn btn-info tablink"
                                    onclick="openLink(event, 'Security')">Security</button>
                                <button class="w3-bar-item btn btn-info tablink"
                                    onclick="openLink(event, 'Cost')">Cost</button>
                                <button class="w3-bar-item btn btn-info tablink"
                                    onclick="openLink(event, 'Quality')">Quality</button>
                                <button class="w3-bar-item btn btn-info tablink"
                                    onclick="openLink(event, 'Capability')">Capability</button>
                            </div>
                        </div>                      
                        <div>
                            @include('admin.pages.criteria.table_criteria', ['id' => 'All', 'criterias' => $criterias])
                            @include('admin.pages.criteria.table_criteria', ['id' => 'Agility', 'criterias' => $criterias, 'parent_id' => 1])
                            @include('admin.pages.criteria.table_criteria', ['id' => 'Risk', 'criterias' => $criterias, 'parent_id' => 2])
                            @include('admin.pages.criteria.table_criteria', ['id' => 'Security', 'criterias' => $criterias, 'parent_id' => 3])
                            @include('admin.pages.criteria.table_criteria', ['id' => 'Cost', 'criterias' => $criterias, 'parent_id' => 4])
                            @include('admin.pages.criteria.table_criteria', ['id' => 'Quality', 'criterias' => $criterias, 'parent_id' => 5])
                            @include('admin.pages.criteria.table_criteria', ['id' => 'Capability', 'criterias' => $criterias, 'parent_id' => 6])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
@endsection
@section('script')
<script>
function openLink(evt, criteriaName) {
    const criterias = document.querySelectorAll(".criteria");
    criterias.forEach(criteria => {
        criteria.style.display = 'none';
    })
    const tablinks = document.querySelectorAll(".tablink");
    tablinks.forEach(tablink => {
        if (tablink.classList.contains('w3-red')) {
            tablink.classList.remove('w3-red')
        }
    })

    document.getElementById(criteriaName).style.display = "block";

    evt.target.classList.add('w3-red');
}
</script>
@endsection