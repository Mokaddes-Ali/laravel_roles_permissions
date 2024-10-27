<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission') }}
        </h2>

        <a href="{{ route('permission.create') }}" class="bg-slate-600 text-red-600 px-4 py-3 rounded font-medium">Create Permission</a>
    </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(Session::has('success'))
          <div class="bg-green-200 border-green-600 p-4 mb-3 rounded-sm shadow-sm">
             {{ Session::get('success') }}
          </div>
            @endif

            @if(Session::has('error'))
            <div class="bg-red-200 border-red-600 p-4 mb-3 rounded-sm shadow-sm">
                 {{ Session::get('error') }}
            </div>
            @endif

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2">ID</th>
                        <th class="px-4 py-2">Name</th>
                        <th class="px-4 py-2">Created</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($permissions as $permission)
                    <tr>
                        <td class="border px-4 py-2">{{ $permission->id }}</td>
                        <td class="border px-4 py-2">{{ $permission->name }}</td>
                        <td class="border px-4 py-2">
                            {{\Carbon\Carbon::parse( $permission->created_at)->format('d M, Y') }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('permission.edit', $permission->id) }}" class="bg-blue-500 text-white px-4 py-1 rounded font-medium">Edit</a>
                            <form action="{{ route('permission.destroy', $permission->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-4 py-1 rounded font-medium">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>


        </div>
    </div>
</x-app-layout>
