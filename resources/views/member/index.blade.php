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
                    
                    @if (session('success'))
                        <p class="text-green-500 mb-4">{{ session('success') }}</p>
                    @endif

                    <div class="flex justify-between">
                        <div>
                            {{-- add member button --}}
                            <a href="{{ route('member.create') }}" class="font-medium text-xs rounded-lg px-4 py-2 bg-green-600 hover:bg-green-700 text-white">Add Member</a>
                        </div>
                        <div>
                            {{-- searching --}}
                            <form action="{{ route('member') }}" method="GET">
                                <input type="text" name="search" placeholder="Search" class="font-medium text-xs rounded-lg px-4 py-2">
                                <button type="submit" class="font-medium text-xs rounded-lg px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white">Search</button>
                            </form>
                        </div>
                    </div>


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        NIK
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Full Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Address
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Phone Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Deposit Balance
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($member as $data)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $data->nik }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $data->full_name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->address }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->phone_number }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $data->deposit_balance }}
                                    </td>
                                    <td class="px-6 py-4 flex">
                                        {{-- Edit Button --}}
                                        <a href="{{ route('member.edit', $data) }}" class="font-medium text-xs rounded-lg px-2 py-1 bg-blue-600 hover:bg-blue-700 text-white mr-2">Edit</a>

                                        {{-- Delete Button --}}
                                        <button
                                            x-data=""
                                            x-on:click.prevent="$dispatch('open-modal', 'confirm-member-deletion')"
                                            class="font-medium text-xs rounded-lg px-2 py-1 bg-red-600 hover:bg-red-700 text-white"
                                        >Delete</button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <x-modal name="confirm-member-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
                        <form action="{{ route('member.delete', $data) }}" method="post" class="p-6">
                            @csrf
                            @method('delete')

                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Are you sure you want to delete this member?') }}
                            </h2>

                            <div class="mt-6 flex justify-end">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Cancel') }}
                                </x-secondary-button>
                
                                <x-danger-button class="ml-3">
                                    {{ __('Delete') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
