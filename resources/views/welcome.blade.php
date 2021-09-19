@extends('layouts.main')
@section('content')
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{session('message')}}
        </div>
    @endif
    <h1>Homepage</h1>
    <div class="container">
        @if ($students)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <th scope="row">{{$student->id}}</th>
                        <td>{{$student->first_name}}</td>
                        <td>{{$student->last_name}}</td>
                        <td>{{$student->email}}</td>
                        <td>{{$student->phone}}</td>
                        <td><a class="btn btn-sm btn-primary" href="{{route('edit',$student->id)}}"><i class="fas fa-edit"></i></a> |
                            <form id="delete-form-{{$student->id}}" style="display:none;" method="post" action="{{route('delete',$student->id)}}">
                                {{csrf_field()}}
                                {{method_field('delete')}}
                            </form>
                            <button onclick="if(confirm('Are you sure you want to delete record')){
                                event.preventDefault();
                                document.getElementById('delete-form-{{$student->id}}').submit();
                                }else{
                                event.preventDefault();
                                }" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        @endif
            {{$students->links()}}
    </div>
@endsection
