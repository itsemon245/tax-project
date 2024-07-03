@php
    $periods = ['day', 'week', 'month', 'year', 'total'];
@endphp
<div class="mb-5">
    <h4 class="text-center mb-3">
        Consultation Overview
    </h4>
    <table class="table table-bordered border-black border-2">
        <thead>
            <tr class="bg-light">
                <th class="p-1 text-center fs-5">Time Period</th>
                <th class="p-1 text-center fs-5">Pending</th>
                <th class="p-1 text-center fs-5">Approved</th>
                <th class="p-1 text-center fs-5">Completed</th>
                <th class="p-1 text-center fs-5">All</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($periods as $period)
                @php
                    $period = 'This ' . $period;
                    switch ($period) {
                        case 'This day':
                            $period = 'Today';
                            $between = [now()->startOfDay(), now()->addDay()->startOfDay()];
                            break;
                        case 'week':
                            $between = [now()->startOfWeek(), now()->addWeek()->startOfWeek()];
                            break;
                        case 'month':
                            $between = [now()->startOfMonth(), now()->addMonth()->startOfMonth()];
                            break;
                        case 'year':
                            $between = [now()->startOfYear(), now()->addYear()->startOfYear()];
                            break;

                        default:
                            $between = null;
                            break;
                    }
                @endphp

                <tr>
                    <td class="p-3 text-center text-capitalize fs-5">
                        {{ $period }}
                    </td>
                    <td class="p-3 text-center text-capitalize fs-5">
                        {{ $expert->appointments()->unapproved()->where(function ($q) use ($between) {
                                if ($between) {
                                    $q->whereBetween('created_at', $between);
                                }
                            })->count() }}
                    </td>
                    <td class="p-3 text-center text-capitalize fs-5">
                        {{ $expert->appointments()->approvedOnly()->where(function ($q) use ($between) {
                                if ($between) {
                                    $q->whereBetween('approved_at', $between);
                                }
                            })->count() }}
                    </td>
                    <td class="p-3 text-center text-capitalize fs-5">
                        {{ $expert->appointments()->completedOnly()->where(function ($q) use ($between) {
                                if ($between) {
                                    $q->whereBetween('completed_at', $between);
                                }
                            })->count() }}
                    </td>
                    <td class="p-3 text-center text-capitalize fs-5">
                        {{ $expert->appointments()->where(function ($q) use ($between) {
                                if ($between) {
                                    $q->whereBetween('created_at', $between);
                                }
                            })->count() }}
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
</div>
