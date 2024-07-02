<div class="mb-5">
    <h4 class="text-center mb-3">
        Consultation Overview
    </h4>
    <table class="table table-bordered border-black border-2">
        <thead>
            <tr class="bg-light">
                <th class="p-1 text-center fs-5">Time Period</th>
                <th class="p-1 text-center fs-5">Consultations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($expertStats as $key => $value)
                <tr>
                    <td class="p-2 text-center fs-5">{{ $key }}</td>
                    <td class="p-2 text-center fs-5">{{ $value }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
