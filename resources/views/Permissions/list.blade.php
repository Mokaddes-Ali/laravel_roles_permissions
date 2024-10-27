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

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
