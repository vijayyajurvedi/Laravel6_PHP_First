@extends('layouts.main')

@section('content')


<div class='container'>

    @if($errors->any())
    @foreach($errors->all() as $error)

    <div class="alert alert-danger" role="alert">
        {{ $error }}
    </div>

    @endforeach
    @endif

    <h1>Edit Page</h1>

    <!-- Default form register -->
    <form class="text-center border border-light p-5" action="{{route('update',$student->id)}}" method="POST">

        {{csrf_field()}}

        <p class="h4 mb-4">Add Student</p>

        <div class="form-row mb-4">
            <div class="col">
                <!-- First name -->
                <input type="text" id="defaultRegisterFormFirstName" class="form-control" name="firstname" value="{{$student->first_name}}" placeholder="First name">
            </div>
            <div class="col">
                <!-- Last name -->
                <input type="text" id="defaultRegisterFormLastName" class="form-control" name="lastname" value="{{$student->last_name}}"  placeholder="Last name">
            </div>
        </div>

        <!-- E-mail -->
        <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" name="email" value="{{$student->email}}"  placeholder="E-mail">

        <!-- Phone number -->
        <input type="text" id="defaultRegisterPhonePassword" class="form-control" name="phone" value="{{$student->phone}}"  placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">


        <!-- Newsletter -->


        <!-- Sign up button -->
        <button class="btn btn-info my-4 btn-block" type="submit">Update Data</button>

    </form>
    <!-- Default form register -->
</div>
@endsection