@extends('layouts.admin')
@section('content')


    <div id="page-wrapper">
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="page-header">
                    Companies
                    <small>Subheading</small>
                </h1>
                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Name</th>
                            <th>Address</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($companies as $company)
                            <tr>
                            <td><img src="/storage/image/{{$company->logo}}" class="img-responsive"></td>
                            <td>{{$company->name}}</td>
                            <td>{{$company->address}}</td>
                                <td>
                                    <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-default">Edit</a>
                                    <form action="{{ route('companies.destroy', $company->id) }}" method="POST"
                                          style="display: inline"
                                          onsubmit="return confirm('Are you sure?');">
                                        <input type="hidden" name="_method" value="DELETE">
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No entries found.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    {{ $companies->links() }}
                </div>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="{{route('home')}}">Dashboard</a>
                    </li>
                    <li>
                        <i class="fa fa-floppy-o" aria-hidden="true"></i><a href="{{ route('companies.create') }}">Add New Company</a>
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->
    </div>
@endsection