<x-app-layout>
    <div class="container">
        <h1>Deleted Companies</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($deletedCompanies->isEmpty())
            <p>No deleted companies found.</p>
        @else
            <table class="table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Website</th>
                    <th>Address</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($deletedCompanies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>{{ $company->address }}</td>
                        <td>{{ $company->phone }}</td>
                        <td>
                            <form action="{{ route('companies.restore', $company->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Restore</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('companies.index') }}" class="btn btn-secondary">Back to Companies List</a>
    </div>
    </x-app-layout>
