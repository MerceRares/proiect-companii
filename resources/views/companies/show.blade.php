<x-app-layout>
    <style>
        .glow-button {
            position: relative;
            transition: box-shadow 0.3s ease;
        }

        .glow-button:hover {
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.6),
            0 0 20px rgba(255, 255, 255, 0.5),
            0 0 30px rgba(255, 255, 255, 0.4);
        }

        .glow-button:active {
            box-shadow: 0 0 5px rgba(255, 255, 255, 0.5),
            0 0 10px rgba(255, 255, 255, 0.4);
        }
    </style>
    <h1 style="font-size: 3rem;">{{ $company->name }}</h1>

        <div class="mt-10 card">
            <div class="card-body">
                <h5 style="font-size: 2rem" class="card-title">Company Details</h5>
                <p class="card-text"><strong>Email:</strong> {{ $company->email }}</p>
                <p class="card-text"><strong>Website:</strong> <a href="{{ $company->website }}" target="_blank">{{ $company->website }}</a></p>
                <p class="card-text"><strong>Address:</strong> {{ $company->address }}</p>
                <p class="card-text"><strong>Phone Number:</strong> {{ $company->phone }}</p>
            </div>
        </div>

    <div class="mt-10">
        <a href="{{ route('companies.edit', $company->id) }}"
           class="btn btn-warning glow-button"
           style="background-color: orange; color: white; margin-right: 15px;">
            Edit
        </a>

        <form action="{{ route('companies.destroy', $company->id) }}" method="POST" style="display:inline; margin-right: 15px;">
            @csrf
            @method('DELETE')
            <button type="submit"
                    style="background-color: red; color: white"
                    class="btn btn-danger glow-button"
                    onclick="return confirm('Are you sure you want to delete this company?')">
                Delete
            </button>
        </form>

        <a href="{{ route('companies.index') }}"
           class="btn btn-secondary glow-button"
           style="background-color: blue; color: white;">
            Back to Companies List
        </a>
    </div>
</x-app-layout>
