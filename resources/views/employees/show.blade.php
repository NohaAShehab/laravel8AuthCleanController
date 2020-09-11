<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employee INFO') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @section('body')
            <table class="table">
            <tr>
                <td>  <b> Employee name  </b> </td>
                <td> {{$employee->emp_name}}</td>
            </tr>
            <tr>
                <td>  <b> Email </b> </td>
                <td> {{$employee->email}}</td>
            </tr>
            <tr>
                <td> <b> Salary  </b></td>
                <td> {{$employee->salary}}</td>

            </tr>
            <tr>
                <td>  
                    <a href="{{ URL::previous()}}" class="btn btn-primary">Back</a>
                </td>
                <td>  
                </td>
            </tr>
        <table>
            @endsection
            </div>
        </div>
    </div>
</x-app-layout>

