<table class="table table-bordered">
    {{-- <tr>
        <th>Specialist</th>
        <td>{{ isset($event->specialist->name) ? $event->specialist->name : 'N/A' }}</td>
    </tr> --}}
    <tr>
        <th>Name</th>
        <td>{{ isset($event->name) ? $event->name : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Fee</th>
        <td>{{ isset($event->fee) ? 'IDR '.number_format($event->price) : 'N/A' }}</td>
    </tr>
    <tr>
        <th>Photo</th>
        <td>
            <img src="
                @if ($event->photo != "")
                    @if(File::exists('storage/'.$event->photo))
                        {{ url(Storage::url($event->photo)) }}
                    @else
                       {{ 'N/A' }}
                    @endif
                @else
                    {{ 'N/A' }}
                @endif "
                alt="event photo" class="users-avatar-shadow" height="100" width="100">
        </td>
    </tr>
</table>
