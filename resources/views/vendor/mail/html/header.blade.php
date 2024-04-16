@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
{{-- @if (trim($slot) === 'Laravel') --}}
<img loading="lazy" src="{{useImage(app('setting')->basic->logo)}}" class="logo" alt="{{config('app.name')}} Logo">
{{-- @else --}}
{{-- {{ $slot }} --}}
{{-- @endif --}}
</a>
</td>
</tr>
