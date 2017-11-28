@extends('layouts.admin')
@section('content')


    <div id="page-wrapper">
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    @if (session('message'))
                        <div class="alert alert-info">{{ session('message') }}</div>
                    @endif
                    <h1 class="page-header">
                        Employees
                        <small>Subheading</small>
                    </h1>
                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Company</th>
                                <th>Name</th>
                                <th>Emmail</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($employees as $employee)
                                <tr>
                                    <td>{{$employee->company->name}}</td>
                                    <td>{{$employee->name}}</td>
                                    <td>{{$employee->email}}</td>
                                    <td>
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-default">Edit</a>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST"
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
                        {{ $employees->links() }}
                    </div>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="{{route('home')}}">Dashboard</a>
                        </li>
                        <li>
                            <i class="fa fa-floppy-o" aria-hidden="true"></i> <a href="{{ route('employees.create') }}">Add New Emploeer</a>
                        </li>
                    </ol>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->
    </div>
@endsection