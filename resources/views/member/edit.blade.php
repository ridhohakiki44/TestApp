<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Member') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                @if($errors->has('nik'))
                    <p class="text-red-500">{{ $errors->first('nik') }}</p>
                @endif

                <form method="post" action="{{ route('member.update', $member) }}">
                    @csrf
                    @method('patch')

                    <div class="mb-6">
                        <label for="nik" class="block mb-2 text-sm font-medium ">NIK</label>
                        <input type="text" id="nik" name="nik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $member->nik }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="full_name" class="block mb-2 text-sm font-medium ">Full Name</label>
                        <input type="text" id="full_name" name="full_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $member->full_name }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="address" class="block mb-2 text-sm font-medium ">Address</label>
                        <input type="text" id="address" name="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $member->address }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="phone_number" class="block mb-2 text-sm font-medium ">Phone Number</label>
                        <input type="text" id="phone_number" name="phone_number" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $member->phone_number }}" required>
                    </div>
                    <div class="mb-6">
                        <label for="deposit_balance" class="block mb-2 text-sm font-medium ">Deposit Balance</label>
                        <input type="number" id="deposit_balance" name="deposit_balance" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{ $member->deposit_balance }}" required>
                    </div>
                    
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
