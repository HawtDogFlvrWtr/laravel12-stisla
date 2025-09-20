@extends('layouts.app')
@section('title', "Manage Dashboards")

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                    <div class="card-header">{{ __('Your Dashboards') }}</div>
                    <div class="card-body">
                        <div class="table-responsive">
                        @if (count($dashboards) > 0)
                            <table id="dashboards_table" class="table table-striped compact">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Widget Count</th>
                                        <th class="dt-body-right">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($dashboards as $dashboard)
                                    @php
                                    if (!isset($widget_counts[$dashboard['id']])) {
                                        $widget_count = 0;
                                    } else {
                                        $widget_count = $widget_counts[$dashboard['id']];
                                    }   
                                    @endphp
                                    <tr>
                                        <td>
                                            <a href="{{ route('dashboard', ['id' => $dashboard['id']]) }}">{{$dashboard['name']}}</a>
                                        </td>
                                        <td>
                                            {{ $widget_count }}
                                        </td>
                                        <td>
                                            <form id="delete-{{ $dashboard['id'] }}" action="{{ route('profile.delete-dashboard', ['id' => $dashboard['id']]) }}" method="POST" style="display: inline-block;">
								                @csrf
								                <button type="submit" class="btn btn-sm btn-warning rounded-sm fas fa-trash"></button>
							                </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <b>You don't appear to have dashboards. Please add one</b>"
                        @endif
                        </div>
                    </div>
		            <div class="card-footer text-right">
                    </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        DataTable.type('num', 'className', 'dt-body-center');
        DataTable.type('num-fmt', 'className', 'dt-body-right');
        DataTable.type('date', 'className', 'dt-body-right');
        new DataTable('#dashboards_table', {
            order: [[1, 'desc']], // sort by widget count desc
            "columnDefs": [ {
                "targets": 2, // Disable sorting on the action column
                "orderable": false
            } ]
        });

        // Handle delete alert
        $("[id^='delete-']").on('submit', function(event) {
            event.preventDefault(); // Prevent default form submission

            const form = this; // Reference to the form element

            Swal.fire({
                title: 'Are you sure?',
                text: "You are about to delete this dashboard.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // If confirmed, submit the form
                    form.submit();
                }
            });
        });
    });
</script>
@endsection
