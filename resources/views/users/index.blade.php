<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="{{ route('users.create') }}" class="bg-blue-500 text-blue px-4 py-2 rounded">Agregar Usuario</a>
                <table class="min-w-full bg-white w-full">
                    <thead class="bg-gray-800 text-white">
                        <tr>
                            <th class="w-1/4 py-2">Nombre</th>
                            <th class="w-1/4 py-2">Email</th>
                            <th class="w-1/4 py-2">Rol</th>
                            <th class="w-1/4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700">
                        @foreach ($users as $user)
                            <tr>
                                <td class="text-left py-3 px-4">{{ $user->name }}</td>
                                <td class="text-left py-3 px-4">{{ $user->email }}</td>
                                <td class="text-left py-3 px-4">{{ $user->role }}</td>
                                <td class="text-left py-3 px-4">
                                    <a href="{{ route('users.edit', $user) }}" class="text-blue-500">Editar</a>
                                    <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
