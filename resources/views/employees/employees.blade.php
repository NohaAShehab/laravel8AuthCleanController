<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Employees') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @section('body')
                <table class="table">
                    <th>
                        Employee Name
                    </th>
                    <th>
                        Email 
                    </th>
                    <th>
                        Salary
                    </th>
                    <th>
                        Show
                    </th>
                    <th>
                        Edit
                    </th>
                    <th>
                        Delete
                    </th>
                    @foreach($employees as $employee)
                    <tr>
                        <td> {{$employee->emp_name}} </td>
                        <td> {{$employee->email}} </td>
                        <td> {{$employee->salary}} </td>
                        <td>
                            <a href="/employees/{{$employee->id}}" 
                                class="btn btn-primary">show</a>
                        </td>
                        <td>
                            <a href="/employees/{{$employee->id}}/edit" 
                                class="btn btn-warning">Edit</a>
                        </td>
                         <td>
                            <form method="POST" action="/employees/{{$employee->id}}/delete"> 
                                @csrf
                                @method("delete")
                                <button type="submit"
                                    class="btn btn-danger"> Delete</button>
                            </form>
                         </td>
                    <tr>
                    @endforeach
                </table>
            @endsection
            </div>
        </div>
    </div>
</x-app-layout>

