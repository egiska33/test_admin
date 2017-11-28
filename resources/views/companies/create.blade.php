@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Company</div>

                    <div class="panel-body">
                        <form action="{{ route('companies.store') }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            Name:
                            <br/>
                            <input type="text" name="name" value="{{ old('name') }}" />
                            <br/><br/>
                            Address:
                            <br />
                            <input type="text" name="address" value="{{ old('address') }}" />
                            <br/><br/>
                            Company Logo:
                            <br/>
                            <input type="file" name="logo"/>
                            <br/><br/>
                            <input type="submit" value="Submit" class="btn btn-default" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection