<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @section('body')
            <form method="POST", action="/employees/{{$employee->id}}/update"> 
                @csrf
                @method('put')
                <table>
                    <tr>
                        <td> Employee name <td>
                        <td> <input type="text" name="emp_name" value="{{$employee->emp_name}}"> </td>
                        <td > <p class="help is-danger"> {{$errors->first('emp_name')}}  </p> <td>
                    </tr>
                    <tr>
                        <td> Email <td>
                        <td> <input type="text" name="email" value="{{$employee->email}}"> </td>
                        <td>  <p class="help is-danger"> {{$errors->first('email')}} </p> <td>
                    </tr>
                    <tr>
                        <td> Salary <td>
                        <td> <input type="text" name="salary" value="{{$employee->salary}}" > </td>
                        <td>  <p class="help is-danger"> {{$errors->first('salary')}} </p> <td>

                    </tr>
                    <tr>
                        <td> 
                            <button type="submit" class="btn btn-success" >Submit Emp </button>
                        </td>
                    </tr>
                <table>
                @csrf
            </form>
            @endsection
            </div>
        </div>
    </div>
</x-app-layout>

