@extends('layouts.layout')

@section('content')
    <div class="container mx-auto px-6 py-10">
        <h2 class="text-3xl font-bold text-yellow-300 mb-5">Users Management</h2>

        <div class="bg-gray-800 text-white p-6 rounded-lg shadow-md w-full">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-700 text-left">
                        <th class="p-3">Name</th>
                        <th class="p-3">Email</th>
                        <th class="p-3">Role</th>
                        <th class="p-3">Status</th>
                        <th class="p-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="border-b border-gray-600">
                            <td class="p-3">{{ $user->name }}</td>
                            <td class="p-3">{{ $user->email }}</td>
                            <td class="p-3">
                                {{ $user->getRoleNames()->implode(', ') }}
                            </td>
                            <td class="p-3">
                                <span class="px-2 py-2 text-sm font-semibold
                                    {{ $user->status ? 'bg-green-500' : 'bg-red-500' }} rounded">
                                    {{ $user->status ? 'Not Implemented' : 'Not Implemented' }}
                                </span>
                            </td>
                            <td class="p-3">    
                                <a href=""
                                    class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 text-sm rounded">
                                    Edit
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-3 text-center text-gray-400">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
