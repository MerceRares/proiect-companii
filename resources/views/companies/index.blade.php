<x-app-layout>
    <div class="container">
        <section class="text-center">
            <h1 class="font-bold text-5xl">Company Search</h1>
            <form action="{{ route('companies.search') }}" method="GET" class="mt-6">
                <input
                    id="company-search"
                    type="text"
                    name="query"
                    placeholder="Search for a company..."
                    class="rounded-xl border border-gray-600 text-white placeholder-gray-400 px-5 py-4 w-full max-w-xl"
                    value="{{ request('query') }}"
                    style="background-color: #1e3a8a !important;">

                <div class="mt-4">
                    <label for="name_sort" class="block text-lg">Sort by Name</label>
                    <select name="name_sort" id="name_sort" class="rounded-xl border border-gray-600 px-5 py-2 text-white" style="background-color: #1e3a8a !important;">
                        <option value="">Select...</option>
                        <option value="asc" {{ request('name_sort') === 'asc' ? 'selected' : '' }}>A-Z</option>
                        <option value="desc" {{ request('name_sort') === 'desc' ? 'selected' : '' }}>Z-A</option>
                    </select>
                </div>

                <div class="mt-4">
                    <label for="date_sort" class="block text-lg">Sort by Date Added</label>
                    <select name="date_sort" id="date_sort" class="rounded-xl border border-gray-600 px-5 py-2 text-white" style="background-color: #1e3a8a !important;">
                        <option value="">Select...</option>
                        <option value="newest" {{ request('date_sort') === 'newest' ? 'selected' : '' }}>Newest First</option>
                        <option value="oldest" {{ request('date_sort') === 'oldest' ? 'selected' : '' }}>Oldest First</option>
                    </select>
                </div>

                <button type="submit" class="mt-4 bg-blue-600 text-white font-bold py-2 px-4 rounded">Search</button>
            </form>
        </section>

        <div class="container mt-10 text-xl">
            <h1>Companies List</h1>

            @if($companies->isEmpty() && request('query'))
                <p>No companies found for "{{ request('query') }}".</p>
            @else
                <table class="table-auto mt-4 w-full">
                    <thead>
                    <tr>
                        <th class="border p-2" style="width: 30%;">Name</th>
                        <th class="border p-2">Email</th>
                        <th class="border p-2">Website</th>
                        <th class="border p-2">Address</th>
                        <th class="border p-2">Phone</th>
                        <th class="border p-2">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                        <tr class="border-b">
                            <td class="border p-2 text-center">{{ $company->name }}</td>
                            <td class="border p-2 text-center">{{ $company->email }}</td>
                            <td class="border p-2">{{ $company->website }}</td>
                            <td class="border p-2 text-center">{{ $company->address }}</td>
                            <td class="border p-2 text-center">{{ $company->phone }}</td>
                            <td class="border p-2">
                                <a href="{{ route('companies.show', $company->id) }}" class="btn btn-info">View</a>
                                <a href="{{ route('companies.edit', $company->id) }}" class="btn btn-warning">Edit</a>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="mt-6 flex items-center justify-between">
                    <div>
                        @if ($companies->onFirstPage())
                            <span class="text-gray-500 cursor-not-allowed border px-4 py-2 rounded-l-lg">&laquo; Previous</span>
                        @else
                            <a href="{{ $companies->previousPageUrl() }}" class="text-blue-600 hover:text-blue-900 border px-4 py-2 rounded-l-lg">&laquo; Previous</a>
                        @endif
                    </div>

                    <div class="flex-1 text-center">
                        <div class="inline-flex items-center">
                            @for ($i = 1; $i <= $companies->lastPage(); $i++)
                                @if ($i == $companies->currentPage())
                                    <span class="mx-1 px-4 py-2 text-white bg-blue-600 border rounded">{{ $i }}</span>
                                @else
                                    <a href="{{ $companies->url($i) }}" class="mx-1 px-4 py-2 border rounded">{{ $i }}</a>
                                @endif
                            @endfor
                        </div>
                    </div>

                    <div>
                        @if ($companies->hasMorePages())
                            <a href="{{ $companies->nextPageUrl() }}" class="border px-4 py-2 rounded-r-lg">Next &raquo;</a>
                        @else
                            <span class="text-gray-500 cursor-not-allowed border px-4 py-2 rounded-r-lg">Next &raquo;</span>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
