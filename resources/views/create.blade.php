@extends('layouts.main')
@section('content')
    <div class="container">
        <h1>Create User</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
                </ul>
            </div>
        @endif

        <form action="{{route('store')}}" method="POST">
        {{csrf_field()}}
        <!-- 2 column grid layout with text inputs for the first and last names -->
            <div class="row mb-4">
                <div class="col">
                    <div class="form-outline">
                        <input type="text" name="fName" id="form6Example1" class="form-control" />
                        <label class="form-label" for="form6Example1">First name</label>
                    </div>
                </div>
                <div class="col">
                    <div class="form-outline">
                        <input type="text" name="lName" id="form6Example2" class="form-control" />
                        <label class="form-label" for="form6Example2">Last name</label>
                    </div>
                </div>
            </div>



            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email"  name="email" id="form6Example5" class="form-control" />
                <label class="form-label" for="form6Example5">Email</label>
            </div>

            <!-- Number input -->
            <div class="form-outline mb-4">
                <input type="number" name="phone" id="form6Example6" class="form-control" />
                <label class="form-label" for="form6Example6">Phone</label>
            </div>



            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Submit</button>
        </form>
    </div>
@endsection
