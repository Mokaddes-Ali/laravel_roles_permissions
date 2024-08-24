<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permission') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div className="min-h-screen flex items-center justify-center bg-gray-100">
                <form className="bg-white p-6 rounded-lg shadow-lg w-full max-w-sm">
                  <div className="mb-4">
                    <label htmlFor="name" className="block text-gray-700 text-sm font-bold mb-2">
                      Name
                    </label>
                    <input
                      type="text"
                      id="name"
                      placeholder="Enter your name"
                      className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring-2 focus:ring-orange-500"
                    />
                  </div>
                  <button
                    type="submit"
                    className="w-full bg-orange-500 text-red-500 font-bold py-2 px-4 rounded hover:bg-orange-600 transition-colors"
                  >
                    Submit
                  </button>
                </form>
              </div>
        </div>
    </div>
</x-app-layout>
