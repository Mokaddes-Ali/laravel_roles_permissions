<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Permission/Edit') }}
            </h2>

            <a href="{{ route('permission.index') }}" class="bg-slate-600 text-red-600 px-4 py-3 rounded font-medium">Back List</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('permission.update', $permission->id) }}" >
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="sr-only">Name</label>
                            <input type="text" value="{{ old('name', $permission->name) }}" name="name" id="name" placeholder="Permission Name" class="bg-gray-100 border-2 w-full p-4 rounded-lg ">
                            @error('name')
                                <div class="text-red-500 mt-2 text-md">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
